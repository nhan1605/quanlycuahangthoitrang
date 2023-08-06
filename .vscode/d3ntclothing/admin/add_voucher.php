<?php
    $promotion_name = $_POST['promotion_name'];
    $promotion_percent = $_POST['promotion_percent'];
    $promotion_content = $_POST['promotion_content'];
   
    require_once('../connect/connect.php');
    $sql = "INSERT tbl_promotion (promotion_name, promotion_percent,promotion_content )
            VALUES ('".$promotion_name."','".$promotion_percent."','".$promotion_content."')";
    if($conn->query($sql))
    {
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
    else
    {
        echo "Sửa không thành công";
    }
?>

