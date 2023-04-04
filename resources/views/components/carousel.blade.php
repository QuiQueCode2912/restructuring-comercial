<div id="{{ $id }}" class="carousel slide" data-ride="carousel">
  <div class="carousel-inner">
    <div class="carousel-item active">
      <div class="container">
        <h4><?php echo $venueTitle ?></h4>
        <h3><?php echo $venueSubtitle ?></h3>
         @if (session()->get('is-cds-user') == true)
        <h3 style="top:20px; right: 0px; left: unset;">Sección de Empleados</h3>
        @endif
        @if (session()->get('is-cds-customer') == true)
        <h3 style="top:20px; right: 0px; left: unset;">Sección de Clientes</h3>
        @endif
      </div>
      <img src="<?php echo $venueImage ? substr($venueImage, 0, strrpos($venueImage, '.')) . '_2048.' . substr($venueImage, strrpos($venueImage, '.') + 1) : '/assets/images/residencies/hero-1_2048.jpg' ?>" class="d-block" alt="...">
    </div>
    <!--
    <div class="carousel-item">
      <div class="container">
        <h4>Aula 222 - Coworking</h4>
        <h3>Espacio colaborativo genera valor</h3>
      </div>
      <img src="/assets/images/oficinas-administrativas-de-la-fundacion-ciudad-del-saber-8470-8-1.jpg" class="d-block" alt="...">
    </div>
    <div class="carousel-item">
      <div class="container">
        <h4>Aula 220 - Espacio colaborativo</h4>
        <h3>Genera valor</h3>
      </div>
      <img src="/assets/images/oficinas-administrativas-de-la-fundacion-ciudad-del-saber-8470-6-1.jpg" class="d-block" alt="...">
    </div>
    -->
  </div>
  <!--
  <div class="container">
    <a class="carousel-control-prev" href="#{{ $id }}" role="button" data-slide="prev">
      <i class="fe fe-arrow-left"></i> Anterior Venue
    </a>
    <a class="carousel-control-next" href="#{{ $id }}" role="button" data-slide="next">
      Próximo Venue <i class="fe fe-arrow-right"></i> 
    </a>
  </div>
  -->
</div>
