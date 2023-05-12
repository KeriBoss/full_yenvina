<?php
include_once "./header.php";
require_once  "../model/articles.php";
require_once  "../model/article_topic.php";

$topic = new ArticleTopic();
$allTopic = $topic->getAllTopic();

if(isset($_GET['article_id'])){
    $article_id = $_GET['article_id'];
}else{
    header('location: ./article_list.php');
}

$article = new Articles();
$getArticleById = $article->getArticleById($article_id);
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
            <form action="action/articles/ac_edit_article.php" method="post" class="w-50" enctype="multipart/form-data">
                <input type="number" name="user_id" class="form-control" value="<?= $_SESSION['admin']['id']; ?>" hidden>
                <input type="number" name="article_id" class="form-control" value="<?= $getArticleById[0]['id']; ?>" hidden>
                <div class="form-group">
                    <label for="title">Tiêu đề</label>
                    <input type="text" name="title" class="form-control" value="<?=$getArticleById[0]['title']?>" required>
                </div>
                <div class="form-group">
                    <label for="content">Nội dung</label><br>
                    <textarea name="content" class="form-control" required><?=$getArticleById[0]['content']?></textarea>
                </div>
                <div class="form-group">
                    <label for="">Chủ đề</label>
                    <select name="topic_id" class="form-control w-50" required>
                        <?php foreach($allTopic as $item){
                            if($item['id'] == $getArticleById[0]['topic_id']){
                            ?>
                            <option value="<?=$item['id']?>" selected><?=$item['topic_name']?></option>
                        <?php }else{?>
                            <option value="<?=$item['id']?>"><?=$item['topic_name']?></option>
                        <?php }} ?>
                    </select>
                </div>
                <div class="form-group">
                    <label for="image">Chọn hình ảnh cho bài viết</label><br>
                    <img src="<?=$urlImg?>/img/article/<?=$getArticleById[0]['image']?>" id="img_thumbnail" alt="Img" class="img-fluid">
                    <input id="change_img" type="file" name="image" class="form-control" value="<?=$getArticleById[0]['image']?>">
                    <input type="text" value="<?=$getArticleById[0]['image']?>" name="name_img_product" hidden>
                </div>
                <div class="form-group">
                    <label for="status">Trạng thái</label><br>
                    <select name="status" id="status" class="form-control w-25">
                        <option class="optionDiv" value="0">Ẩn</option>
                        <option class="optionDiv" value="1">Hiện</option>
                    </select>
                </div>
                <div class="form-group">
                    <label for="status_home">Hiển thị tại trang chủ</label><br>
                    <select name="status_home" class="form-control w-25">
                        <option class="status_home" value="1">Có</option>
                        <option class="status_home" value="0">Không</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-primary">Chỉnh Sửa</button>
            </form>
        </div>
    </div>
    <!-- /.container-fluid -->

</div>
<!-- End of Main Content -->
<script>
    var reader;
    let change_img = document.querySelector("#change_img");
    let img_thumbnail = document.querySelector("#img_thumbnail");
    change_img.onchange = e => {
        files = e.target.files;
            reader = new FileReader();
            reader.onload = function() {
                img_thumbnail.src = reader.result;
            }
            reader.readAsDataURL(files[0]);
    }

    //
    for (var i = 0; i < document.querySelectorAll('.optionDiv').length; i++) {
        if ( document.querySelectorAll('.optionDiv')[i].value == '<?=$getArticleById[0]['status'];?>') {
        document.querySelectorAll('.optionDiv')[i].selected = true;
        break;
        }
    }
    //
    for (var i = 0; i < document.querySelectorAll('.status_home').length; i++) {
        if ( document.querySelectorAll('.status_home')[i].value == '<?=$getArticleById[0]['status_home'];?>') {
        document.querySelectorAll('.status_home')[i].selected = true;
        break;
        }
    }
</script>

<?php
include "./footer.php";
?>