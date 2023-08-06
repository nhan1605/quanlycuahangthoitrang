<?php
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $admin_phone = $_POST['admin_phone'];
   
    require_once('../connect/connect.php');
    $sql = "INSERT tbl_admin (`name`, email,password, phone )
            VALUES ('".$admin_name."','".$admin_email."','".$admin_password."','".$admin_phone."')";
    if($conn->query($sql))
    { 
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
    else
    {
        echo "error: ".$conn->error;
    }
?>

