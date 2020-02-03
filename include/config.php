<?php

require_once __DIR__.'../../vendor/autoload.php';
$dotenv = Dotenv\Dotenv::createImmutable(__DIR__ . '/../');
$dotenv->load();
$port = getenv('DB_PORT');
$host = getenv('DB_HOST');
$user = getenv('DB_USERNAME');
$pass = getenv('DB_PASSWORD');
$dbname = getenv('DB_DATABASE');
define('DB_HOST', $host);
define('DB_USER', $user);
define('DB_PASS', $pass);
define('DB_NAME', $dbname);
define('DB_PORT', $port);

/*
// DB Params
define('DB_HOST', 'localhost');
define('DB_USER', 'root');
define('DB_PASS', '');
define('DB_NAME', 'bank');
define('DB_PORT',3308);
 */
// URL Root
define('URLROOT', 'http://localhost/WEBB_BANK');
// Site Name
define('SITENAME', 'WEBB_BANK');
