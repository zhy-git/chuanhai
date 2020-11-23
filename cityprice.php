<?php
include("conn/conn.php");
header('Content-type:text/json'); 
$all=array();
$city=$_GET['id'];
$all['code']=200;
$all['msg']='成功';
$all['data']['categories']=array();
$all['data']['data']=array();
$all['data']['region']=array();


		
		$row1 = $mysql->query("select * from `web_city` where `id`='{$city}' limit 0,1");//limit 0,{$top}
		$row = $mysql->query("select * from `web_fjzs` where `city_id`='{$city}' order by addtime desc limit 0,6");//limit 0,{$top}
		foreach($row as $k=>$list){
			$all['data']['categories'][$k]="{$list['addtime']}";
			$all['data']['data'][$k]="{$list['price']}";
			$all['data']['region'][$k]="{$row1['0']['city_name']}";
		}
		//echo "select * from `web_fjzs` where `city_id`='{$city}' order by addtime asc ";
		//exit();
		echo json_encode($all);
		exit();
