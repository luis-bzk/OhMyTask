export const getProjectUrl = () => {
  const paramProject = new URLSearchParams(window.location.search);
  const project = Object.fromEntries(paramProject.entries());
  return project.id;
};