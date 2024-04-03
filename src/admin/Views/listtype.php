<?php
  $ten_loai ="";
foreach ($list as $row) {
                              $ten_giay = $row["ten_giay"];
                              $id_giay=$row["id_giay"];
                              $gia_km = $row["gia_khuyenmai"];
                              $gia_goc = $row["gia_goc"];
                              $hinh = $row["hinh"];
                              if ($ten_loai != $row["ten_loai"])
                              {
                                   $ten_loai = $row["ten_loai"];
                                   echo "<div class='h2 text-center my-3'>Giày $ten_loai</div>";
                              }
                              echo "<div class=' col-md-3 col-sm-4 col-6 mb-3'>";
                              echo "<div class='  box card h-100 '>";
                              echo "<img src='../hinh/$hinh' class='card-img-top' alt='$hinh'>";
                              echo "<div class='card-body'>";
                              echo "<h5 class='card-title'>$ten_giay</h5>";
                              echo "<p class='card-text float-end'><del>".number_format($gia_goc)."đ</del> <strong>".number_format($gia_km)."đ</strong></p>";
                              echo "<div class='card-footer'><a class='btn btn-primary btn-sm' href='?act=chitiet&id=$id_giay'>Chi tiết </a></div>";
                              echo "</div>";
                              echo "</div>";   
                              echo "</div>";
                            }
                         
                    ?>