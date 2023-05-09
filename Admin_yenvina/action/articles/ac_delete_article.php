<?php
session_start();
require_once "../../jpath.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "./model/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] ."./model/database.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "./model/articles.php";

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