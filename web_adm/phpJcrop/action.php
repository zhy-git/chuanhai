<?php
error_reporting(0);
$home=$_SERVER['HTTP_HOST'];
$action = $_GET['act'];
$fl = $_GET['fl'];

//---------------------------------------------------------------------------------------------
//-----水印
/*加水印*/
function img_water_mark($srcImg, $waterImg, $savepath=null, $savename=null, $positon=5, $alpha=100)
{
    $temp = pathinfo($srcImg);
    $name = $temp['basename'];
    $path = $temp['dirname'];
    $exte = $temp['extension'];
    $savename = $savename ? $savename : $name;
    $savepath = $savepath ? $savepath : $path;
    $savefile = $savepath .'/'. $savename;
    $srcinfo = @getimagesize($srcImg);
    if (!$srcinfo) {
        return -1; //原文件不存在
    }
    $waterinfo = @getimagesize($waterImg);
    if (!$waterinfo) {
        return -2; //水印图片不存在
    }
    $srcImgObj = image_create_from_ext($srcImg);
    if (!$srcImgObj) {
        return -3; //原文件图像对象建立失败
    }
    $waterImgObj = image_create_from_ext($waterImg);
    if (!$waterImgObj) {
        return -4; //水印文件图像对象建立失败
    }
    switch ($positon) {
    //1顶部居左
    case 1: $x=$y=0; break;
    //2顶部居右
    case 2: $x = $srcinfo[0]-$waterinfo[0]; $y = 0; break;
    //3居中
    case 3: $x = ($srcinfo[0]-$waterinfo[0])/2; $y = ($srcinfo[1]-$waterinfo[1])/2; break;
    //4底部居左
    case 4: $x = 0; $y = $srcinfo[1]-$waterinfo[1]; break;
    //5底部居右
    case 5: $x = $srcinfo[0]-$waterinfo[0]; $y = $srcinfo[1]-$waterinfo[1]; break;
    default: $x=$y=0;
    }
    imagecopy($srcImgObj, $waterImgObj, $x, $y, 0, 0, $waterinfo[0], $waterinfo[1]);
    //imagecopymerge($srcImgObj, $waterImgObj, $x, $y, 0, 0, $waterinfo[0], $waterinfo[1], $alpha);
    switch ($srcinfo[2]) {
    case 1: imagegif($srcImgObj, $savefile); break;
    case 2: imagejpeg($srcImgObj, $savefile); break;
    case 3: imagepng($srcImgObj, $savefile); break;
    default: return -5; //保存失败
    }
    imagedestroy($srcImgObj);
    imagedestroy($waterImgObj);
    return $savefile;
}
 
 
function image_create_from_ext($imgfile)
{
    $info = getimagesize($imgfile);
    $im = null;
    switch ($info[2]) {
    case 1: $im=imagecreatefromgif($imgfile); break;
    case 2: $im=imagecreatefromjpeg($imgfile); break;
    case 3: $im=imagecreatefrompng($imgfile); break;
    }
    return $im;
}
/*加水印*/

if($action=='delimg'||$action=='delimg1'||$action=='delimg2'||$action=='delimg3'||$action=='delimg4'||$action=='delimg5'||$action=='delimg6'||$action=='delimg8'){
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
		if ($picsize > 2024000) {
			echo '图片大小不能超过2M';
			exit;
		}
		$pics = explode('.' , $picname);
		$num = count($pics);
		$type=".".$pics[$num-1]; 
		//$type = strstr($picname, '.');
		if ($type != ".gif" && $type != ".jpg" && $type != ".png" && $type != ".GIF" && $type != ".JPG" && $type != ".PNG" && $type != ".jepg" && $type != ".JEPG") {
			echo '图片格式不对！';
			exit;
		}
		$rand = rand(100, 999);
		$pics = date("YmdHis") . $rand . $type;
		//上传路径
		if($fl=='sy'){
			$pic_path = "../../upload/pic/". $pics;
			//$pics = "upload/pic/". $pics;
		}else{
			$pic_path = "../../upload/info/". $pics;
			}
		move_uploaded_file($_FILES['mypic']['tmp_name'], $pic_path);
	}
	if($fl=='sy'){		
		/*加水印*/
		//img_water_mark($pic_path, '../images/sylolgo.png','','',5,100);
	  /*加水印*/
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
	echo json_encode($arr);
}
?>