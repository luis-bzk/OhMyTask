<?php

require __DIR__ . '/../vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->safeLoad();
require 'functions.php';
require 'database.php';


// conection database
use Model\ActiveRecord;

$db = conectDB();
ActiveRecord::setDB($db);