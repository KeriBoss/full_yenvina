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
                <div class="list">
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

        <!-- Video Start -->
        <section id="video" class="container wow fadeIn section-ml p-0" data-wow-delay="0.2s">
            <iframe allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture"
                width="100%" height="500" allowfullscreen src="https://www.youtube.com/embed/tgbNymZ7vqY" autoplay loop>
            </iframe>
        </section>
        <!-- Video End -->

        <!-- Product start -->
        <section class="product container wow fadeIn" data-wow-delay="0.2s">
            <div class="product-header row">
                <div class="nav-left text-left">
                    <h3 class="product-title">Tổ Yến - Trao gửi tri ân - Nhận niềm vui mới</h3>
                </div>
                <div class="nav-right text-right">
                    <a class="menu-right d-none"><i class='bx bx-menu'></i></a>
                    <a href="./product.php" class="btn-tablink active">Bán chạy</a>
                    <a href="./product.php" class="btn-tablink">Nổi bật</a>
                    <a href="./product.php" class="btn-tablink active">Xem tất cả</a>
                </div>

            </div>
            <div class="line-under mb-4"></div>
            <div class="product-slider">
                <section id="product-splide" class="splide" aria-label="Beautiful Images">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php foreach($getLatestProduct as $data){?>
                            <li class="splide__slide">
                                <div class="img">
                                    <div class="circle"></div>
                                    <div class="gift <?php if($data['sale'] == 0){echo "d-none";} ?>"><i class='bx bxs-gift'></i></div>
                                    <a href="./detail.php?id=<?=$data['id']?>">
                                        <img src="img/product/<?=$data['thumbnail']?>" loading="lazy"
                                            alt="<?=$data['thumbnail']?>" />
                                    </a>
                                    <div class="sale <?php if($data['sale'] == 0){echo "d-none";} ?>"><?=$data['sale']?>%</div>
                                </div>
                                <div class="content">
                                    <div class="name"><a href="./detail.php?id=<?=$data['id']?>"><?=$data['product_name']?></a></div>
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
                                    <div class="box-prices">
                                        <span class="current-price"><?= number_format($data['prices'] - (($data['prices'] * $data['sale']) / 100)) ?>vnd</span>
                                        <span class="del-price <?php if($data['sale'] == 0){echo "d-none";} ?>">
                                            <del> <?= number_format($data['prices']) ?> vnd</del>
                                        </span>
                                        
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="add-cart" style="cursor: pointer;">
                                            <a data-toggle="modal" data-target="#popupAddCart" data-parent="<?=$data['id']?>" data-user="<?=$_SESSION['user']['temp']?>"><span>Thêm Vào Giỏ</span></a>
                                            <div class="icon-cart" data-toggle="modal" data-target="#popupAddCart" data-parent="<?=$data['id']?>" data-user="<?=$_SESSION['user']['temp']?>"><i class='bx bx-cart'></i></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </section>
            </div>
        </section>
        <!-- Product end -->

        <!-- Partner start-->
        <section class="partner p-0">
            <div class="container">
                <img src="./img/carousel-yenvina-1.png" alt="Partner">
            </div>
        </section>
        <!-- Partner end-->

        <!-- Product start -->
        <section class="product container wow fadeIn" data-wow-delay="0.2s">
            <div class="product-header row">
                <div class="nav-left text-left">
                    <h3 class="product-title">Tổ Yến - Trao gửi tri ân - Nhận niềm vui mới</h3>
                </div>
                <div class="nav-right text-right">
                    <a href="./product.php" class="btn-tablink active">Bán chạy</a>
                    <a href="./product.php" class="btn-tablink">Nổi bật</a>
                    <a href="./product.php" class="btn-tablink active">Xem tất cả</a>
                </div>

            </div>
            <div class="line-under mb-4"></div>
            <div class="product-slider">
                <section class="product-splide splide" aria-label="Beautiful Images">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php foreach($getLatestProduct as $data){?>
                            <li class="splide__slide">
                                <div class="img">
                                    <div class="circle"></div>
                                    <div class="gift <?php if($data['sale'] == 0){echo "d-none";} ?>"><i class='bx bxs-gift'></i></div>
                                    <a href="./detail.php?id=<?=$data['id']?>">
                                        <img src="img/product/<?=$data['thumbnail']?>" loading="lazy"
                                            alt="<?=$data['thumbnail']?>" />
                                    </a>
                                    <div class="sale <?php if($data['sale'] == 0){echo "d-none";} ?>"><?=$data['sale']?>%</div>
                                </div>
                                <div class="content">
                                    <div class="name"><a href="./detail.php?id=<?=$data['id']?>"><?=$data['product_name']?></a></div>
                                    <div class="rating">
                                    <?php
                                        $star = 5 - $data['rating'];
                                        if($data['rating'] > 0){
                                            for($i = 0; $i < $data['rating']; $i++){
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
                                    <div class="box-prices">
                                        <span class="current-price"><?= number_format($data['prices'] - (($data['prices'] * $data['sale']) / 100)) ?>vnd</span>
                                        <span class="del-price <?php if($data['sale'] == 0){echo "d-none";} ?>">
                                            <del> <?= number_format($data['prices']) ?> vnd</del>
                                        </span>
                                        
                                    </div>
                                    <div class="d-flex justify-content-center align-items-center">
                                        <div class="add-cart" style="cursor: pointer;">
                                            <a data-toggle="modal" data-target="#popupAddCart" data-parent="<?=$data['id']?>" data-user="<?=$_SESSION['user']['temp']?>"><span>Thêm Vào Giỏ</span></a>
                                            <div class="icon-cart" data-toggle="modal" data-target="#popupAddCart" data-parent="<?=$data['id']?>" data-user="<?=$_SESSION['user']['temp']?>"><i class='bx bx-cart'></i></div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </section>
            </div>
        </section>
        <!-- Product end -->

        <!-- Newsletter start -->
        <section class="newsletter container my-5 wow fadeIn" data-wow-delay="0.2s">
            <div class="future-title p-3">
                <h3 class="name">Bài viết nổi bật</h3>
            </div>
            <div class="line-under mb-4"></div>
            <div class="newsletter-slider">
                <section class="newsletter-splide splide" aria-label="Beautiful Images">
                    <div class="splide__track">
                        <ul class="splide__list">
                            <?php foreach($getArticleHomePage as $item){ ?>
                            <li class="splide__slide">
                                <div class="img">
                                    <div class="circle"></div>
                                    <a href="article.php?article_id=<?=$item['article_id']?>">
                                        <img src="img/article/<?= $item['image']?>"
                                            alt="<?= $item['image']?>" />
                                    </a>
                                </div>
                                <div class="content">
                                    <div class="title"><a href="./article.php?article_id=<?=$item['article_id']?>"><?= $item['title']?></a></div>
                                    <div class="owner row gx-0">
                                        <div class="col-8">
                                            <i class='bx bx-user'></i><?= $item['company_name']?>
                                        </div>
                                        <div class="col-4">
                                            <i class='bx bx-calendar'></i> <span><?= $item['create_at']?></span>
                                        </div>
                                    </div>
                                    <div class="note">
                                        <div class="icon-gift">
                                            <span><i class='bx bxs-gift'></i>
                                            <?= $item['content']?>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                            <?php } ?>
                        </ul>
                    </div>
                </section>
            </div>
        </section>
        <!-- Newsletter end -->

        <!-- Newspaper start-->
        <section class="newspaper container wow fadeIn" data-wow-delay="0.2s">
            <div class="row gx-3">
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="news-item">
                        <div class="news-img">
                            <img src="https://theme.hstatic.net/200000404397/1000922692/14/policy_icon1_large.png?v=556"
                                alt="Newspaper">
                        </div>
                        <div class="news-desc">
                            <p class="title">Yến đảo thiên nhiên 100%</p>
                            <p>Tổ yến được lấy từ yến đảo thiên nhiên với dòng yến cực kỳ quý hiếm trên thị trường. Mang
                                lại giá trị dinh dưỡng cao nhất.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="news-item">
                        <div class="news-img">
                            <img src="https://theme.hstatic.net/200000404397/1000922692/14/policy_icon2_large.png?v=556"
                                alt="Newspaper">
                        </div>
                        <div class="news-desc">
                            <p class="title">Yến đảo thiên nhiên 100%</p>
                            <p>Tổ yến được lấy từ yến đảo thiên nhiên với dòng yến cực kỳ quý hiếm trên thị trường. Mang
                                lại giá trị dinh dưỡng cao nhất.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="news-item">
                        <div class="news-img">
                            <img src="https://theme.hstatic.net/200000404397/1000922692/14/policy_icon2_large.png?v=556"
                                alt="Newspaper">
                        </div>
                        <div class="news-desc">
                            <p class="title">Yến đảo thiên nhiên 100%</p>
                            <p>Tổ yến được lấy từ yến đảo thiên nhiên với dòng yến cực kỳ quý hiếm trên thị trường. Mang
                                lại giá trị dinh dưỡng cao nhất.</p>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-6 col-12">
                    <div class="news-item">
                        <div class="news-img">
                            <img src="https://theme.hstatic.net/200000404397/1000922692/14/policy_icon2_large.png?v=556"
                                alt="Newspaper">
                        </div>
                        <div class="news-desc">
                            <p class="title">Yến đảo thiên nhiên 100%</p>
                            <p>Tổ yến được lấy từ yến đảo thiên nhiên với dòng yến cực kỳ quý hiếm trên thị trường. Mang
                                lại giá trị dinh dưỡng cao nhất.</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Newspaper end-->



<?php
include_once("./footer.php");
?>