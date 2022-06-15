import { getProjectUrl, cleanTasksHTML } from "./functions.js";
import { showAlert } from "./newTasks.js";

// variables
// export let tasks = [];
import { tasks, setTasks } from "./globalVariables.js";

// update a task with new state, API, return new array and show task
const updateTask = async function (topUpdateTask) {
  const { id, name, state } = topUpdateTask;

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

    if (result.answerUpdate.type === "succes") {
      const documentReference = document.querySelector(".container-new-task");
      const { message, type } = result.answerUpdate;

      showAlert(message, type, documentReference);

      const updatedTasks = tasks.map((memoryTask) => {
        if (memoryTask.id === id) {
          memoryTask.state = state;
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
const changeTaskState = (topUpdateTask) => {
  const newTaskState = topUpdateTask.state === "1" ? "0" : "1";
  topUpdateTask.state = newTaskState;
  updateTask(topUpdateTask);
};

// delete one task and return an array without the selected task, API
const confirmDeleteTask = (toDeleteTask) => {
  const swalWithcustomButtons = Swal.mixin({
    customClass: {
      confirmButton: "sweetalert btn-success",
      cancelButton: "sweetalert btn-danger",
      title: "sweetalert text",
      actions: "sweetalert actions",
    },
    buttonsStyling: false,
  });

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
      const documentReference = document.querySelector(".container-new-task");

      if (result) {
        showAlert(message, type, documentReference);
        setTasks(
          tasks.filter((memoryTask) => memoryTask.id !== toDeleteTask.id)
        );
        showTasks();
      }
    } catch (error) {
      console.log(error);
    }
  };

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

        // swalWithcustomButtons.fire(
        //   "Your task has been deleted!",
        //   "",
        //   "success"
        // );
      }
    });
};

export const showTasks = () => {
  cleanTasksHTML();

  // not tasks
  if (tasks.length === 0) {
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
  tasks.forEach((task) => {
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
    const stateTaskButton = document.createElement("BUTTON");
    stateTaskButton.classList.add("task-state");
    stateTaskButton.classList.add(`${stateTask[task.state].toLowerCase()}`);
    stateTaskButton.textContent = stateTask[task.state];
    stateTaskButton.dataset.taskState = task.state;
    //change state
    stateTaskButton.ondblclick = function () {
      changeTaskState({ ...task });
    };

    const deleteTaskButton = document.createElement("BUTTON");
    deleteTaskButton.classList.add("task-delete");
    deleteTaskButton.textContent = "Delete";
    deleteTaskButton.dataset.taskDelete = task.id;
    // delete my task
    deleteTaskButton.ondblclick = function () {
      confirmDeleteTask({ ...task });
    };

    taskOptions.appendChild(stateTaskButton);
    taskOptions.appendChild(deleteTaskButton);

    taskContainer.appendChild(taskName);
    taskContainer.appendChild(taskOptions);

    tasksList.appendChild(taskContainer);
  });
};

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
