import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import tailwindcss from '@tailwindcss/vite';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/css/site.css',
                'resources/css/cp.css',
                'resources/js/site.js',
                // 'resources/js/cp.js'
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
});
