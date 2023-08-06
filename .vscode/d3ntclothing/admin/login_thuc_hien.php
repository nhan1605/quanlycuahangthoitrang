<?php
    
    require_once("../connect/connect.php");

    $email = $_POST['email'];

    $pass = $_POST['password'];

    $sql = "SELECT `admin_id`, `email`, `password`, `name`, `phone` FROM `tbl_admin` WHERE email = '".$email."'";
    $ketQuaTruyVan = mysqli_query($conn,$sql);
    if($ketQuaTruyVan->num_rows>0){
        while($login = $ketQuaTruyVan->fetch_assoc()){
            $admin_id = $login['admin_id'];
            $email = $login['email'];
            $password = $login['password'];
            $admin_name = $login['name'];
            $phone = $login['phone'];
            if($password == $pass){
                echo "  <script>
                window.location = '../admin/index_admin.php';
                alert('Đăng nhập thành công!');
                </script>";

                session_start();
                $_SESSION['login']=1;
                $_SESSION['admin_id']= $admin_id;
                $_SESSION['admin_name']= $admin_name;

            }else{
                echo " 
                    <script>
                    setTimeout(function(){
                       history.back();
                   }, 200);
                     alert('Mật khẩu không chính xác!');
                    </script>";

            }
        }
    }else{
        echo " 
        <script>
        setTimeout(function(){
            history.back();
        }, 200);

        alert('Người dùng không tồn tại!');
        </script>";
    }

?>