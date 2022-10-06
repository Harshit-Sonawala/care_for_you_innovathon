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
          $getReceiver = "SELECT * FROM users WHERE email = '$receiver'";
          $getReceiverStatus = mysqli_query($conn,$getReceiver) or die(mysqli_error($conn));
          $getReceiverRow = mysqli_fetch_assoc($getReceiverStatus);
          $received_by = $getReceiverRow['email'];
        ?>
        <div class="card2">
          <h4><img src="./dp/<?=$getReceiverRow['dp']?>" alt="dp" width="50px" height="50px"/></div><?=$receiver?></h4>
        </div>
        <div class="card2">
        <?php
          $getMessage = "SELECT * FROM messages WHERE sent_by = '$receiver' AND received_by = '$email' OR sent_by = '$email' AND received_by = '$receiver' ORDER BY createdAt asc";
          $getMessageStatus = mysqli_query($conn,$getMessage) or die(mysqli_error($conn));
          if(mysqli_num_rows($getMessageStatus) > 0) {
              while($getMessageRow = mysqli_fetch_assoc($getMessageStatus)) {
                  $message_id = $getMessageRow['id'];
        ?>
        <div class="card3">
          <h5 style = "color: #19aff0"><?=$getMessageRow['sent_by']?></h5>
          <div class="sized-box" style="height: 5px"></div>
              <div class="message-box ml-4">
                  <p class="text-center"><?=$getMessageRow['message']?></p>
              </div>
        </div>
        <?php
              }
            } else {
        ?>
        <div class="card3">
                <p class = "text-muted">No messages yet! Say 'Hi'</p>
        </div>
        <?php
            }
        ?>
        </div>
        <div class="card2">
        <div class="card-footer text-center">
            <form action="send.php" method = "POST" style = "display: inline-block">
            <input type="hidden" name = "sent_by" value = "<?=$email?>"/>
            <input type="hidden" name = "received_by" value = "<?=$receiver?>"/>
                    <div class="row">
                        <div class="flexRow">
                            <input type="text" name = "message" id = "message" class="form-control" placeholder = "Type your message here" required/>
                            <div class="sized-width-box"></div>
                            <button type="submit" class="btn btn-primary" style="width: 100px">Send</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
      </div>
      <?php
        include "common/snackbar.php";
      ?>
    </div>
  </body>
</html>