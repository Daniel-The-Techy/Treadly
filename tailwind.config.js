const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        "./resources/**/*.js",
    ],

    theme: {
        extend: {
            colors: {
                primary: {"50":"#eff6ff","100":"#dbeafe","200":"#bfdbfe","300":"#93c5fd","400":"#60a5fa","500":"#3b82f6","600":"#2563eb","700":"#1d4ed8","800":"#1e40af","900":"#1e3a8a"},    
            brand: {
                50: '#eef6ff', 100: '#d9eaff', 200: '#bcd9ff', 300: '#91c2ff', 400: '#5ea2ff', 500: '#3b82f6', 600: '#2f6fe0', 700: '#2759b9', 800: '#224a96', 900: '#1e3a7a'
              }
              },

              boxShadow: {
                soft: '0 6px 24px -6px rgb(0 0 0 / 0.08)',
              },
              borderRadius: {
                '2xl': '1rem',
              },
              
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },

        },
        Proxima:['proxima_nova_rgregular']
    },

    plugins: [require('@tailwindcss/forms'), ('flowbite/plugin')],
};
