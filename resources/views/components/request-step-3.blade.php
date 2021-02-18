<div class="request-step">
  <div class="container">
    <h4>Estás a punto de terminar, <br>
      por favor verifica que los datos sean correctos</h4>
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
      <div class="col-12 col-md-6">
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
      </div>
    </div>

    <?php if (session()->get('recordType') == '0123m0000012tH4') : ?>
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
          Desde: <?php echo session()->get('00N3m00000QMwta') ?>
          <a href="/cotizacion/datos-evento#start-date">Editar</a>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group-preview">
          Hasta: <?php echo session()->get('00N3m00000QMwtf') ?>
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
    <div class="row" style="margin-top:40px">
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
      <div class="col-12">
        <div class="form-group-preview">
          <small>Describe tu evento</small>
          <?php echo session()->get('description') ?>
          <br /><br /><br />
          <a href="/cotizacion/datos-evento#description">Editar</a>
        </div>
      </div>
      <!--
      <div class="col-12 col-md-6">
        <p style="line-height:1rem; margin-top:47px"><small>Puedes compartir la agenda de tu evento,  material 
          promocional o cualquier otro documento que nos ayude a 
          entender mejor tus necesidades</small></p>
        <div class="form-group-preview">
          globalgame.docx
          <a href="#" style="margin-right:36px">Borrar</a>
          <i class="fe fe-upload"></i>
        </div>
      </div>
      -->
    </div>
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
    <div class="row" style="margin-top:40px">
      <div class="col-12 text-center">
        <p style="color:#0088ff; font-family:'Roboto', sans-serif; font-size:14px">Esta solicitud está sujeta a la disponibilidad de 
          los espacios al momento de ser procesada 
          por el equipo de la Ciudad del Saber</p>
      </div>
    </div>
    <div class="row buttons">
      <div class="col-12 text-center">
        <?php 
        $from_date = null;
        $to_date = null;
        if (session()->get('00N3m00000QMwta')) {
          $from_date = new DateTime(session()->get('00N3m00000QMwta'));
        }
        if (session()->get('00N3m00000QMwtf')) {
          $to_date = new DateTime(session()->get('00N3m00000QMwtf'));
        } else {
          $to_date = $from_date;
          $to_date->add(new DateInterval('PT1H'));
        }
        ?>
        <input type=hidden name="oid" value="00D1N000002MAgJ">
        <input type=hidden name="retURL" value="https://comercial.ciudaddelsaber.org/cotizacion/solicitud-enviada">
        <input type="hidden" value="<?php echo session()->get('first_name') ?>" name="first_name" id="first_name" />
        <input type="hidden" value="<?php echo session()->get('last_name') ?>" name="last_name" id="last_name" />
        <input type="hidden" value="<?php echo session()->get('email') ?>" name="email" id="email" />
        <input type="hidden" value="<?php echo session()->get('phone') ?>" name="phone" id="phone" />
        <input type="hidden" value="<?php echo session()->get('company') ?>" name="company" id="company" />
        <input type="hidden" value="<?php echo session()->get('country_code') ?>" name="country_code" id="country_code" />
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
        <input type="hidden" value="<?php echo session()->get('description') ?>" name="description" id="description" />
        <input type="hidden" value="<?php echo session()->get('recordType') ?>" name="recordType" id="recordType" />
        <button type="submit" class="btn btn-primary submit-form">Confirmar</button>
      </div>
    </div>
  </div>
</div>