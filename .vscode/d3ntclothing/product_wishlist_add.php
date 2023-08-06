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
    $sql = "INSERT INTO `tbl_wishlist`(`product_id`, `user_id`) VALUES ('".$product_id."','".$_SESSION['user_id']."')";
    if($conn->query($sql))
    {
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
    else
    {
        echo "error: ".$conn->error;
    }}

?>