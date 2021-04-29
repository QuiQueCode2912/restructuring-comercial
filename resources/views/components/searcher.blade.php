<div class="container searcher <?php echo $class ?? '' ?>">
  <form method="get" action="/oferta">
    <div class="search">
      <p class="text-center"><?php echo !($class ?? '') ? 'Qué quieres hacer en Ciudad del Saber' : 'Realiza otra búsqueda' ?></p>
      <ul>
        <li>
          <a href="#type">
            <label for="activity-type">Tipo de actividad</label>
            <span><?php echo isset($_GET['type']) ? $_GET['type'] : 'Elije tu opción' ?></span>
            <i class="fe fe-chevron-down"></i>
          </a>
          <input type="hidden" name="type" value="<?php echo isset($_GET['type']) ? $_GET['type'] : '' ?>" />
          <ul>
            <li><a href="#">Convención</a></li>
            <li><a href="#">Conferencia</a></li>
            <li><a href="#">Evento</a></li>
            <li><a href="#">Cocktail</a></li>
            <li><a href="#">Coworking</a></li>
            <li><a href="#">Formación académica</a></li>
            <li><a href="#">Seminario</a></li>
          </ul>
        </li>
        <li>
          <a href="#quantity">
            <label for="activity-quantity">Cantidad de personas</label>
            <span><?php echo isset($_GET['quantity']) ? $_GET['quantity'] : 'Cuántos son' ?></span>
            <i class="fe fe-chevron-down"></i>
          </a>
          <input type="hidden" name="quantity" value="<?php echo isset($_GET['quantity']) ? $_GET['quantity'] : '' ?>" />
          <ul>
            <li><a href="#">Menos de 50 personas</a></li>
            <li><a href="#">Entre 51 y 100 personas</a></li>
            <li><a href="#">Entre 101 y 200 personas</a></li>
            <li><a href="#">Entre 201 y 500 personas</a></li>
            <li><a href="#">Más de 500 personas</a></li>
          </ul>
        </li>
        <!--
        <li>
          <a href="#date">
            <label for="activity-date">Fecha</label>
            <span>Check in / Check out</span>
            <i class="fe fe-chevron-down"></i>
          </a>
          <input type="text" name="daterange" value="" />
        </li>
        -->
        <li>
          <a href="#how">
            <label for="activity-description">Cómo imaginas tu actividad</label>
            <i class="fe fe-chevron-down"></i>
            <span><?php echo isset($_GET['how']) ? $_GET['how'] : 'Elije tu opción' ?></span>
          </a>
          <input type="hidden" name="how" value="" />
          <ul>
            <li><a href="#">Presencial</a></li>
            <li><a href="#">Virtual</a></li>
            <li><a href="#">Semi-presencial</a></li>
            <li><a href="#">Hospedaje</a></li>
            <li><a href="#">Vivienda</a></li>
            <li><a href="#">No estoy seguro, necesito asesoramiento</a></li>
          </ul>
        </li>
        <li>
          <a href="#search">
            Ver ofertas
            <i class="fe fe-arrow"></i>
          </a>
        </li>
      </ul>
      <?php if ($class ?? '') : ?>
      <p class="small">
        <i class="fe fe-alert-triangle"></i><br />
        Si tu evento requiere de múltiples espacios o excede las 24hs, puedes
        conectarte con nosotros desde el formulario al pie de la página.
      </p>
      <?php endif ?>
    </div>
  </form>
</div>