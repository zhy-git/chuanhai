<html xmlns="http://www.w3.org/1999/xhtml">
<?php
require("../../conn/conn.php");
require("../function.php");
$lpid=$_GET['lpid'];
if($lpid<>""){
	$rows=$mysql->query("SELECT * FROM `web_content` WHERE `id`='{$lpid}'");
	$infos=$rows[0];
	 if($infos==false)
	  {
		echo "已经出错!";
		exit;
	   }
	$click=$infos['click']+1;
	$mysql->execute("UPDATE `web_content` SET `click`='".$click."' where `id`='".$lpid."'");
	}
	$pricess='';
?>
<?php if($infos['all_price']==0){
	if($infos['jj_price']==0){
		$pricess='待定';
		}else{
			$pricess=$infos['jj_price'].'元/㎡';
			}
			 }else{
				  $pricess=$infos['all_price'].'万/套';
				   }?>
<head>
<meta name="applicable-device" content="mobile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-Control" content="no-cache">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no, email=no">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="320">
<meta name="screen-orientation" content="portrait">
<meta name="x5-orientation" content="portrait">
<meta name="full-screen" content="yes">
<meta name="x5-fullscreen" content="true">
<meta name="browsermode" content="application">
<meta name="x5-page-mode" content="app">
<meta name="msapplication-tap-highlight" content="no">
<link href="/public/static/phone/css/my.css" rel="stylesheet">
<link href="/public/static/phone/css/module-new.css" rel="stylesheet">
<link href="/public/static/phone/css/lp/house-detail.css" rel="stylesheet">
<script src="/public/static/phone/js/flexible.js" ></script>
<script  src="/public/static/libs/jquery/1.x/jquery.min.js" type="text/javascript"></script>
<script src="/public/static/common/js/jquery.form.js"></script>    
<script src="/public/static/libs/layer/mobile/layer.js"></script> 
<!--<script src="//msite.baidu.com/sdk/c.js?appid=1599154404206584"></script> -->
<script src="/public/static/phone/js/flexible.js"></script>
<title><?php echo $infos['title'];?>开盘信息_资料介绍_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>">   
<link rel="canonical" href=""/> 
<script type="text/javascript">
   window.onscroll=function(){ 
    var t=document.documentElement.scrollTop||document.body.scrollTop;  
    var htop2=document.getElementById("htop2"); 
    if(t>= 50){ 
        htop2.className = "htop2_1";
    }else{
        htop2.className = "htop2";
    } 
}
</script>
<style>
body{background: #F4f4f4;}
.box{width:98%;height:auto!important;margin:auto;overflow:hidden}
.wraper{padding:0;background:#e6e6e6;clear:both}
.box{min-height:0}
.wrap {padding: 10px;}
.nh{background: #fff;}
.nh .wrap .nw1 li{float:left;width:100%;line-height:30px;border-bottom:1px solid #eaeaea;font-size:.35rem}
.wrap dd p {line-height: 30px;border-bottom: 1px solid #eaeaea;font-size: .35rem;}
.blank10{clear:both;height:10px;line-height:10px;font-size:1px}
.titx,.infosx dt,.nh dt{font-size: .5rem}
.btns{padding-right: 5px;}
.tag-1,.tag-2,.tag-3,.tag-4,.tag-5,.tag-6,.tag-7,.tag-8,.tag-9{border: none;}
</style>
<?php include("../sq2.php");?>
</head>
<body style="height: auto;">
<div class="header" style="z-index: 999;position: fixed;top: 0;width: 100%">
    <div class="go-back">
       <a href="javascript:void(0)" onClick="history.back(-1)">
            <span class="ico ico-return">返回上一页</span>
        </a>
    </div>
    <div class="city-change"><span class="text">楼盘详情</span> </div>
        <ul class="u-link" style="top: .3rem;right: .2rem;">
            <li class="link-home"><a href="javascript:;" id="navBtn" style="display: block;"><img src="/public/static/phone/image/nav/nav.png"></a></li>                 
    </ul>
</div>
<div style="height: 51px;"></div>
<div class="house-nav htop1">
	<div class=""  id="htop2">
    <?php include("house-nav.php");?>
    </div>   
</div>	  	
<!--nav end-->  
<div class="wraper box">
	
   <iframe src="<?php echo $infos['get_url'];?>" id="myiframe" scrolling="no" onload="changeFrameHeight()" frameborder="0" style="width:100%; height:630px;"></iframe>
		<!--用户模块结束-->
	</div>
</div>
  
<script type="text/javascript">
$(function() {
	$("#navBtn").click(function(){
        toggleFixMenu('.nav');
    });
});
/*遮罩*/
function toggleFixMenu(obj) {
    $(".sFix").each(function (e) {
        var cls = $(this).attr('class');
        if (cls.indexOf(obj.replace('.', '')) >= 0) {
            $(obj).fadeToggle(0);
        } else {
            $(this).fadeOut(0);
        }
    });
}    
</script>
<div class="nav sFix">
	<?php include("../ny_nav.php");?>
    <div class="fixMask"></div>
</div>

<?php include("foot.php");?>
<style>

.nav{ position:fixed;left:0;right:0;top:1.3rem;padding:0px 0 0 0; max-width:480px; margin:0 auto;background: #fff}
</style>
    </div>
</body>
</html>
<?php include("../sq.php");?>
<div style="height: 66px;"></div> 