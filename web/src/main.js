import {
  ensurePhp,
  mountScanner,
  readFilesFromInput,
  unzip,
  runScan,
  parseReport,
} from './scanner.js';

const els = {
  dropZone: document.getElementById('drop-zone'),
  fileZip: document.getElementById('file-zip'),
  fileDir: document.getElementById('file-dir'),
  optionsPanel: document.getElementById('options-panel'),
  resultsPanel: document.getElementById('results-panel'),
  errorPanel: document.getElementById('error-panel'),
  errorOutput: document.getElementById('error-output'),
  output: document.getElementById('output'),
  summary: document.getElementById('summary'),
  status: document.getElementById('status'),
  btnScan: document.getElementById('btn-scan'),
  btnCopy: document.getElementById('btn-copy'),
  btnDownload: document.getElementById('btn-download'),
  optFormat: document.getElementById('opt-format'),
  optSeverity: document.getElementById('opt-severity'),
  optVendor: document.getElementById('opt-vendor'),
  optType: document.getElementById('opt-type'),
};

/** @type {Array<{path: string, data: Uint8Array}>|null} */
let currentFiles = null;
/** @type {string} */
let currentLabel = '';
/** @type {string} */
let lastOutput = '';

function setStatus(message, kind = 'info') {
  els.status.textContent = message;
  els.status.dataset.kind = kind;
}

/**
 * Pre-remplit la case « Type de cible » a partir des fichiers charges.
 *
 * Meme logique que cote PHP : un theme fournit theme.yml (dans config/ ou a la
 * racine) et un dossier templates/, et ne contient pas de config.xml a la
 * racine. La detection n'ecrase jamais un choix explicite de l'utilisateur.
 *
 * @param {Array<{path: string, data: Uint8Array}>} files
 */
function autodetectType(files) {
  if (els.optType.value !== 'auto') {
    return;
  }
  const paths = files.map((f) => String(f.path).toLowerCase());
  const hasThemeYml = paths.some((p) => p === 'config/theme.yml' || p === 'theme.yml');
  const hasTemplates = paths.some((p) => p.startsWith('templates/'));
  const hasRootConfigXml = paths.some((p) => p === 'config.xml');
  const looksLikeTheme = (hasThemeYml || hasTemplates) && !hasRootConfigXml;

  // On se contente d'informer visuellement : la valeur reste « auto », c'est le
  // PHP qui tranche. Cela evite de forcer a tort quand la detection est ambigue.
  els.optType.dataset.detected = looksLikeTheme ? 'theme' : 'module';
}

/**
 * Vrai des qu'une cible (module ou theme) a ete chargee (ZIP ou dossier).
 *
 * L'initialisation de PHP-WASM dure plusieurs secondes : sans ce drapeau, la
 * fin de l'initialisation ecrasait le message « N fichier(s) pret(s) », et
 * l'utilisateur croyait que son ZIP n'avait pas ete pris en compte.
 */
let moduleLoaded = false;

function showError(message) {
  els.errorPanel.hidden = false;
  els.errorOutput.textContent = message;
  els.resultsPanel.hidden = true;
}

/** Charge la cible une seule fois, puis active le bouton d'analyse. */
async function warmUp() {
  try {
    if (!moduleLoaded) {
      setStatus('Initialisation du moteur PHP…');
    }
    await mountScanner((msg) => {
      if (!moduleLoaded) {
        setStatus(msg);
      }
    });
    // Ne pas ecraser le message d'une cible deja chargee pendant l'init.
    if (!moduleLoaded) {
      setStatus('Moteur prêt.');
    }
    els.btnScan.disabled = !moduleLoaded;
  } catch (err) {
    setStatus('Le moteur PHP n’a pas pu démarrer.', 'error');
    showError(
      `Impossible d'initialiser le moteur PHP (WebAssembly).\n\n${err && err.message ? err.message : err}\n\n` +
        `Vérifiez que votre navigateur supporte WebAssembly, et rechargez la page.`
    );
  }
}

/** Prend en charge une liste de fichiers (dossier ou ZIP). */
async function acceptFiles(files, label) {
  try {
    els.errorPanel.hidden = true;
    setStatus('Lecture des fichiers…');
    currentFiles = files;
    currentLabel = label;
    moduleLoaded = true;
    els.optionsPanel.hidden = false;
    els.btnScan.disabled = false;
    autodetectType(files);
    setStatus(`${files.length} fichier(s) prêt(s) à analyser.`);
    els.btnScan.focus();
  } catch (err) {
    setStatus('Lecture impossible.', 'error');
    showError(err && err.message ? err.message : String(err));
  }
}

async function handleZipFile(file) {
  if (!file) {
    return;
  }
  try {
    setStatus('Extraction de l’archive…');
    const buffer = await file.arrayBuffer();
    const files = await unzip(buffer);
    const { stripSingleRootFolder } = await import('./scanner.js');
    await acceptFiles(stripSingleRootFolder(files), file.name);
  } catch (err) {
    setStatus('Archive illisible.', 'error');
    showError(err && err.message ? err.message : String(err));
  }
}

async function handleDirectoryInput(fileList) {
  if (!fileList || fileList.length === 0) {
    return;
  }
  const files = await readFilesFromInput(fileList);
  await acceptFiles(files, fileList[0].webkitRelativePath || 'cible');
}

async function runTheScan() {
  if (!currentFiles) {
    return;
  }
  els.btnScan.disabled = true;
  els.errorPanel.hidden = true;
  els.resultsPanel.hidden = true;

  const format = els.optFormat.value;
  try {
    setStatus('Analyse en cours…');
    await ensurePhp();
    const result = await runScan(currentFiles, {
      format,
      includeVendor: els.optVendor.checked,
      minSeverity: els.optSeverity.value,
      type: els.optType.value,
      noCache: true,
    });

    if (result.stderr && result.stderr.trim() !== '') {
      showError(result.stderr.trim());
      setStatus('Analyse terminée avec des erreurs.', 'error');
      return;
    }

    lastOutput = result.stdout;
    els.output.textContent = result.stdout;
    els.resultsPanel.hidden = false;
    renderSummary(result.stdout, format);
    setStatus(`Analyse terminée en ${result.durationMs} ms (code ${result.exitCode}).`);
  } catch (err) {
    setStatus('Analyse échouée.', 'error');
    showError(err && err.message ? err.message : String(err));
  } finally {
    els.btnScan.disabled = false;
  }
}

function renderSummary(stdout, format) {
  let counts = null;

  // En JSON, la structure est explicite.
  const report = format === 'json' ? parseReport(stdout) : null;
  if (report && report.summary) {
    counts = {
      error: report.summary.error,
      warning: report.summary.warning,
      notice: report.summary.notice,
    };
  } else {
    // Sinon on relit la ligne de synthese du rapport texte :
    // « 2 fichier(s) analysé(s) · 4 erreur(s) · 0 alerte(s) · 0 remarque(s) »
    counts = parseCountsFromText(stdout);
  }

  if (!counts) {
    els.summary.innerHTML = '';
    els.summary.hidden = true;
    return;
  }

  const parts = [
    ['erreur', counts.error, 'error'],
    ['avertissement', counts.warning, 'warning'],
    ['remarque', counts.notice, 'notice'],
  ];
  els.summary.innerHTML = parts
    .map(([word, count, kind]) => {
      const n = Number(count) || 0;
      const label = n > 1 ? word + 's' : word;
      return `<span class="badge badge-${kind}">${n} ${label}</span>`;
    })
    .join('');
  els.summary.hidden = false;
}

/**
 * Extrait les compteurs de la ligne de synthese du rapport texte.
 *
 * On ancre sur la ligne « N fichier(s) analysé(s) · N erreur(s) · ... » plutot
 * que de chercher « un nombre suivi du mot » n'importe ou dans la sortie :
 * un chemin de fichier comme « modules/2erreurs/... » fausserait le comptage.
 */
function parseCountsFromText(stdout) {
  const line = stdout
    .split('\n')
    .find((l) => /fichier\(s\)\s*analys/i.test(l));
  if (!line) {
    return null;
  }
  const pick = (word) => {
    const m = line.match(new RegExp('(\\d+)\\s*' + word, 'i'));
    return m ? Number(m[1]) : 0;
  };
  return {
    error: pick('erreur'),
    warning: pick('alerte'),
    notice: pick('remarque'),
  };
}

function downloadName() {
  const base = (currentLabel || 'cible').replace(/\.[^.]+$/, '');
  const ext = { text: 'txt', json: 'json', md: 'md', sarif: 'sarif' }[els.optFormat.value] || 'txt';
  return `ps9compatible-${base}.${ext}`;
}

function wireEvents() {
  const prevent = (e) => {
    e.preventDefault();
    e.stopPropagation();
  };
  ['dragenter', 'dragover', 'dragleave', 'drop'].forEach((evt) => {
    els.dropZone.addEventListener(evt, prevent);
  });

  els.dropZone.addEventListener('dragover', () => els.dropZone.classList.add('is-over'));
  els.dropZone.addEventListener('dragleave', () => els.dropZone.classList.remove('is-over'));

  els.dropZone.addEventListener('drop', async (e) => {
    els.dropZone.classList.remove('is-over');
    const dt = e.dataTransfer;
    if (!dt) {
      return;
    }

    // Un dossier depose expose webkitGetAsEntry.
    const items = [...(dt.items || [])];
    const entries = items
      .map((item) => (item.webkitGetAsEntry ? item.webkitGetAsEntry() : null))
      .filter(Boolean);

    if (entries.length > 0 && entries.some((entry) => entry.isDirectory)) {
      try {
        setStatus('Lecture du dossier…');
        const files = await readEntryTree(entries);
        await acceptFiles(files, entries[0].name);
      } catch (err) {
        setStatus('Lecture du dossier impossible.', 'error');
        showError(err && err.message ? err.message : String(err));
      }
      return;
    }

    const file = dt.files && dt.files[0];
    if (file) {
      if (/\.zip$/i.test(file.name)) {
        await handleZipFile(file);
      } else {
        showError(
          `Format non supporté : « ${file.name} ».\n\n` +
            'Déposez un dossier de module ou de thème, ou une archive .zip.'
        );
      }
    }
  });

  // Un depot hors de la zone ne doit pas ouvrir le fichier dans l'onglet.
  ['dragover', 'drop'].forEach((evt) => {
    window.addEventListener(evt, (e) => {
      if (!els.dropZone.contains(e.target)) {
        e.preventDefault();
      }
    });
  });

  els.dropZone.addEventListener('click', (e) => {
    if (e.target.closest('label') || e.target.tagName === 'INPUT') {
      return;
    }
    els.fileZip.click();
  });

  els.dropZone.addEventListener('keydown', (e) => {
    if (e.key === 'Enter' || e.key === ' ') {
      e.preventDefault();
      els.fileZip.click();
    }
  });

  els.fileZip.addEventListener('change', () => handleZipFile(els.fileZip.files[0]));
  els.fileDir.addEventListener('change', () => handleDirectoryInput(els.fileDir.files));
  // Certains navigateurs n'ouvrent pas le selecteur si le label n'a pas de
  // `for` explicite pointant vers l'input. On force donc l'ouverture en JS,
  // et on empeche la double ouverture (label natif + appel JS).
  ['#label-zip', '#label-dir'].forEach((selector) => {
    const label = document.querySelector(selector);
    if (!label) {
      return;
    }
    label.addEventListener('click', (e) => {
      const input = document.getElementById(label.dataset.input);
      if (!input) {
        return;
      }
      // Le label porte deja for="..." : le navigateur ouvre lui-meme le
      // selecteur. On se contente de ne pas laisser le clic remonter jusqu'a
      // la zone de depot (qui, elle, ouvrirait aussi le selecteur).
      e.stopPropagation();
      if (e.target === input) {
        return;
      }
      // Filet de securite : si le navigateur n'a pas honore le `for`
      // (input non rendu), forcer l'ouverture programmatique.
      if (typeof input.showPicker === 'function') {
        try {
          input.showPicker();
          return;
        } catch (err) {
          // showPicker peut lever si deja ouvert : on retombe sur click().
        }
      }
      input.click();
    });
  });
  els.btnScan.addEventListener('click', runTheScan);

  els.btnCopy.addEventListener('click', async () => {
    try {
      await navigator.clipboard.writeText(lastOutput);
      els.btnCopy.textContent = 'Copié !';
      setTimeout(() => (els.btnCopy.textContent = 'Copier'), 1500);
    } catch (err) {
      setStatus('Copie impossible (permission refusée).', 'error');
    }
  });

  els.btnDownload.addEventListener('click', () => {
    if (!lastOutput) {
      setStatus('Aucun rapport à télécharger.', 'error');
      return;
    }
    const blob = new Blob([lastOutput], { type: 'text/plain;charset=utf-8' });
    const url = URL.createObjectURL(blob);
    const a = document.createElement('a');
    a.href = url;
    a.download = downloadName();
    a.rel = 'noopener';
    document.body.appendChild(a);
    a.click();
    document.body.removeChild(a);
    // Liberer l'URL apres coup : la revoquer immediatement peut interrompre
    // le telechargement dans certains navigateurs (fichier vide).
    setTimeout(() => URL.revokeObjectURL(url), 4000);
  });

  // Toute option modifiee apres une premiere analyse doit relancer le scan :
  // sinon le rapport affiche reste celui de l'ancienne option (l'utilisateur
  // change la gravite minimale et ne voit aucun changement).
  [els.optFormat, els.optSeverity, els.optVendor, els.optType].forEach((control) => {
    control.addEventListener('change', () => {
      if (currentFiles) {
        runTheScan();
      }
    });
  });
}

/** Parcourt recursivement les entrees FileSystemEntry d'un dossier depose. */
function readEntryTree(entries) {
  const files = [];
  const readers = [];

  const readFile = (entry) =>
    new Promise((resolve, reject) => {
      entry.file(
        (file) => {
          // Le callback de entry.file() n'est pas async : une exception ici
          // laisserait la promesse en attente pour toujours.
          file
            .arrayBuffer()
            .then((buf) => {
              files.push({
                path: file.webkitRelativePath || entry.fullPath.replace(/^\/+/, ''),
                data: new Uint8Array(buf),
              });
              resolve();
            })
            .catch(reject);
        },
        (err) => reject(err || new Error('Fichier illisible dans le dossier déposé.'))
      );
    });

  const readDir = (dirEntry) =>
    new Promise((resolve, reject) => {
      const reader = dirEntry.createReader();
      const all = [];
      const readBatch = () => {
        reader.readEntries(
          (batch) => {
            if (batch.length === 0) {
              Promise.all(all.map((e) => (e.isDirectory ? readDir(e) : readFile(e))))
                .then(resolve)
                .catch(reject);
              return;
            }
            all.push(...batch);
            readBatch();
          },
          (err) => reject(err || new Error('Dossier illisible.'))
        );
      };
      readBatch();
    });

  for (const entry of entries) {
    readers.push(entry.isDirectory ? readDir(entry) : readFile(entry));
  }

  return Promise.all(readers).then(async () => {
    if (files.length === 0) {
      throw new Error("Aucun fichier n'a pu être lu dans le dossier déposé.");
    }
    const { stripSingleRootFolder } = await import('./scanner.js');
    return stripSingleRootFolder(files);
  });
}

wireEvents();
warmUp();
