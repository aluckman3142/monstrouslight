/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  theme: {

    extend: {
        colors: {
      'primary': '#8521DE',
      'secondary': '#10B981',
    },
      spacing: {
        '92': '23rem',
        '96': '24rem',
        '112': '28rem',
        '120': '30rem',
        '128': '32rem',
        '140': '35rem',
        '180': '45rem',
        '360': '90rem',

      },

      // that is animation class
      animation: {
        fade: 'fadeOut 5s ease-in-out',
      },

      // that is actual animation
      keyframes: theme => ({
        fadeOut: {
          '0%': { backgroundColor: theme('colors.red.300') },
          '100%': { backgroundColor: theme('colors.transparent') },
        },
      }),
    }
  },
  plugins: [],
}
