<?php include_once __DIR__ . "/headerDashboard.php"; ?>
<div class="container-md">
  <?php include_once __DIR__ . "./../templates/alerts.php"; ?>

  <form action="" class="form-update-profile" method="POST" action="/profile">
    <div class="field">
      <label for="name">Name</label>
      <input type="text" value="<?php echo $user->name ?>" name="name" placeholder="New user name">
    </div>

    <div class="field">
      <label for="email">Email</label>
      <input type="email" value="<?php echo $user->email ?>" name="email" placeholder="New user email">
    </div>

    <input class="update-profile-button" type="submit" value="Save changes">
  </form>
</div>
<?php include_once __DIR__ . "/footerDashboard.php"; ?>