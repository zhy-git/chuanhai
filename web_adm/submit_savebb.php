<?php
session_start();
require("../conn/conn.php");

$action = $_GET["action"];
//print_r($_POST);
//exit;
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
	$edit_id=$_POST['edit_id'];
	
	if($mysql->execute("UPDATE `web_pic` SET 
		`pic_name`='".$pic_name."',
		`pic_img`='".$src."',
		`pic_px`='".$pic_px."'
		 where `id`='".$edit_id."'"))
	{
		echo "<script language=javascript>alert('提交成功');history.back();</script>";
		}else{
			echo "<script language=javascript>alert('提交失败');history.back();</script>";
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
		}else{
			echo "<script language=javascript>alert('提交失败');history.back();</script>";
			}
}
if ($action=="news_add"){
	//print_r($_POST);
	//exit;
	$flag = isset($_POST['flag']) ? join(',',$_POST['flag']) : '';
	
	$keyword=$_POST['keyword'];
	$desc=$_POST['desc'];
	$edit_id=$_POST['edit_id'];
	$city_id=$_POST['city_id'];
	$edit_title=$_POST['edit_title'];
	//$edit_content=$_POST['edit_content'];
	$edit_content=str_replace("'","",$_POST['edit_content']);
	$sldz=$_POST['sldz'];
	$xmdz=$_POST['xmdz'];
	//$flag=$_POST['flag'];
	//$src=$_POST['src'];
	
	$src1=$_POST['src1'];
	$src2=$_POST['src2'];
	$src3=$_POST['src3'];
	$src4=$_POST['src4'];
	$src5=$_POST['src5'];
	$src6=$_POST['src6'];
	$px=$_POST['px'];
	if($px==""){
		$px=0;
		}
	$get_url=$_POST['get_url'];
	$get_url2=$_POST['get_url2'];
	$p_pid=$_POST['p_pid'];
	$p_path=$_POST['p_path'];
	$addtime=date('Y-m-d H:i:s');
	
	if($edit_id==""){
		$mysql->query("insert into `web_content`(
		`title`,
		`keyword`,
		`desc`,
		`content`,
		`city_id`,
		`sldz`,
		`xmdz`,
		`pid`,
		`path`,
		`flag`,
		`img`,
		`src2`,
		`src3`,
		`src4`,
		`src5`,
		`src6`,
		`px`,
		`get_url`,
		`get_url2`,
		`addtime`
		) values (
		'{$edit_title}',
		'{$keyword}',
		'{$desc}',
		'{$edit_content}',
		'{$city_id}',
		'{$sldz}',
		'{$xmdz}',
		'{$p_pid}',
		'{$p_path}',
		'{$flag}',
		'{$src1}',
		'{$src2}',
		'{$src3}',
		'{$src4}',
		'{$src5}',
		'{$src6}',
		'{$px}',
		'{$get_url}',
		'{$get_url2}',
		'{$addtime}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			echo "<script>alert('添加成功');window.location.href=\"news_list.php?pid=".$p_pid."\";</script>";
			exit();
			}
		}else{
			$sql="UPDATE `web_content` SET 
			`title`='".$edit_title."',
			`keyword`='".$keyword."',
			`desc`='".$desc."',
			`content`='".$edit_content."',
			`city_id`='".$city_id."',
			`sldz`='".$sldz."',
			`xmdz`='".$xmdz."',
			`pid`='".$p_pid."',
			`path`='".$p_path."',
			`flag`='".$flag."',
			`img`='".$src1."',
			`src2`='".$src2."',
			`src3`='".$src3."',
			`src4`='".$src4."',
			`src5`='".$src5."',
			`src6`='".$src6."',
			`px`='".$px."',
			`get_url`='".$get_url."',
			`get_url2`='".$get_url2."',
			`addtime`='".$addtime."'
			 where `id`='".$edit_id."'";
			if($mysql->execute($sql)){
				echo "<script>alert('修改成功');window.location.href=\"news_list.php?pid={$p_pid}\";</script>";
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
			exit();
			}
		}else{
			$sql="UPDATE `web_content` SET 
			`title`='".$edit_title."',
			`keyword`='".$keyword."',
			`desc`='".$desc."',
			`content`='".$edit_content."',
			`lpid`='".$lpid."',
			`pid`='".$p_pid."',
			`path`='".$p_path."',
			`flag`='".$flag."',
			`img`='".$src."',
			`addtime`='".$addtime."'
			 where `id`='".$edit_id."'";
			if($mysql->execute($sql)){
				echo "<script>alert('修改成功');window.location.href=\"loupan_news.php?pid={$p_pid}&lpid={$lpid}\";</script>";
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
	$desc=$_POST['desc'];
	$px=$_POST['px'];
	if($px==""){
		$px=0;
		}
	$get_url=$_POST['get_url'];
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
		`get_url`,
		`content`,
		`pid`,
		`path`,
		`flag`,
		`img`,
		`px`,
		`addtime`
		) values (
		'{$edit_title}',
		'{$keyword}',
		'{$desc}',
		'{$get_url}',
		'{$edit_content}',
		'{$p_pid}',
		'{$p_path}',
		'{$flag}',
		'{$src}',
		'{$px}',
		'{$addtime}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			echo "<script>alert('添加成功');window.location.href=\"pro_list.php?pid=".$p_pid."\";</script>";
			exit();
			}
		}else{
			$sql="UPDATE `web_content` SET 
			`title`='".$edit_title."',
			`keyword`='".$keyword."',
			`desc`='".$desc."',
			`get_url`='".$get_url."',
			`content`='".$edit_content."',
			`pid`='".$p_pid."',
			`path`='".$p_path."',
			`flag`='".$flag."',
			`img`='".$src."',
			`px`='".$px."',
			`addtime`='".$addtime."'
			 where `id`='".$edit_id."'";
			if($mysql->execute($sql)){
				echo "<script>alert('修改成功');window.location.href=\"pro_list.php?pid={$p_pid}\";</script>";
				exit();
				}
			}
}
if ($action=="ad_add"){
	//print_r($_POST);
	//exit;
	
	$ad_pid=$_POST['ad_pid'];
	$edit_id=$_POST['edit_id'];
	$edit_title=$_POST['edit_title'];
	$edit_url=$_POST['edit_url'];
	$edit_px=$_POST['edit_px'];
	
	if($edit_px==""){
		$edit_px=0;
		}
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
			echo "<script>alert('添加成功');window.location.href=\"ad.php?pid=".$p_pid."\";</script>";
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
				echo "<script>alert('修改成功');window.location.href=\"ad.php?pid={$p_pid}\";</script>";
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
	$flagjw = isset($_POST['flagjw']) ? join(',',$_POST['flagjw']) : '';
	$flaglp = isset($_POST['flaglp']) ? join(',',$_POST['flaglp']) : '';
	$flaglb = isset($_POST['flaglb']) ? join(',',$_POST['flaglb']) : '';
	$flaghx = isset($_POST['flaghx']) ? join(',',$_POST['flaghx']) : '';
	$flagzx = isset($_POST['flagzx']) ? join(',',$_POST['flagzx']) : '';
	$flagts = isset($_POST['flagts']) ? join(',',$_POST['flagts']) : '';
	$lpzt = isset($_POST['lpzt']) ? join(',',$_POST['lpzt']) : '';
	//hz
	$hz_st=$_POST['hz_st'];
	if($hz_st==""){
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
	$cxxx=$_POST['cxxx'];
	$tuanprice=$_POST['tuanprice'];
	$esfcx=$_POST['esfcx'];
	if($esfcx==""){
		$esfcx=0;
		}
	
	$esflx=$_POST['esflx'];
	$esfzx=$_POST['esfzx'];
	$esftd=$_POST['esftd'];
	$esflc1=$_POST['esflc1'];
	$esflc2=$_POST['esflc2'];
	$esfnd=$_POST['esfnd'];
	$esfhx1=$_POST['esfhx1'];
	$esfhx2=$_POST['esfhx2'];
	
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
	$zbx=$_POST['zbx'];
	$zby=$_POST['zby'];
	$map_info=$_POST['map_info'];
	$edit_id=$_POST['edit_id'];
	$p_pid=$_POST['p_pid'];
	$p_path=$_POST['p_path'];
	$addtime=date('Y-m-d H:i:s');
	
	if($edit_id==""){
		$mysql->query("insert into `web_content`(
		`pid`,
		`path`,
		`title`,
		`pinyin`,
		`keyword`,
		`desc`,
		`city_id`,
		`flag`,
		`ztz`,
		`kptime`,
		`jftime`,
		`xmdz`,
		`sldz`,
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
		`cxxx`,
		`tuanprice`,
		`esfcx`,
		`esflx`,
		`esfzx`,
		`esftd`,
		`esflc1`,
		`esflc2`,
		`esfnd`,
		`esfhx1`,
		`esfhx2`,
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
		`zbx`,
		`zby`,
		`map_info`,
		`hz_st`,
		`hz_jw`,
		`hz_lx`,
		`hz_pp`,
		`addtime`
		) values (
		'{$p_pid}',
		'{$p_path}',
		'{$title}',
		'{$pinyin}',
		'{$keyword}',
		'{$desc}',
		'{$city_id}',
		'{$flag}',
		'{$ztz}',
		'{$kptime}',
		'{$jftime}',
		'{$xmdz}',
		'{$sldz}',
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
		'{$cxxx}',
		'{$tuanprice}',
		'{$esfcx}',
		'{$esflx}',
		'{$esfzx}',
		'{$esftd}',
		'{$esflc1}',
		'{$esflc2}',
		'{$esfnd}',
		'{$esfhx1}',
		'{$esfhx2}',
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
		'{$zbx}',
		'{$zby}',
		'{$map_info}',
		'{$hz_st}',
		'{$hz_jw}',
		'{$hz_lx}',
		'{$hz_pp}',
		'{$addtime}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			echo "<script>alert('添加成功');window.location.href=\"loupan_list.php?pid=".$p_pid."\";</script>";
			exit();
			}else{
				echo "insert into `web_content`(
		`pid`,
		`path`,
		`title`,
		`pinyin`,
		`keyword`,
		`desc`,
		`city_id`,
		`flag`,
		`ztz`,
		`kptime`,
		`jftime`,
		`xmdz`,
		`sldz`,
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
		`cxxx`,
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
		`px`,
		`zbx`,
		`zby`,
		`map_info`,
		`hz_st`,
		`hz_jw`,
		`hz_lx`,
		`hz_pp`,
		`addtime`
		) values (
		'{$p_pid}',
		'{$p_path}',
		'{$title}',
		'{$pinyin}',
		'{$keyword}',
		'{$desc}',
		'{$city_id}',
		'{$flag}',
		'{$ztz}',
		'{$kptime}',
		'{$jftime}',
		'{$xmdz}',
		'{$sldz}',
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
		'{$cxxx}',
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
		'{$px}',
		'{$zbx}',
		'{$zby}',
		'{$map_info}',
		'{$hz_st}',
		'{$hz_jw}',
		'{$hz_lx}',
		'{$hz_pp}',
		'{$addtime}'
		)";
		exit;
				
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
			`flag`='".$flag."',
			`ztz`='".$ztz."',
			`kptime`='".$kptime."',
			`jftime`='".$jftime."',
			`xmdz`='".$xmdz."',
			`sldz`='".$sldz."',
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
			`cxxx`='".$cxxx."',
			`tuanprice`='".$tuanprice."',
			`esfcx`='".$esfcx."',
			`esflx`='".$esflx."',
			`esfzx`='".$esfzx."',
			`esftd`='".$esftd."',
			`esflc1`='".$esflc1."',
			`esflc2`='".$esflc2."',
			`esfnd`='".$esfnd."',
			`esfhx1`='".$esfhx1."',
			`esfhx2`='".$esfhx2."',
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
			`zbx`='".$zbx."',
			`zby`='".$zby."',
			`map_info`='".$map_info."',
			`hz_st`='".$hz_st."',
			`hz_jw`='".$hz_jw."',
			`hz_lx`='".$hz_lx."',
			`hz_pp`='".$hz_pp."',
			`addtime`='".$addtime."'
			 where `id`='".$edit_id."'";
			if($mysql->execute($sql)){
				echo "<script>alert('修改成功');window.location.href=\"loupan_list.php?pid={$p_pid}\";</script>";
				exit();
				}else{
					
				echo "出错？".$sql;//<script>history.back();<//script>
				}
			}
}

if ($action=="tuan_add"){
	//print_r($_POST);
	//exit;
	$title=$_POST['title'];
	$keyword=$_POST['keyword'];
	$tglp=$_POST['tglp'];
	$desc=$_POST['desc'];
	$city_id=$_POST['city_id'];
	$flag = isset($_POST['flag']) ? join(',',$_POST['flag']) : '';
	$tuanprice=$_POST['tuanprice'];
	$tuanprice2=$_POST['tuanprice2'];
	$kptime=$_POST['kptime'];
	$xmdz=$_POST['xmdz'];
	$cxxx=$_POST['cxxx'];
	$djyh=$_POST['djyh'];
	//$content=$_POST['content'];
	$content=str_replace("'","",$_POST['content']);
	$src1=$_POST['src1'];
	$px=$_POST['px'];
	if($px==""){
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
		`city_id`,
		`flag`,
		`tuanprice`,
		`tuanprice2`,
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
		'{$city_id}',
		'{$flag}',
		'{$tuanprice}',
		'{$tuanprice2}',
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
			`city_id`='".$city_id."',
			`flag`='".$flag."',
			`tuanprice`='".$tuanprice."',
			`tuanprice2`='".$tuanprice2."',
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
	
	$src1=$_POST['src1'];
	$px=$_POST['px'];
	if($px==""){
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
		'{$px}',
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
			`px`='".$px."',
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
	$px=$_POST['px'];
	if($px==""){
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
		'{$px}',
		'{$zhs}',
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
			`px`='".$px."',
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
	if($px==""){
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