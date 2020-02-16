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
  <title>View Budget</title>
</head>
<body class="text-center">

    <form class="form-signin">
        <label for="inputEmail" class="form-control" placeholder="Email Address"></label>
        <input type="email" id="inputEmail">
    </form>

</body>
</html>