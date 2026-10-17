// Moteur : charge PHP-WASM, monte le scanner + la cible utilisateur (module ou theme) dans le FS virtuel,
// execute le CLI PHP, et retourne la sortie du rapport.
//
// Points cles valides empiriquement :
//  - token_get_all / tokenizer / preg / ZipArchive sont presents dans le build web.
//  - Le SAPI WASM n'expose pas les constantes STDOUT/STDERR : on les ouvre sur php://stdout.
//  - La cible peut etre deposee en ZIP ; on l'extrait en JS (DecompressionStream) pour
//    eviter de dependre de ZipArchive et rester maitre du nettoyage du FS.

import { PHP, loadPHPRuntime } from '@php-wasm/universal';
// On importe uniquement le runtime PHP 8.4 : passer par loadWebRuntime() ferait
// entrer les huit versions de PHP dans le bundle (~370 Mo au lieu de ~50 Mo).
import { getPHPLoaderModule } from '@php-wasm/web-8-4';

const APP_ROOT = '/app';
const MODULE_ROOT = '/module';

/** Duree maximale d'une analyse, en millisecondes. */
const SCAN_TIMEOUT_MS = 5 * 60 * 1000;

/** Points d'ancrage des fichiers PHP servis en statique (voir scripts/sync-assets.mjs). */
const ASSETS_BASE = new URL('../php/', import.meta.url);

let phpInstance = null;
let runtimePromise = null;

/**
 * Demarre PHP-WASM une seule fois et met en place le dossier de travail.
 * @param {(msg: string) => void} [onProgress]
 */
export async function ensurePhp(onProgress = () => {}) {
  if (phpInstance) {
    return phpInstance;
  }
  if (!runtimePromise) {
    onProgress('Chargement du moteur PHP (WebAssembly)…');
    runtimePromise = (async () => {
      // getPHPLoaderModule() renvoie le module Emscripten brut ; loadPHPRuntime()
      // le charge reellement (telechargement du .wasm, options emscripten).
      // C'est exactement ce que fait loadWebRuntime() en interne.
      const loaderModule = await getPHPLoaderModule();
      const runtime = await loadPHPRuntime(loaderModule);
      const php = new PHP(runtime);
      setupFilesystem(php);
      return php;
    })();
  }
  phpInstance = await runtimePromise;
  return phpInstance;
}

/** Prepare /app (le scanner) avec les constantes de flux attendues par le CLI. */
function setupFilesystem(php) {
  mkdirp(php, APP_ROOT);
  php.writeFile(
    `${APP_ROOT}/bootstrap.php`,
    `<?php
// Le SAPI WASM n'expose pas STDOUT/STDERR (reserves au vrai CLI).
if (!defined('STDOUT')) { define('STDOUT', fopen('php://stdout', 'wb')); }
if (!defined('STDERR')) { define('STDERR', fopen('php://stderr', 'wb')); }
`
  );
}

function mkdirp(php, dir) {
  // php.mkdir() est cale sur mkdirTree() : il cree toute la chaine de dossiers.
  try {
    php.mkdir(dir);
  } catch (err) {
    // Existe deja : ignore.
  }
}

/**
 * Copie l'arborescence du scanner dans /app depuis les fichiers servis en statique.
 * @param {(msg: string) => void} [onProgress]
 */
export async function mountScanner(onProgress = () => {}) {
  const php = await ensurePhp(onProgress);
  onProgress('Préparation du scanner…');

  const manifestUrl = new URL('manifest.json', ASSETS_BASE);
  const manifest = await fetch(manifestUrl.href).then((r) => {
    if (!r.ok) {
      throw new Error(
        `Manifeste introuvable (${r.status}). Lancez "npm run sync-assets" avant le build.`
      );
    }
    return r.json();
  });

  mkdirp(php, APP_ROOT);
  mkdirp(php, `${APP_ROOT}/src/Ps9Compatible`);
  mkdirp(php, `${APP_ROOT}/data`);

  for (const rel of manifest.files) {
    const url = new URL(rel, ASSETS_BASE);
    const res = await fetch(url.href);
    if (!res.ok) {
      throw new Error(`Fichier PHP introuvable : ${rel} (${res.status})`);
    }
    const text = await res.text();
    const target = `${APP_ROOT}/${rel}`;
    const parent = target.slice(0, target.lastIndexOf('/'));
    mkdirp(php, parent);
    php.writeFile(target, text);
  }

  return php;
}

/**
 * Vide puis remonte la cible utilisateur (module ou theme) dans /module.
 * @param {PHP} php
 * @param {Array<{path: string, data: Uint8Array}>} files
 */
function mountModule(php, files) {
  try {
    if (php.fileExists(MODULE_ROOT)) {
      php.rmdir(MODULE_ROOT, { recursive: true });
    }
  } catch (err) {
    // Pas grave si absent.
  }
  mkdirp(php, MODULE_ROOT);

  for (const file of files) {
    const clean = sanitizePath(file.path);
    if (!clean) {
      continue;
    }
    const target = `${MODULE_ROOT}/${clean}`;
    const parent = target.slice(0, target.lastIndexOf('/'));
    mkdirp(php, parent);
    php.writeFile(target, file.data);
  }
}

/** Empeche toute sortie du dossier /module (zip slip). */
function sanitizePath(p) {
  const normalized = p.replace(/\\/g, '/').replace(/^\/+/, '');
  const parts = normalized.split('/').filter((s) => s && s !== '.');
  const safe = [];
  for (const part of parts) {
    if (part === '..') {
      safe.pop();
      continue;
    }
    safe.push(part);
  }
  return safe.join('/');
}

/**
 * Extrait un ZIP cote navigateur (DecompressionStream, sans lib externe).
 * @param {ArrayBuffer} buffer
 * @returns {Promise<Array<{path: string, data: Uint8Array}>>}
 */
export async function unzip(buffer) {
  const view = new DataView(buffer);
  const bytes = new Uint8Array(buffer);
  const files = [];

  // Recherche de l'End Of Central Directory (EOCD).
  let eocd = -1;
  for (let i = buffer.byteLength - 22; i >= 0 && i >= buffer.byteLength - 65558; i--) {
    if (view.getUint32(i, true) === 0x06054b50) {
      eocd = i;
      break;
    }
  }
  if (eocd < 0) {
    throw new Error('Archive ZIP illisible (signature de fin introuvable).');
  }

  let total = view.getUint16(eocd + 10, true);
  let offset = view.getUint32(eocd + 16, true);

  // ZIP64 : quand un champ vaut 0xFFFF/0xFFFFFFFF, la vraie valeur est dans
  // l'enregistrement « ZIP64 end of central directory ». Sans ce traitement,
  // une archive de plus de 65535 entrees serait tronquee en silence.
  if (total === 0xffff || offset === 0xffffffff) {
    const z64 = findZip64Eocd(view, eocd);
    if (z64 >= 0) {
      total = Number(view.getBigUint64(z64 + 32, true));
      offset = Number(view.getBigUint64(z64 + 48, true));
    }
  }

  for (let n = 0; n < total; n++) {
    // Borne : ne jamais lire hors du buffer sur une archive tronquee.
    if (offset + 46 > buffer.byteLength) {
      throw new Error('Archive ZIP tronquee : repertoire central incomplet.');
    }
    if (view.getUint32(offset, true) !== 0x02014b50) {
      break;
    }
    const method = view.getUint16(offset + 10, true);
    const compressedSize = view.getUint32(offset + 20, true);
    const nameLength = view.getUint16(offset + 28, true);
    const extraLength = view.getUint16(offset + 30, true);
    const commentLength = view.getUint16(offset + 32, true);
    const localOffset = view.getUint32(offset + 42, true);
    const name = new TextDecoder().decode(bytes.subarray(offset + 46, offset + 46 + nameLength));

    if (localOffset + 30 > buffer.byteLength) {
      throw new Error(`Entree ZIP « ${name} » : en-tete local hors archive.`);
    }
    const localNameLength = view.getUint16(localOffset + 26, true);
    const localExtraLength = view.getUint16(localOffset + 28, true);
    const dataStart = localOffset + 30 + localNameLength + localExtraLength;
    const dataEnd = dataStart + compressedSize;
    if (dataStart > buffer.byteLength || dataEnd > buffer.byteLength) {
      throw new Error(`Entree ZIP « ${name} » : donnees hors archive (archive tronquee).`);
    }
    const raw = bytes.subarray(dataStart, dataEnd);

    const isDir = name.endsWith('/');
    if (!isDir && !name.startsWith('__MACOSX/')) {
      let data;
      if (method === 0) {
        data = raw.slice();
      } else if (method === 8) {
        data = await inflateRaw(raw);
      } else {
        throw new Error(`Méthode de compression ZIP non supportée : ${method}`);
      }
      files.push({ path: sanitizePath(name), data });
    }

    offset += 46 + nameLength + extraLength + commentLength;
  }

  if (files.length === 0) {
    throw new Error("L'archive ne contient aucun fichier exploitable.");
  }
  return files;
}

/**
 * Localise l'enregistrement « ZIP64 end of central directory ».
 * @returns {number} Offset, ou -1 si absent.
 */
function findZip64Eocd(view, eocd) {
  const limit = Math.max(0, eocd - 65558);
  for (let i = eocd - 20; i >= limit; i--) {
    if (view.getUint32(i, true) === 0x07064b50) {
      const z64 = Number(view.getBigUint64(i + 8, true));
      if (z64 + 56 <= view.byteLength && view.getUint32(z64, true) === 0x06064b50) {
        return z64;
      }
      return -1;
    }
  }
  return -1;
}

/** Decompression DEFLATE brut via l'API native DecompressionStream. */
async function inflateRaw(raw) {
  if (typeof DecompressionStream === 'undefined') {
    throw new Error('Ce navigateur ne supporte pas DecompressionStream : utilisez un dossier (module ou thème) à la place du ZIP.');
  }
  const stream = new Blob([raw]).stream().pipeThrough(new DecompressionStream('deflate-raw'));
  return new Uint8Array(await new Response(stream).arrayBuffer());
}

/**
 * Applique le prefixe "dossier racine" attendu par le scanner.
 * Un ZIP de module ou de theme contient normalement un unique dossier portant son nom.
 * @param {Array<{path: string, data: Uint8Array}>} files
 */
export function stripSingleRootFolder(files) {
  const tops = new Set();
  for (const f of files) {
    const top = f.path.split('/')[0];
    tops.add(top);
  }
  if (tops.size !== 1) {
    return files;
  }
  const [top] = [...tops];
  const prefix = top + '/';
  const stripped = files
    .filter((f) => f.path.startsWith(prefix))
    .map((f) => ({ path: f.path.slice(prefix.length), data: f.data }));
  return stripped.length > 0 ? stripped : files;
}

/**
 * Extrait les fichiers d'une selection (input webkitdirectory ou drag & drop).
 * @param {FileList|File[]} fileList
 * @returns {Promise<Array<{path: string, data: Uint8Array}>>}
 */
export async function readFilesFromInput(fileList) {
  const files = [];
  for (const file of fileList) {
    const path = file.webkitRelativePath || file.name;
    files.push({ path: sanitizePath(path), data: new Uint8Array(await file.arrayBuffer()) });
  }
  return stripSingleRootFolder(files);
}

/** Liste les extensions de fichiers qui declenchent une erreur de format. */
const ARCHIVE_EXT = /\.(zip|tar|gz|tgz|bz2|7z|rar)$/i;

export { ARCHIVE_EXT };

/**
 * Execute le scan d'une cible (module ou theme) deja montee.
 * @param {Array<{path: string, data: Uint8Array}>} files
 * @param {{format?: string, includeVendor?: boolean, minSeverity?: string, type?: string, noCache?: boolean}} [options]
 * @returns {Promise<{exitCode: number, stdout: string, stderr: string, durationMs: number}>}
 */
export async function runScan(files, options = {}) {
  const php = await mountScanner();
  mountModule(php, files);

  const format = options.format || 'text';
  const args = ['ps9compatible.php', MODULE_ROOT, `--format=${format}`, '--no-color'];
  if (options.type && options.type !== 'auto') {
    args.push(`--type=${options.type}`);
  }
  if (options.includeVendor) {
    args.push('--include-vendor');
  }
  if (options.minSeverity) {
    args.push(`--min-severity=${options.minSeverity}`);
  }
  if (options.noCache) {
    args.push('--no-cache');
  }

  const script = `<?php
require '${APP_ROOT}/bootstrap.php';
require '${APP_ROOT}/ps9compatible.php';
$argv = ${phpArray(args)};
$code = Ps9Cli::main($argv);
fwrite(STDOUT, "\\n__PS9_EXIT__=" . $code);
`;

  php.writeFile(`${APP_ROOT}/run.php`, script);

  const started = performance.now();
  // php.run() n'a pas de delai maximal : une cible tres volumineuse bloquerait
  // l'onglet indefiniment. On borne donc l'attente et on rend la main.
  let timedOut = false;
  const response = await Promise.race([
    php.run({ scriptPath: `${APP_ROOT}/run.php` }),
    new Promise((resolve) => {
      setTimeout(() => {
        timedOut = true;
        resolve(null);
      }, SCAN_TIMEOUT_MS);
    }),
  ]);
  const durationMs = Math.round(performance.now() - started);

  if (timedOut || !response) {
    throw new Error(
      `L'analyse a depasse ${Math.round(SCAN_TIMEOUT_MS / 1000)} secondes et a ete interrompue. ` +
        'Reduisez le perimetre (ou cochez moins d\'options) et reessayez.'
    );
  }

  let stdout = response.text || '';
  let stderr = await response.errorsText;
  stderr = stderr || '';

  let exitCode = 0;
  const match = stdout.match(/\n__PS9_EXIT__=(\d+)\s*$/);
  if (match) {
    exitCode = Number(match[1]);
    stdout = stdout.slice(0, match.index);
  }

  return { exitCode, stdout, stderr, durationMs };
}

/** Serialise un tableau JS en litteral PHP sur. */
function phpArray(values) {
  return '[' + values.map((v) => `'${String(v).replace(/\\/g, '\\\\').replace(/'/g, "\\'")}'`).join(', ') + ']';
}

/**
 * Extrait l'objet JSON d'un rapport (le CLI peut emettre des lignes parasites avant).
 * @param {string} stdout
 */
export function parseReport(stdout) {
  // Le rapport JSON peut etre precede de lignes parasites. On essaie chaque
  // accolade ouvrante jusqu'a obtenir un objet JSON valide, au lieu de prendre
  // aveuglement la premiere accolade (qui peut appartenir a un texte libre).
  let cursor = 0;
  while (cursor < stdout.length) {
    const start = stdout.indexOf('{', cursor);
    if (start < 0) {
      return null;
    }
    const end = stdout.lastIndexOf('}');
    if (end <= start) {
      return null;
    }
    try {
      const parsed = JSON.parse(stdout.slice(start, end + 1));
      if (parsed && typeof parsed === 'object') {
        return parsed;
      }
    } catch (err) {
      // Accolade non exploitable : on avance d'un caractere et on retente.
    }
    cursor = start + 1;
  }
  return null;
}
