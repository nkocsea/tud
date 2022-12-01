<?php
if (isset($_SESSION['id']) == false) {
	header('Location: login.php');
}else {
	if (isset($_SESSION['permision']) == true) {
		$permission = $_SESSION['permision'];
		if ($permission == '0') {
			echo "Bạn không đủ quyền truy cập vào trang này<br>";
			echo "<a href='/'> Click để về lại trang chủ</a>";
			exit();
		}
	}
}
?>