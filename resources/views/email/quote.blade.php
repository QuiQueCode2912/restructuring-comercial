@extends('layouts.email')

@section('content')
<div class="header">
  <div class="quote-info">
    <strong class="contract-number">Contrato # 54645425426</strong><br />
    <small>Cliente</small><br />
    <small>28/04/2021</small>
  </div>
  <img src="/assets/images/logo-cds.png" />
</div>

<div class="content">
  <p>
    Estimado<br /><strong>Cliente</strong>,
  </p>
  <p>
    Gracias por su interés en realizar su evento en Ciudad del Saber, y por la 
    oportunidad de atenderle. Favor ver el detalle de su cotización abajo.
  </p>
  <table cellpadding="0" cellspacing="0">
    <thead>
      <tr>
        <th>Producto</th>
        <th>Cantidad</th>
        <th>Total</th>
      </tr>
    </thead>
    <tbody>
      <tr>
        <td>Reserva de Salón 101</td>
        <td>1</td>
        <td>$ 500</td>
      </tr>
      <tr>
        <td>Catering</td>
        <td>1</td>
        <td>$ 100</td>
      </tr>
      <tr>
        <td>Desayunos</td>
        <td>10</td>
        <td>$ 200</td>
      </tr>
    </tbody>
    <tfoot>
      <tr>
        <td></td>
        <td>Total</td>
        <td>$ 800</td>
      </tr>
    </tfoot>
  </table>
  <p class="buttons">
    <a href="#" class="reject">Rechazar cotización</a>
    <a href="#" class="accept">Aceptar y pagar 100%</a>
    <a href="#" class="accept">Aceptar y pagar 50%</a>
  </p>
  <div class="footer">
    <strong>NOTA:</strong><br />
    <span class="important">Esta cotización no es equivalente a una reserva 
      y la misma tiene un vencimiento de 7 días hábiles desde que fue emitida.</span><br />
    Si está de acuerdo con los términos de la misma agradecemos nos conteste 
    por correo electrónico para continuar con el proceso. Posteriormente le 
    enviaremos un contrato con los términos de pago que deberá completar para 
    confirmar su reserva.
  </div>
</div>
@endsection