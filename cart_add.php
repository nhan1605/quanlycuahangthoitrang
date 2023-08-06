<?php
session_start();
require_once("./connect/connect.php");
if(!isset($_SESSION['login_user'])){
    echo "
        <script>
        window.alert('Vui lòng đăng nhập');
        window.location = './index.php';
        </script>
    ";
}else{
    $product_id = $_GET['id'];
    $quantity = $_GET['q'];

    $sql = "SELECT `product_name`,`product_img`, `unit_price`, tbl_color.color_name, tbl_size.size_name, `promotion_id` 
    FROM `tbl_product`,tbl_size,tbl_color 
    WHERE tbl_product.size_id = tbl_size.size_id and tbl_product.color_id = tbl_color.color_id and  product_id=".$product_id;
    $ketQuaTruyVan = $conn->query($sql);
    if($ketQuaTruyVan->num_rows>0){
        $product = $ketQuaTruyVan->fetch_assoc();
        $product_name = $product['product_name'];
        $product_img = $product['product_img'];
        $color = $product['color_name'];
        $size = $product['size_name'];
        if($product['promotion_id']!=null){
            $sql1 = "SELECT `promotion_percent` FROM `tbl_promotion` WHERE promotion_id=".$product['promotion_id'];
            $ketQuaTruyVan1 = $conn->query($sql1);
                 if($ketQuaTruyVan1->num_rows>0){
                $promotion = $ketQuaTruyVan1->fetch_assoc();
                $unitprice =  $product['unit_price']- $product['unit_price']*$promotion['promotion_percent']/100;
            }
        }else{
            $unitprice = $product['unit_price'];
        }
    }

    if($_SESSION["gio_hang"]["tong_so"]!=0){
        $i=0;
        $x=0;
        foreach($_SESSION['all_gio_hang'] as $item){
        if($product_id==$item[0]){
            $i++;
            $item[2]=$item[2]+$quantity;
            array_splice($_SESSION['all_gio_hang'][$x],2,1,$item[2]);
            $_SESSION["gio_hang"]["tong_so"]+=$quantity;
            header('Location: cart.php');
        }
        $x++;
         }
        if($i==0){
        $_SESSION['gio_hang']['mat_hang']=[$product_id,$product_img,$quantity,$product_name,$color,$size,$unitprice];
        array_push($_SESSION['all_gio_hang'],$_SESSION['gio_hang']['mat_hang']);
        $_SESSION["gio_hang"]["tong_so"]+= $quantity;
        header('Location: cart.php');
        }

    }else{
        $_SESSION['gio_hang']['mat_hang']=[$product_id,$product_img,$quantity,$product_name,$color,$size,$unitprice];
        array_push($_SESSION['all_gio_hang'],$_SESSION['gio_hang']['mat_hang']);
        $_SESSION["gio_hang"]["tong_so"]+=$quantity;

        header('Location: cart.php');
    }
    
}

    
?>
