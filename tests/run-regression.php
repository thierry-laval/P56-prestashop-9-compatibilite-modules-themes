<?php
/**
 * Tests de non-régression du moteur ps9compatible.
 *
 * Chaque cas lance le scanner sur un module (ou thème) de tests/fixtures/ et
 * vérifie qu'un constat est présent — ou absent — à un endroit précis.
 * Les cas couvrent les défauts corrigés : noms qualifiés et alias, borne
 * ps_versions_compliancy, registerHook en tableau, listes de hooks, faux
 * positifs sur les constantes génériques et sur les classes du module,
 * constats masqués par --min-severity, contrôles propres aux thèmes.
 *
 * Utilisation :  php tests/run-regression.php
 * Code de sortie : 0 si tous les cas passent, 1 sinon.
 *
 * @license http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 */

require_once __DIR__ . '/../ps9compatible.php';

$root = __DIR__ . '/fixtures';
$knowledge = Ps9Scanner::loadKnowledge(__DIR__ . '/../data/removed-api.php');
if (empty($knowledge)) {
    fwrite(STDERR, "Base de connaissances introuvable.\n");
    exit(1);
}

/** @var array<string, array> Constats par fixture, calculés une seule fois. */
$cache = [];
$moduleInfo = [];

/**
 * Lance le scanner sur une fixture et renvoie ses constats.
 */
function findingsFor($name)
{
    global $root, $knowledge, $cache, $moduleInfo;
    if (!isset($cache[$name])) {
        $scanner = new Ps9Scanner($knowledge, $root . '/' . $name, false, null, $name);
        $cache[$name] = $scanner->run();
        $moduleInfo[$name] = $scanner->moduleInfo();
    }

    return $cache[$name];
}

/**
 * Cherche un constat : même règle, même emplacement (« fichier:ligne »),
 * et, si fourni, un fragment du message ou de la piste de correction.
 */
function hasFinding($fixture, $rule, $location, $fragment = null)
{
    foreach (findingsFor($fixture) as $finding) {
        if ($finding['rule'] !== $rule) {
            continue;
        }
        $where = $finding['file'] . ($finding['line'] > 0 ? ':' . $finding['line'] : '');
        if ($location !== null && $where !== $fixture . '/' . $location) {
            continue;
        }
        if ($fragment !== null && strpos($finding['message'] . ' ' . (string) $finding['hint'], $fragment) === false) {
            continue;
        }

        return true;
    }

    return false;
}

$cases = [
    // [description, fixture, règle, emplacement (null = n'importe où), présent ?, fragment]
    // 1. Appels préfixés par \ et alias use ... as ...
    ['\\Tools::displayPrice() est détecté', 'testmod', 'removed-method', 'testmod.php:24', true, 'displayPrice'],
    ['Alias « use Tools as T » : T::displayPrice() est détecté', 'testmod', 'removed-method', 'testmod.php:25', true, 'displayPrice'],
    ['Appel non qualifié Tools::displayPrice() toujours détecté', 'testmod', 'removed-method', 'testmod.php:18', true, null],
    ['Casse différente (tools::DISPLAYPRICE) toujours détectée', 'testmod', 'removed-method', 'testmod.php:23', true, null],
    ['Chaîne de caractères ignorée', 'testmod', 'removed-method', 'testmod.php:21', false, null],
    ['Commentaire ignoré', 'testmod', 'removed-method', 'testmod.php:22', false, null],
    ['Fichier namespacé : \\Tools::displayPrice()', 'nsmod', 'removed-method', 'src/Service.php:12', true, 'displayPrice'],
    ['Fichier namespacé : \\Tools::jsonEncode()', 'nsmod', 'removed-method', 'src/Service.php:14', true, 'jsonEncode'],
    ['Alias dans une liste use : T::encrypt()', 'variantsmod', 'removed-method', 'variantsmod.php:17', true, 'encrypt'],
    ['Fonction globale préfixée : \\each()', 'variantsmod', 'php-removed-function', 'variantsmod.php:18', true, 'each'],
    ['Alias dans un use groupé : new PDP()', 'variantsmod', 'removed-class', 'variantsmod.php:19', true, 'PackDataProvider'],

    // 2. Borne ps_versions_compliancy déclarée en PHP
    ['max = 8.2.9 dans le constructeur', 'testmod', 'compliancy', 'testmod.php:9', true, '8.2.9'],
    ['max = 8.99.99 dans le constructeur', 'compliancymod', 'compliancy', 'compliancymod.php:5', true, '8.99.99'],
    ['max = _PS_VERSION_ : pas de borne', 'nsmod', 'compliancy', null, false, null],
    ['max = 9.99.99 : compatible', 'variantsmod', 'compliancy', null, false, null],

    // 3. registerHook avec un tableau, listes de hooks
    ['registerHook([...]) : hook supprimé détecté', 'testmod', 'removed-hook', 'testmod.php:16', true, 'actionOrderHasBeenShipped'],
    ['registerHook(array(...)) : 1er hook', 'nsmod', 'removed-hook', 'nsmod.php:12', true, 'displayCustomerAccountTop'],
    ['registerHook(array(...)) : 2e hook', 'nsmod', 'removed-hook', 'nsmod.php:12', true, 'actionAjaxDieBefore'],
    ['const HOOKS = [...]', 'variantsmod', 'removed-hook', 'variantsmod.php:7', true, 'displayCustomerAccountTop'],
    ['private $hooksList = array(...)', 'variantsmod', 'removed-hook', 'variantsmod.php:8', true, 'actionAjaxDieBefore'],
    ['$hooks = [...] local', 'variantsmod', 'removed-hook', 'variantsmod.php:16', true, 'adaptImageLink'],

    // 5. Faux positifs sur les constantes génériques
    ['const ERROR = 3 : pas de constat', 'constmod', 'removed-constant', 'constmod.php:5', false, null],
    ['const PASSWORD_LENGTH : pas de constat', 'constmod', 'removed-constant', 'constmod.php:6', false, null],
    ['LogLevel::WARNING (PSR-3) : pas de constat', 'constmod', 'removed-constant', 'constmod.php:9', false, null],
    ['\\Monolog\\Logger::DEBUG : pas de constat', 'constmod', 'removed-constant', 'constmod.php:10', false, null],
    ['self::ERROR : pas de constat', 'constmod', 'removed-constant', 'constmod.php:11', false, null],
    ['Vraie constante retirée (Cart::ONLY_...) toujours détectée', 'testmod', 'removed-constant', 'testmod.php:27', true, null],
    ['Vraie constante retirée, nom qualifié \\Cart::', 'nsmod', 'removed-constant', 'src/Service.php:17', true, null],

    // 6. Classes écrites par le module
    ['new FileUploader() : classe du module (autre fichier)', 'testmod', 'removed-class', 'testmod.php:32', false, null],
    ['new FileUploader() : classe du module (même fichier)', 'nsmod', 'removed-class', 'nsmod.php:16', false, null],
    ['new \\FileUploader() depuis un namespace', 'nsmod', 'removed-class', 'src/Service.php:15', false, null],
    ['Classe du core retirée importée par use : toujours détectée', 'nsmod', 'removed-class', 'src/Service.php:16', true, 'ProductDataProvider'],

    // 7. Thèmes
    ['Thème : meta.compatibility.to < 9', 'mytheme', 'theme-compliancy', 'config/theme.yml:9', true, '8.2.9'],
    ['Thème : hook supprimé dans modules_to_hook', 'mytheme', 'theme-hook', 'config/theme.yml:13', true, 'displayCustomerAccountTop'],
    ['Thème : conseil $tpl_dir adapté au thème', 'mytheme', 'tpl-theme-path', 'templates/catalog/product.tpl:1', true, '_partials'],
    ['Smarty : inclusion multilignes {include\n file=...} détectée', 'mytheme', 'tpl-theme-path', 'templates/catalog/product.tpl:2', true, '_partials'],

    // 8. Méthodes héritées de classes namespacées du core
    ['$this->methode() héritée d\'une classe namespacée du core détectée', 'nsmod', 'removed-method', 'src/MyController.php:10', true, 'renderFieldAction'],
];

$failed = 0;
foreach ($cases as $case) {
    list($label, $fixture, $rule, $location, $expected, $fragment) = $case;
    $actual = hasFinding($fixture, $rule, $location, $fragment);
    $ok = $actual === $expected;
    if (!$ok) {
        ++$failed;
    }
    printf("%s  %s\n", $ok ? 'OK   ' : 'ECHEC', $label);
}

// Nom et version du thème repris de theme.yml pour l'en-tête du rapport.
findingsFor('mytheme');
$ok = $moduleInfo['mytheme']['name'] === 'mytheme' && $moduleInfo['mytheme']['version'] === '1.0.0';
$failed += $ok ? 0 : 1;
printf("%s  %s\n", $ok ? 'OK   ' : 'ECHEC', 'Thème : nom et version lus dans theme.yml');

// 4. Constats masqués par --min-severity : le rapport ne doit plus conclure
//    « Aucun problème détecté » quand des alertes existent.
$cmd = escapeshellarg(PHP_BINARY) . ' ' . escapeshellarg(__DIR__ . '/../ps9compatible.php') . ' '
    . escapeshellarg($root . '/hookmod') . ' --min-severity=error --no-cache --no-color';
$output = (string) shell_exec($cmd);
$ok = strpos($output, 'Aucun problème détecté') === false && strpos($output, '4 constat(s) masqué(s)') !== false;
$failed += $ok ? 0 : 1;
printf("%s  %s\n", $ok ? 'OK   ' : 'ECHEC', 'Seuil « error » : alertes masquées signalées, pas de « Aucun problème détecté »');

// 5. Thème : framework bootstrap-4 rétrogradé en simple Remarque (notice)
$ok = Ps9Rules::severity('theme-bootstrap4') === Ps9Rules::NOTICE;
$failed += $ok ? 0 : 1;
printf("%s  %s\n", $ok ? 'OK   ' : 'ECHEC', 'Règle theme-bootstrap4 : rétrogradée au niveau NOTICE (Remarque)');

printf("\n%d cas, %d échec(s)\n", count($cases) + 3, $failed);
exit($failed === 0 ? 0 : 1);
