<?php
require_once __DIR__."/database.php";

class UserWeb extends Database{
    /**
     * Login
     */
    function login($email, $password){
        $sql = parent::$connection->prepare("SELECT * FROM user_web WHERE `email` = ? and password = ?");
        $sql->bind_param('ss', $email, $password);
        return parent::select($sql);
    }
    /**
     * Register
     */
    function register($user_id, $first, $last, $email, $password){
        $sql = parent::$connection->prepare("INSERT INTO `user_web`( `user_id`,`user_name`, `email`, `password`) VALUES (?, ?, ?, ?)");
        $user_name = $first . ' ' . $last;
        $sql->bind_param('ssss', $user_id, $user_name, $email, $password);
        return $sql->execute();
    }
    //
    function getAllAccount(){
        $sql = parent::$connection->prepare("SELECT * FROM user_web");
        return parent::select($sql);
    }
    /**
     * Get all information of user and show them in screen
     */
    function getAllInfoOfUser(){
        $sql = parent::$connection->prepare("SELECT * FROM `user_web`,`info_user` WHERE `user_web`.`user_id` = `info_user`.`user_id`");
        return parent::select($sql);
    }
    /**
     * Create info for user payment
     */
    function insert($user_id, $name_user, $phone, $address){
        $sql = parent::$connection->prepare("INSERT INTO `info_user`( `user_id`, `name_user`, `phone`, `address`) VALUES (?, ?, ?, ?)");
        $sql->bind_param('ssss', $user_id, $name_user, $phone, $address);
        return $sql->execute();
    }
    /**
     * Get user by id
     */
    function getUserById($user_id){
        $sql = parent::$connection->prepare("SELECT * FROM info_user WHERE user_id = ?");
        $sql->bind_param('s', $user_id);
        return parent::select($sql);
    }
    /**
     * Insert payment for user
     */
    function insertPayment($user_id, $transport, $type_payment, $total_price){
        $sql = parent::$connection->prepare("INSERT INTO `payment`(`user_id`, `transport`, `type_payment`, `total_price`) VALUES (?, ?, ?, ?)");
        $sql->bind_param('sssi', $user_id, $transport, $type_payment, $total_price);
        return $sql->execute();
    }
    /**
     * Get table info_user
     */
    function getOnlyInfoUser(){
        $sql = parent::$connection->prepare("SELECT * FROM info_user");
        return parent::select($sql);
    }
    /**
     * Update
     */
    function updateUserInfoById($user_id, $name, $phone, $address){
        $sql = parent::$connection->prepare("UPDATE `info_user` SET `name_user`= ? ,`phone`= ? ,`address`= ? ,`update_at`= current_time WHERE user_id = ?");
        $sql->bind_param('ssss', $name, $phone, $address, $user_id);
        return $sql->execute();
    }
    /**
     * Get all history payment of user
     */
    function getPaymentOfUser(){
        $sql = parent::$connection->prepare("SELECT `payment`.`user_id` as id, `payment`.`transport` as transport, `payment`.`type_payment` as type_payment, `payment`.`total_price` as price, `payment`.`create_at` as date, `info_user`.`user_id` as user_id, `info_user`.`name_user` as name, `info_user`.`phone` as phone FROM payment, info_user WHERE payment.user_id = info_user.user_id");
        return parent::select($sql);
    }
}