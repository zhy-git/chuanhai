<!DOCTYPE html>
<html lang="en">
<?php
require("../../conn/conn.php");
require("../function.php");
$lm=3;
$key=$_GET['key'];
$flaglp=$_GET['flaglp'];
$flaglb=$_GET['flaglb'];
$flagzx=$_GET['flagzx'];
$flagwq=$_GET['flagwq'];
$hz_pp=$_GET['hz_pp'];
$pricesort=$_GET['pricesort'];
$renqi=$_GET['renqi'];

(string)$flagjw = $_GET['flagjw'] ? $_GET['flagjw'] : '0';
(string)$flaghx = $_GET['flaghx'] ? $_GET['flaghx'] : '0';
(string)$flagts = $_GET['flagts'] ? $_GET['flagts'] : '0';

//$px = $_GET['px'] ? $_GET['px'] : 'px';
$city_id=$sitecityid;
//$city_id = isset($_GET['city_id']) ? intval($_GET['city_id']) : 0;

$cityall_id = isset($_GET['cityall_id']) ? intval($_GET['cityall_id']) : 1;

if($city_id<>0){
	$cityall_id=cityallid($city_id);
	}

$key=$_GET['key'];
$pid=82;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$sql="WHERE `pid`='{$pid}' ";
$pagecs='';
if($key!=""){
	$sql.=" and `title` like '%{$key}%'";
	$pagecs.="&key={$flaggn}";
	}
if($cityall_id!=""){
	$sql.=" and `cityall_id` = '{$cityall_id}'";
	$pagecs.="&cityall_id={$cityall_id}";
	}
if($city_id!=""){
	$sql.=" and `city_id` = '{$city_id}'";
	$pagecs.="&city_id={$city_id}";
	}
if($flagjw!='0'){
	$sql.=" and `flagjw` like '%{$flagjw}%'";
	$pagecs.="&flagjw={$flagjw}";
	}
if($flaglp!=""){
	$sql.=" and `flaglp` like '%{$flaglp}%'";
	$pagecs.="&flaglp={$flaglp}";
	}
if($flaglb!=""){
	$sql.=" and `flaglb` like '%{$flaglb}%'";
	$pagecs.="&flaglb={$flaglb}";
	}
if($flaghx!='0'){
	$sql.=" and `flaghx` like '%{$flaghx}%'";
	$pagecs.="&flaghx={$flaghx}";
	}
if($flagzx!=""){
	$sql.=" and `flagzx` like '%{$flagzx}%'";
	$pagecs.="&flagzx={$flagzx}";
	}
if($flagts!='0'){
	$sql.=" and `flagts` like '%{$flagts}%'";
	$pagecs.="&flagts={$flagts}";
	}
if($flagwq!=""){
	$sql.=" and `flagwq` like '%{$flagwq}%'";
	$pagecs.="&flagwq={$flagwq}";
	}
if($hz_pp!=""){
	$sql.=" and `hz_pp` like '%{$hz_pp}%'";
	$pagecs.="&hz_pp={$hz_pp}";
	}

$px=" `px` desc";
if($pricesort==1){
	$px=" `jj_price` asc";
	$pagecs.="&pricesort={$pricesort}";
	}
if($pricesort==2){
	$px=" `jj_price` desc";
	$pagecs.="&pricesort={$pricesort}";
	}
if($renqi==1){
	$px=" `click` desc";
	$pagecs.="&renqi={$renqi}";
	}
//print_r($_GET);
//echo $page;
if($page==0){
	$page=1;
	}

$page_num =10;
$offset = ($page-1)*$page_num;
$rsc = $mysql->query("select count(*) as count from `web_content` {$sql}");
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/$page_num);
$rowlist = $mysql->query("select * from `web_content` {$sql} order by {$px} limit $offset,$page_num");
?>
<head>
    <meta charset="UTF-8"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1.0,minimum-scale=1.0">
    <title><?php echo $config['site_name'];?></title>
    <meta name=keywords content="<?php echo $config['site_keyword'];?>">
    <meta name=description content="<?php echo $config['site_desc'];?>">
    <script src="/public/static/phone/js/flexible.js"></script>    
    <link rel="canonical" href=""/>      
    <link href="/public/static/phone/css/module-new.css" rel="stylesheet">
    <link href="/public/static/phone/css/house-list.css" rel="stylesheet">
    <link href="/public/static/phone/css/my.css?v=2.5" rel="stylesheet">
    <link href="/public/static/phone/css/v2.0/bieshu.css" rel="stylesheet">   
    <script  src="/public/static/libs/jquery/1.x/jquery.min.js" type="text/javascript"></script>
    <script src="/public/static/common/js/jquery.form.js"></script>    
    <script src="/public/static/libs/layer/mobile/layer.js"></script>   
<style type="text/css">
.query-list>li {
    float: left;
    text-align: center;
    box-sizing: border-box;
    cursor: pointer;
    width: 25%;
    height: 1.06666667rem;
    line-height: .533333rem;
    background: #fff;
    border-right: none;
    border-top: none;
    border-bottom: none;
    overflow: hidden;
}
</style>     
<?php include("../sq2.php");?>
</head>
<body>
    <div class="container">    
    <div class="header">    
      <div class="go-back">
          <a href="javascript:void(0)" onclick="history.back(-1)"> <span class="ico ico-return">返回上一页</span> </a>
      </div>    
        <div class="city-change">                
            <span class="text">商铺写字楼</span> 
        </div>        
        <ul class="u-link">
            <li class="link-home"><a href="/m/"><span class="ico ico-home">首页</span></a></li>             
        </ul>
    </div>                   
<div class="center" style="background: #f5f5f5;">    
    <div class="search-wrap">
        <div class="search">
            <form action="" method="get">
            <div class="ipt-area">                
                <input name="key" type="text" class="ipt" placeholder="请输入楼盘名称">
            </div>
            <div class="btn-area">
                <button type="submit" class="btn btn-search pro_search">搜搜</button>
            </div>
            </form>
        </div>
    </div>
    <!--楼盘动态-->
    <div class="dynamic">
    <div class="dyn-left dyn-left-old">
        <a href="/m/news/"><div class="dyn-left-content-old"></div></a>
    </div>
    <div class="dyn-center-old">
        <div class="scrollDiv scrollDiv-old">
                    <ul style="margin-top: 0px;">
                      <?php
			$rownews = $mysql->query("select * from `web_content` WHERE `pid`='28' order by addtime desc limit 0,12");
			foreach($rownews as $k=>$lists){
			$url='/m/loupan/news_show/'.$lists['id'].'.html';
	
		?>
       
                <li><a href="<?php echo $url;?>" title="<?php echo $lists['title'];?>"><span><?php echo date('Y-m-d',strtotime($lists['addtime']));?></span><?php echo $lists['title'];?></a></li>
        <?php }
			?>              
                           
                            </ul>
        </div>
    </div>
    <div class="dyn-right-old">
        <div class="dyn-right-content">  <a  href="javascript:;" onclick="openwid4('订阅动态','我们将为您订阅最新楼盘动态','<?php echo $sitecityname;?>站别墅_订阅动态',9);" class="btn btn-dynamic">订阅动态</a></div>
    </div>
</div>
<!-- 楼盘动态 end --><style>
						#tabCon div {
						 display:none;
						}
						#tabCon div.fdiv {
						 display:block;
						}
						.tab-nav {
    width: 42.2%;
    float: left;
    box-sizing: border-box;
    height: 100%;
    flex: 0 0 37%;
    background: #f6f6f6;
    color: #333333;
    overflow: scroll;
}
#tabCon div {
    display: none;
}
ul.area-type-item {
    height: 9.52rem;
}
.tab-con li,.tab-nav li {
    position: relative;
    font-size: .4rem;
    text-align: left;
    box-sizing: border-box;
    height: 1.5rem;
    line-height: 1.5rem;
    padding-left: .32rem;
    border-bottom: 1px solid #e5e5e5;
    overflow: hidden;

}
.tab-con li a, .panel-housetype li a, .panel-price li a {
    display: block;
    width: 100%;
	background:#FFF;
	color: #333333
}
.tab-con li, .panel-housetype li, .panel-price li {
    font-size: 0.4rem;
    text-align: left;
   
}
.tab-con li.cur-selected, .tab-nav li.selected {
    background: #f4f4f4;
    color: #F00;
}
.tab-nav{width:42.2%;float:left;box-sizing:border-box;    height: 100%;flex: 0 0 37%;background: #f6f6f6;color: #333333;overflow: scroll;}

.tab-con{width:57.8%;float:right;box-sizing:border-box;overflow-x:hidden;background: #FFF;}

.panel-area .tab-con li{border-left:1px solid #deddde}

.panel-more .mod3{padding:0 .32rem}

.query-panel{height:9.5rem;overflow-x:hidden;overflow-y:auto}

.btn-area1{padding:.6rem .32rem .53333rem 0;font-size:.32rem;height:.8rem}

.btn-area2{height:.8rem;width:8.4666667rem;margin:0 auto;padding:.493rem}

.btn-area2 .btn{width:4rem}

.btn-area2 a{float:left;text-align:center;font-size:.32rem;display:block;height:.8rem}

.btn-area1 span{float:left;width:.52rem;height:.8rem}

.btn-area1 span img{display:inline-block;margin-top:.4rem;width:.133333rem;height:.02666667rem}

.btn-area1 .btn-span-wan{display:inline-block;line-height:.8rem;padding-left:.133rem}

.btn{display:inline-block;text-align:center;box-sizing:border-box;color:#fff;width:2rem;height:.8rem;line-height:.8rem;background:#ff6d6f;border-radius:3px;overflow:hidden}

.btn:hover{text-decoration:none}

.btn-custom{float:left;background-color:#fff;color:#000;width:1.45rem}

.btn-highest,.btn-minimum{display:inline-block;float:left;background-color:#fafafa;color:#bbb;border:1px solid #e6e6e6;box-sizing:border-box;width:2rem;height:.8rem;border-radius:3px;text-indent:2em}

.btn-custom,.btn-highest,.btn-minimum{font-size:.29333rem}

.btn-canel,.btn-confirm1{width:2rem;height:.8rem}

.btn-confirm1{float:right;font-size:.34666667rem}

.btn-canel,.btn-confirm{width:4rem;height:.96rem}

.btn-confirm{display:block;margin-left:.466667rem;float:left;font-size:.346667rem}

.btn-canel{background:#4da635}
						</style>
<div class="list-wrap">
        <!--楼盘检索-->
        <input type="hidden" id="hidden_query_track"/>
        <div class="query">
            <ul class="query-list">
                <li class="query-area" data-id = "query_li" data-group = "area">
                    <div class="query-wrap">
                                            <span class="query-txt"><?php if($city_id<>''){echo cityname($city_id);}elseif($cityall_id<>''){echo cityname($cityall_id);}else{echo '全国';}?></span>
                                            </div>
                    <div class="tab query-panel panel-area">
                        <div class="tab-nav"  id="tab">
                            <ul class="area-type-list">
                            <?php
							$city=$mysql->query("select * from `web_city` where `id`='{$sitecitybid}' and `city_st`='1' order by `city_px` asc");
							foreach($city as $k=>$cityall){
							?>
                                <li class="<?php if($k==0){echo 'selected ';}?>"><?php echo $cityall['city_name'];?></li>  
                                <?php }?>    
                                                               
                            </ul>
                        </div>
                        <div class="tab-con" id="tabCon">
                             <?php
							$city=$mysql->query("select * from `web_city` where `id`='{$sitecitybid}' and `city_st`='1' order by `city_px` asc");
							foreach($city as $k=>$cityall){
							?>
                              <div class="nrpart <?php if($k==0){echo 'fdiv';}?>">
                                  <ul class="area-type-item area-list" data-id="area" data-flag="condition">
                                  <!--    <li class=""><a href="index_<?php echo $cityall_id;?>_0_<?php echo $flagjw;?>_<?php echo $flaghx;?>_<?php echo $flagts;?>_<?php echo $page;?>.html">不限</a></li>-->
                                      <?php
										$city2=$mysql->query("select * from `web_city` where `pid`='{$cityall['id']}' and `city_st`='1' order by `city_px` asc");
										foreach($city2 as $cityall2){
										?>
										<li><a href="<?php echo 'http://'.$cityall2['city_pingyin'].'.'.$siteasd.'/m/spxzl/';?>index_<?php echo $cityall2['id'];?>_<?php echo $flagjw;?>_<?php echo $flaghx;?>_<?php echo $flagts;?>_<?php echo $page;?>.html"><?php echo $cityall2['city_name'];?></a></li>
										<?php }?>
										</ul>
                              </div>
                              <?php }?>    
                              
                        </div>
                    </div>
                </li>
                  <script>
							var tabs=document.getElementById("tab").getElementsByTagName("li");
							var divs=document.getElementById("tabCon").getElementsByTagName("div");
							 
							for(var i=0;i<tabs.length;i++){
							 tabs[i].onclick=function(){change(this);}
							}
							 
							function change(obj){
							for(var i=0;i<tabs.length;i++){
							 if(tabs[i]==obj){
							 tabs[i].className="selected fli";
							 divs[i].className="nrpart fdiv";
							}else{
							 tabs[i].className="";
							 divs[i].className="nrpart";
							 }
							 }
							} 
							</script>
                <li class="query-price" data-id = "query_li" data-group = "price">
                    <div class="query-wrap">
                                                <span class="query-txt"><?php if($flagjw=='0'){echo '价格';}else{echo loupanflag($flagjw,77);}?></span>
                                            </div>
                    <div class="query-panel panel-price">
                        <ul class="price-item">
                            <li class=""><a href="index_<?php echo $city_id;?>_0_<?php echo $flaghx;?>_<?php echo $flagts;?>_<?php echo $page;?>.html">不限</a></li><?php
            $flag=$mysql->query("select * from `web_flag` where `flag_fl`='77' and `flag_st`='1' order by `flag_px` asc");
			foreach($flag as $flagall){
				echo '<li> <a  href="index_'.$city_id.'_'.$flagall['flag_bm'].'_'.$flaghx.'_'.$flagts.'_'.$page.'.html" title="'.$flagall['flag'].'" >'.$flagall['flag'].'</a></li>';
				
			}

			?>
                                               <!--         <li class=""><a href="/sanya/bieshu?c=0&pr=964&h=0">6千以下</a></li>
                                                        <li class=""><a href="/sanya/bieshu?c=0&pr=965&h=0">6-7千</a></li>
                                                        <li class=""><a href="/sanya/bieshu?c=0&pr=966&h=0">7-8千</a></li>
                                                        <li class=""><a href="/sanya/bieshu?c=0&pr=967&h=0">8千-1万</a></li>
                                                        <li class=""><a href="/sanya/bieshu?c=0&pr=968&h=0">1万-1.3万</a></li>
                                                        <li class=""><a href="/sanya/bieshu?c=0&pr=969&h=0">1.3-1.5万</a></li>
                                                        <li class=""><a href="/sanya/bieshu?c=0&pr=970&h=0">1.5-2万</a></li>
                                                        <li class=""><a href="/sanya/bieshu?c=0&pr=971&h=0">2万以上</a></li>-->
                                                    </ul>                    
                    </div>
                </li>
                <li class="query-housetype" data-id = "query_li" data-group = "housetype">
                    <div class="query-wrap">
                        <span class="query-txt"><?php if($flaghx=='0'){echo '户型';}else{echo loupanflag($flaghx,4);}?></span>
                    </div>
                <div class="query-panel panel-housetype">
                    <ul class="housetype-item">
                        <li class=""><a href="index_<?php echo $cityall_id;?>_<?php echo $city_id;?>_<?php echo $flagjw;?>_0_<?php echo $flagts;?>_<?php echo $page;?>.html">不限</a></li>
                        <?php
            $flag=$mysql->query("select * from `web_flag` where `flag_fl`='4' and `flag_st`='1' order by `flag_px` asc");
			foreach($flag as $flagall){
				
				echo '<li> <a href="index_'.$city_id.'_'.$flagjw.'_'.$flagall['flag_bm'].'_'.$flagts.'_'.$page.'.html" title="'.$flagall['flag'].'" >'.$flagall['flag'].'</a></li>';
				
			}
			?>
                                            </ul>
                </div>
                </li>
                
                <li class="query-housetype  last" data-id = "query_li" data-group = "housetype">
                    <div class="query-wrap">
                        <span class="query-txt"><?php if($flagts=='0'){echo '类别';}else{echo loupanflag($flagts,6);}?></span>
                    </div>
                <div class="query-panel panel-housetype">
                    <ul class="housetype-item">
                        <li class=""><a href="index_<?php echo $cityall_id;?>_<?php echo $city_id;?>_<?php echo $flagjw;?>_<?php echo $flaghx;?>_0_<?php echo $page;?>.html">不限</a></li>
                        <?php
            $flag=$mysql->query("select * from `web_flag` where `flag_fl`='6' and `flag_st`='1' order by `flag_px` asc");
			foreach($flag as $flagall){
				echo '<li> <a href="index_'.$city_id.'_'.$flagjw.'_'.$flaghx.'_'.$flagall['flag_bm'].'_'.$page.'.html" title="'.$flagall['flag'].'" >'.$flagall['flag'].'</a></li>';
				
			}
			?>
                                            </ul>
                </div>
                </li>
                <li class="query-mnore last" style="display:none;">
                    <div class="query-wrap">
                        <span class="query-txt">更多</span>
                    </div>
                    <div class="query-panel panel-more">
                        <div class="mod3 mod3-type">
                            <div class="tit">类型：<span class="fcB">不限</span></div>
                            <ul class="con">
                                <li class=" on"><a href="javascript:void(0)" data-search-key="e0">不限</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="e915">住宅</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="e916">公寓</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="e917">商住</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="e918">别墅</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="e919">洋房</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="e921">其他</a></li>
                                                            </ul>
                        </div>
                        <div class="mod3 mod3-feature">
                            <div class="tit">特色：<span class="fcB">不限</span></div>
                            <ul class="con">
                                <li class=" on"><a href="javascript:void(0)" data-search-key="h0">不限</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h912">品牌地产</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h932">海景房</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h934">报销机票</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h935">精装修</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h937">山景地产</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h938">特色别墅</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h940">商铺投资</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h941">专车看房</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h942">特价优惠</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h943">一线海景</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h944">写字楼</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h947">湖景地产</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h949">温泉</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h950">小户型</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h951">避暑养生</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h953">大型社区</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h962">免费接机</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1002">酒店式公寓</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1021">现房</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1022">养老居所</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1023">高性价比</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1105">现房</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1110">酒店式公寓</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1121">地铁沿线</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1138">避寒养生</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1139">山景美居</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1140">普通住宅</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1194">花园洋房</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1206">旅游地产</a></li>
                                                            </ul>
                        </div>
                        <div class="mod3 mod3-sale">
                            <div class="tit">售卖情况：<span class="fcB">不限</span> </div>
                            <ul class="con">
                                <li class=" on"><a href="javascript:void(0)" data-search-key="j0">不限</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="j276">在售</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="j277">待售</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="j278">售完</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="j908">现房</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="j909">尾盘</a></li>
                                                            </ul>
                        </div>
                        <div class="btn-area2">
                            <a href="javascript:void(0)" class="btn btn-canel">重置条件</a>
                            <a href="javascript:void(0)" class="btn btn-confirm" data-id='3'>确 定</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>        
        <ul id="ajaxhouse">
          <?php

if($result["total"]==0){
	echo "<li align=center style='padding:10px;font-size:15px;border-bottom:dashed #ccc 1px'><h1>很抱歉,没有找到您搜索的结果。</h1></li>";
	}else{
		foreach($rowlist as $k=>$list){
			$url='/m/loupan/'.$list['id'].'.html';
?>
          
          
            <li class="mb30">
                <div class="build-list pr">
                    <div class="item-news" style="overflow: inherit;border:0;position: relative;">
                         <a href="<?php echo $url;?>">
                              <div class="img-area pr">
                                <img src="/<?php echo $list['img'];?>" alt="<?php echo $list['title'];?>">
                                                              </div>
                              <div class="des">
                                  <div class="tr">
                                      <div class="place"><?php echo $list['title'];?></div>                                      
                                       
                                      <div class="price" style=" color: #f07c69; font-size: .4rem;">
                                          <?php
                                          if($list['all_price']=="0"){
                                              echo $list['jj_price'];
                                              echo "元/㎡";
                                          }else{
                                              echo "总价约：";
                                              echo $list['all_price'];
                                              echo "万/套";
                                          }
                                          ?></div>
                                  </div>
                                  <div class="tr"><span class="place">地址：<?php echo $list['xmdz'];?></span></div> 
                               </div>
                          </a>         
                          
                    <div class="clear"></div>               
                    </div>
                     
                        <div class="Discounts">
                           <div class="Discounts-l">
                              <a href="javascript:;" onclick="openwid4('领取最新优惠','<?php echo $list['fkfs'];?>','[<?php echo cityname($list['city_id']);?>]<?php echo $list['title'];?>移动_别墅获取优惠',9);"><span><?php echo $list['fkfs'];?></span></a>
                           </div>
                           <div class="Discounts-r">                              
                              <span class="Discounts-hqrh"><a href="javascript:;" onclick="openwid4('领取最新优惠','<?php echo $list['fkfs'];?>','[<?php echo cityname($list['city_id']);?>]<?php echo $list['title'];?>移动_别墅获取优惠',9);">获取优惠</a></span>
                           </div>
                           <div class="clear"></div>
                        </div>
                                        <span class="lbs lbs-hot"><?php
            $flagztz='';
			  $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='8' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $list['ztz'])){
					echo ''.$listflag['flag'].'';
				}
			}
			?></span> 
                    <div class="clear"></div>
                </div>                
                        </li>
  <?php
		}
		}
  ?>
			</ul>
            <!-- 加载更多 -->
            <div onclick="loadMore(this)" class="more-loading loadMore" style="display: block;">
                <span>加载更多</span>
                <span style="display: none;"><i></i>正在拼命加载...</span>
            </div>
            <!-- 加载更多 end-->
        </div>
    </div>
<div style="height: 20px;"></div>    
<!--底部悬浮栏-->
<!--返回顶部-->
<div class="return-top return-top2"></div>
<div id="prop" class="tsk-translayer"></div>
<script src="/public/static/phone/js/lp/common.js"></script>
<script src="/public/static/phone/js/list-new.js"></script>
<script src="/public/static/libs/layer/mobile/layer.js"></script> 
<input type="hidden" id="cityid" value="<?php echo $city_id;?>">
<input type="hidden" id="priceid" value="<?php echo $flagjw;?>">
<input type="hidden" id="hxid" value="<?php echo $flaghx;?>">
<input type="hidden" id="hstatus" value="">
<input type="hidden" id="htype" value="">
<input type="hidden" id="wys" value="">
<input type="hidden" id="keywords" value="">
<input type="hidden" id="type" value="<?php echo $flagts;?>">
<script type="text/javascript"> 
$(".return-top2").on("click",function(){
	//alert(1);
    $('body').animate({scrollTop: 0}, 1000);
    return false;
});
var site_url = "http://sanya.mumu.com/m/bieshu/";
$(function() {
    //滑到底部自动加载
    $(window).scroll( function() {
        if($(document).height() - ($(window).scrollTop() + $(window).height()) <= 100) {
            loadMore();
        }
    });
    //点击周边黑色区域隐藏下拉菜单
    $(".mask").click(function() {
        $(".menubox li.active").click();
    });
});
var currPage = 1;
var searchValue = '';
//加载更多
function loadMore() {
    if($(".loadMore").hasClass("loading") || $(".loadMore").css("display") == "none") {
        return;
    }    
    var str ='<li class="mb30"><div class="build-list pr"><div class="item-news" style="overflow: inherit;border:0;position: relative;"><a href="#url#"><div class="img-area"><img src="#thumb#" alt="#title1#"></div><div class="des"><div class="tr"><div class="place">#title#</div><div class="price">#dw# #price#</div></div><div class="tr"><span class="place">地址：#address#</span></div></div></a><div class="clear"></div></div><span class="lbs lbs-hot">#status#</span><div class="clear"></div></li>';
    var str2 ='<li class="mb30"><div class="build-list pr"><div class="item-news" style="overflow: inherit;border:0;position: relative;"><a href="#url#"><div class="img-area pr"><img src="#thumb#" alt="#title1#"><div class="video_play"><img src="/public/static/phone/image/icons/splist14.png"style="width: 50px;height: 50px;"></div></div><div class="des"><div class="tr"><div class="place">#title#</div><div class="price">#dw# #price#</div></div><div class="tr"><span class="place">地址：#address#</span></div></div></a><div class="clear"></div></div><span class="lbs lbs-hot">#status#</span><div class="clear"></div></li>'; 
    var sstr ='<li><div class="build-list pr"><div class="item-news" style="overflow: inherit;border:0;position: relative;"><a href="#url#"><div class="img-area"><img src="#thumb#" alt="#title1#"></div><div class="des"><div class="tr"><div class="place">#title#</div><div class="price" style=" color: #f07c69; font-size: .4rem;">#dw# #price#</div></div><div class="tr"><span class="place">地址：#address#</span></div> </div></a><div class="clear"></div></div><div class="Discounts"><div class="Discounts-l"><span>#yh_news#</span></div><div class="Discounts-r"><span class="Discounts-hqrh"><a href="javascript:;" onclick="openwid4(\'领取最新优惠\',\'团购享99折优惠\',\'耀江西岸公馆别墅移动_海景房获取优惠\',9);">获取优惠</a></span></div><div class="clear"></div></div><span class="lbs lbs-hot">#status#</span> <div class="clear"></div></div></li>';  
    var sstr2 ='<li><div class="build-list pr"><div class="item-news" style="overflow: inherit;border:0;position: relative;"><a href="#url#"><div class="img-area pr"><img src="#thumb#" alt="#title1#"><div class="video_play"><img src="/public/static/phone/image/icons/splist14.png"style="width: 50px;height: 50px;"></div></div><div class="des"><div class="tr"><div class="place">#title#</div><div class="price" style=" color: #f07c69; font-size: .4rem;">#dw# #price#</div></div><div class="tr"><span class="place">地址：#address#</span></div> </div></a><div class="clear"></div></div><div class="Discounts"><div class="Discounts-l"><span>#yh_news#</span></div><div class="Discounts-r"><span class="Discounts-hqrh"><a href="javascript:;" onclick="openwid4(\'领取最新优惠\',\'团购享99折优惠\',\'耀江西岸公馆别墅移动_海景房获取优惠\',9);">获取优惠</a></span></div><div class="clear"></div></div><span class="lbs lbs-hot">#status#</span> <div class="clear"></div></div></li>';  
    $(".loadMore").addClass("loading");
    $(".loadMore span").hide().eq(1).show();
    var cityid=$('#cityid').val();
    var key=$('#keywords').val();
    var pr=$('#priceid').val();
    var h=$('#hxid').val();
    var hstatus=$('#hstatus').val();
    var htype=$('#htype').val();
    var wys=$('#wys').val();
    var type=$('#type').val();
    var html='';
    $.ajax({
        url: "ajaxlist2/", 
        type:'post',
        data: {page: currPage + 1,city_id:cityid,key:key,'flagjw':pr,'flaghx':h,'hstatus':hstatus,'htype':htype,'wys':wys,'flagts':type}, 
        success: function(data) {            
            if(data){
				data=$.parseJSON(data);
                $(".loadMore").removeClass("loading");
                $(".loadMore span").hide().eq(0).show();                        
                $.each(data, function(i, n){ 
				//alert(n.url);                   
                    if(n.yh_news==''){ 
                        if(n.video_thumb){
                            html += str2.replace('#url#',n.url).replace('#thumb#',n.thumb).replace('#title#',n.title).replace('#title1#',n.title).replace('#address#',n.address).replace('#type#',n.type).replace('#price#',n.price).replace('#status#',n.status).replace('#avater#',n.avater).replace('#dw#',n.dw);
                        }else{
                            html += str.replace('#url#',n.url).replace('#thumb#',n.thumb).replace('#title#',n.title).replace('#title1#',n.title).replace('#address#',n.address).replace('#type#',n.type).replace('#price#',n.price).replace('#status#',n.status).replace('#avater#',n.avater).replace('#dw#',n.dw);
                        }                                            
                    }else{
                        if(n.video_thumb){
                            html += sstr2.replace('#url#',n.url).replace('#thumb#',n.thumb).replace('#title#',n.title).replace('#title1#',n.title).replace('#address#',n.address).replace('#type#',n.type).replace('#price#',n.price).replace('#status#',n.status).replace('#avater#',n.avater).replace('#dw#',n.dw).replace('#yh_news#',n.yh_news).replace('#yhurl#',n.yhurl);
                        }else{
                            html += sstr.replace('#url#',n.url).replace('#thumb#',n.thumb).replace('#title#',n.title).replace('#title1#',n.title).replace('#address#',n.address).replace('#type#',n.type).replace('#price#',n.price).replace('#status#',n.status).replace('#avater#',n.avater).replace('#dw#',n.dw).replace('#yh_news#',n.yh_news).replace('#yhurl#',n.yhurl);
                        }
                        
                    }
                });     
                $('#ajaxhouse').append(html); 
                currPage++;
            }else{
                layer.open({content: '没有更多楼盘',time: 2 ,style: 'background:  rgb(176,176,176); color:#333; border:none;' });           
                $(".loadMore").hide();                
            }
        },
        complete: function() {
            $(".loadMore").removeClass("loading");
            $(".loadMore span").hide().eq(0).show();
        }
    });
}
</script>

<?php include("../bottom.php");?>     
</body>
</html> 
<?php include("../sq.php");?>
<style type="text/css">
.icon-16 {background: url(/public/static/phone/image/icons/close2.png) no-repeat;padding: 22px 0px;}
.video_2_btn{bottom: .3rem}
</style> 