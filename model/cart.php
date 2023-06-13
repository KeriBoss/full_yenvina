<?php
require_once __DIR__."/database.php";
class Cart extends Database{
    /**
     * Get all topic of article
     */
    function getAllCart(){
        $sql = parent::$connection->prepare("SELECT * FROM cart ORDER BY `id_cart` DESC");
        return parent::select($sql);
    }
    /**
     * Get topic of article by id
     */
    function getCartById($id){
        $sql = parent::$connection->prepare("SELECT * FROM cart WHERE `id_cart` = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
        /**
     * Fuction insert new topic
     */
    function insert($product_id, $user_id, $quantity){
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $sql = parent::$connection->prepare("INSERT INTO `cart`(`product_id`, `user_id`, `quantity`, `code`,`update_at`) VALUES (?, ?, ?, ?, current_date)");
        $time = date("H:i:s");
        $str = preg_replace('/[^a-zA-Z0-9_ %\[\]\.\(\)%&-]/s', '', $time);
        $code = 'keri' . $str;
        $sql->bind_param('ssis', $product_id, $user_id, $quantity, $code);
        return $sql->execute();
    }
    /**
     * Function update cart by ID
     */
    function update($product_id ,$user_id,$quantity){
        $sql = parent::$connection->prepare("UPDATE `cart` SET `quantity`= ?, `update_at` = CURRENT_DATE WHERE `user_id` = ? and `product_id` = ?");
        $sql->bind_param('isi', $quantity, $user_id, $product_id);
        return $sql->execute();
    }
    /**
     * get cart by user id
     */
    function getCartByProductId($id, $user_id){
        $sql = parent::$connection->prepare("SELECT * FROM cart WHERE `product_id` = ? and `user_id` = ?");
        $sql->bind_param('is', $id, $user_id);
        return parent::select($sql);
    }
    /**
     * Get cart by user id
     */
    function getCartByUserId($user_id){
        $sql = parent::$connection->prepare("SELECT products.product_name as name, products.prices as prices, products.sale as sale, products.thumbnail as thumbnail, products.weight as weight, type_product.type_name as type_name, cart.quantity as quantity, cart.product_id as product_id, cart.user_id as user_id, cart.code as code FROM cart, products, type_product WHERE cart.product_id = products.id AND products.type_id = type_product.type_id AND cart.user_id = ?");
        $sql->bind_param('s', $user_id);
        return parent::select($sql);
    }
    /**
     * Remove product
     */
    function removeByUserId($product_id, $user_id){
        $sql = parent::$connection->prepare("DELETE FROM `cart` WHERE `product_id` = ? and `user_id` = ?");
        $sql->bind_param('is', $product_id, $user_id);
        return $sql->execute();
    }
    /**
     * Get all cart of user and infomation of them
     */
    function getAllCartOfUser(){
        $sql = parent::$connection->prepare("SELECT * FROM cart ORDER BY `id_cart` DESC");
        return parent::select($sql);
    }
}