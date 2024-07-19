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
        cdsblue: '#0088ff',
        cdsgray: '#E8E8E8',
      },
    },
  },
  plugins: [],
}

