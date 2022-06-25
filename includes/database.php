<?php

function conectDB(): mysqli
{
  $db = new mysqli('localhost', 'root', '', 'ohmytask');
  // location, user, password, nameDB

  if (!$db) {
    echo "An error ocurred, we can't connect with MySQL";
    exit;
  }
  return $db;
}