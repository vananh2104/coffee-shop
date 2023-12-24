<?php
include_once "Model/sanpham.php";

$path = $_SERVER['PATH_INFO'];
$idsp = explode("/", $path)[2];
$sp = new sanPham();
$productDetail = $sp->getProductById($idsp);

?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <?php
            $image = $sp->getImage($productDetail['idsp']);
            ?>
            <img src="/content/images/<?php echo $image['tenhinh'] ?>" width="80%" alt="" />
        </div>
        <div class="col-md-6">
            <div>
                <?php echo $productDetail['tensp'] ?>
            </div>
            <div>
                <?php echo $productDetail['gia'] ?>
            </div>
            <div>
                <?php echo $productDetail['size'] ?>
            </div>
            
        </div>
        <div class="col-md-12">
            <p><b>Mô tả sản phẩm:</b><br>
                <?php echo $productDetail['mota'] ?>
            </p>
        </div>
    </div>
</div>
