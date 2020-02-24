<?php
require_once 'queries.php';
session_start();

$action = filter_input(INPUT_POST, 'action');
if ($action == NULL) {
    $action = filter_input(INPUT_GET, 'action');
}

switch ($action){
    case 'add-cat':
        $categoryName = filter_input(INPUT_POST, 'categoryName', FILTER_SANITIZE_STRING);
        $amountBudgeted = filter_input(INPUT_POST, 'amountBudgeted', FILTER_SANITIZE_STRING);
        var_dump($categoryName);
        var_dump($amountBudgeted);
        if(addCategory($categoryName, $amountBudgeted)){
            $message = 'Added';
        }
        $message = 'not added';
        include 'test.php';
        break;
    case 'delete-cat':
        $categoryId = filter_input(INPUT_POST, 'category-id', FILTER_SANITIZE_STRING);
        $message = $categoryId . " was deleted";
        include 'view-budget.php';

    case 'show-cat':
        break;
    
    case 'view-budget':
        include 'view-budget.php';
        break;

    case 'home':
        include 'home.php';
    break;

    case 'login':
        include 'login.php';
    break;

    case 'welcome':
        $inputEmail = filter_input(INPUT_POST, 'inputEmail', FILTER_SANITIZE_EMAIL);
        $inputPassword = filter_input(INPUT_POST, 'inputPassword', FILTER_SANITIZE_STRING);
        $_SESSION['user_id'] = login($inputEmail, $inputPassword);
        $_SESSION['user_id'] = ($_SESSION['user_id'][0])['user_id'];
        if($_SESSION['user_id'] != NULL) {            
            $message = null;
            $_SESSION['loggedin'] = TRUE;
            include 'view-budget.php';
            exit;
        }
        else {
            $message = "login failed";
            include 'login.php';
            exit;
        }

    break;

    default:
        include 'home.php';
        break;
    }
?>