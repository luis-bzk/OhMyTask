<div class="header-login">
  <h1 class="tittle-app">UpTask</h1>
  <p class="tagline">Create & manage your projects</p>
</div>

<div class="container">

  <div class="container-sm login-box">
    <p class="page-description">Sign in</p>

    <form action="/" method="POST" class="form">
      <div class="field">
        <label for="email">Email</label>
        <input type="email" id="email" name="email" />
      </div>
      <div class="field">
        <label for="password">Password</label>
        <input type="password" id="password" name="password" />
      </div>

      <input type="submit" class="button-input" value="Login">
    </form>

    <div class="actions">
      <p class="actions__link">Don't have an acount?
        <a href="/signup">Create one</a>
      </p>
      <a class="actions__link" href="/reset_password">Forgot your password</a>
    </div>
  </div>
</div>