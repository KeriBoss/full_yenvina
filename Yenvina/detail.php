<?php
include("./header.php");

if (isset($_GET['id'])) {
    $product_id = $_GET['id'];
}
$getProductById = $product->getProductById($product_id);

//Create new object Product
$quantityProductShow = 10;
$numSale = 7; //Get quantity products on highest sale
$TIME_DELAY = 10000; //Countdown to the end of the discount

$getLatestProduct = $product->getLatestProduct($quantityProductShow);

?>

<!-- Breadcrumb start-->
<section class="breadcrumb container">
    <div class="row">
        <div class="col-12">
            <ol class="breadcrumb-shop p-0">
                <li>
                    <a href="/index.php"><span>Trang chủ</span></a>
                </li>
                <li>
                    <a href="/product.php"><span>Sản phẩm</span></a>
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
                <span>Tình trạng:
                    <?php if ($getProductById[0]['quantity'] > 0) {
                        echo "<b>Còn hàng</b>";
                    } else {
                        echo "<b>Hết hàng</b>";
                    } ?>
                </span>
                <span>Đã bán: <b> 6 </b> sản phẩm.</span>
                <span class="pro-star">
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    <i class="bx bxs-star"></i>
                    12 đánh giá
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
                                        <b><?= number_format($getProductById[0]['prices'] - (($getProductById[0]['prices'] * $getProductById[0]['sale']) / 100)) ?></b>
                                        <i><?= $getProductById[0]['prices'] ?></i>
                                        <span class="sale">-<?= $getProductById[0]['sale'] ?>%</span>
                                    </div>
                                    <!-- <label class="weight">Trọng lượng</label>
                                    <div class="group-form choose-weight mb-4">
                                        <input type="radio" name="weight" id="choose1" hidden checked />
                                        <label for="choose1">50gram</label>

                                        <input type="radio" name="weight" id="choose2" hidden />
                                        <label for="choose2">100gram</label>

                                        <input type="radio" name="weight" id="choose3" hidden />
                                        <label for="choose3">mix nhieu loại gia vị</label>

                                        <input type="radio" name="weight" id="choose4" hidden />
                                        <label for="choose4">mix nhieu loại gia vị</label>
                                    </div> -->
                                    <div class="range">
                                        <input onclick="btnLowest(<?= $product_id, $getProductById[0]['quantity']?>)" type="button" class="lowest_quan" value="-" />
                                        <input id="cart_quantity" type="text" class="main_quan" name="quantity" value="1" />
                                        <input onclick="btnHighest(<?= $product_id, $getProductById[0]['quantity']?>)" type="button" class="highest_quan" value="+" />
                                    </div>
                                    <div class="group-form submit">
                                        <button class="add-cart" type="button">
                                            <a data-toggle="modal" data-target="#popupAddCart" data-parent="<?=$product_id?>" data-user="<?=$_SESSION['user']['temp']?>"><span>Add to
                                                            cart</span></a>
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
                                <h1>Content tab 1</h1>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi officiis
                                architecto provident numquam dolores ducimus at nulla ab velit suscipit iusto,
                                itaque sint harum consequuntur similique pariatur beatae fugiat neque ad!
                            </div>

                            <div class="tab" id="tab2">
                                <h1>Content tab 2</h1>
                                Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nisi officiis
                                architecto provident numquam dolores ducimus at nulla ab velit suscipit iusto,
                                itaque sint harum consequuntur similique pariatur beatae fugiat neque ad!
                            </div>

                            <div class="tab" id="tab3">
                                <h1>Content tab 3</h1>

                                <!-- Modal -->
                                <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
                                    <div class="modal-dialog model-wh modal-dialog-centered" role="document">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title text-center" id="exampleModalLongTitle">
                                                    Gio hang hien co ( <span>1</span> )san pham
                                                </h5>
                                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
                                                </button>
                                            </div>
                                            <div class="modal-body">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th scope="col">#</th>
                                                            <th scope="col">Thumbnail</th>
                                                            <th scope="col">Product</th>
                                                            <th scope="col">Price</th>
                                                            <th scope="col">Quantity</th>
                                                            <th scope="col">Money</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        <tr>
                                                            <th scope="row">1</th>
                                                            <td>
                                                                <img width="70" height="70" src="./img/carousel-yenvina-1.png" alt="">
                                                            </td>
                                                            <td>
                                                                <p><b class="bold">To yen tinh che Vip loai
                                                                        1</b></p>
                                                                <p>Phien ban: 50gram</p>
                                                                <p>Thuong hieu yen thuong dinh</p>
                                                            </td>
                                                            <td>
                                                                <p><b class="bold">2,999,000d</b></p>
                                                                <p><span class="price-old">3.190.000d</span></p>
                                                                <p><span class="sale">-9%</span></p>
                                                            </td>
                                                            <td>
                                                                <div class="range">
                                                                    <input type="button" class="lowest" value="-" />
                                                                    <input type="text" name="quantity" value="1" />
                                                                    <input type="button" class="highest" value="+" />
                                                                </div>
                                                            </td>
                                                            <td><b class="bold">2,999,000d</b></td>
                                                        </tr>
                                                        <tr>
                                                            <th scope="row">2</th>
                                                            <td>
                                                                <img width="70" height="70" src="./img/carousel-yenvina-1.png" alt="">
                                                            </td>
                                                            <td>
                                                                <p><b>To yen tinh che Vip loai 1</b></p>
                                                                <p>Phien ban: 50gram</p>
                                                                <p>Thuong hieu yen thuong dinh</p>
                                                            </td>
                                                            <td>
                                                                <p><b>2,999,000d</b></p>
                                                                <p><span class="price-old">3.190.000d</span></p>
                                                                <p><span class="sale">-9%</span></p>
                                                            </td>
                                                            <td>
                                                                <div class="range">
                                                                    <input type="button" class="lowest" value="-" />
                                                                    <input type="text" name="quantity" value="1" />
                                                                    <input type="button" class="highest" value="+" />
                                                                </div>
                                                            </td>
                                                            <td><b>2,999,000d</b></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="modal-footer">
                                                <div class="price-final float-left"><span>39999999d</span></div>
                                                <div class="group">
                                                    <a href="./cart.html" class="btn-tablink">Giỏ hàng</a>
                                                    <a href="./payment.html" class="btn-tablink active">Thanh
                                                        toán</a>
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
        <section id="product-splide" class="splide" aria-label="Beautiful Images">
            <div class="splide__track">
                <ul class="splide__list">
                    <?php foreach ($getLatestProduct as $data) { ?>
                        <li class="splide__slide">
                            <div class="img">
                                <div class="circle"></div>
                                <div class="gift <?php if ($data['sale'] == 0) {
                                                        echo "d-none";
                                                    } ?>"><i class='bx bxs-gift'></i></div>
                                <a href="./detail.html">
                                    <img src="img/product/<?= $data['thumbnail'] ?>" loading="lazy" alt="<?= $data['thumbnail'] ?>" />
                                </a>
                                <div class="sale <?php if ($data['sale'] == 0) {
                                                        echo "d-none";
                                                    } ?>"><?= $data['sale'] ?>%</div>
                            </div>
                            <div class="content">
                                <div class="name"><a href="./detail.html"><?= $data['product_name'] ?></a></div>
                                <div class="rating">
                                    <?php
                                    $star = 5 - $data['rating'];
                                    if ($data['rating'] > 0) {
                                        for ($i = 0; $i < $data['rating']; $i++) {
                                            echo "<i class='bx bxs-star'></i>";
                                        }
                                    }
                                    if ($star <= 5 && $star > 0) {
                                        for ($j = 0; $j < $star; $j++) {
                                            echo "<i class='bx bx-star'></i>";
                                        }
                                    }
                                    ?>
                                </div>
                                <div class="box-prices">
                                    <span class="current-price"><?= number_format($data['prices'] - (($data['prices'] * $data['sale']) / 100)) ?>vnd</span>
                                    <span class="del-price <?php if ($data['sale'] == 0) {
                                                                echo "d-none";
                                                            } ?>">
                                        <del> <?= number_format($data['prices']) ?> vnd</del>
                                    </span>

                                </div>
                                <div class="d-flex justify-content-center align-items-center">
                                    <div class="add-cart" style="cursor: pointer;">
                                        <a data-toggle="modal" data-target="#popupAddCart"><span>Add to
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




<?php
include_once("./footer.php");
?>