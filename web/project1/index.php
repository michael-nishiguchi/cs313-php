<!DOCTYPE html>
<html lang="en">
<head>
    <title>Scriptures</title>
</head>

<body>

<?php
    require("queries.php");
    // DB assigned to db variable
    ?>


    <form action="addCategory()" method="post">

    <label for="categoryName">New Category Name</label>
    <input type="text" name="categoryName" id="categoryName" required>
    <input class="submit" type="submit" name="submit" value="Add Category">
    <!-- Action name - value pair - does not show to user
    <input type="hidden" name="action" value="add-cat">-->
</form>


</body>

</html>