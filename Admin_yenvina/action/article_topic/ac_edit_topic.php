<?php
session_start();
require_once "../../jpath.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "./model/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] ."./model/database.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "./model/article_topic.php";

if(isset($_POST['id'])){
    $id = $_POST['id'];
}
if(isset($_POST['topic_name'])){
    $topic_name = $_POST['topic_name'];
}

$article_topic = new ArticleTopic();
try {
    $update = $article_topic->update($id, $topic_name);
    header('location: ../../ui/article_topic/topic_list.php');
} catch (Throwable $err) {
    echo $err;
}