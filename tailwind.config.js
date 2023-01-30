const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
                /*poppins: ['poppins',...defaultTheme.fontFamily.sans],
                poppinsbold: ['poppinsbold',...defaultTheme.fontFamily.sans],
                poppinslight: ['poppinslight',...defaultTheme.fontFamily.sans],
                poppinssemibold: ['poppinssemibold',...defaultTheme.fontFamily.sans],
                poppinsregular: ['poppinsregular',...defaultTheme.fontFamily.sans]*/
            },
            colors : {
                'primary' : '#7E1FF6',
                'placeholder' : '#34353c',
                'active-nav' : '#EEE1fF',
                'nav-gray' : '#34353c',
                'gray-bg' : '#F7F7F7',
                'light-gray-bg' : '#F1F4F7',
                'dark-gray' : '#979797',
                'gray' : '#777777',
                'lightgray' : '#bbbbbb',
                'ultralightgray' : '#e0e0e0',
            },
        },
    },

    plugins: [require('@tailwindcss/forms')],
};
