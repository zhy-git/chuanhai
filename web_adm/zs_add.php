<?php
session_start();
include("../conn/conn.php");
require('function.php');
include("system.php");

$pid=$_GET['pid'];
$row=$mysql->query("SELECT * FROM `web_srot` WHERE `id`='{$pid}'");
//print_r($row);
$info=$row[0];
 if($info==false)
  {
  //  echo "已经出错!";
//	exit;
   }
  else
  {
	  $p_path=$info['path'];
	  $p_title=$info['title'];
  }
if($_GET['id']<>""){
	$rows=$mysql->query("SELECT * FROM `web_fjzs` WHERE `id`='{$_GET['id']}'");
	$infos=$rows[0];
	 if($infos==false)
	  {
		echo "已经出错!";
		exit;
	   }
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>新闻信息添加/修改＿网站管理系统</title>
<meta name="keywords" content="###">
<meta name="Author" content="FQS" />
<meta http-equiv="X-UA-compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<link type="text/css" rel="stylesheet" href="css/publichn.css">
<link type="text/css" rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/superslide.2.1.js"></script>
<link rel="stylesheet" type="text/css" href="css/content.css"  />
<link rel="stylesheet" type="text/css" href="css/public.css"  />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/Public.js"></script>
<script type="text/javascript" src="js/winpop.js"></script>
<script type="text/javascript" src="js/check.js"></script>
<script type="text/javascript" src="js/My97DatePicker/WdatePicker.js"></script>
<!--up-->
<link rel="stylesheet" type="text/css" href="phpJcrop/css/jquery.Jcrop.css"  />
<script type="text/javascript" src="phpJcrop/js/jquery.form.js"></script>
<!--up-->

<!--editor g-->
	<link rel="stylesheet" href="../editor/themes/default/default.css" />
	<link rel="stylesheet" href="../editor/plugins/code/prettify.css" />
	<script charset="utf-8" src="../editor/kindeditor.js"></script>
	<script charset="utf-8" src="../editor/lang/zh_CN.js"></script>
	<script charset="utf-8" src="../editor/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="edit_content"]', {
				cssPath : '../editor/plugins/code/prettify.css',
				uploadJson : '../editor/php/upload_json.php',
				fileManagerJson : '../editor/php/file_manager_json.php',
				allowFileManager : true,
				afterBlur: function(){this.sync();},
				afterCreate : function() {
					var self = this;
					K.ctrl(document, 13, function() {
						self.sync();
						K('form[name=myForm]')[0].submit();
					});
					K.ctrl(self.edit.doc, 13, function() {
						self.sync();
						K('form[name=myForm]')[0].submit();
					});
				}
			});
			prettyPrint();
		});
	</script>
<!--editor e-->
<script>
$(document).ready(function() {
	var $client = $('#client');
	$('.submit').click(function() {
		var 
			edit_content = $client.find('#edit_content').eq(0).val();
		//if (!tcheck(edit_content,'','内容不能为空')) { return false; }
		wintq('正在处理，请稍后...',4,10000,0,'');
		$('#myform').submit();
	});
});
</script>
<script>
	$(document).ready(function(){
		var bar = $('.bar');
		var percent = $('.percent');
		var showimg = $('#showimg');
		var progress = $(".progress");
		var files = $(".files");
		var btn = $(".btn span");
		$("#fileupload").wrap("<form id='myupload' action='phpJcrop/action.php' method='post' enctype='multipart/form-data'></form>");
		$("#fileupload").change(function(){  //选择文件
			$("#myupload").ajaxSubmit({
				dataType:  'json',	//数据格式为json 
				beforeSend: function() {	//开始上传 
					showimg.empty();	//清空显示的图片
					//progress.show();	//显示进度条
					progress.show().css("display","block");	//显示进度条
					var percentVal = '0%';	//开始进度为0%
					bar.width(percentVal);	//进度条的宽度
					percent.html(percentVal);	//显示进度为0% 
					btn.html("上传中...");	//上传按钮显示上传中
				},
				uploadProgress: function(event, position, total, percentComplete) {
					var percentVal = percentComplete + '%';	//获得进度
					bar.width(percentVal);	//上传进度条宽度变宽
					percent.html(percentVal);	//显示上传进度百分比
				},
				success: function(data) {	//成功
					//获得后台返回的json数据，显示文件名，大小，以及删除按钮
					files.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg' rel='"+data.pic+"'>删除</span>");
					//显示上传后的图片
					var img = "upload/info/"+data.pic;
					//判断上传图片的大小 然后设置图片的高与宽的固定宽
//					if (data.width>240 && data.height<240){
//						showimg.html("<img src='"+img+"' id='cropbox' height='240' />");
//					}else if(data.width<240 && data.height>240){
//						showimg.html("<img src='"+img+"' id='cropbox' width='240' />");
//					}else if(data.width<240 && data.height<240){
//						showimg.html("<img src='"+img+"' id='cropbox' width='240' height='240' />");
//					}else{
						showimg.html("<img src='../"+img+"' id='cropbox'  style='height:120px;' />");
//					}
					//传给php页面，进行保存的图片值
					$("#src").val(img);
					//截取图片的js
					
					btn.html("上传图片");	//上传按钮还原
				},
				error:function(xhr){	//上传失败
					btn.html("上传失败");
					bar.width('0')
					files.html(xhr.responseText);	//返回失败信息
				}
			});
		});
		
		$(".delimg").live('click',function(){
			var pic = $(this).attr("rel");
			$.post("phpJcrop/action.php?act=delimg",{imagename:pic},function(msg){
				if(msg==1){
					files.html("删除成功.");
					showimg.empty();	//清空图片
					progress.hide();	//隐藏进度条 
				}else{
					alert(msg);
				}
			});
		});
		
	});
	

	
	function checkCoords(){
		if (parseInt($('#w').val())) return true;
		alert('Please select a crop region then press submit.');
		return false;
	};
</script>
</head>
<body>
<div class="nav_guide">当前位置：<?php echo get_srot($p_pid,' &gt; ').$p_title;?>
<?php
if($_GET['id']<>""){echo '&gt; 修改信息';}else{echo '&gt; 添加信息';}
?>
</div>
<div class="content">
  <form action="submit_save.php?action=zs_add" method="post" name="myform" id="myform">
    <div class="addcust" id="client">
      <ul class="addcust_ul c">
        <li>
          <p class="lie1">
            <label>区域：</label>
           	<select name="city_id" class="select" style=" height:34px; width:85px;" id="city_id">
          			 <?php
					  $row=$mysql->query("select * from `web_city` where `pid`='41' and `city_st`='1' order by `city_px` asc");
					  foreach($row as $list){
					  ?>
                    <option value="<?php echo $list['id'];?>" alt="1" id="level" <?php if($infos['city_id']==$list['id']){ echo 'selected="selected"';}?>><?php echo $list['city_name'];?></option>
                      <?php
					  }
					  ?>
                   </select>
          </p>
        </li>
        
         <li>
          <p class="lie1">
            <label style="width:100px; left:-20px;">时间：</label>
            <input type="text" name="addtime" onFocus="WdatePicker({startDate:'%y-%M',dateFmt:'yyyy-MM',alwaysUseStartDate:true})" value="<?php echo $infos['addtime'];?>"> 
          </p>
         
        </li>
         
        <li>
          <p class="lie1">
            <label>新房价格：</label>
            <input type="text" name="price" value="<?php echo $infos['price'];?>" style="width:100px;">
          </p>
          <p class="lie1">
            <label>二手价格：</label>
            <input type="text" name="price2" value="<?php echo $infos['price2'];?>" style="width:100px;">
          </p>
        </li>
      </ul>
      <div class="addcust_btn">
	<input type="hidden" name="edit_id" value="<?php echo $infos['id'];?>" >
	<input type="hidden" name="p_pid" value="<?php echo $pid;?>" >
	<input type="hidden" name="p_path" value="<?php echo $p_path;?>" >
        <input type="submit" value="提交" class="submit" >
        <input type="reset" value="重置">
      </div>
    </div>
  </form>
</div>
<script type="text/javascript" src="js/class.js"></script> 
<!--[if lt IE 9]><script type="text/javascript" src="js/forie.js"></script><![endif]-->
</body>
</html>