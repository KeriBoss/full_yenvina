<?php
session_start();
define('JPATH_BASE', dirname(__FILE__));
require_once "../model/config.php";
require_once "../model/database.php";
require_once "../model/cart.php";

if(isset($_GET['product_id']) && isset($_GET['user_id'])){
    $id = $_GET['product_id'];
    $user_id = $_GET['user_id'];
}

$cart = new Cart();

$removeByUserId = $cart->removeByUserId($id, $user_id);
$getCartByUserId = $cart->getCartByUserId($user_id);

echo json_encode($getCartByUserId);