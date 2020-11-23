<!DOCTYPE html>
<html lang="en">
<?php
require("../../conn/conn.php");
require("../function.php");
$lpid=$_GET['lpid'];
$hxid=$_GET['hxid'];
if($lpid<>""){
	$rows=$mysql->query("SELECT * FROM `web_content` WHERE `id`='{$lpid}' limit 0,1");
	$infos=$rows[0];
	 if($infos==false)
	  {
		echo "已经出错!";
		exit;
	   }
	$click=$infos['click']+1;
	$mysql->execute("UPDATE `web_content` SET `click`='".$click."' where `id`='".$lpid."' limit 0,1");
	}
	$rowhx=$mysql->query("SELECT * FROM `web_pic` WHERE `id`='{$hxid}' limit 0,1");
	$infohx=$rowhx[0];
	 if($infohx==false)
	  {
		echo "已经出错!";
		exit;
	   }
?>
<head>
    <meta charset="UTF-8"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1.0,minimum-scale=1.0">    
    <script src="js2/flexible.js"></script>
<title><?php echo $infos['title'];?>户型,<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>"> 
    <link href="../css2/module-new.css" rel="stylesheet">
    <link href="../css2/house-detail.css" rel="stylesheet">
    <link href="../css2/my.css" rel="stylesheet">
    <link href="../css2/huxing_v2.css" rel="stylesheet">    
    <script  src="../js2/jquery.min.js" type="text/javascript"></script>
    <script src="../js2/jquery.form.js"></script>
    <script src="../js2/layer.js"></script>
</head>
<style type="text/css">    
    body{background: #e6e6e6;height: auto}
	.focus, .main_image{height:7rem;    text-align: center;background: #FFF;}
	nav.chunk a{font-size: .37rem;}
</style>
<body>
    <div class="container">
    <div class="header" style="z-index: 999;position: fixed;top: 0;width: 100%">
        <div class="go-back">
           <a href="javascript:void(0)" onclick="history.back(-1)">
                <span class="ico ico-return">返回上一页</span>
            </a>    
        </div>        
        <div class="city-change"><span class="text"><?php echo $infos['title'];?>户型</span> </div>    
        <ul class="u-link" style="top: .3rem;right: .2rem;">
            <li class="link-home"><a href="javascript:;" id="navBtn" style="display: block;"><img src="../image/nav/nav.png"></a></li>                 
        </ul>
    </div>        
    <div style="height: 51px;"></div>
        <nav class="chunk">
            <a href="loupan.php?lpid=<?php echo $lpid;?>">全部</a>
             <?php
			// echo $infohx['pid_hx'];
			// echo countxc1(135,$lpid);
		$hxxs=0;
	 $rowxc = $mysql->query("select * from `web_flag` where `flag_fl`='41' and `flag_st`='1' order by `flag_px` asc");
     foreach($rowxc as $xclist){
		 if(countxc1($xclist['id'],$lpid)<>0){
			 $hxxs=$hxxs+1;
	 ?>
        <a href="loupan.php?lpid=<?php echo $lpid;?>#h_<?php echo $xclist['id'];?>" <?php if($infohx['pid_hx']==$xclist['id']){echo ' class="on"';}?>><?php echo $xclist['flag'];?></a>
      <?php
      }
      }
	  ?>
                  
		<div class="clear"></div>
        </nav>
        <div class="">
        <!--轮播-->
        <div class="focus focus-house-type">            
            <div class="main_image">
                <a href="<?php echo $site.$infohx['pic_img'];?>" style="display: block;">
                <img src="<?php echo $site.$infohx['pic_img'];?>" style="height: 7rem;" alt="<?php echo $infohx['bh'];?>" />
                </a>
            </div>
        </div>
        <div class="bg2">
            <div class="row">
                <!--基本信息-->
                <div class="mod mod-base" style="padding-top: .4rem;padding-bottom: 0">
                    <div class="bd">
                        <div class="name1">
                           <span class="fr price-1">
                           <b><?php echo $infohx['prices'];?></b></span>   
                           <h3><?php echo $infohx['pic_name'];?>
                           <div class="lb-area"><span class="lbs lbs-on"><?php echo $infohx['zt'];?></span></div></h3>
                           <div class="clear"></div>
                        </div>                
                        <div class="blank10"></div>
                        <p><?php echo $infohx['bh'];?></p>                     
                        <div class="clear"></div>
                        <div class="tag-list">
                        <?php echo $infohx['gj'];?>
                            <a href="javascript:void(0)" style="cursor:default;" class="tags-1">全明格局</a><a href="javascript:void(0)" style="cursor:default;" class="tags-2">书房学思</a>                        </div>
                    </div>
                </div>
            </div>
            <div class="colsbox">
                <span>建面<b><?php echo $infohx['mj'];?></b></span>
                <span>类别<b><?php echo $infohx['lx'];?></b></span>
                <span>装修<b><?php echo $infohx['zx'];?></b></span>
                <span>朝向<b><?php echo $infohx['cx'];?></b></span>
                <div class="clear"></div>
            </div>
            <div class="p10">
                <div class="discount-notice" id="dnoticebtn" onclick="openwid('省心省力选好房','自己找户型太累？不妨找个靠谱资深置业顾问','融创观澜湖公园壹号户型详情_变价、开盘、优惠通知我');">变价、开盘、价格优惠通知我</div>
            </div>
        </div>
        <div class="blank10"></div>
        <div class="block-wrap bg2">
            <div class="bk-title"><div class="title">户型解析</div></div>
            <div class="bk-main buildIntro p10">
              <p style="font-size: .345rem;"><?php echo $infohx['jx'];?></p>
            </div>
        </div>
        <div class="blank10"></div>                
        <div class="block-wrap">
            <div class="bk-title"><div class="title">楼盘其他户型</div></div>
            <div class="bk-main sizewrap show clearfix" style="max-height: none;background: #fff">
            	<?php
        if($infohx['pid_hx']<>''){
			$sqlss=" and `pid_hx` ='{$infohx['pid_hx']}' ";
			}
		$row = $mysql->query("select * from `web_pic` where `luopan_id`='{$lpid}' and `pid_flag`='xc1' {$sqlss} and `id`<>'{$hxid}' order by pic_px desc");//{$sqlss}
			foreach($row as $k=>$list){
		?>
			<div class="sizeitem">
            <a href="loupan_hx_show.php?lpid=<?php echo $lpid;?>&hxid=<?php echo $list['id'];?>">
                <span class="imgwrap"><img src="<?php echo $site.$list['pic_img'];?>"></span>
                  <span class="sispan"><b><?php echo $list['pic_name'];?></b><?php echo $list['lx'];?></span>
                <span class="sispan" ><b><?php echo $list['mj'];?></b><?php echo $list['bh'];?></span>
                <span class="sispan price" ><b></b><?php echo $list['prices'];?></span>
            </a>
       		 </div>
             <?php }?>
			
                            </div>
        </div>
        <div class="blank10"></div>
        
</div>
<!--图册放大图-->
<script type="text/javascript">
 $(function(){    
    $(window).scroll(function(){
        if($(this).scrollTop()>$('.buildImg').height()){
            $('.nobgcolor').removeClass('nobgcolor').find('.mf-title').text($('.build-intro-wrap .title').text());
        }else{
            $('.mf-header').addClass('nobgcolor');
        }
    })
    $('.similarwrap ul').each(function(){
        $(this).css({'width':$(this).find('li').size()*140});
    })
    /* $('#consultTel .telbtn').on('click',function(){
        $('.extensionwrap').show();
        return false;
    }) */

    $('#orderbtn').click(function(){
        $('.orderwrap').show().find('.whitewrap').slideDown();
        return false;
    })
    $(document).click(function(){
        //$('.orderwrap,.whitewrap,.blackwrap').hide();
        $('.whitewrap,.blackwrap').hide();
    })  
    $('.whitewrap,.oktips').click(function(){return false;})
    
    $('#dnoticebtn').click(function(){
        $('.dnoticewrap').show().find('.whitewrap').slideDown();
        return false;
    })
    $('.closeicon,.nobtn').click(function(){
        $(this).parents('.whitewrap,.blackwrap').hide();
    })

    
    $('.sizewrap').each(function(){
        if($(this).children('.sizeitem').size()<4){
            $(this).find('.showall').hide();
        }
    })
    
    $('#tel').click(function(){
        var telStr = $('#tel').attr("data-telStr");
        if (browser.versions.android) {
            if (telStr.indexOf(",") != -1) {
                var extension = telStr.substring(telStr.indexOf(",") + 1, telStr.length);
                var el_a = document.getElementById("telStr");
                el_a.href = "tel:" + telStr;
                $("#extension").html(extension);
                $('.extensionwrap').show().find('.whitewrap').slideDown();
            } else {
                $(obj).attr("href", "tel:" + telStr);
            }
         } else {
            $(obj).attr("href", "tel:" + telStr);
         }
        return false;
    })
    
})
</script>

<!--底部悬浮栏-->
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
    <ul>
        <li><a href="<?php echo $sitem;?>"><p><img src="../image/nav/nav_18.png" alt="首页"></p>首页</a></li>
        <li><a href="<?php echo $sitem;?>loupan/"><p><img src="../image/nav/nav_01.png" alt="新房"></p>新房</a></li>
		<li><a href="<?php echo $sitem;?>loupan/?flagts=ts6"><p><img src="../image/nav/nav_02.png" ></p>别墅</a></li> 
		<li><a href="<?php echo $sitem;?>loupan/?flagts=tsa1"><p><img src="../image/nav/nav_02.png" ></p>海景房</a></li>  
		<li><a href="<?php echo $sitem;?>loupan/?flagts=tsa6"><p><img src="../image/nav/nav_07.png"></p>特价房</a></li>  
		<li><a href="<?php echo $sitem;?>loupan/?flagts=tsa3"><p><img src="../image/nav/nav_02.png" ></p>海景房</a></li>  
		<li><a href="<?php echo $sitem;?>loupan/?cityall_id=1"><p><img src="../image/nav/nav_03.png"></p>海南新房</a></li>
        <li><a href="<?php echo $sitem;?>loupan/?cityall_id=75"><p><img src="../image/nav/nav_07.png"></p>四川新房</a></li>
        <li><a href="<?php echo $sitem;?>loupan/?cityall_id=41"><p><img src="../image/nav/nav_08.png"></p>广西新房</a></li>
        <li><a href="<?php echo $sitem;?>loupan/?cityall_id=54"><p><img src="../image/nav/nav_09.png"></p>广东新房</a></li>
        <li><a href="<?php echo $sitem;?>loupan/?cityall_id=47"><p><img src="../image/nav/nav_17.png"></p>云南新房</a></li>  
                        
        <li><a href="<?php echo $sitem;?>loupan/?cityall_id=65"><p><img src="../image/nav/nav_14.png"></p>海外置业</a></li>
        <li><a href="<?php echo $sitem;?>tuan"><p><img src="../image/nav/nav_14.png"></p>购房活动</a></li>
        <li><a href="<?php echo $sitem;?>baike"><p><img src="../image/nav/nav_14.png"></p>房产百科</a></li>
        <li><a href="<?php echo $sitem;?>news"><p><img src="../image/nav/nav_14.png"></p>房产资讯</a></li>
        <li><a href="<?php echo $sitem;?>shipin"><p><img src="../image/nav/nav_15.jpg"></p>视频看房</a></li>
        <li><a href="<?php echo $sitem;?>zs"><p><img src="../image/nav/nav_16.png"></p>房价走势</a></li>        
        <li><a onClick="openwid('订阅信息','我们会保证您的个人信息安全，并第一时间通知您最新楼盘动态。','移动导航首页_订阅信息');"><p><img src="../image/nav/nav_06.png"></p>订阅信息</a></li>
        <li><a onClick="openwid('帮你找房','我们会保证您的个人信息安全，并第一时间通知您最新楼盘动态。','移动导航首页_帮你找房');"><p><img src="../image/nav/nav_11.png"></p>帮你找房</a></li>
        <li><a onClick="sq()"><p><img src="../image/nav/nav-2.png"></p>客服帮忙</a></li>
    </ul>
    <div class="fixMask"></div>
</div>
<style type="text/css">
.nav{ position:fixed;left:0;right:0;top:0;padding:1.3rem 0 0 0; max-width:480px; margin:0 auto;background: #fff}
.nav ul{position:relative; z-index:89;background: #fff;height: 408px;}
.nav li{ float:left; width:25%;}
.nav li a{ display:block; text-align:center; font-size:13px; padding:5px; color:#000;line-height: 30px}
.nav li img{width: 40px; height: 40px;}
.nav li ins{ display:block;margin:0 auto 3px auto;font-size:24px;width:50px;height:50px;line-height:50px;border-radius:50%;border:1px solid rgba(255,255,255,0.3); text-shadow:none;}
.nav li a:hover ins,.nav li a.current ins{ border-color:rgba(255,255,255,0);background-color:#0368AE;}
.sFix{display:none;z-index:888}
.fixMask{position:fixed;left:0;right:0;top:51px;width:100%;height:100%;margin:0 auto;background-color:#000;-moz-opacity:.95;-khtml-opacity:.8;opacity:.8;z-index:88}
</style>  
  

<!--底部悬浮栏-->
<div class="a-footer-layer">
    <ul class="a-nav">
        <li class="a-nav-down" style="width: 50%;background: #48bf01;border: 0">
            <a href="javascript:;" onclick="openwid('预约看房','我们将为您保密个人信息！为您提供楼盘免费预约专车看房服务！','【海口】移动_预约看房');">
                <span class="ico ico-find1 tubiao">预约看房</span>
                <span class="text" style="color: #fff;">预约看房</span>
            </a>
        </li>
        <li class="a-nav-call" style="width: 50%">
                                  <a href="tel:<?php echo $config['company_tel'];?>">
                  
                <span class="ico ico-call">拨打售楼处电话</span>
                <span class="text">拨打免费电话</span>
            </a>
        </li>        
    </ul>
</div>
    
<script type="text/javascript" src="css2/common.enroll.js"></script>
<?php include("../bottom2.php");?>

</div>
 



     
</body>
</html> 

<div class="h50"></div>
