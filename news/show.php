<!DOCTYPE html>
<html lang="zh-CN">
<?php
require("../conn/conn.php");
require("../function.php");
$lm=4;
$id = isset($_GET['id']) ? intval($_GET['id']) : '';

$row = $mysql->query("select * from `web_content` where `id`='$id'");
//print_r($row);
$infoc=$row[0];
$pid=$infoc['pid'];
$path=$infoc['path'];
$fl=$path;
//echo $pid.'<br>'.$path.'<br>111';

if($pid){
$row3 = $mysql->query("select * from `web_srot` where `id`='$pid'");
//print_r($row);
$flname=$row3[0]['title'];
$path=$row3[0]['path'];
$sql=" and `pid`='{$pid}'";
}
$patharr=explode('-',$path);
$row2 = $mysql->query("select * from `web_srot` where `id`='{$patharr[1]}'");
//print_r($row);
$flname2=$row2[0]['title'];

$click=$infoc['click']+1;
	$mysql->execute("UPDATE `web_content` SET `click`='".$click."' where `id`='".$id."'");
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="csrf-param" content="csrf_token_f">
<title><?php echo $infoc['title'];?>,<?php if($flname){echo $flname.'_';}?><?php echo $flname2;?>_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $infoc['title'];?>楼盘动态,<?php if($infoc['keyword']){echo $infoc['keyword'];}else{echo $config['site_keyword'];}?>">
<meta name=description content="<?php echo $infoc['title'];?>楼盘动态,<?php if($infoc['desc']){echo $infoc['desc'];}else{echo $config['site_desc'];}?>">
	<link rel="shortcut icon" href="../image/favicon.ico" />
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
    
  <link rel="stylesheet" href="/public/static/home/css/news.css">
	<script type="text/javascript" src="/public/static/common/js/jquery.min.js"></script>
	<script type="text/javascript" src="/public/static/common/js/jquery.form.js"></script>
	<script type="text/javascript" src="/public/static/layer/layer.js"></script>
    
    <link href="/css/public.css" rel="stylesheet">
    <link href="/css/alert.css" rel="stylesheet">
<!--    
<link href="/css/lpnews.css" rel="stylesheet">
<link href="/css/zxxqy.css" rel="stylesheet">-->
<style type="text/css">
.mainlib {width: 900px;display: table-cell;vertical-align: top;min-height: 5rem;}
.scrollfixed {position: fixed;top: 2%;right: 50%;margin-right: -720px;}
.fit-1{line-height: 30px;}
</style>
<?php include("../sq2.php");?>
</head>
<body>
<!-- 悬标 -->
<?php include("../ad_xf.php");?>
<!-- 导航 -->
<?php include("../top.php");?>
<div class="w1200">	
	<!-- 面包屑 -->
	<div class="crumbs">
            <span>您的位置：</span><a href="/" target="_blank">首页</a><em>&gt;</em>
            <a href="/news/" target="_blank">楼市</a><em>&gt;</em>
            <?php echo $flname;?>
	</div>
	<!-- 面包屑 end-->
</div>


<div class="content-center news-detail-content clearfix">
    <div class="mainlib news-detail-main clearfix">
      <div class="maincon">
        <div class="article">
          <h1 class="tit"><?php echo $infoc['title'];?></h1>
	          <div class="subtit">
	               <?php if($infoc['zds']){?> 来源：<?php echo $infoc['zds'];?> &nbsp;&nbsp;<?php }?>
                    发布时间：<?php echo $infoc['addtime'];?>&nbsp;&nbsp;
                    点击数：<?php echo $click;?>  &nbsp;&nbsp;
                   <?php if($infoc['zhs']){?> 作者：<?php echo $infoc['zhs'];?>   <?php }?>
	          </div>
          <div class="artical-con">      			
            <?php echo $infoc['content'];?>
            <div style="height: 40px"></div>
            <div class="post-list-net" style="margin-bottom: 20px;">
                <div class="fit-1">
                  上一篇：
                  <?php
			$row = $mysql->query("select * from `web_content` where `path`='0-5' and `pid`='{$infoc['pid']}' and `addtime`>'{$addtime}' and `id`<>'{$id}' order by addtime asc limit 0,1");
			if($row[0]==''){
				echo '暂无';
			}else{
			foreach($row as $k=>$list){
		?>
            <a style="color: #5ba4ed" href="/news/show_<?php echo $list['id'];?>.html" target="_blank" title="<?php echo $list['title'];?>"><?php echo $list['title'];?></a>
        <?php
			}
			}
		?>
        </div>
                <div>
                  下一篇：
                  
                  <?php
			$row = $mysql->query("select * from `web_content` where `path`='0-5' and `pid`='{$infoc['pid']}' and `addtime`>'{$addtime}' and `id`<>'{$id}' order by addtime desc limit 0,1");
			if($row[0]==''){
				echo '暂无';
			}else{
			foreach($row as $k=>$list){
		?>
            <a style="color: #5ba4ed" href="/news/show_<?php echo $list['id'];?>.html" target="_blank" title="<?php echo $list['title'];?>"><?php echo $list['title'];?></a>
        <?php
			}
			}
		?>
                     </div>
              </div>
            <div class="statement" style="color: #999;padding: 15px 0px;line-height: 22px;">声明：凡注明为其他媒体来源的信息，均为转载自其他媒体，其目的在于促进信息交流，并不代表本网赞同其观点或对其内容真实性 负责。本站转载时会标明出处，版权归原载媒体和作者所有。如所载内容涉及版权问题，请及时和本站联系。</div>     
            <div class="h20"></div>       
            <!-- 报名 -->
            <style type="text/css">            
            .help .bd{ padding:20px; padding-right:0; border:1px solid #ddd; background:#fffbf2;}
            .help ul{ margin-bottom:10px; font-size:14px;}
            .help .f-dh{position:relative;float:left; width:155px; height:40px; margin-right:10px; background:#fff; border:1px solid #ddd; border-radius:2px; z-index:9;}
            .help .f-dh span{ display:block; height:40px; line-height:40px; padding:0 10px; overflow:hidden;white-space:nowrap;text-overflow:ellipsis;}
            .help li .cur{content:"";display:block; position:absolute; right:10px;top:50%; margin-top:-2px;height:0px;width: 0px;margin-left:5px;border-color: #999 #FFF #FFF #FFF;border-style: solid;border-width: 5px;font-size: 0;}
            .help .d-item{ position:absolute; left:-1px; top:40px; width:155px; border:1px solid #ddd; background:#fff;}
            .help .d-item ul{ margin-bottom:0;}
            .help .d-item label{ display:block; cursor:pointer;}
            .help .d-item label input{ vertical-align:middle; margin-top:-4px; margin-right:5px;}
            .help .d-item li{ height:20px; line-height:20px; padding:5px;}
            .help .d-item li:hover{ color:#f60;}
            .help .area{ width:200px;}
            .help .area li{ float:left; width:90px;overflow:hidden;}
            .help .area .line{ float:none; width:auto; clear:both;}
            .help li .u-text{ width:135px; height:20px; line-height:20px; padding:10px; border:none;font-size:14px;}
            .help .btn11{ float:left; width:100px; background:none; border:none; margin-right:0;}
            .help .btn11 .u-btn{ width:100px;}
            .help p{ margin:0 20px; text-align:right;}
            .f-dn{display: none;}
            .roll-enroll{ margin-right:20px;}
            .roll-enroll dt{ position:relative; overflow:hidden;}
            .roll-enroll dt span{ background:#fffbf2; float:left; line-height:40px; font-size:16px; color:#333;}
            .roll-enroll dt i{ color:#ff5203;}
            .roll-enroll dt b{ position:absolute; height:1px; width:600px; right:0; top:22px; border-bottom:#ddd 1px dashed;}
            .roll-enroll .roll-hidden{ position:relative; height:160px; overflow:hidden;}
            .roll-enroll .roll-list{ overflow:hidden; position:absolute; width:100%; left:0; top:0; margin:0;}
            .roll-enroll .roll-item{ float:left; width:50%;}
            .roll-enroll .roll-item span,.roll-enroll .roll-item p,.roll-enroll .roll-item i,.roll-enroll .roll-item b{ float:left; line-height:32px; width:100px; color:#333; white-space:nowrap; overflow:hidden;}
            .roll-enroll .roll-item span{ text-indent:15px; overflow:hidden;}
            .roll-enroll .roll-item p{ width:90px; margin:0; text-align:left;}
            .roll-enroll .roll-item i{ width:70px;}
            .roll-enroll .roll-item b{ font-weight:normal; width:auto;}
            .bd-1-t {border: 1px solid #ddd;border-radius: 7px;height: 55px;background: url(/public/static/home/image/v2.0/news_1.jpg) no-repeat left;border-bottom: 0px;border-left: 0;}
            .bd-1-t .bd-1-t-r{ background: url(/public/static/home/image/v2.0/news_2.jpg) no-repeat left;height: 55px;width: 200px;}
            .u-btn{height:40px;border-radius:2px; float:left; background:#00A0EA; color:#fff; text-align:center;}
            .u-btn input{ width:100%; height:40px; background:none; border:none; color:#fff; cursor:pointer; font-size:16px;}
            .bd-1-t .bd-1-t-l span{line-height: 55px;font-size: 24px;padding-left: 20px;color: #fff;}
            .bd-1-t .bd-1-t-l2 span{line-height: 55px;font-size: 25px;padding-left: 20px;color: #00A0EA;font-weight: 700;}
            .w200{width: 200px;}
            .bd input{outline: none;}
            </style>            
            <div class="help">
            <div class="bd-1-t">
                <div class="bd-1-t-l fl w200">
                  <span>团购报名</span>
                </div>
                <div class="bd-1-t-l2 fl">
                   <span>现报名即可享 更多购房优惠与折扣</span>
                </div>
                <div class="bd-1-t-r fr">
                    
                </div>
                <div class="clear"></div>
            </div>
            <div class="bd">
            <form class="submit_area">
            <input type="hidden" name="pid" value="33">   
          <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
			<input type="hidden" name="ly" value="[<?php echo cityname($sitecityid);?>]资讯详细页_团购报名">
               
                  <ul class="f-cb">
                    <li class="f-dh"><span><input name="intention_city" type="text" class="u-text" placeholder="意向区域"></span></li>
                    <li class="f-dh"><span><input name="intention_lp" type="text" class="u-text" placeholder="意向楼盘"></span></li>
                    <li class="f-dh"><span>价格<em class="cur"></em></span>
                    <div class="d-item price f-dn">
                      <ul>
                          <li><label><input name="intention_price" type="radio" value="5千-1万">5千-1万</label></li>
                          <li><label><input name="intention_price" type="radio" value="1万-1.5万">1万-1.5万</label></li>
                          <li><label><input name="intention_price" type="radio" value="1.5万-2万">1.5万-2万</label></li>
                          <li><label><input name="intention_price" type="radio" value="2万-2.5万">2万-2.5万</label></li>
                          <li><label><input name="intention_price" type="radio" value="2.5万-3万">2.5万-3万</label></li>
                          <li><label><input name="intention_price" type="radio" value="3万以上">3万以上</label></li>
                      </ul>
                    </div>
                    </li>
                    <li class="f-dh"><input id="lp-fu-mobile" name="mobile" type="text" class="u-text" placeholder="手机号码"></li>
                    <li class="btn11"><span class="u-btn"><input type="button" class="apply_submit" name="" id="signup" value="提交"></span></li>
                  </ul>
                  </form>
                  <div class="clear"></div>
                  <div class="roll-enroll">
                    <dl>
                      <dt><span>已有<i>1240</i>人报名参加团购</span><b></b></dt>
                      <dd class="roll-hidden">
                      <ul class="roll-list" style="top: -22.304px;">
                        
                        <li class="roll-item"><span>游客</span><p>010****2969</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>186****5107</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>135****7810</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>吴**</span>
                        <p>138****0727</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>134****0812</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>131****9922</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>139****6816</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>138****7887</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>186****7502</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>150****1584</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>于**</span>
                        <p>183****1017</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>185****0566</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>133****8186</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>010****2969</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>186****5107</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>135****7810</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>吴**</span>
                        <p>138****0727</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>134****0812</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>131****9922</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>139****6816</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>138****7887</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>186****7502</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>150****1584</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>于**</span>
                        <p>183****1017</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>185****0566</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li><li class="roll-item"><span>游客</span>
                        <p>133****8186</p>
                        <i>成功入团</i><b>（<?php echo date("Y-m-d",strtotime("-1 day"));?>）</b></li>
                        
                      </ul>
                      </dd>
                    </dl>
                  </div>
                
            </div>
            </div>
          <!-- 报名 end -->
          </div>
        </div>
          <!-- 推荐楼盘 -->
      </div>
    </div>
    <div class="rightlib">       
      <!-- 热销楼盘 -->      
		<div class="right300">               
			<div class="hot-house" style="background: #fff">
				<div id="hotBuilds" class="city-hot-lp">
  					<div class="city-hot-lps1">
  						<p>热销新盘</p>
  						<a href="/loupan/" class="">更多&gt;</a>
  					</div>                      
            <!-- list -->
             <?php
								$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px15 desc limit 0,5");
								foreach($row as $k=>$lps){
									if($lps['pid']==79){
										$url="/bieshu/{$lps['id']}.html";
										}else{
											$url="/loupan/{$lps['id']}.html";
											}
							?>
                            <div class="city-hot-list1">
					<a href="<?php echo $url;?>" class="city-hot-link" target="_blank">
						<div class="pull-left pr"><img src="/<?php echo $lps['img'];?>" alt="<?php echo $lps['title'];?>" class="trs lazy">
										</div>
					<div class="pull-left" style="width: 160px;"><div><span>[<?php echo cityname($lps['city_id']);?>]</span><?php echo $lps['title'];?></div>
                    <?php if($lps['all_price']==0){?>
						<?php if($lps['jj_price']==0){?>
                            <p>待定</p>
						<?php }else{?>
                            <p><?php echo $lps['jj_price'];?>元/㎡</p>
						<?php }?>
					<?php }else{?>
                     <p><?php echo $lps['all_price'];?>万/套</p>
					<?php }?>
                    </div></a>
				</div>
                                <?php }?>
                        <!-- list end-->
            <div class="clear"></div>
				  </div>
			</div> 
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
      <!-- 热门回答 -->            
      <div class="loupan-list-right-1" style="margin-top: 20px;">
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
      </div>      
    </div>  
  <div class="y_newslist_bottom_m"></div> 
 <!--end main content-->
 <div class="lpm-section7 clearfix mt15">
      <div class="common-title clearfix">
         <div class="lpm-section7-title"><span style="color: #fff">猜你喜欢</span></div>         
      </div>
      <div class="mt20" style="padding: 10px;border:1px solid #ddd">
        <div class="clearfix" style="width: 1300px;">   
          <!--lise  -->   
          <?php
								$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px14 desc limit 0,5");
								foreach($row as $k=>$lps){
									if($lps['pid']==79){
										$url="/bieshu/{$lps['id']}.html";
										}else{
											$url="/loupan/{$lps['id']}.html";
											}
							?>
                <div class="fl lp-col-s1">
           <a href="<?php echo $url;?>" target="_blank" class="lp-col-1" title="<?php echo $lps['title'];?>">
            <div class="echo-img"><img src="/<?php echo $lps['img'];?>" alt="<?php echo $lps['title'];?>" class="trs lazy"></div>
                        <div class="yszico"></div><i class="lp-col-s1-icon"></i></a> <p class="mt10 lpm-section7-1"><a target="_blank" href="<?php echo $url;?>">[<?php echo cityname($lps['city_id']);?>]<?php echo $lps['title'];?></a></p>
            <p class="col-5-text red">
            <?php if($lps['all_price']==0){?>
						<?php if($lps['jj_price']==0){?>
                            待定
						<?php }else{?>
                           <?php echo $lps['jj_price'];?>元/㎡
						<?php }?>
					<?php }else{?>
                     <?php echo $lps['all_price'];?>万/套
					<?php }?>
            </p>  </div>
            
                                <?php }?>       
                 
                     <!--lise  end-->
        </div>
    </div>
</div>
 
</div>
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
<script src="/public/static/home/js/scrollfix.min.js"></script>
<script type="text/javascript">
$(".m_ift_right").scrollFix({
    distanceTop:$(".y_news_maintop").outerHeight(),
    endPos: '.y_newslist_bottom_m',
    zIndex: 10
})    
/**
 * 团购报名滚动
 */
function newsScroll(){
    var list = $('.roll-enroll .roll-list');

    function p(){
        list.animate({'top':'-32px'},1000,'linear',function(){
            for(var i=0;i<2;i++){
                list.find('li:first').insertAfter(list.find('li:last'));
            }
            list.css({'top':'0px'});
        });
    }

    var t = setInterval(function(){
        p();
    },1000);

    list.hover(function(){
        clearInterval(t);
    },function(){
        t = setInterval(function(){
            p();
        },1000);
    });
}
function isScroll(){
    var list;
    var ttt = setInterval(function(){
        list = $('.roll-enroll .roll-list');
        if(list.length > 0){
            newsScroll();
            clearInterval(ttt);
        }
    },1000);
}
isScroll();
//鼠标经过展示层
$(".f-dh").hover(function(){
    $(this).find(".d-item").removeClass("f-dn");
},function(){
    $(this).find(".d-item").addClass("f-dn");
});
</script>
</body>
</html>
<?php include("../sq.php");?>