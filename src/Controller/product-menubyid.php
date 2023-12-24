<?php
if (!array_key_exists("PATH_INFO",$_SERVER)) {
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
    default:
     include_once "View/not-found.php";
}
?>