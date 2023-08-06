<?php
    require_once("../connect/connect.php");
    $brand_id = $_POST['brand_id'];
    $brand_name = $_POST['brand_name'];
    $brand_description = $_POST['brand_description'];
    $brand_imgNew = $_POST['brand_img'];
    $brand_imgOld = $_POST['brand_img-old'];

    if($brand_imgNew ==""){
        $brand_img = $brand_imgOld;
    }else{
        $brand_img = $brand_imgNew;
    }


    $sql = "UPDATE `tbl_brand` SET `brand_name`='".$brand_name."',
    `brand_description`='".$brand_description."',`brand_img`='".$brand_img."' WHERE `brand_id` = '".$brand_id."'";
    if($conn->query($sql)){
        header('Location: ./brand_admin.php' );
    }else{
        echo "error: ".$conn->error;
    }
?>