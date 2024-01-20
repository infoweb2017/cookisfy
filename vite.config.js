import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/css/admin.css',
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/js/ingredientes.js',
                'resources/js/aceptar-cookies.js',
            ],
            refresh: true,
        }),
    ],
});
