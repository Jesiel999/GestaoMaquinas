import { defineConfig } from 'vite'
import laravel from 'laravel-vite-plugin'
import tailwindcss from '@tailwindcss/vite'

export default defineConfig({
    server: {
        host: '0.0.0.0',
        port: 5174,
        hmr: {
            host: '192.168.1.77',
            port: 5174,
            protocol: 'ws',
            clientPort: 5174,
            origin: 'http://192.168.1.77:5174',
        },
    },
    plugins: [
        laravel({
            input: [
                'resources/css/app.css',
                'resources/js/app.js',
                'resources/js/acesso.js',
            ],
            refresh: true,
        }),
        tailwindcss(),
    ],
})
