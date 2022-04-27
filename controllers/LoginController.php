<?php

namespace Controllers;

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

        if ($_SERVER["REQUEST_METHOD"] === "POST");

        // render view
        $router->render('auth/signup', [
            "title" => "Create account"
        ]);
    }

    // message account validariom
    public static function message_verification()
    {
        echo "desde message_verification";
    }

    // message account validariom
    public static function confirm_account()
    {
        echo "desde confirm_account";
    }

    // reset password account
    public static function reset_password()
    {
        echo "desde reset password";

        if ($_SERVER["REQUEST_METHOD"] === "POST");
    }


    // reset password account
    public static function recover_password()
    {
        echo "desde recover_password";

        if ($_SERVER["REQUEST_METHOD"] === "POST");
    }
}
