<?php
include_once "../../../header.php";
require_once  "../../../../model/user_web.php";

$user = new UserWeb();
$getAllInfoOfUser = $user->getAllInfoOfUser();

?>
            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Quản lý tài khoản người dùng</h1>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách các tài khoản</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="2%">STT</th>
                                            <th width="10%">Tên tài khoản</th>
                                            <th width="10%">Tên người dùng</th>
                                            <th width="10%">Điên thoại</th>
                                            <th width="20%">Địa chỉ</th>
                                            <th width="10%">Ngày tạo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 1;
                                        foreach($getAllInfoOfUser as $item){ ?>
                                        <tr>
                                            <td><?= $count++; ?></td>
                                            <td><?=$item['user_name']?></td>
                                            <td><?=$item['name_user']?></td>
                                            <td><?=$item['phone']?></td>
                                            <td><?=$item['address']?></td>
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
          include "../../../footer.php";
    ?>