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
    $product_id = $_GET['id'];
    $quantity = $_GET['q'];
    echo $product_id;
    echo $quantity;
}
?>