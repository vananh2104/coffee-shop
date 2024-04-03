  <?php
  $html='';
  foreach($list as $sp  )
  {
    $html .=' <tr>
    <td style="width:15%">'.$sp["tensp"].'</td>
    <td>'.$sp["gia"].'</td>
    <td>'.($sp["banchay"] == 1 ? "Bán chạy" : "Bán không chạy").'</td>
    <td style="width:15%">'.substr($sp["mota"], 0, 50).'</td>
    <td>'.$sp["ngaytao"].'</td>
   
  
    <td colspan="2">
        <a class="btn btn-sm btn-primary" href="/admin/?act=delete&id='.$sp['idsp'].'">Delete</a>
        <a class="btn btn-sm btn-primary" href="/admin/?act=edit&id='.$sp['idsp'].'">Edit</a>
    </td>
  </tr>
    ';
  }

 
  ?>
  
  
  
  
  
  <!---table-->
            <!-- Recent Sales Start -->
            <div class="container-fluid pt-4 px-4">
                <div class="bg-light text-center rounded p-4">
                    <div class="d-flex align-items-center justify-content-between mb-4">
                        <h6 class="mb-0">Recent Salse</h6>
                        <a href="">Show All</a>
                    </div>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr class="text-dark">
                                    <th scope="col">Tên sản phẩm </th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Bán chạy </th>
                                    <th scope="col">Mô tả</th>
                                    <th scope="col">Ngày tạo</th>
                                    <th scope="col" colspan="2">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                               <?php
                               echo $html; 
                               ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- Recent Sales End -->

        <!--end table-->