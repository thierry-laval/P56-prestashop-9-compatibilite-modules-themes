<?php
/**
 * Moteur d'analyse de compatibilité PrestaShop 9
 *
 * Le scanner parcourt les fichiers d'un module, applique les règles du catalogue
 * Ps9Rules et produit une liste de constats. Chaque constat porte un identifiant
 * de règle stable, ce qui permet de comparer deux rapports entre deux versions
 * du même module, ou entre deux modules.
 *
 * Les analyseurs sont séparés par type de fichier : PHP (tokenizer et table de
 * symboles), Smarty, JavaScript, SQL, config.xml, puis un contrôle structurel
 * global. Aucun code n'est exécuté depuis le module analysé : les fichiers sont
 * uniquement lus et découpés en tokens.
 *
 * @author    Thierry Laval <https://thierrylaval.dev/>
 * @copyright 2007-2026 Thierry Laval
 * @license   http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 * @version   2.0.0
 * @package   Ps9Compatible
 */

final class Ps9Scanner
{
    /** @var array Base de connaissances PrestaShop, chargée depuis data/removed-api.php. */
    private $knowledge;

    /** @var array Constats produits, indexés pour éviter les doublons. */
    private $findings = [];

    /** @var string Racine absolue du module analysé. */
    private $root;

    /** @var string Chemin affiché à la place de la racine, en mode web. */
    private $rootLabel;

    /** @var bool Analyser aussi le dossier vendor/. */
    private $includeVendor;

    /** @var int Nombre de fichiers réellement analysés. */
    private $scanned = 0;

    /** @var int Nombre de fichiers restitués depuis le cache. */
    private $cached = 0;

    /** @var array Informations d'en-tête du module. */
    private $module = [
        'name' => null,
        'version' => null,
        'author' => null,
        'compliancy' => null,
        'php_min' => null,
        'ps_min' => null,
        'ps_max' => null,
    ];

    /** @var array Motifs de fichiers à ignorer, fournis par la ligne de commande. */
    private $ignorePatterns = [];

    /**
     * @var string Type de cible analysée : 'module', 'theme', ou 'auto'.
     *              'auto' est resolu au premier appel de targetType().
     */
    private $targetType = 'auto';

    /** @var string Type reellement detecte (module ou theme), une fois resolu. */
    private $resolvedType = null;

    /** @var Ps9Cache|null Cache de fichiers. */
    private $cache;

    /** @var array Journal d'analyse, utilisé par --stats. */
    private $log = [];

    /**
     * @param array       $knowledge     Base de connaissances PrestaShop.
     * @param string      $root          Racine absolue du module.
     * @param bool        $includeVendor Analyser aussi vendor/.
     * @param Ps9Cache|null $cache       Cache de fichiers, ou null.
     * @param string      $rootLabel     Libellé affiché pour la racine.
     */
    public function __construct(array $knowledge, $root, $includeVendor = false, $cache = null, $rootLabel = null)
    {
        $this->knowledge = $knowledge;
        $this->root = rtrim(str_replace('\\', '/', $root), '/');
        $this->includeVendor = (bool) $includeVendor;
        $this->cache = $cache;
        $this->rootLabel = $rootLabel === null ? $this->root : $rootLabel;
        $this->ignorePatterns = Ps9Rules::defaultIgnorePatterns();
    }

    /**
     * Ajoute un motif d'exclusion supplémentaire.
     *
     * @param string $pattern Motif de type glob, par exemple les fichiers de tests.
     */
    public function addIgnorePattern($pattern)
    {
        $pattern = trim($pattern);
        if ($pattern !== '') {
            $this->ignorePatterns[] = $pattern;
        }
    }

    /**
     * Force le type de cible (module ou theme) au lieu de le detecter.
     *
     * @param string $type 'auto', 'module' ou 'theme'.
     */
    public function setTargetType($type)
    {
        $type = strtolower(trim((string) $type));
        if (!in_array($type, ['auto', 'module', 'theme'], true)) {
            $type = 'auto';
        }
        $this->targetType = $type;
        $this->resolvedType = null;
    }

    /**
     * Indique si la cible analysee est un theme (et non un module).
     *
     * Detection automatique : un theme PrestaShop livre toujours un fichier
     * theme.yml (dans config/ ou a la racine) et un dossier templates/.
     * Si le type a ete force via --type, la detection est court-circuitee.
     *
     * @return bool
     */
    public function targetType()
    {
        if ($this->resolvedType !== null) {
            return $this->resolvedType === 'theme';
        }
        if ($this->targetType === 'module' || $this->targetType === 'theme') {
            $this->resolvedType = $this->targetType;
            return $this->resolvedType === 'theme';
        }

        // Detection automatique : on combine des marqueurs forts (theme.yml,
        // templates/) avec l'absence de marqueurs de module (config.xml,
        // fichier PHP portant le meme nom que le dossier racine).
        $hasThemeYml = file_exists($this->root . '/config/theme.yml')
            || file_exists($this->root . '/theme.yml');
        $hasTemplates = is_dir($this->root . '/templates');
        $hasConfigXml = file_exists($this->root . '/config.xml');
        $hasModulePhp = false;
        foreach ((array) @scandir($this->root) as $entry) {
            if ($entry === '.' || $entry === '..') {
                continue;
            }
            if (is_file($this->root . '/' . $entry)
                && strtolower(pathinfo($entry, PATHINFO_EXTENSION)) === 'php'
                && strtolower(pathinfo($entry, PATHINFO_FILENAME)) === strtolower(basename($this->root))) {
                $hasModulePhp = true;
                break;
            }
        }

        $looksLikeTheme = ($hasThemeYml || $hasTemplates) && !$hasConfigXml && !$hasModulePhp;
        $this->resolvedType = $looksLikeTheme ? 'theme' : 'module';

        return $this->resolvedType === 'theme';
    }

    /**
     * Analyse l'ensemble des fichiers du module.
     *
     * @return array Liste des constats, triée par gravité, fichier et ligne.
     */
    public function run()
    {
        foreach ($this->collectFiles() as $relativePath => $absolutePath) {
            $content = @file_get_contents($absolutePath);
            if ($content === false) {
                continue;
            }

            // config.xml renseigne les metadonnees du module ($this->module),
            // dont dependent des controles globaux (checkCompliancy). Le servir
            // depuis le cache sauterait scanConfigXml() et ferait disparaitre le
            // constat sur la borne <max> : on l'analyse donc systematiquement.
            $isConfigXml = strtolower(basename($relativePath)) === 'config.xml';

            $cachedEntry = (!$isConfigXml && $this->cache)
                ? $this->cache->get($relativePath, $content)
                : null;
            if ($cachedEntry !== null) {
                ++$this->cached;
                foreach ($cachedEntry['findings'] as $finding) {
                    $this->restore($finding);
                }
                continue;
            }
            ++$this->scanned;
            $before = count($this->findings);
            $this->dispatch($relativePath, $content);
            if ($this->cache && !$isConfigXml) {
                $this->cache->put($relativePath, $content, array_slice($this->findings, $before));
            }
        }

        if ($this->targetType()) {
            // Theme : les controles structurels de module (config.xml, fichiers
            // racine attendus) ne s'appliquent pas. On leur substitue la grille
            // de controle propre aux themes.
            $this->checkThemeStructure();
        } else {
            $this->checkStructure();
            $this->checkCompliancy();
        }
        $this->sortFindings();
        if ($this->cache) {
            $this->cache->save();
        }

        return array_values($this->findings);
    }

    /**
     * Répartit un fichier vers l'analyseur correspondant à son extension.
     *
     * @param string $relativePath Chemin relatif du fichier.
     * @param string $content      Contenu brut.
     */
    private function dispatch($relativePath, $content)
    {
        $extension = strtolower(pathinfo($relativePath, PATHINFO_EXTENSION));
        $base = strtolower(basename($relativePath));

        if ($extension === 'php') {
            $this->scanPhp($relativePath, $content);

            return;
        }
        if ($extension === 'tpl') {
            $this->scanTemplate($relativePath, $content);

            return;
        }
        if ($extension === 'js') {
            $this->scanJavascript($relativePath, $content);

            return;
        }
        if ($extension === 'sql') {
            $this->scanSql($relativePath, $content);

            return;
        }
        if ($base === 'config.xml') {
            // Seul le config.xml de la RACINE definit le module. Un config.xml
            // trouve dans dependencies/modules/... appartient a un module
            // embarque : ses metadonnees ne doivent pas devenir celles de la
            // cible analysee (sinon un theme est pris pour le module embarque).
            if (strpos($relativePath, '/') === false) {
                $this->scanConfigXml($relativePath, $content);
            }

            return;
        }
        if ($base === 'php.ini' || $base === '.user.ini') {
            $this->scanIniFile($relativePath, $content);
        }
    }

    /**
     * Inventorie les fichiers analysables, en respectant les exclusions.
     *
     * @return array Tableau associatif : chemin relatif => chemin absolu, trié.
     */
    private function collectFiles()
    {
        $files = [];
        if (!is_dir($this->root)) {
            return $files;
        }
        $iterator = new RecursiveIteratorIterator(
            new RecursiveCallbackFilterIterator(
                new RecursiveDirectoryIterator($this->root, FilesystemIterator::SKIP_DOTS),
                function (SplFileInfo $file) {
                    $name = $file->getFilename();
                    if ($file->isDir()) {
                        if (in_array($name, Ps9Rules::pattern('excluded_dirs'), true)) {
                            return false;
                        }
                        if ($name === 'vendor' && !$this->includeVendor) {
                            return false;
                        }

                        return true;
                    }
                    if (preg_match(Ps9Rules::pattern('minified_js'), $name)) {
                        return false;
                    }

                    return (bool) preg_match('/\.(php|tpl|js|sql)$|^config\.xml$|^\.?user\.ini$|^php\.ini$/i', $name);
                }
            )
        );
        foreach ($iterator as $file) {
            $absolute = str_replace('\\', '/', $file->getPathname());
            $relative = ltrim(substr($absolute, strlen($this->root)), '/');
            if ($relative === '') {
                continue;
            }
            if ($this->isIgnored($relative)) {
                continue;
            }
            $files[$relative] = $absolute;
        }
        ksort($files);

        return $files;
    }

    /**
     * Indique si un chemin correspond à un motif d'exclusion.
     *
     * @param  string $relativePath Chemin relatif.
     * @return bool Vrai si le fichier doit être ignoré.
     */
    private function isIgnored($relativePath)
    {
        foreach ($this->ignorePatterns as $pattern) {
            if (fnmatch($pattern, $relativePath) || fnmatch($pattern, '/' . $relativePath)) {
                return true;
            }
            if (strpos($pattern, '**') === 0) {
                $tail = ltrim(substr($pattern, 2), '/');
                if (fnmatch($tail, basename($relativePath))) {
                    return true;
                }
            }
        }

        return false;
    }

    /* ------------------------------------------------------------------ */
    /* Analyse PHP                                                        */
    /* ------------------------------------------------------------------ */

    /**
     * Analyse un fichier PHP : table de symboles, classes, méthodes, fonctions,
     * hooks, surcharges et directives INI.
     *
     * @param string $relativePath Chemin relatif du fichier.
     * @param string $content      Contenu brut.
     */
    private function scanPhp($relativePath, $content)
    {
        $tokens = $this->tokenize($content);
        if ($tokens === null) {
            return;
        }
        $table = new Ps9SymbolTable($tokens, $relativePath);

        // 1. Classes référencées : instanciation, appel statique, héritage.
        foreach ($table->references() as $reference) {
            $this->checkClassReference($reference['name'], $relativePath, $reference['line'], $reference['context']);
        }

        // 2. Surcharges de méthodes du core qui n'existent plus.
        if (preg_match('#(^|/)override/#', $relativePath)) {
            foreach ($table->declaredClasses() as $className) {
                $definition = $table->classDefinition($className);
                if ($definition === null || $definition['parent'] === '') {
                    continue;
                }
                $this->checkOverride($definition, $relativePath);
            }
        }

        // 3. Appels de méthodes et de fonctions, et constantes du core.
        $this->scanPhpCalls($tokens, $table, $relativePath);

        // 4. Hooks enregistrés dans install() et uninstall().
        foreach ($table->hooks() as $hook) {
            if (isset($this->knowledge['index_hooks'][strtolower($hook['name'])])) {
                $info = $this->knowledge['index_hooks'][strtolower($hook['name'])];
                $this->add(
                    'removed-hook',
                    $relativePath,
                    $hook['line'],
                    sprintf(
                        'Le hook %s a été supprimé en PrestaShop %s : il ne sera jamais appelé.',
                        $info['name'],
                        $info['version']
                    ),
                    'Supprimer l\'enregistrement, ou utiliser le hook qui le remplace dans PrestaShop 9.'
                );
            }
        }

        // 5. Directives INI supprimées, dans les appels ini_set() du module.
        $this->scanIniCalls($relativePath, $content);
    }

    /**
     * Découpe le code en tokens exploitables, en supprimant espaces et commentaires.
     *
     * @param  string $content Contenu du fichier.
     * @return array|null Liste de tokens, ou null si le contenu n'est pas exploitable.
     */
    private function tokenize($content)
    {
        if (function_exists('token_get_all')) {
            $raw = @token_get_all($content);
        } else {
            $raw = null;
        }
        if (!$raw) {
            // Repli sans tokenizer : on analyse le fichier comme du texte brut.
            return null;
        }
        $tokens = [];
        $line = 1;
        foreach ($raw as $token) {
            if (is_array($token)) {
                $line = $token[2];
                if (in_array($token[0], [T_WHITESPACE, T_COMMENT, T_DOC_COMMENT], true)) {
                    continue;
                }
                $tokens[] = ['id' => $token[0], 'text' => $token[1], 'line' => $token[2]];
                continue;
            }
            $tokens[] = ['id' => null, 'text' => $token, 'line' => $line];
        }

        return $tokens;
    }

    /**
     * Vérifie si une classe référencée fait partie des classes supprimées du core.
     *
     * @param string $name    Nom de classe, éventuellement complet.
     * @param string $file    Chemin relatif du fichier.
     * @param int    $line    Ligne de la référence.
     * @param string $context Type d'usage, pour le message.
     */
    private function checkClassReference($name, $file, $line, $context)
    {
        $name = ltrim($name, '\\');
        if ($name === '') {
            return;
        }
        $candidates = [$name];
        // Les classes du core sont souvent préfixées par leur namespace : on teste
        // le nom court en plus du nom complet, qui est celui inscrit dans la base.
        $short = substr($name, strrpos($name, '\\') === false ? 0 : strrpos($name, '\\') + 1);
        if ($short !== $name) {
            $candidates[] = $short;
        }
        foreach ($candidates as $candidate) {
            $lower = strtolower($candidate);
            if (!isset($this->knowledge['index_classes'][$lower])) {
                continue;
            }
            $info = $this->knowledge['index_classes'][$lower]['entry'];
            $this->add(
                'removed-class',
                $file,
                $line,
                sprintf(
                    'La classe %s a été supprimée en PrestaShop %s (%s).',
                    $candidate,
                    $info[0],
                    $this->describeContext($context)
                ),
                Ps9Rules::hintForClass($candidate)
            );

            return;
        }
    }

    /**
     * Détecte les surcharges mortes : une méthode redéfinie dans override/ dont
     * la méthode d'origine n'existe plus dans le core de PrestaShop 9.
     *
     * @param array  $definition Définition de classe issue de la table de symboles.
     * @param string $file       Chemin relatif du fichier.
     */
    private function checkOverride(array $definition, $file)
    {
        $parent = $definition['parent'];
        if ($parent === '') {
            return;
        }
        $parentShort = substr($parent, strrpos($parent, '\\') === false ? 0 : strrpos($parent, '\\') + 1);
        $parentKey = strtolower($parentShort);

        // Convention PrestaShop : un override ecrit
        // « class Address extends AddressCore », alors que la base de
        // connaissances indexe la classe du core sous son nom public,
        // « address ». Il faut donc RETIRER le suffixe "core", et non l'ajouter
        // (l'ancien calcul produisait « addresscorecore », qui n'existe nulle
        // part : aucune surcharge morte n'etait jamais signalee).
        $keys = [$parentKey];
        if (substr($parentKey, -4) === 'core') {
            $keys[] = substr($parentKey, 0, -4);
        }

        foreach ($definition['methods'] as $method => $meta) {
            $removed = null;
            foreach ($keys as $key) {
                if (isset($this->knowledge['index_methods'][$key][$method])) {
                    $removed = $this->knowledge['index_methods'][$key][$method]['entry'];
                    break;
                }
            }
            if ($removed === null) {
                continue;
            }
            $version = is_array($removed) ? $removed[2] : '9.0';
            $this->add(
                'override-removed-method',
                $file,
                $meta['line'],
                sprintf(
                    'La surcharge de %s::%s() est sans effet : la méthode a été supprimée en PrestaShop %s.',
                    $parentShort,
                    // $method est la cle minuscule ; on restitue le nom tel
                    // qu'ecrit dans le code quand il est disponible.
                    isset($meta['real']) ? $meta['real'] : $method,
                    $version
                ),
                'Supprimer la méthode de la surcharge, ou la remplacer par le hook correspondant.'
            );
        }
    }

    /**
     * Parcourt les tokens pour repérer les appels de méthodes, les appels de
     * fonctions globales, les constantes et les constructions de classe.
     *
     * @param array            $tokens Tokens du fichier.
     * @param Ps9SymbolTable   $table  Table de symboles du fichier.
     * @param string           $file   Chemin relatif.
     */
    private function scanPhpCalls(array $tokens, Ps9SymbolTable $table, $file)
    {
        $count = count($tokens);
        for ($i = 0; $i < $count; ++$i) {
            $token = $tokens[$i];
            if ($token['id'] !== T_STRING) {
                continue;
            }
            $next = isset($tokens[$i + 1]) ? $tokens[$i + 1] : null;
            $prev = isset($tokens[$i - 1]) ? $tokens[$i - 1] : null;
            $text = $token['text'];
            $lower = strtolower($text);

            // Membre statique : Class::membre. Deux cas a distinguer, car une
            // methode est suivie de « ( » alors qu'une constante ne l'est pas :
            //   Cart::getProducts()      -> methode
            //   Cart::ONLY_PRODUCTS      -> constante
            if ($next !== null && $next['id'] === T_DOUBLE_COLON && isset($tokens[$i + 2]) && $tokens[$i + 2]['id'] === T_STRING) {
                $member = $tokens[$i + 2]['text'];
                $afterMember = isset($tokens[$i + 3]) ? $tokens[$i + 3] : null;
                $isCall = $afterMember !== null && $afterMember['text'] === '(';

                if ($isCall) {
                    $this->checkStaticCall($text, $member, $file, $tokens[$i + 2]['line'], $tokens, $i);
                } else {
                    $this->checkStaticConstant($text, $member, $file, $tokens[$i + 2]['line']);
                }
                continue;
            }

            // Appels de méthode d'objet : ->method().
            if ($prev !== null && ($prev['id'] === T_OBJECT_OPERATOR || (defined('T_NULLSAFE_OBJECT_OPERATOR') && $prev['id'] === T_NULLSAFE_OBJECT_OPERATOR))) {
                $this->checkMethodCall($tokens, $i, $table, $file);
                continue;
            }

            // Appels de fonction globale : fonction(.
            if ($next !== null && $next['text'] === '(') {
                $isCall = $prev === null || !in_array($prev['id'], [T_OBJECT_OPERATOR, T_DOUBLE_COLON, T_FUNCTION, T_NEW, T_CONST, T_NS_SEPARATOR], true);
                if ($isCall) {
                    $this->checkFunctionCall($text, $file, $token['line']);
                }
                continue;
            }

            // Constantes du core référencées sans préfixe de classe.
            if ($next !== null && ($next['id'] === T_DOUBLE_COLON)) {
                continue;
            }
            // Constante du core utilisee sans prefixe de classe (ex. un nom de
            // constante globale importe). L'index plat associe le nom de la
            // constante a la classe qui la portait et a la version de retrait.
            if (strtoupper($text) === $text && strlen($text) > 3 && isset($this->knowledge['index_const_names'][$lower])) {
                $info = $this->knowledge['index_const_names'][$lower];
                $this->add(
                    'removed-constant',
                    $file,
                    $token['line'],
                    sprintf(
                        'La constante %s::%s a été supprimée en PrestaShop %s.',
                        $info['class'],
                        $info['name'],
                        $info['version']
                    ),
                    'Vérifier la valeur de remplacement dans le code source de PrestaShop 9.'
                );
            }
        }
    }

    /**
     * Vérifie un appel statique de type Classe::methode().
     *
     * @param string $class      Nom de classe écrit dans le code.
     * @param string $method     Nom de la méthode appelée.
     * @param string $file       Chemin relatif.
     * @param int    $line       Ligne de l'appel.
     * @param array  $tokens     Liste complète des tokens.
     * @param int    $index      Index du nom de classe dans la liste.
     */
    private function checkStaticCall($class, $method, $file, $line, array $tokens, $index)
    {
        if (in_array(strtolower($class), ['self', 'static', 'parent'], true)) {
            return;
        }
        $this->checkRemovedMethod($class, $method, $file, $line);
        $this->checkRemovedClass($class, $file, $line, 'static');
    }

    /**
     * Verifie une constante de classe du core : Class::CONSTANTE.
     *
     * @param string $class    Nom de classe ecrit dans le code.
     * @param string $constant Nom de la constante.
     * @param string $file     Chemin relatif.
     * @param int    $line     Ligne de la reference.
     */
    private function checkStaticConstant($class, $constant, $file, $line)
    {
        $classKey = strtolower(ltrim($class, '\\'));
        $constKey = strtolower($constant);
        if (!isset($this->knowledge['index_consts'][$classKey][$constKey])) {
            return;
        }
        $info = $this->knowledge['index_consts'][$classKey][$constKey];
        $this->add(
            'removed-constant',
            $file,
            $line,
            sprintf(
                'La constante %s::%s a été supprimée en PrestaShop %s.',
                $class,
                $info['name'],
                $info['version']
            ),
            'Vérifier la valeur de remplacement dans le code source de PrestaShop 9.'
        );
    }

    /**
     * Vérifie un appel de méthode sur un objet : $objet->methode().
     * La classe de l'objet n'étant pas connue de façon fiable, on s'appuie sur
     * le nom de la méthode seule, en s'assurant qu'il est unique dans le core.
     *
     * @param array          $tokens Tokens du fichier.
     * @param int            $index  Index du nom de méthode dans la liste.
     * @param Ps9SymbolTable $table  Table de symboles du fichier.
     * @param string         $file   Chemin relatif.
     */
    private function checkMethodCall(array $tokens, $index, Ps9SymbolTable $table, $file)
    {
        $method = strtolower($tokens[$index]['text']);
        $line = $tokens[$index]['line'];

        // La méthode est-elle écrite par le module lui-même ?
        foreach ($table->declaredClasses() as $className) {
            if ($table->hasOwnMethod($className, $method)) {
                return;
            }
        }
        if (!isset($this->knowledge['index_unique_methods'][$method])) {
            return;
        }
        $info = $this->knowledge['index_unique_methods'][$method];
        if (is_array($info) && isset($info[0]) && $info[0] === true) {
            // La méthode existe encore dans le core : aucun constat.
            return;
        }
        $owners = is_array($info) && isset($info[0]) ? $info[0] : 'une classe du core';
        $version = is_array($info) && isset($info[2]) ? $info[2] : '9.0';
        $this->add(
            'removed-method-name',
            $file,
            $line,
            sprintf(
                'L\'appel ->%s() vise une méthode supprimée du core PrestaShop %s (définie à l\'origine par %s). Vérifier sur quel objet l\'appel est fait.',
                $tokens[$index]['text'],
                $version,
                $owners
            ),
            Ps9Rules::hintForMethod($owners, $method)
        );
    }

    /**
     * Signale une méthode supprimée pour une classe identifiée de façon certaine.
     *
     * @param string $class  Nom de classe.
     * @param string $method Nom de méthode.
     * @param string $file   Chemin relatif.
     * @param int    $line   Ligne de l'appel.
     */
    private function checkRemovedMethod($class, $method, $file, $line)
    {
        $short = substr($class, strrpos($class, '\\') === false ? 0 : strrpos($class, '\\') + 1);
        $key = strtolower($short);
        $candidates = [$key, $key . 'core'];
        foreach ($candidates as $candidate) {
            if (!isset($this->knowledge['index_methods'][$candidate][strtolower($method)])) {
                continue;
            }
            $info = $this->knowledge['index_methods'][$candidate][strtolower($method)]['entry'];
            $version = is_array($info) && isset($info[2]) ? $info[2] : '9.0';
            $this->add(
                'removed-method',
                $file,
                $line,
                sprintf(
                    '%s::%s() a été supprimée en PrestaShop %s.',
                    $short,
                    $method,
                    $version
                ),
                Ps9Rules::hintForMethod($short, $method)
            );

            return;
        }
    }

    /**
     * Signale une classe du core supprimée, pour une référence identifiée.
     *
     * @param string $class   Nom de classe.
     * @param string $file    Chemin relatif.
     * @param int    $line    Ligne de la référence.
     * @param string $context Type d'usage.
     */
    private function checkRemovedClass($class, $file, $line, $context)
    {
        $short = substr($class, strrpos($class, '\\') === false ? 0 : strrpos($class, '\\') + 1);
        $lower = strtolower($short);
        if (!isset($this->knowledge['index_classes'][$lower])) {
            return;
        }
        $info = $this->knowledge['index_classes'][$lower]['entry'];
        $this->add(
            'removed-class',
            $file,
            $line,
            sprintf(
                'La classe %s a été supprimée en PrestaShop %s (%s).',
                $short,
                $info[0],
                $this->describeContext($context)
            ),
            Ps9Rules::hintForClass($short)
        );
    }

    /**
     * Vérifie si une fonction globale est supprimée ou dépréciée en PHP 8.
     *
     * @param string $function Nom de la fonction appelée.
     * @param string $file     Chemin relatif.
     * @param int    $line     Ligne de l'appel.
     */
    private function checkFunctionCall($function, $file, $line)
    {
        $lower = strtolower($function);
        $hint = Ps9Rules::phpRemovedHint($lower);
        if ($hint !== null) {
            $this->add(
                'php-removed-function',
                $file,
                $line,
                sprintf('La fonction %s() a été supprimée en PHP 8.0. PrestaShop 9 exige PHP 8.1 ou supérieur.', $function),
                $hint
            );

            return;
        }
        $hint = Ps9Rules::phpDeprecatedHint($lower);
        if ($hint !== null) {
            $this->add(
                'php-deprecated-function',
                $file,
                $line,
                sprintf('La fonction %s() est dépréciée depuis PHP 8.1 ou 8.2 : elle fonctionne encore mais remplit les logs.', $function),
                $hint
            );
        }
    }

    /**
     * Analyse les appels ini_set() et ini_get() pour repérer les directives disparues.
     *
     * @param string $file    Chemin relatif.
     * @param string $content Contenu brut.
     */
    private function scanIniCalls($file, $content)
    {
        if (!preg_match_all(Ps9Rules::pattern('php_ini_call'), $content, $matches, PREG_OFFSET_CAPTURE)) {
            return;
        }
        foreach ($matches[1] as $match) {
            $directive = strtolower($match[0]);
            $hint = Ps9Rules::phpRemovedIniHint($directive);
            if ($hint === null) {
                continue;
            }
            $line = substr_count(substr($content, 0, $match[1]), "\n") + 1;
            $this->add(
                'php-removed-ini',
                $file,
                $line,
                sprintf('La directive %s a été supprimée de PHP 8 : l\'appel est sans effet.', $directive),
                $hint
            );
        }
    }

    /**
     * Analyse un fichier .user.ini ou php.ini livré avec le module.
     *
     * @param string $file    Chemin relatif.
     * @param string $content Contenu brut.
     */
    private function scanIniFile($file, $content)
    {
        if (!preg_match_all(Ps9Rules::pattern('php_ini_directive_file'), $content, $matches, PREG_OFFSET_CAPTURE)) {
            return;
        }
        foreach ($matches[1] as $match) {
            $directive = strtolower($match[0]);
            $hint = Ps9Rules::phpRemovedIniHint($directive);
            if ($hint === null) {
                continue;
            }
            $line = substr_count(substr($content, 0, $match[1]), "\n") + 1;
            $this->add(
                'php-removed-ini',
                $file,
                $line,
                sprintf('La directive %s est déclarée alors qu\'elle n\'existe plus en PHP 8.', $directive),
                $hint
            );
        }
    }

    /* ------------------------------------------------------------------ */
    /* Analyse Smarty                                                     */
    /* ------------------------------------------------------------------ */

    /**
     * Analyse un template Smarty : balises supprimées, sortie non filtrée,
     * chemins de thème figés, et balises PHP résiduelles.
     *
     * @param string $file    Chemin relatif.
     * @param string $content Contenu brut.
     */
    private function scanTemplate($file, $content)
    {
        // Les commentaires Smarty {* ... *} sont neutralisés avant l'analyse ligne
        // par ligne, sinon une construction citée en exemple serait signalée à tort.
        // Les retours à la ligne sont conservés pour que la numérotation reste juste.
        $content = preg_replace_callback('/\{\*.*?\*\}/s', function ($match) {
            return preg_replace('/[^\r\n]/', ' ', $match[0]);
        }, $content);
        $lines = preg_split('/\R/', $content);
        foreach ($lines as $index => $line) {
            $number = $index + 1;
            if (preg_match(Ps9Rules::pattern('tpl_php_tag'), $line)) {
                $this->add(
                    'tpl-php-tag',
                    $file,
                    $number,
                    'Le template contient une balise {php} : elle n\'est plus compilée par le build Smarty de PrestaShop 9.',
                    'Déplacer la logique dans le contrôleur ou dans un plugin Smarty du module.'
                );
            }
            if (preg_match(Ps9Rules::pattern('tpl_nofilter'), $line)) {
                $this->add(
                    'tpl-nofilter',
                    $file,
                    $number,
                    'Sortie de variable sans filtre (nofilter) : risque d\'injection HTML signalé lors de la validation Addons.',
                    'Retirer nofilter, ou ajouter le filtre d\'échappement adapté : |escape:\'html\'.'
                );
            }
            if (preg_match(Ps9Rules::pattern('smarty_include_theme'), $line)) {
                $this->add(
                    'tpl-theme-path',
                    $file,
                    $number,
                    'L\'inclusion s\'appuie sur $tpl_dir, dont la valeur dépend du thème actif. Sur Hummingbird, le chemin peut ne plus correspondre.',
                    'Inclure le template par un chemin relatif au module : {include file=\'module:monmodule/views/templates/...\'}.'
                );
            }
            foreach (Ps9Rules::smartyRemovedAll() as $construct => $explanation) {
                if (stripos($line, $construct) !== false) {
                    $this->add(
                        'tpl-removed-modifier',
                        $file,
                        $number,
                        sprintf('La construction Smarty %s est surveillée : %s', $construct, $explanation),
                        'Réécrire la portion de template avec les balises prises en charge par PrestaShop 9.'
                    );
                }
            }

            // Spécifique thème : une traduction {l s='...'} sans domaine d= est
            // dépréciée. On ne le signale que sur un thème, car dans un module la
            // convention de domaine diffère (le domaine est souvent omis).
            if ($this->targetType() && preg_match('/\{l\s+s=["\'][^"\']*["\'](?![^}]*\bd=)/i', $line)) {
                $this->add(
                    'tpl-translation-missing-domain',
                    $file,
                    $number,
                    'Traduction Smarty {l} sans domaine d= : déprécié dans les thèmes PrestaShop 9.',
                    'Ajouter le domaine : {l s=\'...\' d=\'Shop.Theme\'}.'
                );
            }
        }
    }

    /* ------------------------------------------------------------------ */
    /* Analyse JavaScript                                                 */
    /* ------------------------------------------------------------------ */

    /**
     * Analyse un fichier JavaScript : API retirées, dépendance à jQuery et
     * points d'entrée historiques supprimés.
     *
     * @param string $file    Chemin relatif.
     * @param string $content Contenu brut.
     */
    private function scanJavascript($file, $content)
    {
        // Les commentaires sont neutralisés avant analyse pour éviter de signaler
        // du code mort cité en exemple, comme dans l'ancien scanner.
        $cleaned = preg_replace('#/\*.*?\*/#s', '', $content);
        $cleaned = preg_replace('#(^|[^:])//[^\n]*#', '$1', $cleaned);
        $lines = preg_split('/\R/', $cleaned);
        foreach (Ps9Rules::jsRemoved() as $id => $rule) {
            foreach ($lines as $index => $line) {
                if (preg_match($rule['pattern'], $line)) {
                    $this->add(
                        'js-legacy-api',
                        $file,
                        $index + 1,
                        $rule['message'],
                        $rule['hint']
                    );
                }
            }
        }
        if (preg_match('/\$\s*\(\s*document\s*\)\s*\.\s*ready|jQuery\s*\(/', $content)) {
            $this->add(
                'js-jquery-removed',
                $file,
                1,
                'Le script s\'appuie sur jQuery, qui n\'est plus chargé par défaut dans PrestaShop 9.',
                'Déclarer la dépendance dans le thème, ou réécrire le script en JavaScript natif.'
            );
        }
        if (preg_match('/prestashop\.blockcart\.showModal/', $content)) {
            $this->add(
                'js-blockcart-modal',
                $file,
                1,
                'L\'appel à prestashop.blockcart.showModal dépend du thème classic : sur Hummingbird, le marquage de la modale a changé.',
                'Remplacer par l\'événement updateCart ou par la modale fournie par le thème actif.'
            );
        }

        // Spécifique thème : API Bootstrap 4 abandonnée dans PrestaShop 9
        // (thème Hummingbird = Bootstrap 5). On signale les attributs et
        // appels JS propres à BS4, uniquement sur un thème.
        if ($this->targetType()) {
            foreach ($lines as $index => $line) {
                if (preg_match('/data-(?:toggle|target|dismiss|ride|slide)\s*=/', $line)
                    || preg_match('/\.(?:modal|tooltip|popover|dropdown|tab|collapse)\s*\(/', $line)
                    || preg_match('/\$\("\[data-slide/', $line)) {
                    $this->add(
                        'theme-js-bootstrap4',
                        $file,
                        $index + 1,
                        'Le script utilise l\'API Bootstrap 4 (data-toggle / .modal() / .tooltip()). PrestaShop 9 s\'appuie sur Bootstrap 5.',
                        'Migrer vers Bootstrap 5 : data-bs-toggle, new bootstrap.Modal(...), etc.'
                    );
                }
            }
        }
    }

    /* ------------------------------------------------------------------ */
    /* Analyse SQL                                                        */
    /* ------------------------------------------------------------------ */

    /**
     * Analyse un fichier SQL : tables supprimées, colonnes supprimées et
     * préfixe ps_ écrit en dur.
     *
     * @param string $file    Chemin relatif.
     * @param string $content Contenu brut.
     */
    private function scanSql($file, $content)
    {
        $lines = preg_split('/\R/', $content);
        foreach ($lines as $index => $line) {
            $number = $index + 1;
            if (preg_match(Ps9Rules::pattern('sql_prefix_literal'), $line, $match)) {
                $table = strtolower($match[1]);
                $version = Ps9Rules::sqlRemovedTable($table);
                if ($version !== null) {
                    $this->add(
                        'sql-removed-table',
                        $file,
                        $number,
                        sprintf('La table ps_%s a été supprimée en PrestaShop %s.', $table, $version),
                        'Adapter la requête au nouveau schéma, ou utiliser le service correspondant.'
                    );
                    continue;
                }
                $this->add(
                    'sql-prefix-hardcoded',
                    $file,
                    $number,
                    'Le préfixe de table ps_ est écrit en dur alors qu\'il est configurable.',
                    'Utiliser la constante _DB_PREFIX_ ou _MYSQL_ENGINE_ pour rester compatible avec tous les préfixes.'
                );
            }
        }
    }

    /* ------------------------------------------------------------------ */
    /* Analyse de config.xml                                              */
    /* ------------------------------------------------------------------ */

    /**
     * Analyse le fichier config.xml : bornes de compatibilité, hooks déclarés,
     * version PHP minimale et contrôleur historique.
     *
     * @param string $file    Chemin relatif.
     * @param string $content Contenu brut.
     */
    private function scanConfigXml($file, $content)
    {
        // Garde de securite : on ignore tout config.xml hors racine.
        if (strpos($file, '/') !== false) {
            return;
        }
        if ($this->module['name'] === null && preg_match('#<name>\s*(?:<!\[CDATA\[(.*?)\]\]>|(.*?))\s*</name>#s', $content, $match)) {
            $this->module['name'] = trim($match[1] !== '' ? $match[1] : $match[2]);
        }
        if ($this->module['version'] === null && preg_match('#<version>\s*(?:<!\[CDATA\[(.*?)\]\]>|(.*?))\s*</version>#s', $content, $match)) {
            $this->module['version'] = trim($match[1] !== '' ? $match[1] : $match[2]);
        }
        if ($this->module['author'] === null && preg_match('#<author>\s*(?:<!\[CDATA\[(.*?)\]\]>|(.*?))\s*</author>#s', $content, $match)) {
            $this->module['author'] = trim($match[1] !== '' ? $match[1] : $match[2]);
        }
        if (preg_match('#<max>\s*(?:<!\[CDATA\[(.*?)\]\]>|(.*?))\s*</max>#s', $content, $match)) {
            $this->module['ps_max'] = trim($match[1] !== '' ? $match[1] : $match[2]);
        }
        if (preg_match('#<min>\s*(?:<!\[CDATA\[(.*?)\]\]>|(.*?))\s*</min>#s', $content, $match)) {
            $this->module['ps_min'] = trim($match[1] !== '' ? $match[1] : $match[2]);
        }
        if (preg_match('#<php>\s*(?:<!\[CDATA\[(.*?)\]\]>|(.*?))\s*</php>#s', $content, $match)) {
            $this->module['php_min'] = trim($match[1] !== '' ? $match[1] : $match[2]);
        }

        // Hooks déclarés dans <hooks>.
        if (preg_match_all('#<hook>\s*(?:<!\[CDATA\[(.*?)\]\]>|(.*?))\s*</hook>#s', $content, $hooks)) {
            foreach ($hooks[1] as $index => $value) {
                $name = trim($value !== '' ? $value : $hooks[2][$index]);
                if ($name === '') {
                    continue;
                }
                if (isset($this->knowledge['index_hooks'][strtolower($name)])) {
                    $info = $this->knowledge['index_hooks'][strtolower($name)];
                    $this->add(
                        'config-hook',
                        $file,
                        1,
                        sprintf('Le module déclare le hook %s, supprimé en PrestaShop %s.', $name, $info['version']),
                        'Retirer le hook de config.xml et enregistrer le hook de remplacement.'
                    );
                }
            }
        }

        if (stripos($content, 'ajax.php') !== false) {
            $this->add(
                'config-legacy-controller',
                $file,
                1,
                'Le module référence ajax.php, supprimé en PrestaShop 9.',
                'Exposer un contrôleur frontal de module et l\'appeler par son URL.'
            );
        }
    }

    /* ------------------------------------------------------------------ */
    /* Contrôles structurels                                              */
    /* ------------------------------------------------------------------ */

    /**
     * Vérifie la cohérence du paquet livré : fichiers attendus absents, fichiers
     * qui ne devraient pas être distribués, dossiers d'ancienne génération.
     */
    private function checkStructure()
    {
        foreach (Ps9Rules::expectedFiles() as $name => $explanation) {
            if (!is_file($this->root . '/' . $name)) {
                $this->add(
                    'structure-missing-file',
                    $name,
                    0,
                    sprintf('Le fichier %s est absent du module. %s', $name, $explanation),
                    'Ajouter le fichier manquant avant de publier le module.'
                );
            }
        }
        foreach (Ps9Rules::exposedFiles() as $name => $explanation) {
            if (is_file($this->root . '/' . $name)) {
                $this->add(
                    'structure-exposed-file',
                    $name,
                    0,
                    sprintf('Le fichier %s ne devrait pas être livré avec le module. %s', $name, $explanation),
                    'Exclure ce fichier de l\'archive distribuée.'
                );
            }
        }
        foreach (Ps9Rules::legacyDirs() as $directory) {
            if (is_dir($this->root . '/' . $directory)) {
                $this->add(
                    'structure-legacy-dir',
                    $directory . '/',
                    0,
                    sprintf('Le dossier %s fait partie de l\'ancienne arborescence de PrestaShop.', $directory),
                    'Vérifier que son contenu est bien chargé par PrestaShop 9, sinon le déplacer.'
                );
            }
        }
    }

    /* ------------------------------------------------------------------ */
    /* Contrôles spécifiques aux thèmes                                   */
    /* ------------------------------------------------------------------ */

    /**
     * Contrôle structurel d'un thème PrestaShop.
     *
     * Un thème se reconnaît à son fichier theme.yml et à son dossier templates/.
     * On vérifie la présence des éléments structurants, puis on analyse theme.yml
     * (framework CSS, bibliothèques JS, etc.).
     */
    private function checkThemeStructure()
    {
        $themeYml = null;
        if (is_file($this->root . '/config/theme.yml')) {
            $themeYml = 'config/theme.yml';
        } elseif (is_file($this->root . '/theme.yml')) {
            $themeYml = 'theme.yml';
        }

        if ($themeYml === null) {
            $this->add(
                'theme-missing-theme-yml',
                'theme.yml',
                0,
                'Aucun fichier theme.yml n\'a été trouvé : ce dossier ne ressemble pas à un thème PrestaShop.',
                'Un thème PrestaShop doit fournir config/theme.yml (ou theme.yml à la racine).'
            );
        } else {
            $this->scanThemeYml($themeYml);
        }

        if (!is_dir($this->root . '/templates')) {
            $this->add(
                'theme-missing-templates',
                'templates/',
                0,
                'Le dossier templates/ est absent : les gabarits du thème ne seront pas trouvés par PrestaShop 9.',
                'Vérifier l\'arborescence du thème (templates/, assets/, modules/).'
            );
        }

        // Les layouts sont attendus par PrestaShop (page.tpl, layout-both-columns...).
        if (is_dir($this->root . '/templates/layouts') === false && is_dir($this->root . '/templates') === true) {
            $this->add(
                'theme-missing-layouts',
                'templates/layouts/',
                0,
                'Le dossier templates/layouts/ est absent : les gabarits de page par défaut manquent.',
                'Ajouter au moins layout-both-columns.tpl et layout-full-width.tpl.'
            );
        }
    }

    /**
     * Analyse theme.yml : framework CSS déclaré, bibliothèques JS abandonnées.
     *
     * @param string $file Chemin relatif du fichier theme.yml.
     */
    private function scanThemeYml($file)
    {
        $path = $this->root . '/' . $file;
        $content = @file_get_contents($path);
        if ($content === false) {
            return;
        }

        // Framework CSS : Bootstrap 4 est remplacé par Bootstrap 5 dans
        // PrestaShop 9 (thème Hummingbird). Le thème historique utilise BS4.
        if (preg_match('/framework:\s*["\']?([^"\'\r\n]+)/i', $content, $m)) {
            $framework = trim($m[1]);
            if (preg_match('/bootstrap[\s-]*v?4/i', $framework)) {
                $this->add(
                    'theme-bootstrap4',
                    $file,
                    0,
                    sprintf(
                        'Le thème déclare « %s » : PrestaShop 9 s\'appuie sur Bootstrap 5 (thème Hummingbird).',
                        $framework
                    ),
                    'Migrer les gabarits et le JS vers l\'API Bootstrap 5 (data-bs-*, classes bs-*).'
                );
            }
        }

        // Bibliothèques JS abandonnées, souvent embarquées dans les thèmes PS 1.7/8.
        $deprecatedLibs = [
            'owlCarousel' => 'Owl Carousel (non maintenu, remplacé par Splide/Swiper)',
            'owl.carousel' => 'Owl Carousel (non maintenu, remplacé par Splide/Swiper)',
            'jquery.easing' => 'jQuery Easing (dépendance jQuery historique)',
            'bootstrap-touch' => 'Bootstrap Touch Carousel (non maintenu)',
        ];
        foreach ($deprecatedLibs as $needle => $explanation) {
            if (stripos($content, $needle) !== false) {
                $this->add(
                    'theme-deprecated-lib',
                    $file,
                    0,
                    sprintf('Le thème référence la bibliothèque %s.', $explanation),
                    'Remplacer par une bibliothèque maintenue compatible PrestaShop 9.'
                );
            }
        }
    }

    /**
     * Vérifie les bornes de compatibilité déclarées : un module qui plafonne à
     * PrestaShop 8 est refusé par l'installateur de PrestaShop 9.
     */
    private function checkCompliancy()
    {
        $max = $this->module['ps_max'];
        if ($max === null) {
            return;
        }
        if (version_compare(preg_replace('/[^0-9.]/', '', $max), Ps9Rules::pattern('ps_version_target'), '<')) {
            $this->add(
                'compliancy',
                'config.xml',
                0,
                sprintf(
                    'La borne <max> de compatibilité est %s : l\'installateur de PrestaShop 9 refusera le module.',
                    $max
                ),
                'Élever la borne à 9.0.0 après avoir corrigé les incompatibilités détectées.'
            );
        }
        $php = $this->module['php_min'];
        if ($php !== null && version_compare(preg_replace('/[^0-9.]/', '', $php), Ps9Rules::pattern('php_version_required'), '<')) {
            $this->add(
                'config-php-version',
                'config.xml',
                0,
                sprintf(
                    'Le module déclare PHP %s minimum alors que PrestaShop 9 exige PHP %s.',
                    $php,
                    Ps9Rules::pattern('php_version_required')
                ),
                'Relever la version minimale de PHP déclarée dans config.xml.'
            );
        }
    }

    /* ------------------------------------------------------------------ */
    /* Constats                                                           */
    /* ------------------------------------------------------------------ */

    /**
     * Enregistre un constat, en ignorant les doublons stricts.
     *
     * @param string      $rule    Identifiant de règle, utilisé pour la gravité.
     * @param string      $file    Chemin relatif, préfixé du libellé de racine.
     * @param int         $line    Ligne concernée, 0 pour un constat global.
     * @param string      $message Message affiché.
     * @param string|null $hint    Piste de correction, ou null.
     */
    private function add($rule, $file, $line, $message, $hint = null)
    {
        $display = ($this->rootLabel === '' ? '' : $this->rootLabel . '/') . ltrim($file, '/');
        $key = $display . ':' . $line . ':' . $message;
        if (isset($this->findings[$key])) {
            return;
        }
        $this->findings[$key] = [
            'severity' => Ps9Rules::severity($rule),
            'rule' => $rule,
            'file' => $display,
            'line' => (int) $line,
            'message' => $message,
            'hint' => $hint,
        ];
    }

    /**
     * Restitue un constat issu du cache sans repasser par le calcul de gravité.
     *
     * @param array $finding Constat sérialisé.
     */
    private function restore(array $finding)
    {
        $key = $finding['file'] . ':' . $finding['line'] . ':' . $finding['message'];
        if (isset($this->findings[$key])) {
            return;
        }
        $this->findings[$key] = $finding;
    }

    /** Trie les constats par gravité, puis par fichier, puis par ligne. */
    private function sortFindings()
    {
        usort($this->findings, function (array $left, array $right) {
            $rank = Ps9Rules::rank($left['severity']) <=> Ps9Rules::rank($right['severity']);
            if ($rank !== 0) {
                return $rank;
            }
            $file = strcmp($left['file'], $right['file']);
            if ($file !== 0) {
                return $file;
            }

            return $left['line'] <=> $right['line'];
        });
    }

    /**
     * Traduit un contexte technique en formulation lisible.
     *
     * @param  string $context Contexte interne.
     * @return string Formulation affichée.
     */
    private function describeContext($context)
    {
        $labels = [
            'instantiation' => 'instanciation',
            'static' => 'appel statique',
            'extends' => 'héritage',
        ];

        return isset($labels[$context]) ? $labels[$context] : $context;
    }

    /* ------------------------------------------------------------------ */
    /* Accesseurs                                                         */
    /* ------------------------------------------------------------------ */

    /** Nombre de fichiers analysés (hors cache). */
    public function scannedCount()
    {
        return $this->scanned;
    }

    /** Nombre de fichiers restitués depuis le cache. */
    public function cachedCount()
    {
        return $this->cached;
    }

    /** Informations d'en-tête du module. */
    public function moduleInfo()
    {
        return $this->module;
    }

    /**
     * Charge la base de connaissances PrestaShop depuis un fichier PHP généré.
     *
     * @param  string $path Chemin du fichier de données.
     * @return array Base de connaissances, ou tableau vide si le fichier est absent.
     */
    public static function loadKnowledge($path)
    {
        if (!is_file($path) || !is_readable($path)) {
            return [];
        }
        $data = require $path;
        if (!is_array($data)) {
            return [];
        }
        $defaults = [
            'classes' => [],
            'methods' => [],
            'namespacedMethods' => [],
            'consts' => [],
            'hooks' => [],
            'extends' => [],
            'uniqueMethodNames' => [],
        ];
        $knowledge = array_merge($defaults, $data);

        // La base de connaissances est générée avec des clés qui respectent la
        // casse du code source : les méthodes sont en minuscules, mais les noms de
        // classes gardent leur casse d'origine. On construit donc des index
        // insensibles à la casse pour que les recherches du moteur soient fiables.
        $knowledge['index_classes'] = [];
        foreach ($knowledge['classes'] as $name => $entry) {
            $knowledge['index_classes'][strtolower($name)] = [
                'name' => $name,
                'entry' => $entry,
            ];
        }
        $knowledge['index_methods'] = [];
        foreach ($knowledge['methods'] as $class => $methods) {
            $knowledge['index_methods'][strtolower($class)] = [];
            foreach ($methods as $method => $entry) {
                $knowledge['index_methods'][strtolower($class)][strtolower($method)] = [
                    'name' => $method,
                    'entry' => $entry,
                ];
            }
        }
        $knowledge['index_consts'] = [];
        // Index plat : nom de constante -> classe + version. Indispensable pour
        // detecter une constante referencee sans son prefixe de classe ; sans lui
        // le controle ne pouvait jamais correspondre (la cle etait imbriquee).
        $knowledge['index_const_names'] = [];
        foreach ($knowledge['consts'] as $class => $constants) {
            $knowledge['index_consts'][strtolower($class)] = [];
            foreach ($constants as $constant => $version) {
                $knowledge['index_consts'][strtolower($class)][strtolower($constant)] = [
                    'name' => $constant,
                    'version' => $version,
                ];
                // En cas d'homonymie entre classes, on conserve la class const
                // la plus explicite possible : la premiere rencontree suffit a
                // alerter, et le message cite la classe concernee.
                $flat = strtolower($constant);
                if (!isset($knowledge['index_const_names'][$flat])) {
                    $knowledge['index_const_names'][$flat] = [
                        'class' => $class,
                        'name' => $constant,
                        'version' => $version,
                    ];
                }
            }
        }
        $knowledge['index_unique_methods'] = [];
        foreach ($knowledge['uniqueMethodNames'] as $key => $realName) {
            $knowledge['index_unique_methods'][strtolower($key)] = $realName;
        }
        // Les hooks sont stockes sous la forme [nom_casse_origine, version] et
        // non [version] : on lit donc les deux elements explicitement, sinon le
        // rapport affichait « supprime en PrestaShop Array » et le nom en
        // minuscules.
        $knowledge['index_hooks'] = [];
        foreach ($knowledge['hooks'] as $hook => $entry) {
            $name = is_array($entry) ? $entry[0] : $hook;
            $version = is_array($entry) ? ($entry[1] ?? '9.0') : $entry;
            $knowledge['index_hooks'][strtolower($name)] = [
                'name' => $name,
                'version' => $version,
            ];
        }

        return $knowledge;
    }
}
