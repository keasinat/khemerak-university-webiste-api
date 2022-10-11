import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/adminlte.css',
                'resources/plugins/fontawesome-free/css/all.min.css',
                'resources/plugins/jquery/jquery.min.js',
                'resources/plugins/bootstrap/js/bootstrap.bundle.min.js',
                'resources/js/adminlte.min.js',
            ],
            refresh: true,
        }),
    ],
});
