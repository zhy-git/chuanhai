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
		if (!tcheck(edit_content,'','内容不能为空')) { return false; }
		wintq('正在处理，请稍后...',4,10000,0,'');
		$('#myform').submit();
	});
});
</script>
</head>
<body>
<div class="nav_guide">当前位置：<?php echo get_srot($edit_pid,' &gt; ').$edit_title;?></div>
<div class="content">
  <form action="submit_save.php?action=about_add" method="post" name="myform" id="myform">
    <div class="addcust" id="client">
      <h5 class="t_op"><?php echo $edit_title;?></h5>
      <ul class="addcust_ul c">
        <li>
          <p>
            <label>内容：</label>
           <!-- <textarea name="edit_content" id="edit_content" style="width:940px;height:400px;visibility:hidden;"><?php //echo $edit_content;?></textarea>-->
            <script id="container" name="edit_content" type="text/plain"><?php echo $edit_content;?></script>
          </p>
        </li>
      </ul>
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