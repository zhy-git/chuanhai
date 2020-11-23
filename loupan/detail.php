<!DOCTYPE html>
<html lang="zh-CN">
<?php
require("../conn/conn.php");
require("../function.php");
$lm=2;
$lpid=$_GET['lpid'];
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
    <!--<link href="/css/lpdetails.css" rel="stylesheet">-->
<?php include("../sq2.php");?>
</head>
<body>
<!-- 悬标 -->
<?php include("../ad_xf.php");?>
<!-- 导航 -->
<?php include("../top.php");?>
<?php $navfl=2;?>
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
 <div class="container-super">
       <div class="common-title"><strong>项目参数</strong></div>
              <table class="lpm-section4-table mt30">
                 <tbody><tr>
                    <td class="lpm-table-1">                    		
                		<a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>单价">均价</a>                         
                    </td>
                    <td class="lpm-table-2">
                		<span class="jiage"><?php echo $infos['jj_price'];?>元/㎡</span>                        
	                </td>
                    <td class="lpm-table-1">
				        <a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>开盘时间">开盘时间</a> 
                    </td>
                    <td class="lpm-table-2"><?php echo $infos['kptime'];?></td>
                    <td class="lpm-table-1">
                    	<a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>交房时间">交房时间</a> 
                    </td>
                    <td class="lpm-table-2">
                        <span class="lpm-location"><?php echo $infos['jftime'];?></span>
                    </td>
                 </tr>
                 <tr>
                    <td class="lpm-table-1">
                    	<a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>售楼处电话">售楼处电话</a> 
                    </td>
                    <td class="lpm-table-2"><?php echo telsee($infos['loupan_tel']);?></td>
                    <td class="lpm-table-1">
                    	<a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>楼盘地址">楼盘地址</a> 
                    </td>
                    <td class="lpm-table-2"><span class="lpm-location"><?php echo $infos['xmdz'];?></span></td>
                    <td class="lpm-table-1">
                    	<a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>装修状况">装修状况</a> 
                    </td>
                    <td class="lpm-table-2"><?php echo loupanflagzx($infos['flagzx'],5)?></td>
                 </tr>
                 <tr>
                    <td class="lpm-table-1">
                    	<a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>建筑形式">建筑形式</a>                     	
                    </td>
                    <td class="lpm-table-2">
                     <span class="fl"><?php echo loupanflagtsi3($infos['flaglb'],3,3);?></span>
                     </td>
                    <td class="lpm-table-1">                    	
                    	<a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>占地面积">占地面积</a> 
                    </td>
                    <td class="lpm-table-2">
                      <span class="fl"><?php echo $infos['zdmj'];?></span>
                      
                    </td>
                    <td class="lpm-table-1"> 
                    		<a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>建筑面积">建筑面积</a> 
                    </td>
                    <td class="lpm-table-2"><?php echo $infos['jzmj'];?></td>
                 </tr>
                 <tr>
                    <td class="lpm-table-1">主力户型</td>
                    <td class="lpm-table-2"><?php echo $infos['zlhx'];?></td>
                    <td class="lpm-table-1">
                    	<a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>容积率">容 积 率</a> 
                    </td>
                    <td class="lpm-table-2">
                        <span class="fl"><?php echo $infos['rjl'];?>&nbsp;</span>
                    </td>
                    <td class="lpm-table-1">                    	
                    	<a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>绿化率">绿 化 率</a> 
                    </td>
                    <td class="lpm-table-2">
                        <span class="fl lpm-location1"><?php echo $infos['lhl'];?></span>
                    </td>
                 </tr>
                 <tr>
                    <td class="lpm-table-1">
                    	<a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>房屋产权">房屋产权</a> 
                    </td>
                    <td class="lpm-table-2">
                        <span class="fl"><?php echo $infos['cqnx'];?></span>
                     </td>
                    <td class="lpm-table-1"> 
                    	<a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>规划户数">规划户数</a> 
                    </td>
                    <td class="lpm-table-2">
                       <span class="lpm-location"><?php echo $infos['zhs'];?></span>    
                    </td>
                    <td class="lpm-table-1">
                		 <a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>车位数">车 位 数</a> 
                    </td>
                    <td class="lpm-table-2">
                        <span class="fl lpm-location lpm-section4-link"><?php echo $infos['cws'];?></span>
                    </td>
                 </tr>
                    <tr>
                    <td class="lpm-table-1">楼层情况 </td>
                    <td class="lpm-table-2">
                        <span class="fl lpm-location lpm-section4-link"><?php echo $infos['lczk'];?></span>
                    </td>
                    <td class="lpm-table-1"> 栋数</td>
                    <td class="lpm-table-2">
                       <span class="lpm-location"><?php echo $infos['zds'];?></span>    
                    </td>
                    <td class="lpm-table-1">                    	
                		<a target="_blank" href="javascript:;" title="户型面积">户型面积</a>                 		  
                    </td>
                    <td class="lpm-table-2">
                        <span class="fl lpm-location lpm-section4-link"><?php echo $infos['hxmj'];?></span>
                    </td>
                 </tr>                 
                  <tr>
                    <td class="lpm-table-1">
                    	<a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>物业公司">物业公司</a> 
                    </td>
                    <td class="lpm-table-2"><?php echo $infos['wygs'];?></td>
                    <td class="lpm-table-1">
                    	<a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>物业类型">物业类型</a> 
                    </td>
                    <td class="lpm-table-2"><span class="lpm-location"><?php echo $infos['wylx'];?></span>    </td>
                    <td class="lpm-table-1">
                    	<a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>物业费">物 业 费</a>                     	
                    </td>
                    <td class="lpm-table-2"> 
                        <span class="fl lpm-location lpm-section4-link"><?php echo $infos['wyf'];?>&nbsp;</span>
                    </td>
                 </tr>                 
                  <tr>
                    <td class="lpm-table-1">
                    	<a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>开发商">开 发 商</a> 
                    </td>
                    <td class="lpm-table-2">
                        <span class="lpm-location"><?php echo $infos['kfs'];?></span>
                     </td>
                    <td class="lpm-table-1">预售许可</td>
                    <td class="lpm-table-2">
                       <span class="lpm-location"><?php echo $infos['ysxkz'];?></span>    
                    </td>
                    <td class="lpm-table-1">
                    	<a target="_blank" href="javascript:;" title="<?php echo $infos['title'];?>销售地址">销售地址</a>                     	
                    </td>
                    <td class="lpm-table-2">
                        <span class="fl lpm-location lpm-section4-link"><?php echo $infos['sldz'];?></span>                      
                    </td>
                 </tr>                                  
              </tbody>
          </table>
   </div>
<div style="height:20px;"></div>
<div class="det-box-1">
      <div class="w868 fl" style="width: 911px;">
        	<!-- 项目介绍 -->
        	<div class="pro-intro mt40">
        	   <div class="container-super lpxq" style="width: 860px;margin: 0 ;">
        	       <div class="mess-param-title">
        	         <strong>项目介绍</strong>
        	       </div>
        	       <p class="mt20"></p>
                   <?php echo $infos['content'];?>
        	    </div>
        	</div>
        	<!-- 项目介绍 end-->
        	<!-- 区位介绍 -->
        	<div class="pro-special mt40">
        	   <div class="container-super lpxq" style="width: 860px;margin: 0 ;">
        	        <div class="mess-param-title">
        	         <strong>区位介绍</strong>
        	      </div>
        	      <p class="mt20 f16" style="text-indent: 25px;">
                   <?php echo $infos['lptd'];?>
                  </p>
        	   </div>
        	</div>
        	<!-- 区位介绍 end-->
      </div>
      <div class="fl">
          <div class="h40"></div>
          <div class="hot-house" style="background: #fff">
          <div id="hotBuilds" class="city-hot-lp">
              <div><span class="f18">其他楼盘信息</span></div>                      
              <!-- list -->
              <?php
                     $row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px11 desc limit 0,5");// and `city_id`='57'
              shuffle($row);
            //  print_r($row);
              foreach($row as $k=>$list){
						$url="/loupan/{$list['id']}.html";
						?>
            <div class="city-hot-list1">
                <a href="<?php echo $url;?>" class="city-hot-link" target="_blank">
                  <div class="pull-left pr"><img original="<?php echo $site.$list['img'];?>" alt="<?php echo $list['title'];?>" class="trs lazy">
                                </div>
                  <div class="pull-left" style="width: 160px;"><div><span>[<?php echo cityname($list['city_id']);?>]</span><?php echo $list['title'];?></div><p>
                   <?php if($list['all_price']==0){?>
				<?php if($list['jj_price']==0){?>
                 待定
				<?php }else{?>
                 <?php echo $list['jj_price'];?>元/㎡
				<?php }?>
			<?php }else{?>
             <?php echo $list['all_price'];?>万/套
			<?php }?>
                  </p></div></a>
              </div>
                <?php
					
					}
					?>
                            <!-- list end-->
              <div class="clear"></div>
            </div>
        </div> 
      </div>
      <div class="clear"></div>
  </div>
<div style="height:20px;"></div>

<!-- 项目介绍 -->
    <div class="lp-detail-bm">
      <h3>关于楼盘详情，我想找到...</h3>
      <p>这个开发商资质如何？靠不靠谱？</p>
      <p>我有没有购房资质？</p>
      <p>...</p>
      <h3>找本楼置业顾问问清楚吧</h3>
      <div class="h10"></div>
      <div class="advice-free" style="float: left;">
          <div class="ipt-area mt10" style="line-height: 30px;">
          <form class="submit_area">
              <input type="hidden" name="pid" value="33">
          <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
          <input type="hidden" name="ly" value="<?php echo cityname($infos['city_id']);?><?php echo $infos['title'];?>楼盘详细页_底部_免费咨询">
              <input type="text" class="ipt common-free-mobile-ipt" placeholder="请输入手机号" name="mobile" id="lp-list-mobile" style="width: 360px;">
              <input type="button" class="btn btn-cons common-free-mobile-btn apply_submit" value="免费咨询">&nbsp;&nbsp;<span class="f16">或者</span>
              <span class="f16 red">免费咨询我们：<?php echo $config['company_tel'];?></span>
          </form>
          </div>          
      </div>
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
<?php include("../bottom.php");?>
</body>
</html>
<?php include("../sq.php");?>