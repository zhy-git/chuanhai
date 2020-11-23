<?php
session_start();
include("../conn/conn.php");
include("system.php");
$bumenid=$_GET['bumenid'];
if($_GET['id']<>""){
	$rsc=$mysql->query("select * from `web_admin` where `id`='{$_GET['id']}'");
	$rs=$rsc[0];
	}

function ckbox($a,$b){
	$a_array=explode(',',$a);
		foreach ($a_array as $v) {
			if($v==$b){
				$str=' checked="checked"';
				}
		}
		 return $str;
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>添加用户_管理系统</title>
<link rel="stylesheet" type="text/css" href="css/content.css"  />
<link rel="stylesheet" type="text/css" href="css/public.css"  />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/Public.js"></script>
<script type="text/javascript" src="js/winpop.js"></script>
<script type="text/javascript" src="js/check.js"></script>
<link type="text/css" rel="stylesheet" href="css/publichn.css">
<link type="text/css" rel="stylesheet" href="css/style.css">
<script>
$(document).ready(function() {
	$('#submit').click(function() {
		var id=$('#id').val();
		var admin_name=$('#admin_name').val();
		var admin_password=$('#admin_password').val();
		var admin_real=$('#admin_real').val();
		var admin_sys=$('#admin_sys').val();
		
		var admin_qx = $("input:checkbox[name='admin_qx']:checked").map(function(index,elem) {
            return $(elem).val();
        }).get().join(',');
		
		wintq('正在添加，请稍后...',4,20000,0,'');
		$.ajax({
			url:'ajax.php',
			dataType:'json',
			type:'POST',
			data:'id='+id+'&admin_name='+admin_name+'&admin_password='+admin_password+'&admin_real='+admin_real+'&admin_sys='+admin_sys+'&admin_qx='+admin_qx+'&action=admin_add',
			success: function(data) {
				if (data.msg=='ok') {
					wintq('添加成功',1,1500,0,'admin_list.php');
				}else if (data.msg=='edit') {
					wintq('修改成功',1,1500,0,'?');
				}else {
					wintq(data.msg,3,1000,1,'');
				}
			}
		});
	});
});
</script>
</head>
<body>
<div class="nav_guide">当前位置：首页 &gt; 管理员管理 &gt; 管理员信息管理</div>
<div id="content">
  <div class="all_view">
    <div class="view_table">
      <div class="view_two c" id="dl">
        <div class="vt_li">
          <label>登陆账号：</label>
          <input type="text" id="admin_name" value="<?php echo $rs['admin_name'];?>">
        </div>
        <div class="vt_li">
          <label>登陆密码：</label>
          <input type="text" id="admin_password" style="width:210px; height:34px; line-height:34px; border:1px solid #BBB; padding:0 4px;" value=""/>
        </div>
        <div style="clear:both;"></div>
        <div class="vt_li">
          <label>姓　　名：</label>
          <input type="text" id="admin_real" value="<?php echo $rs['admin_real'];?>" >
        </div>
        <div class="vt_li">
          <label>职　　务：</label>
          <select name="admin_sys" class="select" style=" height:34px;" id="admin_sys">
          			
                    <option value="1" alt="1" id="level" <?php if($rs['admin_sys']==1){ echo 'selected="selected"';}?>>超级管理员</option>
                    <option value="2" alt="2" id="level" <?php if($rs['admin_sys']==2){ echo 'selected="selected"';}?>>信息管理员</option>
                   
                   </select>
        </div>
        
        <div style="clear:both;"></div>
        <div class="vt_li">
          <label>权限：</label>职务为“信息管理员”时有效<br />

          <?php
     	$result=$mysql->query("SELECT * FROM `web_srot` WHERE `pid` = '0' and `startus`='1' order by `px` asc");
		foreach($result as $row){//循环记录集
	?>
       <input type="checkbox" name="admin_qx" value="<?php echo $row['id'];?>"  <?php echo ckbox($rs['admin_qx'],$row['id']);?>/>　<?php echo $row['title'];?><br />

    <?php
		}
	?>
        </div>
        <input type="hidden" id="id" value="<?php echo $_GET['id'];?>" />
        <div class="vt_bt cb">
          <input type="submit" value="提交" id="submit">
          <input type="button" value="返回" onclick="javascript:history.go(-1);">
        </div>
      </div>
    </div>
  </div>
</div>
</body>
</html>