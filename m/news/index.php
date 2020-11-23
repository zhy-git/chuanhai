<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
require("../../conn/conn.php");
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
$sql.=" and `city_id`='{$sitecityid}'";
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
?>
<head>

<title><?php echo $config['site_name'];?></title>
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
	<link href="/public/static/phone/css/my.css?v=1560160736" rel="stylesheet">
	<link href="/public/static/phone/css/module-new.css" rel="stylesheet">
	<link rel="stylesheet" type="text/css" href="/public/static/phone/css/swiper.css"/>
	<script  src="/public/static/libs/jquery/1.x/jquery.min.js" type="text/javascript"></script>
	<script src="/public/static/common/js/jquery.form.js"></script>    
	<script src="/public/static/libs/layer/mobile/layer.js"></script> 
	<script type="text/javascript" src="/public/static/phone/js/swiper.js"></script>
	<script type="text/javascript" src="/public/static/phone/js/common.js"></script> 
<style>		
.footer{height:2.0rem;padding:.24rem .32rem 0;background-color:#464754;}
.footer .icp,.footer h3{height:.37rem;line-height:.37rem;overflow:hidden}
.footer .map{position:absolute;top:.46rem;right:.32rem;font-size:.26rem;border-bottom:solid 1px #878787}
.footer h3{font-size:.26rem;font-weight:400}
.footer{text-align:center}
.footer a{color:#fefefc;font-size:.34rem;margin:.24rem}
.footer .icp{font-size:.34rem;color:#fefefc;margin-top:.2rem}
.info-top{ position:relative;}
.img-news{width: 100%;max-height: 5.6rem;overflow: hidden;}
.img-news a{display: block; width:100%; height:5.6rem;}
.img-news a img{width: 100%;height:5.6rem;}
.info-tab,.info-list { background-color:#fff;}
.info-tab ul{ padding:0 .1rem;border-bottom:solid 1px #ddd;}
.info-tab ul li{float:left;width:25%;height:1.3rem}
.info-tab ul li a{display:block;font-size:.42rem;text-align:center;line-height:1.3rem}
.info-tab ul li.curr a{ color:#00A0EA; border-bottom:solid .04rem #00A0EA;}
.info-list .videotex{border-bottom:solid 1px #ddd; overflow:hidden;}
.info-list .videotex a.news{ padding: .3rem .35rem;display: block;}
.img-news-pagination{position: absolute;bottom: .35rem;left: 0;text-align: center;width: 100%;z-index: 2;}
.img-news-pagination .swiper-pagination-bullet{display: inline-block;width: .2rem;height: 0.05rem;background-color: rgb(246,246,246);margin: 0 .125rem;border-radius: 0;}
.img-news-pagination .swiper-pagination-bullet-active{background-color: #f6f6f6;}
.img-news .text-box{width: 100%;height: 1.3rem;position: absolute;left: 0;bottom: 0;background: -webkit-gradient(linear,0 0,0 100%,from(transparent), to(#333));}
.img-news .text-box p{font-size:.45rem;color:#fff;line-height:.6rem;display:-webkit-box;-webkit-box-orient:vertical;-webkit-line-clamp:2;word-break:break-all;overflow:hidden;position:absolute;left:.5rem;bottom:0.5rem}
.con-frme .tit{font-size: .45rem}
.con-frme span{font-size: .35rem}
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
    <div class="city-change"><span class="text"><?php echo $flname;?></span></div>    
	    <ul class="u-link" style="top: .3rem;right: .2rem;">
	        <li class="link-home"><a href="javascript:;" id="navBtn" style="display: block;"><img src="/public/static/phone/image/nav/nav.png"></a></li>                 
	    </ul>
	</div>
<div style="height: 51px;"></div>
	<!--资讯抬头-->
	<div class="info-top">
        <div class="swiper-container img-news">
            <div class="swiper-wrapper">   
               <?php
					$row = $mysql->query("select * from `web_content` where `path`='0-5' and `flag` like '%j1%' and `img`<>'' order by addtime desc limit 0,3");
					foreach($row as $k=>$list){
						$url="/m/news/show_".$list['id'].".html";
					?>	
                    <div class="swiper-slide">
    			                <a href="<?php echo $url;?>"><img src="/<?php echo $list['img'];?>"></a>
                <div class="text-box">
                    <p><?php echo $list['title'];?></p>
                </div>
            </div>
					<?php
					}
					?>         
                			    
				                     
            </div>            
            <div class="img-news-pagination" style="bottom: 0"></div>
        </div>
    </div>
    <!--选项列表-->
    <div class="info-tab">
    	<ul class="clearfix">
        <?php
					$row=$mysql->query("select * from `web_srot` where `path`='0-5' and `startus`='1' order by `px` asc");
					foreach($row as $k=>$list){
				?>
					<li <?php if($pid==$list['id']){ echo ' class="curr"';}?>><a href="/news/index_<?php echo $list['id'];?>.html"><?php echo $list['title'];?></a></li>
				<?php
					}
				?>
        </ul>
    </div>
    <!--内容区域-->
    <div class="info-tab-con">
        <div class="info-list " id="list" currPage="1">
          <?php
				foreach($rowshow as $k=>$list){
					if($list['pid']==28){
						$url="/m/loupan/news_show/{$list['id']}.html";
						}else{
							$url="/m/news/show_{$list['id']}.html";
							}
								$str = str_replace( '&nbsp;',"", $list['content']);
						?> 
                      <div class="videotex">
	                <a dataId="<?php echo $list['id'];?>" href="<?php echo $url;?>" class="news ">
	                    <div class="con-frme">
	                        <p class="tit "><?php echo $list['title'];?></p>
	                        <p class="sub m5"><span><?php echo date('Y-m-d',strtotime($list['addtime']));?></span></p>
	                    </div>	                    
	                </a>
	            </div>
				<?php }?>
						  
			
			        </div>
    </div>    
	<div onclick="loaddata()" class="more-loading loadMore" style="display: block;">
		<span>加载更多</span>
		<span style="display: none;"><i></i>玩命加载中...</span>
	</div>
<script type="text/javascript">
handleImgCanvas();
var mySwiper = new Swiper(".img-news", {
    pagination: ".img-news-pagination",
    autoplay: 5000
});
var num='236';
var currPage = 2;
var newsType = <?php echo $pid;?>;
function loaddata(){
	if($(".loadMore").hasClass("loading") || $(".loadMore").css("display") == "none") {
		return;
	}
	if(num <= currPage) {
		$(".loadMore").hide();
		return;
	}
	$(".loadMore").addClass("loading");
	$(".loadMore span").hide().eq(1).show();
	$.ajax({
		type: "get", 
		url: "ajaxnews", 
		data: {page: currPage + 1, pid: newsType}, 
		success: function(data) {
			$("#list").append(data);
			currPage++;
			hasReadNews();
			if(currPage >= num) {
				$(".loadMore").hide();
			}
		},
		complete: function() {
			$(".loadMore").removeClass("loading");
			$(".loadMore span").hide().eq(0).show();
		}
	});
} 
//滑到底部自动加载
$(window).scroll( function() {
	if($(document).height() - ($(window).scrollTop() + $(window).height()) <= 100) {
		loaddata();
	}
});
hasReadNews();
//判断新闻是否已读
function hasReadNews() {
	try {
		$("#list .news").each(function() {
			var hasReadNews = "," + localStorage.hasReadNews + ",";
			if(hasReadNews.indexOf($(this).attr("dataId")) != -1) {
				$(this).parent().addClass("on");
			}
		});
	}catch(err) {
	   //在此处理错误
	}
}
//进入详情页面，记录已读标识
$("#list").on("click", ".news", function() {
	try {
		var hasReadNews = $(this).attr("dataId") + "," + localStorage.hasReadNews;
		if(hasReadNews.length > 2000) { //存储长度不超过2000
			hasReadNews = hasReadNews.substring(0,2000).replace(/,\d*$/, "");
		}
		localStorage.hasReadNews = hasReadNews;
	}catch(err) {
	   //在此处理错误
	}
});
</script>   
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

<?php include("../bottom.php");?>    
</body>
</html> 
<?php include("../sq.php");?>
<div class="blank45"></div> 