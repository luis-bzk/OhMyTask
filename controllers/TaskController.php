<?php

namespace Controllers;

use Model\Project;
use Model\Task;

class TaskController
{
  public static function index()
  {
    // if !session start session 
    isSession();
    // if is auth continue
    isAuth();

    // variables
    $projectUrl = $_GET["id"];

    if (!$projectUrl) {
      header("Location: /dashboard");
    }

    // find project
    $project = Project::where("url", $projectUrl);

    if (!$project || $project->ownerId !== $_SESSION["id"]) {
      header("Location: /404");
    }

    $tasks = Task::belongsTo("project_id", $project->id);

    echo json_encode(["tasks" => $tasks]);
  }

  public static function create()
  {
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      // if !session start session
      isSession();
      $projectUrl = $_POST["project_id"]; //url

      $project = Project::where("url", $projectUrl);

      // validation if exist project or the project was created for tha valid user
      if (!$project || $project->ownerId !== $_SESSION["id"]) {
        $alertAnswer = [
          "message" => "Oh oh... An error occurred, we can save this task, sorry",
          "type" => "error",
        ];

        echo json_encode($alertAnswer);
        return;
      }

      // success message && create task
      $task = new Task($_POST);
      $task->project_id = $project->id;
      $result = $task->save();

      // save in DBB validation

      $alertAnswer = [
        "message" => "Task saved successfully!",
        "id" => $result["id"],
        "type" => "succes",
      ];

      echo json_encode($alertAnswer);
    }
  }

  public static function update()
  {
    // if !session start session 
    isSession();

    // if is auth continue
    isAuth();

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
    }
  }

  public static function delete()
  {
    // if !session start session 
    isSession();

    // if is auth continue
    isAuth();

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
    }
  }
}