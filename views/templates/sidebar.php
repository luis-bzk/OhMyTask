<aside class="sidebar">
  <div class="sidebar-container">
    <h2>OhMyTask</h2>

    <div class="close-menu">
      <img id="close-menu" src="build/img/closeMenu.svg" alt="menu close img">
    </div>
  </div>

  <nav class="sidebar-nav">
    <a class="<?php echo ($title === 'My Projects') ? "active" : ''; ?>" href="/dashboard">Projects</a>
    <a class="<?php echo ($title === 'Create Projects') ? "active" : ''; ?>" href="/create-project">Create Project</a>
    <a class="<?php echo ($title === 'My Profile') ? "active" : ''; ?>" href="/profile">My Profile</a>
  </nav>

  <div class="close-session-mobile">
    <a href="/logout" class="close-session">Logout</a>
  </div>
</aside>