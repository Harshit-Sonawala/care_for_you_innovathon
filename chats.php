<?php

    // session start
    session_start();

    // include DB connection
    include('./db.php');

    if(isset($_SESSION['email'])) { // if user not logged in!

        $email = $_SESSION['email'];

    } else {

      header('Location: ./index.php?message=Please login first!');

    }
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
      <a href="index.php" class="title_a"><h2 class="title">Care For You</h2></a>
        <div>
          <?php
            if(isset($_SESSION['email'])) {
              // <a href="logoutaction.php">Logout</a>
          ?>
            <a href="logoutaction.php">Logout</a>
          <?php
            } else {
          ?>
            <a href="login.php">Login</a>
          <?php
            }
          ?>
        </div>
      </div>
    </div>
    <div class="center80">
      <div class="card">
        <h2 class="login-title">Your Chats</h2>
        <form action="searchusers.php" method = "POST">
          <div class="form-group">
            <input class="form-control" type="search" name = "search" placeholder="Search" aria-label="Search">
            <button class="button" type="submit">Search</button>
          </div>
        </form>
      </div>
      <div class="card">
        <?php
            $lastMessage = "SELECT DISTINCT sent_by FROM messages WHERE received_by = '$email'";
            $lastMessageStatus = mysqli_query($conn,$lastMessage) or die(mysqli_error($conn));
            if(mysqli_num_rows($lastMessageStatus) > 0) {
              while($lastMessageRow = mysqli_fetch_assoc($lastMessageStatus)) {
                $sent_by = $lastMessageRow['sent_by'];
                $getSender = "SELECT * FROM users WHERE email = '$sent_by'";
                $getSenderStatus = mysqli_query($conn,$getSender) or die(mysqli_error($conn));
                $getSenderRow = mysqli_fetch_assoc($getSenderStatus);
          ?>
          <div class="card">
            <div class="card-body">
              <h2><img src = "./dp/<?=$getSenderRow['dp']?>" alt = "dp" width = "40"/> <?=$lastMessageRow['sent_by'];?><a href="./message.php?receiver=<?=$sent_by?>" class="btn btn-outline-primary" style = "float:right">Send message</a></h2>
            </div>
          </div><br/>
          <?php
            }
          } else {
          ?>
            <div class="card-body text-center">
              <h2>No conversations yet!</h2>
            </div>
          <?php
          }
          ?>
      </div>
      <?php
        include "common/snackbar.php";
      ?>
    </div>
  </body>
</html>
