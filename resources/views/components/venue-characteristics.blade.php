<?php $facilities = explode(';', $facilities) ?>

<div class="venue-characteristics">
  <span style="color:#0088ff">Características del venue</span>
  <ul>
    <?php if ($type == 'Vivienda') : ?>
    <li>Finos acabados</li>
    <li>Sala</li>
    <li>Comedor</li>
    <li>Baños</li>
    <li>Estacionamientos</li>
    <li>Pet friendly</li>
    <li style="padding-bottom:20px; border-bottom:none">Listas para ocupar</li>
    <?php else : ?>
    <?php if ($venue != 'Ateneo') : ?>
    <li class="title">Centro de conferencias y oficinas</li>
    <li>Capacidad {{ $maxpax }} personas máximo</li>
    <li>{{ $venues }} aulas / salones para eventos</li>
    <li style="padding-bottom:20px; border-bottom:none">96 habitaciones</li>
    <?php endif ?>

    <li class="title">Facilidades</li>
    <?php if ($facilities) : ?>
    <?php foreach ($facilities as $facility) : ?>
    <li><?php echo $facility ?></li>
    <?php endforeach ?>
    <?php else : ?>
    <li>No registra</li>
    <?php endif ?>
    <?php endif ?>
  </ul>
  @if($showpolicies ?? true)
  <br /><br />
  <x-security-measures />
  <br /><br />
  <p class="small" style="max-width:270px">
    <img src="/assets/images/halt-hand.png" width="30" style="margin-bottom:5px" />
    <br />
    Si tu evento requiere de múltiples espacios o excede las 24hs, puedes
    conectarte con nosotros desde el formulario al pie de la página.
  </p>
  @endif
</div>