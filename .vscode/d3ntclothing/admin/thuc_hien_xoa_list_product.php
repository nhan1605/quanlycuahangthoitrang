<?php
    require_once("../connect/connect.php");

    $product_name = $_GET['product_name'];
    echo $product_name;
    $sql = "DELETE FROM `tbl_product` WHERE tbl_product.product_name ='".$product_name."'";
        if($conn->query($sql)){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
        echo "error: ".$conn->error;
        }
?>