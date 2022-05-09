<?php

namespace Controllers;

use Classes\Email;
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

      if (empty($alerts)) {
        $userExists = User::where("email", $user->email);

        if ($userExists) {
          User::setAlert("error", "This user is registered");
          $alerts = User::getAlerts();
        } else {

          // hash password
          $user->hashPassword();

          // delete password2
          unset($user->password2);

          // token generation
          $user->createToken();

          // save new user 
          $result = $user->save();

          //create new email
          $email = new Email($user->email, $user->name, $user->token);

          // send email verification
          $email->sendInfo();


          if ($result) {
            header("Location: /message_verification");
          }
        }
      }
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
    $alerts = [];
    $token = sanitize($_GET['token']);

    if (!$token) {
      header('Location: /');
    }

    $user = User::where("token", $token);

    if (empty($user)) {
      // not token
      User::setAlert("error", "Invalid token");
    } else {
      // confirm account
      User::setAlert("succes", "Your account was confirmed!");
      $user->confirmed = 1;
      $user->token = '';
      unset($user->password2);

      // save
      $user->save();
    }

    $alerts = User::getAlerts();

    $router->render('auth/confirmAccount', [
      "title" => "Account confirmed",
      "alerts" => $alerts
    ]);
  }

  // reset password account
  public static function reset_password(Router $router)
  {
    $alerts = [];

    if ($_SERVER["REQUEST_METHOD"] === "POST") {
      $user = new User($_POST);
      $alerts = $user->emailValidation();

      if (empty($alerts)) {
        $userFound = $user->where('email', $user->email);

        if ($userFound && $userFound->confirmed === "1") {
          // user found

          // new token
          $userFound->createToken();
          unset($userFound->password2);

          // update user
          $userFound->save();

          //send email
          $email = new Email($userFound->email, $userFound->name, $userFound->token);

          $email->sendInstructions();

          // print alert
          User::setAlert("succes", "We have sent instructions to your email");
        } else {
          User::setAlert("error", "Invalid email or user not confirmed");
        }
      }
    }
    $alerts = User::getAlerts();

    $router->render('auth/resetPassword', [
      "title" => "Reset your password",
      "alerts" => $alerts
    ]);
  }


  // reset password account
  public static function recover_password(Router $router)
  {
    $alerts = [];
    $token = sanitize($_GET["token"]);

    $showInputs = true;

    if (!$token) {
      header('Location: /');
    }

    // user found
    $user = User::where("token", $token);

    if (empty($user)) {
      // not token
      $showInputs = false;
      User::setAlert("error", "Invalid token");
    }

    if ($_SERVER["REQUEST_METHOD"] === "POST") {

      $user->synchronize($_POST);
      // debug($user);

      $alerts = $user->passwordValidation();

      if (empty($alerts)) {


        // hash password
        $user->hashPassword();

        // delete password2
        unset($user->password2);

        // delete token
        $user->token = "";

        // save new user 
        $result = $user->save();

        if ($result) {
          header("Location: /");
        }
      }
    }


    $alerts = User::getAlerts();
    $router->render('auth/recoverPassword', [
      "title" => "Recover your password",
      "alerts" => $alerts,
      "showInputs" => $showInputs
    ]);
  }
}