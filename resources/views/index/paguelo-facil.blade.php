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
.is-invalid {
    border-color: #dc3545 !important;
}
</style>

<div class="request">
<!-- Modal -->
<center>
<div class="modal fade" id="qrModal" tabindex="-1" role="dialog" aria-labelledby="conflictoModalLongTitle" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content"  style="max-width:96vw">
      <div class="modal-header">
        <h5 class="modal-title" id="cqrModalLongTitle">Escanea el QR</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <img src="/assets/images/YappyCDS.png" style="max-width:86vw"/>
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
          <p style="font-size:20px; margin:0 0 30px; font-weight:600; color:#63AF3F !important">Vamos a pagar!</p>
        </div>
        <div class="col-12 col-md-10">
          <p class="text-center" style="margin:0; font-size:18px">
            <span style="font-family:'Trola', sans-serif;">Realiza el pago para completar tu reserva.</span>
          </p>
        </div>
      @endif
      </div>

      <div style="max-width:400px; margin:40px auto 90px; text-align:left;<?php if(count($payments) == 1) echo 'display: none'; ?>">
        <div class="row">
          <?php foreach ($payments as $index => $payment) : ?>
          <div class="col<?php echo count($payments) > 1 ? ' col-md-6' : ' offset-2' ?>">
            <div class="form-check"<?php echo count($payments) > 1 ? '' : ' style="left:14%"' ?>>
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
      @if(count($payments) == 1)
      <div class="form-group-preview mt-4" style="display: inline-flex;max-width: 620PX; width: 100%;justify-content: space-between;">
          <div><small><b>Precio total a pagar por tu reserva</b></small></div><div><b>USD {{ number_format($payment->total, 2, '.', ',') }}</b></div>
        </div>
      @endif
      <p class="text-center paguelo-facil-container" style="display:<?php echo $otherMethods ? 'none' : 'block' ?>">
        Paga en línea<br>
        <input type="image" src="/assets/images/btn_es.png" style="padding-left: 0px;"></input><br><br>
        <a href="#" class="btn btn-secondary other-methods-btn">o Selecciona otro medio de pago</a>
        <br><br>
        <small><a href="/" class="text-secondary">Cancelar</a></small>
      </p>
    </form>

    <div class="other-methods" style="max-width:800px; margin:80px auto 140px; text-align:left; display:<?php echo $otherMethods ? 'block' : 'none' ?>">
      <div class="row">
        <div class="col-12 text-center">
          Realiza el pago mediante <strong>Transferencia ACH</strong>, 
          <strong>Yappy</strong> o <strong>Cheque</strong>.
          <div id="yappy">
          <br><br>Busca en el directorio de Yappy: fundacionciudaddelsaber<br/>O escanea el código de QR desde tu App:<br/><br>
          <input type="image" src="/assets/images/showQR.png" style="padding-left: 0px;" onclick="$('#qrModal').modal('show');"></input><br><br>
          </div>
          <div id="bank">
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
        </div>
      </div>

      <form id="comprobante" method="post" enctype="multipart/form-data" action="/confirmacion-pago/<?php echo $token ?>" style="max-width:600px; margin:20px auto 20px">
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
            <label id="fileLabel" for="file">Sube el comprobante de la transacción</label>
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

              <button id="botonSubmit" type="button" class="btn btn-primary" onclick="if (this.value !== 'Enviando...') { this.disabled=true; this.value='Enviando...'; enviarComprobante(); }">Registrar pago</button>
              <br><br>
              <small><a href="/" class="text-secondary">Cancelar</a></small>
            </p>
          </div>
        </div>

<script>
  function ready() {
     $('.form-control').on('input', function() {
if($(this).attr('type') == 'file') {
      var input = document.getElementById('file');
      var file = input.files;
 if(file.length==0){
        $('#fileLabel').addClass('is-invalid');
        } else {
          $('#fileLabel').removeClass('is-invalid');
        } 
        } else
        {
      if ($(this).val() !== '') {
        $(this).removeClass('is-invalid');
      } else {
        $(this).addClass('is-invalid');
      }
}

    });
  };
    function enviarComprobante() {
   
    if (!isFormValid()) {
        
        $('#botonSubmit').prop( "value", "No" );
        $('#botonSubmit').prop( "disabled", false );
             return false;
      } 
      else 
      {
      $('form').submit();
      }
      
    }

 function isFormValid() {
      let valid = true;
      $('.form-control').each(function() {
      if($(this).attr('type') == 'file') {
      var input = document.getElementById('file');
      var file = input.files;
        if(file.length==0){
            valid = false;
        $('#fileLabel').addClass('is-invalid');
          
        } else {
          $('#fileLabel').removeClass('is-invalid');
        } 
        } else
        {
        if ($(this).val() === '' ) {
          $(this).addClass('is-invalid');
          valid = false;
        } else {
          $(this).removeClass('is-invalid');
        }
        }
      });
      return valid;
    }

   window.addEventListener("load", ready);
</script>

      </form>
    </div>
  </div>
</div>



@endsection
