/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'primary' : "#0096ff",
        'secondary': '#838383',
        'default-background': '#f1f1f1'
      },
      screens: {
        '8x90': '890px',
        '10x70': '1070px',
      },
      fontFamily: {
        'poppins' : 'Poppins' 
      },
    },
  },
  plugins: [
      require('flowbite/plugin')
  ],
}