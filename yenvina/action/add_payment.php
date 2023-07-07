<?php
session_start();
define('JPATH_BASE', dirname(__FILE__));
require_once "../../model/config.php";
require_once "../../model/database.php";
require_once "../../model/user_web.php";
require_once "../../model/cart.php";

if(isset($_POST['user_id'])){
    $user_id = $_POST['user_id'];
}
if(isset($_POST['transport'])){
    $transport = $_POST['transport'];
}
if(isset($_POST['payment'])){
    $type_payment = $_POST['payment'];
}
if(isset($_POST['total_price'])){
    $total_price = $_POST['total_price'];
}
try{
    $user = new UserWeb();
    $insertPayment = $user->insertPayment($user_id, $transport, $type_payment, $total_price);
    
    if($insertPayment){
        $cart = new Cart();
        $deleteByUser = $cart->deleteByUser($user_id);

        if($deleteByUser){
            $_SESSION['payment']['success'] = "true";
        }
    }
    header('location: ../print_bill.php');

} catch (Throwable $err) {
    echo $err;
}
