@extends('layouts.layout')

@section('content')
<!-- COVID <x-covid /> -->
<x-header menu="false" />

<style>
.form-check .form-check-input:after {
  content: "";
  background: #bbbbbb;
  position: absolute;
  width: 15px;
  height: 15px;
  border-radius: 8px;
  z-index: 10;
}
.form-check .form-check-input:checked:after {
  background: white;
}
.form-check .form-check-input + .form-check-label {
  padding: 20px 40px;
  position: absolute;
  top: -20px;
  left: -14px;
  border-radius: 10px;
  cursor: pointer;
}
.form-check .form-check-input:checked + .form-check-label {
  background: #0088ff;
  color: #fff;
}
.amount-to-pay {
  display: inline-block;
  padding: 10px;
}
.other-methods {
  display: none;
}
.file-upload::before {
  top: 38px !important;
}
</style>
<form method="post">
@csrf
  <div class="modal fade" id="cancelModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Cancelar Reserva</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          ¿Está seguro de que desea cancelar la reserva?
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal" style="width:260px">No, mantener reserva</button>
          <button type="submit" class="btn btn-danger submit-form" onclick="if (this.value !== 'Enviando...') { this.disabled=true; this.value='Enviando...'; this.form.submit(); }" style="width:260px">Sí, cancelar reserva</button>
        </div>
      </div>
    </div>
  </div>

<div class="request">
 <div class="container " style="min-height:960px">
    
      <div class="row justify-content-md-center">
      <div class="col-12 col-md-7">
<div class="request-step" style="margin:0px">
              <h4>Cancelación de Reserva</h4>
              <br/>
  <p>Por favor, lea atentamente la información a continuación antes de solicitar la cancelación de su reserva:</p>
  <p>La política de cancelación es la siguiente:</p>
  <ul>
    <li>Las cancelaciones realizadas <strong>12 horas antes</strong> de la fecha reservada recibirán un reembolso del <strong>100%</strong>.</li>
    <li>Las cancelaciones realizadas <strong>dentro de las 12 horas</strong> antes de la fecha reservada recibirán un reembolso del <strong>50%</strong>.</li>
  </ul>
  <p><strong>Por favor, tenga en cuenta que los reembolsos sólo se tramitarán por ACH</strong>.</p>
  <p>Al hacer clic en el siguiente botón, se entenderá que ACEPTA COMPLETAMENTE las políticas de cancelación arriba descritas</p>

          <div class="col-12 text-center">
          @if ($data->Cancelado === 'Si')
  <p><b>Tu reserva ha sido cancelada.</b></p>
@else
            <p class="text-center" style="margin-top:30px">
  <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#cancelModal">
    Cancelar Reserva
  </button>

              <br><br>
              <small><a href="/" class="text-secondary">Cancelar</a></small>
            </p>
@endif
          </div>

  <p>Le agradecemos su comprensión y lamentamos cualquier inconveniente que esta política pueda causarle. Si tiene alguna pregunta o inquietud, no dude en ponerse en contacto con nosotros.</p>
</div>
</div>
</div>
  
</div>
</div>

</form>
@endsection