<?php
class user {
    //phuongt thuc kiem tra user va email co ton tai chua
    function checkUser($username,$email)
    {
        $db=new connect();
        $select="SELECT a.Username, a.Email from Users a WHERE a.Username='$username' or a.Email='$email'";
        $result=$db->getList($select);
        return $result;
    }
    //phuong thuc insert vao db
    function insertKH($lname,$fname,$gender,$address,$phone,$username,$email,$pass, $createdDate)
    {
        $db=new connect();
        $query="INSERT INTO Users (LastName, FirstName, Gender ,Address,PhoneNumber,Username, Email,Password,CreatedAt)
        VALUES ('$lname', '$fname', $gender, '$address','$phone','$username','$email','$pass', '$createdDate')";
        //exec
        $result=$db->exec($query);
        return $result;
    }
    function loginUser($username,$pass){
        $db=new connect();
        $select="SELECT * from Users  WHERE Username='$username' and Password ='$pass'";
        $result=$db->getInstance($select);
        return $result;
    }
           //pt ktra email có tồn tại k
           function checkEmail($email) {
            $db = new connect();
            $select = "select * from Users a WHERE a.Email='$email'";
            $result = $db -> getList($select);//trả về table
            return $result;
        }
        //pt update
        function updatePassEmail($email, $passnew) {
            $db = new connect();
            $query = "UPDATE `users` SET `Password`='$passnew' where `Email`='$email'";
            $db->exec($query);
        }
    
}
?>