const colors = require("tailwindcss/colors");

module.exports = {
    purge: [
        "./resources/**/*.scss",
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
    ],

    darkMode: false,

    theme: {
        extend: {
            colors: {
                primary: colors.pink,
            },
        },
    },

    variants: {
        extend: {
            opacity: ["disabled"],
            cursor: ["disabled"],
        },
    },

    plugins: [
        require('@tailwindcss/forms'),
    ],
}
