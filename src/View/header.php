<div class="sub-header">
    <div class="item">
        <a href="#"> <i class="fa fa-map-marker" aria-hidden="true"></i>147 Cửa hàng khắp cả nước</a>
    </div>
    <div class="item">
        <a href="#"> <i class="fa fa-phone" aria-hidden="true"></i>Đặt hàng:1800.6936</a>
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
        $result = $mn->getMenu(null); //1 bảng chứa 8 sp
        //lấy từng sản phẩm dùng vòng lặp
        while ($set = $result->fetch()):
            ?>
            <li class="menu-item">
                <?php $mn2 = new menu();
                $result2 = $mn2->getMenu($set['id']); //1 bảng chứa 8 sp 
                $itemCount = $result2->fetchColumn();
                ?>

                <a href="<?php echo $set['path'] ?>" data-id="<?php echo $set['id'] ?>">
                    <?php echo $set['name'];
                    if ($itemCount) {
                        echo "▼";
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
                                $result3 = $mn3->getMenu($set2['id']); //1 bảng chứa 8 sp 
                                //lấy từng sản phẩm dùng vòng lặp
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
</header>