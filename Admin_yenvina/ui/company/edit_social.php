<?php
include_once "../../header.php";
require_once $refRoot . "./model/social.php";

if (isset($_GET['id'])) {
    $id = $_GET['id'];
} else {
    header('location: ' . $url . '/404.php');
}
//Created new type of product
$social = new Social();
//Get all type 
$getSocialById = $social->getSocialById($id);

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
            <form action="<?= $url ?>/action/social/ac_edit_social.php" method="post" class="w-75" enctype="multipart/form-data">
                <input type="number" name="id_social" value="<?= $id ?>" hidden>
                <div class="form-group">
                    <label for="">Tên công ty</label>
                    <input type="text" name="social_name" class="form-control" value="<?= $getSocialById[0]['social_name'] ?>" required>
                </div>
                <div class="form-group">
                    <label for="">Mô tả chi tiết</label><br>
                    <textarea name="description" class="form-control"><?= $getSocialById[0]['description'] ?></textarea>
                </div>
                <div class="form-group w-25">
                    <label for="">Đường dẫn</label>
                    <input type="text" name="href" class="form-control" value="<?= $getSocialById[0]['href'] ?>" required>
                </div>
                <label for="status">Chọn icon</label><br>
                    <select id="mySelect" name="icon_social" data-show-content="true" class="form-control w-50">
                        <option value="bxl-facebook-square" data-content="<i class='bx bxl-facebook-square'></i> Facebook"></option>
                        <option class="iconDiv" value="bxl-youtube" data-content="<i class='bx bxl-youtube' ></i> Youtube"></option>
                        <option class="iconDiv" value="bxl-google-plus" data-content="<i class='bx bxl-google-plus' ></i> Google"></option>
                        <option class="iconDiv" value="bxl-twitter" data-content="<i class='bx bxl-twitter' ></i> Twitter"></option>
                        <option class="iconDiv" value="bxl-pinterest" data-content="<i class='bx bxl-pinterest'></i> Priterest"></option>
                        <option class="iconDiv" value="bxl-skype" data-content="<i class='bx bxl-skype'></i> Skype"></option>
                        <option class="iconDiv" value="bxl-tiktok" data-content="<i class='bx bxl-tiktok'></i> Tiktok"></option>
                        <option class="iconDiv" value="bxl-bing" data-content="<i class='bx bxl-bing'></i> Bing"></option>
                    </select>
                <div class="form-group">
                    <label for="status">Trạng thái</label><br>
                    <select name="status" id="status" class="form-control w-25">
                        <option class="optionDiv" value="0">Ẩn</option>
                        <option class="optionDiv" value="1">Hiện</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Lưu Trạng Thái</button>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script language="javascript">
for (var i = 0; i < document.querySelectorAll('.optionDiv').length; i++) {
    if ( document.querySelectorAll('.optionDiv')[i].value == '<?=$getSocialById[0]['status'];?>') {
        document.querySelectorAll('.optionDiv')[i].selected = true;
        break;
    }
}
for (var i = 0; i < document.querySelectorAll('.iconDiv').length; i++) {
    if ( document.querySelectorAll('.iconDiv')[i].value == '<?=$getSocialById[0]['icon'];?>') {
        document.querySelectorAll('.iconDiv')[i].selected = true;
        break;
    }
}
</script>
<?php
    include $refRoot ."./Admin_yenvina/footer.php";
?>