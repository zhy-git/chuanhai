<?php
$rsconfig=$mysql->query("select * from `web_config` where `id`='1'");
$rsconfig=$rsconfig[0];
function get_srot($id = 0,$icon) {
	global $mysql;
	if($id<>0){
		$result=$mysql->query("SELECT * FROM `web_srot` WHERE `id` = '{$id}' order by `px` asc");
		if($result){//如果有子类
		  $str .=$result[0]['title'].$icon;
		  get_srot($result[0]['pid'],$icon);
		}
	}
    return $str; 
}
?>