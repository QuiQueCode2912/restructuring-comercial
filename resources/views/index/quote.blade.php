@extends('layouts.layout')

@section('content')
<!-- COVID <x-covid /> -->
<x-header menu="false" />

<?php 
$icon = 'fe-alert-triangle';
$background = '#ffc107';
$color = '#212529';
$text_color = '#212529';
$title = 'Hay un problema con tu cotización';
$description = 'Por favor comunícate con el asesor de tu cuenta para mayor información.';

switch (true) {
  case $type == 'acceptance' && $success :
    $icon = 'fe-check';
    $background = '#198754';
    $color = '#ffffff';
    $text_color = '#198754';
    $title = 'Que buena noticia!!';
    $description = 'Has aceptado la cotización para tu evento<br /><strong>' . $opportunity['Name'] . '</strong>.
      <br /><br />
      Próximamente recibirás un correo electrónico con más información.';
    break;
  case $type == 'rejection' && $success :
    $icon = 'fe-thumbs-up';
    $background = '#0d6efd';
    $color = '#ffffff';
    $text_color = '#0d6efd';
    $title = 'Será para otra ocasión';
    $description = 'Lamentamos no haber llegado a un acuerdo para tu evento<br /><strong>' . $opportunity['Name'] . '</strong>.
      <br /><br />
      Sin embargo te esperamos en una próxima oportunidad con los brazos abiertos.';
    break;
	
	/*
   default:
     $description = $description . " - " . $debugstage;
	 break; */
}
?>

<div class="request">
  <div class="container text-center" style="min-height:800px">
      <br><br>
      <div class="row justify-content-center">
        <div class="col-12 col-md-10">
          <i class="fe <?php echo $icon ?>" style="margin:0 auto 20px; display:block; font-size:100px; padding:20px; border-radius:50%; width:150px; height:150px; background-color:<?php echo $background ?> !important; color:<?php echo $color ?> !important"></i>
        </div>
        <div class="col-12 col-md-10">
          <p style="font-size:20px; margin:0; font-weight:600; color:<?php echo $text_color ?> !important" class="text-center"><?php echo $title ?></p>
        </div>
        <div class="col-12 col-md-10">
          <p class="text-center" style="margin:0; font-family:'Trola', sans-serif; font-size:18px"><?php echo $description ?></p>
        </div>
      </div>
  </div>
</div>

@endsection