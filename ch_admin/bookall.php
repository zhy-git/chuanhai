<?php
session_start();
include("../conn/conn.php");
include("system.php");
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>系统基本设置</title>
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
</head>
<body>
<div class="nav_guide">当前位置：系统设置 &gt; 报名管理</div>
<div class="content">
  <form action="save.php?action=config_save" method="post" id="form" onSubmit="return check();">
    <input type="hidden" name="id" value="<?php echo $rows['id'];?>" >
    <div class="basic">
      <ul class="basic_ul">
        <li>
          <p>
            <h5 class="t_op">报名信息统计管理</h5>
          </p>
        </li>
        <?php
     	$result=$mysql->query("SELECT * FROM `web_srot` WHERE `pid` = '29' and `startus`='1' order by `px` asc");
		foreach($result as $row){//循环记录集
	?>
        <li>
          <p>
            <label><?php echo $row['title'];?>：</label>
            <?php
            $rsc = $mysql->query("select count(*) as count from `web_book` where `pid`='{$row['id']}'");
    		echo ' <font color="#FF0000">'.$rsc[0]['count'].'</font> 条记录';
			?>
            　　　
            <?php
            $rsc = $mysql->query("select count(*) as count from `web_book` where `pid`='{$row['id']}' and `cl`='0'");
    		echo '未处理：<a href="book.php?pid='.$row['id'].'"> <font color="#FF0000">'.$rsc[0]['count'].'</font> 条记录<=点击前往</a>';
			?>
           
          </p>
        </li>
         <?php
		}
	?>
      </ul>
     
    </div>
  </form>
</div>
<script type="text/javascript" src="js/class.js"></script> 
<!--[if lt IE 9]><script type="text/javascript" src="js/forie.js"></script><![endif]-->
</body>
</html>