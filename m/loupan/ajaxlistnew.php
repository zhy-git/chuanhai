<?php
session_start();
include("../../conn/conn.php");
include("../function.php");
$key=$_POST['key'];
	(string)$flagjw = $_GET['flagjw'] ? $_GET['flagjw'] : '0';
(string)$flaghx = $_GET['flaghx'] ? $_GET['flaghx'] : '0';
(string)$flagts = $_GET['flagts'] ? $_GET['flagts'] : '0';
(string)$flagzx = $_GET['flagzx'] ? $_GET['flagzx'] : '0';

//$flagjw=$_POST['flagjw'];
$flaglp=$_POST['flaglp'];
$flaglb=$_POST['flaglb'];
//$flaghx=$_POST['flaghx'];
//$flagzx=$_POST['flagzx'];
//$flagts=$_POST['flagts'];
$flagwq=$_POST['flagwq'];
$hz_pp=$_POST['hz_pp'];
//$city_id=$_POST['city_id'];
$city_id = isset($_POST['cityid']) ? intval($_POST['cityid']) : 0;
$cityall_id = isset($_POST['cityall_id']) ? intval($_POST['cityall_id']) : 0;
if($city_id<>0){
	$cityall_id=cityallid($city_id);
	$cityname=cityname($city_id);
	}
	if($cityall_id){
		$citynameall=cityname($cityall_id);
		}

$key=$_POST['key'];
$pid=9;
$page = isset($_POST['page']) ? intval($_POST['page']) : 1;

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
if($flagjw!="0"){
	$sql.=" and `flagjw` like '%{$flagjw}%'";
	}
if($flaglp!=""){
	$sql.=" and `flaglp` like '%{$flaglp}%'";
	}
if($flaglb!=""){
	$sql.=" and `flaglb` like '%{$flaglb}%'";
	}
if($flaghx!="0"){
	$sql.=" and `flaghx` like '%{$flaghx}%'";
	}
if($flagzx!="0"){
	$sql.=" and `flagzx` like '%{$flagzx}%'";
	}
if($flagts!="0"){
	$sql.=" and `flagts` like '%{$flagts}%'";
	}
if($flagwq!=""){
	$sql.=" and `flagwq` like '%{$flagwq}%'";
	}
if($hz_pp!=""){
	$sql.=" and `hz_pp` like '%{$hz_pp}%'";
	}
//print_r($_POST);
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
//echo "select * from `web_content` {$sql} order by px desc limit $offset,$page_num";
$arr = array();
foreach($rowlist as $k=>$list){
			$url='/m/loupan/'.$list['id'].'.html';
	if($list['all_price']!=0){
		$price='<i style="font-size: .5rem!important;font-style: normal;">'.$list['all_price'].'</i>万/套';
	}else{
		
		if($list['jj_price']!=0){
			
		$price='<i style="font-size: .5rem!important;font-style: normal;">'.$list['jj_price'].'</i>元/㎡';
			}else{
				
		$price='<i style="font-size: .5rem!important;font-style: normal;">待定</i>';
				}
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
				if($list['fkfs']<>''){
		$fkfs=$list['fkfs'];
		}else{
			$fkfs='3天2晚看房免食宿';
			}
	//
		 echo '<li class="news"><div class="item-new"><a href="'.$url.'"><div class="img-area"><img src="/'.$list['img'].'" alt="'.$list['title'].'"></div><div class="des"><div class="pr"><h3>'.$list['title'].'</h3><div class="clear"></div></div><div class="tr" style="margin-top: 3px"><div class="red">'.$price.'</div><div class="place">'.cityname($list['cityall_id']).'-'.cityname($list['city_id']).'</div></div><div class="text"><p class="jd_text fl">'.$list['zlhx'].'</p><div class="clear"></div></div><div class="clear"></div></div><div class="clear"></div><div class="i_lp_tag"><i class="time">'.rand(1,24).'小时前有人咨询</i>'.loupanflagtsi2($list['flagts'],6,3).'<div class="clear"></div></div><div class="clear"></div></a><div class="i_lp_hui"><i>惠</i><span>'.$fkfs.'</span><a href="javascript:;" class="Discounts-hqrh" onclick="openwid4(\'抢好房\',\''.$fkfs.'\',\''.$list['title'].'移动_列表抢好房\',2);">抢好房</a></div><div class="clear"></div><a href="tel:'.telsee($list['loupan_tel']).'"><div class="tel-phone"><img src="/public/static/phone/img/icons/tel.gif" alt=""></div></a></div></li>';
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
/*$jsonobj = json_encode($arr);
echo $jsonobj;*/
exit;