<?php

namespace Controllers;

use Model\Project;
use MVC\Router;

class DashboardController
{

  // all projects view
  public static function index(Router $router)
  {
    // if !session start session 
    isSession();

    // if is auth continue
    isAuth();

    // show view
    $router->render("dashboard/index", [
      'title' => "Projects"
    ]);
  }

  // create a project
  public static function createProject(Router $router)
  {
    // variables
    $alerts = [];

    // if !session start session 
    isSession();
    // if is auth continue
    isAuth();

    if ($_SERVER['REQUEST_METHOD'] === "POST") {
      // variables
      $project = new Project($_POST);

      // validatcion
      $alerts = $project->projectValidation();

      if (empty($alerts)) {
        // url generation
        $project->createUrl();

        // save project with owner id
        $project->ownerId = $_SESSION['id'];

        // save the project
        $project->save();

        // redirection
        header('Location: /project?id=' . $project->url);
      }
    }

    // show view
    $router->render("dashboard/createProject", [
      'title' => "Create Projects",
      'alerts' => $alerts
    ]);
  }

  // show user profile
  public static function profile(Router $router)
  {
    // if !session start session 
    isSession();

    // if is auth continue
    isAuth();

    // show view
    $router->render("dashboard/profile", [
      'title' => "Profile"
    ]);
  }
}
