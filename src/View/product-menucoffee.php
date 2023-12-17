<?php include_once "Model/sanpham.php"; ?>
<?php include_once "Model/connect.php"; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="content/styles/style.css">
</head>
<body>
<h1>Cà phê tại nhà</h1>
<div class="container">
    <div class="row">
        <?php
        $sp = new sanPham();
        $result = $sp->getPhanTrang(12);
        while ($set = $result->fetch()):
            ?>
            <div class="col-md-3">
                <?php $image = $sp->getImage($set['idsp']) ?>
                <img src="./content/images/<?php echo $image['tenhinh'] ?>" width="100%" alt="" />
                <p><b>
                        <?php echo $set['tensp'] ?>
                    </b><br>
                    <?php echo $set['gia'] ?> đ
                </p>
            </div>
            <?php
        endwhile
        ?>
    </div>
</body>
</html>

