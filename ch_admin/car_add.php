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
    echo "已经出错!";
	exit;
   }
  else
  {
	  $p_path=$info['path'];
	  $p_title=$info['title'];
  }
if($_GET['id']<>""){
	$rows=$mysql->query("SELECT * FROM `web_content` WHERE `id`='{$_GET['id']}'");
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
<script type="text/javascript" src="phpJcrop/js/up.js"></script>
<!--up-->

<!--editor g-->
	<link rel="stylesheet" href="../editor/themes/default/default.css" />
	<link rel="stylesheet" href="../editor/plugins/code/prettify.css" />
	<script charset="utf-8" src="../editor/kindeditor.js"></script>
	<script charset="utf-8" src="../editor/lang/zh_CN.js"></script>
	<script charset="utf-8" src="../editor/plugins/code/prettify.js"></script>
	<script>
		KindEditor.ready(function(K) {
			var editor1 = K.create('textarea[name="content"]', {
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
		//var 
//			edit_content = $client.find('#edit_content').eq(0).val();
//		if (!tcheck(edit_content,'','内容不能为空')) { return false; }
		wintq('正在处理，请稍后...',4,10000,0,'');
		$('#form').submit();
	});
});
</script>
<script>
	function checkCoords(){
		if (parseInt($('#w').val())) return true;
		alert('Please select a crop region then press submit.');
		return false;
	};
	
	function show_city(a){
	//alert(a);
	if(a!=0){
		$.ajax
			   ({
					cache: false,
					async: false,
					dataType: 'text', type: 'post',
					data:{pid:a},
					url:"ajax_city.php",
					success: function (data)
					{
					//html += '<option value="' + i + '">' + o.province_name + '</option>';
					$("#city2_id").html(data);
					}
				});
		}else{
			html = '<option value="0">城市</option>';
			$("#city2_id").html(html);
			}
	}
</script>
</head>
<body>
<div class="nav_guide">当前位置：<?php echo get_srot($p_pid,' &gt; ').$p_title;?>
<?php
if($_GET['id']<>""){echo '&gt; 修改租车信息';}else{echo '&gt; 添加租车信息';}
?>
</div>
<div class="content">
  <form action="submit_save.php?action=car_add" method="post" name="myform" id="myform">
    <div class="addcust" id="client">
      <ul class="addcust_ul c">
        <li class="lie1">
          <p class="lie1">
            <label>车型：</label>
            <input type="text" name="title" value="<?php echo $infos['title'];?>" >
          </p>
          <p class="lie1">
           	 <label>城市：</label>
           	<select name="city_id" class="select" style=" height:34px; width:85px;" id="city_id" onchange="show_city(this.value);">
          			 <?php
					  $row=$mysql->query("select * from `web_city` where `pid`='1' and `city_st`='1' order by `city_px` asc");
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
            <label>标签：</label>
           <?php
            $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='1' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $infos['flag'])){
			?>
            <input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flag[]" checked="checked"/> <?php echo $listflag['flag'];?>　
            <?php 
				}else{
					?>
            	<input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flag[]"/> <?php echo $listflag['flag'];?>　
					<?php
					}
			} ?>
          </p>
        </li>
         <li>
          <p class="lie1">
            <label>参数：</label>
            <input type="text" name="sldz" value="<?php echo $infos['sldz'];?>">
          </p>
          <p class="lie1">
            <label>优惠：</label>
            <input type="text" name="xmdz" value="<?php echo $infos['xmdz'];?>">
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>日均价：</label>
            <input type="text" name="tuanprice" value="<?php echo $infos['tuanprice'];?>" style="width:100px;" >元/天
          </p>
          <p class="lie1">
            <label>原价：</label>
            <input type="text" name="tuanprice2" value="<?php echo $infos['tuanprice2'];?>" style="width:100px;" >元/天
          </p>
        </li>
        
        <li>
          <p >
            <label>标签：</label>
            <?php
            $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='18' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $infos['flagts'])){
			?>
            <input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flagts[]" checked="checked"/> <?php echo $listflag['flag'];?>　
            <?php 
				}else{
					?>
            	<input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flagts[]" /> <?php echo $listflag['flag'];?>　
					<?php
					}
			} ?>
          </p>
        </li>
        <li>
          <p >
            <label>套餐：</label>
            <?php
            $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='17' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $infos['flaglb'])){
			?>
            <input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flaglb[]" checked="checked"/> <?php echo $listflag['flag'];?>　
            <?php 
				}else{
					?>
            	<input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flaglb[]" /> <?php echo $listflag['flag'];?>　
					<?php
					}
			} ?>
          </p>
        </li>
        <li>
          <p>
            <label>封面图：</label>图片大小宽280px*高140px;<br />

            <span class="upid1">
              <span class="btn1"><span>上传图片</span><input id="fileupload1" type="file" name="mypic" /></span>
                <span class="progress1"><span class="bar1"></span><span class="percent1">0%</span ></span>
                <span class="files1"></span>
                <span id="showimg1"><img src="<?php if($infos['img']<>""){echo "../".$infos['img'];}else{echo 'images/01.jpg';}?>" style="width:120px;" /><!--初始图片--></span>
                <input type="hidden" id="src1" name="src1" value="<?php if($infos['img']<>""){echo $infos['img'];}?>" />
            </span>
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>排序：</label>
            <input type="text" name="px" value="<?php echo $infos['px'];?>" style="width:100px;" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">数字越大越在前
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