@extends('layouts.layout')

@section('content')
<x-covid />
<x-header menu="false" />

<style>
.table {
  width: 500px;
  margin: 50px auto 40px;
  background: white;
  font-size: .9rem;
}
.table tbody tr th,
.table tbody tr td {
  text-align: left !important;
  padding: 10px;
}
</style>

<?php if ($data && $opportunity) : ?>
<div class="request">
  <div class="container text-center" style="min-height:800px">
    <br><br>
    <div class="row justify-content-center">
      <div class="col-12 col-md-10">
        <i class="fe fe-check round text-white bg-success" style="background-color:#63AF3F !important"></i>
      </div>
      <div class="col-12 col-md-10">
        <p style="font-size:20px; margin:0; font-weight:600; color:#63AF3F !important" class="text-success text-center">Estamos procesando tu pago</p>
      </div>
      <div class="col-12 col-md-10">
        <p class="text-center" style="margin:0; font-family:'Trola', sans-serif; font-size:18px">Muy pronto recibirás información sobre tu evento en tu correo electrónico</p>
      </div>
    </div>
    
    <table class="table table-sm">
      <tbody>
        <tr>
          <th>Evento</th>
          <td><?php echo $opportunity['Name'] ?></td>
        </tr>
        <tr>
          <th>ID Evento</th>
          <td><?php echo $data['PARM_1'] ?></td>
        </tr>
        <tr>
          <th>Valor pagado</th>
          <td>USD <?php echo $data['TotalPagado'] ?></td>
        </tr>
        <tr>
          <th>Concepto</th>
          <td>Abono - <?php echo $opportunity['Name'] ?></td>
        </tr>
        <tr>
          <th>Fecha</th>
          <td><?php echo $data['Fecha'] ?> <?php echo $data['Hora'] ?></td>
        </tr>
        <tr>
          <th>Estado de la transacción</th>
          <td><?php echo $data['Estado'] ?></td>
        </tr>
      </tbody>
    </table>

    <p class="text-center">
      <a href="/" class="btn btn-primary">Volver al inicio</a>
      <a href="javascript:print()" class="btn btn-primary">Imprimir comprobante</a>
    </p>
  </div>
</div>
<?php else : ?>
<div class="request">
  <div class="container text-center" style="min-height:800px">
      <br><br>
      <div class="row justify-content-center">
        <div class="col-12 col-md-10">
          <i class="fe fe-alert-triangle" style="margin:0 auto 20px; display:block; font-size:100px; padding:20px; border-radius:50%; width:150px; height:150px; background-color:#ffc107 !important; color:#212529 !important"></i>
        </div>
        <div class="col-12 col-md-10">
          <p style="font-size:20px; margin:0; font-weight:600; color:#212529 !important" class="text-center">Hay un problema con la verificación de tu pago</p>
        </div>
        <div class="col-12 col-md-10">
          <p class="text-center" style="margin:0; font-family:'Trola', sans-serif; font-size:18px">No te preocupes, consulta con el asesor de tu cuenta para más información.</p>
        </div>
      </div>
  </div>
</div>
<?php endif ?>

@endsection