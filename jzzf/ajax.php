<?php
require("../conn/conn.php");
function cityname($city_id) {
	global $mysql;
    $cityname = $mysql->query("select * from `web_city` where `id`='{$city_id}' limit 0,1");
    return $cityname[0]['city_name'];
}
$city=$_GET['city'];
$lexing=$_GET['lexing'];

$sql="where `pid`='9' ";

if($city<>""){
	$rowcity=$mysql->query("SELECT * FROM `web_city` WHERE `city_name`='{$city}'");
	$sql.=" and `city_id`='{$rowcity[0]['id']}'";
}
if($lexing<>""){
	$rowcity=$mysql->query("SELECT * FROM `web_flag` WHERE `flag_fl`='6' and `flag`='{$lexing}'");
	$sql.=" and `flagts` like '%{$rowcity[0]['flag_bm']}%'";
	
}
if($_GET['area']<>""){
	$area=explode(',',$_GET['area']);
	
}
if($_GET['price']<>""){
	$price=explode(',',$_GET['price']);
	$sql.=" and `jj_price`>='{$price[0]}' and `jj_price`<='{$price[1]}'";
}
$result["data"]="";
$num=0;
$row = $mysql->query("select * from `web_content` {$sql} order by px desc limit 0,50");//and `flag` like '%t1%' and `flagts` like '%ts6%' and `flag` like '%h1%'
//echo "select * from `web_content` {$sql} order by px desc limit 0,16";
	foreach($row as $k=>$list){
	$result["data"].='<li><a href="../loupan/show.php?lpid='.$list['id'].'" target="_blank"><div class="pic"><img src="../'.$list['img'].'" style=" width:205px; height:180px;"></div><div class="wen"><p class="tit">'.$list['title'].'<span>['.cityname($list['city_id']).']</span></p><p class="ms">均价：<i>'.$list['jj_price'].'</i></p><p class="dd"><em></em>'.$list['xmdz'].'</p></div></a></li>';
	$num=$k;
	}

//{"data":"","count":15,"page":"<li>0</li><li>1</li><li>2</li><li>3</li>"}
//$result["data"]="select * from `web_content` {$sql} order by px desc limit 0,16";
if($num==0){
	$result["count"]=$num;
	}else{
	$result["count"]=$num+1;
		}
$dd=ceil($result["count"]/4);
for ($i=0;$i<$dd;$i++){
	$dd2.='<li>'.$i.'</li>';
	}
$result["page"]=$dd2;
//$result["page"]="<li>0</li><li>1</li><li>2</li><li>3</li>";
echo json_encode($result);  
