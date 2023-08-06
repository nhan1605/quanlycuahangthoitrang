<?php
    require_once("../connect/connect.php");

    $product_id = $_POST['product_id'];
   
    $quantity = $_POST['quantity'];

    $sql ="UPDATE `tbl_product` SET `unit_in_stock`='".$quantity."' WHERE `product_id`='".$product_id."';";
    if($conn->query($sql)){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
        echo "error: ".$conn->error;
    }
?>