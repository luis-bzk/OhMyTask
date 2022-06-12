export const getProjectUrl = () => {
  const paramProject = new URLSearchParams(window.location.search);
  const project = Object.fromEntries(paramProject.entries());
  return project.id;
};

export const cleanTasksHTML = () => {
  const tasksList = document.querySelector("#tasks-list");
  while (tasksList.firstChild) {
    tasksList.removeChild(tasksList.firstChild);
  }

}