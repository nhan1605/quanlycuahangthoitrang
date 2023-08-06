<?php
    $status_id = $_POST['status_id'];
    $invoice_id=$_POST['invoice_id'];

require_once('../connect/connect.php');
    $sql = "UPDATE tbl_invoice
            SET status_id='" . $status_id . "'
            WHERE invoice_id =".$invoice_id;
    if($conn->query($sql))
    {
        header('Location: '.$_SERVER['HTTP_REFERER']);
    }
    else
    {
        echo "Sửa không thành công";
    }
?>