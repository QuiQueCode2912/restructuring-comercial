<?php
$designs = json_decode(html_entity_decode($designs ?? ''));
$configuration = [];
if ($designs) {
  foreach ($designs as $design) {
    $configuration[$design->layout] = $design->max_pax;
  }
}
if(!isset($venueroute))
{
  $venueroute = "";
  }
  if(!isset($parentVenue))
{
  $parentVenue = "";
  }
    if(!isset($tipouso))
{
  $tipouso = "";
  }
  $pvax = isset($parentVenue) ? $parentVenue : $venue['name'];
?>

<div class="venue-list">
  <div class="row">
    <div class="col-12 col-md-6 v-container">
      <img src="{{ $image }}" class="venue-image" />
      <div class="v-button-container">
        @if($venueroute == "parque-cds")
          @if($parentid!='02i3m00000Fx0PJAAZ')
            @if($hourfee > 0) <a href="/cotizacion/datos-contacto?id={{ $id }}&franja=hora" class="btn btn-primary btn-sm">Reservar horas</a> @endif
            @if($alldayfee > 0) <a href="/cotizacion/datos-contacto?id={{ $id }}&franja=dia" class="btn btn-primary btn-sm">Reservar días</a> @endif
            <!-- @if($monthlyfee > 0) <a href="/cotizacion/datos-contacto?id={{ $id }}&franja=mes" class="btn btn-primary btn-sm">Reservar mes</a> @endif -->
          @else
            <span style="font-family: roboto; font-weight: 600; text-transform: none;">Para utilizar el Área de pesas sólo debes venir y pagar la cuota de uso<br><br>Lunes a Viernes de 6AM a 9PM<br>Sábados y Dominos de 6AM a 6PM</span>
          @endif
        @else
          <a href="/cotizacion/datos-contacto?id={{ $id }}" class="btn btn-primary btn-sm">Cotizar</a>
        @endif
      </div>
    </div>
    <div class="col-12 col-md-6">
      <p class="venue-name"><?php echo $parent ?? '' ? $parent . ' - ' : '' ?>{{ $name }}</p>
      <!--<a href="#map">
      <img src="/assets/images/mapIcon.png" width="50px" height="50px" style="position:absolute;right:14px;top:-10px;">
      </a>-->
      <?php if (($type ?? 'venue') == 'Vivienda') : ?>
        <div class="characteristics">
          <dl>
            <dt>Habitaciones</dt>
            <dd><?php echo $rooms ?? '' ?></dd>
          </dl>
          <dl>
            <dt>Área cerrada</dt>
            <dd><?php echo $closedarea ?? '' ?> mts<sup>2</sup></dd>
          </dl>
          <dl>
            <dt>Área abierta</dt>
            <dd><?php echo $openarea ?? '' ?> mts<sup>2</sup></dd>
          </dl>
          <dl>
            <dt>Mensualidad</dt>
            <dd>
              desde
              <?php
              $seasonalmonthlyfee = $seasonalmonthlyfee ?? 0;
              $monthlyfee = $monthlyfee ?? 0;
              ?>
              @if($seasonalmonthlyfee > 0 && $seasonalmonthlyfee < $monthlyfee) <span class="strike">$<?php echo $monthlyfee ?></span>
                <span class="text-danger">$<?php echo $seasonalmonthlyfee < $monthlyfee ? $seasonalmonthlyfee : $monthlyfee ?></span>
                @else
                $<?php echo $seasonalmonthlyfee > 0 && $seasonalmonthlyfee < $monthlyfee ? $seasonalmonthlyfee : $monthlyfee ?>
                @endif
                <span style="color:#0088ff">/*</span>
            </dd>
          </dl>
        </div>
      <?php else : ?>
        <div class="characteristics">

          <?php
          if ($parentVenue == 'Parque Ciudad del Saber') {
          ?>
            <dl>
              <dt>Cuenta con luminarias</dt>
              <dd>
                <?php
                if (str_contains($venuefacilities, 'Luminarias')) {
                  echo 'Si';
                } else {
                  echo 'No';
                }
                ?>
              </dd>
            </dl>

            <dl>
              <dt>Cuenta con graderías</dt>
              <dd>
                <?php
                if (str_contains($venuefacilities, 'Graderías')) {
                  echo 'Si';
                } else {
                  echo 'No';
                }
                ?>
              </dd>
            </dl>
          <?php
          }
          ?>

          <?php
          if ($parentVenue != 'Parque Ciudad del Saber') {
          ?>
            <dl>
              <dt>Configuración</dt>
              <dd><?php echo count($configuration) > 0 ? (count($configuration) > 1 ? 'Múltiple' : 'Única') : 'No registra';    ?></dd>
            </dl>
          <?php
          }
          ?>
          @if($parentid!='02i3m00000Fx0PJAAZ')
          <dl>
            <dt>Capacidad máxima</dt>
            <dd><?php echo $configuration ? max($configuration) : 0 ?> personas</dd>
          </dl>
          @endif
          @if($pvax != 'parque-cds'  && $pvax != 'Parque Ciudad del Saber')
          <dl>
            <dt>Precio por medio día</dt>
            <dd>
              desde
              @if($seasonalmiddayfee > 0 && $seasonalmiddayfee < $middayfee) <span class="strike">$<?php echo $middayfee ?></span>
                <span class="text-danger">$<?php echo $seasonalmiddayfee < $middayfee ? $seasonalmiddayfee : $middayfee ?></span>
                @else
                $<?php echo $seasonalmiddayfee > 0 && $seasonalmiddayfee < $middayfee ? $seasonalmiddayfee : $middayfee ?>
                @endif
                <span style="color:#0088ff">/*</span>
            </dd>
          </dl>
          <dl>
            <dt>Precio por día entero</dt>
            <dd>
              desde
              @if($seasonalalldayfee > 0 && $seasonalalldayfee < $alldayfee)
              <span class="strike">
                $<?php echo $alldayfee ?></span>
                <span class="text-danger">$<?php echo $seasonalalldayfee < $alldayfee ? $seasonalalldayfee : $alldayfee ?></span>
                @else
                $<?php echo $seasonalalldayfee > 0 && $seasonalalldayfee < $alldayfee ? $seasonalalldayfee : $alldayfee ?>
                @endif
                <span style="color:#0088ff">/*</span>
            </dd>
          </dl>
          @else
          <dl>
            <dt>Precio por hora</dt>
            <dd>
              desde
              
                $<?php echo $hourfee ?>
                <span style="color:#0088ff">/*</span>
            </dd>
          </dl>
          @endif
          <dl>
            <dt>Tipo de uso</dt>
            <dd>

              <span><?php echo $tipouso ?></span>

            </dd>
          </dl>

        </div>
      <?php endif ?>
      <p>
        @if($shownotincluded ?? true)
        <small style="color:#0088ff; display:inline-block; margin-bottom:5px">
         @if($pvax != 'parque-cds'  && $pvax != 'Parque Ciudad del Saber')
        /* Los precios no incluyen catering, ni personal o equipamiento extra /
        @else
        /* Los precios listados pueden variar de acuerdo a recargos por noche, fin de semana, y feriados /
        @endif
        </small>
          @endif
      <!-- COVID  @if($showpolicies ?? true)<a href="#security-policies" data-bs-toggle="modal" data-bs-target="#security-policies">Revisa la política  para este venue</a>@endif -->
      </p>
    </div>
  </div>
  @if($configuration && $parentVenue != 'Parque Ciudad del Saber')
  <div class="row" style="margin-top:20px; margin-bottom:0 !important">
    <div class="col-12">
      <strong>Configuración del Aula / Salón</strong>
    </div>
  </div>
  <div class="row configurations">
    <div class="col-12">
      <ul>
        <li style="background-image:url(/assets/images/configurations/teatro.svg)" <?php echo !isset($configuration['Auditorio']) ? 'class="inactive"' : '' ?>><?php echo $configuration['Auditorio'] ?? 0 ?><small>Auditorio</small></li>
        <li style="background-image:url(/assets/images/configurations/salon-clase.svg)" <?php echo !isset($configuration['Escuela']) ? 'class="inactive"' : '' ?>><?php echo $configuration['Escuela'] ?? 0 ?><small>Salón de clase</small></li>
        <li style="background-image:url(/assets/images/configurations/mesa-u.svg)" <?php echo !isset($configuration['Mesa en U']) ? 'class="inactive"' : '' ?>><?php echo $configuration['Mesa en U'] ?? 0 ?><small>Mesa en U</small></li>
        <li style="background-image:url(/assets/images/configurations/mesa-redonda.svg)" <?php echo !isset($configuration['Mesa redonda']) ? 'class="inactive"' : '' ?>><?php echo $configuration['Mesa redonda'] ?? 0 ?><small>Mesa redonda</small></li>
        <li style="background-image:url(/assets/images/configurations/sala-reuniones.svg)" <?php echo !isset($configuration['Mesa de reunión']) ? 'class="inactive"' : '' ?>><?php echo $configuration['Mesa de reunión'] ?? 0 ?><small>Sala de reunión</small></li>
        <li style="background-image:url(/assets/images/configurations/banquete.svg)" <?php echo !isset($configuration['Cóctel']) ? 'class="inactive"' : '' ?>><?php echo $configuration['Cóctel'] ?? 0 ?><small>Banquete</small></li>
        <li style="background-image:url(/assets/images/configurations/cocktail.svg)" <?php echo !isset($configuration['Cóctel']) ? 'class="inactive"' : '' ?>><?php echo $configuration['Cóctel'] ?? 0 ?><small>Cocktail</small></li>
        <li style="background-image:url(/assets/images/configurations/hollow-square.svg)" <?php echo !isset($configuration['Mesa de reunión']) ? 'class="inactive"' : '' ?>><?php echo $configuration['Mesa de reunión'] ?? 0 ?><small>Otro</small></li>
      </ul>
    </div>
  </div>
  @endif
</div>
