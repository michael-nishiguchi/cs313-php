<form action="index.php" method="post">
<?php if (isset$message echo $message;) ?>
    <label for="categoryName">New Category Name</label>
    <input type="text" name="categoryName" id="categoryName" required>
    <input class="submit" type="submit" name="submit" value="Add Category">
    <!-- Action name - value pair - does not show to user-->
    <input type="hidden" name="action" value="add-cat">
</form>