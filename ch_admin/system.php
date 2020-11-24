<?php
if($_SESSION['admin_id']==''){
	echo "<script>alert('请登陆系统');window.top.location.href='login.php';</script>";
	exit;
	}
?>