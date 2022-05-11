<?php

namespace Controllers;

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
  public static function createProjects(Router $router)
  {
    // variables
    $alerts = [];

    // if !session start session 
    isSession();
    // if is auth continue
    isAuth();

    // show view
    $router->render("dashboard/createProjects", [
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