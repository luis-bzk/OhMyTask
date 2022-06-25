import { getProjectUrl, cleanTasksHTML } from "./functions.js";
// import { tasks } from "./projectTasks.js";
import { tasks, setTasks } from "./globalVariables.js";
// show tasks
import { showTasks, updateTask } from "./projectTasks.js";

// show alert on IU
export const showAlert = (message, type) => {
  // ALERT
  const SwalAlertDB = Swal.mixin({
    customClass: {
      title: "sweetalert title",
      confirmButton: "sweetalert btn-success",
    },
    buttonsStyling: false,
  });
  SwalAlertDB.fire({ title: message, icon: type, width: 600 });
};

// consult Server and add new task to project
const addNewTask = async function (newTaskName) {
  // const documentReference = document.querySelector(".form-task legend");
  const data = new FormData();

  data.append("name", newTaskName);
  data.append("project_id", getProjectUrl());

  try {
    const url = "http://localhost:3000/api/task";

    const answer = await fetch(url, {
      method: "POST",
      body: data,
    });

    const result = await answer.json();

    // show alert
    showAlert(result.message, result.type);

    // close modal
    if (result.type === "success") {
      const modal = document.querySelector(".modal");
      const formTask = document.querySelector(".form-task");

      setTimeout(() => {
        formTask.classList.add("close");
        setTimeout(() => {
          modal.remove();
        }, 500);
      }, 1000);

      // create new task object in browser
      const taskObj = {
        id: String(result.id),
        name: newTaskName,
        state: "0",
        project_id: result.project_id,
      };

      // saving the task object in
      // tasks = [...tasks, taskObj];
      setTasks([...tasks, taskObj]);
      showTasks();
    }
  } catch (error) {
    console.log(error);
  }
};

// validation task
const setTaskValidation = (editTask, toUpdateTask) => {
  const newTaskName = document.querySelector("#taskName").value.trim();
  // const documentReference = document.querySelector(".form-task legend");

  // validation
  if (!newTaskName) {
    // show alert
    showAlert("You need to set a Task Name", "error");
    return;
  }
  if (newTaskName.length > 60) {
    showAlert("The task name cannot be greater that 60 characters", "error");
    return;
  }

  // update task
  if (editTask) {
    toUpdateTask.name = newTaskName;
    updateTask(toUpdateTask);
  }
  // new task
  if (editTask === false) {
    addNewTask(newTaskName);
  }
};

// Show the modal && functions
export const showTaskForm = (editTask = false, toUpdateTask = {}) => {
  // console.log(editTask);
  // console.log(toUpdateTask);

  const modal = document.createElement("DIV");
  modal.classList.add("modal");

  // add inner html -> so use  delegation
  modal.innerHTML = `
    <form class="form-task container-md">
      <legend>${editTask ? "Edit task" : "Add new task"}</legend>

      <div class="field">
        <label for="taskName">Task Name</label>
        <input type="text" id="taskName" name="taskName" value="${
          toUpdateTask.name ? toUpdateTask.name : ""
        }" />
      </div>

      <div class="field form-task__buttons">
        <input type="submit" class="button-new-task" value="${
          toUpdateTask.name ? "Save Changes" : "Add New Task"
        }" />
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
  }, 100);

  // close modal
  modal.addEventListener("click", function (event) {
    event.preventDefault();

    // remove model && transition || Delegation
    if (event.target.classList.contains("close-modal")) {
      const formTask = document.querySelector(".form-task");
      formTask.classList.add("close");

      setTimeout(() => {
        modal.remove();
      }, 500);
    }

    //  add new task by button class
    if (event.target.classList.contains("button-new-task")) {
      setTaskValidation(editTask, toUpdateTask);
    }
  });

  // add modal to body
  document.querySelector(".dashboard").appendChild(modal);
};
