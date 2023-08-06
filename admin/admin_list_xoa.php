<?php
    require_once("../connect/connect.php");
    $admin_id = $_GET['admin_id'];

    $sql="DELETE FROM `tbl_admin` WHERE admin_id = '".$admin_id."'";

   if($conn->query($sql)){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
    echo "error: ".$conn->error;
    }
?>