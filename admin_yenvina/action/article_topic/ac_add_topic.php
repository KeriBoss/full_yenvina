<?php
session_start();
require_once  "../../../model/config.php";
require_once "../../../model/database.php";
require_once  "../../../model/article_topic.php";

if(isset($_POST['topic_name'])){
    $topic_name = $_POST['topic_name'];
}

$article_topic = new ArticleTopic();
try {
    $insert = $article_topic->insert($topic_name);
    header('location: ../../topic_list.php');
} catch (Throwable $err) {
    $_SESSION['error'] = "$err";
    header('location: ../../404.php');
}