<?php
include("../conn/conn.php");
header('Content-type:text/json'); 
function cityname($city_id) {
	global $mysql;
    $cityname = $mysql->query("select * from `web_city` where `id`='{$city_id}' limit 0,1");
    return $cityname[0]['city_name'];
}
$all=array();
$title=$_POST['name'];
if($title<>''){
		$row = $mysql->query("select * from `web_content` where `pid`='9' and `title` like '%{$title}%' order by px desc limit 0,10");// and `city_id`='57'
		if($row[0]<>''){
		foreach($row as $k=>$list){
			$all[$k]['zonename']="{$list['title']}";
			$all[$k]['zonecode']="/loupan/{$list['id']}.html";
		}
		echo json_encode($all);
		exit();
		}else{
			$all='null';
			echo json_encode($all);
			exit();
			}
}else{
	$all='null';
	echo json_encode($all);
	exit();
	}
