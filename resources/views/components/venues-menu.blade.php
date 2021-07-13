<div class="venues-menu">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <!--
        <a href="#" class="toggle-venue-menu">
        <?php
        switch ($venue) {
          case 'inicio' : echo 'Inicio'; break;
          case 'ateneo' : echo 'Ateneo'; break;
          case 'centro-convenciones' : echo 'Centro de convenciones'; break;
          case 'aulas-105' : echo 'Aulas 105'; break;
          case 'aulas-220' : echo 'Aulas 220'; break;
          case 'complejo-hospedaje' : echo 'Complejo de hospedaje'; break;
          case 'residencias' : echo 'Residencias'; break;
          case 'espacios-fcds' : echo 'Espacios FCdS'; break;
        }
        ?>
        </a>
        -->
        <ul class="<?php echo session()->get('is-cds-user') ? 'with-cds' : '' ?>">
          <li <?php echo $venue == 'inicio' ? 'class="active"' : '' ?>><a href="/">Inicio</a></li>
          <li <?php echo $venue == 'ateneo' ? 'class="active"' : '' ?>><a href="/ateneo">Ateneo</a></li>
          <li <?php echo $venue == 'centro-convenciones' ? 'class="active"' : '' ?>><a href="/centro-convenciones">Centro de convenciones</a></li>
          <li <?php echo $venue == 'aulas-105' ? 'class="active"' : '' ?>><a href="/aulas-105">Aulas 105</a></li>
          <li><a href="https://live.ipms247.com/booking/book-rooms-complejodehospedaje-es-Spanish" target="_blank">Complejo de hospedaje</a></li>
          <li <?php echo $venue == 'residencias' ? 'class="active"' : '' ?>><a href="/residencias">Residencias</a></li>
          <li <?php echo $venue == 'espacios-fcds' ? 'class="active"' : '' ?>><a href="/espacios-fcds">Espacios FCdS</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>