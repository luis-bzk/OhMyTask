<?php include_once __DIR__ . "/headerDashboard.php"; ?>

<div class="dashboard-projects">
  <!-- if user dont have projects -->
  <?php if (count($projects) <= 0) : ?>

  <p class="no-projects">You dont have projects for now, <a href="/create-project">create one?</a></p>

  <!-- if user have projects -->
  <?php else : ?>

  <ul class="projects-list">

    <?php foreach ($projects as $project) : ?>

    <li class="project">
      <a class="project__content" href="/project?id=<?php echo $project->url; ?>">
        <i class="fa-solid fa-arrow-pointer"></i>

        <span>
          <?php echo $project->name; ?>
        </span>
      </a>
    </li>

    <?php endforeach; ?>

  </ul>

  <?php endif; ?>
</div>

<?php include_once __DIR__ . "/footerDashboard.php"; ?>