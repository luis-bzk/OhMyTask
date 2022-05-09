<div class="reset-view">

  <!-- import app title -->
  <?php include_once  __DIR__ . "/../templates/headerName.php" ?>

  <!-- content -->
  <div class="container-sm auth-box">
    <p class="page-description">Reset your account</p>

    <!-- alerts -->
    <?php include_once  __DIR__ . "/../templates/alerts.php" ?>

    <form action="/reset_password" method="POST" class="form">

      <div class="field">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" />
      </div>

      <!-- button -->
      <input type="submit" class="button-input" value="Send instructions">
    </form>

    <!-- nav actions -->
    <div class="actions">
      <!-- <a class="actions__link" href="/reset_password">Login</a> -->
      <p class="actions__link">Have an acount?
        <a href="/">Login</a>
      </p>
      <p class="actions__link">Don't have an acount?
        <a href="/signup">Create one</a>
      </p>
    </div>

  </div>
</div>