<?php session_start();
require("../conn/conn.php");

$action = $_GET["action"];
//print_r($_POST);
//exit;
function cityallid($city_id) {
	global $mysql;
    $cityallid = $mysql->query("select * from `web_city` where `id`='{$city_id}' limit 0,1");
    return $cityallid[0]['pid'];
}
function lpcityid($lpid) {
	global $mysql;
    $lpcityid = $mysql->query("select * from `web_content` where `id`='{$lpid}' limit 0,1");
    return $lpcityid[0]['city_id'];
}
if ($action=="about_add"){
	//$edit_content=$_POST['edit_content'];
	$edit_content=str_replace("'","",$_POST['edit_content']);
	$edit_title=$_POST['edit_title'];
	$edit_id=$_POST['edit_id'];
	
	if($mysql->execute("UPDATE `web_srot` SET 
		`title`='".$edit_title."',
		`content`='".$edit_content."'
		 where `id`='".$edit_id."'"))
	{
		echo "<script language=javascript>alert('提交成功');history.back();</script>";
		 //记录日志
		 $mysql->query("insert into `web_log`(`log_content`,`log_day`,`log_datetime`) values ('管理员：".$_SESSION["admin_real"]."帐号：".$_SESSION["admin_name"]."修改了".$edit_title."','".date("Y-m-d",time())."','".time()."')");
		}else{
			echo "<script language=javascript>alert('提交失败');history.back();</script>";
			}
}

if ($action=="pic_add"){
	//print_r($_POST);
	//exit;
	$pic_name=$_POST['pic_name'];
	$src=$_POST['src'];
	$pic_px=$_POST['pic_px'];
	$pid_flag=$_POST['pid_flag'];
	$edit_id=$_POST['edit_id'];
	$pid_hx=$_POST['select3'];
	$prices=$_POST['prices'];
	$zt=$_POST['zt'];
	$bh=$_POST['bh'];
	$gj=$_POST['gj'];
	$mj=$_POST['mj'];
	$lx=$_POST['lx'];
	$zx=$_POST['zx'];
	$cx=$_POST['cx'];
	$jx=$_POST['jx'];
	$lpid=$_POST['lpid'];
	$pid=$_POST['pid'];
	
	if($mysql->execute("UPDATE `web_pic` SET 
		`pic_name`='".$pic_name."',
		`pid_flag`='".$pid_flag."',
		`pic_img`='".$src."',
		`pic_px`='".$pic_px."',
		`pid_hx`='".$pid_hx."',
		`prices`='".$prices."',
		`zt`='".$zt."',
		`bh`='".$bh."',
		`gj`='".$gj."',
		`mj`='".$mj."',
		`lx`='".$lx."',
		`zx`='".$zx."',
		`cx`='".$cx."',
		`jx`='".$jx."'
		 where `id`='".$edit_id."'"))
	{
		if($lpid){
			
		echo "<script>alert('提交成功');window.location.href=\"loupan_pic.php?lpid={$lpid}&pid={$pid}&pid_flag={$pid_flag}\";</script>";
	//	echo "<script language=javascript>alert('提交成功');history.back();<//script>";
		exit;
			}
		echo "<script language=javascript>alert('提交成功');history.back();</script>";
		exit;
		}else{
			echo "<script language=javascript>alert('提交失败');history.back();</script>";
		exit;
			}
}

if ($action=="contact_add"){
	//print_r($_POST);
	//exit;
	//$edit_content=$_POST['edit_content'];
	$edit_content=str_replace("'","",$_POST['edit_content']);
	$edit_title=$_POST['edit_title'];
	$edit_id=$_POST['edit_id'];
	$map=$_POST['edit_map'];
	$zbx=$_POST['edit_zbx'];
	$zby=$_POST['edit_zby'];
	$mapname=$_POST['edit_mapname'];
	
	if($mysql->execute("UPDATE `web_srot` SET 
		`title`='".$edit_title."',
		`content`='".$edit_content."',
		`map`='".$map."',
		`zbx`='".$zbx."',
		`zby`='".$zby."',
		`mapname`='".$mapname."'
		 where `id`='".$edit_id."'"))
	{
		echo "<script language=javascript>alert('提交成功');history.back();</script>";
		 //记录日志
		 $mysql->query("insert into `web_log`(`log_content`,`log_day`,`log_datetime`) values ('管理员：".$_SESSION["admin_real"]."帐号：".$_SESSION["admin_name"]."修改了".$edit_title."','".date("Y-m-d",time())."','".time()."')");
		}else{
			echo "<script language=javascript>alert('提交失败');history.back();</script>";
			}
}
if ($action=="news_add"){
	//print_r($_POST);
	//exit;
	$flag = isset($_POST['flag']) ? join(',',$_POST['flag']) : '';
	
	$flagjw = isset($_POST['flagjw']) ? join(',',$_POST['flagjw']) : '';
	$keyword=$_POST['keyword'];
	$desc=$_POST['desc'];
	$edit_id=$_POST['edit_id'];
	$city_id=$_POST['city_id'];
	$cityall_id=cityallid($city_id);
	$edit_title=$_POST['edit_title'];
	//$edit_content=$_POST['edit_content'];
	$edit_content=str_replace("'","",$_POST['edit_content']);
	$sldz=$_POST['sldz'];
	$xmdz=$_POST['xmdz'];
	$zds=$_POST['zds'];
	$zhs=$_POST['zhs'];
	//$flag=$_POST['flag'];
	//$src=$_POST['src'];
	
	$src1=$_POST['src1'];
	$src2=$_POST['src2'];
	$src3=$_POST['src3'];
	$src4=$_POST['src4'];
	$src5=$_POST['src5'];
	$src6=$_POST['src6'];
	$px=$_POST['px'];
	if($px==''){
		$px=0;
		}
	$get_url=$_POST['get_url'];
	$p_pid=$_POST['p_pid'];
	$p_path=$_POST['p_path'];
	$page=$_POST['page'];
	$addtime=date('Y-m-d H:i:s');
	
	if($edit_id==""){
		
		$mysql->query("insert into `web_content`(
		`title`,
		`keyword`,
		`desc`,
		`content`,
		`cityall_id`,
		`city_id`,
		`sldz`,
		`xmdz`,
		`zds`,
		`zhs`,
		`pid`,
		`path`,
		`flag`,
		`flagjw`,
		`img`,
		`src2`,
		`src3`,
		`src4`,
		`src5`,
		`src6`,
		`px`,
		`get_url`,
		`addtime`
		) values (
		'{$edit_title}',
		'{$keyword}',
		'{$desc}',
		'{$edit_content}',
		'{$cityall_id}',
		'{$city_id}',
		'{$sldz}',
		'{$xmdz}',
		'{$zds}',
		'{$zhs}',
		'{$p_pid}',
		'{$p_path}',
		'{$flag}',
		'{$flagjw}',
		'{$src1}',
		'{$src2}',
		'{$src3}',
		'{$src4}',
		'{$src5}',
		'{$src6}',
		'{$px}',
		'{$get_url}',
		'{$addtime}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			echo "<script>alert('添加成功');window.location.href=\"news_list.php?pid=".$p_pid."\";</script>";
			 //记录日志
		 $mysql->query("insert into `web_log`(`log_content`,`log_day`,`log_datetime`) values ('管理员：".$_SESSION["admin_real"]."帐号：".$_SESSION["admin_name"]."添加了新闻[".$edit_title."]','".date("Y-m-d",time())."','".time()."')");
			exit();
			}
		}else{
			$sql="UPDATE `web_content` SET 
			`title`='".$edit_title."',
			`keyword`='".$keyword."',
			`desc`='".$desc."',
			`content`='".$edit_content."',
			`cityall_id`='".$cityall_id."',
			`city_id`='".$city_id."',
			`sldz`='".$sldz."',
			`xmdz`='".$xmdz."',
			`zds`='".$zds."',
			`zhs`='".$zhs."',
			`pid`='".$p_pid."',
			`path`='".$p_path."',
			`flag`='".$flag."',
			`flagjw`='".$flagjw."',
			`img`='".$src1."',
			`src2`='".$src2."',
			`src3`='".$src3."',
			`src4`='".$src4."',
			`src5`='".$src5."',
			`src6`='".$src6."',
			`px`='".$px."',
			`get_url`='".$get_url."'
			 where `id`='".$edit_id."'";
			if($mysql->execute($sql)){
				echo "<script>alert('修改成功');window.location.href=\"news_list.php?pid={$p_pid}&page={$page}\";</script>";
			 //记录日志
		 $mysql->query("insert into `web_log`(`log_content`,`log_day`,`log_datetime`) values ('管理员：".$_SESSION["admin_real"]."帐号：".$_SESSION["admin_name"]."修改了新闻[".$edit_title."]','".date("Y-m-d",time())."','".time()."')");
				exit();
				}
			}
}
if ($action=="lp_news_add"){
	//print_r($_POST);
	//exit;
	$flag = isset($_POST['flag']) ? join(',',$_POST['flag']) : '';
	
	$keyword=$_POST['keyword'];
	$desc=$_POST['desc'];
	$edit_id=$_POST['edit_id'];
	$lpid=$_POST['lpid'];
	$zds=$_POST['zds'];
	$zhs=$_POST['zhs'];
	$city_id=lpcityid($lpid);
	$cityall_id=cityallid($city_id);
	
	$edit_title=$_POST['edit_title'];
	//$edit_content=$_POST['edit_content'];
	$edit_content=str_replace("'","",$_POST['edit_content']);
	//$flag=$_POST['flag'];
	$src=$_POST['src'];
	$p_pid=$_POST['p_pid'];
	$p_path=$_POST['p_path'];
	$addtime=date('Y-m-d H:i:s');
	
	if($edit_id==""){
		$mysql->query("insert into `web_content`(
		`title`,
		`keyword`,
		`desc`,
		`content`,
		`cityall_id`,
		`city_id`,
		`zds`,
		`zhs`,
		`lpid`,
		`pid`,
		`path`,
		`flag`,
		`img`,
		`addtime`
		) values (
		'{$edit_title}',
		'{$keyword}',
		'{$desc}',
		'{$edit_content}',
		'{$cityall_id}',
		'{$city_id}',
		'{$zds}',
		'{$zhs}',
		'{$lpid}',
		'{$p_pid}',
		'{$p_path}',
		'{$flag}',
		'{$src}',
		'{$addtime}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			echo "<script>alert('添加成功');window.location.href=\"loupan_news.php?pid=".$p_pid."&lpid={$lpid}\";</script>";
			 //记录日志
		 $mysql->query("insert into `web_log`(`log_content`,`log_day`,`log_datetime`) values ('管理员：".$_SESSION["admin_real"]."帐号：".$_SESSION["admin_name"]."添加了楼盘新闻[".$edit_title."]','".date("Y-m-d",time())."','".time()."')");
			exit();
			}
		}else{
			$sql="UPDATE `web_content` SET 
			`title`='".$edit_title."',
			`keyword`='".$keyword."',
			`desc`='".$desc."',
			`content`='".$edit_content."',
			`cityall_id`='".$cityall_id."',
			`city_id`='".$city_id."',
			`zds`='".$zds."',
			`zhs`='".$zhs."',
			`lpid`='".$lpid."',
			`pid`='".$p_pid."',
			`path`='".$p_path."',
			`flag`='".$flag."',
			`img`='".$src."',
			`addtime`='".$addtime."'
			 where `id`='".$edit_id."'";
			if($mysql->execute($sql)){
				echo "<script>alert('修改成功');window.location.href=\"loupan_news.php?pid={$p_pid}&lpid={$lpid}\";</script>";
			 //记录日志
		 $mysql->query("insert into `web_log`(`log_content`,`log_day`,`log_datetime`) values ('管理员：".$_SESSION["admin_real"]."帐号：".$_SESSION["admin_name"]."修改了楼盘新闻[".$edit_title."]','".date("Y-m-d",time())."','".time()."')");
				exit();
				}
			}
}


if ($action=="lp_dp_add"){
	//print_r($_POST);
	//exit;
	
	$edit_id=$_POST['edit_id'];
	$lpid=$_POST['lpid'];
	
	$city_id=lpcityid($lpid);
	$cityall_id=cityallid($city_id);
	
	$edit_title=$_POST['edit_title'];
	$edit_content=str_replace("'","",$_POST['edit_content']);

	$p_pid=$_POST['p_pid'];
	$p_path=$_POST['p_path'];
	$addtime=date('Y-m-d H:i:s');
	
	if($edit_id==""){
		$mysql->query("insert into `web_content_dp`(
		`title`,
		`content`,
		`cityall_id`,
		`city_id`,
		`lpid`,
		`pid`,
		`path`,
		`addtime`
		) values (
		'{$edit_title}',
		'{$edit_content}',
		'{$cityall_id}',
		'{$city_id}',
		'{$lpid}',
		'{$p_pid}',
		'{$p_path}',
		'{$addtime}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			echo "<script>alert('添加成功');window.location.href=\"loupan_dp.php?pid=".$p_pid."&lpid={$lpid}\";</script>";
			 //记录日志
		 $mysql->query("insert into `web_log`(`log_content`,`log_day`,`log_datetime`) values ('管理员：".$_SESSION["admin_real"]."帐号：".$_SESSION["admin_name"]."添加了楼盘点评[".$edit_title."]','".date("Y-m-d",time())."','".time()."')");
			exit();
			}
		}else{
			$sql="UPDATE `web_content_dp` SET 
			`title`='".$edit_title."',
			`content`='".$edit_content."',
			`cityall_id`='".$cityall_id."',
			`city_id`='".$city_id."',
			`lpid`='".$lpid."',
			`pid`='".$p_pid."',
			`path`='".$p_path."',
			`addtime`='".$addtime."'
			 where `id`='".$edit_id."'";
			if($mysql->execute($sql)){
				echo "<script>alert('修改成功');window.location.href=\"loupan_dp.php?pid={$p_pid}&lpid={$lpid}\";</script>";
			 //记录日志
		 $mysql->query("insert into `web_log`(`log_content`,`log_day`,`log_datetime`) values ('管理员：".$_SESSION["admin_real"]."帐号：".$_SESSION["admin_name"]."修改了楼盘点评[".$edit_title."]','".date("Y-m-d",time())."','".time()."')");
				exit();
				}
			}
}

if ($action=="pro_add"){
	//print_r($_POST);
	//exit;
	$flag = isset($_POST['flag']) ? join(',',$_POST['flag']) : '';
	
	$edit_id=$_POST['edit_id'];
	$edit_title=$_POST['edit_title'];
	$keyword=$_POST['keyword'];
	$sldz=$_POST['sldz'];
	$city_id=$_POST['city_id'];
	if($city_id==''){
		$city_id=0;
		}
		
	$cityall_id=cityallid($city_id);
	$loupan_qq=$_POST['loupan_qq'];
	$desc=$_POST['desc'];
	$px=$_POST['px'];
	
	if($px==''){
		$px=0;
		}
	$get_url=$_POST['get_url'];
	//$edit_content=$_POST['edit_content'];
	$edit_content=str_replace("'","",$_POST['edit_content']);
	//$flag=$_POST['flag'];
	$src=$_POST['src'];
	$src7=$_POST['src7'];
	$p_pid=$_POST['p_pid'];
	$p_path=$_POST['p_path'];
	$addtime=date('Y-m-d H:i:s');
	
	if($edit_id==""){
		$mysql->query("insert into `web_content`(
		`title`,
		`keyword`,
		`sldz`,
		`cityall_id`,
		`city_id`,
		`loupan_qq`,
		`desc`,
		`get_url`,
		`content`,
		`pid`,
		`path`,
		`flag`,
		`img`,
		`src7`,
		`px`,
		`addtime`
		) values (
		'{$edit_title}',
		'{$keyword}',
		'{$sldz}',
		'{$cityall_id}',
		'{$city_id}',
		'{$loupan_qq}',
		'{$desc}',
		'{$get_url}',
		'{$edit_content}',
		'{$p_pid}',
		'{$p_path}',
		'{$flag}',
		'{$src}',
		'{$src7}',
		'{$px}',
		'{$addtime}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			echo "<script>alert('添加成功');window.location.href=\"pro_list.php?pid=".$p_pid."\";</script>";
			exit();
			}else{
				echo "insert into `web_content`(
		`title`,
		`keyword`,
		`cityall_id`,
		`city_id`,
		`loupan_qq`,
		`desc`,
		`get_url`,
		`content`,
		`pid`,
		`path`,
		`flag`,
		`img`,
		`src7`,
		`px`,
		`addtime`
		) values (
		'{$edit_title}',
		'{$keyword}',
		'{$cityall_id}',
		'{$city_id}',
		'{$loupan_qq}',
		'{$desc}',
		'{$get_url}',
		'{$edit_content}',
		'{$p_pid}',
		'{$p_path}',
		'{$flag}',
		'{$src}',
		'{$src7}',
		'{$px}',
		'{$addtime}'
		)";exit;
				}
		}else{
			$sql="UPDATE `web_content` SET 
			`title`='".$edit_title."',
			`keyword`='".$keyword."',
			`sldz`='".$sldz."',
			`cityall_id`='".$cityall_id."',
			`city_id`='".$city_id."',
			`loupan_qq`='".$loupan_qq."',
			`desc`='".$desc."',
			`get_url`='".$get_url."',
			`content`='".$edit_content."',
			`pid`='".$p_pid."',
			`path`='".$p_path."',
			`flag`='".$flag."',
			`img`='".$src."',
			`src7`='".$src7."',
			`px`='".$px."',
			`addtime`='".$addtime."'
			 where `id`='".$edit_id."'";
			if($mysql->execute($sql)){
				echo "<script>alert('修改成功');window.location.href=\"pro_list.php?pid={$p_pid}\";</script>";
				exit();
				}
			}
}
if ($action=="zs_add"){
	//print_r($_POST);
	//exit;
	
	$edit_id=$_POST['edit_id'];
	$city_id=$_POST['city_id'];
	$addtime=$_POST['addtime'];
	$price=$_POST['price'];
	$price2=$_POST['price2'];
	
	if($edit_id==""){
		$mysql->query("insert into `web_fjzs`(
		`city_id`,
		`addtime`,
		`price`,
		`price2`
		) values (
		'{$city_id}',
		'{$addtime}',
		'{$price}',
		'{$price2}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			echo "<script>alert('添加成功');window.location.href=\"zs_list.php?pid=".$p_pid."\";</script>";
			exit();
			}
		}else{
			$sql="UPDATE `web_fjzs` SET 
			`city_id`='".$city_id."',
			`addtime`='".$addtime."',
			`price`='".$price."',
			`price2`='".$price2."'
			 where `id`='".$edit_id."'";
			if($mysql->execute($sql)){
				echo "<script>alert('修改成功');window.location.href=\"zs_list.php?pid={$p_pid}\";</script>";
				exit();
				}
			}
}
if ($action=="ad_add"){
	//print_r($_POST);
	//exit;
	
	$city_id=$_POST['city_id'];
	$cityall_id=cityallid($city_id);
	$ad_pid=$_POST['ad_pid'];
	$edit_id=$_POST['edit_id'];
	$edit_title=$_POST['edit_title'];
	$edit_url=$_POST['edit_url'];
	$edit_px=$_POST['edit_px'];
	$src=$_POST['src'];
	$p_pid=$_POST['p_pid'];
	
	if($edit_id==""){
		$mysql->query("insert into `web_link`(
		`pid`,
		`ad_id`,
		`title`,
		`link_url`,
		`img`,
		`city_id`,
		`cityall_id`,
		`px`
		) values (
		'{$p_pid}',
		'{$ad_pid}',
		'{$edit_title}',
		'{$edit_url}',
		'{$src}',
		'{$city_id}',
		'{$cityall_id}',
		'{$edit_px}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			echo "<script>alert('添加成功');window.location.href=\"ad.php?pid=".$p_pid."\";</script>";
			 //记录日志
		 $mysql->query("insert into `web_log`(`log_content`,`log_day`,`log_datetime`) values ('管理员：".$_SESSION["admin_real"]."帐号：".$_SESSION["admin_name"]."添加了广告图[".$edit_title."]','".date("Y-m-d",time())."','".time()."')");
			exit();
			}
		}else{
			$sql="UPDATE `web_link` SET 
			`pid`='".$p_pid."',
			`ad_id`='".$ad_pid."',
			`title`='".$edit_title."',
			`link_url`='".$edit_url."',
			`img`='".$src."',
			`cityall_id`='".$cityall_id."',
			`city_id`='".$city_id."',
			`px`='".$edit_px."'
			 where `id`='".$edit_id."'";
			if($mysql->execute($sql)){
				echo "<script>alert('修改成功');window.location.href=\"ad.php?pid={$p_pid}\";</script>";
				
			 //记录日志
		 $mysql->query("insert into `web_log`(`log_content`,`log_day`,`log_datetime`) values ('管理员：".$_SESSION["admin_real"]."帐号：".$_SESSION["admin_name"]."修改了广告图[".$edit_title."]','".date("Y-m-d",time())."','".time()."')");
				exit();
				}else{
					echo "<script>alert('修改成功2');window.location.href=\"ad_add.php?id={$edit_id}&pid={$p_pid}\";</script>";
					exit();
					}
			}
}
if ($action=="link_add"){
	//print_r($_POST);
	//exit;
	
	$ad_pid=$_POST['ad_pid'];
	$edit_id=$_POST['edit_id'];
	$edit_title=$_POST['edit_title'];
	$edit_url=$_POST['edit_url'];
	$edit_px=$_POST['edit_px'];
	$src=$_POST['src'];
	$p_pid=$_POST['p_pid'];
	
	if($edit_id==""){
		$mysql->query("insert into `web_link`(
		`pid`,
		`ad_id`,
		`title`,
		`link_url`,
		`img`,
		`px`
		) values (
		'{$p_pid}',
		'{$ad_pid}',
		'{$edit_title}',
		'{$edit_url}',
		'{$src}',
		'{$edit_px}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			echo "<script>alert('添加成功');window.location.href=\"link_list.php?pid=".$p_pid."\";</script>";
			
			 //记录日志
		 $mysql->query("insert into `web_log`(`log_content`,`log_day`,`log_datetime`) values ('管理员：".$_SESSION["admin_real"]."帐号：".$_SESSION["admin_name"]."添加了友情链接[".$edit_title."]','".date("Y-m-d",time())."','".time()."')");
			exit();
			}
		}else{
			$sql="UPDATE `web_link` SET 
			`pid`='".$p_pid."',
			`ad_id`='".$ad_pid."',
			`title`='".$edit_title."',
			`link_url`='".$edit_url."',
			`img`='".$src."',
			`px`='".$edit_px."'
			 where `id`='".$edit_id."'";
			if($mysql->execute($sql)){
				echo "<script>alert('修改成功');window.location.href=\"link_list.php?pid={$p_pid}\";</script>";
			 //记录日志
		 $mysql->query("insert into `web_log`(`log_content`,`log_day`,`log_datetime`) values ('管理员：".$_SESSION["admin_real"]."帐号：".$_SESSION["admin_name"]."修改了友情链接[".$edit_title."]','".date("Y-m-d",time())."','".time()."')");
				exit();
				}
			}
}


if ($action=="loupan_add"){
	//print_r($_POST);
	//exit;
	$title=$_POST['title'];
	$pinyin=$_POST['pinyin'];
	$city_id=$_POST['city_id'];
	$cityall_id=cityallid($city_id);
	$flag = isset($_POST['flag']) ? join(',',$_POST['flag']) : '';
	$ztz=$_POST['ztz'];
	$keyword=$_POST['keyword'];
	$desc=$_POST['desc'];
	$kptime=$_POST['kptime'];
	$jftime=$_POST['jftime'];
	$xmdz=$_POST['xmdz'];
	$sldz=$_POST['sldz'];
	$qj_price=$_POST['qj_price'];
	if($qj_price==""){
		$qj_price=0;
		}
	$jj_price=$_POST['jj_price'];
	if($jj_price==""){
		$jj_price=0;
		}
	$all_price=$_POST['all_price'];
	if($all_price==""){
		$all_price=0;
		}
	$flagjw = isset($_POST['flagjw']) ? join(',',$_POST['flagjw']) : '';
	$flaglp = isset($_POST['flaglp']) ? join(',',$_POST['flaglp']) : '';
	$flaglb = isset($_POST['flaglb']) ? join(',',$_POST['flaglb']) : '';
	$flaghx = isset($_POST['flaghx']) ? join(',',$_POST['flaghx']) : '';
	$flagzx = isset($_POST['flagzx']) ? join(',',$_POST['flagzx']) : '';
	$flagts = isset($_POST['flagts']) ? join(',',$_POST['flagts']) : '';
	$lpzt = isset($_POST['lpzt']) ? join(',',$_POST['lpzt']) : '';
	//hz
	$hz_st=$_POST['hz_st'];
	if($hz_st==''){
		$hz_st=0;
		}
	$hz_jw = isset($_POST['hz_jw']) ? join(',',$_POST['hz_jw']) : '';
	$hz_lx = isset($_POST['hz_lx']) ? join(',',$_POST['hz_lx']) : '';
	$hz_pp = isset($_POST['hz_pp']) ? join(',',$_POST['hz_pp']) : '';
	//hz
	$xmts=$_POST['xmts'];
	$wylx=$_POST['wylx'];
	$zdmj=$_POST['zdmj'];
	$jzmj=$_POST['jzmj'];
	$rjl=$_POST['rjl'];
	$lhl=$_POST['lhl'];
	$zds=$_POST['zds'];
	$zhs=$_POST['zhs'];
	$zlhx=$_POST['zlhx'];
	$hxmj=$_POST['hxmj'];
	$cqnx=$_POST['cqnx'];
	$ysxkz=$_POST['ysxkz'];
	$xfqf=$_POST['xfqf'];
	$cws=$_POST['cws'];
	$tzs=$_POST['tzs'];
	$kfs=$_POST['kfs'];
	$wygs=$_POST['wygs'];
	$wyf=$_POST['wyf'];
	$lczk=$_POST['lczk'];
	$jtzk=$_POST['jtzk'];
	$fkfs=$_POST['fkfs'];
	$esflc1=$_POST['esflc1'];
	if($esflc1==''){
		$esflc1=0;
		}
	$esflc2=$_POST['esflc2'];
	if($esflc2==''){
		$esflc2=0;
		}
	$cxxx=$_POST['cxxx'];
	$tuanprice=$_POST['tuanprice'];
	$tuanprice2=$_POST['tuanprice2'];
	$esfcx=$_POST['esfcx'];
	if($esfcx==""){
		$esfcx=0;
		}
	$djyh=$_POST['djyh'];
	$loupan_tel=$_POST['loupan_tel'];
	$loupan_qq=$_POST['loupan_qq'];
	//$xmpt=$_POST['xmpt'];
	//$content=$_POST['content'];
	$content=str_replace("'","",$_POST['content']);
	$xmpt=str_replace("'","",$_POST['xmpt']);
	$lptd=str_replace("'","",$_POST['lptd']);
	//$lptd=$_POST['lptd'];
	$src1=$_POST['src1'];
	$src2=$_POST['src2'];
	$src3=$_POST['src3'];
	$src4=$_POST['src4'];
	$src5=$_POST['src5'];
	$src6=$_POST['src6'];
	$src7=$_POST['src7'];
	$src8=$_POST['src8'];
	$src9=$_POST['src9'];
	$px=$_POST['px'];
	if($px==""){
		$px=0;
		}
	$px1=$_POST['px1'];
	if($px1==""){
		$px1=0;
		}
	$px2=$_POST['px2'];
	if($px2==""){
		$px2=0;
		}
	$px3=$_POST['px3'];
	if($px3==""){
		$px3=0;
		}
	$px4=$_POST['px4'];
	if($px4==""){
		$px4=0;
		}
	$px5=$_POST['px5'];
	if($px5==""){
		$px5=0;
		}
	$px6=$_POST['px6'];
	if($px6==""){
		$px6=0;
		}
	$px7=$_POST['px7'];
	if($px7==""){
		$px7=0;
		}
	$px8=$_POST['px8'];
	if($px8==""){
		$px8=0;
		}
	$px9=$_POST['px9'];
	if($px9==""){
		$px9=0;
		}
	$px10=$_POST['px10'];
	if($px10==""){
		$px10=0;
		}
	$px11=$_POST['px11'];
	if($px11==""){
		$px11=0;
		}
	$px12=$_POST['px12'];
	if($px12==""){
		$px12=0;
		}
	$px13=$_POST['px13'];
	if($px13==""){
		$px13=0;
		}
	$px14=$_POST['px14'];
	if($px14==""){
		$px14=0;
		}
	$px15=$_POST['px15'];
	if($px15==""){
		$px15=0;
		}
	$px16=$_POST['px16'];
	if($px16==""){
		$px16=0;
		}
	$px17=$_POST['px17'];
	if($px17==""){
		$px17=0;
		}
	$px18=$_POST['px18'];
	if($px18==""){
		$px18=0;
		}
	$px19=$_POST['px19'];
	if($px19==""){
		$px19=0;
		}
	$px20=$_POST['px20'];
	if($px20==""){
		$px20=0;
		}
	$px21=$_POST['px21'];
	if($px21==""){
		$px21=0;
		}
	$px22=$_POST['px22'];
	if($px22==""){
		$px22=0;
		}
	$zbx=$_POST['zbx'];
	$zby=$_POST['zby'];
	$map_info=$_POST['map_info'];
	$mapst=$_POST['mapst'];
	if($mapst==''){
		$mapst=0;
		}
	$get_url=$_POST['get_url'];
	$edit_id=$_POST['edit_id'];
	$p_pid=$_POST['p_pid'];
	$p_path=$_POST['p_path'];
	$page=$_POST['page'];
	$city_idbb=$_POST['city_idbb'];
	$addtime=date('Y-m-d H:i:s');
	
	if($edit_id==""){
		
		$rowncs = $mysql->query("select * from `web_content` where `pid`='{$p_pid}' and `title`='{$title}'");
		if($rowncs[0]<>""){
			echo "<script>window.location.href=\"loupan_list.php?pid=".$p_pid."\";</script>";
			exit;
		}
		
		$mysql->query("insert into `web_content`(
		`pid`,
		`path`,
		`title`,
		`pinyin`,
		`keyword`,
		`desc`,
		`city_id`,
		`cityall_id`,
		`flag`,
		`ztz`,
		`kptime`,
		`jftime`,
		`xmdz`,
		`sldz`,
		`all_price`,
		`qj_price`,
		`jj_price`,
		`flagjw`,
		`flaglp`,
		`flaglb`,
		`flaghx`,
		`flagzx`,
		`flagts`,
		`lpzt`,
		`xmts`,
		`wylx`,
		`zdmj`,
		`jzmj`,
		`rjl`,
		`lhl`,
		`zds`,
		`zhs`,
		`zlhx`,
		`hxmj`,
		`cqnx`,
		`ysxkz`,
		`xfqf`,
		`cws`,
		`tzs`,
		`kfs`,
		`wygs`,
		`wyf`,
		`lczk`,
		`jtzk`,
		`fkfs`,
		`esflc1`,
		`esflc2`,
		`cxxx`,
		`tuanprice`,
		`tuanprice2`,
		`esfcx`,
		`djyh`,
		`loupan_tel`,
		`loupan_qq`,
		`xmpt`,
		`content`,
		`lptd`,
		`img`,
		`src2`,
		`src3`,
		`src4`,
		`src5`,
		`src6`,
		`src7`,
		`src8`,
		`src9`,
		`px`,
		`px1`,
		`px2`,
		`px3`,
		`px4`,
		`px5`,
		`px6`,
		`px7`,
		`px8`,
		`px9`,
		`px10`,
		`px11`,
		`px12`,
		`px13`,
		`px14`,
		`px15`,
		`px16`,
		`px17`,
		`px18`,
		`px19`,
		`px20`,
		`px21`,
		`px22`,
		`zbx`,
		`zby`,
		`map_info`,
		`mapst`,
		`hz_st`,
		`hz_jw`,
		`hz_lx`,
		`hz_pp`,
		`get_url`,
		`addtime`
		) values (
		'{$p_pid}',
		'{$p_path}',
		'{$title}',
		'{$pinyin}',
		'{$keyword}',
		'{$desc}',
		'{$city_id}',
		'{$cityall_id}',
		'{$flag}',
		'{$ztz}',
		'{$kptime}',
		'{$jftime}',
		'{$xmdz}',
		'{$sldz}',
		'{$all_price}',
		'{$qj_price}',
		'{$jj_price}',
		'{$flagjw}',
		'{$flaglp}',
		'{$flaglb}',
		'{$flaghx}',
		'{$flagzx}',
		'{$flagts}',
		'{$lpzt}',
		'{$xmts}',
		'{$wylx}',
		'{$zdmj}',
		'{$jzmj}',
		'{$rjl}',
		'{$lhl}',
		'{$zds}',
		'{$zhs}',
		'{$zlhx}',
		'{$hxmj}',
		'{$cqnx}',
		'{$ysxkz}',
		'{$xfqf}',
		'{$cws}',
		'{$tzs}',
		'{$kfs}',
		'{$wygs}',
		'{$wyf}',
		'{$lczk}',
		'{$jtzk}',
		'{$fkfs}',
		'{$esflc1}',
		'{$esflc2}',
		'{$cxxx}',
		'{$tuanprice}',
		'{$tuanprice2}',
		'{$esfcx}',
		'{$djyh}',
		'{$loupan_tel}',
		'{$loupan_qq}',
		'{$xmpt}',
		'{$content}',
		'{$lptd}',
		'{$src1}',
		'{$src2}',
		'{$src3}',
		'{$src4}',
		'{$src5}',
		'{$src6}',
		'{$src7}',
		'{$src8}',
		'{$src9}',
		'{$px}',
		'{$px1}',
		'{$px2}',
		'{$px3}',
		'{$px4}',
		'{$px5}',
		'{$px6}',
		'{$px7}',
		'{$px8}',
		'{$px9}',
		'{$px10}',
		'{$px11}',
		'{$px12}',
		'{$px13}',
		'{$px14}',
		'{$px15}',
		'{$px16}',
		'{$px17}',
		'{$px18}',
		'{$px19}',
		'{$px20}',
		'{$px21}',
		'{$px22}',
		'{$zbx}',
		'{$zby}',
		'{$map_info}',
		'{$mapst}',
		'{$hz_st}',
		'{$hz_jw}',
		'{$hz_lx}',
		'{$hz_pp}',
		'{$get_url}',
		'{$addtime}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			echo "<script>alert('添加成功');window.location.href=\"loupan_list.php?pid=".$p_pid."\";</script>";
			 //记录日志
		 $mysql->query("insert into `web_log`(`log_content`,`log_day`,`log_datetime`) values ('管理员：".$_SESSION["admin_real"]."帐号：".$_SESSION["admin_name"]."添加了楼盘[".$title."]','".date("Y-m-d",time())."','".time()."')");
			exit();
			}else{
				
				echo "出错？<script>history.back();</script>";
				}
		}else{
			$sql="UPDATE `web_content` SET 
			`pid`='".$p_pid."',
			`title`='".$title."',
			`pinyin`='".$pinyin."',
			`keyword`='".$keyword."',
			`desc`='".$desc."',
			`city_id`='".$city_id."',
			`cityall_id`='".$cityall_id."',
			`flag`='".$flag."',
			`ztz`='".$ztz."',
			`kptime`='".$kptime."',
			`jftime`='".$jftime."',
			`xmdz`='".$xmdz."',
			`sldz`='".$sldz."',
			`all_price`='".$all_price."',
			`qj_price`='".$qj_price."',
			`jj_price`='".$jj_price."',
			`flagjw`='".$flagjw."',
			`flaglp`='".$flaglp."',
			`flaglb`='".$flaglb."',
			`flaghx`='".$flaghx."',
			`flagzx`='".$flagzx."',
			`flagts`='".$flagts."',
			`lpzt`='".$lpzt."',
			`xmts`='".$xmts."',
			`wylx`='".$wylx."',
			`zdmj`='".$zdmj."',
			`jzmj`='".$jzmj."',
			`rjl`='".$rjl."',
			`lhl`='".$lhl."',
			`zds`='".$zds."',
			`zhs`='".$zhs."',
			`zlhx`='".$zlhx."',
			`hxmj`='".$hxmj."',
			`cqnx`='".$cqnx."',
			`ysxkz`='".$ysxkz."',
			`xfqf`='".$xfqf."',
			`cws`='".$cws."',
			`tzs`='".$tzs."',
			`kfs`='".$kfs."',
			`wygs`='".$wygs."',
			`wyf`='".$wyf."',
			`lczk`='".$lczk."',
			`jtzk`='".$jtzk."',
			`fkfs`='".$fkfs."',
			`esflc1`='".$esflc1."',
			`esflc2`='".$esflc2."',
			`cxxx`='".$cxxx."',
			`tuanprice`='".$tuanprice."',
			`tuanprice2`='".$tuanprice2."',
			`esfcx`='".$esfcx."',
			`djyh`='".$djyh."',
			`loupan_tel`='".$loupan_tel."',
			`loupan_qq`='".$loupan_qq."',
			`xmpt`='".$xmpt."',
			`content`='".$content."',
			`lptd`='".$lptd."',
			`img`='".$src1."',
			`src2`='".$src2."',
			`src3`='".$src3."',
			`src4`='".$src4."',
			`src5`='".$src5."',
			`src6`='".$src6."',
			`src7`='".$src7."',
			`src8`='".$src8."',
			`src9`='".$src9."',
			`px`='".$px."',
			`px1`='".$px1."',
			`px2`='".$px2."',
			`px3`='".$px3."',
			`px4`='".$px4."',
			`px5`='".$px5."',
			`px6`='".$px6."',
			`px7`='".$px7."',
			`px8`='".$px8."',
			`px9`='".$px9."',
			`px10`='".$px10."',
			`px11`='".$px11."',
			`px12`='".$px12."',
			`px13`='".$px13."',
			`px14`='".$px14."',
			`px15`='".$px15."',
			`px16`='".$px16."',
			`px17`='".$px17."',
			`px18`='".$px18."',
			`px19`='".$px19."',
			`px20`='".$px20."',
			`px21`='".$px21."',
			`px22`='".$px22."',
			`zbx`='".$zbx."',
			`zby`='".$zby."',
			`map_info`='".$map_info."',
			`mapst`='".$mapst."',
			`hz_st`='".$hz_st."',
			`hz_jw`='".$hz_jw."',
			`hz_lx`='".$hz_lx."',
			`hz_pp`='".$hz_pp."',
			`get_url`='".$get_url."',
			`addtime`='".$addtime."'
			 where `id`='".$edit_id."'";
			if($mysql->execute($sql)){
				echo "<script>alert('修改成功');window.location.href=\"loupan_list.php?pid={$p_pid}&page={$page}&city_id={$city_idbb}\";</script>";
			 //记录日志
		 $mysql->query("insert into `web_log`(`log_content`,`log_day`,`log_datetime`) values ('管理员：".$_SESSION["admin_real"]."帐号：".$_SESSION["admin_name"]."修改了楼盘[".$title."]','".date("Y-m-d",time())."','".time()."')");
				exit();
				}else{
					echo '提交出错？点<a href="javascript:void(0)" οnclick="window.location.reload();" style="color:#F00;">重新加载提交</a>试试<br>或右击"重新加载框架"重新提交';
					//echo $sql;
					exit;
					
				echo "出错？<script>history.back();</script>";
				}
			}
}

if ($action=="tuan_add"){
	//print_r($_POST);
	//exit;
	$title=$_POST['title'];
	$tglp=$_POST['tglp'];
	$keyword=$_POST['keyword'];
	$desc=$_POST['desc'];
	$city_id=$_POST['city_id'];
	$cityall_id=cityallid($city_id);
	$flag = isset($_POST['flag']) ? join(',',$_POST['flag']) : '';
	$tuanprice=$_POST['tuanprice'];
	$tuanprice2=$_POST['tuanprice2'];
	$get_url=$_POST['get_url'];
	$kptime=$_POST['kptime'];
	$xmdz=$_POST['xmdz'];
	$cxxx=$_POST['cxxx'];
	$djyh=$_POST['djyh'];
	//$content=$_POST['content'];
	$content=str_replace("'","",$_POST['content']);
	$src1=$_POST['src1'];
	$px=$_POST['px'];
	if($px==''){
		$px=0;
		}
	$zhs=$_POST['zhs'];
	$edit_id=$_POST['edit_id'];
	$p_pid=$_POST['p_pid'];
	$p_path=$_POST['p_path'];
	$addtime=date('Y-m-d H:i:s');
	
	if($edit_id==""){
		$mysql->query("insert into `web_content`(
		`pid`,
		`path`,
		`title`,
		`tglp`,
		`keyword`,
		`desc`,
		`cityall_id`,
		`city_id`,
		`flag`,
		`tuanprice`,
		`tuanprice2`,
		`get_url`,
		`kptime`,
		`xmdz`,
		`cxxx`,
		`djyh`,
		`content`,
		`img`,
		`px`,
		`zhs`,
		`addtime`
		) values (
		'{$p_pid}',
		'{$p_path}',
		'{$title}',
		'{$tglp}',
		'{$keyword}',
		'{$desc}',
		'{$cityall_id}',
		'{$city_id}',
		'{$flag}',
		'{$tuanprice}',
		'{$tuanprice2}',
		'{$get_url}',
		'{$kptime}',
		'{$xmdz}',
		'{$cxxx}',
		'{$djyh}',
		'{$content}',
		'{$src1}',
		'{$px}',
		'{$zhs}',
		'{$addtime}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			echo "<script>alert('添加成功');window.location.href=\"tuan_list.php?pid=".$p_pid."\";</script>";
			exit();
			}else{
				echo "出错？<script>history.back();</script>";
				}
		}else{
			$sql="UPDATE `web_content` SET 
			`pid`='".$p_pid."',
			`title`='".$title."',
			`tglp`='".$tglp."',
			`keyword`='".$keyword."',
			`desc`='".$desc."',
			`cityall_id`='".$cityall_id."',
			`city_id`='".$city_id."',
			`flag`='".$flag."',
			`tuanprice`='".$tuanprice."',
			`tuanprice2`='".$tuanprice2."',
			`get_url`='".$get_url."',
			`kptime`='".$kptime."',
			`xmdz`='".$xmdz."',
			`cxxx`='".$cxxx."',
			`djyh`='".$djyh."',
			`content`='".$content."',
			`img`='".$src1."',
			`px`='".$px."',
			`zhs`='".$zhs."',
			`addtime`='".$addtime."'
			 where `id`='".$edit_id."'";
			if($mysql->execute($sql)){
				echo "<script>alert('修改成功');window.location.href=\"tuan_list.php?pid={$p_pid}\";</script>";
				exit();
				}else{
				echo "出错？<script>history.back();</script>";
				}
			}
}


if ($action=="esf_add"){
	//print_r($_POST);
	//exit;
	$title=$_POST['title'];
	$city_id=$_POST['city_id'];
	$city2_id=$_POST['city2_id'];
	$keyword=$_POST['keyword'];
	$desc=$_POST['desc'];
	$flag = isset($_POST['flag']) ? join(',',$_POST['flag']) : '';
	$esfzt=$_POST['esfzt'];
	$sldz=$_POST['sldz'];
	$xmdz=$_POST['xmdz'];
	$tuanprice=$_POST['tuanprice'];
	$jzmj=$_POST['jzmj'];
	$flagts = isset($_POST['flagts']) ? join(',',$_POST['flagts']) : '';
	$esfcx=$_POST['esfcx'];
	$esfzx=$_POST['esfzx'];
	$esftd=$_POST['esftd'];
	$esflc1=$_POST['esflc1'];
	$esflc2=$_POST['esflc2'];
	$esfhx1=$_POST['esfhx1'];
	$esfhx2=$_POST['esfhx2'];
	$esfhx3=$_POST['esfhx3'];
	$esfhx4=$_POST['esfhx4'];
	$esfhx5=$_POST['esfhx5'];
	$esfnd=$_POST['esfnd'];
	$content=$_POST['content'];
	$djyh=$_POST['djyh'];
	
	$zbx=$_POST['zbx'];
	$zby=$_POST['zby'];
	$map_info=$_POST['map_info'];
	$src1=$_POST['src1'];
	$src2=$_POST['src2'];
	$src3=$_POST['src3'];
	$src4=$_POST['src4'];
	$src5=$_POST['src5'];
	$src6=$_POST['src6'];
	$px=$_POST['px'];
	if($px==''){
		$px=0;
		}
	$zhs=$_POST['zhs'];
	$edit_id=$_POST['edit_id'];
	$p_pid=$_POST['p_pid'];
	$p_path=$_POST['p_path'];
	$addtime=date('Y-m-d H:i:s');
	
	if($edit_id==""){
		$mysql->query("insert into `web_content`(
		`pid`,
		`path`,
		`title`,
		`keyword`,
		`desc`,
		`city_id`,
		`city2_id`,
		`flag`,
		`esfzt`,
		`sldz`,
		`xmdz`,
		`tuanprice`,
		`jzmj`,
		`flagts`,
		`esfcx`,
		`esfzx`,
		`esftd`,
		`esflc1`,
		`esflc2`,
		`esfhx1`,
		`esfhx2`,
		`esfhx3`,
		`esfhx4`,
		`esfhx5`,
		`esfnd`,
		`djyh`,
		`content`,
		`img`,
		`src2`,
		`src3`,
		`src4`,
		`src5`,
		`src6`,
		`px`,
		`map_info`,
		`zbx`,
		`zby`,
		`zhs`,
		`addtime`
		) values (
		'{$p_pid}',
		'{$p_path}',
		'{$title}',
		'{$keyword}',
		'{$desc}',
		'{$city_id}',
		'{$city2_id}',
		'{$flag}',
		'{$esfzt}',
		'{$sldz}',
		'{$xmdz}',
		'{$tuanprice}',
		'{$jzmj}',
		'{$flagts}',
		'{$esfcx}',
		'{$esfzx}',
		'{$esftd}',
		'{$esflc1}',
		'{$esflc2}',
		'{$esfhx1}',
		'{$esfhx2}',
		'{$esfhx3}',
		'{$esfhx4}',
		'{$esfhx5}',
		'{$esfnd}',
		'{$djyh}',
		'{$content}',
		'{$src1}',
		'{$src2}',
		'{$src3}',
		'{$src4}',
		'{$src5}',
		'{$src6}',
		'{$px}',
		'{$map_info}',
		'{$zbx}',
		'{$zby}',
		'{$zhs}',
		'{$addtime}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			echo "<script>alert('添加成功');window.location.href=\"esf_list.php?pid=".$p_pid."\";</script>";
			exit();
			}else{
				echo "<script>history.back();</script>";
				}
		}else{
			$sql="UPDATE `web_content` SET 
			`pid`='".$p_pid."',
			`title`='".$title."',
			`keyword`='".$keyword."',
			`desc`='".$desc."',
			`city_id`='".$city_id."',
			`city2_id`='".$city2_id."',
			`flag`='".$flag."',
			`esfzt`='".$esfzt."',
			`sldz`='".$sldz."',
			`xmdz`='".$xmdz."',
			`tuanprice`='".$tuanprice."',
			`jzmj`='".$jzmj."',
			`flagts`='".$flagts."',
			`esfcx`='".$esfcx."',
			`esfzx`='".$esfzx."',
			`esftd`='".$esftd."',
			`esflc1`='".$esflc1."',
			`esflc2`='".$esflc2."',
			`esfhx1`='".$esfhx1."',
			`esfhx2`='".$esfhx2."',
			`esfhx3`='".$esfhx3."',
			`esfhx4`='".$esfhx4."',
			`esfhx5`='".$esfhx5."',
			`esfnd`='".$esfnd."',
			`djyh`='".$djyh."',
			`content`='".$content."',
			`img`='".$src1."',
			`src2`='".$src2."',
			`src3`='".$src3."',
			`src4`='".$src4."',
			`src5`='".$src5."',
			`src6`='".$src6."',
			`px`='".$px."',
			`map_info`='".$map_info."',
			`zbx`='".$zbx."',
			`zby`='".$zby."',
			`zhs`='".$zhs."',
			`addtime`='".$addtime."'
			 where `id`='".$edit_id."'";
			if($mysql->execute($sql)){
				//echo "<script>alert('修改成功');window.location.href=\"tuan_add.php?id={$edit_id}&pid={$p_pid}\";<//script>";
				echo "<script>alert('修改成功');window.location.href=\"esf_list.php?pid={$p_pid}\";</script>";
				exit();
				}else{
				echo "出错？<script>history.back();</script>";
				}
			}
}


if ($action=="zf_add"){
	//print_r($_POST);
	//exit;
	$title=$_POST['title'];
	$keyword=$_POST['keyword'];
	$desc=$_POST['desc'];
	$city_id=$_POST['city_id'];
	$city2_id=$_POST['city2_id'];
	$flag = isset($_POST['flag']) ? join(',',$_POST['flag']) : '';
	$esfzt=$_POST['esfzt'];
	$sldz=$_POST['sldz'];
	$xmdz=$_POST['xmdz'];
	$tuanprice=$_POST['tuanprice'];
	$jzmj=$_POST['jzmj'];
	$flagts = isset($_POST['flagts']) ? join(',',$_POST['flagts']) : '';
	$esfcx=$_POST['esfcx'];
	$esfzx=$_POST['esfzx'];
	$esftd=$_POST['esftd'];
	$esflc1=$_POST['esflc1'];
	$esflc2=$_POST['esflc2'];
	$esfhx1=$_POST['esfhx1'];
	$esfhx2=$_POST['esfhx2'];
	$esfhx3=$_POST['esfhx3'];
	$esfhx4=$_POST['esfhx4'];
	$esfhx5=$_POST['esfhx5'];
	$esfnd=$_POST['esfnd'];
	$content=$_POST['content'];
	$djyh=$_POST['djyh'];
	
	$src1=$_POST['src1'];
	$src2=$_POST['src2'];
	$src3=$_POST['src3'];
	$src4=$_POST['src4'];
	$src5=$_POST['src5'];
	$src6=$_POST['src6'];
	$zbx=$_POST['zbx'];
	$zby=$_POST['zby'];
	$px=$_POST['px'];
	if($px==''){
		$px=0;
		}
	$zhs=$_POST['zhs'];
	$edit_id=$_POST['edit_id'];
	$p_pid=$_POST['p_pid'];
	$p_path=$_POST['p_path'];
	$addtime=date('Y-m-d H:i:s');
	
	if($edit_id==""){
		$mysql->query("insert into `web_content`(
		`pid`,
		`path`,
		`title`,
		`keyword`,
		`desc`,
		`city_id`,
		`city2_id`,
		`flag`,
		`esfzt`,
		`sldz`,
		`xmdz`,
		`tuanprice`,
		`jzmj`,
		`flagts`,
		`esfcx`,
		`esfzx`,
		`esftd`,
		`esflc1`,
		`esflc2`,
		`esfhx1`,
		`esfhx2`,
		`esfhx3`,
		`esfhx4`,
		`esfhx5`,
		`esfnd`,
		`djyh`,
		`content`,
		`img`,
		`src2`,
		`src3`,
		`src4`,
		`src5`,
		`src6`,
		`px`,
		`zhs`,
		`zbx`,
		`zby`,
		`addtime`
		) values (
		'{$p_pid}',
		'{$p_path}',
		'{$title}',
		'{$keyword}',
		'{$desc}',
		'{$city_id}',
		'{$city2_id}',
		'{$flag}',
		'{$esfzt}',
		'{$sldz}',
		'{$xmdz}',
		'{$tuanprice}',
		'{$jzmj}',
		'{$flagts}',
		'{$esfcx}',
		'{$esfzx}',
		'{$esftd}',
		'{$esflc1}',
		'{$esflc2}',
		'{$esfhx1}',
		'{$esfhx2}',
		'{$esfhx3}',
		'{$esfhx4}',
		'{$esfhx5}',
		'{$esfnd}',
		'{$djyh}',
		'{$content}',
		'{$src1}',
		'{$src2}',
		'{$src3}',
		'{$src4}',
		'{$src5}',
		'{$src6}',
		'{$px}',
		'{$zhs}',
		'{$zbx}',
		'{$zby}',
		'{$addtime}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			echo "<script>alert('添加成功');window.location.href=\"zf_list.php?pid=".$p_pid."\";</script>";
			exit();
			}else{
				echo "<script>history.back();</script>";
				}
		}else{
			$sql="UPDATE `web_content` SET 
			`pid`='".$p_pid."',
			`title`='".$title."',
			`keyword`='".$keyword."',
			`desc`='".$desc."',
			`city_id`='".$city_id."',
			`city2_id`='".$city2_id."',
			`flag`='".$flag."',
			`esfzt`='".$esfzt."',
			`sldz`='".$sldz."',
			`xmdz`='".$xmdz."',
			`tuanprice`='".$tuanprice."',
			`jzmj`='".$jzmj."',
			`flagts`='".$flagts."',
			`esfcx`='".$esfcx."',
			`esfzx`='".$esfzx."',
			`esftd`='".$esftd."',
			`esflc1`='".$esflc1."',
			`esflc2`='".$esflc2."',
			`esfhx1`='".$esfhx1."',
			`esfhx2`='".$esfhx2."',
			`esfhx3`='".$esfhx3."',
			`esfhx4`='".$esfhx4."',
			`esfhx5`='".$esfhx5."',
			`esfnd`='".$esfnd."',
			`djyh`='".$djyh."',
			`content`='".$content."',
			`img`='".$src1."',
			`src2`='".$src2."',
			`src3`='".$src3."',
			`src4`='".$src4."',
			`src5`='".$src5."',
			`src6`='".$src6."',
			`px`='".$px."',
			`zbx`='".$zbx."',
			`zby`='".$zby."',
			`zhs`='".$zhs."',
			`addtime`='".$addtime."'
			 where `id`='".$edit_id."'";
			if($mysql->execute($sql)){
				//echo "<script>alert('修改成功');window.location.href=\"tuan_add.php?id={$edit_id}&pid={$p_pid}\";<//script>";
				echo "<script>alert('修改成功');window.location.href=\"zf_list.php?pid={$p_pid}\";</script>";
				exit();
				}else{
				echo "出错？<script>history.back();</script>";
				}
			}
}
if ($action=="car_add"){
	//print_r($_POST);
	//exit;
	$title=$_POST['title'];
	$city_id=$_POST['city_id'];
	$flag = isset($_POST['flag']) ? join(',',$_POST['flag']) : '';
	$sldz=$_POST['sldz'];
	$xmdz=$_POST['xmdz'];
	$tuanprice=$_POST['tuanprice'];
	$tuanprice2=$_POST['tuanprice2'];
	$flagts = isset($_POST['flagts']) ? join(',',$_POST['flagts']) : '';
	$flaglb = isset($_POST['flaglb']) ? join(',',$_POST['flaglb']) : '';
	$src1=$_POST['src1'];
	$px=$_POST['px'];
	if($px==''){
		$px=0;
		}
	$zhs=$_POST['zhs'];
	$edit_id=$_POST['edit_id'];
	$p_pid=$_POST['p_pid'];
	$p_path=$_POST['p_path'];
	$addtime=date('Y-m-d H:i:s');
	$keyword=$_POST['keyword'];
	$desc=$_POST['desc'];
	
	if($edit_id==""){
		$mysql->query("insert into `web_content`(
		`pid`,
		`path`,
		`title`,
		`keyword`,
		`desc`,
		`city_id`,
		`flag`,
		`sldz`,
		`xmdz`,
		`tuanprice`,
		`tuanprice2`,
		`flagts`,
		`flaglb`,
		`img`,
		`px`,
		`zhs`,
		`addtime`
		) values (
		'{$p_pid}',
		'{$p_path}',
		'{$title}',
		'{$keyword}',
		'{$desc}',
		'{$city_id}',
		'{$flag}',
		'{$sldz}',
		'{$xmdz}',
		'{$tuanprice}',
		'{$tuanprice2}',
		'{$flagts}',
		'{$flaglb}',
		'{$src1}',
		'{$px}',
		'{$zhs}',
		'{$addtime}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			echo "<script>alert('添加成功');window.location.href=\"car_list.php?pid=".$p_pid."\";</script>";
			exit();
			}else{
				echo "<script>history.back();</script>";
				}
		}else{
			$sql="UPDATE `web_content` SET 
			`pid`='".$p_pid."',
			`title`='".$title."',
			`keyword`='".$keyword."',
			`desc`='".$desc."',
			`city_id`='".$city_id."',
			`flag`='".$flag."',
			`sldz`='".$sldz."',
			`xmdz`='".$xmdz."',
			`tuanprice`='".$tuanprice."',
			`tuanprice2`='".$tuanprice2."',
			`flagts`='".$flagts."',
			`flaglb`='".$flaglb."',
			`img`='".$src1."',
			`px`='".$px."',
			`zhs`='".$zhs."',
			`addtime`='".$addtime."'
			 where `id`='".$edit_id."'";
			if($mysql->execute($sql)){
				//echo "<script>alert('修改成功');window.location.href=\"tuan_add.php?id={$edit_id}&pid={$p_pid}\";<//script>";
				echo "<script>alert('修改成功');window.location.href=\"car_list.php?pid={$p_pid}\";</script>";
				exit();
				}else{
				echo "出错？<script>history.back();</script>";
				}
			}
}
?>