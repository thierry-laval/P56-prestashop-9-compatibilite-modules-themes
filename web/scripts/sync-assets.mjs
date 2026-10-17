// Copie les sources PHP du scanner (source de verite unique) dans web/public/php/
// et le logo de img/ dans web/public/img/, afin qu'ils soient servis en statique
// (FS virtuel de PHP-WASM et image de l'en-tete).
import { mkdir, cp, rm, readdir } from 'node:fs/promises';
import { existsSync } from 'node:fs';
import path from 'node:path';
import { fileURLToPath } from 'node:url';

const HERE = path.dirname(fileURLToPath(import.meta.url));
const REPO = path.resolve(HERE, '..', '..');
const DEST = path.resolve(HERE, '..', 'public', 'php');

const FILES = ['ps9compatible.php'];
const DIRS = ['src', 'data'];

// img/logo.png est la source de verite des images. On le copie dans
// public/img/ pour que index.html puisse la referencer en '../img/logo.png'
// aussi bien en developpement (Vite sert web/ a la racine) qu'apres le build
// (dist/ est a la racine du site).
const IMG_SRC = path.resolve(REPO, 'img');
const IMG_DEST = path.resolve(HERE, '..', 'public', 'img');

async function copyTree(src, dest) {
  await mkdir(dest, { recursive: true });
  for (const entry of await readdir(src, { withFileTypes: true })) {
    const s = path.join(src, entry.name);
    const d = path.join(dest, entry.name);
    if (entry.isDirectory()) {
      await copyTree(s, d);
    } else if (entry.isFile() && entry.name.endsWith('.php')) {
      await cp(s, d);
    }
  }
}

async function main() {
  if (existsSync(DEST)) {
    await rm(DEST, { recursive: true, force: true });
  }
  await mkdir(DEST, { recursive: true });

  for (const file of FILES) {
    const src = path.join(REPO, file);
    if (!existsSync(src)) {
      throw new Error(`Fichier introuvable : ${src}`);
    }
    await cp(src, path.join(DEST, file));
  }

  for (const dir of DIRS) {
    const src = path.join(REPO, dir);
    if (!existsSync(src)) {
      throw new Error(`Dossier introuvable : ${src}`);
    }
    await copyTree(src, path.join(DEST, dir));
  }

  // Manifeste pour connaitre la liste des fichiers a charger cote navigateur.
  // On ne liste que les fichiers reellement copies (FILES + DIRS), pour que le
  // manifeste et l'arborescence ne puissent jamais diverger.
  const manifest = [];
  async function walk(dir, prefix) {
    for (const entry of await readdir(dir, { withFileTypes: true })) {
      const p = path.join(dir, entry.name);
      const rel = prefix ? `${prefix}/${entry.name}` : entry.name;
      if (entry.isDirectory()) {
        await walk(p, rel);
      } else if (entry.isFile() && entry.name.endsWith('.php')) {
        manifest.push(rel);
      }
    }
  }
  await walk(DEST, '');
  manifest.sort();

  if (manifest.length === 0) {
    throw new Error('Aucun fichier PHP copie : verifiez la structure du depot.');
  }

  // Images : copie de img/ a la racine du depot vers public/img/.
  const logo = path.join(IMG_SRC, 'logo.png');
  if (!existsSync(logo)) {
    throw new Error(`Image introuvable : ${logo}`);
  }
  await rm(IMG_DEST, { recursive: true, force: true });
  await mkdir(IMG_DEST, { recursive: true });
  await cp(logo, path.join(IMG_DEST, 'logo.png'));

  const { writeFile } = await import('node:fs/promises');
  await writeFile(
    path.join(DEST, 'manifest.json'),
    JSON.stringify({ files: manifest }, null, 2)
  );

  console.log(`[sync-assets] ${manifest.length} fichiers PHP copies dans public/php/`);
  console.log('[sync-assets] image copiee : public/img/logo.png');
  for (const f of manifest) {
    console.log('  ' + f);
  }
}

main().catch((err) => {
  console.error('[sync-assets] ECHEC :', err.message);
  process.exit(1);
});
