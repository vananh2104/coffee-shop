<?php
include_once "Model/products.php";

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
                <h3><b>
                        <?php echo $productDetail['tensp'] ?>
                    </b></h3>
            </div>
            <div>
                <h3><b style="color: orange;">
                        <?php echo number_format($productDetail['gia'], 0, ',', '.') ?> đ
                    </b></h3>
            </div>
            <div>
                <p>Chọn size(bắt buộc):</p>
                <?php

                $sp = new sanPham();
                $size = $sp->getSizesByProduct();
                while ($set = $size->fetch()):
                    ?>
                    <div class="custom-input">
                        <input type="button" class="custom-button" data-size-id="<?php echo $set['idsize']; ?>"
                            value="<?php echo $set['tensize'] . '+ ' . $set['giasize']; ?> đ">
                    </div>
                <?php endwhile;
                ?>
            </div>
            <div>
                <p>Topping:</p>
                <?php

                $sp = new sanPham();
                $size = $sp->getToppingsByProduct();
                while ($set = $size->fetch()):
                    ?>
                    <div class="custom-input1">
                        <input type="button" class="custom-button1" data-size-id="<?php echo $set['idtopping']; ?>"
                            value="<?php echo $set['tentopping'] . '+ ' . $set['giatopping']; ?> đ">
                    </div>
                <?php endwhile;
                ?>
            </div>
            <div>
                <button><i class="fa fa-motorcycle" aria-hidden="true"> Đặt giao tận nơi</i></button>
            </div>
            <div>

            </div>

        </div>
        <div class="col-md-12">
            <p><b>Mô tả sản phẩm:</b><br>
                <?php echo $productDetail['mota'] ?>
            </p>
        </div>


    </div>
</div>