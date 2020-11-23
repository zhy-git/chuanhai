<?php
session_start();
include("../conn/conn.php");
$home=$_SERVER['HTTP_HOST'];

$path = "/upload/pic/";

$extArr = array("jpg", "png", "gif");

	$name = $_POST['Filename'];
	$lpid = $_POST['select'];
	
	$image_name = time().rand(100,999).".".$ext;
	$tmp = $_FILES['photoimg']['tmp_name'];
	if(move_uploaded_file($tmp, $path.$image_name)){
		echo '<img src="'.$path.$image_name.'"  class="preview">';
	}else{
		echo '上传出错了！';
	}
	exit;




function extend($file_name){
	$extend = pathinfo($file_name);
	$extend = strtolower($extend["extension"]);
	return $extend;
}


$action = $_GET['act'];
if($action=='delimg'||$action=='delimg1'||$action=='delimg2'||$action=='delimg3'||$action=='delimg4'||$action=='delimg5'||$action=='delimg6'){
	$filename = $_POST['imagename'];
	if(!empty($filename)){
		unlink('../../upload/info/'.$filename);
		echo '1';
	}else{
		echo '删除失败.';
	}
}else{
	$picname = $_FILES['mypic']['name'];
	$picsize = $_FILES['mypic']['size'];
	if ($picname != "") {
		if ($picsize > 1024000) {
			echo '图片大小不能超过1M';
			exit;
		}
		$type = strstr($picname, '.');
		if ($type != ".gif" && $type != ".jpg" && $type != ".png") {
			echo '图片格式不对！';
			exit;
		}
		$rand = rand(100, 999);
		$pics = date("YmdHis") . $rand . $type;
		//上传路径
		$pic_path = "../../upload/info/". $pics;
		move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
	}
	$size = round($picsize/1024,2);
	$image_size = getimagesize($pic_path);
	$arr = array(
		'name'=>$picname,
		'pic'=>$pics,
		'size'=>$size,
		'width'=>$image_size[0],
		'height'=>$image_size[1]
	);
	//echo json_encode($arr);
}
?>