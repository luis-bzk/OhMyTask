export const getProjectUrl=()=>{const e=new URLSearchParams(window.location.search);return Object.fromEntries(e.entries()).id};export const cleanTasksHTML=()=>{const e=document.querySelector("#tasks-list");for(;e.firstChild;)e.removeChild(e.firstChild)};const validateFormData=e=>{for(let t of e.values())console.log(t)};