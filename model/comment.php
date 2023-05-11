<?php
require_once __DIR__."/database.php";
class Comment extends Database{
    /**
     * Get comment of user
     */
    function getAllComment(){
        $sql = parent::$connection->prepare("SELECT * FROM `comment` ORDER BY `id` DESC");
        return parent::select($sql);
    }
    //Create comment
    function insert($product_id, $user_id, $content, $rating){
        $sql = parent::$connection->prepare("INSERT INTO `comment`(`product_id`, `user_id`, `content`, `rating`) VALUES (?, ?, ?, ?)");
        $sql->bind_param('issi', $product_id, $user_id, $content, $rating);
        return $sql->execute();
    }
    /**
     * get comment by product
     */
    function getCommentByProduct($product_id){
        $sql = parent::$connection->prepare("SELECT `comment`.`product_id` as product_id, `comment`.`user_id` as user_id, `comment`.`content` as content, `comment`.`rating` as rating, `comment`.create_at as create_at, user_web.user_id as id, user_web.user_name as user_name FROM `comment`,`user_web` WHERE `comment`.user_id = `user_web`.user_id and `comment`.product_id = ? ORDER BY `rating` DESC LIMIT 6");
        $sql->bind_param('i', $product_id);
        return parent::select($sql);
    }
}