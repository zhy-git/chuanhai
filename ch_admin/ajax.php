<?php
session_start();
include("../conn/conn.php");
$action = $_POST["action"];
header('Content-type:text/json'); 
$data=array();
//登陆
if($action=="login")
{
	$username=htmlspecialchars($_POST[username]);
	$password=$_POST[password];
	$code=$_POST[code];
	if ($username=="") {
		$data['msg']='请填写用户名';
		echo json_encode($data);
		exit();
		}elseif ($password=="") {
			$data['msg']='请填写密码';
			echo json_encode($data);
			exit();
			}elseif ($code!=$_SESSION['authnum_session']) {
					$data['msg']='验证码不正确'.$_SESSION['authnum_session'];
					echo json_encode($data);
					exit();
					}
	$password=md5($password);
	$row=$mysql->query("select * from web_admin where admin_name='{$username}'");
    if($row){
	  if($row[0]["admin_password"]==$password)
	  {
		$_SESSION["admin_id"] = $row[0]["id"];
		$_SESSION["admin_name"] = $row[0]["admin_name"];
		$_SESSION["admin_sys"] = $row[0]["admin_sys"];
		$_SESSION["admin_real"] = $row[0]["admin_real"];
		$_SESSION["admin_qx"] = $row[0]["admin_qx"];
		 //记录日志
		 $mysql->query("insert into `web_log`(`log_content`,`log_day`,`log_datetime`) values ('管理员：".$row[0]["admin_real"]."帐号：".$row[0]["admin_name"]."登陆了系统','".date("Y-m-d",time())."','".time()."')");
		$data['msg']='ok';
		echo json_encode($data);
		exit();
		}else{
		$data['msg']='密码错误,请核对后再登陆!';
		echo json_encode($data);
		exit();
		}
	}
	else
	{
		$data['msg']='用户名不存在,请核对后再登陆!';
		echo json_encode($data);
		exit();
	}
}

if($action=="admin_add")
{
	$id=$_POST['id'];
	$admin_name=$_POST['admin_name'];
	if($_POST['admin_password']<>""){
		$admin_password=md5($_POST['admin_password']);
		}else{
			$admin_password="";
			}
	$admin_real=$_POST['admin_real'];
	$admin_sys=$_POST['admin_sys'];
	$admin_qx=$_POST['admin_qx'];
	
	if($id==""){
			$mysql->query("insert into `web_admin`(
			`admin_sys`,
			`admin_name`,
			`admin_password`,
			`admin_real`,
			`admin_qx`
			) values (
			'{$admin_sys}',
			'{$admin_name}',
			'{$admin_password}',
			'{$admin_real}',
			'{$admin_qx}'
			)");
			$ids=mysql_insert_id();
			if($ids!==0){
				$data['msg']='ok';
				echo json_encode($data);
				exit();
				}
		}else{
			if($admin_password<>""){
				$sql="UPDATE `web_admin` SET 
			`admin_sys`='".$admin_sys."',
			`admin_name`='".$admin_name."',
			`admin_password`='".$admin_password."',
			`admin_real`='".$admin_real."',
			`admin_qx`='".$admin_qx."'
			 where `id`='".$id."'";
				}else{
					$sql="UPDATE `web_admin` SET 
			`admin_name`='".$admin_name."',
			`admin_real`='".$admin_real."',
			`admin_sys`='".$admin_sys."',
			`admin_qx`='".$admin_qx."'
			 where `id`='".$id."'";
					}
			if($mysql->execute($sql)){
				$data['msg']='edit';
				echo json_encode($data);
				exit();
				}
			}
	$data['msg']='提交失败!';
	echo json_encode($data);
	exit();
}

if($action='admin_del'){
	$id=$_POST['id'];
	if($mysql->execute("DELETE FROM `web_admin` WHERE `id`='".$id."'"))
	{
	//记录日志
	// $mysql->query("insert into `log`(`event`,`day`,`datetime`) values ('管理员：".$_SESSION['admin_real']."删除了帐号：".$edit_admin_name.",用户：".$edit_admin_real."','".date("Y-m-d",time())."','".time()."')");
		$data['msg']='ok';
		echo json_encode($data);
		exit();
		}
	}
	

if($action='pic_del'){
	$id=$_POST['id'];
	if($mysql->execute("DELETE FROM `web_pic` WHERE `id`='".$id."'"))
	{
	//记录日志
	// $mysql->query("insert into `log`(`event`,`day`,`datetime`) values ('管理员：".$_SESSION['admin_real']."删除了帐号：".$edit_admin_name.",用户：".$edit_admin_real."','".date("Y-m-d",time())."','".time()."')");
		$data['msg']='ok';
		echo json_encode($data);
		exit();
		}
	}
//退出登陆
if($action=="logout")
{
	$_SESSION["admin_id"] ="";
	$_SESSION["admin_name"] ="";
	$_SESSION["admin_sys"] ="";
	$_SESSION["admin_real"] ="";
	$_SESSION["admin_qx"] ="";
	echo "OK";
	exit();
}


if($action='czm'){
	$lpname=$_POST['lpname'];
	$pid=$_POST['pid'];
	$row=$mysql->query("select * from web_content where `pid`='{$pid}' and `title`='{$lpname}'");
    if($row){
	//记录日志
	// $mysql->query("insert into `log`(`event`,`day`,`datetime`) values ('管理员：".$_SESSION['admin_real']."删除了帐号：".$edit_admin_name.",用户：".$edit_admin_real."','".date("Y-m-d",time())."','".time()."')");
		$data['msg']='ok';
		echo json_encode($data);
		exit();
		}else{
		$data['msg']='no';
		echo json_encode($data);
		exit();
			}
	}
?>