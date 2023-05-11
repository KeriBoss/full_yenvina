<?php
session_start();
require_once "../../jpath.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "./model/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] ."./model/database.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "./model/social.php";

if(isset($_GET['id'])){
    $social_id = $_GET['id'];
}

$social = new Social();
try {
    $delete = $social->delete($social_id);
    header('location: ../../ui/company/social_list.php');
} catch (Throwable $err) {
    echo $err;
}