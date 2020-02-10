<!DOCTYPE html>
<html lang="en">
<head>
    <title>Add Scripture</title>
</head>

<body>

<form action="listScriptures.php" method="post">
    <label for="book">Book</label>
    <input type="text" name="book">

    <label for="chapter">Chapter</label>
    <input type="text"  name="chapter">

    <label for="verse">Verse</label>
    <input type="text"  name="verse">

    <label for="content">Content</label>
    <textarea name="content" rows="5"></textarea>


    <ul>
    <?php 
        require("dbConnect.php");
        $db = get_db();

        $query = "SELECT topic_name FROM topic;";
        $stmt = $db->prepare($query);
        $stmt->execute();
        
        while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
            $topic = $row["topic_name"];
            $topicId = $row["id"];
            echo "<li><input type='checkbox' name='topic[]' value=$topicId>$topic</li>";
        }
    ?>
    </ul>

    <button type="submit">Submit</button>
</form>
</body>

</html>