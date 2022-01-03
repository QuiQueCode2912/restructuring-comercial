<div class="venues">
  <div class="container featured">
    <div class="row">
      <div class="col-12">
        <h4>Mira nuestra oferta de servicios</h4>
        <h1>
          Un venue para cada necesidad
        </h1>
      </div>
    </div>
    <div class="row" style="margin-top:40px">
      <div class="col-12 col-md-4">
        <x-venue image="/assets/images/220-101.jpg" name="Ateneo" url="/ateneo" />
      </div>

      <?php if ($venues) : ?>
      <?php foreach ($venues as $venue) : ?>
      <div class="col-12 col-md-4">
        <x-venue-home venue="<?php $venue ?>" />
      </div>
      <?php endforeach ?>
      <?php endif ?>

      <div class="col-12">
        <p class="text-center" style="color:#0088ff"><small>/* Los precios no incluyen catering ni impuestos locales /</small></p>
      </div>
    </div>
  </div>
</div>