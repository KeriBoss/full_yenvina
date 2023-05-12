<?php
include_once "./header.php";
require_once  "../model/company.php";

$company = new Company();
$getCompany = $company->getAllCompany();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý công ty</h1>
        <!-- <a href="./add_protype.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Add new type product</a> -->
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <h6 class="m-0 font-weight-bold text-primary">Công ty chính</h6>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th width="5%">STT</th>
                            <th width="10%">Tên công ty</th>
                            <th width="10%">Số điện thoại</th>
                            <th width="5%">Email</th>
                            <th width="20%">Địa chỉ</th>
                            <th width="20%">Thời gian làm việc</th>
                            <th width="30%">Ghi chú</th>
                            <th width="5%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($getCompany as $item) { ?>
                            <tr>
                                <td><?= $count++; ?></td>
                                <td><?= $item['company_name'] ?></td>
                                <td><?= $item['phone'] ?></td>
                                <td><?= $item['email'] ?></td>
                                <td><?= $item['address'] ?></td>
                                <td><?= $item['work_time'] ?></td>
                                <td><?= $item['description'] ?></td>
                                <td><a href="./edit_company.php?id=<?=$item['id'];?>" class="btn btn-primary">Edit</a></td>
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
include "./footer.php";
?>