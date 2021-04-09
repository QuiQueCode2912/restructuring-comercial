<?php $facilities = explode(';', $facilities) ?>

<div class="venue-characteristics">
  <span style="color:#0088ff">Características del venue</span>
  <ul>
    <li class="title">Centro de conferencias y oficinas</li>
    <li>Capacidad {{ $maxpax }} personas máximo</li>
    <li>{{ $venues }} aulas / salones para eventos</li>
    <li style="padding-bottom:20px; border-bottom:none">96 habitaciones</li>
    <li class="title">Facilidades</li>
    <?php if ($facilities) : ?>
    <?php foreach ($facilities as $facility) : ?>
    <li><?php echo $facility ?></li>
    <?php endforeach ?>
    <?php else : ?>
    <li>No registra</li>
    <?php endif ?>
  </ul>
  <br />
  <i class="fe fe-arrow-right" style="color:#0088ff"></i>
  <a href="https://ciudaddelsaber.hauzd.com" style="font-weight:700">Explora nuestros venues en 3D</a>
  <br /><br />
  <a href="#" style="color:#000000">Revisa la política COVID-19<br />para este venue</a>
  <br /><br />
  <p class="small" style="max-width:270px">
    <img src="/assets/images/halt-hand.png" width="30" style="margin-bottom:5px" />
    <br />
    Si tu evento requiere de múltiples espacios o excede las 24hs, puedes
    conectarte con nosotros desde el formulario al pie de la página.
  </p>
</div>