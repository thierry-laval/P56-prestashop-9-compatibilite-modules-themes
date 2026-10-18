import {
  ensurePhp,
  mountScanner,
  readFilesFromInput,
  unzip,
  runScan,
  parseReport,
  singleRootName,
  stripSingleRootFolder,
  safeTargetName,
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
/** @type {string} Nom reel de la cible (dossier racine du ZIP ou dossier choisi). */
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
    currentLabel = safeTargetName(label);
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
    // Le nom de la cible est celui du dossier racine du ZIP (le nom technique
    // du module), a defaut celui de l'archive.
    const name = singleRootName(files) || file.name;
    await acceptFiles(stripSingleRootFolder(files), name);
  } catch (err) {
    setStatus('Archive illisible.', 'error');
    showError(err && err.message ? err.message : String(err));
  }
}

async function handleDirectoryInput(fileList) {
  if (!fileList || fileList.length === 0) {
    return;
  }
  // webkitRelativePath vaut « monmodule/config.xml » : seul le premier segment
  // est le nom du dossier choisi. L'ancien code prenait le chemin complet du
  // premier fichier, d'ou un rapport nomme « ps9compatible-monmodule_config.txt ».
  const first = fileList[0].webkitRelativePath || '';
  const name = first.split('/')[0] || 'cible';
  try {
    const files = await readFilesFromInput(fileList);
    await acceptFiles(files, name);
  } catch (err) {
    setStatus('Lecture du dossier impossible.', 'error');
    showError(err && err.message ? err.message : String(err));
  }
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
      name: currentLabel,
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
    // Le code de sortie du CLI (0 ou 1) n'a pas de sens pour un visiteur.
    setStatus(
      result.exitCode === 0
        ? `Analyse terminée en ${result.durationMs} ms : aucune erreur bloquante.`
        : `Analyse terminée en ${result.durationMs} ms : au moins une erreur bloquante.`
    );
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
    const hidden = report.scan && report.scan.hidden ? report.scan.hidden : null;
    counts = {
      error: report.summary.error,
      warning: report.summary.warning,
      notice: report.summary.notice,
      hidden: hidden ? (Number(hidden.error) || 0) + (Number(hidden.warning) || 0) + (Number(hidden.notice) || 0) : 0,
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
  // Constats masques par la gravite minimale : sans ce badge, un module dont
  // les hooks ont disparu affichait « 0 avertissement » au seuil « Erreur ».
  if (counts.hidden > 0) {
    parts.push(['masqué', counts.hidden, 'hidden']);
  }
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
  // Ligne optionnelle ecrite par le CLI quand --min-severity masque des constats :
  // « N constat(s) masqué(s) par le seuil error : ... ».
  const hiddenLine = stdout.split('\n').find((l) => /constat\(s\)\s*masqu/i.test(l));
  const hiddenMatch = hiddenLine ? hiddenLine.match(/(\d+)\s*constat/i) : null;
  return {
    error: pick('erreur'),
    warning: pick('alerte'),
    notice: pick('remarque'),
    hidden: hiddenMatch ? Number(hiddenMatch[1]) : 0,
  };
}

function downloadName() {
  const base = currentLabel || 'cible';
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
    // Seule la zone elle-meme ouvre le selecteur ZIP. Sans ce test, Entree sur
    // le champ « Choisir un dossier » (qui remonte jusqu'ici) ouvrait le
    // selecteur de ZIP a la place du selecteur de dossier.
    if (e.target !== els.dropZone) {
      return;
    }
    if (e.key === 'Enter' || e.key === ' ') {
      e.preventDefault();
      els.fileZip.click();
    }
  });

  // On vide le champ apres lecture : sinon choisir a nouveau le meme fichier
  // (apres une correction, ou apres une erreur) ne declenche aucun evenement.
  els.fileZip.addEventListener('change', () => {
    const file = els.fileZip.files[0];
    els.fileZip.value = '';
    handleZipFile(file);
  });
  els.fileDir.addEventListener('change', () => {
    const list = Array.from(els.fileDir.files || []);
    els.fileDir.value = '';
    handleDirectoryInput(list);
  });
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
    const mime = {
      json: 'application/json',
      sarif: 'application/sarif+json',
      md: 'text/markdown',
    }[els.optFormat.value] || 'text/plain';
    const blob = new Blob([lastOutput], { type: `${mime};charset=utf-8` });
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

  return Promise.all(readers).then(() => {
    if (files.length === 0) {
      throw new Error("Aucun fichier n'a pu être lu dans le dossier déposé.");
    }
    return stripSingleRootFolder(files);
  });
}

wireEvents();
warmUp();
