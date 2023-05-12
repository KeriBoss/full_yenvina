<?php
include_once "./header.php";
require_once  "../model/article_topic.php";

?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm chủ đề mới</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="p-4 d-flex justify-content-start align-items-center">
            <form action="action/article_topic/ac_add_topic.php" method="post" class="w-50" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="">Tên chủ đề</label>
                    <input type="text" name="topic_name" class="form-control" required>
                </div>
                <button type="submit" class="btn btn-primary">Thêm mới</button>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<?php
include "./footer.php";
?>