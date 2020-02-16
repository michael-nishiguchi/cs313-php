<?php
require("dbConnect.php");

function addCategory($category_name, $amount_budgeted) {

    $db = get_db();
    $sql = 'INSERT INTO category
                (category_name, amount_budgeted)
            VALUES (:category_name, :amount_budgeted)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':category_name', $category_name, PDO::PARAM_STR);
    $stmt->bindValue(':amount_budgeted', $amount_budgeted, PDO::PARAM_STR);
    $stmt->execute();
    $rowsChanged = $stmt->rowCount();
    $stmt->closeCursor();
    return $rowsChanged;
}

function login ($email, $password) {
    $db = get_db();
    $sql = 'SELECT user_id 
            FROM users
            WHERE email = (:email)
            AND password = (:password)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':email', $email, PDO::PARAM_STR);
    $stmt->bindValue(':password', $password, PDO::PARAM_STR);
    $stmt->execute();
    $id = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $stmt->closeCursor();
    //return $id['user_id'];
    return $id;
}

function getAllUsers() {
    $db = get_db();
    $sql = 'SELECT user_name, email FROM users';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    //$stmt->closeCursor();
    return $stmt;
}


function getAllCategories() {
    $db = get_db();
    $sql = 'SELECT category_name, amount_budgeted FROM category';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    //$stmt->closeCursor();
    return $stmt;
}

function getAllTransactions() {
    $db = get_db();
    $sql = 'SELECT transaction_date, cost, business_name, category_id FROM transactions';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    //$stmt->closeCursor();
    return $stmt;
}

function getCategoriesFromId($user_id) {
    $db = get_db();
    $sql = 'SELECT category_id, category_name, amount_budgeted 
            FROM category
            WHERE user_id = (:user_id)';
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
    $stmt = $db->prepare($sql);
    $stmt->execute();
    //$stmt->closeCursor();
    return $stmt;
}

function getTransactionsFromId($user_id) {
    $db = get_db();
    $sql = 'SELECT transaction_date, cost, business_name, category_id 
            FROM transactions
            WHERE user_id = (:user_id)';
    $stmt->bindValue(':user_id', $user_id, PDO::PARAM_STR);
    $stmt = $db->prepare($sql);
    $stmt->execute();
    //$stmt->closeCursor();
    return $stmt;
}

function getCatTotal($category_id) {
    $db = get_db();
    $sql = 'SELECT cost 
            FROM transactions
            WHERE category_id = (:category_id)';
    $stmt->bindValue(':category_id', $category_id, PDO::PARAM_STR);
    $stmt = $db->prepare($sql);
    $stmt->execute();
    $catTotal;

    while($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $catTotal += $row['cost'];
    }
    return $catTotal;
}



function sortTransactionsAsc() {
    $db = get_db();
    $sql = 'SELECT transaction_date, cost, business_name, category_id 
            FROM transactions
            ORDER BY cost ASC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    //$stmt->closeCursor();
    return $stmt;
}

function sortTransactionsDesc() {
    $db = get_db();
    $sql = 'SELECT transaction_date, cost, business_name, category_id 
            FROM transactions
            ORDER BY cost DESC';
    $stmt = $db->prepare($sql);
    $stmt->execute();
    //$stmt->closeCursor();
    return $stmt;
}

function getCatFromId($category_id){
    $db = get_db();
    $sql = 'SELECT category_name 
            FROM category
            WHERE category_id = (:category_id)';
    $stmt = $db->prepare($sql);
    $stmt->bindValue(':category_id', $category_id, PDO::PARAM_STR);
    $stmt->execute();
    //$stmt->closeCursor();
    return $stmt;
}

echo 'here';

