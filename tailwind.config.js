/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
    ],
    theme: {
        extend: {
            colors: {
                navy: {
                    950: '#081420',
                    900: '#0c1c2e',
                    800: '#13293f',
                    700: '#1c3a56',
                    600: '#2c5273',
                },
                slate: {
                    DEFAULT: '#4c5c6b',
                    soft: '#7c8b98',
                },
                paper: {
                    DEFAULT: '#ffffff',
                    tint: '#f2f4f6',
                },
                line: '#dfe4e8',
                amber: {
                    DEFAULT: '#c9822e',
                    dark: '#a3671f',
                    light: '#dd9743',
                    tint: '#f4e6d3',
                },
            },
            fontFamily: {
                sans: ['Archivo', 'ui-sans-serif', 'system-ui', 'sans-serif'],
                mono: ['"JetBrains Mono"', 'ui-monospace', '"SFMono-Regular"', 'monospace'],
            },
            maxWidth: {
                wrap: '1180px',
            },
            borderRadius: {
                DEFAULT: '3px',
            },
        },
    },
    plugins: [],
};
