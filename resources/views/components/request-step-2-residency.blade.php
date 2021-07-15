<x-error-message />

<div class="request-step">
  <div class="container">
    <h4>Cuéntanos algunos datos de tu residencia</h4>
    <div class="row form-error-message">
      <div class="col-12">Sólo tienes que completar los datos que faltan</div>
    </div>
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="form-group required">
          <select class="form-control" id="quantity" name="00N3m00000QMzL7">
            <option value="">Cantidad de miembros de la familia</option>
            <option value="1" <?php echo session()->get('00N3m00000QMzL7', old('00N3m00000QMzL7')) == '1' ? 'selected="selected"' : '' ?>>1</option>
            <option value="2" <?php echo session()->get('00N3m00000QMzL7', old('00N3m00000QMzL7')) == '2' ? 'selected="selected"' : '' ?>>2</option>
            <option value="3" <?php echo session()->get('00N3m00000QMzL7', old('00N3m00000QMzL7')) == '3' ? 'selected="selected"' : '' ?>>3</option>
            <option value="4" <?php echo session()->get('00N3m00000QMzL7', old('00N3m00000QMzL7')) == '4' ? 'selected="selected"' : '' ?>>4</option>
            <option value="5+" <?php echo session()->get('00N3m00000QMzL7', old('00N3m00000QMzL7')) == '5+' ? 'selected="selected"' : '' ?>>5+</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group required">
          <select  id="pets" name="00N3m00000QMzLH">
            <option value="">¿Tienes mascotas?</option>
            <option value="Si" <?php echo session()->get('00N3m00000QMzLH', old('00N3m00000QMzLH')) == 'Si' ? 'selected="selected"' : '' ?>>Si</option>
            <option value="No" <?php echo session()->get('00N3m00000QMzLH', old('00N3m00000QMzLH')) == 'No' ? 'selected="selected"' : '' ?>>No</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group required">
          <input type="text" class="form-control datepicker" id="start-date" name="00N3m00000QMwta" placeholder="¿Cuando pensarías instalarte en Ciudad del Saber?" value="<?php echo session()->get('start-date', old('start-date')) ?>">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group required">
          <select  id="duration" name="00N3m00000QMzLC">
            <option value="">Tiempo de estadía en la vivienda</option>
            <option value="1" <?php echo session()->get('00N3m00000QMzLC', old('00N3m00000QMzLC')) == '1' ? 'selected="selected"' : '' ?>>1</option>
            <option value="2" <?php echo session()->get('00N3m00000QMzLC', old('00N3m00000QMzLC')) == '2' ? 'selected="selected"' : '' ?>>2</option>
            <option value="3" <?php echo session()->get('00N3m00000QMzLC', old('00N3m00000QMzLC')) == '3' ? 'selected="selected"' : '' ?>>3</option>
            <option value="4" <?php echo session()->get('00N3m00000QMzLC', old('00N3m00000QMzLC')) == '4' ? 'selected="selected"' : '' ?>>4</option>
            <option value="5+" <?php echo session()->get('00N3m00000QMzLC', old('00N3m00000QMzLC')) == '5+' ? 'selected="selected"' : '' ?>>5+</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <select  id="work-in-campus" name="work-in-campus">
            <option value="">¿Trabajas en alguna organización ubicada en el campus?</option>
            <option value="Si" <?php echo session()->get('work-in-campus', old('work-in-campus')) == 'Si' ? 'selected="selected"' : '' ?>>Si</option>
            <option value="No" <?php echo session()->get('work-in-campus', old('work-in-campus')) == 'No' ? 'selected="selected"' : '' ?>>No</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6 work-in-campus" style="display:<?php echo session()->get('work-in-campus', old('work-in-campus')) == 'Si' ? 'block' : 'none' ?>">
        <div class="form-group">
          <input class="form-control" id="campus-organization" maxlength="100" name="00N3m00000QMzLM" size="20" type="text" placeholder="Organización donde trabajas" value="<?php echo session()->get('00N3m00000QMzLM', old('00N3m00000QMzLM')) ?>" />
        </div>
      </div>
      <div class="col-12">
        <a href="#"><small>* Campos obligatorios</small></a>
      </div>
    </div>
    <div class="row" style="margin-top:40px">      
      <div class="col-12 col-md-6">
        <div class="form-group">
          <textarea id="why-cds" name="00N3m00000QMzLR" placeholder="Por qué elegiste CDS para rentar vivienda"><?php echo session()->get('00N3m00000QMzLR', old('00N3m00000QMzLR')) ?></textarea>
        </div>
      </div>    
      <div class="col-12 col-md-6">
        <div class="form-group">
          <textarea id="to-do-cds" name="00N3m00000QMzLW" placeholder="Qué actividades te gustaría realizar en CDS"><?php echo session()->get('00N3m00000QMzLW', old('00N3m00000QMzLW')) ?></textarea>
        </div>
      </div>
      <div class="col-12">
        <p style="margin:0; line-height:1rem"><small>Ciudad del Saber cuenta con transporte público
          interno que conecta con los principales puntos de interés.<br><em>Las residencias incluyen estacionamiento</em>
        </small></p>
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