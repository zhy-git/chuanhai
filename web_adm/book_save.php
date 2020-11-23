<?php
session_start();
require("../conn/conn.php");

$action = $_GET["action"];
//print_r($_POST);
//exit;
if ($action=="clsave"){
	//print_r($_GET);
	//exit;
	$id=$_GET['id'];
	$cl=$_GET['cl'];
	if($cl==0){
		$cls=1;
		}else{
			$cls=0;
			}
	
	if($mysql->execute("UPDATE `web_book` SET 
		`cl`='".$cls."'
		 where `id`='".$id."'"))
	{
		echo "<script language=javascript>alert('提交成功');history.back();</script>";
		}else{
			echo "<script language=javascript>alert('提交失败');history.back();</script>";
			}
}

if ($action=="tjhf"){
	//print_r($_GET);
	//exit;
	$id=$_GET['id'];
	$acontent=$_POST['acontent'];
	
	if($mysql->execute("UPDATE `web_book` SET 
		`cl`='1',
		`acontent`='".$acontent."'
		 where `id`='".$id."'"))
	{
		echo "<script language=javascript>alert('提交成功');history.back();</script>";
		}else{
			echo "<script language=javascript>alert('提交失败');history.back();</script>";
			}
}
?>