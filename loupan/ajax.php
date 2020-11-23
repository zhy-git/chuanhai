<?php
header('Content-type:application/json');
include("../conn/conn.php");
$data=array();
$fl=$_POST['fl'];
$type_id=$_POST['type_id'];
$album_id=$_POST['album_id'];
$hid=$_POST['hid'];
if($fl==1){
		$data['code']=200;
		$data['msg']='成功';
		$row = $mysql->query("select * from `web_pic` where `luopan_id`='$hid' and `pid_flag`='xc1' and `pid_hx`='{$type_id}'");//
		//print_r($row);
		foreach($row as $k=>$list){
			    $data['data'][$k]['id']="{$list['id']}";
			    $data['data'][$k]['del']='1';
			    $data['data'][$k]['sort']='0';
			    $data['data'][$k]['create_at']='1550029578';
			    $data['data'][$k]['update_at']='1550029578';
			    $data['data'][$k]['title']="{$list['gj']}";
			    $data['data'][$k]['hid']="{$hid}";
			    $data['data'][$k]['type_id']="{$type_id}";
			    $data['data'][$k]['img']="{$list['pic_img']}";
			    $data['data'][$k]['hot']='1';
			    $data['data'][$k]['state']='1';
			    $data['data'][$k]['area']="{$list['mj']}";
			    $data['data'][$k]['indoor_info']="{$list['pic_name']}";
		}
		$jsonobj = json_encode($data);
		echo $jsonobj;
		exit;
		
	}

if($fl==2){
		$data['code']=200;
		$data['msg']='成功';
		$flag=$mysql->query("select * from `web_flag` where `id`={$album_id}");
	//	print_r($flag);
		$row = $mysql->query("select * from `web_pic` where `luopan_id`='$hid' and `pid_flag`='{$flag[0]['flag_bm']}'");//
		//print_r($row);
		foreach($row as $k=>$list){
			    $data['data'][$k]['id']="{$list['id']}";
			    $data['data'][$k]['del']='1';
			    $data['data'][$k]['sort']='0';
			    $data['data'][$k]['create_at']='1550029578';
			    $data['data'][$k]['update_at']='1550029578';
			    $data['data'][$k]['title']="{$list['pic_name']}";
			    $data['data'][$k]['hid']="{$hid}";
			    $data['data'][$k]['album_id']="{$album_id}";
			    $data['data'][$k]['img']="{$list['pic_img']}";
			    $data['data'][$k]['hot']='1';
			    $data['data'][$k]['state']='1';
		}
		$jsonobj = json_encode($data);
		echo $jsonobj;
		exit;
		
	}
	