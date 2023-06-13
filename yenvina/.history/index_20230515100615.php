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
                                        <a data-toggle="modal" data-target="#popupAddCart" data-parent="<?=$data['id']?>" data-user="<?=$_SESSION['user']['temp']?>"><span>Add to
                                                    cart</span></a>
                                            <div class="icon-cart"><i class='bx bx-cart'></i></div>
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
                                            <a data-toggle="modal" data-target="#popupAddCart" data-parent="<?=$data['id']?>" data-user="<?=$_SESSION['user']['temp']?>"><span>Add to
                                                    cart</span></a>
                                            <div class="icon-cart"><i class='bx bx-cart'></i></div>
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