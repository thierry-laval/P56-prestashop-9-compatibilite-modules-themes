<?php
/**
 * Catalogue de règles du scanner de compatibilité PrestaShop 9
 *
 * Toute la connaissance métier est isolée dans ce fichier : seuils de gravité,
 * correspondances de remplacement, fonctions PHP supprimées, pièges de thème,
 * motifs JavaScript et répertoires exclus. Le moteur (Scanner.php) ne fait que
 * parcourir les tokens et appliquer ce catalogue, ce qui permet de corriger une
 * règle sans jamais toucher à la logique d'analyse.
 *
 * Un fichier de règles externe peut être chargé avec --rules=<fichier.php> pour
 * surcharger gravités et correspondances sans modifier ce fichier.
 *
 * @author    Thierry Laval <https://thierrylaval.dev/>
 * @copyright 2007-2026 Thierry Laval
 * @license   http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 * @version   2.0.0
 * @package   Ps9Compatible
 */

final class Ps9Rules
{
    /** Niveaux de gravité, du plus grave au plus anodin. */
    const ERROR = 'error';
    const WARNING = 'warning';
    const NOTICE = 'notice';

    /** Ordre de tri et seuil utilisé par --fail-on. */
    const ORDER = [self::ERROR => 0, self::WARNING => 1, self::NOTICE => 2];

    /**
     * Gravité par défaut de chaque identifiant de règle. Un identifiant absent
     * de cette table est considéré comme bloquant, par prudence.
     */
    private static $severity = [
        'compliancy' => self::ERROR,
        'removed-class' => self::ERROR,
        'removed-method' => self::ERROR,
        'removed-constant' => self::ERROR,
        'removed-hook' => self::WARNING,
        'override-removed-method' => self::WARNING,
        'removed-method-name' => self::WARNING,
        'php-removed-function' => self::ERROR,
        'php-deprecated-function' => self::NOTICE,
        'php-removed-ini' => self::WARNING,
        'php-removed-syntax' => self::ERROR,
        'php-added-function' => self::NOTICE,
        'tpl-nofilter' => self::NOTICE,
        'tpl-php-tag' => self::ERROR,
        'tpl-theme-path' => self::WARNING,
        'tpl-legacy-smarty' => self::WARNING,
        'tpl-removed-modifier' => self::WARNING,
        'js-blockcart-modal' => self::WARNING,
        'js-legacy-api' => self::WARNING,
        'js-jquery-removed' => self::NOTICE,
        'sql-removed-table' => self::ERROR,
        'sql-removed-column' => self::WARNING,
        'sql-prefix-hardcoded' => self::WARNING,
        'override-collision' => self::WARNING,
        'config-compliancy' => self::ERROR,
        'config-php-version' => self::ERROR,
        'config-legacy-controller' => self::WARNING,
        'config-hook' => self::WARNING,
        'config-module-key' => self::NOTICE,
        'config-display-name' => self::NOTICE,
        'config-cache-key' => self::NOTICE,
        'structure-legacy-dir' => self::NOTICE,
        'structure-missing-file' => self::NOTICE,
        'structure-exposed-file' => self::WARNING,
        'license-legacy' => self::NOTICE,

        // Contrôles spécifiques aux thèmes (détection automatique ou --type=theme).
        'theme-missing-theme-yml' => self::ERROR,
        'theme-missing-templates' => self::ERROR,
        'theme-missing-layouts' => self::WARNING,
        'theme-bootstrap4' => self::WARNING,
        'theme-deprecated-lib' => self::WARNING,
        'theme-js-bootstrap4' => self::WARNING,
        'tpl-translation-missing-domain' => self::NOTICE,
        'theme-bundled-module' => self::NOTICE,
        'theme-compliancy' => self::WARNING,
        'theme-hook' => self::WARNING,
    ];

    /**
     * Correspondances de remplacement pour les méthodes supprimées du core.
     * La clé est « classe::méthode » en minuscules ; l'héritage est résolu par
     * le scanner avant la recherche, donc il suffit de déclarer la classe qui
     * définissait réellement la méthode.
     */
    private static $hints = [
        'tools::displayprice' => 'Utiliser $this->context->getCurrentLocale()->formatPrice($price, $this->context->currency->iso_code).',
        'tools::displaynumber' => 'Utiliser $this->context->getCurrentLocale()->formatNumber($number).',
        'tools::displayweight' => 'Utiliser $this->context->getCurrentLocale()->formatWeight($weight).',
        'tools::psround' => 'Utiliser round() ou les arrondis du service Locale.',
        'tools::encrypt' => 'Utiliser Tools::hash().',
        'tools::stripslashes' => 'Utiliser stripslashes() de PHP.',
        'tools::jsonencode' => 'Utiliser json_encode().',
        'tools::jsondecode' => 'Utiliser json_decode().',
        'tools::array_replace' => 'Utiliser array_replace() de PHP.',
        'tools::arrayreplacerecursive' => 'Utiliser array_replace_recursive() de PHP.',
        'tools::getpath' => 'Construire le chemin à partir de _PS_ROOT_DIR_ ou d\'un chemin relatif au module.',
        'tools::gettoken' => 'Selon le contexte, utiliser $this->context ou le service TokenManager.',
        'tools::displayfilelink' => 'Construire le lien puis l\'afficher dans un template.',
        'tools::redirectlink' => 'Utiliser Tools::redirect() ou le routeur Symfony dans un contrôleur moderne.',
        'tools::safedisplayprice' => 'Utiliser le formateur de prix du contexte courant.',
        'controller::addjquery' => 'Supprimer l\'appel : sur PrestaShop 9, jQuery provient du thème (vérifier Hummingbird).',
        'controller::addcss' => 'Utiliser $this->registerStylesheet().',
        'controller::addjs' => 'Utiliser $this->registerJavascript().',
        'controller::addjqueryplugin' => 'Utiliser $this->registerJavascript() avec un chemin relatif au module.',
        'controller::addjqueryuicore' => 'Enregistrer le script jQuery UI avec $this->registerJavascript() si le thème le fournit.',
        'controller::addjquerydatepicker' => 'Enregistrer le script du datepicker avec $this->registerJavascript().',
        'controller::addjquerycolorpicker' => 'Enregistrer le script du colorpicker avec $this->registerJavascript().',
        'controller::addjqueryimagecrop' => 'Enregistrer le script avec $this->registerJavascript().',
        'frontcontroller::addmedia' => 'Utiliser $this->registerJavascript() / $this->registerStylesheet().',
        'frontcontroller::removemedia' => 'Utiliser $this->unregisterJavascript() / $this->unregisterStylesheet().',
        'frontcontroller::setmedia' => 'Déplacer l\'enregistrement des médias dans initContent() ou les hooks d\'affichage, ou conserver setMedia() derrière un test de version.',
        'objectmodel::getvalidationrules' => 'Lire les règles dans le tableau $definition de la classe, ou appeler $object->validateFields().',
        'configuration::getint' => 'Utiliser (int) Configuration::get($key).',
        'configuration::updatevalue' => 'Vérifier la signature attendue : le quatrième paramètre $html a changé de valeur par défaut.',
        'currency::getconversationrate' => 'Utiliser $currency->getConversionRate().',
        'module::displayconfirmation' => 'Retourner un template rendu ou utiliser l\'assistant d\'AdminController.',
        'module::displayerror' => 'Retourner un template rendu ou utiliser l\'assistant d\'AdminController.',
        'module::displaywarning' => 'Retourner un template rendu ou utiliser l\'assistant d\'AdminController.',
        'module::isregisteredinhook' => 'Utiliser Hook::isModuleRegisteredOnHook() ou le service HookRepository.',
        'module::isplayableonmobile' => 'Utiliser $this->isEnabledForMobileDevices() à la place.',
        'paymentmodule::validateorder' => 'Adapter à la signature de PrestaShop 9 ou passer par le service de commande de paiement.',
        'cart::getproducts' => 'Vérifier la signature : les paramètres $idLang et $idShop ont évolué.',
        'product::getprice' => 'Passer par le présentateur de prix ou Product::getPriceStatic().',
        'class:attribute' => 'La classe historique Attribute a été renommée ProductAttribute dans PrestaShop 8.',
        'class:attributeCore' => 'La classe historique Attribute a été renommée ProductAttribute dans PrestaShop 8.',
        'class:cartpresenter' => 'Utiliser le nouveau namespace du présentateur, ou construire le tableau soi-même.',
        'class:orderpresenter' => 'Utiliser le nouveau namespace du présentateur, ou construire le tableau soi-même.',
        'class:productpresenter' => 'Utiliser le nouveau namespace du présentateur, ou construire le tableau soi-même.',
        'class:customerpresenter' => 'Utiliser le nouveau namespace du présentateur, ou construire le tableau soi-même.',
        'class:helperlist' => 'Utiliser le HelperList de PrestaShop 9, dont la signature des colonnes a changé.',
        'class:helperform' => 'Utiliser le HelperForm de PrestaShop 9, dont la signature des champs a changé.',
    ];

    /**
     * Fonctions supprimées en PHP 8.0. PrestaShop 9 exige PHP 8.1 ou supérieur :
     * tout appel listé ici provoquera une erreur fatale sur la boutique à jour.
     */
    private static $phpRemoved = [
        'create_function' => 'Utiliser une fonction anonyme : function ($a) { return $a; }.',
        'each' => 'Utiliser foreach.',
        'money_format' => 'Utiliser NumberFormatter ou le formateur de la Locale PrestaShop.',
        'get_magic_quotes_gpc' => 'Supprimer l\'appel, les magic quotes n\'existent plus.',
        'get_magic_quotes_runtime' => 'Supprimer l\'appel, les magic quotes n\'existent plus.',
        'set_magic_quotes_runtime' => 'Supprimer l\'appel, les magic quotes n\'existent plus.',
        'define_syslog_variables' => 'Supprimer l\'appel, la fonction a été supprimée en PHP 8.0.',
        'ereg' => 'Utiliser preg_match().',
        'eregi' => 'Utiliser preg_match() avec le modificateur i.',
        'ereg_replace' => 'Utiliser preg_replace().',
        'eregi_replace' => 'Utiliser preg_replace() avec le modificateur i.',
        'split' => 'Utiliser explode() ou preg_split().',
        'spliti' => 'Utiliser preg_split() avec le modificateur i.',
        'sql_regcase' => 'Construire le motif soi-même, la fonction a été supprimée.',
        'mysql_query' => 'Utiliser Db::getInstance() et ses helpers executeS()/getRow().',
        'mysql_connect' => 'Utiliser Db::getInstance().',
        'mysql_pconnect' => 'Utiliser Db::getInstance().',
        'mysql_select_db' => 'Utiliser Db::getInstance().',
        'mysql_fetch_assoc' => 'Utiliser Db::getInstance()->executeS().',
        'mysql_fetch_array' => 'Utiliser Db::getInstance()->executeS().',
        'mysql_num_rows' => 'Utiliser Db::getInstance()->executeS() et compter le résultat.',
        'mysql_error' => 'Utiliser la gestion d\'erreurs de Db.',
        'mysql_real_escape_string' => 'Utiliser pSQL().',
        'mysql_close' => 'Utiliser Db::getInstance() qui gère la connexion.',
        'mcrypt_encrypt' => 'Utiliser openssl_encrypt() ou le service de chiffrement de PrestaShop.',
        'mcrypt_decrypt' => 'Utiliser openssl_decrypt() ou le service de chiffrement de PrestaShop.',
        'mcrypt_create_iv' => 'Utiliser random_bytes() ou openssl_random_pseudo_bytes().',
        'mcrypt_get_iv_size' => 'Utiliser openssl_cipher_iv_length().',
        'image2wbmp' => 'Utiliser imagewbmp().',
        'png2wbmp' => 'Utiliser imagewbmp() ou la bibliothèque GD.',
        'jpeg2wbmp' => 'Utiliser imagewbmp() ou la bibliothèque GD.',
        'fgetss' => 'Utiliser fgets() avec strip_tags().',
        'restore_include_path' => 'Utiliser ini_restore(\'include_path\').',
        'php_check_syntax' => 'Supprimer l\'appel, la fonction a été supprimée en PHP 8.0.',
        'hebrevc' => 'La fonction a été supprimée en PHP 8.0.',
        'convert_cyr_string' => 'La fonction a été supprimée en PHP 8.0.',
        'ezmlm_hash' => 'La fonction a été supprimée en PHP 8.0.',
        'ldap_sort' => 'La fonction a été supprimée en PHP 8.0.',
        'is_real' => 'Utiliser is_float().',
        'call_user_method' => 'Utiliser call_user_func([$objet, \'methode\']).',
        'call_user_method_array' => 'Utiliser call_user_func_array([$objet, \'methode\'], $args).',
        'mysqli_bind_param' => 'L\'alias a été supprimé ; utiliser mysqli_stmt_bind_param().',
        'mysqli_bind_result' => 'L\'alias a été supprimé ; utiliser mysqli_stmt_bind_result().',
        'mysqli_fetch_assoc' => 'L\'alias a été supprimé ; utiliser mysqli_stmt_fetch() ou mysqli::query().',
        'mysqli_query' => 'L\'alias a été supprimé ; utiliser mysqli::query().',
        'wddx_serialize_value' => 'L\'extension WDDX a été supprimée en PHP 8.0.',
        'wddx_serialize_vars' => 'L\'extension WDDX a été supprimée en PHP 8.0.',
        'wddx_deserialize' => 'L\'extension WDDX a été supprimée en PHP 8.0.',
        'wddx_packet_start' => 'L\'extension WDDX a été supprimée en PHP 8.0.',
        'wddx_packet_end' => 'L\'extension WDDX a été supprimée en PHP 8.0.',
        'wddx_add_vars' => 'L\'extension WDDX a été supprimée en PHP 8.0.',
    ];

    /**
     * Fonctions dépréciées en PHP 8.1 ou 8.2. Le code fonctionne encore, mais
     * remplit les logs dès que la boutique tourne en mode debug.
     */
    private static $phpDeprecated = [
        'utf8_encode' => 'Dépréciée en PHP 8.2. Utiliser mb_convert_encoding($s, \'UTF-8\', \'ISO-8859-1\').',
        'utf8_decode' => 'Dépréciée en PHP 8.2. Utiliser mb_convert_encoding($s, \'ISO-8859-1\', \'UTF-8\').',
        'strftime' => 'Dépréciée en PHP 8.1. Utiliser date() ou IntlDateFormatter.',
        'gmstrftime' => 'Dépréciée en PHP 8.1. Utiliser gmdate() ou IntlDateFormatter.',
        'assert' => 'La forme chaîne de assert() est dépréciée : passer un booléen.',
        'strptime' => 'Dépréciée en PHP 8.1. Utiliser date_parse_from_format() ou IntlDateFormatter.',
        'date_sunrise' => 'Dépréciée en PHP 8.1. Utiliser date_sun_info().',
        'date_sunset' => 'Dépréciée en PHP 8.1. Utiliser date_sun_info().',
        'mb_check_encoding' => 'Le comportement change en PHP 8.2 : vérifier les arguments passés.',
        'get_class' => 'Dépréciée sans argument en PHP 8.2 : passer l\'objet explicitement.',
        'get_parent_class' => 'Dépréciée sans argument en PHP 8.2 : passer l\'objet explicitement.',
    ];

    /** Directives INI supprimées ou renommées en PHP 8. */
    private static $phpRemovedIni = [
        'mbstring.func_overload' => 'Supprimée en PHP 8.0.',
        'track_errors' => 'Supprimée en PHP 8.0.',
        'magic_quotes_gpc' => 'Supprimée en PHP 8.0.',
        'magic_quotes_runtime' => 'Supprimée en PHP 8.0.',
        'magic_quotes_sybase' => 'Supprimée en PHP 8.0.',
        'register_globals' => 'Supprimée en PHP 8.0.',
        'safe_mode' => 'Supprimée en PHP 8.0.',
        'y2k_compliance' => 'Supprimée en PHP 8.0.',
        'iconv.input_encoding' => 'Supprimée en PHP 8.0.',
        'iconv.output_encoding' => 'Supprimée en PHP 8.0.',
        'iconv.internal_encoding' => 'Supprimée en PHP 8.0.',
        'sql.safe_mode' => 'Supprimée en PHP 8.0.',
        'allow_url_include' => 'Dépréciée en PHP 7.4 puis supprimée en PHP 8.0.',
        'pdo_odbc.db2_instance_name' => 'Supprimée en PHP 8.0.',
    ];

    /** Tables du core supprimées, avec la version qui les a retirées. */
    private static $sqlRemovedTables = [
        'attribute_impact' => '9.0',
        'attribute_price' => '9.0',
        'carrier_tax_rules_group_shop' => '9.0',
        'discount_type' => '9.0',
        'hook_module_exceptions' => '9.0',
        'order_detail_tax' => '9.0',
        'product_attribute_image' => '9.0',
        'stock_mvt_reason_lang' => '9.0',
        'zone_admin' => '9.0',
        'attribute_group_lang' => '9.0',
        'feature_value_lang' => '9.0',
    ];

    /** Colonnes supprimées ou renommées, par table. */
    private static $sqlRemovedColumns = [
        'product_shop' => ['id_shop_group', 'id_shop'],
        'order_detail' => ['product_price'],
        'customer' => ['passwd'],
        'employee' => ['passwd'],
        'configuration' => ['date_add', 'date_upd'],
        'module' => ['id_module'],
        'hook' => ['id_hook'],
        'orders' => ['invoice_number'],
        'cart' => ['id_guest'],
    ];

    /**
     * Motifs Smarty retirés du build Smarty livré avec PrestaShop 9.
     * Une valeur nulle signifie que la construction reste valide et sert
     * uniquement à documenter la liste.
     */
    private static $smartyRemoved = [
        '{php}' => 'Le bloc {php} n\'est plus compilé du tout.',
        '{lang}' => 'La balise {lang} a été retirée des plugins Smarty de PrestaShop.',
        '{counter}' => 'Le plugin {counter} ne fait pas partie du build Smarty de PrestaShop 9.',
        '{mailto}' => 'Le plugin {mailto} ne fait pas partie du build Smarty de PrestaShop 9.',
        '{html_options}' => 'Le plugin {html_options} ne fait pas partie du build Smarty de PrestaShop 9.',
        '{html_checkboxes}' => 'Le plugin {html_checkboxes} ne fait pas partie du build Smarty de PrestaShop 9.',
        '{html_radios}' => 'Le plugin {html_radios} ne fait pas partie du build Smarty de PrestaShop 9.',
        '{textformat}' => 'Le plugin {textformat} ne fait pas partie du build Smarty de PrestaShop 9.',
        '{math}' => 'Le plugin {math} ne fait pas partie du build Smarty de PrestaShop 9 : calculer la valeur en PHP.',
        '{section ' => 'Les boucles {section} de Smarty 2 ont été retirées : utiliser {foreach} ou {for}.',
        '|@count' => 'La syntaxe de modificateur @ a été retirée de Smarty 3 : utiliser |count ou un foreach natif.',
        '|@escape' => 'La syntaxe de modificateur @ a été retirée de Smarty 3 : retirer le @.',
        '|@default' => 'La syntaxe de modificateur @ a été retirée de Smarty 3 : retirer le @.',
    ];

    /** API JavaScript retirées, avec leur motif de recherche. */
    private static $jsRemoved = [
        'jquery-live' => [
            'pattern' => '/\.live\s*\(/',
            'message' => 'La méthode .live() a été retirée de jQuery 1.9.',
            'hint' => 'Utiliser .on() avec délégation : $(document).on(\'click\', \'selecteur\', handler).',
        ],
        'jquery-die' => [
            'pattern' => '/\.die\s*\(/',
            'message' => 'La méthode .die() a été retirée de jQuery 1.9.',
            'hint' => 'Utiliser .off().',
        ],
        'jquery-size' => [
            'pattern' => '/\.size\s*\(/',
            'message' => 'La méthode .size() a été retirée de jQuery 1.8.',
            'hint' => 'Utiliser .length.',
        ],
        'jquery-browser' => [
            'pattern' => '/\$\.browser\b/',
            'message' => 'La propriété $.browser a été retirée de jQuery 1.9.',
            'hint' => 'Utiliser la détection de fonctionnalités.',
        ],
        'jquery-fancybox' => [
            'pattern' => '/\.fancybox\s*\(|\$\.fancybox\b/',
            'message' => 'fancybox n\'est pas fourni par les thèmes de PrestaShop 9.',
            'hint' => 'Afficher le contenu dans une modale du thème ou une boîte de dialogue propre au module.',
        ],
        'ps-legacy-ajax' => [
            'pattern' => '/prestashop\.modules\.ajax\b|\bajax\.php\b/',
            'message' => 'Les points d\'entrée ajax.php ont été retirés de PrestaShop 9.',
            'hint' => 'Exposer un contrôleur frontal de module et l\'appeler par son URL.',
        ],
        'ps-legacy-cart' => [
            'pattern' => '/\bcart\.php\b|getCartLink\s*\(\)/',
            'message' => 'Le script historique cart.php a été supprimé ; utiliser l\'URL du contrôleur de panier.',
            'hint' => 'Construire l\'URL avec le module ou le helper {url} de Smarty.',
        ],
        'ps-legacy-tools' => [
            'pattern' => '/\bTools\.(?:jsonEncode|jsonDecode|displayPrice)\b/',
            'message' => 'Les helpers JavaScript de Tools ne sont plus fournis par PrestaShop 9.',
            'hint' => 'Utiliser JSON natif et le template pour le formatage.',
        ],
        'ps-legacy-jquery-load' => [
            'pattern' => '/\.load\s*\(\s*[\'"][^\'"]+\.php/',
            'message' => 'Le chargement direct d\'un script PHP par .load() échoue avec les contrôleurs de PrestaShop 9.',
            'hint' => 'Passer par une URL de contrôleur frontal.',
        ],
    ];

    /** Motifs et seuils utilisés par les contrôles structurels. */
    private static $patterns = [
        'php_extensions' => '/\.(php|tpl|js)$|^config\.xml$/i',
        'minified_js' => '/\.min\.js$/i',
        'excluded_dirs' => ['.git', '.svn', 'node_modules', '.idea', '.vscode', '__MACOSX', 'ps9compatible-cache'],
        'override_dir' => 'override/',
        'smarty_include_theme' => '/\{include\s+file\s*=\s*[\'"]?\$tpl_dir/i',
        'tpl_php_tag' => '/\{\/?php\s*\}/i',
        'tpl_nofilter' => '/\{\$[^}]*\bnofilter\b/',
        'smarty_variable_tag' => '/\{[^}\n]{0,200}\}/',
        'php_ini_call' => '/\bini_(?:set|get|restore)\s*\(\s*[\'"]([a-z0-9_.]+)[\'"]/i',
        'php_ini_directive_file' => '/^\s*([a-z0-9_.]+)\s*=/im',
        'php_version_required' => '8.1.0',
        'ps_version_target' => '9.0.0',
        'sql_prefix_literal' => '/\b(?:FROM|JOIN|INTO|UPDATE|TABLE)\s+`?ps_([a-z0-9_]+)/i',
    ];

    /** Fichiers qu'un module devrait livrer ; leur absence est un défaut de packaging. */
    private static $expectedFiles = [
        'index.php' => 'Un module sans fichier index.php laisse les visiteurs lister le contenu des dossiers.',
        'config.xml' => 'config.xml absent : le module n\'apparaît pas correctement dans le catalogue des modules.',
        'logo.png' => 'logo.png absent : le module s\'affiche sans visuel dans le back-office.',
    ];

    /** Fichiers qui n'ont rien à faire dans un module distribué. */
    private static $exposedFiles = [
        'phpunit.xml' => 'Configuration de tests unitaires livrée avec le module.',
        'phpunit.xml.dist' => 'Configuration de tests unitaires livrée avec le module.',
        '.env' => 'Fichier d\'environnement livré avec le module : il peut contenir des identifiants.',
        'composer.lock' => 'Verrou de dépendances inutile dans un module distribué.',
        'phpinfo.php' => 'Fichier de diagnostic exposé publiquement.',
        'adminer.php' => 'Outil d\'administration de base de données exposé publiquement.',
    ];

    /** Dossiers d'ancienne génération qui ne sont plus chargés par PrestaShop 9. */
    private static $legacyDirs = [
        'override/classes',
        'override/controllers',
        'mails',
        'translations',
    ];

    /** Fichiers de règles chargés en surcharge, pour traçabilité du rapport. */
    private static $loadedOverrides = [];

    /**
     * Charge un fichier de règles externe. Le fichier doit retourner un tableau
     * dont les clés correspondent aux propriétés statiques de cette classe.
     *
     * @param  string $path Chemin du fichier de règles.
     * @return bool Vrai si le fichier a été chargé.
     */
    public static function loadOverrides($path)
    {
        if (!is_file($path) || !is_readable($path)) {
            return false;
        }
        $extra = require $path;
        if (!is_array($extra)) {
            return false;
        }
        $allowed = [
            'severity' => 'severity',
            'hints' => 'hints',
            'phpRemoved' => 'phpRemoved',
            'phpDeprecated' => 'phpDeprecated',
            'phpRemovedIni' => 'phpRemovedIni',
            'sqlRemovedTables' => 'sqlRemovedTables',
            'sqlRemovedColumns' => 'sqlRemovedColumns',
            'smartyRemoved' => 'smartyRemoved',
            'jsRemoved' => 'jsRemoved',
        ];
        foreach ($allowed as $key => $property) {
            if (isset($extra[$key]) && is_array($extra[$key])) {
                self::${$property} = array_merge(self::${$property}, $extra[$key]);
            }
        }
        self::$loadedOverrides[] = $path;

        return true;
    }

    /** Gravité d'une règle, avec repli sur bloquant. */
    public static function severity($rule)
    {
        return isset(self::$severity[$rule]) ? self::$severity[$rule] : self::ERROR;
    }

    /** Rang numérique d'une gravité, pour le tri et les comparaisons. */
    public static function rank($severity)
    {
        return isset(self::ORDER[$severity]) ? self::ORDER[$severity] : 3;
    }

    /** Indique si une gravité atteint le seuil demandé. */
    public static function isAtLeast($severity, $threshold)
    {
        return self::rank($severity) <= self::rank($threshold);
    }

    /** Texte de remplacement pour une méthode supprimée du core. */
    public static function hintForMethod($class, $method)
    {
        $key = strtolower($class) . '::' . strtolower($method);
        if (isset(self::$hints[$key])) {
            return self::$hints[$key];
        }

        return null;
    }

    /** Texte de remplacement pour une classe supprimée du core. */
    public static function hintForClass($class)
    {
        $key = 'class:' . strtolower($class);
        if (isset(self::$hints[$key])) {
            return self::$hints[$key];
        }
        // Les classes du core portent souvent le suffixe Core : on teste aussi
        // le nom sans ce suffixe, qui est celui utilisé dans le code source.
        if (substr(strtolower($class), -4) === 'core') {
            $key = 'class:' . substr(strtolower($class), 0, -4);
            if (isset(self::$hints[$key])) {
                return self::$hints[$key];
            }
        }

        return null;
    }

    /** Texte de remplacement pour une fonction PHP supprimée en 8.0. */
    public static function phpRemovedHint($function)
    {
        return isset(self::$phpRemoved[$function]) ? self::$phpRemoved[$function] : null;
    }

    /** Texte de remplacement pour une fonction PHP dépréciée. */
    public static function phpDeprecatedHint($function)
    {
        return isset(self::$phpDeprecated[$function]) ? self::$phpDeprecated[$function] : null;
    }

    /** Texte de remplacement pour une directive INI disparue. */
    public static function phpRemovedIniHint($directive)
    {
        return isset(self::$phpRemovedIni[$directive]) ? self::$phpRemovedIni[$directive] : null;
    }

    /** Version de PrestaShop qui a supprimé une table, ou null si elle existe encore. */
    public static function sqlRemovedTable($table)
    {
        return isset(self::$sqlRemovedTables[$table]) ? self::$sqlRemovedTables[$table] : null;
    }

    /** Colonnes supprimées d'une table, ou null si la table est intacte. */
    public static function sqlRemovedColumns($table)
    {
        return isset(self::$sqlRemovedColumns[$table]) ? self::$sqlRemovedColumns[$table] : null;
    }

    /** Explication associée à un motif Smarty retiré. */
    public static function smartyRemoved($construct)
    {
        return isset(self::$smartyRemoved[$construct]) ? self::$smartyRemoved[$construct] : null;
    }

    /** Tableau complet des constructions Smarty surveillées. */
    public static function smartyRemovedAll()
    {
        return self::$smartyRemoved;
    }

    /** Tableau des règles JavaScript retirées. */
    public static function jsRemoved()
    {
        return self::$jsRemoved;
    }

    /** Motif ou seuil nommé. */
    public static function pattern($name)
    {
        return isset(self::$patterns[$name]) ? self::$patterns[$name] : null;
    }

    /** Fichiers attendus dans un module. */
    public static function expectedFiles()
    {
        return self::$expectedFiles;
    }

    /** Fichiers qui ne devraient pas être livrés. */
    public static function exposedFiles()
    {
        return self::$exposedFiles;
    }

    /** Dossiers d'ancienne génération. */
    public static function legacyDirs()
    {
        return self::$legacyDirs;
    }

    /** Liste des fichiers de surcharge effectivement chargés. */
    public static function loadedOverrides()
    {
        return self::$loadedOverrides;
    }

    /**
     * Motifs d'exclusion appliqués d'office pendant le parcours des fichiers.
     * Ils évitent de signaler du bruit : fichiers minifiés, index.php de
     * protection, dépendances et fichiers de l'éditeur.
     *
     * @return array Liste de motifs de type glob.
     */
    public static function defaultIgnorePatterns()
    {
        return [
            '*.min.js',
            'index.php',
            '*/index.php',
            '*/vendor/*',
            '*/node_modules/*',
            '*/.git/*',
            '*/.idea/*',
            '*/.vscode/*',
        ];
    }
}
