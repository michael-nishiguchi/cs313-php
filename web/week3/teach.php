<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="./main.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <title>Week 3 | Teach</title>
  </head>
  <main>
    <body>
      <?php 
        include '../header.php';
      ?>
      
    <div class="jumbotron">
          <h1 class="display-2">Week 3 - Teach: Team Activity</h1>
    </div>

    <div class="container">
        <form action="form.php" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" name="name">
            </div>
            
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" name="email">
            </div>

            <div class="form-check">
                <?php 
                    $majors = array("Computer Science", "Web Design and Development", "Computer Information Technology", "Computer Engineering");

                    foreach ($majors as $val) {
                    echo '<input type="radio" name="major" value=' . $val . '>' . $val . '<br>';
                    }
                ?> 
            </div>

            <div class="form-group">
                <textarea placeholder="Comments..." name="comments"></textarea>
            </div>
            <div class="form-check">   
                <input type="checkbox" name="continent[]" value="na">North America</input>
                <input type="checkbox" name="continent[]" value="sa">South America</input>
                <input type="checkbox" name="continent[]" value="eur">Europe</input>
                <input type="checkbox" name="continent[]" value="as">Asia</input>
                <input type="checkbox" name="continent[]" value="af">Africa</input>
                <input type="checkbox" name="continent[]" value="aus">Australia</input>
                <input type="checkbox" name="continent[]" value="ant">Antarctica</input>
            </div>

            <br>
            <input type="submit">
        </form>

    </div>

    
    
    </main>
  </body>
</html>