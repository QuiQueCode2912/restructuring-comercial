<?php
$designs = json_decode(html_entity_decode($designs ?? ''));
$configuration = [];
if ($designs) {
    foreach ($designs as $design) {
        $configuration[$design->layout] = $design->max_pax;
    }
}
if (!isset($venueroute)) {
    $venueroute = '';
}
if (!isset($parentVenue)) {
    $parentVenue = '';
}
if (!isset($tipouso)) {
    $tipouso = '';
}
$pvax = isset($parentVenue) ? $parentVenue : $venue['name'];
?>

<div class="h-[494px] w-full ">
    <div class=" w-full h-full rounded-xl shadow-2xl overflow-hidden">
        <div class="relative h-[200px] w-full overflow-hidden">
            <img src="{{ $image }}" class="absolute inset-0 h-full w-full object-cover transition-transform duration-200 transform group-hover:scale-110" />
        </div>
        <div class="p-4 flex flex-col justify-between h-[294px]">

            <p class="no-underline hover:no-underline font-bold text-xl"><?php echo $parent ?? '' ? $parent . ' - ' : ''; ?>
                {{ $name }}
                @if ($id == '02i3m00000D9BANAA3')
                <span class=" font-normal" style="color:#0088ff;font-size:11px;margin-top:-10px;">Uso de piscina por carriles de natación.</span>
                @endif
                @if ($id == '02i3m00000D9BANAA4')
                    <span class=" font-normal" style="color:#0088ff;font-size:11px;margin-top:-10px;">Uso de forma libre.</span>
                @endif
            </p>

            @if ($parentid != '02i3m00000Fx0PJAAZ' && $id !='02i3m00000D9GuWAAV')
                    <div class="font-semibold text-gray-700 text-base md:text-lg">
                        Capacidad máxima: <?php echo $configuration ? max($configuration) : 0; ?> personas
                    </div>
            @endif

            <p class="text-base md:text-lg">
                Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor.
            </p>
            

            <!--<a href="#map">
                <img src="/assets/images/mapIcon.png" width="50px" height="50px" style="position:absolute;right:14px;top:-10px;">
            </a>-->
            <!--<?php if (($type ?? 'venue') == 'Vivienda') : ?>
            <div class="characteristics">
                <dl>
                    <dt>Habitaciones</dt>
                    <dd><?php echo $rooms ?? ''; ?></dd>
                </dl>
                <dl>
                    <dt>Área cerrada</dt>
                    <dd><?php echo $closedarea ?? ''; ?> mts<sup>2</sup></dd>
                </dl>
                <dl>
                    <dt>Área abierta</dt>
                    <dd><?php echo $openarea ?? ''; ?> mts<sup>2</sup></dd>
                </dl>
                <dl>
                    <dt>Mensualidad</dt>
                    <dd>
                        desde
                        <?php
                        $seasonalmonthlyfee = $seasonalmonthlyfee ?? 0;
                        $monthlyfee = $monthlyfee ?? 0;
                        ?>
                        @if ($seasonalmonthlyfee > 0 && $seasonalmonthlyfee < $monthlyfee)
                            <span class="strike">$<?php echo $monthlyfee; ?></span>
                            <span class="text-danger">$<?php echo $seasonalmonthlyfee < $monthlyfee ? $seasonalmonthlyfee : $monthlyfee; ?></span>
                        @else
                            $<?php echo $seasonalmonthlyfee > 0 && $seasonalmonthlyfee < $monthlyfee ? $seasonalmonthlyfee : $monthlyfee; ?>
                        @endif
                        <span style="color:#0088ff">/*</span>
                    </dd>
                </dl>
            </div>
            <?php else : ?>-->
            <div class="characteristics">

                <?php
          if ($parentVenue == 'Parque Ciudad del Saber') {
          ?>
                <!--<dl>
                    <dt>Cuenta con luminarias</dt>
                    <dd>
                        <?php
                        if (str_contains($venuefacilities, 'Luminarias')) {
                            echo 'Sí';
                        } else {
                            echo 'No';
                        }
                        ?>
                    </dd>
                </dl>-->

                <!--<dl>
                    @if ($parentid != '02i3m00000Fx0PEAAZ')
                        <dt>Cuenta con graderías</dt>
                    @else
                        <dt>Sala de observación</dt>
                    @endif
                    <dd>
                        <?php
                        if (str_contains($venuefacilities, 'Graderías')) {
                            echo 'Sí';
                        } else {
                            echo 'No';
                        }
                        ?>
                    </dd>
                </dl>-->
                <?php
          }
          ?>

                <?php
          if ($parentVenue != 'Parque Ciudad del Saber') {
          ?>
                <!--<dl>
                    <dt>Configuración</dt>
                    <dd><?php echo count($configuration) > 0 ? (count($configuration) > 1 ? 'Múltiple' : 'Única') : 'No registra'; ?></dd>
                </dl>-->
                <?php
          }
          ?>
                
                @if ($pvax != 'parque-cds' && $pvax != 'Parque Ciudad del Saber' )
                    @if ($parentid != '02i3m0000092sJ1AAI')
                        <div class="font-semibold text-gray-700 text-base md:text-lg">
                            Desde 
                            @if ($seasonalmiddayfee > 0 && $seasonalmiddayfee < $middayfee)
                                    <span class="strike">$<?php echo $middayfee; ?></span>
                                    <span class="text-danger">$<?php echo $seasonalmiddayfee < $middayfee ? $seasonalmiddayfee : $middayfee; ?></span>
                            @else
                                    $<?php echo $seasonalmiddayfee > 0 && $seasonalmiddayfee < $middayfee ? $seasonalmiddayfee : $middayfee; ?>
                            @endif
                             por medio día*
                        </div>
                    @endif
                    <div class="font-semibold text-gray-700 text-base md:text-lg">
                        Desde 
                        @if ($seasonalalldayfee > 0 && $seasonalalldayfee < $alldayfee)
                                <span class="strike">
                                    $<?php echo $alldayfee; ?></span>
                                <span class="text-danger">$<?php echo $seasonalalldayfee < $alldayfee ? $seasonalalldayfee : $alldayfee; ?></span>
                        @else
                                $<?php echo $seasonalalldayfee > 0 && $seasonalalldayfee < $alldayfee ? $seasonalalldayfee : $alldayfee; ?>
                        @endif 
                        por día*
                    </div>
                @else
                    <div class="font-semibold text-base md:text-lg">
                        Desde $<?php echo $hourfee; ?> por hora*
                    </div>
                @endif
                @if ($parentid == '02i3m00000Fx0PJAAZ')
                    <div class="font-semibold text-base md:text-lg">
                        Desde $<?php echo $monthlyfee; ?> por mes
                    </div>
                @endif
                <!--<dl>
                    <dt>Tipo de uso</dt>
                    <dd>

                        <span><?php echo $tipouso; ?></span>

                    </dd>
                </dl>-->

            </div>
            <?php endif ?>
            <!--<p>
                @if ($shownotincluded ?? true)
                    <small style="color:#0088ff; display:inline-block; margin-bottom:5px">
                        @if ($pvax != 'parque-cds' && $pvax != 'Parque Ciudad del Saber')
                            /* Los precios no incluyen catering, ni personal o equipamiento extra /
                        @else
                            /* Los precios listados pueden variar de acuerdo a recargos por noche, fin de semana, y
                            feriados /
                        @endif
                    </small>
                @endif
                 COVID  @if ($showpolicies ?? true)
            <a href="#security-policies" data-bs-toggle="modal" data-bs-target="#security-policies">Revisa la política  para este venue</a>
            @endif
            </p>-->
            <div class="font-semibold text-lg"><!-- Botón de reservar o cotizar  -->
                @if ($venueroute == 'parque-cds')
                    @if ($parentid != '02i3m00000Fx0PJAAZ')
                        <!-- 02i3m00000D9BANAA4  ESTE ID ES DE LA PISCINA  -->
                        <!-- 02i3m00000D9Gu9AAF  ESTE ID ES DE LA -Baloncesto individual   -->
                        <!-- 02i3m00000DiduVAAR  ESTE ID ES DE Bohios   -->
                        <!-- 02i3m00000D9GuWAAV  ESTE ID ES DE Boxeo   -->
                        @if ($hourfee > 0 && 
                            $id != '02i3m00000D9BANAA4' 
                            && $parentid !='02i3m00000DiduVAAR' && $id != '02iRb0000009jcDIAQ' && $id!='02i3m00000D9GuWAAV')
                            <a href="/cotizacion/datos-contacto?id={{ $id }}&franja=hora"
                                class="flex gap-x-2 items-center hover:no-underline hover:text-cdsblue duration-150 transition-all">
                                Reservar horas
                                <div class="h-8 w-8 bg-cdsblue rounded-full grid place-content-center">
                                  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="32px" fill="#e8eaed"><path d="M673-446.67H160v-66.66h513l-240-240L480-800l320 320-320 320-47-46.67 240-240Z"/></svg>
                                </div>
                            </a>
                        @endif
                        
                        @if ($hourfee > 0 && $parentid =='02i3m00000DiduVAAR')
                            <a href="/cotizacion/datos-contacto?id={{ $id }}&franja=hora"
                                class="flex gap-x-2 items-center hover:no-underline hover:text-cdsblue duration-150 transition-all">
                                Cotizar
                                <div class="h-8 w-8 bg-cdsblue rounded-full grid place-content-center">
                                  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="32px" fill="#e8eaed"><path d="M673-446.67H160v-66.66h513l-240-240L480-800l320 320-320 320-47-46.67 240-240Z"/></svg>
                                </div>
                            </a>
                        @endif
                        @if ($alldayfee > 0 && $parentid !='02i3m00000DiduVAAR' )
                            <a href="/cotizacion/datos-contacto?id={{ $id }}&franja=dia"
                                class="flex gap-x-2 items-center hover:no-underline hover:text-cdsblue duration-150 transition-all">
                                Reservar días
                                <div class="h-8 w-8 bg-cdsblue rounded-full grid place-content-center">
                                  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="32px" fill="#e8eaed"><path d="M673-446.67H160v-66.66h513l-240-240L480-800l320 320-320 320-47-46.67 240-240Z"/></svg>
                                </div>
                            </a>
                        @endif
                                                      <!-- @if ($monthlyfee > 0)
                              <a href="/cotizacion/datos-contacto?id={{ $id }}&franja=mes" class="flex gap-x-2 items-center hover:no-underline hover:text-cdsblue duration-150 transition-all">Reservar mes</a>
                              @endif -->
                        @if ($id == '02i3m00000D9BANAA4')
                            <button type="button" class="" data-toggle="modal"
                                data-target="#piscinaHours">
                                <div class="flex gap-x-2 items-center hover:no-underline hover:text-cdsblue duration-150 transition-all">
                                    Ver horarios
                                    <div class="h-8 w-8 bg-cdsblue rounded-full grid place-content-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="32px" fill="#e8eaed"><path d="M673-446.67H160v-66.66h513l-240-240L480-800l320 320-320 320-47-46.67 240-240Z"/></svg>
                                    </div>
                                </div>
                            </button>
                        @endif

                        <!--Baloncesto individual -->
                        @if ($id == '02iRb0000009jcDIAQ')
                          <span class="text-sm font-normal">Para utilizar la cancha para tirar pelota debes realizar el pago por ventanilla en el Gimnasio, Edificio 183.<br>
                            <!-- <br>Lunes a Viernes de 6:00 am a 9:00 pm.<br>Sábados y Domingos de 6:00 am a 6:00 pm. -->
                          </span>
                        @endif
                          <!--Boxeo -->
                        @if ($id == '02i3m00000D9GuWAAV')
                          <span class="text-sm font-normal">Para utilizar el Área de Boxeo debes realizar el pago por ventanilla en el Gimnasio, Edificio 183.<br>
                            <!-- <br>Lunes a Viernes de 6:00 am a 9:00 pm.<br>Sábados y Domingos de 6:00 am a 6:00 pm. -->
                          </span>
                        @endif
                 
                    @else
                        <span class="text-sm font-normal">Para utilizar el Área
                            de Pesas debes realizar el pago por ventanilla en el Gimnasio, Edificio 183.<br>
                            <!-- <br>Lunes a Viernes de 6:00 am a 9:00 pm.<br>Sábados y Domingos de 6:00 am a 6:00 pm. --></span>
                    @endif
                @else
                    <a href="/cotizacion/datos-contacto?id={{ $id }}"
                        class="flex gap-x-2 items-center hover:no-underline hover:text-cdsblue duration-150 transition-all">Cotizar</a>
                @endif
            </div>
        </div>
    </div>
    <!--@if ($configuration && $parentVenue != 'Parque Ciudad del Saber')
        <div class="row" style="margin-top:20px; margin-bottom:0 !important">
            <div class="col-12">
                <strong>Configuración del Aula / Salón</strong>
            </div>
        </div>
        <div class="row configurations">
            <div class="col-12">
                <ul>
                    <li style="background-image:url(/assets/images/configurations/teatro.svg)" <?php echo !isset($configuration['Auditorio']) ? 'class="inactive"' : ''; ?>>
                        <?php echo $configuration['Auditorio'] ?? 0; ?><small>Auditorio</small></li>
                    <li style="background-image:url(/assets/images/configurations/salon-clase.svg)"
                        <?php echo !isset($configuration['Escuela']) ? 'class="inactive"' : ''; ?>><?php echo $configuration['Escuela'] ?? 0; ?><small>Salón de clase</small></li>
                    <li style="background-image:url(/assets/images/configurations/mesa-u.svg)" <?php echo !isset($configuration['Mesa en U']) ? 'class="inactive"' : ''; ?>>
                        <?php echo $configuration['Mesa en U'] ?? 0; ?><small>Mesa en U</small></li>
                    <li style="background-image:url(/assets/images/configurations/mesa-redonda.svg)"
                        <?php echo !isset($configuration['Mesa redonda']) ? 'class="inactive"' : ''; ?>><?php echo $configuration['Mesa redonda'] ?? 0; ?><small>Mesa redonda</small></li>
                    <li style="background-image:url(/assets/images/configurations/sala-reuniones.svg)"
                        <?php echo !isset($configuration['Mesa de reunión']) ? 'class="inactive"' : ''; ?>><?php echo $configuration['Mesa de reunión'] ?? 0; ?><small>Sala de reunión</small></li>
                    <li style="background-image:url(/assets/images/configurations/banquete.svg)" <?php echo !isset($configuration['Cóctel']) ? 'class="inactive"' : ''; ?>>
                        <?php echo $configuration['Cóctel'] ?? 0; ?><small>Banquete</small></li>
                    <li style="background-image:url(/assets/images/configurations/cocktail.svg)" <?php echo !isset($configuration['Cóctel']) ? 'class="inactive"' : ''; ?>>
                        <?php echo $configuration['Cóctel'] ?? 0; ?><small>Cocktail</small></li>
                    <li style="background-image:url(/assets/images/configurations/hollow-square.svg)"
                        <?php echo !isset($configuration['Mesa de reunión']) ? 'class="inactive"' : ''; ?>><?php echo $configuration['Mesa de reunión'] ?? 0; ?><small>Otro</small></li>
                </ul>
            </div>
        </div>
    @endif-->
</div>