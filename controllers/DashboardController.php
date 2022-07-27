<?php

namespace Controllers;

use Model\Project;
use Model\User;
use MVC\Router;

class DashboardController
{

  // all projects view
  public static function index(Router $router)
  {
    $title = "My Projects";

    // if !session start session
    isSession();

    // if is auth continue
    isAuth();

    // projects
    $userId = $_SESSION["id"];
    $projects = Project::belongsTo("owner_id", $userId);

    // show view
    $router->render("dashboard/index", [
      "title" => $title,
      "projects" => $projects
    ]);
  }

  // create a project
  public static function createProject(Router $router)
  {
    // variables
    $alerts = [];
    $title = "Create Projects";

    // if !session start session
    isSession();
    // if is auth continue
    isAuth();

    // post method
    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      // variables
      $project = new Project($_POST);

      // validatcion
      $alerts = $project->projectValidation();

      if (empty($alerts)) {
        // url generation
        $project->createUrl();

        // save project with owner id
        $project->owner_id = $_SESSION['id'];

        // save the project
        $project->save();

        // redirection
        header('Location: /project?id=' . $project->url);
      }
    }

    // show view
    $router->render("dashboard/createProject", [
      "title" => $title,
      "alerts" => $alerts
    ]);
  }

  //
  public static function project(Router $router)
  {
    // if !session start session
    isSession();
    // if is auth continue
    isAuth();

    // yrl id project validation
    $urlId = $_GET["id"];

    if (!$urlId) {
      header('Location: /dashboard');
    }

    // project url security -> owner
    $project = Project::where("url", $urlId);

    // project irl validation
    if (!$project) {
      header('Location: /dashboard');
    }

    // owner project validation
    if ($project->owner_id !== $_SESSION["id"]) {
      header('Location: /dashboard');
    }

    // project name
    $title = $project->name;

    $router->render("dashboard/project", [
      "title" => $title
    ]);
  }

  // show user profile
  public static function profile(Router $router)
  {
    // variables
    $title = "My Profile";

    // if !session start session
    isSession();

    // if is auth continue
    isAuth();

    $alerts = [];

    $user = User::find($_SESSION['id']);

    if($_SERVER['REQUEST_METHOD'] === "POST"){
      $user->synchronize($_POST);

      $alerts = $user->profile_validation();

      
      if(empty($alerts)){
        $userExists = User::where("email", $user->email);
  
        if ($userExists && $userExists->id !== $user->id) {
          User::setAlert("error", "This user is registered");
          $alerts = $user->getAlerts();
          
        }else{
          $user->save();
          
          User::setAlert("success", "Your data was updated successfully");
          $alerts = $user->getAlerts();
          
          $_SESSION["name"] = $user->name;
        }
      }
    }



    // show view
    $router->render("dashboard/profile", [
      "title" => $title,
      "user" => $user,
      "alerts" => $alerts
    ]);
  }

  // error 404
  public static function error404(Router $router)
  {
    $title = "Error 404!";

    // show view
    $router->render("error/error404", [
      "title" => $title
    ]);
  }
}