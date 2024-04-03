<?php
$act = 'timkiem';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'timkiem':
        if (isset($_POST['timkiem'])) {
            // echo 'hhh';
            $key = $_POST['timkiem'];    
            include_once "./View/timkiem.php";
           
        }
        else
        {
            include_once "./View/not-found.php";
        }

        break;
}
?>