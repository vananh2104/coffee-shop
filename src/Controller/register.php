<?php
include_once "Model/user.php";
$act = "dangky";
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'dangky':
        include_once "./View/register.php";
        break;
    case 'dangky_action':
        // gui du lieu thong tin nguoi dung vua nhap qua dangky_action
        // nhan
        $lname = '';
        $fname = '';
        $gender = '';
        $address = '';
        $phone = '';
        $username = '';
        $email = '';
        $pass = '';
        if (isset($_POST['submit'])) {
            $lname = $_POST['txtlname']; //minhanh
            $fname = $_POST['txtfname']; //hcm
            if (!isset($lname) || $lname == '') {
                echo '<script> alert("Vui long nhap ho ten");</script>';
                echo '<meta http-equiv="refresh" content="0;url=/register"/>';
                return;
            }
            $gender = $_POST['txtgt']; //123456
            $address = $_POST['txtdc']; //anhanh
            $phone = $_POST['txtsdt']; //anh1@itc.edu.vn
            $username = $_POST['txtusername']; //123
            $email = $_POST['txtemail'];
            $pass = $_POST['txtpass'];
            $saltF = "G433H#";
            $saltL = "Td23$%";
            $passnew = md5($saltF . $pass . $saltL); // da duoc ma hoa
            //controller y/c phai dem thong tin nay insert vao db?Model
            //trc khi insert can kiem tra xem user va email da ton tai chua  
            $kh = new user();
            $check = $kh->checkUser($username, $email)->rowCount();
            if ($check >= 1) {
                echo '<script> alert("Username hoặc email đã tổn tại");</script>';
                echo '<meta http-equiv="refresh" content="0;url=./register"/>';
                // include_once "./View/registration.php";
            } else {
                // insert vao db
                $inskh = $kh->insertKH($lname, $fname, $gender, $address, $phone, $username, $email, $passnew, gmdate("Y-m-d H:i:s"));
                if ($inskh !== false) {
                    echo '<script> alert("Đăng ký thành công");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./index.php?action=home"/>';
                } else {
                    echo '<script> alert("Đăng ký không thành công");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=./register"/>';
                }
            }
        }
        break;


}
?>