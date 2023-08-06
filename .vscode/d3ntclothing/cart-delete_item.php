<?php
session_start();
require_once("./connect/connect.php");
    $product_id = $_GET['product_id'];
    $i=0;
    foreach($_SESSION['all_gio_hang'] as $item){
        if($item[0]==$product_id){
            print_r($i);
            array_splice($_SESSION['all_gio_hang'],$i,1);
            $_SESSION["gio_hang"]["tong_so"]--;
        }
        $i++;
    }
    
    header('Location: ./cart.php' );
?>