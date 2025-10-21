import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css', 
                'resources/css/sh-sidebar.css',
                'resources/css/meals-filters.css',
                'resources/css/meal-plan-forms.css',
                'resources/js/app.js',
                'resources/js/sh-sidebar.js',
                'resources/js/meal-ingredients.js',
                'resources/js/meal-plan-form.js'
            ],
            refresh: true,
        }),
    ],
    css: {
        devSourcemap: true,
    }
});
