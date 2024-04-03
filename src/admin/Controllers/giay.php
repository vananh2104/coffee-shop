<?php
//nạp model để có các hàm tương tác db
require_once "Models/model_giay.php";
class giay
{
    
    private $model = null;
    function __construct()
    {
        $this->model = new model_giay();
        //chức năng mặc định
        $act = "index";
        //tiếp nhận chức năng user request
        if (isset($_GET["act"])) $act = $_GET["act"];
        switch($act) {
            case "index":
                $this->index();
                break;
            case "getaddsp":
                $this->getaddsp();
                break;
            case "editadd":
                $this->editadd();
                break;         
            case "edit":
                $this->edit();
                break;
            case "update":
                $this->update();
                break;
            case "delete":
                $this->delete();
                break;
            case "login":
                $this->login();
                break;
            case "postlogin":
                $this->postlogin();
                break;
            case "logout":
                $this->logout();
                break;
            case "type":
                $this->type();
                break;
            case "chitiet":
                $this->detail();
                break;
            case "cart":
                $this->cart();
                break;
            case "detailcart":
                $this->detailcart();
                break;
            case "continueshopping":
                $this->continueshopping();
                break;
            case "timkiem":
                $this->timkiem();
                break;
            default:
                return;
        }
        //$this->$act;
    }
    function index()
    {   
         $list=$this->model->listpro();
         $page = "Views/sanpham.php";
        // $page_slides="Views/slides.php";
          require_once("layout.php");
    }
    function login()
    {
        $list=$this->model->listpro();
        require_once("Views/login.php");
    }
    function postlogin()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            if (isset($_POST['email']) && isset($_POST['password'])) {
                $password=$_POST['password'];
                $saltF = "G433H#";
                $saltL = "Td23$%";
                $passnew = md5($saltF . $password . $saltL);

                $kq = $this->model->adminlogin($_POST['email'],$passnew);
                if ($kq)  {
                    $_SESSION['login'] = $kq;
                    echo '<script> alert("Đăng nhập thành công");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=admin/" />';
                } else {
                    echo '<script> alert("Đăng nhập không thành công");</script>';
                    echo '<meta http-equiv="refresh" content="0;url=admin/login" />';
                }
            }
        }
    }
    
    function logout() {
        unset($_SESSION['login']);
        echo '<script> alert("Đăng xuất thành công");</script>';
        echo '<meta http-equiv="refresh" content="0;url=admin/login" />';
    }


    function getaddsp()
    {
      
        $listtype=$this->model->listtype();
        $listmenu=$this->model->listmenu();
        $page = "Views/addsp.php";
        // $page_slides="Views/slides.php";
          require_once("layout.php");
    }
    function editadd()
    {
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            // Kiểm tra xem các trường cần thiết đã được gửi hay không
            // if (!isset($_POST["tensp"]) || !isset($_POST["gia"]) || !isset($_POST["mota"]) || !isset($_POST["banchay"]) || !isset($_POST["idloai"]) || !isset($_POST["idmenu"])) {
            //     // Nếu thiếu trường nào đó, chuyển hướng người dùng đến trang thông báo lỗi
            //     header("Location: /admin/?act=getaddsp&error=missing_fields");
            //     exit(); // Dừng kịch bản để ngăn người dùng tiếp tục thực hiện các hành động khác
            // }
    
            // Lấy giá trị của các trường từ biểu mẫu
            $ten_sp = $_POST["tensp"];
            $gia = $_POST["gia"];
            $mo_ta = $_POST["mota"];
            $ban_chay = $_POST["banchay"];
            $idloai = $_POST["idloai"];
            $id_menu = $_POST["idmenu"];
            $this->model->addproducts($ten_sp, $gia,$mo_ta,$ban_chay,$idloai,$id_menu);
            echo '<script> alert("Thêm sản phẩm  thành công");</script>';
            echo '<meta http-equiv="refresh" content="0;url=/admin/?act=getaddsp" />';

        }
    }
    function edit()
    {
        $ma = $_GET["id"];
        $list=$this->model->listedit($ma);
        $listtype=$this->model->listtype();
        $listmenu=$this->model->listmenu();
        $page = "Views/edit.php";
        // $page_slides="Views/slides.php";
         require_once("layout.php");


    }

    function update()
    {

        
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $ma = $_POST["idsp"];
        $ten_sp = $_POST["tensp"];
        $gia = $_POST["gia"];
        $mo_ta = $_POST["mota"];
        $ban_chay = $_POST["banchay"];
        $idloai = $_POST["idloai"];
        $id_menu = $_POST["idmenu"];
        $this->model->updateproducts($ma,$ten_sp, $gia,$mo_ta,$ban_chay,$idloai,$id_menu);
        }
        echo '<script> alert("Cập nhật sản phẩm  thành công");</script>';
        echo '<meta http-equiv="refresh" content="0;url=/admin/" />';

        
    }
    function delete()
    {
       // Trong controller
    if (isset($_GET["id"])) {
        $idToDelete = $_GET["id"];   
        $this->model->deleteProduct($idToDelete);
        // Redirect hoặc thực hiện các công việc khác sau khi xóa
    }
        echo '<script> alert("Xóa sản phẩm  thành công");</script>';
        echo '<meta http-equiv="refresh" content="0;url=/admin/" />';

    }
    function type()
    {
       
         $ma = $_GET["id"];
         $slide = $this->model->slide();
         $list=$this->model->listrecordstype($ma);
         $page_slides = "Views/slides.php";
         $page_files = "Views/listtype.php";
        // $page_slides="Views/slides.php";
        require_once("layout.php");
    }
    function detail()
    {
        $ma=$_GET["id"];
        $slide = $this->model->slide();
        $row=$this->model->detailproducts($ma);
        $page_slides = "Views/slides.php";
        $page_files = "Views/detail.php";
       // $page_slides="Views/slides.php";
       require_once("layout.php");
    }
     function cart()
    {
        $ma=$_GET["id"];
        $slide = $this->model->slide();
        $row=$this->model->cart($ma);
        $id_giay=$row["id"];
        $ten=$row["ten_giay"];
        $gia=$row["gia_khuyenmai"];
        $soluong=1;
        if (!isset($_SESSION["giohang"])) {
            $_SESSION["giohang"] = array();
        }

        if (!isset($_SESSION["giohang"][$id_giay])) {
            $_SESSION["giohang"][$id_giay] = array(
                'id_giay' => $id_giay,
                'ten' => $ten,
                'gia' => $gia,
                'soluong' => $soluong,
            );
        } else {
            $_SESSION["giohang"][$id_giay]['soluong'] += $soluong;
        }
        $page_slides = "Views/slides.php";
        $page_files = "Views/cart.php";
       require_once("layout.php");
    }
    function detailcart()
    {

        $page_slides = "Views/slides.php";
        $page_files = "Views/cart.php";
        require_once("layout.php");
       
    }
    function continueshopping()
    {

       
    if (isset($_SESSION["donhang"])) {

         $this->model->addkh(); 
     
    }              
    else {
              echo"chưa có dl";
         }
        $slide = $this->model->slide();
        $list=$this->model->listrecords();
        $page_slides = "Views/slides.php";
        $page_files = "Views/list.php";
        // $page_slides="Views/slides.php";
        require_once("layout.php");
    }
  function timkiem()
   {
        $keyword = $_GET["keyword"]; 
        $list=$this->model->timkiem($keyword);
        $slide = $this->model->slide();
        $page_slides = "Views/slides.php";
        $page_files = "Views/search.php";
        // $page_slides="Views/slides.php";
        require_once("layout.php");
   }

} 