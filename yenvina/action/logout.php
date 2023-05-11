<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/model/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/model/database.php";

if(isset($_SESSION['user'])){
    unset($_SESSION['user']);
}
header("location: ../index.php");