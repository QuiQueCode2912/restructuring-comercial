<!--<script type="text/javascript" src="/js/instascan.min.js"></script>-->
<div class="request-step" style="margin-top:0px;">
  <div class="container">
    <h4>Estás a punto de completar tu solicitud. <br>
      Por favor verifica que los datos sean correctos</h4>
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Nombre: <?php echo session()->get('first_name') ?>
          <a href="/cotizacion/datos-contacto#first_name">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Apellidos: <?php echo session()->get('last_name') ?>
          <a href="/cotizacion/datos-contacto#last_name">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Correo: <?php echo session()->get('email') ?>
          <a href="/cotizacion/datos-contacto#email">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Teléfono: <?php echo session()->get('phone') ?>
          <a href="/cotizacion/datos-contacto#phone">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Organización: <?php echo session()->get('company') ?>
          <a href="/cotizacion/datos-contacto#company">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          RUC: <?php echo session()->get('00N3m00000QQOde') ?>
          <a href="/cotizacion/datos-contacto#identification">Editar</a>
        </div>
      </div>
     <!-- <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Nacionalidad: 
          <?php 
          switch (session()->get('country_code')) {
            case "AF": echo "Afghanistan"; break;
            case "AX": echo "Aland Islands"; break;
            case "AL": echo "Albania"; break;
            case "DZ": echo "Algeria"; break;
            case "AD": echo "Andorra"; break;
            case "AO": echo "Angola"; break;
            case "AI": echo "Anguilla"; break;
            case "AQ": echo "Antarctica"; break;
            case "AG": echo "Antigua and Barbuda"; break;
            case "AR": echo "Argentina"; break;
            case "AM": echo "Armenia"; break;
            case "AW": echo "Aruba"; break;
            case "AU": echo "Australia"; break;
            case "AT": echo "Austria"; break;
            case "AZ": echo "Azerbaijan"; break;
            case "BS": echo "Bahamas"; break;
            case "BH": echo "Bahrain"; break;
            case "BD": echo "Bangladesh"; break;
            case "BB": echo "Barbados"; break;
            case "BY": echo "Belarus"; break;
            case "BE": echo "Belgium"; break;
            case "BZ": echo "Belize"; break;
            case "BJ": echo "Benin"; break;
            case "BM": echo "Bermuda"; break;
            case "BT": echo "Bhutan"; break;
            case "BO": echo "Bolivia, Plurinational State of"; break;
            case "BQ": echo "Bonaire, Sint Eustatius and Saba"; break;
            case "BA": echo "Bosnia and Herzegovina"; break;
            case "BW": echo "Botswana"; break;
            case "BV": echo "Bouvet Island"; break;
            case "BR": echo "Brazil"; break;
            case "IO": echo "British Indian Ocean Territory"; break;
            case "BN": echo "Brunei Darussalam"; break;
            case "BG": echo "Bulgaria"; break;
            case "BF": echo "Burkina Faso"; break;
            case "BI": echo "Burundi"; break;
            case "KH": echo "Cambodia"; break;
            case "CM": echo "Cameroon"; break;
            case "CA": echo "Canada"; break;
            case "CV": echo "Cape Verde"; break;
            case "KY": echo "Cayman Islands"; break;
            case "CF": echo "Central African Republic"; break;
            case "TD": echo "Chad"; break;
            case "CL": echo "Chile"; break;
            case "CN": echo "China"; break;
            case "CX": echo "Christmas Island"; break;
            case "CC": echo "Cocos (Keeling) Islands"; break;
            case "CO": echo "Colombia"; break;
            case "KM": echo "Comoros"; break;
            case "CG": echo "Congo"; break;
            case "CD": echo "Congo, the Democratic Republic of the"; break;
            case "CK": echo "Cook Islands"; break;
            case "CR": echo "Costa Rica"; break;
            case "CI": echo "Cote d&#39;Ivoire"; break;
            case "HR": echo "Croatia"; break;
            case "CU": echo "Cuba"; break;
            case "CW": echo "Curaçao"; break;
            case "CY": echo "Cyprus"; break;
            case "CZ": echo "Czech Republic"; break;
            case "DK": echo "Denmark"; break;
            case "DJ": echo "Djibouti"; break;
            case "DM": echo "Dominica"; break;
            case "DO": echo "Dominican Republic"; break;
            case "EC": echo "Ecuador"; break;
            case "EG": echo "Egypt"; break;
            case "SV": echo "El Salvador"; break;
            case "GQ": echo "Equatorial Guinea"; break;
            case "ER": echo "Eritrea"; break;
            case "EE": echo "Estonia"; break;
            case "ET": echo "Ethiopia"; break;
            case "FK": echo "Falkland Islands (Malvinas)"; break;
            case "FO": echo "Faroe Islands"; break;
            case "FJ": echo "Fiji"; break;
            case "FI": echo "Finland"; break;
            case "FR": echo "France"; break;
            case "GF": echo "French Guiana"; break;
            case "PF": echo "French Polynesia"; break;
            case "TF": echo "French Southern Territories"; break;
            case "GA": echo "Gabon"; break;
            case "GM": echo "Gambia"; break;
            case "GE": echo "Georgia"; break;
            case "DE": echo "Germany"; break;
            case "GH": echo "Ghana"; break;
            case "GI": echo "Gibraltar"; break;
            case "GR": echo "Greece"; break;
            case "GL": echo "Greenland"; break;
            case "GD": echo "Grenada"; break;
            case "GP": echo "Guadeloupe"; break;
            case "GT": echo "Guatemala"; break;
            case "GG": echo "Guernsey"; break;
            case "GN": echo "Guinea"; break;
            case "GW": echo "Guinea-Bissau"; break;
            case "GY": echo "Guyana"; break;
            case "HT": echo "Haiti"; break;
            case "HM": echo "Heard Island and McDonald Islands"; break;
            case "VA": echo "Holy See (Vatican City State)"; break;
            case "HN": echo "Honduras"; break;
            case "HU": echo "Hungary"; break;
            case "IS": echo "Iceland"; break;
            case "IN": echo "India"; break;
            case "ID": echo "Indonesia"; break;
            case "IR": echo "Iran, Islamic Republic of"; break;
            case "IQ": echo "Iraq"; break;
            case "IE": echo "Ireland"; break;
            case "IM": echo "Isle of Man"; break;
            case "IL": echo "Israel"; break;
            case "IT": echo "Italy"; break;
            case "JM": echo "Jamaica"; break;
            case "JP": echo "Japan"; break;
            case "JE": echo "Jersey"; break;
            case "JO": echo "Jordan"; break;
            case "KZ": echo "Kazakhstan"; break;
            case "KE": echo "Kenya"; break;
            case "KI": echo "Kiribati"; break;
            case "KP": echo "Korea, Democratic People&#39;s Republic of"; break;
            case "KR": echo "Korea, Republic of"; break;
            case "KW": echo "Kuwait"; break;
            case "KG": echo "Kyrgyzstan"; break;
            case "LA": echo "Lao People&#39;s Democratic Republic"; break;
            case "LV": echo "Latvia"; break;
            case "LB": echo "Lebanon"; break;
            case "LS": echo "Lesotho"; break;
            case "LR": echo "Liberia"; break;
            case "LY": echo "Libya"; break;
            case "LI": echo "Liechtenstein"; break;
            case "LT": echo "Lithuania"; break;
            case "LU": echo "Luxembourg"; break;
            case "MO": echo "Macao"; break;
            case "MK": echo "Macedonia, the former Yugoslav Republic of"; break;
            case "MG": echo "Madagascar"; break;
            case "MW": echo "Malawi"; break;
            case "MY": echo "Malaysia"; break;
            case "MV": echo "Maldives"; break;
            case "ML": echo "Mali"; break;
            case "MT": echo "Malta"; break;
            case "MQ": echo "Martinique"; break;
            case "MR": echo "Mauritania"; break;
            case "MU": echo "Mauritius"; break;
            case "YT": echo "Mayotte"; break;
            case "MX": echo "Mexico"; break;
            case "MD": echo "Moldova, Republic of"; break;
            case "MC": echo "Monaco"; break;
            case "MN": echo "Mongolia"; break;
            case "ME": echo "Montenegro"; break;
            case "MS": echo "Montserrat"; break;
            case "MA": echo "Morocco"; break;
            case "MZ": echo "Mozambique"; break;
            case "MM": echo "Myanmar"; break;
            case "NA": echo "Namibia"; break;
            case "NR": echo "Nauru"; break;
            case "NP": echo "Nepal"; break;
            case "NL": echo "Netherlands"; break;
            case "NC": echo "New Caledonia"; break;
            case "NZ": echo "New Zealand"; break;
            case "NI": echo "Nicaragua"; break;
            case "NE": echo "Niger"; break;
            case "NG": echo "Nigeria"; break;
            case "NU": echo "Niue"; break;
            case "NF": echo "Norfolk Island"; break;
            case "NO": echo "Norway"; break;
            case "OM": echo "Oman"; break;
            case "PK": echo "Pakistan"; break;
            case "PS": echo "Palestine"; break;
            case "PA": echo "Panama"; break;
            case "PG": echo "Papua New Guinea"; break;
            case "PY": echo "Paraguay"; break;
            case "PE": echo "Peru"; break;
            case "PH": echo "Philippines"; break;
            case "PN": echo "Pitcairn"; break;
            case "PL": echo "Poland"; break;
            case "PT": echo "Portugal"; break;
            case "QA": echo "Qatar"; break;
            case "RE": echo "Reunion"; break;
            case "RO": echo "Romania"; break;
            case "RU": echo "Russian Federation"; break;
            case "RW": echo "Rwanda"; break;
            case "BL": echo "Saint Barthélemy"; break;
            case "SH": echo "Saint Helena, Ascension and Tristan da Cunha"; break;
            case "KN": echo "Saint Kitts and Nevis"; break;
            case "LC": echo "Saint Lucia"; break;
            case "MF": echo "Saint Martin (French part)"; break;
            case "PM": echo "Saint Pierre and Miquelon"; break;
            case "VC": echo "Saint Vincent and the Grenadines"; break;
            case "WS": echo "Samoa"; break;
            case "SM": echo "San Marino"; break;
            case "ST": echo "Sao Tome and Principe"; break;
            case "SA": echo "Saudi Arabia"; break;
            case "SN": echo "Senegal"; break;
            case "RS": echo "Serbia"; break;
            case "SC": echo "Seychelles"; break;
            case "SL": echo "Sierra Leone"; break;
            case "SG": echo "Singapore"; break;
            case "SX": echo "Sint Maarten (Dutch part)"; break;
            case "SK": echo "Slovakia"; break;
            case "SI": echo "Slovenia"; break;
            case "SB": echo "Solomon Islands"; break;
            case "SO": echo "Somalia"; break;
            case "ZA": echo "South Africa"; break;
            case "GS": echo "South Georgia and the South Sandwich Islands"; break;
            case "SS": echo "South Sudan"; break;
            case "ES": echo "Spain"; break;
            case "LK": echo "Sri Lanka"; break;
            case "SD": echo "Sudan"; break;
            case "SR": echo "Suriname"; break;
            case "SJ": echo "Svalbard and Jan Mayen"; break;
            case "SZ": echo "Swaziland"; break;
            case "SE": echo "Sweden"; break;
            case "CH": echo "Switzerland"; break;
            case "SY": echo "Syrian Arab Republic"; break;
            case "TW": echo "Taiwan"; break;
            case "TJ": echo "Tajikistan"; break;
            case "TZ": echo "Tanzania, United Republic of"; break;
            case "TH": echo "Thailand"; break;
            case "TL": echo "Timor-Leste"; break;
            case "TG": echo "Togo"; break;
            case "TK": echo "Tokelau"; break;
            case "TO": echo "Tonga"; break;
            case "TT": echo "Trinidad and Tobago"; break;
            case "TN": echo "Tunisia"; break;
            case "TR": echo "Turkey"; break;
            case "TM": echo "Turkmenistan"; break;
            case "TC": echo "Turks and Caicos Islands"; break;
            case "TV": echo "Tuvalu"; break;
            case "UG": echo "Uganda"; break;
            case "UA": echo "Ukraine"; break;
            case "AE": echo "United Arab Emirates"; break;
            case "GB": echo "United Kingdom"; break;
            case "US": echo "United States"; break;
            case "UY": echo "Uruguay"; break;
            case "UZ": echo "Uzbekistan"; break;
            case "VU": echo "Vanuatu"; break;
            case "VE": echo "Venezuela, Bolivarian Republic of"; break;
            case "VN": echo "Vietnam"; break;
            case "VG": echo "Virgin Islands, British"; break;
            case "WF": echo "Wallis and Futuna"; break;
            case "EH": echo "Western Sahara"; break;
            case "YE": echo "Yemen"; break;
            case "ZM": echo "Zambia"; break;
            case "ZW": echo "Zimbabwe"; break;
          }
          ?>
          <a href="/cotizacion/datos-contacto#country_code">Editar</a>
        </div> 
      </div>-->
    </div> 

    <?php if (session()->get('recordType') == '0123m0000012tH4' || session()->get('recordType') == '0123m000001AzQ4') : ?>
     <?php
       if($rootid != '02i3m00000D9DaPAAV')
       {
    ?>
    <div class="row" style="margin-top:40px">

   
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Evento: <?php echo session()->get('00N3m00000QQOdA') ?>
          <a href="/cotizacion/datos-evento#name">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Tipo de actividad: <?php echo session()->get('00N3m00000QMsCF') ?>
          <a href="/cotizacion/datos-evento#type">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Cantidad de personas: <?php echo session()->get('00N3m00000QMsCA') ?>
          <a href="/cotizacion/datos-evento#quantity">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Cómo imaginas tu actividad: <?php echo session()->get('00N3m00000QMsC5') ?>
          <a href="/cotizacion/datos-evento#how">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Desde: <?php echo session()->get('00N3m00000QMwta') . ' ' . session()->get('00N3m00000QMwta-hour') ?>
          <a href="/cotizacion/datos-evento#start-date">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Hasta: <?php echo session()->get('00N3m00000QMwtf') . ' ' . session()->get('00N3m00000QMwtf-hour') ?>
          <a href="/cotizacion/datos-evento#end-date">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Mis fechas <?php echo session()->get('00N3m00000QQOdy') == 1 ? 'SI' : 'NO' ?> son flexibles
          <a href="/cotizacion/datos-evento#variable-dates">Editar</a>
        </div>
      </div>
    </div>
    <?php if ($venue ?? '') : ?>
    <div class="row" style="margin-top:40px">
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Venue: <?php echo $venue ?>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Montaje: <?php echo session()->get('00N3m00000QQOe8') ?>
          <a href="/cotizacion/datos-evento#layout">Editar</a>
        </div>
      </div>
    </div>
    <?php endif ?>
    <div class="row" style="<?php echo $venue ?? '' ? '' : 'margin-top:40px' ?>">
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          <?php echo session()->get('00N3m00000QMsCK') == 'Si' ? 'SI' : 'NO' ?> necesito hospedaje
          <a href="/cotizacion/datos-evento#lodging">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          <?php echo session()->get('00N3m00000QMsCP') == 'Si' ? 'SI' : 'NO' ?> necesito catering
          <a href="/cotizacion/datos-evento#catering">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6" style="margin-bottom:20px; display:<?php echo session()->get('00N3m00000QMsCK') == 'Si' ? 'block': 'none' ?>">
        <div class="form-group-preview">
          <?php echo session()->get('00N3m00000QMzL7') ?> persona<?php echo session()->get('00N3m00000QMzL7') != 1 ? 's' : '' ?> se hospedarán
          <a href="/cotizacion/datos-evento#lodging-quantity">Editar</a>
        </div>
      </div>
 
    </div>
         <?php
      }
      ?>
     <?php
       if($rootid == '02i3m00000D9DaPAAV')
       {
    ?>
    <div class="row">
      <div class="col-12 col-md-12">
        <div class="form-group-preview mt-4">
          <small>Espacios que deseas reservar</small>
          <div id="tabContainer" style="overflow-x: auto !important">
          <table width="100%" style="min-width:500px">
          <tr>
          <td><b>Venue</b></td><td><b>Fecha / Hora</b></td><td><b>Recargos</b></td><td style='text-align:right'><b>Subtotal</b></td>
          </tr>
          <script>
  var reservas = JSON.parse('<?php echo session()->get('ReservasSeleccionadas'); ?>');
  
  var formatReservas = function(reservas) {
    var result = "";

    reservas.forEach(function(reserva, index) {
      var horaInicio =  reserva.venue!='PISCINA' ? reserva.id.substring(7, 9) : reserva.id.substring(7, 12).replace('-',':');
      var horaInicioFormateada = reserva.venue!='PISCINA' ? formatHora(horaInicio) : formatPiscinaHora(horaInicio);
      var recargo = reserva.recargo ?? ' ';
      var horaFinFormateada = reserva.venue!='PISCINA' ? formatHora(parseInt(horaInicio) + 1) : formatPiscinaHoraForEndEvent(horaInicio);
      var tarifaLinea = formatNumber(reserva.subtotal);
      result += "<tr><td>" + reserva.venue + "</td><td>" + reserva.fecha + " " + horaInicioFormateada + " - " + horaFinFormateada + "</td><td>" + recargo + "</td><td style='text-align:right'>" + tarifaLinea + "</td></tr>";

     // if (index !== reservas.length - 1) {
    //    result += "<br/>";
    //  }
    });

    return result;
  }

  const formatPiscinaHora =function(hora){
      var hourCheck= hora.slice(0, 2);
      var periodo = hourCheck < 12 ? " AM" : " PM";
      return hora+periodo;

  }

  
  const formatPiscinaHoraForEndEvent =function(hora){
      var hourCheck= hora.slice(0, 2);
      var minutes= hora.slice(3, 5);
      hourCheck = parseInt(hourCheck) + 1
      var periodo = hourCheck < 12 ? " AM" : " PM";
      return hourCheck + ':' + minutes+ periodo;

  }

  var formatHora = function(hora) {
    if (hora < 10) {
      hora = "0" + hora;
    }

    var periodo = hora < 12 ? "AM" : "PM";
    hora = hora % 12;
    if (hora == 0) {
      hora = 12;
    }

    return hora + ":00 " + periodo;
  }

  var formatNumber = function(num) {
    return num.toLocaleString('en-US', {
        minimumFractionDigits: 2, 
        maximumFractionDigits: 2 
    });
  }

  var ftRes = formatReservas(reservas);
  document.write(ftRes);

  
  document.addEventListener("DOMContentLoaded", function(event) {
  var inputF = document.getElementById("00N3m00000QeGT3");
  var ftResTXT = ftRes.replaceAll('<br/>', '\n');
  ftResTXT = ftResTXT.replaceAll('<tr><td>', '');
  ftResTXT = ftResTXT.replaceAll('</td><td>', ' ');
  ftResTXT = ftResTXT.replaceAll('</td><td style=\'text-align:right\'>',' ');
  ftResTXT = ftResTXT.replaceAll('Noche', 'Recargo noche');
  ftResTXT = ftResTXT.replaceAll('Sábado', 'Recargo sábado');
  ftResTXT = ftResTXT.replaceAll('Domingo', 'Recargo domingo');
  ftResTXT = ftResTXT.replaceAll('Feriado', 'Recargo feriado');
  ftResTXT = ftResTXT.replaceAll('</td></tr>', '\n');
  inputF.value = ftResTXT;
  });

function smoothScroll(element, target, duration) {
  var start = element.scrollLeft,
      change = target - start,
      startTime = performance.now(),
      val, now, elapsed, t;

  function animateScroll(){
    now = performance.now();
    elapsed = (now - startTime) / 1000;
    t = (elapsed/duration);

    element.scrollLeft = start + change * easeInOutQuad(t);

    if(t < 1)
      window.requestAnimationFrame(animateScroll);
  };

  // Esta es una función de easing que puede ser modificada para cambiar la
  // velocidad de la animación en diferentes puntos.
  function easeInOutQuad(t) { 
    return t < .5 ? 2*t*t : -1+(4-2*t)*t;
  };

  animateScroll();
}

var el = document.getElementById('tabContainer');

// Desplazarse a la derecha
smoothScroll(el, el.scrollWidth, 1);

setTimeout(function() {
  // Desplazarse a la izquierda después de un retardo
  smoothScroll(el, 0, 1);
}, 600);


</script>
<tr><td></td></tr>
</table>
</div>
<br />Reserva para: <?php echo session()->get('00N3m00000QeGyG') ?>



          <br />
          <a href="/cotizacion/datos-evento#ReservasSeleccionadas">Editar</a>
      </div>
    </div>
    </div>
              <?php
      }
      ?>
    <div class="row">
      <div class="col-12 col-md-<?php if($rootid != '02i3m00000D9DaPAAV') { echo '6'; } else { echo '12'; } ?>">
        <div class="form-group-preview mt-4">
          <small>Describe tu evento</small>
          <?php echo session()->get('description') ?>
          <br /><br /><br />
          <a href="/cotizacion/datos-evento#description">Editar</a>
        </div>
      </div>



      <?php
       if($rootid != '02i3m00000D9DaPAAV')
       {
    ?>
      <div class="col-12 col-md-6">
        <?php if (session()->get('files')) : ?>
        <p style="line-height:1rem; margin-bottom:6px"><small>Archivos compartidos</small></p>
        <?php foreach (session()->get('files') as $file) : ?>
        <div class="form-group-preview">
          <?php echo $file['name'] ?>
          <a href="{{ $file['path'] }}" target="_blank">Ver</a>
        </div>
        <?php endforeach ?>
        <?php else : ?>
        <p style="margin:25px 0 0; line-height:1rem"><small>Puedes compartir la agenda de tu evento,  material 
        promocional o cualquier otro documento que nos ayude a 
        entender mejor tus necesidades</small></p><br />
        <div class="form-group-preview" style="background:transparent"><a href="/cotizacion/datos-evento#file" style="left:0">Editar</a></div>
        <?php endif ?>
        </div>
    

    <?php
    }
    ?>
    <?php else : ?>
    <div class="row" style="margin-top:40px">
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          <?php echo session()->get('00N3m00000QMzL7') ?> persona<?php echo session()->get('00N3m00000QMzL7') != 1 ? 's' : '' ?> se mudarán a CDS
          <a href="/cotizacion/datos-residencia#quantity">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          <?php echo session()->get('00N3m00000QMzLH') == 'Si' ? 'SI' : 'NO' ?> tenemos mascotas
          <a href="/cotizacion/datos-residencia#pets">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Fecha de instalación: <?php echo session()->get('00N3m00000QMwta') ?>
          <a href="/cotizacion/datos-residencia#start-date">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Estadía: <?php echo session()->get('00N3m00000QMzLC') ?> año<?php echo session()->get('00N3m00000QMzLC') != 1 ? 's' : '' ?>
          <a href="/cotizacion/datos-residencia#duration">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          <?php echo session()->get('work-in-campus') == 'Si' ? 'SI' : 'NO' ?> trabajo en una organización del campus
          <a href="/cotizacion/datos-residencia#work-in-campus">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6" style="margin-bottom:20px; display:<?php echo session()->get('work-in-campus') == 'Si' ? 'block': 'none' ?>">
        <div class="form-group-preview">
          Organización: <?php echo session()->get('00N3m00000QMzLM') ?>
          <a href="/cotizacion/datos-residencia#campus-organization">Editar</a>
        </div>
      </div>
      <div class="col-12">
        <div class="form-group-preview">
          <small>¿Por qué elegiste CDS para rentar vivienda?</small>
          <?php echo session()->get('00N3m00000QMzLR') ?>
          <br /><br /><br />
          <a href="/cotizacion/datos-residencia#why-cds">Editar</a>
        </div>
      </div>
      <div class="col-12">
        <div class="form-group-preview">
          <small>Actividades a realizar en CDS</small>
          <?php echo session()->get('00N3m00000QMzLW') ?>
          <br /><br /><br />
          <a href="/cotizacion/datos-residencia#to-do-cds">Editar</a>
        </div>
      </div>
    </div>
    <?php endif ?>

      </div>
      <?php
       if($rootid == '02i3m00000D9DaPAAV')
       {
    ?>
    <div class="row">
        <div class="col-12 col-md-12">
            <div class="form-group-preview"
                style="display: inline-flex;width: 100%;justify-content: space-between;">
                <div><small><b>Precio Total</b></small></div>
                <div><b>B/. <?php echo nl2br($estimacion); ?></b></div>
            </div>
        </div>
    </div>
    <div class="row  mt-4">
      <div class="col-8 col-md-8">
        <div class="form-group">
          <input type="email" class="form-control" name="cupon" id="cupon" placeholder="Tienes un cupón?" style="height: 39px" value="<?php echo session()->get('cupon') ?>">
        </div>
      </div>

      <div class="col-4 col-md-4">
       <button type="button" id="apply-coupon"  {{ request()->has('reagendar')  ? ' disabled' : '' }}  class="btn btn-primary w-100">Aplicar</button>
      </div>
      </div>
  
      <script type="text/javascript">
  function ready() {

    $('#apply-coupon').click(function() {
      var cupon = $('#cupon').val();
      $.ajax({
        url: '/aplicarCupon', // URL del método de tu controlador
        method: 'POST',
        data: {
          cupon: cupon,
          _token: '{{ csrf_token() }}' // Token CSRF para la seguridad
        },
        success: function(response) {
        //alert(JSON.stringify(response));
          if(response != '' && response != 'undefined')
          {
            $('#00N3m00000Qpiz4').val(response.sfid);
            $('#cupon').val('Descuento: ' + response.valordecimal);
          }
          else
          {
            $('#00N3m00000Qpiz4').val('');
            $('#cupon').val('');
          }
        }
      });
    });
  }
  window.addEventListener("load", ready);
</script>
        <?php
    }
    ?>
    <div class="row" style="margin-top:40px">
      <div class="col-12 text-center">
        <p style="color:#0088ff; font-family:'Roboto', sans-serif; font-size:14px">
        Esta solicitud está sujeta a la disponibilidad de los espacios al 
        momento de ser procesada por el equipo de Ciudad del Saber.</p>
      </div>
    </div>

    <div class="row">
@if($rootid == '02i3m00000D9DaPAAV')
  <div class="col-12">
          <div class="form-check">
            <input class="form-check-input" type="checkbox" value="1" id="accept-policy">
            <label class="form-check-label" for="accept-policy" style="font-size:13px; font-family: 'Roboto', sans-serif">
              Al marcar esta casilla se asume que he leído, entendido y acepto las <a href="" data-toggle="modal" data-target="#myModal" style="cursor: pointer;"><b>políticas de reserva y cancelación de espacios de CDS</b></a>. De acuerdo a lo establecido en la política, confirmo que también entiendo las condiciones de reembolso y los procedimientos aplicables de esa cancelación.
            </label>
          </div>
      </div>
</div>
 <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog  modal-xl" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Políticas de reserva y cancelación de espacios de CDS</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
            <p><strong>Por favor, tenga en cuenta las siguientes normas y políticas durante su visita al Parque Ciudad del Saber:</strong></p>
  <ul>
    <li>No se permite el consumo y venta de bebidas alcohólicas.</li>
    <li>No se permite la venta de comida y bebidas (sodas, aguas, bebidas energizantes, etc.).</li>
    <li>No se permite fumar.</li>
    <li>Cumplir con el uso apropiado de los estacionamientos. No se pueden estacionar en los laterales de la vía principal del Parque.</li>
    <li>No se permite el uso de murgas, troneras, parlantes, bocinas, micrófonos y otros instrumentos de ruido excesivo.</li>
    <li>Se le solicita depositar los desechos de basura que se produzcan durante el uso de la instalación en los cestos de basura. Se le hará un cargo de B/. 100.00 en caso de encontrar algún tipo de desecho en el área asignada.</li>
    <li>LA FUNDACIÓN por condiciones climatológicas se reserva el derecho de uso de las instalaciones para preservar el buen estado de estas.</li>
    <li>LA FUNDACIÓN no se hará responsable por la pérdida de objetos de valor (prendas, celulares, equipos deportivos, etc.) durante el desarrollo de las actividades.</li>
    <li>El Cliente exonera a LA FUNDACIÓN de cualquier imprevisto, lesión o accidente que ocurra con algún participante durante las actividades del evento.</li>
    <li>Respetar y obedecer las instrucciones del personal del Parque Ciudad del Saber y agentes de Seguridad de CdS.</li>
    <li>Se prohibe los actos de violencia, riña y palabras ofensivas durante las actividades. De ocurrir algunos de estos hechos, El Cliente deberá expulsar al equipo o persona que incurrió en la falta y, de tratarse de la barra, está deberá abandonar las instalaciones.</li>
    <li>El marcado del cuadro o la cancha será por cuenta de El Cliente.</li>
     <li>Las cancelaciones realizadas <strong>12 horas antes</strong> de la fecha reservada recibirán un reembolso del <strong>100%</strong>.</li>
    <li>Las cancelaciones realizadas <strong>dentro de las 12 horas</strong> antes de la fecha reservada recibirán un reembolso del <strong>50%</strong>.</li>
    <li><strong>Por favor, tenga en cuenta que los reembolsos sólo se tramitarán por ACH</strong>.</li>
  </ul>
  @if($parentid == '02i3m00000Fx0PEAAZ')
  <p><strong>Reglas adicionales en canchas de Ráquetbol:</strong></p>
  <ul>
    <li>El cliente debe traer su raqueta y pelotas para jugar.</li>
    <li>Es obligatorio el uso de lentes de protección para ingresar a las canchas.</li>
  </ul>
  @endif
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
        </div>
      </div>
    </div>
  </div>
@endif
    <div class="row buttons">
      <div class="col-12 text-center">
        <?php 
        $from_date = new DateTime();
        $from_date->setTime($from_date->format('H'), 0, 0);
        $to_date = null;
        if (session()->get('00N3m00000QMwta') && session()->get('00N3m00000QMwta-hour')) {
          $from_date = new DateTime(session()->get('00N3m00000QMwta') . ' ' . session()->get('00N3m00000QMwta-hour'));
        }
        if (session()->get('00N3m00000QMwtf') && session()->get('00N3m00000QMwtf-hour')) {
          $to_date = new DateTime(session()->get('00N3m00000QMwtf') . ' ' . session()->get('00N3m00000QMwtf-hour'));
        } else {
          $to_date = $from_date;
          $to_date->add(new DateInterval('PT1H'));
        }
        ?>
        <input type=hidden name="oid" value="00D1N000002MAgJ">
        <input type=hidden name="retURL" value="<?php if(isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') {  $url = "https://"; } else {  $url = "http://"; } echo $url . $_SERVER['HTTP_HOST']; ?>/cotizacion/solicitud-enviada">
     <!--   <input type="hidden" name="debug" value="1">
        <input type="hidden" name="debugEmail" value="jurena@cdspanama.org"> -->
        <input  id="00N3m00000PbDs5" name="00N3m00000PbDs5" type="hidden" value="1"/>
        <input type="hidden" value="<?php echo session()->get('first_name') ?>" name="first_name" id="first_name" />
        <input type="hidden" value="<?php echo session()->get('last_name') ?>" name="last_name" id="last_name" />
        <input type="hidden" value="<?php echo session()->get('email') ?>" name="email" id="email" />
        <input type="hidden" value="<?php echo session()->get('phone') ?>" name="phone" id="phone" />
        <input type="hidden" value="<?php echo session()->get('company') ?>" name="company" id="company" />
        <input type="hidden" value="<?php echo session()->get('country_code') ?>" name="country_code" id="country_code" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000Pb23w') ?>" name="00N3m00000Pb23w" id="00N3m00000Pb23w" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QQOe8') ?>" name="00N3m00000QQOe8" id="00N3m00000QQOe8" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QQOde') ?>" name="00N3m00000QQOde" id="00N3m00000QQOde" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QQOdA') ?>" name="00N3m00000QQOdA" id="00N3m00000QQOdA" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QMsCF') ?>" name="00N3m00000QMsCF" id="00N3m00000QMsCF" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QMsCA') ?>" name="00N3m00000QMsCA" id="00N3m00000QMsCA" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QMsC5') ?>" name="00N3m00000QMsC5" id="00N3m00000QMsC5" />
        <input type="hidden" value="<?php echo $from_date ? $from_date->format('Y-m-d H:i:s') : '' ?>" name="00N3m00000QMwta" id="00N3m00000QMwta" />
        <input type="hidden" value="<?php echo $to_date ? $to_date->format('Y-m-d H:i:s') : '' ?>" name="00N3m00000QMwtf" id="00N3m00000QMwtf" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QQOdy') ?>" name="00N3m00000QQOdy" id="00N3m00000QQOdy" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QMsCK') ?>" name="00N3m00000QMsCK" id="00N3m00000QMsCK" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QMsCP') ?>" name="00N3m00000QMsCP" id="00N3m00000QMsCP" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QMzL7') ?>" name="00N3m00000QMzL7" id="00N3m00000QMzL7" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QMzLC') ?>" name="00N3m00000QMzLC" id="00N3m00000QMzLC" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QMzLH') ?>" name="00N3m00000QMzLH" id="00N3m00000QMzLH" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QMzLM') ?>" name="00N3m00000QMzLM" id="00N3m00000QMzLM" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QMzLR') ?>" name="00N3m00000QMzLR" id="00N3m00000QMzLR" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QMzLW') ?>" name="00N3m00000QMzLW" id="00N3m00000QMzLW" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000Pb6zh') ?>" name="00N3m00000Pb6zh" id="00N3m00000Pb6zh" />
        <input type="hidden" value="<?php echo session()->get('description') ?>" name="description" id="description" />
        <input type="hidden" value="<?php echo session()->get('recordType') ?>" name="recordType" id="recordType" />
        <input type="hidden" value="<?php echo session()->get('00N3m00000QeHcG') ?>" name="00N3m00000QeHcG" id="00N3m00000QeHcG" /> 
        <input type="hidden" value="<?php echo session()->get('00N3m00000Qpiz4') ?>" name="00N3m00000Qpiz4" id="00N3m00000Qpiz4" />
      <?php
       if($rootid == '02i3m00000D9DaPAAV')
       {
    ?>

        <input type="hidden" name="00N3m00000QeGlb" id="00N3m00000QeGlb" value='<?php echo session()->get('00N3m00000QeGlb') ?>'/>
        <input type="hidden" name="00N3m00000QeGSy" id="00N3m00000QeGSy" value='<?php echo session()->get("ReservasSeleccionadas") ?>'/>
        <input type="hidden" name="00N3m00000QeGT3" id="00N3m00000QeGT3" value='Sin selección'/>
        <input type="hidden" name="00N3m00000QeGyG" id="00N3m00000QeGyG" value="<?php echo session()->get('00N3m00000QeGyG') ?>"/>
        <input type="hidden" name="00N3m00000QeGSo" id="00N3m00000QeGSo" value='{{ $estimacion }}'/>

        <input type="hidden" name="00N3m00000QeH7c" id="00N3m00000QeH7c" value='Reserva desatendida'/>

<!--        Tipo de reserva:<select  id="00N3m00000QeH7c" name="00N3m00000QeH7c" title="Tipo de reserva">
        <option value="">--None--</option><option value="Reserva desatendida">Reserva desatendida</option>
        <option value="Reserva consultiva">Reserva consultiva</option>
        </select> -->

        <?php
    }
    ?>  
        <?php if (config('app.env') == 'local') : ?>
        <!--<input type="hidden" name="debug" value="1">
        <input type="hidden" name="debugEmail" value="dnavas00@hotmail.com">-->
        <?php endif ?>

        <?php 
        $files = session()->get('files') ? session()->get('files') : [];
        if (count($files) >= 1) : ?>
          <input type="hidden" value="<?php echo $files[0]['name'] ?>" name="00N3m00000Pb6zr" id="00N3m00000Pb6zr" />
          <input type="hidden" value="<?php echo $files[0]['path'] ?>" name="00N3m00000Pb6zm" id="00N3m00000Pb6zm" />
        <?php endif ?>

        <?php if (count($files) >= 2) : ?>
          <input type="hidden" value="<?php echo $files[1]['name'] ?>" name="00N3m00000Pb701" id="00N3m00000Pb701" />
          <input type="hidden" value="<?php echo $files[1]['path'] ?>" name="00N3m00000Pb6zw" id="00N3m00000Pb6zw" />
        <?php endif ?>

        <?php if (count($files) == 3) : ?>
          <input type="hidden" value="<?php echo $files[2]['name'] ?>" name="00N3m00000Pb70B" id="00N3m00000Pb70B" />
          <input type="hidden" value="<?php echo $files[2]['path'] ?>" name="00N3m00000Pb706" id="00N3m00000Pb706" />
        <?php endif ?>



<a href="/cotizacion/datos-evento" class="btn btn-primary">Anterior</a>
@if($rootid == '02i3m00000D9DaPAAV')
        <button type="submit" id="confirm-button" class="btn btn-primary disabled submit-form" disabled onclick="if (this.value !== 'Enviando...') { this.disabled=true; this.value='Enviando...'; this.form.submit(); }">Confirmar</button>
@else
  <button type="submit" id="confirm-button" class="btn btn-primary submit-form" onclick="if (this.value !== 'Enviando...') { this.disabled=true; this.value='Enviando...'; this.form.submit(); }">Confirmar</button>
@endif
      </div>
    </div>
  </div>
</div>
<script>
       function ready() {
            $("#accept-policy").on("change", function() {
                if ($(this).is(":checked")) {
                    $("#confirm-button").removeClass("disabled").removeAttr("disabled");
                } else {
                    $("#confirm-button").addClass("disabled").attr("disabled", true);
                }
            });
       }
        window.addEventListener("load", ready);
    </script>