<?php
    $blog_name = $_POST['blog_name'];
    $blog_content = $_POST['blog_content'];
    $date_post = $_POST['date_post'];
    $admin_id = $_POST['admin_id'];
    $blog_img = $_POST['blog_img'];

    require_once('../connect/connect.php');
    $sql = "INSERT tbl_blog (date_post,blog_name,blog_img, blog_content,admin_id)
            VALUES ('".$date_post."','".$blog_name."','".$blog_img."','".$blog_content."','".$admin_id."')";
    if($conn->query($sql))
    {
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
    else
    {
        echo "error: ".$conn->error;
    }
?>
 
