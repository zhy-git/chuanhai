<html xmlns="http://www.w3.org/1999/xhtml">
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
	$pricess='';
?>
<?php if($infos['all_price']==0){
	if($infos['jj_price']==0){
		$pricess='待定';
		}else{
			$pricess=$infos['jj_price'].'元/㎡';
			}
			 }else{
				  $pricess=$infos['all_price'].'万/套';
				   }?>
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
<link href="/public/static/phone/css/my.css" rel="stylesheet">
<link href="/public/static/phone/css/module-new.css" rel="stylesheet">
<link href="/public/static/phone/css/lp/house-detail.css" rel="stylesheet">
<script src="/public/static/phone/js/flexible.js" ></script>
<script  src="/public/static/libs/jquery/1.x/jquery.min.js" type="text/javascript"></script>
<script src="/public/static/common/js/jquery.form.js"></script>    
<script src="/public/static/libs/layer/mobile/layer.js"></script> 
<!--<script src="//msite.baidu.com/sdk/c.js?appid=1599154404206584"></script> -->
<script src="/public/static/phone/js/flexible.js"></script>
<title><?php echo $infos['title'];?>开盘信息_资料介绍_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>">   
<link rel="canonical" href=""/> 
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
.nh .wrap .nw1 li{float:left;width:100%;line-height:30px;border-bottom:1px solid #eaeaea;font-size:.35rem}
.wrap dd p {line-height: 30px;border-bottom: 1px solid #eaeaea;font-size: .35rem;}
.blank10{clear:both;height:10px;line-height:10px;font-size:1px}
.titx,.infosx dt,.nh dt{font-size: .5rem}
.btns{padding-right: 5px;}
.tag-1,.tag-2,.tag-3,.tag-4,.tag-5,.tag-6,.tag-7,.tag-8,.tag-9{border: none;}
</style>
<?php include("../sq2.php");?>
</head>
<body style="height: auto;">

  <?php if($sitecityid==45){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14397&companyId=416&channelid=14397&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
  <?php if($sitecityid==43){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14396&companyId=416&channelid=14396&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
  <?php if($sitecityid==44){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14395&companyId=416&channelid=14395&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
  <?php if($sitecityid==42){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14394&companyId=416&channelid=14394&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
<div class="header" style="z-index: 999;position: fixed;top: 0;width: 100%">
    <div class="go-back">
       <a href="javascript:void(0)" onClick="history.back(-1)">
            <span class="ico ico-return">返回上一页</span>
        </a>
    </div>
    <div class="city-change"><span class="text">楼盘详情</span> </div>
        <ul class="u-link" style="top: .3rem;right: .2rem;">
            <li class="link-home"><a href="javascript:;" id="navBtn" style="display: block;"><img src="/public/static/phone/image/nav/nav.png"></a></li>                 
    </ul>
</div>
<div style="height: 51px;"></div>
<div class="house-nav htop1">
	<div class=""  id="htop2">
    <?php include("house-nav.php");?>
    </div>   
</div>	  	
<!--nav end-->  
<div class="wraper box">
	<div class="nh">
		<div class="info">
			<div class="wrap">
				<div class="titx" style="height:46px;"><a href="/m/loupan/<?php echo $lpid;?>.html" title="<?php echo $infos['title'];?>"><?php echo $infos['title'];?></a></div>
				<div class="nw1">
					<ul>
                  <?php if($infos['all_price']==0){?>
							<?php if($infos['jj_price']==0){?>
                <li><label>均　　价：</label>待定</li>
                                    <?php }else{?>
               <li><label>均　　价：</label><?php echo $infos['jj_price'];?>元/平米</li>
                                    <?php }?>
                                <?php }else{?>
                <li><label alt="1">总　　价：</label><?php echo $infos['all_price'];?>万/套</li>
                          
                            <?php }?>
                          
                        
						<li><label>物业类型：</label><?php echo $infos['wylx'];?></li>
						<li><label>楼盘特色：</label><span class="t2">
                         <?php echo loupanflagts86($infos['flagts'],6,4);?>
                        </span>
                        </li>
						<li><label>建筑形式：</label><span><?php echo loupanflagtsi3($infos['flaglb'],3,3);?></span></li>
						<li style="border-bottom:none"><label>装修状况：</label><span><?php echo loupanflagzx($infos['flagzx'],5)?></span></li>
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
					<label>开<em style="margin-right:.5em;"></em>发<em style="margin-right:.5em;"></em>商：</label><span><?php echo $infos['hfs'];?> </span>
				</p>
				<p>
					<label>物<em style="margin-right:.5em;"></em>业<em style="margin-right:.5em;"></em>费：</label><?php echo $infos['wyf'];?>	</p>
				<p>
					<label>物业公司：</label><?php echo $infos['wygs'];?>				</p>
				<p>
					<label>楼盘地址：</label><?php echo $infos['xmdz'];?>	</p>
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
					echo '<span class="sale-status ds">'.$listflag['flag'].'</span>';
				}
			}
			?></span></p>
				
                
                  <?php if($infos['all_price']==0){?>
							<?php if($infos['jj_price']==0){?>
					<p><label>总　　价：</label><span>待定</span></p>		
                                    <?php }else{?>
					<p><label>均　　价：</label><span><?php echo $infos['jj_price'];?>元/平米</span></p>		
                                    <?php }?>
                                <?php }else{?>
					<p><label>总　　价：</label><span><?php echo $infos['all_price'];?>万/套</span></p>	
                          
                            <?php }?>	
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
					<dd class="oh70">
                    <?php echo $infos['content'];?>
                    </dd>
					<!--a class="more seemore">查看全部</a -->
				</dl>
			</div>
		</div>
		<div class="blank10"></div>
		<div class="nh">
			<div class="wrap">
				<dl class="infosx">
					<dt>项目配套</dt>
					<dd><?php echo $infos['xmpt'];?></dd>
				</dl>
			</div>
		</div>
		<div class="blank10"></div>
		<div class="nh">
			<div class="wrap">
				<dl class="infosx">
					<dt>交通状况</dt>
					<dd><?php echo $infos['jtzk'];?></dd>
				</dl>
			</div>
		</div>
		<!--用户模块结束-->
	</div>
</div>
  
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
<style>

.nav{ position:fixed;left:0;right:0;top:1.3rem;padding:0px 0 0 0; max-width:480px; margin:0 auto;background: #fff}
</style>
    </div>
</body>
</html>
<?php include("../sq.php");?>
<div style="height: 66px;"></div> 