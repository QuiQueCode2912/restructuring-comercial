<?php 
$total = $total ? $total : 3;
$current = app('request')->step;
?>
<ul class="stepper" style="width:<?php echo (($total - 1) * 120) + 15 ?>px">
<?php for ($i = 1; $i <= $total; $i++) : ?>
  <li><a href="/solicitud/<?php echo $i ?>" class="<?php echo $i < $current ? 'done' : ($i == $current ? 'current' : '') ?>"></a></li>
<?php endfor ?>
</ul>

<?php if ($current == 1) : ?>
<p style="font-size:18px; text-align:center">
  Gracias por tu interés. Para poder realizar la cotización debes completar
  los datos requeridos. Sólo te llevará unos pocos minutos. 
</p>
<?php endif ?>