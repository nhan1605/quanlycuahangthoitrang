<?php
    $admin_name = $_POST['admin_name'];
    $admin_email = $_POST['admin_email'];
    $admin_password = $_POST['admin_password'];
    $admin_phone = $_POST['admin_phone'];
   $admin_id =$_POST['admin_id'];

require_once('../connect/connect.php');
    $sql = "UPDATE tbl_admin
            SET `name`='" . $admin_name . "',
                email ='".$admin_email."',
                password ='".$admin_password."',
                phone ='".$admin_phone."'
            WHERE admin_id ='".$admin_id."'";
    if($conn->query($sql))
    {
        header('Location: ./admin_list.php');
    } 
    else
    {
        echo "Sửa không thành công";
    }
?>