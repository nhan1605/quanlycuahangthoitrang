<?php
    require_once("../connect/connect.php");
 
    $category_name = $_POST['category_name'];
    $category_description = $_POST['category_description'];

    $sql = "INSERT INTO `tbl_category`( `category_name`, `category_discription`) 
    VALUES ('".$category_name."','".$category_description."')";

if($conn->query($sql)){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
    echo "error: ".$conn->error;
}
?>