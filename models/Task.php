<?php

namespace Model;

class Task extends ActiveRecord
{
  // variables
  protected static $table = "tasks";
  protected static $columnsDB = ["id", "name", "state", "project_id"];

  // construct
  public function __construct($args = [])
  {
    $this->id = $args["id"] ?? null;
    $this->name = $args["name"] ?? "";
    $this->state = $args["state"] ?? 0;
    $this->project_id = $args["project_id"] ?? "";
  }

  // ??
}