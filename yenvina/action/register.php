<?php
session_start();
define('JPATH_BASE', dirname(__FILE__));
require_once "../../model/config.php";
require_once "../../model/database.php";
require_once "../../model/user_web.php";


if(isset($_POST['first']) && isset($_POST['last']) && isset($_POST['email']) && isset($_POST['password']) && $_SESSION['user']['temp']){
    $user_id = $_SESSION['user']['temp'];
    $first = $_POST['first'];
    $last = $_POST['last'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $user = new UserWeb();
    $getAllAccount = $user->getAllAccount();
    foreach($getAllAccount as $item){
        if($item['email'] != $email){
            $register = $user->register($user_id, $first, $last, $email ,$password  );
            $login = $user->login($email ,$password);
            $_SESSION['user']['name'] =  $login[0]['user_name'];
            $_SESSION['user']['email'] =  $login[0]['email'];
            $_SESSION['user']['temp'] =  $login[0]['user_id'];
            unset($_SESSION['email']);
            header('location: ../index.php');
            return;
        }else{
            $_SESSION['email'] = 'Email đã tồn tại! Vui lòng nhập email khác.';
            header('location: ../register.php');
        }
    }
    
}
