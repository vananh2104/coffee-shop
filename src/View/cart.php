<div class="table-responsive">
  <?php  
    include_once "Model/products.php";
    $sp = new sanPham();
  if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {

    ?>
    <form action="/cart?action=cart&act=update_cart" method="post">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td colspan="5">
              <h2 style="color: red;">THÔNG TIN GIỎ HÀNG</h2>
            </td>
          </tr>
          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th colspan="2">Giá</th>
          </tr>
        </thead>
        <tbody>
          <?php
          // $index = 0;
          foreach ($_SESSION['cart'] as $key => $item):
            ?>
            <tr>
              <!-- <form method="put" action="/cart?action=cart&act=cart_update&id=<?php echo $key; ?>"> -->
              <td><?php echo $key + 1?></td>
              <td>
              <?php
                $image = $sp->getImage($item['idsp']);
                ?>  
              <img width="50px" height="50px" src="/content/images/<?php echo $image['tenhinh'] ?>">
              <a href="/products/<?php echo $item['idsp']; ?>"><?php echo $item['tensp']; ?></a>
                
              </td>
              <td>Size:
                <!-- TODO hien thi ten size va topping -->
                <?php echo '<span class="size-item">' . $item['size']['tensize'] . ' + ' . $item['size']['giasize'] . '</span>' ?> 
                <br> Topping:
                <ul>
                <?php
                foreach ($item['toppings'] as $toppingKey => $toppingItem):
                  // $item['dongia'] += $toppingItem['giatopping'];
                  echo '<li class="cart-topping-item">' . $toppingItem["tentopping"] . ' + ' . $toppingItem["giatopping"] . '</li>';
                endforeach; ?>
                </ul>
              </td>
              <td>Đơn Giá:
                <?php echo $item['dongia']; ?> - Số Lượng: <input type="text" name="newqty[<?php echo $key; ?>]"
                  value="<?php echo number_format($item['soluong']); ?>" /><br />
                <p style="float: right;"> Thành Tiền
                <?php
                $sum=0;
                foreach ($item['toppings'] as $toppingKey => $toppingItem):                
                   $item['dongia'] += $toppingItem['giatopping'];
                endforeach; 
                $sum=$item['dongia'] + $item['size']['giasize'] ;    
                echo number_format($item['soluong'] * $sum);echo"<sup><u>đ</u></sup>";
                ?>
                </p>
              </td>
              <td><a href="/cart?action=cart&act=cart_delete&id=<?php echo $key; ?>"><button type="button"
                    class="btn btn-danger">Xóa</button></a>

                <button type="submit" class="btn btn-secondary" onclick="updateCart()">Sửa</button>

              </td>
              </form>
            </tr>
          <?php
          endforeach;
          ?>
          <tr>
            <td colspan="3">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b>
                <?php
                $gh = new cart();
                echo $gh->subTotal();
                ?> <sup><u>đ</u></sup>
              </b>
            </td>
            <td><a href="/thanhtoan?act=thanhtoan">Thanh toán</a></td>
          </tr>
        </tbody>
      </table>
    <!-- </form> -->
  <?php
  } else {
    echo '<script>alert("Giỏ hàng chưa có hàng");</script>';
    echo '<meta http-equiv="refresh" content="0; url=/"/>';
  }
  ?>
</div>
</div>
<!-- -->


