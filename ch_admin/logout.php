<?php
session_start();
include("../conn/conn.php");
$action = $_GET["action"];

//退出登陆
if($action=="logout")
{
	$_SESSION["admin_id"] ="";
	$_SESSION["admin_name"] ="";
	$_SESSION["admin_sys"] ="";
	$_SESSION["admin_real"] ="";
	echo "<script>alert('成功退出系统');window.location.href='login.php';</script>";
exit();
}
