<div class="auth__view">

  <div class="login-view">

    <!-- import app title -->
    <?php include_once  __DIR__ . "/../templates/headerName.php" ?>

    <!-- content -->

    <div class="container-sm auth-box">
      <p class="page-description">Sign in</p>

      <!-- import app title -->
      <?php include_once  __DIR__ . "/../templates/alerts.php" ?>

      <form action="/" method="POST" class="form">
        <div class="field">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" />
        </div>
        <div class="field">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" />
        </div>

        <!-- button -->
        <input type="submit" class="button-input" value="Login">
      </form>

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