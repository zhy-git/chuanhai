<?php
session_start();
include("../conn/conn.php");
$action = $_POST["action"];
header('Content-type:text/json'); 
$data=array();

if($action=='get_huishou'){
	
	$timess=date('Y-m-d H:i:s');
	$admin_id=$_SESSION['admin_id'];
	$admin_name=$_SESSION['admin_real'];
	$arr = explode(",",$_POST['delid']); 
	
	foreach($arr as $value){
		if($value!=''){
			$mysql->execute("UPDATE `oa_client` SET `startus`='0',`adminid`='{$admin_id}' where `id`='".$value."'");
			$mysql->query("insert into `oa_client_czls`(`admin_name`,`admin_id`,`client_id`,`cz_time`,`cz_name`) values ('{$admin_name}','{$admin_id}','{$value}','{$timess}','删除了客户')");
			}
	}
		$data['msg']='ok';
		echo json_encode($data);
		exit();
}

if($action=='get_del'){
	
	$timess=date('Y-m-d H:i:s');
	$admin_id=$_SESSION['admin_id'];
	$admin_name=$_SESSION['admin_real'];
	$arr = explode(",",$_POST['delid']); 
	
	foreach($arr as $value){
		if($value!=''){
			$mysql->execute("DELETE FROM `web_link` WHERE `id` = '".$value."'");
			//$mysql->query("insert into `oa_client_czls`(`admin_name`,`admin_id`,`client_id`,`cz_time`,`cz_name`) values ('{$admin_name}','{$admin_id}','{$value}','{$timess}','删除了客户')");
			}
	}
		$data['msg']='ok';
		echo json_encode($data);
		exit();
}


if($action=='get_jy'){
	
	$timess=date('Y-m-d H:i:s');
	
	$arr = explode(",",$_POST['delid']); 
	$pid_flag=$_POST['pid_flag'];
	
	foreach($arr as $value){
		if($value!=''){
			$mysql->execute("UPDATE `web_pic` SET `pid_flag`='{$pid_flag}' where `id`='".$value."'");
			//$mysql->execute("DELETE FROM `web_link` WHERE `id` = '".$value."'");
			//$mysql->query("insert into `oa_client_czls`(`admin_name`,`admin_id`,`client_id`,`cz_time`,`cz_name`) values ('{$admin_name}','{$admin_id}','{$value}','{$timess}','删除了客户')");
			}
	}
		$data['msg']='ok';
		echo json_encode($data);
		exit();
}

if($action=='get_jyxc'){
	
	$timess=date('Y-m-d H:i:s');
	
	$arr = explode(",",$_POST['delid']); 
	$pid_flag=$_POST['pid_flag'];
	
	foreach($arr as $value){
		if($value!=''){
			//$mysql->execute("UPDATE `web_pic` SET `pid_flag`='{$pid_flag}' where `id`='".$value."'");
			$mysql->execute("DELETE FROM `web_pic` WHERE `id` = '".$value."'");
			//$mysql->query("insert into `oa_client_czls`(`admin_name`,`admin_id`,`client_id`,`cz_time`,`cz_name`) values ('{$admin_name}','{$admin_id}','{$value}','{$timess}','删除了客户')");
			}
	}
		$data['msg']='ok';
		echo json_encode($data);
		exit();
}

$data['msg']='出错';
echo json_encode($data);
exit();