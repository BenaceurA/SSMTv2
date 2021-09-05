module.exports = {
  purge: [
    './resources/views/**/*.blade.php',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      fontSize: {
        'xs': '.45rem',
      }
    },
  },
  variants: {
    extend: {},
  },
  plugins: [],
}
