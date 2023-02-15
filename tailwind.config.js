/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './assets/**/*.js',
    './templates/*.html.twig',
    './templates/**/*.html.twig',
  ],
  theme: {
    extend: {
      container: {
        center: true,
        padding: '1rem',
        screens: {
          sm: '600px',
          md: '728px',
          lg: '984px',
          xl: '1240px',
        },
      },
      colors: {
        'color-white': '#f8f8f8',
        'color-black': '#000',
        'color-yellow': '#ffdb6e',
        'color-green': '#7dba5c',
        'color-gray': '#434242',
        'color-dark-gray': '#121212',
        'color-light-gray': '#4f4f4f',
      }
    },
  },
  plugins: [],
}
