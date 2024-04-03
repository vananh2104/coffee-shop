<?php 
include_once 'Model/topping.php';
include_once 'Model/cart.php';
include_once 'Model/products.php';
include_once 'Model/hoadon.php';
// unset($_SESSION['cart']);
    //xem người dùng có giỏ hàng hay chưa, nếu chưa thì tạo ra giỏ hàng
    if(!isset($_SESSION['cart'])){
        //Tạo giỏ hàng
        $_SESSION['cart']=array();//chứa nhiều món hàng
    }
    //$_SESSION['cart']=array();
    $act='cart';
    if(isset($_GET['act'])) {
        $act = $_GET['act'];
    }
    switch($act) {
        case 'thanhtoan':
            include_once './View/bill.php';
            break;
         
        case 'thanhtoanne':
            if(isset($_SESSION['Id']))
            {
                $makh=$_SESSION['Id']; 
                $hd=new hoadon();
            // lấy mã số hd vừa mới insert vào
            $sohd=$hd->insertHoaDon($makh);// số 17
            $_SESSION['masohd']=$sohd;
            $total=0;
            // đã có mã số hd(cha) thì insert đc vào bảng cthoadon 
            foreach ($_SESSION['cart'] as $key => $item) {
            //controller yêu cầu model insert vào bảng cthoadon
            $thanhtien =$item['soluong']*$item['dongia'];
            $total+=$thanhtien;
            $hd->insertCTHoaDon($sohd, $item['idsp'],$item['soluong'],$item['dongia'],  $thanhtien);
            // cập nhật lại cthanghoa dua vào
            }
            // tiến hành cập nhật lại tổng tiền vào trong bảng hoadon
            $hd->updateTongTien($sohd, $makh, $total);
            }
            unset($_SESSION['cart']);
            echo '<script>alert("Đã xác nhận đơn hàng của bạn");</script>';
            echo '<meta http-equiv="refresh" content="0; url=/"/>';

            break;
    }
?>