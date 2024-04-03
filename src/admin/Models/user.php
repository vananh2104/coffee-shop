<?php
    require_once 'Systems/Model_system.php';
    class user extends model_system
    {
      
        function listrecords()
        { //hàm lấy các record trong table
            $sql = "Select * from giay, loai_giay where giay.maloai = loai_giay.id";
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
            $sql = "Select * from giay, loai_giay where giay.maloai = loai_giay.id and maloai= $ma";
            $kq = $this->query($sql);
            return $kq;
       }
       public function list()
       {
        $sql = "SELECT * FROM products LIMIT 10";
        $kq = $this->query($sql);
        return $kq;
       }
       public function search($keyword)
       {
        $sql = "SELECT * FROM products where `name` like '%$keyword%';";
        $kq = $this->query($sql);
        return $kq;
       }
       public function lienhe($name,$email,$message)
       {
        $sql="INSERT INTO `contact`( `name`, `message`, `email`) VALUES ('$name','$message','$email')";
        $kq=$this->execute($sql);
        return $kq;
       }
       public function adduser($name,$email,$password,$address)
       {
        $sql="INSERT INTO `users`(`full_name`, `email`, `password`, `address`) VALUES ('$name','$email','$password','$address')";
        $kq=$this->execute($sql);
        return $kq;
       }
       
       public function loginuser($email,$password)
       {
        $sql="SELECT * FROM `users` WHERE `email`='$email' and `password`='$password'";
        $kq=$this->queryOne($sql);
        return $kq;
       }

    } //class 
