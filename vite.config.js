import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
<<<<<<< HEAD
                'resources/css/app.css',
=======
                'resources/sass/app.scss',
>>>>>>> aa49d920e4b842ef0fcf84891abdabe605afddc6
                'resources/js/app.js',
            ],
            refresh: true,
        }),
    ],
});
