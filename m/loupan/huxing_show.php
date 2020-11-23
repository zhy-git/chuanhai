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
    <script src="/public/static/phone/js/flexible.js"></script>
<title><?php echo $infos['title'];?>户型介绍,<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $infos['title'];?>户型介绍,<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>"> 
    <link href="/public/static/phone/css/module-new.css" rel="stylesheet">
    <link href="/public/static/phone/css/lp/house-detail.css" rel="stylesheet">
    <link href="/public/static/phone/css/my.css?" rel="stylesheet">
    <link href="/public/static/phone/css/v2.0/huxing_v2.css" rel="stylesheet">    
    <link rel="stylesheet" href="/public/static/swiper/swiper.min.css"/>
    <script  src="/public/static/libs/jquery/1.x/jquery.min.js" type="text/javascript"></script>
    <script src="/public/static/common/js/jquery.form.js"></script>    
    <script src="/public/static/libs/layer/mobile/layer.js"></script>     
    <script src="/public/static/swiper/swiper.min.js?v=1560148224"></script>         
    <script src="/public/static/phone/js/v2.1/countDown.js?v=1560148224"></script>    
<?php include("../sq2.php");?>  
</head>
<style type="text/css">    
body{background: #f2f2f2;height: auto;}
.rows {clear: both;overflow: hidden;}
.lincss li{float: left;}
.swiper-wrapper .swiper-slide img,.hxt img{width: 100%;}
.backicon{position:absolute;left:10px;top:10px;width:40px;height:40px;border-radius:100%;background:rgba(0,0,0,.3) url(/public/static/phone/image/v2.0/w-back.png) center no-repeat;background-size:10px;z-index:10}
.top-menu{position:absolute;right:10px;top:10px;width:40px;height:40px;border-radius:100%;background:rgba(0,0,0,.3) url(/public/static/phone/image/nav/nav-11.png) 9px 7px no-repeat;background-size:60%;z-index:10}
.slider-xf{position: absolute;bottom: .5rem;width: 100%;z-index: 1;text-align: center;}
.slider-xf span{padding: .1rem .3rem;background: #f1e1d2;color: #000;border-radius: 30px;opacity: .9;}
.slider-xf span.act{background: #00A0EA;color: #fff;}
.hx-info-c,.hx-zy-box,.hx-other{padding: .25rem;background: #fff;}
.hx-info-c .title h3{font-weight: 700;font-size: .5rem}
.hx-info-c .clearflx,.hx-info-c .title {margin-bottom: .3rem}
.hx-info-c .clearflx span{font-size: .40rem}
.hx-info-c .clearflx span:first-child{color: #999}
.tag a{font-style: normal;padding: .1rem .25rem;background: #f2f2f2;color: #aeaeae;margin-right: 8px;}
.line1{height: 2px;border-top: 1px solid #ddd;}
.hx-info-c .clearflx dd{float: left;width: 50%;margin-bottom: .3rem}
.icons{padding: .3rem;}
.icons-left2{background: url(/public/static/phone/img/icons/left2.png) no-repeat; right: 1px;top: 0px;position: absolute;}
.hx-zy-box .title h3{font-size: .50rem;font-weight: bold;}
.hx-zy-box .c .pic{width: 1.8rem;height: 1.5rem;}
.hx-zy-box .c .pic img{width: 1.5rem;height: 1.5rem;border-radius: 50%}
.hx-zy-box .c .name h3{font-size: .45rem;padding-bottom: .1rem;padding-top: 3px;}
.hx-zy-box .c .name p{font-size: .40rem;color: #999}
.hx-zy-box .c .btn-xta{font-size: .40rem;color: #00A0EA;border: 1px solid #00A0EA;border-radius: 30px;padding: .2rem .4rem;}
.hx-zy-box .bc{background: #f5f5f5;position: relative;border-radius: 5px;padding: .2rem;line-height: .6rem;font-size: .40rem;color: #292929}
.icons-top2{background: url(/public/static/phone/img/icons/top2.png) no-repeat;left: 11px;top: -16px;position: absolute;padding: .5rem;}
.hx-zy-box .cc .pic{width: 3.8rem;}
.hx-zy-box .cc .pic img{width: 3.5rem;height: 2.6rem}
.hx-zy-box .cc .txt{width: 5.5rem;}
.hx-zy-box .cc .txt .tag span{float: left; background: #f2f2f2;color: #9e9e9e;padding: 1px .1rem;margin-right: 5px;border-radius: 3px;}
.hx-zy-box .cc .txt .p1{font-size: .45rem;color: #000;padding-bottom: .15rem;}
.hx-zy-box .cc .txt .p1{max-width: 4.5rem;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;}
.hx-zy-box .cc .txt .p2{max-width: 5rem;text-overflow: ellipsis;white-space: nowrap;overflow: hidden;font-size: .40rem;padding-top: 2px;color: #999;padding-bottom: 0}
.hx-zy-box .cc .txt .p3{font-size: .40rem}
.hx-other .ul li{float: left;width: 49.5%;text-align: center;font-size: .45rem}
.hx-other .ul li:first-child{border-right: 1px solid #ddd;}
.hx-other .ul li{border-bottom: 2px solid #fff;height: 1rem;line-height: 1rem;color: #333;font-size: .5rem}
.hx-other .ul li.act{border-bottom: 2px solid #00A0EA;height: 1rem;line-height: 1rem;color: #00A0EA;font-size: .5rem}
.hxtype,.hxtype1{background: #fff;overflow: auto;margin-bottom: 0;webkit-overflow-scrolling: touch;padding: .714em;}
.hxtype li,.hxtype1 li{float: left;margin-right: 14px;width: 115px;}
.hxtype li img,.hxtype1 li img{width: 115px;height: 115px;}
.hxtype li p,.hxtype1 li p{padding-bottom: .1rem;font-size: .40rem;line-height: .5rem;}
.hxtype li .status,.hxtype1 li .status {background: #f85751;padding: 0 .1rem;color: #fff;border-radius: 5px;font-size: .40rem;}
.b1{display: none;}
.tejia-top{background: #f61d4b;height: 1.5rem;}
.tejia-top .tj-r{background: url(/public/static/phone/img/top.jpg) no-repeat;height: 1.5rem;width:4rem}
.tejia-top .txt{color: #fff;padding:2px .2rem;}
.tejia-top .txt .p1{font-size: .40rem}
.active-time em{background: #5c3410;color: #fff;padding: 1px 3px;border-radius: 3px;font-size: .40rem;}
</style>
<body>
  <?php if($sitecityid==45){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14397&companyId=416&channelid=14397&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
  <?php if($sitecityid==43){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14396&companyId=416&channelid=14396&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
  <?php if($sitecityid==44){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14395&companyId=416&channelid=14395&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
  <?php if($sitecityid==42){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14394&companyId=416&channelid=14394&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
<div class="mf-content">
    <!-- slider -->
    <div class="rows pr">
                <div class="hxt"  style="height: 6rem;display: block;">
            <a href="/<?php echo $infohx['pic_img'];?>" style="display: block;z-index: 1500;height: 6rem"><img src="/<?php echo $infohx['pic_img'];?>" alt="<?php echo $infohx['bh'];?>"></a>
        </div>
        <div class="slider-xf">
                        <span class="act"   data-id="2">户型图</span>
        </div>
        <a onclick="history.back(-1)" class="backicon"></a>
        <a href="javascript:;" id="navBtn" class="top-menu"></a>
    </div>
    <!-- slider:end -->
    <!-- 特价 -->
        <!-- 特价：end -->
    <!-- info -->
    <div class="rows">
        <div class="hx-info-c">
            <div class="title pr">
                <h3><?php echo $infohx['pic_name'];?></h3>
                <a href="tel:<?php echo telsee($infos['loupan_tel']);?>" style="position: absolute;right: 1px;top: 1px" data-agl-cvt="2"><img src="/public/static/phone/img/icons/tel.gif" style="width: 2rem;"></a>
            </div>
            <div class="clearflx">
                <span>建面 : </span><span><?php echo $infohx['jm'];?>m²</span>
            </div>
            <div class="clearflx">
                <span style="color: #e74000">总价 <?php echo $infohx['prices'];?>万/套</span><span style="padding-left: 20px;color: #999">更新 <?php echo date("Y年m月d日");?></span>
            </div>
            <div class="clearflx tag">
             <?php
                    $gjs=str_replace("，",",",$infohx['gj']);
					$gjss=explode(",",$gjs);
					$gjnum = count($gjss);
					for($i=0;$i<$gjnum;$i++){
					?>
                    <a href="javascript:void(0)" style="cursor:default;" class="tags-<?php $i+1;?>"><?php echo $gjss[$i];?></a>
                    <?php }?>
                </div>
            <div class="blank5"></div>
            <div class="line1"></div>
            <div class="clearflx">
                <div class="blank10"></div>
                <dl>
                    <dd><span>单价 : </span><span>暂无报价</span></dd>
                    <dd><span>朝向 : </span><span><?php echo $infohx['cx'];?></span></dd>
                    <dd><span>类别 : </span><span><?php echo $infohx['lx'];?></span></dd>
                    <dd><span>装修 : </span><span><?php echo $infohx['zx'];?></span></dd>
                </dl>
                 <div class="clear"></div>
                <div class="clearflx pr">
                    <span>预算 : </span><a onClick="sq();" href="tel:<?php echo telsee($infos['loupan_tel']);?>" data-agl-cvt="2"><span style="color: #00A0EA;">咨询首付及贷款明细 </span></a><em class="icons icons-left2"></em>
                </div>
               
            </div>
        </div>
    </div>
    <!-- info:end -->
         
    <div class="blank10"></div>
    <div class="rows">
     <?php
								$gwid=sjgw();
								$gws = $mysql->query("select * from `web_content` where `id`='{$gwid}' limit 0,1");
								?>	
        <div class="hx-zy-box">
            <div class="title"><h3>户型点评</h3></div>
            <div class="blank10"></div>
            <div class="c">
                <div class="pic fl">
                    <img src="/<?php echo $gws[0]['img'];?>">
                </div>
                <div class="name fl">
                    <h3><?php echo $gws[0]['title'];?></h3>
                    <p>咨询人数 : <span class="red"><?php echo $gws[0]['keyword'];?></span>人</p>
                </div>
                <div class="fr" style="line-height: 1rem;">
                    <a onClick="sq();" href="<?php echo $shangqiao;?>" class="btn-xta" data-agl-cvt="1">向TA咨询</a>
                </div>
                <div class="clear"></div>
            </div>
            <div class="blank15"></div>
            <div class="bc">
                <i class="icons-top2"></i>
                <p><?php echo $infohx['jx'];?></p>
            </div>
            <div class="blank10"></div>
        </div>
    </div>
    <div class="blank10"></div>
    <div class="rows">
        <div class="hx-zy-box">
            <div class="title"><h3>所属楼盘</h3></div>
            <div class="blank10"></div>
            <div class="cc">
                <a href="/m/loupan/<?php echo $lpid;?>.html" style="display: block;">
                    <div class="pic fl">
                        <img src="/<?php echo $infos['img'];?>" alt="<?php echo $infos['title'];?>">
                    </div>
                    <div class="txt fl">
                        <p class="p1"><?php echo $infos['title'];?></p>
                        <div class="tag">
                            <?php echo loupanflagts86s2($infos['flagts'],6,4);?><div class="clear"></div>                          
                        </div>
                        <p class="p2">地   址：<?php echo $infos['xmdz'];?></p>
                        <p class="p3"><span class="red">
                        
                  <?php if($infos['all_price']==0){?>
							<?php if($infos['jj_price']==0){?>
                均价&nbsp; 待定
                                    <?php }else{?>
                                    均价&nbsp;  <?php echo $infos['jj_price'];?>元/平米
                                    <?php }?>
                                <?php }else{?>
                                总价&nbsp;  <?php echo $infos['all_price'];?>万/套
                          
                            <?php }?>
                            </span></p>
                    </div>
                </a>
                <div class="clear"></div>
            </div>
        </div>
    </div>
    <div class="blank10"></div>
    <div class="rows">
        <div class="hx-other">
            <div class="ul">
                <ul>
                    <li class="act" data-type='1'>其他户型</li>
                    <li data-type='2'>相关户型</li>
                </ul>
                <div class="clear"></div>
            </div>
            <div class="blank10"></div>
            <div class="b">
                <div class="hxtype">
                    <ul class="clearfix">
                           <?php
								echo '';
                 $row = $mysql->query("select * from `web_pic` where `luopan_id`='{$lpid}' and `pid_flag`='xc1' and `id`<>'{$hxid}'  order by id desc limit 3");//and `pid_hx`<>'{$infohx['pid_hx']}'

		foreach($row as $k=>$list){
			$url="/m/loupan/huxing/{$list['luopan_id']}_{$list['id']}.html";
				?>
                             <li>
                            <a href="<?php echo $url;?>" style="display: block;">
                             <div class="pic">
                                 <img src="/<?php echo $list['pic_img'];?>">
                             </div>
                             <div class="txt">
                                 <p style="padding-top: .15rem"><strong><?php echo $list['pic_name'];?></strong>&nbsp;<span class="status"><?php echo $list['zt'];?></span></p>
                                 <p>建面<?php echo $list['mj'];?>m² </p>
                                 <p class="red"><?php echo $list['prices'];?></p>
                             </div>
                            </a>
                        </li>
            <?php 
			}?>
                                            </ul>
                </div>
            </div>
            <div class="b1">
                <div class="hxtype1">
                    <ul class="clearfix">
                     <?php
								echo '';
                $row = $mysql->query("select * from `web_pic` where `pid_flag`='xc1' and `id`<>'{$hxid}' and `pid_hx`='{$infohx['pid_hx']}' order by id desc limit 3");//
		//print_r($row);
		foreach($row as $k=>$list){
			$url="/m/loupan/huxing/{$list['luopan_id']}_{$list['id']}.html";
				?>
                             <li>
                            <a href="<?php echo $url;?>" style="display: block;">
                             <div class="pic">
                                 <img src="/<?php echo $list['pic_img'];?>">
                             </div>
                             <div class="txt">
                                 <p style="padding-top: .15rem"><strong><?php echo $list['pic_name'];?></strong>&nbsp;<span class="status"><?php echo $list['zt'];?></span></p>
                                 <p>建面<?php echo $list['mj'];?>m² </p>
                                 <p class="red"><?php echo $list['prices'];?></p>
                             </div>
                            </a>
                        </li>
            <?php 
			}?>
                                            </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<script>
var swiper = new Swiper('.swiper-container', {
  slidesPerView: 1,
  spaceBetween: 30,
  loop: true,
});
$(function ()
{
　　$(".slider-xf span").click(function ()
　　{     
        var id=$(this).attr('data-id');
        if(id==1){
           $('.swiper-wrapper').show();
           $('.hxt').hide();
        }else{
           $('.hxt').show();
           $('.swiper-wrapper').hide();
        }
　　　　$(this).addClass("act").siblings().removeClass("act");
　　});
　　$(".hx-other li").click(function ()
　　{     
        var type=$(this).attr('data-type');
        if(type==1){
            $('.b').show();
            $('.b1').hide();
        }else{
            $('.b1').show();
            $('.b').hide();
        }
　　　　$(this).addClass("act").siblings().removeClass("act");
　　});
    $('.hxtype ul').width($('.hxtype li').size()*130); //
    $('.hxtype1 ul').width($('.hxtype1 li').size()*130); //
});
    $("input[name='countDown']").each(function () {
        var time_end=this.value;
        var con=$(this).next("span");
        var _=this.dataset;
        countDown(con,{
            title:_.title,//优先级最高,填充在prefix位置
            prefix:_.prefix,//前缀部分
            suffix:_.suffix,//后缀部分
            time_end:time_end//要到达的时间
        })
        //提供3个事件分别为:启动,重启,停止
        .on("countDownStarted countDownRestarted  countDownEnded ",function (arguments) {
            console.info(arguments);
        });
    });
</script>
  
<!--底部悬浮栏-->
    

<script type="text/javascript">
$(function() {
	$("#navBtn,#navBtn1").click(function(){
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
<style type="text/css">
.header {position: relative;overflow: hidden;height: 1.33rem;border-bottom: 1px solid #ddd;background-color: #fbfbfb;line-height: 1.1rem}
.header .go-back {position: absolute;left: .32rem;width: .32rem;top: .1rem;}
.header .go-back .ico-return {float: left;margin-top: .3583rem}
.nav .u-link {position: absolute;top: 0;right: .32rem}
.nav .u-link li {float: left}
.nav .u-link li.link-home {margin-right: .37rem}
.nav .u-link li .ico-home {margin-top: .4516rem}
.nav .u-link .link-home img{width: 26px; height: 26px;}
.ico-return {width: .2667rem;height: .4533rem;}
.u-link li .ico-user {margin-top: .3585rem}
.ico {display: inline-block;overflow: hidden;background: url(/public/static/phone/image/icons/ico-left.png) 0 0 no-repeat;background-size: 100% 100%;text-indent: -9999px;}
.city-change{overflow:hidden;text-align:center;font-size:.4rem;line-height: 1.4rem;}
.city-change .tit{display:block;width:100%;height:100%;line-height:1.4rem;text-align:center;font-size:.5rem;white-space:nowrap;text-overflow:ellipsis;overflow:hidden}    
</style>
<div class="nav sFix">
    <div style="height: 5px;"></div>
    <div class="header" style="z-index: 999;">
            <!--返回上一页-->
            <div class="go-back">
               <a href="/sanya/">
                    <span class="ico ico-return">返回上一页</span>
                </a>
            </div>
            <!--切换城市-->
        <div class="city-change"><span class="text">户型</span></div>
        <!--用户行为跳转-->
        <ul class="u-link" style="top: .3rem;right: .2rem;">
            <li class="link-home"><a href="javascript:;" id="navBtn" style="display: block;"><img src="/public/static/phone/image/nav/nav.png"></a></li>                 
        </ul>
    </div>
	<?php include("../ny_nav.php");?>
    <div class="fixMask"></div>
</div>

<?php include("foot.php");?>
    </div>
</body>
</html>
<?php include("../sq.php");?>


<div style="height: 66px;"></div>
