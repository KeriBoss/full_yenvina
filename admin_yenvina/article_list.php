<?php
include_once "./header.php";
require_once  "../model/articles.php";
require_once  "../model/article_topic.php";

//Created article topic
$topic = new ArticleTopic();
//Created article
$articles = new Articles();
//Get all type 
$getAllArticle = $articles->getAllArticle();
$getAllTopic = $topic->getAllTopic();

?>


            <!-- Begin Page Content -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">Quản lý các bài viết</h1>
                    <a href="./add_article.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Thêm bài viết mới</a>
                </div>

                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Danh sách các bài viết</h6>
                        </div>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                    <thead>
                                        <tr>
                                            <th width="2%">STT</th>
                                            <th width="10%">Tiêu đề</th>
                                            <th width="20%">Nội dung</th>
                                            <th width="10%">Chủ đề</th>
                                            <th width="20%">Hình ảnh</th>
                                            <th width="5%">Trạng thái</th>
                                            <th width="5%">Hiển thị trang chủ</th>
                                            <th width="5%"></th>
                                            <th width="5%"></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $count = 1;
                                        foreach($getAllArticle as $item){ ?>
                                        <tr>
                                            <td><?= $count++; ?></td>
                                            <td><?=$item['title']?></td>
                                            <td><?=$item['content']?></td>
                                            <?php
                                                foreach($getAllTopic as $data){
                                                    if($data['id'] == $item['topic_id']){
                                            ?>
                                                        <td><?=$data['topic_name']?></td>
                                            <?php }} ?>
                                            <td>
                                                <img height="150" width="auto" src="<?=$urlImg?>/img/article/<?=$item['image']?>" style="object-fit: cover;" alt="Img article">
                                            </td>
                                            <td>
                                                <?php if($item['status'] == 0){
                                                    echo "Ẩn";
                                                } else{ echo "Hiện"; }?>
                                            </td>
                                            <td>
                                                <?php if($item['status_home'] == 0){
                                                    echo "Không";
                                                } else{ echo "Có"; }?>
                                            </td>
                                            <td><a href="./edit_article.php?article_id=<?=$item['id'];?>" class="btn btn-primary">Edit</a></td>
                                            <td><a onclick="if(CheckForm() == false) return false" href="../../action/articles/ac_delete_article.php?article_id=<?=$item['id'];?>" class="btn btn-danger">Delete</a></td>
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