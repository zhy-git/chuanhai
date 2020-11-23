<?php
session_start();
header('Content-type:application/json');
include("../../conn/conn.php");
include("../function.php");
$key=$_GET['key'];
$flagjw=$_GET['flagjw'];
$flaglp=$_GET['flaglp'];
$flaglb=$_GET['flaglb'];
$flaghx=$_GET['flaghx'];
$flagzx=$_GET['flagzx'];
$flagts=$_GET['flagts'];
$flagwq=$_GET['flagwq'];
$hz_pp=$_GET['hz_pp'];
//$city_id=$_GET['city_id'];
$city_id = isset($_GET['city_id']) ? intval($_GET['city_id']) : 0;
$cityall_id = isset($_GET['cityall_id']) ? intval($_GET['cityall_id']) : 0;
if($city_id<>0){
	$cityall_id=cityallid($city_id);
	$cityname=cityname($city_id);
	}
	if($cityall_id){
		$citynameall=cityname($cityall_id);
		}

$key=$_GET['key'];
$pid=9;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$sql="WHERE `pid`='{$pid}' ";

if($key!=""){
	$sql.=" and `title` like '%{$key}%'";
	}
if($cityall_id!=""){
	$sql.=" and `cityall_id` = '{$cityall_id}'";
	}
if($city_id!=""){
	$sql.=" and `city_id` = '{$city_id}'";
	}
if($flagjw!=""){
	$sql.=" and `flagjw` like '%{$flagjw}%'";
	}
if($flaglp!=""){
	$sql.=" and `flaglp` like '%{$flaglp}%'";
	}
if($flaglb!=""){
	$sql.=" and `flaglb` like '%{$flaglb}%'";
	}
if($flaghx!=""){
	$sql.=" and `flaghx` like '%{$flaghx}%'";
	}
if($flagzx!=""){
	$sql.=" and `flagzx` like '%{$flagzx}%'";
	}
if($flagts!=""){
	$sql.=" and `flagts` like '%{$flagts}%'";
	}
if($flagwq!=""){
	$sql.=" and `flagwq` like '%{$flagwq}%'";
	}
if($hz_pp!=""){
	$sql.=" and `hz_pp` like '%{$hz_pp}%'";
	}
//print_r($_GET);
//echo $page;
if($page==0){
	$page=1;
	}

$page_num =10;
$offset = ($page-1)*$page_num;
$rsc = $mysql->query("select count(*) as count from `web_content` {$sql}");
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/$page_num);
$rowlist = $mysql->query("select * from `web_content` {$sql} order by px desc limit $offset,$page_num");
$arr = array();
foreach($rowlist as $k=>$list){
	$url='show.php?lpid='.$list['id'];
	if($list['all_price']!=0){
		$price=''.$list['all_price'].'万/套';
		$dw='总价：';
	}else{
		
		$dw='均价：';
		if($list['jj_price']!=0){$price=''.$list['jj_price'].'元/㎡';}else{$price='<FONT class=font_01>待定</FONT>';}
		}
		$flagztz='';
		$rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='8' and `flag_st`='1' order by `flag_px` asc ");
		foreach($rowflag as $listflag){
			if(preg_match("#".$listflag['flag_bm']."#", $list['ztz'])){
				$status=$listflag['flag'];
			}
		}
	
	$type=loupanflagts86($list['flagts'],6);
	if($list['src7']<>''){
		$video_thumb=1;
		}else{
			$video_thumb='';
			}
	//
		 $arr[$k]['itemid']=(int)$list['id'];
		 $arr[$k]['title']=$list['title'];
		 $arr[$k]['thumb']=$site.$list['img'];
		 $arr[$k]['hits']=(int)$list['cilck'];
		 $arr[$k]['address']=$list['xmdz'];
		 $arr[$k]['price']=$price;
		 $arr[$k]['status']=$status;
		 $arr[$k]['type']=$type;
		 $arr[$k]['url']=$url;
		 $arr[$k]['dw']="均价：";
		 $arr[$k]['yh_news']="1111";
		 $arr[$k]['yhurl']=$url;
		 $arr[$k]['tgbm']=(int)$list['esfcx'];
		 $arr[$k]['video_thumb']=$video_thumb;
	//
	/*	 $arr[$k]['itemid']=8350;		
		 $arr[$k]['title']="阳光椰风苑";	
		 $arr[$k]['thumb']="http:\/\/cdn.lou86.com\/public\/uploads\/2018-06\/08\/05c61ba1dfa4415df54690b7c9b1e69d.jpg";	
		 $arr[$k]['hits']=660;
		 $arr[$k]['address']="定安县塔岭新区见龙大道";
		 $arr[$k]['price']="10600元\/㎡";
		 $arr[$k]['status']="在售";		
		 $arr[$k]['type']="<span class=\"tag-1\">养老居所<\/span><span class=\"tag-2\">高性价比<\/span><span class=\"tag-3\">普通住宅<\/span>";
		 $arr[$k]['url']="http:\/\/m.lou86.com\/hk\/lp\/8350.html";
		 $arr[$k]['dw']="均价：";		
		 $arr[$k]['yh_news']="建面133-150平 均价10600元\/平现房 ";
		 $arr[$k]['yhurl']="\/hk\/lpyh\/8350-1.html";	
		 $arr[$k]['tgbm']=354;
		 $arr[$k]['video_thumb']="";*/
		
						
}
$jsonobj = json_encode($arr);
echo $jsonobj;
exit;