<?php
session_start();
include("../conn/conn.php");
require('function.php');
include("system.php");

$id=$_GET['id'];
$row=$mysql->query("SELECT * FROM `web_pic` WHERE `id`='{$id}'");
//print_r($row);
$info=$row[0];
 if($info==false)
  {
    echo "已经出错!";
	exit;
   }
  else
  {
	  $luopan_id=$info['luopan_id'];
	  $pid_flag=$info['pid_flag'];
	  $pic_name=$info['pic_name'];
	  $pic_img=$info['pic_img'];
	  $pid_hx=$info['pid_hx'];
	  $pic_px=$info['pic_px'];
	  $prices=$info['prices'];
	  $zt=$info['zt'];
	  $bh=$info['bh'];
	  $gj=$info['gj'];
	  $mj=$info['mj'];
	  $lx=$info['lx'];
	  $zx=$info['zx'];
	  $cx=$info['cx'];
	  $jx=$info['jx'];
	  
	$rowl=$mysql->query("SELECT * FROM `web_content` WHERE `id`='{$luopan_id}'");
	$pid=$rowl[0]['pid'];
  }
 
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>广告信息添加/修改＿网站管理系统</title>
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

<script>
$(document).ready(function() {
	var $client = $('#client');
	$('.submit').click(function() {
		var 
			edit_content = $client.find('#edit_content').eq(0).val();
		if (!tcheck(edit_content,'','内容不能为空')) { return false; }
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
		$("#fileupload").wrap("<form id='myupload' action='phpJcrop/action.php?fl=sy' method='post' enctype='multipart/form-data'></form>");
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
					var img = "upload/pic/"+data.pic;
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
		
		$("#ad_pid").change(function(){
		$("#wh").html($("#ad_pid").find("option:selected").attr("alt"));
		})  
	});
	

	
	function checkCoords(){
		if (parseInt($('#w').val())) return true;
		alert('Please select a crop region then press submit.');
		return false;
	};
	function show_xc(a){
	//alert(a);
	if(a=='xc1'){
		$("#select3").css('display','block'); 
		$(".hxd").css('display','block'); 
		}else{
			$("#select3").css('display','none');
			$(".hxd").css('display','none');
			}
	}
</script>
</head>
<body>
<div class="nav_guide">当前位置：<?php echo get_srot($p_pid,' &gt; ').$p_title;?>
<?php
if($_GET['id']<>""){echo '&gt; 修改信息';}else{echo '&gt; 添加信息';}
?>
</div>
<div class="content">
  <form action="submit_save.php?action=pic_add" method="post" name="myform" id="myform">
    <div class="addcust" id="client">
      <ul class="addcust_ul c">
        <li>
          <p class="lie1">
            <label>楼盘名称：</label>
            <?php
			$rowlp=$mysql->query("SELECT * FROM `web_content` WHERE `id`='{$luopan_id}'");
			echo $rowlp[0]['title'];
			?>
          </p>
        </li>
        <li>
          <p >
            <label>标题：</label>
            <input type="text" name="pic_name" value="<?php echo $pic_name;?>" >
          </p>
        </li>
        
        <li>
          <p >
            <label>分类：</label>
            	<select name="pid_flag" class="select" style=" height:34px; width:85px;" id="city_id" onChange="show_xc(this.value);">
          			 <?php
					  $rowflag=$mysql->query("select * from `web_flag` where `flag_fl`='9' and `flag_st`='1' order by `flag_px` asc");
					  foreach($rowflag as $listflag){
					  ?>
                    <option value="<?php echo $listflag['flag_bm'];?>" alt="1" id="level" <?php if($pid_flag==$listflag['flag_bm']){ echo 'selected="selected"';}?>><?php echo $listflag['flag'];?></option>
                      <?php
					  }
					  ?>
                   </select>
                   
                   
                  <select id="select3" name="select3" style=" width:85px; <?php if($pid_flag<>'xc1'){ echo ' display:none;';}?>">
                 <?php
                 $row = $mysql->query("select * from `web_flag` where `flag_fl`='41' order by `flag_px` asc");
                 foreach($row as $list){
                 ?>
                    <option value="<?php echo $list['id'];?>"<?php if($pid_hx==$list['id']){ echo 'selected="selected"';}?>><?php echo $list['flag'];?></option>
                  <?php
                  }
                  ?>
                  </select>
          </p>
        </li>
        <style>
		
        <?php if($pid_flag<>'xc1'){echo '.hxd { display:none;}';}?>
		</style>
        <li class="hxd">
          <p >
            <label>价格：</label>
            <input type="text" name="prices" value="<?php echo $prices;?>" >例：＂252万元/套＂
          </p>
        </li>
        
        <li class="hxd">
          <p >
            <label>状态：</label>
            <input type="text" name="zt" value="<?php echo $zt;?>" >例：＂在售＂
          </p>
        </li>
        
        <li class="hxd">
          <p >
            <label>编号：</label>
            <input type="text" name="bh" value="<?php echo $bh;?>" >例：＂A户型＂
          </p>
        </li>
        
        <li class="hxd">
          <p >
            <label>格局：</label>
            <input type="text" name="gj" value="<?php echo $gj;?>" >例：＂全明格局,户型方正＂;注：建议最多三组词，英文逗号隔开
          </p>
        </li>
        
        <li class="hxd">
          <p >
            <label>建面：</label>
            <input type="text" name="mj" value="<?php echo $mj;?>" style="width:300px;" onkeyup="this.value= this.value.match(/\d+(\.\d{0,2})?/) ? this.value.match(/\d+(\.\d{0,2})?/)[0] : ''">㎡　例：＂63＂
          </p>
        </li>
        
        <li class="hxd">
          <p >
            <label>类别：</label>
            <input type="text" name="lx" value="<?php echo $lx;?>" >例：＂公寓＂
          </p>
        </li>
        
        <li class="hxd">
          <p >
            <label>装修：</label>
            <input type="text" name="zx" value="<?php echo $zx;?>" >例：＂精装修＂
          </p>
        </li>
        
        <li class="hxd">
          <p >
            <label>朝向：</label>
            <input type="text" name="cx" value="<?php echo $cx;?>" >例：＂南＂
          </p>
        </li>
        <li class="hxd">
          <p >
            <label>户型解析：</label>
            <textarea name="jx" style="width:600px; height:100px;"><?php echo $jx;?></textarea>
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>图片大小：</label><font id="wh">宽800px*高600px</font>
          </p>
        </li>
        <li>
          <p>
            <label>缩略图：</label>
            <span class="upid">
              <span class="btn"><span>上传图片</span><input id="fileupload" type="file" name="mypic" /></span>
                <span class="progress"><span class="bar"></span><span class="percent">0%</span ></span>
                <span class="files"></span>
                <span id="showimg"><img src="<?php if($pic_img<>""){echo "../".$pic_img;}else{echo 'images/01.jpg';}?>" style=" height:120px;" /><!--初始图片--></span>
                <input type="hidden" id="src" name="src" value="<?php if($pic_img<>""){echo $pic_img;}?>" />
            </span>
           
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>排序：</label>
            <input type="text" name="pic_px" value="<?php echo $pic_px;?>" >
          </p>
        </li>
      </ul>
      <div class="addcust_btn">
		<input type="hidden" name="edit_id" value="<?php echo $id;?>" >
		<input type="hidden" name="lpid" value="<?php echo $luopan_id;?>" >
		<input type="hidden" name="pid" value="<?php echo $pid;?>" >
        <input type="submit" value="提交" class="submit" >
        <a href="loupan_pic.php?lpid=<?php echo $luopan_id;?>&pid=<?php echo $pid;?>&pid_flag=<?php echo $pid_flag;?>">返回</a>
      </div>
    </div>
  </form>
</div>
<script type="text/javascript" src="js/class.js"></script> 
<!--[if lt IE 9]><script type="text/javascript" src="js/forie.js"></script><![endif]-->
</body>
</html>