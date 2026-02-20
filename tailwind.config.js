export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
        './vendor/filament/**/*.blade.php',
    ],

    theme: {
        extend: {
            colors: {
                primary: {
                    50:  '#fdebe6',
                    100: '#fbd6cd',
                    200: '#f6ad9b',
                    300: '#f28469',
                    400: '#ed8a5d',
                    500: '#E76F51', // base
                    600: '#cf5f46',
                    700: '#b7503c',
                    800: '#9f4031',
                    900: '#873126',
                },
                secondary: {
                    50:  '#e3f4f1',
                    100: '#c7e9e3',
                    200: '#9fd7cd',
                    300: '#77c5b7',
                    400: '#4fb3a1',
                    500: '#2A9D8F', // base
                    600: '#23867a',
                    700: '#1c6f65',
                    800: '#165850',
                    900: '#0f413b',
                },
            },
        },
    },

    plugins: [],
};
