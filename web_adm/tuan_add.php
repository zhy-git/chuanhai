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

<script>
$(document).ready(function() {
	var $client = $('#client');
	$('.submit').click(function() {
		//var edit_content = $client.find('#edit_content').eq(0).val();
		//if (!tcheck(edit_content,'','内容不能为空')) { return false; }
		wintq('正在处理，请稍后...',4,10000,0,'');
		$('#myform').submit();
	});
});
</script>
<script>
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
if($_GET['id']<>""){echo '&gt; 修改团购信息';}else{echo '&gt; 添加新团购';}
?>
</div>
<div class="content">
  <form action="submit_save.php?action=tuan_add" method="post" name="myform" id="myform">
    <div class="addcust" id="client">
      <ul class="addcust_ul c">
        <li class="lie1">
          <p class="lie1">
            <label>标题：</label>
            <input type="text" name="title" value="<?php echo $infos['title'];?>" >
          </p>
          <p class="lie1">
            <label>区域：</label>
           <select name="city_id" class="select" style=" height:34px; width:85px;" id="city_id">
             <?php
					  $row1=$mysql->query("select * from `web_city` where `pid`='0' and `city_st`='1' order by `city_px` asc");
					  foreach($row1 as $list1){
					  ?>
                      <optgroup label="<?php echo $list1['city_name'];?>">
    
   
          			 <?php
					  $row=$mysql->query("select * from `web_city` where `pid`='{$list1['id']}' and `city_st`='1' order by `city_px` asc");
					  foreach($row as $list){
					  ?>
                    <option value="<?php echo $list['id'];?>" alt="1" id="level" <?php if($infos['city_id']==$list['id']){ echo 'selected="selected"';}?>><?php echo $list['city_name'];?></option>
                      <?php
					  }
					  ?>
                   </optgroup> 
                   <?php
					  }
					  ?>
                      
                   </select>
          </p>
        </li>
        <li>
         <p class="lie1">
            <label>楼盘ID：</label>
            <input type="text" name="tglp" value="<?php echo $infos['tglp'];?>" onKeyUp="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')" >
          </p>
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
            <label>团购价：</label>
            <input type="text" name="tuanprice" value="<?php echo $infos['tuanprice'];?>" >
          </p>
          <p class="lie1">
            <label>参考均价：</label>
            <input type="text" name="tuanprice2" value="<?php echo $infos['tuanprice2'];?>" >
          </p>
        </li>
        <li>
          <p class="lie1">
            <label style="width:100px; left:-20px;">团购截止时间：</label>
            <input type="text" name="kptime" onFocus="WdatePicker({startDate:'%y-%M-01 ',dateFmt:'yyyy-MM-dd HH:mm:ss',alwaysUseStartDate:true})" value="<?php echo $infos['kptime'];?>"> 
          </p>
          <p class="lie1">
            <label>项目地址：</label>
            <input type="text" name="xmdz" value="<?php echo $infos['xmdz'];?>">
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>促销信息：</label>
            <input type="text" name="cxxx" value="<?php echo $infos['cxxx'];?>" >
          </p>
        </li>
        <li style="display:none;">
          <p class="lie1">
            <label>独家优惠：</label>
            <textarea name="djyh" style="width:812px;height:100px;"><?php echo $infos['djyh'];?></textarea>
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>团购简介：</label>
            <!--<textarea name="content" id="content" style="width:820px;height:400px;visibility:hidden;"><?php echo $infos['content'];?></textarea>-->
            <script id="container" name="content" type="text/plain"><?php echo $infos['content'];?></script>
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
          <p class="lie1">
            <label>报名人数：</label>
            <input type="text" name="zhs" value="<?php echo $infos['zhs'];?>" style="width:100px;" onkeyup="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
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

<!-- 配置文件 -->
    <script type="text/javascript" src="/ueditorp33/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/ueditorp33/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container', {
    toolbars: [
         ['fullscreen', 'source', 'undo', 'redo','|','indent','bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'insertorderedlist', 'insertunorderedlist', 'selectall','time', 'date','link','unlink','imagenone', //默认
        'imageleft', //左浮动
        'imageright', //右浮动
        'imagecenter', //居中
		'|',
		  'insertvideo', //视频
        'attachment', //附件
        'lineheight', //行间距
        'autotypeset', //自动排版
		
        'emotion', //表情
        'spechars', //特殊字符
		 'cleardoc'],
    [ 'fontfamily','fontsize','paragraph','forecolor', 
        'backcolor',
		'|',
		'justifyleft', //居左对齐
        'justifyright', //居右对齐
        'justifycenter', //居中对齐
        'justifyjustify', //两端对齐
		'|', 'simpleupload','insertimage','|','edittable','edittd','insertrow', 'inserttable',
        'insertcol', //前插入列
        'mergeright', //右合并单元格
        'mergedown', //下合并单元格
        'deleterow', //删除行
        'deletecol', //删除列
        'splittorows', //拆分成行
        'splittocols', //拆分成列
        'splittocells', //完全拆分单元格
        'deletecaption', //删除表格标题
        'inserttitle', //插入标题
        'mergecells', //合并多个单元格
        'deletetable', //删除表格
        'insertparagraphbeforetable', //"表格前插入行"
		
        'template', //模板
		
        'searchreplace', //查询替换
		]
    ],
    autoHeightEnabled: true,
    autoFloatEnabled: true
});
		<?php if ($p_path=='0-11124' or $p_path=='0-3611'){?>
        var ue2 = UE.getEditor('container2');
		<?php }?>
    </script>

<script type="text/javascript" src="js/class.js"></script> 
<!--[if lt IE 9]><script type="text/javascript" src="js/forie.js"></script><![endif]-->
</body>
</html>