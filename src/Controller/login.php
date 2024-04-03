<?php
include_once "Model/user.php";
$act = 'dangnhap';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangnhap':
        include_once "./View/login.php";
        break;
    case 'dangnhap_action':
        $username = '';
        $pass = '';
        if (isset($_POST['submit'])) {
            $username = $_POST['txtusername'];
            $pass = $_POST['txtpass'];
            $saltF = "G433H#";
            $saltL = "Td23$%";
            $passnew = md5($saltF . $pass . $saltL); // da duoc ma hoa
            $kh = new user();
            $logUser = $kh->loginUser($username, $passnew);
            // $count = $logUser->rowCount();                                  
            // $uslg = $logUser->fetch();   
            if ($logUser) {
                $_SESSION['Id'] = $logUser['Id'];
                $_SESSION['LastName'] = $logUser['LastName'];
                $_SESSION['FirstName'] = $logUser['FirstName'];
                $_SESSION['Address'] = $logUser['Address'];
                $_SESSION['PhoneNumber'] = $logUser['PhoneNumber'];
                
                echo '<script> alert("Đăng nhập thành công");</script>';
               echo '<meta http-equiv="refresh" content="0;url=/" />';
            } else {
                echo '<script> alert("Đăng nhập không thành công");</script>';
                echo '<meta http-equiv="refresh" content="0;url=/login""/>';
            }
        }
        break;
}
?>