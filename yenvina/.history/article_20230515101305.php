<?php
include("./header.php");
require_once "../model/articles.php";

$article = new Articles();

if(isset($_GET['article_id'])){
    $article_id = $_GET['article_id'];
}

$getArticleAndTopicById = $article->getArticleAndTopicById($article_id);
$getArticleHomePage = $article->getArticleHomePage();
?>

        <!-- Product start-->
        <section class="search lists-product container">
            <!-- Breadcrumb start-->
            <div class="breadcrumb container">
                <div class="row">
                    <div class="col-12">
                        <ol class="breadcrumb-shop p-0">
                            <li>
                                <a href="index.php"><span>Trang chủ</span></a>
                            </li>
                            <li>
                                <a href="index.php"><span>Tin tức</span></a>
                            </li>
                            <li><span><?=$getArticleAndTopicById[0]['title']?></span></li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Breadcrumb end-->

            <div class="lists-main">
                <div class="box blog-header text-center">
                    <div class="title"><?=$getArticleAndTopicById[0]['topic_name']?></div>
                </div>
                <div class="box article lists-item">
                    <p class="title"><?=$getArticleAndTopicById[0]['title']?></p>
                    <p>
                    <?=$getArticleAndTopicById[0]['content']?>
                    </p>
                    <p><b>
                        Công dụng của yến chưng CiCi Thượng Đỉnh Yến với người đái tháo đường
                    </b></p>
                    <p><i class="bold">Yến sào </i>nói chung và yến chưng CiCi Thượng Đỉnh Yến nói riêng có giá trị dinh dưỡng rất cao mà có lợi có sức khoẻ như: cải thiện làn da, chống oxy hoá, cải thiện thị lực giác mạc, cải thiện hệ thống miễn dịch (đặc biệt tốt cho người điều trị hóa trị).</p> 
                    <div class="d-flex flex-wrap justify-content-center align-items-center my-4">
                        <img class="img-fluid" src="img/article/<?=$getArticleAndTopicById[0]['image']?>" alt="<?=$getArticleAndTopicById[0]['image']?>">
                        <p class="caption mt-2">Người bị đái tháo đường có nên ăn yến sào, và cải thiện đái tháo đường với yến chưng CiCi Thượng Đỉnh Yến?</p>
                    </div>
                    <p><b>
                        Công dụng của yến chưng CiCi Thượng Đỉnh Yến với người đái tháo đường
                    </b></p>
                    <p>Để duy trì đường huyết ổn định, người đái tháo đường  luôn phải giữ chế độ ăn uống kiêng khem khắt khe. Những thực phẩm có lợi cho người có đường huyết cao cần được lựa chọn kỹ lưỡng, đảm bảo dinh dưỡng nhưng không gây tăng chỉ số đường huyết. Một lựa chọn hoàn hảo để các gia đình Việt tham khảo cải thiện đường huyết cao chính là yến chưng CiCi Thượng Đỉnh Yến - thương hiệu yến chưng có hàm lượng yến cao nhất thị trường hiện nay.</p>

                    <div class="article-footer">
                        <div class="line-top"></div>
                        <p><strong>Website: </strong> <span>https://thuongdinhyen.vn/</span></p>
                        <p><strong>Facebook: </strong> <span>https://www.facebook.com/yenchungsan/</span></p>
                        <p><strong>Hotline: </strong> <span>039.908.6568</span></p>
                        <p><strong>Địa chỉ: </strong> <span>https://www.facebook.com/yenchungsan/</span></p>
                        <p><strong>Facebook: </strong>
                            <ul>
                                <li>Hà Nội: 110 Phố Huế, Phường Ngô Thì Nhâm, Quận Hai Bà Trưng Hà Nội</li>
                                <li>Tp. Hồ Chí Minh: 512 đường 3/2, Phường 14, Quận 10, Thành phố Hồ Chí Minh</li>
                            </ul>
                        </p>
                        <p><strong>Người viết: </strong>  Người viết: YẾN CÔNG TY CỔ PHẦN CICI THƯỢNG ĐỈNH lúc <span class="time">20.7.2022</span></p>
                        <p><strong>Tags: </strong>
                            <a href="tag">tổ yến</a>
                            <a href="tag">khánh hòa</a>
                            <a href="tag">ngũ hành sơn</a>
                            <a href="tag">tiểu đường</a>
                        </p>
                    </div>
                    <!--Phan trang-->
                    <!-- <div class="routing my-5">
                        <div class="d-flex justify-content-between align-items-center">
                            <a class="cl-black d-flex justify-content-center align-items-center" href="./article.html">
                                <i class='bx bx-arrow-back' ></i>
                                Bài trước
                            </a>
                            <a class="cl-black d-flex justify-content-center align-items-center" href="./article.html">
                                Bài sau
                                <i class='bx bx-right-arrow-alt' ></i>
                            </a>
                        </div>
                    </div> -->
                    <!--Bai viet lien quan-->
                    <div class="newsletter container my-5 wow fadeIn" data-wow-delay="0.2s">
                        <div class="future-title text-center p-3">
                            <h3 class="name">Sản phẩm nổi bật</h3>
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
                    </div>
                </div>
        </section>
        <!-- Product end -->

<?php include_once("./footer.php"); ?>