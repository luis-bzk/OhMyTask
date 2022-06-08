import { getProjectUrl } from "./functions.js";

const showTasks = (tasks) =>{
  if (tasks.length === 0){
    const tasksList = document.querySelector("#tasks-list");

    const notTasks = document.createElement("DIV");
    notTasks.textContent = "There aren't tasks";
    notTasks.classList.add("not-tasks");

    tasksList.appendChild(notTasks);

  }

}

export const getTasks = async function () {
  try {
    const projectId = getProjectUrl();
    const urlProject = `/api/tasks?id=${projectId}`;
    const answer = await fetch(urlProject);
    const result = await answer.json();

    const {tasks} = result;

    showTasks(tasks);


  } catch (e) {
    console.log(e);
  }
};

