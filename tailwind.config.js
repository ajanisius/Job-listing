/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],
    theme: {
        extend: {
            colors: {
                black: "#060606",
            },
            fontFamily: {
                hanken: ["Hanken Grotesk", "sans-serif"],
            },
            fontSize: {
                "2xs": ".625rem", //10px
                xxl: "2rem",
            },
        },
    },
    plugins: [],
};
