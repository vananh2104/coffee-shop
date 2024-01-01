<?php
include_once "Model/products.php";
include_once "Model/menu.php";
$menu = new menu();
$path = $_SERVER['PATH_INFO'];

$m = $menu->getMenuByPath($path);

$sp = new sanPham();
// Xđ trang hiện tại từ tham số trên URL
$page = isset($_GET['page']) ? (int) $_GET['page'] : 1;
$perPage = 4;
// Lấy dữ liệu phân trang
$result = $sp->getProductsByMenu($m['id'], $perPage, $page);
if (!$result) {
    include_once "View/not-found.php";
    return;

}
?>

<h3>
    <?php echo $m['name'] ?>
</h3>
<div class="container">
    <div class="row">
        <?php while ($set = $result->fetch()): ?>
            <div class="col-md-3">
                <?php $image = $sp->getImage($set['idsp']) ?>
                <a href="/products/<?php echo $set['idsp']?>">
                <img src="/content/images/<?php echo $image['tenhinh'] ?>" width="100%" alt="" />
                <p><b>
                        <?php echo $set['tensp'] ?>
                    </b><br>
                    <?php echo number_format($set['gia'], 0, ',', '.') ?>  đ
                </p>
                </a>
            </div>
        <?php endwhile ?>
    </div>
    <!-- Hiển thị liên kết phân trang -->
    <?php
    $totalPages = $sp->getTotalPages($m['id'], $perPage);
    for ($i = 1; $i <= $totalPages; $i++): ?>
        <a href="?page=<?php echo $i; ?>">
            <?php echo $i; ?>
        </a>
    <?php endfor; ?>
</div>