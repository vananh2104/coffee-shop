<?php
include_once "Model/sanpham.php";

$sp = new sanPham();
// Xđ trang hiện tại từ tham số trên URL
$page = isset($_GET['page']) ? (int)$_GET['page'] : 1;
$perPage = 4;
// Lấy dữ liệu phân trang
$result = $sp->getPhanTrangTea($perPage, $page);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="content/styles/style.css">
</head>
<body>
    <h3>Trà Tại Nhà</h3>
    <div class="container">
        <div class="row">
            <?php while ($set = $result->fetch()): ?>
                <div class="col-md-3">
                    <?php $image = $sp->getImage($set['idsp']) ?>
                    <img src="./content/images/<?php echo $image['tenhinh'] ?>" width="100%" alt="" />
                    <p><b><?php echo $set['tensp'] ?></b><br><?php echo $set['gia'] ?> đ</p>
                </div>
            <?php endwhile ?>
        </div>      
        <!-- Hiển thị liên kết phân trang -->
        <?php
        $totalPages = $sp->getTotalPagesTea($perPage);
        for ($i = 1; $i <= $totalPages; $i++): ?>
            <a href="?page=<?php echo $i; ?>"><?php echo $i; ?></a>
        <?php endfor; ?>
    </div>
</body>
</html>
