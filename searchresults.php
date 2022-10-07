<?php

    // session start
    session_start();

    // include DB connection
    include('./db.php');

    if(!isset($_SESSION['email'])) { // if user not logged in!

        header('Location: ./index.php');

    } else {

        $email = $_SESSION['email'];

    }
    $search = $_SESSION['search'];
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
      <div class="card">
        <h2 class="login-title">Search Results</h2>
        <form action="searchusers.php" method = "POST">
          <div class="form-group">
            <input class="form-control" type="search" name = "search" placeholder="Search" aria-label="Search">
            <button class="button" type="submit">Search</button>
          </div>
        </form>
      </div>
      <div class="card">
        <?php
            $searchUser = "SELECT * FROM users WHERE name = '$search' OR email = '$search'";
            $searchUserStatus = mysqli_query($conn,$searchUser) or die(mysqli_error($conn));
            if(mysqli_num_rows($searchUserStatus) > 0) {
                while($searchUserRow = mysqli_fetch_assoc($searchUserStatus)){
                    $email = $searchUserRow['email'];
          ?>
          <div class="card">
            <div class="card-body">
                <h4><img src = "./dp/<?=$searchUserRow['dp']?>" alt=" " width="50" height="50"/><div class="sized-width-box"></div><?=$searchUserRow['name']?><a href="./message.php?receiver=<?=$email?>" class="btn btn-outline-primary" style = "float:right">Send message</a></h4>
            </div>
          </div>
          <?php
                }
            } else {
                echo "No users found!";
            }
          ?>
      </div>
      <?php
        include "common/snackbar.php";
      ?>
    </div>
  </body>
</html>