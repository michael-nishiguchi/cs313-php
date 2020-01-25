<?php 
session_start();

$firstName = $_POST["firstName"];
$lastName = $_POST["lastName"];
$email = $_POST["email"];
$address1 = $_POST["address1"];
$address2 = $_POST["address2"];
$city = $_POST["city"];
$state = $_POST["state"];
$country = $_POST["country"];

$items = $_SESSION["cart"];


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
    <title>Checkout</title>
  </head>
  <body>
      <?php 
        include 'header.php';
      ?>
          <div class="jumbotron">
          <h1 class="display-2">Checkout</h1>
    </div>

    <div class="container">
    <div class="row align-items-center">
        <div class="col">
            <h1> Order Confirmation </h1>
        </div>
    </div>
    
    <div class="row align-items-center">
        <div class="col-4">
            Billing Address
            <ul class="list-group">
                <li class="list-group-item">
                <?php
                    echo $firstName . ' ' . $lastName . ' ' . $address1 . ' ' . $address2 . '<br>' . $city . ', ' . $state . ' ' . $country;
                ?>
                </li>
            </ul>
        </div>

        <div class="col-8">
            <ul class="list-group">
                <?php
                    foreach($items as $item => $itemData)
                    {
                        echo '
                        <li class="list-group-item">
                            <div class="container">
                                <div class="row">
                                    <div class="col-4"></div>
                                    <div class="col-8">' . $item . '<br>Quantity: ' . $itemData[2] . '<br>Price Per Unit: $' . $itemData[1] . '.00</div>
                                </div>
                            </div>
                        </li>';
                    }
                ?>
            </ul>
        </div>
    </div>


    <div class="row">
        <div class="col-9"></div>
        <div class="col-3">
            <a href="browse.php">
                <button type="button" class="btn btn-primary">Back to Browse</button>
            </a>
        </div>
    </div>
</div>
    </main>
  </body>
</html>