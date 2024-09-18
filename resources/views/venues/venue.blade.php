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
    <div id="nwp-piscina-content-section-whith-an-image"></div>
    <div id="nwp-piscina-content-whit-video-section"></div>
@endif
@if(request()->is('parque-cds/baloncesto'))
    <div id="nwp-hero-baloncesto"></div>
    <div id="nwp-baloncesto-content-section-whith-an-image"></div>
    <div id="nwp-baloncesto-content-whit-video-section"></div>
@endif
@if(request()->is('parque-cds/golf'))
    <div id="nwp-hero-golf"></div>
    <div id="nwp-golf-content-section-whith-an-image"></div>
    <div id="nwp-golf-content-whit-video-section"></div>
@endif
@if(request()->is('parque-cds/raquetbol'))
    <div id="nwp-hero-raquetbol"></div>
    <div id="nwp-raquetbol-content-section-whith-an-image"></div>
    <div id="nwp-raquetbol-content-whit-video-section"></div>
@endif
@if(request()->is('parque-cds/voleibol'))
    <div id="nwp-hero-voleibol"></div>
    <div id="nwp-voleibol-content-section-whith-an-image"></div>
    <div id="nwp-voleibol-content-whit-video-section"></div>
@endif
@if(request()->is('parque-cds/tenis'))
    <div id="nwp-hero-tenis"></div>
    <div id="nwp-tenis-content-section-whith-an-image"></div>
    <div id="nwp-tenis-content-whit-video-section"></div>
@endif
@if(request()->is('parque-cds/pesas'))
    <div id="nwp-hero-pesas"></div>
    <div id="nwp-pesas-content-section-whith-an-image"></div>
    <div id="nwp-pesas-content-whit-video-section"></div>
@endif
@if(request()->is('parque-cds/boxeo'))
    <div id="nwp-hero-boxeo"></div>
    <div id="nwp-boxeo-content-section-whith-an-image"></div>
    <div id="nwp-boxeo-content-whit-video-section"></div>
@endif
@if(request()->is('parque-cds/bohios'))
    <div id="nwp-hero-bohios"></div>
    <div id="nwp-bohios-content-section-whith-an-image"></div>
    <div id="nwp-bohios-content-whit-video-section"></div>
@endif
@if(request()->is('parque-cds/futbol'))
    <div id="nwp-hero-futbol"></div>
    <div id="nwp-futbol-content-section-whith-an-image"></div>
    <div id="nwp-futbol-content-whit-video-section"></div>
@endif
@if(request()->is('parque-cds/beisbol'))
    <div id="nwp-hero-beisbol"></div>
    <div id="nwp-beisbol-content-section-whith-an-image"></div>
    <div id="nwp-beisbol-content-whit-video-section"></div>
@endif

@if(request()->is('e-108'))
    <div id="nwp-hero-la-casa"></div>
    <div id="nwp-event-spaces-content-section-whith-an-image"></div>
    <div id="nwp-event-spaces-gallery-section"></div>
    <div id="nwp-event-spaces-campus-facilities"></div>
@endif
@if(request()->is('ateneo'))
    <div id="nwp-ateneo-hero"></div>
    <div id="nwp-ateneo-content-section-whith-an-image"></div>
    <div id="nwp-ateneo-gallery-section"></div>
    <div id="nwp-ateneo-campus-facilities"></div>
@endif


<div class="nwp-padding-x-container">
  <div class="row hidden">
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

  <div id="reservasss" class="row relative py-20 mx-auto nwp-container ">
      <div class="  hidden md:inline-block md:absolute -top-32 right-0 ">
        <svg width="379" height="405" viewBox="0 0 379 405" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M352.84 84.2C352.84 86.53 350.97 88.4 348.65 88.4C347.53 88.4 346.52 87.96 345.77 87.25C309.75 54.12 259.35 32.85 202.95 36.36C122.1 41.4 64.1001 84.57 67.9201 145.71C68.7401 158.61 72.4601 171.27 79.0601 182.81C90.3701 202.65 108.74 216.86 130.74 222.87C152.77 228.9 175.82 225.96 195.65 214.66C212.33 205.11 227.55 204.25 241.5 208.05C256.48 212.14 268.95 221.81 276.68 235.29C280.87 242.63 283.58 250.57 284.1 258.75C287.42 312.12 225.56 338.19 173.45 341.18C155.73 342.2 137.76 340.33 120.13 335.53C77.4401 323.87 41.8101 296.28 19.8601 257.82C10.4301 241.27 4.04012 223.56 0.710117 205.36C0.650117 205.07 0.620117 204.76 0.620117 204.44C0.620117 202.13 2.49012 200.23 4.81012 200.23C6.56012 200.23 8.04012 201.28 8.67012 202.8C8.69012 202.86 8.76012 202.9 8.79012 202.95C11.0501 208.2 13.5801 213.36 16.4901 218.39C56.9401 289.22 151.15 323.23 232.98 276.01C239.54 272.24 241.83 263.92 238.08 257.34C234.34 250.77 226 248.5 219.43 252.25C151.1 291.23 73.7001 263.03 40.4601 204.87C23.2801 174.73 18.8401 139.7 27.9601 106.24C37.1101 72.79 58.7201 44.86 88.8401 27.67C136.47 0.479963 189.72 -7.41003 243.32 7.26997C287.51 19.35 325.43 45.59 352.18 82.01C352.59 82.63 352.84 83.37 352.84 84.2Z" fill="#F2F2F2"/>
          <path d="M378.64 200.11C378.64 202.42 376.74 204.31 374.42 204.31C372.69 204.31 371.19 203.24 370.56 201.74C370.54 201.66 370.49 201.63 370.44 201.55C368.17 196.31 365.61 191.15 362.76 186.13C322.1 114.96 228.39 81.1197 146.26 128.51C139.7 132.28 137.38 140.64 141.16 147.18C144.9 153.73 153.24 156.02 159.78 152.29C228.15 113.3 305.51 141.47 338.77 199.66C355.95 229.78 360.4 264.84 351.27 298.29C342.12 331.75 320.52 359.66 290.4 376.86C242.76 404.07 189.52 411.96 135.89 397.27C91.6103 385.14 53.6403 358.85 26.8903 322.29C26.5203 321.66 26.2803 320.95 26.2803 320.16C26.2803 317.85 28.1203 315.97 30.4703 315.97C31.4703 315.97 32.4103 316.34 33.1403 316.96C69.1703 350.25 119.7 371.67 176.3 368.14C257.14 363.12 315.12 319.95 311.31 258.79C310.53 245.89 306.79 233.25 300.19 221.69C288.89 201.85 270.52 187.64 248.49 181.63C226.46 175.62 203.43 178.54 183.6 189.86C166.92 199.4 151.68 200.27 137.75 196.46C122.76 192.39 110.29 182.72 102.56 169.22C98.4703 162.04 95.8703 154.28 95.1903 146.3C90.6603 91.3498 156.85 66.1497 205.79 63.3597C223.51 62.3297 241.46 64.1797 259.09 68.9997C301.8 80.6597 337.42 108.25 359.35 146.71C368.86 163.35 375.29 181.16 378.57 199.49C378.62 199.69 378.64 199.9 378.64 200.11Z" fill="#F2F2F2"/>
        </svg>
      </div>
    <div class="col-12  px-0">
      <div class="" >
        <div class="">
          <div class="row">
            <div class="col-12 col-md-12">
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
                  <p class="font-bold text-3xl md:text-5xl text-black md:w-3/5">Un espacio abierto: </br>Recreacion y deporte en un mismo lugar</p>
                  <p class="text-lg  md:w-3/5 py-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.
                  </p>
              @endif
              @if(request()->is('parque-cds/baloncesto'))
                  <p class="font-bold text-3xl md:text-5xl text-black md:w-3/5">Un espacio abierto: </br>Recreacion y deporte en un mismo lugar (baloncesto)</p>
                  <p class="text-lg  md:w-3/5 py-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.
                  </p>
              @endif
              @if(request()->is('parque-cds/golf'))
                  <p class="font-bold text-3xl md:text-5xl text-black md:w-3/5">Un espacio abierto: </br>Recreacion y deporte en un mismo lugar (golf)</p>
                  <p class="text-lg  md:w-3/5 py-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.
                  </p>
              @endif
              @if(request()->is('parque-cds/raquetbol'))
                  <p class="font-bold text-3xl md:text-5xl text-black md:w-3/5">Un espacio abierto: </br>Recreacion y deporte en un mismo lugar (raquetbol)</p>
                  <p class="text-lg  md:w-3/5 py-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.
                  </p>
              @endif
              @if(request()->is('parque-cds/tenis'))
                  <p class="font-bold text-3xl md:text-5xl text-black md:w-3/5">Un espacio abierto: </br>Recreacion y deporte en un mismo lugar (tenis)</p>
                  <p class="text-lg  md:w-3/5 py-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.
                  </p>
              @endif
              @if(request()->is('parque-cds/voleibol'))
                  <p class="font-bold text-3xl md:text-5xl text-black md:w-3/5">Un espacio abierto: </br>Recreacion y deporte en un mismo lugar (voleibol)</p>
                  <p class="text-lg  md:w-3/5 py-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.
                  </p>
              @endif
              @if(request()->is('parque-cds/pesas'))
                  <p class="font-bold text-3xl md:text-5xl text-black md:w-3/5">Un espacio abierto: </br>Recreacion y deporte en un mismo lugar (pesas)</p>
                  <p class="text-lg  md:w-3/5 py-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.
                  </p>
              @endif
              @if(request()->is('parque-cds/boxeo'))
                  <p class="font-bold text-3xl md:text-5xl text-black md:w-3/5">Un espacio abierto: </br>Recreacion y deporte en un mismo lugar (boxeo)</p>
                  <p class="text-lg  md:w-3/5 py-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.
                  </p>
              @endif
              @if(request()->is('parque-cds/bohios'))
                  <p class="font-bold text-3xl md:text-5xl text-black md:w-3/5">Un espacio abierto: </br>Recreacion y deporte en un mismo lugar (bohios)</p>
                  <p class="text-lg  md:w-3/5 py-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.
                  </p>
              @endif
              @if(request()->is('parque-cds/futbol'))
                  <p class="font-bold text-3xl md:text-5xl text-black md:w-3/5">Un espacio abierto: </br>Recreacion y deporte en un mismo lugar (futbol)</p>
                  <p class="text-lg  md:w-3/5 py-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.
                  </p>
              @endif
              @if(request()->is('parque-cds/beisbol'))
                  <p class="font-bold text-3xl md:text-5xl text-black md:w-3/5">Un espacio abierto: </br>Recreacion y deporte en un mismo lugar (beisbol)</p>
                  <p class="text-lg  md:w-3/5 py-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.
                  </p>
              @endif
              @if(request()->is('e-108'))
                  <p class="font-bold text-3xl md:text-5xl text-black md:w-3/5">El escenario ideal para tus encuentros académicos y empresariales</p>
                  <p class="text-lg  md:w-3/5 py-3">
                    Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Elementum sagittis vitae et leo duis ut. Ut tortor pretium viverra suspendisse potenti.
                  </p>
              @endif
              @if(request()->is('ateneo'))
                  <p class="font-bold text-3xl md:text-5xl text-black md:w-3/5">El escenario ideal para tus encuentros académicos y empresariales Ateneo</p>
                  <p class="text-lg  md:w-3/5 py-3">
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
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-2 min-h-10 min-w-10" height="40px" viewBox="0 -960 960 960" width="40px" fill="#0088ff">
                            <path d="M479.99-280q15.01 0 25.18-10.15 10.16-10.16 10.16-25.17 0-15.01-10.15-25.18-10.16-10.17-25.17-10.17-15.01 0-25.18 10.16-10.16 10.15-10.16 25.17 0 15.01 10.15 25.17Q464.98-280 479.99-280Zm-31.32-155.33h66.66V-684h-66.66v248.67ZM480.18-80q-82.83 0-155.67-31.5-72.84-31.5-127.18-85.83Q143-251.67 111.5-324.56T80-480.33q0-82.88 31.5-155.78Q143-709 197.33-763q54.34-54 127.23-85.5T480.33-880q82.88 0 155.78 31.5Q709-817 763-763t85.5 127Q880-563 880-480.18q0 82.83-31.5 155.67Q817-251.67 763-197.46q-54 54.21-127 85.84Q563-80 480.18-80Zm.15-66.67q139 0 236-97.33t97-236.33q0-139-96.87-236-96.88-97-236.46-97-138.67 0-236 96.87-97.33 96.88-97.33 236.46 0 138.67 97.33 236 97.33 97.33 236.33 97.33ZM480-480Z"/>
                        </svg>
                        <span class="text-black text-lg" id="venues-prices">Los precios no incluyen catering ni impuestos locales</span>
                    </div>
                  @else
                    <div class="rounded-lg bg-cdsgray700 font-semibold border-l-8 border-cdsblue flex gap-x-2 p-2 md:w-3/5">
                        <svg xmlns="http://www.w3.org/2000/svg" class="stroke-2 min-h-10 min-w-10" height="40px" viewBox="0 -960 960 960" width="40px" fill="#0088ff">
                            <path d="M479.99-280q15.01 0 25.18-10.15 10.16-10.16 10.16-25.17 0-15.01-10.15-25.18-10.16-10.17-25.17-10.17-15.01 0-25.18 10.16-10.16 10.15-10.16 25.17 0 15.01 10.15 25.17Q464.98-280 479.99-280Zm-31.32-155.33h66.66V-684h-66.66v248.67ZM480.18-80q-82.83 0-155.67-31.5-72.84-31.5-127.18-85.83Q143-251.67 111.5-324.56T80-480.33q0-82.88 31.5-155.78Q143-709 197.33-763q54.34-54 127.23-85.5T480.33-880q82.88 0 155.78 31.5Q709-817 763-763t85.5 127Q880-563 880-480.18q0 82.83-31.5 155.67Q817-251.67 763-197.46q-54 54.21-127 85.84Q563-80 480.18-80Zm.15-66.67q139 0 236-97.33t97-236.33q0-139-96.87-236-96.88-97-236.46-97-138.67 0-236 96.87-97.33 96.88-97.33 236.46 0 138.67 97.33 236 97.33 97.33 236.33 97.33ZM480-480Z"/>
                        </svg>
                        <span class="text-black text-lg" id="venues-prices">Los precios listados pueden variar de acuerdo a recargos por noche, fin de semana y feriados</span>
                    </div>
                  @endif
                </span>
              </small>
              @endif
              <div class="grid grid-cols-1 md:grid-cols-3 gap-8 pt-10">
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
  </div>

  <!--@if($show_menu ?? true && $venueName != 'Ateneo')
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
  @endif-->

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
</div>

@if(request()->is('parque-cds/piscina'))
    <div id="nwp-piscina-campus-facilities"></div>
    <div id="nwp-piscina-gallery-section"></div>
    <div id="nwp-piscina-faq-section"></div>
    <div id="nwp-piscina-headband-section"></div>
@endif
@if(request()->is('parque-cds/baloncesto'))
    <div id="nwp-baloncesto-campus-facilities"></div>
    <div id="nwp-baloncesto-gallery-section"></div>
    <div id="nwp-baloncesto-faq-section"></div>
    <div id="nwp-baloncesto-headband-section"></div>
@endif
@if(request()->is('parque-cds/golf'))
    <div id="nwp-golf-campus-facilities"></div>
    <div id="nwp-golf-gallery-section"></div>
    <div id="nwp-golf-faq-section"></div>
    <div id="nwp-golf-headband-section"></div>
@endif
@if(request()->is('parque-cds/raquetbol'))
    <div id="nwp-raquetbol-campus-facilities"></div>
    <div id="nwp-raquetbol-gallery-section"></div>
    <div id="nwp-raquetbol-faq-section"></div>
    <div id="nwp-raquetbol-headband-section"></div>
@endif
@if(request()->is('parque-cds/tenis'))
    <div id="nwp-tenis-campus-facilities"></div>
    <div id="nwp-tenis-gallery-section"></div>
    <div id="nwp-tenis-faq-section"></div>
    <div id="nwp-tenis-headband-section"></div>
@endif
@if(request()->is('parque-cds/voleibol'))
    <div id="nwp-voleibol-campus-facilities"></div>
    <div id="nwp-voleibol-gallery-section"></div>
    <div id="nwp-voleibol-faq-section"></div>
    <div id="nwp-voleibol-headband-section"></div>
@endif
@if(request()->is('parque-cds/pesas'))
    <div id="nwp-pesas-campus-facilities"></div>
    <div id="nwp-pesas-gallery-section"></div>
    <div id="nwp-pesas-faq-section"></div>
    <div id="nwp-pesas-headband-section"></div>
@endif
@if(request()->is('parque-cds/boxeo'))
    <div id="nwp-boxeo-campus-facilities"></div>
    <div id="nwp-boxeo-gallery-section"></div>
    <div id="nwp-boxeo-faq-section"></div>
    <div id="nwp-boxeo-headband-section"></div>
@endif
@if(request()->is('parque-cds/bohios'))
    <div id="nwp-bohios-campus-facilities"></div>
    <div id="nwp-bohios-gallery-section"></div>
    <div id="nwp-bohios-faq-section"></div>
    <div id="nwp-bohios-headband-section"></div>
@endif
@if(request()->is('parque-cds/futbol'))
    <div id="nwp-futbol-campus-facilities"></div>
    <div id="nwp-futbol-gallery-section"></div>
    <div id="nwp-futbol-faq-section"></div>
    <div id="nwp-futbol-headband-section"></div>
@endif
@if(request()->is('parque-cds/beisbol'))
    <div id="nwp-beisbol-campus-facilities"></div>
    <div id="nwp-beisbol-gallery-section"></div>
    <div id="nwp-beisbol-faq-section"></div>
    <div id="nwp-beisbol-headband-section"></div>
@endif
@if(request()->is('e-108'))
    <div id="nwp-la-casa-aditional-services"></div>
    <div id="nwp-la-casa-visit-us"></div>
@endif
@if(request()->is('ateneo'))
    <div id="nwp-ateneo-aditional-services"></div>
    <div id="nwp-ateneo-visit-us"></div>
@endif

<div id="nwp-featured-spaces"></div>
<div id="nwp-featured-events"></div>

<!-- <x-contact /> -->
<x-footer />
<x-security-policies />
@endsection
