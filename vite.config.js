import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import glob from 'fast-glob';

// automatically include all CSS, JS, and images
const cssFiles = glob.sync('resources/assets/css/**/*.css');
const jsFiles = glob.sync('resources/assets/js/**/*.js');
const cssfiles1 = glob.sync('resources/css/**/*.css');
const jsFiles1 = glob.sync('resources/js/**/*.js');
const imageFiles = glob.sync('resources/assets/img/**/*.{png,jpg,jpeg,gif,svg}');

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/css/app.css',
                ...cssfiles1,
                ...jsFiles1,
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
