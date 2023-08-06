<?php
    require_once("../connect/connect.php");
    $user_id = $_GET['user_id'];

    $sql = "DELETE FROM `tbl_user` WHERE user_id =".$user_id;
   if($conn->query($sql)){
       
        header('Location: ' . $_SERVER['HTTP_REFERER']);
    }else{
        echo "error: ".$conn->error;
        
    }
?>