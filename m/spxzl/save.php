<?php
require("../../conn/conn.php");
require_once('../360_safe3.php');

$action = $_GET["action"];

if ($action=="wenda"){
	
/*	print_r($_POST);
	exit;*/
	$lpid=$_POST['lpid'];
	if($lpid==''){
		$lpid=0;
		}
	$pid=$_POST['pid'];
	$uname=$_POST['uname'];
	$usex=$_POST['usex'];
	$utel=$_POST['utel'];
	$utitle=$_POST['utitle'];
	$ucontent=$_POST['ucontent'];
	//$ly=$_POST['ly'];
	$addtime=date('Y-m-d H:i:s');
	if($ly){
		$ucontent.="来源：".$ly;
		}
	
	$mysql->query("insert into `web_book`(
		`pid`,
		`lpid`,
		`uname`,
		`usex`,
		`utel`,
		`utitle`,
		`ucontent`,
		`addtime`
		) values (
		'{$pid}',
		'{$lpid}',
		'{$uname}',
		'{$usex}',
		'{$utel}',
		'{$utitle}',
		'{$ucontent}',
		'{$addtime}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			echo "<script language=javascript>alert('提交成功');history.back();</script>";
			}else{
				/*echo "insert into `web_book`(
		`pid`,
		`lpid`,
		`uname`,
		`usex`,
		`utel`,
		`utitle`,
		`ucontent`,
		`addtime`
		) values (
		'{$pid}',
		'{$lpid}',
		'{$uname}',
		'{$usex}',
		'{$utel}',
		'{$utitle}',
		'{$ucontent}',
		'{$addtime}'
		)";exit;*/
			echo "<script language=javascript>alert('提交失败');history.back();</script>";
			}
	}

if ($action=="dz"){
	
	//print_r($_POST);
	//exit;
	$lpid=$_POST['lpid'];
	$pid=$_POST['pid'];
	$uname=$_POST['uname'];
	$usex=$_POST['usex'];
	$ly=$_POST['ly'];
	$utel=$_POST['utel'];
	$utitle=$_POST['utitle'];
	$ucontent=$_POST['ucontent'];
	if($ly){
		$ucontent.="来源：".$ly;
		}
	
	if($_POST['yixiang']<>''){
		$ucontent.=" 意向区域：".$_POST['yixiang'];
		}
	if($_POST['feature']<>''){
		$ucontent.=" 特色：".$_POST['feature'];
		}
	if($_POST['house_type']<>''){
		$ucontent.=" 户型：".$_POST['house_type'];
		}
	if($_POST['house_price']<>''){
		$ucontent.=" 价格：".$_POST['house_price'];
		}
	if($_POST['house_mj']<>''){
		$ucontent.=" 置业面积：".$_POST['house_mj'];
		}
	if($_POST['leave']<>''){
		$ucontent.=" 附加需求：".$_POST['leave'];
		}
	
	
	$addtime=date('Y-m-d H:i:s');
	
	$mysql->query("insert into `web_book`(
		`pid`,
		`lpid`,
		`uname`,
		`usex`,
		`utel`,
		`utitle`,
		`ucontent`,
		`addtime`
		) values (
		'{$pid}',
		'{$lpid}',
		'{$uname}',
		'{$usex}',
		'{$utel}',
		'{$utitle}',
		'{$ucontent}',
		'{$addtime}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			echo "<script language=javascript>alert('提交成功');history.back();</script>";
			}else{
			echo "<script language=javascript>alert('提交失败');history.back();</script>";
			}
	}
?>