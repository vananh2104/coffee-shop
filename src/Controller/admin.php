<?php 
include_once 'Model/topping.php';
include_once 'Model/cart.php';
include_once 'Model/products.php';

    $act='quanliadmin';
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch($act) {
        case 'quanliadmin':
            include_once "View/admin.php";
            break;
            default:
            include_once "View/not-found.php";
    }
?>