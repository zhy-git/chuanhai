<?php
session_start();
include("../../conn/conn.php");
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

$type=filekzm($_FILES["Filedata"]["name"]);
if ((($type == ".gif")
|| ($type == ".png")
|| ($type == ".jpeg")
|| ($type == ".jpg")
|| ($type == ".bmp"))
&& ($_FILES["Filedata"]["size"] < 200000000000))
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
		$pic_path = "../../upload/pic/". $pics;
		$pic_img = "upload/pic/". $pics;
      move_uploaded_file($_FILES["Filedata"]["tmp_name"],$pic_path);
	  
	  $mysql->query("insert into `web_pic`(
		`luopan_id`,
		`pid_flag`,
		`pic_name`,
		`pic_img`
		) values (
		'".getPost("select")."',
		'".getPost("select2")."',
		'".$_FILES["Filedata"]["name"]."',
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

