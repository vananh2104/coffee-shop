

<div class="container-fluid">
        <div class="container-fluid">
          <div class="card">
            <div class="card-body">
              <h5 class="card-title fw-semibold mb-4">Thêm sản phẩm</h5>
              <div class="card mb-0">
                <div class="card-body">
                  <form method="post" action="/admin/?act=editadd" enctype="multipart/form-data">
                    <fieldset>
                      <div class="mb-3">
                        <label for="" class="form-label">Tên sản phẩm</label>
                        <input type="text" name="tensp" id="tensp" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Giá</label>
                        <input type="text" name="gia" id="gia" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Mô tả</label>
                        <input type="text" name="mota" id="mota" class="form-control">
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Bán chạy (1:là bán chạy 0:là không chạy)</label>
                        <input type="text" name="banchay" id="banchay" class="form-control" >
                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Loại sản phẩm</label>
                        
                        <select id="loaisp" name="idloai" class="form-select">
                                <?php
                                foreach ($listtype as $item) {
                                    echo '<option value="' . $item["idloai"] . '">' . $item["tenloai"] . '</option>';
                                }
                                ?>
                            </select>

                      </div>
                      <div class="mb-3">
                        <label for="" class="form-label">Menu</label>

                        
                        <select id="loaisp" name="idmenu" class="form-select">
                                <?php
                                foreach ($listmenu as $item) {
                                    echo '<option value="' . $item["Id"] . '">' . $item["Name"] . '</option>';
                                }
                                ?>
                            </select>

                      </div>
                     
                      <button type="submit" class="btn btn-primary">Thêm</button>
                    </fieldset>
                  </form>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>

