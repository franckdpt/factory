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
                primary: colors.blue,
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
