// (const task = () => {})
(function () {
  // button show modale in "add new task"
  // variables
  const addNewTaskButton = document.querySelector("#add-task");

  // functions
  const showTaskForm = () => {
    const modal = document.createElement("DIV");
    modal.classList.add("modal");
    modal.innerHTML = `
    <form class="form-task new-task container-md">
      <legend>Add new task</legend>

      <div class="field">
        <label for="taskName">Task Name</label>
        <input type="text" id="taskName" name="taskName" value="" />
      </div>

      <div class="field">
        <input type="submit" class="button-new-task" value="Add task" />
        <button type="button" class="close-modal">
          Cancel
        </button>
      </div>
    </form>
    `;

    setTimeout(() => {
      const formTask = document.querySelector(".form-task");
      formTask.classList.add("animation");
    }, 3000);

    document.querySelector("body").appendChild(modal);
  };

  // task
  addNewTaskButton.addEventListener("click", showTaskForm);
})();
