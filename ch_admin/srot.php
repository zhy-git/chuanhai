<?php session_start();?>
<?php
require("../conn/conn.php");
if($_SESSION["admin_name"]=='')
	{
		echo "请重新登陆";
		exit();
	}
function get_str_lb($id = 0) {
	//require("../conn/conn.php");
    global $str1,$k1,$n1; 
	//查询pid的子类的分类
global $mysql;
	
		
	$result=$mysql->query("SELECT * FROM `web_srot` WHERE `pid` = '{$id}' order by `px` asc");
	//print_r ($result);
    if($result){//如果有子类
		foreach($result as $row){//循环记录集
			if( is_array(explode("-",$row['path']))&&count(explode("-",$row['path']))>=2){
			  for ($i = 2; $i <= count(explode("-",$row['path'])); $i++) {
				$n1.="&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;";
				}
				$k1=$n1."|--";
			}
			if ($row['startus']==1){ $t1="selected='selected'";}else{ $t1="";}
			if ($row['startus']==2){ $t2="selected='selected'";}else{ $t2="";}
			//$str1 .= "<option value=".$row['id'].">".$k1.$row['title']."</option>";
			$str1 .="<tr>";
	    	$str1 .="<td align='right'>&nbsp;</td>";
	    	$str1 .="<td>".$k1."<input class='easyui-numberbox' type='text' name='edit_px".$row['id']."' style='width:30px; text-align:center;' value='".$row['px']."'></input>&nbsp;<input class='easyui-textbox' type='text' name='edit_title".$row['id']."' style='width:150px;' value='".$row['title']."'></input></td>";
	    	$str1 .="<td align='center'><select class='easyui-combobox' name='edit_startus".$row['id']."' style='width:60px; text-align:center;'><option value='1' ".$t1.">是</option><option value='2' ".$t2.">否</option></select></td>";
	    	$str1 .="<td align='center'><input class='easyui-textbox' type='text' name='edit_b_url".$row['id']."' style='width:150px;' value='".$row['b_url']."'></input></td>";
	    	$str1 .="<td align='center'><a href='javascript:void(0)' onClick='edit_srot(".$row['id'].")' class='easyui-linkbutton' iconCls='icon-edit' plain='true'>修改</a> <a href='javascript:void(0)'  onClick='{if(confirm(\"确定要删除栏目[".$row['title']."]吗？\")){del(".$row['id'].");}return false;}' class='easyui-linkbutton' iconCls='icon-cancel' plain='true'>删除</a></td>";
    		$str1 .="</tr>";
			$n1="";
			$k1="";
            get_str_lb($row['id']); //调用get_str()，将记录集中的id参数传入函数中，继续查询下级 
        }
    }
    return $str1; 
}
function get_str($id = 0) {
global $mysql;
    global $str,$k,$n; 
	$result=$mysql->query("SELECT * FROM `web_srot` WHERE `pid` = '{$id}' order by `px` asc");
    if($result){//如果有子类
       foreach($result as $row){//循环记录集
			if( is_array(explode("-",$row['path']))&&count(explode("-",$row['path']))>=2){
			  for ($i = 2; $i <= count(explode("-",$row['path'])); $i++) {
				$n.="&nbsp;&nbsp;&nbsp;&nbsp;";
				}
				$k=$n."|--";
			}
			$str .= "<option value=".$row['id'].">".$k.$row['title']."</option>";
			$n="";
			$k="";
            get_str($row['id']); //调用get_str()，将记录集中的id参数传入函数中，继续查询下级 
        }
    } 
    return $str; 
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="easyjs/themes/default/easyui.css">
<link rel="stylesheet" type="text/css" href="easyjs/themes/icon.css">
<link rel="stylesheet" type="text/css" href="css/demo.css">
<script type="text/javascript" src="easyjs/jquery.min.js"></script>
<script type="text/javascript" src="easyjs/jquery.easyui.min.js"></script>
<script type="text/javascript" src="easyjs/tabfun_iframe.js"></script>
<title>栏目管理</title>
</head>
<body>
<div class="easyui-panel" title="栏目分类列表" data-options="iconCls:'icon-save'" style="width:100%;min-height:450px;">
      <table cellpadding="5" style="width:100%;">
	    		<tr>
	    			<td width="13" align="right">&nbsp;</td>
	    			<td width="559" ><strong>[排序]栏目名称</strong></td>
	    			<td width="97" align="center" ><strong>是否显示</strong></td>
	    			<td width="154" align="center" ><strong>页面模版</strong></td>
	    			<td width="225" align="center" ><strong>操作</strong></td>
    			</tr>
	    		 <?php
					echo get_str_lb(0);
				?>
	    	
	    	</table>
</div>
<div style="padding-top:10px; clear:both;"></div>
<div class="easyui-panel" title="添加分类" data-options="iconCls:'icon-add'" style="width:100%;height:130px;">
	<table cellpadding="5" style="width:100%;">
		<tr>
			<td align="center" ><strong>分类名称</strong></td>
			<td align="center" ><strong>排序</strong></td>
			<td align="center" ><strong>选择归类</strong></td>
			<td align="center" ><strong>是否显示</strong></td>
			<td align="center" ><strong>页面模版</strong></td>
			<td align="center" ><strong>操作</strong></td>
		</tr>
		<tr>
			<td align="center" ><input class="easyui-textbox" type="text" name="add_title" style="width:150px;"></td>
			<td align="center" ><input class="easyui-numberbox" type="text" name="add_px" style="width:40px;" value="999"></td>
			<td align="center" ><select class="easyui-combobox1" name="add_pid" >
                                    <option value="0">一级目录</option>
                                    <?php
										echo get_str(0);
									?>
                                </select></td>
			<td align="center" >
            	<select class="easyui-combobox" name="add_startus" style="width:60px; text-align:center;">
                    <option value="1">是</option>
                    <option value="2">否</option>
                </select></td>
			<td align="center" ><input class="easyui-textbox" type="text" name="add_b_url" style="width:150px;"></td>
			<td align="center" ><a  href="javascript:void(0)" onClick="reform('add_sort')" class="easyui-linkbutton" iconCls="icon-add" plain="true">添加</a></td>
		</tr>
	</table>
    <div id="conversation" style="color:#F00;"></div>
</div>

<script>
		
		//添加
		function reform(save){
		$("#conversation").hide();
		$("#conversation").fadeIn(1000);
		
		if ($('[name="add_title"]').val()==""){
				$("#conversation").text("");
				$("#conversation").append("　　　　　　*请填写分类名!");
				return false;
			}
		$.ajax
		   ({
				cache: false,
				async: false,   // 太关键了，学习了，同步和异步的参数
				dataType: 'text', type: 'post',
				data:{add_title:$('[name="add_title"]').val(),add_px:$('[name="add_px"]').val(),add_pid:$('[name="add_pid"]').val(),add_startus:$('[name="add_startus"]').val(),add_b_url:$('[name="add_b_url"]').val(),action:save},
				url:"srot_ajax.php",
				success: function (data)
				{
					if (data=="ok"){
						//parent.$("#dbtree").text("1111");
						window.location.reload();
						}else{
						 $("#conversation").text("");
						 $("#conversation").append(data);
						}
				}
			});
		   
		}
		//修改
		function edit_srot($a){
		$.ajax
		   ({
				cache: false,
				async: false,   // 太关键了，学习了，同步和异步的参数
				dataType: 'text', type: 'post',
				data:{edit_title:$('[name="edit_title'+$a+'"]').val(),edit_px:$('[name="edit_px'+$a+'"]').val(),edit_startus:$('[name="edit_startus'+$a+'"]').val(),edit_b_url:$('[name="edit_b_url'+$a+'"]').val(),edit_id:$a,action:"edit_srot"},
				url:"srot_ajax.php",
				success: function (data)
				{
					if (data=="ok"){
						alert('修改成功');
						}
					if (data=="miss"){
						alert('修改失败');
						}
				}
			});
		   
		}
		//删除
		function del(a){
		$.ajax
		   ({
				cache: false,
				async: false,   // 太关键了，学习了，同步和异步的参数
				dataType: 'text', type: 'post',
				data:{id:a,action:"del_srot"},
				url:"srot_ajax.php",
				success: function (data)
				{
					if (data=="nodel"){
						alert("该栏目下有内容存在,为保持系统清洁度,请先清除栏目下内容,再删除该栏目!");
						return false;
						}
					if (data=="ok"){
						window.location.reload();
						return false;
						}
				}
			});
		   
		}
		
	</script>
</body>
</html>