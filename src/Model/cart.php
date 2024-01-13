<?php
include_once "Model/products.php";
class cart
{
    //Thêm thông tin sản phẩm vòa giỏ hàng
    function addCart($idsp, $size, $giasize, $toppings, $soluong)
    {
        //còn thiếu hình, tên, đơn giá, thành tiền
        $sp = new sanPham();
        $productcart = $sp->getProductById($idsp);
        $tensp = $productcart['tensp'];
        $dongia = $productcart['gia'];
       
        //Lấy màu dựa vào mã màu
        // $mau = $sanpham->getHangHoaTenMau($size);//Màu sắc là id không phải tên
        // $tenmau = $mau['mausac'];
        //Lấy hình
        //$hinh=$sp->getCart($idsp, $size,$topping);
        // $img = $hinh['hinh'];
        $sum_topping = array_sum(array_column($toppings, 'giatopping'));
        $total = ($dongia + $giasize + $sum_topping) * $soluong;
        $flag = false;
        //Trước khi đưa 1 object vào giỏ hàng thì kiểm tra hàng đó có tồn tại trong giỏ hàng chưa
        foreach ($_SESSION['cart'] as $key => $item) {
            //TODO kiem tra trung id, size, topping => cong so luong
            // if($item['idsp'] == $idsp  && $item['size'] == $size && $item['topping'] == $topping) {
            //     $flag = true;
            //     $soluong += $item['soluong'];//$soluong=$soluong+$item['soluong];=$soluong=2+1=3
            //     $this->updateHH($key, $soluong);
            // }
        }
        if ($flag == false) {
            //Giỏ hàng chứa 1 món hàng, món hàng là 1 object
            $item = array(
                'idsp' => $idsp, //thuộc tính->giá trị, trong đó thuộc tính tự đặt
                'tensp' => $tensp, //
                'size' => $size,
                'giasize' => $giasize,
                'toppings' => $toppings,
                'soluong' => $soluong,
                'dongia' => $dongia,
                'thanhtien' => $total
            );
            //đem đối tượng add vào giỏ hàng a[]
            $_SESSION['cart'][] = $item;
        }
    }
    //Phương thức tính tổng tiền trong giỏ hàng
    function subTotal()
    {
        $subtotal = 0;
        foreach ($_SESSION['cart'] as $key => $item) {
            $subtotal += $item['thanhtien'];
        }
        $subtotal = number_format($subtotal, 2);
        return $subtotal;
    }
    //Phương thức update
    function updateCart($index, $soluong)
    {
        if ($soluong <= 0) {
            unset($_SESSION['cart'][$index]);
        } else {
            //Cập nhật tức là phép gán
            $_SESSION['cart'][$index]['soluong'] = $soluong;
            $tiennew = $_SESSION['cart'][$index]['soluong'] * $_SESSION['cart'][$index]['dongia'];
            $_SESSION['cart'][$index]['thanhtien'] = $tiennew;
        }
    }
}
?>