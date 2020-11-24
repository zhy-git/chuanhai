<?php
session_start();
include("../conn/conn.php");
$action = $_POST["action"];
//登陆
if($action=="login")
{
	$username=htmlspecialchars($_POST[username]);
	$password=$_POST[password];
	$code=$_POST[code];
	if ($username=="") { echo "*请填写用户名!";exit();}elseif ($password=="") { echo "*请填写密码!";exit();}elseif ($code=="") { echo "*请填写验证码!";exit();}elseif ($code!=$_SESSION['authnum_session']) { echo "*验证码不正确!";exit();}
	$password=md5($password);
	$row=$mysql->query("select * from lscydb_admin where admin_name='{$username}'");
    if($row){
	  if($row[0]["admin_psw"]==$password)
	  {
		$_SESSION["admin_id"] = $row[0]["id"];
		$_SESSION["admin_name"] = $row[0]["admin_name"];
		$_SESSION["admin_fl"] = $row[0]["admin_fl"];
		$_SESSION["admin_real"] = $row[0]["admin_real"];
		$_SESSION["parent_admin"] = $row[0]["parent_admin"];
		$admin_name=$row[0]["admin_name"];
		setcookie('admin_name',$admin_name,time()+3600*24*7);
		 //记录日志
		 $mysql->query("insert into `log`(`event`,`day`,`datetime`) values ('管理员：".$row[0]["admin_real"]."帐号：".$row[0]["admin_name"]."登陆了系统','".date("Y-m-d",time())."','".time()."')");
		echo "<script>window.location.href=\"./index.php\";</script>";
		exit();
		}
		else
		{
		echo "密码错误,请核对后再登陆!";
		exit();
		}
	}
	else
	{
		echo "用户名不存在,请核对后再登陆!";
		exit();
	}
}

//退出登陆
if($action=="logout")
{
	$_SESSION["admin_id"] ="";
	$_SESSION["admin_name"] ="";
	$_SESSION["admin_fl"] ="";
	$_SESSION["admin_real"] ="";
	$_SESSION["parent_admin"] ="";
	echo "OK";
	exit();
}

function yz_length($a,$b,$c)
{
	//echo strlen($a);
	//exit();
	if (strlen($a)>=$b&&strlen($a)<=$c){$d=0;}else{$d=1;}
	return $d;
	}
	

//管理员添加
if($action=="add_admin")
{
	$add_admin_name=htmlspecialchars($_POST[add_admin_name]);
	$add_admin_real=$_POST[add_admin_real];
	$add_admin_psw1=$_POST[add_admin_psw1];
	$add_admin_psw2=$_POST[add_admin_psw2];
	$add_admin_fl=$_POST[add_admin_fl];
	
	if ($add_admin_name=="") { echo "*请填写用户名!";exit();}elseif (yz_length($add_admin_name,3,20)==1) { echo "*请输入用户名长度 3 到 20 个字符之间";exit();}elseif ($add_admin_real=="") { echo "*请填写姓名";exit();}elseif (yz_length($add_admin_real,3,20)==1) { echo "*请输入姓名长度 3 到 20 个字符之间";exit();}elseif ($add_admin_psw1=="") { echo "*请填写密码!";exit();}elseif (yz_length($add_admin_psw1,6,20)==1) { echo "*请输入密码长度 6 到 20 个字符之间";exit();}elseif ($add_admin_psw2=="") { echo "*请填写确认密码!";exit();}elseif ($add_admin_psw1!=$add_admin_psw2) { echo "*两次密码不相同,请重新输入!";exit();}
	
	$row=$mysql->query("select * from `lscydb_admin` where `admin_name`='{$add_admin_name}'");
    if($row){
		echo "帐号已存在,请重新输入!";
		exit();
		}
	
	
	$mysql->query("insert into `lscydb_admin`(`admin_name`,`admin_psw`,`admin_fl`,`admin_real`,`parent_admin`) values ('{$add_admin_name}','".md5($add_admin_psw1)."','{$add_admin_fl}','{$add_admin_real}','{$_SESSION['admin_id']}')");
	$id=mysql_insert_id();
    if($id!==0){
		
		 //记录日志
		 $mysql->query("insert into `log`(`event`,`day`,`datetime`) values ('管理员：".$_SESSION['admin_real']."添加了帐号：".$add_admin_name.",用户：".$add_admin_real."','".date("Y-m-d",time())."','".time()."')");
		 
		echo "添加成功";
		mysql_close($conn);
		exit();
		}else{
			echo "添加失败!";
			mysql_close($conn);
			exit();
			}	
}

//管理员修改
if($action=="edit_admin")
{
	$edit_id=$_POST[edit_id];
	$edit_admin_name=htmlspecialchars($_POST[edit_admin_name]);
	$edit_admin_real=$_POST[edit_admin_real];
	$edit_admin_psw1=$_POST[edit_admin_psw1];
	$edit_admin_psw2=$_POST[edit_admin_psw2];
	$edit_admin_fl=$_POST[edit_admin_fl];
	
	if ($edit_admin_name=="") { echo "*请填写用户名!";exit();}elseif (yz_length($edit_admin_name,3,20)==1) { echo "*请输入用户名长度 3 到 20 个字符之间";exit();}elseif ($edit_admin_real=="") { echo "*请填写姓名";exit();}elseif (yz_length($edit_admin_real,3,20)==1) { echo "*请输入姓名长度 3 到 20 个字符之间";exit();}
	
	if ($edit_admin_psw1!="") {
		if (yz_length($edit_admin_psw1,6,20)==1) { echo "*请输入密码长度 6 到 20 个字符之间";exit();}elseif ($edit_admin_psw2=="") { echo "*请填写确认密码!";exit();}elseif ($edit_admin_psw1!=$edit_admin_psw2) { echo "*两次密码不相同,请重新输入!";exit();}
	}
	
	if ($edit_admin_psw1=="") {
		$mysql->execute("update `lscydb_admin` set `admin_name`='{$edit_admin_name}',`admin_real`='{$edit_admin_real}', `admin_fl`='{$edit_admin_fl}' where `id`='{$edit_id}'");
	}else{
		$mysql->execute("update `lscydb_admin` set `admin_name`='{$edit_admin_name}',`admin_real`='{$edit_admin_real}', `admin_fl`='{$edit_admin_fl}', `admin_psw`='".md5($edit_admin_psw1)."' where `id`='{$edit_id}'");
		}
		
	//记录日志
		 $mysql->query("insert into `log`(`event`,`day`,`datetime`) values ('管理员：".$_SESSION['admin_real']."修改了帐号：".$edit_admin_name.",用户：".$edit_admin_real."','".date("Y-m-d",time())."','".time()."')");
	
	 echo "修改成功";
	 mysql_close($conn);
	 exit();
	
}
//管理员删除
if($action=="del_admin")
{
	$id=$_POST[id];
	
	$mysql->execute("update `lscydb_admin` set `Logout`='2' where `id`='{$id}'");
	//记录日志
		 $mysql->query("insert into `log`(`event`,`day`,`datetime`) values ('管理员：".$_SESSION['admin_real']."删除了帐号：".$edit_admin_name.",用户：".$edit_admin_real."','".date("Y-m-d",time())."','".time()."')");
	echo "ok";
	 mysql_close($conn);
	 exit(); 
		 
	//if(mysql_query("delete from lscydb_admin where id='".$id."'",$conn))
//	{
//		echo "ok";
//		mysql_close($conn);
//		exit();
//		}
		
//	$id=$_POST[id];
//		
//	if(mysql_query("delete from lscydb_admin where id='".$id."'",$conn))
//	{
//		echo "ok";
//		mysql_close($conn);
//		exit();
//		}
}

//栏目分类添加
if($action=="add_sort")
{
	$add_title=$_POST[add_title];
	$add_px=$_POST[add_px];
	$add_pid=$_POST[add_pid];
	$add_startus=$_POST[add_startus];
	$add_b_url=$_POST[add_b_url];
	$add_path="";
	if ($add_pid==0){
			$add_path="0";
		}else{
			
				$row=$mysql->query("select * from web_srot where `id`='".$add_pid."'");
				if($row){
					$add_path=$row[0]['path']."-".$add_pid;
				}
			}

	$mysql->query("insert into `web_srot`(`title`,`px`,`pid`,`startus`,`b_url`,`path`) values ('".$add_title."','".$add_px."','".$add_pid."','".$add_startus."','".$add_b_url."','".$add_path."')");
	$ids=mysql_insert_id();
	if($ids!==0){
		echo "ok";
		mysql_close($conn);
		exit();
		}else{
			echo "添加失败!";
			mysql_close($conn);
			exit();
			}	
}

//栏目分类修改
if($action=="edit_srot")
{
	$edit_id=$_POST[edit_id];
	$edit_title=$_POST[edit_title];
	$edit_px=$_POST[edit_px];
	$edit_startus=$_POST[edit_startus];
	$edit_b_url=$_POST[edit_b_url];
	
	
	if($mysql->execute("UPDATE `web_srot` SET 
		`title`='".$edit_title."',
		`px`='".$edit_px."',
		`startus`='".$edit_startus."',
		`b_url`='".$edit_b_url."'
		 where `id`='".$edit_id."'"))
	{
		echo "ok";
		mysql_close($conn);
		exit();
		}else{
			echo "miss";
			mysql_close($conn);
			exit();
			}	
}

//栏目分类删除
if($action=="del_srot")
{
	$id=$_POST[id];
	
	
	$row=$mysql->query("select * from web_content where `pid`='".$id."'");
    if($row){
		echo "nodel";
		exit();
	}
	
	if($mysql->execute("delete from web_srot where id='".$id."'"))
	{
		echo "ok";
		mysql_close($conn);
		exit();
		}
}

?>