<?php
session_start();
require_once "../../jpath.php";
require_once  "../../../model/config.php";
require_once "../../../model/database.php";
require_once  "../../../model/social.php";

if(isset($_GET['id'])){
    $social_id = $_GET['id'];
}

$social = new Social();
try {
    $delete = $social->delete($social_id);
    header('location: ../../social_list.php');
} catch (Throwable $err) {
    echo $err;
}