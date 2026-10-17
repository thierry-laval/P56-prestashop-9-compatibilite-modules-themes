<?php
/**
 * Générateur de la base de connaissances — Version 2.0.0
 *
 * La version affichée provient de la constante PS9COMPATIBLE_DATA_VERSION
 * écrite plus bas (source unique de vérité) : ne modifiez que celle-ci.
 *
 * DESCRIPTION GÉNÉRALE :
 * Ce script compare l'API publique de plusieurs versions de PrestaShop et
 * enregistre ce qui a disparu, avec la version de disparition. Le résultat
 * est écrit dans data/removed-api.php, chargeable par le scanner via
 * Ps9Scanner::loadKnowledge().
 *
 * FONCTIONNALITÉS PRINCIPALES :
 *   - Extraction de l'API publique d'un arbre de sources (classes, méthodes,
 *     constantes, classe parente, hooks)
 *   - Comparaison inter-versions et détection des suppressions
 *   - Détection des présentateurs déplacés (nouveau namespace)
 *   - Écriture d'un fichier PHP autonome, chargé par require_once
 *
 * @author    Thierry Laval <https://thierrylaval.dev/>
 * @copyright 2007-2026 Thierry Laval
 * @license   http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 * @version   2.0.0
 * @package   Ps9Compatible
 *
 * UTILISATION :
 *   php tools/build-data.php <src-1.7.8> <src-8.2> <src-9.0>
 *
 * Chaque argument est une version décompressée de PrestaShop (elle doit
 * contenir classes/, controllers/, src/ et install-dev/data/xml/hook.xml).
 * Exemple :
 *   curl -L https://codeload.github.com/PrestaShop/PrestaShop/tar.gz/refs/tags/9.0.0 | tar xz
 *
 * Tout ce qui existe en 1.7 ou 8 mais plus en 9 est inscrit dans le fichier de
 * données, avec la version dans laquelle l'élément a disparu.
 */

if ($argc < 4) {
    fwrite(STDERR, "Usage: php tools/build-data.php <src-1.7.8> <src-8.2> <src-9.0>\n");
    exit(2);
}

foreach (['T_NAME_QUALIFIED', 'T_NAME_FULLY_QUALIFIED', 'T_NAME_RELATIVE'] as $c) {
    if (!defined($c)) {
        define($c, -1000 - strlen($c));
    }
}

/**
 * Public API surface of one source tree: classes with methods, constants,
 * parent class (legacy classes only) and the hook list.
 */
function extractApi($root)
{
    $root = rtrim(str_replace('\\', '/', $root), '/');
    $out = ['classes' => [], 'hooks' => []];
    $it = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($root, FilesystemIterator::SKIP_DOTS));
    foreach ($it as $f) {
        $p = str_replace('\\', '/', $f->getPathname());
        if (substr($p, -4) !== '.php') {
            continue;
        }
        $rel = substr($p, strlen($root) + 1);
        if (!preg_match('#^(classes|controllers|src)/#', $rel) || preg_match('#/(tests?|Tests?)/#', $rel)) {
            continue;
        }
        $t = @token_get_all((string) file_get_contents($p));
        $n = count($t);
        $ns = '';
        $class = null;
        $depth = 0;
        $classDepth = -1;
        for ($i = 0; $i < $n; ++$i) {
            $tok = $t[$i];
            if (!is_array($tok)) {
                if ($tok === '{') {
                    ++$depth;
                } elseif ($tok === '}') {
                    --$depth;
                    if ($class !== null && $depth === $classDepth) {
                        $class = null;
                        $classDepth = -1;
                    }
                }
                continue;
            }
            if ($tok[0] === T_CURLY_OPEN || $tok[0] === T_DOLLAR_OPEN_CURLY_BRACES) {
                ++$depth;
            } elseif ($tok[0] === T_NAMESPACE) {
                $ns = '';
                for ($j = $i + 1; $j < $n && $t[$j] !== ';' && $t[$j] !== '{'; ++$j) {
                    if (is_array($t[$j]) && in_array($t[$j][0], [T_STRING, T_NAME_QUALIFIED, T_NS_SEPARATOR], true)) {
                        $ns .= $t[$j][1];
                    }
                }
            } elseif (in_array($tok[0], [T_CLASS, T_INTERFACE, T_TRAIT], true)) {
                $k = $i - 1;
                while ($k >= 0 && is_array($t[$k]) && $t[$k][0] === T_WHITESPACE) {
                    --$k;
                }
                if ($k >= 0 && is_array($t[$k]) && in_array($t[$k][0], [T_DOUBLE_COLON, T_NEW], true)) {
                    continue;
                }
                for ($j = $i + 1; $j < $n; ++$j) {
                    if (is_array($t[$j]) && $t[$j][0] === T_STRING) {
                        break;
                    }
                    if ($t[$j] === '{' || $t[$j] === '(') {
                        $j = -1;
                        break;
                    }
                }
                if ($j < 0 || $j >= $n) {
                    continue;
                }
                $name = $t[$j][1];
                $fq = ($ns ? $ns . '\\' : '') . $name;
                if (!$ns && preg_match('/^(.+)Core$/', $name, $m)) {
                    $fq = $m[1];
                }
                $ext = null;
                for ($q = $j + 1; $q < $n && $t[$q] !== '{'; ++$q) {
                    if (is_array($t[$q]) && $t[$q][0] === T_EXTENDS) {
                        for ($r = $q + 1; $r < $n; ++$r) {
                            if (is_array($t[$r]) && in_array($t[$r][0], [T_STRING, T_NAME_QUALIFIED, T_NAME_FULLY_QUALIFIED], true)) {
                                $ext = ltrim($t[$r][1], '\\');
                                break;
                            }
                        }
                        break;
                    }
                }
                if ($ext !== null && !$ns && preg_match('/^(.+)Core$/', $ext, $m)) {
                    $ext = $m[1];
                }
                $class = $fq;
                if (!isset($out['classes'][$class])) {
                    $out['classes'][$class] = ['methods' => [], 'consts' => [], 'extends' => $ns ? null : $ext];
                }
                $classDepth = $depth;
            } elseif ($class !== null && $depth === $classDepth + 1 && ($tok[0] === T_FUNCTION || $tok[0] === T_CONST)) {
                if ($tok[0] === T_CONST) {
                    for ($j = $i + 1; $j < $n; ++$j) {
                        if (is_array($t[$j]) && $t[$j][0] === T_STRING) {
                            $out['classes'][$class]['consts'][] = $t[$j][1];
                            break;
                        }
                    }
                    continue;
                }
                $vis = 'public';
                $static = false;
                for ($k = $i - 1; $k >= 0 && $t[$k] !== ';' && $t[$k] !== '{' && $t[$k] !== '}'; --$k) {
                    if (is_array($t[$k])) {
                        if ($t[$k][0] === T_PRIVATE) {
                            $vis = 'private';
                        } elseif ($t[$k][0] === T_PROTECTED) {
                            $vis = 'protected';
                        } elseif ($t[$k][0] === T_STATIC) {
                            $static = true;
                        }
                    }
                }
                for ($j = $i + 1; $j < $n; ++$j) {
                    if (is_array($t[$j]) && $t[$j][0] === T_STRING) {
                        break;
                    }
                    if ($t[$j] === '(') {
                        $j = -1;
                        break;
                    }
                }
                if ($j >= 0 && $j < $n && $vis !== 'private') {
                    $out['classes'][$class]['methods'][strtolower($t[$j][1])] = [$t[$j][1], $static, $vis];
                }
            }
        }
    }
    $xml = @file_get_contents($root . '/install-dev/data/xml/hook.xml');
    if ($xml && preg_match_all('#<name>([^<]+)</name>#', $xml, $m)) {
        $out['hooks'] = array_values(array_unique($m[1]));
    }

    return $out;
}

function effectiveMethods(array $api, $cls, array $seen = [])
{
    if (!isset($api['classes'][$cls]) || isset($seen[$cls])) {
        return [];
    }
    $seen[$cls] = true;
    $c = $api['classes'][$cls];
    $parent = $c['extends'] ? effectiveMethods($api, $c['extends'], $seen) : [];

    return array_merge($parent, $c['methods']);
}

fwrite(STDERR, "Reading sources...\n");
$a17 = extractApi($argv[1]);
$a8 = extractApi($argv[2]);
$a9 = extractApi($argv[3]);

$data = [
    'generated' => gmdate('Y-m-d'),
    'compared' => ['1.7.8', '8.2', '9.0'],
    'classes' => [],      // removed class => [removedIn, movedTo|null]
    'methods' => [],      // legacy class => [lcmethod => [name, static, removedIn]]
    'namespacedMethods' => [], // FQCN => [lcmethod => [name, static, removedIn]]
    'consts' => [],       // legacy class => [CONST => removedIn]
    'hooks' => [],        // lchook => [name, removedIn]
    'extends' => [],      // legacy class => parent (PS 9) for effective lookups
    'uniqueMethodNames' => [], // lc method name removed somewhere and not defined anywhere in PS 9
];

$all9Methods = [];
foreach ($a9['classes'] as $c) {
    foreach ($c['methods'] as $lc => $_) {
        $all9Methods[$lc] = true;
    }
}
$shortIndex9 = [];
foreach (array_keys($a9['classes']) as $fq) {
    $short = substr(strrchr('\\' . $fq, '\\'), 1);
    $shortIndex9[$short][] = $fq;
}

$old = array_unique(array_merge(array_keys($a17['classes']), array_keys($a8['classes'])));
sort($old);
foreach ($old as $cls) {
    $legacy = strpos($cls, '\\') === false;
    $in8 = isset($a8['classes'][$cls]);
    if (!isset($a9['classes'][$cls])) {
        $moved = null;
        if (!$legacy) {
            $short = substr(strrchr('\\' . $cls, '\\'), 1);
            if (isset($shortIndex9[$short]) && count($shortIndex9[$short]) === 1) {
                $moved = $shortIndex9[$short][0];
            }
        }
        $data['classes'][$cls] = [$in8 ? '9.0' : '8.0', $moved];
        continue;
    }
    if ($legacy) {
        $e17 = effectiveMethods($a17, $cls);
        $e8 = effectiveMethods($a8, $cls);
        $e9 = effectiveMethods($a9, $cls);
        foreach (array_merge($e17, $e8) as $lc => $m) {
            if (!isset($e9[$lc])) {
                $data['methods'][$cls][$lc] = [$m[0], $m[1], isset($e8[$lc]) ? '9.0' : '8.0'];
                if (!isset($all9Methods[$lc])) {
                    $data['uniqueMethodNames'][$lc] = $m[0];
                }
            }
        }
        $oc = array_unique(array_merge(isset($a17['classes'][$cls]) ? $a17['classes'][$cls]['consts'] : [], $in8 ? $a8['classes'][$cls]['consts'] : []));
        foreach ($oc as $const) {
            if (!in_array($const, $a9['classes'][$cls]['consts'], true)) {
                $data['consts'][$cls][$const] = ($in8 && in_array($const, $a8['classes'][$cls]['consts'], true)) ? '9.0' : '8.0';
            }
        }
        $data['extends'][$cls] = $a9['classes'][$cls]['extends'];
    } else {
        $oldM = array_merge(isset($a17['classes'][$cls]) ? $a17['classes'][$cls]['methods'] : [], $in8 ? $a8['classes'][$cls]['methods'] : []);
        foreach ($oldM as $lc => $m) {
            if ($m[2] === 'public' && !isset($a9['classes'][$cls]['methods'][$lc])) {
                $data['namespacedMethods'][$cls][$lc] = [$m[0], $m[1], ($in8 && isset($a8['classes'][$cls]['methods'][$lc])) ? '9.0' : '8.0'];
            }
        }
    }
}

$h9 = array_change_key_case(array_flip($a9['hooks']));
$h8 = array_change_key_case(array_flip($a8['hooks']));
foreach (array_unique(array_merge($a17['hooks'], $a8['hooks'])) as $h) {
    if (!isset($h9[strtolower($h)])) {
        $data['hooks'][strtolower($h)] = [$h, isset($h8[strtolower($h)]) ? '9.0' : '8.0'];
    }
}
ksort($data['uniqueMethodNames']);

$file = dirname(__DIR__) . '/data/removed-api.php';
@mkdir(dirname($file), 0777, true);
$header = <<<'PHP'
<?php
/**
 * Base de connaissances — Version 1.0.0
 *
 * La version ci-dessus provient de la constante PS9COMPATIBLE_DATA_VERSION du
 * scanner (source unique de vérité) : ce fichier est généré, ne le modifiez pas
 * à la main. Régénérez-le avec tools/build-data.php.
 *
 * DESCRIPTION GÉNÉRALE :
 * Ce fichier contient la liste de ce qui a disparu de l'API publique du core
 * PrestaShop, avec la version dans laquelle l'élément a disparu. Il est chargé
 * par Ps9Scanner::loadKnowledge() et alimente toutes les vérifications de
 * compatibilité du scanner.
 *
 * CONTENU :
 *   - classes supprimées (erreur)
 *   - méthodes supprimées, globales et par namespace (erreur)
 *   - constantes de classe supprimées (erreur)
 *   - hooks supprimés (avertissement)
 *   - présentateurs déplacés, avec leur nouveau namespace (erreur)
 *
 * @author    Thierry Laval <https://thierrylaval.dev/>
 * @copyright 2007-2026 Thierry Laval
 * @license   http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 * @version   1.0.0
 * @package   Ps9Compatible
 *
 * GÉNÉRÉ PAR :
 *   php tools/build-data.php <src-1.7.8> <src-8.2> <src-9.0>
 *
 * Sources comparées : PrestaShop 1.7.8, 8.2 et 9.0.
 */
PHP;
file_put_contents($file, $header . "\nreturn " . var_export($data, true) . ";\n");
fprintf(
    STDERR,
    "Wrote %s: %d removed classes, %d classes with removed methods, %d removed hooks.\n",
    $file,
    count($data['classes']),
    count($data['methods']) + count($data['namespacedMethods']),
    count($data['hooks'])
);
