<?php
session_start();
require_once "../../jpath.php";
require_once  "../../../model/config.php";
require_once "../../../model/database.php";
require_once  "../../../model/banner.php";

$target_dir =  $urlImg . "banner/";

//TODO: Img for website
$target_name_file_web = basename($_FILES["img_web"]["name"]);

if($target_name_file_web == ''){
    $target_name_file_web = $_POST['web_img_banner'];
}
$target_file_web = $target_dir . $target_name_file_web;//Target image for website

//TODO: Img for mobile
$target_name_file_mobile = basename($_FILES["img_mobile"]["name"]);

if($target_name_file_mobile == ''){
    $target_name_file_mobile = $_POST['mobile_img_banner'];
}
$target_file_mobile = $target_dir . $target_name_file_mobile;//Target image for mobile


$uploadWebOk = 1;
$uploadMobileOk = 1;

$imageFileTypeWeb = strtolower(pathinfo($target_file_web, PATHINFO_EXTENSION));
$imageFileTypeMobile = strtolower(pathinfo($target_file_mobile, PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if (isset($_POST["submit"])) {
    $check_web = getimagesize($_FILES["img_web"]["tmp_name"]);
    $check_mobile = getimagesize($_FILES["img_mobile"]["tmp_name"]);

    if ($check_web !== false) {
        echo "File is an image - " . $check_web["mime"] . ".";
        $uploadWebOk = 1;
    } else {
        echo "File is not an image.";
        $uploadWebOk = 0;
    }

    if ($check_mobile !== false) {
        echo "File is an image - " . $check_mobile["mime"] . ".";
        $uploadMobileOk = 1;
    } else {
        echo "File is not an image.";
        $uploadMobileOk = 0;
    }
}

// Check file size
if ($_FILES["img_web"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadWebOk = 0;
}
// Check file size
if ($_FILES["img_mobile"]["size"] > 500000) {
    echo "Sorry, your file is too large.";
    $uploadMobileOk = 0;
}

// Allow certain file formats
if (
    $imageFileTypeWeb != "jpg" && $imageFileTypeWeb != "png" && $imageFileTypeWeb != "jpeg"
    && $imageFileTypeWeb != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadWebOk = 0;
}
// Allow certain file formats
if (
    $imageFileTypeMobile != "jpg" && $imageFileTypeMobile != "png" && $imageFileTypeMobile != "jpeg"
    && $imageFileTypeMobile != "gif"
) {
    echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
    $uploadMobileOk = 0;
}

//TODO: Check if $uploadOk is set to 0 by an error
if ($uploadWebOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["img_web"]["tmp_name"], $target_file_web)) {
        $img_web = $target_name_file_web;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    $img_web = $target_name_file_web;
}
//TODO: Check if $uploadOk is set to 0 by an error
if ($uploadMobileOk == 0) {
    echo "Sorry, your file was not uploaded.";
    // if everything is ok, try to upload file
} else {
    if (move_uploaded_file($_FILES["img_mobile"]["tmp_name"], $target_file_mobile)) {
        $img_mobile = $target_name_file_mobile;
    } else {
        echo "Sorry, there was an error uploading your file.";
    }
    $img_mobile = $target_name_file_mobile;
}

if(isset($_POST['banner_id'])){
    $banner_id = $_POST['banner_id'];
}
if(isset($_POST['heading'])){
    $heading = $_POST['heading'];
}
if(isset($_POST['position'])){
    $position = $_POST['position'];
}
if(isset($_POST['description'])){
    $description = $_POST['description'];
}
if(isset($_POST['href'])){
    $href = $_POST['href'];
}

$banner = new Banner();
try {
    $insert = $banner->update($banner_id, $heading, $description, $img_web, $img_mobile, $position, $href);
    header('location: ../../ui/banner/banner_list.php');
} catch (Throwable $err) {
    echo $err;
}