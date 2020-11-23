<!DOCTYPE html>
<html lang="zh-CN">
<?php
require("../conn/conn.php");
require("../function.php");
$lm=4;
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
<link rel="stylesheet" href="/public/static/home/css/loupan.css?v=46.6">
<style type="text/css">
/*位置导航start*/
.locnav{width:1200px; height:40px; line-height:40px; color:#999; margin:0 auto;}
.locnav a{color:#999; padding:0 8px;}
.locnav a:hover{color:#999;}
.right300{float:left;width:300px;padding-left:30px;	}
.fj_chart{margin-top:70px;	}
.fj_content{margin-top:38px;position:relative}
.fj_content_s1{font-size:30px;font-weight:400;display:inline}
.fj_content_s2{padding-left:42px}
.fj_content_s99{padding-left:30px}
.fj_content_s3{font-size:18px}
.fj_content_s5{padding-left:10px;color:#e8380d}
.fj_content_s6{color:#999;padding-left:18px}
.fj_content_s6:hover{color:#5ab431}
.fj_content_s7,.fj_content_s8{height:30px;width:102px;display:block;color:#fff;background:#ed603d;text-align:center;line-height:30px;position:absolute;right:100px;top:5px;border-radius:3px}
.fj_content_s8{width:90px;right:0}
.fj_content_s7:hover,.fj_content_s8:hover{background:#e8380d;color:#fff}
.borbot, .bortop{border-bottom:1px solid #ddd;}
.bortops{border-top:1px solid #ddd;}
.bortop{border-top:none;}

.fj_table_wrap{margin-top:25px}
.fj_table_tr,.newtable{height:38px;border-left:1px solid #eee;border-top:1px solid #eee}
.fj_table_tr td,.fj_table_tr1 td{text-align:center;width:215px;border-right:1px solid #eee;border-bottom:1px solid #eee}
.fj_table_tr td{background:#f8f8f8;color:#888}
.fj_table_tr1{height:38px;border-left:1px solid #eee}
.fj_table_tr1 a{color:#4c4948}
.fj_table_tr1 a:hover{color:#5ab331}
.fj_red{color:#e8380d}
.fj_green{color:#5ab331}
.fj_table_last{height:38px;border-left:1px solid #eee;border-bottom:1px solid #eee;border-right:1px solid #eee;width:863px;text-align:center;line-height:38px}
.fj_table_last a{display:block;color:#888}
.news_frist_text{line-height:30px;padding:10px 0}
.news_frist_text a{color:#4c4948;display:block}
.common-title{height:30px;position:relative;line-height:30px;}
.common-title strong{font-weight:normal;	font-size:30px;font-family:'Microsoft YaHei';	}
.common-title strong a:hover{color:#4da635;	}
</style>
    
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
            <a href="/fangjia/" target="_blank"><?php echo $sitecityname;?>房价</a><em>&gt;</em>
           
    </div>
	<!-- 面包屑 end-->
	<div class="lp-public-param">
	<!-- 区域 -->
	<div class="container-super">
         <div class="lp-pb-area1 borbot bortops" style="padding-top: 11px;">
            <div class="lp-pb-s1">区&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;域：</div>
            <div class="lp-pb-s2">
               <ul class="lp-pb-s3 lp-pb-sclick">                
                  <?php
                $city=$mysql->query("select * from `web_city` where `pid`='{$sitecitybid}' and `city_st`='1' order by `city_px` asc");
                foreach($city as $cityall){
					echo '<li><a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/fangjia/">'.$cityall['city_name'].'</a></li>';
                }
                ?>
	                            
                  
               </ul>               
            </div>           
    	</div>
	</div>
	<div class="clear"></div>
	<div class="h10"></div>
		<!-- 区域 end -->
        <?php

$row = $mysql->query("select * from `web_fjzs` where `city_id`='{$sitecityid}' order by addtime desc limit 1");
$newspr=$row[0]['price'];
//echo $row[0]['price'];
$esfpr=$row[0]['price2'];
$row2 = $mysql->query("select * from `web_fjzs` where `city_id`='{$sitecityid}' order by addtime desc limit 6");
$rsc = $mysql->query("select count(*) as count from `web_fjzs` where `city_id`='{$sitecityid}' order by addtime desc limit 6");

?>
<?php //foreach($row2 as $p=>$list){ if($p==0){echo date('m',strtotime($list['addtime']));}else{echo ','.date('m',strtotime($list['addtime']));}}?>
<?php //foreach($row2 as $p=>$list){ if($p==0){echo $list['price'];}else{echo ','.$list['price'];}}?>
<?php
$ddarr[]='';
$ddarr2[]='';
$ddarr3[]='';
foreach($row2 as $p=>$list){ $ddarr[$p]=date('Y-m',strtotime($list['addtime'])); $ddarr2[$p]=$list['price']; $ddarr3[$p]=$list['price2'];}

$num = count($ddarr);
$num2 = count($ddarr2);
$num3 = count($ddarr3);

?>
	<div class="content-center">
		<!-- left -->
		<div class="left870">
			<div class="fj_content">
	          <div class="fj_content">
	          <a href="javascript:;" title="<?php echo $sitecityname;?>房价" target="_blank">
	          <h1 class="fj_content_s1" id="dtidname"><?php echo $sitecityname;?>房价</h1>
	      	  </a>
	      	      <span class="fj_content_s99" id="tateText"><?php echo date('Y-m',strtotime($row[0]['addtime']));?>月</span>
		              <a href="javascript:;" title="<?php echo $sitecityname;?>新房房价" target="_blank">
		              	<span class="jjwid" id="areaText1">新房房价：</span>
		              </a>
		              <strong class="fj_content_s3" id="areaText"><?php echo $newspr;?></strong>
		              <span class="fj_content_s4" id="areaText2">元/平米</span>
		              		              <span class="fj_content_s5 fj_red" id="tongbi">↑--</span>
		              	        	  	  <a href="javascript:;" title="<?php echo $sitecityname;?>二手房房价" target="_blank">
		              	<span class="jjwid" id="esfareaText1">二手房房价：</span> 
		              </a>
		              <strong class="fj_content_s3" id="esfareaText"><?php echo $esfpr;?></strong>
		              <span class="fj_content_s4" id="esfareaText2">元/平米</span>
		            		              <span class="fj_content_s5 fj_red" id="tongbi">↑--</span>
		              	              	<!-- <a href="javascript:;" class="jgjsq" title="房贷计算器" target="_blank" style="padding: 0 10px 0;"></a> -->
	              
	         </div></div>
	         <!-- 走势 -->
	         <div class="fj_chart">
	         	<div id="container" style="height:260px;"></div>
	         	<!-- 列表 -->	         
					
									
	         	
	         	<div class="fj_table_wrap">
	
				</div>
	         	<!-- 列表 end-->
	         </div>
	         <!-- 走势 end-->
	    </div>
		<!-- left end-->
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
            <input type="hidden" name="pid" value="33">              <!-- 0 为公共报名，其它为楼盘ID-->
					  <input type="hidden" name="lpid" value="0">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="ly" value="内容页面_右侧">     <!--报名来源 具体查看applyVerify.js文件中source 标识说明-->
                    <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->
					<div class="inp-2" style="height: 24px"><input type="text" name="mobile" id="lp-list-mobile" placeholder="请输入您的手机号码" maxlength="12"></div>
					<div class="h10"></div>
					<div><input type="button" class="btn lp-btn　apply_submit" value="报名拿底价"></div>
				</form>		
			</div>
		</div>
		<!-- right end-->
	</div>
	<div class="clear"></div>

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
<?php include("../bottom.php");?>

<script src="/public/static/libs/highcharts/highcharts.js"></script>
<script src="/public/static/home/js/cityprice.js"></script>
<input type="hidden" id="currentCityId" value="120" />
<input type="hidden" id="buildPrices"  value="null,null,null,null,null,null,null,null,null,null,null,null"/>
<input type="hidden" id="areaPriceS"  value="<?php for($i=$num3-1;$i>=0;$i--){if($i==$num3-1){echo $ddarr3[$i];}else{echo ','.$ddarr3[$i];}}?>"/>
<input type="hidden" id="compareDate"  value="<?php for($i=$num-1;$i>=0;$i--){if($i==$num-1){echo "'".$ddarr[$i]."月'";}else{echo ",'".$ddarr[$i]."月'";}}?>"/>

<input type="hidden" id="newcompareDate"  value=""/>
<input type="hidden" id="minPrice"  value="7920"/>
<input type="hidden" id="maxPrice"  value="22543"/>
<input type="hidden" id="newbuildPrices"  value="null,null,null,null,null,null,null,null,null,null,null,null"/>
<input type="hidden" id="newareaPrices"  value="<?php for($i=$num2-1;$i>=0;$i--){if($i==$num2-1){echo $ddarr2[$i];}else{echo ','.$ddarr2[$i];}}?>" />
<input type="hidden" id="newminPrice"  value="10971"/>
<input type="hidden" id="newmaxPrice"  value="22543"/>
<input type="hidden" id="ditname"  value="<?php echo $sitecityname;?>" title="9120" />


</body>
</html>
<?php include("../sq.php");?>