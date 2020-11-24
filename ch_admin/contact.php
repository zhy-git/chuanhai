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
	  $edit_id=$info['id'];
	  $edit_pid=$info['pid'];
	  $edit_title=$info['title'];
	  $edit_content=$info['content'];
	  
	  $edit_mapname=$info['mapname'];
	  $edit_zbx=$info['zbx'];
	  $edit_zby=$info['zby'];
	  $edit_map=$info['map'];
	 // mysql_close($conn);
  }
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>单页＿网站管理系统</title>
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
<!--editor g-->

<!--editor e-->
<script>
$(document).ready(function() {
	var $client = $('#client');
	$('.submit').click(function() {
		var 
			edit_content = $client.find('#edit_content').eq(0).val();
		if (!tcheck(edit_content,'','内容不能为空')) { return false; }
		wintq('正在处理，请稍后...',4,10000,0,'');
		$('form').submit();
	});
});
</script>
</head>
<body>
<div class="nav_guide">当前位置：<?php echo get_srot($edit_pid,' &gt; ').$edit_title;?></div>
<div class="content">
  <form action="submit_save.php?action=contact_add" method="post" name="myform">
    <div class="addcust" id="client">
      <h5 class="t_op"><?php echo $edit_title;?></h5>
      <ul class="addcust_ul c">
        <li>
          <p>
            <label>内容：</label><!--
            <textarea name="edit_content" id="edit_content" style="width:650px;height:400px;visibility:hidden;"><?php echo $edit_content;?></textarea>-->
            
            <script id="container" name="edit_content" type="text/plain"><?php echo $edit_content;?></script>
          </p>
        </li>
      </ul>
      <h5 class="t_op">电子地图</h5>
       <div style="line-height:30px;margin-left: 100px;">
        单位名称：<input name="edit_mapname" type="text" class="easyui-textbox" style="width:300px;" onFocus="this.style.borderColor='#239fe3'" onBlur="this.style.borderColor='#dcdcdc'" value="<?php echo $edit_mapname;?>" /><br />
		地图内容：<input name="edit_map" type="text"  class="easyui-textbox" style="width:580px;" onFocus="this.style.borderColor='#239fe3'" onBlur="this.style.borderColor='#dcdcdc'" value="<?php echo $edit_map;?>" /><br />
		<font color="#FF0000">注：不能回车换行，要换行加"&lt;br&gt;"；如：电话：0898&lt;br&gt;传真：0898&lt;br&gt;地址：海南海口</font>
	    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css">
		body, html{width: 100%;height: 100%;margin:0;font-family:"微软雅黑";font-size:14px;}
		#l-map{height:300px;width:650px;}
		#r-result{width:100%;}
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=Xbz0agOQpdcCl91FSUYEsoHB7jpL1zSo"></script>
	<div id="l-map"></div>
	<div id="r-result">请输入关键字搜索: <input type="text" id="suggestId" size="20" value="百度" style="width:150px;" /><input type="hidden" id="zbx" size="20" value="<?php echo $edit_zbx;?>" style="width:150px;" name="edit_zbx" /><input type="hidden" id="zby" size="20" value="<?php echo $edit_zby;?>" style="width:150px;" name="edit_zby" /> 搜索后在地图上点击位置即可</div>
	<div id="searchResultPanel" style="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>

        </div>
<script type="text/javascript">
	// 百度地图API功能
	function G(id) {
		return document.getElementById(id);
	}

	var map = new BMap.Map("l-map");
		//	map.centerAndZoom("海口",9);                   // 初始化地图,设置城市和地图级别。
	var lpzb1=document.getElementById("zbx").value;
	var lpzb2=document.getElementById("zby").value;
	if (lpzb1!=""){
		//alert(document.getElementById("shipin").value);
			map.centerAndZoom(new BMap.Point(lpzb1,lpzb2),18);  
			var marker = new BMap.Marker(new BMap.Point(lpzb1,lpzb2));  // 创建标注
			map.addOverlay(marker);               // 将标注添加到地图中
		}else{
			map.centerAndZoom("海口",9);                   // 初始化地图,设置城市和地图级别。
			}
	map.enableScrollWheelZoom();   //启用滚轮放大缩小，默认禁用
	map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用
	var ac = new BMap.Autocomplete(    //建立一个自动完成的对象
		{"input" : "suggestId"
		,"location" : map
	});
	
	ac.addEventListener("onhighlight", function(e) {  //鼠标放在下拉列表上的事件
	var str = "";
		var _value = e.fromitem.value;
		var value = "";
		if (e.fromitem.index > -1) {
			value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
		}    
		str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;
		
		value = "";
		if (e.toitem.index > -1) {
			_value = e.toitem.value;
			value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
		}    
		str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
		G("searchResultPanel").innerHTML = str;
	});

	var myValue;
	ac.addEventListener("onconfirm", function(e) {    //鼠标点击下拉列表后的事件
	var _value = e.item.value;
		myValue = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
		G("searchResultPanel").innerHTML ="onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;
		
		setPlace();
	});

	function setPlace(){
		map.clearOverlays();    //清除地图上所有覆盖物
		function myFun(){
			var pp = local.getResults().getPoi(0).point;    //获取第一个智能搜索的结果
			map.centerAndZoom(pp, 18);
			//map.addOverlay(new BMap.Marker(pp));    //添加标注
		}
		var local = new BMap.LocalSearch(map, { //智能搜索
		  onSearchComplete: myFun
		});
		local.search(myValue);
	}
	//单击获取点击的经纬度
	map.addEventListener("click",function(e){
		map.clearOverlays(); 
		document.getElementById("zbx").value =(e.point.lng);
		document.getElementById("zby").value =(e.point.lat);
		//alert(e.point.lng + "," + e.point.lat);
		var marker = new BMap.Marker(new BMap.Point(e.point.lng,e.point.lat));  // 创建标注
		map.addOverlay(marker);               // 将标注添加到地图中
		//marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
	});
	
	
</script><br><br>

      <div class="addcust_btn">
	<input type="hidden" name="edit_title" value="<?php echo $edit_title;?>" >
	<input type="hidden" name="edit_id" value="<?php echo $edit_id;?>" >
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
	

		
    </script>
<script type="text/javascript" src="js/class.js"></script> 
<!--[if lt IE 9]><script type="text/javascript" src="js/forie.js"></script><![endif]-->
</body>
</html>