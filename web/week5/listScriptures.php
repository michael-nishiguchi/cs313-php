<!DOCTYPE html>
<html lang="en">
<head>
    <title>List Scripture</title>
</head>

<body>

<?php
    require("dbConnect.php");
    $db = get_db();
    $query = "SELECT book, chapter, verse, content FROM Scriptures";
    
    $stmt = $db->prepare($query);
    $stmt->execute();

    $scriptures = $stmt->fetchAll(PDO::FETCH_ASSOC);


    function getTopicId($scriptureId) {
       global $db;

       $query = "SELECT topic_id FROM link WHERE scripture_id=:id;";
       $stmt = $db->prepare($query);
       $stmt->bindValue(":id", $scriptureId, PDO::PARAM_INT);
       $stmt->execute();

       $topics = $stmt->fetchAll(PDO::FETCH_ASSOC);

       return $topics;
   }

   function getTopicName($topicId) {
      global $db;

      $query = "SELECT topic_name FROM topic WHERE topic_id=:id LIMIT 1;";
      $stmt = $db->prepare($query);
      $stmt->bindValue(":id", $topicId, PDO::PARAM_INT);
      $stmt->execute();

      $topicName = $stmt->fetch(PDO::FETCH_ASSOC)["topic_name"];

      return $topicName;
   } 
?>

<table>
    <tr>
        <th>Book</th>
        <th>Chapter/Verse</th>
        <th>Content</th>
        <th>Topic</th>
    </tr>
    <?php 

        foreach ($scriptures as $script) {
        echo "<tr><td>" . $script['book'] . "</td>";
        echo "<td>" . $script['chapter'] . ":" . $script['verse'] . "</td>";
        echo "<td>" . $script['content'] . "</td>";
         $topicIds = getTopicId($script["id"]);
         echo "<td>";
         foreach ($topicIds as $topicId) {
           echo getTopicName($topicId) . " ";
         }
         echo "</td></tr>";
      }
    ?>
</table>


</body>

</html>