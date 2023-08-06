<?php
session_start();
require_once("./connect/connect.php");

if(!isset($_SESSION['login_user'])){
    echo "
        <script>
        window.alert('Vui lòng đăng nhập');
        window.location = './index.php';
        </script>
    ";
}else{
    $product_id = $_GET['product_id'];
    $sql = "DELETE FROM `tbl_wishlist` WHERE product_id ='".$product_id."' and user_id = '".$_SESSION['user_id']."'";
    if($conn->query($sql))
    {
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
    else
    {
        echo "error: ".$conn->error;
    }
}
?>