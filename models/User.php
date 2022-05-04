<?php

namespace Model;

class User extends ActiveRecord
{
  protected static $table = "users";
  protected static $columnsDB = ["id", "name", "email", "password", "token", "confirmed"];

  public function __construct($args = [])
  {
    $this->id = $args["id"] ?? null;
    $this->name = $args["name"] ?? '';
    $this->email = $args["email"] ?? '';
    $this->password = $args["password"] ?? '';
    $this->password2 = $args["password2"] ?? '';
    $this->token = $args["token"] ?? '';
    $this->confirmed = $args["confirmed"] ?? 0;
  }

  public function accountValidation()
  {
    if ($this->name === '') {
      self::$alerts["error"][] = "A user name is required";
    }
    if ($this->email === '') {
      self::$alerts["error"][] = "A user email is required";
    }
    if ($this->password === '') {
      self::$alerts["error"][] = "A user password is required";
    }
    if (strlen($this->password) < 6) {
      self::$alerts["error"][] = "The password must be greater than 6 characters";
    }
    if ($this->password !== $this->password2) {
      self::$alerts["error"][] = "The passwords are different";
    }

    return self::$alerts;
  }

  // password hash
  public function hashPassword()
  {
    $this->password = password_hash($this->password, PASSWORD_BCRYPT);
  }

  // generate token
  public function createToken()
  {
    $this->token = uniqid();
  }
}