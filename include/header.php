<?php
session_start();
require_once  'config.php';
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/lux/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-oOs/gFavzADqv3i5nCM+9CzXe3e5vXLXZ5LZ7PplpsWpTCufB7kqkTlC9FtZ5nJo" crossorigin="anonymous">
    <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/style/style.css"> 
    <title><?php echo SITENAME?></title>
</head>

<body>
  <?php require 'navbar.php';?>
  <div class="container">