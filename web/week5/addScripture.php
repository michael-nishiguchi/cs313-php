<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Scripture</title>
</head>

<body>

<?php
    require("dbConnect.php");
    // DB assigned to db variable
    $db = get_db();
    $query = "SELECT book, chapter, verse, content FROM Scriptures";
    $stmt = $db->prepare($query);
    $stmt->execute();

?>

<form>
    <label for="book">Book</label>
    <input type="text" name="book">

    <label for="chapter">Chapter</label>
    <input type="text"  name="chapter">

    <label for="verse">Verse</label>
    <input type="text"  name="verse">

    <label for="content">Content</label>
    <textarea name="content" rows="5"></textarea>

    <?php 
        $query = "SELECT topic_name FROM topic;";
        $stmt = db->prepare($query);
        $stmt->execute();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            echo "<input type='checkbox' "
        }
    ?>
</form>
</body>

</html>