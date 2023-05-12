<?php
session_start();
require_once "../../jpath.php";
require_once  "../../../model/config.php";
require_once "../../../model/database.php";
require_once  "../../../model/article_topic.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
}

$article_topic = new ArticleTopic();
try {
    $delete = $article_topic->delete($id);
    header('location: ../../topic_list.php');
} catch (Throwable $err) {
    echo $err;
}