<?php
require_once('./connect/connect.php');
    $email = $_POST['email'];
    $user_id = $_POST['user_id'];
    $name = $_POST['name'];
    $password = $_POST['password'];
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $district = $_POST['district']; 
    $ward = $_POST['ward'];
    $birthday = $_POST['birthday'];
    $specific_location = $_POST['specific_location'];

    $sql = "UPDATE `tbl_user` SET `user_name`='".$name."',`password`='".$password."',`specific_location`='".$specific_location."',`email`='".$email."',
    `phone`='".$phone."',`birthday`='".$birthday."',`city`='".$city."',`district`='".$district."',`ward`='".$ward."' WHERE user_id=".$user_id;
    if($conn->query($sql)){
        echo "
        <script>
        window.alert('Thay đổi thông tin thành công!');
        window.location = './account_user.php';
        </script>

        ";
       
    }else{
        echo "error: ".$conn->error;
    };
?>