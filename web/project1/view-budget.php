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
          //echo '<td scope="cole"><i class="far fa-edit"></i><i class="far fa-trash-alt"></i></td>';

          //call modal
          ?>
          <td scope="col"><button class="btn btn-default" data-toggle="modal" data-target="#help">
  <img src="img/help.png" alt="" class="img-circle">
</button></td>

          
<div id="settings" class="modal fade" role="dialog">
  <div class="modal-dialog" >

    <div class="modal-content">
      <div class="modal-header">
        <h3 class="modal-title">Settings</h3>
      </div>
      <div class="modal-body">
        <h4> Tethering</h4>
        <label>Name:</label>
        <input type="text" id="wlanName" size="15">
        <label>Passphrase:</label>
        <input type="text" id="passPhrase" size="15">
        <br>
        <br>
        <button type="button" class="btn btn-success" onclick="enableTethering()">Enable tethering</button>
        <button type="button" class="btn btn-danger" onclick="disableTethering()">Disable tethering</button>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
  <div id="help" class="modal fade" role="dialog">
    <div class="modal-dialog" >

      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Help</h3>
        </div>
        <div class="modal-body">
          *CONTENT TO BE MADE*
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
        </div>
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




<table class="table">
  <thead>
    <tr>
      <th scope="col">Category</th>
      <th scope="col">Transaction Date</th>
      <th scope="col">Cost</th>
      <th scope="col">Business Name</th>
    </tr>
  </thead>
  <tbody>
    <?php 
    /*
      while ($row = $transactions->fetch(PDO::FETCH_ASSOC)) {
        echo '<tr>';
        $catName = getCatFromId($row['category_id']);
        $catName = $catName->fetch(PDO::FETCH_ASSOC);
        echo '<th scope="col">' . $catName['category_name'] . '</th>'; 
        echo '<th scope="col">' . $row['transaction_date'] . '</th>';
        echo '<th scope="col">' . $row['cost'] . '</th>'; 
        echo '<th scope="col">' . $row['business_name'] . '</th>'; 
        echo '</tr>';
      }
      */
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

</body>
</html>