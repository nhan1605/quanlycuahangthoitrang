<?php
    require_once("../connect/connect.php");
 
    $brand_name = $_POST['brand_name'];
    $brand_description = $_POST['brand_description'];
    $brand_img = $_POST['brand_img'];

    $sql = "INSERT INTO `tbl_brand`( `brand_name`, `brand_description`, `brand_img`) 
    VALUES ('".$brand_name."','".$brand_description."','".$brand_img."')";

if($conn->query($sql)){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
    echo "error: ".$conn->error;
}
?>