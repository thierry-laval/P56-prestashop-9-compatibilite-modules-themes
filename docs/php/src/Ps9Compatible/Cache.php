<?php
/**
 * Cache des fichiers analysés, indexé par empreinte SHA-256
 *
 * Réanalyser un module inchangé coûte exactement le même temps que la première
 * fois, alors que rien n'a bougé. Ce cache conserve, pour chaque fichier déjà
 * traité, son empreinte et le résultat de l'analyse. Lors d'une relance :
 *
 *   - un fichier dont l'empreinte est identique est restitué depuis le cache ;
 *   - un fichier modifié, ajouté ou supprimé est réanalysé ;
 *   - le rapport indique clairement combien de fichiers ont été évités.
 *
 * Le cache est un simple fichier JSON. Il peut être désactivé avec --no-cache,
 * ce qui est le comportement par défaut en mode web, où chaque requête doit
 * repartir d'un état propre.
 *
 * @author    Thierry Laval <https://thierrylaval.dev/>
 * @copyright 2007-2026 Thierry Laval
 * @license   http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 * @version   2.0.0
 * @package   Ps9Compatible
 */

final class Ps9Cache
{
    /** Version du format de cache : un changement invalide les anciens fichiers. */
    const FORMAT = 3;

    /** @var string Chemin du fichier d'index. */
    private $file;

    /** @var bool Cache actif. */
    private $enabled;

    /** @var array Entrées chargées : chemin relatif => [hash, findings, moduleInfo]. */
    private $entries = [];

    /** @var array Chemins relatif rencontrés pendant cette analyse. */
    private $seen = [];

    /** @var array Statistiques d'utilisation du cache. */
    private $stats = ['hits' => 0, 'misses' => 0, 'stale' => 0];

    /**
     * @param string $directory Dossier de cache.
     * @param bool   $enabled   Faux pour désactiver complètement le cache.
     */
    public function __construct($directory, $enabled = true)
    {
        $this->enabled = (bool) $enabled;
        $this->file = rtrim($directory, '/\\') . '/index.json';
        if ($this->enabled) {
            $this->load();
        }
    }

    /**
     * Charge l'index depuis le disque, en ignorant silencieusement un fichier
     * corrompu ou écrit par une version antérieure du format.
     */
    private function load()
    {
        if (!is_file($this->file) || !is_readable($this->file)) {
            return;
        }
        $raw = @file_get_contents($this->file);
        if ($raw === false || $raw === '') {
            return;
        }
        $decoded = json_decode($raw, true);
        if (!is_array($decoded) || !isset($decoded['format']) || $decoded['format'] !== self::FORMAT) {
            return;
        }
        $this->entries = isset($decoded['files']) && is_array($decoded['files']) ? $decoded['files'] : [];
    }

    /**
     * Indique si le cache peut être utilisé pour ce contenu.
     *
     * @param  string $relativePath Chemin relatif du fichier.
     * @param  string $content      Contenu brut du fichier.
     * @return array|null Entrée de cache valide, ou null si le fichier doit être analysé.
     */
    public function get($relativePath, $content)
    {
        if (!$this->enabled) {
            return null;
        }
        $this->seen[$relativePath] = true;
        if (!isset($this->entries[$relativePath])) {
            ++$this->stats['misses'];

            return null;
        }
        $hash = hash('sha256', $content);
        if ($this->entries[$relativePath]['hash'] !== $hash) {
            ++$this->stats['stale'];

            return null;
        }
        ++$this->stats['hits'];

        return $this->entries[$relativePath];
    }

    /**
     * Enregistre le résultat d'une analyse.
     *
     * @param string $relativePath Chemin relatif du fichier.
     * @param string $content      Contenu brut, utilisé pour l'empreinte.
     * @param array  $findings     Constats produits par le fichier.
     */
    public function put($relativePath, $content, array $findings)
    {
        if (!$this->enabled) {
            return;
        }
        $this->seen[$relativePath] = true;
        $this->entries[$relativePath] = [
            'hash' => hash('sha256', $content),
            'findings' => $findings,
            'scanned_at' => time(),
        ];
    }

    /**
     * Écrit l'index sur le disque. Les entrées des fichiers disparus sont
     * supprimées pour que le cache ne grossisse pas indéfiniment.
     */
    public function save()
    {
        if (!$this->enabled) {
            return false;
        }
        foreach (array_keys($this->entries) as $path) {
            if (!isset($this->seen[$path])) {
                unset($this->entries[$path]);
            }
        }
        $directory = dirname($this->file);
        if (!is_dir($directory) && !@mkdir($directory, 0755, true) && !is_dir($directory)) {
            return false;
        }
        $payload = [
            'format' => self::FORMAT,
            'engine' => PS9COMPATIBLE_VERSION,
            'updated_at' => date('c'),
            'files' => $this->entries,
        ];

        return @file_put_contents($this->file, json_encode($payload, JSON_UNESCAPED_SLASHES)) !== false;
    }

    /**
     * Compare les empreintes en cache avec les fichiers présents et renvoie la
     * liste des fichiers dont le contenu a changé depuis la dernière analyse.
     *
     * @param  string $root Racine du module.
     * @return array Liste de chemins relatifs modifiés, ajoutés ou supprimés.
     */
    public function changedFiles($root)
    {
        $changed = [];
        foreach ($this->entries as $relativePath => $entry) {
            $absolute = rtrim($root, '/\\') . '/' . $relativePath;
            if (!is_file($absolute)) {
                $changed[] = $relativePath;

                continue;
            }
            if (hash('sha256', (string) file_get_contents($absolute)) !== $entry['hash']) {
                $changed[] = $relativePath;
            }
        }
        sort($changed);

        return $changed;
    }

    /** Vrai si le cache est actif. */
    public function isEnabled()
    {
        return $this->enabled;
    }

    /** Statistiques d'utilisation : hits, misses, stale. */
    public function stats()
    {
        return $this->stats;
    }
}
