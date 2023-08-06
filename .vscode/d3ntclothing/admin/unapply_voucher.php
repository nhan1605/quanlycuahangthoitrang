<?php
    require_once("../connect/connect.php");   
    // $promotion_id = $_GET['promotion_id'];
    $product_id = $_GET['product_id'];


    $sql="UPDATE tbl_product 
          SET promotion_id = null 
          WHERE product_id = '".$product_id."'";

    if($conn->query($sql)){
     header('Location: ' . $_SERVER['HTTP_REFERER']);
     }else{
     echo "error: ".$conn->error;
     }
    

?>
