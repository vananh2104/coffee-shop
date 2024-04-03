<?php
session_start();
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Lấy dữ liệu từ form
    $name = $_POST["name"];
    $gender = $_POST["gender"];
    $email = $_POST["email"];
    $address = $_POST["address"];
    $phone = $_POST["phone"];
    $notes = $_POST["notes"];
    $thanhtoan = $_POST["thanhtoan"];



    if (!isset($_SESSION["donhang"])) {
      $_SESSION["donhang"] = array(
         "name" => $name,
         "gender" => $gender,
         "email" => $email,
         "address" => $address,
         "phone" => $phone,
         "notes" => $notes,
         "thanhtoan" => $thanhtoan,
     );
     $donhang=  $_SESSION["donhang"] ;
      // echo "Họ tên: " . $donhang["name"] . "<br>";
      // echo "Giới tính: " . $donhang["gender"] . "<br>";
      // echo "Email: " . $donhang["email"] . "<br>";
      // echo "Địa chỉ: " . $donhang["address"] . "<br>";
      // echo "Điện thoại: " . $donhang["phone"] . "<br>";
      // echo "Ghi chú: " . $donhang["notes"] . "<br>";
      // echo "Hình thức thanh toán: " . $donhang["thanhtoan"] . "<br>";
     // Có thể xóa session giohang nếu không cần nữa
     // unset($_SESSION["giohang"]);

     }
       else {
            echo"chưa có dl";
       }
     // Chuyển hướng hoặc thực hiện các xử lý khác sau khi lấy dữ liệu
    // header("Location: path/to/another/page.php");
}
?>


<div class="container">
     <div class="col-lg-3"></div>
     <div class="col-lg-6 col-sm-12">
        <h2 style="font-size: 50px;color:#AAAAAA;text-align: center;">Đặt hàng thành công </h2>
          
     </div>
     <div class="col-lg-3"></div>
     <?php 
      echo "<div class='card-footer'><a class='btn btn-primary btn-sm' href='http://localhost/Bachkhoa/Bootstrap/buoi3mvc/?act=continueshopping'>Tiếp tục mua sắp</a></div>";
        ?>
</div>
