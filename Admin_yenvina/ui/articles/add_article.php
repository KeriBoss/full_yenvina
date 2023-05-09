<?php
include_once "../../header.php";
require_once $refRoot . "./model/article_topic.php";

$topic = new ArticleTopic();
$allTopic = $topic->getAllTopic();
?>
<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Thêm bài viết mới</h1>
    </div>

    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="p-4 d-flex justify-content-start align-items-center">
            <form action="<?= $url ?>/action/articles/ac_add_article.php" method="post" class="w-50" enctype="multipart/form-data">
                <input type="text" name="user_id" class="form-control" value="<?= $_SESSION['user']['id']; ?>" hidden>
                <div class="form-group">
                    <label for="title">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="content">Nội dung</label><br>
                    <textarea name="content" class="form-control" required></textarea>
                </div>
                <div class="form-group">
                    <label for="">Chủ đề</label>
                    <select name="topic_id" class="form-control w-50" required>
                        <?php foreach($allTopic as $item){ ?>
                            <option value="<?=$item['id']?>"><?=$item['topic_name']?></option>
                        <?php } ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Chọn hình ảnh cho bài viết</label>
                    <input type="file" name="image" class="form-control" required>
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label><br>
                    <select name="status" class="form-control w-25">
                        <option value="1">Hiện</option>
                        <option value="0">Ẩn</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status_home">Hiển thị tại trang chủ</label><br>
                    <select name="status_home" class="form-control w-25">
                        <option value="1">Có</option>
                        <option value="0">Không</option>
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