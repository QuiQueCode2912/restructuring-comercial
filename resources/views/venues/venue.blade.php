@extends('layouts.layout')

@section('content')
<!-- COVID <x-covid /> -->
<x-header menu="true" />




<!-- Modal -->

<!-- Modal -->
<x-piscina-horarios />

<x-venue-characteristics type="{{ $venues ? $venues[0]->type : 'venues' }}" maxpax="{{ $max_pax }}" facilities="{{ $facilities }}" venues="{{ count($venues) }}" venue="{{ $venueName }}" showpolicies="{{ $show_policies ?? true }}" venueid="{{ isset($venueid) ? $venueid : '' }}" parentid="{{ isset($parentid) ? $parentid : '' }}"/>

@if(request()->has('openmodal'))
    <input type="hidden" id="openmodal" value="{{ request('openmodal') }}">
@endif

<script>
    document.addEventListener('DOMContentLoaded', function() {
        var variableValue = document.getElementById('openmodal');
        if (variableValue) {
            var bohioButton = document.getElementById('BohiosButton');
            if (bohioButton) {
                bohioButton.click();
            }
        }
    });
</script>

@if(request()->is('parque-cds/piscina'))
    <div id="nwp-hero-piscina"></div>
    <div id="nwp-piscina-section-1"></div>
    <div id="nwp-piscina-content-whit-video-section"></div>
@endif

<div class=" venue-detail mt-40 nwp-padding-x-container">
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

  <div class="row mt-20 mx-auto nwp-container ">
    <div class="col-12  px-0">
      <div class="venues-list" style="box-shadow:none">
        <div class="container">
          <div class="row">
            <div class="col-12 col-md-12" style="padding-right:40px; padding-left:0">
              <!--<div class="row shortcuts">
                @if($show_shortcuts ?? true && $venueName != 'Ateneo')
                <div class="col-12 col-md-4">
                  <a href="#description">
                    @if($venueName != 'Parque Ciudad del Saber')
                    Aulas / Salones
                    @else
                    Canchas / Espacios
                    @endif
                  </a>
                </div>
                @if($show_menu ?? true )
                <div class="col-12 col-md-4">
                  <a href="#menu">Menús</a>
                </div>
                @endif
                <div class="col-12 col-md-4">
                  <a href="#venue-location">Ubicación</a>
                </div>
                @endif
              </div>-->
              <!--<a name="description"></a>-->
              @if(request()->is('parque-cds/piscina'))
                  <p class="font-bold text-4xl md:text-5xl text-black md:w-3/5">Un espacio abierto: </br>Recreacion y deporte en un mismo lugar</p>
              @endif
              @if(request()->is('parque-cds/piscina'))
                  <p class="text-lg md:w-3/5 py-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.
                  </p>
              @endif
              <h3 class="hidden" style="color:#505152; margin:30px 0 5px ">
                @if ($parent->id == '02i3m0000092sJ1AAI')
                   La Casa
                @endif
                <?php echo ($parent && $parent->id != '02i3m0000092sJ1AAI') ? $parent->name : '' ?></h3>
              @if($show_not_included ?? true)
              <small>
                <span style="color:#0088ff">
                @if($venueName != 'Parque Ciudad del Saber')
                  <div class="rounded-lg bg-cdsgray700 font-semibold border-l-8 border-cdsblue flex gap-x-2 p-2 md:w-3/5">
                      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-2" height="40px" viewBox="0 -960 960 960" width="40px" fill="#0088ff">
                          <path d="M479.99-280q15.01 0 25.18-10.15 10.16-10.16 10.16-25.17 0-15.01-10.15-25.18-10.16-10.17-25.17-10.17-15.01 0-25.18 10.16-10.16 10.15-10.16 25.17 0 15.01 10.15 25.17Q464.98-280 479.99-280Zm-31.32-155.33h66.66V-684h-66.66v248.67ZM480.18-80q-82.83 0-155.67-31.5-72.84-31.5-127.18-85.83Q143-251.67 111.5-324.56T80-480.33q0-82.88 31.5-155.78Q143-709 197.33-763q54.34-54 127.23-85.5T480.33-880q82.88 0 155.78 31.5Q709-817 763-763t85.5 127Q880-563 880-480.18q0 82.83-31.5 155.67Q817-251.67 763-197.46q-54 54.21-127 85.84Q563-80 480.18-80Zm.15-66.67q139 0 236-97.33t97-236.33q0-139-96.87-236-96.88-97-236.46-97-138.67 0-236 96.87-97.33 96.88-97.33 236.46 0 138.67 97.33 236 97.33 97.33 236.33 97.33ZM480-480Z"/>
                      </svg>
                      <span class="text-black text-lg" id="venues-prices">Los precios no incluyen catering ni impuestos locales</span>
                  </div>
                @else
                  <div class="rounded-lg bg-cdsgray700 font-semibold border-l-8 border-cdsblue flex gap-x-2 p-2 md:w-3/5">
                      <svg xmlns="http://www.w3.org/2000/svg" class="stroke-2" height="40px" viewBox="0 -960 960 960" width="40px" fill="#0088ff">
                          <path d="M479.99-280q15.01 0 25.18-10.15 10.16-10.16 10.16-25.17 0-15.01-10.15-25.18-10.16-10.17-25.17-10.17-15.01 0-25.18 10.16-10.16 10.15-10.16 25.17 0 15.01 10.15 25.17Q464.98-280 479.99-280Zm-31.32-155.33h66.66V-684h-66.66v248.67ZM480.18-80q-82.83 0-155.67-31.5-72.84-31.5-127.18-85.83Q143-251.67 111.5-324.56T80-480.33q0-82.88 31.5-155.78Q143-709 197.33-763q54.34-54 127.23-85.5T480.33-880q82.88 0 155.78 31.5Q709-817 763-763t85.5 127Q880-563 880-480.18q0 82.83-31.5 155.67Q817-251.67 763-197.46q-54 54.21-127 85.84Q563-80 480.18-80Zm.15-66.67q139 0 236-97.33t97-236.33q0-139-96.87-236-96.88-97-236.46-97-138.67 0-236 96.87-97.33 96.88-97.33 236.46 0 138.67 97.33 236 97.33 97.33 236.33 97.33ZM480-480Z"/>
                      </svg>
                      <span class="text-black text-lg" id="venues-prices">Los precios listados pueden variar de acuerdo a recargos por noche, fin de semana y feriados</span>
                  </div>
                @endif
                </span>
              </small>
              @endif
              <?php $venueRoute = $venue; ?>
              <?php if ($venues) : ?>
                <?php foreach ($venues as $venue) : ?>
                  <?php
                  if (isset($venue->fixed_image)) {
                    $venue_image = image_url('assets/images/residencies/' . $venue->fixed_image);
                  } else {
                    $venue_img = $venue->files()->count() > 0 ? substr($venue->files()->first()->path, 0, strpos($venue->files()->first()->path, '.')) . '_480.' . substr($venue->files()->first()->path, strpos($venue->files()->first()->path, '.') + 1) : null;
                    $venue_image = $venue_img ? image_url('storage/venues/' . $venue_img) : '/assets/images/placeholder-image_480.jpg';
                  }
                  ?>
                  <x-venue-list showpolicies="{{ $show_policies ?? true }}" shownotincluded="{{ $show_not_included ?? true }}" image="{{ $venue_image }}" id="{{ $venue->id }}" parentid="{{ $venue->parent_id }}"  name="{{ $venue->name }}" designs="{{ $venue->designs }}" type="{{ $venue->type }}" venueroute="{{ $venueRoute }}" parentVenue="{{ $venueName }}" venuefacilities="{{ $venue->venue_facilities }}" rooms="{{ $venue->rooms ?? 0 }}" closedarea="{{ $venue->closed_area ?? 0 }}" openarea="{{ $venue->open_area ?? 0 }}" hourfee="{{ $venue->hour_fee ?? 0 }}" middayfee="{{ $venue->mid_day_fee ?? 0 }}" alldayfee="{{ $venue->all_day_fee ?? 0 }}" monthlyfee="{{ $venue->monthly_fee ?? 0 }}" seasonalhourfee="{{ $venue->seasonal_hour_fee }}" seasonalmiddayfee="{{ $venue->seasonal_mid_day_fee }}" seasonalalldayfee="{{ $venue->seasonal_all_day_fee }}" seasonalmonthlyfee="{{ $venue->seasonal_monthly_fee ?? 0 }}" tipouso="{{ $venue->tipo_uso }}" />
                <?php endforeach ?>
              <?php endif ?>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

  @if($show_menu ?? true && $venueName != 'Ateneo')
  <a name="menu"></a><br />
  <div class="row">
    <div class="col-12 col-md-9">
      <h3 style="color:#0088ff; margin-bottom:20px">Catering: Menús opcionales</h3>
      <div id="accordion">
        <x-accordion-card index="1" name="Coffee breaks" />
        <x-accordion-card index="2" name="Lunch boxes" />
        <x-accordion-card index="3" name="Almuerzos" />
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
  <a name="venue-location"></a>


  <div class="row  v-characteristics-mobile">
    <div class="col-12 col-md-9">
      <x-venue-characteristics type="{{ $venues ? $venues[0]->type : 'venues' }}" maxpax="{{ $max_pax }}" facilities="{{ $facilities }}" venues="{{ count($venues) }}" venue="{{ $venueName }}" showpolicies="{{ $show_policies ?? true }}" venueid="{{ isset($venueid) ? $venueid : '' }}" parentid="{{ isset($parentid) ? $parentid : '' }}"/>
    </div>
  </div>

  <div class="row">
    <div class="col-12 col-md-9">
    <!--
      <a href="https://ciudaddelsaber.hauzd.com" style="float:right; font-size:12px; font-weight:700; text-decoration:underline">Explora nuestros venues en 3D</a>
      -->
      <h3 id="map" style="color:#0088ff; margin-bottom:10px">Ubicación</h3>
      <!--<iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d7918.400021473715!2d<?php echo $parent ? $parent->longitude : '' ?>!3d<?php echo $parent ? $parent->latitude : '' ?>!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x0!2zOMKwNTknNTYuMiJOIDc5wrAzNScwMC4xIlc!5e0!3m2!1ses!2sco!4v1618496938772!5m2!1ses!2sco" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>-->

      <iframe src="https://maps.google.com/maps?width=100%25&amp;height=450&amp;hl=en&amp;q=<?php echo $parent ? $parent->latitude : '' ?>,%20<?php echo $parent ? $parent->longitude : '' ?>+(My%20Business%20Name)&amp;t=&amp;z=16&amp;ie=UTF8&amp;iwloc=B&amp;output=embed" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy"></iframe>
      @if(request()->server('HTTP_USER_AGENT') && strpos(request()->server('HTTP_USER_AGENT'), 'Mobile') !== false)
      <a href="https://www.waze.com/ul?ll=<?php echo $parent ? $parent->latitude : '' ?>,<?php echo $parent ? $parent->longitude : '' ?>&navigate=yes"><img src="/assets/images/waze.gif" wdith="80px" height="80px" style="position:absolute;top:50px;right:25px"/></a>
      <a href="https://maps.google.com/?q=<?php echo $parent ? $parent->latitude : '' ?>,<?php echo $parent ? $parent->longitude : '' ?>"><img src="/assets/images/gmaps.gif" wdith="80px" height="80px" style="position:absolute;top:150px;right:25px"/></a>
      @endif
    </div>
  </div>

  <br /><br />

  <div class="row">
    <div class="col-12 col-md-9">
      <h4 style="margin-bottom:20px; font-weight:600">Sitios de interés próximos a Ciudad del Saber</h4>
      <ul class="near-by">
        <li><strong>1 km</strong>Centro de Visitantes del Canal de Panamá (Miraflores) Aeropuerto Marcos Gelabert (vuelos internos)</li>
        <li><strong>3 km</strong>Albrook Mall y Terminal de Transporte de Albrook</li>
        <li><strong>7 km</strong>Casco Antiguo</li>
        <li><strong>10 km</strong>Área Bancaria</li>
        <li><strong>13 km</strong>Museo de la Biodiversidad (en Amador)</li>
      </ul>
    </div>
  </div>

</div>

<!-- <x-contact /> -->
<x-footer />
<x-security-policies />
@endsection
