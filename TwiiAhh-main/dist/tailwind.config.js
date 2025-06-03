const colors = require("tailwindcss/colors");

module.exports = {
  purge: [],
  darkMode: 'class',
  content: ["./dist/**/*.{html,js}"], 
  theme: {
    screens: {
      sm: '576px',
      md: '768px',
      lg: '992px',
      xl: '1200px'
    },
    container: {
      center: true,
      padding: '1rem'
    },
    extend: {
      fontFamily: {
        poppins: "'Poppins', sans-serif",
        roboto: "'Roboto', sans-serif",
        saintregus: "'SaintRegus', sans-serif",
      },
      size: {
        68: '68px',
      },
      colors: {
        primary: "#CCFF02",
        secondary: "#0768EA",
        teritary: "#FFFFFF",
        black: "#010000"
      },
      fontSize: {
        '10px': '10px',
      }
    },
  },
  variants: {
    extend: {
      display: ['group-hover'],
      visibility: ['group-hover']
    },
  },
  plugins: [
    require('@tailwindcss/forms'),
  ],
}
