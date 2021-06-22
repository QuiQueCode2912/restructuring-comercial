@extends('layouts.layout')

@section('content')
<x-covid />
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
</style>

<div class="request">
  <div class="container text-center" style="min-height:800px">
    <form method="post">
      @csrf
      <input type="hidden" name="event_name" value="{{ $event_name }}" />
      <br><br>
      <div class="row justify-content-center">
        <div class="col-12 col-md-10">
          <p style="font-size:20px; margin:0 0 30px; font-weight:600; color:#63AF3F !important">Selecciona el valor a pagar</p>
        </div>
        <div class="col-12 col-md-10">
          <p class="text-center" style="margin:0; font-size:18px">
            <span style="font-family:'Trola', sans-serif;">Estás a punto de realizar un abono al evento</span>
            <strong>{{ $event_name }}</strong>.<br />
            <span style="font-family:'Trola', sans-serif;">Selecciona el valor a pagar y realiza tu pago en línea.</span>
          </p>
        </div>
      </div>

      <div style="max-width:400px; margin:80px auto 140px; text-align:left">
        <div class="row">
          <div class="col-12 col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="total" id="total-50" checked>
              <label class="form-check-label" for="total-50">
                Pagar el 50%<br />
                <strong>USD {{ $total / 2 }}</strong>
              </label>
            </div>
          </div>
          <div class="col-12 col-md-6">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="total" id="total-100">
              <label class="form-check-label" for="total-100">
                Pagar el 100%<br />
                <strong>USD {{ $total }}</strong>
              </label>
            </div>
          </div>
        </div>
      </div>

      <p class="text-center">
        <button type="submit" class="btn btn-primary" style="text-transform:none">Pagar en línea</button>
        <br><br>
        <small><a href="/" class="text-secondary">Cancelar</a></small>
      </p>
    </form>
  </div>
</div>

@endsection