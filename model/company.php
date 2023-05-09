<?php
require_once __DIR__."/database.php";
class Company extends Database{
    function getAllCompany(){
        $sql = parent::$connection->prepare("SELECT * FROM company");
        return parent::select($sql);
    }
    /**
     * Get type of product by id
     */
    function getCompanyById($id){
        $sql = parent::$connection->prepare("SELECT * FROM company WHERE `id` = ?");
        $sql->bind_param('i', $id);
        return parent::select($sql);
    }
    /**
     * Function update protype by ID
     */
    function update($id, $company_name, $phone, $email, $address, $work_time ,$description){
        $sql = parent::$connection->prepare("UPDATE `company` SET `company_name`= ?,`phone`= ?,`email`= ?,`address`= ?,`work_time`= ?,`description`= ? WHERE `id` = ?");
        $sql->bind_param('ssssssi',$company_name, $phone, $email, $address, $work_time ,$description, $id);
        return $sql->execute();
    }
}