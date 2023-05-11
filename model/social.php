<?php
require_once __DIR__."/database.php";
class Social extends Database{
    function getAllSocial(){
        $sql = parent::$connection->prepare("SELECT * FROM social");
        return parent::select($sql);
    }
    /**
     * Get social by id
     */
    function getSocialById($id){
        $sql = parent::$connection->prepare("SELECT * FROM social WHERE `id` = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
        /**
     * Fuction insert new social
     */
    function insert($social_name, $description, $href, $icon, $status){
        $sql = parent::$connection->prepare("INSERT INTO `social`(`social_name`, `description`, `href`, `icon`, `status`) VALUES (?, ?, ?, ?, ?)");
        $sql->bind_param('ssssi', $social_name, $description, $href, $icon, $status);
        return $sql->execute();
    }
    /**
     * Function update social by ID
     */
    function update($id, $social_name, $description, $href, $icon, $status){
        $sql = parent::$connection->prepare("UPDATE `social` SET `social_name`= ?,`description`= ?,`href`= ?, `icon` = ?, `status`= ? WHERE `id` = ?");
        $sql->bind_param('ssssii', $social_name, $description, $href, $icon, $status, $id);
        return $sql->execute();
    }
        /**
     * Function delete social by id
     */
    function delete($id){
        $sql = parent::$connection->prepare("DELETE FROM `social` WHERE `id` = ?");
        $sql->bind_param('i', $id);
        return $sql->execute();
    }
    /**
     * Get social in Home page
     */
    function getSocialHomePage(){
        $sql = parent::$connection->prepare("SELECT * FROM social WHERE `status` = 1");
        return parent::select($sql);
    }
}