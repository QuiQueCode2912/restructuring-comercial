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
  <div class="container text-center" style="min-height:960px">
    <form method="post">
      @csrf
      <input type="hidden" name="event_name" value="Abono - {{ $event_name }}" />
      <input type="hidden" name="opportunity" value="{{ $opportunity }}" />
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
          <?php foreach ($payments as $index => $payment) : ?>
          <div class="col-12<?php echo count($payments) > 1 ? ' col-md-6' : ' offset-2' ?>">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="total" id="total-<?php echo $index ?>" value="{{ $payment->total }}" <?php echo $index == 0 ? 'checked' : '' ?>>
              <label class="form-check-label" for="total-<?php echo $index ?>">
                <?php echo $payment->concept ?><br />
                <strong>USD {{ $payment->total }}</strong>
              </label>
            </div>
          </div>
          <?php endforeach ?>
        </div>
      </div>

      <p class="text-center paguelo-facil-container">
        Paga en línea con<br>
        <input type="image" src="/assets/images/pagar-paguelo-facil.png"></input><br><br>
        <a href="#" class="btn btn-secondary other-methods-btn">o Selecciona otro medio de pago</a>
        <br><br>
        <small><a href="/" class="text-secondary">Cancelar</a></small>
      </p>
    </form>

    <div class="other-methods" style="max-width:800px; margin:80px auto 140px; text-align:left">
      <div class="row">
        <div class="col-12 text-center">
          Realiza el pago mediante <strong>Transferencia ACH</strong>, 
          <strong>Yappy</strong> o <strong>Cheque</strong>.<br>Ten en cuenta
          los siguientes datos de referencia cuando realices tu pago.
          <br><br>
          Fundación Ciudad del Saber<br>
          <strong>Cuenta Corriente, Banco General</strong><br>
          <big><strong>03-01-01-003310-4</strong></big><br>
          <strong># de referencia:</strong> <?php echo $opportunity ?>
          <br><br>
          Una vez realizado
          el pago diligencia el siguiente formulario.
        </div>
      </div>
      <form method="post" enctype="multipart/form-data" action="/confirmacion-pago/<?php echo $token ?>" style="max-width:600px; margin:40px auto 20px">
        <input type="hidden" name="PARM_1" value="<?php echo $opportunity ?>" />
        <input type="hidden" name="Estado" value="Aprobado" />
        <div class="row">
          <div class="col-12 col-md-6">
            <select class="form-group required" required name="method" id="method">
              <option value="ACH">Transferencia ACH</option>
              <option value="Yappy">Yappy</option>
              <option value="Cheque">Cheque</option>
              <option value="Páguelo Fácil">Páguelo Fácil</option>
            </select>
          </div>
          <div class="col-12 col-md-6 form-group required">
            <input type="text" class="form-control" name="TotalPagado" id="total" placeholder="Total a pagar" value="0" required readonly>
          </div>
          <div class="col-12 col-md-6 form-group required">
            <input type="text" class="form-control datepicker" name="date" id="date" placeholder="Fecha de pago" value="" required>
          </div>
          <div class="col-12 col-md-6 form-group required">
            <input type="text" class="form-control" name="Oper" id="transaction" placeholder="Número de operación" value="" required>
          </div>
          <div class="col-12 form-group file-upload required" style="transform:translateY(-25px)">
            <i class="fe fe-upload"></i>
            <input type="file" class="form-control" id="file" name="file" required>
            <label for="file">Sube el comprobante de la transacción</label>
          </div>
        </div>
        <div class="row">
          <div class="col-12 text-center">
            <small>El pago registrado estará sujeto a verificación</small>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <p class="text-center" style="margin-top:30px">
              <button type="submit" class="btn btn-primary" style="text-transform:none">Registrar pago</button>
              <br><br>
              <small><a href="/" class="text-secondary">Cancelar</a></small>
            </p>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection