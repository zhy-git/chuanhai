<?php
session_start();
require("conn/conn.php");
require_once('conn/360_safe3.php');

$action = $_GET["action"];
if($action==''){
$action = $_POST["action"];
}

if ($action=="wenda"){
	

	$code=$_POST['code'];
	$lpid=$_POST['lpid'];
	
	$rowc=$mysql->query("select * from web_content where `id`='{$lpid}'");
	$cityr=$rowc[0];
	$city_id=$cityr['city_id'];
	$cityall_id=$cityr['cityall_id'];
	
	$pid=$_POST['pid'];
	$uname=$_POST['uname'];
	$usex=$_POST['usex'];
	$utel=$_POST['utel'];
	$utitle=$_POST['utitle'];
	$ucontent=$_POST['content'];
	$addtime=date('Y-m-d H:i:s');
	$ly=$_POST['ly'];
	$gz=$_POST['gz'];
	
	if($gz<>""){
		foreach($gz as $v){
			$gz2.=$v."、";
			}
		$ucontent.='订阅关注:'.$gz2;
	}
	
	
	//+
	$uallprice=$_POST['uallprice'];
	$uqwmj=$_POST['uqwmj'];
	$uyxcity=$_POST['uyxcity'];
	$uaddress=$_POST['uaddress'];
	$lm_content=$_POST['lm_content'];
	//+
	$sfz=$_POST['sfz'];
	$szqy=$_POST['szqy'];
	
	if($sfz<>""){
		$ucontent.='　身份证号码:'.$sfz;
		}
	if($szqy<>""){
		$ucontent.='　所在区域:'.$szqy;
		}
	if($uallprice<>""){
		$ucontent.='期望总价:'.$uallprice;
		}
	if($uqwmj<>""){
		$ucontent.='　期望面积:'.$uqwmj;
		}
	if($uaddress<>""){
		$ucontent.='　现居住地:'.$uaddress;
		}
	if($uyxcity<>""){
		$ucontent.='　意向区域:'.$uyxcity;
		}
	if($lm_content<>""){
		$ucontent.='　其他需求:'.$lm_content;
		}
	if($ly<>""){
		$ucontent.='　提交来源:'.$ly;
		}
	//+
	if ($code!=$_SESSION['authnum_session']) {
				
			echo "<script language=javascript>alert('验证码不正确');history.back();</script>";
					exit();
					}
	
	$mysql->query("insert into `web_book`(
		`pid`,
		`lpid`,
		`cityall_id`,
		`city_id`,
		`uname`,
		`usex`,
		`utel`,
		`utitle`,
		`ucontent`,
		`addtime`
		) values (
		'{$pid}',
		'{$lpid}',
		'{$cityall_id}',
		'{$city_id}',
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
			exit;
			}else{
			echo "<script language=javascript>alert('提交失败');history.back();</script>";
			exit;
			}
	}
?>