<?php 
include_once 'Model/topping.php';
include_once 'Model/cart.php';
include_once 'Model/products.php';
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
        case 'cart':
            include_once './View/cart.php';
            break;
            case 'cart_action':
                #truyền id, mau, size, soluong
                $idsp=0;
                $idsize=0;
                $topping='';
                $soluong=0;
               if(isset($_POST['idsp'])){
                 
                    $idsp=$_POST['idsp'];
                    $idsize=$_POST['size'];
                    $soluong=$_POST['soluong'];
                    $toppingIds=$_POST['toppings']; //toppings = [{id:1,gia:10000}, {id:2,gia:2000}]
                   $sp = new sanPham();
                   $toppingsdb =  $sp->getToppingsByIds($toppingIds);
                   $size = $sp->getSizeById($idsize);
                   $toppings =[];
                   while ($topping = $toppingsdb->fetch()):
                    array_push($toppings, $topping);
                   endwhile;
                  // $toppings = array(new topping(1, 10000), new topping(2, 10000));
                   // $giatopping=$_POST['giatopping'];
                    //Controller yêu cầu add thông tin này vào trong giỏ hàng
                    $gh = new cart();
                    $gh->addCart($idsp, $size,$toppings,$soluong);
            
                    // Add an echo statement to indicate successful addition
                    echo '<script>
                    alert("Sản phẩm đã được thêm vào giỏ hàng thành công ^-^ !");
                  </script>';
                  echo '<meta http-equiv="refresh" content="0; url=/cart"/>';
                }
            
                break;
            
        case 'cart_delete':
            //Nhận key
            if(isset($_GET['id'])) {
                $id = $_GET['id'];
                unset($_SESSION['cart'][$id]);
            }
            echo '<meta http-equiv="refresh" content="0; url=/cart"/>';
            break;
        case 'update_cart':
            //Nhận giá trị
            if(isset($_POST['newqty'])) {
                $newqty = $_POST['newqty'];//[0:1, 2:4]
                //Duyệt qua giỏ hàng, hàng nào mà có số lượng khác với empty thì tiến hành update
                foreach($newqty as $key =>$value) {
                    if($_SESSION['cart'][$key]['soluong']!=$value) {
                        $gh = new cart();
                        $gh->updateCart($key, $value);
                    }
                }
            }
            echo '<meta http-equiv="refresh" content="0; url=/cart"/>';
            break;
    }
?>