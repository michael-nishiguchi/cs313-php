<?php

require_once 'queries.php';
  if ($_SESSION['loggedin'] == TRUE) {
    $transactions = getTransactionsFromId($_SESSION['user_id']);
    $categories = getCategoriesFromId($_SESSION['user_id']);
  } 
  else {
    include 'login.php';
    exit;
  }
  
?>

<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <link rel="stylesheet" href="main.css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.12.1/css/all.css" integrity="sha384-v8BU367qNbs/aIZIxuivaU55N5GPF89WBerHoGA4QTcbUjYiLQtKdrfXnqAcXyTv" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
  <script src="main.js"></script>
  <title>View Budget</title>
</head>
<body>
<?php
        if(isset($message)){
            echo $message;
        }
    ?>
  <table class="table">
    <thead>
      <tr>
        <th scope="col">Category</th>
        <th scope="col">Actions</th>
        <th scope="col">Amount Budgeted</th>
        <th scope="col">Amount Remaining</th>
      </tr>
    </thead>
    <tbody>
      <?php 


        while ($row = $categories->fetch(PDO::FETCH_ASSOC)) {
          echo '<tr>';
          echo '<td scope="col">' . ucfirst($row['category_name']) . '</td>';
          $_SESSION['category_id'] = $row['category_id'];
          $_SESSION['category_name'] = $row['category_name'];
          ?>
          <!--modal call -->
          <td scope="col">
            <div class="btn-group" role="group">
              <button type="button" class="btn btn-primary" data-toggle="modal" data-target=".viewModal">View</button>
              <button type="button" class="btn btn-danger" data-toggle="modal" data-target=".deleteModal">Delete</button>
            </div>
          </td>

          <div class=" modal deleteModal" tabindex="-1" role="dialog">
            <div class="modal-dialog" role="document">
              <div class="modal-content">
                <form action="index.php" method="post">
                  <div class="modal-header">
                    <h5 class="modal-title">Delete Category</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                      <span aria-hidden="true">&times;</span>
                    </button>
                  </div>
                  <div class="modal-body">
                    <p>Would you like to delete this category?</p>
                  </div>
                  <div class="modal-footer">
                    <button class="btn btn-danger" type="submit">Delete</button>
                    <input type="hidden" name="action" value="delete-cat">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          <!--
          <div class="modal fade viewModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                View modal
              </div>
            </div>
          </div>
          -->
          <div class="modal fade deleteModal" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
              <div class="modal-content">
                Delete modal
              </div>
            </div>
          </div>
<?php

          echo '<td scope="col">' . $row['amount_budgeted'] . '</td>';
          //get total 
          $catTotal =  getCatTotal($row['category_id']);
          $amountRemaining = $row['amount_budgeted'] - $catTotal;
          echo '<td scope="col">' . $amountRemaining . '</td>'; 
          echo '</tr>';       
        }
        
        
        ?>
    </tbody>
  </table>






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
<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>