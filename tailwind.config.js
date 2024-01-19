/** @type {import('tailwindcss').Config} */
export default {
    darkMode: 'class',
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        screens: {
            'ss': '320px',
            'sm': '640px',
            'md': '768px',
            'lg': '1024px',
            'xl': '1280px',
        },
        colors: {
            // 60 %
            "primary-light": "#E0E0E0",
            "primary-dark": "#212121",
            //
            // 30 %
            "secondary-light": "#F5F5F5",
            "secondary-dark": "#353535",
            //
            // 10 %
            "accent-light": "#940000",
            "accent-dark": "#FFB3B3",
            //
            'transparent': '#00000000',
        },
    },
}

