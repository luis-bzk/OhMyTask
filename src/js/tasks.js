// (const task = () => {})
import { getTasks } from "./project/projectTasks.js";
import { showTaskForm } from "./project/newTasks.js";

(function () {
  // button show modal in "add new task"
  // variables
  const addNewTaskButton = document.querySelector("#add-task");

  // import from project module
  getTasks();

  // show form task in a modal
  addNewTaskButton.addEventListener("click", function () {
    showTaskForm();
  });
})();
