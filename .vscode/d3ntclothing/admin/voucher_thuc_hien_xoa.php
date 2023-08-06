<?php
    require_once("../connect/connect.php");
    $voucher_id = $_GET['voucher_id'];

    $sql="DELETE FROM `tbl_promotion` WHERE promotion_id = '".$voucher_id."'";

   if($conn->query($sql)){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
    echo "error: ".$conn->error;
    }
?>