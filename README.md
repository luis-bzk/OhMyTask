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
- set dark mode depending user theme system

## global variables

- Create file with variables
  - let tasks -> set tasks in browser,
    - when saves in "addNew Task" -> newTask.js
    - shows complete tasks, getTasks set tasks from url, show tasks with "showTasks" -> projectTasks.js
  - function cleanTasksHTML -> functions.js
    - clear previous tasks in DOM

## Create & Update & Delete Tasks

- New funtions in projectTasks.js

  - changeTaskState -> take a task copy and change state to pass an updateTask function
  - updateTask -> update a task with new state, send data with API, return new array and show task
  - confirmDeleteTask -> delete one task and return an array without the selected task, delete in backend with API

- Set new functions in TaskController.php
  - index -> return whit API all the tasks from a Project
  - create -> Create new task and return a successfully message
  - update -> Save an existing task changing data and return a successfully message
  - delete -> Delete task and return a successfully message

## Fix errors in mobile system

- improve mobile interface view

## Img

> Login view | user exists? email is preregistered? is user validated? is the password correct?
> <img src="PicturesDemost/login.png" alt="login view"/>
> <img src="PicturesDemost/validationRunning.png" alt="login validation view"/>

> Create an account | user exists? passwords mathes? are value data?
> <img src="PicturesDemost/signup.png" alt="signup view"/>

> Reset my password | use registered email for send solicitation
> <img src="PicturesDemost/resetPassword.png" alt="reset password view"/>

> Dashboard View
> <img src="PicturesDemost/dashboard.png" alt="dashboard view"/>

> Dashboard project cards interaction
> <img src="PicturesDemost/projectEffect.png" alt="project effect view"/>

> Create new project | location -> new project file
> <img src="PicturesDemost/newProject.png" alt="new project view"/>

> My profile View | change data, validation email, exists email?
> <img src="PicturesDemost/profile.png" alt="profile view"/>

> Project file View | view only projects from user, only see tasks from project.
> <img src="PicturesDemost/projectFile.png" alt="project file view"/>

> Modal add new task
> <img src="PicturesDemost/addNewTask.png" alt="add New Task modal"/>

> Filter task by All | Complete | Pending
> <img src="PicturesDemost/filterComplete.png" alt="filter Complete tasks "/>

<img src="PicturesDemost/filterPending.png" alt="filter Pending tasks "/>

> Tasks options Edit | Change state | Delete, all changes view on live
> <img src="PicturesDemost/filterComplete.png" alt="edit Task"/>

> Tasks options Edit | Change state | Delete, all changes view on live
> <img src="PicturesDemost/deleteTask.png" alt="delete Task"/>

> Try acces pages don't exist
> <img src="PicturesDemost/errorPage.png" alt="Error View"/>

## Mobile view

<img src="PicturesDemost/mobile/signin.png" alt="Signin View"/>
<img src="PicturesDemost/mobile/dashboard.png" alt="dashboard View"/>
<img src="PicturesDemost/mobile/menuMobile.png" alt="menuMobile option"/>
<img src="PicturesDemost/mobile/projectFile.png" alt="project File View"/>
<img src="PicturesDemost/mobile/addTask.png" alt="add Task modal"/>
<img src="PicturesDemost/mobile/taskFunction.png" alt="task Functions View"/>
<img src="PicturesDemost/mobile/createProject.png" alt="create Project.png View"/>
