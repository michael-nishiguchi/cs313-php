<?php
require_once 'queries.php';


$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
    case 'add-cat-view':
        include '../view/add-cat.php';
        break;
    case 'add-cat':
        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);
        $amountBudgeted = filter_input(INPUT_POST, 'amountBudgeted', FILTER_SANITIZE_STRING);
        addCategory($categoryName, $amountBudgeted);
        $message = 'my message';
        include 'test.php';
    exit;

    default:
        include '../view/prod-mgmt.php';
        break;
    }
?>