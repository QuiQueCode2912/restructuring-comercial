@extends('layouts.layout')

@section('content')
<x-covid />
<x-header menu="true" />
<x-carousel id="home-carousel" />
<x-searcher />
<img src="/assets/images/arrow-down-navigation.gif" class="scroll-down">
<x-featured />

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
      <div class="venue">
        <a href="<?php echo $venue['url'] ?>"><img src="<?php echo $venue['image'] ?>"></a>
        <a href="<?php echo $venue['url'] ?>" class="venue-name"><?php echo  $venue['name'] ?></a>
        <?php
        $max_pax = 0; 
        $ppd = 0;
        if ($venue['venues']) {
          foreach ($venue['venues'] as $subvenue) {
            $ppd = $subvenue['all_day_fee'] > $ppd ? $subvenue['all_day_fee'] : $ppd;
          }
        }
        if ($venue['designs']) {
          foreach ($venue['designs'] as $design) {
            $max_pax = $design['max_pax'] > $max_pax ? $design['max_pax'] : $max_pax;
          }
        }
        ?>
        <div class="characteristics">
          <dl>
            <dt>Espacio para</dt>
            <dd><?php echo $max_pax ?> personas</dd>
          </dl>
          <dl>
            <dt>Sala para eventos</dt>
            <dd><?php echo count($venue['venues']) ?></dd>
          </dl>
          <dl>
            <dt>Precio por día</dt>
            <dd>$<?php echo $ppd ?> <span style="color:#0088ff">/*</span></dd>
          </dl>
          <dl>
            <dt>Eventos con alcohol</dt>
            <dd>permitidos</dd>
          </dl>
          <dl>
            <dt>Catering en exteriores</dt>
            <dd>Disponible</dd>
          </dl>
        </div>
        <p><a href="#">Revisa la política Covid para este venue</a></p>
        <a href="/cotizacion/datos-contacto" class="btn btn-primary btn-sm">Cotizar</a>
      </div>
      </div>
      <?php endforeach ?>
      <?php endif ?>

      <div class="col-12">
        <p class="text-center" style="color:#0088ff"><small>/* Los precios no incluyen catering ni impuestos locales /</small></p>
      </div>
    </div>
  </div>
</div>

<x-clients />
<x-contact />
<x-footer />
@endsection