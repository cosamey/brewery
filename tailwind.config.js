const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.{blade.php,js,vue}',
    './vendor/filament/**/*.blade.php',
  ],
  darkMode: 'class',
  theme: {
    extend: {
      colors: {
        black: '#010101',
        blue: '#83CBD4',
        danger: colors.rose,
        green: '#88C286',
        primary: colors.blue,
        rose: '#F37F73',
        success: colors.green,
        warning: colors.yellow,
        white: '#FFFDF4',
        yellow: '#FCEDA9',
      },
      fontFamily: {
        barlow: ["'Barlow Condensed'", 'sans-serif'],
        inter: ['Inter', 'sans-serif'],
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
};
