<?php 
session_start();

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
        <form action="confirmation.php" method="post">
            <a href="cart.php">
            <button type="button" class="btn btn-danger">Back to Cart</button>
            </a>
            <div class="container">
                <div class="row align-items-center">Billing Information</div>
            </div>
            <div class="form-group">


            <div class="row">
                <div class="col-6">
                    First Name <input type="text" name="firstName" id="firstName" class="form-control" required>
                </div>
                <div class="col-6">
                    Last Name <input type="text" name="lastName" id="lastName" class="form-control"required>
                </div>
            </div>
            <div class="row">
                Email <input type="text" name="email" id="email" class="form-control"required>
            </div>
            <div class="row">
                Address <input type="text" name="address1" id="address1" class="form-control" required>
            </div>
            <div class="row">
                <div class="col-8">
                    Address 2 (Optional) <input type="text" name="address2" id="address2" class="form-control"">
                </div>
                <div class="col-4">
                    City <input type="text" name="city" id="city" class="form-control" required>
                </div>
            </div>
            <div class="row">
                <div class="col-3">
                    Zip Code <input type="text" name="zip" id="zip" class="form-control" required>
                </div>
                <div class="col-4">
                    State <input type="text" name="state" id="state" class="form-control" required>
                </div>
                <div class="col-5">
                    Country <input type="text" name="country" id="country" class="form-control" required>
                </div>
            </div>
        </div>

        <div class="row align-items-center">
            <div class="col">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </div>
        </form>
          </div>
    </main>
  </body>
</html>