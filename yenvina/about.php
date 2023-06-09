<?php
session_start();
require_once  "../model/config.php";
require_once  "../model/database.php";
require_once  "../model/product.php";
require_once  "../model/type_product.php";

$product = new Product();

//Create new object Product
$quantityProductShow = 10;
$numSale = 7;//Get quantity products on highest sale

$getLatestProduct = $product->getLatestProduct($quantityProductShow);
$getLatestProductSale = $product->getLatestProductSale($numSale);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>About Us - Yenvina</title>
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
        <!-- About start -->
        <section id="about">
            <div class="container">
                <div class="header mb-5">
                    <div class="logo">
                        <a href="./index.php"> <img src="./img/logo.png" alt="Yenvina" class="img-fluid"></a>
                    </div>
                    <div class="topic-sentence">
                        Yến Rồng Tiên <br>
                        Trao niềm vui sống
                    </div>
                    <div class="end-header"></div>
                </div>
                <!--Ladi group item-->
                <div class="d-flex justify-content-center">
                    <div class="ladi-group">
                        <div class="ladi-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                preserveAspectRatio="none" viewBox="0 0 24 24" class="" fill="rgba(249, 253, 222, 1)">
                                <path
                                    d="M20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4C12.76,4 13.5,4.11 14.2,4.31L15.77,2.74C14.61,2.26 13.34,2 12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12M7.91,10.08L6.5,11.5L11,16L21,6L19.59,4.58L11,13.17L7.91,10.08Z">
                                </path>
                            </svg>
                            <span>Tiên phong trên thị trường Yến chưng tươi tại Việt Nam</span>
                        </div>
                        <div class="ladi-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                preserveAspectRatio="none" viewBox="0 0 24 24" class="" fill="rgba(249, 253, 222, 1)">
                                <path
                                    d="M20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4C12.76,4 13.5,4.11 14.2,4.31L15.77,2.74C14.61,2.26 13.34,2 12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12M7.91,10.08L6.5,11.5L11,16L21,6L19.59,4.58L11,13.17L7.91,10.08Z">
                                </path>
                            </svg>
                            <span>Top 10 Sản phẩm thương hiệu hàng đầu Việt Nam năm 2017</span>
                        </div>
                        <div class="ladi-item">
                            <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                preserveAspectRatio="none" viewBox="0 0 24 24" class="" fill="rgba(249, 253, 222, 1)">
                                <path
                                    d="M20,12A8,8 0 0,1 12,20A8,8 0 0,1 4,12A8,8 0 0,1 12,4C12.76,4 13.5,4.11 14.2,4.31L15.77,2.74C14.61,2.26 13.34,2 12,2A10,10 0 0,0 2,12A10,10 0 0,0 12,22A10,10 0 0,0 22,12M7.91,10.08L6.5,11.5L11,16L21,6L19.59,4.58L11,13.17L7.91,10.08Z">
                                </path>
                            </svg>
                            <span>Hơn 60,000 doanh nhân, hơn 100 sao Việt đã tin tưởng lựa chọn</span>
                        </div>
                    </div>
                </div>

                <!--Slider-->
                <div class="article-slide">
                    <div class="newsletter-splide splide" aria-label="Beautiful Images">
                        <div class="splide__track">
                            <ul class="splide__list">
                                <li class="splide__slide">
                                    <div class="img">
                                        <div class="circle"></div>
                                        <a href="./blog.php">
                                            <img src="https://w.ladicdn.com/s700x600/5cd0fc8bc2076e52d0838a2a/1-20201222142743.jpg"
                                                loading="lazy" alt="Article" />
                                        </a>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="img">
                                        <div class="circle"></div>
                                        <a href="./blog.php">
                                            <img src="https://w.ladicdn.com/s700x600/5cd0fc8bc2076e52d0838a2a/1-20201222143918.jpg"
                                                loading="lazy" alt="Article" />
                                        </a>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="img">
                                        <div class="circle"></div>
                                        <a href="./blog.php">
                                            <img src="https://w.ladicdn.com/s700x600/5cd0fc8bc2076e52d0838a2a/1-20201222142959.jpg"
                                                loading="lazy" alt="Article" />
                                        </a>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="img">
                                        <div class="circle"></div>
                                        <a href="./blog.php">
                                            <img src="https://w.ladicdn.com/s700x600/5cd0fc8bc2076e52d0838a2a/1-20201222142743.jpg"
                                                loading="lazy" alt="Article" />
                                        </a>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="img">
                                        <div class="circle"></div>
                                        <a href="./blog.php">
                                            <img src="https://w.ladicdn.com/s700x600/5cd0fc8bc2076e52d0838a2a/1-20201222143918.jpg"
                                                loading="lazy" alt="Article" />
                                        </a>
                                    </div>
                                </li>
                                <li class="splide__slide">
                                    <div class="img">
                                        <div class="circle"></div>
                                        <a href="./blog.php">
                                            <img src="https://w.ladicdn.com/s700x600/5cd0fc8bc2076e52d0838a2a/1-20201222142959.jpg"
                                                loading="lazy" alt="Article" />
                                        </a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                    <p class="desc-bot text-center my-5">Thành lập từ năm 2015, CiCi Thượng Đỉnh Yến đến nay đã chiếm
                        trọn niềm tin của khách hàng bởi chất lượng - tinh tế - hợp khẩu vị trong từng dòng sản phẩm về
                        Yến sào. Cici Thượng Đỉnh Yến luôn mang đến cho quý khách hàng những sản phẩm chất lượng nhất -
                        tốt nhất - tinh hoa nhất với đội ngũ chuyên gia nghiên cứu dinh dưỡng hàng đầu Việt Nam và luôn
                        đầu tư dây chuyền sản xuất công nghệ cao, hiện đại, quy mô sản xuất lớn. </p>
                </div>
                <!-- Product start -->
                <div class="product container wow fadeIn" style="box-shadow: none;" data-wow-delay="0.2s">
                    <div class="product-slider">
                        <div class="product-splide splide" aria-label="Beautiful Images" style="padding: 0;">
                            <div class="splide__track">
                                <ul class="splide__list">
                                <?php foreach($getLatestProduct as $data){?>
                                    <li class="splide__slide">
                                        <div class="img">
                                            <div class="circle"></div>
                                            <a href="./detail.php?id=<?=$data['id']?>">
                                                <img src="img/product/<?=$data['thumbnail']?>" loading="lazy"
                                                alt="<?=$data['thumbnail']?>" />
                                            </a>
                                        </div>
                                        <div class="content">
                                        <div class="name"><a href="./detail.php?id=<?=$data['id']?>"><?=$data['product_name']?></a></div>
                                            <div class="d-flex justify-content-center align-items-center">
                                                <div class="wrapper-detail mt-3" >
                                                    <a href="./detail.php?id=<?=$data['id']?>"><span>Xem chi
                                                            tiết</span></a>
                                                </div>
                                            </div>
                                        </div>
                                    </li>
                                <?php } ?>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Product end -->


            </div>
            <!--Customer start-->
            <div class="customer">
                <div class="container">
                    <div class="testiminal">
                        <div class="top-title">CẢM NHẬN KHÁCH HÀNG</div>
                        <div class="bottom-title">HƠN 60,000 DOANH NHÂN, HƠN 100 SAO VIỆT ĐÃ TIN TƯỞNG <br> LỰA CHỌN
                            CICI THƯỢNG ĐỈNH YẾN</div>
                    </div>
                    <div class="customer-slider">
                        <div class="customer-splide splide" aria-label="Slide Container Example" style="background: transparent;">
                            <div class="splide__track">
                                <ul class="splide__list" style="text-align: center;">
                                    <li class="splide__slide">
                                        <div class="splide__slide__container">
                                            <img src="./img/user/person_1.jpg">
                                        </div>
                                        <p class="mt-3"><b>Bà Nguyễn Kim Xuân</b></p>
                                        <p>Có một phần trong nhận xét của bạn thực sự thu hút sự chú ý của tôi. Bạn có phiền nếu chúng tôi chia sẻ câu chuyện của bạn với nhóm của chúng tôi và có thể trên các kênh bên ngoài như trang web hoặc hồ sơ mạng xã hội của chúng tôi không?</p>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="splide__slide__container">
                                            <img src="./img/user/person_2.jpg">
                                        </div>
                                        <p class="mt-3"><b>Ông Tạ Điền Châu</b></p>
                                        <p>Tôi thực sự tự hào rằng chúng tôi đã có thể đáp ứng kỳ vọng cao của bạn! Cảm ơn bạn đã dành thời gian để chia sẻ ý kiến ​​của mình với nhóm dịch vụ khách hàng của chúng tôi</p>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="splide__slide__container">
                                            <img src="./img/user/person_3.jpg">
                                        </div>
                                        <p class="mt-3"><b>Nguyen Van A</b></p>
                                        <p>Có một phần trong nhận xét của bạn thực sự thu hút sự chú ý của tôi. Bạn có phiền nếu chúng tôi chia sẻ câu chuyện của bạn với nhóm của chúng tôi và có thể trên các kênh bên ngoài như trang web hoặc hồ sơ mạng xã hội của chúng tôi không?</p>
                                    </li>
                                    <li class="splide__slide">
                                        <div class="splide__slide__container">
                                            <img src="./img/user/person_4.jpg">
                                        </div>
                                        <p class="mt-3"><b>Nguyen Van A</b></p>
                                        <p>Việc bạn và gia đình của bạn [ở lại/dùng bữa] với chúng tôi là niềm vinh hạnh cho [công ty]. Chúng tôi thực sự đánh giá cao việc bạn rất cởi mở với chúng tôi và dành thời gian để chia sẻ phản hồi của mình.</p>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--Customer end-->
        </section>
        <!-- About end -->


<?php
include_once "./footer.php";
?>


