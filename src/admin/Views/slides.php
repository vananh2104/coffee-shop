<?php
                         $i=0;
                         foreach ($slide as $items) {

                              if ($i==0)
                              {
                                   echo "<div class='carousel-item active'>";     
                              }
                              else
                              {
                                   echo "<div class='carousel-item'>";         
                              }
                              $i++;
                              echo "<img src='../hinh/" . $items['hinh'] . "' class='d-block w-100' height='400' alt='...'>";
                              echo "</div>";
                         
                            }
                        
                         
                    ?>   