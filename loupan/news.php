<!DOCTYPE html>
<html lang="zh-CN">
<?php
require("../conn/conn.php");
require("../function.php");
$lm=2;
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
	}
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="csrf-param" content="csrf_token_f">
<title><?php echo $infos['title'];?>_楼盘动态_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $infos['title'];?>楼盘动态,<?php if($infos['keyword']){echo $infos['keyword'];}else{echo $config['site_keyword'];}?>">
<meta name=description content="<?php echo $infos['title'];?>楼盘动态,<?php if($infos['desc']){echo $infos['desc'];}else{echo $config['site_desc'];}?>">
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
<!--<link href="/css/lpnews.css" rel="stylesheet">-->
<?php include("../sq2.php");?>
</head>
<body>
<!-- 悬标 -->
<?php include("../ad_xf.php");?>
<!-- 导航 -->
<?php include("../top.php");?>
<?php $navfl=4;?>

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
   <div class="h20"></div>
<!-- 楼盘动态 -->
	<div class="left870">
        <div class="lpm-section2-1 fl mt30">
               <div class="common-title">
                 <strong><?php echo $infos['title'];?>动态</strong>
               </div>
                <?php
$key=$_GET['key'];
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$sql="WHERE `pid`='28' and `lpid`='{$lpid}' ";

if($key!=""){
	$sql.=" and `title` like '%{$key}%'";
	}
if($page==0){
	$page=1;
	}

$page_num =20;
$offset = ($page-1)*$page_num;
$rsc = $mysql->query("select count(*) as count from `web_content` {$sql}");// WHERE `adminid`='{$_SESSION['admin_id']}'
//echo "select count(*) as count from `oa_client` {$sql}";
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/$page_num);
$row = $mysql->query("select * from `web_content` {$sql} order by id desc limit $offset,$page_num");// WHERE `adminid`='{$_SESSION['admin_id']}'
//echo "select * from `oa_client` {$sql} order by id desc limit $offset,$page_num";
if($result["total"]==0){
	echo "<li align=center style='padding:10px;font-size:15px;border-bottom:dashed #ccc 1px'><h1>很抱歉,没有结果。</h1></li>";
	}else{
		foreach($row as $k=>$list){
			$url='/loupan/news_show/'.$list['id'].'.html';
?>
	           					<dl class="lpm-section2-3 mt20">
					<div class="time-wrapper">
								                <h1 class="dt-date"><?php echo date('m/d',strtotime($list['addtime']));?></h1>
		                <h2 class="dt-time"><?php echo date('H:i:s',strtotime($list['addtime']));?></h2>
		                <h3 class="dt-years"><?php echo date('Y',strtotime($list['addtime']));?></h3>
		                		               </div>			
					<div class="r-content">
						<dt><a target="_blank" href="<?php echo $url;?>">[楼盘动态]<?php echo $list['title'];?></a></dt>
						<dd class="lpm-section2-4">
						  <a target="_blank" href="<?php echo $url;?>"><?php echo mb_substr(strip_tags($list['content']),0,130,"utf-8"); ?>...</a>
						</dd>
					</div>
					</dl>
                    
<?php
		}
	}
?>
                    
			    				
		<div class="h20"></div>
        
        <style>
		.pagination {
    height: 40px;
    float: right;
}
		</style>
			<ul class="pagination">
				<?php
                $pagess="";
                if($page==1){ $pagess.='<li class="disabled"><span>«</span></li>';}
                if($page>1){ $pagess.='<li class="prev"><a href="/loupan/news/'.$lpid.'_'.($page-1).'.html">«</a></li>';}
                if($total>=10){
                    for ($i=1; $i<=$total; $i++) {
                        if($page<$i+5 && $page>$i-5){
                                if($page==$i){ $pagess.='<li class="active"><a href="/loupan/news/'.$lpid.'_'.$i.'.html">'.$i.'</a></li>';}else{$pagess.='<li><a href="/loupan/news/'.$lpid.'_'.$i.'.html">'.$i.'</a></li>';}
                            }
                        }
                    }else{
                            for ($i=1; $i<=$total; $i++) {
                                if($page==$i){ $pagess.='<li class="active"><a href="/loupan/news/'.$lpid.'_'.$i.'.html">'.$i.'</a></li>';}else{$pagess.='<li><a href="/loupan/news/'.$lpid.'_'.$i.'.html">'.$i.'</a></li>';}
                            }
                        }
                    
                    if($page<$total){$pagess.='<li class="next"><a href="/loupan/news/'.$lpid.'_'.($page+1).'.html">»</a></li>';}
                echo $pagess;
            ?>
                </ul>
            </div>	
	</div>
	<!-- right -->
	<div class="loupan-list-right mt10">
		<!-- 订阅 -->
		<div class="lp_information_box clearfix info-solution w280">			
			<div class="bigtit">				
				<h3 style="font-weight:bold">获取最新优惠动态</h3>
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
                <input type="hidden" name="ly" value="[<?php echo cityname($infos['city_id']);?>]<?php echo $infos['title'];?>楼盘动态_右侧_订阅动态">
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
			<p class="center"><img src="/public/static/home/image/lp/lp_r_1.jpg" alt="专业水准"></p>
			<p class="center"><img src="/public/static/home/image/lp/lp_r_2.jpg" alt="客户立场"></p>
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
		<div class="h20"></div>
		<style type="text/css">
.c {display: block;zoom: 1;}
.com-xxk-box{margin-top: 10px;}
.com-xxk-box .xxk_ul{height: 30px;}
.com-xxk-box .xxk_ul a{width: 100px;text-align: center;background-color: #DCDCDC;font-size: 14px;float: left;cursor: pointer;padding: 6px 0;}
.com-xxk-box .xxk_ul a.cur {background: #f26d0b;color: #ffffff;}
.xxk_news_ul li {padding: 10px 0;height: 12px;}
.xxk_news_ul li a {float: left;display: inline-block;font-size: 14px;color: #666;margin-left: 8px;width: 252px;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;}
.xxk_news_ul li em {position: relative;top: 2px;float: left;display: inline-block;width: 15px;height: 15px;border-radius: 3px;background-color: #E8E8E8;line-height: 15px;text-align: center;font-size: 12px;color: #7C7C7C;}
.xxk_news_ul li.on em {background-color: #F42828;color: #fff;}
.xxk-rlist{display: none;}
.com-xxk-box .show{display: block;}
</style>
<div class="com-xxk-box jyTable">
	<div class="xxk_ul title">
	    <a class="cur" href="/news/">热门动态</a>
	    <a href="/news/index_22.html" class="">购房指南</a>
	    <a href="javascript:;" class="">楼盘问答</a>
	</div>
	<div class="clear"></div>
	<div class="xxk_news_list">
		<div class="xxk-rlist show">
			<ul class="xxk_news_ul">
				<?php
			$rownews = $mysql->query("select * from `web_content` WHERE `pid`='28' and `city_id`='{$sitecityid}' and `id`<>'{$id}' order by addtime desc limit 10");
			foreach($rownews as $k=>$lists){
			$url='/loupan/news_show/'.$lists['id'].'.html';
		?>
            <li class="on c">
					<em><?php echo $k+1;?></em>
					<a target="_blank" href="<?php echo $url;?>"><?php echo $lists['title'];?></a>                                    
				</li>	
        <?php }?>			
			</ul>
		</div>
		<div class="xxk-rlist">
			<ul class="xxk_news_ul">		
				<?php
			$rownews = $mysql->query("select * from `web_content` WHERE `pid`='22' order by addtime desc limit 10");
			foreach($rownews as $k=>$lists){
			$url='/news/show_'.$lists['id'].'.html';
		?>
            <li class="on c">
					<em><?php echo $k+1;?></em>
					<a target="_blank" href="<?php echo $url;?>"><?php echo $lists['title'];?></a>                                    
				</li>	
        <?php }?>
		</ul>
		</div>
		<div class="xxk-rlist">
			<ul class="xxk_news_ul">
            
				<?php
			$rownews = $mysql->query("select * from `web_book` WHERE `pid`='30' and `cl`='1' order by addtime desc limit 10");
			foreach($rownews as $k=>$lists){
			$url='/loupan/wenda/show_'.$lists['id'].'.html';
		?>
            <li class="on c">
					<em><?php echo $k+1;?></em>
					<a target="_blank" href="<?php echo $url;?>"><?php echo $lists['ucontent'];?></a>                                    
				</li>	
        <?php }?>
            
            </ul>
		</div>
	</div>
</div>
	</div>
	<!-- right end-->
	<div class="clear"></div>	
	
	
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
</div>

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

<script>
;(function (window, $, undefined) {   
    $.fn.createTab = function (opt) {
        var def = {
            activeEvt: 'mouseover',
            activeCls: 'cur'
        }
        $.extend(def, opt);
        this.each(function () {
            var $this = $(this);
            var timer;
            $this.find('.title a').mouseover(def.activeEvt,function(){
            	console.log(1);
                var index = $(this).index(),
                that = $(this);                
                that.addClass('cur').siblings().removeClass('cur');                    
                $(".xxk_news_list > div").eq($(this).index()).addClass("show").siblings().removeClass('show');                 
            }).mouseout(function(){                
                $(".xxk_news_list > div").eq($(this).index()).addClass("show").siblings().removeClass('show'); 
            })
        });
    }
})(window, jQuery);
$(function(){
    $(".jyTable").createTab()
})
</script> 

</body>
</html>
<?php include("../sq.php");?>
