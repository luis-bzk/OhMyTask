import { getProjectUrl, cleanTasksHTML } from "./functions.js";
import { showAlert, showTaskForm } from "./newTasks.js";
import {
  tasks,
  setTasks,
  filteredTasks,
  setFilteredTasks,
} from "./globalVariables.js";

// update a task with new state, API, return new array and show task
export const updateTask = async function (toUpdateTask) {
  const { id, name, state } = toUpdateTask;

  const data = new FormData();
  data.append("id", id);
  data.append("name", name);
  data.append("state", state);
  data.append("project_id", getProjectUrl());

  try {
    const url = "http://localhost:3000/api/task/update";

    const answer = await fetch(url, {
      method: "POST",
      body: data,
    });

    const result = await answer.json();

    if (result.answerUpdate.type === "success") {
      // const documentReference = document.querySelector(".container-new-task");
      const { message, type } = result.answerUpdate;

      showAlert(message, type);

      const modal = document.querySelector(".modal");
      const formTask = document.querySelector(".form-task");
      if (modal) {
        setTimeout(() => {
          formTask.classList.add("close");
          setTimeout(() => {
            modal.remove();
          }, 500);
        }, 1000);
      }

      const updatedTasks = tasks.map((memoryTask) => {
        if (memoryTask.id === id) {
          memoryTask.state = state;
          memoryTask.name = name;
        }

        return memoryTask;
      });

      setTasks(updatedTasks);
      showTasks();
    }
  } catch (error) {
    console.log(error);
  }
};

// take a task copy and change state
const changeTaskState = (toUpdateTask) => {
  const newTaskState = toUpdateTask.state === "1" ? "0" : "1";
  toUpdateTask.state = newTaskState;
  updateTask(toUpdateTask);
};

// delete one task and return an array without the selected task, API
const confirmDeleteTask = (toDeleteTask) => {
  const deleteTaskProject = async function (toDeleteTask) {
    const { id, name, state } = toDeleteTask;

    const data = new FormData();
    data.append("id", id);
    data.append("name", name);
    data.append("state", state);
    data.append("project_id", getProjectUrl());

    try {
      const url = "http://localhost:3000/api/task/delete";
      const answer = await fetch(url, {
        method: "POST",
        body: data,
      });
      const deleteResult = await answer.json();
      const { result, message, type } = deleteResult.deleteResult;
      // const documentReference = document.querySelector(".container-new-task");

      if (result) {
        showAlert(message, type);
        setTasks(
          tasks.filter((memoryTask) => memoryTask.id !== toDeleteTask.id)
        );
        showTasks();
      }
    } catch (error) {
      console.log(error);
    }
  };

  const swalWithcustomButtons = Swal.mixin({
    customClass: {
      confirmButton: "sweetalert btn-success",
      cancelButton: "sweetalert btn-danger",
      title: "sweetalert text",
      actions: "sweetalert actions",
    },
    buttonsStyling: false,
  });

  // ALERT
  swalWithcustomButtons
    .fire({
      title: "Are you sure you want to delete this Task?",
      icon: "warning",
      showCancelButton: true,
      confirmButtonText: "Yes, delete it!",
      cancelButtonText: "No, cancel!",
      reverseButtons: true,
      width: 600,
    })
    .then((result) => {
      if (result.isConfirmed) {
        deleteTaskProject(toDeleteTask);
      }
    });
};

const totalPending = () => {
  const totalTasksPending = tasks.filter((task) => task.state === "0");
  const pendingRatio = document.querySelector("#pendings");

  if (totalTasksPending.length === 0) {
    pendingRatio.disabled = true;
  } else {
    pendingRatio.disabled = false;
  }
};
const totalComplete = () => {
  const totalComplete = tasks.filter((task) => task.state === "1");
  const completeRadio = document.querySelector("#complete");

  if (totalComplete.length === 0) {
    completeRadio.disabled = true;
  } else {
    completeRadio.disabled = false;
  }
};

export const showTasks = () => {
  cleanTasksHTML();

  totalPending();
  totalComplete();

  const arrayTasks = filteredTasks.length ? filteredTasks : tasks;

  // not tasks
  if (arrayTasks.length === 0) {
    const tasksList = document.querySelector("#tasks-list");

    const notTasks = document.createElement("DIV");
    notTasks.textContent = "There aren't tasks";
    notTasks.classList.add("not-tasks");

    tasksList.appendChild(notTasks);
    return;
  }

  // state dictionary
  const stateTask = {
    0: "Pending",
    1: "Complete",
  };

  // create element layer
  arrayTasks.forEach((task) => {
    const tasksList = document.querySelector("#tasks-list");

    // task container
    const taskContainer = document.createElement("LI");
    taskContainer.classList.add("task");
    taskContainer.dataset.taskId = task.id;

    // name
    const taskName = document.createElement("P");
    taskName.textContent = task.name;
    taskName.classList.add("task__name");

    // options
    const taskOptions = document.createElement("DIV");
    taskOptions.classList.add("task__options");

    // option buttons
    //edit
    const editTaskButton = document.createElement("I");
    editTaskButton.classList.add("fa-solid");
    editTaskButton.classList.add("fa-pen-to-square");
    editTaskButton.classList.add("task-edit");
    editTaskButton.ondblclick = function () {
      showTaskForm(true, { ...task });
    };
    //state
    const stateTaskButton = document.createElement("BUTTON");
    stateTaskButton.classList.add("task-state");
    stateTaskButton.classList.add(`${stateTask[task.state].toLowerCase()}`);
    stateTaskButton.textContent = stateTask[task.state];
    stateTaskButton.dataset.taskState = task.state;
    //change state
    stateTaskButton.ondblclick = function () {
      changeTaskState({ ...task });
    };
    //delete
    const deleteTaskButton = document.createElement("BUTTON");
    deleteTaskButton.classList.add("task-delete");
    deleteTaskButton.textContent = "Delete";
    deleteTaskButton.dataset.taskDelete = task.id;
    // delete my task
    deleteTaskButton.ondblclick = function () {
      confirmDeleteTask({ ...task });
    };

    taskOptions.appendChild(editTaskButton);
    taskOptions.appendChild(stateTaskButton);
    taskOptions.appendChild(deleteTaskButton);

    taskContainer.appendChild(taskName);
    taskContainer.appendChild(taskOptions);

    tasksList.appendChild(taskContainer);
  });
};

// filter
const filterSearch = document.querySelectorAll("#filters input[type='radio']");

const filterTasks = (event) => {
  const filter = event.target.value;
  if (filter !== "") {
    setFilteredTasks(tasks.filter((task) => task.state === filter));
  } else {
    setFilteredTasks([]);
  }

  showTasks();
};

filterSearch.forEach((radio) => {
  radio.addEventListener("input", filterTasks);
});

// get tasks
export const getTasks = async function () {
  try {
    const projectId = getProjectUrl();
    const urlProject = `/api/tasks?id=${projectId}`;
    const answer = await fetch(urlProject); //send url project
    const result = await answer.json();

    // const { tasks } = result;
    // tasks = result.tasks;
    setTasks(result.tasks);

    showTasks();
  } catch (error) {
    console.log(error);
  }
};
