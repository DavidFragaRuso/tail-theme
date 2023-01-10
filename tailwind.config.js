/** @type {import('tailwindcss').Config} */

const customColors = {
  primary: { 
    DEFAULT: '#2aa7e1'
  },
  secondary: {
    DEFAULT: '#d12ad4'
  },
  gray: {
    100: '#f5f5f5',
    200: '#ededed',
    300: '#dedede',
    400: '#878787',
    500: '#b5b5b5',
    600: '#8f8e8f',
    700: '#696969',
    800: '#3d3d3d',
    900: '#232323'
  },
};

const plugin = require('tailwindcss/plugin');

module.exports = {
  content: [
    './inc/post_filter.php',
    './template-parts/**/*.php',
    './template-parts/*.php',
    './src/**/*.sass',
    './404.php',
    './archive.php',
    './comments.php',
    './footer.php',
    './front-page.php',
    './header.php',
    './index.php',
    './page.php',
    './search.php',
    './sidebar.php',
    './single.php', 
  ],
  theme: {
    container: {
      center: true,
      padding: "1.5rem"
    },
    screens: {
      sm: '480px',
      md: '768px',
      lg: '1024px',
      xl: '1440px',
    },
    extend: {
      fontSize: {
        'xs': '14px',
        'sm': '16px',
        'base': '18px',
        'lg': '22px',
        'xl': '26px',
        '2xl': '40px'
      },
      fontFamily: {
        display: [ 'DM Sans Bold', 'sans-serif' ],
        body: [ 'DM Sans', 'sans-serif' ]
      },
      colors: {
        ...customColors
      },
      textColor: {
          ...customColors
      },
      backgroundColor: {
          ...customColors
      },
      inset: {
        "-full": "-100%"
      },
      zIndex: {
        "-10": "-10"
      },
      textShadow: {
        DEFAULT: '1px 1px 1px rgba(0, 0, 0, 1)'
      }
    },
  },
  plugins: [
    plugin(function({matchUtilities, theme}) {
      matchUtilities(
        {
          'text-shadow': (value) => ({
            textShadow: value,
          }),
        },
        { values: theme('textShadow') }
      )
    }),  
  ],
}
