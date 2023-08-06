<?php
    require_once("../connect/connect.php");
    $category_id = $_GET['category_id'];

    $sql="DELETE FROM `tbl_category` WHERE category_id = '".$category_id."'";

   if($conn->query($sql)){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
    echo "error: ".$conn->error;
    }
?>