const plugin = require('tailwindcss/plugin')

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
      },
    },
    colors: {
      'color-white': '#f7f1f0',
      'color-light-white': '#f2f2f2',
      'color-light-brown': '#c3a6a0',
      'color-brown': '#a15c38',
      'color-black-brown': '#262220',
      'color-red': '#bd1818',
    },
    screens: {
      xs: { min: '575px' },
      sm: { min: '640px' },
      md: { min: '898px' },
      lg: { min: '1024px' },
      xl: { min: '1280px' },
      xxl: { min: '1536px' }
    }
  },
  plugins: [
    plugin(function ({addBase, theme}) {
      addBase({
        'h1': { fontSize: theme('fontSize.4xl') },
        'h2': { fontSize: theme('fontSize.2xl') },
        'h3': { fontSize: theme('fontSize.lg') },
      })
    })
  ],
}
