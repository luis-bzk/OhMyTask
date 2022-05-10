<div class="auth__view">

  <div class="signup-view">

    <!-- import app title -->
    <?php include_once  __DIR__ . "/../templates/headerName.php" ?>

    <!-- content -->

    <div class="container-sm auth-box">
      <p class="page-description">Create an account</p>

      <!-- alerts -->
      <?php include_once  __DIR__ . "/../templates/alerts.php" ?>

      <form action="/signup" method="POST" class="form">
        <div class="field">
          <label for="name">Name</label>
          <input type="text" id="name" name="name" value="<?php echo $user->name ?>" />
        </div>

        <div class="field">
          <label for="email">Email</label>
          <input type="email" id="email" name="email" value="<?php echo $user->email; ?>" />
        </div>

        <div class=" field">
          <label for="password">Password</label>
          <input type="password" id="password" name="password" />
        </div>

        <div class="field">
          <label for="password2">Repeat Your Password</label>
          <input type="password" id="password2" name="password2" />
        </div>

        <!-- button -->
        <input type="submit" class="button-input" value="Create account">
      </form>

      <!-- nav actions -->
      <div class="actions">
        <p class="actions__link">Have an acount?
          <a href="/">Login</a>
        </p>
        <a class="actions__link" href="/reset_password">Forgot your password</a>
      </div>

    </div>
  </div>
</div>