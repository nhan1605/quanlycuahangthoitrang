<?php
    require_once("../connect/connect.php");
    $contact_id = $_GET['contact_id'];

    $sql = "DELETE FROM `tbl_contact` WHERE  contact_id = '".$contact_id."'";
   if($conn->query($sql)){
        header('Location: ' . $_SERVER['HTTP_REFERER']);
        }else{
        echo "error: ".$conn->error;
    }
?>