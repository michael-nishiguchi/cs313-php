<?php
require("dbConnect.php");

function addCategory($categoryName, $amountBudgeted) {

    $db = get_db();
    $sql = 'INSERT INTO category
                (category_name, amount_budgeted)
           VALUES (:category_name, amount_budgeted)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':category_name', $categoryName, PDO::PARAM_STR);
    $stmt->bindValue(':amount_budgeted', $amountBudgeted, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

//addproduct to db
function addProduct($invName, $invDescription, $invImage, $invThumbnail, $invPrice, $invStock, $invSize, $invWeight, $invLocation, $categoryId, $invVendor, $invStyle) {
// DB connection object
    $db = acmeConnect();

    $sql = 'INSERT INTO inventory(invName, invDescription, invImage, invThumbnail,
        invPrice, invStock, invSize, invWeight, invLocation, categoryId, invVendor, invStyle)
           VALUES (:invName, :invDescription, :invImage, :invThumbnail, :invPrice,
           :invStock, :invSize, :invWeight, :invLocation, :categoryId, :invVendor, :invStyle)';
// Create the prepared statement using the acme connection
    $stmt = $db->prepare($sql);

    $stmt->bindValue(':invName', $invName, PDO::PARAM_STR);
    $stmt->bindValue(':invDescription', $invDescription, PDO::PARAM_STR);
    $stmt->bindValue(':invImage', $invImage, PDO::PARAM_STR);
    $stmt->bindValue(':invThumbnail', $invThumbnail, PDO::PARAM_STR);
    $stmt->bindValue(':invPrice', $invPrice, PDO::PARAM_STR);
    $stmt->bindValue(':invStock', $invStock, PDO::PARAM_STR);
    $stmt->bindValue(':invSize', $invSize, PDO::PARAM_STR);
    $stmt->bindValue(':invWeight', $invWeight, PDO::PARAM_STR);
    $stmt->bindValue(':invLocation', $invLocation, PDO::PARAM_STR);
    $stmt->bindValue(':categoryId', $categoryId, PDO::PARAM_STR);
    $stmt->bindValue(':invVendor', $invVendor, PDO::PARAM_STR);
    $stmt->bindValue(':invStyle', $invStyle, PDO::PARAM_STR);
// Insert the data
    $stmt->execute();
// Stores number of rows changed (should be 1)
    $rowsChanged = $stmt->rowCount();
// Close the database interaction
    $stmt->closeCursor();
// Return the indication of success (rows changed)
    return $rowsChanged;
}
