/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.{blade.php,js,vue}',
  ],
  theme: {
    extend: {
      colors: {
        black: '#010101',
        blue: '#83CBD4',
        green: '#88C286',
        rose: '#F37F73',
        white: '#FFFDF4',
        yellow: '#FCEDA9',
      },
      fontFamily: {
        barlow: ["'Barlow Condensed'", 'sans-serif'],
      },
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
    require('@tailwindcss/typography'),
  ],
};
