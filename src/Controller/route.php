<?php
if (!array_key_exists("PATH_INFO", $_SERVER)) {
    include_once "View/product-home.php";
    return;
}
$pathInfo = $_SERVER['PATH_INFO'];

$paths = explode('/', $pathInfo);
if (sizeof($paths) == 0) {
    include_once "View/product-home.php";
    return;
}
switch ($paths[1]) {
    case 'collections':
        include_once "View/product-menubyid.php";
        break;
    case 'products':
        include_once "View/product-detail.php";
        break;
    case 'register':
        if (isset($_GET['action'])) {
            $ctrl = $_GET['action']; //dangki
            include_once "Controller/$ctrl.php";
        } else {
            include_once "View/register.php";
        }
        break;
    case 'login':
        if (isset($_GET['action'])) {
            $ctrl = $_GET['action']; //dangki
            include_once "Controller/$ctrl.php";
        } else {
            include_once "View/login.php";
        }
        break;
    case 'logout':
        include_once "Controller/logout.php";
        break; // Thêm break ở đây
    case 'cart':
        include_once "Controller/cart.php";
        break; // Thêm break ở đây
    case 'thanhtoan':
        include_once "Controller/thanhtoan.php";
        break; // Thêm break ở đây

    case 'quanli':
        include_once "Controller/admin.php";
        break;
    case 'timkiem':
        include_once "Controller/timkiem.php";
        break;
    default:
        include_once "View/not-found.php";
}
?>