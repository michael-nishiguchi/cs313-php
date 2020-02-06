<?php
require("dbConnect.php");

function addCategory($categoryName, $amountBudgeted) {

    $db = get_db();
    $sql = 'INSERT INTO category
                (category_name, amount_budgeted)
            VALUES (:categoryName, :amountBudgeted)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':categoryName', $categoryName, PDO::PARAM_STR);
    $stmt->bindValue(':amountBudgeted', $amountBudgeted, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function getAllUsers() {
    $db = get_db();
    $sql = 'SELECT user_name, email FROM users';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $stmt->closeCursor();
    return $stmt;
}
