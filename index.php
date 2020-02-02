<?php
require 'include/header.php';
require_once 'vendor/autoload.php';
include 'config/User.php';

/* $dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$port = getenv('DB_PORT');
$port = $_ENV['DB_PORT'];
$port = $_SERVER['DB_PORT'];

var_dump($port); */

$user = new User();

?>



<?php require 'include/footer.php';?>
