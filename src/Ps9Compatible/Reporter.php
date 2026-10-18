<?php
/**
 * Mise en forme des rapports d'audit de compatibilité PrestaShop 9
 *
 * Le moteur produit des constats bruts ; cette classe les transforme en quatre
 * formats : texte coloré pour le terminal, JSON pour l'intégration continue,
 * Markdown pour un ticket ou une revue de code, et SARIF pour les interfaces
 * d'analyse de code qui exploitent ce standard.
 *
 * Le schéma JSON est stable : les clés de premier niveau ne changent pas entre
 * deux versions mineures, ce qui permet de comparer deux rapports dans le temps.
 *
 * @author    Thierry Laval <https://thierrylaval.dev/>
 * @copyright 2007-2026 Thierry Laval
 * @license   http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 * @version   2.0.0
 * @package   Ps9Compatible
 */

final class Ps9Reporter
{
    /** Couleurs ANSI par gravité. */
    private static $colors = [
        'error' => "\033[31m",
        'warning' => "\033[33m",
        'notice' => "\033[36m",
    ];

    /** Libellés français des gravités, pour les rapports lisibles. */
    private static $labels = [
        'error' => 'ERREUR',
        'warning' => 'ALERTE',
        'notice' => 'REMARQUE',
    ];

    /**
     * Construit le résumé d'un ensemble de constats.
     *
     * @param  array $findings Liste des constats.
     * @return array Compteurs par gravité, plus le total.
     */
    public static function summary(array $findings)
    {
        $summary = [
            'total' => count($findings),
            'error' => 0,
            'warning' => 0,
            'notice' => 0,
        ];
        foreach ($findings as $finding) {
            if (isset($summary[$finding['severity']])) {
                ++$summary[$finding['severity']];
            }
        }

        return $summary;
    }

    /**
     * Prépare la structure de données complète du rapport.
     *
     * @param  array  $findings Constats du scan.
     * @param  array  $module   Informations d'en-tête du module.
     * @param  int    $scanned  Fichiers analysés.
     * @param  int    $cached   Fichiers restitués depuis le cache.
     * @param  array  $context  Contexte du scan : source, durée, options.
     * @return array Rapport structuré, prêt à être encodé.
     */
    public static function build(array $findings, array $module, $scanned, $cached, array $context = [])
    {
        $summary = self::summary($findings);

        return [
            'tool' => [
                'name' => 'ps9compatible',
                'version' => PS9COMPATIBLE_VERSION,
                'data_version' => PS9COMPATIBLE_DATA_VERSION,
                'generated_at' => date('c'),
            ],
            'module' => $module,
            'scan' => array_merge([
                'source' => isset($context['source']) ? $context['source'] : '',
                'files_scanned' => (int) $scanned,
                'files_cached' => (int) $cached,
                'duration_ms' => 0,
                'include_vendor' => false,
                'rules_loaded' => [],
            ], $context),
            'summary' => $summary,
            'findings' => $findings,
        ];
    }

    /**
     * Rend le rapport en texte, avec ou sans couleurs.
     *
     * @param  array $report Rapport structuré.
     * @param  bool  $color  Vrai pour activer les couleurs ANSI.
     * @return string Texte prêt à afficher.
     */
    public static function text(array $report, $color = true)
    {
        $out = '';
        $module = $report['module'];
        $title = 'Audit de compatibilité PrestaShop 9';
        if (!empty($module['name'])) {
            $title .= ' — ' . $module['name'];
            if (!empty($module['version'])) {
                $title .= ' ' . $module['version'];
            }
        }
        $out .= $title . "\n";
        $out .= str_repeat('=', strlen($title)) . "\n\n";
        $out .= sprintf(
            "%d fichier(s) analysé(s) · %d erreur(s) · %d alerte(s) · %d remarque(s)\n",
            $report['scan']['files_scanned'] + $report['scan']['files_cached'],
            $report['summary']['error'],
            $report['summary']['warning'],
            $report['summary']['notice']
        );
        if ($report['scan']['files_cached'] > 0) {
            $out .= sprintf("%d fichier(s) restitué(s) depuis le cache\n", $report['scan']['files_cached']);
        }
        $hiddenLine = self::hiddenLine($report);
        if ($hiddenLine !== '') {
            $out .= $hiddenLine . "\n";
        }
        $out .= "\n";
        if (empty($report['findings'])) {
            $out .= self::emptyMessage($report) . "\n";

            return $out;
        }
        foreach ($report['findings'] as $finding) {
            $label = isset(self::$labels[$finding['severity']]) ? self::$labels[$finding['severity']] : $finding['severity'];
            $line = sprintf('%-9s %s', $label, $finding['file']);
            if ($finding['line'] > 0) {
                $line .= ':' . $finding['line'];
            }
            if ($color && isset(self::$colors[$finding['severity']])) {
                $line = self::$colors[$finding['severity']] . $line . "\033[0m";
            }
            // On garantit toujours au moins 2 espaces entre le chemin et le
            // message. str_pad() n'ajoute rien si la chaine depasse la largeur
            // demandee (chemin long), ce qui collait le message au numero de
            // ligne. Et si des codes ANSI sont presents, ils ne comptent pas
            // dans la largeur : on calcule donc le remplissage a part.
            $visible = $line;
            if ($color) {
                $visible = preg_replace('/\033\[[0-9;]*m/', '', $line);
            }
            $pad = 52 - strlen($visible);
            $out .= $line . ($pad > 0 ? str_repeat(' ', $pad) : '  ');
            $out .= $finding['message'] . "\n";
            if (!empty($finding['hint'])) {
                $out .= '          → ' . $finding['hint'] . "\n";
            }
        }
        $out .= "\n";

        return $out;
    }

    /**
     * Rend le rapport en JSON, avec les options d'encodage adaptées à l'UTF-8.
     *
     * @param  array $report Rapport structuré.
     * @param  bool  $pretty Vrai pour indenter le résultat.
     * @return string Chaîne JSON.
     */
    public static function json(array $report, $pretty = true)
    {
        $flags = JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE;
        if ($pretty) {
            $flags |= JSON_PRETTY_PRINT;
        }
        $encoded = json_encode($report, $flags);

        return $encoded === false ? '{}' : $encoded;
    }

    /**
     * Rend le rapport en Markdown, prêt à coller dans un ticket.
     *
     * @param  array $report Rapport structuré.
     * @return string Document Markdown.
     */
    public static function markdown(array $report)
    {
        $module = $report['module'];
        $out = '# Audit de compatibilité PrestaShop 9';
        if (!empty($module['name'])) {
            $out .= ' : ' . $module['name'];
            if (!empty($module['version'])) {
                $out .= ' ' . $module['version'];
            }
        }
        $out .= "\n\n";
        $out .= sprintf(
            "%d fichier(s) analysé(s) · **%d erreur(s)**, %d alerte(s), %d remarque(s)\n\n",
            $report['scan']['files_scanned'] + $report['scan']['files_cached'],
            $report['summary']['error'],
            $report['summary']['warning'],
            $report['summary']['notice']
        );
        $hiddenLine = self::hiddenLine($report);
        if ($hiddenLine !== '') {
            $out .= '> ' . $hiddenLine . "\n\n";
        }
        if (empty($report['findings'])) {
            $out .= self::emptyMessage($report) . "\n";

            return $out;
        }
        $current = null;
        foreach ($report['findings'] as $finding) {
            if ($current !== $finding['severity']) {
                $current = $finding['severity'];
                $label = isset(self::$labels[$current]) ? self::$labels[$current] : $current;
                $out .= '## ' . $label . "\n\n";
            }
            $location = $finding['line'] > 0 ? $finding['file'] . ':' . $finding['line'] : $finding['file'];
            $out .= '- `' . $location . '` — ' . $finding['message'];
            if (!empty($finding['hint'])) {
                $out .= "\n  - *Correction :* " . $finding['hint'];
            }
            $out .= "\n";
        }

        return $out . "\n";
    }

    /**
     * Rend le rapport au format SARIF, exploité par les interfaces d'analyse
     * de code statique.
     *
     * @param  array $report Rapport structuré.
     * @return string Document SARIF encodé en JSON.
     */
    public static function sarif(array $report)
    {
        $rules = [];
        $results = [];
        foreach ($report['findings'] as $finding) {
            if (!isset($rules[$finding['rule']])) {
                $rules[$finding['rule']] = [
                    'id' => $finding['rule'],
                    'name' => $finding['rule'],
                    'shortDescription' => ['text' => $finding['message']],
                    'defaultConfiguration' => ['level' => self::sarifLevel($finding['severity'])],
                ];
            }
            $result = [
                'ruleId' => $finding['rule'],
                'level' => self::sarifLevel($finding['severity']),
                'message' => ['text' => $finding['message']],
                'locations' => [[
                    'physicalLocation' => [
                        'artifactLocation' => ['uri' => $finding['file']],
                        'region' => ['startLine' => max(1, $finding['line'])],
                    ],
                ]],
            ];
            if (!empty($finding['hint'])) {
                $result['fixes'] = [[
                    'description' => ['text' => $finding['hint']],
                ]];
            }
            $results[] = $result;
        }
        $document = [
            'version' => '2.1.0',
            '$schema' => 'https://json.schemastore.org/sarif-2.1.0.json',
            'runs' => [[
                'tool' => [
                    'driver' => [
                        'name' => 'ps9compatible',
                        'version' => PS9COMPATIBLE_VERSION,
                        'informationUri' => 'https://thierrylaval.dev',
                        'rules' => array_values($rules),
                    ],
                ],
                'results' => $results,
            ]],
        ];
        $encoded = json_encode($document, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);

        return $encoded === false ? '{}' : $encoded;
    }

    /**
     * Convertit une gravité interne en niveau SARIF.
     *
     * @param  string $severity Gravité interne.
     * @return string Niveau SARIF : error, warning ou note.
     */
    private static function sarifLevel($severity)
    {
        $levels = [
            'error' => 'error',
            'warning' => 'warning',
            'notice' => 'note',
        ];

        return isset($levels[$severity]) ? $levels[$severity] : 'warning';
    }

    /**
     * Nombre total de constats masqués par --min-severity.
     *
     * @param  array $report Rapport structuré.
     * @return int
     */
    public static function hiddenTotal(array $report)
    {
        if (empty($report['scan']['hidden']) || !is_array($report['scan']['hidden'])) {
            return 0;
        }

        return (int) array_sum($report['scan']['hidden']);
    }

    /**
     * Ligne d'information sur les constats masqués, ou chaîne vide.
     *
     * Format stable (relu par l'interface web) :
     * « N constat(s) masqué(s) par le seuil error : X alerte(s) · Y remarque(s) ».
     *
     * @param  array $report Rapport structuré.
     * @return string
     */
    public static function hiddenLine(array $report)
    {
        $total = self::hiddenTotal($report);
        if ($total === 0) {
            return '';
        }
        $hidden = $report['scan']['hidden'];

        return sprintf(
            '%d constat(s) masqué(s) par le seuil %s : %d alerte(s) · %d remarque(s)',
            $total,
            isset($report['scan']['min_severity']) ? $report['scan']['min_severity'] : '',
            isset($hidden['warning']) ? $hidden['warning'] : 0,
            isset($hidden['notice']) ? $hidden['notice'] : 0
        );
    }

    /**
     * Message affiché quand aucun constat n'est listé.
     *
     * @param  array $report Rapport structuré.
     * @return string
     */
    private static function emptyMessage(array $report)
    {
        if (self::hiddenTotal($report) > 0) {
            return 'Aucun constat à ce seuil de gravité. Abaissez la gravité minimale pour voir les constats masqués.';
        }

        return 'Aucun problème détecté.';
    }

    /**
     * Rend le rapport dans le format demandé.
     *
     * @param  array  $report Rapport structuré.
     * @param  string $format Format demandé : text, json, md ou sarif.
     * @param  bool   $color  Couleurs activées pour le format texte.
     * @return string Rapport rendu.
     */
    public static function render(array $report, $format = 'text', $color = true)
    {
        switch (strtolower($format)) {
            case 'json':
                return self::json($report);
            case 'md':
            case 'markdown':
                return self::markdown($report);
            case 'sarif':
                return self::sarif($report);
            default:
                return self::text($report, $color);
        }
    }

    /**
     * Compte les constats atteignant un seuil de gravité donné.
     *
     * @param  array  $findings  Constats du scan.
     * @param  string $threshold Seuil : error, warning ou notice.
     * @return int Nombre de constats au seuil ou au-dessus.
     */
    public static function countAtLeast(array $findings, $threshold)
    {
        $count = 0;
        foreach ($findings as $finding) {
            if (Ps9Rules::isAtLeast($finding['severity'], $threshold)) {
                ++$count;
            }
        }

        return $count;
    }
}
