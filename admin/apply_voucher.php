<?php

    $promotion_id = $_POST['promotion_id'];
    
    require_once('../connect/connect.php');
    
    
    if(!empty($_POST['apply'])) 
        {    
            foreach($_POST['apply'] as $value){
                $sql="UPDATE tbl_product
                      SET promotion_id='".$promotion_id."'
                      WHERE product_id='".$value."'";
            if($conn->query($sql))  
            {
                header('Location: ' . $_SERVER['HTTP_REFERER']);
            }else
            {
                echo "error: ".$conn->error;
            }
            }
            
        }

?>
