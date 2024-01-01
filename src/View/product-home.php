<?php include_once "Model/products.php";
?>
<?php
include_once "slide.php";
?>
<!--cột sp-->
<div class="container">
    <div class="row">
        <?php
        $sp = new sanPham();
        $result = $sp->getBestSeller(8);
        while ($set = $result->fetch()):
            ?>
            <div class="col-md-3">
                <a href="/products/<?php echo $set['idsp']?>">
                <?php $image = $sp->getImage($set['idsp']) ?>
                <img src="./content/images/<?php echo $image['tenhinh'] ?>" width="100%" alt="" />
                <p><b>
                        <?php echo $set['tensp'] ?>
                    </b><br>
                    <?php echo number_format($set['gia'], 0, ',', '.') ?>  đ
                </p>
                </a>
            </div>
            <?php
        endwhile
        ?>
    </div>
    <!--trà xanh tây bắc-->
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


</div>
<!--thông tin chuyện nhà-->
<div class="content-wrapper">
    <h2 style="text-align: center;"><i class="fa fa-coffee" aria-hidden="true">Chuyện Nhà</i></h2>
    <!--coffeeholic-->
    <h3 style=" border-left: 5px solid orange;  padding-left: 8px; ">Coffeeholic</h3>
    <div class="row ">
        <div class="col-md-4">
            <img src="./content/images/13.jpg" alt="">
            <p>30/10/2023</p>
            <!-- <h5>CHỈ CHỌN CÀ PHÊ MỖI SÁNG NHƯNG CŨNG...</h5> -->
            <h6>CHỈ CHỌN CÀ PHÊ MỖI SÁNG NHƯNG CŨNG...</h6>
            <p>Thực chất, bạn không nhất thiết phải làm gì to tát<br> để tạo nên một ngày rực rỡ. Chỉ cần bắt đầu từ<br>
                những việc nhỏ nhặt nhất, khi bạn...</p>
        </div>
        <div class="col-md-4">
            <img src="./content/images/11.jpg" alt="">
            <p>12/02/2023

            </p>
            <h6>SIGNATURE - BIỂU TƯỢNG VĂN HOÁ CÀ PH...</h6>
            <p>Mới đây, các "tín đồ" cà phê đang bàn tán xôn<br> xao về SIGNATURE - Biểu tượng văn hóa cà phê <br>của The
                Coffee House đã quay trở lại.Một lời...</p>
        </div>
        <div class="col-md-4">
            <img src="./content/images/12.jpg" alt="">
            <p>9/12/2023</p>
            <h6>UỐNG GÌ KHI TỚI SIGNATURE BY THE...</h6>
            <p>Vừa qua, The Coffee House chính thức khai trương<br> cửa hàng SIGNATURE by The Coffee House, chuyên
                <br>phục vụ
                cà phê đặc sản, các món ăn đa bản sắc ấy...</p>
        </div>
        <div>
            <!--teaholic-->
            <h3 style=" border-left: 5px solid orange;  padding-left: 8px; ">Teaholic</h3>
            <div class="row ">
                <div class="col-md-4">
                    <img src="./content/images/7.jpg" alt="">
                    <p>19/09/2023

                    </p>
                    <h6>TRUNG THU NÀY, SAO BẠN KHÔNG TỰ CH...</h6>
                    <p>Bạn có từng nghe: “Trung thu thôi mà, có gì đâu <br>mà chơi” hay “Trung thu càng ngày càng
                        chán”...?<br>
                        Sự bận rộn đến mức “điên rồ” đã khiến chúng...</p>
                </div>
                <div class="col-md-4">
                    <img src="./content/images/14.jpg" alt="">
                    <p>16/01/2023
                    </p>
                    <h6>BỘ SƯU TẬP CẦU TOÀN KÈO THƠM: "VÍA"...</h6>
                    <p>Tết nay vẫn giống Tết xưa, không hề mai một nét<br> văn hoá truyền thống mà còn thêm vào những
                        hoạt<br>động “xin vía” hiện đại, trẻ trung. Ví như...</p>

                </div>
                <div class="col-md-4">
                    <img src="./content/images/16.jpg" alt="">

                    <p>16/08/2022</p>
                    <h6>“KHUẤY ĐỂ THẤY TRĂNG" - KHUẤY LÊN...</h6>
                    <p>
                        Năm 2022 là năm đề cao sức khỏe tinh thần nên<br> giới trẻ muốn tận hưởng một Trung thu với
                        nhiều <br>trải nghiệm mới mẻ, rôm rả cùng bạn bè...</p>
                </div>
            </div>
            <div>
                <!--blog-->
                <h3 style=" border-left: 5px solid orange;  padding-left: 8px; ">Blog</h3>
                <div class="row ">
                    <div class="col-md-4">
                        <img src="./content/images/23.jpg" alt="">
                        <p>16/08/2023</p>
                        <h6>NGƯỢC LÊN TÂY BẮC GÓI VỊ MỘC VỀ XUÔI</h6>
                        <p>Những dải ruộng bậc thang, các cô gái Thái với<br> điệu múa xòe hoa, muôn cung đường ngợp mùa<br>
                            hoa… đó là rẻo cao Tây Bắc luôn làm say lòng...</p>
                    </div>
                    <div class="col-md-4">
                        <img src="./content/images/30.jpg" alt="">
                        <p>10/07/2023

                        </p>
                        <h6>ĐI "VAY LẠNH" - TỪ VỰNG HẸN HÒ MỚI NỔ...</h5>
                        <p>Đi “vay lạnh” - từ vựng hẹn hò mới nổi, cập nhật <br>ngay kẻo lỗi thời Nếu “đi trà sữa”, “đi
                            đu đưa”...<br> đã trở thành những lời rủ rê...</p>
                    </div>
                    <div class="col-md-4">
                        <img src="./content/images/31.jpg" alt="">
                        <p>01/07/2023</p>
                        <h6>NGHE NHÀ MÁCH NHỎ BÍ KÍP HEALTHY GỌ...</h6>
                        <p>Sống lành mạnh (healthy) đang là xu hướng được <br> nhiềungười trẻ ưa chuộng. Tuy nhiên,
                            không
                            đơn<br> thuần là việc chăm chút đi theo các chế độ ăn uống...</p>
                    </div>
                </div>
            </div>
