<?php
include_once "Model/products.php";
class cart
{
    //Thêm thông tin sản phẩm vòa giỏ hàng
    function addCart($idsp, $size, $toppings, $soluong)
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
        $total = ($dongia + $size['giasize'] + $sum_topping) * $soluong;
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


        $flag = false; // Khởi tạo biến flag là false

// Kiểm tra xem sản phẩm đã tồn tại trong giỏ hàng chưa
if (isset($_SESSION["cart"])) {
    foreach ($_SESSION["cart"] as $key => $value) {
        if ($value['idsp'] == $idsp && $value['size'] == $size && $value['toppings'] == $toppings) {
            // Nếu sản phẩm đã tồn tại trong giỏ hàng với cùng idsp, size và toppings, tăng số lượng lên và đặt biến flag là true
            $_SESSION["cart"][$key]["soluong"] += 1;
            $flag = true;
            break;
        }
    }
}

// Nếu sản phẩm chưa tồn tại trong giỏ hàng với cùng idsp, size và toppings, thêm mới vào giỏ hàng
if (!$flag) {
    $item = array(
        'idsp' => $idsp,
        'tensp' => $tensp,
        'size' => $size,
        'toppings' => $toppings,
        'soluong' => $soluong,
        'dongia' => $dongia,
        'thanhtien' => $total
    );
    $_SESSION['cart'][] = $item;
}

        
    }
    //Phương thức tính tổng tiền trong giỏ hàng
    function subTotal()
    {   
        $sum=0;
        $subtotal = 0;
        $sub=0;
        foreach ($_SESSION['cart'] as $key => $item) {
            $sum = 0;    
            foreach ($item['toppings'] as $toppingKey => $toppingItem)
            {
                         
                $sum += $toppingItem['giatopping'];
            }
             $sub=($item['dongia'] + $item['size']['giasize']+$sum)*$item['soluong'];
             $subtotal +=$sub;
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