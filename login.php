<?php

    // session start
    session_start();

    // include DB connection
    include('db.php');
    error_reporting(0);

    // getting the message
    $message = $_GET['message'];

    // checking if the user is logged in or not
    if(isset($_SESSION['email'])) { // if logged in

        header('Location: ./chats.php');

    }
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Care For You</title>
  </head>
  <body>
    <div class="header">
      <div class="flexRow">
        <h2 class="title">Care For You</h2>
      </div>
    </div>
    <div class="center80">
      <div class="card smallcard">
        <h2 class="login-title">Login</h2>
        <form action="scripts/loginaction.php" method = "POST">
            <div class="form-group">
              <input type="email" name="email" id = "email" placeholder="Email" class="form-control" required/>
            </div>
            <div class="form-group">
              <input type="password" name = "password" id="password" placeholder="Password" class="form-control" required/>
            </div>
            <button type = "submit" class="button">Login</button>
            <p class = "text-muted mt-2">New to Care For You? <a href="./register.php">Register Here!</a></p>
        </form>
      </div>
      <?php
        include "common/snackbar.php";
      ?>
    </div>
  </body>
</html>
