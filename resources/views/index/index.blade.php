@extends('layouts.layout')

@section('content')
<!-- COVID <x-covid /> -->
<x-header  menu="true" />
@if(request()->is('parque-cds'))
    <div id="nwp-parque-hero"></div>
    <div class="nwp-padding-x-container bg-cdsgray700">
        <!-- Tabla de contenidos -->
        <nav class="nwp-container mx-auto"> 
            <ul class="py-3 flex flex-col md:flex-row md:divide-x divide-cdsgray500 gap-y-2 md:gap-y-0">
                <li><a class="md:px-6 hover:no-underline hover:text-black font-semibold" href="#nwp-parque-section02 ">Qué hacer</a></li>
                <li><a class="md:px-6 hover:no-underline hover:text-black font-semibold" href="#nwp-venues-table">Espacios del parque</a></li>
                <li><a class="md:px-6 hover:no-underline hover:text-black font-semibold" href="#nwp-parque-headband">Conéctate</a></li>
                <li><a class="md:px-6 hover:no-underline hover:text-black font-semibold" href="#nwp-parque-faq">Preguntas frecuentes</a></li>
            </ul>
        </nav>
    </div>
    <div id="nwp-parque-section01"></div>
    <div id="nwp-parque-section02"></div>
@endif

<meta name="robots" content="noindex, nofollow">

<?php if ($show_carousel) : ?>
    <x-carousel id="home-carousel" venueTitle="{{ $venue_title }}" venueSubtitle="{{ $venue_subtitle }}" venueImage="{{ $venue_image }}" />
    <x-searcher />
    <img src="/assets/images/arrow-down-navigation.gif" class="scroll-down">
<?php endif ?>

<?php if ($show_featured_text) : ?>
    <x-featured />
<?php endif ?>

<div id="nwp-venues-table" class="bg-white nwp-padding-x-container ">
    <div class="relative mx-auto nwp-container py-20">
      <div class="  hidden md:inline-block md:absolute -top-32 right-0">
        <svg width="379" height="405" viewBox="0 0 379 405" fill="none" xmlns="http://www.w3.org/2000/svg">
          <path d="M352.84 84.2C352.84 86.53 350.97 88.4 348.65 88.4C347.53 88.4 346.52 87.96 345.77 87.25C309.75 54.12 259.35 32.85 202.95 36.36C122.1 41.4 64.1001 84.57 67.9201 145.71C68.7401 158.61 72.4601 171.27 79.0601 182.81C90.3701 202.65 108.74 216.86 130.74 222.87C152.77 228.9 175.82 225.96 195.65 214.66C212.33 205.11 227.55 204.25 241.5 208.05C256.48 212.14 268.95 221.81 276.68 235.29C280.87 242.63 283.58 250.57 284.1 258.75C287.42 312.12 225.56 338.19 173.45 341.18C155.73 342.2 137.76 340.33 120.13 335.53C77.4401 323.87 41.8101 296.28 19.8601 257.82C10.4301 241.27 4.04012 223.56 0.710117 205.36C0.650117 205.07 0.620117 204.76 0.620117 204.44C0.620117 202.13 2.49012 200.23 4.81012 200.23C6.56012 200.23 8.04012 201.28 8.67012 202.8C8.69012 202.86 8.76012 202.9 8.79012 202.95C11.0501 208.2 13.5801 213.36 16.4901 218.39C56.9401 289.22 151.15 323.23 232.98 276.01C239.54 272.24 241.83 263.92 238.08 257.34C234.34 250.77 226 248.5 219.43 252.25C151.1 291.23 73.7001 263.03 40.4601 204.87C23.2801 174.73 18.8401 139.7 27.9601 106.24C37.1101 72.79 58.7201 44.86 88.8401 27.67C136.47 0.479963 189.72 -7.41003 243.32 7.26997C287.51 19.35 325.43 45.59 352.18 82.01C352.59 82.63 352.84 83.37 352.84 84.2Z" fill="#F2F2F2"/>
          <path d="M378.64 200.11C378.64 202.42 376.74 204.31 374.42 204.31C372.69 204.31 371.19 203.24 370.56 201.74C370.54 201.66 370.49 201.63 370.44 201.55C368.17 196.31 365.61 191.15 362.76 186.13C322.1 114.96 228.39 81.1197 146.26 128.51C139.7 132.28 137.38 140.64 141.16 147.18C144.9 153.73 153.24 156.02 159.78 152.29C228.15 113.3 305.51 141.47 338.77 199.66C355.95 229.78 360.4 264.84 351.27 298.29C342.12 331.75 320.52 359.66 290.4 376.86C242.76 404.07 189.52 411.96 135.89 397.27C91.6103 385.14 53.6403 358.85 26.8903 322.29C26.5203 321.66 26.2803 320.95 26.2803 320.16C26.2803 317.85 28.1203 315.97 30.4703 315.97C31.4703 315.97 32.4103 316.34 33.1403 316.96C69.1703 350.25 119.7 371.67 176.3 368.14C257.14 363.12 315.12 319.95 311.31 258.79C310.53 245.89 306.79 233.25 300.19 221.69C288.89 201.85 270.52 187.64 248.49 181.63C226.46 175.62 203.43 178.54 183.6 189.86C166.92 199.4 151.68 200.27 137.75 196.46C122.76 192.39 110.29 182.72 102.56 169.22C98.4703 162.04 95.8703 154.28 95.1903 146.3C90.6603 91.3498 156.85 66.1497 205.79 63.3597C223.51 62.3297 241.46 64.1797 259.09 68.9997C301.8 80.6597 337.42 108.25 359.35 146.71C368.86 163.35 375.29 181.16 378.57 199.49C378.62 199.69 378.64 199.9 378.64 200.11Z" fill="#F2F2F2"/>
        </svg>
      </div>
        <div class="row">
            <div class="col-12">
                <div class="alert alert-warning alert-dismissible fade show" role="alert" style="display:none">
                    <strong>Holy guacamole!</strong> You should check in on some of those fields below.
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <h6 class="font-bold md:w-1/2 text-4xl">
                  Descubre un mundo de diversión y bienestar al aire libre
                </h6>
                <p class="md:w-1/2 py-4">
                  Lorem ipsum dolor sit amet consectetur. In elementum iaculis rhoncus pharetra
                  lectus fermentum. Ultrices felis condimentum nisi ullamcorper. Vel dictum faucibus
                  diam sed arcu diam nisi. 
                </p>
                <div class="rounded-lg bg-cdsgray700 font-semibold border-l-8 border-cdsblue flex gap-x-2 p-2 md:w-1/2">
                  <svg xmlns="http://www.w3.org/2000/svg" class=" stroke-2" height="40px" viewBox="0 -960 960 960" width="40px" fill="#0088ff"><path d="M479.99-280q15.01 0 25.18-10.15 10.16-10.16 10.16-25.17 0-15.01-10.15-25.18-10.16-10.17-25.17-10.17-15.01 0-25.18 10.16-10.16 10.15-10.16 25.17 0 15.01 10.15 25.17Q464.98-280 479.99-280Zm-31.32-155.33h66.66V-684h-66.66v248.67ZM480.18-80q-82.83 0-155.67-31.5-72.84-31.5-127.18-85.83Q143-251.67 111.5-324.56T80-480.33q0-82.88 31.5-155.78Q143-709 197.33-763q54.34-54 127.23-85.5T480.33-880q82.88 0 155.78 31.5Q709-817 763-763t85.5 127Q880-563 880-480.18q0 82.83-31.5 155.67Q817-251.67 763-197.46q-54 54.21-127 85.84Q563-80 480.18-80Zm.15-66.67q139 0 236-97.33t97-236.33q0-139-96.87-236-96.88-97-236.46-97-138.67 0-236 96.87-97.33 96.88-97.33 236.46 0 138.67 97.33 236 97.33 97.33 236.33 97.33ZM480-480Z"/></svg>
                  Los precios listados pueden variar de acuerdo a recargos por noche,
                  fin de semana y feriados
                </div>
            </div>
        </div>
        <div class="grid md:grid-cols-3 grid-cols-1 gap-8 mt-10">
            <?php if ($venues) : ?>
                <?php foreach ($venues as $venue) : ?>
                    <div class="">
                        <div class="rounded-xl overflow-hidden shadow-2xl h-[493px] group border-b-8 border-cdsverde">
                           <!-- @if ($venue['name'] == 'Gazebos')
                                <style>
                                    .next-venue {
                                        position: absolute !important;
                                        width: 100%;
                                        font-weight: 600;
                                    }
                                </style>
                                <div class="bg-danger text-center next-venue">
                                    Próximo lanzamiento
                                </div>
                            @endif-->
                            <div class=" relative h-[200px] w-full overflow-hidden">
                              <img class="absolute inset-0 h-full w-full object-cover transition-transform duration-200 transform group-hover:scale-110" src="<?php echo substr($venue['image'], 0, strrpos($venue['image'], '.')) . '_480.' . substr($venue['image'], strrpos($venue['image'], '.') + 1) ?>">
                            </div>

                            <div class="p-4 flex flex-col justify-between h-[294px]">
                              <a href="<?php echo $venue['url'] ?>" class="no-underline hover:no-underline hover:text-cdsblue font-bold text-lg"><?php echo $venue['name'] ?></a>
                              <p>
                                <?php echo isset($venue['description']) ? $venue['description']:'' ?>
                              </p>
                              <?php
                              $max_pax = 0;
                              $ppd = 0;
                              $sppd = 0;
                              if ($venue['venues']) {
                                  foreach ($venue['venues'] as $subvenue) {
                                      $pph = $subvenue['hour_fee'] > $ppd ? $subvenue['hour_fee'] : $ppd;
                                      $ppd = $subvenue['all_day_fee'] > $ppd ? $subvenue['all_day_fee'] : $ppd;
                                      $sppd = $subvenue['seasonal_all_day_fee'] > $sppd ? $sppd : $sppd;
                                  }
                                  $hourFees = [];
                                  foreach ($venue['venues'] as $subvenue) {
                                      if ($subvenue['hour_fee'] > 0) array_push($hourFees, $subvenue['hour_fee']);
                                  }
                                  if ($hourFees) {
                                      $pph = min($hourFees);
                                  }
                              }
                              if ($venue['type'] == 'Habitaciones') {
                                  $configuracion = "Distribuciones";
                                  $max_pax = 96;
                                  $max_pax_txt = "simple, doble, triple";
                              } else {
                                  $configuracion = "Espacio para";
                                  if ($venue['designs']) {
                                      foreach ($venue['designs'] as $design) {
                                          $max_pax = $design['max_pax'] > $max_pax ? $design['max_pax'] : $max_pax;
                                      }
                                  }
                                  $max_pax_txt = $max_pax . ' personas';
                              }
                              ?>
                              <div class="">
                                  <dl>
                                      <dt><?php
                                          $pvax = isset($parentVenue) ? $parentVenue : $venue['name'];
                                          /*if ($pvax != 'parque-cds' && $pvax != 'Parque Ciudad del Saber') {
                                              if (isset($venue['type']) ? $venue['type'] != '' : false)
                                                  echo $venue['type'];
                                              else
                                                  echo "Salones";
                                          } else {
                                              if ($pvax != 'parque-cds')
                                                  echo "Disciplinas";
                                              else
                                                  if ($venue['name'] == 'Piscina') {
                                                      echo 'Piscinas';
                                                  } else {
                                                      if ($venue['name'] == 'Gazebos') {
                                                          echo 'Gazebos';
                                                      } else {
                                                          if ($venue['name'] == 'Reserva de carrito de golf') {
                                                              echo "Carritos";
                                                          } else {
                                                              echo "Canchas";
                                                          }
                                                      }
                                                  }
                                          }*/
                                          ?></dt>
                                      <dd></dd>
                                  </dl>
                                  <dl>
                                      <dd class="font-bold">
                                          Desde
                                          @if($sppd < $ppd && $sppd > 0)
                                              <span class="strike">$<?php echo $ppd ?></span>
                                              <span class="text-danger">$<?php echo $sppd < $ppd ? $sppd : $ppd ?></span>
                                          @else
                                              @if(($ppd < $pph && $ppd > 0 ) || ($pvax != 'parque-cds' && $pvax != 'Parque Ciudad del Saber'))
                                                  $<?php echo $sppd < $ppd ? $sppd : $ppd ?>
                                              @else
                                                  $<?php echo $pph?>
                                              @endif
                                          @endif
                                          <span>
                                            @if($pvax != 'parque-cds' && $pvax != 'Parque Ciudad del Saber')
                                                por día*
                                            @else
                                                por hora*
                                            @endif
                                          </span>
                                      </dd>
                                  </dl>
                                  <?php
                                  if ($pvax != 'parque-cds') {
                                  ?>
                                  <dl>
                                      <dt>Eventos con alcohol</dt>
                                      <dd>
                                          @if($pvax != 'parque-cds' && $pvax != 'Parque Ciudad del Saber' && $pvax != 'Complejo de hospedaje')
                                              Permitidos
                                          @else
                                              No permitidos
                                          @endif
                                      </dd>
                                  </dl>
                                  <dl>
                                      <dt>Servicio de catering</dt>
                                      <dd>
                                          @if($pvax != 'parque-cds' && $pvax != 'Parque Ciudad del Saber')
                                              Disponible
                                          @else
                                              No disponible
                                          @endif
                                      </dd>
                                  </dl>
                                  <?php
                                  }
                                  ?>
                              </div><br/>
                              <!-- COVID -->
                              <!-- <p>
                                  <a href="#security-policies" data-bs-toggle="modal" data-bs-target="#security-policies">Revisa la política  para este venue</a>
                              </p> -->
                              <a href="<?php echo $venue['url'] ?>" class="font-semibold hover:no-underline hover:text-cdsblue flex gap-x-2 items-center">
                                Reserva Ahora
                                <div class="h-8 w-8 bg-cdsblue rounded-full grid place-content-center">
                                  <svg xmlns="http://www.w3.org/2000/svg" height="24px" viewBox="0 -960 960 960" width="32px" fill="#e8eaed"><path d="M673-446.67H160v-66.66h513l-240-240L480-800l320 320-320 320-47-46.67 240-240Z"/></svg>
                                </div>
                               
                              </a>
                            </div>
                        </div>
                    </div>
                <?php endforeach ?>
            <?php endif ?>

            <!--<div class="col-12">
                <p class="text-center" style="color:#0088ff">
                    <small>
                        @if($pvax != 'parque-cds' && $pvax != 'Parque Ciudad del Saber')
                            /* Los precios no incluyen catering, ni personal o equipamiento extra /
                        @else
                            /* Los precios listados pueden variar de acuerdo a recargos por noche, fin de semana, y feriados /
                        @endif
                    </small>
                </p>
            </div>-->
        </div>
    </div>
</div>


<x-clients clients="{{ $clients }}" />

<!--
@if($pvax == 'parque-cds')
  <x-contact-parque />
@endif



<?php if ($show_contact_form) : ?>
<x-contact />
<?php endif ?> -->

@if(request()->is('parque-cds'))
    <div id="nwp-parque-headband"></div>
    <div id="nwp-parque-faq"></div>
@endif
<div id="nwp-featured-spaces"></div>
<x-footer />
<x-security-policies />
@endsection
