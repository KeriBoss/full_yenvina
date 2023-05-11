<?php
include_once "../../header.php";
require_once $refRoot . "./model/social.php";

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm mạng xã hội mới</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="p-4 d-flex justify-content-start align-items-center">
            <form action="<?= $url ?>/action/social/ac_add_social.php" method="post" class="w-50" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên</label>
                    <input type="text" name="social_name" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="">Mô tả chi tiết</label><br>
                    <textarea name="description" class="form-control" required></textarea>
                </div>
                <div class="form-group w-50">
                    <label for="">Đường dẫn - Link</label>
                    <input type="text" name="href" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="status">Chọn icon</label><br>
                    <select id="mySelect" name="icon_social" data-show-content="true" class="form-control w-50">
                        <option selected disabled>Select..</option>
                        <option value="bxl-facebook-square" data-content="<i class='bx bxl-facebook-square'></i> Facebook"></option>
                        <option value="bxl-youtube" data-content="<i class='bx bxl-youtube' ></i> Youtube"></option>
                        <option value="bxl-google-plus" data-content="<i class='bx bxl-google-plus' ></i> Google"></option>
                        <option value="bxl-twitter" data-content="<i class='bx bxl-twitter' ></i> Twitter"></option>
                        <option value="bxl-pinterest" data-content="<i class='bx bxl-pinterest'></i> Priterest"></option>
                        <option value="bxl-skype" data-content="<i class='bx bxl-skype'></i> Skype"></option>
                        <option value="bxl-tiktok" data-content="<i class='bx bxl-tiktok'></i> Tiktok"></option>
                        <option value="bxl-bing" data-content="<i class='bx bxl-bing'></i> Bing"></option>
                        <!-- <option data-content="<span class='badge badge-warning mt-1 ml-2 float-right'>3</span> More"></option> -->
                    </select>
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label><br>
                    <select name="status" class="form-control w-25">
                        <option value="0">Ẩn</option>
                        <option value="1">Hiện</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
    include $refRoot ."./Admin_yenvina/footer.php";
?>