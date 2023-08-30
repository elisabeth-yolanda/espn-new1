import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import vue from '@vitejs/plugin-vue';
import glob from 'glob';

export default defineConfig({
    plugins: [
        vue({
            template: {
                compilerOptions: {
                  compatConfig: {
                    MODE: 2
                  },
                },
                transformAssetUrls: {
                    includeAbsolute: false
                 }
            }
        }),
        laravel({
            input: ['resources/sass/app.scss', 'resources/js/app.js'],
            refresh: true,
        }),
        // {
        //     name: 'blade',
        //     handleHotUpdate({ file, server }) {
        //         if (file.endsWith('.vue')) {
        //             server.ws.send({
        //                 type: 'full-reload',
        //                 path: '*',
        //             });
        //         }
        //     },
        // }
    ],
    resolve: {
        alias: {
          vue: '@vue/compat'
        },
    },
});
