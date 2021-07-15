<x-error-message />

<div class="request-step">
  <div class="container">
    <h4>Cuéntanos algunos datos de tu hospedaje</h4>
    <div class="row form-error-message">
      <div class="col-12">Sólo tienes que completar los datos que faltan</div>
    </div>
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="form-group required">
          <select class="form-control" id="quantity" name="quantity">
            <option value="">Cantidad de personas</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group required">
          <select class="form-control" id="bed" name="bed">
            <option value="">Tipo de cama</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group required">
          <input type="text" class="form-control datetimepicker" id="start-date" placeholder="Fecha y hora de checkin">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group required">
          <input type="text" class="form-control datetimepicker" id="end-date" placeholder="Fecha y hora de checkout">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <a href="#"><small>* Campos obligatorios</small></a>
      </div>
      <div class="col-12 col-md-6">
        <div class="custom-control custom-switch">
          <input type="checkbox" class="custom-control-input" id="variable-dates">
          <label class="custom-control-label" for="variable-dates"><small>Indica si tus fechas son flexibles</small></label>
        </div>
      </div>
    </div>
    <div class="row" style="margin-top:40px">
      
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="description"><small>Comentarios adicionales</small></label>
          <textarea id="description" placeholder="Por favor añade en tus comentarios si necesitas algún tipo de asistencia especial"></textarea>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <p style="margin:50px 0 0; line-height:1rem"><small>Ciudad del Saber cuenta con transporte público
          interno que conecta con los principales puntos de interés.<br><em>Las residencias incluyen estacionamiento</em>
        </small></p>
      </div>
    </div>
    <div class="row buttons">
      <div class="col-12 text-center">
        <a href="/cotizacion/datos-contacto" class="btn btn-primary">Anterior</a>
        <a href="/cotizacion/vista-previa" class="btn btn-primary submit-form">Siguiente</a>
      </div>
    </div>
  </div>
</div>