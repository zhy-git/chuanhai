<!doctype html>
<html lang="zh-cn">
<?php
require("conn/conn.php");
require("function.php");
?>
<head>
	<meta charset="UTF-8">  
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo $config['site_name'];?></title>
    <meta name=keywords content="<?php echo $config['site_keyword'];?>">
    <meta name=description content="<?php echo $config['site_desc'];?>">
	<meta http-equiv="Cache-Control" content="no-transform" />
		<link rel="shortcut icon" href="../image/favicon.ico" />
	<link rel="stylesheet" href="/public/static/home/css/css.css">  
	<link rel="stylesheet" href="/public/assets/css/style.css">
	<link rel="stylesheet" href="/public/static/home/css/home.css">
    <link href="/css/alert.css" rel="stylesheet">
    
	<link rel="stylesheet" href="/public/static/home/css/zhiye.css">
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
<?php include("sq2.php");?>
</head>
<body style="font-size: 14px;">
<?php include("top.php");?>
<div class="zhiye-ad">
		
</div>
<div class="w1200">
	<div class="h20"></div>
	<div class="title32 center">
		<h3>让买房变得更简单！专业看得见！</h3>
	</div>
	<div class="h20"></div>
	<ul class="zhiye-ul">
	</ul>
	<div class="clear"></div>
	<div class="h20"></div>
    <div class="tit222">      
      <span class="fr xh"><a href="" class="f14 ">全国投诉热线：<?php echo $config['company_tel'];?></a></span>
      置业顾问<span class="f14 pl20">买房您需要一位 置业顾问 分析区域优势 越过营销陷井买到最合适自己的房子</span>
    </div>
    <!-- 列表 -->
    <div class="zskfi">
      <div class="zskcfi">
        <ul class="zy-ul">
        <?php
			$row = $mysql->query("select * from `web_content` where `pid`='68' order by px desc");// and `city_id`='57'
			foreach($row as $k=>$list){
			?>
              
              <li>
              <div class="zy-pic pr">
                <img src="<?php echo $site.$list['img'];?>" width="172" height="224">
                <div class="zy-sreen pa">
                    <p><?php echo $list['title'];?></p>
                    <p><?php echo $list['keyword'];?>人咨询</p>
                    <p>回复率：<?php echo $list['desc'];?></p>
                </div>
              </div>
              <div class="zy-info">
                <div class="p5">
                  <p class="tag">
                  <?php
                        $xgg=$list['get_url'];
						$xgg = str_replace( '，', ",", $xgg);
                        $xgg = explode(",", $xgg);
                        foreach ($xgg as $i => $value) {
                            echo '<span class="b'.($i+1).'">'.$value.'</span>';
                        }
                      ?>
                     </p>
                  <p style="padding-top: 8px;padding-bottom: 8px;"><a style="cursor:pointer;" onClick="sq();" class="btn white">向他咨询</a></p>
                  <p><span class="red"><?php echo $list['sldz'];?></span></p>
                </div>
              </div>
          </li>
            
			<?php
			}
			?>
                   
                </ul>
       <div class="" style="clear:both;"></div>
  <!--  <div class="zhiyeg">下拉</div>-->
     </div>
    </div>
    
    <!-- 列表 end-->
    <div class="fr"></div>
</div>
 <script type="text/javascript">
$(function () {
    $('.zhiyeg').click(function(){
        $(this).parent().parent().toggleClass("zsks").siblings().removeClass('zsksec');          
    }); 
});
</script>
<!-- 置业顾问 end-->

<div class="clear"></div>


<!-- 随屏 -->
<div class="header2" style="display: none;">
  <div class="header2-wrap">
    <ul class="menu">
		<li><a href="/" class="act">首页</a></li>
		<li ><a href="/loupan/">新房</a></li>           
		<li ><a href="/hjf/">海景房</a></li>    
		<li ><a href="/bieshu/">别墅</a></li>
         <li  ><a href="/news/">楼市</a></li>       
    </ul>
    <div class="fr" style="width: 610px">
    <div class="search navigator-bar">
      <!-- 搜索 -->
      <div class="search-box clearfix">
          <span class="sel-val" style="line-height: 30px; height: 30px;">
            <span class="state" id="choosediv" chooseurl="loupan">新房</span>
          </span>
          <input type="text" placeholder="请输入楼盘名称" class="search-inp h_bname" style="height: 30px;">
          <a class="search-btn" href="javascript:;" onClick="seachWord()" style="background: url(/public/static/home/image/icons_v5.png) 12px -20px no-repeat"></a>          
        </div>
      <!-- 搜索 end-->
    </div>
    <div class="hot-phone">
      咨询热线：<span class="phone-txt"><?php echo $config['company_tel'];?></span>
    </div>
    <div class="btn-area"><a href="javascript:;" data-name='报名看房' data-type='首页_报名看房' class="btn2 btn-reg common-free-mobile-btn bmkf-up">报名看房</a></div>
    </div>
    <div class="clear"></div>
  </div>
</div> 
<!-- 随屏 end-->

<script type="text/javascript" src="/public/static/home/js/article/common.js"></script>
<script type="text/javascript" src="/public/static/home/js/article/jquery.cookie.js"></script>
<script type="text/javascript" src="/public/static/home/js/jquery.lazyload.js"></script>
<script type="text/javascript" src="/public/static/home/js/jquery.SuperSlide.2.1.1.js"></script> 
<script type="text/javascript" src="/public/static/home/js/index.js"></script>
<!-- 公共底部 end -->


﻿<!-- 图片懒加载 -->
<script src="/public/static/home/js/echo.min.js"></script>
<script>
Echo.init({
  offset: 0,
  throttle: 0
});
$('.J_indexHouseTab').each(function (i) {
  var _this = $(this);
  _this.find('.index-house-tab-item').removeClass('active').eq(0).addClass('active');
  _this.find('.w-view-center-bar dd').click(function () {
    var index = $(this).index();
    $(this).siblings().removeClass('active');
    $(this).addClass('active');
    _this.find('.index-house-tab-item').eq(index).addClass('active').siblings('.index-house-tab-item').removeClass('active');
  });
});
//热销楼盘、一线海景选项卡
$('.J_indexTopTab .index-tab-title h3').hover(function () {
  var index = $(this).index();
  $(this).addClass('active').siblings('h3').removeClass('active');
  $('.J_indexTopTab').find('.index-tab-container').removeClass('active').eq(index).addClass('active');
});
$('.J_sideMenu').find('li').hover(function () {
  $(this).find('.detail-box').show();
  $(this).find('.aitem').addClass('active');
}, function () {
  $(this).find('.detail-box').hide();
  $(this).find('.aitem').removeClass('active');
});
</script>

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
//顶部随屏
</script>
<style>
.new_remets {
    background: #fff;
    width: 1200px;
    margin: 0 auto 10px;
    border:1px solid #f2f2f2;
}
.new_remetstop {
    border-bottom: 1px solid #f2f2f2;
}
.new_remetstop ul li {
    float: left;
    padding: 16px 0;
}
.new_remetstop ul li a {
    font-size: 20px;
    padding: 0 32px;
    color: #333333;
    border-right: 1px solid #ececec;
}
.new_remetstop ul .dianj {
    border-bottom: 2px solid #ff4637;
}
.new_remetstop ul .dianj a {
    font-weight: 600;
    color: #ff4637;
}
.new_remetsbt ul li {
    padding: 16px 0px 16px 32px;
    float: left;
    font-size: 16px;
}
.new_remetsbt ul li a{
   color: #999;
}
</style>



<!-- 报名看房 -->
<div class="black-bg" style="display: none;" id="black_bg"></div>
<div class="send-mess lpm-bx3" style="display: none;">
    <p class="regist-title"><span class="lpm-bx3-t"></span>
    <span class="close close-send lpm-colse2" title="关闭" id="bmkfCallClose">×</span></p>
    <div class="regist-form">
      <p class="send-mess-text1">请留下手机号码，置业顾问会尽快联系您</p>
      <form class="submit_area">
          <input type="hidden" name="lpid" value="0">
          <input type="hidden" name="ly" value="<?php echo cityname($infos['city_id']);?><?php echo $infos['title'];?>首页报名">
        
        <input type="text" value="" placeholder="请输入您的手机号码" id="lp-nmkf-mobile" name="mobile" class="regist-input3 mt15">
        <div class="h30"></div>   
        <input type="button" value="提交" class="regist-submit apply_submit">
      </form>
    </div>
</div>
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
<!-- 报名看房 end-->
<?php include("bottom.php");?>
</body>
</html>


 