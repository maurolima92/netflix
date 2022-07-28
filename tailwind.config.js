const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    theme: {
        extend: {
            backgroundImage:{
                'bcklogin': "linear-gradient(0deg,rgba(0,0,0,.8) 0,transparent 40%,transparent 75%,rgba(0,0,0,.8)),url('/storage/app/public/appimg/bck-login.jpg');",
            },
            fontFamily: {
                sans: ['Helvetica Neue', ...defaultTheme.fontFamily.sans],
                //sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            colors:{
                'primary' : '#e50914',
                'darktransparent': 'rgba(0,0,0,.75)',
            },
        },
    },

    plugins: [
        require('@tailwindcss/forms')
    ],
};
