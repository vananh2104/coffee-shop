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
                <img src="./content/images/<?php echo $image['tenhinh'] ?>" width="100%" alt="" />
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
    <div class="row mt-5">
    <div class="col-md-6 new-item">
        <?php
        $productId = 17;
        $images = $sp->getImages($productId, 2);
        // Lấy hình t1
        $firstImage = $images->fetch();
        ?>
        <div>
            <img src="./content/images/<?php echo $firstImage['tenhinh']; ?>" />
        </div>
    </div>

    <div class="col-md-6 new-item">
    <?php
    // Lấy hình t2
    $secondImage = $images->fetch();

    // Lấy idsp= 17
    $productInfo = $sp->getProductById($productId);
    ?>
    <img src="./content/images/<?php echo $secondImage['tenhinh']; ?>" />
    <div class="description">
        <?php echo $productInfo['mota']; ?>
    </div>
    <div><a class="try-now">Thử ngay</a></div>
</div>

</div>

    <!-- <div class="container">

        <div class="column image-column">
            <img src="./content/images/17.png" alt="">
        </div>


        <div class="column content-column">
            <img src="./content/images/22.png" alt="">
            <section>
                <p>Được trồng trọt và chăm chút kỹ lưỡng, nuôi dưỡng từ thổ nhưỡng phì nhiêu, nguồn nước mát lành, bao
                    bọc bởi mây và sương cùng nền nhiệt độ mát mẻ quanh năm, những búp trà ở Tây Bắc mập mạp và xanh
                    mướt, hội tụ đầy đủ dưỡng chất, sinh khí, và tinh hoa đất trời.

        </div>
  </di       v>

</    div> -->
</div>