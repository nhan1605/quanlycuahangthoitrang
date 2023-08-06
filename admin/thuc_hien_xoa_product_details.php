<?php
    require_once("../connect/connect.php");

    $product_id = $_GET['product_id'];

   $sql="DELETE FROM `tbl_product` WHERE product_id = ".$product_id;

   if($conn->query($sql)){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
    echo "error: ".$conn->error;
    }

   
?>