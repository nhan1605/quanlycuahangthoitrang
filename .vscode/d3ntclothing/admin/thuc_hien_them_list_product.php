<?php
    require_once("../connect/connect.php");
 
    $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];
    $size_id = $_POST['size_id'];
    $color_id = $_POST['color_id'];
    $unit_price = $_POST['unit_price'];
    $quantity = $_POST['quantity'];
    $product_img = $_POST['product_img'];
    $product_content = $_POST['product_content'];


    $sql = "INSERT INTO `tbl_product`(`product_name`, `brand_id`, `category_id`, `unit_price`, `unit_in_stock`, `unit_in_order`, `product_img`, `product_description`, `color_id`, `size_id`) 
    VALUES ('".$product_name."','".$brand_id."','".$category_id."','".$unit_price."','".$quantity."','0','".$product_img."','".$product_content."','".$color_id."','".$size_id."')";

if($conn->query($sql)){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
    echo "error: ".$conn->error;
}
?>