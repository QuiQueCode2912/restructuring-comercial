@extends('layouts.layout')

@section('content')
<x-covid />
<x-header menu="true" />
<x-venues-menu venue="{{ $venue }}" />
<x-venue-characteristics maxpax="{{ $max_pax }}" facilities="{{ $facilities }}" venues="{{ count($venues) }}" showpolicies="{{ $show_policies }}" />

<div class="container" style="margin:0 auto; padding:0; position:relative">
  <?php if ($images) : ?>
  <?php foreach ($images as $image) : ?>
    <?php $image_path = substr($image, 0, strrpos($image, '.')) . '_2048.' . substr($image, strrpos($image, '.') + 1) ?>
    <a href="<?php echo $image_path ?>" data-lightbox="venue" title="<h1>Centro de convenciones</h1>Los salones tienen capacidad para hasta 24 personas, en formato aula de clases; ideales para reuniones corporativas o académicas.<br><br><a href='#'>Revisa la política COVID para este venue</a>" <?php if ($image == $images[0]) : ?>class="gallery"<?php endif ?>><?php if ($image == $images[0]) : ?>FOTOGALERÍA <span>+</span><?php endif ?></a>
  <?php endforeach ?>
    @if($venueName == 'Ateneo')
    <a href="https://izi.travel/es/91de-ateneo/es" target="_blank" class="gallery" style="transform:translate(-100px, 36px); background:#000000; color:#ffffff">AUDIOGUIA</a>
    @endif
    <?php endif ?>
</div>
<div id="home-carousel" class="carousel slide venue-main-image" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <?php $rand = rand(0, count($images) - 1) ?>
      <img src="<?php echo $images[$rand] ? substr($images[$rand], 0, strrpos($images[$rand], '.')) . '_2048.' . substr($images[$rand], strrpos($images[$rand], '.') + 1) : '/assets/images/placeholder-image.jpg' ?>" class="d-block" alt="...">
    </div>
  </div>
</div>

<div class="container venue-detail">
  <div class="row">
    <div class="col-12">
      <h6>{{ $venueName }}</h6>
      <h1>{{ $subtitle }}</h1>
      <p class="description">
      <?php echo $parent ? $parent->main_text : '' ?>
      </p>
      <p>
      <?php echo $parent ? $parent->secondary_text : '' ?>
      </p>
    </div>
  </div>

  <div class="row">
    <div class="col-12">
      <div class="venues-list" style="box-shadow:none">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-9" style="padding-right:40px; padding-left:0">
              <div class="row shortcuts">
              @if($show_shortcuts ?? true)
                <div class="col-12 col-md-4">
                  <a href="#description">Aulas / Salones</a>
                </div>
                <div class="col-12 col-md-4">
                  <a href="#menu">Menús</a>
                </div>
                <div class="col-12 col-md-4">
                  <a href="#venue-location">Ubicación</a>
                </div>
              @endif
              </div>
              <a name="description"></a>
              
              <h3 style="color:#0088ff; margin:30px 0 5px">Venue: <?php echo $parent ? $parent->name : '' ?></h3>
              @if($show_not_included)
              <small>
                <span style="color:#0088ff">/*</span>
                Los precios no incluyen catering ni impuestos locales
              </small>
              @endif
              <?php if ($venues) : ?>
              <?php foreach ($venues as $venue) : ?>
                <?php 
                $venue_img = $venue->files()->count() > 0 ? substr($venue->files()->first()->path, 0, strpos($venue->files()->first()->path, '.')) . '_480.' . substr($venue->files()->first()->path, strpos($venue->files()->first()->path, '.') + 1) : null;
                $venue_image = $venue_img ? url('storage/venues/' . $venue_img) : '/assets/images/placeholder-image_480.jpg'; 
                ?>
                <x-venue-list type="{{ $type ?? 'venues' }}" showpolicies="{{ $show_policies }}" shownotincluded="{{ $show_not_included }}" image="{{ $venue_image }}" id="{{ $venue->id }}" name="{{ $venue->name }}" designs="{{ $venue->designs }}" type="{{ $venue->type }}" hourfee="{{ $venue->hour_fee }}" middayfee="{{ $venue->mid_day_fee }}" alldayfee="{{ $venue->all_day_fee }}" seasonalhourfee="{{ $venue->seasonal_hour_fee }}" seasonalmiddayfee="{{ $venue->seasonal_mid_day_fee }}" seasonalalldayfee="{{ $venue->seasonal_all_day_fee }}" />
              <?php endforeach ?>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  
  @if($show_menu ?? true)
  <a name="menu"></a><br />
  <div class="row">
    <div class="col-12 col-md-9">
      <h3 style="color:#0088ff; margin-bottom:20px">Catering: Menús opcionales</h3>
      <div id="accordion">
        <x-accordion-card index="1" name="Desayunos" />
        <x-accordion-card index="2" name="Coffee break AM" />
        <x-accordion-card index="3" name="Almuerzo" />
        <x-accordion-card index="4" name="Cena" />
      </div>
    </div>
  </div>
  @endif

  <!--
  <br /><br /><br />
  <div class="row">
    <div class="col-12 col-md-9">
      <h3 style="color:#0088ff; margin-bottom:30px">Experiencias compartidas</h3>
      <div class="row">
        <div class="col-12 col-md-6">
          <x-testimonial />
        </div>
        <div class="col-12 col-md-6">
          <x-testimonial />
        </div>
      </div>
    </div>
  </div>
  -->

  <br /><br /><a name="venue-location"></a><br />
  <div class="row">
    <div class="col-12 col-md-9">
      <a href="https://ciudaddelsaber.hauzd.com" style="float:right; font-size:12px; font-weight:700; text-decoration:underline">Explora nuestros venues en 3D</a>
      <h3 style="color:#0088ff; margin-bottom:10px">Ubicación</h3>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7918.400021473715!2d<?php echo $parent ? $parent->longitude : '' ?>!3d<?php echo $parent ? $parent->latitude : '' ?>!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwNTknNTYuMiJOIDc5wrAzNScwMC4xIlc!5e0!3m2!1ses!2sco!4v1618496938772!5m2!1ses!2sco" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9234.855855146361!2d<?php echo $parent ? $parent->longitude : '' ?>!3d<?php echo $parent ? $parent->latitude : '' ?>!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8faca7b0a46a3bd1%3A0x93b801d16c74cc5c!2sCd%20del%20Saber%2C%20Panam%C3%A1!5e0!3m2!1ses!2sco!4v1590440019299!5m2!1ses!2sco" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>-->
    </div>
  </div>

  <br /><br />  

  <div class="row">
    <div class="col-12 col-md-9">
      <h4 style="margin-bottom:20px; font-weight:600">Sitios de interés próximos a Ciudad del Saber</h4>
      <ul class="near-by">
        <li><strong>1 km</strong>Centro de Visitantes del Canal de Panamá (Miraflores)	 Aeropuerto Marcos Gelabert (vuelos internos)</li>
        <li><strong>3 km</strong>Albrook Mall y Terminal de Transporte de Albrook</li> 
        <li><strong>7 km</strong>Casco Antiguo</li>
        <li><strong>10 km</strong>Área Bancaria</li>
        <li><strong>13 km</strong>Museo de la Biodiversidad (en Amador)</li>
      </ul>
    </div>
  </div>  

</div>

<x-contact />
<x-footer />
<x-security-policies />
@endsection