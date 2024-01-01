<?php
if (isset($_GET['action']) && $_GET['action'] == 'logout') {
    session_destroy();
    echo "Bạn đã đăng xuất thành công!";
    header("Location: /"); 
    exit();
}
?>
