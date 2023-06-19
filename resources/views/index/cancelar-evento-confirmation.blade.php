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




<div class="request">
 <div class="container " style="min-height:960px">
    
      <div class="row justify-content-md-center">
      <div class="col-12 col-md-7">
<div class="request-step" style="margin:0px">
              <h4>Confirmación de cancelación</h4>
              <br/>
  <p>Lamentamos saber que deseas cancelar tu reserva. Entendemos que a veces los planes pueden cambiar y estamos aquí para ayudarte.</p>

  <p>Hemos generado un cupón por el valor del evento.</p>

  <p>El código de tu cupón es: <b>{{ $data->cupon }}</b>
  <br/>El monto del cupón es: <b>{{ $data->monto }}</b></p>

  <p>Para utilizar el cupón, simplemente introduce el código al realizar tu próxima reserva o compra en nuestra página web.</p>

  <p>Esperamos que esta solución sea conveniente para ti y que tengas la oportunidad de utilizar nuestros espacios y canchas en el futuro. Si tienes alguna pregunta o si hay algo más con lo que podamos ayudarte, no dudes en ponerte en contacto con nosotros.</p>

  <p>También recibirás los datos del cupón en tu correo electrónico.</p>
</div>
</div>
</div>
  
</div>
</div>
</form>

@endsection