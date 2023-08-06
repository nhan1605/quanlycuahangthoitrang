<?php
	// Lấy các dữ liệu được chuyển sang
	$username=$_POST['name'];
	$old_password=$_POST['password'];
	$new_password=$_POST['txtPassword'];
	$repassword=$_POST['txtRePassword'];
	// Kết nối đến CSDL
	require_once('./connect/connect.php');
	$id=$_POST['txtID'];
	// Kiểm tra xem Username & Password có khớp với thông tin lưu trong CSDL hay không?
	$sql = "
		UPDATE `tbl_user` SET 
			`password`=$password and `email`=$username
		WHERE `user_id` = ".$id
		;

	$sql1="select * from tbl_user";

	$user=mysqli_query($conn,$sql1);
	$row=mysqli_fetch_array($user);
	// echo $sql; exit();

	
	if($user_name!=$row['name']){ ;?>
		<script type="text/javascript">
			window.alert("Tên đăng nhập của bạn không đúng, vui lòng thử lại!");
			window.history.go(-1);
		</script>
<?php	}
	else if($old_password!=$row['password']){ ;?>
		<script type="text/javascript">
			window.alert("Mật khẩu cũ không đúng, vui lòng nhập lại ");
			window.history.go(-1);
		</script>
<?php 	}
    else if($password != $repassword) { ;?>
	    <script type="text/javascript">
		     window.alert("Các mật khẩu bạn đã nhập không khớp, vui lòng thử lại!");
		    window.history.go(-1);
	</script>

<?php	}
    else{      
         mysqli_query($conn, $sql);
		;?>
		<script type="text/javascript">
			window.alert("Bạn đã đổi mật khẩu thành công!! ");
			window.location.href="index.php";
		</script>
<?php } ;?>