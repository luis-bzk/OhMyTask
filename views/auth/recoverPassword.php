<div class="auth__view">
  <div class="recover-view">

    <!-- import app title -->
    <?php include_once  __DIR__ . "/../templates/headerName.php" ?>

    <!-- content -->

    <div class="container-sm auth-box">
      <p class="page-description">Set your new password</p>

      <!-- alerts -->
      <?php include_once  __DIR__ . "/../templates/alerts.php" ?>

      <?php if ($showInputs) : ?>
      <form method="POST" class="form">

        <div class="field">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" />
        </div>

        <div class="field">
          <label for="password2">Repeat Your Password</label>
          <input type="password" id="password2" name="password2" />
        </div>

        <!-- button -->
        <input type="submit" class="button-input" value="Save password">
      </form>
      <?php endif; ?>


      <!-- nav actions -->
      <div class="actions">
        <p class="actions__link">Don't have an acount?
          <a href="/signup">Create one</a>
        </p>
        <a class="actions__link" href="/reset_password">Forgot your password</a>
      </div>

    </div>
  </div>

</div>