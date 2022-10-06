<?php

    // session start
    session_start();

    // include DB connection
    include('./db.php');

    error_reporting(0);
    if(!isset($_SESSION['email'])) { // if user not logged in!

        header('Location: ./index.php');

    } else {

        $email = $_SESSION['email'];

    }
    $receiver = $_GET['receiver'];
?>
<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" type="text/css" href="common/snackbar.css">
    <script src="assets/js/snackbar.js"></script>
    <title>Care For You</title>
  </head>
  <body>
    <div class="header">
      <div class="flexRow">
        <h2 class="title">Care For You</h2>
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
              <h6><strong><img src = "./dp/<?=$getSenderRow['dp']?>" alt = "dp" width = "40"/> <?=$lastMessageRow['sent_by'];?></strong><a href="./message.php?receiver=<?=$sent_by?>" class="btn btn-outline-primary" style = "float:right">Send message</a></h6>
            </div>
          </div><br/>
          <?php
            }
          } else {
          ?>
            <div class="card-body text-center">
              <h6><strong>No conversations yet!</strong></h6>
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