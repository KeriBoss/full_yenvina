<?php
session_start();
require_once  "../../../model/config.php";
require_once "../../../model/database.php";
require_once  "../../../model/company.php";

if(isset($_POST['company_name'])){
    $company_name = $_POST['company_name'];
}
if(isset($_POST['phone'])){
    $phone = $_POST['phone'];
}
if(isset($_POST['email'])){
    $email = $_POST['email'];
}
if(isset($_POST['address'])){
    $address = $_POST['address'];
}
if(isset($_POST['work_time'])){
    $work_time = $_POST['work_time'];
}
if(isset($_POST['description'])){
    $description = $_POST['description'];
}
if(isset($_POST['id_company'])){
    $id = $_POST['id_company'];
}

$company = new Company();
try {
    $update = $company->update($id, $company_name, $phone, $email, $address, $work_time, $description);
    header('location: ../../company_list.php');
} catch (Throwable $err) {
    $_SESSION['error'] = "$err";
    header('location: ../../404.php');
}
