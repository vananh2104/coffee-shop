<?php
//nạp model để có các hàm tương tác db
require_once "Models/user.php";
class dangki
{
    private $model = null;
    function __construct()
    {
        $this->model = new user();
        //chức năng mặc định
        $act = "index";
        //tiếp nhận chức năng user requests
        if (isset($_GET["act"])) $act = $_GET["act"];
        switch($act) {
            case "index":
                $this->index();
                break;
            case "getdangnhap":
                $this->getdangnhap();
                break;
            case "action_dangki":
                $this->dangki();
                break;
            case "action_dangnhap":
                $this->dangnhap();
                break;
            default:
                return;
        }
        //$this->$act;
    }
    function index()
    {    $slide = $this->model->slide();
         $page_slides = "Views/slides.php";
         $page_files = "Views/dangki.php";
        require_once("layout.php");
    }
    
  
    function getdangnhap()
    {   $slide = $this->model->slide();
        $page_slides = "Views/slides.php";
        $page_files = "Views/dangnhap.php";
        require_once("layout.php");
    }
    function dangki()
    {
        $name = isset($_POST["name"]) ? $_POST["name"] : "chưa có";
        $password = isset($_POST["password"]) ? $_POST["password"] : "chưa có";
        $saltF = "G433H#";
        $saltL = "Td23$%";
        $passnew = md5($saltF . $password . $saltL); // da duoc ma hoa
        $email = isset($_POST["email"]) ? $_POST["email"] : "chưa có";
        $address = isset($_POST["address"]) ? $_POST["address"] : "chưa có";     
        $User=$this->model->adduser($name,$email,$passnew,$address);
        // $count = $logUser->rowCount();                                  
        // $uslg = $logUser->fetch();   
        if ($User) {
            // $_SESSION['Id'] = $logUser['Id'];
            // $_SESSION['LastName'] = $User['LastName'];
            // $_SESSION['FirstName'] = $User['FirstName'];

            echo '<script> alert("Đăng kí thành công");</script>';
           
            echo '<meta http-equiv="refresh" content="0;url=/Bachkhoa/Bootstrap/buoi3mvc/?ctrl=index" />';
        } else {
            echo '<script> alert("Đăng kí không thành công");</script>';
            echo '<meta http-equiv="refresh" content="0;url=/Bachkhoa/Bootstrap/buoi3mvc/?ctrl=dangki&act=getdangki" />';
        }
       
    }
    function dangnhap()
    {
        $email = isset($_POST["email"]) ? $_POST["email"] : "chưa có";
        $password = isset($_POST["password"]) ? $_POST["password"] : "chưa có";
        $saltF = "G433H#";
        $saltL = "Td23$%";
        $passnew = md5($saltF . $password . $saltL); // da duoc ma hoa   
        $login=$this->model->loginuser($email,$passnew);
        // $count = $logUser->rowCount();                                  
        // $uslg = $logUser->fetch();   
        if ($login) {
            // $_SESSION['Id'] = $logUser['Id'];
            // $_SESSION['LastName'] = $User['LastName'];
            $_SESSION['user'] = $login['full_name'];
            echo '<script> alert("Đăng nhập thành công");</script>';
            echo '<meta http-equiv="refresh" content="0;url=/Bachkhoa/Bootstrap/buoi3mvc/?ctrl=index" />';
        } else {
            echo '<script> alert("Đăng nhập không thành công");</script>';
            echo '<meta http-equiv="refresh" content="0;url=/Bachkhoa/Bootstrap/buoi3mvc/?ctrl=dangnhap&act=getdangnhap" />';
        }
       
    }
   function getcontact()
    {
        $name = isset($_POST["name"]) ? $_POST["name"] : "chưa có";
        $email = isset($_POST["email"]) ? $_POST["email"] : "chưa có";
        $message = isset($_POST["message"]) ? $_POST["message"] : "chưa có";     
            $this->model->lienhe($name, $email, $message);
            echo '<meta http-equiv="refresh" content="0;url=/Bachkhoa/Bootstrap/buoi3mvc/contact.php" />';
    }

} //class nhasanxuat''