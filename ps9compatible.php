<?php
/**
 * Scanner de compatibilité PrestaShop 9 pour modules — Version 2.0.2
 *
 * La version affichée dans le rapport provient de la constante PS9COMPATIBLE_VERSION
 * définie plus bas (source unique de vérité) : ne modifiez que celle-ci.
 *
 * DESCRIPTION GÉNÉRALE :
 * Ce script analyse un module PrestaShop (dossier ou archive ZIP) et liste le code
 * qui empêche son installation ou son fonctionnement sur PrestaShop 9 : classes,
 * méthodes, constantes et hooks supprimés du core, présentateurs déplacés, fonctions
 * PHP supprimées en 8.0, dépréciées en 8.1/8.2, directives INI disparues, pièges des
 * thèmes (classic → Hummingbird), templates Smarty, JavaScript et déclarations de
 * compatibilité de config.xml.
 *
 * FONCTIONNALITÉS PRINCIPALES :
 * - Analyse par tokenizer PHP (token_get_all) et non par simple recherche de texte
 * - Table de symboles construite en une passe : namespaces, alias use, classes,
 *   héritage, méthodes propres et surcharges (override)
 * - Base de connaissances générée depuis les sources PrestaShop 1.7.8 / 8.2 / 9.0
 * - Détection des hooks supprimés et des hooks déclarés dans install()/uninstall()
 * - Analyse des templates Smarty, du JavaScript, du SQL et de config.xml
 * - Cache des fichiers analysés par empreinte SHA-256 : les relances ne réanalysent
 *   que ce qui a réellement changé (--cache / --no-cache)
 * - Sorties texte, JSON, Markdown et SARIF, avec seuil d'échec configurable (--fail-on)
 * - Codes de sortie exploitables en CI : 0 = conforme, 1 = problèmes, 2 = erreur d'usage
 * - Interface web autonome (dossier web/, PHP compilé en WebAssembly) et ligne de
 *   commande, sans aucune API externe
 *
 * @author    Thierry Laval <https://thierrylaval.dev/>
 * @copyright 2007-2026 Thierry Laval
 * @license   http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 * @version   2.0.2
 * @package   Ps9Compatible
 *
 * UTILISATION EN LIGNE DE COMMANDE :
 *   php ps9compatible.php <dossier-module|module.zip> [options]
 *
 * OPTIONS :
 *   --format=text|json|md|sarif  Format de sortie (text par défaut)
 *   --include-vendor             Analyser aussi le dossier vendor/
 *   --no-color                   Sortie texte sans codes couleur
 *   --cache=<dossier>            Dossier de cache (défaut : .ps9compatible-cache)
 *   --no-cache                   Désactiver le cache
 *   --min-severity=error|warning|notice  Masquer les constats moins graves
 *   --ignore=<motif,motif>       Ignorer les fichiers correspondant à ces motifs
 *   --rules=<fichier.php>        Charger un fichier de règles complémentaire
 *   --fail-on=error|warning|notice  Seuil de sortie en code 1 (défaut : error)
 *   --stats                      Afficher les statistiques d'analyse
 *
 * UTILISATION WEB :
 *   L'interface du dossier web/ exécute ce même script dans le navigateur grâce à
 *   PHP compilé en WebAssembly : aucun fichier n'est envoyé sur un serveur.
 *
 * AVERTISSEMENT :
 * Un audit statique ne remplace jamais un test réel : il oriente les vérifications,
 * il ne garantit pas qu'un module fonctionnera sur PrestaShop 9. Testez toujours sur
 * une copie de la boutique avant de mettre à jour en production.
 */

// ============================================================================
// CONFIGURATION INITIALE - Réglages généraux du script
// ============================================================================

// Affichage des erreurs : utile pour diagnostiquer, mais dangereux en production
// (révèle les chemins, les erreurs SQL, la configuration). Sur certains
// hébergements, un simple warning PHP 8 converti en exception provoquait un
// HTTP 500 en pleine page. On limite donc l'affichage aux erreurs réellement
// bloquantes ; les dépréciations et notices sont masquées.

error_reporting(E_ALL & ~E_DEPRECATED & ~E_NOTICE & ~E_WARNING);
ini_set('display_errors', '0');

// Version du moteur. Elle est affichée dans le rapport et comparée à celle de la
// base de connaissances : si elles divergent, un avertissement est signalé.
const PS9COMPATIBLE_VERSION = '2.0.2';
const PS9COMPATIBLE_DATA_VERSION = '1.0.0';

// Le scan de gros modules peut dépasser la limite par défaut de 30 secondes.
// 600 secondes couvrent un module de plusieurs milliers de fichiers.
if (function_exists('set_time_limit')) {
    @set_time_limit(600);
}

// Certains hébergements mutualisés plafonnent la mémoire à 128 Mo : on tente de
// la relever sans jamais faire échouer le script si l'opération est refusée.
@ini_set('memory_limit', '512M');

// Compatibilité avec les versions de PHP antérieures à 8.0 : les constantes de
// tokens introduites ensuite sont définies avec une valeur négative inoffensive,
// ce qui évite un « Undefined constant » sur les hébergements encore en PHP 7.4.
foreach (['T_NAME_QUALIFIED', 'T_NAME_FULLY_QUALIFIED', 'T_NAME_RELATIVE', 'T_ATTRIBUTE', 'T_NULLSAFE_OBJECT_OPERATOR', 'T_ENUM'] as $ps9Token) {
    if (!defined($ps9Token)) {
        define($ps9Token, -1000 - strlen($ps9Token));
    }
}

require_once __DIR__ . '/src/Ps9Compatible/Rules.php';
require_once __DIR__ . '/src/Ps9Compatible/SymbolTable.php';
require_once __DIR__ . '/src/Ps9Compatible/Cache.php';
require_once __DIR__ . '/src/Ps9Compatible/Reporter.php';
require_once __DIR__ . '/src/Ps9Compatible/Scanner.php';
require_once __DIR__ . '/src/Ps9Compatible/Cli.php';

// Point d'entrée en ligne de commande : le fichier peut aussi être inclus par
// index.php (interface web), auquel cas aucun code n'est exécuté automatiquement.
if (PHP_SAPI === 'cli' && isset($argv[0]) && realpath($argv[0]) === __FILE__) {
    exit(Ps9Cli::main($argv));
}
