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
      <a href="/cotizacion/datos-contacto" class="btn btn-primary btn-sm">Cotizar</a>
    </div>
    <div class="col-12 col-md-6">
      <a href="#" class="venue-name">{{ $name }}</a>
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
          <dd>$<?php echo $middayfee ?? 0 ?> <span style="color:#0088ff">/*</span></dd>
        </dl>
        <dl>
          <dt>Precio por día entero</dt>
          <dd>$<?php echo $alldayfee ?? 0 ?> <span style="color:#0088ff">/*</span></dd>
        </dl>
      </div>
      <p><a href="#">Revisa la política Covid para este venue</a></p>
    </div>
  </div>
  <div class="row" style="margin-top:20px; margin-bottom:0 !important">
    <div class="col-12">
      <strong>Configuración del Aula / Salón</strong>
    </div>
  </div>
  <div class="row configurations">
    <div class="col-12">
      <ul>
        <li <?php echo !isset($configuration['Auditorio']) ? 'class="inactive"' : '' ?>><?php echo $configuration['Auditorio'] ?? 0 ?></li>
        <li <?php echo !isset($configuration['Escuela']) ? 'class="inactive"' : '' ?>><?php echo $configuration['Escuela'] ?? 0 ?></li>
        <li <?php echo !isset($configuration['Mesa en U']) ? 'class="inactive"' : '' ?>><?php echo $configuration['Mesa en U'] ?? 0 ?></li>
        <li <?php echo !isset($configuration['Mesa redonda']) ? 'class="inactive"' : '' ?>><?php echo $configuration['Mesa redonda'] ?? 0 ?></li>
        <li <?php echo !isset($configuration['Mesa de reunión']) ? 'class="inactive"' : '' ?>><?php echo $configuration['Mesa de reunión'] ?? 0 ?></li>
        <li <?php echo !isset($configuration['Cóctel']) ? 'class="inactive"' : '' ?>><?php echo $configuration['Cóctel'] ?? 0 ?></li>
        <li <?php echo !isset($configuration['Cóctel']) ? 'class="inactive"' : '' ?>><?php echo $configuration['Cóctel'] ?? 0 ?></li>
        <li <?php echo !isset($configuration['Mesa de reunión']) ? 'class="inactive"' : '' ?>><?php echo $configuration['Mesa de reunión'] ?? 0 ?></li>
      </ul>
      <img src="/assets/images/configurations.png" width="90%" />
    </div>
  </div>
</div>