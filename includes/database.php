<?php

function conectDB(): mysqli
{
  $db = new mysqli($_ENV['DB_HOST'], $_ENV['DB_USER'], $_ENV['DB_PASS'], $_ENV['DB_NAME']);
  // location, user, password, nameDB

  if (!$db) {
    echo "An error ocurred, we can't connect with MySQL";
    exit;
  }
  return $db;
}