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


<div class="request">
 <div class="container " style="min-height:960px">
    <form method="post">
      @csrf
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
  <p>Por favor, tenga en cuenta que las devoluciones se deben pasar a retirar por ventanilla.</p>
  <p>Al hacer clic en el siguiente botón, se entenderá que ACEPTA COMPLETAMENTE las políticas de cancelación arriba descritas</p>

          <div class="col-12 text-center">
            <p class="text-center" style="margin-top:30px">

              <button type="submit" class="btn btn-danger submit-form" onclick="if (this.value !== 'Enviando...') { this.disabled=true; this.value='Enviando...'; this.form.submit(); }">Cancelar reserva</button>
              <br><br>
              <small><a href="/" class="text-secondary">Cancelar</a></small>
            </p>
          </div>

  <p>Le agradecemos su comprensión y lamentamos cualquier inconveniente que esta política pueda causarle. Si tiene alguna pregunta o inquietud, no dude en ponerse en contacto con nosotros.</p>
</div>
</div>
</div>
  </form>
</div>
</div>


@endsection