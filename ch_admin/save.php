<?php session_start();
require("../conn/conn.php");

$action = $_GET["action"];

if ($action=="config_save"){
	$site_name=$_POST['site_name'];
	$site_url=$_POST['site_url'];
	$site_keyword=$_POST['site_keyword'];
	$site_desc=$_POST['site_desc'];
	$site_icp=$_POST['site_icp'];
	$company_name=$_POST['company_name'];
	$company_address=$_POST['company_address'];
	$company_contact=$_POST['company_contact'];
	$company_tel=$_POST['company_tel'];
	$company_fax=$_POST['company_fax'];
	$company_email=$_POST['company_email'];
	$info1=$_POST['info1'];
	$text1=$_POST['text1'];
	$info2=$_POST['info2'];
	$text2=$_POST['text2'];
	$id=$_POST['id'];
	
	if($mysql->execute("UPDATE `web_config` SET 
		`site_name`='".$site_name."',
		`site_url`='".$site_url."',
		`site_keyword`='".$site_keyword."',
		`site_desc`='".$site_desc."',
		`site_icp`='".$site_icp."',
		`company_name`='".$company_name."',
		`company_address`='".$company_address."',
		`company_contact`='".$company_contact."',
		`company_tel`='".$company_tel."',
		`company_fax`='".$company_fax."',
		`info1`='".$info1."',
		`info2`='".$info2."',
		`text1`='".$text1."',
		`text2`='".$text2."',
		`company_email`='".$company_email."'
		 where `id`='".$id."'"))
	{
		echo "<script language=javascript>alert('提交成功');history.back();</script>";
		}else{
			echo "<script language=javascript>alert('提交失败');history.back();</script>";
			}
	}
?>