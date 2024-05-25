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
                secondary: '#C1C7B7',
                accent: '#CC5500',
                lightAccent: '#FFA07A',
                background: '#FFF5E1',
                text: '#2F4F4F',
                selectedText: '#1F3D3D',
                hoverText: '#3B6B6B',
            },

        },
    },

    plugins: [forms],
};
