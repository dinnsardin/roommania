import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';
import { VitePWA } from 'vite-plugin-pwa';

export default defineConfig({

    plugins: [

        laravel({

            input: [
                'resources/css/app.css',
                'resources/js/app.js'
            ],

            refresh: true,

        }),

        VitePWA({

            registerType: 'autoUpdate',

            manifest: {

                name: 'RoomMania',

                short_name: 'RoomMania',

                description:
                    'Fantasy Room Booking Management System',

                theme_color: '#7c3aed',

                background_color: '#2b1711',

                display: 'standalone',

                scope: '/',

                start_url: '/',

                icons: [

                    {
                        src: '/pwa-192.png',
                        sizes: '192x192',
                        type: 'image/png'
                    },

                    {
                        src: '/pwa-512.png',
                        sizes: '512x512',
                        type: 'image/png'
                    }

                ]

            }

        })

    ]

});