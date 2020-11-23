<!DOCTYPE html>
<html lang="zh-cn">
<?php
require("../conn/conn.php");
require("../function.php");
$lm=588;
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>精准找房_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>">

    <link href="/css/public.css" rel="stylesheet">
    <link href="/css/alert.css" rel="stylesheet">
    <link href="/css/newslist.css" rel="stylesheet">
<script type=text/javascript src="../js/jquery-1.8.0.min.js"></script>
<!--上公用-->
</head>
<body>
<?php include("../top.php");?>
<!---->
<div class="p-d10"></div>
<div class="w1200">
	<iframe id="iframeId" width="1200" frameborder="0" scrolling="no" allowtransparency="true" src="/jzzf/index.php"></iframe>
</div>
<div class="blank20"></div>
<?php include("../bottom.php");?>
</body>
</html>