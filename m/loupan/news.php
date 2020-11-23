<!DOCTYPE html>
<html lang="en">
<?php
require("../../conn/conn.php");
require("../function.php");
$lm=2;
$lpid=$_GET['lpid'];
$pid_flag=$_GET['pid_flag'];
if($lpid<>""){
	$rows=$mysql->query("SELECT * FROM `web_content` WHERE `id`='{$lpid}'");
	$infos=$rows[0];
	 if($infos==false)
	  {
		echo "已经出错!";
		exit;
	   }
	}
?>
<head>
    <meta charset="UTF-8"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1.0,minimum-scale=1.0">      
<title><?php echo $infos['title'];?>_楼盘动态_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $infos['title'];?>楼盘动态,<?php if($infos['keyword']){echo $infos['keyword'];}else{echo $config['site_keyword'];}?>">
<meta name=description content="<?php echo $infos['title'];?>楼盘动态,<?php if($infos['desc']){echo $infos['desc'];}else{echo $config['site_desc'];}?>"> 
    <script src="/public/static/phone/js/flexible.js"></script>
    <link href="/public/static/phone/css/module-new.css?v=2.5" rel="stylesheet">
    <link href="/public/static/phone/css/house-detail.css?v=2.5" rel="stylesheet">
    <link href="/public/static/phone/css/information-flow.css?v=2.5" rel="stylesheet">    
    <link href="/public/static/phone/css/my.css?v=2.5" rel="stylesheet">    
    <script  src="/public/static/libs/jquery/1.x/jquery.min.js" type="text/javascript"></script>
    <script src="/public/static/common/js/jquery.form.js"></script>        
    <script src="/public/static/libs/layer/mobile/layer.js"></script>  

<?php include("../sq2.php");?>    
</head>
<body>
<div class="container  p-information-flow">    
    <div class="header">          
      <div class="go-back">
          <a href="javascript:void(0)" onclick="history.back(-1)">
          <span class="ico ico-return">返回上一页</span>
          </a>
      </div>
      <div class="city-change">              
          <span class="tit"><?php echo $infos['title'];?></span>               
      </div>
    </div>
    <div class="l_lpdt_c">
        <ul class="updates-tag" style="display:none;">
            <li data-type="0" class="updates-tagon">
                <p class="post_ulog">全部动态</p>
            </li>
                        <li data-type="16" class="">
                <p class="post_ulog">最新优惠</p>
            </li>
                        <li data-type="15" class="">
                <p class="post_ulog">销控信息</p>
            </li>
                        <li data-type="1284" class="">
                <p class="post_ulog">楼盘导购</p>
            </li>
                        <li data-type="18" class="">
                <p class="post_ulog">施工进度</p>
            </li>
                        <li data-type="1235" class="">
                <p class="post_ulog">图解看房</p>
            </li>
                        <li data-type="1236" class="">
                <p class="post_ulog">楼盘评测</p>
            </li>
                        <li data-type="1285" class="">
                <p class="post_ulog">大咖评房</p>
            </li>
                    </ul>     
        <div class="clear"></div>
        <!-- list -->
        <div class="news_list">
           <ul class="updates-list">

           </ul>
        </div>
         <a class="updates-more">查看更多动态</a>
        <!-- list end-->
    </div>
</div>
<style type="text/css">
.l_lpdt_c{padding: .4rem}
.updates-list li{position:relative;padding-left:.35rem;border-left:.0325rem solid #EBEBEB}
.spot{width:.8rem;height:.3rem;left:-.5rem;top:0;background:#fff}
.new,.spot,.spot i{position:absolute}
.spot i{width:.2rem;height:.2rem;border-radius:50%;background:#EBEBEB;margin-top:.25rem;margin-left:.39rem}
.desc-pack,.desc-show,.updates-time{font-family:PingFangSC-Regular;letter-spacing:0;line-height:.8rem;font-size:.35rem}
.updates-time{color:#101D37;}
.updates-title{font-family:PingFangSC-Medium;margin-bottom:.2rem;color:#101D37;font-size:.4rem;line-height:.5rem} 
.updates-desc {color: #9399A5;font-size: .35rem;white-space: pre-wrap;}
.updates-tag{padding-bottom:.4rem;padding:1.125rem 1.25rem .3125rem;padding-top:.125rem;padding-right:.25rem;padding-bottom:2.2rem;padding-left:.15rem}
.updates-tagon{background:#48bf01;border:.03125rem solid #48bf01!important}
.updates-tag li{float:left;padding:.2375rem .25rem;border:.03125rem solid #9C9FA1;border-radius:.125rem;margin-right:.1375rem;margin-bottom:.1375rem}
.updates-tagon p{color:#fff!important}
.updates-more{display:block;height:1.0625rem;border-radius:.125rem;background:#F9F9F9;color:#5680A6;font-size:.4rem;text-align:center;line-height:1.0625rem}
.center{text-align: center;}
.no_info{line-height: 1.1rem}
</style>
<input type="hidden" id="house_id" value="<?php echo $lpid;?>">
<input type="hidden" id="spell" value="m/loupan">
<input type="hidden" id="page" value="1">
<input type="hidden" id="cid" value="0">
<script src="/public/static/phone/js/lpdt_ajax.js"></script>    

  

<?php include("../bottom.php");?>
</body>
</html> 
<?php include("../sq.php");?> 