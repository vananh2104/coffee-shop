<?php
include_once "Model/connect.php";
include_once "Model/menu.php";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Coffee Shop</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css"
        integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Font+Name&display=swap">
    <!-- <link rel="stylesheet" href="path/to/your/font.css"> -->
    <link rel="stylesheet" type="text/css" href="content/styles/style.css">

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM"
        crossorigin="anonymous"></script>
    <script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.4.1.min.js"></script>

</head>

<body>
        <!-- header -->
        <?php include_once "View/header.php"; ?>
        <!-- content -->
        <!-- <div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="./content/images/21.jpg" width="100%" alt="">
        </div>

        <div class="col-md-6">
            <div class="row">
                <div class="col-md-6">
                    <img src="./content/images/1.jpg" width="100%" alt="">
                    <p><b> CloudFee Hạnh Nhân Nướng</b><br>49.000 đ</p>
                </div>

                <div class="col-md-6">
                    <img src="./content/images/2.jpg" width="100%" alt="">
                    <p><b>The Coffee House Sữa Đá</b><br>39.000 đ</p>
                   
                </div>
            </div>
        </div>
    </div>
</div> -->
<!---->
<?php include_once "View/product-home.php"; ?>

<!-- <div class="container">
    <div class="row">
        <div class="col-md-3">
          <img src="./content/images/4.jpg" width="100%" alt="">
                    <p><b>Hi-Tea Vải</b><br>49.000 đ</p>
        </div>
        <div class="col-md-3">
          <img src="./content/images/3.jpg" width="100%" alt="">
                    <p><b>Cà Phê Sữa Đá</b><br>29.000 đ</p>
        </div>
        <div class="col-md-3">
          <img src="./content/images/6.jpg" width="100%" alt="">
                    <p><b>Bánh Mì VN Thịt Nguội</b><br>39.000 đ</p>
        </div>
        <div class="col-md-3">
          <img src="./content/images/5.jpg" width="100%" alt="">
                    <p><b>MoChi Kem Chocolate</b><br>19.000 đ</p>
        </div>

      
        </div>
    </div>
</div> -->
<!---->


        <!-- footer -->
        <?php include_once "View/footer.php"; ?>
    <!-- </div> -->
</body>

</html>