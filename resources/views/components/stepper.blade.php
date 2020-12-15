<?php 
$total = $total ? $total : 3;
switch (app('request')->step) {
  case 'datos-contacto':    $current = 1; break;
  case 'datos-evento':
  case 'datos-residencia':
  case 'datos-hospedaje':   $current = 2; break;
  case 'vista-previa':      $current = 3; break;
  case 'solicitud-enviada': $current = 4; break;
}
?>
<ul class="stepper" style="width:<?php echo (($total - 1) * 120) + 15 ?>px">
<?php for ($i = 1; $i <= $total; $i++) : ?>
  <li><a href="/solicitud/<?php echo $i ?>" class="<?php echo $i < $current ? 'done' : ($i == $current ? 'current' : '') ?>"></a></li>
<?php endfor ?>
</ul>

<?php if ($current == 1) : ?>
<p style="font-size:20px; text-align:center; font-family:'Trola', sans-serif; font-weight:600">
  Gracias por tu interés. Para poder realizar la cotización debes completar
  los datos requeridos. Sólo te llevará unos pocos minutos. 
</p>
<?php endif ?>