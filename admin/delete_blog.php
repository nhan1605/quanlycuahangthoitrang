<?php
$blog_id = $_GET['blog_id'];

require_once('../connect/connect.php');

$sql="DELETE FROM tbl_blog WHERE blog_id='".$blog_id."'";
if($conn->query($sql))
{
    header('Location: blog_list.php');
}
else
{
    echo "Xóa không thành công";
}
?>