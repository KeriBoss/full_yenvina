<?php
include_once "../../header.php";
require_once  "../../../model/company.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('location: ' . $url . '/404.php');
}
//Created new type of product
$company = new Company();
//Get all type 
$getCompanyById = $company->getCompanyById($id);

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Chỉnh sửa công ty</h1>
        <!-- <a href="./add_protype.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Chỉnh sửa loại sản phẩm</a> -->
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="p-4 d-flex justify-content-start align-items-center">
            <form action="<?= $url ?>/action/company/ac_edit_company.php" method="post" class="w-75" enctype="multipart/form-data">
                <input type="number" name="id_company" value="<?= $id ?>" hidden>
                <div class="form-group">
                    <label for="">Tên công ty</label>
                    <input type="text" name="company_name" class="form-control" value="<?= $getCompanyById[0]['company_name'] ?>" required>
                </div>
                <div class="form-group w-25">
                    <label for="">Số điện thoại</label>
                    <input type="text" name="phone" class="form-control" value="<?= $getCompanyById[0]['phone'] ?>" required>
                </div>
                <div class="form-group">
                    <label for=""></label><br>
                    <input type="email" name="email" class="form-control" value="<?= $getCompanyById[0]['email'] ?>" required>
                </div>
                <div class="form-group">
                    <label for=""></label><br>
                    <input type="text" name="address" class="form-control" value="<?= $getCompanyById[0]['address'] ?>" required>
                </div>
                <div class="form-group">
                    <label for=""></label><br>
                    <input type="text" name="work_time" class="form-control" value="<?= $getCompanyById[0]['work_time'] ?>" required>
                </div>
                <div class="form-group">
                    <label for=""></label><br>
                    <textarea name="description" class="form-control"><?= $getCompanyById[0]['description'] ?></textarea>
                </div>
                <button type="submit" class="btn btn-primary">Lưu Trạng Thái</button>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
      include "../../footer.php";
?>