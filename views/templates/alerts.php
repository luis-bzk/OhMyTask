<?php
foreach ($alerts as $key => $alert) :
  foreach ($alert as $mensaje) :
?>

<div class="alert <?php echo $key; ?>"><?php echo $mensaje; ?></div>

<?php
  endforeach;
endforeach;
?>