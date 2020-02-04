<!DOCTYPE html>
<html lang="en">
<head>
    <title>Scriptures</title>
</head>

<body>

<?php
    require("dbConnect.php");
    // DB assigned to db variable
    $db = get_db();
    $query = "SELECT book, chapter, verse, content FROM Scriptures";
    $stmt = $db->prepare($query);
    $stmt->execute();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC))
{
    var_dump($row);
	// The variable "row" now holds the complete record for that
	// row, and we can access the different values based on their
	// name
	$book = $row['book'];
	$chapter = $row['chapter'];
	$verse = $row['verse'];
	$content = $row['content'];

	echo "<p><strong>$book $chapter:$verse</strong> - \"$content\"<p>";
}

    /*
    $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($rows as $value) {
        echo $value;
        //echo "<p>" . $value['book'] . " " . $value['chapter'] . ":" . $value['verse'] . " - \"" . $value['content'] . "\"</p>";
    }
    */
?>
<p>here</p>
</body>

</html>