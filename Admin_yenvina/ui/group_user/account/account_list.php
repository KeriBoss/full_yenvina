<?php
include_once "../../../header.php";
require_once $refRoot . "./model/user_web.php";

$user = new UserWeb();
$getAccount = $user->getAllAccount();

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
                                            <th width="20%">Email</th>
                                            <th width="20%">Loại</th>
                                            <th width="10%">Ngày tạo</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 1;
                                        foreach($getAccount as $item){ ?>
                                        <tr>
                                            <td><?= $count++; ?></td>
                                            <td><?=$item['user_name']?></td>
                                            <td><?=$item['email']?></td>
                                            <td><?=$item['member']?></td>
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

            <!-- Modal -->
            <div class="modal fade" id="popupMember" tabindex="-1" role="dialog" aria-labelledby="popupMember"
            aria-hidden="true">
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
                        <form action="">
                            <div class="form-group">
                                <label for="">Loại thành viên:</label>
                                <select name="" id=""></select>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <div class="group">
                            <a href="./cart.html" class="btn-tablink">Giỏ hàng</a>
                            <a href="./payment.html" class="btn-tablink active">Thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php
    include $refRoot ."./Admin_yenvina/footer.php";
    ?>