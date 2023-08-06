<?php
require_once('./connect/connect.php'); 
	$id=$_POST['txtID'];
	$username=$_POST['name'];
    $old_password  =md5($_POST['txtpassword']);
	$new_password=md5($_POST['txtPassword']);
	$repassword=md5($_POST['txtRePassword']);
    $sql ="SELECT `user_id`, `user_name`, `password`, city,district,ward, `specific_location`, `email`, `phone`, `birthday`
     FROM `tbl_user` WHERE 1";
$sql1 = "UPDATE `tbl_user` SET `password`='" . $new_password . "'";
    $ketQuaTruyVan = mysqli_query($conn,$sql);
if ($ketQuaTruyVan->num_rows > 0) {
	while ($login = $ketQuaTruyVan->fetch_assoc()) {
		$pass = $login['password'];
		$user = $login['user_name'];
		if($new_password != $repassword && $username != $user) { ;?>
		<script type="text/javascript">
			window.alert("Các thông tin bạn đã nhập không khớp, vui lòng thử lại!");
			window.history.go(-1);
		</script>

<?php
		} else {
	if ($old_password != $pass) {
		; ?>
		<script type="text/javascript">
			window.alert("Mật khẩu cũ không đúng, vui lòng nhập lại ");
			window.history.go(-1);
		</script>
<?php } else {
		mysqli_query($conn, $sql1);
		; ?>
		<script type="text/javascript">
			window.alert("Bạn đã đổi mật khẩu thành công!! ");
			window.location.href="login_user.php";
		</script>

<?php }}
}
};?>
