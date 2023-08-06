<?php
    require_once("../connect/connect.php");
    $brand_id = $_GET['brand_id'];

    $sql="DELETE FROM `tbl_brand` WHERE brand_id = '".$brand_id."'";

   if($conn->query($sql)){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
    echo "error: ".$conn->error;
    }
?>