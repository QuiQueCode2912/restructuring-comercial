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
  <p>Tu evento ha sido cancelado satisfactoriamente.</p>
  <p>De acuerdo a la política de cancelación aplicada tu Cupón es:</p>
 
          <div class="col-12 text-center">
          TEST TEST TEST

          </div>

  <p>También recibirás los datos del cupón en tu correo electrónico.</p>
</div>
</div>
</div>
  
</div>
</div>
</form>

@endsection