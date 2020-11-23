<?php
session_start();
include("../conn/conn.php");
// 注意：使用组件上传，不可以使用 $_FILES["Filedata"]["type"] 来判断文件类型
mb_http_input("utf-8");
mb_http_output("utf-8");

//---------------------------------------------------------------------------------------------
//组件设置a.MD5File为2，3时 的实例代码

if(getGet('access2008_cmd')=='2'){ // 提交MD5验证后的文件信息进行验证
	//getGet("access2008_File_name") 	'文件名
	//getGet("access2008_File_size")	'文件大小，单位字节
	//getGet("access2008_File_type")	'文件类型 例如.gif .png
	//getGet("access2008_File_md5")		'文件的MD5签名
	
	die('0'); //返回命令  0 = 开始上传文件， 2 = 不上传文件，前台直接显示上传完成
}
if(getGet('access2008_cmd')=='3'){ //提交文件信息进行验证
	//getGet("access2008_File_name") 	'文件名
	//getGet("access2008_File_size")	'文件大小，单位字节
	//getGet("access2008_File_type")	'文件类型 例如.gif .png
	
	die('1'); //返回命令 0 = 开始上传文件,1 = 提交MD5验证后的文件信息进行验证, 2 = 不上传文件，前台直接显示上传完成
}
//---------------------------------------------------------------------------------------------
//-----水印
/*加水印*/
function img_water_mark($srcImg, $waterImg, $savepath=null, $savename=null, $positon=5, $alpha=30)
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
   
   // imagecopymerge($srcImgObj, $waterImgObj, $x, $y, 0, 0, $waterinfo[0], $waterinfo[1], $alpha);
	imagecopymerge_alpha($srcImgObj, $waterImgObj, $x, $y, 0, 0, $waterinfo[0], $waterinfo[1], $alpha);
    switch ($srcinfo[2]) {
    case 1: imagegif($srcImgObj, $savefile); break;
    case 2: imagejpeg($srcImgObj, $savefile); break;
    case 3: imagepng($srcImgObj, $savefile); break;
    default: return -5; //保存失败
    }
	
	imagepng($srcImgObj, $savefile);
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

function imagecopymerge_alpha($dst_im, $src_im, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $pct){
        $opacity=$pct;
        // getting the watermark width
        $w = imagesx($src_im);
        // getting the watermark height
        $h = imagesy($src_im);
        
        // creating a cut resource
        $cut = imagecreatetruecolor($src_w, $src_h);
        // copying that section of the background to the cut
        imagecopy($cut, $dst_im, 0, 0, $dst_x, $dst_y, $src_w, $src_h);
        // inverting the opacity
        $opacity = 100 - $opacity;
        // placing the watermark now
        imagecopy($cut, $src_im, 0, 0, $src_x, $src_y, $src_w, $src_h);
        imagecopymerge($dst_im, $cut, $dst_x, $dst_y, $src_x, $src_y, $src_w, $src_h, $opacity);
}
/*加水印*/
//-----
$type=filekzm($_FILES["Filedata"]["name"]);
if ((($type == ".gif")
|| ($type == ".png")
|| ($type == ".jpeg")
|| ($type == ".jpg")
|| ($type == ".JPG")
|| ($type == ".PNG")
|| ($type == ".GIF")
|| ($type == ".bmp"))
&& ($_FILES["Filedata"]["size"] < 102400000))
  {
  if ($_FILES["Filedata"]["error"] > 0)
    {
    echo "返回错误: " . $_FILES["Filedata"]["error"] . "<br />";
    }
  else
    {
    //echo "上传的文件: " . $_FILES["Filedata"]["name"] . "<br />";
    //echo "文件类型: " . $type . "<br />";
   // echo "文件大小: " . ($_FILES["Filedata"]["size"] / 1024) . " Kb<br />";
   // echo "临时文件: " . $_FILES["Filedata"]["tmp_name"] . "<br />";

    if (file_exists( $_FILES["Filedata"]["name"]))
      {
     // echo $_FILES["Filedata"]["name"] . " already exists. ";
      }
    else
      {
		$rand = rand(100, 999);
		$pics = date("YmdHis") . $rand . $type;
		$pic_path = "../upload/pic/". $pics;
		$pic_img = "upload/pic/". $pics;
      	move_uploaded_file($_FILES["Filedata"]["tmp_name"],$pic_path);
	  	/*加水印*/
		//		img_water_mark($pic_path, 'images/sylogo.png','','',5,50);
	  /*加水印*/
	  $filename=str_replace($type,"",$_FILES["Filedata"]["name"]);
	  $mysql->query("insert into `web_pic`(
		`luopan_id`,
		`pid_flag`,
		`pid_hx`,
		`pic_name`,
		`pic_img`
		) values (
		'".getPost("select")."',
		'".getPost("select2")."',
		'".getPost("select3")."',
		'".$filename."',
		'{$pic_img}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			echo "<br />上传成功！";
			exit();
			}
			
      //echo "Stored in: " . $_FILES["Filedata"]["name"]."<br />";
	 // echo "MD5效验:".getGet("access2008_File_md5")."<br />";
	 // echo "<br />上传成功！你选择的是<font color='#ff0000'>".getPost("select")."</font>--<font color='#0000ff'>".getPost("select2")."</font>";
      }
    }
  }
else
  {
  echo "上传失败，请检查文件类型和文件大小是否符合标准<br />文件类型：".$type.'<br />文件大小:'.($_FILES["Filedata"]["size"] / 1024) . " Kb";
  }
  
function filekzm($a)
{
	$c=strrchr($a,'.');
	if($c)
	{
		return $c;
	}else{
		return '';
	}
}

function getGet($v)// 获取GET
{
  if(isset($_GET[$v]))
  {
	 return $_GET[$v];
  }else{
	 return '';
  }
}

function getPost($v)// 获取POST
{
  if(isset($_POST[$v]))
  {
	  return $_POST[$v];
  }else{
	  return '';
  }
}
?>

