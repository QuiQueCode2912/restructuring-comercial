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
  <?php
  switch ($i) {
    case 1 : $path = 'datos-contacto'; break;
    case 2 : $path = 'datos-evento'; break;
    case 3 : $path = 'vista-previa'; break;
  }
  ?>
  <li><a href="/cotizacion/<?php echo $path ?>" class="<?php echo $i < $current ? 'done' : ($i == $current ? 'current' : '') ?>"></a></li>
<?php endfor ?>
</ul>

<?php if ($current == 1) : ?>
<p style="font-size:20px; text-align:center; font-family:'Trola', sans-serif; font-weight:600">
Gracias por tu interés en reservar un espacio/ organizar tu evento / hospedarte en 
Ciudad del Saber. Para solicitar la cotización, debes completar los datos requeridos. 
Esto te tomará unos pocos minutos.
</p>
<?php endif ?>