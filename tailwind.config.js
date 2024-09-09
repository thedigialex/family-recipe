import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                primary: '#6B8E23',
                primaryDark: '#526d1b',
                secondary: '#C1C7B7',
                accent: '#CC5500',
                accentDark: '#a64500',
                background: '#FFE4AE',
                backgroundAccent: '#fff5e2',
                text: '#422D00',
                selectedText: '#1F3D3D',
                hoverText: '#755000',
            },

        },
    },

    plugins: [forms],
};
