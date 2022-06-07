<?php include_once __DIR__ . "/headerDashboard.php"; ?>

  <div class="container-md">
    <div class="container-new-task">
      <button type="button" class="button-add-task" id="add-task">
        &#43; New Task
      </button>
    </div>

    <div class="tasks">
      <ul class="tasks-list" id="tasks-list"></ul>
    </div>
  </div>

<?php include_once __DIR__ . "/footerDashboard.php"; ?>

<!-- js -->
<?php
$script = '<script src="/build/js/tasks.js" type="module"></script>';
?>