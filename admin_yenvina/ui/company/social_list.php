<?php
include_once "../../header.php";
require_once  "../../../model/social.php";

$social = new Social();
$getAllSocial = $social->getAllSocial();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý thông tin các mạng xã hội</h1>
        <a href="./add_social.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Thêm mạng xã hội mới</a>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Danh sách các mạng xã hội</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">STT</th>
                            <th width="20%">Tên</th>
                            <th width="35%">Mô tả</th>
                            <th width="20%">Link</th>
                            <th width="5%">Icon</th>
                            <th width="10%">Trạng thái</th>
                            <th width="5%"></th>
                            <th width="5%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($getAllSocial as $item) { ?>
                            <tr>
                                <td><?= $count++; ?></td>
                                <td><?= $item['social_name'] ?></td>
                                <td><?= $item['description'] ?></td>
                                <td><?= $item['href'] ?></td>
                                <td><i class='bx <?=$item['icon']?>' style="font-size: 30px;"></i></td>
                                <?php if($item['status'] == 1){
                                    echo "<td>Hiện</td>";
                                }else{
                                    echo "<td>Ẩn</td>";
                                } ?>
                                <td><a href="./edit_social.php?id=<?=$item['id'];?>" class="btn btn-primary">Edit</a></td>
                                <td><a onclick="if(CheckForm() == false) return false" href="../../action/social/ac_delete_social.php?id=<?=$item['id'];?>" class="btn btn-danger">Delete</a></td>
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