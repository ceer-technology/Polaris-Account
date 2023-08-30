const defaultTheme = require('tailwindcss/defaultTheme');

/** @type {import('tailwindcss').Config} */
module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Nunito', ...defaultTheme.fontFamily.sans],
            },
            boxShadow: {
                sm: '0 1px 2px 0 rgba(181, 181, 181, 0.2)',
                DEFAULT: '0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(181, 181, 181, 0.2)',
                md: '0 0 30px 0 rgba(145, 145, 145, 0.32)',
                lg: '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(181, 181, 181, 0.2)',
                xl: '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(181, 181, 181, 0.2)',
                '2xl': '0 25px 50px -12px rgba(181, 181, 181, 0.2))',
                '3xl': '0 35px 60px -15px rgba(181, 181, 181, 0.2)',
                inner: 'inset 0 2px 4px 0 rrgba(181, 181, 181, 0.2)',
                none: 'none',
            },
            animation: {
                // 动画的时间0.5s
                notification: 'notification 0.75s ease-in-out'
            },
            keyframes: {
                // 其他代码不变
                notification: {
                    '0%': {
                        transform: 'translateX(100%)',
                        opacity: 0
                    },
                    '60%': {
                        transform: 'translateX(-5%)',
                        opacity: 1
                    },
                    '80%': {
                        transform: 'translateX(5%)',
                        opacity: 1
                    },
                    '100%': {
                        transform: 'translateX(0)',
                        opacity: 1
                    }
                }
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
