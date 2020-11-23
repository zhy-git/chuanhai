<?php
session_start();
include("../conn/conn.php");
include("system.php");
$lpid=$_GET['lpid'];
$pid=$_GET['pid'];
$pid_flag=$_GET['pid_flag'];
if($pid_flag<>''){
	$sql=" and `pid_flag` ='{$pid_flag}' ";
	}
$rslp = $mysql->query("select title from `web_content` where `id`='{$lpid}'");
$lpname=$rslp[0]['title'];


$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$pages = isset($_GET['pages']) ? intval($_GET['pages']) : 1;  
$page_num =30;  
$offset = ($pages-1)*$page_num;
$rsc = $mysql->query("select count(*) as count from `web_pic` where `luopan_id`='{$lpid}' {$sql}");
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/30);
$row = $mysql->query("select * from `web_pic` where `luopan_id`='{$lpid}' {$sql} order by pic_px desc limit $offset,$page_num");
//print_r($row);
function loupanflagid($id) {
	global $mysql;
    $row = $mysql->query("select * from `web_flag` where `id`='{$id}'");
	$tsname=''.$row[0]['flag'].'';
    return $tsname;
}
function loupanflagflag($flag) {
	global $mysql;
    $row = $mysql->query("select * from `web_flag` where `flag_bm`='{$flag}'");
	$tsname=''.$row[0]['flag'].'';
    return $tsname;
}

function countxc($ts,$lpid) {
	global $mysql;
	if($ts=='all'){
    	$rsc = $mysql->query("select count(*) as count from `web_pic` where `luopan_id`='$lpid' and `pid_flag`<>'xc1'");
	}else{
    	$rsc = $mysql->query("select count(*) as count from `web_pic` where `luopan_id`='$lpid' and `pid_flag`='{$ts}'");
		}
    return  $rsc[0]['count'];
}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>楼盘相册_管理系统</title>
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
	$('.p_editor #del').click(function(event) {
		event.preventDefault();
		if (!confirm('确定要删除该数据吗？')) {
			return false;
		}
		var id=$(this).attr('href');
		if (id=='' || isNaN(id)) {
			wintq('ID参数不正确',3,1000,1,'');
			return false;
		}else {
			wintq('正在删除，请稍后...',4,20000,0,'');
			$.ajax({
				url:'ajax.php',
				dataType:'json',
				type:'POST',
				data:'action=pic_del&id='+id,
				success: function(data) {
					if (data.msg=='ok') {
						//alert('删除成功');
						wintq('删除成功',1,500,0,'?');
					}else {
						wintq(data.msg,3,1500,1,'');
					}
				}
			});
		}
	});
	//批量删除
		$('#jy').click(function(event) {
			event.preventDefault();
			if (!confirm('确定要转移吗？')) {
				return false;
			}
			var delid='';
			var delid1='';
			var pid_flag='';
			for (i=0; i<$('.shanchu').size(); i++) {
				if (!$('.shanchu').eq(i).attr('checked')==false) {
					delid=delid+$('.shanchu').eq(i).val()+',';
					delid1=delid1+$('.shanchu').eq(i).attr("alt")+',';
				}
			}
					pid_flag=$('#pid_flag').val();
			if (delid=='') {
				wintq('请选中后再操作',2,1500,1,'');
			}else {
				wintq('正在转移，请稍后...',4,20000,0,'');
				$.ajax({
					url:'adlink_ajax_zl.php',
					dataType:'JSON',
					type:'POST',
					data:'delid='+delid+'&delid1='+delid1+'&pid_flag='+pid_flag+'&action=get_jy',
					success: function(data) {
						if (data.msg=='ok') {
							wintq('转移成功',1,1500,0,'?');
						}else {
							wintq(data.s,3,1500,1,'');
						}
					}
				});
			}
		});
		
		
		//批量删除
		$('#jyxc').click(function(event) {
			event.preventDefault();
			if (!confirm('确定要删除吗？')) {
				return false;
			}
			var delid='';
			var delid1='';
			var pid_flag='';
			for (i=0; i<$('.shanchu').size(); i++) {
				if (!$('.shanchu').eq(i).attr('checked')==false) {
					delid=delid+$('.shanchu').eq(i).val()+',';
					delid1=delid1+$('.shanchu').eq(i).attr("alt")+',';
				}
			}
					pid_flag=$('#pid_flag').val();
			if (delid=='') {
				wintq('请选中后再操作',2,1500,1,'');
			}else {
				wintq('正在转移，请稍后...',4,20000,0,'');
				$.ajax({
					url:'adlink_ajax_zl.php',
					dataType:'JSON',
					type:'POST',
					data:'delid='+delid+'&delid1='+delid1+'&pid_flag='+pid_flag+'&action=get_jyxc',
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
	
});
</script>
</head>
<body>
<div class="nav_guide">当前位置：楼盘相册管理 &gt; 楼盘[<font color="#0099FF" style="font-size:16px;"><?php echo $lpname;?></font>]相册信息
	<div class="cus_search2"><a href="pic_add.php?lpid=<?php echo $lpid;?>&pid=<?php echo $pid;?>" class="newadd">新增图片</a><a href="loupan_list.php?pid=<?php echo $pid;?>&page=<?php echo $_GET['page'];?>" class="back">返回楼盘列表</a></div>
</div>
<div class="cus_search c">
  
    <div class="cus_tiem" style="line-height:40px;">
      相册分类：<?php
	 $rowxc = $mysql->query("select * from `web_flag` where `flag_fl`='9' and `flag_st`='1' order by `flag_px` asc");
     foreach($rowxc as $xclist){
	 ?>
     <a href="?lpid=<?php echo $lpid;?>&pid=<?php echo $pid;?>&pid_flag=<?php echo $xclist['flag_bm'];?>" <?php if($pid_flag==$xclist['flag_bm']){echo 'style=" color:#F00;"';}?>><?php echo $xclist['flag'];?>（<?php echo countxc($xclist['flag_bm'],$lpid);?>）</a>&#12288;&#12288;
      <?php
      }
	  ?></div>
</div>
<div class="content2">
	<div class="searchinfor c">
    	<ul>
	<?php
	foreach($row as $list){
	?>
        <li>
            	<div class="user_top" style="height:178px;" title=""><input name="one" class="shanchu" value="<?php echo $list['id'];?>" type="checkbox" style="position:absolute; z-index:9; top:0px; left:0px;">
                <p style="background:rgba(0,0,0,0.5); color:#FFF; font-size:12px; position:absolute; top:0px; right:0px;"><?php echo loupanflagflag($list['pid_flag']);?></p>
                	<a href="pic_edit.php?id=<?php echo $list['id'];?>" class="user_pic"><img src="<?php if($list['pic_img']<>""){echo '/'.$list['pic_img'];}else{ echo 'images/user.jpg';}?>" width="178" height="178"></a>
                	<div class="p_editor"><a href="pic_edit.php?id=<?php echo $list['id'];?>" title="编辑" ><img src="images/pra.png" width="18" height="20"></a><a href="<?php echo $list['id'];?>" title="删除" id="del"><img src="images/prb.png" width="18" height="20"></a></div>
                </div>
                <div class="user_con" style="height:50px;">
                	<p style="height:25px; overflow:hidden;"><?php echo $list['pic_name'];?></p>
                    <?php if($list['pid_flag']=='xc1'){?>
                	<p style="height:25px; overflow:hidden;"><?php echo loupanflagid($list['pid_hx']);?></p>
                    <?php }?>
                </div>
            </li> 
	<?php
	  }
	?>
    <div style="clear:both;"></div>
        </ul>
    </div>
   <div class="fb_page seafor"><span style="float:left;"><input type="checkbox" id="ck_all" name="all" onClick="check_all(this,'one')"> <a href="#" class="fun_btn" id="jyxc">删除选中</a>
   
   <script>
/*表单全选反选*/
function check_all(obj,cName)
{
    var checkboxs = document.getElementsByName(cName);
    for(var i=0;i<checkboxs.length;i++){checkboxs[i].checked = obj.checked;}
} 
</script>

   <select name="pid_flag" id="pid_flag">
   <?php
	 $rowxc = $mysql->query("select * from `web_flag` where `flag_fl`='9' and `flag_st`='1' order by `flag_px` asc");
     foreach($rowxc as $xclist){
	 ?>
     <option value="<?php echo $xclist['flag_bm'];?>">转移到：<?php echo $xclist['flag'];?></option>
      <?php
      }
	  ?>
   </select>
   <a href="#" class="fun_btn" id="jy">确认</a>
   </span><?php echo $pages;?>/<?php echo $total;?> 页，　<?php echo $result["total"];?> 条记录　<?php if($pages>2){ echo "<a class='page_num' href='?lpid={$lpid}&pid={$pid}&pid_flag={$pid_flag}&pages=".($pages-1)."'>&lt;</a>";}?>
                    <?php
					for ($i=1; $i<=$total; $i++) {
						if($pages==$i){ echo "<span >{$i}</span>";}else{echo "<a class='page_num' href='?lpid={$lpid}&pid={$pid}&pid_flag={$pid_flag}&pages={$i}'>{$i}</a>";}
                    }
					?>　
                    <?php if($pages<$total){echo "<a class='page_num' href='?lpid={$lpid}&pid={$pid}&pid_flag={$pid_flag}&pages={($pages+1)}'>&gt;</a>";}?>
                      </div>
</div>
<script type="text/javascript" src="js/class.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/forie.js"></script>
<![endif]--> 
</body>
</html>