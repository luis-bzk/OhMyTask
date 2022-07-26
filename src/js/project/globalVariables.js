let tasks = [];

const setTasks = (tasksValues) => {
  tasks = tasksValues;
};

let filteredTasks = [];

const setFilteredTasks = (filterTasksValues) => {
  filteredTasks = filterTasksValues;
};

export { tasks, setTasks, filteredTasks, setFilteredTasks };
