<?php
session_start();
require_once "../../jpath.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "./model/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] ."./model/database.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "./model/banner.php";

if(isset($_GET['banner_id'])){
    $banner_id = $_GET['banner_id'];
}

$banner = new Banner();
try {
    $delete = $banner->delete($banner_id);
    header('location: ../../ui/banner/banner_list.php');
} catch (Throwable $err) {
    echo $err;
}