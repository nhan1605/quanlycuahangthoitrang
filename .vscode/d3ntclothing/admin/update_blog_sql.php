<?php
    $blog_name = $_POST['blog_name'];
    $blog_content = $_POST['blog_content'];
    $date_post = $_POST['date_post'];
    $admin_id = $_POST['admin_id'];
    $blog_id = $_POST['blog_id'];
    $blog_img = $_POST['blog_img'];
    

    require_once('../connect/connect.php');

    $sql = "UPDATE tbl_blog
            SET blog_name='".$blog_name."',
                date_post='".$date_post."',
                blog_img='".$blog_img."',
                admin_id='".$admin_id."',
                blog_content='".$blog_content."'
            WHERE blog_id ='".$blog_id."'";
            
    if($conn->query($sql))
    {
        header('Location: blog_list.php');
    }
    else
    {
    echo "Lỗi";
    }
?>