<?php
session_start();
define('JPATH_BASE', dirname(__FILE__));
require_once  "../model/config.php";
require_once  "../model/database.php";
require_once  "../model/product.php";
require_once  "../model/type_product.php";
require_once  "../model/cart.php";

//Create cart
$cart = new Cart();
$getAllCart = $cart->getAllCart();

$time = date('d:m:Y:h:i');
$str = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $time);
if(!isset($_SESSION['user']['temp'] )){
    $_SESSION['user']['temp'] = $str;//Create sesion for user
}
$getCartByUserId = $cart->getCartByUserId($_SESSION['user']['temp']);
$totalProduct = 0;
foreach($getCartByUserId as $item){
    $totalProduct += $item['quantity']*1;
}



// $refRootModel = $_SERVER["DOCUMENT_ROOT"].'/yenvina';

$protype = new Typeproduct();
$getAllTypeProduct = $protype->getAllTypeProduct();

$product = new Product();

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Yenvina</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport" />
    <meta content="" name="keywords" />
    <meta content="" name="description" />

    <!-- Favicon -->
    <link href="img/logo.png" rel="icon" />

    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
        href="https://fonts.googleapis.com/css2?family=Heebo:wght@400;500;600;700&family=Montserrat:wght@400;500;600;700&display=swap"
        rel="stylesheet" />

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet" />

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

        <!-- Header Start -->
        <header>
            <div id="main-header" class="container wow fadeIn" data-wow-delay="0.2s">
                <div class="header-top row gx-2 d-flex justify-content-center align-items-center py-1">
                    <div class="col-lg-2 col-md-3 d-flex align-items-center">
                        <div class="menu-bar"><i class="bx bx-menu"></i></div>
                        <div class="logo">
                            <a href="./index.php"><img src="./img/logo.png" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-lg-7 col-md-5">
                        <div class="search">
                            <form action="./product.php" method="get">
                                <input width="100%" type="search" name="search"
                                    placeholder="Trao gửi tri ân - Nhận niềm vui mới..." />
                                <button type="submit">
                                    <i class="bx bx-search"></i> Tìm kiếm
                                </button>
                            </form>
                            <div class="nav-product">
                                <ul>
                                    <li><a href="./product.php">Thượng Vy Yến Biển</a></li>
                                    <span class="mx-1"> | </span>
                                    <li><a href="./product.php">Yến chưng tươi</a></li>
                                    <span class="mx-1"> | </span>
                                    <li><a href="./product.php">Thượng Vy Yến Biển</a></li>
                                    <span class="mx-1"> | </span>
                                    <li><a href="./product.php">Thượng Vy Yến Biển</a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-2 col-md-3">
                        <div class="group-user">
                            <div class="search-mobile"><i class="bx bx-search"></i></div>
                            <div class="user"><a href="./login.php" class="cl-white"><i class="bx bx-user"></i></a></div>
                            <div class="group-item">
                                <div class="sign-in">
                                    <?php if(isset($_SESSION['user']['name'])){ ?>
                                        <a href="#"><?=$_SESSION['user']['name']?></a>
                                        <span class="mx-1">/</span>
                                        <a href="./action/logout.php">Đăng Xuất</a>
                                    <?php }else{ ?>
                                        <a href="./login.php">Đăng nhập</a>
                                        <span class="mx-1">/</span>
                                        <a href="./register.php">Đăng ký</a>
                                    <?php } ?>
                                </div>
                                <div class="name">Tài khoản</div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1 col-md-2">
                        <div class="cart">
                            <div class="create-cart" data-i="<?=$totalProduct?>">
                                <a href="./cart.php" class="cl-white" ><i class="bx bx-cart"></i></a>
                            </div>
                            <div class="note"><a href="./cart.php" class="cl-white">Giỏ hàng của bạn</a></div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="menuBar" class="nav-bar bg-white" tabindex="-1">
                <div class="container">
                    <div class="header-bottom row d-flex justify-content-center align-items-center">
                        <div class="col-lg-3 p-0">
                            <div class="list-product d-flex align-items-center">
                                <i class="bx bx-menu"></i>
                                <div class="nav-item dropdown">
                                    <a href="./product.php" class="nav-link dropdown-toggle cl-black"
                                        data-bs-toggle="dropdown">Danh mục sản phẩm</a>
                                    <div class="dropdown-menu rounded-0 m-0">
                                        <?php foreach($getAllTypeProduct as $item){ ?>
                                        <a href="./product.php?type=<?=$item['type_id']?>" class="dropdown-item"><?=$item['type_name']?></a>
                                        <?php } ?>
                                    </div>
                                </div>
                                <span></span>
                            </div>
                        </div>
                        <div class="col-lg-9">
                            <nav class="navbar navbar-expand-lg navbar-light">
                                <div class="navbar-collapse justify-content-between" id="navbarCollapse">
                                    <div class="navbar-nav">
                                        <a href="index.php" class="nav-item nav-link active">Trang chủ</a>
                                        <div class="nav-item dropdown">
                                            <a href="#" class="nav-link dropdown-toggle" data-bs-toggle="dropdown">Sản
                                                phẩm</a>
                                            <div class="dropdown-menu rounded-0 m-0">
                                                <?php foreach($getAllTypeProduct as $item){ ?>
                                                    <a href="./product.php?type=<?=$item['type_id']?>" class="dropdown-item"><?=$item['type_name']?></a>
                                                <?php } ?>
                                            </div>
                                        </div>
                                        <a href="./product.php" class="nav-item nav-link">Khuyến mãi</a>
                                        <a href="./contact.php" class="nav-item nav-link">Liên hệ</a>
                                        <a href="./blog.php" class="nav-item nav-link">Tin tức</a>
                                        <a href="./about.php" class="nav-item nav-link">Về chúng tôi</a>
                                        <a href="./term_service.php" class="nav-item nav-link">Chính sách đại lý</a>
                                    </div>
                                </div>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Header End -->
