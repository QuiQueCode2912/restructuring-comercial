<div class="request-step">
  <div class="container">
    <h4>Cuéntanos algunos datos de tu evento</h4>
    <div class="row form-error-message">
      <div class="col-12">Sólo tienes que completar los datos que faltan</div>
    </div>
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="form-group required">
          <input type="text" class="form-control" id="name" name="00N3m00000QQOdA" placeholder="Nombre del evento" value="<?php echo session()->get('00N3m00000QQOdA') ?>">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group required">
          <select class="form-control" id="type" name="00N3m00000QMsCF">
            <option value="">Tipo de actividad</option>
            <option <?php echo session()->get('00N3m00000QMsCF') == 'Convención' ? 'selected="selected"' : '' ?>>Convención</option>
            <option <?php echo session()->get('00N3m00000QMsCF') == 'Conferencia' ? 'selected="selected"' : '' ?>>Conferencia</option>
            <option <?php echo session()->get('00N3m00000QMsCF') == 'Evento' ? 'selected="selected"' : '' ?>>Evento</option>
            <option <?php echo session()->get('00N3m00000QMsCF') == 'Cocktail' ? 'selected="selected"' : '' ?>>Cocktail</option>
            <option <?php echo session()->get('00N3m00000QMsCF') == 'Coworking' ? 'selected="selected"' : '' ?>>Coworking</option>
            <option <?php echo session()->get('00N3m00000QMsCF') == 'Formación académica' ? 'selected="selected"' : '' ?>>Formación académica</option>
            <option <?php echo session()->get('00N3m00000QMsCF') == 'Seminario' ? 'selected="selected"' : '' ?>>Seminario</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group required">
          <select class="form-control" id="quantity" name="00N3m00000QMsCA">
            <option value="">Cantidad de personas</option>
            <option <?php echo session()->get('00N3m00000QMsCA') == 'Menos de 50 personas' ? 'selected="selected"' : '' ?>>Menos de 50 personas</option>
            <option <?php echo session()->get('00N3m00000QMsCA') == 'Entre 51 y 100 personas' ? 'selected="selected"' : '' ?>>Entre 51 y 100 personas</option>
            <option <?php echo session()->get('00N3m00000QMsCA') == 'Entre 101 y 200 personas' ? 'selected="selected"' : '' ?>>Entre 101 y 200 personas</option>
            <option <?php echo session()->get('00N3m00000QMsCA') == 'Entre 201 y 500 personas' ? 'selected="selected"' : '' ?>>Entre 201 y 500 personas</option>
            <option <?php echo session()->get('00N3m00000QMsCA') == 'Más de 500 personas' ? 'selected="selected"' : '' ?>>Más de 500 personas</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group required">
          <select class="form-control" id="how" name="00N3m00000QMsC5">
            <option value="">Cómo imaginas tu actividad</option>
            <option <?php echo session()->get('00N3m00000QMsC5') == 'Presencial' ? 'selected="selected"' : '' ?> value="Presencial">Evento presencial</option>
            <option <?php echo session()->get('00N3m00000QMsC5') == 'Virtual' ? 'selected="selected"' : '' ?> value="Virtual">Evento virtual</option>
            <option <?php echo session()->get('00N3m00000QMsC5') == 'Semi-presencial' ? 'selected="selected"' : '' ?> value="Semi-presencial">Evento semi-presencial</option>
            <option <?php echo session()->get('00N3m00000QMsC5') == 'No estoy seguro, necesito asesoramiento' ? 'selected="selected"' : '' ?> value="No estoy seguro, necesito asesoramiento">No estoy seguro, necesito asesoramiento</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group required">
          <input type="text" class="form-control datetimepicker" name="00N3m00000QMwta" id="start-date" placeholder="Fecha y hora de inicio" value="<?php echo session()->get('00N3m00000QMwta') ?>">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group required">
          <input type="text" class="form-control datetimepicker" name="00N3m00000QMwtf" id="end-date" placeholder="Fecha y hora de finalización" value="<?php echo session()->get('00N3m00000QMwtf') ?>">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <a href="#"><small>* Campos obligatorios</small></a>
      </div>
      <div class="col-12 col-md-6">
        <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" value="1" name="00N3m00000QQOdy" id="variable-dates" <?php echo session()->get('00N3m00000QQOdy') == 1 ? 'checked="checked"' : '' ?>>
          <label class="custom-control-label" for="variable-dates"><small>Indica si tus fechas son flexibles</small></label>
        </div>
      </div>
    </div>

    <?php if ($venue ?? '') : ?>
    <div class="row" style="margin-top:40px">
      <div class="col-12 col-md-6">
        <div class="form-group-preview" style="background:#ffffff; border:1px solid #000000; padding:12px 20px">
          Venue: <?php echo $venue ?>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <select class="form-control" name="00N3m00000QQOe8" id="layout">
            <option value="">Montaje del evento</option>  
            <?php $designs = json_decode(html_entity_decode($designs)) ?>
            <?php if ($designs) : ?>
            <?php foreach ($designs as $design) : ?>
            <option <?php echo session()->get('00N3m00000QQOe8') == $design->layout ? 'selected="selected"' : '' ?>><?php echo $design->layout ?></option>
            <?php endforeach ?>
            <?php endif ?>  
          </select>
        </div>
      </div>
    </div>
    <?php endif ?>
    <div class="row" style="<?php echo $venue ?? '' ? '' : 'margin-top:40px' ?>">
      <div class="col-12 col-md-6">
        <div class="form-group">
          <select class="form-control" name="00N3m00000QMsCK" id="lodging">
            <option value="">¿Necesitas hospedaje para tu evento?</option>            
            <option <?php echo session()->get('00N3m00000QMsCK') == 'Si' ? 'selected="selected"' : '' ?>>Si</option>
            <option <?php echo session()->get('00N3m00000QMsCK') == 'No' ? 'selected="selected"' : '' ?>>No</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <select class="form-control" name="00N3m00000QMsCP" id="catering">
            <option value="">¿Necesitas catering para tu evento?</option>          
            <option <?php echo session()->get('00N3m00000QMsCP') == 'Si' ? 'selected="selected"' : '' ?>>Si</option>
            <option <?php echo session()->get('00N3m00000QMsCP') == 'No' ? 'selected="selected"' : '' ?>>No</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6 lodging-quantity" style="margin-bottom:20px; display:<?php echo session()->get('00N3m00000QMsCK') == 'Si' ? 'block' : 'none' ?>">
        <select class="form-control" id="logding-quantity" name="00N3m00000QMzL7">
          <option value="">¿Cuántas personas se hospedarán?</option>
          <option value="1" <?php echo session()->get('00N3m00000QMzL7') == "1" ? 'selected="selected"' : '' ?>>1</option>
          <option value="2" <?php echo session()->get('00N3m00000QMzL7') == "2" ? 'selected="selected"' : '' ?>>2</option>
          <option value="3" <?php echo session()->get('00N3m00000QMzL7') == "3" ? 'selected="selected"' : '' ?>>3</option>
          <option value="4" <?php echo session()->get('00N3m00000QMzL7') == "4" ? 'selected="selected"' : '' ?>>4</option>
          <option value="5+" <?php echo session()->get('00N3m00000QMzL7') == "5+" ? 'selected="selected"' : '' ?>>5+</option>
        </select>
      </div>
    </div>
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="description"><small>Describe tu evento</small></label>
          <textarea name="description" id="description"><?php echo session()->get('description') ?></textarea>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <p style="margin:35px 0 0; line-height:1rem"><small>Puedes compartir la agenda de tu evento,  material 
          promocional o cualquier otro documento que nos ayude a 
          entender mejor tus necesidades</small></p>
        <p style="margin:0"><small>Archivos .pdf o .docx - Máximo 3 archivos de 5MB</small></p>
        <div class="form-group">
          <i class="fe fe-upload"></i>
          <input type="file" class="form-control" id="file" name="file[]" multiple>
          <label for="file"><?php echo session()->get('files') && count(session()->get('files')) > 0 ? count(session()->get('files')) . (count(session()->get('files')) != 1 ? ' archivos seleccionados' : 'archivo seleccionado') : 'Selecciona uno o varios archivos' ?></label>
        </div>
      </div>
    </div>
    <div class="row buttons">
      <div class="col-12 text-center">
        <a href="/cotizacion/datos-contacto" class="btn btn-primary">Anterior</a>
        <button type="submit" class="btn btn-primary submit-form">Siguiente</button>
      </div>
    </div>
  </div>
</div>