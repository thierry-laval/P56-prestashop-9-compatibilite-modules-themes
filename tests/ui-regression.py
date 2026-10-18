"""Test de bout en bout de l'interface web construite (docs/) dans Chromium headless.

Utilisation :
    cd web && npm run build
    python3 -m http.server 8765 --directory ../docs &
    pip install playwright && playwright install chromium
    python3 ../tests/ui-regression.py http://127.0.0.1:8765/

Le script affiche un rapport JSON ; chaque clé correspond à un point corrigé.
"""
import json
import os
import shutil
import sys
import tempfile
from playwright.sync_api import sync_playwright

URL = sys.argv[1]
FIXTURES = os.path.join(os.path.dirname(os.path.abspath(__file__)), "fixtures")
FX = tempfile.mkdtemp()
shutil.make_archive(os.path.join(FX, "testmod"), "zip", FIXTURES, "testmod")
shutil.copytree(os.path.join(FIXTURES, "hookmod"), os.path.join(FX, "hookmod"))
results = {}


def wait_report(page):
    page.wait_for_function(
        """() => /terminée|échouée|erreurs/.test(document.getElementById('status').textContent)""",
        timeout=120000,
    )


with sync_playwright() as p:
    browser = p.chromium.launch()
    page = browser.new_page(accept_downloads=True)
    errors = []
    page.on("pageerror", lambda e: errors.append(str(e)))
    page.on("console", lambda m: errors.append(m.text) if m.type == "error" else None)
    page.goto(URL)
    page.wait_for_function("() => /prêt/i.test(document.getElementById('status').textContent)", timeout=120000)

    # 8. Classe drop + styles de survol appliqués
    results["drop_class"] = page.evaluate("document.getElementById('drop-zone').classList.contains('drop')")
    # La règle .drop { cursor: pointer } ne s'appliquait pas faute de classe.
    results["drop_cursor_pointer"] = page.evaluate("getComputedStyle(document.getElementById('drop-zone')).cursor") == "pointer"

    # 9. Clavier : Entrée sur le champ dossier n'ouvre plus le sélecteur ZIP
    page.evaluate(
        """() => { window.__log = []; const oc = HTMLInputElement.prototype.click;
                   HTMLInputElement.prototype.click = function () { if (this.type === 'file') { window.__log.push(this.id); return; } return oc.call(this); }; }"""
    )
    page.focus("#file-dir")
    page.keyboard.press("Enter")
    results["enter_on_dir_opens"] = page.evaluate("window.__log")
    page.focus("#drop-zone")
    page.keyboard.press("Enter")
    results["enter_on_zone_opens"] = page.evaluate("window.__log")

    # Gravité par défaut
    results["default_severity"] = page.eval_on_selector("#opt-severity", "e => e.value")

    # 10. Chemins du rapport avec le vrai nom du module
    page.set_input_files("#file-zip", f"{FX}/testmod.zip")
    page.wait_for_function("() => !document.getElementById('btn-scan').disabled")
    page.click("#btn-scan")
    wait_report(page)
    out = page.text_content("#output")
    results["status"] = page.text_content("#status")
    results["paths_use_real_name"] = "testmod/testmod.php" in out and "module/testmod.php" not in out.replace("testmod/testmod.php", "")
    results["alias_line_25"] = "testmod/testmod.php:25" in out
    results["fq_line_24"] = "testmod/testmod.php:24" in out
    results["compliancy"] = "ps_versions_compliancy" in out
    results["no_fileuploader_fp"] = "FileUploader" not in out
    results["badges"] = page.eval_on_selector_all("#summary .badge", "bs => bs.map(b => b.textContent)")

    # Badge « masqué » au seuil Erreur
    page.select_option("#opt-severity", "error")
    wait_report(page)
    page.wait_for_timeout(300)
    results["badges_error_threshold"] = page.eval_on_selector_all("#summary .badge", "bs => bs.map(b => b.textContent)")

    # 11. Nom du fichier téléchargé
    with page.expect_download() as dl:
        page.click("#btn-download")
    results["download_name"] = dl.value.suggested_filename

    # 12. Re-sélection du même ZIP : doit relancer la lecture
    page.evaluate("document.getElementById('status').textContent = 'reset'")
    page.set_input_files("#file-zip", f"{FX}/testmod.zip")
    page.wait_for_timeout(800)
    results["reselect_same_zip_status"] = page.text_content("#status")

    # Sélection d'un dossier : nom de la cible
    page.evaluate("document.getElementById('status').textContent = 'reset'")
    page.set_input_files("#file-dir", f"{FX}/hookmod")
    page.wait_for_function("() => /fichier\\(s\\) prêt/.test(document.getElementById('status').textContent)")
    page.select_option("#opt-format", "text")
    page.select_option("#opt-severity", "warning")
    wait_report(page)
    page.evaluate("document.getElementById('status').textContent = 'reset'")
    page.click("#btn-scan")
    wait_report(page)
    out = page.text_content("#output")
    results["dir_paths"] = "hookmod/hookmod.php" in out
    with page.expect_download() as dl:
        page.click("#btn-download")
    results["dir_download_name"] = dl.value.suggested_filename

    results["errors"] = errors
    browser.close()

print(json.dumps(results, ensure_ascii=False, indent=2))
