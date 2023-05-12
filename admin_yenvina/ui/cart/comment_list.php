<?php
include_once "../../header.php";
require_once  "../../../model/user_web.php";
require_once  "../../../model/comment.php";
require_once  "../../../model/product.php";

$comment = new Comment();
$getAllComment = $comment->getAllComment();

$product = new Product();
$getAllProduct = $product->getAllProduct();

$user = new UserWeb();
$getAllAccount = $user->getAllAccount();//Get datas cart of user

?>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Quản lý giỏ hàng người dùng</h1>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách giỏ hàng</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="2%">STT</th>
                                            <th width="10%">Tên tài khoản</th>
                                            <th width="10%">Sản phẩm</th>
                                            <th width="10%">Nội dụng</th>
                                            <th width="10%">Đánh giá (<i class='bx bxs-star'></i>)</th>
                                            <th width="10%">Ngày tạo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 1;
                                        foreach($getAllComment as $item){ ?>
                                        <tr>
                                            <td><?= $count++; ?></td>
                                            <?php foreach($getAllAccount as $account){
                                                if($account['user_id'] == $item['user_id']){
                                                ?>
                                                <td><?=$account['user_name']?></td>
                                            <?php }} ?>
                                            <?php foreach($getAllProduct as $data){
                                                if($data['id'] == $item['product_id']){
                                                ?>
                                                <td><?=$data['product_name']?></td>
                                            <?php }} ?>
                                            <td><?=$item['content']?></td>
                                            <td><?=$item['rating']?></td>
                                            <td><?=$item['create_at']?></td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->



    <?php
        include "../../footer.php";
    ?>