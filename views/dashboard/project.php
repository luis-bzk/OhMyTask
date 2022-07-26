<?php include_once __DIR__ . "/headerDashboard.php"; ?>

<div class="container-md">
  <div class="container-new-task">
    <button type="button" class="button-add-task" id="add-task">
      &#43; New Task
    </button>
  </div>

  <div class="filters" id="filters">
    <h3>Filter: </h3>
    <div class="filter-inputs">

      <div class="field">
        <label for="all">All</label>
        <input type="radio" id="all" name="filter" value="" checked />
      </div>

      <div class="field">
        <label for="complete">Complete</label>
        <input type="radio" id="complete" name="filter" value="1" />
      </div>

      <div class="field">
        <label for="pendings">Pendings</label>
        <input type="radio" id="pendings" name="filter" value="0" />
      </div>
    </div>
  </div>

  <div class="tasks">
    <ul class="tasks-list" id="tasks-list"></ul>
  </div>
</div>

<?php include_once __DIR__ . "/footerDashboard.php"; ?>

<!-- js -->
<?php
$script .= '
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script src="/build/js/tasks.js" type="module"></script>
';

?>