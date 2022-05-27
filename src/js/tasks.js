// (const task = () => {})
(function () {
  // button show modale in "add new task"
  // variables
  const addNewTaskButton = document.querySelector("#add-task");

  // functions
  const showTaskForm = () => {
    const modal = document.createElement("DIV");
    modal.classList.add("modal");
    // add inner html -> delegation
    modal.innerHTML = `
    <form class="form-task container-md">
      <legend>Add new task</legend>

      <div class="field">
        <label for="taskName">Task Name</label>
        <input type="text" id="taskName" name="taskName" value="" />
      </div>

      <div class="field form-task__buttons">
        <input type="submit" class="button-new-task" value="Add task" />
        <button type="button" class="close-modal">
          Cancel
        </button>
      </div>
    </form>
    `;

    // add animation to form when appear
    setTimeout(() => {
      const formTask = document.querySelector(".form-task");
      formTask.classList.add("animation");
    }, 0);

    // close modal
    modal.addEventListener("click", function (event) {
      event.preventDefault();

      // remove model && transition
      if (event.target.classList.contains("close-modal")) {
        const formTask = document.querySelector(".form-task");
        formTask.classList.add("close");
        setTimeout(() => {
          modal.remove();
        }, 500);
      }
    });

    // add modal to body
    document.querySelector("body").appendChild(modal);
  };

  // task
  addNewTaskButton.addEventListener("click", showTaskForm);
})();
