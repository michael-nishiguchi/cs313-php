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

        $message = 'my message';
        include 'test.php';
    exit;

    default:
        include '../view/prod-mgmt.php';
        break;
    }
?>