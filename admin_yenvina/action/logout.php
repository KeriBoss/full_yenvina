<?php
session_start();
require_once $_SERVER["DOCUMENT_ROOT"] . "/model/config.php";
require_once $_SERVER["DOCUMENT_ROOT"] . "/model/database.php";

if(isset($_SESSION['admin'])){
    unset($_SESSION['admin']);
}
header("location: ../login.php");