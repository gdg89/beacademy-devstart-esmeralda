/** @type {import('tailwindcss').Config} */
module.exports = {
    mode: "jit",
    content: ["./resources/**/*.blade.php", "./resources/**/*.{js,ts,vue}"],
    theme: {
        extend: {},
    },
    plugins: [require("daisyui"), require("tailwind-scrollbar")],
    daisyui: {
        themes: ["light", "dark", "corporate"],
    },
};
