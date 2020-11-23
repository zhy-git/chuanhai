<!DOCTYPE html>
<html lang="zh-CN">
<?php
require("../conn/conn.php");
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
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="csrf-param" content="csrf_token_f">
<title><?php echo $infoc['title'];?>_<?php echo $infos['title'];?>_楼盘动态_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $infos['title'];?>楼盘动态,<?php if($infoc['keyword']){echo $infoc['keyword'];}else{echo $config['site_keyword'];}?>">
<meta name=description content="<?php echo $infos['title'];?>楼盘动态,<?php if($infoc['desc']){echo $infoc['desc'];}else{echo $config['site_desc'];}?>">
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
<!--<link href="/css/lpnews.css" rel="stylesheet">
<link href="/css/zxxqy.css" rel="stylesheet">-->
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
<div class="left870">
        <div class="lpm-section2-1 fl mt30">
               <div class="common-title" style="height: auto;">
                 <strong><?php echo $infoc['title'];?></strong>
               </div>
               <div class="lpm-c1">                  
			        <p class="lpm-c2 fl">
			            <?php if($infoc['zds']){?><span>来源：<?php echo $infoc['zds'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;<?php }?>
			           	<?php if($infoc['zhs']){?><span>作者：<?php echo $infoc['zhs'];?></span>&nbsp;&nbsp;&nbsp;&nbsp;<?php }?>
			            <span class="lpm-c2-time">发布时间：<?php echo $infoc['addtime'];?></span>			            
			         </p>
			    </div>
			    <style type="text/css">
				.lpm-c4-article a:hover{text-decoration: underline!important;}
			    </style>
			    <div class="lpm-c4-article">
           			<?php echo $infoc['content'];?>
                    <div class="post-list-net" style="margin-bottom: 20px;">
               			<div class="fit-1">
               				上一篇：
                            <?php
			$row = $mysql->query("select * from `web_content` where `path`='0-5' and `pid`=28 and `lpid`='{$lpid}' and `addtime`>'{$addtime}' and `id`<>'{$id}' order by addtime asc limit 0,1");
			if($row[0]==''){
				echo '暂无';
			}else{
			foreach($row as $k=>$list){
		?>
            <a href="/loupan/news_show/<?php echo $list['id'];?>.html" target="_blank" title="<?php echo $list['title'];?>"><?php echo $list['title'];?></a>
        <?php
			}
			}
		?>
                            </div>
               			<div>
               				下一篇：
                            <?php
			$row = $mysql->query("select * from `web_content` where `path`='0-5' and `pid`=28 and `lpid`='{$lpid}' and `addtime`>'{$addtime}' and `id`<>'{$id}'  order by addtime desc limit 0,1");
			if($row[0]==''){
				echo '暂无';
			}else{
			foreach($row as $k=>$list){
		?>
            <a href="/loupan/news_show/<?php echo $list['id'];?>.html" target="_blank" title="<?php echo $list['title'];?>"><?php echo $list['title'];?></a>
        <?php
			}
			}
		?>
                            </div>
               		</div>
               		<!-- 报名 -->
               		<style type="text/css">
.infoboxinf{width: 335px}
.infoboxinf h3{font-size: 24px; border-bottom: 1px dashed #dfdfdf;padding-bottom: 15px;  padding-top: 6px;    vertical-align: top;font-weight: normal;display: inline-block;}
.pt10{padding-top: 10px;}
.w570{width: 570px;}
.int32{    height: 35px;border: 1px solid #dfdfdf;line-height: 35px;width: 222px;padding-left: 8px;}
</style>
	
<div style="border: 1px solid #dfdfdf;padding: 10px">
	<div class="fl w570" style="border-right: 1px solid #dfdfdf;">
		<div class="fl" style="width: 235px;">
			<a href="/loupan/<?php echo $lpid;?>.html" target="_blank" title="<?php echo $infos['title'];?>"><img src="/<?php echo $infos['img'];?>" alt="<?php echo $infos['title'];?>" width="218" height="167"></a>
		</div>
		<div class="infoboxinf fl">
			<a href="/loupan/<?php echo $lpid;?>.html" target="_blank" title="<?php echo $infos['title'];?>"><h3><?php echo $infos['title'];?></h3></a>
			<span class="sale-status"><?php
            $flagztz='';
			  $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='8' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $infos['ztz'])){
					echo ''.$listflag['flag'].'';
				}
			}
			?></span>
			<ul class="pt10">
				<li style="margin-bottom: 6px;">
                 <?php if($infos['all_price']==0){?>
							<?php if($infos['jj_price']==0){?>
                            <span>参考均价：</span><span class="red f16">待定</span>				
                                    <?php }else{?>
                                    <span>参考均价：</span><span class="red f16"><?php echo $infos['jj_price'];?>元/㎡</span>
                                    <?php }?>
                                <?php }else{?>
                                <span>参考总价约：</span><span class="red f16"><?php echo $infos['all_price'];?>万/套</span>
                            <?php }?>
                </li>
				<li style="margin-bottom: 6px;"><span>楼盘地址：</span><?php echo $infos['xmdz'];?></li>
				<li style="margin-bottom: 6px;"><span>楼盘电话：</span><span class="red f18"><?php echo telsee($infos['tel']);?></span></li>
			</ul>
		</div>
		<div class="clear"></div>
	</div>
	<div class="fl" style="margin-left: 20px;">
		<form class="submit_area">
            <input type="hidden" name="pid" value="33">   
          <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
			<input type="hidden" name="ly" value="[<?php echo cityname($infos['city_id']);?>]<?php echo $infos['title'];?>详细页资讯_底部_我要报名">
			
			<p style="padding-top: 10px;padding-bottom: 10px;">
			<input type="text" name="name" placeholder="请输入您的姓名" class="int32">
			</p>
			<p style="padding-bottom: 10px;">
			<input type="text" name="mobile" id="lp-nmkf-mobile" placeholder="请输入您的手机号码" maxlength="12" class="int32">
			</p>
			<div class="h10"></div>
			<p style="padding-bottom: 0"><input type="button" class="btn lp-btn apply_submit" value="我要报名" style="width: 233px;background: #00A0EA" ></p>
		</form>
	</div>
	<div class="clear"></div>
</div> 
               		<div style="height: 40px"></div>
               		<div class="statement" style="color: #999;padding: 15px 0px;line-height: 22px;">重要提示：本页面内容旨在为满足广大用户的信息需求而采集提供，非广告服务性信息。发布的内容不代表本网站之观点或意见，仅供用户参考，最终以开发商实际公布为准。商品房预售须取得《商品房预售许可证》，用户在购房时需慎重查验开发商的证件信息。本页面所提到房屋面积如无特别标示，均指建筑面积，所涉装修状况、标准以最终合同为准。</div>  
               </div>
		   </div>	
	</div>
    
    <div class="loupan-list-right mt10">
		<div class="loupan-list-right-1">
			<span class="fr pt5"><a href="/about/gfbz.html">更多&gt;</a></span>
			<h3>购房保障</h3>
			<ul class="merit">
                <li>
                  <i class="ico1"></i>
                  <p class="name">省力</p>
                  <p class="ms">免费接机</p>
                  <p class="ms">专车接送看房</p>
                </li>
                <li>
                  <i class="ico2"></i>
                  <p class="name">真实房源</p>
                  <p class="ms">100%开发商授权</p>
                  <p class="ms">真房源真房价</p>
                </li>
                <li>
                  <i class="ico3"></i>
                  <p class="name">省钱</p>
                  <p class="ms">报销往返机票费用</p>
                </li>
                <li>
                  <i class="ico4"></i>
                  <p class="name">省事</p>
                  <p class="ms">星级酒店免费住</p>
                  <p class="ms">海南特产免费送</p>
                </li>
          	</ul>
		</div>
		<div class="loupan-list-right-1">
			<a href="/"><img src="/public/static/home/image/lp/r-2.jpg"></a>
		</div>
		<div class="h10"></div>
		<div style="height: 2px;border-top: 1px solid #4ba634"></div>		
		<div class="" id="htop2">				
		<div class="h20"></div>		
		<div class="loupan-list-right-1">
			<strong>怕买贵？怕被坑？</strong>
			<p class="name">专业资深置业顾问帮您越过营销陷阱，
			<br>买新房、拿低价</p>
			<div class="h10"></div>
            <form class="submit_area">
            <input type="hidden" name="pid" value="33">   
          <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
			<input type="hidden" name="ly" value="[<?php echo cityname($infos['city_id']);?>]<?php echo $infos['title'];?>详细页资讯_右侧_报名拿底价">
				<div class="inp-2" style="height: 25px;">
				<input type="text" name="mobile" id="lp-list-mobile" placeholder="请输入您的手机号码" maxlength="12"></div>
				<div class="h10"></div>
				<div><input type="button" class="btn lp-btn apply_submit" value="报名拿底价"></div>
			</form>	
		</div>
		<div class="h10"></div>
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