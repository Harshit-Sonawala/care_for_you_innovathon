<!DOCTYPE html>
<html>
  <head>
    <link rel="stylesheet" type="text/css" href="style.css">
    <title>Care For You</title>
  </head>
  <body>
    <div class="header">
      <div class="flexRow">
        <a href="index.php" class="title_a"><h2 class="title">Care For You</h2></a>
        <div>
          <a href="about.php">Your Chats</a>
          <a href="login.php">Login</a>
        </div>
      </div>
    </div>
    <div class="carousel">
      <div class="carousel_card" id="carousel_1">
        <h2 class="carousel_h2">Life got you down? Don't worry, you can always get back up.</h2>
        <p class="carousel_p">Its okay. We've all been there.</p>
      </div>
      <div class="carousel_card" id="carousel_2">
        <h2 class="carousel_h2">Find experts to guide you through this state of mind.</h2>
        <p class="carousel_p">Find people to share your problems with.</p>
      </div>
      <div class="carousel_card" id="carousel_3">
        <h2 class="carousel_h2">Easily connect with the help you need.</h2>
        <p class="carousel_p">Join now to find the correct guidance.</p>
      </div>
      <div class="carousel_card" id="carousel_4">
        <h2 class="carousel_h2">It's never too late to start again.</h2>
        <p class="carousel_p">Never give up. Never back down.</p>
      </div>
      <div class="carousel_card" id="carousel_5">
        <h2 class="carousel_h2">Everybody deserves the utmost mental well-being.</h2>
        <p class="carousel_p">Learn to value the importance of mental health.</p>
      </div>
    </div>
    <div class="center80">
      <div class="card">
        <h2>Learn about the strategies and treatments to fight depression.</h2>
        <div class="sized-box"></div>
        <a href="blog_depression.php">Click here to learn more</a>
      </div>
      <div class="card">
        <h2>Find out about anxiety, its symptoms, treatments and remedies.</h2>
        <div class="sized-box"></div>
        <a href="blog_anxiety.php">Click here to learn more</a>
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
