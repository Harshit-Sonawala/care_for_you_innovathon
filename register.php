<?php

    // session start
    session_start();

    // include DB connection
    include('./db.php');
    error_reporting(0);

    // getting the message
    $message = $_GET['message'];

    // checking if the user is logged in or not
    // if(isset($_SESSION['email'])) { // if logged in

    //     header('Location: ./chats.php');

    // }
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="common/snackbar.css">
    <script src="assets/js/snackbar.js"></script>
    <title>Care For You</title>
  </head>
  <body onLoad="snackbarFunction()">
    <div class="header">
      <div class="flexRow">
        <h2 class="title">Care For You</h2>
      </div>
    </div>
    <div class="center80">
      <div class="card smallcard">
        <h2 class="login-title">Register</h2>
        <form action="registeraction.php" method = "POST">
          <div class="form-group">
            <input type="text" name="name" id="name" placeholder="Full Name" class="form-control" required/>
          </div>
          <div class="form-group">
            <input type="email" name="email" id="email" placeholder="Email" class="form-control" required/>
          </div>
          <div class="form-group">
            <input type="password" name="password" id="password" placeholder="Password" class="form-control" required/>
          </div>
          <div class="form-group">
            <input type="password" name = "cpassword" id = "cpassword" placeholder = "Confirm Password" class="form-control" required/>
          </div>
          <div class="form-group">
            <label for="exampleFormControlFile1">Upload a profile picture</label>
            <input type="file" class="form-control-file" id="dp" name="dp" required/>
          </div>
          <button type="submit" class="button">Register</button>
          <p>Have an account? <a href="./login.php">Login Here!</a></p>
        </form>
      </div>
      <?php
        include "common/snackbar.php";
      ?>
    </div>
  </body>
</html>
