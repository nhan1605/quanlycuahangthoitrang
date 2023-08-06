<?php
    require_once("../connect/connect.php");
    $invoice_id = $_GET['invoice_id'];

    echo $invoice_id;
    $sql1 = "DELETE FROM `tbl_invoice_detail` WHERE invoice_id = '".$invoice_id."'";
    $sql2="DELETE FROM `tbl_invoice` WHERE invoice_id = '".$invoice_id."'";
   if($conn->query($sql1)){
        if($conn->query($sql2)){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
        echo "error: ".$conn->error;
        }
    }
?>