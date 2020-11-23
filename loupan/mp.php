<?php
header('Content-type:text/json');
?>
<?php
require("../conn/conn.php");
require("../functionmpp.php");
function citypid($city_id) {
	global $mysql;
    $cityname = $mysql->query("select * from `web_city` where `id`='{$city_id}' limit 0,1");
    return $cityname[0]['pid'];
}
$lm=2;
$key=$_GET['key'];
$flagjw=$_GET['price'];
$flaghx=$_GET['flaghx'];
$flagts=$_GET['houseUseId'];
$flaglb=$_GET['flaglb'];
$flagzx=$_GET['flagzx'];
$flaglp=$_GET['flaglp'];
$cityall_id=$_GET['areaId'];
$citypid=citypid($cityall_id);
//$city_id = isset($_GET['city_id']) ? intval($_GET['city_id']) : 0;
?>
<?php

//echo $areaId;exit;
$key=$_GET['key'];
$pid=9;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$sql="WHERE `pid`='{$pid}' and `mapst`='1' ";

if($key!=""){
	$sql.=" and `title` like '%{$key}%'";
	}
if($citypid==0){
if($cityall_id!=""){
	$sql.=" and `cityall_id` = '{$cityall_id}'";
	}
}else{
if($cityall_id!=""){
	$sql.=" and `city_id` = '{$cityall_id}'";
	}
	}
if($flagjw!=""){
	$sql.=" and `flagjw` like '%{$flagjw}%'";
	}
if($flaghx!=""){
	$sql.=" and `flaghx` like '%{$flaghx}%'";
	}
if($flagts!=""){
	$sql.=" and `flagts` like '%{$flagts}%'";
	}
if($flaglb!=""){
	$sql.=" and `flaglb` like '%{$flaglb}%'";
	}
if($flagzx!=""){
	$sql.=" and `flagzx` like '%{$flagzx}%'";
	}
if($flaglp!=""){
	$sql.=" and `flaglp` like '%{$flaglp}%'";
	}
//print_r($_GET);
//echo $page;
if($page==0){
	$page=1;
	}

$page_num =100;
$offset = ($page-1)*$page_num;
$rsc = $mysql->query("select count(*) as count from `web_content` {$sql}");// WHERE `adminid`='{$_SESSION['admin_id']}'
//echo "select count(*) as count from `oa_client` {$sql}";
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/$page_num);
$row = $mysql->query("select * from `web_content` {$sql} order by px desc limit $offset,$page_num");// WHERE `adminid`='{$_SESSION['admin_id']}'
//echo "select * from `web_content` {$sql} order by px desc limit $offset,$page_num";
if($result["total"]==0){
	echo "<li align=center style='padding:10px;font-size:15px;border-bottom:dashed #ccc 1px'><h1>很抱歉,没有找到您搜索的结果。</h1></li>";
	}else{
		foreach($row as $list){
			$url='show.php?lpid='.$list['id'];
?>
<?php 
$dataa = $list['id']; $num += count($dataa);?>
  <?php
		}
		}
  ?>

  
  {"page":{"rowCount":<?php echo $num;?>,"page":1,"next":2,"last":6,"pageSize":10,"pageCount":10,"first":0,"previous":0},"items":[
  
<?php
$key=$_GET['key'];
$pid=9;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$sql="WHERE `pid`='{$pid}' and `mapst`='1' ";

if($key!=""){
	$sql.=" and `title` like '%{$key}%'";
	}
if($citypid==0){
if($cityall_id!=""){
	$sql.=" and `cityall_id` = '{$cityall_id}'";
	}
}else{
if($cityall_id!=""){
	$sql.=" and `city_id` = '{$cityall_id}'";
	}
	}
if($flagjw!=""){
	$sql.=" and `flagjw` like '%{$flagjw}%'";
	}
if($flaghx!=""){
	$sql.=" and `flaghx` like '%{$flaghx}%'";
	}
if($flagts!=""){
	$sql.=" and `flagts` like '%{$flagts}%'";
	}
if($flaglb!=""){
	$sql.=" and `flaglb` like '%{$flaglb}%'";
	}
if($flagzx!=""){
	$sql.=" and `flagzx` like '%{$flagzx}%'";
	}
if($flaglp!=""){
	$sql.=" and `flaglp` like '%{$flaglp}%'";
	}
//print_r($_GET);
//echo $page;
if($page==0){
	$page=1;
	}

$page_num =100;
$offset = ($page-1)*$page_num;
$rsc = $mysql->query("select count(*) as count from `web_content` {$sql}");// WHERE `adminid`='{$_SESSION['admin_id']}'
//echo "select count(*) as count from `oa_client` {$sql}";
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/$page_num);
$row = $mysql->query("select * from `web_content` {$sql} order by id desc limit $offset,$page_num");// WHERE `adminid`='{$_SESSION['admin_id']}'
//echo "select * from `oa_client` {$sql} order by id desc limit $offset,$page_num";
if($result["total"]==0){
	echo "<li align=center style='padding:10px;font-size:15px;border-bottom:dashed #ccc 1px'><h1>很抱歉,没有找到您搜索的结果。</h1></li>";
	}else{
		foreach($row as $key=>$list){
			$url='show.php?lpid='.$list['id'];
			$dataaa = $list['id'];$numm += count($dataaa);
?>
{"mapY":<?php if($list['zby']==""){ echo "20.006282";}else{ echo $list['zby'];}?>,"mapX":<?php if($list['zbx']==""){ echo "110.196169";}else{ echo $list['zbx'];}?>,"model":[{"roomCh":"二","count":<?php echo $key+1;?>,"room":2}],"phone":"18789063587","price":{"houseUse":"<?php echo cityname($list['city_id']);?>","buildingTypeId":4,"price":<?php echo $list['jj_price'];?>.0,"priceUnitOther":"均价","deputy":1,"priceType":1,"priceSearch":<?php echo $list['qj_price'];?>.0,"showPrice":1,"buildingType":"高层","rentSale":3,"showSumPrice":0,"priceUnit":"元/㎡","totalPriceSearch":-1.0,"houseUseId":6},"urlShort":"http://jh.fccs.com/newhouse/3174226/","floor":"<?php echo cityname($list['city_id']);?><?php echo $list['title'];?>","issueId":<?php echo $list['id'];?>,"sellSchedule":2,"appraiseCount":0,"photoCount":0,"modelCount":0,"photo":"http://100fangchan.com/Uploads/201709/59b64d2ebcd10.jpg_140x95","url":"http://jh.fccs.com/newhouse/3174226/index.shtml"}<?php if($numm==$num){}else{ echo ",";}?>
  <?php
		}
		}
  ?>




]}



