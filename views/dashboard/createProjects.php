<?php include_once __DIR__ . "/headerDashboard.php"; ?>

<div class="container-md">
  <?php include_once __DIR__ . "/../templates/alerts.php"; ?>

  <form action="" class="form-dashboard">
    <?php include_once __DIR__ . "/formDashboard.php"; ?>
    <input class="button-create" type="submit" value="Create Project">
  </form>
</div>
<?php include_once __DIR__ . "/footerDashboard.php"; ?>