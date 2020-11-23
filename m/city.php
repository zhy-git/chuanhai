<!DOCTYPE html>
<html lang="en">
<?php
require("../conn/conn.php");
include("function.php");
?>
<head>
<meta charset="utf-8">
    <title><?php echo $config['site_name'];?></title>
    <meta name=keywords content="<?php echo $config['site_keyword'];?>">
    <meta name=description content="<?php echo $config['site_desc'];?>">
    <meta name="viewport" content="initial-scale=1, width=device-width, maximum-scale=1, user-scalable=no"> 
    <meta name="applicable-device" content="mobile">
    <meta http-equiv="Cache-Control" content="no-transform " />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="stylesheet" type="text/css" href="css2/home.css" />
</head>
<div class="mask"></div>
<body class="pagewrap bgcolor2 csxz">
    <nav class="topnav">
		<a href="javascript:window.history.go(-1);" class="backpage"></a>
		<a href="<?php echo $sitem;?>" class="logo"></a>
		<span class="tit">切换城市</span>
	</nav>
	<section class="maincon">		
		<p class="lab-tit">热门城市</p>
		<div class="hot-citys">
			<ul class="clearfix">
                <?php
                $city=$mysql->query("select * from `web_city` where `pid`<>0 and `city_st`='1' order by `city_px2` desc limit 0,3");
                foreach($city as $cityall){
                    echo '<li><a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/m/" target="_blank">'.$cityall['city_name'].'</a></li>';
                }
                ?>
			
			</ul>
		</div>
		<p class="lab-tit">全部城市</p>
		<div class="all-citys">
         <?php
         $city=$mysql->query("select * from `web_city` where `pid`=0 and `city_st`='1' order by `city_px` asc");
		 //	print_r($city);
			foreach($city as $cityall){
			
			?>
			<ul class="word-citys clearfix">
				<li><a href="javascript:;" id="A"><?php echo $cityall['city_name'];?></a></li>
                <?php
                $city2=$mysql->query("select * from `web_city` where `pid`='{$cityall['id']}' and `city_st`='1' order by `city_px` asc");
				foreach($city2 as $cityall2){
				?>
				<li><a href="http://<?php echo $cityall2['city_pingyin'];?>.<?php echo $siteasd;?>/m/"><?php echo $cityall2['city_name'];?></a></li>
                <?php }?>
			</ul>
            <?php }?>
			
			 <p style="padding: .75rem 0 0 .75rem;font-size: .75rem; display:none;">更多城市敬请期待...</p>
			 <div style="height: 20px;"></div>
		</div>
	</section>
	<div class="back-top">
		<a href="javascript:;" class="goTop"></a>
	</div>
</body>
</html>