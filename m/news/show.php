<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
require("../../conn/conn.php");
require("../function.php");

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
$id=$_GET['id'];
if($id<>""){
	$rows=$mysql->query("SELECT * FROM `web_content` WHERE `id`='{$id}'");
	$infon=$rows[0];
	 if($infon==false)
	  {
		echo "已经出错!";
		exit;
	   }
	$click=$infon['click']+1;
	$mysql->execute("UPDATE `web_content` SET `click`='".$click."' where `id`='".$id."'");
	}
?>
<head>
   
<title><?php echo $infon['title'];?>,<?php if($flname){echo $flname.'_';}?><?php echo $flname2;?>_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $infon['title'];?>楼盘动态,<?php if($infon['keyword']){echo $infon['keyword'];}else{echo $config['site_keyword'];}?>">
<meta name=description content="<?php echo $infon['title'];?>楼盘动态,<?php if($infon['desc']){echo $infon['desc'];}else{echo $config['site_desc'];}?>">
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
    <div class="city-change"><span class="text">资讯详情</span></div>    
        <ul class="u-link" style="top: .3rem;right: .2rem;">
            <li class="link-home"><a href="javascript:;" id="navBtn" style="display: block;"><img src="/public/static/phone/image/nav/nav.png"></a></li>                 
        </ul>
</div>
<div style="height: 51px;"></div>
<div class="article-box">
	<div class="news-detail border-bottom">
		<p class="p1"><?php echo $infon['title'];?></p>
		<p class="p2">
			<span class="time">时间：<?php echo date('Y-m-d',strtotime($infon['addtime']));?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="company">来源：<?php echo $infon['zds'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="company">作者：<?php echo $infon['zhs'];?></span>
		</p>
		<div id="newsContent" style="width:100%;overflow:hidden;font-size: 16px" class="text">
			 <?php 
				 //echo $infoc['content'];
				 $content=$infon['content'];
				 $con=getImgs($content);
				 if($con<>''){
					foreach($con as $cons)
					{
						
						if(strpos($cons,'http') !== false){
							//echo "<br>".'包含'.$cons;
						//	$img = GrabImagelp($cons,$ids,"");
							}else{
							//	echo "<br>".'不包含';
								$img =$site2.$cons;
								$img=str_replace('../',"",$img);
								$content=str_replace($cons,$img,$content);
								}
					}
				}
				echo $content;
				 ?>
                   <div class="clear"></div>
		</div>
        <!-- 置业顾问 -->
        <div class="a_d_ask">
            
        </div>
        <!-- 置业顾问 end-->
	</div>			
</div>		
<div class="clear"></div>
<div style="height: 10px;background: #f5f5f5"></div>
    <div class="row1">
        <div class="case case-groom">
        	<div class="blank10"></div>
            <div class="hd">
                <h2>推荐楼盘</h2>
            </div>
            <div class="bd">
                <div class="build-list">                      
                      <!-- list -->        
                    <?php
								$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px15 desc limit 0,5");
								foreach($row as $k=>$lps){
									if($lps['pid']==79){
										$url="/m/bieshu/{$lps['id']}.html";
										}else{
											$url="/m/loupan/{$lps['id']}.html";
											}
							?>
                            
                <div class="item-new" style="height: 2rem;">
                        <a class="project_view_track" href="<?php echo $url;?>">
                            <div class="img-area pr"><img src="/<?php echo $lps['img'];?>" alt="<?php echo $lps['title'];?>"></div>
                            <div class="des"><div class="pr"><h3><?php echo $lps['title'];?></h3><div class="price"> 约55000元/㎡</div></div><div class="clear"></div><div class="tr"><div class="place"><?php echo $lps['xmdz'];?></div></div><div class="text">
                             <?php echo loupanflagtsi2($list['flagts'],6,3);?>
                            </div><div class=""><div class="text">已有<b style="color:red;">654</b>人报名看房</div></div></div><div class="clearfix"></div></a></div>
                                <?php }?>                  
                      
                                            <!-- list end-->
                </div>
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
                    <a onclick="wid_closef();" class="qx-btnf fl" style="color: #48bf01;">取消</a>
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