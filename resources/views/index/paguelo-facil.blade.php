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

  .form-check .form-check-input+.form-check-label {
    padding: 20px 40px;
    position: absolute;
    top: -20px;
    left: -14px;
    border-radius: 10px;
    cursor: pointer;
  }

  .form-check .form-check-input:checked+.form-check-label {
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

  .vp-card {
    width: 22rem;
  }

  .vp-card-body {
    height: 350px;
  }

  @media (min-width: 768px) {
    .vp-card {
      width: 40rem;
    }

    .vp-card-body {
      height: 300px;
    }
  }
</style>

<script>
  function moverContenido(destino) {
    var contenidoDiv1 = document.getElementById("bank").innerHTML;
    document.getElementById("card-ach").innerHTML = "";
    document.getElementById("card-yappy").innerHTML = "";
    document.getElementById("card-cheque").innerHTML = "";
    document.getElementById(destino).innerHTML = contenidoDiv1;
  }
</script>

<div class="request">
  <!-- Modal -->
  <center>
    <div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="conflictoModalLongTitle" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content" style="max-width:96vw">
          <div class="modal-header">
            <h5 class="modal-title" id="cqrModalLongTitle">Escanea el QR</h5>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
              <span aria-hidden="true">&times;</span>
            </button>
          </div>
          <div class="modal-body">
            <img src="/assets/images/YappyCDS.png" style="max-width:86vw" />
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
          </div>
        </div>
      </div>
    </div>
  </center>
  <!-- Modal -->
  <div class="container text-center" style="min-height:960px">
    <form method="post">
      @csrf
      <input type="hidden" name="event_name" value="Abono - {{ $event_name }}" />
      <input type="hidden" name="opportunity" value="{{ $opportunity }}" />
      <br><br>
      <div class="row justify-content-center">
        @if(count($payments) > 1)
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
        @else
        <div class="col-12 col-md-10">
          <p style="font-size:30px; margin:0 0 30px; font-weight:600; color:#63AF3F !important">Vamos a pagar!</p>
        </div>
        @endif
      </div>

      <div style="max-width:400px; margin:40px auto 90px; text-align:left;<?php if (count($payments) == 1) echo 'display: none'; ?>">
        <div class="row">
          <?php foreach ($payments as $index => $payment) : ?>
            <div class="col<?php echo count($payments) > 1 ? ' col-md-6' : ' offset-2' ?>">
              <div class="form-check" <?php echo count($payments) > 1 ? '' : ' style="left:14%"' ?>>
                <input class="form-check-input" type="radio" name="total" id="total-<?php echo $index ?>" value="{{ $payment->total }}" <?php echo $index == 0 ? 'checked' : '' ?>>
                <label class="form-check-label" for="total-<?php echo $index ?>">
                  <?php echo $payment->concept ?><br />
                  <strong>USD {{ number_format($payment->total, 2, '.', ',') }}</strong>
                </label>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
      <!-- tarjeta monto total QuiQue -->
      <div class="row justify-content-center">
        <div class="card  shadow " style=" width: 18rem; background-color:#63AF3F; margin-bottom:1rem; border: none; top: 0px; ">
          <div class=" card-body">
            <h5 class="card-title text-uppercase border-bottom" style="padding-bottom: 0.5rem; color:#ffffff; ">Pendiente de pago</h5>
            @if(count($payments) == 1)
            <h6 class="card-subtitle mb-2 text-muted" style="font-size:20px; margin:0 0 30px; padding-bottom:0.5rem; font-weight:600; color:#ffffff !important">USD {{ number_format($payment->total, 2, '.', ',') }}$</h6>
            @endif
            <p class="card-text" style="color:#ffffff; font-size:16px;"><b>Fecha:</b> <?php echo date('d-m-Y'); ?></p>
          </div>
        </div>
      </div>
      <!-- Fin de la tarjeta monto total -->
      <!--
      <p class="text-center paguelo-facil-container" style=" display:<?php echo $otherMethods ? 'none' : 'block' ?>">
      <p style="padding-top:1rem;"><b style="color:#686868; ">Elige tu medio de pago</b></p> <br>
      <input type="image" src="/assets/images/btn_es.png" style="padding-left: 0px;"></input><br><br>
      <a href="#" class="btn btn-secondary other-methods-btn">o Selecciona otro medio de pago</a>
      <br><br>

      <small><a href="/" class="text-secondary">Cancelar</a></small>
      </p>
      @if(count($payments) == 1)
      <div class="form-group-preview mt-4" style="display: inline-flex;max-width: 620PX; width: 100%;justify-content: space-between;">
        <div><small><b>Precio total a pagar por tu reserva</b></small></div>
        <div><b>USD {{ number_format($payment->total, 2, '.', ',') }}</b></div>
      </div>
      @endif-->

    <!-- card metodo de pago QuiQue -->
    <div class="row justify-content-center">
      <div class="card shadow mb-5 vp-card" style=" background-color:#ffffff; border: none; ">
        <div class="card-body">
          <p><b style="color:#686868; ">Elige tu medio de pago</b></p> <br>
          <div id="acordeon">
            <div class="card">
              <div class="card-header">
                <p class="text-center paguelo-facil-container" style=" display:<?php echo $otherMethods ? 'none' : 'block' ?>">
                  <input type="image" src="/assets/images/btn_es.png" style="padding-left: 0px; width: 14rem"></input>
              </div>
            </div>
            <div class="card">
              <div class="card-header" id="titulo1">

                <label for="opcion1" data-toggle="collapse" data-target="#contenido1" aria-expanded="true" aria-controls="contenido1"><input type="image" class="pt-2" src="/assets/images/yappy.svg" onclick="moverContenido('card-yappy')" style="padding-left: 0px; width: 8rem"></input></label>

              </div>
              <div id="contenido1" class="collapse" aria-labelledby="titulo1" data-parent="#acordeon">
                <div style="padding-left: 20px; padding-right:20px" id="yappy">
                  <br><br>Busca en el directorio de Yappy: fundacionciudaddelsaber<br />O escanea el código de QR desde tu App:<br /><br>
                  <input type="image" src="/assets/images/showQR.png" style="padding-left: 0px; width: 250px" onclick="$('#qrModal').modal('show');"></input><br><br>
                </div>
                <div class="card-body vp-card-body" id="card-yappy">

                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header" id="titulo2">

                <label for="opcion2" data-toggle="collapse" data-target="#contenido2" aria-expanded="false" aria-controls="contenido2"><button style="background-color: #63AF3F; border: none;" type="button" onclick="moverContenido('card-ach')" class="btn btn-success">ACH Transferencia</button></label>

              </div>
              <div id="contenido2" class="collapse" aria-labelledby="titulo2" data-parent="#acordeon">
                <div style="padding-left: 20px; padding-right:20px">
                  <br>Ten en cuenta
                  los siguientes datos de referencia cuando realices tu pago.
                  <br><br>
                  Fundación Ciudad del Saber<br>
                  <strong>Cuenta Corriente, Banco General</strong><br>
                  <big><strong>03-01-01-003310-4</strong></big><br>
                  @if ($opportunity!='')
                  <strong># de referencia:</strong> <?php echo $opportunity ?>
                  <br>
                  @endif
                  <br>
                  Una vez realizado
                  el pago diligencia el siguiente formulario.
                </div>
                <div class="card-body vp-card-body" id="card-ach">

                </div>
              </div>
            </div>

            <div class="card">
              <div class="card-header" id="titulo3">

                <label for="opcion3" data-toggle="collapse" data-target="#contenido3" aria-expanded="false" aria-controls="contenido3"><button style="background-color: #63AF3F; border: none;" type="button" onclick="moverContenido('card-cheque')" class="btn btn-success">Cheque</button></label>

              </div>
              <div id="contenido3" class="collapse" aria-labelledby="titulo3" data-parent="#acordeon">
                <div style="padding-left: 20px; padding-right:20px">
                  <br>Ten en cuenta
                  los siguientes datos de referencia cuando realices tu pago.
                  <br><br>
                  Fundación Ciudad del Saber<br>
                  <strong>Cuenta Corriente, Banco General</strong><br>
                  <big><strong>03-01-01-003310-4</strong></big><br>
                  @if ($opportunity!='')
                  <strong># de referencia:</strong> <?php echo $opportunity ?>
                  <br>
                  @endif
                  <br>
                  Una vez realizado
                  el pago diligencia el siguiente formulario.
                </div>
                <div class="card-body vp-card-body" id="card-cheque">

                </div>
              </div>
            </div>
          </div>
          <br>
          <small><a style="margin-top: 60px" href="/" class="text-secondary">Cancelar</a></small>
        </div>
      </div>
    </div>
    </form>
    <div class="other-methods" style="max-width:800px; margin:80px auto 140px; text-align:left; display:<?php echo $otherMethods ? 'block' : 'none' ?>">

      <form method="post" id="bank" enctype="multipart/form-data" action="/confirmacion-pago/<?php echo $token ?>" style="max-width:600px; margin:20px auto 20px">
        <input type="hidden" name="PARM_1" value="<?php echo $opportunity ?>" />
        <input type="hidden" name="Estado" value="Aprobado" />
        <div class="row">
          <div style="display: none" class="col-12 col-md-6">
            <select class="form-group required" required name="method" id="method">
              <option value="ACH">Transferencia ACH</option>
              <option value="Yappy">Yappy</option>
              <option value="Cheque">Cheque</option>
              <option value="Páguelo Fácil">Páguelo Fácil</option>
            </select>
          </div>
          <div style="display: none" class="col-12 col-md-6 form-group required ">
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
            <label for="file">Sube el comprobante de pago</label>
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
            </p>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

@endsection