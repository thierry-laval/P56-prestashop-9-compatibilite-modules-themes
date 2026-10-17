<?php
/**
 * Table de symboles : namespaces, imports, classes, méthodes et surcharges
 *
 * Le scanner d'origine analysait chaque usage de méthode en repartant de zéro,
 * ce qui l'obligeait à deviner à quelle classe appartenait un appel. Cette classe
 * construit à la place une carte complète du fichier en une seule passe :
 *
 *   - le namespace courant et les alias déclarés par use ;
 *   - les classes, interfaces, traits et énumérations, avec leur parent ;
 *   - les méthodes définies dans chaque classe, pour ne jamais signaler un appel
 *     vers une méthode écrite par le module lui-même ;
 *   - les hooks enregistrés dans install() et uninstall() ;
 *   - les références à des classes du core, avec leur contexte d'écriture.
 *
 * La résolution d'héritage consulte ensuite cette carte, puis la base de
 * connaissances PrestaShop, pour savoir si une méthode appelée provient d'une
 * classe supprimée en PrestaShop 9.
 *
 * @author    Thierry Laval <https://thierrylaval.dev/>
 * @copyright 2007-2026 Thierry Laval
 * @license   http://opensource.org/licenses/afl-3.0.php Academic Free License (AFL 3.0)
 * @version   2.0.0
 * @package   Ps9Compatible
 */

final class Ps9SymbolTable
{
    /** Namespace courant du fichier analysé. */
    private $namespace = '';

    /** Alias use : clé = nom court en minuscules, valeur = nom complet. */
    private $imports = [];

    /** Classes analysées : nom en minuscules => [nom, parent, méthodes, estOverride]. */
    private $classes = [];

    /** Références à des classes du core, avec contexte. */
    private $references = [];

    /** Hooks enregistrés, avec la ligne où ils le sont. */
    private $hooks = [];

    /** Profondeur d'accolade courante, utilisée pour délimiter les corps de méthode. */
    private $depth = 0;

    /**
     * Construit la table de symboles à partir de la liste de tokens nettoyée.
     *
     * @param array  $tokens     Tokens produits par Ps9Tokenizer.
     * @param string $relativePath Chemin relatif, pour détecter les surcharges.
     */
    public function __construct(array $tokens, $relativePath = '')
    {
        $this->isOverride = (bool) preg_match('#(^|/)override/#', $relativePath);
        $this->build($tokens);
    }

    /**
     * Construit la table de symboles à partir de la liste de tokens nettoyée.
     *
     * @param array $tokens Tokens produits par Ps9Tokenizer.
     */
    private function build(array $tokens)
    {
        $count = count($tokens);
        $current = null;      // Classe en cours d'analyse.
        $pending = null;      // Méthode dont on attend l'accolade ouvrante.
        $classDepth = 0;      // Profondeur à laquelle la classe courante a commencé.
        $inFunction = 0;      // Profondeur à laquelle la fonction courante a commencé.
        $inHook = false;      // Vrai pendant l'exécution d'install()/uninstall().

        for ($i = 0; $i < $count; ++$i) {
            $token = $tokens[$i];
            $text = $token['text'];
            $id = $token['id'];

            if ($id === null) {
                if ($text === '{' || $text === '[' || $text === '(') {
                    ++$this->depth;
                    // Une methode n'est enregistree QUE sur l'accolade ouvrante
                    // de son corps. Sur une parenthese — celle des parametres —
                    // rien ne doit etre consomme : l'ancien code remettait
                    // $pending a null des « ( », ce qui jetait la methode avant
                    // meme d'avoir vu son corps. Consequence : aucune methode
                    // n'etait jamais declaree, et les surcharges comme les
                    // hooks n'etaient plus detectes.
                    if ($pending !== null && $text === '{') {
                        $this->classes[$pending['class']]['methods'][$pending['name']] = [
                            'line' => $pending['line'],
                            // Nom tel qu'ecrit dans le code : la cle est en
                            // minuscules, mais le rapport doit afficher la casse
                            // reelle (getValidationRules, pas getvalidationrules).
                            'real' => $pending['real'],
                            'static' => $pending['static'],
                            'visibility' => $pending['visibility'],
                            'depth' => $this->depth,
                        ];
                        $pending = null;
                    }
                } elseif ($text === '}' || $text === ']' || $text === ')') {
                    if ($text === '}') {
                        if ($current !== null && $this->depth === $classDepth) {
                            $current = null;
                            $inFunction = 0;
                        } elseif ($inFunction && $this->depth === $inFunction) {
                            $inFunction = 0;
                            $inHook = false;
                        }
                    }
                    --$this->depth;
                }
                continue;
            }

            if ($id === T_CURLY_OPEN || $id === T_DOLLAR_OPEN_CURLY_BRACES) {
                ++$this->depth;
                continue;
            }

            if ($id === T_NAMESPACE) {
                $this->namespace = $this->readName($tokens, $i);
                continue;
            }

            if ($id === T_USE && $this->depth === 0) {
                $i = $this->readImports($tokens, $i);
                continue;
            }

            if ($id === T_CLASS || $id === T_INTERFACE || $id === T_TRAIT || $id === T_ENUM) {
                // Un T_CLASS peut désigner un objet anonyme : dans ce cas il n'a pas de nom.
                $j = $i + 1;
                if (!isset($tokens[$j]) || $tokens[$j]['id'] !== T_STRING) {
                    continue;
                }
                $name = $tokens[$j]['text'];
                $parent = '';
                for ($k = $j + 1; $k < $count && $tokens[$k]['text'] !== '{' && $tokens[$k]['text'] !== ';'; ++$k) {
                    if ($tokens[$k]['id'] === T_EXTENDS) {
                        $parent = $this->resolveName($this->readName($tokens, $k), $this->namespace, $this->imports);
                        break;
                    }
                }
                $key = strtolower($name);
                $this->classes[$key] = [
                    'name' => $name,
                    'parent' => $parent,
                    'methods' => [],
                    'override' => $this->isOverride,
                    'line' => $token['line'],
                ];
                $current = $key;
                $classDepth = $this->depth;
                continue;
            }

            if ($id === T_FUNCTION) {
                $j = $i + 1;
                if (!isset($tokens[$j]) || $tokens[$j]['id'] !== T_STRING) {
                    continue;
                }
                $name = $tokens[$j]['text'];
                $pending = [
                    'name' => strtolower($name),
                    'real' => $name,
                    'line' => $tokens[$j]['line'],
                    'class' => $current,
                    'static' => $this->looksStatic($tokens, $i),
                    'visibility' => $this->readVisibility($tokens, $i),
                ];
                if ($current === null) {
                    // Fonction libre : elle n'appartient à aucune classe.
                    $this->classes['@fonctions']['methods'][$pending['name']] = [
                        'line' => $pending['line'],
                        'static' => false,
                        'visibility' => 'public',
                        'depth' => $this->depth + 1,
                    ];
                    $pending = null;
                } elseif (strpos(strtolower($name), 'hook') === 0 && strlen($name) > 4) {
                    // Declaration d'une methode hookXxx() : le module implemente
                    // ce hook. La detection se fait ici, a la declaration, et non
                    // a l'interieur de install() : une methode hookXxx() peut
                    // etre definie n'importe ou dans la classe. C'est ce qui
                    // manquait, aucun hook declare n'etait remonte.
                    $this->hooks[] = [
                        'name' => substr($name, 4),
                        'line' => $tokens[$j]['line'],
                    ];
                }
                continue;
            }

            // Appel $this->registerHook('displayTop') : le nom du hook est une
            // chaine litterale, pas un T_STRING. Sans ce traitement, un hook
            // mort enregistre via registerHook() passait totalement inapercu.
            if (
                $id === T_CONSTANT_ENCAPSED_STRING
                && $i > 1
                && $tokens[$i - 1]['id'] === null
                && $tokens[$i - 1]['text'] === '('
                && $tokens[$i - 2]['id'] === T_STRING
                && strtolower($tokens[$i - 2]['text']) === 'registerhook'
            ) {
                $hookName = trim($text, "'\"");
                if ($hookName !== '') {
                    $this->hooks[] = [
                        'name' => $hookName,
                        'line' => $token['line'],
                    ];
                }
                continue;
            }

            // Références de classe : new Foo(), Foo::bar(), Foo::class, extends Foo.
            if ($id === T_STRING || $id === T_NAME_QUALIFIED || $id === T_NAME_FULLY_QUALIFIED) {
                $prev = $i > 0 ? $tokens[$i - 1] : null;
                $next = isset($tokens[$i + 1]) ? $tokens[$i + 1] : null;
                if ($prev && in_array($prev['id'], [T_NEW, T_EXTENDS, T_IMPLEMENTS, T_INSTANCEOF], true)) {
                    $this->references[] = [
                        'name' => $this->resolveName($text, $this->namespace, $this->imports),
                        'short' => $this->shortName($this->resolveName($text, $this->namespace, $this->imports)),
                        'line' => $token['line'],
                        'context' => 'instantiation',
                    ];
                } elseif ($next && $next['id'] === T_DOUBLE_COLON) {
                    $this->references[] = [
                        'name' => $this->resolveName($text, $this->namespace, $this->imports),
                        'short' => $this->shortName($this->resolveName($text, $this->namespace, $this->imports)),
                        'line' => $token['line'],
                        'context' => 'static',
                    ];
                }
            }
        }
    }

    /**
     * Lit un nom de classe complet en partant d'un token de déclaration.
     *
     * @param  array $tokens Liste de tokens.
     * @param  int   $index  Index du token de déclaration (namespace, extends...).
     * @return string Nom lu, chaîne vide si aucun nom ne suit.
     */
    private function readName(array $tokens, $index)
    {
        $name = '';
        $count = count($tokens);
        for ($j = $index + 1; $j < $count; ++$j) {
            $id = $tokens[$j]['id'];
            if ($id === T_STRING || $id === T_NS_SEPARATOR || $id === T_NAME_QUALIFIED || $id === T_NAME_FULLY_QUALIFIED) {
                $name .= $tokens[$j]['text'];
                continue;
            }
            break;
        }

        return $name;
    }

    /**
     * Lit une liste d'imports use et les enregistre.
     *
     * @param  array $tokens Liste de tokens.
     * @param  int   $index  Index du token T_USE.
     * @return int Dernier index consommé.
     */
    private function readImports(array $tokens, $index)
    {
        $count = count($tokens);
        $statement = [];
        for ($j = $index + 1; $j < $count && $tokens[$j]['text'] !== ';'; ++$j) {
            $statement[] = $tokens[$j];
        }
        $buffer = '';
        foreach ($statement as $token) {
            $buffer .= $token['text'];
        }
        // Forme compacte : use Foo\{Bar, Baz};
        if (preg_match('/^(.*?)\\\\\?\\{(.*)\\}$/s', $buffer, $matches)) {
            foreach (explode(',', $matches[2]) as $part) {
                $full = trim($matches[1], '\\') . '\\' . trim($part);
                $this->registerImport($full);
            }

            return $j;
        }
        foreach (explode(',', $buffer) as $part) {
            $this->registerImport(trim($part));
        }

        return $j;
    }

    /**
     * Enregistre un import use, en tenant compte des alias éventuels.
     *
     * @param string $import Déclaration, éventuellement suivie de « as Alias ».
     */
    private function registerImport($import)
    {
        $import = trim($import);
        if ($import === '' || stripos($import, 'function ') === 0 || stripos($import, 'const ') === 0) {
            return;
        }
        $parts = preg_split('/\s+as\s+/i', $import);
        $full = trim($parts[0], '\\');
        $short = isset($parts[1]) ? trim($parts[1]) : $this->shortName($full);
        if ($short !== '') {
            $this->imports[strtolower($short)] = $full;
        }
    }

    /**
     * Résout un nom écrit dans le code vers son nom complet, en tenant compte
     * du namespace courant et des imports.
     *
     * @param  string $name      Nom tel qu'écrit dans le fichier.
     * @param  string $namespace Namespace courant.
     * @param  array  $imports   Table des imports.
     * @return string Nom résolu, sans barre oblique initiale.
     */
    public static function resolveName($name, $namespace, array $imports)
    {
        $name = trim($name);
        if ($name === '') {
            return '';
        }
        // Nom déjà absolu : rien à résoudre.
        if (strpos($name, '\\') === 0) {
            return ltrim($name, '\\');
        }
        $first = strpos($name, '\\');
        $head = strtolower($first === false ? $name : substr($name, 0, $first));
        if (isset($imports[$head])) {
            $tail = $first === false ? '' : substr($name, $first);

            return ltrim($imports[$head], '\\') . $tail;
        }
        if ($namespace !== '' && stripos($name, 'PrestaShop') !== 0) {
            return $namespace . '\\' . $name;
        }

        return $name;
    }

    /**
     * Extrait le dernier segment d'un nom complet de classe.
     *
     * @param  string $name Nom complet.
     * @return string Nom court.
     */
    private function shortName($name)
    {
        $name = rtrim($name, '\\');
        $pos = strrpos($name, '\\');

        return $pos === false ? $name : substr($name, $pos + 1);
    }

    /**
     * Détermine si la fonction rencontrée est déclarée statique, en remontant
     * la liste des modificateurs qui la précèdent.
     *
     * @param  array $tokens Liste de tokens.
     * @param  int   $index  Index du token T_FUNCTION.
     * @return bool Vrai si le mot-clé static précède la fonction.
     */
    private function looksStatic(array $tokens, $index)
    {
        for ($j = $index - 1; $j >= 0; --$j) {
            $id = $tokens[$j]['id'];
            if ($id === T_STATIC) {
                return true;
            }
            if ($id === null) {
                break;
            }
            if (!in_array($id, [T_WHITESPACE, T_PUBLIC, T_PROTECTED, T_PRIVATE, T_ABSTRACT, T_FINAL], true)) {
                break;
            }
        }

        return false;
    }

    /**
     * Lit la visibilité de la fonction qui suit.
     *
     * @param  array $tokens Liste de tokens.
     * @param  int   $index  Index du token T_FUNCTION.
     * @return string Visibilité détectée, « public » par défaut.
     */
    private function readVisibility(array $tokens, $index)
    {
        for ($j = $index - 1; $j >= 0; --$j) {
            $id = $tokens[$j]['id'];
            if ($id === T_PUBLIC) {
                return 'public';
            }
            if ($id === T_PROTECTED) {
                return 'protected';
            }
            if ($id === T_PRIVATE) {
                return 'private';
            }
            if ($id === null) {
                break;
            }
            if (!in_array($id, [T_WHITESPACE, T_STATIC, T_ABSTRACT, T_FINAL], true)) {
                break;
            }
        }

        return 'public';
    }

    /**
     * Indique si une méthode est définie dans les classes analysées par ce fichier.
     *
     * @param  string $class  Nom court de la classe en minuscules.
     * @param  string $method Nom de la méthode en minuscules.
     * @return bool Vrai si la méthode est écrite dans le fichier.
     */
    public function hasOwnMethod($class, $method)
    {
        $class = strtolower($class);
        $method = strtolower($method);
        if (isset($this->classes[$class]['methods'][$method])) {
            return true;
        }

        return isset($this->classes['@fonctions']['methods'][$method]);
    }

    /**
     * Renvoie la définition d'une classe analysée dans ce fichier.
     *
     * @param  string $class Nom court de la classe en minuscules.
     * @return array|null Définition, ou null si la classe n'est pas déclarée ici.
     */
    public function classDefinition($class)
    {
        $class = strtolower($class);

        return isset($this->classes[$class]) ? $this->classes[$class] : null;
    }

    /**
     * Remonte la chaîne d'héritage déclarée dans ce fichier pour trouver la
     * classe qui définit réellement une méthode. Le parcours s'arrête dès
     * qu'une classe n'est plus déclarée localement, car la suite de la chaîne
     * appartient au core ou au framework.
     *
     * @param  string $class  Nom court de la classe de départ en minuscules.
     * @param  string $method Nom de la méthode recherchée en minuscules.
     * @return string Nom court de la classe qui définit la méthode, ou chaîne vide.
     */
    public function ownerOfMethod($class, $method)
    {
        $class = strtolower($class);
        $method = strtolower($method);
        $guard = 0;
        while ($class !== '' && $guard++ < 20) {
            if (isset($this->classes[$class]['methods'][$method])) {
                return $this->classes[$class]['name'];
            }
            if (!isset($this->classes[$class])) {
                break;
            }
            $parent = $this->classes[$class]['parent'];
            if ($parent === '') {
                break;
            }
            $class = strtolower($this->shortName($parent));
        }

        return '';
    }

    /**
     * Indique si un nom court de classe a été vu dans ce fichier (déclaration ou usage).
     *
     * @param  string $name Nom court en minuscules.
     * @return bool Vrai si le nom apparaît.
     */
    public function knowsClass($name)
    {
        return isset($this->classes[strtolower($name)]);
    }

    /** Liste des classes déclarées dans le fichier analysé. */
    public function declaredClasses()
    {
        $out = [];
        foreach ($this->classes as $key => $definition) {
            if ($key === '@fonctions') {
                continue;
            }
            $out[] = $definition['name'];
        }

        return $out;
    }

    /** Références de classes collectées, dans l'ordre du fichier. */
    public function references()
    {
        return $this->references;
    }

    /** Hooks enregistrés dans install() ou uninstall(). */
    public function hooks()
    {
        return $this->hooks;
    }

    /** Imports use déclarés, pour l'affichage de diagnostic. */
    public function imports()
    {
        return $this->imports;
    }
}
