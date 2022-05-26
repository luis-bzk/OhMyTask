<?php

namespace Model;

class Project extends ActiveRecord
{
  // variables
  protected static $table = "projects";
  protected static $columnsDB = ["id", "name", "url", "ownerId"];

  // construct
  public function __construct($args = [])
  {
    $this->id = $args["id"] ?? null;
    $this->name = $args["name"] ?? '';
    $this->url = $args["url"] ?? '';
    $this->ownerId = $args["ownerId"] ?? null;
  }

  // validation
  public function projectValidation()
  {
    if (!$this->name) {
      self::$alerts["error"][] = "You need to set a name project";
    }
    if (strlen($this->name) > 60) {
      self::$alerts["error"][] = "The name project is to long";
    }

    return self::$alerts;
  }

  public function createUrl()
  {
    $this->url = md5(uniqid());
  }
}