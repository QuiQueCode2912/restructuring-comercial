<div class="request-step">
  <div class="container">
    <h4>Cuéntanos algunos datos de tu evento</h4>
    <div class="row">
      <div class="col-12 col-md-6">
        <div class="form-group">
          <input type="text" class="form-control" id="name" placeholder="* Nombre del evento">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <select class="form-control" name="type">
            <option value="">* Tipo de actividad</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <select class="form-control" name="quantity">
            <option value="">* Cantidad de personas</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <input type="text" class="form-control" id="how" placeholder="* Cómo imaginas tu actividad">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <input type="datetime-local" class="form-control" id="start-date" placeholder="* Fecha y hora de inicio">
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <input type="datetime-local" class="form-control" id="end-date" placeholder="* Fecha y hora de finalización">
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
          <select class="form-control" name="quantity">
            <option value="">¿Necesitas hospedaje para tu evento?</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <select class="form-control" name="quantity">
            <option value="">¿Necesitas catering para tu evento?</option>
          </select>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <div class="form-group">
          <label for="description"><small>Describe tu evento</small></label>
          <textarea id="description"></textarea>
        </div>
      </div>
      <div class="col-12 col-md-6">
        <p style="margin-top:47px"><small>Puedes compartir la agenda de tu evento,  material 
          promocional o cualquier otro documento que nos ayude a 
          entender mejor tus necesidades</small></p>
        <div class="form-group">
          <input type="text" class="form-control" readonly="readonly" id="file" placeholder="Archivos .pdf o .docx - máximo 5MB">
        </div>
      </div>
    </div>
    <div class="row buttons">
      <div class="col-12 text-center">
        <a href="/solicitud/1" class="btn btn-primary">Anterior</a>
        <a href="/solicitud/3" class="btn btn-primary">Siguiente</a>
      </div>
    </div>
  </div>
</div>