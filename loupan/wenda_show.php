<!DOCTYPE html>
<html lang="zh-CN">
<?php
require("../conn/conn.php");
require("../function.php");
$lm=2;

$id=$_GET['id'];
$rowswd=$mysql->query("SELECT * FROM `web_book` WHERE `id`='{$id}'");
	$infowd=$rowswd[0];
	 if($infowd==false)
	  {
		echo "已经出错!";
		exit;
	   }
	   $lpid=$infowd['lpid'];
	$clickwd=$infowd['click']+1;
	$mysql->execute("UPDATE `web_book` SET `click`='".$clickwd."' where `id`='".$lpid."'");
	

//$lpid=$_GET['lpid'];
if($lpid<>""){
	$rows=$mysql->query("SELECT * FROM `web_content` WHERE `id`='{$lpid}'");
	$infos=$rows[0];
	 if($infos==false)
	  {
		echo "已经出错!";
		exit;
	   }
	   $lptitle=$infos['title'];
	   $cityall_id=$infos['cityall_id'];
	$click=$infos['click']+1;
	$mysql->execute("UPDATE `web_content` SET `click`='".$click."' where `id`='".$lpid."'");
	}
//	echo $lpid;
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="csrf-param" content="csrf_token_f">
<title><?php echo $infos['title'];?>_<?php echo $infos['title'];?>楼盘详情_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $infos['title'];?>楼盘详情,<?php if($infos['keyword']){echo $infos['keyword'];}else{echo $config['site_keyword'];}?>">
<meta name=description content="<?php echo $infos['title'];?>楼盘详情,<?php if($infos['desc']){echo $infos['desc'];}else{echo $config['site_desc'];}?>">
         <link rel="stylesheet" href="/public/static/home/css/css.css">  
	<!--<link rel="stylesheet" href="/public/assets/css/style.css">-->
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
    <link href="/css/lp_show.css" rel="stylesheet">
    <link href="/css/loupan.css" rel="stylesheet">
    
    <link href="/css/lightbox.css" rel="stylesheet">
<LINK rel="stylesheet" type="text/css" href="/css/lightbox.css" />

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
<!--<link href="/css/lptuku.css" rel="stylesheet">-->
<style>
.sfixed {z-index: 10; position: fixed; width: 160px; top: 50px;}
</style>
<?php include("../sq2.php");?>
</head>
<body>
<!-- 悬标 -->
<?php include("../ad_xf.php");?>
<!-- 导航 -->
<?php include("../top.php");?>
<?php $navfl=7;?>

<div class="house-crumbs">
    <div class="crumbs">
            <span>您的位置：</span><a href="/" target="_blank">首页</a><em>&gt;</em>
            <a href="/loupan/" target="_blank">新房</a><em>&gt;</em>
            <?php echo $infos['title'];?>
    </div>
</div>
<div class="puic_wid">
	<!-- 面包屑 -->
	<?php include("nav.php");?>
	<!-- 顶部随屏 end--> 
<div class="y_heihgt" style="height:20px;"></div>
<div class="content-center clearfix">
        <div class="left870">
          <div class="h20"></div>
          <!-- 2017-11-30 -->
          <div class="wenda-tit">
              <h3><a href="/loupan/<?php echo $lpid;?>.html" title="<?php echo $infos['title'];?>">[<?php echo $infos['title'];?>]</a><?php echo $infowd['ucontent'];?></h3>
              <ul>
                  <li>提问者：游客<span>|</span></li>
                  <li>浏览次数<?php echo $clickwd;?>次<span>|</span></li>
                  <li><?php echo date('Y-m-d',strtotime($infowd['addtime']));?></li>
                  <div class="clear h10"></div>
              </ul>
          </div>
          <!-- 2017-11-30 end-->
            <!-- 列表 -->
            <div class="h20"></div>
                        <div class="wenda-list">
                <h3>全部回答(共1条)</h3>
                <div class="h20"></div>
                <ul>
                                    <li>     
                        <div class="fl">                 
                        <img src="/public/static/home/image/lp/lpdp_wz_tu1.jpg" width="80" height="80">
                        </div>
                        <div class="fl pl20 w600">
                            <div class="xg-tit">
                              <span class="fr c999"><?php echo date('Y-m-d',strtotime($infowd['addtime']));?></span>
                              <p class="c999">回答者：游客</p>
                              <div class="clear"></div>                              
                            </div>                     
                            <div class="xg-content mt10">
                              <p><span style="color: rgb(51, 51, 51); font-family: &quot;Microsoft YaHei&quot;, Verdana, Arial, san-serif; font-size: 14px; background-color: rgb(255, 255, 255);"><?php echo $infowd['acontent'];?></span></p>                            </div>       
                        </div>
                        <div class="clear"></div>     
                    </li>
                                  </ul>
                <div class="clear"></div>
            </div>
                        <div class="h20"></div>
            <div class="wenda-xg"><a href="/loupan/<?php echo $lpid;?>.html" title="<?php echo $infos['title'];?>"><?php echo $infos['title'];?></a>楼盘相关问答</div>
            <div class="wenda">
            <ul>
            <?php
		
		$row = $mysql->query("select * from `web_book` WHERE `pid`='30' and `cl`='1' and `lpid`='{$lpid}' and `id`<>'{$id}' order by id desc");
		

		foreach($row as $k=>$list){
			$url='/loupan/wenda/show_'.$list['id'].'.html';
?>
            <li>
                    <div class="l all366C"><a href="<?php echo $url;?>" rel="nofollow" target="_blank"><?php echo $list['ucontent'];?></a></div>
                    <div class="r"><i class="i1">提问者：游客</i><i class="i2" style="border:0"><font class="red">1</font> 回答 </i><i class="i3"><?php echo date('Y-m-d',strtotime($list['addtime']));?></i></div>
                </li>     
<?php
		}
?>
                      
                
                        </ul>
            </div>
                         <div class="clear"></div>
            <div class="h10"></div>
            <div class="fr"></div>    
           <div class="clear"></div>
          <div class="h10"></div>
           <style type="text/css">
ul.alltw_box li {background-repeat: no-repeat;height: 40px;line-height: 40px;width: 851px;border-bottom: #e7e7e7 1px dashed;}
ul.alltw_box li dl {color: #999999;font-size: 14px;width: 866px;}
ul.alltw_box li dl dd {float: left;}
ul.alltw_box .dd1 {width: 785px;overflow: hidden;}
ul.alltw_box li span {display: block;max-width: 485px;height: 30px;overflow: hidden;float: left;}
ul.alltw_box li span i a {color: #108ACB;}
</style>     
 <div class="other-list">
     <div><h2>热门问答</h2></div>
     <div class="mt5">
        <ul class="alltw_box" id="moreAsks" data-page="1">
               <?php
		
		$row = $mysql->query("select * from `web_book` WHERE `pid`='30' and `cl`='1' and `id`<>'{$id}' order by id desc limit 0,5");// WHERE `adminid`='{$_SESSION['admin_id']}'

		foreach($row as $k=>$list){
			$url='/loupan/wenda/show_'.$list['id'].'.html';
?>
				<li class="border_b">
                <dl><dd class="dd1"><span class="color1_orange"><i class="all366C">
                <a href="<?php echo $url;?>" target="_blank">[<?php echo lpname($list['lpid']);?>]</a></i>
                <a target="_blank" href="<?php echo $url;?>" class="sensitive_word_ask_title"><?php echo $list['ucontent'];?></a></span></dd>
                <dd class="dd5" style="font-size:11px;"><?php echo date('Y-m-d',strtotime($list['addtime']));?></dd></dl>
            </li>      
<?php
		}
?>
                    </ul>
     </div>
 </div>
           
            <!-- 列表 end-->
        </div>
        <!-- right -->
        <div class="loupan-list-right mt10">
            <!-- 订阅 -->
            <div class="lp_information_box clearfix info-solution w280">      
              <div class="bigtit">        
                <h3 style="font-weight:bold">订阅最新优惠动态</h3>
              </div>
              <div class="box4">
              <div class="hd">
                <ul class="sub-list">
                    <li>担心错过楼盘开盘？</li>
                    <li>担心不能第一时间获取楼盘新动态？</li>
                    <li>点击下方订阅</li>
                    <li>楼盘一手情报抢先知道！</li>
                </ul>
              </div>
              <div class="ipt-area">
               <form class="submit_area">
                <input type="hidden" name="pid" value="33">   
            	  <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
                <input type="hidden" name="ly" value="[<?php echo cityname($infos['city_id']);?>]<?php echo $infos['title'];?>楼盘问答页_右侧_订阅动态">
                  <input type="text" name="mobile" id="lp-wd-mobile" style="margin-top: 15px;"  class="ipt common-free-mobile-ipt" placeholder="输入您的手机号">
                  <input class="btn btn-dy common-free-mobile-btn white apply_submit" type="button" value="获取最新优惠动态">
                  <p class="ipt-area-num" style="display: none;">
                      <span class="ico ico-phone3"></span><?php echo $config['company_tel'];?></p>
               </form>
              </div>
            </div>
            </div>
            <div class="clear"></div>
            <div class="h10"></div>
            <!-- 订阅 end-->
            <div class="loupan-list-right-1">
              <div style="padding: 10px;"><h4 class="center">买新房，找专业置业顾问</h4></div>
              <p class="center"><img src="/public/static/home/image/lp/lp_r_1.jpg"></p>
              <p class="center"><img src="/public/static/home/image/lp/lp_r_2.jpg"></p>
            </div>
            <div class="h10"></div>
            <div style="height: 2px;border-top: 1px solid #4ba634"></div>   
            <div class="h20"></div>
            <div class="loupan-list-right-1">
              <strong>怕买贵？怕被坑？</strong>
              <p class="name">专业资深置业顾问帮您越过营销陷阱，
              <br>买新房、拿低价</p>
              <div class="h10"></div>
                <form class="submit_area">
                <input type="hidden" name="pid" value="33">   
            	  <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
                <input type="hidden" name="ly" value="[<?php echo cityname($infos['city_id']);?>]<?php echo $infos['title'];?>楼盘动态_右侧_报名拿底价">
             
                  <div class="inp-2"><input type="text" name="mobile" id="lp-list-mobile" placeholder="请输入您的手机号码" maxlength="12"></div>
                  <div class="h10"></div>
                  <div><input type="button" class="btn lp-btn apply_submit" value="报名拿底价"></div>
            </form>   
            </div>
          </div>
          <!-- right end-->
  </div>
	
	  <div class="clear h20"></div>
	<!-- 热销楼盘 -->
    <style type="text/css">
	.house-com-k-2 {
    border: 1px solid #e1e1e1;
}
.hh-swt {color: #00A0EA;display: inline-block!important;background: url(/public/static/home/image/v2.0/whapp.png) no-repeat left 7px center;padding: 4px 5px;text-indent: 25px;vertical-align: middle;border-radius: 5px;background-size: 20px 20px;border: 1px solid #00A0EA;float: right;}
</style>
	<div class="house-com-k-2 mt20">
      <div class="tit" style="background: url(/public/static/home/image/v2.0/tit.jpg) no-repeat 1px 10px;padding-left: 20px;line-height: 63px;overflow:hidden;color: #fff;font-weight: normal;">     
          热门新盘     
      </div>
      <div style="padding: 15px 15px 0;overflow: hidden;width: 1153px;">
        <div class="clearfix" style="width: 1300px;">   
        	<!--lise  -->    
             <?php
                     $row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px13 desc limit 0,4");// and `city_id`='57'
						foreach($row as $k=>$list){
						$url="/loupan/{$list['id']}.html";
						?>
            <div class="fl lp-col-s1" style="margin-right: 25px;width: 273px!important;height: auto;">
        	 <a href="<?php echo $url;?>" target="_blank" class="lp-col-1" title="<?php echo $list['title'];?>" style="width: 273px;height: 182px;">
        	 	<div class="echo-img"><img  original="<?php echo $site.$list['img'];?>" alt="<?php echo $list['title'];?>" class="trs lazy" style="width: 273px;height: 182px;"></div>
        	 	        	 	
            </a>
              
            <p class="mt10 lpm-section7-1">
              <span class="fr" style="color: #999">[<?php echo cityname($list['city_id']);?>]</span>
              <a target="_blank" href="<?php echo $url;?>"><?php echo $list['title'];?></a>
              </p><div class="clear"></div>
            <p></p>
            <div class="hh-pr mt5">
              <a href="javascript:;"  class="hh-swt swtopen">在线咨询</a>
              
                <?php if($list['all_price']==0){?>
				<?php if($list['jj_price']==0){?>
                 <p class="">均价：<span class="red" style="font-weight: 700;font-size: 18px;">待定</span></p>
				<?php }else{?>
                 <p class="">均价：<span class="red" style="font-weight: 700;font-size: 18px;"><?php echo $list['jj_price'];?>元/㎡</span></p>
				<?php }?>
			<?php }else{?>
             <p class="">总价：<span class="red" style="font-weight: 700;font-size: 18px;"><?php echo $list['all_price'];?>万/套</span></p>
			<?php }?>
                          </div>
            </div>
                <?php
					
					}
					?>      
        	         	<!--lise  end-->
        </div>
    </div>
</div>
	<div class="clear"></div>	
    
    <div class="house-com-k-2 mt20">
      <div class="tit" style="background: url(/public/static/home/image/v2.0/tit.jpg) no-repeat 1px 10px;padding-left: 20px;line-height: 63px;overflow:hidden;color: #fff;font-weight: normal;">     
          猜你喜欢     
      </div>
      <div style="padding: 15px 15px 0;overflow: hidden;width: 1153px;">
        <div class="clearfix" style="width: 1300px;">   
          <!--lise  -->          
           <?php
                     $row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px14 desc limit 0,4");// and `city_id`='57'
						foreach($row as $k=>$list){
						$url="/loupan/{$list['id']}.html";
						?>
            <div class="fl lp-col-s1" style="margin-right: 25px;width: 273px!important;height: auto;">
        	 <a href="<?php echo $url;?>" target="_blank" class="lp-col-1" title="<?php echo $list['title'];?>" style="width: 273px;height: 182px;">
        	 	<div class="echo-img"><img original="<?php echo $site.$list['img'];?>" alt="<?php echo $list['title'];?>" class="trs lazy" style="width: 273px;height: 182px;"></div>
        	 	        	 	
            </a>
              
            <p class="mt10 lpm-section7-1">
              <span class="fr" style="color: #999">[<?php echo cityname($list['city_id']);?>]</span>
              <a target="_blank" href="<?php echo $url;?>"><?php echo $list['title'];?></a>
              </p><div class="clear"></div>
            <p></p>
            <div class="hh-pr mt5">
              <a href="javascript:;"  class="hh-swt swtopen">在线咨询</a>
              
                <?php if($list['all_price']==0){?>
				<?php if($list['jj_price']==0){?>
                 <p class="">均价：<span class="red" style="font-weight: 700;font-size: 18px;">待定</span></p>
				<?php }else{?>
                 <p class="">均价：<span class="red" style="font-weight: 700;font-size: 18px;"><?php echo $list['jj_price'];?>元/㎡</span></p>
				<?php }?>
			<?php }else{?>
             <p class="">总价：<span class="red" style="font-weight: 700;font-size: 18px;"><?php echo $list['all_price'];?>万/套</span></p>
			<?php }?>
                          </div>
            </div>
                <?php
					
					}
					?>  
                     <!--lise  end-->
        </div>
    </div>
</div>
	<!-- 热门区域 -->
    <style type="text/css">
<!--
.con{overflow:hidden; margin:10px auto; width:1198px; height:100%; padding:10px 0px;border: 1px solid #ddd}
#carousel_container{position:relative; height:190px; overflow:hidden;}
#carousel_inner{width:1126px; height:190px; overflow: hidden; position:absolute;left:37px; top:5px;}
#left_scroll{position: absolute;left:0px;top:71px;width:35px;height:48px;cursor: pointer;background:url(/image/l_2.png) no-repeat;    background-size: 30px 30px;}
#right_scroll{position: absolute;top:71px;right:-5px; width: 35px;height: 48px;cursor: pointer; background: url(/image/r_2.png) no-repeat;    background-size: 30px 30px;}
#carousel_ul{width:9999px; height:181px; position:relative;}
#carousel_ul li{float: left;width:270px; margin-right:15px; display:inline;position: relative;border-radius: 7px;overflow: hidden;}
#carousel_ul li img{width: 270px}
#carousel_ul li a{display: block;}
#carousel_ul h4{position:absolute;left:0;bottom:0;width:250px;padding:0 10px;line-height:30px;height:30px;overflow:hidden;margin:0;font-size:14px;color:#fff;filter:progid:DXImageTransform.Microsoft.gradient(enabled='true', startColorstr='#99000000', endColorstr='#99000000');background:rgba(0,0,0,.6);text-align:center;font-weight:400}
-->
</style>
<div class="house-com-k-2 mt20" style="display:none;">
      <div class="tit" style="background: url(/public/static/home/image/v2.0/tit.jpg) no-repeat 1px 10px;padding-left: 20px;line-height: 63px;overflow:hidden;color: #fff;font-weight: normal;">     
          热门区域     
      </div>
	<div class="con" style="border: 0;">
	    <div id="carousel_container">
	        <div id="left_scroll"></div>
	        <div id="carousel_inner">
	            <ul id="carousel_ul">                
	                 <?php
            $city=$mysql->query("select * from `web_city` where `pid`='1' and `city_st`='1' order by `city_px` asc limit 0,8");
			foreach($city as $cityall){
				?>
				<li>
                	<a href="http://<?php echo $cityall['city_pingyin'];?>.<?php echo $siteasd;?>/loupan/" target="_blank">
                	<img src="/image/city/city<?php echo $cityall['id'];?>.jpg" alt="<?php echo $cityall['city_name'];?>"><h4><?php echo $cityall['city_name'];?></h4></a></li>                	
                </li>
				<?php
			}
			?>
	            </ul>
	        </div>
	        <div id="right_scroll"></div>
	    </div>
	</div>
  </div>
<script type="text/javascript" src="/public/static/home/js/jquery.nicescroll.js"></script>
		<script type="text/javascript">
			$('#wai,#wai2,#wai3').niceScroll({
			    cursorcolor: "#ccc",//#CC0071 光标颜色
			    cursoropacitymax: 1, //改变不透明度非常光标处于活动状态（scrollabar"可见"状态），范围从1到0
			    touchbehavior: false, //使光标拖动滚动像在台式电脑触摸设备
			    cursorwidth: "5px", //像素光标的宽度
			    cursorborder: "0", // 	游标边框css定义
			    cursorborderradius: "3px",//以像素为光标边界半径
			    autohidemode: true //是否隐藏滚动条
			});
		</script>
<script type="text/javascript">
<!--
var SellerScroll = function(options){
	this.SetOptions(options);
	this.lButton = this.options.lButton;
	this.rButton = this.options.rButton;
	this.oList = this.options.oList;
	this.showSum = this.options.showSum;
	
	this.iList = $("#" + this.options.oList + " > li");
	this.iListSum = this.iList.length;
	this.iListWidth = this.iList.outerWidth(true);
	this.moveWidth = this.iListWidth * this.showSum;
	
	this.dividers = Math.ceil(this.iListSum / this.showSum);	//共分为多少块
	this.moveMaxOffset = (this.dividers - 1) * this.moveWidth;
	this.LeftScroll();
	this.RightScroll();
};
SellerScroll.prototype = {
	SetOptions: function(options){
		this.options = {
			lButton: "left_scroll",
			rButton: "right_scroll",
			oList: "carousel_ul",
			showSum: 4	//一次滚动多少个items
		};
		$.extend(this.options, options || {});
	},
	ReturnLeft: function(){
		return isNaN(parseInt($("#" + this.oList).css("left"))) ? 0 : parseInt($("#" + this.oList).css("left"));
	},
	LeftScroll: function(){
		if(this.dividers == 1) return;
		var _this = this, currentOffset;
		$("#" + this.lButton).click(function(){
			currentOffset = _this.ReturnLeft();
			if(currentOffset == 0){
				for(var i = 1; i <= _this.showSum; i++){
					$(_this.iList[_this.iListSum - i]).prependTo($("#" + _this.oList));
				}
				$("#" + _this.oList).css({ left: -_this.moveWidth });
				$("#" + _this.oList + ":not(:animated)").animate( { left: "+=" + _this.moveWidth }, { duration: "slow", complete: function(){
					for(var j = _this.showSum + 1; j <= _this.iListSum; j++){
						$(_this.iList[_this.iListSum - j]).prependTo($("#" + _this.oList));
					}
					$("#" + _this.oList).css({ left: -_this.moveWidth * (_this.dividers - 1) });
				} } );
			}else{
				$("#" + _this.oList + ":not(:animated)").animate( { left: "+=" + _this.moveWidth }, "slow" );
			}
		});
	},
	RightScroll: function(){
		if(this.dividers == 1) return;
		var _this = this, currentOffset;
		$("#" + this.rButton).click(function(){
			currentOffset = _this.ReturnLeft();
			if(Math.abs(currentOffset) >= _this.moveMaxOffset){
				for(var i = 0; i < _this.showSum; i++){
					$(_this.iList[i]).appendTo($("#" + _this.oList));
				}
				$("#" + _this.oList).css({ left: -_this.moveWidth * (_this.dividers - 2) });
				
				$("#" + _this.oList + ":not(:animated)").animate( { left: "-=" + _this.moveWidth }, { duration: "slow", complete: function(){
					for(var j = _this.showSum; j < _this.iListSum; j++){
						$(_this.iList[j]).appendTo($("#" + _this.oList));
					}
					$("#" + _this.oList).css({ left: 0 });
				} } );
			}else{
				$("#" + _this.oList + ":not(:animated)").animate( { left: "-=" + _this.moveWidth }, "slow" );
			}
		});
	}
};
$(document).ready(function(){
	var ff = new SellerScroll();
});
//-->
</script> 
	<!-- 热销楼盘 end-->

	<div class="clear mt10"></div>
</div><div class="y_bottom_h"></div>
<script src="/js/qrcode.min.js"></script>

<script>	
function makeCode(id,w,h,url) {		
	var qrcode = new QRCode(document.getElementById(id), {
		width : w,
		height : h
	});
	qrcode.makeCode(url);
}

makeCode('qrcode',70,70,'<?php echo $site;?>loupan/<?php echo $lpid;?>.html');


</script>
<?php include("../bottom.php");?>
<!--<script src="../js/lightbox.lite.js"></script>-->

<script src="/js/scrollfix.min.js"></script>
<script src="/js/lptuku.js"></script>
	<script src="/js/lightbox-2.6.min.js"></script>

</body>
</html>
<?php include("../sq.php");?>