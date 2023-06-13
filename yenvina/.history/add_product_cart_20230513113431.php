<?php
session_start();
define('JPATH_BASE', dirname(__FILE__));
require_once "../model/config.php";
require_once "../model/database.php";
require_once "../model/cart.php";

if(isset($_POST['product_id']) && isset($_POST['user_id'])){
    $id = $_POST['product_id'];
    $user_id = $_POST['user_id'];
}
$quantity = 1;//Default

$cart = new Cart();

$getCartByProductId = $cart->getCartByProductId($id, $user_id);
if(count($getCartByProductId) > 0){
    $quantity = $getCartByProductId[0]['quantity'] + 1;
    if(isset($_GET['quantity'])){
        $quantity = $_GET['quantity'];
    }    
    $update = $cart->update($id,$user_id, $quantity);
}else{
    $insert = $cart->insert($id, $user_id , $quantity);
}

$getCartByUserId = $cart->getCartByUserId($user_id);

echo json_encode($getCartByUserId);