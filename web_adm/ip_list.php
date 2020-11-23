<?php
session_start();
include("../conn/conn.php");
require('function.php');
include("system.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>IP列表＿网站管理系统</title>
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
<script>
$(document).ready(function() {
        function Operating() {
			//分页
		$('#page .form_page a').click(function(event) {
			event.preventDefault();
			var url = $(this).attr('href');
			clientajax(url);
		});
		//指定用户筛选
		//分页
		$('#page .form_page #GO').click(function(event) {
			//alert('ss');
			//var GO=$('#page .form_page #GO').attr("alt")
			var input=$('#page .form_page #input').attr("value")
			//var url1=GO+input;
			event.preventDefault();
			//var url = url1;
			clientajax(input);
		});	
	}
				
	//拉取客户信息
	function clientajax(keyword) {
		var keys="<?php echo $keys;?>";
		var pid="<?php echo $pid;?>";
		var page="<?php echo $page;?>";
		
		var hashStr = window.location.hash.replace("#", "");
		$.get('ip_ajax.php?page='+keyword+'&keys='+keys+'&pid='+pid, function(data) {
			//alert(data.html);
			//回调函数
			//data = eval('('+data+')');
			if (data.msg=='ok') {
				//有数据的情况下
				$('#table .tr').remove();
				$('#page .form_page').remove();
				$('#table').append(data.html);
				$('#page').append(data.page);
			}else {
				//没有数据的情况下
				$('#table .tr').remove();
				$('#page .form_page').remove();
				$('#table').append(data.html);
			}
			Operating();
		});
	}
	clientajax('<?php echo $page;?>');
	var speed='';
	$('.cus_tiemss .cud_xt').keyup(function() {
		clearTimeout(speed);
		var value = $(this).val();
		speed = setTimeout(function() {
			clientajax(value);
		},300);
	});
});
</script>
</head>
<body>
<div class="nav_guide">当前位置：查看访问IP
</div>
<div class="content2">
  <div class="customers">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="box_cus" id="table">
      <tr>
        <!-- <th width="38"><input type="checkbox" id="ck_all" name="all" onClick="check_all(this,'one')">
          <label for="ck_all"></label></th> -->
        <th>ID</th>
        <th>IP地址</th>
        <th>IP所在地</th>
        <th>IP来源</th>
        <th>IP提交页面来源</th>
        <th>访问时间</th>
      </tr>
    </table>
    <div class="form_btm c" id="page"></div>
  </div>
</div>
<script type="text/javascript" src="js/class.js"></script> 
<!--[if lt IE 9]><script type="text/javascript" src="js/forie.js"></script><![endif]--> 
<script type="text/javascript" src="js/My97DatePicker/WdatePicker.js"></script> 
<script>
/*表单全选反选*/
function check_all(obj,cName)
{
    var checkboxs = document.getElementsByName(cName);
    for(var i=0;i<checkboxs.length;i++){checkboxs[i].checked = obj.checked;}
} 
</script>
</body>
</html>