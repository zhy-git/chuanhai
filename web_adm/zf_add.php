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
		var 
			edit_content = $client.find('#edit_content').eq(0).val();
		if (!tcheck(edit_content,'','内容不能为空')) { return false; }
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
if($_GET['id']<>""){echo '&gt; 修改租房信息';}else{echo '&gt; 添加租房信息';}
?>
</div>
<div class="content">
  <form action="submit_save.php?action=zf_add" method="post" name="myform" id="myform">
    <div class="addcust" id="client">
      <ul class="addcust_ul c">
        <li class="lie1">
          <p class="lie1">
            <label>标题：</label>
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
            区域：
           	<select name="city2_id" class="select" style=" height:34px; width:85px;" id="city2_id">
          			 <?php
					 if($infos['city_id']<>0){
						 $row=$mysql->query("select * from `web_city` where `pid`='{$infos['city_id']}' and `city_st`='1' order by `city_px` asc");
						 }else{
							 $row=$mysql->query("select * from `web_city` where `pid`='2' and `city_st`='1' order by `city_px` asc");
							 }
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
          <p class="lie1">
            <label>状态：</label>
            <input type="radio" value="1" name="esfzt" checked="checked"/>出租中
            <input type="radio" value="2" name="esfzt" />已租出
          </p>
        </li>
         <li>
          <p class="lie1">
            <label>小区名称：</label>
            <input type="text" name="sldz" value="<?php echo $infos['sldz'];?>">
          </p>
          <p class="lie1">
            <label>地　　址：</label>
            <input type="text" name="xmdz" value="<?php echo $infos['xmdz'];?>">
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>租金：</label>
            <input type="text" name="tuanprice" value="<?php echo $infos['tuanprice'];?>" style="width:100px;" >元/月
          </p>
          <p class="lie1">
            <label>出租面积：</label>
            <input type="text" name="jzmj" value="<?php echo $infos['jzmj'];?>" >
          </p>
        </li>
        
        <li>
          <p >
            <label>租房标签：</label>
            <?php
            $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='16' and `flag_st`='1' order by `flag_px` asc ");
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
        <li class="lie1">
          <p class="lie1">
           	 <label>房屋状况：</label>
             朝向：
           	<select name="esfcx" class="select" style=" height:34px; width:85px;" id="esfcx" >
          			 <?php
					  $row=$mysql->query("select * from `web_flag` where `flag_fl`='14' and `flag_st`='1' order by `flag_px` asc ");
					  foreach($row as $list){
					  ?>
                    <option value="<?php echo $list['id'];?>" alt="1" id="level" <?php if($infos['esfcx']==$list['id']){ echo 'selected="selected"';}?>><?php echo $list['flag'];?></option>
                      <?php
					  }
					  ?>
                   </select>
             装修：
           	<select name="esfzx" class="select" style=" height:34px; width:85px;" id="esfzx" >
          			 <?php
					  $row=$mysql->query("select * from `web_flag` where `flag_fl`='13' and `flag_st`='1' order by `flag_px` asc ");
					  foreach($row as $list){
					  ?>
                    <option value="<?php echo $list['id'];?>" alt="1" id="level" <?php if($infos['esfzx']==$list['id']){ echo 'selected="selected"';}?>><?php echo $list['flag'];?></option>
                      <?php
					  }
					  ?>
                   </select>
            
          </p>
          <p class="lie1">
           	 <label>楼层特点：</label>
           	<select name="esftd" class="select" style=" height:34px; width:85px;" id="esftd" >
          			 <?php
					  $row=$mysql->query("select * from `web_flag` where `flag_fl`='15' and `flag_st`='1' order by `flag_px` asc ");
					  foreach($row as $list){
					  ?>
                    <option value="<?php echo $list['id'];?>" alt="1" id="level" <?php if($infos['esftd']==$list['id']){ echo 'selected="selected"';}?>><?php echo $list['flag'];?></option>
                      <?php
					  }
					  ?>
                   </select>
              　第
            <input type="text" name="esflc1" value="<?php echo $infos['esflc1'];?>" style="width:40px;" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" >层
              　共
            <input type="text" name="esflc2" value="<?php echo $infos['esflc2'];?>" style="width:40px;" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">层
            
          </p>
        </li>
        <li class="lie1">
          <p >
           	 <label>户型：</label>
           	<select name="esfhx1" id="esfhx1"  class="select" style=" height:34px; width:50px;">
          			 <?php
					   for ($x=1; $x<=5; $x++) {
					  ?>
                    <option value="<?php echo $x;?>" <?php if($infos['esfhx1']==$x){ echo 'selected="selected"';}?>><?php echo $x;?></option>
                      <?php
					  }
					  ?>
                   </select>室
           	<select name="esfhx2" id="esfhx2"  class="select" style=" height:34px; width:50px;">
          			 <?php
					   for ($x=0; $x<=5; $x++) {
					  ?>
                    <option value="<?php echo $x;?>" <?php if($infos['esfhx2']==$x){ echo 'selected="selected"';}?>><?php echo $x;?></option>
                      <?php
					  }
					  ?>
                   </select>厅
           	<select name="esfhx3" id="esfhx3"  class="select" style=" height:34px; width:50px;">
          			 <?php
					   for ($x=0; $x<=5; $x++) {
					  ?>
                    <option value="<?php echo $x;?>" <?php if($infos['esfhx3']==$x){ echo 'selected="selected"';}?>><?php echo $x;?></option>
                      <?php
					  }
					  ?>
                   </select> 厨
           	<select name="esfhx4" id="esfhx4"  class="select" style=" height:34px; width:50px;">
          			 <?php
					   for ($x=0; $x<=5; $x++) {
					  ?>
                    <option value="<?php echo $x;?>" <?php if($infos['esfhx4']==$x){ echo 'selected="selected"';}?>><?php echo $x;?></option>
                      <?php
					  }
					  ?>
                   </select>卫
           	<select name="esfhx5" id="esfhx5"  class="select" style=" height:34px; width:50px;">
          			 <?php
					   for ($x=0; $x<=5; $x++) {
					  ?>
                    <option value="<?php echo $x;?>" <?php if($infos['esfhx5']==$x){ echo 'selected="selected"';}?>><?php echo $x;?></option>
                      <?php
					  }
					  ?>
                   </select>阳台
            
          </p>
          
        </li>
         
        <li class="lie1" style="display:none;">
          <p class="lie1">
            <label>建筑年代：</label>
            <input type="text" name="esfnd" value="<?php echo $infos['esfnd'];?>" style="width:80px;" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">年
          </p>
        </li>
        
        <li>
          <p class="lie1">
            <label>房源描述：</label>
            <textarea name="content" id="content" style="width:820px;height:400px;visibility:hidden;"><?php echo $infos['content'];?></textarea>
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>周边配套：</label>
            <textarea name="djyh" style="width:812px;height:100px;"><?php echo $infos['djyh'];?></textarea>
          </p>
        </li>
        <li>
          <p>
            <label>封面图：</label>图片大小宽485px*高360px;<br />

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