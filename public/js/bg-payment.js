var theme;
var image;
var donation;

if (YappyCheckout.ACTIVAR === undefined || YappyCheckout.ACTIVAR === true) {
  setYappyButton();
}

function setYappyButton() {

  var themes = {
    brand: 'yappy-logo-brand.svg',
    dark: 'yappy-logo-dark.svg'
  }

  document.getElementsByTagName("head")[0].insertAdjacentHTML(
    "beforeend",
    "<link rel=\"stylesheet\" href=\"https://pagosbg.bgeneral.com/assets/css/styles.css\" />");

  theme = YappyCheckout.COLOR_DEL_BOTON ? YappyCheckout.COLOR_DEL_BOTON : 'brand';
  var logo = themes[theme];
  if (!logo) {
    logo = 'yappy-logo-light.svg';
  }

  image = `<img src="/assets/images/yappy.png" class="yappy-logo">`
  var textButton = YappyCheckout.DONACION ? 'Donar con&nbsp;' : 'Pagar con&nbsp;';

  document.getElementById('Yappy_Checkout_Button').classList.add('ecommerce', 'yappy', theme);
  document.getElementById('Yappy_Checkout_Button').innerHTML = textButton + image;

  document.getElementById('Yappy_Checkout_Button').addEventListener('click', function (e) {
    e.preventDefault(); // Cancel the native event
    document.getElementById('paymentForm').submit();
  });
}
