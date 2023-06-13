<?php
session_start();
define('JPATH_BASE', dirname(__FILE__));
require_once "../model/config.php";
require_once "../model/database.php";
require_once "../model/cart.php";

if(isset($_SESSION['user']['temp'])){
    $user_id = $_SESSION['user']['temp'];
}
$cart = new Cart();
$getCartByUserId = $cart->getCartByUserId($user_id);
$totalPrice = 0;
$totalProduct = 0;
foreach($getCartByUserId as $item){
    $totalPrice += (($item['prices'] - (($item['prices'] * $item['sale']) / 100)) * $item['quantity']);
    $totalProduct += $item['quantity'];
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Transport - Hotel HTML Template</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/favicon.ico" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <!-- Libraries Stylesheet -->
    <link href="lib/animate/animate.min.css" rel="stylesheet" />
    <link href="lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet" />
    <link href="lib/tempusdominus/css/tempusdominus-bootstrap-4.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/css/splide.min.css" />

    <!-- Customized Bootstrap Stylesheet -->
    <link href="css/bootstrap.min.css" rel="stylesheet" />

    <!-- Boxicons package -->
    <link href="https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css" rel="stylesheet" />

    <!-- Template Stylesheet -->
    <link href="css/style.css" rel="stylesheet" />
    <link rel="stylesheet" href="./css/stylecustom.css" />
</head>

<body>
    <div class="bg-white p-0">
        <!-- Spinner Start -->
        <div id="spinner"
            class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
            <div class="spinner-border text-primary" style="width: 3rem; height: 3rem" role="status">
                <span class="sr-only">Loading...</span>
            </div>
        </div>
        <!-- Spinner End -->


        <!-- Content start-->
        <section class="payment">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="payment-left">
                            <div class="content">
                                <div class="title">Yenvina - Super Yen</div>
                                <div class="breadcrumb">
                                    <ol class="breadcrumb-shop p-0">
                                        <li>
                                            <a class="active" href="index.php"><span>Trang chủ</span></a>
                                        </li>
                                        <li>
                                            <a class="active" href="index.php"><span>Thông tin giao hàng</span></a>
                                        </li>
                                        <li>Giỏ hàng<span> (<?=$totalProduct?>)</span></li>
                                    </ol>
                                </div>
                            </div>
                            <div class="form-transport">
                                <form action="./print_bill.php" method="post">
                                    <div class="group-info">
                                        <div class="title mb-3">Phương thức vận chuyển</div>
                                        <div class="form-group mb-0">
                                            <input type="radio" name="transport" value="Phí ship dựa trên kilomet thực nhận" id="ship1" hidden checked>
                                            <label for="ship1">
                                                Phí ship dựa trên kilomet thực nhận
                                                <span>0d</span>
                                            </label>
                                        </div>
                                        <div class="form-group">
                                            <input type="radio" name="transport" id="ship2" value="Phí ship dựa trên quãng đường đi được" hidden>
                                            <label for="ship2">
                                                Phí ship dựa trên kilomet thực nhận
                                                <span>0d</span>
                                            </label>
                                        </div>
                                    </div>
                                    <div class="group-info">
                                        <div class="title mb-3">Phương thức thanh toán</div>
                                        <div class="form-group mb-0">
                                            <input type="radio" name="payment" id="payment1" value="Thanh toán khi nhận hàng" hidden checked>
                                            <label for="payment1">
                                                Thanh toán khi nhận hàng
                                                <span>0d</span>
                                            </label>
                                        </div>
                                        <!-- <div class="form-group">
                                            <input type="radio" name="ship2" id="payment2" hidden>
                                            <label for="payment2">
                                                Phí ship dựa trên kilomet thực nhận
                                                <span>0d</span>
                                            </label>
                                        </div> -->
                                    </div>
                                    <div class="form-group d-flex align-items-center mt-4">
                                        <div class="w-100"><a href="./cart.php">Giỏ Hàng</a></div>
                                        <button class="w-100 btn-payment" type="submit">Tiếp tục thanh toán</button>
                                    </div>
                                </form>
                            </div>
                            <!-- <div class="footer"></div> -->
                        </div>
                    </div>
                    <div class="col-lg-1"></div>
                    <div class="col-lg-5 col-md-12 col-12">
                        <div class="payment-right">
                            <?php foreach($getCartByUserId as $item){ ?>
                                <div class="product-cart row gx-2 align-items-center">
                                    <div class="col-lg-9 col-md-12 col-12">
                                        <div class="group-prod">
                                            <div class="left" --i="<?=$item['quantity']?>">
                                                <img src="./img/product/<?= $item['thumbnail'] ?>" alt="">
                                            </div>
                                            <div class="right">
                                                <p><?=$item['name']?></p>
                                                <span><?=$item['weight']?></span>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-12 col-12">
                                        <div class="price"><?=number_format(($item['prices'] - (($item['prices'] * $item['sale']) / 100)) * $item['quantity'])?>VND</div>
                                    </div>
                                </div>
                            <?php } ?>
                            <div class="voucher">
                                <form action="">
                                    <div class="voucher-gr form-group">
                                        <input class="form-control" type="text" name="voucher" placeholder="Ma giam gia">
                                        <button class="form-control" type="submit">Su dung</button>
                                    </div>
                                </form>
                            </div>
                            <div class="line-under-opa"></div>
                            <div class="transport">
                                <div class="item mb-2">
                                    <span>Trạm tính</span>
                                    <span><b>1,900,000d</b></span>
                                </div>
                                <div class="item">
                                    <span>Phí vận chuyển</span>
                                    <span><b>0d</b></span>
                                </div>
                            </div>
                            <div class="line-under-opa"></div>
                            <div class="all-price">
                                <span><b>Tổng cộng</b></span>
                                <span><b>VND <?=number_format ($totalPrice)?></b></span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content end-->
    </div>

    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="lib/wow/wow.min.js"></script>
    <script src="lib/easing/easing.min.js"></script>
    <script src="lib/waypoints/waypoints.min.js"></script>
    <script src="lib/counterup/counterup.min.js"></script>
    <script src="lib/owlcarousel/owl.carousel.min.js"></script>
    <script src="lib/tempusdominus/js/moment.min.js"></script>
    <script src="lib/tempusdominus/js/moment-timezone.min.js"></script>
    <script src="lib/tempusdominus/js/tempusdominus-bootstrap-4.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@splidejs/splide@latest/dist/js/splide.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"
        integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js"
        integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q"
        crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js"
        integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl"
        crossorigin="anonymous"></script>
    <!-- Template Javascript -->
    <script src="js/main.js"></script>
    <script src="./js/script.js"></script>
    <script src="./js/mainJquery.js"></script>
</body>

</html>