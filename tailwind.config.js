const defaultTheme = require('tailwindcss/defaultTheme');
const colors = require('tailwindcss/colors') 

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/filament/**/*.blade.php', 
    ],

    theme: {
        extend: {
            fontFamily: {
                'DarkerGrotesque': ['Darker Grotesque', 'sans-serif']
            },
            colors: { 
              NFTF: {
                'green' : '#2DF540',
                'greenDark' : '#23C324',
              },
              danger: colors.rose,
              primary: {
                50: "#f1f8e9",
                100: "#ccff90",
                200: "#b2ff59",
                300: "#b2ff59",
                400: "#27e138",
                500: "#27e138", //
                600: "#27e138", //
                700: "#27e138", //
                800: "#23C324",
                900: "#23C324"
              },
              success: colors.green,
              warning: colors.yellow,
            },
            screens: {
              'lg': '1230px',
            },
            transitionProperty: {
              'margin': "margin"
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
        require('@tailwindcss/typography')
    ],
};
