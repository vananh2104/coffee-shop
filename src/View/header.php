<div class="sub-header">
    <div class="item">
        <i style="color:orange" class="fa fa-map-marker" aria-hidden="true"> <a href="#"> </i>147 Cửa hàng cả nước</a>
    </div>
    <div class="item">
        <i style="color:orange" class="fa fa-phone" aria-hidden="true"></i><a href="#">Đặt hàng:1800.6936</a>
    </div>
    <!--đk,đnhap,đx-->
    <?php
    if (isset($_SESSION['LastName'])) {
        echo '<div class="item user-action">
    <i style="color:orange"  class="fa fa-user-circle-o" aria-hidden="true"></i><a style="color: red;">
        Hi,' . $_SESSION['FirstName'] . ' ' . $_SESSION['LastName'] . ' </a>
    </div>';
        echo '<div class="item user-action">
    <i style="color:orange"  class="fa fa-sign-out" aria-hidden="true"></i><a href="/logout"> Đăng xuất</a>
    </div>';
    } else {
        echo '<div class="item user-action">
    <i style="color:orange"  class="fa fa-sign-in" aria-hidden="true"> <a href="/register"></i>Đăng ký</a>
    </div>
    <div class="item user-action">
    <i style="color:orange"  class="fa fa-sign-in" aria-hidden="true"><a href="/login"> </i>Đăng nhập</a>
    </div>';
    }

    ?>
   
    <!--giỏ hàng-->
    <div class="item">
        <a href="/cart"><i style="color:orange" style="font-size: 20px;" class="fa fa-cart-plus"
                aria-hidden="true"></i>
        </a>
    </div>

</div>

<header>
    <div class="title">
        <a href="/">
            <h1>The Coffee House</h1>
        </a>
    </div>

    <!-- menu here -->
    <ul class="menu">

        <?php
        $mn = new menu();
        $result = $mn->getMenu(null);

        while ($set = $result->fetch()):
            ?>
            <li class="menu-item">
                <?php $mn2 = new menu();
                $result2 = $mn2->getMenu($set['id']);
                $itemCount = $result2->fetchColumn();
                ?>

                <a href="<?php echo $set['path'] ?>" data-id="<?php echo $set['id'] ?>">
                    <?php echo $set['name'];
                    if ($itemCount) {
                        echo '<span style="font-size: 8px;">▼</span>';
                    }
                    ?>
                </a>
                <?php if (!$itemCount) {
                    continue;
                } ?>
                <ul class="menu navigation-<?php echo $set['id'] ?> level-1">
                    <?php

                    //lấy từng sản phẩm dùng vòng lặp
                    while ($set2 = $result2->fetch()):
                        ?>
                        <li class="menu-item">
                            <a href="<?php echo $set2['path'] ?>" data-id="<?php echo $set2['id'] ?>">
                                <?php echo $set2['name']; ?>
                            </a>
                            <ul class="menu-sub navigation-<?php echo $set2['id'] ?> level-2">
                                <?php
                                $mn3 = new menu();
                                $result3 = $mn3->getMenu($set2['id']);

                                while ($set3 = $result3->fetch()):
                                    ?>
                                    <li><a href="<?php echo $set3['path'] ?>">
                                            <?php echo $set3['name']; ?>
                                        </a></li>
                                    <?php
                                endwhile
                                ?>
                            </ul>
                        </li>

                        <?php
                    endwhile
                    ?>
      
                </ul>
            </li>
            <?php
        endwhile
        ?>
    </ul>
    <div class="item search-bar">
        <form class="form-inline" action="/timkiem?act=timkiem" method="post">
            <div class="input-group">
                <input type="text" name="timkiem" class="form-control" placeholder="Tìm kiếm">
                <div class="input-group-append">
                    <button class="btn btn-outline-secondary" type="submit" id="btsearch">
                        <i class="fa fa-search"></i>
                    </button>
                </div>
            </div>
        </form>
    </div>
  

</header>