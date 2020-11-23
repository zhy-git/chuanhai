<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
require("../conn/conn.php");
require("function.php");

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
   
<title>帮您找房_<?php echo $config['site_name'];?></title>
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
    <link href="/public/static/phone/css/help-find2.css" rel="stylesheet">
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
.footer{height:1.6rem;padding:.24rem .32rem 0;background-color:#464754;}
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
<?php include("sq2.php");?>    
</head>
<body>
<!--nav begin-->
<div class="header" style="z-index: 999;position: fixed;top: 0;width: 100%">    
    <div class="go-back">
       <a href="javascript:void(0)" onclick="history.back(-1)">
            <span class="ico ico-return">返回上一页</span>
        </a>
    </div>
    <div class="city-change"><span class="text">帮您找房</span></div>    
        <ul class="u-link" style="top: .3rem;right: .2rem;">
            <li class="link-home"><a href="javascript:;" id="navBtn" style="display: block;"><img src="/public/static/phone/image/nav/nav.png"></a></li>                 
        </ul>
</div>
<div style="height: 51px;"></div>
<div for="ab_no_default_help" style="margin-bottom: 1rem;"> 
        <div class="hp-three">
            <div class="">
                <div class="row1">
                    <div class="box-img">
                        <img src="/public/static/phone/image/img-help01.png" alt="#" style="width: 100%">
                    </div>
                </div>
                <div class="row1">
                    <div class="box-con">
                        <div class="hd">
                            <p>新盘数量稀缺，好房源更如昙花一现！！</p>
                            <p>订阅专属房源信息，如果出现符合您需求的房源</p>
                            <p>我们将第一时间发送提醒至您手机！</p>
                        </div>
                        <div class="bd">
                            <!--帮您找房-->
                            <form id="frmup" method="post" action="/m/save">
                            	<input type="hidden" name="lpid" value="<?php echo $lpid;?>">
                                <input type="hidden" name="ly" value="【<?php echo $sitecityname;?>】_移动端_帮您找房" id="make_tit_4">
                                <input type="hidden" name="pid" value="33">
                                <input type="hidden" name="action" value="bmtj">
                            <div class="look-house  form-box">
                                <div class="tr">
                                    <div class="input-area">                                            
                                        <div class="area-ipt">
                                            <input type="text" name="qy" value="" class="ipt" placeholder="区域">
                                        </div>                           
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="input-area">                                            
                                        <div class="budget-ipt">
                                            <input type="text" name="zj" value="" class="ipt" placeholder="总价">
                                        </div>        
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="input-area">                                            
                                        <div class="house-ipt">
                                            <input type="text" name="js" value="" class="ipt" placeholder="居室">
                                        </div>                                            
                                    </div>
                                </div>
                                <div class="tr">
                                    <div class="input-area">                                            
                                        <div class="size-ipt">
                                            <input type="text" name="mj" class="ipt" placeholder="面积">
                                        </div>
                                    </div>
                                </div>
                                <div class="tr tr-phone">
                                    <div class="input-area">
                                        <input type="text" class="ipt" id="find-mobile" name="utel" placeholder="请输入手机号码以便及时联系(必填)">
                                    </div>
                                </div>
                                <div class="btn-area">
                                    <button class="btn common-free-mobile-submit" type="submit">立即提交</button></div>
                            </div>
                            </form>
                        </div>
                    </div>
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
    <script type="text/javascript">
$(function(){
  $('#frmup').ajaxForm({
    beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
    success: complete, // 这是提交后的方法
    dataType: 'json'
  });
  function checkForm(){
        var mobile = /^1[3|4|5|7|8]\d{9}$/;        
        if(!mobile.test($.trim($('#find-mobile').val()))){            
         layer.open({content: '手机号格式非法',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});
          $('#find-mobile').focus(); 
          return false;
        }
       layer.open({type: 2});
    }
 function complete(data){     
    if(data.status==1){
       layer.closeAll('loading');
       layer.open({content: data.info,time: 2 ,style: 'background: rgba(34,187,98,255); color:#fff; border:none;' });  
       window.setTimeout("window.location='"+data.url+"'",2000);
       return false;
    }else{
      layer.open({content: data.info,time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;' });      
      return false; 
    }
  } 
});
</script>    
<?php include("ny_nav.php");?>
    <div class="fixMask"></div>
</div>
<style type="text/css">

</style>
<script type="text/javascript" src="/public/static/phone/js/common.enroll.js"></script>
<!-- 60领取红包 -->
<?php include("bottom.php");?>
 
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
<?php include("sq.php");?>
<div class="h50"></div> 