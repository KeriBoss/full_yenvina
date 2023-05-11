<?php
include_once "../../header.php";
require_once $refRoot . "./model/user_web.php";
require_once $refRoot . "./model/cart.php";

$user = new UserWeb();

$cart = new Cart();
$getAllCartOfUser = $cart->getAllCartOfUser();//Get datas cart of user

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
                                            <th width="10%">ID Tài Khoản</th>
                                            <th width="10%">Tên người dùng</th>
                                            <th width="10%">Số lượng</th>
                                            <th width="10%">Mã giỏ hàng</th>
                                            <th width="10%">Ngày tạo</th>
                                            <th width="10%">Last update</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 1;
                                        foreach($getAllCartOfUser as $item){ ?>
                                        <tr>
                                            <td><?= $count++; ?></td>
                                            <td><?=$item['user_id']?></td>
                                            <?php
                                            $getUserById = $user->getUserById($item['user_id']);
                                                if(count($getUserById) > 0){?>
                                                    <td><?=$getUserById[0]['name_user']?></td>
                                            <?php }else{ ?>
                                                    <td>Chưa đăng ký</td>
                                                <?php } ?>
                                            <td><?=$item['quantity']?></td>
                                            <td><?=$item['code']?></td>
                                            <td><?=$item['create_at']?></td>
                                            <td><?=$item['update_at']?></td>
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
    include $refRoot ."./Admin_yenvina/footer.php";
    ?>