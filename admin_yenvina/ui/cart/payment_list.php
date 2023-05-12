<?php
include_once "../../header.php";
require_once  "../../../model/user_web.php";
require_once  "../../../model/cart.php";

$user = new UserWeb();

$cart = new Cart();
$getAllCartOfUser = $cart->getAllCartOfUser();//Get datas cart of user

$getPaymentOfUser = $user->getPaymentOfUser();

?>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Quản lý thông tin thanh toán người dùng</h1>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách lịch sử thanh toán</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="2%">STT</th>
                                            <th width="10%">Tên</th>
                                            <th width="10%">Số điện thoại</th>
                                            <th width="10%">PT vận chuyển</th>
                                            <th width="10%">PT thanh toán</th>
                                            <th width="10%">Tổng tiền</th>
                                            <th width="10%">Ngày thanh toán</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 1;
                                        foreach($getPaymentOfUser as $item){ ?>
                                        <tr>
                                            <td><?= $count++; ?></td>
                                            <td><?=$item['name']?></td>
                                            <td><?=$item['phone']?></td>
                                            <td><?=$item['transport']?></td>
                                            <td><?=$item['type_payment']?></td>
                                            <td><?=$item['price']?></td>
                                            <td><?=$item['date']?></td>
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