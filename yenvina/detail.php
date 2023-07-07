<?php
include("./header.php");
require_once "../model/comment.php";


if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
}
$getProductById = $product->getProductById($product_id);

//Create new object Product
$quantityProductShow = 10;
$numSale = 7; //Get quantity products on highest sale
$TIME_DELAY = 10000; //Countdown to the end of the discount

$getLatestProduct = $product->getLatestProduct($quantityProductShow);

$comment = new Comment();
$getCommentByProduct = $comment->getCommentByProduct($product_id);

?>
<style>
    .card {
        padding: 20px;
        word-wrap: break-word;
        background-color: #fff;
        background-clip: border-box;
        border-radius: 6px;
        -moz-box-shadow: 0px 0px 5px 0px rgba(212, 182, 212, 1)
    }

    .comment-box {

        padding: 5px;
    }
    .comment-area textarea {
        resize: none;
        border: 1px solid #ad9f9f;
    }
    .form-control:focus {
        color: #495057;
        background-color: #fff;
        border-color: #ffffff;
        outline: 0;
        box-shadow: 0 0 0 1px #c4903b !important;
    }

    .send {
        color: #fff;
        background-color: #c4903b;
        border-color: #c4903b;
    }
    .send:hover {
        color: #fff;
        background-color: #c4903b;
        border-color: #c4903b;
    }


    .comment-box .rating {
        display: flex;
        margin-top: -10px;
        flex-direction: row-reverse;
        margin-left: -4px;
        float: left;
    }

    .comment-box .rating>input {
        display: none;
    }

    .comment-box .rating>label {
        position: relative;
        width: 19px;
        font-size: 25px;
        color: #c4903b;
        cursor: pointer;
    }

    .comment-box .rating>label::before {
        content: "\2605";
        position: absolute;
        opacity: 0
    }

    .comment-box .rating>label:hover:before,
    .comment-box .rating>label:hover~label:before {
        opacity: 1 !important
    }

    .comment-box .rating>input:checked~label:before {
        opacity: 1
    }

    .comment-box .rating:hover>input:checked~label:before {
        opacity: 0.4
    }


    .badge {

        padding: 7px;
        padding-right: 9px;
        padding-left: 16px;
        box-shadow: 5px 6px 6px 2px #e9ecef;
    }

    .user-img {
        margin-top: 4px;
    }

    .user .face_user{
        display: flex;
        justify-content: center;
        align-items: center;
        width: 30px;
        height: 30px;
        font-size: 2rem;
    }

    .check-icon {

        font-size: 17px;
        color: #c3bfbf;
        top: 1px;
        position: relative;
        margin-left: 3px;
    }

    .form-check-input {
        margin-top: 6px;
        margin-left: -24px !important;
        cursor: pointer;
    }


    .form-check-input:focus {
        box-shadow: none;
    }

    .reply {
        max-width: 75%;
        margin-left: 12px;
        font-size: .9rem;
    }

    .reply small {

        color: #b7b4b4;

    }


    .reply small:hover {

        color: green;
        cursor: pointer;

    }
</style>

<!-- Breadcrumb start-->
<section class="breadcrumb container">
    <div class="row">
        <div class="col-12">
            <ol class="breadcrumb-shop p-0">
                <li>
                    <a href="index.php"><span>Trang chủ</span></a>
                </li>
                <li>
                    <a href="product.php"><span>Sản phẩm</span></a>
                </li>
                <li><span><?= $getProductById[0]['product_name'] ?></span></li>
            </ol>
        </div>
    </div>
</section>
<!-- Breadcrumb end-->

<!-- Main detail start-->
<section class="main-detail">
    <div class="box-detail container">
        <div class="main-header">
            <div class="title text-uppercase"><?= $getProductById[0]['product_name'] ?></div>
            <div class="sku-code">SKU: <span>TC152</span></div>
            <div class="product-info">
                <span>Thương hiệu: <b>Yến ViNa</b></span>
                <span class="pro-star">
                    <?php for($i = 0; $i < $getProductById[0]['rating']; $i++){ ?>
                        <i class="bx bxs-star"></i>
                    <?php } echo count($getCommentByProduct); ?> đánh giá
                </span>
            </div>
        </div>
        <div class="main-content mt-3 px-3">
            <div class="row gx-5">
                <div class="col-lg-9 col-md-12">
                    <div class="row gx-5">
                        <div class="col-lg-7">
                            <!--danh sach anh-->
                            <!--slide anh chinh-->
                            <section id="main-slider" class="splide" aria-label="My Awesome Gallery">
                                <div class="splide__track">
                                    <ul class="splide__list">
                                        <li class="splide__slide">
                                            <img class="img-fluid" src="img/product/<?= $getProductById[0]['thumbnail'] ?>" alt="<?= $getProductById[0]['thumbnail'] ?>" />
                                        </li>
                                    </ul>
                                </div>
                            </section>
                            <!--slide anh phu-->
                            <ul id="thumbnails" class="thumbnails">
                                <li class="thumbnail">
                                    <img width="120px" src="img/product/<?= $getProductById[0]['thumbnail'] ?>" alt="<?= $getProductById[0]['thumbnail'] ?>" />
                                </li>
                            </ul>

                        </div>
                        <div class="col-lg-5">
                            <div class="info-top">
                                <form action="./cart.html">
                                    <div class="group-form prices mb-3">
                                        <input type="number" name="price" value="<?= $getProductById[0]['prices'] ?>" hidden />
                                        <input type="number" value="2120000" hidden />
                                        <b><?= number_format($getProductById[0]['prices'] - (($getProductById[0]['prices'] * $getProductById[0]['sale']) / 100)) ?> VNĐ</b>
                                        <i><?= $getProductById[0]['prices'] ?> VNĐ</i>
                                        <span class="sale">-<?= $getProductById[0]['sale'] ?>%</span>
                                    </div>
                                    <div class="range">
                                        <input onclick="btnLowest(<?= $product_id, $getProductById[0]['quantity'] ?>)" type="button" class="lowest_quan" value="-" />
                                        <input id="cart_quantity" type="text" class="main_quan" name="quantity" value="1" />
                                        <input onclick="btnHighest(<?= $product_id, $getProductById[0]['quantity'] ?>)" type="button" class="highest_quan" value="+" />
                                    </div>
                                    <div class="group-form submit">
                                        <button class="add-cart" type="button">
                                            <a data-toggle="modal" data-target="#popupAddCart" data-parent="<?= $product_id ?>" data-user="<?= $_SESSION['user']['temp'] ?>"><span>Thêm vào giỏ</span></a>
                                        </button>
                                        <button><a class="cl-white" href="./payment.php">Mua ngay</a></button>
                                    </div>
                                </form>
                            </div>
                            <div class="info-bottom">
                                <div class="title">
                                    <span><b>MUA 50GAM TẶNG (1 HỘP TÁO ĐỎ + 1 ĐƯỜNG PHÈN)</b></span><br />
                                    <span><b>MUA 100GAM TẶNG (1 HỘP TÁO ĐỎ + 1 ĐƯỜNG PHÈN) + 2
                                            HŨ THƯỢNG VY YẾN ĐẢO HOẶC HỘP ĐỰNG QUÀ TẶNG</b></span>
                                </div>
                                <div class="desc">
                                    <b class="note">Điểm nổi bật</b>
                                    <ul>
                                        <li>
                                            <b class="bold">Tổ yến tinh chế 1 </b>
                                            <span>
                                                là sản phẩm đã được làm sạch không còn lông, bụi
                                                bẩn, sạch hoàn toàn và tinh chế thành sợi từ yến
                                                tổ.
                                            </span>
                                        </li>
                                        <li>
                                            <b> </b>
                                            <span>
                                                Được tinh chế
                                                <b>tổ yến Nha Trang nguyên chất 100% </b>, không
                                                độn phụ gia tạp chất, có mùi thơm đặc trưng.
                                            </span>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-3 col-md-12">
                    <div class="policy row">
                        <div class="col-12 box box-top mb-3">
                            <div class="group-item">
                                <div class="icon"><i class="bx bxs-plane-alt"></i></div>
                                <div class="desc bold">Giao hàng toàn quốc</div>
                            </div>
                            <div class="group-item">
                                <div class="icon"><i class="bx bx-calendar"></i></div>
                                <div class="desc bold">
                                    Chính hãng 100% - Nhận hàng trong 2 giờ
                                </div>
                            </div>
                            <div class="group-item">
                                <div class="icon"><i class="bx bx-check-shield"></i></div>
                                <div class="desc bold">
                                    Được kiểm tra hàng trước khi nhận
                                </div>
                            </div>
                            <div class="group-item">
                                <div class="icon"><i class="bx bxs-lock"></i></div>
                                <div class="desc bold">
                                    Đổi trả trong 48h nếu không hài lòng
                                </div>
                            </div>
                            <div class="group-item">
                                <div class="icon"><i class="bx bx-git-merge"></i></div>
                                <div class="desc bold">Sản phẩm đã được chứng nhận</div>
                            </div>
                        </div>
                        <div class="col-12 box box-bottom">
                            <ul>
                                <li><span>Sản phẩm chính hãng 100%</span></li>
                                <li><span>Sản phẩm chính hãng 100%</span></li>
                                <li><span>Sản phẩm chính hãng 100%</span></li>
                                <li><span>Sản phẩm chính hãng 100%</span></li>
                                <li><span>Sản phẩm chính hãng 100%</span></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Main detail end-->

<!-- Information Tab start-->
<section class="information mt-5">
    <div class="container">
        <div class="tab-pills row">
            <div class="col-12">
                <div class="container">
                    <div class="sliderTab">
                        <div class="header-tab">
                            <ul class="nav-tabs">
                                <li class="nav-item active" data-target="tab1">Thông tin sản phẩm</li>
                                <li class="nav-item" data-target="tab2">Hướng dẫn mua hàng</li>
                                <li class="nav-item" data-target="tab3">Bình luận</li>
                                <div class="bg-active"></div>
                            </ul>
                        </div>
                        <div class="content-tabs">
                            <div class="tab active" id="tab1">
                                <h1>Thông tin khác</h1>
                            </div>

                            <div class="tab" id="tab2">
                                <h1>Hướng dẫn mua hàng</h1>
                            </div>

                            <div class="tab" id="tab3">
                                <div class="row">
                                    <div class="col-lg-4 col-md-6 col-12">
                                        <div class="card">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div id="comment_body" data-product="<?=$product_id?>" 
                                                    data-user="<?=$_SESSION['user']['temp']?>"
                                                    class="comment-box ml-2">
                                                        <h4>Thêm bình luận mới</h4>
                                                        <p style="color: red;font-size: .9rem;"></p>
                                                        <?php 
                                                            if(isset($_SESSION['login'])){
                                                                $session = $_SESSION['login'];
                                                                echo "<p style='color: red;font-size: .9rem;'>$session</p>";
                                                            }
                                                        ?>
                                                        <div class="rating">
                                                            <input type="radio" name="rating" value="5" id="5"><label for="5">☆</label>
                                                            <input type="radio" name="rating" value="4" id="4"><label for="4">☆</label>
                                                            <input type="radio" name="rating" value="3" id="3"><label for="3">☆</label>
                                                            <input type="radio" name="rating" value="2" id="2"><label for="2">☆</label>
                                                            <input type="radio" name="rating" value="1" id="1"><label for="1">☆</label>
                                                        </div>
                                                        <div class="comment-area">
                                                            <textarea class="comment_content form-control" placeholder="Bạn có suy nghĩ gì về sản phẩm?" rows="5"></textarea>
                                                        </div>
                                                        <div class="comment-btns mt-2">
                                                            <div class="row">
                                                                <div class="col-6">
                                                                    <div class="pull-left">
                                                                        <button id="comment_user" class="btn btn-success btn-sm">Gửi</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-8 col-md-6 col-12">
                                        <div class="row d-flex justify-content-center">
                                            <div class="col-12">
                                                <div class="headings d-flex justify-content-between align-items-center mb-3">
                                                    <h5>Tất cả bình luận</h5>
                                                </div>
                                                <div id="list_comment">
                                                    <?php foreach($getCommentByProduct as $item){ ?>
                                                    <div class="card p-3 mt-2">
                                                        <div class="d-flex justify-content-between align-items-center">
                                                            <div class="user d-flex flex-row align-items-center">
                                                                <div class="face_user mr-2"><i class='bx bxs-user-circle'></i></div>
                                                                <span><small class="font-weight-bold text-primary">Tester1</small></span>
                                                            </div>
                                                            <small><?=$item['create_at']?></small>
                                                        </div>
                                                        <div class="action d-flex justify-content-between mt-2 align-items-center">
                                                            <div class="reply px-4">
                                                                <?=$item['content']?>
                                                            </div>
                                                            <div id="star_icon" class="icons align-items-center">
                                                                <?php for($i = 0; $i < $item['rating']; $i++ ){?>
                                                                <i class="fa fa-star text-warning"></i>
                                                                <?php } ?>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <?php } ?>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- Information Tab end-->

<!-- Product start -->
<section class="product container wow fadeIn mt-5" data-wow-delay="0.2s">
    <div class="product-header row">
        <div class="text-center">
            <h3 class="product-title">Tổ Yến - Trao gửi tri ân - Nhận niềm vui mới</h3>
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
                                <span class="current-price"><?= number_format($data['prices'] - (($data['prices'] * $data['sale']) / 100)) ?> VNĐ</span>
                                <span class="del-price <?php if($data['sale'] == 0){echo "d-none";} ?>">
                                    <del> <?= number_format($data['prices']) ?>  VNĐ</del>
                                </span>
                                
                            </div>
                            <div class="d-flex justify-content-center align-items-center">
                                <div class="add-cart" style="cursor: pointer;">
                                    <a data-toggle="modal" data-target="#popupAddCart" data-parent="<?=$data['id']?>" data-user="<?=$_SESSION['user']['temp']?>"><span>Thêm vào giỏ</span></a>
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




<?php
include_once("./footer.php");
?>