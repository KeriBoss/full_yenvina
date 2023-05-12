<?php
session_start();
require_once "../../jpath.php";
require_once  "../../../model/config.php";
require_once "../../../model/database.php";
require_once  "../../../model/articles.php";

if(isset($_GET['article_id'])){
    $article_id = $_GET['article_id'];
}

$articles = new Articles();
try {
    $delete = $articles->delete($article_id);
    header('location: ../../ui/articles/article_list.php');
} catch (Throwable $err) {
    echo $err;
}