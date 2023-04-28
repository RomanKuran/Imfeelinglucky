import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/sass/app.scss',
                'resources/js/app.js',
                'resources/sass/imfeelinglucky.scss',
                'resources/js/imfeelinglucky.js',
                'resources/js/history.js',
                'resources/js/admin/pages/users/users.js',
                'resources/sass/admin/pages/users/users.scss',
            ],
            refresh: true,
        }),
    ],
});
