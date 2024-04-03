<?php
    require_once 'Systems/Model_system.php';
    class model_giay extends model_system
    {
      
        function listrecords()
        { //hàm lấy các record trong table
            $sql = "SELECT giay.id AS id_giay, giay.ten_giay, giay.gia_khuyenmai, giay.gia_goc, giay.hinh, loai_giay.ten_loai
            FROM giay
            JOIN loai_giay ON giay.maloai = loai_giay.id;
            ";
            $kq = $this->query($sql);
            return $kq;
        }
        function slide()
        {
            $sql = "SELECT  * from slide";
            $kq = $this->query($sql);
            return $kq;
        }
       function  listrecordstype( $ma)
       {
            $sql = "SELECT giay.id AS id_giay, giay.ten_giay, giay.gia_khuyenmai, giay.gia_goc, giay.hinh, loai_giay.ten_loai
            FROM giay
            JOIN loai_giay ON giay.maloai = loai_giay.id and maloai= $ma";
            $kq = $this->query($sql);
            return $kq;
       }
      function  detailproducts($id)
       {
        $sql="select * from giay where id=$id";
        $kq=$this->queryOne($sql);
        return $kq;
       }
       function  cart($id)
       {
        $sql="select * from giay where id=$id";
        $kq=$this->queryOne($sql);
        return $kq;
       }
       function addkh()
       {
        if (isset($_SESSION["donhang"]) && isset($_SESSION["giohang"])) {
            $donhang=  $_SESSION["donhang"];
            $sqlInsertCustomer = "INSERT INTO customers (name, gender, email, address, phone, notes) VALUES ('" . $donhang['name'] . "', '" . $donhang['gender'] . "', '" . $donhang['email'] . "', '" . $donhang['address'] . "', '" . $donhang['phone'] . "', '" . $donhang['notes'] . "')";
            $this->execute($sqlInsertCustomer);
            $sql="SELECT id FROM customers ORDER BY id DESC LIMIT 1";
            $kq=$this->queryOne($sql);

            foreach ($_SESSION["giohang"] as $item) {
                $id_order = $kq['id'];
                $id_product = $item['id_giay']; // Id sản phẩm từ giỏ hàng
                $quantity = $item['soluong']; // Số lượng sản phẩm
                $price = $item['gia']; // Giá sản phẩm
                $sqlInsertOrderDetails = "INSERT INTO orderdetails (id_order, id_product, quantity, price) VALUES ('$id_order', '$id_product', '$quantity', '$price')";
                $this->execute($sqlInsertOrderDetails);
            }
            session_destroy();
           }
             else {
                  echo"chưa có dl";
             }
       }
       public function timkiem($keyword)
       {
        $sql = "SELECT * FROM giay where `ten_giay` like '%$keyword%';";
        $kq = $this->query($sql);
        return $kq;
       }

       public function listpro()
       { 
        $sql = "SELECT * FROM `sanpham` ORDER BY `idsp` DESC";
        $kq = $this->query($sql);
        return $kq;
       }
       public function listtype()
       { 
            $sql = "SELECT * FROM `loaisanpham` ";
            $kq = $this->query($sql);
            return $kq;       }
       public function listmenu()
       { 
           $sql = "SELECT * FROM `menu` ";
           $kq = $this->query($sql);
           return $kq;
       } 
       public function addproducts($ten_sp, $gia,$mo_ta,$ban_chay,$idloai,$id_menu)
       {
                $sql = "INSERT INTO `sanpham`(`gia`, `tensp`, `banchay`, `mota`, `ngaytao`, `idloai`, `idmenu`) VALUES ('$gia','$ten_sp','$ban_chay','$mo_ta',now(),'$idloai','$id_menu')";
                $this->execute($sql);
            
       }
       
       public function listedit($id)
       { 
           $sql = "SELECT * FROM `sanpham` WHERE `idsp`='$id' ";
           $kq = $this->queryOne($sql);
           return $kq;
       } 
       public function updateproducts($ma,$ten_sp, $gia,$mo_ta,$ban_chay,$idloai,$id_menu)
       {
           $sql = "UPDATE `sanpham` SET 
                   `gia` = '$gia',
                   `tensp` = '$ten_sp',
                   `banchay` = '$ban_chay',
                   `mota` = '$mo_ta',
                   `idloai` = '$idloai',
                   `idmenu` = '$id_menu'
                   WHERE `idsp`='$ma'";
           $this->execute($sql);
       }
       public function deleteProduct($id)
        {
            $sql = "DELETE FROM `sanpham` WHERE `idsp`='$id'";
            $this->execute($sql);
        }
        public function adminlogin($email,$ps)
        {
            $sql = "SELECT * FROM `users` WHERE `Email`='$email' and `Password`='$ps' and `vaitro`=1;";
            $kq = $this->queryOne($sql);
            return $kq;
        }

    } //class

    ?>
