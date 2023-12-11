<?php include_once "Model/sanpham.php";
?>

<div class="container">
    <div class="row">
        <?php
        $sp = new sanPham();
        $result = $sp->getBestSeller(8);
        while ($set = $result->fetch()):
            ?>
            <div class="col-md-3">
                <?php $image = $sp->getImage($set['idsp']) ?>
                <img src="./content/images/<?php echo $image['tenhinh']?>" width="100%" alt="" />
                <p><b>
                        <?php echo $set['tensp'] ?>
                    </b><br>
                    <?php echo $set['gia'] ?> đ
                </p>
            </div>
            <?php
        endwhile
        ?>
    </div>
</div>
</div>