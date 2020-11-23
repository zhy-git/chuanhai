<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="hn">
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
	$click=$infos['click']+1;
	$mysql->execute("UPDATE `web_content` SET `click`='".$click."' where `id`='".$lpid."'");
	}
?>
<head>
<meta name="applicable-device" content="mobile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-Control" content="no-cache">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
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
<link href="../css2/my.css" rel="stylesheet">
<link href="../css2/module-new.css" rel="stylesheet">
<link href="../css2/house-detail.css" rel="stylesheet">
 <link href="../css2/huxing_v2.css" rel="stylesheet">
<script src="../js2/flexible.js" ></script>
<script  src="../js2/jquery.min.js" type="text/javascript"></script>
<script src="../js2/jquery.form.js"></script>    
<script src="../js2/layer.js"></script> 
<script src="../js2/flexible.js"></script>
<title><?php echo $infos['title'];?>,<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>"> 
<script type="text/javascript">
   window.onscroll=function(){ 
    var t=document.documentElement.scrollTop||document.body.scrollTop;  
    var htop2=document.getElementById("htop2"); 
    if(t>= 50){ 
        htop2.className = "htop2_1";
    }else{
        htop2.className = "htop2";
    } 
}
</script>
<style>
body{background: #F4f4f4;}
.box{width:98%;height:auto!important;margin:auto;overflow:hidden}
.wraper{padding:0;background:#e6e6e6;clear:both}
.box{min-height:0}
.wrap {padding: 10px;}
.nh{background: #fff;}
.nh .wrap .nw1 li{float:left;width:100%;line-height:30px;border-bottom:1px solid #eaeaea;font-size:.4rem}
.wrap dd p {line-height: 30px;border-bottom: 1px solid #eaeaea;font-size: 0.4rem;}
.blank10{clear:both;height:10px;line-height:10px;font-size:1px}
.titx,.infosx dt,.nh dt{font-size: .5rem}
.btns{padding-right: 5px;}
.tag-1,.tag-2,.tag-3,.tag-4,.tag-5,.tag-6,.tag-7,.tag-8,.tag-9{border: none;}
</style>
</head>
<body >
<div class="container">
    <div class="header">
        <!--返回上一页-->
        <div class="go-back">
           <a href="javascript:void(0)" onClick="history.back(-1)">
                <span class="ico ico-return">返回上一页</span>
            </a>
        </div>
        <!--切换城市-->
    <div class="city-change"><span class="text"><a href="show.php?lpid=<?php echo $lpid;?>" ><?php echo $infos['title'];?>相册 </a> </span></div>
    <!--用户行为跳转-->
    <ul class="u-link">
        <li class="link-home">
            <a href="<?php echo $sitem;?>" ><span class="ico ico-home">首页</span></a>
        </li>                
    </ul>
</div>    
    <div class="blank10"></div>
    <div class="hx-box">
        <nav class="chunk">
            <a href="?lpid=<?php echo $lpid;?>"  <?php if($pid_flag==""){ echo ' class="on"';}?>>全部</a>
             <?php
	$row = $mysql->query("select * from `web_flag` where `flag_fl`='9'  and `flag_bm`<>'xc1' and `flag_st` = '1' order by flag_px desc");
			foreach($row as $k=>$list){
	 ?>
        <a href="?pid_flag=<?php echo $list['flag_bm'];?>&lpid=<?php echo $lpid;?>" <?php if($pid_flag==$list['flag_bm']){ echo ' class="on"';}?>><?php echo $list['flag'];?></a>
      <?php
      }
     
	  ?>
                  
		<div class="clear"></div>
        </nav>
        <div class="blank10"></div>
        <!-- list -->
    
        		<div class="block-wrap" id="h_11">
            <div class="bk-title" style="font-size: .35rem;font-weight: normal;"><div class="title"><?php echo $xclist['flag'];?><!--(3)--></div></div>
            <div class="bk-main sizewrap show clearfix" id="pg" style="max-height: none;background: #fff">
			          	<?php
      if($pid_flag){
		  $sqww=" and `pid_flag`='{$pid_flag}'";
		  }else{
		  $sqww="";
			  }
			$row = $mysql->query("select * from `web_pic` where `luopan_id`='{$lpid}' and `pid_flag`<>'xc1' {$sqww} order by id desc");
			foreach($row as $k=>$list){
		?>
			<div class="sizeitem">
           <a href="<?php echo $site.$list['pic_img'];?>">
                <span class="imgwrap"><img src="<?php echo $site.$list['pic_img'];?>"></span>
                <span class="sispan"><b><?php echo $list['pic_name'];?></b></span>
                <span class="sispan" style="display:none;"><b>住宅</b>户型图</span>
                <span class="sispan price" style="display:none;"><b>78</b>万元/套</span>
            </a>
       		 </div>
             <?php }?>
			</div>
        </div>
		
        <div class="blank10"></div>
    
        		
		
        <div class="blank10"></div>
                <!-- list end-->
    </div>
</div> 
           
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
<style>
.make_tit_3 .t-2{font-weight: normal;}
.make_tit_3{text-align: inherit;}a{ text-decoration:none; }.qx-btn{color:#4fa536;font-size: 14px; font-weight: normal;}.a-footer-layer li.a-nav-down .ico-find1{margin:0.05rem .08rem 0 0;vertical-align:top}
.tubiao { margin: 0.05rem .08rem 0 0; vertical-align: top;background-image: url(/public/static/phone/image/icons/shijian.png);width: .3866rem;height: .3733rem;vertical-align: text-top !important;}
a{cursor: pointer;text-decoration:none;}.a-footer-layer li.a-nav-down a:hover{background: #388f03;text-decoration:none;}.a-nav-call a:hover{background: #c54547;text-decoration:none;}
</style>

<link href="../css2/photoswipe.css" rel="stylesheet">

    <script src="../js2/klass.js"></script>


    <script src="../js2/photoswipe.js"></script>

    <script type="text/javascript">

        $(document).ready(function () {

            var myPhotoSwipe = $("#pg a").photoSwipe({

                enableMouseWheel: false,

                enableKeyboard: false,

                captionAndToolbarAutoHideDelay: 0

            });

        });

    </script>
<?php include("../bottom2.php");?>
</body>
</html> 
<div class="blank45"></div> 