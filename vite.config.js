import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import glob from 'fast-glob';

// automatically include all CSS, JS, and images
const cssFiles = glob.sync('resources/assets/css/**/*.css');
const jsFiles = glob.sync('resources/assets/js/**/*.js');
const imageFiles = glob.sync('resources/assets/img/**/*.{png,jpg,jpeg,gif,svg}');

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/assets/js/app.js',
                'resources/assets/css/app.css',
                ...cssFiles,
                ...jsFiles,
                ...imageFiles, // use imageFiles here
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            '@': path.resolve(__dirname, 'resources'),
        },
    },
    css: {
        devSourcemap: true,
    },
});
