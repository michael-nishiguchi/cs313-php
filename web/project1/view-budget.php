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
  <body>

<form action="index.php" method="post">
<?php if (isset($message)) 
{echo $message;} ?>
    <label for="categoryName">New Category Name</label>
    <input type="text" name="categoryName" id="categoryName" required>
    <input type="text" name="amountBudgeted" id="amountBudgeted" required>
    <input class="submit" type="submit" name="submit" value="Add Category">
    <!-- Action name - value pair - does not show to user-->
    <input type="hidden" name="action" value="add-cat">
</form>

</body>
</html>