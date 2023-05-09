<?php
session_start();
require_once "../jpath.php";
require_once $_SERVER["DOCUMENT_ROOT"] ."./model/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] ."./model/database.php";
require_once $_SERVER["DOCUMENT_ROOT"] ."./model/product.php";

if(isset($_GET['product_id'])){
    $product_id = $_GET['product_id'];
}

$products = new Product();
try {
    $delete = $products->delete($product_id);
    header('location: ../index.php');
} catch (Throwable $err) {
    echo $err;
}