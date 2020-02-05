<?php
session_start();
require_once  'config.php';
?>

<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <link href="https://stackpath.bootstrapcdn.com/bootswatch/4.4.1/litera/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-pLgJ8jZ4aoPja/9zBSujjzs7QbkTKvKw1+zfKuumQF9U+TH3xv09UUsRI52fS+A6" crossorigin="anonymous">
  <link rel="stylesheet" href="<?php echo URLROOT; ?>/public/style/style.css">
  <title><?php echo SITENAME?></title>
</head>

<body>
  <?php require 'navbar.php';?>
  <div class="container">