<?php
session_start();
require_once("./connect/connect.php");
    
    $_SESSION['all_gio_hang']=array();
    $_SESSION["gio_hang"]["tong_so"] = 0;
    $_SESSION['gio_hang']['tong_tien']=0;

    echo "
            <script>
            window.alert('Đã xóa giỏ hàng của bạn!');
            window.location = './cart.php';
            </script>
            ";
?>