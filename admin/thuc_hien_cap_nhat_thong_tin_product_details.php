<?php
    require_once("../connect/connect.php");

        $product_name = $_POST['product_name'];
    $category_id = $_POST['category_id'];
    $brand_id = $_POST['brand_id'];
    $unit_price = $_POST['unit_price'];
    $product_description = $_POST['product_description'];
 echo $category_id;
//     $sql = "INSERT INTO `tbl_product`(`product_name`, `brand_id`, `category_id`, `unit_price`, `unit_in_stock`, `unit_in_order`, `product_img`, `product_description`, `color_id`, `size_id`) 
//     VALUES ('".$product_name."','".$brand_id."','".$category_id."','".$unit_price."','".$quantity."','0','".$product_img."','".$product_content."','".$color_id."','".$size_id."')";
    $sql = "UPDATE `tbl_product` SET `brand_id`='".$brand_id."',`category_id`='".$category_id."',`unit_price`='".$unit_price."',`product_description`='".$product_description."'
     WHERE `product_name`='".$product_name."'";
if($conn->query($sql)){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
    echo "error: ".$conn->error;
}

?>