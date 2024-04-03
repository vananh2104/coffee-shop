<div class="col-lg-12" style="min-height:50px;">
    <h2 style="text-align: center; background-color: #fbfcff;">Products detail</h2>
</div>
<div class="col-lg-6 col-sm-12" style="max-width:500px">
    <?php
        echo "<img src='../hinh/" . $row["hinh"] . "' class='img-fluid w-100' alt='Hình sản phẩm'>";
    ?>
</div>
<div class="col-lg-6 col-sm-12">
    <?php
        echo "<h2 class='mt-4'>" . $row["ten_giay"] . "</h2>";
        echo "<p class='lead'>" . $row["mota"] . "</p>";      
        echo "<div class='mb-3'>";
        echo "<span class='text-danger h4'>Giá gốc: <del>" . number_format($row["gia_goc"]) . "đ</del></span>";
        echo "</div>";
        echo "<h3 class='text-success'>Giá bán: " . number_format($row["gia_khuyenmai"]) . "đ</h3>";
    ?>
    <div class="mt-4">
        <?php 
            echo "<div class='card-footer'><a class='btn btn-primary btn-sm' href=\"?act=cart&id=" . $row["id"] . "\">Mua ngay</a></div>"; 
        ?>
    </div>
</div>
