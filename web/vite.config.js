import { defineConfig } from 'vite';

// Configuration requise par les paquets @php-wasm (voir README du paquet) :
//  - assetsInclude pour .dat / .so / .la
//  - optimizeDeps.exclude : sans cela le dev server pre-bundle le loader PHP
//    dans node_modules/.vite et new URL(...) resout au mauvais endroit (404 sur le .wasm)
//  - sortie ES modules : import.meta.url doit exister
//  - base relative pour fonctionner sur GitHub Pages (sous-chemin /repo/)
//
// Note 1 : l'app importe UNIQUEMENT @php-wasm/web-8-4. Passer par
// loadWebRuntime('8.x') ferait entrer les huit versions de PHP dans le bundle.
//
// Note 2 : php_8_4.js fait `import dependencyFilename from './x/php_8_4.wasm'`
// puis le passe a locateFile() : c'est une URL qu'il attend, pas un module
// instancie. On resout donc tout .wasm en `?url` pour que Vite l'emet comme
// fichier et renvoie son chemin, sans tenter de l'executer.
export default defineConfig({
  base: './',
  // public/ n'est pas recopié tel quel : public/img/ ferait doublon avec
  // l'image hachée par Vite (dist/assets/logo-*.png), et public/php/ n'est pas
  // un dossier statique classique (il est chargé en fetch par le moteur WASM
  // depuis ../php/). Le plugin copy-php-assets ci-dessous recopie donc
  // finement public/php/ vers dist/php/ après le build.
  publicDir: false,
  assetsInclude: [/\.dat$/, /\.so$/, /\.la$/, /\.wasm$/],
  optimizeDeps: {
    exclude: ['@php-wasm/web-8-4'],
  },
  plugins: [
    {
      name: 'php-wasm-as-url',
      enforce: 'pre',
      async resolveId(source, importer, options) {
        if (!source.endsWith('.wasm') || source.includes('?url')) {
          return null;
        }
        const resolved = await this.resolve(source, importer, {
          ...options,
          skipSelf: true,
        });
        if (!resolved) {
          return null;
        }
        return this.resolve(resolved.id + '?url', importer, {
          ...options,
          skipSelf: true,
        });
      },
    },
    {
      // public/php/ (scanner PHP copié par sync-assets) n'est pas un asset
      // importé par le bundle : il est lu en fetch à l'exécution depuis
      // '../php/'. Comme publicDir est désactivé, on le recopie ici.
      name: 'copy-php-assets',
      async writeBundle() {
        // .nojekyll : sans ce fichier, GitHub Pages passe le dépôt par Jekyll,
        // qui ignore les dossiers commençant par un underscore et peut casser
        // les assets. Le fichier est créé ici pour ne pas l'oublier au build.
        const { cp, mkdir, rm } = await import('node:fs/promises');
        const { existsSync } = await import('node:fs');
        const src = new URL('./public/php', import.meta.url);
        const dest = new URL('../docs/php', import.meta.url);
        if (!existsSync(src)) {
          throw new Error(
            'public/php/ est absent : lancez "npm run sync-assets" avant le build.'
          );
        }
        await rm(dest, { recursive: true, force: true });
        await mkdir(dest, { recursive: true });
        await cp(src, dest, { recursive: true });

        const { writeFile } = await import('node:fs/promises');
        await writeFile(new URL('../docs/.nojekyll', import.meta.url), '');
      },
    },
  ],
  build: {
    target: 'es2022',
    // Le build est publié par GitHub Pages depuis le dossier docs/ à la racine
    // du dépôt (Settings > Pages > Branch: main / folder: /docs). GitHub Pages
    // ne sert que du statique : il n'exécute aucun build, donc docs/ doit être
    // committé. C'est le seul dossier généré qui est versionné.
    outDir: '../docs',
    emptyOutDir: true,
    chunkSizeWarningLimit: 4096,
  },
});
