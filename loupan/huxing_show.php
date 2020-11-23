<!DOCTYPE html>
<html lang="zh-CN">
<?php
require("../conn/conn.php");
require("../function.php");
$lm=2;
$lpid=$_GET['lpid'];
$hxid=$_GET['hxid'];
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
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="csrf-param" content="csrf_token_f">
<title><?php echo $infos['title'];?>楼盘详情_<?php echo $config['site_name'];?></title>
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
<!--    
<link href="/css/lphxt.css" rel="stylesheet">-->
<link href="/css/simple.slide.css" rel="stylesheet">
<LINK rel="stylesheet" type="text/css" href="/css/lightbox.css" />

<link href="/public/static/layui/css/layui.css" rel="stylesheet" />
<link href="/public/static/home/css/newshowhx.css" rel="stylesheet" />
<style>
.telphon-w-box .submitss {
    position: absolute;
    bottom: -20px;
    outline: none;
    background-color: #6bc30d;
    border: none;
    color: #FFF;
    font-size: 15px;
    letter-spacing: 1px;
    width: 70%;
    height: 40px;
    line-height: 40px;
    text-align: center;
    border-radius: 3px;
    left: 0;
    right: 0;
    margin: auto;
    cursor: pointer;
}
</style>
<?php include("../sq2.php");?>
</head>
<body>
<!-- 悬标 -->
<?php include("../ad_xf.php");?>
<!-- 导航 -->
<?php include("../top.php");?>
<?php $navfl=3;?>

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
<!-- 户型信息：begin -->
	<div class="clearfix nb">
	    <!-- 内容 -->
	    <div class="">
	        <div class="con">
	            <div id="carousel_container">
	                <div id="left_scroll"></div>
	                <div id="carousel_inner">
	                    <ul id="carousel_ul">
                         <?php
                $row = $mysql->query("select * from `web_pic` where `luopan_id`='{$lpid}' and `pid_flag`='xc1'");//
		//print_r($row);
		foreach($row as $k=>$list){
			$url="/loupan/huxing/{$lpid}_{$list['id']}.html";
				?>                  
                  <li class="<?php if($hxid==$list['id']){echo 'on';}?>" data-id="<?php echo $list['id'];?>">
	                            <a href="<?php echo $url;?>" class="db">
	                                <p class="f12"><?php echo $list['pic_name'];?><br> 约<?php echo $list['mj'];?>平</p>
	                            </a>
	                        </li>
            <?php }?>
						</ul>
	                </div>
	                <div id="right_scroll"></div>
	            </div>
	        </div>
	    </div>
	    <!-- 内容 end-->
        
		<?php
		$row = $mysql->query("select * from `web_pic` where `id`='{$hxid}'");//
        $hnrs=$row[0];
		?>
	    <div class="box" id="hx_box">
	        <!-- 内容 -->
	        <div class="zhuti yinying">
	            <div class="xc_img fl" style="width:747px;margin: 0 20px 20px 20px;border:1px solid #e1e1e1">
	            	<div class="clearfix tf">
	                	<div class="big_img HD_bigimg">
	                    	<a href="javascript:void(0);" class="HD_nowphoto"><img src="/<?php echo $hnrs['pic_img'];?>"></a>
	                    	<span><a href="/<?php echo $hnrs['pic_img'];?>" target="_blank"><img src="/public/static/home/image/seachcode.jpg" alt="">查看原图</a></span>
	                	</div>
	            	</div>
	            </div>

	            <div class="xc-info fl">
					<div class="n-tejia">
						<h1><?php echo $hnrs['pic_name'];?><i><?php echo $hnrs['zt'];?></i></h1>
						<div class="pic"><i><?php echo $hnrs['prices'];?></i>万元/套<button><a onClick="sq();" style="cursor:pointer;">咨询首付及贷款明细</a></button></div>
						<div class="xc-tags">
                        <?php
                    $gjs=str_replace("，",",",$hnrs['gj']);
					$gjss=explode(",",$gjs);
					$gjnum = count($gjss);
					for($i=0;$i<$gjnum;$i++){
					?>
                    <a href="javascript:void(0)" style="cursor:default;" class="tags-<?php $i+1;?>"><?php echo $gjss[$i];?></a>
                    <?php }?>
                      		
                            <div class="clear"></div>
                      	</div>
                      	<div class="h-x-i">
							<div class="h-left">
								<p><label>面积：</label>建面<?php echo $hnrs['mj'];?>㎡</p>
								<p><label>类型：</label><?php echo $hnrs['lx'];?></p>
							</div>
							<div class="h-right">
								<p><label>朝向：</label><?php echo $hnrs['cx'];?></p>
								<p><label>装修：</label><?php echo $hnrs['zx'];?></p>
							</div>
							<div class="clear"></div>
                      	</div>
                      	<div class="telphon-w-box">
                      		 <form class="submit_area">
          <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
          <input type="hidden" name="ly" value="<?php echo cityname($infos['city_id']);?><?php echo $infos['title'];?>楼盘户型页_预约看房">
                      	
							<span>预约看房</span>
							<div class="telphone"><i></i><input type="text" name="mobile" id="lp-wd-mobile" placeholder="您的手机号码"></div>
							<input type="button" class="apply_submit submitss" value="前往预约">
							</form>
                      	</div>
	            	</div>
	            		            </div>
	        </div>
	        <!-- 内容 end-->
	    </div>
	</div>
	<!-- 户型信息：end -->
	<div class="h20"></div>
	<!-- 户型点评:begin -->
	<div class="nb zydp">
		<!-- 置业信息:begin -->
         <?php
								$gwid=sjgw();
								$gws = $mysql->query("select * from `web_content` where `id`='{$gwid}' limit 0,1");
								?>	
		<div class="zhiye">
			<div class="m-auto"><div class="zy-head"><img src="/<?php echo $gws[0]['img'];?>" alt=""></div></div>
			<div class="m-auto"><span class="name"><?php echo $gws[0]['title'];?></span></div>
			<div class="m-auto"><span>已有<i class="red"><?php echo $gws[0]['keyword'];?></i>人免费咨询</span></div>
			<div class="m-auto"><span><a onClick="sq();" style="cursor:pointer;"><button>向TA咨询</button></a></span></div>
		</div>
		<!-- 置业信息:end -->
		<!-- 户型点评信息:begin -->
		<div class="dp-info">
			<h3>户型点评</h3>
			<div class="info">
				<i class="sanj"></i><?php echo $hnrs['jx'];?></div>
		</div>
		<!-- 户型点评信息:end -->
	</div>
	<!-- 户型点评:end -->
	<div class="h20"></div>
	<!-- 其他户型:begin -->
		<div class="nb zydp">
		<div class="hx-type">
			<div class="h-t"><span class="active" data="1">相同户型</span><span data="2">其他户型</span></div>
			<div class="hx-box">
				<div class="layui-carousel" id="test1">
					<div carousel-item>
						<div>
                        <ul class="qt-hx">
                                <?php
								echo '';
                $row = $mysql->query("select * from `web_pic` where `pid_flag`='xc1' and `id`<>'{$hxid}' and `pid_hx`='{$hnrs['pid_hx']}' order by id desc limit 12");//
		//print_r($row);
		foreach($row as $k=>$list){
			$url="/loupan/huxing/{$list['luopan_id']}_{$list['id']}.html";
				?>
                            <li>
								<a class="auto-box" href="<?php echo $url;?>">
									<div class="qt-thumb"><img src="/<?php echo $list['pic_img'];?>" alt=""><i><?php echo $list['zt'];?></i><span><?php echo lpname($list['luopan_id']);?></span></div>
									<p class="qt-tit"><?php echo $list['pic_name'];?></p>
									<p class="qt-mj">（建面）<?php echo $list['mj'];?> ㎡</p>
								</a>
								<div class="tags">
                                <?php
                    $gjs=str_replace("，",",",$list['gj']);
					$gjss=explode(",",$gjs);
					$gjnum = count($gjss);
					for($i=0;$i<$gjnum;$i++){
					?>
                    <a href="javascript:void(0)" style="cursor:default;" class="tags-<?php $i+1;?>"><?php echo $gjss[$i];?></a>
                    <?php }?>
                                </div>
							</li>
                            
            <?php 
			if($k==3 or $k==7){echo '</ul></div><div class=""><ul class="qt-hx">';}
			}?>
						</ul>
						</div>
				
                </div>
                </div>

				<div class="layui-carousel" id="test2" style="display: none;">
					<div carousel-item>
                    <div>
                    <ul class="qt-hx">
                             <?php
							 
							 echo '';
                $row = $mysql->query("select * from `web_pic` where `pid_flag`='xc1' and `id`<>'{$hxid}' and `pid_hx`<>'{$hnrs['pid_hx']}' order by id desc limit 12");//
		//print_r($row);
		foreach($row as $k=>$list){
			$url="/loupan/huxing/{$list['luopan_id']}_{$list['id']}.html";
				?>
                            <li>
								<a class="auto-box" href="<?php echo $url;?>">
									<div class="qt-thumb"><img src="/<?php echo $list['pic_img'];?>" alt=""><i><?php echo $list['zt'];?></i><span><?php echo lpname($list['luopan_id']);?></span></div>
									<p class="qt-tit"><?php echo $list['pic_name'];?></p>
									<p class="qt-mj">（建面）<?php echo $list['mj'];?> ㎡</p>
								</a>
								<div class="tags">
                                <?php
                    $gjs=str_replace("，",",",$list['gj']);
					$gjss=explode(",",$gjs);
					$gjnum = count($gjss);
					for($i=0;$i<$gjnum;$i++){
					?>
                    <a href="javascript:void(0)" style="cursor:default;" class="tags-<?php $i+1;?>"><?php echo $gjss[$i];?></a>
                    <?php }?>
                                </div>
							</li>
                            
            <?php 
			if($k==3 or $k==7){echo '</ul></div><div class=""><ul class="qt-hx">';}
			}?>
								
														</ul>
						</div>
				</div>
			</div>
		</div>
	</div>
	<!-- 其他户型:end -->
	</div>


       <div class="clear h20"></div>
	<!-- 热销楼盘 -->
    <style type="text/css">
	.house-com-k-2 {
    border: 1px solid #e1e1e1;
}
.hh-swt {color: #48bf01;display: inline-block!important;background: url(/public/static/home/image/v2.0/whapp.png) no-repeat left 7px center;padding: 4px 5px;text-indent: 25px;vertical-align: middle;border-radius: 5px;background-size: 20px 20px;border: 1px solid #48bf01;float: right;}
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
              <a href="javascript:;" onClick="sq();" class="hh-swt swtopen">在线咨询</a>
              
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
              <a href="javascript:;" onClick="sq();" class="hh-swt swtopen">在线咨询</a>
              
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
#carousel_container{position:relative; height:65px; overflow:hidden;}
#carousel_inner{width:1126px; height:65px; overflow: hidden; position:absolute;left:37px; top:5px;}
#left_scroll{position: absolute;left:0px;top:16px;width:35px;height:48px;cursor: pointer;background:url(/image/l_2.png) no-repeat;    background-size: 30px 30px;}
#right_scroll{position: absolute;top:16px;right:-5px; width: 35px;height: 48px;cursor: pointer; background: url(/image/r_2.png) no-repeat;    background-size: 30px 30px;}

#carousel_container2{position:relative; height:190px; overflow:hidden;}
#carousel_inner2{width:1126px; height:190px; overflow: hidden; position:absolute;left:37px; top:5px;}
#left_scroll2{position: absolute;left:0px;top:71px;width:35px;height:48px;cursor: pointer;background:url(/image/l_2.png) no-repeat;    background-size: 30px 30px;}
#right_scroll2{position: absolute;top:71px;right:-5px; width: 35px;height: 48px;cursor: pointer; background: url(/image/r_2.png) no-repeat;    background-size: 30px 30px;}

#carousel_ul2{width:9999px; height:181px; position:relative;}
#carousel_ul2 li{float: left;width:270px; margin-right:15px; display:inline;position: relative;border-radius: 7px;overflow: hidden;}
#carousel_ul2 li img{width: 270px}
#carousel_ul2 li a{display: block;}
#carousel_ul2 h4{position:absolute;left:0;bottom:0;width:250px;padding:0 10px;line-height:30px;height:30px;overflow:hidden;margin:0;font-size:14px;color:#fff;filter:progid:DXImageTransform.Microsoft.gradient(enabled='true', startColorstr='#99000000', endColorstr='#99000000');background:rgba(0,0,0,.6);text-align:center;font-weight:400}
-->
</style>
<div class="house-com-k-2 mt20" style="display:none;">
      <div class="tit" style="background: url(/public/static/home/image/v2.0/tit.jpg) no-repeat 1px 10px;padding-left: 20px;line-height: 63px;overflow:hidden;color: #fff;font-weight: normal;">     
          热门区域     
      </div>
	<div class="con" style="border: 0;">
	    <div id="carousel_container2">
	        <div id="left_scroll2"></div>
	        <div id="carousel_inner2">
	            <ul id="carousel_ul2">                
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
	        <div id="right_scroll2"></div>
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
			oList: "carousel_ul2",
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
</div>

<script src="/public/static/layui/layui.js"></script>
<script type="text/javascript">
// 户型轮播
layui.use('carousel', function(){
	var carousel = layui.carousel;
	carousel.render({
		elem: '#test1'
		,width: '100%'
		,height: '350px'
		,arrow: 'none'
		,interval: 8000
	});

	carousel.render({
		elem: '#test2'
		,width: '100%'
		,height: '350px'
		,arrow: 'none'
		,interval: 8000
	});
});

// 户型轮播切换
$('.h-t').children('span').click(function () {
	var data = $(this).attr('data');
	$(this).addClass('active').siblings().removeClass('active');
	$('.hx-box').children('#test'+data).show().siblings().hide();
});

//楼盘相册左右点击
var width = $('#carousel_ul').children('li').length;
$('#carousel_ul').css('width',width*120+5);
//右滑相册
var index = 1;
var num = 0;
$('#right_scroll').click(function(){
	if(index >= width-8){
		layer.alert('已经是最后一张了，试试往前滑吧！！', {icon: 6});
	}else{
		num = -120*index;
		$("#carousel_ul").animate({marginLeft: num}, "slow");
		index++;
	}
});
//左滑相册
$('#left_scroll').click(function(){
	if(index <= 1){
		layer.alert('不能再往前了..', {icon: 5});
	}else{
		num = parseInt(num)+120;
		$("#carousel_ul").animate({marginLeft: num}, "slow");
		index--;
	}
});
</script>
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
<?php $bbs='huxing';?>
<?php include("../bottom.php");?>

<script src="/js/type.js"></script>

	<script src="/js/lightbox-2.6.min.js"></script>
</body>
</html>
<?php include("../sq.php");?>
