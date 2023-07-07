<?php
include("./header.php");

$totalPrice = 0;
foreach($getCartByUserId as $item){
    $totalPrice += (($item['prices'] - (($item['prices'] * $item['sale']) / 100)) * $item['quantity']);
}

?>

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
                        <li>Giỏ hàng<span></span></li>
                    </ol>
                </div>
            </div>
        </section>
        <!-- Breadcrumb end-->

        <!-- Content cart start-->
        <section class="carts" id="popupAddCart">
            <div class="container">
                <div class="cart-header">
                    <h3 class="title">Giỏ hàng của bạn</h3>
                </div>
                <div class="cart-content">
                    <div class="cart-wrapper">
                        <div class="modal-header d-none">
                            <h5 class="modal-title text-center" id="exampleModalLongTitle">
                                Giỏ hàng hiện có ( <span>1</span> ) sản phẩm
                            </h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body p-0">
                            <table class="table" data-user="<?=$_SESSION['user']['temp']?>">
                                <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Hình ảnh</th>
                                        <th scope="col">Thông tin</th>
                                        <th scope="col">Giá</th>
                                        <th scope="col">Số lượng</th>
                                        <th scope="col">Tổng tiền</th>
                                        <th scope="col"></th>
                                    </tr>
                                </thead>
                                <tbody data-page="true">
                                    <?php
                                    $count = 1;
                                    foreach($getCartByUserId as $item){ ?>
                                    <tr>
                                        <th scope="row"><?=$count++?></th>
                                        <td>
                                            <img src="./img/product/<?=$item['thumbnail']?>" alt="<?=$item['thumbnail']?>">
                                        </td>
                                        <td>
                                            <p><b class="bold"><?=$item['name']?></b></p>
                                            <p><span class="mb-shown">Phiên bản:</span> <?=$item['weight']?></p>
                                            <p class="mb-shown">Thương hiệu Yến Vina</p>
                                        </td>
                                        <td>
                                            <p><b class="bold"><?= number_format($item['prices'] - (($item['prices'] * $item['sale']) / 100)) ?> VNĐ</b></p>
                                            <p class="mb-shown"><span class="price-old"><?= number_format($item['prices']) ?> VNĐ</span></p>
                                            <p class="mb-shown"><span class="sale">-<?=$item['sale']?>%</span></p>
                                        </td>
                                        <td class="mb-shown">
                                        <div class="range">
                                            <input onclick="btnLowest(<?=$item['product_id']?>,<?=$item['quantity']?>)" type="button" class="lowest_quan" value="-" />
                                            <input id="cart_quantity" type="text" class="main_quan" name="quantity" value="<?=$item['quantity']?>" />
                                            <input onclick="btnHighest(<?=$item['product_id']?>,<?=$item['quantity']?>)" type="button" class="highest_quan" value="+" />
                                        </div>
                                        </td>
                                        <td class="mb-shown-sm"><b class="bold"><?=number_format(($item['prices'] - (($item['prices'] * $item['sale']) / 100)) * $item['quantity'])?> VNĐ</b></td>

                                        <td><a style="cursor: pointer;" onclick="removeProduct(<?=$item['product_id']?>)" class='remove'><i class='bx bx-x'></i></a></td>
                                    </tr>
                                    <?php } ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="modal-footer d-none"></div>
                    </div>
                    <div class="cart-desc row gx-3">
                        <div class="col-lg-6 col-12">
                            <div class="desc-left">
                                <div class="title">
                                    <h3>Ghi chú đơn hàng</h3>
                                </div>
                                <form action="" method="post">
                                    <textarea class="input-area" name="note" placeholder="Ghi chú..." style="border: 1px solid #cccccc;"></textarea>
                                </form>
                            </div>
                        </div>
                        <div class="col-lg-6 col-12">
                            <div class="desc-right">
                                <div class="title">
                                    <h3>Thông tin đơn hàng</h3>
                                </div>
                                <div class="content">
                                    <div class="costs my-3"><span>Tổng tiền: </span><b><?=number_format($totalPrice)?></b> VNĐ</div>
                                    <p><span>Phí vận chuyển sẽ được tính ở trang thanh toán.</span></p>
                                    <p><span>Bạn cũng có thể nhập mã giảm giá ở trang thanh toán.</span></p>
                                    <div class="mb-3"><a class="btn-payment" href="./payment.php">Thanh toán</a></div>
                                    <a class="back-home" href="./index.php"><i class='bx bx-arrow-back'></i> Tiếp tục mua hàng</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Content cart end-->

<?php include_once("./footer.php"); ?>