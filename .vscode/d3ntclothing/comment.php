<?php
session_start();
    require_once("./connect/connect.php");
 
    $product_id = $_POST['product_id'];
    $comment_title = $_POST['comment_title'];
    $comment_content = $_POST['comment_content'];
    $level = $_POST['star'];
    $date =  date("Y-m-d");

    echo $product_id;
    echo $comment_content;
    echo $comment_title;
    echo $date;
    echo $level;
    $sql = "INSERT INTO `tbl_comment`(`product_id`, `user_id`, `comment_title`, `comment_content`, `date`,level_recorded) 
    VALUES ('".$product_id."','".$_SESSION['user_id']."','".$comment_title."','".$comment_content."','".$date."',$level)";

if($conn->query($sql)){
    header('Location: ' . $_SERVER['HTTP_REFERER']);
}else{
    echo "error: ".$conn->error;
}
?>