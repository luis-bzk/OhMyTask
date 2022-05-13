<?php

require_once __DIR__ . '/../includes/app.php';

use Controllers\DashboardController;
use Controllers\LoginController;
use MVC\Router;

$router = new Router();

// Login Routes
$router->get("/", [LoginController::class, "login"]);
$router->post("/", [LoginController::class, "login"]);

$router->get("/logout", [LoginController::class, "logout"]);

// Create account routes
$router->get("/signup", [LoginController::class, "signup"]);
$router->post("/signup", [LoginController::class, "signup"]);

// Reset password
$router->get("/reset_password", [LoginController::class, "reset_password"]);
$router->post("/reset_password", [LoginController::class, "reset_password"]);

// Set new password
$router->get("/recover_password", [LoginController::class, "recover_password"]);
$router->post("/recover_password", [LoginController::class, "recover_password"]);

// confirm account
$router->get("/message_verification", [LoginController::class, "message_verification"]);
$router->get("/confirm_account", [LoginController::class, "confirm_account"]);


// PROJECT ZONE USER
$router->get("/dashboard", [DashboardController::class, "index"]);

$router->get("/create-project", [DashboardController::class, "createProject"]);
$router->post("/create-project", [DashboardController::class, "createProject"]);

$router->get("/profile", [DashboardController::class, "profile"]);


// Checks and validates routes, if they exist, and assigns Controller functions to them
$router->checkRoutes();