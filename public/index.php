<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\LoginController;
use MVC\Router;

$router = new Router();

// Login Routes
$router->get("/", [LoginController::class, "login"] );
$router->post("/", [LoginController::class, "login"] );

$router->get("/logout", [LoginController::class, "logout"] );

// Create account routes
$router->get("/signup", [ LoginController::class, "signup"]);
$router->post("/signup", [ LoginController::class, "signup"]);

// confirm account
$router->get("/message_verification", [ LoginController::class, "message_verification"]);
$router->get("/confirm_account", [ LoginController::class, "confirm_account"]);



// Reset password
$router->get("/reset_password", [ LoginController::class, "reset_password"]);
$router->post("/reset_password", [ LoginController::class, "reset_password"]);

// Set new password
$router->get("/recover_password", [ LoginController::class, "recover_password"]);
$router->post("/recover_password", [ LoginController::class, "recover_password"]);




// Checks and validates routes, if they exist, and assigns Controller functions to them
$router->checkRoutes();