# ohMyTask

Uptask php, js, scss, sql

## login controller completed

- sign in
- create account
- recover password
- reset password
- email validation

## Dashboard controller

- dashboard
- create project
- user profile

## Projects creation

- set an url for a project
- security view for a project

## Projects view (all)

- dashboard/index.php = print all projects created
- projects.scss = styles for the dashbord porjects

## Task Creation

- add a button in a project view to ad a task
- tasks.jc = create a div that show a form to add a task in a project
- modal.scss = styles for a modal popup when create a task

## Add new Task

- task.js -> async add new task function (async away), receives a task name on "sumbitNewTaskForm"
- destructured javascript in modules.
  - module projects
    - functions.js = functions that use another files
    - newTasks.js = add a new task (create modal, show message, delete modal, save modal, etc)
    - projectTasks.js = show tasks in project.php

## Set an error page view

- in views -> error -> 404error.php set a new view to show an error

## Complete change colors in Dashboard

- change palette colors
- add tasks in porject section
- styles for task in tasks.scss

## global variables

- Create file with variables
  - let tasks -> set tasks in browser,
    - when saves in "addNew Task" -> newTask.js
    - shows complete tasks, getTasks set tasks from url, show tasks with "showTasks" -> projectTasks.js
  - function cleanTasksHTML -> functions.js
    - clear previous tasks in DOM