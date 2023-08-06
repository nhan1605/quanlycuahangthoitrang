<?php
require_once('./connect/connect.php');

$sql ="INSERT INTO `tbl_contact`( `name`, `email`, `title`, `content`) 
VALUES ('".$_POST['name']."','".$_POST['email']."','".$_POST['title']."','".$_POST['content']."')";

if($conn->query($sql)){
    echo "
        <script>
        alert('Gửi thành công!');
        window.location = './contact.php';
        </script>
        ";
}else{
    echo "lỗi";
}
?>