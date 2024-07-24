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
        cdsgray300: '#4D4D4F',
        cdsgray400: '#7A7A7B',
        cdsgray500: '#A6A6A7',
        cdsgray600: '#D3D3D3',
        cdsgray700: '#F2F2F2',
        cdsazuldark: '#42B5C',
        cdspurpura: '#771D82',
        cdscian: '#39CEE7',
        cdsgrisverde: '#8DADA5',
        cdsyellow: '#F5AD00',
        cdsorange: '#FF8300',
        cdsverde: '#75A328',
        cdsgrisverdedark: '#546D5A',
        cdsrosa: '#DF0060',
        cdsrojo: '#AA0000',
        "azul-oscuro-empresas": '#042B5C',
        "aqua-organismos-accesible": '#009CB7',
        "verde-claro-entidades-accesible": '#668E84',
        "amarillo-formacion-accesible": '#C28900',
        "naranja-innovacion-accesible": '#E57600',
        "verde-habitat-accesible": '#6D9A21',
        "verde-oscuro-campus":'#546D5A',
        "magenta-entretenimiento": '#DF0060',
      },
      height: {
        'screen': '100vh',
      },
      maxHeight: {
        'screen': '100vh',
      },
    },
  },
  plugins: [],
}

