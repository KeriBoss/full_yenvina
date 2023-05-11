<?php
session_start();
require_once "../../jpath.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "./model/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] ."./model/database.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "./model/social.php";

if(isset($_POST['social_name'])){
    $social_name = $_POST['social_name'];
}
if(isset($_POST['description'])){
    $description = $_POST['description'];
}
if(isset($_POST['href'])){
    $href = $_POST['href'];
}
if(isset($_POST['status'])){
    $status = $_POST['status'];
}
if(isset($_POST['icon_social'])){
    $icon_social = $_POST['icon_social'];
}

$social = new Social();
try {
    $insert = $social->insert($social_name, $description, $href, $icon_social, $status);
    header('location: ../../ui/company/social_list.php');
} catch (Throwable $err) {
    echo $err;
}