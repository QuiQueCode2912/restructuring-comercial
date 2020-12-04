<?php 
$theater    = rand(0, 10) * 5;
$classroom  = rand(0, 10) * 5;
$u_config   = rand(0, 10) * 5;
$roundtable = rand(0, 10) * 5;
$meeting    = rand(0, 10) * 5;
$banquette  = rand(0, 10) * 5;
$cocktail   = rand(0, 10) * 5;
$hollow_square = rand(0, 10) * 5;
?>

<div class="venue-list">
  <div class="row">
    <div class="col-12 col-md-6">
      <img src="{{ $image }}" class="venue-image">
      <a href="#" class="btn btn-primary btn-sm">Cotizar</a>
    </div>
    <div class="col-12 col-md-6">
      <a href="#" class="venue-name">{{ $name }}</a>
      <div class="characteristics">
        <dl>
          <dt>Configuración</dt>
          <dd>Múltiple</dd>
        </dl>
        <dl>
          <dt>Capacidad máxima</dt>
          <dd>32 personas</dd>
        </dl>
        <dl>
          <dt>Precio por medio día</dt>
          <dd>$170 <span style="color:#0088ff">/*</span></dd>
        </dl>
        <dl>
          <dt>Precio por medio entero</dt>
          <dd>$280 <span style="color:#0088ff">/*</span></dd>
        </dl>
      </div>
      <p><a href="#">Revisa la política Covid para este venue</a></p>
    </div>
  </div>
  <div class="row configurations">
    <div class="col-12">
      Configuración del Aula / Salón<br />
      <ul>
        <li <?php echo !$theater ? 'class="inactive"' : '' ?>><?php echo $theater ?></li>
        <li <?php echo !$classroom ? 'class="inactive"' : '' ?>><?php echo $classroom ?></li>
        <li <?php echo !$u_config ? 'class="inactive"' : '' ?>><?php echo $u_config ?></li>
        <li <?php echo !$roundtable ? 'class="inactive"' : '' ?>><?php echo $roundtable ?></li>
        <li <?php echo !$meeting ? 'class="inactive"' : '' ?>><?php echo $meeting ?></li>
        <li <?php echo !$banquette ? 'class="inactive"' : '' ?>><?php echo $banquette ?></li>
        <li <?php echo !$cocktail ? 'class="inactive"' : '' ?>><?php echo $cocktail ?></li>
        <li <?php echo !$hollow_square ? 'class="inactive"' : '' ?>><?php echo $hollow_square ?></li>
      </ul>
      <img src="/assets/images/configurations.png" width="90%" />
    </div>
  </div>
</div>