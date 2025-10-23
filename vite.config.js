import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import path from 'path';
import glob from 'fast-glob';

const imageFiles = glob.sync('resources/assets/img/**/*.{png,jpg,jpeg,gif,svg}');

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/sh-sidebar.css',
                'resources/css/meals-filters.css',
                'resources/css/meal-plan-forms.css',
                'resources/css/frontoffice-save-buttons.css',
                'resources/js/app.js',
                'resources/js/sh-sidebar.js',
                'resources/js/meal-ingredients.js',
                'resources/js/meal-plan-form.js',
                ...imageFiles, // automatically add all images
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
