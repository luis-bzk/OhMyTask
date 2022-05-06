<?php
foreach ($alerts as $key => $alert) :
  foreach ($alert as $mensaje) :
?>

    <div class="alert <?php echo $key; ?>">
      <?php echo $mensaje; ?>
      <?php if ($key === "error") : ?>
        <i class="fa-solid fa-triangle-exclamation"></i>
      <?php endif; ?>
    </div>

<?php
  endforeach;
endforeach;
?>