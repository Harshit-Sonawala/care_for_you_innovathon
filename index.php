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
        <div>
          <a href="about.php">Your Chats</a>
          <a href="login.php">Login</a>
        </div>
      </div>
    </div>
    <div class="carousel">
      <img class="carousel_image" src="assets\images\stock_image1.jpg" alt="">
      <img class="carousel_image" src="assets\images\stock_image2.jpg" alt="">
      <img class="carousel_image" src="assets\images\stock_image3.jpg" alt="">
      <img class="carousel_image" src="assets\images\stock_image4.jpg" alt="">
      <img class="carousel_image" src="assets\images\stock_image5.jpg" alt="">
    </div>
    <div class="center80">
      <div class="card">
        <h2>Life got you down? Don't worry, you can always get back up.</h2>
        <p>Its okay. We've all been there.</p>
      </div>
      <div class="card">
        <h2>Find experts to guide you through this state of mind.</h2>
        <p>Find people to share your problems with.</p>
      </div>
      <div class="card">
        <h2>Easily connect with the help you need.</h2>
        <p>Join now to find the correct guidance.</p>
      </div>
      <?php
        include "common/snackbar.php";
      ?>
    </div>
  </body>
</html>
