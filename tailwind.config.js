import plugin from "tailwindcss/plugin";
import defaultTheme from "tailwindcss/defaultTheme";
import colors from "tailwindcss/colors";

import aspectRatio from "@tailwindcss/aspect-ratio";
import forms from "@tailwindcss/forms";
import typography from "@tailwindcss/typography";

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.{vue,js,ts,jsx,tsx}",
        "./node_modules/vue-tailwind-datepicker/**/*.js",
    ],
    darkMode: "class",
    theme: {
        extend: {
            fontFamily: {
                sans: ["Inter", ...defaultTheme.fontFamily.sans],
            },
            maxWidth: {
                "8xl": "90rem",
                "9xl": "105rem",
                "10xl": "120rem",
            },
            zIndex: {
                1: 1,
                60: 60,
                70: 70,
                80: 80,
                90: 90,
                100: 100,
            },
            typography: {
                DEFAULT: {
                    css: {
                        a: {
                            textDecoration: "none",
                            "&:hover": {
                                opacity: ".75",
                            },
                        },
                        img: {
                            borderRadius: defaultTheme.borderRadius.lg,
                        },
                    },
                },
            },
            colors: {
                "vtd-primary": colors.sky, // Light mode Datepicker color
                "vtd-secondary": colors.gray, // Dark mode Datepicker color
                'primary-50': 'rgb(var(--primary-50))',
                'primary-100': 'rgb(var(--primary-100))',
                'primary-200': 'rgb(var(--primary-200))',
                'primary-300': 'rgb(var(--primary-300))',
                'primary-400': 'rgb(var(--primary-400))',
                'primary-500': 'rgb(var(--primary-500))',
                'primary-600': 'rgb(var(--primary-600))',
                'primary-700': 'rgb(var(--primary-700))',
                'primary-800': 'rgb(var(--primary-800))',
                'primary-900': 'rgb(var(--primary-900))',
                'primary-950': 'rgb(var(--primary-950))',
                'surface-0': 'rgb(var(--surface-0))',
                'surface-50': 'rgb(var(--surface-50))',
                'surface-100': 'rgb(var(--surface-100))',
                'surface-200': 'rgb(var(--surface-200))',
                'surface-300': 'rgb(var(--surface-300))',
                'surface-400': 'rgb(var(--surface-400))',
                'surface-500': 'rgb(var(--surface-500))',
                'surface-600': 'rgb(var(--surface-600))',
                'surface-700': 'rgb(var(--surface-700))',
                'surface-800': 'rgb(var(--surface-800))',
                'surface-900': 'rgb(var(--surface-900))',
                'surface-950': 'rgb(var(--surface-950))'
            }
        },
    },
    plugins: [
        aspectRatio,
        forms,
        typography,
        plugin(function ({ addUtilities }) {
            const utilFormSwitch = {
                ".form-switch": {
                    border: "transparent",
                    "background-color": colors.gray[300],
                    "background-image":
                        "url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e\")",
                    "background-position": "left center",
                    "background-repeat": "no-repeat",
                    "background-size": "contain !important",
                    "vertical-align": "top",
                    "&:checked": {
                        border: "transparent",
                        "background-color": "currentColor",
                        "background-image":
                            "url(\"data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='-4 -4 8 8'%3e%3ccircle r='3' fill='%23fff'/%3e%3c/svg%3e\")",
                        "background-position": "right center",
                    },
                    "&:disabled, &:disabled + label": {
                        opacity: ".5",
                        cursor: "not-allowed",
                    },
                },
            };

            addUtilities(utilFormSwitch);
        }),
    ],
}

