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
                primary: "#fccd12",
                secondary: "#f27823",
                tertiary: "#921f1b",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
