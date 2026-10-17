// QA : depose un ZIP de module dans l'app, lance le scan, verifie le rapport.
export default async function run(page, ui) {
  // 1) Attendre que le moteur PHP soit pret (le bouton se desactive puis s'active).
  await page.waitForFunction(
    () => {
      const s = document.getElementById('status');
      return s && /prêt/i.test(s.textContent || '');
    },
    { timeout: 120000 }
  );

  const statusAfterWarmup = await ui.text('@e1').catch(() => '');

  // 2) Deposer le ZIP via l'input file (plus fiable que le drag & drop headless).
  await page.setInputFiles('#file-zip', '/tmp/testmodule.zip');

  // 3) Attendre l'activation du bouton d'analyse.
  await page.waitForFunction(
    () => {
      const b = document.getElementById('btn-scan');
      return b && !b.disabled;
    },
    { timeout: 30000 }
  );

  const optionsVisible = await page.evaluate(
    () => !document.getElementById('options-panel').hidden
  );

  // 4) Lancer l'analyse.
  await page.click('#btn-scan');

  // 5) Attendre le rapport (ou une erreur).
  await page.waitForFunction(
    () => {
      const r = document.getElementById('results-panel');
      const e = document.getElementById('error-panel');
      return (r && !r.hidden) || (e && !e.hidden);
    },
    { timeout: 120000 }
  );

  const state = await page.evaluate(() => {
    const errPanel = document.getElementById('error-panel');
    const out = document.getElementById('output');
    return {
      errorShown: errPanel && !errPanel.hidden,
      errorText: (document.getElementById('error-output')?.textContent || '').slice(0, 800),
      reportText: (out?.textContent || '').slice(0, 2500),
      summaryBadges: [...document.querySelectorAll('#summary .badge')].map((b) => b.textContent),
      status: document.getElementById('status')?.textContent || '',
    };
  });

  return {
    statusAfterWarmup,
    optionsVisible,
    ...state,
    // Marqueurs attendus dans le rapport pour ce module de test.
    markers: {
      displayPrice: /displayPrice/.test(state.reportText),
      configurationGetInt: /getInt/.test(state.reportText),
      compliancy: /compliancy|8\.99\.99/i.test(state.reportText),
      errorCount: /error/i.test(state.reportText),
    },
  };
}
