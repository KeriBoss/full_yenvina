<?php
require_once __DIR__."/database.php";
class ArticleTopic extends Database{
    /**
     * Get all topic of article
     */
    function getAllTopic(){
        $sql = parent::$connection->prepare("SELECT * FROM article_topic");
        return parent::select($sql);
    }
    /**
     * Get topic of article by id
     */
    function getTopicById($id){
        $sql = parent::$connection->prepare("SELECT * FROM article_topic WHERE `id` = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
        /**
     * Fuction insert new topic
     */
    function insert($name){
        $sql = parent::$connection->prepare("INSERT INTO `article_topic`(`topic_name`) VALUES (?)");
        $sql->bind_param('s', $name);
        return $sql->execute();
    }
    /**
     * Function update topic by ID
     */
    function update($id, $name){
        $sql = parent::$connection->prepare("UPDATE `article_topic` SET `topic_name`= ? WHERE `id` = ?");
        $sql->bind_param('si', $name, $id);
        return $sql->execute();
    }
        /**
     * Function delete topic by id
     */
    function delete($id){
        $sql = parent::$connection->prepare("DELETE FROM `article_topic` WHERE `id` = ?");
        $sql->bind_param('i', $id);
        return $sql->execute();
    }
}