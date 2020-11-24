<?php
session_start();
include("../conn/conn.php");
include("system.php");
$row=$mysql->query("select * from `web_config` where `id`='1'");
$rows=$row[0];
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
<div class="nav_guide">当前位置：系统设置 &gt; 系统基本设置</div>
<div class="content">
  <form action="save.php?action=config_save" method="post" id="form" onSubmit="return check();">
    <input type="hidden" name="id" value="<?php echo $rows['id'];?>" >
    <div class="basic">
      <ul class="basic_ul">
        <li>
          <p>
            <h5 class="t_op">网站基本信息</h5>
          </p>
        </li>
        <li>
          <p>
            <label>网站名称：</label>
            <input type="text" name="site_name" value="<?php echo $rows['site_name'];?>" >
          </p>
        </li>
        <li>
          <p>
            <label>网站网址：</label>
            <input type="text" name="site_url" value="<?php echo $rows['site_url'];?>" >
          </p>
        </li>
        <li>
          <p>
            <label>网站关键字：</label>
            <input type="text" name="site_keyword" value="<?php echo $rows['site_keyword'];?>" >
          </p>
        </li>
        <li>
          <p>
            <label>网站描述：</label>
            <textarea name="site_desc" style="border:1px solid #BBB; background:#f1f1f1; width:400px; height:78px;line-height:26px; padding:0 4px;"><?php echo $rows['site_desc'];?></textarea>
          </p>
        </li>
        <li>
          <p>
            <label>网站备案号：</label>
            <input type="text" name="site_icp" value="<?php echo $rows['site_icp'];?>" >
          </p>
        </li>
        <li>
          <p>
             <h5 class="t_op">企业基本信息</h5>
          </p>
        </li>
        <li>
          <p>
            <label>企业名称：</label>
            <input type="text" name="company_name" value="<?php echo $rows['company_name'];?>" >
          </p>
        </li>
        <li>
          <p>
            <label>企业地址：</label>
            <input type="text" name="company_address" value="<?php echo $rows['company_address'];?>" >
          </p>
        </li>
        <li>
          <p>
            <label>企业联系人：</label>
            <input type="text" name="company_contact" value="<?php echo $rows['company_contact'];?>" >
          </p>
        </li>
        <li>
          <p>
            <label>企业电话：</label>
            <input type="text" name="company_tel" value="<?php echo $rows['company_tel'];?>" >
          </p>
        </li>
        <li>
          <p>
            <label>企业传真：</label>
            <input type="text" name="company_fax" value="<?php echo $rows['company_fax'];?>" >
          </p>
        </li>
        <li>
          <p>
            <label>企业邮箱：</label>
            <input type="text" name="company_email" value="<?php echo $rows['company_email'];?>" >
          </p>
        </li>
        <li>
          <p>
             <h5 class="t_op">在线沟通代码</h5>
          </p>
        </li>
        <li>
          <p>
            <label>电脑独立沟通代码：</label>
            <input type="text" name="info1" value="<?php echo $rows['info1'];?>" >
          </p>
        </li>
        <li>
          <p>
            <label>电脑通用代码：</label>
            
            <textarea name="text1" style="border:1px solid #BBB; background:#f1f1f1; width:400px; height:78px;line-height:26px; padding:0 4px;"><?php echo $rows['text1'];?></textarea>
          </p>
        </li>
        <li>
          <p>
            <label>手机独立沟通代码：</label>
            <input type="text" name="info2" value="<?php echo $rows['info2'];?>" >
          </p>
        </li>
        <li>
          <p>
            <label>手机通用代码：</label>
            
            <textarea name="text2" style="border:1px solid #BBB; background:#f1f1f1; width:400px; height:78px;line-height:26px; padding:0 4px;"><?php echo $rows['text2'];?></textarea>
          </p>
        </li>
      </ul>
      <div class="addcust_btn">
        <input type="submit" value="修改">
      </div>
    </div>
  </form>
</div>
<script type="text/javascript" src="js/class.js"></script> 
<!--[if lt IE 9]><script type="text/javascript" src="js/forie.js"></script><![endif]-->
</body>
</html>