import vue from '@vitejs/plugin-vue';
import {resolve} from 'path';

const src = resolve(__dirname, './src');
const outDir = resolve(__dirname, 'dist');
const test = resolve(__dirname, 'test');

import {defineConfig} from 'vite'

export default defineConfig({
    define: {
        'process.env': {},
        // vue: JSON.stringify('_vue')
    },
    plugins: [vue()],
    resolve: {
        alias: {'@': src, '@test': test}
    },
    // optimizeDeps: {
    // exclude: ['lkt-table']
    // },
    build: {
        // lib: {
        //     entry: `${src}/index.ts`,
        //     name: 'LaminimCmsUI',
        //     fileName: 'build',
        //     formats: ['es']
        // },
        outDir,
        minify: true,
        rollupOptions: {
            external: [],
            output: {
                entryFileNames: `assets/index.js`,
                chunkFileNames: `assets/index-chunk.js`,
                assetFileNames: `assets/[name].[ext]`,
                globals: {
                    'lkt-http-client': 'LktHttpClient',
                    'lkt-box': 'LktBox',
                    // 'vue': '_Vue',
                },
                sourcemapExcludeSources: true,
                // manualChunks: {
                //     'lkt-table': ['lkt-table', 'lkt-table-page'],
                //     'lkt-modal': ['lkt-modal', 'lkt-modal-crud', 'lkt-modal-confirm'],
                //     'lkt-fields': ['lkt-field-text', 'lkt-field-textarea', 'lkt-field-switch', 'lkt-field-check'],
                // }
            }
        }
    }
});