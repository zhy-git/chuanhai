<?php
session_start();
include("../conn/conn.php");
include("system.php");



$page = isset($_GET['page']) ? intval($_GET['page']) : 1;  
$page_num =16;  
$offset = ($page-1)*$page_num;
$rsc = $mysql->query("select count(*) as count from `web_admin`");
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/10);
$row = $mysql->query("select * from `web_admin` order by id desc limit $offset,$page_num");
//print_r($row);
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>管理员_管理系统</title>
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
				data:'action=admin_del&id='+id,
				success: function(data) {
					if (data.msg=='ok') {
						//alert('删除成功');
						wintq('删除成功',1,1500,0,'?');
					}else {
						wintq(data.msg,3,1500,1,'');
					}
				}
			});
		}
	});
	
});
</script>
</head>
<body>
<div class="nav_guide">当前位置：管理员管理 &gt; 管理员信息查询
	<div class="cus_search2"><a href="admin_add.php" class="newadd">新增管理员</a></div>
</div>
<div class="content2">
	<div class="searchinfor c">
    	<ul>
	<?php
	foreach($row as $list){
	?>
        <li>
            	<div class="user_top">
                	<a href="admin_add.php?id=<?php echo $list['id'];?>" class="user_pic"><img src="<?php if($list['admin_img']<>""){echo $list['admin_img'];}else{ echo 'images/user.jpg';}?>" width="178" height="216"></a>
                	<div class="p_editor"><a href="admin_add.php?id=<?php echo $list['id'];?>" title="编辑" ><img src="images/pra.png" width="18" height="20"></a><?php if($list['id']!=1){?><a href="<?php echo $list['id'];?>" title="删除" id="del"><img src="images/prb.png" width="18" height="20"></a><?php }?></div>
                </div>
                <div class="user_con">
                	<p><?php echo $list['admin_real'];?></p>
                    <p >管理组：<?php if($list['admin_sys']==1){ echo '超级管理员';}else{echo '信息管理员';}?></p>
                </div>
            </li> 
	<?php
	  }
	?>
        </ul>
    </div>
   <div class="fb_page seafor"><?php echo $page;?>/<?php echo $total;?> 页，　<?php echo $result["total"];?> 条记录　<?php if($page>2){ echo "<a class='page_num' href='?bumenid={$bumenid}&page=".($page-1)."'>&lt;</a>";}?>
                    <?php
					for ($i=1; $i<=$total; $i++) {
						if($page==$i){ echo "<span >{$i}</span>";}else{echo "<a class='page_num' href='?bumenid={$bumenid}&page={$i}'>{$i}</a>";}
                    }
					?>　
                    <?php if($page<$total){echo "<a class='page_num' href='?bumenid={$bumenid}&page={($page+1)}'>&gt;</a>";}?>
                      </div>
</div>
<script type="text/javascript" src="js/class.js"></script>
<!--[if lt IE 9]>
<script type="text/javascript" src="js/forie.js"></script>
<![endif]--> 
</body>
</html>