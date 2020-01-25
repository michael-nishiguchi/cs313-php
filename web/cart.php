<?php 

session_start();

if (isset($_POST["item"]) && isset($_POST["quantity"])) {
    $updateItemQuantity = $_POST["item"];
    $itemQuantity = $_POST["quantity"];

    $_SESSION["cart"][$updateItemQuantity][2] = $itemQuantity;
}

$items = $_SESSION["cart"];

if (isset($_POST["cart"])) {
    $deleteCartItem = $_POST["cart"];
    
    if(!isset($_SESSION["cart"]))
    {
        $_SESSION["cart"] = array();
    }
    else
    {
        unset($_SESSION["cart"][$deleteCartItem]);
        header("Refresh:0");
    }
}


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
    <title>Shopping Cart</title>
  </head>
  <body>
      <?php 
        include 'header.php';
      ?>
          <div class="jumbotron">
          <h1 class="display-2">Shopping cart</h1>
    </div>

    <div class="container">

    <?php
        $sum = 0;

        foreach($items as $item => $data)
        {
              echo '
              <div class="row align-items-center cart-item">
                <div class="col">' . $item . '</div>
                <div class="col">Quantity: 
                  <form class="form-inline" action="cart.php" method="post">
                    <div class="form-group">
                      <input type="hidden" name="item" id="' . $item . '" value="' . $item . '" placeholder="">
                      <input type="text" name="quantity" min="1" class="form-control ml-1" value="' . $data[2] . '" placeholder="' . $data[2] . '" aria-describedby="helpId">
                    </div>
                    <button type="submit" class="btn btn-danger">Update</button>
                  </form>
                </div>
                <div class="col">Price: $' . $data[1] . '.00</div>
                <div class="col">
                  <form action="cart.php" method="post"><input type="hidden" name="cart" value="' . $item . '" placeholder="">
                    <button type="submit" class="btn btn-danger">Remove</button>
                  </form>
                </div>
              </div>';
              $sum += $data[1] * $data[2];
        }

        
        if (count($items) > 0)
        {
          echo '
            <div class="row align-items-center total">
              <div class="col-10"></div><div class="col-2">Total: $' . $sum . '</div>
            </div>
            <div class="row align-items-center checkout">
              <div class="col-10"></div>
              <div class="col-2">
                <a href="checkout.php">
                  <button type="button" class="btn btn-primary">Checkout</button>
                </a>
              </div>
            </div>';
        }
    ?>
          </div>
    </main>
  </body>
</html>