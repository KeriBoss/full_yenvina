<?php
include("./header.php");
require_once "../model/banner.php";

//Get all banner in database
$banner = new Banner();
$getAllBanner = $banner->getAllBanner();

//Get product
$getAllProduct = $product->getAllProduct();

$page = 1;
$perPage = 8;
if (!isset ($_GET['page']) ) {  
    $page = 1;  
} else {  
    $page = $_GET['page'];  
}
//Check current page have _POST values search
if(isset($_GET['search'])){
    $search = $_GET['search'];
    $getProductsByPage = $product->searchProductsPaging($search, $perPage ,$page);
    $getAllProductHomepage = $product->searchProducts($search);
}
else if(isset($_GET['type'])){
    $categoryId = $_GET['type'] * 1;
    $getProtypeById = $protype->getProtypeById($categoryId);//Get info categories by id
    $getProductsByPage = $product->getProductsByCategory($categoryId, $perPage ,$page);
    $getAllProductHomepage = $product->getProductsByCategory($categoryId);
}
else if(isset($_GET['arrange'])){
    if($_GET['arrange'] == 'ascending'){
        $getProductsByPage = $product->getAscending($perPage ,$page);
        $getAllProductHomepage = $product->getAscending();
    }
    else if($_GET['arrange'] == 'descending'){
        $getProductsByPage = $product->getDescending($perPage ,$page);
        $getAllProductHomepage = $product->getDescending();//Get all item in array
    }
}
else{
    $getProductsByPage = $product->getProductsByPage($perPage ,$page);
    $getAllProductHomepage = $product->getAllProductHomepage();
}

$total_pages = ceil (count($getAllProductHomepage) / $perPage);
?>
        <!-- Product start-->
        <section class="lists-product search container">
            <?php if(!isset($search)){ ?>
            <!--Banner-->
                <div id="header-carousel" class="carousel slide mb-shown" data-bs-ride="carousel">
                    <div class="carousel-inner">
                        <?php
                            $countBanner = 1;
                            foreach($getAllBanner as $item){
                                if($countBanner == 1){
                                    ?>
                                    <div class="carousel-item active">
                                        <img class="w-100" src="img/banner/<?=$item['img_web']?>" alt="Image" />
                                    </div>
                                <?php }
                                else{ ?>
                                    <div class="carousel-item">
                                        <img class="w-100" src="img/banner/<?=$item['img_web']?>" alt="Image" />
                                    </div>
                                <?php }
                                $countBanner++;
                            }
                        ?>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                        data-bs-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                        data-bs-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="visually-hidden">Next</span>
                    </button>
                </div>
            <?php } ?>

            <!-- Breadcrumb start-->
            <div class="breadcrumb container">
                <div class="row">
                    <div class="col-12">
                        <ol class="breadcrumb-shop p-0">
                            <li>
                                <a href="/index.html"><span>Trang chủ</span></a>
                            </li>
                            <li>
                                <a href="/index.html"><span>Sản phẩm</span></a>
                            </li>
                            <!-- <li><span>Yến sào hoa quả sơn</span></li> -->
                        </ol>
                    </div>
                </div>
            </div>
            <!-- Breadcrumb end-->

            <div class="lists-main">
                <?php if(isset($search)){ ?>
                    <div class="box search-header text-center">
                        <div class="title">Tìm kiếm</div>
                    </div>
                    <div class="box search-info mt-3">
                        <form action="./product.php" method="get">
                            <input type="search" name="search" placeholder="Tìm kiếm...">
                            <button type="submit"><i class='bx bx-search' ></i></button>
                        </form>
                        <?php if(count($getProductsByPage) == 0){ ?>
                        <div class="d-flex justify-content-center align-items-center mb-shown"><span>
                            Rất tiếc, chúng tôi không tìm thấy kết quả cho từ khóa của bạn
                            Vui lòng kiểm tra chính tả, sử dụng các từ tổng quát hơn và thử lại!
                        </span></div>
                        <?php } ?>
                    </div>
                <?php } ?>
                <div class="box filter d-flex flex-wrap justify-content-between align-items-center">
                    <h3 class="title mb-0">Tổ yến</h3>
                    <div class="btn-filter"><i class='bx bx-filter-alt'></i> Bộ lọc</div>
                </div>
                <div class="box arrange">
                    <div class="title">Arrange for:</div>
                    <form method="get" action="./product.php?sort_by=" class="d-flex gap-3 flex-wrap">
                        <div class="item">
                            <input type="radio" name="arrange" value="ascending" id="item1">
                            <label for="item1">Giá: Tăng dần</label>
                        </div>
                        <div class="item">

                            <input type="radio" name="arrange" value="descending" id="item2">
                            <label for="item2">Giá: Giảm dần</label>
                        </div>
                        <button type="submit" class="border-dark bg-white rounded">Lọc</button>
                </div>
                    </form>
                </div>
                <div class="box lists-item">
                    <!-- Product start -->
                    <div class="row">
                        <?php foreach($getProductsByPage as $item){ ?>
                            <div class="col-lg-3 col-md-6 col-12">
                                <div class="products splide__slide">
                                    <div class="img">
                                        <div class="circle"></div>
                                        <div class="gift <?php if($item['sale'] == 0){echo "d-none";} ?>"><i class='bx bxs-gift'></i></div>
                                        <a href="./detail.php?id=<?=$item['id']?>">
                                            <img src="img/product/<?=$item['thumbnail']?>"
                                                alt="<?=$item['thumbnail']?>" />
                                        </a>
                                        <div class="sale <?php if($item['sale'] == 0){echo "d-none";} ?>"><?=$item['sale']?>%</div>
                                    </div>
                                    <div class="content">
                                        <div class="name"><a href="./detail.html"><?=$item['product_name']?></a>
                                        </div>
                                        <div class="rating">
                                        <?php
                                            $star = 5 - $item['rating'];
                                            if($item['rating'] > 0){
                                                for($i = 0; $i < $item['rating']; $i++){
                                                    echo "<i class='bx bxs-star'></i>";
                                                }
                                            }
                                            if($star <= 5 && $star > 0){
                                                for($j = 0; $j < $star; $j++){
                                                    echo "<i class='bx bx-star'></i>";
                                                }
                                            }
                                        ?>
                                        </div>
                                        <div class="box-prices">
                                            <span class="current-price"><?= number_format($item['prices'] - (($item['prices'] * $item['sale']) / 100)) ?>vnd</span>
                                            <span class="del-price <?php if($item['sale'] == 0){echo "d-none";} ?>">
                                                <del> <?= number_format($item['prices']) ?> vnd</del>
                                            </span>
                                            
                                        </div>
                                        <div class="d-flex justify-content-center align-items-center">
                                            <div class="add-cart" style="cursor: pointer;">
                                            <a data-toggle="modal" data-target="#popupAddCart" data-parent="<?=$item['id']?>" data-user="<?=$_SESSION['user']['temp']?>"><span>Add to
                                                    cart</span></a>
                                                <div class="icon-cart"><i class='bx bx-cart'></i></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        <?php } ?>
                    </div>
                    <!--Paging start-->
                    <div class="paging row">
                        <div class="col-12 d-flex justify-content-center align-items-center">
                            <?php
                            if($page > 1){
                                $pre = $page - 1;
                                if(isset($search)){
                                    echo " <a href='./product.php?search=$search&page=$pre'><i class='bx bx-left-arrow-alt' ></i></a>";
                                }else{
                                    echo " <a href='./product.php?page=$pre'><i class='bx bx-left-arrow-alt' ></i></a>";
                                }
                            }
                            ?>
                            <?php
                                for($page_number = 1; $page_number<= $total_pages; $page_number++) {
                                    if($page_number == $page){
                                        if(isset($search)){
                                            echo "<a class='active' href='product.php?search=$search&page=$page_number'>$page_number</a>";  
                                        }else if(isset($categoryId)){
                                            echo "<a class='active' href='product.php?type=$categoryId&page=$page_number'>$page_number</a>";  
                                        }else{
                                            echo '<a class="active" href = "product.php?page=' . $page_number . '">' . $page_number . ' </a>';  
                                        }
                                    }else{
                                        if(isset($search)){
                                            echo "<a href='product.php?search=$search&page=$page_number'>$page_number</a>";  
                                        }else if(isset($categoryId)){
                                            echo "<a href='product.php?type=$categoryId&page=$page_number'>$page_number</a>";  
                                        }else{
                                            echo '<a href = "product.php?page=' . $page_number . '">' . $page_number . ' </a>';  
                                        }
                                    }
                                }  
                            ?>
                            <?php
                            if($page < $total_pages){
                                $next = $page + 1;
                                $pre = $page - 1;
                                if(isset($search)){
                                    echo " <a href='./product.php?search=$search&page=$pre'><i class='bx bx-right-arrow-alt' ></i></a>";
                                }else if(isset($categoryId)){
                                    echo " <a href='./product.php?type=$categoryId&page=$pre'><i class='bx bx-right-arrow-alt' ></i></a>";
                                }else{
                                    echo " <a href='./product.php?page=$next'><i class='bx bx-right-arrow-alt' ></i></a>";
                                }
                                
                            }
                            ?>
                        </div>
                    </div>
                    <!--Paging end-->
                </div>
            </div>
        </section>
        <!-- Product end -->

        <!-- Modal -->
        <div class="modal fade" id="popupAddCart" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle"
            aria-hidden="true">
            <div class="modal-dialog model-wh modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title text-center" id="exampleModalLongTitle">
                            Gio hang hien co ( <span>1</span> )san pham
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <table class="table" data-user="<?=$_SESSION['user']['temp']?>">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Hình ảnh</th>
                                    <th scope="col">Tên sản phẩm</th>
                                    <th scope="col">Giá</th>
                                    <th scope="col">Số lượng</th>
                                    <th scope="col">Thành tiền</th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="modal-footer"></div>
                </div>
            </div>
        </div>

<?php
include_once("./footer.php");
?>