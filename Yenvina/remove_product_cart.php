<?php
session_start();
define('JPATH_BASE', dirname(__FILE__));
require_once $_SERVER["DOCUMENT_ROOT"] . "/model/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/model/database.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/model/cart.php";

if(isset($_GET['product_id']) && isset($_GET['user_id'])){
    $id = $_GET['product_id'];
    $user_id = $_GET['user_id'];
}

$cart = new Cart();

$removeByUserId = $cart->removeByUserId($id, $user_id);
$getCartByUserId = $cart->getCartByUserId($user_id);

echo json_encode($getCartByUserId);