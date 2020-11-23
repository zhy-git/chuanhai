<?php
session_start();
include("../conn/conn.php");
require('function.php');
include("system.php");
//$pid=$_GET['pid'];
//$row=$mysql->query("SELECT * FROM `web_srot` WHERE `id`='{$pid}'");
////print_r($row);
//$info=$row[0];
// if($info==false)
//  {
//    echo "已经出错!";
//	exit;
//   }
//  else
//  {
//	  $edit_id=$info['id'];
//	  $edit_pid=$info['pid'];
//	  $edit_title=$info['title'];
//  }
//  
//$sql="WHERE `pid`='{$pid}' ";
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;  
$page_num =30;  
$offset = ($page-1)*$page_num;
$rsc = $mysql->query("select count(*) as count from `web_log`");
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/$page_num);
$row = $mysql->query("select * from `web_log` {$sql} order by log_datetime desc limit $offset,$page_num");

?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>新闻列表＿网站管理系统</title>
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
		//批量删除
		$('#dely1').click(function(event) {
			event.preventDefault();
			if (!confirm('确定要删除选择项吗？')) {
				return false;
			}
			var delid='';
			var delid1='';
			for (i=0; i<$('#table .shanchu').size(); i++) {
				if (!$('#table .shanchu').eq(i).attr('checked')==false) {
					delid=delid+$('#table .shanchu').eq(i).val()+',';
					delid1=delid1+$('#table .shanchu').eq(i).attr("alt")+',';
				}
			}
			if (delid=='') {
				wintq('请选中后再操作',2,1500,1,'');
			}else {
				wintq('正在删除，请稍后...',4,20000,0,'');
				$.ajax({
					url:'info_ajax_zl.php',
					dataType:'JSON',
					type:'POST',
					data:'delid='+delid+'&delid1='+delid1+'&action=get_userdel',
					success: function(data) {
						if (data.msg=='ok') {
							wintq('删除成功',1,1500,0,'?');
						}else {
							wintq(data.s,3,1500,1,'');
						}
					}
				});
			}
		});
		
		
	////拉取客户信息
//	function clientajax(keyword) {
//		var keys="<?php //echo $keys;?>";
//		var pid="<?php //echo $pid;?>";
//		
//		var hashStr = window.location.hash.replace("#", "");
//		$.get('info_ajax.php?page='+keyword+'&keys='+keys+'&pid='+pid, function(data) {
//			//alert(data.html);
//			//回调函数
//			//data = eval('('+data+')');
//			if (data.msg=='ok') {
//				//有数据的情况下
//				$('#table .tr').remove();
//				$('#page .form_page').remove();
//				$('#table').append(data.html);
//				$('#page').append(data.page);
//			}else {
//				//没有数据的情况下
//				$('#table .tr').remove();
//				$('#page .form_page').remove();
//				$('#table').append(data.html);
//			}
//			Operating();
//		});
//	}
	clientajax('');
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
<div class="nav_guide">当前位置：操作记录

</div>

<div class="content2">
  <div class="customers">
    <table width="100%" border="0" cellspacing="0" cellpadding="0" class="box_cus" id="table">
      <tr>
        <th width="38"><input type="checkbox" id="ck_all" name="all" onClick="check_all(this,'one')">
          <label for="ck_all"></label></th>
        
        <th style="text-align:left;">事件</th>
        <th style="text-align:left;">时间</th>
       
      </tr>
      <?php
	 // print_r($row);
      foreach($row as $list){
		 
		  
	  echo '<tr class="tr '.$lv.'" style="">
					<td><input name="one" class="shanchu" value="'.$list[id].'" type="checkbox"></td>
					'.$lpmc.'
					<td style="text-align:left;">'.$list[log_content].'</td>
					<td style="text-align:left;">'.date("Y-m-d H:i:s",$list[log_datetime]).'</td>
					</tr>';
			
	  }
	  ?>
    </table>
    <div class="form_btm c" id="page"><a href="#" class="fun_btn" id="dely1" style="display:none;">删除</a>
     <?php 
	$pagess="<span class='form_page'>{$page}/{$total} 页   {$result['total']} 条记录";
		if($page>1){ $pagess.="<a class='page_num' href='?pid=".$pid."&page=".($page-1)."'>&lt;</a>";}
					for ($i=1; $i<=$total; $i++) {
						if($page==$i){ $pagess.="<span >{$i}</span>";}else{$pagess.="<a class='page_num' href='?pid=".$pid."&page={$i}'>{$i}</a>";}
                    }
					
					 if($page<$total){$pagess.="<a class='page_num' href='?pid=".$pid."&page=".($page+1)."'>&gt;</a>";}
					 $pagess.="<a class='pn' href='?pid=".$pid."&page={$total}' >尾页</a>";
		echo $pagess;
		
	?>
    </div>
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