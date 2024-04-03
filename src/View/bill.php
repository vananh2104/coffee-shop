<style>
  .table-bordered {
    border: 1px solid #dee2e6;
  }

  .table-bordered th,
  .table-bordered td {
    border: 1px solid #dee2e6;
    padding: 8px;
  }

  .table-bordered thead th {
    background-color: #f8f9fa;
    border-bottom-width: 2px;
  }

  .table-bordered tbody tr:hover {
    background-color: #f5f5f5;
  }

  .btn-primary {
    background-color: #007bff;
    color: #fff;
    border: none;
    padding: 8px 16px;
    border-radius: 4px;
    text-decoration: none;
  }

  .btn-primary:hover {
    background-color: #0056b3;
  }
</style>
<div class="table-responsive">
  <?php
  include_once "Model/products.php";
  $sp = new sanPham();

  if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) :
  ?>
    <form action="/cart?action=cart&act=update_cart" method="post">
      <table class="table table-bordered">
        <thead>
          <tr>
            <td colspan="5">
              <h3 class="text-danger text-center">THÔNG TIN ĐẶT HÀNG</h3>
            </td>
          </tr>
          <tr>
            <td colspan="5" class="text-center">
              <?php if (isset($_SESSION['LastName'])) : ?>
                <h5>Tên: <?php echo $_SESSION['FirstName'] . ' ' . $_SESSION['LastName']; ?></h5>
                <tr>
                  <td>Mã số hóa đơn: <?php echo $_SESSION['masohd']; ?></td>
                  <td>Ngày đặt hàng: <?php echo date("d/m/Y"); ?></td>
                  <td>Địa chỉ: <?php echo $_SESSION['Address']; ?></td>
                  <td>Số điện thoại: <?php echo $_SESSION['PhoneNumber']; ?></td>
                </tr>
              <?php else :
                echo '<script>alert("Bạn chưa đăng nhập");</script>';
                echo '<meta http-equiv="refresh" content="0; url=/login"/>';
              ?>
              <?php endif; ?>
            </td>
          </tr>
          <tr class="table-success">
            <th>Số TT</th>
            <th>Thông Tin Sản Phẩm</th>
            <th>Tùy Chọn Của Bạn</th>
            <th>Đơn Giá</th>
            <th>Số Lượng</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($_SESSION['cart'] as $key => $item) : ?>
            <tr>
              <td><?php echo $key + 1 ?></td>
              <td>
                <?php
                $image = $sp->getImage($item['idsp']);
                ?>
                <img width="50px" height="50px" src="/content/images/<?php echo $image['tenhinh'] ?>" alt="Product Image">
                <a href="/products/<?php echo $item['idsp']; ?>">
                  <?php echo $item['tensp']; ?>
                </a>
              </td>
              <td>
                Size: <?php echo '<span class="size-item">' . $item['size']['tensize'] . ' + ' . $item['size']['giasize'] . '</span>' ?><br>
                Topping:
                <ul>
                  <?php foreach ($item['toppings'] as $toppingKey => $toppingItem) :
                    echo '<li class="cart-topping-item">' . $toppingItem["tentopping"] . ' + ' . $toppingItem["giatopping"] . '</li>';
                  endforeach; ?>
                </ul>
              </td>
              <td>
                <?php echo $item['dongia']; ?>
              </td>
              <td>
                <input readonly type="text" name="newqty[<?php echo $key; ?>]" value="<?php echo number_format($item['soluong']); ?>" />
              </td>
            </tr>
          <?php endforeach; ?>
          <tr>
            <td colspan="4">
              <b>Tổng Tiền</b>
            </td>
            <td style="float: right;">
              <b><?php $gh = new cart();
                 echo $gh->subTotal(); ?> <sup><u>đ</u></sup></b>
            </td>
           
          </tr>
          <td colspan="5">
              <a href="/thanhtoan?act=thanhtoanne" class="btn btn-primary">Xác nhận</a>
            </td>
          <tr>
         
          </tr>
        </tbody>
      </table>
    </form>
  <?php else :
    echo '<script>alert("Giỏ hàng chưa có hàng");</script>';
    echo '<meta http-equiv="refresh" content="0; url=/"/>';
  endif;
  ?>
</div>
