<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
require("../../conn/conn.php");
require("../function.php");

$lm=1000;
$id = isset($_GET['id']) ? intval($_GET['id']) : 2;
if($id<>""){
	$rows=$mysql->query("SELECT * FROM `web_srot` WHERE `id`='{$id}'");
	$infos=$rows[0];
	 if($infos==false)
	  {
		echo "已经出错!";
		exit;
	   }
	
	}
?>
<head>
   
<title><?php echo $infos['title'];?>_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>">
    <meta name="applicable-device" content="mobile">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="Cache-Control" content="no-cache">
    <meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1">
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
    <script src="/public/static/phone/js/flexible.js" ></script>
    <link href="/public/static/phone/css/my.css?v=1560161938" rel="stylesheet">
    <link href="/public/static/phone/css/module-new.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="/public/static/phone/css/swiper.css"/>
    <script src="/public/static/libs/jquery/1.x/jquery.min.js" type="text/javascript"></script>
    <script src="/public/static/common/js/jquery.form.js"></script>    
    <script src="/public/static/libs/layer/mobile/layer.js"></script> 
    <script type="text/javascript" src="/public/static/phone/js/swiper.js"></script>
    <script type="text/javascript" src="/public/static/phone/js/common.js"></script>
    <style>		
    .news-detail{background-color: #fff;padding:.4rem;}
    .news-detail p.p1{font-size:.6rem;line-height:1rem;font-weight:bolder;margin-bottom:.05rem}
    .news-detail p.p2{font-size:.4rem;color:#999;margin-bottom:.5rem}
    .news-detail .text img {width: 100%!important;height: auto!important;margin-bottom: .05rem;}
    #newsContent{line-height: .9rem}
    </style>
    <style>		
.footer{height:2rem;padding:.24rem .32rem 0;background-color:#464754;}
.footer .icp,.footer h3{height:.37rem;line-height:.37rem;overflow:hidden}
.footer .map{position:absolute;top:.46rem;right:.32rem;font-size:.26rem;border-bottom:solid 1px #878787}
.footer h3{font-size:.26rem;font-weight:400}
.footer{text-align:center}
.footer a{color:#fefefc;font-size:.34rem;margin:.24rem}
.footer .icp{font-size:.34rem;color:#fefefc;margin-top:.2rem}

.news-detail{background-color: #fff;padding:.4rem;}
.news-detail p.p1{font-size:.6rem;line-height:1rem;font-weight:bolder;margin-bottom:.05rem}
.news-detail p.p2{font-size:.4rem;color:#999;margin-bottom:.5rem}
.news-detail .text img {width: 100%!important;height: auto!important;margin-bottom: .05rem;}
#newsContent{line-height: .9rem}
.a_img img{width: 100%}
</style>
<?php include("../sq2.php");?>    
</head>
<body>
<!--nav begin-->
<div class="header" style="z-index: 999;position: fixed;top: 0;width: 100%">    
    <div class="go-back">
       <a href="javascript:void(0)" onclick="history.back(-1)">
            <span class="ico ico-return">返回上一页</span>
        </a>
    </div>
    <div class="city-change"><span class="text"><?php echo $infos['title'];?></span></div>    
        <ul class="u-link" style="top: .3rem;right: .2rem;">
            <li class="link-home"><a href="javascript:;" id="navBtn" style="display: block;"><img src="/public/static/phone/image/nav/nav.png"></a></li>                 
        </ul>
</div>
<div style="height: 51px;"></div>
<div class="article-box" style="background: #f5f4f4">
    <div style="padding: .2rem;">
        <div style="padding: .2rem;background: #fff;min-height: 11rem;">
        <h1 style="font-size: 24px;color:#00A0EA;border-bottom: 1px solid #00A0EA;padding-bottom: 5px"><?php echo $infos['title'];?></h1>
        <div style="line-height:0.8rem; font-size:0.4rem;">
        <?php echo $infos['content'];?>
        </div>
         <?php
            if($infos['zbx']<>""){
			?>
            <p style="height:30px;"></p>
                <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
            	<style type="text/css">
            #allmap{width:100%;height:210px;}
           #allmap p{margin-left:5px; font-size:14px;}
        </style>
        <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=Xbz0agOQpdcCl91FSUYEsoHB7jpL1zSo"></script>
            <div id="allmap"></div>
			<script type="text/javascript">
			// 百度地图API功能
			var map = new BMap.Map("allmap");
			var point = new BMap.Point(<?php echo $infos['zbx'];?>,<?php echo $infos['zby'];?>);
			var marker = new BMap.Marker(point);  // 创建标注
			map.addOverlay(marker);              // 将标注添加到地图中
			map.centerAndZoom(point, 12);
			var top_left_control = new BMap.ScaleControl({anchor: BMAP_ANCHOR_TOP_LEFT});// 左上角，添加比例尺
			var top_left_navigation = new BMap.NavigationControl();  //左上角，添加默认缩放平移控件
			var top_right_navigation = new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_RIGHT, type: BMAP_NAVIGATION_CONTROL_SMALL}); //右上角，仅包含平移和缩放按钮
				map.addControl(top_left_control);        
				map.addControl(top_left_navigation);     
				//map.addControl(top_right_navigation);    
			//map.enableScrollWheelZoom();   //启用滚轮放大缩小，默认禁用
			map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用
			var opts = {
			  title : "<font style='color:#F90;font-size:14px'><?php echo $rsconfig['company_name'];?></font>" , // 信息窗口标题
			  enableMessage:false,//设置允许信息窗发送短息
			}
			var infoWindow = new BMap.InfoWindow("<?php echo $infos['map'];?>", opts);  // 创建信息窗口对象 
				map.openInfoWindow(infoWindow,point); //开启信息窗口
				marker.addEventListener("click", function(){          
		map.openInfoWindow(infoWindow,point); //开启信息窗口
	});
		</script>
        <?php 
		}?>
        </div>
    </div>       
  
</div>		
<style type="text/css">
.icon-16 {background: url(/public/static/phone/image/icons/close2.png) no-repeat;padding: 22px 0px;}
.video_2_btn{bottom: .3rem}
</style> 
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
<style type="text/css">
</style>
<script type="text/javascript" src="/public/static/phone/js/common.enroll.js"></script>
<!-- 60领取红包 -->
<?php include("../bottom.php");?>
 
<div class="s_groupf">
    <div class="strutsf">
        <div class="orderf">
            <div class="make_tit_2f">
                <p class="t-1f" id="make_tit_2f">降价通知</p>                
            </div>
            <!--make_tit end-->
            <div class="make_tit_3f"><span class="t-2f" id="make_tit_3f">降价后将通知您</span></div>
            <form id="frmup888" method="post" action="/m/save">
	<input type="hidden" name="lpid" value="<?php echo $lpid;?>">
	<input type="hidden" name="ly" value="【<?php echo $sitecityname;?>】_移动端_立即抢红包" id="make_tit_4f">
	<input type="hidden" name="pid" value="33">
	<input type="hidden" name="action" value="bmtj">
        
                <div class="make_formf">
                    <ul>                               
                        <li><input type="text" name="utel" id="s-mobilef" placeholder="请输入手机号码,每天仅限前10名" class="inpf"></li>                               
                    </ul>
                    <div class="clear"></div> 
                </div>
                <div class="blank10"></div>
                <div class="make_submitf">                       
                    <a onclick="wid_closef();" class="qx-btnf fl" style="color: #00A0EA;">取消</a>
                    <input type="submit" value="立刻抢红包" name="bsubmit"  style="color: #fc0000;font-weight: 600;" class="fr">
                    <div class="clear"></div>                
                </div>
            </form>
        </div>
    </div>
</div>
<div class="s_alertf"></div>
</body>
</html>  
<?php include("../sq.php");?>
<div class="h50"></div> 