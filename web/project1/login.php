<?php
require_once 'queries.php';
$users = getAllUsers();
$categories = getAllCategories();
$transactions = getAllTransactions();
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="main.js"></script>
  <title>Login</title>
</head>
<body class="text-center">

<form class="form-signin" action="index.php" method="post">
    <?php
        if(isset($message)){
            echo $message;
        }
    ?>

    <h1 class="h3 mb-3 font-weight-normal">Please sign in</h1>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" name="inputEmail" placeholder="Email address">

    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" name="inputPassword" placeholder="Password">

    <button class="btn btn-lg btn-primary btn-block" type="submit">Sign in</button>
    <input type="hidden" name="action" value="welcome">
</form>

<form class="form-signin" action="index.php" method="post">
    <p class="center">or</p>
    <label for="inputEmail" class="sr-only">Email address</label>
    <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required="" autofocus="" data-kwimpalastatus="alive" data-kwimpalaid="1581817532009-4">
    <label for="inputPassword" class="sr-only">Password</label>
    <input type="password" id="inputPassword" class="form-control" placeholder="Password" required="" data-kwimpalastatus="alive" data-kwimpalaid="1581817532009-3">

    <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
    <input type="hidden" name="action" value="register">
</form>

</body>
</html>