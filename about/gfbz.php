<!DOCTYPE html>
<html lang="zh-CN">
<?php

require("../conn/conn.php");
require("../function.php");
$lm=2;

?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="csrf-param" content="csrf_token_f">
    <title>购房保障-<?php echo $config['site_name'];?></title>
<meta name=keywords content="购房保障-<?php echo $config['site_keyword'];?>">
    <meta name=description content="<?php echo $config['site_desc'];?>">
    <link rel="shortcut icon" href="../image/favicon.ico" />
	<link rel="stylesheet" href="/public/static/home/css/css.css">  
	<link rel="stylesheet" href="/public/static/home/css/home.css">
	<!--[if IE 6]>
	<link rel="stylesheet" href="/public/static/home/css/ie6.css?v=1.0">
	<script src="/public/static/home/js/DD_belatedPNG_0.0.8a.js?v=1.0" type="text/javascript" ></script> 
	<script type="text/javascript"> 
	DD_belatedPNG.fix('*'); 
	</script>  
	<![endif]-->
    
	<script type="text/javascript" src="/public/static/common/js/jquery.min.js"></script>
	<script type="text/javascript" src="/public/static/common/js/jquery.form.js"></script>
	<script type="text/javascript" src="/public/static/layer/layer.js"></script>
    <link href="/css/public.css" rel="stylesheet">
    <link href="/css/alert.css" rel="stylesheet">
    <link rel="stylesheet" href="/public/static/home/css/hjf.css">
    
    <style>
	.btn {

    display: inline-block;
    margin-bottom: 0;
    font-weight: 400;
    text-align: center;
    vertical-align: middle;
    -ms-touch-action: manipulation;
    touch-action: manipulation;
    cursor: pointer;
    background-image: none;
    border: 1px solid transparent;
    white-space: nowrap;
    padding: 9px 12px;
    font-size: 14px;
    line-height: 1.42857;
    border-radius: 4px;
    -webkit-user-select: none;
    -moz-user-select: none;
    -ms-user-select: none;
    user-select: none;

}
	</style>
<?php include("../sq2.php");?>
</head>
<body>
<!-- 悬标 -->
<?php include("../ad_xf.php");?>
<!-- 导航 -->
<?php include("../top.php");?>
<div class="w1200">
	<div class="h10"></div>
	<div class="bz-ad">
		<a href=""><img src="/public/static/home/image/bz/bz__03.jpg"></a>
	</div>
	<!-- 面包屑 -->
    <div class="crumbs">
            <span>您的位置：</span><a href="/" target="_blank">首页</a><em>&gt;</em>
            <a href="/news/" target="_blank"><?php echo $sitecityname;?>楼市</a><em>&gt;</em>
            购房报障
    </div>
	<!-- 面包屑 end-->
	<div class="h20"></div>
	<div class="bz-title">
		<h3>购房保障</h3>
	</div>
	<div class="h20"></div>
	<div class="">
		<div class="w870 fl">
			<!-- left -->
			<div class="safe-nav-l fl">
				<ul class="merit">
	                <li id="two1" onmouseover="setContentTab('two', 1, 8)" class="hover">
	                  <i class="ico1"></i>
	                  <p class="name">便捷</p>
	                  <p class="ms">免费接机</p>
	                  <p class="ms">24小时为您服务</p>
	                </li>
	                <li id="two2" onmouseover="setContentTab('two', 2, 8)" class="">
	                  <i class="ico2"></i>
	                  <p class="name">真实房源</p>
	                  <p class="ms">100%开发商授权</p>
	                  <p class="ms">真房源真房价</p>
	                </li>
	                <li id="two3" onmouseover="setContentTab('two', 3, 8)" class="">
	                  <i class="ico3"></i>
	                  <p class="name">省钱</p>
	                  <p class="ms">报销往返机票</p>
	                  <p class="ms">及酒店住宿费用</p>
	                </li>
	                <li id="two4" onmouseover="setContentTab('two', 4, 8)" class="">
	                  <i class="ico4"></i>
	                  <p class="name">省事</p>
	                  <p class="ms">星级酒店免费入住</p>
	                  <p class="ms">尊享海南特产</p>
	                </li>
	                <li id="two5" onmouseover="setContentTab('two', 5, 8)" class="">
	                  <i class="ico5"></i>
	                  <p class="name">省力</p>
	                  <p class="ms">1000个优质房源</p>
	                  <p class="ms">免费专车接送带看</p>
	                </li>
	                <li id="two6" onmouseover="setContentTab('two', 6, 8)" class="">
	                  <i class="ico6"></i>
	                  <p class="name">老带新</p>
	                  <p class="ms">介绍亲朋好友买房</p>
	                  <p class="ms">他好你更好</p>
	                </li>
	                <li id="two7" onmouseover="setContentTab('two', 7, 8)" class="">
	                  <i class="ico7"></i>
	                  <p class="name">专业</p>
	                  <p class="ms">专业测评</p>
	                  <p class="ms">资深置业顾问</p>
	                </li>
	                <li id="two8" onmouseover="setContentTab('two', 8, 8)" class="">
	                  <i class="ico8"></i>
	                  <p class="name">放心</p>
	                  <p class="ms">无理由退房</p>
	                  <p class="ms">买的安心住的放心</p>
	                </li>
              	</ul>
			</div>
			<!-- left end-->
			<!-- right -->
			<div class="safe-nav-r fl">
				<div id="con_two_1" class="con_two_main" style="display: block;">
					<img src="/public/static/home/image/bz/bz__10.jpg">
					<div class="safe-box-1">
						<h3>免费接机送机</h3>
						<div class="h10"></div>
						<h4 style="text-indent: 25px;">成功购房后终身享受免费接送机</h4>
						<div class="h5"></div>
						<p class="f18 c666" style="font-size: 18px;text-indent: 25px;">在成功购房的所有客户均可享受终身免费24小时接机送机服务</p>
						<div class="h20"></div>
						<p class="c666" style="text-indent: 25px;font-size: 18px;">我们承诺：</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px; line-height: 30px">如我们工作人员拒绝或者因不正当理由拖延为成功购房客户提供免费接机或送机服务。您可拨打全国免费投诉热线：<?php echo $config['company_tel'];?>。最高可获赔偿500元</p>
						<div class="h20"></div>
						<p class="c666" style="text-indent: 25px;font-size: 18px;">承诺细则：</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px;line-height: 30px">1、购房前全岛免费专车接送看房(不含其他交通费);</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px;line-height: 30px">2、购房后享受海口、三亚、澄迈、文昌长期免费接送机服务;</p>
						<div class="h20"></div>
						<p class="center"><img src="/public/static/home/image/bz/bz__38.jpg"></p>
					</div>
				</div>	
				<div id="con_two_2" class="con_two_main" style="display: none;">
					<img src="/public/static/home/image/bz/fy__03.jpg">
					<div class="safe-box-1">
						<h3 style="color: #cc3137">真实房源</h3>
						<div class="h10"></div>
						<h4 style="text-indent: 25px;">100%开发商授权 真房源真房价</h4>
						<div class="h5"></div>
						<p class="f18 c666" style="font-size: 18px;text-indent: 25px;">网站所售楼盘均为开发商授权，合法正规销售项目房源。</p>
						<div class="h20"></div>
						<p class="c666" style="text-indent: 25px;font-size: 18px;">我们承诺：</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px; line-height: 30px">如我们工作人员拒绝或者因不正当理由拖延为成功购房客户提供免费接机或送机服务。您可拨打全国免费投诉热线：<?php echo $config['company_tel'];?>。最高可获赔偿500元</p>
						<div class="h20"></div>
						<p class="c666" style="text-indent: 25px;font-size: 18px;">承诺细则：</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px;line-height: 30px">1、保证特价活动价格信息真实有效；</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px;line-height: 30px">    2、保证价格与售楼现场价格一致；</p>
						<div class="h20"></div>
						<h3 class="red" style="font-size: 18px;padding-bottom: 10px;">*因版面有限下图展示仅为部分开发商授权书</h3>
						<p class="center"><img src="/public/static/home/image/bz/fy__07.jpg"></p>
					</div>
				</div>
				<div id="con_two_3" class="con_two_main" style="display: none;">
					<img src="/public/static/home/image/bz/sq__03.jpg">
					<div class="safe-box-1">
						<h3 style="color: #0090fa">报销机票</h3>
						<div class="h10"></div>
						<h4 style="text-indent: 25px;">报名即享报销往返机票费用</h4>
						<div class="h5"></div>
						<p class="f18 c666" style="font-size: 18px;text-indent: 25px;">为了更好的服务客户特推出，每天通过网络平台报名看房的前20名客户均可享受购房成功后报销往返机票费用！</p>
						<div class="h20"></div>
						<p class="c666" style="text-indent: 25px;font-size: 18px;">我们承诺：</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px; line-height: 30px">如我们工作人员拒绝或者因不正当理由拖延为成功购房客户提供免费接机或送机服务。您可拨打全国免费投诉热线：<?php echo $config['company_tel'];?>。最高可获赔偿500元</p>
						<div class="h20"></div>
						<p class="c666" style="text-indent: 25px;font-size: 18px;">承诺细则：</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px;line-height: 30px">1、购房成功交付全款或成功按揭后，凭机票报销凭证我们工作人员将在30天内给您报销。</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px;line-height: 30px"> 2、每套房子仅报销一次往返机票费用。</p>
						<div class="h20"></div>						
						<p class="center"><img src="/public/static/home/image/bz/sq__07.jpg"></p>
					</div>
				</div>
				<div id="con_two_4" class="con_two_main" style="display: none;">
					<img src="/public/static/home/image/bz/ss__03.jpg">
					<div class="safe-box-1">
						<h3 class="red">免费住宿</h3>
						<div class="h10"></div>
						<h4 style="text-indent: 25px;">报名即享星级酒店免费入住</h4>
						<div class="h5"></div>
						<p class="f18 c666" style="font-size: 18px;text-indent: 25px;">为了更好的服务客户特推出，每天通过网络平台报名看房的前20名客户均可享受星级酒店免费入住的服务！机会难得，快快行动吧！</p>
						<div class="h20"></div>
						<p class="c666" style="text-indent: 25px;font-size: 18px;">我们承诺：</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px; line-height: 30px">如我们工作人员拒绝或者因不正当理由拖延为成功购房客户提供免费接机或送机服务。您可拨打全国免费投诉热线：<?php echo $config['company_tel'];?>。最高可获赔偿500元</p>
						<div class="h20"></div>
						<p class="c666" style="text-indent: 25px;font-size: 18px;">承诺细则：</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px;line-height: 30px">1、通过网络活动报名、来电或在线咨询的客户都可以享受免费入住3天2晚酒店，一个家庭仅限1间房/3个人。</p>						
						<div class="h20"></div>						
						<p class="center"><img src="/public/static/home/image/bz/ss__07.jpg"></p>
					</div>
				</div>
				<div id="con_two_5" class="con_two_main" style="display: none;">
					<img src="/public/static/home/image/bz/sl__03.jpg">
					<div class="safe-box-1">
						<h3 style="color: red">免费看房</h3>
						<div class="h10"></div>
						<h4 style="text-indent: 25px;">看房全程由专业人员免费陪同</h4>
						<div class="h5"></div>
						<p class="f18 c666" style="font-size: 18px;text-indent: 25px;">专业的置业顾问将会根据您的需求，为您推荐适合的房源，为您的合法权益保驾护航。</p>
						<div class="h20"></div>
						<p class="c666" style="text-indent: 25px;font-size: 18px;">我们承诺：</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px; line-height: 30px">如我们工作人员拒绝或者因不正当理由拖延为成功购房客户提供免费接机或送机服务。您可拨打全国免费投诉热线：<?php echo $config['company_tel'];?>。最高可获赔偿500元</p>
						<div class="h20"></div>
						<p class="c666" style="text-indent: 25px;font-size: 18px;">承诺细则：</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px;line-height: 30px"> 1、全岛免费陪同看房；</p>						
						<div class="h20"></div>						
						<p class="center"><img src="/public/static/home/image/bz/sl__07.jpg"></p>
					</div>
				</div>
				<div id="con_two_6" class="con_two_main" style="display: none;">
					<img src="/public/static/home/image/bz/ldx__03.jpg">
					<div class="safe-box-1">
						<h3 style="color: #ff6c00">老带新奖</h3>
						<div class="h10"></div>
						<h4 style="text-indent: 25px;">介绍亲朋好友买房他好你更好</h4>
						<div class="h5"></div>
						<p class="f18 c666" style="font-size: 18px;text-indent: 25px;">累计帮助上万客户在海南安家置业。客户就是我们的衣食父母，为回馈新老客户，成功购房后转介绍新客户购房均有现金奖励 保证真实有效！</p>
						<div class="h20"></div>
						<p class="c666" style="text-indent: 25px;font-size: 18px;">我们承诺：</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px; line-height: 30px">如我们工作人员拒绝或者因不正当理由拖延为成功购房客户提供免费接机或送机服务。您可拨打全国免费投诉热线：<?php echo $config['company_tel'];?>。最高可获赔偿500元</p>
						<div class="h20"></div>
						<p class="c666" style="text-indent: 25px;font-size: 18px;">承诺细则：</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px;line-height: 30px"> 1、购房成功后推荐朋友购买  一次性付款成功：付完全款并签了"商品房买卖合同"（按揭：付完首付款并签了"商品房买卖合同"银行放款）后发放奖励。</p>						
						<div class="h20"></div>						
						<p class="center"><img src="/public/static/home/image/bz/ldx__07.jpg"></p>
					</div>
				</div>
				<div id="con_two_7" class="con_two_main" style="display: none;">
					<img src="/public/static/home/image/bz/zy__03.jpg">
					<div class="safe-box-1">
						<h3 style="color: #1bc5c8">专业测评</h3>
						<div class="h10"></div>
						<h4 style="text-indent: 25px;">专业的置业团队为您保驾护航</h4>
						<div class="h5"></div>
						<p class="f18 c666" style="font-size: 18px;text-indent: 25px;">我们的置业顾问均是行业经验2年以上且经过专业资深导师内训60天考核通过，执证上岗。</p>
						<div class="h20"></div>
						<p class="c666" style="text-indent: 25px;font-size: 18px;">我们承诺：</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px; line-height: 30px">我们专业置业顾问根据您的需求为您定制优质高效的楼盘选择方案，全程科学理性的为您答疑解惑。</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px; line-height: 30px">用我们专业服务让每一个购房者在购房过程中感觉便捷、安心是我们每一个员工的终极价值体现。</p>
										
						<div class="h20"></div>						
						<p class="center"><img src="/public/static/home/image/bz/zy__07.jpg"></p>
					</div>
				</div>
				<div id="con_two_8" class="con_two_main" style="display: none;">
					<img src="/public/static/home/image/bz/fx__03.jpg">
					<div class="safe-box-1">
						<h3 style="color: #3a5efc">无理由退房</h3>
						<div class="h10"></div>
						<h4 style="text-indent: 25px;">客户交付的意向诚意金无理由退</h4>
						<div class="h5"></div>
						<p class="f18 c666" style="font-size: 18px;text-indent: 25px;">客户在任何一个项目所交付的意向诚意金均可无理由随时退还给客户。</p>
						<div class="h20"></div>
						<p class="c666" style="text-indent: 25px;font-size: 18px;">我们承诺：</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px; line-height: 30px">如我们工作人员拒绝或者因不正当理由拖延为成功购房客户提供免费接机或送机服务。您可拨打全国免费投诉热线：<?php echo $config['company_tel'];?>。最高可获赔偿500元</p>
						<div class="h20"></div>
						<p class="c666" style="text-indent: 25px;font-size: 18px;">承诺细则：</p>
						<p class="c666" style="text-indent: 25px;font-size: 18px;line-height: 30px">1、该意向诚意金仅作为认购前的意向金。</p>						
						<p class="c666" style="text-indent: 25px;font-size: 18px;line-height: 30px">2、该意向金仅能为客户提供保留房源的时间期限使用。</p>					
						<p class="c666" style="text-indent: 25px;font-size: 18px;line-height: 30px">3、保留房源的期限根据每个项目的不同规定在（1-7个工作日内）</p>						
						<div class="h20"></div>						
						<p class="center"><img src="/public/static/home/image/bz/fx__07.jpg"></p>
					</div>
				</div>
			</div>
			<!-- right end-->
		</div>
		<!-- right -->
		<div class="loupan-list-right">
			<div class="loupan-list-right-1 center">
				<img src="/public/static/home/image/bz/bz__07.jpg">
			</div>
			<div class="loupan-list-right-1">
				<a href="/"><img src="/public/static/home/image/lp/r-2.jpg"></a>
			</div>
			<div class="h20"></div>
			<div class="loupan-list-right-1 center">
				<div class="p10"><h4 class="center">买新房，找专业置业顾问</h4></div>
			</div>
			<div class="h10"></div>
			<div class="loupan-list-right-1 center">
				<img src="/public/static/home/image/bz/lp_r_1.jpg">
			</div>			
			<div class="h20"></div>
			<div class="loupan-list-right-1 center">
				<img src="/public/static/home/image/bz/lp_r_2.jpg">
			</div>
			<div class="h20"></div>
			<div class="loupan-list-right-1">
				<strong>怕买贵？怕被坑？</strong>
				<p class="name">专业资深置业顾问帮您越过营销陷阱，
				<br>买新房、拿低价</p>
				<div class="h10"></div>
                <form class="submit_area">
                    <input type="hidden" name="pid" value="33">
                    <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
                    <input type="hidden" name="ly" value="[<?php echo cityname($infos['city_id']);?>]<?php echo $infos['title'];?>资讯列表_右侧_报名拿底价">
                    <div class="inp-2" style="height: 25px;">
                        <input type="text" name="mobile" id="lp-list-mobile" placeholder="请输入您的手机号码" maxlength="12"></div>
                    <div class="h10"></div>
                    <div><input type="button" class="btn lp-btn apply_submit" value="报名拿底价"></div>
				</form>		
			</div>
		</div>
		<!-- right end-->
		<div class="clear"></div>
	</div>
</div>








<!-- 随屏 -->
<?php include("../h_top.php");?>
<!-- 随屏 end-->

<script type="text/javascript" src="/public/static/home/js/article/common.js"></script>
<script type="text/javascript" src="/public/static/home/js/article/jquery.cookie.js"></script>
<script type="text/javascript" src="/public/static/home/js/jquery.lazyload.js"></script>
<script type="text/javascript" src="/public/static/home/js/jquery.SuperSlide.2.1.1.js"></script>
<script type="text/javascript" src="/public/static/home/js/index.js"></script>
<!-- 公共底部 end -->


﻿<!-- 图片懒加载 -->
<script src="/public/static/home/js/echo.min.js"></script>
<script>Echo.init({offset: 0,throttle: 0});</script>
<style type="text/css">
    .Telescopic{position:fixed;width:128px;right:40px;bottom:40%}
    .wx{width:128px;height:96px;background:url(/public/static/home/image/v2.0/saoma.png) no-repeat}
</style>
<script src="/public/static/layui/layui.js"></script>

<script src="/public/static/home/js/article/owl.carousel.min.js"></script>
<script src="/public/static/home/js/article/news_commont.js"></script>
<script src="/public/static/home/js/common-enroll.js"></script>
<script>
    $('.newSlier-img').owlCarousel({
        navigation: false,
        slideSpeed: 300,
        paginationSpeed: 400,
        singleItem: true,
        pagination: true,
        autoPlay: true
    });
    $('.banner_prev').click(function() {
        var owl = $(".newSlier-img").data('owlCarousel');
        owl.prev();
    });
    $('.banner_next').click(function() {
        var owls = $(".newSlier-img").data('owlCarousel');
        owls.next('');
    });
    $('#newSlier').hover(function() {
        var len = $('.newSlier-img .item').length;
        if(len > 1) {
            $('.banner_prev').show();
            $('.banner_next').show();
        }
    }, function() {
        $('.banner_prev').hide();
        $('.banner_next').hide();
    });
    // 顶部随屏

</script>
<!-- 报名看房 -->
<div class="black-bg" style="display: none;" id="black_bg"></div>
<div class="send-mess lpm-bx3" style="display: none;">
    <p class="regist-title"><span class="lpm-bx3-t"></span>
        <span class="close close-send lpm-colse2" title="关闭" id="bmkfCallClose">×</span></p>
    <div class="regist-form">
        <p class="send-mess-text1">请留下手机号码，置业顾问会尽快联系您</p>
        <form class="submit_area">
            <input type="hidden" name="pid" value="33">
            <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
            <input type="hidden" name="ly" id="lpsounce" value="[<?php echo cityname($sitecityid);?>]首页报名">
            <input type="text" value="" placeholder="请输入您的手机号码" id="lp-nmkf-mobile" name="mobile" class="regist-input3 mt15">
            <div class="h30"></div>
            <input type="button" value="提交" class="regist-submit apply_submit">
        </form>
    </div>
</div>
<script type="text/javascript">
    function setContentTab(name, curr, n) {
        for (i = 1; i <= n; i++) {
            var menu = document.getElementById(name + i);
            var cont = document.getElementById("con_" + name + "_" + i);
            menu.className = i == curr ? "hover" : "";
            if (i == curr) {
                cont.style.display = "block";
            } else {
                cont.style.display = "none";
            }
        }
    }
</script>
<script type="text/javascript">
    $(function () {
        //底部更多
        $('.footmore').click(function(){
            $(this).parent().parent().toggleClass("on");
        });
        $('.zskmore').click(function(){
            $(this).parent().parent().toggleClass("zsksec").siblings().removeClass('zsksec');
            if($(this).parent().parent().hasClass('zskfivpo zsksec')){
                $(this).text('收起 ∧');
            }else{
                $(this).text('展开 ∨');
            }
        });
        //鼠标移动显示遮罩
        $(".imgtext").hide();
        $(".zzsc").hover(function(){
            $(".imgtext",this).slideToggle(500);
        });

        $('.new_remetstop li').click(function () {
            $('.new_remetstop li').removeClass('dianj');
            $('.new_remetsbt ul').hide();
            $('.new_remetstop li').eq($(this).index()).addClass('dianj');
            $('.new_remetsbt ul').eq($(this).index()).show();
        })
    });
</script>
<?php include("../bottom.php");?>
</body>
</html>
<?php include("../sq.php");?>