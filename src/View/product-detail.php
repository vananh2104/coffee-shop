<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <style>
        .btn-selected {
            background-color: #ff0000;
            color: #ffffff;
        }
    </style>
</head>

<body>

    <?php
    // Assuming this is a part of a larger PHP file
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
                <form action="/cart?action=cart&act=cart_action" method="post" id="productForm">
                    <div>
                        <h3><b>
                                <?php echo $productDetail['tensp'] ?>
                            </b></h3>
                        <input type="hidden" name="idsp" value="<?php echo $productDetail['idsp'] ?>" />
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
                                <input name="size" type="button" class="custom-button"
                                    id="sizeButton_<?php echo $set['idsize']; ?>" data-size-id="<?php echo $set['idsize']; ?>"
                                    value="<?php echo $set['tensize'] . '+ ' . $set['giasize']; ?> đ"
                                    onclick="SelectedSize(this, <?php echo $set['idsize']; ?>, <?php echo $set['giasize']; ?>)">
                            </div>
                        <?php endwhile; ?>
                        <input type="hidden" id="size" name="size"/>
                        <input type="hidden" id="giasize" name="giasize"/>
                        <script>
                            function SelectedSize(element, idsize, giasize) {
                                var inputs = document.querySelectorAll('.custom-button');
                                inputs.forEach(function (input) {
                                    input.style.backgroundColor = '';
                                });
                                element.style.backgroundColor = 'orange';
                                document.getElementById("size").setAttribute("value", idsize);
                                document.getElementById("giasize").setAttribute("value", giasize);
                            }
                        </script>
                        <p>Topping:</p>
                        <input type="hidden" id="toppings" name="toppings"/>
                        <?php
                        $sp = new sanPham();
                        $topping = $sp->getToppingsByProduct();
                        while ($set = $topping->fetch()):
                            ?>
                            <div class="custom-input1">
                                <input type="button" class="topping-input" data-selected='0' data-topping-id="<?php echo $set['idtopping']; ?>"
                                    value="<?php echo $set['tentopping'] . '+ ' . $set['giatopping']; ?> đ"
                                    onclick="SelectedTopping(this)">
                            </div>
                        <?php endwhile;
                        ?>
                        <script>
                           // JavaScript (jQuery)
                                $(document).ready(function() {
                                    $('#addToCartBtn').click(function(e) {
                                        // Ngăn chặn mặc định hành vi gửi submit của form
                                        e.preventDefault();

                                        var selectedSize = $('#size').val();
                                        var  selectedtopping = $('#toppings').val();

                                        // Kiểm tra xem đã chọn size hay chưa
                                        if (selectedSize === '') {
                                            // Hiển thị thông báo nếu không chọn size
                                            alert("Bạn chưa chọn size sản phẩm.");
                                            return; // Dừng xử lý tiếp theo
                                        } 
                                        else if(selectedtopping=='') 
                                        {
                                            alert("Bạn chưa chọn toppings.");
                                            return; // Dừng xử lý tiếp theo

                                        }
                                        else
                                        {
                                                 
                                        // Nếu đã chọn size, tiếp tục gửi form
                                        $('#productForm').submit();
                                        }


                                    });
                                });

                            function SelectedTopping(element) {
                                
                                var selected = element.getAttribute("data-selected");
                                if (selected == 0) {
                                    element.style.backgroundColor = 'orange';
                                    element.setAttribute("data-selected", 1);
                                } else {
                                    element.style.backgroundColor = '';
                                    element.setAttribute("data-selected", 0);
                                }
                                var inputs = document.querySelectorAll('.topping-input');
                                var ids = [];
                                inputs.forEach(function (input) {
                                    var selectedInput = input.getAttribute("data-selected");
                                    if(selectedInput == 1)
                                    {
                                        ids.push(input.getAttribute("data-topping-id"));
                                    }
                                });
                                document.getElementById("toppings").setAttribute("value", ids);
                            }
                        </script>
                    </div>
                    <br /><br /><br /><br/>
                    <div  class="custom-input">
                        <p style="margin-right: 50px;">Số lượng:</p>
                        <input type="number" id="soluong" name="soluong" min="1" max="100" value="1" size="15" />
                    </div>
                    <div>
                        <button id="addToCartBtn" type="submit" class="fa fa-motorcycle" aria-hidden="true" > Đặt giao tận nơi</button>
                    </div>
                </form>
            </div>
            <div class="col-md-12">
                <p><b>Mô tả sản phẩm:</b><br>
                    <?php echo $productDetail['mota'] ?>
                </p>
            </div>
        </div>
    </div>

</body>

</html>
