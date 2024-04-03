<div class="inner-header">
    <div class="container">
        <div class="pull-left">
            <h6 class="inner-title h2" style="text-align: center;">Đặt hàng</h6>
        </div>
        <div class="clearfix"></div>
    </div>
</div>
<div class="container">
    <div id="content">
        <form action="thanhtoan.php" method="post" class="beta-form-checkout">
            <div class="row">
                <div class="col-sm-1"></div>
                <div class="col-sm-5">
                    <div class="space20">&nbsp;</div>

                    <div class="form-block">
                        <label for="name">Họ tên*</label>
                        <input type="text" id="name" name="name" placeholder="Họ tên" required>
                    </div>
                    <div class="form-block">
                    <label>Giới tính </label>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nam" checked="checked" style="width: 10%"><span style="margin-right: 10%">Nam</span>
							<input id="gender" type="radio" class="input-radio" name="gender" value="nữ" style="width: 10%"><span>Nữ</span>
                    </div>

                    <div class="form-block">
                        <label for="email">Email*</label>
                        <input type="email" id="email" name="email" required placeholder="example@gmail.com">
                    </div>

                    <div class="form-block">
                        <label for="address">Địa chỉ*</label>
                        <input type="text" id="address" name="address" placeholder="Street Address" required>
                    </div>

                    <div class="form-block">
                        <label for="phone">Điện thoại*</label>
                        <input type="text" id="phone" name="phone" required>
                    </div>

                    <div class="form-block">
                        <label for="notes">Ghi chú</label>
                        <textarea id="notes" name="notes"></textarea>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="your-order">
                        <div class="your-order-head">
                        </div>
                        <div class="your-order-body" style="padding: 0px 10px">
                            <div class="your-order-item">
                                <div>
                                    <!--  one item	 -->
                                    <div class="media">
                                        <div class="media-body">
                                        <?php

                                                if (isset($_SESSION["giohang"])) {
                                                    $sum=0;
                                                    foreach ($_SESSION["giohang"] as $item) {
                                                        $sum+=$item['soluong']*$item["gia"];
                                                        echo "Tên: " . $item['ten'] . "<br>";
                                                        echo "Giá: " . $item['gia'] . "<br>";
                                                        echo "Số Lượng: " . $item['soluong'] . "<br>";
                                                        echo "----------------------------------------<br>";
                                                    }
                                                    echo "Tổng thành tiền :".$sum;
                                                    // Hủy session giohang
                                                    // unset($_SESSION["giohang"]);
                                                    // hoặc sử dụng session_destroy() nếu bạn muốn hủy toàn bộ session
                                                    // session_destroy();
                                                } else {
                                                    echo "Bạn chưa thêm vào giỏ hàng sản phẩm nào";
                                                }

                                                ?>
                                        </div>
                                    </div>
                                    <!-- end one item -->
                                    <div class="clearfix"></div>
                                </div>
                            </div>
                        </div>

                        <div class="your-order-head">
                            <h5>Hình thức thanh toán</h5>
                        </div>
                    <select name="thanhtoan">
                        <option value="Thanh toán khi nhận hàng">Thanh toán khi nhận hàng</option>
                        <option value="Chuyển khoản">Chuyển khoản</option>
                     </select>
                <div class="text-center"><button type="submit" class="beta-btn primary">Đặt hàng <i class="fa fa-chevron-right"></i></button></div>
                    </div> <!-- .your-order -->
                </div>
                <div class="col-sm-1"></div>
            </div>
        </form>
    </div> <!-- #content -->
</div> <!-- .container -->

