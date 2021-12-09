<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);
require_once 'includes/DatabaseConnection.inc.php';
require_once 'includes/functions.php';
require_once 'core/init.php';
$page =  $_GET['page'] ?? 1;
$offset = ($page-1)*10;
?>
<!DOCTYPE html>
<html>
<head>
  <meta charset='utf-8'>
  <meta name='viewport' content='width=device-width, initial-scale=1'>
  <link rel='stylesheet' href='style.css'>
  <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
  <script src="script.js"></script>  
  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Lobster&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">
  <title>Guest CheckIN</title>
</head>
<body>
  <header>
    <a href='index.php'>
      <img src="checkin.png" width="40px" height="40px" alt=""> 
      Guest CheckIn
    </a>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <ul class="navbar-nav mr-auto ">

        <li class="nav-item ">
          <a class="nav-link" href='index.php'>CheckIn</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href='checkedin.php'>CheckedIn</a>
        </li>
        <li class="nav-item ">
          <a class="nav-link" href='addguest.php'>Add Guest</a>
        </li>
        <li class="nav-item active">
         <?php  if(!is_logged_in()) :?>
          <a class="nav-link" href="login.php">Login <span class="sr-only">(current)</span></a>
        </li>
      <?php else : ?>
        <a class="nav-link" href="logout.php">Logout <span class="sr-only">(current)</span></a>
      <?php endif; ?>
     
    </ul>
  </nav>
</header>

<div class='content' >



