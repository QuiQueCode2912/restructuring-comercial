<x-error-message />

<div class="request-step" style="margin-top:0px;">
    <div class="container">
        <h4 class="mb-0">Comencemos con tus datos de contacto</h4>
        <div class="col-12 pr-0 pl-0  pb-4"><small>En caso de tratarse de un contribuyente en Panamá por favor
                ingresar
                sus datos como están registrados en la DGI</small></div>
        <div class="row form-error-message">
            <div class="col-12">Sólo tienes que completar los datos que faltan</div>
        </div>
        <div class="row">
            <div class="col-12 col-md-6">
                <div class="form-group required">
                    <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nombres"
                        value="<?php echo session()->get('first_name', old('first_name')); ?>">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group required">
                    <input type="email" class="form-control" name="last_name" id="last_name" placeholder="Apellidos"
                        value="<?php echo session()->get('last_name', old('last_name')); ?>">
                </div>
            </div>
            <div class="col-12 col-md-6">
                <div class="form-group required">
                    <input type="text" class="form-control" name="email" id="email"
                        placeholder="Correo electrónico" value="<?php echo session()->get('email', old('email')); ?>">
                </div>
            </div>
            <div class="col-12 col-md-6 d-flex p-0">
                <div class="col-4 col-md-4 pr-0">
                    <div class="form-group required">
                        <select id="codigo_pais" name="00NRb000000Ex0D" class="form-control" id="codigo_pais"
                            placeholder="(+000)" value="<?php echo session()->get('00NRb000000Ex0D', old('00NRb000000Ex0D')); ?>">
                            <option value="+507">Panamá (+507)</option>
                            <option value="+1">EE. UU. (+1)</option>
                            <option value="+44">Reino Unido (+44)</option>
                            <option value="+33">Francia (+33)</option>
                            <option value="+49">Alemania (+49)</option>
                            <option value="+81">Japón (+81)</option>
                            <option value="+86">China (+86)</option>
                            <option value="+91">India (+91)</option>
                            <option value="+52">México (+52)</option>
                            <option value="+55">Brasil (+55)</option>
                            <option value="+61">Australia (+61)</option>
                            <option value="+354">Islandia (+354)</option>
                            <option value="+39">Italia (+39)</option>
                            <option value="+7">Rusia (+7)</option>
                            <option value="+34">España (+34)</option>
                            <option value="+82">Corea del Sur (+82)</option>
                            <option value="+971">Emiratos Árabes Unidos (+971)</option>
                            <option value="+353">Irlanda (+353)</option>
                            <option value="+31">Países Bajos (+31)</option>
                            <option value="+41">Suiza (+41)</option>
                            <option value="+65">Singapur (+65)</option>
                            <option value="+54">Argentina (+54)</option>
                            <option value="+56">Chile (+56)</option>
                            <option value="+57">Colombia (+57)</option>
                            <option value="+51">Perú (+51)</option>
                            <option value="+58">Venezuela (+58)</option>
                            <option value="+503">El Salvador (+503)</option>
                            <option value="+506">Costa Rica (+506)</option>
                            <option value="+593">Ecuador (+593)</option>
                            <option value="+504">Honduras (+504)</option>
                            <option value="+502">Guatemala (+502)</option>
                            <option value="+595">Paraguay (+595)</option>
                            <option value="+598">Uruguay (+598)</option>
                            <option value="+591">Bolivia (+591)</option>
                            <option value="+509">Haití (+509)</option>
                        </select>
                    </div>
                </div>
                <div class="col-8 col-md-8">
                    <div class="form-group required">
                        <input type="text" class="form-control" name="phone" id="phone"
                            placeholder="Número de teléfono" value="<?php echo session()->get('phone', old('phone')); ?>">
                    </div>
                </div>

            </div>
            <div class="col-12  col-md-6  ml-auto"><small class="form-text text-muted">
                    <p>El teléfono debe ingresarse con guion para celular XXXX-XXXX y para local XXX-XXXX</p>
                </small>
            </div>


            <!--
      <div class="col-12 col-md-6">
        <div class="form-group required">
          <select  id="country_code" name="country_code">
            <option value="">Nacionalidad</option>
            <option value="AF">Afghanistan</option>
            <option value="AX">Aland Islands</option>
            <option value="AL">Albania</option>
            <option value="DZ">Algeria</option>
            <option value="AD">Andorra</option>
            <option value="AO">Angola</option>
            <option value="AI">Anguilla</option>
            <option value="AQ">Antarctica</option>
            <option value="AG">Antigua and Barbuda</option>
            <option value="AR">Argentina</option>
            <option value="AM">Armenia</option>
            <option value="AW">Aruba</option>
            <option value="AU">Australia</option>
            <option value="AT">Austria</option>
            <option value="AZ">Azerbaijan</option>
            <option value="BS">Bahamas</option>
            <option value="BH">Bahrain</option>
            <option value="BD">Bangladesh</option>
            <option value="BB">Barbados</option>
            <option value="BY">Belarus</option>
            <option value="BE">Belgium</option>
            <option value="BZ">Belize</option>
            <option value="BJ">Benin</option>
            <option value="BM">Bermuda</option>
            <option value="BT">Bhutan</option>
            <option value="BO">Bolivia, Plurinational State of</option>
            <option value="BQ">Bonaire, Sint Eustatius and Saba</option>
            <option value="BA">Bosnia and Herzegovina</option>
            <option value="BW">Botswana</option>
            <option value="BV">Bouvet Island</option>
            <option value="BR">Brazil</option>
            <option value="IO">British Indian Ocean Territory</option>
            <option value="BN">Brunei Darussalam</option>
            <option value="BG">Bulgaria</option>
            <option value="BF">Burkina Faso</option>
            <option value="BI">Burundi</option>
            <option value="KH">Cambodia</option>
            <option value="CM">Cameroon</option>
            <option value="CA">Canada</option>
            <option value="CV">Cape Verde</option>
            <option value="KY">Cayman Islands</option>
            <option value="CF">Central African Republic</option>
            <option value="TD">Chad</option>
            <option value="CL">Chile</option>
            <option value="CN">China</option>
            <option value="CX">Christmas Island</option>
            <option value="CC">Cocos (Keeling) Islands</option>
            <option value="CO">Colombia</option>
            <option value="KM">Comoros</option>
            <option value="CG">Congo</option>
            <option value="CD">Congo, the Democratic Republic of the</option>
            <option value="CK">Cook Islands</option>
            <option value="CR">Costa Rica</option>
            <option value="CI">Cote d&#39;Ivoire</option>
            <option value="HR">Croatia</option>
            <option value="CU">Cuba</option>
            <option value="CW">Curaçao</option>
            <option value="CY">Cyprus</option>
            <option value="CZ">Czech Republic</option>
            <option value="DK">Denmark</option>
            <option value="DJ">Djibouti</option>
            <option value="DM">Dominica</option>
            <option value="DO">Dominican Republic</option>
            <option value="EC">Ecuador</option>
            <option value="EG">Egypt</option>
            <option value="SV">El Salvador</option>
            <option value="GQ">Equatorial Guinea</option>
            <option value="ER">Eritrea</option>
            <option value="EE">Estonia</option>
            <option value="ET">Ethiopia</option>
            <option value="FK">Falkland Islands (Malvinas)</option>
            <option value="FO">Faroe Islands</option>
            <option value="FJ">Fiji</option>
            <option value="FI">Finland</option>
            <option value="FR">France</option>
            <option value="GF">French Guiana</option>
            <option value="PF">French Polynesia</option>
            <option value="TF">French Southern Territories</option>
            <option value="GA">Gabon</option>
            <option value="GM">Gambia</option>
            <option value="GE">Georgia</option>
            <option value="DE">Germany</option>
            <option value="GH">Ghana</option>
            <option value="GI">Gibraltar</option>
            <option value="GR">Greece</option>
            <option value="GL">Greenland</option>
            <option value="GD">Grenada</option>
            <option value="GP">Guadeloupe</option>
            <option value="GT">Guatemala</option>
            <option value="GG">Guernsey</option>
            <option value="GN">Guinea</option>
            <option value="GW">Guinea-Bissau</option>
            <option value="GY">Guyana</option>
            <option value="HT">Haiti</option>
            <option value="HM">Heard Island and McDonald Islands</option>
            <option value="VA">Holy See (Vatican City State)</option>
            <option value="HN">Honduras</option>
            <option value="HU">Hungary</option>
            <option value="IS">Iceland</option>
            <option value="IN">India</option>
            <option value="ID">Indonesia</option>
            <option value="IR">Iran, Islamic Republic of</option>
            <option value="IQ">Iraq</option>
            <option value="IE">Ireland</option>
            <option value="IM">Isle of Man</option>
            <option value="IL">Israel</option>
            <option value="IT">Italy</option>
            <option value="JM">Jamaica</option>
            <option value="JP">Japan</option>
            <option value="JE">Jersey</option>
            <option value="JO">Jordan</option>
            <option value="KZ">Kazakhstan</option>
            <option value="KE">Kenya</option>
            <option value="KI">Kiribati</option>
            <option value="KP">Korea, Democratic People&#39;s Republic of</option>
            <option value="KR">Korea, Republic of</option>
            <option value="KW">Kuwait</option>
            <option value="KG">Kyrgyzstan</option>
            <option value="LA">Lao People&#39;s Democratic Republic</option>
            <option value="LV">Latvia</option>
            <option value="LB">Lebanon</option>
            <option value="LS">Lesotho</option>
            <option value="LR">Liberia</option>
            <option value="LY">Libya</option>
            <option value="LI">Liechtenstein</option>
            <option value="LT">Lithuania</option>
            <option value="LU">Luxembourg</option>
            <option value="MO">Macao</option>
            <option value="MK">Macedonia, the former Yugoslav Republic of</option>
            <option value="MG">Madagascar</option>
            <option value="MW">Malawi</option>
            <option value="MY">Malaysia</option>
            <option value="MV">Maldives</option>
            <option value="ML">Mali</option>
            <option value="MT">Malta</option>
            <option value="MQ">Martinique</option>
            <option value="MR">Mauritania</option>
            <option value="MU">Mauritius</option>
            <option value="YT">Mayotte</option>
            <option value="MX">Mexico</option>
            <option value="MD">Moldova, Republic of</option>
            <option value="MC">Monaco</option>
            <option value="MN">Mongolia</option>
            <option value="ME">Montenegro</option>
            <option value="MS">Montserrat</option>
            <option value="MA">Morocco</option>
            <option value="MZ">Mozambique</option>
            <option value="MM">Myanmar</option>
            <option value="NA">Namibia</option>
            <option value="NR">Nauru</option>
            <option value="NP">Nepal</option>
            <option value="NL">Netherlands</option>
            <option value="NC">New Caledonia</option>
            <option value="NZ">New Zealand</option>
            <option value="NI">Nicaragua</option>
            <option value="NE">Niger</option>
            <option value="NG">Nigeria</option>
            <option value="NU">Niue</option>
            <option value="NF">Norfolk Island</option>
            <option value="NO">Norway</option>
            <option value="OM">Oman</option>
            <option value="PK">Pakistan</option>
            <option value="PS">Palestine</option>
            <option value="PA">Panama</option>
            <option value="PG">Papua New Guinea</option>
            <option value="PY">Paraguay</option>
            <option value="PE">Peru</option>
            <option value="PH">Philippines</option>
            <option value="PN">Pitcairn</option>
            <option value="PL">Poland</option>
            <option value="PT">Portugal</option>
            <option value="QA">Qatar</option>
            <option value="RE">Reunion</option>
            <option value="RO">Romania</option>
            <option value="RU">Russian Federation</option>
            <option value="RW">Rwanda</option>
            <option value="BL">Saint Barthélemy</option>
            <option value="SH">Saint Helena, Ascension and Tristan da Cunha</option>
            <option value="KN">Saint Kitts and Nevis</option>
            <option value="LC">Saint Lucia</option>
            <option value="MF">Saint Martin (French part)</option>
            <option value="PM">Saint Pierre and Miquelon</option>
            <option value="VC">Saint Vincent and the Grenadines</option>
            <option value="WS">Samoa</option>
            <option value="SM">San Marino</option>
            <option value="ST">Sao Tome and Principe</option>
            <option value="SA">Saudi Arabia</option>
            <option value="SN">Senegal</option>
            <option value="RS">Serbia</option>
            <option value="SC">Seychelles</option>
            <option value="SL">Sierra Leone</option>
            <option value="SG">Singapore</option>
            <option value="SX">Sint Maarten (Dutch part)</option>
            <option value="SK">Slovakia</option>
            <option value="SI">Slovenia</option>
            <option value="SB">Solomon Islands</option>
            <option value="SO">Somalia</option>
            <option value="ZA">South Africa</option>
            <option value="GS">South Georgia and the South Sandwich Islands</option>
            <option value="SS">South Sudan</option>
            <option value="ES">Spain</option>
            <option value="LK">Sri Lanka</option>
            <option value="SD">Sudan</option>
            <option value="SR">Suriname</option>
            <option value="SJ">Svalbard and Jan Mayen</option>
            <option value="SZ">Swaziland</option>
            <option value="SE">Sweden</option>
            <option value="CH">Switzerland</option>
            <option value="SY">Syrian Arab Republic</option>
            <option value="TW">Taiwan</option>
            <option value="TJ">Tajikistan</option>
            <option value="TZ">Tanzania, United Republic of</option>
            <option value="TH">Thailand</option>
            <option value="TL">Timor-Leste</option>
            <option value="TG">Togo</option>
            <option value="TK">Tokelau</option>
            <option value="TO">Tonga</option>
            <option value="TT">Trinidad and Tobago</option>
            <option value="TN">Tunisia</option>
            <option value="TR">Turkey</option>
            <option value="TM">Turkmenistan</option>
            <option value="TC">Turks and Caicos Islands</option>
            <option value="TV">Tuvalu</option>
            <option value="UG">Uganda</option>
            <option value="UA">Ukraine</option>
            <option value="AE">United Arab Emirates</option>
            <option value="GB">United Kingdom</option>
            <option value="US">United States</option>
            <option value="UY">Uruguay</option>
            <option value="UZ">Uzbekistan</option>
            <option value="VU">Vanuatu</option>
            <option value="VE">Venezuela, Bolivarian Republic of</option>
            <option value="VN">Vietnam</option>
            <option value="VG">Virgin Islands, British</option>
            <option value="WF">Wallis and Futuna</option>
            <option value="EH">Western Sahara</option>
            <option value="YE">Yemen</option>
            <option value="ZM">Zambia</option>
            <option value="ZW">Zimbabwe</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <select id="want_to_do" name="want_to_do">
            <option value="">¿Que deseas hacer en Ciudad del Saber?</option>
            <option value="event" <?php echo session()->get('want_to_do') == 'event' ? 'selected="selected"' : ''; ?>>Quiero cotizar un evento</option>
            <option value="residency" <?php echo session()->get('want_to_do') == 'residency' ? 'selected="selected"' : ''; ?>>Quiero mudarme a Ciudad del Saber</option>
          </select>
        </div>
      </div>
      -->
            <?php  if($venue !== 'Salas de eventos') :?>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" value="1" id="show-company-fields"
                        <?php if (session()->get('company', old('company'))) : ?>checked="checked"<?php endif ?>>
                    <label class="form-check-label" for="show-company-fields"
                        style="font-size:13px; font-family: 'Roboto', sans-serif">
                        ¿Deseas que la factura se genere a nombre de tu organización?
                    </label>
                </div>
            </div>

            <div class="col-12 company-fields w-100" style="display:<?php echo session()->get('company') ? 'block' : 'none'; ?>">
                <div class="row mt-3">
                    <div class="col-12"><small>Por favor ingresa la siguiente información</small></div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="company" id="company"
                                placeholder="Organización" value="<?php echo session()->get('company', old('company')); ?>">
                        </div>
                    </div>
                    <div class="col-12 col-md-6">
                        <div class="form-group">
                            <input type="text" class="form-control" name="00N3m00000QQOde" id="identification"
                                placeholder="RUC (Número de identificación fiscal)" value="<?php echo session()->get('00N3m00000QQOde', old('00N3m00000QQOde')); ?>">
                        </div>
                    </div>
                </div>
            </div>
            <?php endif ?>

            <?php  if($venue == 'Salas de eventos') :?>
            <div class="col-12 company-fields w-100" style="display:block">
                <div class="row mt-3">
                    <div class="col-12 col-md-6">
                        <div class="form-group required">
                            <input type="text" class="form-control" name="company" id="company"
                                placeholder="Organización" value="<?php echo session()->get('company', old('company')); ?>">
                        </div>
                    </div>
                    <div class="col-12 col-md-6 d-flex p-0">
                        <div class="col-8 col-md-9 pr-0">
                            <div class="form-group required">
                                <input type="text" class="form-control" name="00N3m00000QQOde"
                                    id="identification" placeholder="RUC (Número de identificación fiscal)"
                                    value="<?php echo session()->get('00N3m00000QQOde', old('00N3m00000QQOde')); ?>">
                            </div>
                        </div>
                        <div class="col-4 col-md-3 ">
                            <div class="form-group  ">
                                <input type="text" class="form-control" name="00NRb000000Ex1p" id="dv"
                                    placeholder="DV" value="<?php echo session()->get('00NRb000000Ex1p', old('00NRb000000Ex1p')); ?>">
                            </div>
                        </div>

                    </div>
                    <div class="col-12 col-md-6   ml-auto"><small class="form-text text-muted">
                            <p>a. Empresas Jurídicas: Se debe registrar los dos dígitos del DV.</p>
                            <p>b. Personas Naturales (contribuyentes): Se debe registrar los dos dígitos del DV, si
                                tiene un solo número agregar un 0.</p>
                        </small>
                    </div>

                </div>

            </div>

            <?php endif ?>

            <div class="col-12 mt-4">
                <a href="#"><small>* Campos obligatorios</small></a>
            </div>
        </div>
        <div class="row buttons">
            <div class="col-12 text-center">
                <a href="/" class="btn btn-primary disabled">Anterior</a>
                <button type="submit" class="btn btn-primary submit-form">Siguiente</button>
            </div>
        </div>
    </div>
</div>
<?php if (session()->get('country_code')) : ?>


<script>
    document.getElementById('country_code').value = "<?php echo session()->get('country_code'); ?>"
</script>
<?php endif ?>
