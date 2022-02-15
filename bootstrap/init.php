<?php

// Start session
session_start();

// Including constants file
require "constants.php";

// Including config file
require "config.php";

// Database connection settings
$dbname = $database_config->database;
$dbhost = $database_config->host;
$dbuser = $database_config->username;
$dbpass = $database_config->password;
try {
    $pdo = new PDO("mysql:dbname=$dbname;host=$dbhost", $dbuser, $dbpass);
    $pdo->exec("set names utf8mb4");
} catch (PDOException $e) {
    Die_page('خطا در اتصال به دیتابیس: ' . $e->getMessage());
}

// Including helper file
require BASE_PATH . "libs/helpers.php";

// Including helper file
require BASE_PATH . "vendor/autoload.php";
