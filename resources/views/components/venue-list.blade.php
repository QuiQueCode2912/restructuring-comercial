<?php 
$designs = json_decode(html_entity_decode($designs ?? ''));
$configuration = [];
if ($designs) {
  foreach ($designs as $design) {
    $configuration[$design->layout] = $design->max_pax;
  }
}
?>

<div class="venue-list">
  <div class="row">
    <div class="col-12 col-md-6">
      <img src="{{ $image }}" class="venue-image">
      <a href="/cotizacion/datos-contacto?id={{ $id }}" class="btn btn-primary btn-sm">Cotizar</a>
    </div>
    <div class="col-12 col-md-6">
      <a href="#" class="venue-name">{{ $name }}</a>
      @if($type ?? 'venues' == 'residencias')
      <div class="characteristics">
        <dl>
          <dt>Habitaciones</dt>
          <dd>0</dd>
        </dl>
        <dl>
          <dt>Área cerrada</dt>
          <dd>0 mts<sup>2</sup></dd>
        </dl>
        <dl>
          <dt>Área abierta</dt>
          <dd>0 mts<sup>2</sup></dd>
        </dl>
        <dl>
          <dt>Mensualidad</dt>
          <dd>
            desde
            @if($seasonalmiddayfee < $middayfee)
            <span class="strike">$<?php echo $middayfee ?></span>
            <span class="text-danger">$<?php echo $seasonalmiddayfee < $middayfee ? $seasonalmiddayfee : $middayfee ?></span> 
            @else
            $<?php echo $seasonalmiddayfee < $middayfee ? $seasonalmiddayfee : $middayfee ?> 
            @endif
            <span style="color:#0088ff">/*</span>
          </dd>
        </dl>
      </div>
      @else
      <div class="characteristics">
        <dl>
          <dt>Configuración</dt>
          <dd><?php echo count($configuration) > 0 ? (count($configuration) > 1 ? 'Múltiple' : 'Única') : 'No registra' ?></dd>
        </dl>
        <dl>
          <dt>Capacidad máxima</dt>
          <dd><?php echo $configuration ? max($configuration) : 0 ?> personas</dd>
        </dl>
        <dl>
          <dt>Precio por medio día</dt>
          <dd>
            desde
            @if($seasonalmiddayfee < $middayfee)
            <span class="strike">$<?php echo $middayfee ?></span>
            <span class="text-danger">$<?php echo $seasonalmiddayfee < $middayfee ? $seasonalmiddayfee : $middayfee ?></span> 
            @else
            $<?php echo $seasonalmiddayfee < $middayfee ? $seasonalmiddayfee : $middayfee ?> 
            @endif
            <span style="color:#0088ff">/*</span>
          </dd>
        </dl>
        <dl>
          <dt>Precio por día entero</dt>
          <dd>
            desde
            @if($seasonalalldayfee < $alldayfee)
            <span class="strike">$<?php echo $alldayfee ?></span>
            <span class="text-danger">$<?php echo $seasonalalldayfee < $alldayfee ? $seasonalalldayfee : $alldayfee ?></span> 
            @else
            $<?php echo $seasonalalldayfee < $alldayfee ? $seasonalalldayfee : $alldayfee ?> 
            @endif
            <span style="color:#0088ff">/*</span>
          </dd>
        </dl>
      </div>
      @endif
      <p>
        @if($shownotincluded)<small style="color:#0088ff; display:inline-block; margin-bottom:5px">/* No incluyen catering, personal o equipamiento extra /</small>@endif
        @if($showpolicies)<a href="#security-policies" data-bs-toggle="modal" data-bs-target="#security-policies">Revisa la política Covid para este venue</a>@endif
      </p>
    </div>
  </div>
  @if($configuration)
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