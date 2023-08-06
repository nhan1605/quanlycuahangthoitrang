<?php
    require_once("../connect/connect.php");
    $category_id =$_POST['category_id'];
    $category_name = $_POST['category_name'];
    $category_description = $_POST['category_description'];

    $sql = "UPDATE `tbl_category` SET `category_name`='".$category_name."',`category_discription`='".$category_description."' 
    WHERE `category_id`='".$category_id."'";

    if($conn->query($sql)){
        header('Location: ./category_admin.php');
    }else{
        echo "error: ".$conn->error;
    }
?>