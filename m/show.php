<!DOCTYPE html>
<html>
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
?>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimum-scale=1">
<title><?php echo $infos['title'];?>-<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>">
		<link rel="stylesheet" type="text/css" href="../css/yee_mobile.css"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<link rel="stylesheet" type="text/css" href="../css/shuxing.css"/> <!--网站通用属性-->
		<link rel="stylesheet" type="text/css" href="../css/bottom-css.css"/><!--网站底部样式-->
		<link rel="stylesheet" type="text/css" href="../css/top-css.css"/><!--网站顶部样式-->
		<link rel="stylesheet" type="text/css" href="../css/lightgallery.css"/>
		<script src="../js/jquery-1.8.0.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/layer.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/yee.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/jquery.js" type="text/javascript" charset="utf-8"></script>
		<style>
  #serachBox{display: none;}
    .header_search {
      margin-top: 4px;
    position: absolute;
    top: 7px;
    right: 20px;
    width: 50%;
    height: 29px;
    padding: 0 10px 0 38px;
    box-sizing: border-box;
    background: url(/public/wap/images/u6.png) no-repeat 10px 6px;
    background-size: 79px 277px;
    background-color: #FFF;
    font-size: 0.8rem;
    color: #999;
    border-radius: 20px;
    line-height: 32px;
}
.back-btn_maing{ float: left;}
.back_search_m{ width: 85%; float: right;}
/*2017.5.18*/
.pg_hang {padding:0;border-top:1px solid #E1E1E1;}
.hang_main ul {margin:0 auto;}
.hang_main li {width:36%;background:0;margin:0;height:45px;line-height:45px;}
.hang_main li:first-child {width:27%;}
.hang_main li a {font-size:0.8rem; display:block;}
.hang_main li a.hang_main_bg3 {background:#FB8D3A;color:#fff; background:rgba(251,141,58,1) url("../images/tubiao1.png") no-repeat scroll 20% 11px / auto 45%; padding-left: 22px;}
.hang_main li a.hang_main_bg2 {color:#333;background-position:8% 8px;background-color:#fff; background-size: 28%; padding-left: 25px; }
.hang_main li a.hang_main_bg1 {color:#fff;background-position:20% 8px; background-size: 20%; padding-left: 25px;}


</style>
	</head>
	<body>
		
	
	
	<section id="serachBox2">
<?php include("../top.php");?>
		<link rel="stylesheet" type="text/css" href="css/application.css"/>
		<link rel="stylesheet" type="text/css" href="css/loup_index.css"/>
		
		<style>
		    .hlsear-box{ position: relative;top: 8px;}
		    .map_bg{ width: 100%; height: 300px; position: absolute; left: 0; top:0; background: rgba(0,0,0,0); z-index:2;}
		    .floor_main p i img{ width: 16px; height: auto;}
		    .floor_main{position:relative;}
		    /*VR看房*/
		    .virtual_box {height:240px;position:relative; padding-top: 10px;}
		    .virtual_box > a.vr_img {display:inline-block;position: absolute;top:82px;left:50%;margin-left:-31px;}
		    .virtual_box > a.vr_img img {display:inline-block;width:62px;height:68px;}
		    .virtual_box > a.vr_img2 img{width: 100%; height: 100%;}
		    .virtual_box .vr_box{ height: 100%; overflow: hidden;}
		    .virtual_box .vr_box a> img{display:block;height:100%;width:100%;}
		
		    .hlsear-btn ul li{ width: 12.111%;}
		    .hlsear-btn ul li h1{ margin-top: 5px; font-size: 0.8rem; padding-top: 0px;}
		    .d_show p i img{ width: 13px; height: auto; position: relative; left: 4px; top: 1px;}
		    .d_hide p i img{ width: 13px; height: auto; position: relative; left: 4px; top: 1px;}
		
		    #mlpxq_opening_tzw i.iconfont { width: 15px; height: auto; display: inline-block;position:relative;right:1px;}
		    #mlpxq_opening_tzw i.iconfont img{ width: 100%; height: auto;}
		    #mlpxq_price_tzw i.iconfont { width: 20px; height: auto; display: inline-block;}
		    #mlpxq_price_tzw i.iconfont img{ width: 100%; height: auto;}
		    .notice_me{letter-spacing:1px;}
		
		    p.inline_block2{ position: relative;}
		
		/*    span.inc_sfd{ position: absolute; right: 0px; top: 50%;  line-height: 20px; display: block; margin-top: -10px;background: #2bb1fe;padding: 3px 5px;
		        border-radius: 3px;color: #fff;}
		    span.inc_sfd a{ font-size: 0.9rem; color: #fff}
		    span.inc_sfd i{display: inline-block; width: 18px; height: auto; margin-right: 5px;}
		    span.inc_sfd i img{width: 100%; height: auto; position: relative; top: -2px;}*/
		
		    p.inline_block2 span.f12{border: 1px solid #ccc; border-radius: 3px; padding: 1px 5px;margin-left: 8px;position:relative;top:-3px;}
		
		
		
		    body .pfopn-close{ top: 10px; left: 10px;}
		
		
		    /*2018.4.10  明*/  
		    .lp_type{display:none;margin-top:3px;padding:0 15px;}
		    .lp_type span{margin-right:5px;font-size:0.7rem;background:#EBF3FE;padding:4px 5px;}
		    .lp_type span:nth-child(1){color:#4F8AD4;}
		    .lp_type span:nth-child(2){color:#E08466;background:#FBE9E7}
		    .lp_type span:nth-child(3){color:#74AE74;background:#E1F8E0}
		    .lp_type span:nth-child(4){color:#FFAB31;background:#FFF0D9}
		
		    .lp_bm{width:222px;overflow:hidden;margin:auto;}
		
		
		
		
		</style>


		<section class="wrap" style="background:#EFF3F6;">
		    <div class="dp_hide">
		        <!-- 楼盘幻灯片开始 -->
		    <link rel="stylesheet" type="text/css" href="css/js_swiper-3.4.2.min.css"/>
			<link rel="stylesheet" type="text/css" href="css/jslides.css"/>
			<script src="js/js_iscroll.js" type="text/javascript" charset="utf-8"></script>

			<style type="text/css">

			    /*头部轮播*/
			    .loup_head{width:100%;height:220px;position:relative;}
			    .loup_head ul{width:100%;height:100%;}
			    .loup_head ul li{width:100%;height:100%;position:relative;}
			    .loup_head ul li a.a img{width:100%;height:100%;}
			    .Number{z-index: 20; height:28px;position:absolute;left:15px;bottom:15px;background:rgba(10, 10, 10, 0.66);border-radius:15px;padding:0 10px;}
			    .Number a img{width:15px;height:15px;float:left;position:relative;top:6px;}
			    .Number span{display:block;font-size:15px;color:#FFF;float:right;line-height:28px;margin-left:4px;}
			
			    #swiper-pagination1 span{background: rgba(255,255,255,0.7);color: #000;width:60px;height:30px;text-align:center;line-height:30px;border-radius:20px;font-size:0.4rem;opacity:1}
			    body #swiper-pagination1 .swiper-pagination-bullet-active{background: #2789fc;color: #fff;}
			    #swiper-pagination1 .swiper-pagination-bullet-active i{background: url("images/xlpsy23.png") no-repeat center 0;color: #fff; display: inline-block; width: 10px; height: 13px; position: relative; top: 1px; margin-right: 3px;}
			
			    .hlsnav{ display: none;}
			</style>
			<div class="loup_head swiper-container" id="swiper-container1">
			    <ul class="swiper-wrapper">
			       <?php
                   if($infos['src7']<>''){
				   ?> <li class="swiper-slide" style="position: relative;">
			            <img src="images/stop.png" style="position: absolute;left:50%;top:50%;display: block;width:70px;z-index: 10; margin-top:-35px; margin-left:-35px;" id="stop">
			            <video id="vclick" src="<?php echo $site.$infos['src7'];?>" autobuffer poster="<?php echo $site.$infos['src8'];?>"  width="100%" height="100%" style="object-fit:fill" preload="none"></video>
			        </li>
                    <?php }?>
			        <li class="swiper-slide">
			            <a class="a" href="xiangce.php?lpid=<?php echo $lpid;?>"> <img src="<?php echo $site.$infos['img'];?>" alt=""></a>
			            <div class="Number">
			            	<a href="xiangce.php?lpid=<?php echo $lpid;?>"><img src="images/xlpsy2.png" alt=""><span><?php echo countxc('all',$lpid);?></span></a></div>
			        </li>
			    </ul>
		        <div class="swiper-pagination" id="swiper-pagination1">
                  <?php
                   if($infos['src7']<>''){
				   ?> 
					<span class="swiper-pagination-bullet swiper-pagination-bullet-active"><i></i>视频</span>  <?php }?>
					<span class="swiper-pagination-bullet"><i></i>图片</span>
			    </div>
			 </div>
			<script src="js/swiper-3.4.2.min.js"></script>
			<script type="text/javascript">
		    // 头部轮播
		
		    var mycars=new Array( <?php if($infos['src7']<>''){?>"视频",<?php }?>"图片");
		    var vclick=document.getElementById("vclick");
		    var swiper = new Swiper('#swiper-container1', {
		        pagination: '.swiper-pagination',
		        paginationClickable: true,
		        onSlideChangeEnd: function(swiper){
		            if(swiper.activeIndex==1){
		                vclick.pause();
		            }else if(swiper.activeIndex==0){
		                vclick.play();
		
		            }
		        },
		
		        // loop: true ,
		        paginationBulletRender: function (swiper, index, className) {
		            return '<span class="' + className + '">'+'<i></i>'+ mycars[index] + '</span>';
		        }
		
		    });
		     function video_click (id){
		         $(id).click(function(){
		             if(vclick.paused){
		                 vclick.play();
		                 $("#stop").hide();
		             }else{
		                 vclick.pause();
		             }
		         })
		     }
		    video_click("#vclick");
		    video_click("#stop");
		
		
		
		</script>
			<script>
			    $(function () {
			        $(window).scroll(function () {
			            var top = $(window).scrollTop();
			            if (top > 200) {
			                $('.hlsnav').fadeIn(600);
			            } else {
			                $('.hlsnav').fadeOut(600);
			            }
			        });
			    })
			</script>
			<script>
			    var time=document.getElementById("vclick");
			    /*获取播放次数*/
			
			    time.onplay = function() {
			        $.ajax({
			            url:"/api/property-clicks.html",
			            type:"post",
			            data:{videoid:"521"},
			            dataType:'json',
			            success:function(data){
			            }
			        });
			    }
			</script>
			<style>
			    #swiper-pagination1 .swiper-pagination-bullet:nth-child(2) i{display: none;}
			</style>        <!-- 楼盘幻灯片结束 -->
		
		    <div style="height:10px;"></div>
		
		    <!-- 楼盘首页菜单开始 -->
		    <div class="hlsnav" style="margin:0px">
			    <ul>
			      <li><a href="index.php?lpid=<?php echo $lpid;?>" class="on"><span></span>楼盘</a></li>
			      <li><a href="news.php?lpid=<?php echo $lpid;?>"><span></span>动态</a></li>
			      <li><a href="xiangce.php?lpid=<?php echo $lpid;?>"><span></span>相册</a></li>
			      <li><a href="huxing.php?lpid=<?php echo $lpid;?>&pid_flag=xc1"><span></span>户型</a></li>
			   		<li><a href="<?php echo $shangqiao;?>" rel="nofollow"><span></span>点评</a></li>
			    </ul>
		  	</div>
			  <!--<script type="text/javascript">
			     //页面点击统计
			     $('.hlsnav ul li').eq(0).click(function(){
			           _czc.push(﻿["_trackEvent","楼盘详细","楼盘首页",'楼盘首页',0,$('.hlsnav')]);
			    });
			    $('.hlsnav ul li').eq(1).click(function(){
			           _czc.push(﻿["_trackEvent","楼盘详细","楼盘首页",'楼盘动态',0,$('.hlsnav')]);
			    });
			    $('.hlsnav ul li').eq(2).click(function(){
			           _czc.push(﻿["_trackEvent","楼盘详细","楼盘首页",'楼盘相册',0,$('.hlsnav')]);
			    });
			    $('.hlsnav ul li').eq(3).click(function(){
			           _czc.push(﻿["_trackEvent","楼盘详细","楼盘首页",'在售户型',0,$('.hlsnav')]);
			    });
			    $('.hlsnav ul li').eq(4).click(function(){
			           _czc.push(﻿["_trackEvent","楼盘详细","楼盘首页",'咨询点评',0,$('.hlsnav')]);
			    });
			  </script>        -->
			  	
			  <!-- 楼盘首页菜单结束 -->
		
		        <!-- 楼盘详细信息 A-->
		    <div class="floor pdb5 floor_main" style="padding:0 0;">
		    	<p class="mt10 mb5 inline_block inline_block2" style="padding: 0 15px;">
		    		<span class="f22 text_strong" data-id="521"><?php echo $infos['title'];?></span>
		    		<em class="line"></em>
		    		<span class="f12" style="color:#68BBEF; border-color:#68BBEF">在售</span>
		    		<a id="a_tel" style="height: 50px;width: 50px;display: block;position: absolute;right:11%;top:11px;" href="tel:0898-88989565 ">
		    			<img src="images/tp_tel.gif" alt="" style="height: 100%;width: 100%;">
		    		</a>
		    	</p>
		    	<p class="inline_block fhidden main_average fhidden" style="padding: 0 15px;"> 
		    		<span class="average fl">均价：<em class="f18"><?php echo $infos['jj_price'];?>元/㎡</em></span><br class="clearfix">
		    	</p>
		    	<p style="font-size:10px; color:#999;position: relative;top: -8px; padding: 0 15px;">有效期：<?php echo $infos['loupan_qq'];?></p>
		    	<p class="lp_type ">
		    		<?php echo loupanflagts6($infos['flagts'],6);?>
		    	</p>
		    	<a title="">
		    		<p class="item_container" id="item_container" title="">
		    			<i class="iconfont mr10 gray fl">
		    				<img src="images/gray2.png" alt="">
		    			</i>
		    			<span style="width: 70%;display: inline-block;" class="fhidden fl"><?php echo $infos['xmdz'];?></span>
		    			<i class="iconfont mr10 gray fr"></i>
		    			<br class="clearfix">
		    		</p>
		    	</a>
		    	<p class="item_container">
		    		<i class="iconfont mr10 gray">
		    			<img src="images/gray7.png" alt="">
		    		</i>开盘时间：<?php echo $infos['kptime'];?>
		    		<a href="javascript:yee.reduction_property_kp(<?php echo $lpid;?>);" class="item_kp_notice" id="mlpxq_opening_tzw">
		    			<img src="images/kp_notice.png" alt="">
		    			<span>开盘通知</span>
		    		</a>
		    	</p>
		    	<a href="tel:<?php echo telsee($infos['loupan_tel']);?>" id="mlpxq_lprx">
		    		<p class="item_container" style="color:#FF6D00;font-size:0.6rem;letter-spacing:1px;">
		    			<i class="iconfont mr10 gray">
		    				<img src="images/gray3.png" alt="">
		    			</i><?php echo telsee($infos['loupan_tel']);?>
		    			<i class="iconfont mr10 gray fr"></i>
		    		</p>
		    	</a>
		    	<p class="item_container">
		    		<i class="iconfont mr10 gray">
		    			<img src="images/gray4.png" alt="">
		    		</i>开发商：<?php echo $infos['kfs'];?>
		    	</p>
		    	<p class="item_container" style="">
		    		<i class="iconfont mr10 gray">
		    			<img src="images/gray12.png" alt="">
		    		</i>预售许可证：<?php echo $infos['ysxkz'];?>
		    	</p>
		    	<p class="item_container  d_toggle anone">
		    		<i class="iconfont mr10 gray">
		    			<img src="images/gray1.png" alt="">
		    		</i><?php echo $infos['wylx'];?>
		    	</p>
		    	<p class="item_container d_toggle anone">
		    		<i class="iconfont mr10 gray">
		    			<img src="images/gray5.png" alt="">
		    		</i>交房时间：<?php echo $infos['jftime'];?>
		    	</p>
		    	<p class="item_container d_toggle anone">
		    		<i class="iconfont mr10 gray">
		    			<img src="images/gray14.png" alt="">
		    		</i>总户数：<?php echo $infos['zhs'];?>
		    	</p>
		    	<p class="item_container d_toggle anone">
		    		<i class="iconfont mr10 gray">
		    			<img src="images/gray9.png" alt="">
		    		</i>容积率：<?php echo $infos['rjl'];?>
		    	</p>
		    	<p class="item_container d_toggle anone">
		    		<i class="iconfont mr10 gray">
		    			<img src="images/gray8.png" alt="">
		    		</i>绿化率：<?php echo $infos['lhl'];?>
		    	</p>
		    	<p class="item_container d_toggle anone">
		    		<i class="iconfont mr10 gray">
		    			<img src="images/gray11.png" alt="">
		    		</i>物业公司：<?php echo $infos['wygs'];?>
		    	</p>
		    	<p class="item_container d_toggle anone">
		    		<i class="iconfont mr10 gray">
		    			<img src="images/gray10.png" alt="">
		    		</i>物业费：<?php echo $infos['wyf'];?>
		    	</p>
		    	<div class="mt5 d_show" style="border-bottom:1px solid #EBEBEB;border-top:1px solid #EBEBEB;padding:10px 0;">
		    		<p class="red text-center">展开全部信息
		    			<i class="iconfont">
		    				<img src="images/gray17.png" alt=""> 
		    			</i>
		    		</p>
		    	</div>
		    	<div class="mt5 d_hide anone" style="border-bottom:1px solid #EBEBEB;border-top:1px solid #EBEBEB;padding:10px 0;">
		    		<p class="red text-center">收起全部信息
		    			<i class="iconfont">
		    				<img src="images/gray18.png" alt="">
		    			</i>
		    		</p>
		    	</div>
		    	<div class="lp_bm">
		    		<a href="javascript:yee.showsign(521,1);" class="notice_me fl mt20 text-center mb15" id="mlpxq_opening_tzw">
		    			<i class="iconfont">
		    				<img src="images/gray15.png" alt="">
		    			</i>&nbsp;报名看房
		    		</a>
		    		<a style="background:#FF9000;margin-left:20px;" href="javascript:yee.reduction_property(521);" class="notice_me fl mt20 text-center mb15" id="mlpxq_price_tzw">
		    			<i class="iconfont">
		    				<img src="images/gray16.png" alt="">
		    			</i>&nbsp;降价通知
		    		</a>
		    	</div>
		    </div>
		    
			<!-- 展开全部信息 -->
			<script type="text/javascript">
				$(function () {
					 $(".d_show").click(function(){
		                    $(".anone").removeClass("anone");
		                    $(".d_show").addClass("anone");
		               });
		                $(".d_hide").click(function(){
		                    $(".d_toggle").addClass("anone");
		                    $(".d_show").removeClass("anone");
		                    $(".d_hide").addClass("anone");
		                });
				});
			</script>
		
	        
		
		
		<!-- 楼盘动态 -->
			<div class="v2_lpindx4">    
			    <div class="v2_inde_h" style="display:none;">
			        <div class="v2_inde_h_main c">
			            <i></i>
			            <span>楼盘动态</span>
			            <a href="">查看全部 &gt;</a>
			        </div>
			    </div>
			    <div class="v2_lpindx4_main" style="display:none;">
			        <ul>
                    
			            <li>
			                <div class="sj">
			                <i><img src="images/v1_yq.png" alt=""></i>
			                <span class="nyr">2018年04月11日</span>
			                <span class="xinx">交房</span>
			                </div>
			                <div class="bomg">
			                 
			                    <div class="title">
			                        <a href="">
			                            <p class="h">
			                               预计2018年9月30日9-14#已交房
			                            </p>
			                            <p class="conter">
			                            10#,11#,12#,13#,14#,9#...
			                            </p>
			                        </a>
			                    </div>
			                    <div style="height:15px;"></div>
			                </div>
			            </li>
			
			            <li>
			                <div class="sj">
			                <i><img src="images/v1_yq.png" alt=""></i>
			                <span class="nyr">2018年04月11日</span>
			                 <span class="xinx">动态</span>
			                </div>
			                <div class="bomg">
			                    <div class="title">
			                        <a href="">
			                            <p class="h">
			                                三亚依山云锦9-14#已交房
			                            </p>
			                            <p class="conter">
			                            三亚依山云锦享天籁之间，山海之韵衔接着繁华与宁静，入则体验滨海的繁华...
			                            </p>
			                        </a>
			                    </div>
			                    <div style="height:15px;"></div>
			                </div>
			            </li>
			
			            <li>
			                <div class="sj">
			                <i><img src="/public/wap/wapshouye/img/v1_yq.png" alt=""></i>
			                <span class="nyr">2018年04月11日</span>
			                 <span class="xinx">预售证</span>
			                </div>
			                <div class="bomg">
			                    <div class="title">
			                        <a href="">
			                            <p class="h">
			                                优惠信息优惠信息优惠信息
			                            </p>
			                            <p class="conter">
			                            优惠信息优惠信息优惠信息优惠信息优惠信息优惠信息优惠信息优惠信息优惠信息优惠信息...
			                            </p>
			                        </a>
			                    </div>
			                    <div style="height:15px;"></div>
			                </div>
			            </li>
			
			            <li>
			                <div class="sj">
			                <i><img src="/public/wap/wapshouye/img/v1_yq.png" alt=""></i>
			                <span class="nyr">2018年04月11日</span>
			                 <span class="xinx">开盘</span>
			                </div>
			                <div class="bomg">
			                    <div class="title">
			                        <a href="">
			                            <p class="h">
			                                优惠信息优惠信息优惠信息
			                            </p>
			                            <p class="conter">
			                            优惠信息优惠信息优惠信息优惠信息优惠信息优惠信息优惠信息优惠信息优惠信息优惠信息...
			                            </p>
			                        </a>
			                    </div>
			                    <div style="height:15px;"></div>
			                </div>
			            </li>
			        </ul>
			    </div>
	
		        <!-- 户型 -->
		        <div class="Newest_xx Newest_xx_hx">
		            <div class="Newest_xx_title clearfix">
		                <div class="Newest_xx_title_box clearfix" style="width:107px">
		                   <i></i>
		                    <span>户型</span>
		                </div>
		                <a href="huxing.php?pid_flag=xc1&lpid=<?php echo $lpid;?>">全部户型 &gt;</a>
		            </div>
		            <ul class="layout clearfix">
		            <?php
		 
	 $rowxc = $mysql->query("select * from `web_flag` where `flag_fl`='41' and `flag_st`='1' order by `flag_px` asc");
     foreach($rowxc as $xclist){
		 if(countxc1($xclist['id'],$lpid)<>0){
	 ?>
       <li ><A href="huxing.php?pid_flag=xc1&lpid=<?php echo $lpid;?>&pid_hx=<?php echo $xclist['id'];?>" ><?php echo $xclist['flag'];?></A></li>
      <?php
      }
      }
	  ?></ul>
		            <div class="Newest_xx_hxlist">
			            <div class="hxlist139 layout_lunb_box switch2 swiper-container swiper-container-horizontal" optionid2="139" id="swiper-container2">
			            	<ul class="layout_lunb clearfix swiper-wrapper" style="transition-duration: 0ms;overflow-x: auto;">
                               <?php
			$row = $mysql->query("select * from `web_pic` where `luopan_id`='{$lpid}' and `pid_flag` = 'xc1' order by id desc limit 0,3");
			foreach($row as $k=>$list){
			
		?>
 
    <li class="swiper-slide swiper-slide-active">
			            			<a href="#">
			            				<div class="layout_lunb_img">
			            					<img src="<?php echo $site.$list['pic_img'];?>" alt="">
			            				</div>
			            				<div class="layout_lunb_text">
			            					<div class="layout_lunb_text_title"><?php echo $list['pic_name'];?></div>
			            				</div>
			            			</a>
			            		</li>
<?php
			}
		?>   
   
			            	
			            	</ul>
			            </div>
		            </div>
		        </div>
			</div>
		
		     <!-- 优惠通知 -->
		    <div class="Discount1">
		         <div>  <form id="myFormsss" name="myFormsss" method="post" action="../save.php?action=baoming" onSubmit="return checkLmt(this);" >
                                <input type="hidden" name="lpid" value="<?php echo $lpid;?>" />
                                  <input type="hidden" name="pid" value="33" />
                                  <input type="hidden" name="ly" value="手机楼盘领取优惠" />
		               <input class="Discount_input" placeholder="请输入您的手机号码" id="mobil" name="utel" type="text">
		               <input class="Discount_submit" value="点击报名" type="submit">
                        </form>
		         </div>
		
		         <span>已有 <i><?php echo (int)$infos['esfcx'];?></i> 人获取</span>
		    </div>
		
		    <script>
		
		         // 优惠报名 随机数
		              var randoX = 100;
		              var randoY = 300;
		              var randvalu = parseInt(Math.random() * (randoX - randoY + 1) + randoY);
		              $('.Discount span').find('i').text(randvalu);
		
		
		              $('.Discount div .Discount_submit').on('click',function(){
		              var news_id = $('.floor_main .text_strong').attr('data-id');
		              var data = {
		                  mobile:$('.Discount div #mobil').val(),
		                  name:$('.Discount div #name').val(),
		                  pid:news_id,
		                  type:11
		                };
		
		                if(!yee.isMoblie(data.mobile)){
		                    yee.layerOpen('请输入正确是手机号码');
		                    return false;
		                }
		
		                if (data.type==1||data.type==5) {
		                    if (!data.name) {
		                        yee.layerOpen('请输入您的姓名');
		                        return false;
		                    };
		                };
		                yee.post('/api/property-sign.html',data,function(result){
		                    if (result.code==200) {
		                        $('.Discount div #name').val('');
		                        $('.Discount div #mobil').val('');
		                    }
		                    yee.layerOpen(result.msg);
		                },function(error){
		                    yee.layerOpen('提交错误');
		                });
		            })
		
		
		             
		          </script>
		
		
		    <!-- 咨询点评 -->
		    <style>
				.remark{ width: 95%; margin: 0 auto; height: auto; display: none;}
				.remark_h{ height: 50px; line-height: 50px; position: relative;}
				.remark_h span{ display:block;}
				.remark_h span.jin{ width: 20px; height: auto; position: absolute; left: 5px; top: 50%; margin-top: -10px;}
				.remark_h span.jin img{ width: 100%; height: auto;}
				.remark_h span.min{ font-size: 1.2rem; text-align: center; color: #1e1e1e;}
				.tijiao span.inpu{height: 40px; line-height: 40px; background: #fff; border: 1px solid #cccccc; color: #cccccc; display: inline-block; padding: 0 20px; border-radius: 5px; float: right; margin-top: 10px;margin-right:15px;}
				
				.remark_main{margin: 10px 15px;}
				.remark_main textarea{ width: 100%; overflow-y:hidden; height:150px; border: none; font-size: 1rem; color: #333; border-radius: 5px; border: 1px solid #999; padding: 5px 10px; resize: none;}
				.remark_main textarea:focus{ outline:none;}
				
				
				.input_m{ width: 100%; height: 35px; margin-bottom: 15px;}
				.input_m input{ width: 100%; height: 35px; border: 1px solid #999; background: #fff;  padding-left: 10px; border-radius: 5px;}
		</style>
		
			<div class="dp_hide">
			  <div class="Newest_xx">
			      <div class="Newest_xx_title clearfix" style="margin-bottom:10px;">
			          <div class="Newest_xx_title_box clearfix" style="width:107px">
			               <i></i>
			               <span>咨询点评</span>
			          </div>
			      </div>
			      <div class="dp_lpid" style="display:none;">521</div>
			      <ul class="Comment">
			           <?php
			
            $row = $mysql->query("select * from `web_book` WHERE `pid`='30' and `cl`='1' and `lpid`='{$lpid}' order by id desc limit 0,10");//and `cl`='1'
			 foreach($row as $k=>$list){
			?>
				      <li>
				      	<div class="Comment_head clearfix">
					      	<img src="images/xlpsy11.png" alt="">
					      	<div class="Comment_head_nema">
					      		<span>匿名用户</span>
					      	</div>
				      	</div>
				      	<p class="Comment_text"><?php echo $list['ucontent'];?></p>
				      	<i class="Comment_time"><?php echo $list['addtime'];?></i>
				      </li>
                   <?php }?>   
                      
			      </ul>
			
			      <div class="Comment_dq">
			      	<div class="Comment_dq_box clearfix">
			      		<img src="images/xlpsy14.png" alt=""><span>我要点评</span>
			      	</div>
			      </div>
			      <div style="height:10px;"></div>
			  </div>
			</div>
		
			<!--我要点评弹窗-->
			<div class="remark">
			  <div class="remark_box">
			    <div class="remark_h">
			      <span class="jin"><img src="images/claub.png" alt=""></span>
			      <span class="min">咨询点评</span>
			    </div>
			    <div class="remark_main">
                 <form id="myformzx" name="myformzx" method="post" action="../save.php?action=baoming" onSubmit="return checkLmt(this);">
        <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
<input type="hidden" name="pid" value="30">
			      <div class="input_m"><input name="utel" placeholder="请填写手机号码，方便第一时间得知最佳回复" type="text"></div>
			      <textarea placeholder="请填写您的问题..." name="ucontent" id="tValue"></textarea>
                  <input type="submit" value="提交" style="display:none;">
			      <div class="result"></div>
                   </form>
			    </div>
			    <div class="tijiao clearfix"><span class="inpu comment-btn2">提交</span></div>
			  </div>
			</div>
		
		
		
		
			
			<script>
				$(function(){
				  $('.Comment_dq_box').click(function(){
				    // $('.dp_hide').hide();
				  
				    $('.kfdz_div').hide();
				    $('.periphery').hide();
				    $('.loup_head').hide();
				    $('.floor_main').hide();
				    $('.Discount1').hide();
				    $('.Newest_xx').hide();
				    $('footer').hide();
				    $('header.header').hide();
				    $('#cnzz_stat_icon_1260633389').hide();
				    $('section.wrap').css({'padding-top':'0','height':'100%','background':'#fff',});
				    $('section').css({'padding':'0'});
				    $('.remark').show();
				  })
				  $('.remark_h span.jin').click(function(){
				    $('.remark').hide();
				    $('.dp_hide').show();
				    $('footer').show();
				    $('.kfdz_div').show();
				    $('.periphery').show();
				    $('.loup_head').show();
				    $('.floor_main').show();
				    $('.Discount').show();
				    $('.Newest_xx').show();
				    $('#cnzz_stat_icon_1260633389').show();
				    $('header.header').show();
				    $('section.wrap').css({'padding-top':'50px','height':'auto','background':'#f7f7f7',});
				    $('section').css({'padding-bottom':'10px'});
				  })
				})
			
				 $(function() {
				  var id_m=$(".remark_main textarea");
				     id_m.focus(function() {
				      if(id_m.val().length!=0){
				        $('.tijiao span.inpu').css({'background':'#2789fc','color':'#fff','border-color':'#2789fc'});
				      }else{
				        $('.tijiao span.inpu').css({'background':'#fff','color':'#ccc','border-color':'#ccc'});
				      }
				     }).blur(function() {
				      if($(this).val().length!=0){
				        $('.tijiao span.inpu').css({'background':'#2789fc','color':'#fff','border-color':'#2789fc'});
				      }else{
				        $('.tijiao span.inpu').css({'background':'#fff','color':'#ccc','border-color':'#ccc'});
				      }
				     }).keyup(function() {
				      if($(this).val().length!=0){
				        $('.tijiao span.inpu').css({'background':'#2789fc','color':'#fff','border-color':'#2789fc'});
				      }else{
				        $('.tijiao span.inpu').css({'background':'#fff','color':'#ccc','border-color':'#ccc'});
				      }
				     });
				     id_m.bind({
				          paste : function(){
				            $('.tijiao span.inpu').css({'background':'#2789fc','color':'#fff','border-color':'#2789fc'});
				          }
				      });
				 });
				</script>
			 <script type="text/javascript">
			  $('.comment-btn2').click(function(){
				//  alert(11122);
				      $("#myformzx").submit();
			   /* var data = {property:id,mobile:$('.input_m input').val(),content:$('#tValue').val()};
			    if(!yee.isMoblie(data.mobile)){
			      yee.layerOpen('请输入正确的手机号码',2);
			      return false;
			    }
			    if(!data.content){
			      yee.layerOpen('请填写您的问题');
			      return false;
			    }
			    yee.post('/api/property-comment.html',data,function(result){
			      yee.layerOpen(result.msg);
			    },function(error){
			      yee.layerOpen('发生错误');
			    });*/
			  });
			</script>
		    <!-- 咨询点评 -->
		
		
		    <div class="dp_hide">
		        <!-- 周边配套 -->
		        <div class="Newest_xx">
		            <div class="Newest_xx_title clearfix">
		                <div class="Newest_xx_title_box clearfix" style="width:107px">
		                  <i></i>
		                    <span>周边配套</span>
		                </div>
		            </div>
		            <div class="Newest_xx_zbpt">
		               
		            </div>
		        </div>
		    </div>
		    </div>
		    <div class="dp_hide">
		        <!-- 全景看房 -->
		        
		        <!-- 推荐楼盘 -->
		        
		
		
		        <!-- 周边楼盘 -->
		        <div style="margin-top: 20px;" class="periphery">
		            <ul class="periphery_title">
		                <li><i></i>周边楼盘</li>
		              <!--   <li optionId1="2">推荐楼盘</li> -->
		            </ul>
		            <ul class="periphery_loup periphery_loup1">
                      <?php
                         $row = $mysql->query("select * from `web_content` where `pid`='9' order by px desc limit 0,3");// and `flag` like '%t1%'
                                foreach($row as $k=>$list){
							$url="../loupan/show.php?lpid={$list['id']}";
                            ?>
                	<li class="clearfix">
		                    <div class="periphery_loup_img">
		                    	<a href="<?php echo $url;?>">
		                    		<img src="<?php echo $site.$list['img'];?>" alt=""> 
		                    		<i style="display:none;">在售</i>
		                    	</a>
		                    </div>
		                    <div class="periphery_loup_text">
		                        <div class="periphery_loup_text_title periphery_loup_text_title1"><a href="<?php echo $url;?>"><?php echo $list['title'];?></a></div>
		                        <div class="periphery_loup_text_title">
		                            <span class="loup_text_title_jq">均价：<em><i><?php echo $list['title'];?></i>元/㎡</em></span>
		                        </div>
		                        <div class="periphery_loup_text_title periphery_loup_text_title2" style="display:none;">
		                            <i>陵水</i>
		                            <i>住宅</i>
		                            <i>花园洋房</i>
		                        </div>
		                        <div class="periphery_loup_text_title"><span class="loup_text_title_wz">已有<em class="emd"><?php echo (int)$list['esfcx'];?></em>人关注</span></div>
		                    </div>
		                    <div class="tel_call"><a href="tel:<?php echo telsee($list['loupan_tel']);?>"><img src="images/tel_calltu.png" alt=""></a></div>
		                </li>
            	<?php
                            }
                        ?>
		                
		                
		              
		            </ul>   
		
		            <div class="periphery_gd" style="display:none;"><a href="<?php echo $sitem;?>loupan">查看更多楼盘 &gt;&gt;</a></div>     
		        </div>
		
		 
		        <!-- 看房团定制 -->
			<style>
		  /*清除浮动--推荐使用*/
		    .clearfix:before,.clearfix:after{content: '';display: table;}
		    .clearfix:after{clear: both;}
		  .kfdz_div{ margin-top: 10px;}
		  .kfdz_main{width: 100%; height: auto; background: #fff;}
		  .kfdz_head{ position: relative;}
		  .kfdz_headbg{ width: 100%;  height: 110px;}
		  .kfdz_headbg img{ width: 100%; height: 100%;}
		  .kfdz_headtext{ text-align: center; position: absolute; left: 50%; top: 15%; margin-left: -70px; margin-top: -7px; width: 140px; height: auto;}
		  .kfdz_headtext p.dinzhi{font-size: 0.8rem; color: #181818; text-align: center;}
		  .kfdz_headtext p.renshu{ display: inline-block; margin-top: 5px; background: #181818; font-size: 0.5rem; text-align: center; padding:2px 16px; color: #fff; border-radius: 30px;}
		  .kfdz_headtext p.renshu span{ color: #ffcc41;}
		  .kfdz_center{margin-top: 10px;}
		  .kfdz_center ul li+li{ margin-left: 3%}
		  .kfdz_center ul li{ width: 31%; text-align: center; float: left; }
		  .kfdz_center ul li i{ display: block; width: 60px; height: 60px; margin: 0 auto;}
		  .kfdz_center ul li i img{ width: 100%; height: 100%;}
		  .kfdz_center ul li p{font-size: 0.5rem; color: #666; text-align: center; margin-top: 8px;}
		
		  .kfdz_input{width: 70%; margin: 0 auto; margin-top: 20px;}
		  .kfdz_input ul li{ height: 30px; line-height: 30px; margin: 10px 0;}
		  .kfdz_input ul li span{ display: inline-block; float: left; font-size: 0.6rem; color: #666;}
		  .kfdz_input ul li .Input{ display: inline-block; float: left; width: 85%; height: 30px; line-height: 30px; border: 1px solid #ccc; padding-left: 2%; font-size: 0.5rem;color: #666; border-radius: 5px; margin-left: 2%;}
		
		 .kfdz_input ul li a.Showings{ background: #FF913E; height: 32px; line-height: 32px; text-align: center; float: right; width: 85%; font-size: 0.6rem; color: #fff; border-radius: 30px; position: relative; right: 5px;}
		
		  @media screen and (min-width: 300px) and (max-width: 374px) {
		    .kfdz_headbg{ width: 100%;  height: 100px;}
		    .kfdz_headtext{margin-top: -8px;}
		    .kfdz_input ul li .Input{ width: 83%;}
		    .kfdz_input ul li a.Showings{width: 84%; right: 2px;}
		    .kfdz_headtext p.renshu{ font-size: 0.5rem;}
		  }
		
		</style>
		<div class="kfdz_div">
		  <div class="kfdz_main">
		    <div class="kfdz_head">
		      <div class="kfdz_headbg"><img src="images/kfdz_topbg.png" alt=""></div>
		      <div class="kfdz_headtext">
		        <p class="dinzhi">看房定制</p>
		        <p class="renshu">已有<span><?php echo (int)$infos['esfcx'];?></span>人定制</p>
		      </div>
		    </div>
		    <div class="kfdz_center">
		      <ul class="clearfix">
		        <li>
		          <i><img src="images/kfdz_tub1.png" alt=""></i>
		          <p>个性化定制</p>
		        </li>
		        <li>
		          <i><img src="images/kfdz_tub2.png" alt=""></i>
		          <p>全程免费看房</p>
		        </li>
		        <li>
		          <i><img src="images/kfdz_tub3.png" alt=""></i>
		          <p>大平台有保障</p>
		        </li>
		      </ul>
		    </div>
		    <div class="kfdz_input">
		      <ul>
              <form id="myformzx2" name="myformzx2" method="post" action="../save.php?action=baoming" onSubmit="return checkLm(this);">
        <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
<input type="hidden" name="pid" value="33">
<input type="hidden" name="ly" value="手机楼盘内页定制">
		        <li class="clearfix">
		          <span>姓名</span>
		             <input class="Input sign-neme2"  name="uname" placeholder="您的姓名" type="text">
		        </li>
		        <li class="clearfix">
		          <span>电话</span>
		             <input class="Input sign-mobile2" name="utel" placeholder="您的联系电话" type="text">
		        </li>
		        <li class="clearfix">
		          <a href="javascript:;" class="Showings sign-btn2">开始定制</a>
		        </li>
                </form>
		      </ul>
              <script type="text/javascript">
			  $('.sign-btn2').click(function(){
				//  alert(11122);
				      $("#myformzx2").submit();
			   /* var data = {property:id,mobile:$('.input_m input').val(),content:$('#tValue').val()};
			    if(!yee.isMoblie(data.mobile)){
			      yee.layerOpen('请输入正确的手机号码',2);
			      return false;
			    }
			    if(!data.content){
			      yee.layerOpen('请填写您的问题');
			      return false;
			    }
			    yee.post('/api/property-comment.html',data,function(result){
			      yee.layerOpen(result.msg);
			    },function(error){
			      yee.layerOpen('发生错误');
			    });*/
			  });
			</script>
		    </div>
		    <div style="height:20px;"></div>
		  </div>
		
		</div>
		
		        <!-- 全景看房iframe 盒子 A-->
		        <div class="max_3D">
		        </div>
		        <!-- 全景看房iframe 盒子 E-->
		    </div>
		     
		    
		    
		  
		
		
			<script src="js/swiper-3.4.2.min.js" type="text/javascript" charset="utf-8"></script>
		    
		
		
		
		
		   
 
		
		
		
		</section>
		</section>
		
 <style>
	
	.footer-nav {

    padding-bottom: 0rem;

}
	
	</style>		
		    
		    
		
<?php include("../bottom.php");?>
	
	</body>
</html>
