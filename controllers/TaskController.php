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

    if (!$project || $project->owner_id !== $_SESSION["id"]) {
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
      if (!$project || $project->owner_id !== $_SESSION["id"]) {
        $alertAnswer = [
          "message" => "Oh oh... An error occurred, we can't save this task, sorry",
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
        "type" => "success",
        "project_id" => $project->id,
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
      // project exists??
      $project = Project::where("url", $_POST["project_id"]);

      // validation if exist project or the project was created for tha valid user
      if (!$project || $project->owner_id !== $_SESSION["id"]) {
        $alertAnswer = [
          "message" => "Oh oh... An error occurred, we can't update this task, sorry",
          "type" => "error",
        ];

        echo json_encode($alertAnswer);
        return;
      }

      $task = new Task($_POST);
      $task->project_id = $project->id;
      $result = $task->save();

      if ($result) {
        $answerUpdate = [
          "message" => "Task updated successfully!",
          "id" => $task->id,
          "type" => "success",
          "project_id" => $project->id,
        ];

        echo json_encode(["answerUpdate" => $answerUpdate]);
      }
    }
  }

  public static function delete()
  {
    // if !session start session 
    isSession();

    // if is auth continue
    isAuth();

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      // project exists??
      $project = Project::where("url", $_POST["project_id"]);

      // validation if exist project or the project was created for tha valid user
      if (!$project || $project->owner_id !== $_SESSION["id"]) {
        $alertAnswer = [
          "message" => "Oh oh... An error occurred, we can't update this task, sorry",
          "type" => "error",
        ];

        echo json_encode($alertAnswer);
        return;
      }

      $task = new Task($_POST);

      $result = $task->delete();

      $deleteResult = [
        "result" => $result,
        "message" => "Task Deleted successfully",
        "type" => "success",
      ];

      echo json_encode(["deleteResult" => $deleteResult]);
    }
  }
}