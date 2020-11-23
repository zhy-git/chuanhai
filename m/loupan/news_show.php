<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
<?php
require("../../conn/conn.php");
require("../function.php");
$lm=2;
$id=$_GET['id'];
if($id<>""){
	$rows=$mysql->query("SELECT * FROM `web_content` WHERE `id`='{$id}'");
	$infoc=$rows[0];
	 if($infoc==false)
	  {
		echo "已经出错!";
		exit;
	   }
	}
$lpid=$infoc['lpid'];
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

<title><?php echo $infoc['title'];?>,<?php echo $infos['title'];?>_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $infoc['title'];?>楼盘动态,<?php if($infoc['keyword']){echo $infoc['keyword'];}else{echo $config['site_keyword'];}?>">
<meta name=description content="<?php echo $infoc['title'];?>楼盘动态,<?php if($infoc['desc']){echo $infoc['desc'];}else{echo $config['site_desc'];}?>">
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
<link href="/public/static/phone/css/my.css?v=1560235736" rel="stylesheet">
<link href="/public/static/phone/css/module-new.css" rel="stylesheet">
<script  src="/public/static/libs/jquery/1.x/jquery.min.js" type="text/javascript"></script>
<script src="/public/static/common/js/jquery.form.js"></script>    
<script src="/public/static/libs/layer/mobile/layer.js"></script> 
<script type="text/javascript" src="/public/static/phone/js/common.js"></script>
<?php include("../sq1.php");?>
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
		<p class="p1"><?php echo $infoc['title'];?></p>
		<p class="p2">
			<span class="time">时间：<?php echo date('Y-m-d',strtotime($infoc['addtime']));?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="company">来源：<?php echo $infoc['zds'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="company">作者：<?php echo $infoc['zhs'];?></span>
		</p>
		<div id="newsContent" style="width:100%;overflow:hidden;font-size: 16px" class="text">
			<?php 
				 //echo $infoc['content'];
				 $content=$infoc['content'];
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
				 ?>   <div class="clear"></div>
		</div>        
	</div>			
</div>		
<div class="clear"></div>

<div class="line1"></div>
<!-- 所属楼盘:begin -->
<ul id="ajaxhouse" style="padding: 0 .2rem">
    <h2 class="newh2">所属楼盘</h2>
    <li class="news">
    <div class="item-new" style="border-bottom: 0;padding-top: .2rem">
    <a href="/m/loupan/<?php echo $lpid;?>.html">
    <div class="img-area">
    <img src="/<?php echo $infos['img'];?>" alt="<?php echo $infos['title'];?>">
    <!--<i class="hp-1">折扣</i>-->
    </div>
    <div class="des" style="width: 5.9rem">
    <div class="pr">
    <h3><?php echo $infos['title'];?></h3>
    <div class="clear"></div>
    </div>
    <div class="tr" style="margin-top: 3px">
    <div class="red" style="font-size: .4rem">
     <?php if($infos['all_price']==0){?>
							<?php if($infos['jj_price']==0){?>
    <i style="font-size: .5rem!important;font-style: normal;">待定</i>	
                                    <?php }else{?>
    <i style="font-size: .5rem!important;font-style: normal;"><?php echo $infos['jj_price'];?></i>元/㎡
                                    <?php }?>
                                <?php }else{?>
    <i style="font-size: .5rem!important;font-style: normal;"><?php echo $infos['all_price'];?></i>万/套
                            <?php }?>
    </div>
    <div class="place"><?php echo cityname($infos['cityall_id']);?>-<?php echo cityname($infos['city_id']);?></div>
    </div>
    <div class="text" style="padding-left: 0">
    <p class="jd_text fl"><?php echo $infos['zlhx'];?></p><div class="clear"></div></div>
    <div class="clear"></div>
    </div>
    <div class="clear"></div>
    <div class="i_lp_tag"><i class="time"><?php echo rand(1,24);?>小时前有人咨询</i><?php echo loupanflagtsi2($list['flagts'],6,3);?><div class="clear"></div></div><div class="clear"></div><?php if($list['fkfs']<>''){?><div class="i_lp_hui"><i>惠</i><span><?php echo $list['fkfs'];?></span></div><?php }?><div class="clear"></div></a><a href="tel:<?php echo telsee($list['loupan_tel']);?>" data-agl-cvt="2"><div class="tel-phone"><img src="/public/static/phone/img/icons/tel.gif" alt=""></div></a></div></li>
</ul>
<!-- 所属楼盘:end -->
<div class="line1"></div>
<!-- 户型:begin -->
<div class="huxing" style="padding: 0 .2rem">
    <h2 class="newh2">相关楼盘户型</h2>
    <?php
								echo '';
                 $row = $mysql->query("select * from `web_pic` where `pid_flag`='xc1' and luopan_id='{$lpid}' order by id desc limit 3");//
		//print_r($row);
		foreach($row as $k=>$list){
			$url="/m/loupan/huxing/{$list['luopan_id']}_{$list['id']}.html";
				?>
                             
                        
        <div class="item-new" style="border-bottom: 0;padding-top: .2rem;height: auto;">
        <a href="<?php echo $url;?>">
        <div class="img-area"><img src="/<?php echo $list['pic_img'];?>" alt="" style="width: 3.5rem;height: 2.6rem;border: 1px solid #eee"></div> </a>
        <div class="right-info">
        <a href="<?php echo $url;?>">
            <h2><?php echo $list['pic_name'];?><i><?php echo $list['zt'];?></i></h2>
            <p style="margin-top: .15rem"><?php echo $list['mj'];?>㎡</p>
            <p class="nprice red" style="margin-bottom: .15rem"><?php echo $list['prices'];?></p>
            </a>
            <div class="tagse">
             <?php
                    $gjs=str_replace("，",",",$list['gj']);
					$gjss=explode(",",$gjs);
					$gjnum = count($gjss);
					if($gjnum>3){$gjnum=3;}
					for($i=0;$i<$gjnum;$i++){
					?>
                    <a href="javascript:void(0)" style="cursor:default;" class="tags-<?php $i+1;?>"><?php echo $gjss[$i];?></a>
                    <?php }?>
            </div>
        </div>
    </div>
    <div class="border"></div>
            <?php 
			}?>
       
    </div>
<!-- 户型:end -->
<div class="line1"></div>
<div class="rows" style="padding: 0 .15rem">
    <div class="house-info-c" style="height: auto;">
        <div class="title">                
            <h3>买房问大家</h3>                                
        </div>
        <div class="blank10"></div>
          <?php
		
		$row = $mysql->query("select * from `web_book` WHERE `pid`='30' and `cl`='1' and `lpid`='{$lpid}' order by id desc limit 0,3");// WHERE `adminid`='{$_SESSION['admin_id']}'
$wdnum=0;
		foreach($row as $k=>$list){
			$url='/loupan/wenda/show_'.$list['id'].'.html';
			$wdnum=$wdnum+1;
			
			
                    $gwid2=sjgw();
					$gws2 = $mysql->query("select * from `web_content` where `id`='{$gwid2}' limit 0,1");
?>
				
                
			<div>
            <div class="house-wd-1">
                <div class="fl" style="width: 30px;text-align: center;padding: .1rem"><img src="/public/static/phone/img/icons/question.png" style="width: .4rem"></div>
                <div class="fl" style="width: 8.1rem;font-size: .35rem;font-weight: 700;"><span style="font-size: .4rem"><?php echo $list['ucontent'];?>？</span></div>
                <div class="clear"></div>
            </div>
            <!-- start -->               
            <div class="blank10"></div>
            <div class="major-infor pr">
                <div class="face">                   
                    <a href="javascript:;"><img src="/<?php echo $gws2[0]['img'];?>" alt="<?php echo $gws2[0]['title'];?>"></a>
                </div>
                <div class="text">
                    <div class="cmt-name">
                        <p><?php echo $gws2[0]['title'];?><span>行业资深顾问</span></p>
                    </div>
                    <div class="cmt-tit">
                        <h4>咨询人数：<span style="color: #48bf01"><?php echo $gws2[0]['keyword'];?></span>次</h4>
                    </div>
                </div>
                <div style="position: absolute;right: 1px;top: 1px;">
                    <ul class="house-wd-ul">
                        <li><a href="<?php echo $shangqiao;?>"><img src="/public/static/phone/img/icons/wei.jpg" alt="" style="width: 1rem;height: 1rem;"></a></li>
                        <li><a href="tel:<?php echo telsee($infos['loupan_tel']);?>" data-agl-cvt="2"><img src="/public/static/phone/img/icons/tel2.gif" alt="" style="width: 1rem;height: 1rem;"></a></li>
                    </ul>
                </div>
                <div class="clear"></div>
                                <div class="house-wd-c">
                    <div class="fl" style="width: 30px;text-align: center;padding: .1rem"><img src="/public/static/phone/img/icons/answer.png" style="width: .4rem"></div>
                    <div class="fl" style="width: 8.1rem;font-size: .35rem;">
                        <div class="wd-box-<?php echo $list['id'];?> wd-box wd-txt-c"><p><?php echo $list['acontent'];?></p></div>
                        <p><a href="javascript:;" style="color: #999" data-id="<?php echo $list['id'];?>" class="wd-zk open" data="1">[展开全文]</a></p>
                        <div class="blank10"></div>
                        <p><span style="color: #999"><?php echo date('Y-m-d',strtotime($list['addtime']));?></span></p>
                    </div>
                    <div class="clear"></div>                    
                </div>   
                             
            </div>
        </div>        
        <div class="border"></div>	 
<?php
		}
?> 
          
                <div class="blank10"></div>
    </div>
</div>


<div class="line1"></div>
<!-- 选项栏 -->
<div class="a_xxk_box">
    <div class="a_tit">
        <ul>
            <li class="act">热销楼盘<em>|</em></li>            
            <li>推荐楼盘</li>
        </ul>
        <div class="clear"></div>
    </div>
    <div class="a_rlist">
        <div class="a show">
            <ul id="ajaxhouse">
                                <!-- list -->
              <?php
                     $row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px15 desc limit 0,5");// and `city_id`='57'
						foreach($row as $k=>$list){
						$url="/m/loupan/{$list['id']}.html";
						?>
               
                       <li class="news"><div class="item-new"><a href="<?php echo $url;?>"><div class="img-area"><img src="/<?php echo $list['img'];?>" alt="<?php echo $list['title'];?>"></div><div class="des" style="width: 5.6rem"><div class="pr"><h3><?php echo $list['title'];?></h3><div class="clear"></div></div><div class="tr" style="margin-top: 3px"><div class="red" style="font-size: .4rem">
                       <?php if($list['all_price']==0){?>
				<?php if($list['jj_price']==0){?>
                       <i style="font-size: .5rem!important;font-style: normal;">待定</i>
                 
				<?php }else{?>
                       <i style="font-size: .5rem!important;font-style: normal;"><?php echo $list['jj_price'];?></i>元/㎡
				<?php }?>
			<?php }else{?>
                       <i style="font-size: .5rem!important;font-style: normal;"><?php echo $list['all_price'];?></i>万/套
			<?php }?>
                       </div><div class="place"><?php echo cityname($list['cityall_id']);?>-<?php echo cityname($list['city_id']);?></div></div><div class="text" style="padding-left: 0"><p class="jd_text fl"><?php echo $list['zlhx'];?></p><div class="clear"></div></div><div class="clear"></div></div><div class="clear"></div><div class="i_lp_tag"><i class="time"><?php echo rand(1,23);?>小时前有人咨询</i><?php echo loupanflagts86s2($list['flagts'],6,4);?><div class="clear"></div></div><div class="clear"></div><?php if($infos['fkfs']<>''){?><div class="i_lp_hui"><i>惠</i><span><?php echo $list['fkfs'];?></span></div><?php }?><div class="clear"></div></a><a href="tel:<?php echo telsee($list['loupan_tel']);?>" data-agl-cvt="2"><div class="tel-phone"><img src="/public/static/phone/img/icons/tel.gif" alt=""></div></a></div></li>
                <?php
					
					}
					?>                   
                                
                        
                                
                                
                           
                                <!-- list end--> 
            </ul>
        </div>
        <div class="a">
            <!-- list -->
            <ul id="ajaxhouse">
                                <!-- list -->
               <?php
                     $row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px13 desc limit 0,5");// and `city_id`='57'
						foreach($row as $k=>$list){
						$url="/m/loupan/{$list['id']}.html";
						?>
               
                       <li class="news"><div class="item-new"><a href="<?php echo $url;?>"><div class="img-area"><img src="/<?php echo $list['img'];?>" alt="<?php echo $list['title'];?>"></div><div class="des" style="width: 5.6rem"><div class="pr"><h3><?php echo $list['title'];?></h3><div class="clear"></div></div><div class="tr" style="margin-top: 3px"><div class="red" style="font-size: .4rem">
                       <?php if($list['all_price']==0){?>
				<?php if($list['jj_price']==0){?>
                       <i style="font-size: .5rem!important;font-style: normal;">待定</i>
                 
				<?php }else{?>
                       <i style="font-size: .5rem!important;font-style: normal;"><?php echo $list['jj_price'];?></i>元/㎡
				<?php }?>
			<?php }else{?>
                       <i style="font-size: .5rem!important;font-style: normal;"><?php echo $list['all_price'];?></i>万/套
			<?php }?>
                       </div><div class="place"><?php echo cityname($list['cityall_id']);?>-<?php echo cityname($list['city_id']);?></div></div><div class="text" style="padding-left: 0"><p class="jd_text fl"><?php echo $list['zlhx'];?></p><div class="clear"></div></div><div class="clear"></div></div><div class="clear"></div><div class="i_lp_tag"><i class="time"><?php echo rand(1,23);?>小时前有人咨询</i><?php echo loupanflagts86s2($list['flagts'],6,4);?><div class="clear"></div></div><div class="clear"></div><?php if($infos['fkfs']<>''){?><div class="i_lp_hui"><i>惠</i><span><?php echo $list['fkfs'];?></span></div><?php }?><div class="clear"></div></a><a href="tel:<?php echo telsee($list['loupan_tel']);?>" data-agl-cvt="2"><div class="tel-phone"><img src="/public/static/phone/img/icons/tel.gif" alt=""></div></a></div></li>
                <?php
					
					}
					?>  
                                <!-- list end-->   
            </ul>          
        </div>
    </div>
</div>    
<!-- 选项栏 end-->
<style>
body{font-size: 12px}
.line1{height: 10px;background: #f5f5f5}
.news-detail{background-color: #fff;padding:.4rem;}
.news-detail p.p1{font-size:.6rem;line-height:1rem;font-weight:bolder;margin-bottom:.05rem}
.news-detail p.p2{font-size:.4rem;color:#999;margin-bottom:.5rem}
.news-detail .text img {width: 100%!important;height: auto!important;margin-bottom: .05rem;}
#newsContent{line-height: .9rem}
.a_xxk_box .a_tit li{border-bottom: #f0f0f0 2px solid}
#ajaxhouse li.news .i_lp_tag span{margin-right: 2px}
.i_lp_tag span{color: #a2a2a2;border: 0.5px solid #a2a2a2;border-radius: 3px;background-color: #FFF;padding: 1px 3px}
#ajaxhouse li.news .img-area{position: relative;}
.newh2{padding-top: .43rem;padding-left: .32rem;font-size: .48rem;letter-spacing: 1px;font-weight: bold;}
.right-info{float: left;width: 5rem}
.tagse a{color: #a2a2a2;border: 0.5px solid #a2a2a2;border-radius: 3px;padding: 2px 4px;margin-right: .2rem}
.right-info h2{font-weight: bold;font-size: .49rem}
.right-info h2 i{font-style: normal;padding: 0 3px;color: #FFF;background: #f85751;font-weight: normal;font-size: 12px;border-radius: 3px;margin-left: 5px}
.nprice{font-size: .4rem;}
.border{height: 1px;background:#e5e5e5;margin: 0 .32rem;margin-bottom: .24rem}
.house-info-c h3{margin: 0 .57em;padding: .5em 0 .1rem;font-size: .45rem;font-weight: 700;color: #333;}
/* .wenda-tit{background: #f5f5f5;border-radius: 5px;padding: .13rem;font-weight: bold;font-size: .4rem;overflow: auto;min-height: 1rem}
.wenda-tit span{background: #eaae2a;color: #FFF;border-radius: 3px;font-size: .48rem;padding: 0 .08rem;font-weight: normal;position: relative;top: 2px;margin: 0 8px;height: auto;display: inline-block;}
.wenda-tit .txt{width: 86%;float: right;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp:2;-webkit-box-orient: vertical;letter-spacing: 1px}
.wenda-tit span i{position: absolute;left: 0;top: .41rem;display: inline-block;width: 0;height: 0;border: 6px solid transparent;border-left: 10px solid #eaae2a;}
.zhiye{padding: 10px 0}
.zhiye .thumg{width: 1.2rem;height: 1.2rem;float: left;overflow: hidden;border-radius: 50%}
.zhiye .thumg img{width: 100%;height: auto;}
.zhiye .zhiye-info{float: left;padding: 0 10px;height: 1.2rem}
.zhiye-info span{font-size: .373rem;color: #323232;}
.zhiye-info span small{margin-left: .2rem}
.zhiye-info small{font-size: .32rem;color: #949494}
.zhiye-info small i{color: #62ab00;font-style: normal;} */
/* .btn-group{float: right;}
.btn-group i{display: inline-block;float: left;width: 1rem;height: 1rem;border-radius: 50%;background: #fef0e7;position: relative;top: .1rem}
.btn-group i.weche{margin-right: .2rem;background:#fef0e7 url(/public/static/phone/image/wech_03.jpg) no-repeat;background-size: 65% 65%;background-position: 6px 5px}
.btn-group i.call{background:#fef0e7 url(/public/static/phone/image/lv-tel_03.jpg) no-repeat;background-size: 65% 65%;background-position: 6px 7px} */
/*.huida,.times{padding-left: 1.5rem;overflow: auto;}*/
/* .huida span{background: #48bf01;color: #FFF;border-radius: 3px;font-size: .48rem;padding: 0 .08rem;font-weight: normal;position: relative;top: 2px;margin-right: 5px;height: auto;display: inline-block;}
.huida span i{position: absolute;right: 0;top: .41rem;display: inline-block;width: 0;height: 0;border: 6px solid transparent;border-right: 10px solid #48bf01;}
.huida .txt,.huida a{width: 86%;float: right;overflow: hidden;text-overflow: ellipsis;display: -webkit-box;-webkit-line-clamp:3;-webkit-box-orient: vertical;font-size: .4rem;letter-spacing: 1px}
.huida a{color: #a8a8a8;font-size: .4rem} */
/* .times{margin-top: 10px}
.times small{color: #999999;font-size: .35rem;float: left;}
.times>div{float: right;}
.times>div span{display: inline-block;margin-left: 15px;padding: 2px  8px;border: 1px solid #a5a5a5;border-radius: 50px;color: #a5a5a5}
.times>div span.zan{background:url(/public/static/phone/image/zan_03.jpg) no-repeat;background-size: 30% 65%;text-indent:15px;background-position: 7px 3px}
.times>div span.cai{background:url(/public/static/phone/image/cai_03.jpg) no-repeat;background-size: 30% 65%;text-indent:15px;background-position: 7px 4px} */

.house-wd-1{margin: 0 .57em;padding: .5em 0 .1rem;color: #333;background: #f5f5f5;border-radius: 5px;margin-bottom: .1rem}
.major-infor {margin-bottom: .15rem; margin-left: .15rem;}
.major-infor .face {position: relative;float: left;width: 1.3rem;height: 1.3rem;margin-right: .2667rem;text-align: center;}
.major-infor .cmt-name {height: .56rem;line-height: .56rem;overflow: hidden;}
.major-infor .text .cmt-name {font-size: .373rem;color: #3e4a59;margin-bottom: .08rem;}
.major-infor .face img {width: 1.1rem;height: 1.1rem;border-radius: 50%;}
.major-infor .text .cmt-name p {font-weight: 700;}
.major-infor .text .cmt-name span {font-size: .32rem;color: #77808a;font-weight: 400;margin-left: .213rem;}
.house-wd-ul li{float: left;width: 1.5rem}
.text .cmt-tit{font-size: .35rem}
.btn-more-wd{display: inline-block;width: 100%;height: 1.226rem;font-size: .4rem;color: #48bf01;line-height: 1.226rem;background: #fef0e7;border-radius: 8px;border: none;text-align: center;}
.wd-box{height: 35px;overflow: hidden;}
.icon-more1 {background: url(/public/static/phone/img/icons/more2.png) no-repeat 0px;padding: .3rem;background-size: 18px 18px;}
</style>
<script type="text/javascript">
$(document).ready(function() {
    $('body').css('font-size',12);
     $(".a_tit li").click(function() {
         $(".a_tit li").eq($(this).index()).addClass("act").siblings().removeClass('act');         
         $(".a_rlist .a").eq($(this).index()).addClass("show").siblings().removeClass('show'); 
     });
    $(".seo-tit").click(function() {
        var type=$(this).attr('data-type');
        console.log(type);        
        if($('#seo_box_'+type).is(':hidden')){            
            $('#seo_box_'+type).show();
        }else{            
            $('#seo_box_'+type).hide();
        }
     });
});
$('.open').click(function () {
    var data = $(this).attr('data');
    if (data ==  1) {
        $(this).attr('data',2).html('[收起]');
        $(this).parent().siblings('.wd-box').css({
            'height':'auto',
            /*'text-overflow':'initial',
            'display':'initial'*/
        });
    }else{
        $(this).attr('data',1).html('[展开全文]');
        $(this).parent().siblings('.wd-box').css({
            'height':'35px',
            /*'text-overflow':'hidden',
            'display':'-webkit-box'*/
        });
    }
});
</script>
<script language="javascript"> 
document.onselectstart=new Function("event.returnValue=false;"); //禁止选择,也就是无法复制 
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

<?php include("../bottom.php");?>
 
 <div class="s_groupf">
    <div class="strutsf">
        <div class="orderf">
            <div class="make_tit_2f">
                <p class="t-1f" id="make_tit_2f">降价通知</p>                
            </div>
            <!--make_tit end-->
            <div class="make_tit_3f"><span class="t-2f" id="make_tit_3f">降价后将通知您</span></div>
            <form id="frmup888" method="post" action="/sanya/ajax_enroll/">
			<input type="hidden" name="post[house_id]" value="370079">
            <input type="hidden" name="post[sounce]" value="【三亚】_立即抢红包" id="make_tit_4f">
            <input type="hidden" name="post[house_id]" value="">
            <input type="hidden" name="post[subject]" value="">
            <input type="hidden" name="post[name]" value="游客">
            <input type="hidden" name="upcode" value="">  
            <input type="hidden" name="fangwenUrl" value="http://m.lou86.com/info/370079.html">                             
                <div class="make_formf">
                    <ul>                               
                        <li><input type="text" name="post[phone]" id="s-mobilef" placeholder="请输入手机号码,每天仅限前10名" class="inpf"></li>                               
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