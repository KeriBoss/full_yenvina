<?php
session_start();
define('JPATH_BASE', dirname(__FILE__));
require_once "../../model/config.php";
require_once "../../model/database.php";
require_once "../../model/user_web.php";

if(isset($_POST['user_id'])){
    $user_id = $_POST['user_id'];
}
if(isset($_POST['fullname'])){
    $name_user = $_POST['fullname'];
}
if(isset($_POST['phone'])){
    $phone = $_POST['phone'];
}
if(isset($_POST['address'])){
    $address = $_POST['address'];
}
try{
    $user = new UserWeb();
    $getUserById = $user->getUserById($user_id);
    if(count($getUserById) === 0){
        $insert = $user->insert($user_id,$name_user,$phone,$address);
    }
    else{
        $update = $user->updateUserInfoById($user_id,$name_user,$phone,$address);
    }
    header('location: ../transport.php');
} catch (Throwable $err) {
    echo $err;
}




