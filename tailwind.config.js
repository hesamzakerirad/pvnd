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
                    50:  '#fff1eb',
                    100: '#ffd6c7',
                    200: '#ffb08f',
                    300: '#ff8a57',
                    400: '#ff6b2d',
                    500: '#ff4d00',
                    600: '#e64500',
                    700: '#bf3900',
                    800: '#992d00',
                    900: '#7a2400',
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
