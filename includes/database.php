<?php

function conectDB(): mysqli{
    $db = new mysqli('localhost', 'root', '0105392435', 'uptask');
    // location, user, password, nameDB

    if (!$db) {
        echo "An error ocurred, we can't connect with MySQL";
        exit;
    }
    return $db;
}