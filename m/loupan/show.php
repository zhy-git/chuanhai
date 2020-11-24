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
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="wap-font-scale" content="no">
<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0,target-densitydpi=medium"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<meta content="telephone=no" name="format-detection" />
<meta content="email=no" name="format-detection" />
<title><?php echo $infos['title'];?>|<?php echo $infos['title'];?>售楼处：<?php echo telsee($infos['loupan_tel']);?> <?php echo $infos['title'];?>楼盘详情_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>">   
    <link rel="stylesheet" href="/public/static/phone/css/v2.0/house_v2.css" />
    <link href="/public/static/phone/css/my.css" rel="stylesheet">
    <script src="/public/static/phone/js/flexible.js"></script>
    <script  src="/public/static/libs/jquery/1.x/jquery.min.js" type="text/javascript"></script>
    <script src="/public/static/common/js/jquery.form.js"></script>    
    <script src="/public/static/libs/layer/mobile/layer.js"></script> 
    <link rel="stylesheet" href="/public/static/phone/css/v2.0/swiper-3.4.2.min.css"/>    
    <link href="/public/static/home/css/video-js.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="/public/static/home/js/lp/video.js"></script>
    <script src="/public/static/phone/js/swiper-3.4.2.min.js"></script> 
    <!-- <script src="//msite.baidu.com/sdk/c.js?appid=1599154404206584"></script> -->
<?php include("../sq2.php");?>     
</head>
<style>
.qx-btn{color: #00A0EA;font-size: 0.345rem;font-weight: normal;}
.msn_2 p,.msn_2 h2,.msn_2 h1,.msn_2 h3{display: inline;}
/*2019-4-2*/
.house-nav-navh .avt{border-bottom: 2px solid #00A0EA;}
.house-nav-navh .avt p{color: #00A0EA}
.build-intro-wrap .title{font-size: .5rem;padding-top: .1rem}
.build-intro-wrap .title+.type{background: #00A0EA;color: #fff;margin-top: .2rem;margin-left: .1rem;line-height: .45rem;}
.build-intro-wrap .icons-sm-team {width: .5rem;height: .5rem;position: absolute;left: .25rem;top: .12rem;}
.build-intro-wrap .btn-tmbm{position: absolute;right: .25rem;font-size: .36rem;}
.build-intro-wrap .house-tag span{float: left;/*background: #f2f2f2;color: #999999;*/margin-right: .1rem;padding: .05rem .15rem;border-radius: 3px;}
.build-intro-wrap .clearfix{padding-bottom: .6em}
.line1{border-bottom: 1px solid #e1e1e1}
.build-intro-wrap .icontent{width: 100%}
.build-intro-wrap .i-next {top: 0;background: url(/public/static/phone/img/icons/right.png) no-repeat;width: .5rem;height: .7rem;}
.house-hui{background: url(/public/static/phone/img/bg.jpg) no-repeat;height: 1.5rem;background-size: 100%;position: relative;}
.house-hui .btn-hui{border: 1px solid #00A0EA;color: #00A0EA;position: absolute;right: .3rem;padding: .15rem .2rem;top: .2rem;border-radius: 3px;}
.house-hui .hui-img{position: absolute;left: 10px;top: 4px;width: 38px;}
.house-hui .hui-txt{position: absolute;left: 56px;top: 3px;}
.house-hui .hui-txt .txt-1{font-size: .4rem;color: #00A0EA;overflow: hidden;text-overflow: ellipsis;white-space: nowrap; max-width: 6rem}
.house-hui .hui-txt .txt-2{font-size: .35rem;}
.house-hui .hui-txt .txt-color1{font-size: .35rem;color: #00A0EA;}
.house-tj-c,.house-info-c,.house-ppg-c,.house-lpys-c{background: #fff;border-radius: 5px;}
.house-tj-c .bk-title .title {margin: 0 .57em;padding: .5em 0 .1rem;font-size: .45rem;font-weight: 700;color: #333}
.house-tj-c .bk-title p{margin: 0 .8em;padding: 0 0 .1rem;color: #999999}
.house-tj-c .house-tj-list{margin: 0 .8em;padding: 0 0 .1rem;}
.build-intro-wrap{border-radius: 5px;}
.lp_pic i {background: rgba(0,0,0,0) url(/public/static/phone/img/icons/pic.png) no-repeat 5px;float: left;height: 25px;padding-left: 8px;width: 20px;}
.lp_pic {background: #000 none repeat scroll 0 0;border-radius: 2px;bottom: 10px;box-shadow: 0 1px 3px rgba(0,0,0,.2);color: #333;cursor: pointer;display: inline-block;font-size: 12px;height: 25px;opacity: .8;position: absolute;right: 10px;text-align: center;width: 68px;border-radius: 30px;}
.lp_pic span {color: #fff;display: inline-block;height: 25px;line-height: 25px;font-size: .2rem;}
.rows {clear: both;overflow: hidden;}
html,body{position:relative;height:100%;min-height:100%;}
.build-intro-wrap .title {font-size: 1.43em;line-height: 1.4em;height: 1.4em;font-weight: 600;padding-top: .5em;max-width: 5rem;overflow: hidden;float: left;color: #545252;text-overflow: ellipsis;white-space: nowrap;}
#cideoPlay1 { background:#000;}
</style>
  
<body class="detailpage">

  <?php if($sitecityid==45){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14397&companyId=416&channelid=14397&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
  <?php if($sitecityid==43){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14396&companyId=416&channelid=14396&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
  <?php if($sitecityid==44){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14395&companyId=416&channelid=14395&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
  <?php if($sitecityid==42){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14394&companyId=416&channelid=14394&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
<div class="mf-content">
    <div class="zh_housecon-pic pr">
    <link rel="stylesheet" href="/m/loupan/css/common.css">
    <!-- <link rel="stylesheet" href="m/loupan/css/swiper.min.css"> -->
    <link rel="stylesheet" href="/m/loupan/css/show_fang.css">
        <div id="houseInfo" data-info='{"name":"<?php echo $infos['title'];?>","loupanid":<?php echo $infos['id'];?>,"addr":"<?php echo $infos['xmdz']?>"}'></div>
        <div class="zh_housecon-pic-img lincss"> 
            <ul>
                <li>
                    <div class="swiper-container">
                        <div class="swiper-wrapper">
                                    <?php if($infos['src7']<>''){?>
                            <div class="swiper-slide">
                                <div class="Tceng">
                                   <video id="cideoPlay1" width="100%" height="400px" controls poster="/<?php echo $infos['src8'];?>" webkit-playsinline="tes"  preload="none" x5-video-player-type="h5" x5-video-player-fullscreen="true" x-webkit-airplay="true" playsinline="" > 
                                        <source src="/<?php echo $infos['src7'];?>" type="video/mp4" >                                                                                           
                                    </video>
                                  <!--  <video id="cideoPlay1" class="IIV" src="/<?php echo $infos['src7'];?>" poster="/<?php echo $infos['src8'];?>" preload="none" x5-video-player-type="h5" x5-video-player-fullscreen="true" x-webkit-airplay="true" webkit-playsinline="tes" playsinline="">
                                     
    </video>-->
                        <div id="videoPlay" >
                            <div class="poster-cover" id="videoPosterCover"><img src="/<?php echo $infos['src8'];?>"></div>
                            <div class="playBtn"></div>
                        </div>
                                       <!--<div style="width:100%; position:absolute; height:400px;  top:0;" onClick="ssv();"></div>-->
                                </div>
                            </div>                             
                                <?php }?>                             
                                <div class="swiper-slide">                                  
                                    <a href="/m/loupan/photo/<?php echo $lpid;?>.html" style="display: block;"> 
                                    <img src="/<?php echo $infos['src4'];?>" alt="<?php echo $infos['title'];?>">
                                    </a>                    
                                </div>                    
                                <div class="swiper-slide">                                  
                                    <a href="/m/loupan/photo/<?php echo $lpid;?>.html" style="display: block;"> 
                                    <img src="/<?php echo $infos['src5'];?>" alt="<?php echo $infos['title'];?>">
                                    </a>                    
                                </div>                   
                                <div class="swiper-slide">                                  
                                    <a href="/m/loupan/photo/<?php echo $lpid;?>.html" style="display: block;"> 
                                    <img src="/<?php echo $infos['src3'];?>" alt="<?php echo $infos['title'];?>">
                                    </a>                    
                                </div>                         
                                <div class="swiper-slide">                                  
                                    <a href="/m/loupan/photo/<?php echo $lpid;?>.html" style="display: block;"> 
                                    <img src="/<?php echo $infos['src6'];?>" alt="<?php echo $infos['title'];?>">
                                    </a>                    
                                </div>                         
                                <div class="swiper-slide">                                  
                                    <a href="/m/loupan/photo/<?php echo $lpid;?>.html" style="display: block;"> 
                                    <img src="/<?php echo $infos['src2'];?>" alt="<?php echo $infos['title'];?>">
                                    </a>                    
                                </div>                                       
							</div>
                         <div class="swiper-pagination bbb"></div>
                    </div>
                </li>
            </ul>
            <!-- 外层盒子结束 -->
            <script src="/m/loupan/js/common.js?v=2"></script>
            <script src="/m/loupan/js/show_fang.js?v=02"></script>
            <div class="lp_pic">
                <a href="javascript:;" title='【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>'>
                    <i></i>
                    <span><?php echo countxc('all',$lpid);?></span><!--1/-->
                </a>
            </div>
             <?php if($infos['src7']<>''){?>
            <script>$('.lp_pic').hide();</script>
            <?php }?>
        </div>
        <a delay="false" onclick="history.back(-1)" class="backicon"></a>
        <a delay="false" href="javascript:;" id="navBtn" class="backi"></a>
    </div>
<style>
.swiper-container-horizontal > .swiper-pagination-bullets, .swiper-pagination-custom, .swiper-pagination-fraction{width: 130px;bottom:5px;left:50%;margin-left:-65px;}
.swiper-pagination-bullet{border-radius:5px;display: inline-block;/*height: 20px;line-height: 20px;text-align: center;width: 40px;*/background: #fff;border:1px #00A0EA solid;    opacity:0.8;color: #00A0EA;font-size: 12px;}
.bbb .swiper-pagination-bullet-active{background: #00A0EA;opacity:1;}
.swiper-pagination-bullet-active{color: #fff;}
 <?php if($infos['src7']<>''){?>
.lp_pic{z-index:2;display: none;}

            <?php }else{?>
.lp_pic{z-index:2;}
		<?php }?>
.swiper-slide img{width: 100%}
.btn-ljtg {color: #00A0EA;border: 1px solid #00A0EA;border-radius: 30px;padding: 0px 4px;right: 12px;top: 10px;padding: .15rem .5rem;font-size: .35rem;position: absolute;width: 1.5rem;height: .45rem;z-index: 10}
.block-wrap .bk-title .title{color: #333;font-size: .45rem;}

 <?php if($infos['src7']<>''){?>
 .swiper-pagination-bullet:first-child{height: 20px;line-height: 20px;text-align: center;width: 40px;}
 .swiper-container-horizontal > .swiper-pagination-bullets{ width:180px;}
 <?php }?>

.house-tj-ul li{box-shadow:0px 0px 13px 4px #f1f1f1;border-radius: 5px;padding: .2rem;margin-bottom: .2rem;}
.house-tj-ul li .pic{width: 2.98667rem;height: 2.24rem;overflow: hidden;float: left;margin-right: .2133rem;}
.house-tj-ul li .pic img{width: 2.98667rem;height: 2.24rem;overflow: hidden;}
.house-tj-ul li .txt h3{font-size: .35rem;padding-top: .2rem}
.house-tj-ul li .txt .btn-qiang-tj{background: #fdefea;padding: .2rem .35rem;border-radius: 30px;position: absolute;right: 1px;top: .7rem;color: #ef0000;font-size: .35rem}
.house-tj-ul li .txt p{padding: .2rem;font-size: .35rem}
.house-tj-ul li .txt del{font-size: .35rem}
.house-info-c h3{margin: 0 .57em;padding: .5em 0 .1rem;font-size: .45rem;font-weight: 700;color: #333;}
.house-info-c .more {font-size: .3733rem;color: #8a8a8a;font-weight: 400;float: right;margin-top: .3rem;margin-right: 5px;position: relative;width: 2rem;height: .5rem;}
.house-info-c .more .icons-more{top: 0;background: url(/public/static/phone/img/icons/right2.png) no-repeat;padding: .2rem;position: absolute;top: 2px;right: 0;}
.house-info-c .more a{position: absolute;right: .4rem;width: 1.5rem;}
.house-info-c1{margin: 0 .7em;padding: .5em 0 .1rem;font-size: .35rem;color: #333;}
.house-info-c1 span{font-size: .35rem}
.house-info-c1 .txt-1{color: #999}
.house-info-c1 .txt-2{color: #333}
.house-info-c1 .info li{ margin-bottom: .12rem;font-size: .373rem;color: #77808a;line-height: .66rem;overflow: hidden;}
.house-info-c1 .link-area li{float: left;}
.house-info-c1 .link-area li:first-of-type {margin-right: .56rem;}
.house-info-c1 .link-area li a {display: block;color: #888888;text-align: center;font-size: .37rem;box-sizing: border-box;width: 100%;height: 1.22rem;line-height: 1.2rem;background-color: #f7f7f7;border-radius: .10667rem;overflow: hidden;}
.house-info-c1 .link-area li a {width: 4.18rem;}
.house-info-c1 .link-area li .icon {margin-right: .1rem;display: inline-block;font-size: .5rem;color: #888888;vertical-align: top; margin-top: .4rem}
.house-info-c1 .link-area li .icon-notice{background: url(/public/static/phone/img/icons/zoushi.png) no-repeat;padding: .2rem;background-size: 16px 14px;}
.house-info-c1 .link-area li .icon-msg{background: url(/public/static/phone/img/icons/tongzhi.png) no-repeat 0px 0px;padding: .24rem;background-size: 17px 14px;}
.house-ppg-c{padding: .35rem}
.house-ppg-c .c{height: .7rem}
.house-ppg-c .icons-jp{width: 20px;height: 26px; position: absolute;top: 1px;}
.house-ppg-c .icons-right{position: absolute;top: 0px;right: -.2rem;}
.house-ppg-c .c .title{ position: absolute;left: .7rem;top: 1px; font-size: .45rem}

.sizetype1,.sizetype2,.sizetype3 {background: #fff;overflow: auto;margin-bottom: 0;webkit-overflow-scrolling: touch;padding: .714em;}
.sizetype1 li,.sizetype2 li,.sizetype3 li {float: left;margin-right: 14px;width:115px}
.sizetype1 li img,.sizetype2 li img ,.sizetype3 li img {width: 115px;height:115px;}
.house-info-c{height: 8rem}
.house-info-c .sizetype1 p,.house-info-c .sizetype2 p,.house-info-c .sizetype3 p{padding-bottom: .1rem;font-size: .35rem} 
.house-info-c .sizetype1 .status,.house-info-c .sizetype2 .status,.house-info-c .sizetype3 .status{background: #f85751;padding: 0 .1rem;color: #fff;border-radius: 5px;font-size: .35rem}

.house-hx-kf{margin: 0 .7em;padding: .5em 0 .1rem;font-size: .35rem;color: #333;border-top: 1px solid #ddd;position: relative;}
.house-lpys,.timeline,.house-video{margin: 0 .9em;padding: .5em 0 .1rem;font-size: .35rem;color: #333;}
.house-hx-kf .pic{width: 1.7rem}
.house-hx-kf .pic img{width: 1.5rem;height: 1.5rem;border-radius: 50%;}
.fl{float: left;}
.fr{float: right;}
.btn-hxjj{color: #00A0EA;border: 1px solid #00A0EA;padding: .2rem .3rem;border-radius: 30px;}
.mt15{margin-top: 15px;}
.house-hx-kf .status{font-weight: normal;font-size: .35rem;background: #f5f5f5;color: #c8c8c8;padding:0 .15rem}
.house-lpys .trend{overflow: hidden;}
.house-lpys .trend li{position:relative;padding-bottom:.6rem}
.house-lpys .trend li:before{position:absolute;content:'';width:.2rem;height:.2rem;left:0;top:.2rem;background:#00A0EA;border-radius:100%}
.house-lpys .column{display:-webkit-flex;display:flex;flex-flow:column}
.house-lpys .trend li a{padding-left:.5rem}
.house-lpys .trend li a em{font-size:.45rem;color:#333;font-family:arial}
.house-lpys .trend li a p{font-size:.4rem;color:#999;line-height:.6rem;word-break:break-all}
.house-lpys .trend li:after{position:absolute;content:'';width:1px;height:100%;left:.085rem;top:.4rem;background:#00A0EA}
.house-lpxx-c{height: auto;background-size: 9.8rem 6.5rem;position: relative;background: #fff7ed;border-radius: 5px;}
.timeline .inn {border-left: 1px solid #ecf0f4;}
.feed-item {position: relative;margin-bottom: .6933rem;}
.feed-has-tag .feed-item {margin-bottom: .8rem;}
.feed-item .circle{position:absolute;left:-.114rem;width:.2rem;height:.2rem;background-color:#47b3e3;border-radius:50%;overflow:hidden}
.feed-item .circle-orange {background: #ff9f24;}
.feed-detail {color: #3e4a59;padding-left: .2933rem;}
.feed-detail .date{position:relative;top:-.1rem;color:#77808a;font-size:.32rem;height:.533rem;line-height:.533rem;margin-bottom:.32rem;overflow:hidden}
.feed-has-tag .feed-detail .date{top:-.15rem;margin-bottom:.18rem}
.m-icon-bg1{background-image:url(/public/static/phone/img/icons/m-icon-bg1.png);background-repeat:no-repeat;background-size:4rem 7rem}
.feed-detail .date .status-tag{float:left;box-sizing:border-box;width:1.06rem;height:.618rem;text-align:center;font-size:.32rem;color:#fff;padding-top:.08rem;margin-top:-.05rem;margin-right:.32rem}
.feed-detail .date .dt-tag{background-position:-2rem -4.94rem}
.feed-detail .title{margin-bottom:.14rem;font-size:.42667rem;font-weight:700;line-height:.6rem;color:#3e4a59}
.feed-detail .content{font-size:.3733rem;max-height:1.17rem;line-height:.58667rem;display:-webkit-box;text-overflow:ellipsis;-webkit-line-clamp:2;-webkit-box-orient:vertical;overflow:hidden}
.feed-detail .date .kp-tag {background-position: -2rem -3.94rem;}
.feed-detail .date .jf-tag {background-position: 0 -4.42rem;}
.feed-detail .date .zj-tag {background-position: 0 -5.42rem;}
.house-info-c .link-area li a{display:block;color:#FFF;text-align:center;font-size:.3733rem;box-sizing:border-box;width:100%;height:1.22rem;line-height:1.2rem;background-color:#7bbcfd;border-radius:.10667rem;overflow:hidden}
.feed-item .circle-green {background: #00A0EA;}
.feed-item .circle-orange {background: #ff9f24;}
.feed-item .circle-pink {background: #f86280;}
.feed-item .circle-blur {background: #639ef6;}
.link-area li .icon-sub {background: url(/public/static/phone/image/dingyue.png) no-repeat -2px;padding: .3rem;background-size: 20px 20px;}
.icon-more1 {background: url(/public/static/phone/img/icons/more2.png) no-repeat 0px;padding: .3rem;background-size: 18px 18px;}
.lpys-h{height: 4.6rem;overflow: hidden;}
.house-yyin .pic { width:1.2rem; height:1.2rem;border-radius: 50%; overflow:hidden;}
.house-yyin .pic img {width: 1.2rem;border-radius:0;}
.house-yyin .yyin{background: url(/public/static/phone/img/icons/yuyin.gif) no-repeat 5px; width:8rem;height: 1rem;background-size: 7.8rem .75rem;line-height: 1.1rem}
.house-yyin .yyin .y-1{padding-left: .9rem}
.house-yyin .yyin .y-2{padding-left: .3rem}
.house-yyin .yyin span{color: #fff}
.wd-txt-c p{font-size: .40rem;    line-height: 20px;}
</style>
<script>
    var proportion = 640 / 421;
    var width = $(window).width();
    var height = Math.round(width / proportion);
    $('.zh_housecon-pic-img').height(height);
    $('#cideoPlay1').height(height);
    $('.swiper-slide img').height(height);
    $('.swiper-slide').height(height);

    var mycars=new Array(<?php if($infos['src7']<>''){ echo '"视频",';}?>"","","","","");
	<?php if($infos['src7']<>''){?>
    var video1=document.getElementById("cideoPlay1");
	<?php }?>
    var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    paginationClickable: true,
    onSlideChangeEnd: function(swiper){
		console.log(swiper.activeIndex);
		<?php if($infos['src7']<>''){?>
    if(swiper.activeIndex==1){
		
    video1.pause();
	
    $('.lp_pic').show();
    }else if(swiper.activeIndex==0){
    // video1.play();
    $('.lp_pic').hide();
    }
	
	<?php }else{?>
	
    $('.lp_pic').show();
    
	<?php }?>
    },                        
    paginationBulletRender: function (swiper, index, className) {
    return '<span class="' + className + '">' + mycars[index] + '</span>';
    }
    });
	
		<?php if($infos['src7']<>''){?>
    video1.onclick=function(){
    if(video1.paused){
    video1.play();
    }else{
    video1.pause();
    }
    }<?php }?>
</script>
<!-- 轮播 end-->
    <div class="clear"></div>
    <div class="house-nav1 htop1" style="margin-top: 0;">
        <ul class="house-nav-navh">
        
            <li class="avt"><a href="/m/loupan/<?php echo $lpid;?>.html"><p>主页</p></a></li>
            <li><a href="/m/loupan/detail/<?php echo $lpid;?>.html"><p>详情</p></a></li>
            <li><a href="/m/loupan/photo/<?php echo $lpid;?>.html"><p>相册</p></a></li>
            <li class="act"><a href="/m/loupan/huxing/<?php echo $lpid;?>.html"><p>户型</p></a></li>
            <li class="last-wrap"><a href="/m/loupan/zb/<?php echo $lpid;?>.html"><p>配套</p></a></li>
        </ul>
    </div>
    <div class="rows" style="padding: 0 .15rem">
        <div class="build-intro-wrap">        
            <a href="/m/loupan/tgbm/<?php echo $lpid;?>.html" class="btn-ljtg btn-dynamic">
                <img src="/image/tel.gif" class="icons-sm-team">
                <span class="btn-tmbm">报名团购</span>
            </a>        
            <div class="clearfix pr">
                 <span class="title"><?php echo $infos['title'];?></span>
                 <span class="type"><?php
            $flagztz='';
			  $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='8' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $infos['ztz'])){
					echo ''.$listflag['flag'];
				}
			}
			?></span>
                 <span class="bm" style="display: none;"><b><?php if($infos['esfcx']<>'' and $infos['esfcx']<>'0'){echo (int)$infos['esfcx'];}else{ echo rand(350,820);}?></b>人已报名</span>
            </div>
            <div class="house-tag">
            <?php //echo loupanflagts86s2($infos['flagts'],6,4);?>
            <?php echo loupanflagts86($infos['flagts'],6,4);?>
                             
                <div class="clear"></div>
            </div>
            <div class="blank10"></div>
            <div class="line1"></div>
            <div class="blank15"></div>
              
            <div class="clearfix" style="position: relative;">
                <span class="price mf-fl">
                <?php if($infos['all_price']==0){?>
							<?php if($infos['jj_price']==0){?>
                <small>均价约：&nbsp;</small><b>待定</b></span>
                                    <?php }else{?>
                <small>均价约：&nbsp;</small><b><?php echo $infos['jj_price'];?></b>元/㎡</span>
                                    <?php }?>
                                <?php }else{?>
                <small>总价约：&nbsp;</small><b><?php echo $infos['all_price'];?></b>万/套</span>
                          
                            <?php }?>
                <span style="position: absolute;right: 15px;top: 6px; display:none;"><a href="/sanya/calculator?id=1430" style="font-size: .35rem;">房贷计算器</a></span><i class="imgico i-next"></i>                
            </div>            
            <div class="icontent" style="display: none;">            
                <small>起&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;价：&nbsp;</small>
                <i class="imgico i-next"></i>
                <?php if($infos['qj_price']==0){?>
               待定
                                    <?php }else{?>
               <?php echo $infos['qj_price'];?>元/㎡
                                    <?php }?>
                            </div>            
            <div class="icontent">            
                <small>更新：</small>
                <span><?php echo date("Y年m月d日");?></span>
            </div>  
                        <div class="icontent">            
                <small>预算：</small>
                <a href="tel:<?php echo telsee($infos['loupan_tel']);?>"><i class="imgico i-next"></i><span style="color: #00A0EA">咨询首付及贷款明细</span></a>
            </div>    
            <div class="clear"></div>
            <div class="blank10"></div>
                        <div class="house-hui">
                <img src="/public/static/phone/img/icons/liwu2.png" class="hui-img">
                <div class="hui-txt">
                    <p class="txt-1"><?php echo $infos['fkfs'];?></p>
                                        <p class="txt-2">距离结束剩余<span class="txt-color1"><?php echo date("t")-date("d");?></span>天  <span class="txt-color1"><?php if($infos['esfcx']<>'' and $infos['esfcx']<>'0'){echo (int)$infos['esfcx'];}else{ echo rand(350,820);}?></span>人已报名</p>
                </div>
                <a href="javascript:;" onclick="openwid4('立即报名','我们将为您保密个人信息！为您提供楼盘免费预约专车看房服务！','【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>楼盘手机内页_立即报名',2);" class="btn-hui">立即报名</a>
            </div>         
                    </div>
        <div class="blank10"></div>
        <?php if($infos['get_url']<>''){?>
        <a href="<?php echo $infos['get_url'];?>" style="display: block;">
        <div style="background: url(/m/image/M_VrBg.png) no-repeat;height: 2rem;background-size: 100%;position: relative;">
           
        </div>
        </a>   
        <div class="blank10"></div>
        <?php }?>
        <a href="tel:<?php echo telsee($infos['loupan_tel']);?>" style="display: block;">
        <div style="background: url(/public/static/phone/img/icons/tel3.gif) no-repeat;height: 2rem;background-size: 100%;position: relative;">
            <h3 style="position: absolute;left: .5rem;color: #fff;font-size: .8rem;top: .1rem"><?php echo telsee($infos['loupan_tel']);?></h3>
        </div>
        </a>        
    </div>
    <!-- 特价房源 -->
        <!-- 特价房源 end-->
    <div class="blank10"></div>
    <!-- 楼盘信息 -->
    <div class="rows" style="padding: 0 .15rem">
        <div class="house-info-c" style="height: auto;">
            <div class="title">
                <div class="more"><a href="/m/loupan/detail/<?php echo $lpid;?>.html">查看全部</a><i class="icons-more"></i></div>
                <h3>楼盘信息</h3>                
                <div class="clear"></div>
            </div>
            <div class="house-info-c1">
                <ul class="info">
                    <li>
                    <?php if($infos['all_price']==0){?>
							<?php if($infos['jj_price']==0){?>
                <span class="txt-1">均 价 :&nbsp;</span> <span class="txt-2">待定</span>
                                    <?php }else{?>
                <span class="txt-1">均 价 :&nbsp;</span> <span class="txt-2"><?php echo $infos['jj_price'];?>元/㎡</span>
                                    <?php }?>
                                <?php }else{?>
                <span class="txt-1">总 价 :&nbsp;</span> <span class="txt-2"><?php echo $infos['all_price'];?>万/套</span>
                            <?php }?>
                            </li>
                    <li><span class="txt-1">装 修 :</span> <span class="txt-2"><?php echo loupanflagzx($infos['flagzx'],5)?></span></li>
                    <li><span class="txt-1">户 型 :</span> <span class="txt-2"><?php echo $infos['zlhx'];?></span></li>
                    <li><span class="txt-1">开 盘 :</span> <span class="txt-2"><?php echo $infos['kptime'];?></span></li>
                    <li><span class="txt-1">物 业 :</span> <span class="txt-2"><?php echo $infos['wygs'];?></span></li>
                    <li><span class="txt-1">地 址 :</span> <span class="txt-2"><?php echo $infos['xmdz'];?></span></li>
                </ul>
                <div class="clear"></div>          <?php
                    $gwid=sjgw();
								$gws = $mysql->query("select * from `web_content` where `id`='{$gwid}' limit 0,1");
					?>      
                <!-- yuyin -->
                <?php if($infos['src9']<>""){?>
                                <div class="yuyinbao">
                <a href="javascript:;" class="openboyin" style="display: block;">
                <div class="house-yyin">                    
                    <div class="pic fl">
                    
                        <img src="/<?php echo $gws[0]['img'];?>">
                    </div>
                    <div class="yyin fl">
                        <span class="y-1">楼盘详情在线讲房</span><span class="y-2"><?php if($infos['esfcx']<>'' and $infos['esfcx']<>'0'){echo (int)$infos['esfcx'];}else{ echo rand(350,820);}?>人听过</span>
                    </div>                                        
                    <div class="clear"></div>
                </div> 
                </a>
                </div>
                                <div class="blank10"></div>
                                <?php }?>
                <!-- yuyin end-->                
                <ul class="link-area">
                    <li>
                        <a href="javascript:;" data-id="<?php echo $lpid;?>" data-name="<?php echo $infos['title'];?>" onclick="openwid4('降价通知我','价格变动这么快？！楼盘降价的消息我们将第一时间通知您！','【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>楼盘手机内页_变价通知我',3);" style="width: 4.18rem;">
                            <span class="icon icon-notice"></span>降价通知我
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;" data-id="<?php echo $lpid;?>" data-name="<?php echo $infos['title'];?>" onclick="openwid4('开盘通知我','输入您的手机号码，免费订阅楼盘开盘提醒，不再错失好房源。','【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>楼盘手机内页_开盘通知我',3);" style="width: 4.18rem; background:#F97171;">
                            <span class="icon icon-msg"></span>开盘通知我
                        </a>
                    </li>
                </ul>
                <div class="clear"></div>
                <div class="blank5"></div>
            </div>
        </div>       
    </div>
    <!-- 楼盘信息 end-->
    <div class="lpitem g-press">           
        <a data-tag="1" href="javascript:phone('<?php echo telsee($infos['loupan_tel']);?>',6);" class="lptel pad10" id="lptel">
            <p class="telinfo">
                <span class="num">售楼热线：<?php echo telsee($infos['loupan_tel']);?></span>最新开盘、户型及优惠信息、详情请致电咨询
            </p>
            <p class="phone"><img src="/public/static/home/image/v2.0/tel.gif"></p>
         </a>
    </div>
    <!-- 户型介绍 -->
    <div class="rows" style="padding: 0 .15rem">
        <div class="house-info-c" style="height: auto;">
            <div class="title">
                <div class="more"><a href="/m/loupan/huxing/<?php echo $lpid;?>.html">全部户型</a><i class="icons-more"></i></div>
                <h3>户型介绍</h3>                
                <div class="clear"></div>
            </div>
            <div class="sizetype2">
                <ul class="clearfix">
                 <?php
			$hxtnum=0;
			$row = $mysql->query("select * from `web_pic` where `luopan_id`='{$lpid}' and `pid_flag` = 'xc1' order by pic_px desc limit 0,10");
			foreach($row as $k=>$list){
				$hxtnum=$hxtnum+1;
			
		?>
            <li>
                        <a href="/loupan/huxing/<?php echo $lpid;?>_<?php echo $list['id'];?>.html" style="display: block;">
                         <div class="pic">
                             <img src="/<?php echo $list['pic_img'];?>">
                         </div>
                         <div class="txt">
                             <p><strong><?php echo $list['pic_name'];?></strong>&nbsp;<span class="status"><?php echo $list['zt'];?></span></p>
                             <p>建面<?php echo $list['mj'];?>m² </p>
                             <p class="red"><?php echo $list['prices'];?>万/套</p>
                         </div>
                        </a>
                     </li>
<?php
			}
		?> 	
                              
                </ul>
                <div class="clear"></div>    
            </div>  
            <div style="height: 12px"></div>
                        <div class="house-hx-kf">
                <div style="height: 8px"></div>
                <div class="pic fl"><div style=" width:1.5rem; height:1.5rem;border-radius: 50%; overflow:hidden;" ><img src="/<?php echo $gws[0]['img'];?>" style="height:auto;border-radius:0;"></div></div>
                <div class="fl mt5">
                    <p style="font-size: .4rem;font-weight: 700;padding-bottom: .1rem"><?php echo $gws[0]['title'];?>&nbsp;<span class="status">行业资深顾问</span></p>
                    <p style="color: #999"> 咨询人数 : <span style="color: #00A0EA"><?php echo $gws[0]['keyword'];?></span>人</p>
                </div>
                <div class="fr mt10" style="line-height: 1rem"><a href="tel:<?php echo telsee($infos['loupan_tel']);?>" class="btn-hxjj">户型讲解</a></div>
                <div class="clear"></div>
            </div>   
                        
        </div>        
    </div>
    <!-- 户型介绍 end-->
    <div class="blank10"></div>
    <!-- 楼盘优势 -->   
    <?php if($infos['pid']==9){?>
        <div class="rows" style="padding: 0 .15rem; display:none;">
        <div class="house-info-c" style="height: auto;overflow: hidden;">
            <div class="title">
                <h3>楼盘优势</h3>                
            </div>
            <!-- start -->
            <div class="house-lpys">
                <div class="lpys-h">
                <ul class="trend">
                             <?php

					$sql="WHERE `pid`='83' and `lpid`='{$lpid}' ";
					$row = $mysql->query("select * from `web_content_dp` {$sql} order by addtime desc");
							foreach($row as $k=>$list){
					?>
                        <li><a href="javascript:;" class="column">
                            <em><?php echo $list['title'];?></em>                    
                            <p> <p><?php echo $list['content'];?></p></p>
                            </a>
                        </li>
	      <?php
	}
?>      	     
                      
                </ul>
                </div>
            <div class="blank10"></div>
            <p class="center"><a href="javascript:;" style="font-size: .4rem;color: #00A0EA" class="lpys-more">查看更多</a></p>
            <div class="blank10"></div>
            </div>
            <!-- end -->
        </div>
    </div>
    <?php }?>
        <!-- 楼盘优势 end-->
    <div style="height: 1rem"></div>
        <div style="padding:0 .15rem">
    <div class="house-lpxx-c">
        <div style="position: absolute;top: -28px;left: .8rem;"><img src="/public/static/phone/img/icons/yhxx.png" style="width: 8rem"></div>
        <div style="padding: .5rem;font-size: .4rem;color: #eb5149;">
            <div style="height: 10px"></div>
            <p style="line-height: .6rem"><?php echo $infos['djyh'];?></p>
        </div>
            <div style="margin-left: 10px;">
          
                <form id="frm_yykf" method="post" action="/m/save">
                    <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
                    <input type="hidden" name="post[subject]" value="<?php echo $infos['title'];?>">
    <input type="hidden" name="action" value="bmtj">
    <input type="hidden" name="pid" value="33">
                    
    <input type="hidden" name="ly" value="【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>_手机优惠活动报名" id="make_tit_4">
                    <input type="hidden" name="frm_id" id="frm_id" value="5"> 
                    <div class="pr" style="width: 8.5rem">
                        <div style="background: #fff;height: 1rem;width: 7rem;border-radius: 3rem;">
                        <input class="hy_sj" type="text" placeholder="请输入您的手机号码" name="utel" autocomplete="off" id="find-mobile-2" style="position: absolute;top: 13px;border: 0;background: transparent;left: 17px;font-size: .35rem;"></div>
                    <input class="sub_hd" type="submit" value="立即报名" style="position: absolute;right: 1px;width: 3rem;border: 0;background: #fc0e08;height: 1rem;top: 0px;color: #fff;font-size: .4rem;border-radius: 3rem;border: 1px solid #fc0e08;">
                    </div>
                </form>
                 <div style="height: 10px"></div>
            </div>
    </div>
    </div>
        <!-- 领视频 -->    
    <div class="blank10"></div>
    <!-- 楼盘动态 -->
    
        <?php if($infos['get_url']<>''){?>
    <div class="rows" style="padding: 0 .15rem">
        <div class="house-info-c" style="height: auto;">
            <div class="title">
                <div class="more"><a href="<?php echo $infos['get_url'];?>" target="_blank">查看全部</a><i class="icons-more"></i></div>
                <h3>全景VR</h3>                
                <div class="clear"></div>
            </div>
            <iframe src="<?php echo $infos['get_url'];?>" width="100%" height="350" style="border:0px;"></iframe>
            <div class="blank10"></div>
        </div>
    </div>
    <!-- 楼盘动态 end-->
    <div class="blank10"></div>
    <?php }?>
    <!-- 楼盘动态 -->
    <div class="rows" style="padding: 0 .15rem">
        <div class="house-info-c" style="height: auto;">
            <div class="title">
                <div class="more"><a href="/m/loupan/news/<?php echo $lpid;?>.html">查看全部</a><i class="icons-more"></i></div>
                <h3>楼盘动态</h3>                
                <div class="clear"></div>
            </div>
            <!-- start -->
            <div class="timeline">
                <div class="inn">
                <?php

					$sql="WHERE `pid`='28' and `lpid`='{$lpid}' ";
					
					$row = $mysql->query("select * from `web_content` {$sql} order by id desc limit 0,3");
					
							foreach($row as $k=>$list){
								$url='/m/loupan/news_show/'.$list['id'].'.html';
					?>
                    <div class="feed-item">
                    <div class="circle circle-green"></div>                    
                    <div class="feed-detail">
                        <a href="<?php echo $url;?>">
                            <div class="date">
                                <span class="status-tag  m-icon-bg1 kp-tag">动态</span><?php echo date('Y-m-d',strtotime($list['addtime']));?></div>
                            <div class="title"><?php echo $list['title'];?></div>
                            <div class="content">
                             <p><?php echo mb_substr(strip_tags($list['content']),0,130,"utf-8"); ?>...</p>
                            </div>
                        </a>
                    </div>
                </div>
	      <?php
	}
?>      				
			
				</div>
            </div>
            <!-- end -->
            <div class="rows" style="padding: 0 .15rem">
                <ul class="link-area">
                    <li>
                        <a href="javascript:;" data-id="<?php echo $lpid;?>" data-name="<?php echo $infos['title'];?>" onclick="openwid4('订阅最新动态','输入您的手机号码，免费订阅楼盘动态获取最新消息。','【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>楼盘手机内页_订阅最新动态',3);" style="background: #fef0e7;color: #00A0EA;font-size: .4rem"><span class="icon icon-sub"></span>订阅最新动态</a>
                    </li>
                </ul>
            </div>
            <div class="blank10"></div>
            <!-- 精彩视频 -->
                        <div class="house-video" style="display:none;">
                <div class="title">
                    <h3 style="margin: 0;">精彩视频</h3>                
                </div>
                <div class="blank10"></div>
                <div class="sizetype1" style="padding: 0px;">
                    <ul class="clearfix">
                                                <li style="width: 145px">
                             <a href="/info/367551.html">
                             <div class="pic pr">
                                 <img src="/public/static/phone/img/icons/index_play.png" style="position: absolute;top: 30px;left: 60px;width: 30px;height: 30px;">
                                 <img src="/public/uploads/20190227/2314fcd1603c80380683bdef653514cd.jpg" style="width: 145px;height: 108px;border-radius: 5px;">
                                 <div style="position: absolute;top: 70px;left: 0;text-align: center;width: 100%"><span style="color: #fff">摩迩&nbsp;&nbsp;拍摄视频</span></div>
                             </div>
                             </a>
                        </li>
                                                                              
                    </ul>
                    <div class="clear"></div>    
                </div>  
            </div>
                        <!-- 精彩视频 end-->
        </div>
    </div>
    <!-- 楼盘动态 end-->
    <div class="rows" style="padding: 0 .15rem">
        <div class="lqsp-box" style="border-radius: 5px;background: #fff url(/public/static/phone/img/video.jpg) no-repeat 5px;background-size: 40px 40px;">
             <a href="javascript:;" data-id="<?php echo $lpid;?>" data-name="<?php echo $infos['title'];?>" onclick="openwid4('领取视频','我们将为您保密个人信息！深入了解房子面貌，获取真实房源信息！!','【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>楼盘手机内页_领取视频',5);" style="position: absolute;right: 10px;border: 1px solid #00A0EA;color: #00A0EA;padding: .15rem .35rem;border-radius: 5px;">立即领取</a>
             <p style="position: absolute;right: 6px;top: 38px;">已有<?php if($infos['esfcx']<>'' and $infos['esfcx']<>'0'){echo (int)$infos['esfcx'];}else{ echo rand(350,820);}?>人领取</p>
            <div style="padding: 5px 5px 5px 43px;">       
            <p  class="lqsp-1">视频看房 真实体验</p>
            <p class="lqsp-2">深入了解房子面貌，获取真实房源信息！</p>
            </div>
        </div>
    </div>
    <!-- 领取视频 -->
   <div class="blank10"></div> 
    <!-- 买房问大家 -->
<style type="text/css">
.house-wd-1{margin: 0 .57em;padding: .5em 0 .1rem;color: #333;background: #f5f5f5;border-radius: 5px;margin-bottom: .1rem}
.major-infor {margin-bottom: .15rem; margin-left: .15rem;}
.major-infor .face {position: relative;float: left;width: 1.3rem;height: 1.3rem;margin-right: .2667rem;text-align: center;}
.major-infor .cmt-name {height: .56rem;line-height: .56rem;overflow: hidden;}
.major-infor .text .cmt-name {font-size: .373rem;color: #3e4a59;margin-bottom: .08rem;}
.major-infor .face img {width: 1.1rem;height: 1.1rem;border-radius: 50%;}
.major-infor .text .cmt-name p {font-weight: 700;}
.major-infor .text .cmt-name span {font-size: .32rem;color: #77808a;font-weight: 400;margin-left: .213rem;}
.house-wd-ul li{float: left;width: 1.5rem}
.text .cmt-tit{font-size: .35rem}
.btn-more-wd{display: inline-block;width: 100%;height: 1.226rem;font-size: .4rem;color: #00A0EA;line-height: 1.226rem;background: #fef0e7;border-radius: 8px;border: none;}
.wd-box{height: 37px;overflow: hidden;}
</style>    
    <div class="rows" style="padding: 0 .15rem">
        <div class="house-info-c" style="height: auto;">
            <div class="title">                
                <h3>买房问大家</h3>                                
            </div>
            <div class="blank10"></div> 
            <div class="wd-box_bbbb" style="border-bottom: 1px solid #ddd;">
				
                  <?php
		
		$row = $mysql->query("select * from `web_book` WHERE `pid`='30' and `cl`='1' and `lpid`='{$lpid}'  order by id desc limit 0,3");// WHERE `adminid`='{$_SESSION['admin_id']}'
$wdnum=0;
		foreach($row as $k=>$list){
			$url='/m/loupan/wenda/show_'.$list['id'].'.html';
			$wdnum=$wdnum+1;
			
			
                    $gwid2=sjgw();
					$gws2 = $mysql->query("select * from `web_content` where `id`='{$gwid2}' limit 0,1");
?>
				
                    <div class="house-wd-1">
                    <div class="fl" style="width: 30px;text-align: center;padding: .1rem"><img src="/public/static/phone/img/icons/question.png" style="width: .4rem"></div>
                    <div class="fl" style="width: 8.1rem;font-size: .35rem;font-weight: 700;"><span style="font-size: .4rem"><?php echo $list['ucontent'];?></span></div>
                    <div class="clear"></div>
                </div>
                    <!-- start -->               
                <div class="blank10"></div>
                <div class="major-infor pr">
                    <div class="face">                   
                              
                        <a href="javascript:;"><img src="/<?php echo $gws2[0]['img'];?>" alt="<?php echo $gws2[0]['title'];?>"></a>      
                                             
                    </div>
                    <div class="text">
                        <div class="cmt-name">
                            <p><?php echo $gws2[0]['title'];?><span>行业资深顾问</span></p>
                        </div>
                        <div class="cmt-tit">
                            <h4>咨询人数：<span style="color: #00A0EA"><?php echo $gws2[0]['keyword'];?></span>次</h4>
                        </div>
                    </div>
                    <div style="position: absolute;right: 1px;top: 1px;">
                        <ul class="house-wd-ul">
                            <li><a href="<?php echo $shangqiao;?>"><img src="/public/static/phone/img/icons/wei.jpg" alt="" style="width: 1rem;height: 1rem;"></a></li>
                            <li><a href="tel:<?php echo telsee($infos['loupan_tel']);?>"><img src="/public/static/phone/img/icons/tel2.gif" alt="" style="width: 1rem;height: 1rem;"></a></li>
                        </ul>
                    </div>
                    <div class="clear"></div>
                                    
                        <div class="house-wd-c">
                            <div class="fl" style="width: 30px;text-align: center;padding: .1rem"><img src="/public/static/phone/img/icons/answer.png" style="width: .4rem"></div>
                            <div class="fl" style="width: 8.1rem;font-size: .35rem;">
                                <div class="wd-box-<?php echo $list['id'];?> wd-box wd-txt-c"><p><?php echo $list['acontent'];?></p></div>
                                                                <p><a href="javascript:;" style="color: #999" data-id="<?php echo $list['id'];?>" class="wd-zk">[展开全文]</a></p>
                                                                <div class="blank10"></div>
                                <p><span style="color: #999"><?php echo date('Y-m-d',strtotime($list['addtime']));?></span></p>
                            </div>
                            <div class="clear"></div>                    
                        </div>                    
                    </div>                
                    <div class="line1"></div>            
                    <div class="blank10"></div>
                                    <!-- end -->  
				 
<?php
		}
?>
            
				</div>            
            <div class="blank10"></div>
            <p class="center" style="padding: .1rem"><a href="/m/loupan/wenda/<?php echo $lpid;?>.html" class="btn-more-wd"><span class="icon icon-more1"></span>查看更多问答</a></p>
            <div class="blank10"></div>
        </div>
    </div>
    <!-- 买房问大家 end-->
    <!-- 楼盘相册 -->
    <div class="blank10"></div>
    <!-- 户型介绍 -->
    <div class="rows" style="padding: 0 .15rem">
        <div class="house-info-c" style="height: auto;">
            <div class="title">
                <div class="more">
                                        <a href="/m/loupan/photo/<?php echo $lpid;?>.html">查看全部</a><i class="icons-more"></i>
                                    </div>
                <h3>楼盘相册</h3>                
                <div class="clear"></div>
            </div>
            <div class="sizetype3">
                <ul class="clearfix">
                <?php
		
			$row = $mysql->query("select * from `web_pic` where `luopan_id`='{$lpid}' and `pid_flag` <> 'xc1' order by pic_px desc limit 0,10");
			foreach($row as $k=>$list){
				
			
		?>
                     <li style="width: 145px;">
                       <a href="/m/loupan/photo/<?php echo $lpid;?>_<?php echo $list['id'];?>.html" style="display: block;">
                            <div class="pic"><img src="/<?php echo $list['pic_img'];?>" style="width: 145px;height: 108px;"></div>
                            <div class="txt"><p><?php echo loupanflag($list['pid_flag'],9);?></p></div>
                        </a>
                    </li>   
<?php
			}
		?> 	
         </ul>
                <div class="blank10"></div>   
            </div>                
        </div>        
    </div>
    <!-- 户型介绍 end-->
    <div class="clear"></div>    
     <div class="blank10"></div>   
    <!-- 楼盘相册 end--> 
<style type="text/css">
.lpys_rlist .c{display: none;}
.lpys_rlist .show{display: block;}
.lpys_rlist .c p{font-size: .35rem;line-height: 22px;}
.tag_menu li{text-align: center;}
.lqsp-box{width:auto;height:auto;padding:5px;position:relative;margin-top:10px;background:#fff url(/public/static/phone/image/icons/video.png) no-repeat 3px;background-size:37px 40px}
.btn-lqsp{position:absolute;right:5px;width:1.6rem;text-align:center;color:#fff;background:#00A0EA;padding:.2rem;top:16px;font-size: .35rem;border-radius: 5px;}
.lqsp-box .lqsp-1{font-size: .5rem;}
.lqsp-box .lqsp-2{font-size: .3rem;padding-top: 3px;}
.litem .i_time{line-height:18px;font-size: .35rem;color: #999;background: url(/public/static/phone/img/icons/time.png) no-repeat;padding-left: 20px;}
.i_house_tag li{float:left;width:30.44%;height:.8rem;border:1px solid #ddd;text-align:center;line-height:.86rem;margin-bottom:.2rem;border-radius: 3px;margin-right: .2rem;font-size: .4rem;}
.show_news_box{display: none;}
.i_house_tag .act{background: #00A0EA;color: #fff;}
.i_house_tag .typeOn{background: #00A0EA;color: #fff;}
.center{text-align: center;}
.no_info{padding-top: 10px;font-size: .4rem;color: #999}
.autoh{height: auto;}
</style>
    <!-- 领视频 end-->
    <div class="clear"></div>
<script>
//$(function() {   
//    var cid=1; 
//    $('#a_news_tag').find('li').click(function() {                
//        $('#a_news_tag').find('li').attr('class', '');
//        $(this).attr('class', 'act');
//        var cid=$(this).attr('data-type');
//        $('#a_news_box').html('')    //调用选择模块
//        fun3(cid);
//    })
//    function fun3(cid){        
//        $.ajax({
//            type: 'GET',
//            url:  '/sanya/newsform2?cid='+cid+ '&houseid=1430',
//            dataType: 'json',
//            success: function(data){
//                if(data){
//                    $('#a_news_box').append(data)    //调用选择模块
//                }else{
//                   $('#a_news_box').append('<p class="center no_info">温馨提示：此栏目暂无信息，更多详情请电话咨询！</p>');
//                    return  false;
//                }                           
//            },
//            error: function(xhr, type){
//                // alert('Ajax error!');
//                // 即使加载出错，也得重置
//               // me.resetload();
//            }
//        });
//    }
//    fun3(cid);
//})
$(function() {
    $('#lpdy_ul1').find('li').click(function() {
        $(this).addClass("typeOn").siblings().removeClass("typeOn");
        var _index = $(this).index();
        $('.sizewrap').eq(_index).addClass("show").siblings().removeClass("show");
    })    
    $(".house-wd-c").on('click','.wd-zk',function(){
        var id=$(this).attr('data-id');
        if($('.wd-box-'+id).hasClass("autoh")){
            $(this).html("[展开全文]");  
            $('.wd-box-'+id).removeClass("autoh"); 
        }else{
            $(this).html("[收起]"); 
            $('.wd-box-'+id).addClass("autoh");  
        }
    });          
    $(".house-lpys").on('click','.lpys-more',function(){               
         if($('.lpys-h').hasClass("autoh")){
            //存在                   
            $('.lpys-more').html("查看更多");  
            $('.lpys-h').removeClass("autoh");   
        }else{         
            $('.lpys-more').html("收起");            
            $('.lpys-h').addClass("autoh");            
        }
    });
})
</script>
<div  class="clear"></div>
<div class="rows" style="padding: 0 .15rem">
    <div class="block-wrap" style="border-radius: 5px;overflow: hidden;">
        <div class="bk-title"><div class="title">周边配套</div></div>
        <div class="zbpt bg-1">
            <div class="mapwrap pr">
                <div class="y_lpdt" id="y_lpmap" data-jwd="<?php echo $infos['zbx'];?>,<?php echo $infos['zby'];?>" data-jg="<?php echo $pricess;?>" data-title='<?php echo $infos['title'];?>'>
                </div>
                <div class="loc">
                    <a href="/m/loupan/zb/<?php echo $lpid;?>.html">
                        <i class="ico1"></i>  
                        <span class="ellipsis"><?php echo $infos['xmdz'];?></span>
                        <i class="arrow"></i>
                    </a>
                </div>
            </div>
            <!-- icons -->
            <div class="y_lpdt_list">
                <ul class="c">
                    <li>
                        <a href="javascript:;">
                            <p class="y_tu"><img src="/public/static/phone/img/icons/ico_44.png" alt="学校"></p>
                            <p class="y_text">学校</p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <p class="y_tu"><img src="/public/static/phone/img/icons/ico_45.png" alt="医院"></p>
                            <p class="y_text">医院</p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <p class="y_tu"><img src="/public/static/phone/img/icons/ico_46.png" alt="交通"></p>
                            <p class="y_text">交通</p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <p class="y_tu"><img src="/public/static/phone/img/icons/ico_47.png" alt="餐饮"></p>
                            <p class="y_text">餐饮</p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <p class="y_tu"><img src="/public/static/phone/img/icons/ico_48.png" alt="娱乐"></p>
                            <p class="y_text">娱乐</p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <p class="y_tu"><img src="/public/static/phone/img/icons/ico_49.png" alt="购物"></p>
                            <p class="y_text">购物</p>
                        </a>
                    </li>
                    <li>
                        <a href="javascript:;">
                            <p class="y_tu"><img src="/public/static/phone/img/icons/ico_50.png" alt="银行"></p>
                            <p class="y_text">银行</p>
                        </a>
                    </li>
                </ul>
                <div class="clear"></div>
            </div>
            <!-- icons end-->
        </div>
        <div  class="clear"></div>
    </div>
</div>
<div class="rows" style="padding: 0 .15rem">
    <div class="lqsp-box" style="border-radius: 5px;background:#fff url(/public/static/phone/img/peitao.jpg) no-repeat 6px 13px;background-size: 40px 40px;">
         <a href="javascript:;" data-id="<?php echo $lpid;?>" data-name="<?php echo $infos['title'];?>" onclick="openwid4('区域配套','输入您的手机号码，免费获取楼盘学区购物等配套信息。','【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>楼盘手机内页_区域配套',3);" style="position: absolute;right: 10px;border: 1px solid #00A0EA;color: #00A0EA;padding: .15rem .35rem;border-radius: 5px;">前往领取</a>
         <p style="position: absolute;right: 6px;top: 38px;">已有<?php if($infos['esfcx']<>'' and $infos['esfcx']<>'0'){echo (int)$infos['esfcx'];}else{ echo rand(350,820);}?>人领取</p>
        <div style="padding: 5px 5px 5px 43px;">       
        <p  class="lqsp-1">区域配套</p>
        <p class="lqsp-2">获取学区购物等配套信息</p>
        </div>
    </div>
</div>
<!-- 领取视频 -->
<div class="blank10"></div>
<style type="text/css">
.house-hot-list{background: #fff;border-radius: 5px;}
.house-hot-list li{float: left;width: 49%;text-align: center;font-size: .45rem;border-bottom: 2px solid #fff;line-height: 1rem;}
.house-hot-list .act{border-bottom: 2px solid #00A0EA;}
.a{display: none;}
.show{display: block;}
.house-hot-box{padding: .2rem}
.h-main .pic {float: left;height: 2.5rem;width: 3.5rem;margin-right: .213rem;border-radius: .1067rem;}
.h-main .text{float: left;width: 5rem;position: relative;overflow: hidden;}
.h-main .text .tit{max-width: 3rem;height: .667rem;font-size: .4267rem;color: #3e4a59;font-weight: 700;line-height: .6rem;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;}
.h-main .txt-info span{font-size: .35rem;color: #999}
.h-main .txt-info .price{font-size: .45rem;color: #ef0000}
.h-main .txt-info{margin-bottom: .1rem}
.h-info-1{margin-top: .2rem}
.house-hot-tag{margin-left: 10px;}
.house-hot-tag span{border: 1px solid #cacaca;padding: 0 .2rem;border-radius: 3px;color: #999;margin-left: .1rem}
.h-info-1 span{color: #999}
.h-info-2{background: #f5f5f5;border-radius: 3px;margin-top: 10px;float: left;width: 9rem}
.h-info-3{line-height: 1rem}
</style>
<div class="rows" style="padding: 0 .15rem">
   <div class="house-hot-list">
       <div style="padding: .2rem">
           <ul class="house-hot-ul">
               <li class="act" style="border-right: 1px solid #ddd">热销楼盘</li>
               <li>推荐楼盘</li>
           </ul>
       </div>
       <div class="clear"></div>
        <div class="blank10"></div> 
       <div class="house-hot-box">
           <div class="a show">
               <!-- start -->
                <?php
                     $row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px15 desc limit 0,5");// and `city_id`='57'
						foreach($row as $k=>$list){
						$url="/m/loupan/{$list['id']}.html";
						?>
             <div class="h-main">                
                   <div class="pic fl">
                      <a href="<?php echo $url;?>" style="display: block;">
                       <img src="/<?php echo $list['img'];?>" style="width: 3.5rem;height: 2.5rem;border-radius: 5px;">
                      </a>
                   </div>
                   <div class="text">
                        <a href="<?php echo $url;?>" style="display: block;"><h4 class="tit"><?php echo $list['title'];?></h4></a>
                       <div class="txt-info"><span class="price red"> <?php if($list['all_price']==0){?>
				<?php if($list['jj_price']==0){?>
                 待定
				<?php }else{?>
                 <?php echo $list['jj_price'];?>元/㎡
				<?php }?>
			<?php }else{?>
             <?php echo $list['all_price'];?>万/套
			<?php }?></span></div>
                       <div class="txt-info"><span><?php echo cityname($list['cityall_id']);?>-<?php echo cityname($list['city_id']);?></span></div>
                       <div class="txt-info"><span><?php echo $list['zlhx'];?></span></div>
                                                       <a href="tel:<?php echo telsee($list['loupan_tel']);?>" style="position: absolute;right: 1px;top: 1px;">
                                 
                       <img src="/public/static/phone/img/icons/tel.gif" style="width: 2rem"></a>
                   </div>
                   <div class="clear"></div>
                   <div class="h-info-1">                       
                       <span class="fl"><?php echo rand(1,23);?>小时前有人咨询</span>                       
                       <div class="fl house-hot-tag">
                           <?php echo loupanflagts86s2($list['flagts'],6,4);?>
                           </div>
                       <div class="clear"></div>
                   </div>
                   <?php if($infos['fkfs']<>''){?>
                                      <div class="h-info-2">
                       <span style="padding: 3px 5px;background: #ff6d6f;color: #fff;border-radius: 5px;margin:5px;display: inline-block;">惠</span>
                       <span style="font-size: .36rem;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;max-width: 8rem;"><?php echo $list['fkfs'];?></span>
                   </div>
                   <?php }?>
                                      <div class="clear"></div>
                   <div class="blank10"></div> 
                   <div class="line1"></div>
               </div>
               <div class="blank10"></div>
                <?php
					
					}
					?>
                              <!-- end -->
               <div class="blank10"></div>
           </div>
           <div class="a">
                                <!-- start -->
                              
         <?php
                     $row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px13 desc limit 0,5");// and `city_id`='57'
         shuffle($row);
         foreach($row as $k=>$list){
						$url="/m/loupan/{$list['id']}.html";
						?>
             <div class="h-main">                
                   <div class="pic fl">
                      <a href="<?php echo $url;?>" style="display: block;">
                       <img src="/<?php echo $list['img'];?>" style="width: 3.5rem;height: 2.5rem;border-radius: 5px;">
                      </a>
                   </div>
                   <div class="text">
                        <a href="<?php echo $url;?>" style="display: block;"><h4 class="tit"><?php echo $list['title'];?></h4></a>
                       <div class="txt-info"><span class="price red"> <?php if($list['all_price']==0){?>
				<?php if($list['jj_price']==0){?>
                 待定
				<?php }else{?>
                 <?php echo $list['jj_price'];?>元/㎡
				<?php }?>
			<?php }else{?>
             <?php echo $list['all_price'];?>万/套
			<?php }?></span></div>
                       <div class="txt-info"><span><?php echo cityname($list['cityall_id']);?>-<?php echo cityname($list['city_id']);?></span></div>
                       <div class="txt-info"><span><?php echo $list['zlhx'];?></span></div>
                                                       <a href="tel:<?php echo telsee($list['loupan_tel']);?>" style="position: absolute;right: 1px;top: 1px;">
                                 
                       <img src="/public/static/phone/img/icons/tel.gif" style="width: 2rem"></a>
                   </div>
                   <div class="clear"></div>
                   <div class="h-info-1">                       
                       <span class="fl"><?php echo rand(1,23);?>小时前有人咨询</span>                       
                       <div class="fl house-hot-tag">
                           <?php echo loupanflagts86s2($list['flagts'],6,4);?>
                           </div>
                       <div class="clear"></div>
                   </div>
                   <?php if($infos['fkfs']<>''){?>
                                      <div class="h-info-2">
                       <span style="padding: 3px 5px;background: #ff6d6f;color: #fff;border-radius: 5px;margin:5px;display: inline-block;">惠</span>
                       <span style="font-size: .36rem;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;max-width: 8rem;"><?php echo $list['fkfs'];?></span>
                   </div>
                   <?php }?>
                                      <div class="clear"></div>
                   <div class="blank10"></div> 
                   <div class="line1"></div>
               </div>
               <div class="blank10"></div>
                <?php
					
					}
					?>
                              <!-- end -->
           </div>
       </div>
       <div class="clear"></div>
   </div>
</div>
<script type="text/javascript">
$(function ()
{
     $(".house-hot-ul li").click(function() {
         $(".house-hot-ul li").eq($(this).index()).addClass("act").siblings().removeClass('act');         
         $(".house-hot-box .a").eq($(this).index()).addClass("show").siblings().removeClass('show'); 
     });
});
</script>
<input type="hidden" id="houseid" value="<?php echo $lpid;?>">
<input type="hidden" id="subject" value="<?php echo $infos['title'];?>">
<style type="text/css">
.y_lpdt{width: 100%;height: 260px;}
.y_lpdt_list{ margin-top: 20px;}
.y_lpdt_list ul li{ width: 12.5%; text-align: center; float: left;}
.y_lpdt_list ul li .y_tu{ width: 32px; height: auto; margin: 0 auto;} 
.y_lpdt_list ul li .y_tu img{ width: 100%; height: auto;}
.y_lpdt_list ul li .y_text{ font-size: .35rem; color:#999; margin-top: 5px;}
.y_lpdt_list ul li+li{ margin-left: 2%;}
</style>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=Xbz0agOQpdcCl91FSUYEsoHB7jpL1zSo"></script>
<script type="text/javascript" src="http://api.map.baidu.com/library/CityList/1.4/src/CityList_min.js"></script>
<!-- 底部电话 -->
<script type="text/javascript">
$(function() {
	$("#navBtn,#navBtn1").click(function(){
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

var myVideo = document.getElementById("cideoPlay1");
function ssv()
{
	//alert(1);
if(myVideo.paused)
myVideo.play();
else
myVideo.pause();
//myVideo.stop();
}
</script>
<style type="text/css">
.header {position: relative;overflow: hidden;height: 1.33rem;border-bottom: 1px solid #ddd;background-color: #fbfbfb;line-height: 1.1rem}
.header .go-back {position: absolute;left: .32rem;width: .32rem;top: .1rem;}
.header .go-back .ico-return {float: left;margin-top: .3583rem}
.nav .u-link {position: absolute;top: 0;right: .32rem}
.nav .u-link li {float: left}
.nav .u-link li.link-home {margin-right: .37rem}
.nav .u-link li .ico-home {margin-top: .4516rem}
.nav .u-link .link-home img{width: 26px; height: 26px;}
.ico-return {width: .2667rem;height: .4533rem;}
.u-link li .ico-user {margin-top: .3585rem}
.ico {display: inline-block;overflow: hidden;background: url(/public/static/phone/image/icons/ico-left.png) 0 0 no-repeat;background-size: 100% 100%;text-indent: -9999px;}
.city-change{overflow:hidden;text-align:center;font-size:.4rem;line-height: 1.4rem;}
.city-change .tit{display:block;width:100%;height:100%;line-height:1.4rem;text-align:center;font-size:.5rem;white-space:nowrap;text-overflow:ellipsis;overflow:hidden}    
</style>
<div class="nav sFix">
    <div style="height: 5px;"></div>
    <div class="header" style="z-index: 999;">
            <!--返回上一页-->
            <div class="go-back">
               <a href="javascript:void(0)" onclick="history.back(-1)">
                    <span class="ico ico-return">返回上一页</span>
                </a>
            </div>
            <!--切换城市-->
        <div class="city-change"><span class="text">楼盘详情</span> </div>
        <!--用户行为跳转-->
        <ul class="u-link" style="top: .3rem;right: .2rem;">
            <li class="link-home"><a href="javascript:;" id="navBtn" style="display: block;"><img src="/public/static/phone/image/nav/nav.png"></a></li>                 
        </ul>
    </div>
<?php include("../ny_nav.php");?>
    <div class="fixMask"></div>
</div>
<?php include("foot.php");?>
    </div>
 
</body>
</html>

<?php include("../sq.php");?>


<script type="text/javascript" src="/public/static/phone/js/lp/baidu_map.js?V=2.5"></script>
<script src="/public/static/phone/js/lp/common.js?V=2.5"></script>

<div style="height: 50px"></div>
<div class="s_group3">
    <div class="struts">
        <div class="order">
            <div style="height: 1.2rem;background: url(/public/static/phone/image/v2.0/yinp_2.png)no-repeat;background-size: 100%">
                
            </div><!--make_tit end-->
            <div class="make_tit_3"><span class="t-3" id="make_tit_3">提示：请输入您正确的手机号码继续免费收听，了解更多的楼盘详情。</span></div>
            <form id="frm_up_11" method="post" action="/m/save">
              <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
                    <input type="hidden" name="post[subject]" value="<?php echo $infos['title'];?>">
    <input type="hidden" name="action" value="bmtj">
    <input type="hidden" name="pid" value="33">
                    
            <input type="hidden" name="ly" value="【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>楼盘手机内页_语音播报">                   
                <div class="make_form">
                    <ul>                               
                        <li><input type="text" name="utel" id="mobile_11" placeholder="请输入您的手机号码" class="inp"></li>                               
                    </ul>
                    <div class="clear"></div> 
                </div>
                <div class="blank10"></div>
                <div class="make_submit">                       
                    <a onclick="wid_close3();" class="qx-btn fl" style="color: #00A0EA;">取消</a>
                    <input type="submit" value="确定" name="bsubmit"  style="color: #00A0EA;" class="fr">
                    <div class="clear"></div>                
                </div>
            </form>
        </div>
    </div>
</div>
<div class="s_alert3"></div>
<!-- 音频 -->
<div class="mediaplayer" style="position: fixed;bottom: 47px;width: 100%;text-align: center;background: #000;opacity: 1;padding: 10px 0 10px 0;display: none;">
    <div class="video pr">
        <audio id="player" src="/<?php echo $infos['src9'];?>" controls="controls"></audio>
        <a href="javascript:;" id="closeyinp" style="position: absolute;top: -42px;right: 0px;"><img src="/public/static/phone/image/v2.0/close.png"></a>
        <div id="yuyinzz" style="position: absolute;top: 1px;height: 50px;width: 100%;" onclick="openwid3('语音播报','提示：请输入您正确的手机号码继续免费收听，了解更多的楼盘详情。','【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>楼盘手机内页_语音播报');"></div>
    </div>     
</div>
<div id="timers" style="display: none;"></div>
<script type="text/javascript">
$('.mediaplayer').on('click','#closeyinp',function(){
    var oPlayer=document.getElementById('player');
    oPlayer.pause();          
    $('.mediaplayer').hide();
});
$('.yuyinbao').on('click','.openyinp',function(){
    var oPlayer=document.getElementById('player');
    oPlayer.play();          
    $('.mediaplayer').show();
});
$('.yuyinbao').on('click','.openboyin',function(){        
    $('.mediaplayer').show();
    var oPlayer=document.getElementById('player');
    oPlayer.play();
        var i = 10;
        var tim = document.getElementById("timers");
        var timer = setInterval(function () {
            if (i == -1) {
                openwid3('语音播报','提示：请输入您正确的手机号码继续免费收听，了解更多的楼盘详情。','【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>楼盘手机内页_语音播报');
                var oPlayer=document.getElementById('player');
                 oPlayer.pause();        
                clearInterval(timer);
            } else {
                tim.innerHTML = i;
                --i;
            }
        }, 1000);
});
</script>

