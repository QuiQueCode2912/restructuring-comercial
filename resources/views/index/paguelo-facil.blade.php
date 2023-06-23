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

        div.ecommerce {
            margin: unset !important;
            min-width: unset !important;
            max-width: unset !important;
            padding-top: 0px !important;
            padding-bottom: 0px !important;
        }

        .card {
            margin-bottom: 20px;
        }

        button#Paguelofacil_button {
            background: none;
            border: none;
            padding: 0;
            height: 48px !important;
            background-color: #63AF3F;
            border-radius: var(--gap-poquitin) !important;
        }

        form button {
            display: flex;
            align-items: center !important;
            justify-content: center !important;
            text-transform: unset !important;
            font-weight: 500;
            color: white;
        }
        .is-invalid {
    border-color: #dc3545 !important;
}
    </style>

    <div class="request">
        <div class="container text-center" style="min-height:960px">
            <form method="post">
                @csrf
                <input type="hidden" name="event_name" value="Abono - {{ $event_name }}" />
                <input type="hidden" name="opportunity" value="{{ $opportunity }}" />
                <br>
                <div class="row justify-content-center">
                    @if (count($payments) > 1)
                        <div class="col-12 col-md-10">
                            <p style="font-size:20px; margin:0 0 30px; font-weight:600; color:#63AF3F !important">Selecciona
                                el valor a pagar</p>
                        </div>
                        <div class="col-12 col-md-10">
                            <p class="text-center" style="margin:0; font-size:18px">
                                <span style="font-family:'Trola', sans-serif;">Estás a punto de realizar un abono al
                                    evento</span>
                                <strong>{{ $event_name }}</strong>.<br />
                                <span style="font-family:'Trola', sans-serif;">Selecciona el valor a pagar y realiza tu pago
                                    en línea.</span>
                            </p>
                        </div>
                    @else
                        <div class="col-12 col-md-10">
                            <p style="font-size:30px; margin:0 0 30px; font-weight:600; color:#63AF3F !important">Vamos a
                                pagar!</p>
                        </div>
                    @endif
                </div>

                <div style="max-width:400px; margin:40px auto 90px; text-align:left;<?php if (count($payments) == 1) {
                    echo 'display: none';
                } ?>">
                    <div class="row">
                        <?php foreach ($payments as $index => $payment) : ?>
                        <div class="col<?php echo count($payments) > 1 ? ' col-md-6' : ' offset-2'; ?>">
                            <div class="form-check" <?php echo count($payments) > 1 ? '' : ' style="left:14%"'; ?>>
                                <input class="form-check-input" type="radio" name="total" id="total-<?php echo $index; ?>"
                                    value="{{ $payment->total }}" <?php echo $index == 0 ? 'checked' : ''; ?>>
                                <label class="form-check-label" for="total-<?php echo $index; ?>" style="font-size: smaller;">
                                    <?php echo $payment->concept; ?><br />
                                    <strong>USD {{ number_format($payment->total, 2, '.', ',') }}</strong>
                                </label>
                            </div>
                        </div>
                        <?php endforeach ?>
                    </div>
                </div>
 @if (count($payments) == 1)
                <!-- tarjeta monto total QuiQue -->
                <div class="row justify-content-center">
                    <div class="card  shadow "
                        style=" width: 18rem; background-color:#63AF3F; margin-bottom:1rem; border: none; top: 0px; ">
                        <div class=" card-body">
                            <h5 class="card-title text-uppercase border-bottom"
                                style="padding-bottom: 0.5rem; color:#ffffff; ">Pendiente de pago</h5>
                            @if (count($payments) == 1)
                                <h6 class="card-subtitle mb-2 text-muted"
                                    style="font-size:20px; margin:0 0 30px; padding-bottom:0.5rem; font-weight:600; color:#ffffff !important">
                                    USD {{ number_format($payment->total, 2, '.', ',') }}$</h6>
                            @endif
                            <p class="card-text" style="color:#ffffff; font-size:16px;"><b>Fecha:</b> <?php echo date('d-m-Y'); ?>
                            </p>
                        </div>
                    </div>
                </div>
                <!-- Fin de la tarjeta monto total -->
@endif

                <!-- card metodo de pago QuiQue -->
                <div class="row justify-content-center">
                    <div class="card shadow mb-5 vp-card" style=" background-color:#ffffff; border: none; ">
                        <div class="card-body">
                            <p><b style="color:#686868; ">Elige tu medio de pago</b></p> <br>
                            <div id="acordeon">
                                <div class="card">
                                    <button type="submit" id="Paguelofacil_button" class="ecommerce brand">
                                        PagueloFacil&nbsp;<img src="/assets/images/cards.png">
                                    </button>
                                </div>
            </form>
            <div class="card yappyForm">
        <form id="paymentForm" action="/yappy" method="post">
            <input type="hidden" class="form-control" id="total" name="total" value="17.00">
            <input type="hidden" class="form-control" id="subtotal" name="subtotal" value="10.00">
            <input type="hidden" class="form-control" id="taxes" name="taxes" value="0.00">
            <input type="hidden" class="form-control" id="discount" name="discount" value="0.00">
            <input type="hidden" class="form-control" id="shipping" name="shipping" value="0.00">
            <input type="hidden" class="form-control" id="successUrl" name="successUrl" value="https://comercial.ciudaddelsaber.org/yappydone/<?php echo $token ?>">
            <input type="hidden" class="form-control" id="failUrl" name="failUrl" value="https://comercial.ciudaddelsaber.org/yappyfail/<?php echo $token ?>">
            <input type="hidden" class="form-control" id="orderId" name="orderId" value="<?php echo substr($token, 0, 15); ?>">
            <input type="hidden" class="form-control" id="tel" name="tel" value="66666666">
        </form>
                <div id="Yappy_Checkout_Button"></div>
                    <script src="/js/env.js"></script>
                    <script src="/js/bg-payment.js"></script>

            </div>
            <div class="card">
                <div class="ecommerce" for="opcion2" data-toggle="collapse" data-target="#contenido2" aria-expanded="false" id="otros_button" style="background-color:rgba(0,0,0,.03) !important">Transferencia ACH / Cheque</div>

                <div id="contenido2" class="collapse" aria-labelledby="titulo2" data-parent="#acordeon">
                    <div style="padding-left: 20px; padding-right:20px">
                        <br>Ten en cuenta
                        los siguientes datos de referencia cuando realices tu pago.
                        <br><br>
                        Fundación Ciudad del Saber<br>
                        <strong>Cuenta Corriente, Banco General</strong><br>
                        @if (substr($token,0,3)!='00Q')
                            <big><strong>03-01-01-003310-4</strong></big><br>
                            <strong># de referencia:</strong> <?php echo $token ?>
                            <br>
                        @else
                            <big><strong>03-03-01-050580-6</strong></big><br>
                            <strong># de referencia:</strong> <?php echo $opportunity ?>
                            <br>
                        @endif
                        <br>
                        Una vez realizado
                        el pago diligencia el siguiente formulario.
                    </div>
                    <form id="comprobante" class="other-methods" method="post" enctype="multipart/form-data"
                        action="/confirmacion-pago/<?php echo $token; ?>" style="max-width:600px; margin:20px auto 20px">
                        <input type="hidden" name="PARM_1" value="<?php echo $opportunity; ?>" />
                        <input type="hidden" name="Estado" value="Aprobado" />
                        <div class="row" style="padding:10px">
                            <div class="col-12 col-md-6">
                                <select class="form-group required" required name="method" id="method">
                                    <option value="ACH">Transferencia ACH</option>
                                    <option value="Cheque">Cheque</option>
                                </select>
                            </div>
                            <div class="col-12 col-md-6 form-group required">
                                <input type="text" class="form-control" name="TotalPagado" id="total" placeholder="Total a pagar" value="0" required readonly>
                            </div>
                            <div class="col-12 col-md-6 form-group required">
                                <input type="text" class="form-control datepicker" name="date" id="date" placeholder="Fecha de pago" value="" required>
                            </div>
                            <div class="col-12 col-md-6 form-group required">
                                <input type="text" class="form-control" name="Oper" id="transaction"
                                    placeholder="Número de confirmacion" value="" required>
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
                                <p class="text-center" style="margin-top:10px">

                                    <button id="botonSubmit" type="button" class="btn btn-primary"
                                        onclick="if (this.value !== 'Enviando...') { this.disabled=true; this.value='Enviando...'; enviarComprobante(); }">Registrar
                                        pago</button>
                                </p>
                            </div>
                        </div>

                </div>
            </div>

        </div>

        <small><a style="margin-top: 60px" href="/" class="text-secondary">Cancelar</a></small>
    </div>
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
@endsection
