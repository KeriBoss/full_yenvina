<?php
require_once __DIR__."/database.php";
class Articles extends Database{
    /**
     * Get all topic of article
     */
    function getAllArticle(){
        $sql = parent::$connection->prepare("SELECT * FROM articles  ORDER BY `id` DESC");
        return parent::select($sql);
    }
    /**
     * Get topic of article by id
     */
    function getArticleById($id){
        $sql = parent::$connection->prepare("SELECT * FROM articles WHERE `id` = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
        /**
     * Fuction insert new topic
     */
    function insert($title, $content, $user_id, $topic_id, $image, $status, $status_home){
        $sql = parent::$connection->prepare("INSERT INTO `articles`(`title`, `content`, `user_id`, `topic_id`, `image`, `status`, `status_home`) VALUES (?, ?, ?, ?, ?, ?, ?)");
        $sql->bind_param('ssiisii', $title, $content, $user_id, $topic_id, $image, $status, $status_home);
        return $sql->execute();
    }
    /**
     * Function update topic by ID
     */
    function update($id, $title, $content, $user_id, $topic_id, $image, $status, $status_home){
        // Set the new timezone
        date_default_timezone_set('Asia/Ho_Chi_Minh');
        $date = getdate();

        $sql = parent::$connection->prepare("UPDATE `articles` SET `title`= ? ,`content`= ? ,`user_id`= ? ,`topic_id`= ? ,`image`= ? ,`status`= ? ,`status_home`= ? , `update_at`= ?  WHERE `id` = ?");
        $sql->bind_param('ssiisiidi', $title, $content, $user_id, $topic_id, $image, $status, $status_home,$date, $id);
        return $sql->execute();
    }
    /**
     * Function delete topic by id
     */
    function delete($id){
        $sql = parent::$connection->prepare("DELETE FROM `articles` WHERE `id` = ?");
        $sql->bind_param('i', $id);
        return $sql->execute();
    }
    /**
     * Get article on Home page
     */
    function getArticleHomePage(){
        $sql = parent::$connection->prepare("SELECT `articles`.`id` as `article_id`, `articles`.`title` as `title`, `articles`.`content` as `content`, `articles`.`create_at` as `create_at`, `article_topic`.`topic_name` as `topic_name`, `company`.`company_name` as `company_name`, `articles`.`image` as `image` FROM `articles`, `article_topic`, `company` WHERE `article_topic`.`id` = `articles`.`topic_id` and `articles`.`status` = 1 and `articles`.`status_home` = 1");
        return parent::select($sql);
    }
    /**
     * Get article and topic of them
     */
    function getArticleAndTopicById($id){
        $sql = parent::$connection->prepare("SELECT * FROM articles, article_topic WHERE `articles`.`id` = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
    // Lấy bài viết theo kết quả
    public function searchArticle($key, $perPage = null, $page = null)
    {
        if(isset($perPage, $page) && $perPage != '' && $page != ''){
            $start = $perPage * ($page - 1);
            $sql = parent::$connection->prepare("SELECT `articles`.`id` as `article_id`, `articles`.`title` as `title`, `articles`.`content` as `content`, `articles`.`create_at` as `create_at`, `article_topic`.`topic_name`, `company`.`company_name` as `company_name`, `articles`.`image` as `image` FROM `articles`, `article_topic`, `company` WHERE `article_topic`.`id` = `articles`.`topic_id` and `articles`.`status` = 1 AND title LIKE ? AND `status` = 1 and `articles`.`status_home` = 1 LIMIT ?,?");
            $search = "%{$key}%";
            $sql->bind_param('sii', $search, $start, $perPage);
            return parent::select($sql);
        }
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT `articles`.`id` as `article_id`, `articles`.`title` as `title`, `articles`.`content` as `content`, `articles`.`create_at` as `create_at`, `article_topic`.`topic_name`, `company`.`company_name` as `company_name`, `articles`.`image` as `image` FROM `articles`, `article_topic`, `company`WHERE `article_topic`.`id` = `articles`.`topic_id` and `articles`.`status` = 1 AND title LIKE ? AND `status` = 1 and `articles`.`status_home` = 1");
        $search = "%{$key}%";
        $sql->bind_param('s', $search);
        return parent::select($sql);
    }
     // Lấy tát cả bài viết theo trang
    public function getArticlesByPage($perPage, $page)
    {
        $start = $perPage * ($page - 1);
        //2. Viết câu SQL
        $sql = parent::$connection->prepare("SELECT `articles`.`id` as `article_id`, `articles`.`title` as `title`, `articles`.`content` as `content`, `articles`.`create_at` as `create_at`, `article_topic`.`topic_name`, `company`.`company_name` as `company_name`, `articles`.`image` as `image` FROM `articles`, `article_topic`, `company` WHERE `article_topic`.`id` = `articles`.`topic_id` and `articles`.`status` = 1 and `articles`.`status_home` = 1 LIMIT ?, ?");
        $sql->bind_param('ii', $start, $perPage);
        return parent::select($sql);
    }
    //
}