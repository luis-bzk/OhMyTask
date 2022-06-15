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

## Update variables

- New funtions in projectTasks.js

  - changeTaskState -> take a task copy and change state to pass an updateTask function
  - updateTask -> update a task with new state, send data with API, return new array and show task
  - confirmDeleteTask -> delete one task and return an array without the selected task, delete in backend with API

- Set new functions in TaskController.php
  - index -> return whit API all the tasks from a Project
  - create -> Create new task and return a successfully message
  - update -> Save an existing task changing data and return a successfully message
  - delete -> Delete task and return a successfully message

## Delete variables
