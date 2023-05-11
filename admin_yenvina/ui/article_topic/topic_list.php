<?php
include_once "../../header.php";
require_once $refRoot . "./model/article_topic.php";

$topic = new ArticleTopic();
$getAllTopic = $topic->getAllTopic();
?>

<!-- Begin Page Content -->
<div class="container-fluid">

    <!-- Page Heading -->
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Quản lý công ty</h1>
        <a href="./add_topic.php" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i>Thêm chủ đề mới</a>
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
                            <th>Tên chủ đề</th>
                            <th>Ngày tạo</th>
                            <th width="5%"></th>
                            <th width="5%"></th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $count = 1;
                        foreach ($getAllTopic as $item) { ?>
                            <tr>
                                <td><?= $count++; ?></td>
                                <td><?= $item['topic_name'] ?></td>
                                <td><?= date("d-m-Y",strtotime($item['create_at']))?></td>
                                <td><a href="./edit_topic.php?id=<?=$item['id'];?>" class="btn btn-primary">Edit</a></td>
                                <td><a onclick="if(CheckForm() == false) return false" href="../../action/article_topic/ac_delete_topic.php?id=<?=$item['id'];?>" class="btn btn-danger">Delete</a></td>
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
    include $refRoot ."./Admin_yenvina/footer.php";
?>