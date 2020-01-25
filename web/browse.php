<?php 
session_start();


    if (isset($_SESSION["cart"]))
    {
        if(!isset($count)) { $count = 0;}
        $cart = $_SESSION["cart"];
        foreach($cart as $item => $data)
        {
            $count += $data[2];
        }
    }

    $items["Television"] = array("", "800");
    $items["Couch"] = array("", "400");
    $items["Speakers"] = array("", "199");
    $items["Pizza"] = array("", "8");
    $items["Chips"] = array("", "4");
    $items["Salsa"] = array("", "5");
    $items["Hot Wings"] = array("", "12");
    $items["Soda"] = array("", "3");
    $items["Lemondae"] = array("", "4");

    $search = false;
    if(isset($_POST["search"]))
    {
        $searchedTerm = $_POST["search"];
        $search = true;
    }

    if (isset($_POST["cart"]))
    {
        $newCartItem = $_POST["cart"];
        
        $quantity = $_POST["Quantity"];

        if(!isset($_SESSION["cart"]))
        {
            $_SESSION["cart"] = array();
        }
        $_SESSION["cart"][$newCartItem] = $items[$newCartItem];
        array_push($_SESSION["cart"][$newCartItem], $quantity);
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
    <title>Browse Items</title>
  </head>
  <body>
      <?php 
        include 'header.php';
      ?>
          <div class="jumbotron">
          <h1 class="display-2">Browse Products</h1>
          <?
            if(isset($message)){

            } 
          ?>
    </div>

    <div class="container">
        <a class="nav-link" href="cart.php">Go to Cart</a>

        <?php
        $i = 0;

        echo '<div class="row">';
        foreach($items as $item => $data)
        {
            if ($i == 3)
            {
                echo '</div><div class="row">';
                $i = 0;
            }

            if ($search && strpos($item, $searchedTerm) !== false)
            {
                displayItem($item, $data);
            }
            else if (!$search)
            {

                displayItem($item, $data);
            }
        }
        echo '</div>';

        function displayItem($item, $data)
        {
            echo '<div class="col-4">
                    <p>' . $item . '<br>$' . $data[1] . '</p>';
            echo '<form action="browse.php" method="post">
                    <div class="form-group">
                        <label for="quantity">Quantity</label>
                        <input type="hidden" name="cart" value="' . $item . '" placeholder="">
                        <input type="number" class="form-control" name="Quantity" min="0" id="' . $item . ' Quantity" >
                        <button type="submit" class="btn btn-primary">Add to cart</button>
                    </div>
                </form></div>';
            if(isset($i)){
                $i++;
            }
        }
    ?>
    
    
    </main>
  </body>
</html>