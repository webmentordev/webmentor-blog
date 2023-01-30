/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.blade.php'
  ],
  theme: {
    screens: {
      'respon0': {
        'max': '1280px'
      },
      'respon1': {
        'max': '1020px'
      },
      'respon1-1': {
        'max': '900px'
      },
      'respon2': {
        'max': '750px'
      },
      'respon2-2': {
        'max': '700px'
      },
      'respon3': {
        'max': '530px'
      },
      'respon3-1': {
        'max': '490px'
      },
      'respon3-2': {
        'max': '420px'
      },
      'respon4': {
        'max': '390px'
      },
      
    },
    extend: {
      colors:{
        'main': '#006FFF',
        'dark': '#2C374B',
        'light': '#334156',
        'strong': '#1b2533',
        'dGreen': '#11393C'
      },
      animation: {
        'spin-slow': 'spin 3s linear infinite',
      }
    },
  },
  plugins: [],
}
