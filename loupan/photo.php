<!DOCTYPE html>
<html lang="zh-CN">
<?php
require("../conn/conn.php");
require("../function.php");
$lm=2;
$lpid=$_GET['lpid'];
$flag=$_GET['flag'];
if($flag==''){
	$flag='xc4';
	}
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
    
    <link href="/css/lightbox.css" rel="stylesheet">
<LINK rel="stylesheet" type="text/css" href="/css/lightbox.css" />
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
<?php $navfl=5;?>

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
<div class="clearfix">
       <!-- left -->
       <div class="xc_img fl lp_album_list">
            <div class="clearfix tf">
              <div class="main_left_title clearfix liebiao_ck">
                <p>高清看图</p>
              </div>
            </div>            
            <!-- list -->
            <div class="xc_list album_box" style="width: 882px;">
                  <ul class="clearfix border_by List_imglist" id="one_thumb1">
                  
                     <?php
$key=$_GET['key'];
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
if($flag<>"0"){
$sql="WHERE `pid_flag`='{$flag}' and `luopan_id`='{$lpid}' ";
}else{
$sql="WHERE `pid_flag`<>'xc1' and `luopan_id`='{$lpid}' ";
	}



if($page==0){
	$page=1;
	}

$page_num =12;
$offset = ($page-1)*$page_num;
$rsc = $mysql->query("select count(*) as count from `web_pic` {$sql}");// WHERE `adminid`='{$_SESSION['admin_id']}'
//echo "select count(*) as count from `oa_client` {$sql}";
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/$page_num);
$row = $mysql->query("select * from `web_pic` {$sql} order by pic_px desc limit $offset,$page_num");// WHERE `adminid`='{$_SESSION['admin_id']}'
//echo "select * from `web_pic` {$sql} order by pic_px desc limit $offset,$page_num";
if($result["total"]==0){
	echo "<li align=center style='padding:10px;font-size:15px;border-bottom:dashed #ccc 1px'><h1>很抱歉,没有结果。</h1></li>";
	}else{
		foreach($row as $k=>$list){
			
?>
	           			
                    
                    <li class="xc_img_list echo-img">
                        <a class="fancybox-thumbs" data-fancybox-group="thumb" href="/<?php echo $list['pic_img'];?>" title="<?php echo loupanflag($list['pid_flag']);?>">
                        <img  class="lazy" src="/<?php echo $list['pic_img'];?>" alt="<?php echo loupanflag($list['pid_flag']);?>" style="height: 113px; width:175px;" ></a>
                        <p style="text-align: center;padding-top: 6px;">
                        <a title="<?php echo loupanflag($list['pid_flag']);?>" href="javascript:;"><?php echo loupanflag($list['pid_flag']);?></a></p>
                    </li>
                    
<?php
		}
	}
?> </ul>
            </div>
            <div class="clear"></div>
            <div class="h10"></div>
            <div class="fr">
            <ul class="pagination">
                <?php
   		$pagess="";
		if($page==1){ $pagess.='<li class="disabled"><span>«</span></li>';}
		if($page>1){ $pagess.='<li class=""><a href="/loupan/photo/'.$lpid.'_'.$flag.'_'.($page-1).'.html">«</a></li>';}
		if($total>=10){
			
			for ($i=1; $i<=$total; $i++) {
				if($page<$i+5 && $page>$i-5){
						if($page==$i){ $pagess.='<li class="active"><a href="/loupan/photo/'.$lpid.'_'.$flag.'_'.$i.'.html">'.$i.'</a></li>';}else{$pagess.='<li><a href="/loupan/photo/'.$lpid.'_'.$flag.'_'.$i.'.html">'.$i.'</a></li>';}
                    }
				}
			}else{
					for ($i=1; $i<=$total; $i++) {
						if($page==$i){ $pagess.='<li class="active"><a href="/loupan/photo/'.$lpid.'_'.$flag.'_'.$i.'.html">'.$i.'</a></li>';}else{$pagess.='<li><a href="/loupan/photo/'.$lpid.'_'.$flag.'_'.$i.'.html">'.$i.'</a></li>';}
                    }
				}
			
			/*if($page<$total){$pagess.='<li class="next"><a href="/loupan/photo/'.$lpid.'_'.$flag.'_'.($page+1).'.html">»</a></li>';}*/
		echo $pagess;
	?>
                </ul>
            </div>
            <!-- list end-->
       </div>
       <!-- left end-->
       <!-- right -->
         <div class="main_rt300 fr">
            <div class="xc_xmdl clearfix">
            <dl class="dl" id="suofang" style="height: 370px;">
                <!-- 航拍看房部分 -->
                <dd class="clearfixdt dt"><i class="i2 ishouhui "></i><span>室外图</span></dd>
                                <dd class="clearfix dd <?php if($flag=='xc4'){ echo 'dd_on';}?>">
                  <a href="<?php echo "/loupan/photo/{$lpid}_xc4.html";?>">
                  <i class="i3"></i><span>效果图</span><em><?php echo countxc('xc4',$lpid);?></em></a>
                </dd>  
                   <dd class="clearfix dd <?php if($flag=='xc3'){ echo 'dd_on';}?>">
                  <a href="<?php echo "/loupan/photo/{$lpid}_xc3.html";?>"><i class="i11"></i><span>样板间</span><em><?php echo countxc('xc3',$lpid);?></em></a>
                </dd>
                                <dd class="clearfix dd <?php if($flag=='xc2'){ echo 'dd_on';}?>">
                  <a href="<?php echo "/loupan/photo/{$lpid}_xc2.html";?>">
                  <i class="i4"></i><span>实景图</span><em><?php echo countxc('xc2',$lpid);?></em></a>
                </dd>
                                <dd class="clearfix dd <?php if($flag=='xc8'){ echo 'dd_on';}?>">
                 <a href="<?php echo "/loupan/photo/{$lpid}_xc8.html";?>">
                  <i class="i5"></i><span>交通图</span><em><?php echo countxc('xc8',$lpid);?></em></a>
                </dd>
                           
                                <dd class="clearfix dd <?php if($flag=='xc6'){ echo 'dd_on';}?>">
                  <a href="<?php echo "/loupan/photo/{$lpid}_xc6.html";?>"><i class="i11"></i><span>配套图</span><em><?php echo countxc('xc6',$lpid);?></em></a>
                </dd>
                            </dl>
            <div class="shouhui hide"></div>
            <div class=" huishou_on hide"></div>
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
              <a href="javascript:;"  class="hh-swt" onClick="sq();">在线咨询</a>
              
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
              <a href="javascript:;"  class="hh-swt" onClick="sq();">在线咨询</a>
              
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

<link rel="stylesheet" type="text/css" href="/fancybox/source/helpers/jquery.fancybox-thumbs.css?v=1.0.7" />


	<script type="text/javascript" src="/fancybox/source/jquery.fancybox.js?v=2.1.3"></script>

	<link rel="stylesheet" type="text/css" href="/fancybox/source/jquery.fancybox.css?v=2.1.2" media="screen" />
<script type="text/javascript" src="/fancybox/source/helpers/jquery.fancybox-thumbs.js?v=1.0.7"></script>
	<script type="text/javascript">
		$(document).ready(function() {
			$('.fancybox-thumbs').fancybox({
				prevEffect : 'none',
				nextEffect : 'none',
				closeBtn  : true,
				arrows    : true,
				nextClick : true,
				helpers : {
					thumbs : {
						width  : 50,
						height : 50
					}
				}
			});
		})
		</script>
</body>
</html>
<?php include("../sq.php");?>