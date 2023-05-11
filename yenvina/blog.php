<?php
include("./header.php");
require_once $refRoot . "/model/articles.php";

$article = new Articles();

$page = 1;
$perPage = 3;
if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}
//Check current page have _POST values search
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $getAllArticle = $article->searchArticle($search, $perPage ,$page);
    $getArticle = $article->searchArticle($search);
}
else{
    $getAllArticle = $article->getArticlesByPage($perPage ,$page);
    $getArticle = $article->getArticleHomePage();
}
$total_pages = ceil (count($getArticle) / $perPage);

?>

        <!-- Product start-->
        <section class="search lists-product container">
            <!-- Breadcrumb start-->
            <div class="breadcrumb container">
                <div class="row">
                    <div class="col-12">
                        <ol class="breadcrumb-shop p-0">
                            <li>
                                <a href="/index.php"><span>Trang chủ</span></a>
                            </li>
                            <li>
                                <a href="/blog.php"><span>Bài viết</span></a>
                            </li>
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Breadcrumb end-->

            <div class="lists-main">
                <div class="box blog-header text-center">
                    <div class="title">Tin tức</div>
                </div>
                <div class="box blog-info mt-3">
                    <form action="./blog.php?search=" method="get">
                        <input type="search" name="search" placeholder="Tìm kiếm...">
                        <button type="submit"><i class='bx bx-search' ></i> Tìm kiếm</button>
                    </form>
                </div>
                <div class="box lists-item">
                    <!-- Product start -->
                    <div class="row gy-4">
                        <?php foreach($getAllArticle as $item){ ?>
                            <div class="col-lg-4 col-md-6 col-12">
                                <div class="blogs splide__slide">
                                    <div class="img">
                                        <div class="circle"></div>
                                        <a href="./article.php?article_id=<?=$item['article_id']?>">
                                            <img src="img/article/<?=$item['image']?>"
                                                alt="<?=$item['image']?>" />
                                        </a>
                                    </div>
                                    <div class="content">
                                        <div class="title"><a href="./article.php?article_id=<?=$item['article_id']?>"><?=$item['title']?></a></div>
                                        <div class="owner row gx-0">
                                            <div class="col-8">
                                                <i class='bx bx-user'></i><?=$item['company_name']?>
                                            </div>
                                            <div class="col-4">
                                                <i class='bx bx-calendar'></i> <span><?=$item['create_at']?></span>
                                            </div>
                                        </div>
                                        <div class="note">
                                            <div class="icon-gift">
                                                <span><i class='bx bxs-gift'></i> <?=$item['content']?></span>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                      <!--Paging start-->
                      <div class="paging row mt-3">
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <?php
                            if($page > 1){
                                $pre = $page - 1;
                                if(isset($search)){
                                    echo " <a href='./blog.php?search=$search&page=$pre'><i class='bx bx-left-arrow-alt' ></i></a>";
                                }else{
                                    echo " <a href='./blog.php?page=$pre'><i class='bx bx-left-arrow-alt' ></i></a>";
                                }
                            }
                            ?>
                            <?php
                                for($page_number = 1; $page_number<= $total_pages; $page_number++) {
                                    if($page_number == $page){
                                        if(isset($search)){
                                            echo "<a class='active' href='blog.php?search=$search&page=$page_number'>$page_number</a>";
                                        }else{
                                            echo '<a class="active" href = "blog.php?page=' . $page_number . '">' . $page_number . ' </a>';  
                                        }
                                    }else{
                                        if(isset($search)){
                                            echo "<a href='blog.php?search=$search&page=$page_number'>$page_number</a>";
                                        }else{
                                            echo '<a href = "blog.php?page=' . $page_number . '">' . $page_number . ' </a>';  
                                        }
                                    }
                                }  
                            ?>
                            <?php
                            if($page < $total_pages){
                                $next = $page + 1;
                                $pre = $page - 1;
                                if(isset($search)){
                                    echo " <a href='./blog.php?search=$search&page=$pre'><i class='bx bx-right-arrow-alt' ></i></a>";
                                }else{
                                    echo " <a href='./blog.php?page=$next'><i class='bx bx-right-arrow-alt' ></i></a>";
                                }
                                
                            }
                            ?>
                        </div>
                    </div>
                    <!--Paging end-->
        </section>
        <!-- Product end -->

<?php include_once("./footer.php"); ?>