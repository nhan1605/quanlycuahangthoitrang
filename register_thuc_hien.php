<?php
require_once('./connect/connect.php');
    $email = $_POST['email'];
    $name = $_POST['name'];
    $password = md5($_POST['password']);
    $phone = $_POST['phone'];
    $city = $_POST['city'];
    $district = $_POST['district']; 
    $ward = $_POST['ward'];
    $birthday = $_POST['birthday'];
    $specific_location = $_POST['specific_location'];

    $sql = "INSERT INTO `tbl_user`(`user_name`, `password`, `specific_location`, `email`, `phone`, `birthday`, `city`, `district`, `ward`) 
    VALUES ('".$name."','".$password."','".$specific_location."','".$email."','".$phone."','".  $birthday."','".$city."','".$district."','".$ward."')";
    if($conn->query($sql)){
        echo "
        <script>
        window.alert('Đăng ký thành công!');
        window.location = './login_user.php';
        </script>

        ";

    }else{
        echo "error: ".$conn->error;
    };

    function alert(){
        echo "
        <script>
        window.alert('Đăng ký thành công!');
        </script>
        ";
    }
?>


