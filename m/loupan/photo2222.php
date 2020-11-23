<!DOCTYPE html>
<html lang="en">
<?php
require("../../conn/conn.php");
require("../function.php");
$lm=2;
$lpid=$_GET['lpid'];
$flag=$_GET['flag'];
if(!$flag){
	$flag='xc2';
	}
if($lpid<>""){
	$rows=$mysql->query("SELECT * FROM `web_content` WHERE `id`='{$lpid}'");
	$infos=$rows[0];
	 if($infos==false)
	  {
		echo "已经出错!";
		exit;
	   }
	}
?>
<head>
    <meta charset="UTF-8"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1.0,minimum-scale=1.0">
    
	<title><?php echo $infos['title'];?>楼盘相册_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $infos['title'];?>楼盘相册,<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $infos['title'];?>楼盘相册,<?php echo $config['site_desc'];?>">
    <script src="/public/static/phone/js/flexible.js?v=1.0"></script>
    <link href="/public/static/phone/css/module-new.css?v=1560147154" rel="stylesheet">
    <link href="/public/static/phone/css/lp/house-detail.css" rel="stylesheet">
    <link href="/public/static/phone/css/my.css?v=1560147154" rel="stylesheet">
    <link href="/public/static/phone/css/v2.0/huxing_v2.css?v=1560147154" rel="stylesheet">
    <script  src="/public/static/libs/jquery/1.x/jquery.min.js" type="text/javascript"></script>
    
    <script src="/public/static/common/js/jquery.form.js"></script>    
    <script src="/public/static/libs/layer/mobile/layer.js"></script> 
    <link href="../lightgallery.css" rel="stylesheet">
<?php include("../sq2.php");?>
</head>
<style>
    body{background: #e6e6e6;height: auto}
    .box{width:98%;height:auto!important;margin:auto;overflow:hidden}
    .wraper{padding:0;background:#e6e6e6;clear:both}
    .box{min-height:0}
    .wrap {padding: 10px;}
    .nh{background: #fff;}
    .nh .wrap .nw1 li{float:left;width:100%;line-height:30px;border-bottom:1px solid #eaeaea;font-size:.4rem}
    .wrap dd p {line-height: 30px;border-bottom: 1px solid #eaeaea;font-size: 0.4rem;}
    .footer{padding:.24rem .32rem 0;background-color:#464754;}
    .footer .icp,.footer h3{height:.37rem;line-height:.37rem;overflow:hidden}
    .footer .map{position:absolute;top:.46rem;right:.32rem;font-size:.26rem;border-bottom:solid 1px #878787}
    .footer h3{font-size:.26rem;font-weight:400}
    .footer{text-align:center}
    .footer a{color:#fefefc;font-size:.34rem;margin:.24rem}
    .footer .icp{font-size:.34rem;color:#fefefc;margin-top:.2rem}
    .titx,.infosx dt,.nh dt{font-size: .5rem}
    .btns{padding-right: 5px;}
    .shou3-list2 a, .shou3-list1 a {font-size: .45rem;font-weight: normal;}
	
.lg-img-wrap img{ width: 100%;}
.lg-toolbar .lg-icon{ background: url("../m_bm4.png") no-repeat center; background-size: 60%; }
.optionMore{background: #333; height: 50px;}
.optionMore .find_nav_list2{position: inherit; left: 0px; top:auto; bottom: 0px;}
.optionMore .find_nav_list2 ul li span{ color: #fff;}
.optionMore .find_nav_list2 ul li.in span{ color: #F0562D;}
#lg-counter  span#lg-counter-current{ color: #F0562D;}
</style>
<body>
<div class="container">
    <div class="header" style="z-index: 999;position: fixed;top: 0;width: 100%">
        <div class="go-back">
           <a href="javascript:void(0)" onclick="history.back(-1)">
                <span class="ico ico-return">返回上一页</span>
            </a>    
        </div>        
        <div class="city-change"><span class="text"><?php echo $infos['title'];?>相册</span> </div>    
        <ul class="u-link" style="top: .3rem;right: .2rem;">
            <li class="link-home"><a href="javascript:;" id="navBtn" style="display: block;"><img src="/public/static/phone/image/nav/nav.png"></a></li>                 
        </ul>
    </div>    
    <div style="height: 51px;"></div>
    <div class="blank10"></div>
    <div class="hx-box">
        <nav class="chunk">
             <?php
					  $rowflag=$mysql->query("select * from `web_flag` where `flag_fl`='9' and `flag_st`='1' and `id`<>'43' order by `flag_px` asc");
					  foreach($rowflag as $ks=>$listflag){
					  ?>
                     <a href="<?php echo $lpid;?>_<?php echo $listflag['flag_bm'];?>.html" <?php if($flag==$listflag['flag_bm']){echo 'class="on"';}?>><?php echo $listflag['flag'];?>(<?php echo countxc($listflag['flag_bm'],$lpid);?>)</a>
                      <?php
					  }
					  ?>
                        <div class="clear"></div>
        </nav>
        <div class="blank10"></div>
       <!-- 列表 -->
       <style>
	   


.hu_box {padding:15px 10px;}
.hu_box ul li {display:inline-block;width:48%;background:#fff;margin:5px 0;position:relative;height:120px;}
.hu_box ul li:nth-child(2n) {margin-left:2%;}
.hu_box ul li .hu_img { width: 100%; height: 100%;}
.hu_box ul li .hu_img  img {width:100%; height: 100%;}
.hu_box ul li .hu_font {position:absolute;bottom:0;left:0;background:rgba(0,0,0,0.5);width:80%;color:#fff;font-size:0.3rem;padding:5px 10%;line-height:22px;height: 22px;
overflow: hidden;}
.am-gallery-overlay .am-gallery-item{width:100%;height:100%;}
.am-gallery-overlay .am-gallery-item img{width:100%;height:100%;}

	   </style>
<div class="hu_box" id="zh_housetype-list">
<ul class="c" id="lightgallery">
<?php
$sql="WHERE `pid_flag`='{$flag}' and `luopan_id`='{$lpid}' ";

$row = $mysql->query("select * from `web_pic` {$sql} order by pic_px desc");// WHERE `adminid`='{$_SESSION['admin_id']}'
foreach($row as $k=>$list){
?>
<li data-src="/<?php echo $list['pic_img'];?>" data-sub-html="<?php echo $list['pic_name'];?>"><p class="hu_img"><img src="/<?php echo $list['pic_img'];?>"></p><span class="hu_font"><?php echo $list['pic_name'];?></span></li>
<?php }?>
</ul>
</div>
        		
        <div class="blank10"></div>
                <!-- list end-->
    </div>
    
<script src="../lightgallery.js"></script>
<script>
//$(function(){
$("#lightgallery").lightGallery();
//})
</script>
</div>            
<!--底部悬浮栏-->
<style type="text/css">
.popBox{background:#fff;border-radius:5px;width:80%;height:400px;-moz-box-shadow:0 0 10px 5px #f3bc5f75;-webkit-box-shadow:0 0 10px 5px #4e4d75;box-shadow:0 0 10px 5px #4e4d75}
.popBox .close{position:absolute;right:-10px;top:-10px;background:#fff;height:36px;width:36px;border-radius:50%}
.popBox .close ins{margin-top:3px;margin-left:3px}
.popBox .closeIcon{font-size:30px;color:#ff6005;text-decoration:none}
.popBox .title{background:#f8f8f8;height:65px;line-height:65px;padding-left:26px;color:#48bf01;font-size:20px;border-radius:5px 5px 0 0}
.popBox .textBox{overflow-y:auto;height:270px}
.popBox .text{font-size:18px;color:#555;margin:15px 22px;line-height:28px}
.popBox .btnBox{bottom:0}
.popBox .btnBox a{font-size:.45rem;color:#fff;text-decoration:none}
.popBox .tel{float:left;background:#48bf01;height:65px;width:50%;line-height:65px;text-align:center}
.popBox .online{float:left;background:#ff6d6f;height:65px;width:50%;line-height:65px;text-align:center}
ins{font-family:iconfont;font-style:normal;font-weight:400;speak:none;display:inline-block;text-decoration:inherit;width:1.5em;margin:0;text-align:center;font-variant:normal;text-transform:none;vertical-align:middle}
.icon-16{background: url(/public/static/phone/image/icons/close2.png) no-repeat;    padding: 14px 0px;}
.icon-18{background: url(/public/static/phone/image/icons/tel1.png) no-repeat;    padding: 11px 0px;}
.icon-5{background: url(/public/static/phone/img/icons/tel1.gif) no-repeat;    padding: 11px 0px;background-size: 21px 20px;}
.icon-6{background: url(/public/static/phone/img/icons/tel4.gif) no-repeat;padding: 11px 0px;background-size: 20px 20px;}
</style>    
<div id="yincangkuang" style="display: none">
      <div class="popBox">
          <div class="close"><a href="javascript:void(0)" class="closeIcon"><ins class="icon-16"></ins></a></div>
          <div class="title"><?php echo $infos['title'];?></div>
          <div class="textBox">
              <div class="text"><p><?php echo $infos['djyh'];?></p></div>
          </div>
          <div class="btnBox">            
              <div class="tel"><a href="tel:<?php echo telsee($infos['loupan_tel']);?>"><ins class="icon-6"></ins>预约团购</a></div>
              <div class="online"><a href="<?php echo $shangqiao;?>"><ins class="icon-5"></ins>在线咨询</a></div>
          </div>
      </div>
</div>
<input type="hidden" id="houseid" value="<?php echo $lpid;?>">
<div id="fade" class="black_overlay"></div>    
<script type="text/javascript">
var id=$('#houseid').val();
jQuery(function ($) {
    setTimeout(function () { 
         var layerId = layer.open({
                 type: 1
                 , content: $(".popBox").html()
                 , anim: 'up'
                 , shadeClose: false
                 , className: 'popBox'
                 , style: '  border-radius: 5px;'
         });
    }, 12000);                  
});
$(document).on('click','.popBox .close',function(){        
    $.post("/sanya/windcookie2/", { "id": ""+id+"" },
       function(data){              
       }, "json");               
    layer.closeAll();           
})    
function openbox2() {
    var layerId = layer.open({
            type: 1
            , content: $(".popBox").html()
            , anim: 'up'
            , shadeClose: false
            , className: 'popBox'
            , style: '  border-radius: 5px;'
    });
}
</script>  
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

<?php include("foot.php");?>

    </div>
</body>
</html>
<?php include("../sq.php");?>


<div style="height: 50px"></div>