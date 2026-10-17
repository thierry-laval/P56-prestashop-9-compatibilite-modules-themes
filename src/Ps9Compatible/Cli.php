<?php
/**
 * Interface en ligne de commande du scanner de compatibilité PrestaShop 9
 *
 * Cette classe lit les arguments, prépare la racine analysée (dossier ou archive
 * ZIP décompressée dans un dossier temporaire), lance le scanner, affiche le
 * rapport et renvoie un code de sortie exploitable par un script d'intégration
 * continue ou une tâche planifiée.
 *
 * @author    Thierry Laval <https://thierrylaval.dev/>
 * @copyright 2007-2026 Thierry Laval
 * @license   http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 * @version   2.0.0
 * @package   Ps9Compatible
 */

final class Ps9Cli
{
    /** Valeurs admises pour les options à choix. */
    private static $formats = ['text', 'json', 'md', 'markdown', 'sarif'];
    private static $severities = ['error', 'warning', 'notice'];

    /**
     * Point d'entrée de la ligne de commande.
     *
     * @param  array $argv Arguments reçus du terminal.
     * @return int Code de sortie : 0 conforme, 1 problèmes, 2 erreur d'usage.
     */
    public static function main(array $argv)
    {
        $options = self::parseArguments($argv);
        if (isset($options['error'])) {
            fwrite(STDERR, $options['error'] . "\n" . self::usage());

            return 2;
        }
        if (isset($options['help'])) {
            fwrite(STDOUT, self::usage());

            return 0;
        }
        if (isset($options['version'])) {
            fwrite(STDOUT, 'ps9compatible ' . PS9COMPATIBLE_VERSION . "\n");

            return 0;
        }
        if ($options['target'] === null) {
            fwrite(STDERR, "Aucun module à analyser n'a été indiqué.\n" . self::usage());

            return 2;
        }
        $target = $options['target'];
        if (!file_exists($target)) {
            fwrite(STDERR, sprintf("Le chemin « %s » n'existe pas.\n", $target));

            return 2;
        }

        // Chargement de la base de connaissances, puis du fichier de règles
        // complémentaire éventuel.
        $knowledge = Ps9Scanner::loadKnowledge(__DIR__ . '/../../data/removed-api.php');
        if (empty($knowledge)) {
            fwrite(STDERR, "La base de connaissances data/removed-api.php est introuvable ou illisible.\n");

            return 2;
        }
        if (isset($options['rules'])) {
            if (!Ps9Rules::loadOverrides($options['rules'])) {
                fwrite(STDERR, sprintf("Le fichier de règles « %s » n'a pas pu être chargé.\n", $options['rules']));

                return 2;
            }
        }

        $temporary = null;
        $root = $target;
        $label = basename(rtrim(str_replace('\\', '/', $target), '/'));
        if (is_file($target)) {
            $temporary = self::extractArchive($target);
            if ($temporary === null) {
                fwrite(STDERR, "L'archive n'a pas pu être ouverte. Vérifiez qu'elle est valide et que l'extension zip est disponible.\n");

                return 2;
            }
            $root = $temporary;
        }

        $cache = null;
        if (!$options['no_cache']) {
            $directory = $options['cache'] === null
                ? __DIR__ . '/../../.ps9compatible-cache'
                : $options['cache'];
            $cache = new Ps9Cache($directory, true);
        }

        $started = microtime(true);
        $scanner = new Ps9Scanner($knowledge, $root, $options['include_vendor'], $cache, $label);
        if (isset($options['type'])) {
            $scanner->setTargetType($options['type']);
        }
        foreach ($options['ignore'] as $pattern) {
            $scanner->addIgnorePattern($pattern);
        }

        if (isset($options['changed_since'])) {
            if ($cache === null) {
                fwrite(STDERR, "L'option --changed-since nécessite le cache : retirez --no-cache.\n");

                return 2;
            }
            $changed = $cache->changedFiles($root);
            if (empty($changed)) {
                fwrite(STDOUT, "Aucun fichier n'a changé depuis la dernière analyse.\n");
                if ($temporary !== null) {
                    self::removeDirectory($temporary);
                }

                return 0;
            }
            fwrite(STDOUT, sprintf("%d fichier(s) modifié(s) depuis la dernière analyse :\n", count($changed)));
            foreach ($changed as $path) {
                fwrite(STDOUT, '  ' . $path . "\n");
            }
            fwrite(STDOUT, "\n");
        }

        $findings = $scanner->run();
        $duration = (int) round((microtime(true) - $started) * 1000);

        // Filtrage éventuel sur la gravité minimale.
        $threshold = $options['min_severity'];
        if ($threshold !== 'notice') {
            $findings = array_values(array_filter($findings, function (array $finding) use ($threshold) {
                return Ps9Rules::isAtLeast($finding['severity'], $threshold);
            }));
        }

        $context = [
            'source' => $label,
            'duration_ms' => $duration,
            'include_vendor' => $options['include_vendor'],
            'rules_loaded' => Ps9Rules::loadedOverrides(),
            'cache_enabled' => $cache !== null,
        ];
        $report = Ps9Reporter::build($findings, $scanner->moduleInfo(), $scanner->scannedCount(), $scanner->cachedCount(), $context);
        $output = Ps9Reporter::render($report, $options['format'], !$options['no_color'] && self::supportsColor());
        fwrite(STDOUT, $output);

        if ($options['stats']) {
            fwrite(STDOUT, self::renderStats($report, $scanner, $cache));
        }

        if ($temporary !== null) {
            self::removeDirectory($temporary);
        }

        return Ps9Reporter::countAtLeast($findings, $options['fail_on']) > 0 ? 1 : 0;
    }

    /**
     * Lit les arguments de la ligne de commande.
     *
     * @param  array $argv Arguments bruts.
     * @return array Options normalisées, avec la clé error en cas de problème.
     */
    private static function parseArguments(array $argv)
    {
        $options = [
            'target' => null,
            'format' => 'text',
            'type' => 'auto',
            'include_vendor' => false,
            'no_color' => false,
            'no_cache' => false,
            'cache' => null,
            'min_severity' => 'notice',
            'fail_on' => 'error',
            'ignore' => [],
            'rules' => null,
            'stats' => false,
            'changed_since' => null,
        ];
        $count = count($argv);
        for ($i = 1; $i < $count; ++$i) {
            $argument = $argv[$i];
            if ($argument === '--help' || $argument === '-h') {
                $options['help'] = true;
                continue;
            }
            if ($argument === '--version' || $argument === '-v') {
                $options['version'] = true;
                continue;
            }
            if ($argument === '--include-vendor') {
                $options['include_vendor'] = true;
                continue;
            }
            if ($argument === '--no-color') {
                $options['no_color'] = true;
                continue;
            }
            if ($argument === '--no-cache') {
                $options['no_cache'] = true;
                continue;
            }
            if ($argument === '--stats') {
                $options['stats'] = true;
                continue;
            }
            if (strpos($argument, '--') === 0 && strpos($argument, '=') !== false) {
                list($key, $value) = explode('=', substr($argument, 2), 2);
                switch ($key) {
                    case 'format':
                        if (!in_array(strtolower($value), self::$formats, true)) {
                            $options['error'] = sprintf('Format inconnu : %s.', $value);
                        } else {
                            $options['format'] = strtolower($value);
                        }
                        break;
                    case 'cache':
                        $options['cache'] = $value;
                        break;
                    case 'min-severity':
                        if (!in_array(strtolower($value), self::$severities, true)) {
                            $options['error'] = sprintf('Gravité minimale inconnue : %s.', $value);
                        } else {
                            $options['min_severity'] = strtolower($value);
                        }
                        break;
                    case 'type':
                        if (!in_array(strtolower($value), ['auto', 'module', 'theme'], true)) {
                            $options['error'] = sprintf('Type de cible inconnu : %s (auto, module ou theme).', $value);
                        } else {
                            $options['type'] = strtolower($value);
                        }
                        break;
                    case 'fail-on':
                        if (!in_array(strtolower($value), self::$severities, true)) {
                            $options['error'] = sprintf('Seuil de sortie inconnu : %s.', $value);
                        } else {
                            $options['fail_on'] = strtolower($value);
                        }
                        break;
                    case 'ignore':
                        foreach (explode(',', $value) as $pattern) {
                            $pattern = trim($pattern);
                            if ($pattern !== '') {
                                $options['ignore'][] = $pattern;
                            }
                        }
                        break;
                    case 'rules':
                        $options['rules'] = $value;
                        break;
                    case 'changed-since':
                        $options['changed_since'] = $value;
                        break;
                    default:
                        $options['error'] = sprintf('Option inconnue : --%s.', $key);
                }
                continue;
            }
            if (strpos($argument, '-') === 0 && strlen($argument) > 1 && $argument !== '-') {
                $options['error'] = sprintf('Option inconnue : %s.', $argument);
                continue;
            }
            if ($options['target'] === null) {
                $options['target'] = $argument;
            }
        }

        return $options;
    }

    /**
     * Décompresse une archive ZIP dans un dossier temporaire, en refusant les
     * entrées qui sortiraient du dossier cible.
     *
     * @param  string $archive Chemin de l'archive.
     * @return string|null Chemin du dossier extrait, ou null en cas d'échec.
     */
    private static function extractArchive($archive)
    {
        if (!class_exists('ZipArchive')) {
            return null;
        }
        $zip = new ZipArchive();
        if ($zip->open($archive) !== true) {
            return null;
        }
        $destination = sys_get_temp_dir() . '/ps9compatible-' . bin2hex(random_bytes(6));
        if (!@mkdir($destination, 0755, true) && !is_dir($destination)) {
            $zip->close();

            return null;
        }
        $safe = true;
        for ($i = 0; $i < $zip->numFiles; ++$i) {
            $name = str_replace('\\', '/', $zip->getNameIndex($i));
            if (strpos($name, '../') !== false || strpos($name, '/..') !== false) {
                $safe = false;
                break;
            }
        }
        if (!$safe) {
            $zip->close();
            self::removeDirectory($destination);

            return null;
        }
        $zip->extractTo($destination);
        $zip->close();
        $root = self::findModuleRoot($destination);

        return $root === null ? $destination : $root;
    }

    /**
     * Détecte le dossier contenant réellement le module dans une archive, qui
     * peut contenir un niveau d'arborescence supplémentaire.
     *
     * @param  string $directory Dossier extrait.
     * @return string|null Dossier du module, ou null si la structure est ambiguë.
     */
    private static function findModuleRoot($directory)
    {
        if (is_file($directory . '/config.xml')) {
            return $directory;
        }
        $entries = array_diff(scandir($directory), ['.', '..']);
        if (count($entries) === 1) {
            $only = $directory . '/' . reset($entries);
            if (is_dir($only) && is_file($only . '/config.xml')) {
                return $only;
            }
        }

        return null;
    }

    /**
     * Supprime un dossier temporaire et son contenu.
     *
     * @param string $directory Chemin du dossier.
     */
    private static function removeDirectory($directory)
    {
        if (!is_dir($directory)) {
            return;
        }
        $iterator = new RecursiveIteratorIterator(
            new RecursiveDirectoryIterator($directory, FilesystemIterator::SKIP_DOTS),
            RecursiveIteratorIterator::CHILD_FIRST
        );
        foreach ($iterator as $item) {
            if ($item->isDir()) {
                @rmdir($item->getPathname());
                continue;
            }
            @unlink($item->getPathname());
        }
        @rmdir($directory);
    }

    /**
     * Compose le bloc de statistiques affiché avec --stats.
     *
     * @param  array     $report  Rapport structuré.
     * @param  Ps9Scanner $scanner Scanner utilisé.
     * @param  Ps9Cache|null $cache Cache, ou null.
     * @return string Texte des statistiques.
     */
    private static function renderStats(array $report, Ps9Scanner $scanner, $cache)
    {
        $out = "\nStatistiques\n------------\n";
        $out .= sprintf("Durée totale           : %d ms\n", $report['scan']['duration_ms']);
        $out .= sprintf("Fichiers analysés      : %d\n", $scanner->scannedCount());
        $out .= sprintf("Fichiers depuis cache  : %d\n", $scanner->cachedCount());
        $out .= sprintf("Constats produits      : %d\n", $report['summary']['total']);
        if ($cache !== null) {
            $stats = $cache->stats();
            $out .= sprintf("Cache — succès         : %d\n", $stats['hits']);
            $out .= sprintf("Cache — nouveaux       : %d\n", $stats['misses']);
            $out .= sprintf("Cache — périmés        : %d\n", $stats['stale']);
        }
        if (!empty($report['scan']['rules_loaded'])) {
            $out .= 'Règles externes        : ' . implode(', ', $report['scan']['rules_loaded']) . "\n";
        }

        return $out;
    }

    /**
     * Indique si la sortie standard accepte les codes couleur.
     *
     * @return bool Vrai si les couleurs sont utilisables.
     */
    private static function supportsColor()
    {
        if (getenv('NO_COLOR') !== false) {
            return false;
        }
        if (getenv('TERM') === 'dumb') {
            return false;
        }

        return true;
    }

    /**
     * Texte d'aide affiché par --help.
     *
     * @return string Aide de la ligne de commande.
     */
    private static function usage()
    {
        return <<<TXT
ps9compatible — audit de compatibilité PrestaShop 9 pour modules

Usage :
  php ps9compatible.php <dossier-module|module.zip> [options]

Options :
  --format=text|json|md|sarif  Format de sortie (text par défaut)
  --include-vendor             Analyser aussi le dossier vendor/
  --no-color                   Sortie texte sans codes couleur
  --cache=<dossier>            Dossier de cache (défaut : .ps9compatible-cache)
  --no-cache                   Désactiver le cache
  --min-severity=error|warning|notice  Masquer les constats moins graves
  --type=auto|module|theme      Forcer le type de cible (auto par défaut)
  --ignore=<motif,motif>       Ignorer les fichiers correspondant à ces motifs
  --rules=<fichier.php>        Charger un fichier de règles complémentaire
  --fail-on=error|warning|notice  Seuil de sortie en code 1 (défaut : error)
  --changed-since=<reference>  Lister les fichiers modifiés depuis la dernière analyse
  --stats                      Afficher les statistiques d'analyse
  --help, -h                   Afficher cette aide
  --version, -v                Afficher la version du moteur

Codes de sortie :
  0  aucun constat au niveau du seuil --fail-on
  1  au moins un constat atteint le seuil
  2  erreur d'utilisation ou base de connaissances inaccessible

TXT;
    }
}
