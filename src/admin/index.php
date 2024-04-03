
<?php
session_start();
require_once("Systems/Config.php");

$ctrl = 'index';

if (isset($_GET['ctrl'])) $ctrl = $_GET['ctrl'];

if ($ctrl == "index") {
    require_once "Controllers/giay.php";
    $controller = new giay;
}
else if ($ctrl == "dangki") {
    require_once "Controllers/dangki.php";
    $controller = new dangki;
}
else if ($ctrl == "dangnhap") {
    require_once "Controllers/dangki.php";
    $controller = new dangki;
}
