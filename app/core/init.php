<?php
session_start();
require('app/core/App.php');
require('app/core/Controller.php');
require('app/core/autoload.php');
//future inclusion for Model
//future inclusion for Model

var_dump($_SESSION);
?>

<html>
  <head>
    <link rel="stylesheet" href="../resources/style.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="../resources/style.css">
  </head>

  <nav>
    <ul>
      <li><a href="../Profile/index">See My Profile</a></li>
      <li><a href="../User/logout">Logout</a></li>
      <li><a href="../User/register">Sign Up</a></li>
      <li><a href="../Publication/aaa">Share Your Thoughts</a></li>
      <li><a href="../Publication/index">See Publications</a></li>
    </ul>
  </nav>
</html>