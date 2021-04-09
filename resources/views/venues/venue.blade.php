@extends('layouts.layout')

@section('content')
<x-covid />
<x-header menu="true" />
<x-venues-menu venue="{{ $venue }}" />
<x-venue-characteristics maxpax="{{ $max_pax }}" facilities="{{ $facilities }}" venues="{{ count($venues) }}" />

<div class="container" style="margin:0 auto; padding:0; position:relative">
  <?php if ($images) : ?>
  <?php foreach ($images as $image) : ?>
    <a href="<?php echo $image ?>" data-lightbox="venue" title="<h1>Centro de convenciones</h1>Los salones tienen capacidad para hasta 24 personas, en formato aula de clases; ideales para reuniones corporativas o académicas.<br><br><a href='#'>Revisa la política COVID para este venue</a>" <?php if ($image == $images[0]) : ?>class="gallery"<?php endif ?>><?php if ($image == $images[0]) : ?>FOTOGALERÍA <span>+</span><?php endif ?></a>
  <?php endforeach ?>
  <?php endif ?>
</div>
<div id="home-carousel" class="carousel slide venue-main-image" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="<?php echo $images[0] ?>" class="d-block" alt="...">
    </div>
  </div>
</div>

<div class="container venue-detail">
  <div class="row">
    <div class="col-12">
      <h6>{{ $venueName }}</h6>
      <h1>{{ $subtitle }}</h1>
      <p class="description">
      <?php echo $parent->main_text ?>
      </p>
      <p>
      <?php echo $parent->secondary_text ?>
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
                <div class="col-12 col-md-4">
                  <a href="#description">Aulas / Salones</a>
                </div>
                <div class="col-12 col-md-4">
                  <a href="#menu">Menús</a>
                </div>
                <div class="col-12 col-md-4">
                  <a href="#venue-location">Ubicación</a>
                </div>
              </div>
              <a name="description"></a>
              
              <h3 style="color:#0088ff; margin:30px 0 5px">Venue: <?php echo $parent->name ?></h3>
              <small>
                <span style="color:#0088ff">/*</span>
                Los precios no incluyen catering ni impuestos locales
              </small>
              <?php if ($venues) : ?>
              <?php foreach ($venues as $venue) : ?>
                <x-venue-list image="/assets/images/220-101.jpg" name="{{ $venue->name }}" designs="{{ $venue->designs }}" type="{{ $venue->type }}" hourfee="{{ $venue->hour_fee }}" middayfee="{{ $venue->mid_day_fee }}" alldayfee="{{ $venue->all_day_fee }}" />
              <?php endforeach ?>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

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

  <br /><br /><a name="venue-location"></a><br />
  <div class="row">
    <div class="col-12 col-md-9">
      <a href="https://ciudaddelsaber.hauzd.com" style="float:right; font-weight:700; text-decoration:underline">Explora nuestros venues en 3D</a>
      <h3 style="color:#0088ff; margin-bottom:10px">Ubicación</h3>
      <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d9234.855855146361!2d-79.58760814660978!3d9.001102129208933!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8faca7b0a46a3bd1%3A0x93b801d16c74cc5c!2sCd%20del%20Saber%2C%20Panam%C3%A1!5e0!3m2!1ses!2sco!4v1590440019299!5m2!1ses!2sco" width="100%" height="450" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
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
@endsection