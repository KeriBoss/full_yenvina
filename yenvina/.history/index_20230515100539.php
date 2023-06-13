<?php
include("./header.php");
require_once "../model/banner.php";
require_once "../model/articles.php";

//Get all banner in database
$banner = new Banner();
$getAllBanner = $banner->getAllBanner();

//Create new object Product
$quantityProductShow = 10;
$numSale = 7;//Get quantity products on highest sale
$TIME_DELAY = 10000;//Countdown to the end of the discount

$getLatestProduct = $product->getLatestProduct($quantityProductShow);
$getLatestProductSale = $product->getLatestProductSale($numSale);

//Create new object articles
$article = new Articles();
$getArticleHomePage = $article->getArticleHomePage();
?>
        <!-- Banner Carousel Start -->
        <section id="banner" class="container-fluid p-0 mb-5 fadeIn">
            <div id="header-carousel" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <?php
                        $countBanner = 1;
                        foreach($getAllBanner as $item){
                            if($countBanner == 1){
                                ?>
                                <div class="carousel-item active">
                                    <img class="w-100" src="img/banner/<?=$item['img_web']?>" alt="Image" />
                                </div>
                            <?php }
                            else{ ?>
                                <div class="carousel-item">
                                    <img class="w-100" src="img/banner/<?=$item['img_web']?>" alt="Image" />
                                </div>
                            <?php }
                            $countBanner++;
                        }
                    ?>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Previous</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Next</span>
                </button>
            </div>
        </section>
        <!-- Carousel End -->

        <!-- Future products start-->
        <section id="future" class="container section-sm">
            <div class="future-title">
                <h3 class="name">Sản phẩm nổi bật</h3>
            </div>
            <div class="line-under mb-4"></div>
            <div class="list-future">
                <ul>
                    <?php foreach($getAllTypeProduct as $item){ ?>
                        <li class="item text-center" style="order: <?=$item['position']?>;">
                            <a href="./product.php?type=<?=$item['type_id']?>">
                                <img class="img-fluid" src="img/protype/<?=$item['image']?>"
                                    alt="<?=$item['image']?>" />
                                <p><?=$item['type_name']?></p>
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            </div>
        </section>
        <!-- Future products end-->

        <!-- Flash sale start-->
        <section id="flash-sale" class="container">
            <div class="flash-header">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-12 col-12 d-flex">
                        <div class="title">
                            <span>Flash </span>
                            <i class="bx bxs-zap"></i>
                            <span>sale</span>
                        </div>
                        <div class="time-delay" data-time="<?=$TIME_DELAY?>">
                            <div class="hour"></div>
                            <span> : </span>
                            <div class="minute"></div>
                            <span> : </span>
                            <div class="second"></div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 col-12">
                        <div class="show-all">
                            <a href="./product.php">Xem tất cả</a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="flash-slider">
                <section id="flash-splide" class="splide" aria-label="Beautiful Images">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <!--san pham-->
                            <?php foreach($getLatestProductSale as $item){ ?>
                            <li class="splide__slide">
                                <div class="img">
                                    <div class="circle"></div>
                                    <a href="./detail.php?id=<?=$item['id']?>">
                                        <img src="img/product/<?=$item['thumbnail']?>"
                                        loading="lazy"
                                            alt="Product" />
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="name"><a href="./detail.php?id=<?=$item['id']?>"><?=$item['product_name']?></a></div>
                                    <div class="rating">
                                        <?php
                                        $star = 5 - $item['rating'];
                                        if($item['rating'] > 0){
                                            for($i = 0; $i < $item['rating']; $i++){
                                                echo "<i class='bx bxs-star'></i>";
                                            }
                                        }
                                        if($star <= 5 && $star > 0){
                                            for($j = 0; $j < $star; $j++){
                                                echo "<i class='bx bx-star'></i>";
                                            }
                                        }
                                        ?>
                                    </div>
                                    <div class="price">2119900 <span>vnd</span></div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </section>
            </div>
        </section>
        <!-- Flash sale end-->



<?php
include_once("./footer.php");
?>