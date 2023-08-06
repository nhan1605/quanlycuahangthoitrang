<?php
require_once('./connect/connect.php');
    $email = $_POST['email'];
    $password = md5($_POST['password']);

    $sql ="SELECT `user_id`, `user_name`, `password`, city,district,ward, `specific_location`, `email`, `phone`, `birthday`
     FROM `tbl_user` WHERE email = '".$email."'";
    $ketQuaTruyVan = mysqli_query($conn,$sql);
    if($ketQuaTruyVan->num_rows>0){
     while($login = $ketQuaTruyVan->fetch_assoc()){
         $idUser = $login['user_id'];
         $name = $login['user_name']; 
         $email = $login['email'];
         $pass = $login['password'];
         if($password == $pass){
             
             session_start();
             $_SESSION['login_user']=1;
             $_SESSION['user_id']= $idUser;
             $_SESSION['user_name']= $$name;
             $_SESSION['user_img']='a';
             $_SESSION['gio_hang']['mat_hang'] = array();
             $_SESSION['all_gio_hang']= array();
             $_SESSION["gio_hang"]["tong_so"] = 0;
             $_SESSION['wishlist'] = array();
             $_SESSION['gio_hang']['tong_tien']=0;
             
             echo "  <script>
             alert('Đăng nhập thành công!');
             window.location = './index.php';
             </script>";
         }else{
             echo " 
                 <script>
                 alert('Mật khẩu không chính xác!');
                 window.location = './login_use.php';
                 </script>";
         }
     }
 }else{
     echo " 
     <script>
     alert('Người dùng không tồn tại!');
     window.location = './login_use.php';
     </script>";
 }
?>


