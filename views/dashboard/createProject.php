<!-- header -->
<?php include_once __DIR__ . "/headerDashboard.php"; ?>

<div class="container-md">
  <?php include_once __DIR__ . "/../templates/alerts.php"; ?>

  <form action="create-project" class="form-dashboard" method="POST">
    <?php include_once __DIR__ . "/formDashboard.php"; ?>
    <input class="button-create" type="submit" value="Create Project">
  </form>
</div>

<!-- footer -->
<?php include_once __DIR__ . "/footerDashboard.php"; ?>