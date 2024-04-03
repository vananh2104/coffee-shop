<?php
$act = 'forget';
if (isset($_GET['act'])) {
    $act = $_GET['act'];
}
switch ($act) {
    case 'forget':
        include_once "./View/forgetpassword.php";
        break;
    case 'forget_action':
        // nếu người dùng nhấn vào nút submit thì nhận email về
        if (isset($_POST['submit_email'])) {
            $email = $_POST['email'];
            // kiểm tra xem email này có tồn tại trong database hay không
            $kh = new user();
            $checkemail = $kh->checkEmail($email)->rowCount();
            if ($checkemail > 0) {
                // cấp mã code
                $code = random_int(10000, 1000000);
                // lưu thông tin code và email này vào trong session để kh lấy code nhập vào và so lại trong sesion
                // tạo đối tượng
                // $item = array(
                //     'id' => $code,
                //     'email' => $email,
                // );

                // // add đối tượng vào trong session 
                // $_SESSION['email'][] = $item;
                //tiến hành gửi mail.
                $mail = new PHPMailer();
                $mail->CharSet = "utf-8";
                $mail->IsSMTP();
                // enable SMTP authentication
                $mail->SMTPAuth = true;
                // $mail->SMTPDebug = 2;
                // GMAIL username to:
                // $mail->Username = "php22023@gmail.com";//
                $mail->Username = 'vananhtran21042004@gmail.com';
                // GMAIL password
                // $mail->Password = "php22023ngoc";
                $mail->Password = "pfyz oxtf ktoj nuax"; //mật khẩu ứng dụng
                $mail->SMTPSecure = "tls";  // ssl
                // sets GMAIL as the SMTP server
                $mail->Host = "smtp.gmail.com";
                // set the SMTP port for the GMAIL server
                $mail->Port = "587"; // 465
                $mail->From = 'vananhtran21042004@gmail.com ';
                $mail->FromName = ' Vân Anh';
                // $getemail là địa chỉ mail mà người nhập vào địa chỉ của họ đã đăng ký trong trang web
                $mail->AddAddress($email, 'text');
                $mail->Subject = 'Reset Password';
                $mail->IsHTML(true);
                $mail->Body = 'Cấp lại mã code ' . $code . '';
                $item=array("email"=>$email,"code"=>$code);
                $_SESSION["email"]=$item;
                if ($mail->Send()) {
                    echo '<script> alert("Check Your Email and Click on the
                        link sent to your email");</script>';
                    include "./View/resetpw.php";
                } else {
                    var_dump('send');
                    debug_print_backtrace();
                    echo "Mail Error - >" . $mail->ErrorInfo;
                    include "./View/forgetpassword.php";
                }
                // include "./View/resetpw.php";
            } else {
                echo '<script> alert("Địa chỉ mail ko tồn tại");</script>';
                include "./View/forgetpassword.php";
            }
        }
        break;
       
    case 'reset':
        if (isset($_POST['submit_password'])) {
            // echo 'hhh';
            $code = $_POST['code'];
            $pass = $_POST['password']; //433895
            // dò trong session
            if(isset($_SESSION['email']))
            {
                    if ($_SESSION['email']['code'] == $code) {
                        $emailold = $_SESSION['email']['email'];
                        $saltF = "G433H#";
                        $saltL = "Td23$%";
                        $passnew = md5($saltF . $pass . $saltL);
                        // viết lệnh update
                        $kh =new user();
                        $kh->updatePassEmail($emailold, $passnew);
                        unset($_SESSION["email"]);
                        echo '<script> alert("Bạn đã thay đổi mật khẩu thành công ");</script>';
                        echo '<meta http-equiv="refresh" content="0;url=/login""/>';
                    }
                    else
                    {
                        echo '<script> alert("Mã xác nhận không đúng ");</script>';
                        echo '<meta http-equiv="refresh" content="0;url=/""/>';
                    }
                    
    
               
            }
           

        }
      
        break;
}
?>