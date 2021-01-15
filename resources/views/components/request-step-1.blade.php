<div class="request-step">
  <div class="container">
    <h4>Comencemos con tus datos de contacto</h4>
    <div class="row form-error-message">
      <div class="col-12">Sólo tienes que completar los datos que faltan</div>
    </div>
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="form-group required">
          <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nombres" value="<?php echo session()->get('first_name') ?>">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group" required>
          <input type="email" class="form-control" name="last_name" id="last_name" placeholder="Apellidos" value="<?php echo session()->get('last_name') ?>">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group required">
          <input type="text" class="form-control" name="email" id="email" placeholder="Correo electrónico" value="<?php echo session()->get('email') ?>">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group required">
          <input type="text" class="form-control" name="phone" id="phone" placeholder="Número de teléfono" value="<?php echo session()->get('phone') ?>">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <input type="text" class="form-control" name="company" id="company" placeholder="Organización" value="<?php echo session()->get('company') ?>">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <input type="text" class="form-control" name="00N3m00000QQOde" id="identification" placeholder="RUC (Número de identificación fiscal)" value="<?php echo session()->get('00N3m00000QQOde') ?>">
        </div>
      </div>
      <div class="col-12">
        <a href="#"><small>* Campos obligatorios</small></a>
      </div>
    </div>
    <div class="row buttons">
      <div class="col-12 text-center">
        <a href="javascript:;" class="btn btn-primary disabled">Anterior</a>
        <button type="submit" class="btn btn-primary submit-form">Siguiente</button>
      </div>
    </div>
  </div>
</div>