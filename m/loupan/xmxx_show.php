<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="hn">
<?php
require("../../conn/conn.php");
require("../function.php");
$lpid=$_GET['lpid'];
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
<link href="../css2/my.css?v=1531209781" rel="stylesheet">
<link href="../css2/module-new.css?v=1531209781" rel="stylesheet">
<link href="../css2/house-detail.css" rel="stylesheet">
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
<body style="height: auto;">
<!--nav begin-->
<div class="header">
        <!--返回上一页-->
        <div class="go-back">
           <a href="javascript:void(0)" onClick="history.back(-1)">
                <span class="ico ico-return">返回上一页</span>
            </a>
        </div>
        <!--切换城市-->
    <div class="city-change"><span class="text">楼盘详情</span> </div>
    <!--用户行为跳转-->
    <ul class="u-link">
        <li class="link-home">
            <a href="<?php echo $sitem;?>" ><span class="ico ico-home">首页</span></a>
        </li>                
    </ul>
</div>
<div class="house-nav htop1">
	<div class=""  id="htop2">
        <ul class="house-nav-wrap">
            <li><a href="show.php?lpid=<?php echo $lpid;?>">楼盘主页</a></li>
            <li><a href="xmxx_show.php?lpid=<?php echo $lpid;?>">楼盘详情</a></li>
            <li><a href="loupan_hx.php?lpid=<?php echo $lpid;?>">户型详情</a></li>
            <li class="last-wrap"><a href="wenda.php?lpid=<?php echo $lpid;?>">楼盘问答</a></li>
        </ul>
    </div>   
</div>	  	
<!--nav end-->  
<div class="wraper box">
	<div class="nh">
		<div class="info">
			<div class="wrap">
				<div class="titx" style="height:46px;"><?php echo $infos['title'];?></div>
				<div class="nw1">
					<ul>
						<li><label>均　　价：</label><?php if($list['jj_price']!=0){echo ''.$list['jj_price'].'元/㎡';}else{echo '<FONT class=font_01>待定</FONT>';}?></li>
						<!--<li><label>总　　价：</label>145万/套</li>-->
						<li><label>物业类型：</label><?php echo $infos['wylx'];?></li>
						<li><label>楼盘特色：</label><span class="t2">
                       <?php echo loupanflagts86s($list['flagts'],6);?>    
                       </span></li>
						<li><label>项目特色：</label><span><?php echo $infos['xmts'];?></span></li>
						<li style="border-bottom:none"><label>装修状况：</label><span><?php
			  $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='5' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $infos['flagzx'])){
					echo '<font >'.$listflag['flag'].' </font>';
				}
			}
			?></span></li>
					</ul>
				</div>
				<div class="clear"></div>
			</div>
		</div>	
	</div>
		<div class="blank10"></div>
	<div class="nh">
		<div class="wrap">
			<dl>
				<dt>基本信息</dt>
				<dd>
				<p>
					<label>占地面积：</label><span><?php echo $infos['zdmj'];?></span>
				</p>
				<p>
					<label>建筑面积：</label><span> <?php echo $infos['jzmj'];?></span>
				</p>
				<p>
					<label>容<em style="margin-right:.5em;"></em>积<em style="margin-right:.5em;"></em>率：</label><span><?php echo $infos['rjl'];?></span>
				</p>
				<p>
					<label>绿<em style="margin-right:.5em;"></em>化<em style="margin-right:.5em;"></em>率：</label><span><?php echo $infos['lhl'];?></span>
				</p>
				<p>
					<label>总<em style="margin-right:.5em;"></em>栋<em style="margin-right:.5em;"></em>数：</label><span><?php echo $infos['zds'];?></span>
				</p>
				<p>
					<label>停<em style="margin-right:.5em;"></em>车<em style="margin-right:.5em;"></em>位：</label><span><?php echo $infos['cws'];?></span>
				</p>
				<p>
					<label>产权年限：</label><span><?php echo $infos['cqnx'];?></span>
				</p>
				<p>
					<label>户　　型：</label><span><?php echo $infos['zlhx'];?></span>
				</p>
				<p>
					<label>开<em style="margin-right:.5em;"></em>发<em style="margin-right:.5em;"></em>商：</label><span><?php echo $infos['kfs'];?> </span>
				</p>
				<p>
					<label>物<em style="margin-right:.5em;"></em>业<em style="margin-right:.5em;"></em>费：</label><?php echo $infos['wyf'];?></p>
				<p>
					<label>物业公司：</label><?php echo $infos['wygs'];?>				</p>
				<p>
					<label>楼盘地址：</label><?php echo $infos['xmdz'];?>				</p>
				<p style="border-bottom:none">
					<label>楼层状况：</label><?php echo $infos['lczk'];?>				</p>
				</dd>
			</dl>
			<div class="clear"></div>
		</div>
	</div>
		<div class="blank10"></div>
		<div class="nh">
			<div class="wrap">
				<dl>
					<dt>销售信息</dt>
					<dd>
					<p><label>销售状态：</label><span><?php
					$flagztz='';
					  $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='8' and `flag_st`='1' order by `flag_px` asc ");
					foreach($rowflag as $listflag){
						if(preg_match("#".$listflag['flag_bm']."#", $infos['ztz'])){
							echo $listflag['flag'];
						}
					}
					?></span></p>
					<p><label>物业类型：</label><span><?php echo $infos['wylx'];?>	</span></p>
					<!--<p><label>总　　价：</label><span>145万/套</span></p>		-->
					<p><label>均　　价：</label><span><?php if($list['jj_price']!=0){echo ''.$list['jj_price'].'元/㎡';}else{echo '<FONT class=font_01>待定</FONT>';}?></span></p>			
					<p><label>开盘时间：</label><span><?php echo $infos['kptime'];?></span></p>
					<p><label>交房日期：</label><span><?php echo $infos['jftime'];?></span></p>
					<p style="border-bottom:none"><label>预售许可证：</label><span><?php echo $infos['ysxkz'];?></span></p>
					</dd>
				</dl>
			</div>
		</div>
		<div class="blank10"></div>
		<div class="nh">
			<div class="wrap">
				<dl class="infosx">
					<dt>项目介绍</dt>
					<dd class="oh70"><p>
                    <?php echo $infos['content'];?>
                    </p></dd>
					<!--a class="more seemore">查看全部</a -->
				</dl>
			</div>
		</div>
		<div class="blank10"></div>
		<div class="nh">
			<div class="wrap">
				<dl class="infosx">
					<dt>项目配套</dt>
					<dd><p><?php echo $infos['xmpt'];?></p></dd>
				</dl>
			</div>
		</div>
		<div class="blank10"></div>
		<div class="nh" style="display:none;">
			<div class="wrap">
				<dl class="infosx">
					<dt>交通状况</dt>
					<dd><p>项目距海口市政府新行政中心约1.5公里，离市中心约12公里，离海口火车站约5公里，距海口美兰国际机场约35公里。坐28、35、37、40、57等公交车到达西海瑞园站下车。</p></dd>
				</dl>
			</div>
		</div>
		<!--用户模块结束-->
	</div>
</div>
<div class="a-footer-layer">
    <ul class="a-nav">
        <li class="a-nav-down" style="width: 50%;background: #48bf01;border: 0">
            <a href="javascript:;" onClick="openwid('预约看房','我们将为您保密个人信息！为您提供楼盘免费预约专车看房服务！','【海口】移动_预约看房');">
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


<?php include("../bottom2.php");?>
</body>
</html> 
<div class="blank45"></div> 