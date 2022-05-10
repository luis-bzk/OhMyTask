<?php

namespace Controllers;

use MVC\Router;

class DashboardController
{
  public static function index(Router $router)
  {

    // show view
    $router->render("dashboard/index", []);
  }
}