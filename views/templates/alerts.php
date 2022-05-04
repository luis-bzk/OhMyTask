<?php
foreach ($alerts as $key => $alert) :
  foreach ($alert as $mensaje) :
?>

<div class="alert <?php echo $key; ?>"><?php echo $mensaje; ?> <i class="fa-solid fa-triangle-exclamation"></i></div>

<?php
  endforeach;
endforeach;
?>