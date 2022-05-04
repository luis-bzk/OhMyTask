<?php

namespace Controllers;

use Model\User;
use MVC\Router;

class LoginController
{

  //login with an account
  public static function login(Router $router)
  {

    if ($_SERVER["REQUEST_METHOD"] === "POST");

    // render view
    $router->render('auth/login', [
      "title" => "Login"
    ]);
  }

  // logout on account
  public static function logout()
  {
    echo "desde logout";
  }

  // create account
  public static function signup(Router $router)
  {
    $user = new User;
    $alerts = [];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $user->synchronize($_POST);

      $alerts = $user->accountValidation();
    }

    // render view
    $router->render('auth/signup', [
      "title" => "Create account",
      "user" => $user,
      "alerts" => $alerts
    ]);
  }

  // message account validariom
  public static function message_verification(Router $router)
  {
    $router->render('auth/messageVer', [
      "title" => "Message Verification"
    ]);
  }

  // message account validariom
  public static function confirm_account(Router $router)
  {
    $router->render('auth/confirmAccount', [
      "title" => "Account confirmed"
    ]);
  }

  // reset password account
  public static function reset_password(Router $router)
  {

    if ($_SERVER["REQUEST_METHOD"] === "POST");

    $router->render('auth/resetPassword', [
      "title" => "Reset your password"
    ]);
  }


  // reset password account
  public static function recover_password(Router $router)
  {

    if ($_SERVER["REQUEST_METHOD"] === "POST");

    $router->render('auth/recoverPassword', [
      "title" => "Recover your password"
    ]);
  }
}