import {getProjectUrl} from "./functions.js";

// variables
// export let tasks = [];
import {tasks, setTasks} from "./globalVariables.js";

export const showTasks = () => {
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

    const deleteTaskButton = document.createElement("BUTTON");
    deleteTaskButton.classList.add("task-delete");
    deleteTaskButton.textContent = "Delete";
    deleteTaskButton.dataset.taskDelete = task.id;

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
    console.log("desde projectTask ", tasks);


    showTasks();
  } catch (e) {
    console.log(e);
  }
};
