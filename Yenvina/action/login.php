<?php
session_start();
define('JPATH_BASE', dirname(__FILE__));
require_once $_SERVER["DOCUMENT_ROOT"] . "./model/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] ."./model/database.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "./model/user_web.php";


if(isset($_POST['email']) && isset($_POST['password'])){
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = new UserWeb();
    $login = $user->login($email ,$password);
    $_SESSION['user']['name'] =  $login[0]['user_name'];
    $_SESSION['user']['email'] =  $login[0]['email'];
    $_SESSION['user']['temp'] =  $login[0]['user_id'];
    header('location: ../index.php');
}