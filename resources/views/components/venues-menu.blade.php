<div class="venues-menu">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <ul>
          <li <?php echo $venue == 'inicio' ? 'class="active"' : '' ?>><a href="/oferta">Inicio</a></li>
          <li <?php echo $venue == 'ateneo' ? 'class="active"' : '' ?>><a href="/ateneo">Ateneo</a></li>
          <li <?php echo $venue == 'centro-convenciones' ? 'class="active"' : '' ?>><a href="/centro-convenciones">Centro de convenciones</a></li>
          <li <?php echo $venue == 'aulas-105' ? 'class="active"' : '' ?>><a href="/aulas-105">Aulas 105</a></li>
          <li <?php echo $venue == 'aulas-220' ? 'class="active"' : '' ?>><a href="/aulas-220">Aulas 220<br />Coworking</a></li>
          <li <?php echo $venue == 'complejo-hospedaje' ? 'class="active"' : '' ?>><a href="/complejo-hospedaje">Complejo de hospedaje</a></li>
          <li <?php echo $venue == 'residencias' ? 'class="active"' : '' ?>><a href="/residencias">Residencias</a></li>
        </ul>
      </div>
    </div>
  </div>
</div>