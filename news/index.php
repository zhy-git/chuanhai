<!DOCTYPE html>
<html lang="zh-CN">
<?php
require("../conn/conn.php");
require("../function.php");
$lm=4;
$pid = isset($_GET['pid']) ? intval($_GET['pid']) : '28';
$path = $_GET['path'] ? $_GET['path'] : '0-5';
$key = $_GET['key'] ? $_GET['key'] : '';

if($pid){
$row = $mysql->query("select * from `web_srot` where `id`='$pid'");
//print_r($row);
$flname=$row[0]['title'];
$ccontent=$row[0]['content'];
$path=$row[0]['path'];
$sql=" and `pid`='{$pid}'";
}
if($pid==28){
	//$sql.=" and `city_id`='{$sitecityid}'";
	}
$fl=$path;

if($key){
$sql.=" and `title` like '%{$key}%'";
}
$patharr=explode('-',$path);
$row2 = $mysql->query("select * from `web_srot` where `id`='{$patharr[1]}'");
//print_r($row);
$flname2=$row2[0]['title'];


$page = isset($_GET['page']) ? intval($_GET['page']) : 1;  
$page_num =10;
$offset = ($page-1)*$page_num;
$rsc = $mysql->query("select count(*) as count from `web_content` where `path`='{$path}' {$sql}");
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/$page_num);
$rowshow = $mysql->query("select * from `web_content` where `path`='$path' {$sql} order by addtime desc limit $offset,$page_num");
//echo "select * from `web_content` where `path`='$path' {$sql} order by addtime desc limit $offset,$page_num";
//print_r($rowshow);
?>
<style>
.telphon-w-box .submitss {
    position: absolute;
    bottom: -20px;
    outline: none;
    background-color: #00A0EA;
    border: none;
    color: #FFF;
    font-size: 15px;
    letter-spacing: 1px;
    width: 70%;
    height: 40px;
    line-height: 40px;
    text-align: center;
    border-radius: 3px;
    left: 0;
    right: 0;
    margin: auto;
    cursor: pointer;
}
.c-banner{position:relative; height:360px; overflow:hidden; width:550px; overflow:hidden}
.c-banner .nexImg,.c-banner .preImg{ z-index:99;  cursor:pointer;position:absolute;position:absolute;top:170px;}
.c-banner .nexImg{right:0px; }
.banner li{ height:3600px; overflow:hidden}
.banner img{ width:550px; z-index:1; height:360px;}
.left_scroll{display:none; background:#fff}
.right_scroll{display:none; background:#fff;}
 
</style>

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="csrf-param" content="csrf_token_f">
    <title><?php if($flname){echo $flname.'_';}?><?php echo $flname2;?>_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php if($flname){echo $flname.'_';}?><?php echo $flname2;?>_<?php echo $config['site_keyword'];?>">
    <meta name=description content="<?php echo $config['site_desc'];?>">
    	<link rel="shortcut icon" href="../image/favicon.ico" />
         <link rel="stylesheet" href="/public/static/home/css/css.css">  
	<!--<link rel="stylesheet" href="/public/assets/css/style.css">-->
	<link rel="stylesheet" href="/public/static/home/css/home.css">
	<!--[if IE 6]>
	<link rel="stylesheet" href="/public/static/home/css/ie6.css?v=1.0">
	<script src="/public/static/home/js/DD_belatedPNG_0.0.8a.js?v=1.0" type="text/javascript" ></script>

	<script type="text/javascript"> 
	DD_belatedPNG.fix('*'); 
	</script>  
	<![endif]-->
    
  <link rel="stylesheet" href="/public/static/home/css/news.css">
	<script type="text/javascript" src="/public/static/common/js/jquery.min.js"></script>
	<script type="text/javascript" src="/public/static/common/js/jquery.form.js"></script>
	<script type="text/javascript" src="/public/static/layer/layer.js"></script>
    
    <link href="/css/public.css" rel="stylesheet">
    <link href="/css/alert.css" rel="stylesheet">
   <link href="/css/newslist.css" rel="stylesheet"> 
<?php include("../sq2.php");?>
</head>
<body style="background:#FFF;">
<!-- 悬标 -->
<?php include("../ad_xf.php");?>
<!-- 导航 -->
<?php include("../top.php");?>
<div class="w1200">
	<div class="crumbs">
            <span>您的位置：</span><a href="/" target="_blank">首页</a><em>&gt;</em>
            <a href="/news/" target="_blank">楼市</a><em>&gt;</em>
            <?php echo $flname;?>
	</div>
	<div class="h10"></div>
	<div class="mainlib">
	<!-- left -->
	<div class="content-center">
		  <div class="mainlib">
		    <!-- left -->
		    <div class="leftlib fl">
		      <div class="jwttimg">
		        <div id="newSlier">
			 
		           <div class="c-banner" style="float:left;" >
                         	<div class="nexImg"><img src="/image/r_2.png" /></div>
	                         <div class="preImg"  ><img src="/image/l_2.png" /></div>
	                    <div class="banner" style="position:relative">
		<ul>
        
         <?php
					$row = $mysql->query("select * from `web_content` where `path`='0-5' and `flag` like '%j1%' and `img`<>'' order by addtime desc limit 0,5");
					foreach($row as $k=>$list){
						$url="/news/show_".$list['id'].".html";
					?>
                    
                    
		 
			<li style="position:relative">
                <a target="_blank" href="<?php echo $url;?>"><p style="position:absolute; z-index:111; font-size:20px; color:#fff; top:290px; left:20px; width:510px;"> <?php echo $list['title'];?></p> <img style="z-index:1"  src="/<?php echo $list['img'];?>" ></a>
		                  </li>
            
            <?php
					}
					?>
		</ul>
	</div>

</div>
<style>

.tt-list{float:right;width:275px}

.tt-list a{display:block;padding:5px 0;line-height:22px;height:64px;overflow:hidden;text-decoration:none;border-bottom:1px solid #ddd}
</style>
<div class="tt-list">
    <?php

                                $row = $mysql->query("select * from `web_content` where `path`='0-5' order by addtime desc limit 0,6");
                                foreach($row as $k=>$list){
									if($list['pid']==28){
									$url="/loupan/news_show/{$list['id']}.html";
									}else{
									$url="/news/show_{$list['id']}.html";
										}
                                ?>
            <a href="<?php echo $url;?>" target="_blank" style="position:relative;height: 52px; padding:0px; margin:7px 0px;"><samp style="background:#F00; color:#FFF; padding:1px 5px;"><?php echo $k+1;?></samp>　<?php echo $list['title'];?>　<samp style="color:#999;position: absolute;right: 0px;bottom: 6px;background:#FFF;padding-left: 9px;">[<?php echo date('Y-m-d',strtotime($list['addtime']));?>]</samp></a>
                    <?php
						}
					?>  
          
        </div>

<script type="text/javascript" src="/js/jqq.js"></script>
<script type="text/javascript">
//定时器返回值
var time=null;
//记录当前位子
var nexImg = 0;
//用于获取轮播图图片个数
var imgLength = $(".c-banner .banner ul li").length;
//当时动态数据的时候使用,上面那个删除
// var imgLength =0;
//设置底部第一个按钮样式
$(".c-banner .jumpBtn ul li[jumpImg="+nexImg+"]").css("background-color","black");

//页面加载
$(document).ready(function(){
	// dynamicData();
	//启动定时器,设置时间为3秒一次
	time =setInterval(intervalImg,3000);
});

//点击上一张
$(".preImg").click(function(){
	//清楚定时器
	clearInterval(time);
	var nowImg = nexImg;
	nexImg = nexImg-1;
	console.log(nexImg);
	if(nexImg<0){
		nexImg=imgLength-1;
	}
	//底部按钮样式设置
	$(".c-banner .jumpBtn ul li").css("background-color","white");
	$(".c-banner .jumpBtn ul li[jumpImg="+nexImg+"]").css("background-color","black");
	
	//将当前图片试用绝对定位,下一张图片试用相对定位
	$(".c-banner .banner ul img").eq(nowImg).css("position","absolute");
	$(".c-banner .banner ul img").eq(nexImg).css("position","relative");
	
	//轮播淡入淡出
	$(".c-banner .banner ul li").eq(nexImg).css("display","block");
	$(".c-banner .banner ul li").eq(nexImg).stop().animate({"opacity":1},1000);
	$(".c-banner .banner ul li").eq(nowImg).stop().animate({"opacity":0},1000,function(){
		$(".c-banner ul li").eq(nowImg).css("display","none");
	});
	
	//启动定时器,设置时间为3秒一次
	time =setInterval(intervalImg,3000);
})

//点击下一张
$(".nexImg").click(function(){
	clearInterval(time);
	intervalImg();
	time =setInterval(intervalImg,3000);
})

//轮播图
function intervalImg(){
	if(nexImg<imgLength-1){
		nexImg++;
	}else{
		nexImg=0;
	}
	
	//将当前图片试用绝对定位,下一张图片试用相对定位
	$(".c-banner .banner ul img").eq(nexImg-1).css("position","absolute");
	$(".c-banner .banner ul img").eq(nexImg).css("position","relative");
	
	$(".c-banner .banner ul li").eq(nexImg).css("display","block");
	$(".c-banner .banner ul li").eq(nexImg).stop().animate({"opacity":1},1000);
	$(".c-banner .banner ul li").eq(nexImg-1).stop().animate({"opacity":0},1000,function(){
		$(".c-banner .banner ul li").eq(nexImg-1).css("display","none");
	});
	$(".c-banner .jumpBtn ul li").css("background-color","white");
	$(".c-banner .jumpBtn ul li[jumpImg="+nexImg+"]").css("background-color","black");
}

//轮播图底下按钮
//动态数据加载的试用应放在请求成功后执行该代码,否则按钮无法使用
$(".c-banner .jumpBtn ul li").each(function(){
	//为每个按钮定义点击事件
	$(this).click(function(){
		clearInterval(time);
		$(".c-banner .jumpBtn ul li").css("background-color","white");
		jumpImg = $(this).attr("jumpImg");
		if(jumpImg!=nexImg){
			var after =$(".c-banner .banner ul li").eq(jumpImg);
			var befor =$(".c-banner .banner ul li").eq(nexImg);
			
			//将当前图片试用绝对定位,下一张图片试用相对定位
			$(".c-banner .banner ul img").eq(nexImg).css("position","absolute");
			$(".c-banner .banner ul img").eq(jumpImg).css("position","relative");
			
			after.css("display","block");
			after.stop().animate({"opacity":1},1000);
			befor.stop().animate({"opacity":0},1000,function(){
				befor.css("display","none");
			});
			nexImg=jumpImg;
		}
		$(this).css("background-color","black");
		time =setInterval(intervalImg,3000);
	});
});
 
</script>
		        </div>
		      </div>
		      <div class="newstitnav mt30">
		        <ul>
                 <?php
					$row=$mysql->query("select * from `web_srot` where `path`='0-5' and `startus`='1' order by `px` asc");

					foreach($row as $k=>$list){
				?>
					<li <?php if($pid==$list['id']){ echo ' class="sec"';}?>><a href="/news/index_<?php echo $list['id'];?>.html"><?php echo $list['title'];?></a></li>
				<?php
					}
				?>
		        </ul>
		      </div>
		      <div class="newscont">
		        <ul>
                    <?php
				foreach($rowshow as $k=>$list){
					if($list['pid']==28){
						$url="/loupan/news_show/{$list['id']}.html";
						}else{
							$url="/news/show_{$list['id']}.html";
							}
								$str = str_replace( '&nbsp;',"", $list['content']);
						?> 
        
					<li style="height: 180px">
			             <div class="newsimg">
			             <a href="<?php echo $url;?>" target="_blank">
			             <img class="lazy" src="/<?php echo $list['img'];?>" alt="<?php echo $list['title'];?>"></a> </div>
			            <div class="newsconttxt">
			              <h3><a href="<?php echo $url;?>" target="_blank"><strong><?php echo $list['title'];?></strong></a></h3>
			              <p><?php echo mb_substr(strip_tags($str),0,100,"utf-8");?>...</p>
			              <div class="jb"> 
			                <!--<i>+订阅</i>--> 
			                <span><?php echo date('Y-m-d',strtotime($list['addtime']));?>&nbsp;&nbsp;</span> 
			              </div>
			            </div>
			          </li>
				<?php }?>
						  
		        </ul>
						      </div>     
		      <div class="h10"></div>
		        <div class="pages">
                <ul class="pagination">
                <?php
   		$pagess="";
		if($page==1){ $pagess.='<li class="disabled"><span>«</span></li>';}
		if($page>1){ $pagess.='<li class="prev"  style="position:relative; top:auto"><a href="/news/index_'.$pid.'_'.($page-1).'.html">«</a></li>';}
		if($total>=10){
			
			for ($i=1; $i<=$total; $i++) {
				if($page<$i+5 && $page>$i-5){
						if($page==$i){ $pagess.='<li class="active"><a href="/news/index_'.$pid.'_'.$i.'.html">'.$i.'</a></li>';}else{$pagess.='<li><a href="/news/index_'.$pid.'_'.$i.'.html">'.$i.'</a></li>';}
                    }
				}
			}else{
					for ($i=1; $i<=$total; $i++) {
						if($page==$i){ $pagess.='<li class="active"><a href="/news/index_'.$pid.'_'.$i.'.html">'.$i.'</a></li>';}else{$pagess.='<li><a href="/news/index_'.$pid.'_'.$i.'.html">'.$i.'</a></li>';}
                    }
				}
			
			if($page<$total){$pagess.='<li class="next"  style="position:relative; top:auto"><a href="/news/index_'.$pid.'_'.($page+1).'.html">»</a></li>';}
		echo $pagess;
	?>
                </ul></div>		     
		    </div>
		    <!-- left end-->
		    <!-- right -->
			    <div class="loupan-list-right">
	<div class="loupan-list-right-1">
		<span class="fr"><a href="/about/gfbz.html" target="_blank">更多&gt;</a></span>
		<h3>购房保障</h3>
		<ul class="merit">
            <li>
              <i class="ico1"></i>
              <p class="name">省力</p>
              <p class="ms">免费接机</p>
              <p class="ms">专车接送看房</p>
            </li>
            <li>
              <i class="ico2"></i>
              <p class="name">真实房源</p>
              <p class="ms">100%开发商授权</p>
              <p class="ms">真房源真房价</p>
            </li>
            <li>
              <i class="ico3"></i>
              <p class="name">省钱</p>
              <p class="ms">报销往返机票费用</p>
            </li>
            <li>
              <i class="ico4"></i>
              <p class="name">省事</p>
              <p class="ms">星级酒店免费住</p>
              <p class="ms">海南特产送</p>
            </li>
      	</ul>
	</div>
	<div class="loupan-list-right-1">
		<a href="/"><img src="/public/static/home/image/lp/r-2.jpg" alt="right"></a>
	</div>
	<div class="h10"></div>
	<div style="height: 2px;border-top: 1px solid #00A0EA"></div>
	<div class="h20"></div>		
	<style type="text/css">
.a_tit{background: #ffecd6;height: 37px;}
.a_tit a {width: 150px;height: 35px;display: block;float: left;text-align: center;line-height: 37px;}
.a_tit a.on {background: #fff;border-top: 2px solid #00A0EA;}
.a_house_list .w{display: none;}
.a_house_list .show{display: block;}
</style>	
	<!-- list -->
	<div class="h10"></div>
	<div class="article_xxk_box jyTable2">
		<div class="a_tit title">
			<a href="javascript:;" class="on">热销新盘</a>
			<a href="javascript:;">热门楼盘</a>
		</div>
		<div class="a_house_list">
			<div class="w show">
            <?php
								$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px15 desc limit 0,5");
								foreach($row as $k=>$lps){
									if($lps['pid']==79){
										$url="/bieshu/{$lps['id']}.html";
										}else{
											$url="/loupan/{$lps['id']}.html";
											}
							?>
                            <div class="city-hot-list1">
					<a href="<?php echo $url;?>" class="city-hot-link" target="_blank">
						<div class="pull-left pr"><img src="/<?php echo $lps['img'];?>" alt="<?php echo $lps['title'];?>" class="trs lazy">
										</div>
					<div class="pull-left" style="width: 160px;"><div><span>[<?php echo cityname($lps['city_id']);?>]</span><?php echo $lps['title'];?></div>
                    <?php if($lps['all_price']==0){?>
						<?php if($lps['jj_price']==0){?>
                            <p>待定</p>
						<?php }else{?>
                            <p><?php echo $lps['jj_price'];?>元/㎡</p>
						<?php }?>
					<?php }else{?>
                     <p><?php echo $lps['all_price'];?>万/套</p>
					<?php }?>
                    </div></a>
				</div>
                                <?php }?>
				</div>
			<div class="w">
				
            <?php
								$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px13 desc limit 0,5");
								foreach($row as $k=>$lps){
									if($lps['pid']==79){
										$url="/bieshu/{$lps['id']}.html";
										}else{
											$url="/loupan/{$lps['id']}.html";
											}
							?>
                            <div class="city-hot-list1">
					<a href="<?php echo $url;?>" class="city-hot-link" target="_blank">
						<div class="pull-left pr"><img src="/<?php echo $lps['img'];?>" alt="<?php echo $lps['title'];?>" class="trs lazy">
										</div>
					<div class="pull-left" style="width: 160px;"><div><span>[<?php echo cityname($lps['city_id']);?>]</span><?php echo $lps['title'];?></div>
                    <?php if($lps['all_price']==0){?>
						<?php if($lps['jj_price']==0){?>
                            <p>待定</p>
						<?php }else{?>
                            <p><?php echo $lps['jj_price'];?>元/㎡</p>
						<?php }?>
					<?php }else{?>
                     <p><?php echo $lps['all_price'];?>万/套</p>
					<?php }?>
                    </div></a>
				</div>
                                <?php }?>
							</div>
		</div>
	</div>
	<!-- list end-->
	 
<div class="h20"></div>
	<div class="loupan-list-right-1">
		<strong>怕买贵？怕被坑？</strong>
		<p class="name">专业资深置业顾问帮您越过营销陷阱，
		<br>买新房、拿低价</p>
		<div class="h10"></div>
        <form class="submit_area">
            <input type="hidden" name="pid" value="33">   
          <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
			<input type="hidden" name="ly" value="[<?php echo cityname($sitecityid);?>]资讯列表_右侧_报名拿底价">
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
		<!-- left end-->
	</div>
</div>
</div>

<script src="/public/static/home/js/article/owl.carousel.min.js"></script> 
<script src="/public/static/home/js/article/news_commont.js?v=44.9"></script>
<script src="/public/static/home/js/common-enroll.js?v=44.9"></script>

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
    owls.next();
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
$(function(){    
    if($(".page-menu").length == 0 && $(".header-outer").length == 0){
        $(window).scroll(function(){
            var height = $(document).scrollTop();
            var headerHeight = $(".header").height();
            if(height > headerHeight){
                $('.header2').fadeIn('slow',function(){
                    $(this).css('display','block');
                });
            }else{
                $('.header2').fadeOut('slow',function(){
                    $(this).css('display','none');
                });
            }
        });
    }
});
//关闭二维码
$(document).on('click','.closesaoma',function(){
    $('#saoma').hide();
});
</script>

<div class="y_newslist_bottom_m"></div>
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
<?php include("../bottom.php");?>
<script>
;(function (window, $, undefined) {   
    $.fn.createTab = function (opt) {
        var def = {
            activeEvt: 'mouseover',
            activeCls: 'cur'
        }
        $.extend(def, opt);
        this.each(function () {
            var $this = $(this);
            var timer;
            $this.find('.title a').mouseover(def.activeEvt,function(){
            	console.log(1);
                var index = $(this).index(),
                that = $(this);                
                that.addClass('on').siblings().removeClass('on');                    
                $(".a_house_list > div").eq($(this).index()).addClass("show").siblings().removeClass('show');                 
            }).mouseout(function(){                
                $(".a_house_list > div").eq($(this).index()).addClass("show").siblings().removeClass('show'); 
            })
        });
    }
})(window, jQuery);
$(function(){
    $(".jyTable2").createTab()
})
</script>
<script src="/js/scrollfix.min.js"></script>
<script>
$(function(){
$("#y_newslist_nav").scrollFix({
    distanceTop:$(".y_newslist_nav").outerHeight()-290,
    endPos: '.y_newslist_bottom_m',
    zIndex: 10
})
});
</script>
</body>
</html>
<?php include("../sq.php");?>