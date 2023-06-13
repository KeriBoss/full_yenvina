<?php
session_start();
require_once "../../jpath.php";
require_once  "../../../model/config.php";
require_once "../../../model/database.php";
require_once  "../../../model/social.php";

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
if(isset($_POST['id_social'])){
    $id = $_POST['id_social'];
}

$social = new Social();
try {
    $update = $social->update($id, $social_name, $description, $href, $icon_social, $status);
    header('location: ../../social_list.php');
} catch (Throwable $err) {
    $_SESSION['error'] = "$err";
    header('location: ../../404.php');
}
