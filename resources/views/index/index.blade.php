@extends('layouts.layout')

@section('content')
<x-covid />
<x-header menu="true" />

<?php if ($show_venues_menu) : ?>
<x-venues-menu venue="{{ $venue }}" />
<?php endif ?>

<?php if ($show_carousel) : ?>
<x-carousel id="home-carousel" venueTitle="{{ $venue_title }}" venueSubtitle="{{ $venue_subtitle }}" venueImage="{{ $venue_image }}" />
<x-searcher />
<img src="/assets/images/arrow-down-navigation.gif" class="scroll-down">
<?php endif ?>

<?php if ($show_featured_text) : ?>
<x-featured />
<?php endif ?>

<div class="venues">
  <div class="container featured">
    <div class="row">
      <div class="col-12">
        <h4>Mira nuestra oferta de servicios</h4>
        <h1>
          Un espacio para cada necesidad
        </h1>
      </div>
    </div>
    <div class="row" style="margin-top:40px">
      <?php if ($venues) : ?>
      <?php foreach ($venues as $venue) : ?>
      <div class="col-12 col-md-4">
      <div class="venue">
        <a href="<?php echo $venue['url'] ?>"><img src="<?php echo substr($venue['image'], 0, strrpos($venue['image'], '.')) . '_480.' . substr($venue['image'], strrpos($venue['image'], '.') + 1) ?>"></a>
        <a href="<?php echo $venue['url'] ?>" class="venue-name"><?php echo  $venue['name'] ?></a>
        <?php
        $max_pax = 0; 
        $ppd = 0;
        $sppd = 0;
        if ($venue['venues']) {
          foreach ($venue['venues'] as $subvenue) {
            $ppd = $subvenue['all_day_fee'] > $ppd ? $subvenue['all_day_fee'] : $ppd;
            $sppd = $subvenue['seasonal_all_day_fee'] > $sppd ? $subvenue['seasonal_all_day_fee'] : $sppd;
          }
        }
        if($venue['type'] == 'Habitaciones')
        {
        $configuracion = "Distribuciones";
            $max_pax = 96;
            $max_pax_txt ="simple, doble, triple";
        }
        else
        {
        $configuracion = "Espacio para";
        if ($venue['designs']) {
          foreach ($venue['designs'] as $design) {
            $max_pax = $design['max_pax'] > $max_pax ? $design['max_pax'] : $max_pax;
          }
        }
        $max_pax_txt = $max_pax . ' personas';
        }
        ?>
        <div class="characteristics">
          <dl>
            <dt><?php echo $configuracion ?></dt>
            <dd><?php echo $max_pax_txt ?></dd>
          </dl>
          <dl>
            <dt><?php
            $pvax = isset($parentVenue) ? $parentVenue : '';
            if($pvax != 'parque-cds')
            {
            echo $venue['type'];
            } else
            {
            echo "Canchas/Espacios";
            }
            ?></dt>
            <dd><?php
             if($venue['type'] == 'Habitaciones')
        {
            echo 96;
            } else {
	echo count($venue['venues']);
}

            ?></dd>
          </dl>
          <dl>
            <dt>Precio por día</dt>
            <dd>
              desde
              @if($sppd < $ppd)
              <span class="strike">$<?php echo $ppd ?></span>
              <span class="text-danger">$<?php echo $sppd < $ppd ? $sppd : $ppd ?></span> 
              @else
              $<?php echo $sppd < $ppd ? $sppd : $ppd ?> 
              @endif
              <span style="color:#0088ff">/*</span>
            </dd>
          </dl>
          <?php
            if($pvax != 'parque-cds')
            {
          ?>
          <dl>
            <dt>Eventos con alcohol</dt>
            <dd>permitidos</dd>
          </dl>
          <dl>
            <dt>Servicio de catering</dt>
            <dd>Disponible</dd>
          </dl>
          <?php
            }
          ?>
        </div>
        <p>
          <a href="#security-policies" data-bs-toggle="modal" data-bs-target="#security-policies">Revisa la política Covid para este venue</a>
        </p>
        <a href="<?php echo $venue['url'] ?>" class="btn btn-primary btn-sm">Ver oferta</a>
      </div>
      </div>
      <?php endforeach ?>
      <?php endif ?>

      <div class="col-12">
        <p class="text-center" style="color:#0088ff"><small>/* Los precios no incluyen catering, ni personal o equipamiento extra /</small></p>
      </div>
    </div>
  </div>
</div>

<x-clients clients="{{ $clients }}" />

<?php if ($show_contact_form) : ?>
<x-contact />
<?php endif ?>

<x-footer />
<x-security-policies />
@endsection
