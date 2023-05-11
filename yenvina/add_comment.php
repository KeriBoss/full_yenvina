<?php
session_start();
define('JPATH_BASE', dirname(__FILE__));
require_once $_SERVER["DOCUMENT_ROOT"] . "/model/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/model/database.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/model/user_web.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/model/comment.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/model/product.php";

if(isset($_POST['product_id']) && isset($_POST['user_id']) && isset($_POST['content']) && isset($_POST['rating'])){
    $id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
    $content = $_POST['content'];
    $rating = $_POST['rating'];
}

$user = new UserWeb();
$getAccountById = $user->getAccountById($user_id);
if(count($getAccountById) == 0){
    $_SESSION['login'] = "Bạn chưa đăng nhập tài khoản!";
}else{
    $comment = new Comment();
    $insert = $comment->insert($id, $user_id, $content, $rating);
    $getCommentByProduct = $comment->getCommentByProduct($id);

    //Update rating for product
    $ratingProduct = 0;

    $product = new Product();
    $getProductById = $product->getProductById($id);

    foreach($getCommentByProduct as $item){
        $ratingProduct += $item['rating'];
    }
    $finalRating = ceil( ($getProductById[0]['rating'] + $ratingProduct) / (count($getCommentByProduct) + 1));
    $updateRating = $product->updateRating($id, $finalRating);
}

echo json_encode($getCommentByProduct);