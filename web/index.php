<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="main.js"></script>
    <title>Home Page</title>
  </head>
  <main>
    <body>
      <?php 
        include('/common/header.php');
      ?>
      <nav class="navbar navbar-expanded-md navbar-dark fixed-top bg-dark">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="myNav">
            <span class="navbar-toggler-icon"></span>
    </button>
    <div class="navbar-collapse collapse show" id="myNav" style>
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="index.php">Home</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="assignments.php">Assignments</a>
            </li>
        </ul>
</nav>
        <div class="jumbotron">
          <h1 class="display-2">Michael Nishiguchi</h1>
          <p>Welcome to my website! You can see all the work I've done for CS 313 at BYU - Idaho!</p>
    </div>

      <div class="container">
        <div class="row">
          <div class="col-md-4">
            <h2>Rock Climbing</h2>
            <p>Living in Utah is great becuase I love rock cimbing. There are so many different mountains to climb and in the winter, there are some of the greatest climbing gyms to train in.</p>
          </div>
          <div class="col-md-4">
          <h2>Music</h2>
            <p>I've played music since I was young and have played with many different groups that range from jazz, funk, blues, pop</p>
          </div>
          <div class="col-md-4">
          <h2>School</h2>
            <p>I'm working on a Bachelor's degree in Web Design and Development at Brigham Young University - Idaho. I love recreating the things on the internet that I use every day. So far, I've worked with HTML, CSS, PHP, JavaScript, C++ and Java.</p>
          </div>
        </div>
      </div>
    
    </main>
  </body>
</html>