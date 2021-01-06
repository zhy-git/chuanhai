
<?php
require("../conn/conn.php");
require("../functionmpp.php");

?>

<!DOCTYPE html>
<html>

<head>
 
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
<title>地图搜索一手热销楼盘－<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>">
    <link href="/biaodan/ditu/top_nav.css" rel="stylesheet">
    <link href="/biaodan/ditu/style.css" rel="stylesheet">
	<script src="/biaodan/ditu/jquery-1.6.js"></script>
	<script type="text/javascript" src="/biaodan/ditu/autocomplete.js"></script>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=OwqqNdfy1sKeWwrX0Pd8V0iZ"></script>
    <!--[if IE 6]>
    <script src="iepng.js" type="text/javascript"></script>
    <script type="text/javascript">
    EvPNG.fix('div, ul, img, li, input');
    </script>
    <![endif]-->	
</head>

<body>
    <!-- 导航 -->
    <div class="nav0" id="nav">

<!-- 顶部导航 -->
<div class="top_nav">
    <div class="wrap">
    	<style>
			.showcity{display: block;cursor: pointer;}
    		.otherwrap{position:absolute;width:398px;padding:13px 20px;top:52px;left:-10px;border:1px #00A0EA solid;background-color:#fff;z-index:99;visibility: hidden;}
    		.otherwrap .jiao{position:absolute;width:23px;height:13px;top:-13px;left:35px;background:url(http://imgf1.fccs.com.cn/public/tab/images/other.gif) no-repeat 0 0;}
    		.otherwrap .close{position:absolute;width:19px;height:18px;top:12px;right:12px;background:url(http://imgf1.fccs.com.cn/public/tab/images/other.gif) no-repeat 0 -25px;cursor:pointer;}
    		.otherwrap .tit{font-size:16px;font-weight:bold;text-align: left;}
    		.otherwrap .tjnav{padding:12px 0;border-bottom:1px #dce7c9 solid;}
    		.otherwrap .tjnav li{float:left;height:20px;line-height:20px;font-size:14px;padding-right:10px;}
    		.otherwrap .citynav{padding:12px 0;zoom:1}
    		.otherwrap .tab_menu li{float:left;height:24px;font-size: 16px;line-height:24px;padding:0 18px;background-color:#e2ecd2;color:#808080;cursor: pointer;}
    		.otherwrap .tab_menu li.over{background-color:#00A0EA;color:#fff;}
    		.otherwrap .citywrap{position:relative;width:398px;overflow: hidden;display:none;}
    		.otherwrap .citylist{position:absolute;left:0;top:0;width:390px;}
    		.otherwrap .citylist dl{clear:both;}
    		.otherwrap .citylist dt,.citylist dd{float:left;line-height: 26px;}
    		.otherwrap .citylist dt{width:14px;padding-right:25px;font-size:14px;font-weight: bold;color:#00A0EA;font-family: Arial;height:26px;overflow: hidden;}
    		.otherwrap .citylist dd{width:350px;}
    		#scrollCity_1 dt{width: 45px;}
    		#scrollCity_1 dd{width: 320px;}
    		.otherwrap .citylist dd li{float:left;height:26px;padding-right:10px;font-size:14px;}
    		.otherwrap .cityBarBg{position:absolute;width:6px;height:234px;top:0;right:0;background:url(http://imgf1.fccs.com.cn/public/tab/images/citybarbg.gif) repeat-y;}
    		.otherwrap .cityBar{position:absolute;width:6px;top:0;right:0;background-color:#d3d3d3;}
    		.cb0{clear:both; height:0; overflow:hidden; display:block;}
   		</style>
   		
   	
		
        <h2 class="logo fl">
            <a href="">
            <img src="http://imgf1.fccs.com.cn/newhouse/v3/images/logo_fccs.jpg" alt="" width="79" height="33"></a>
        </h2>
        
     
		    
        <div class="nav fl">
            <ul>
		           <ul id="navsub" class="nav clearfix"><li><h3><a href="/">首页</a></h3></li><li class="nLi nLix"><h3><a href="/loupan/"><b>新房</b></a></h3></li><li class="nLi"><h3><a href="/hjf/">海景房</a></h3></li><li class="nLi"><h3><a href="/bieshu/">别墅</a></h3></li><li class="nLi"><h3><a href="/spxzl/">商铺/写字楼</a></h3></li><li class="nLi" para="hire"><h3><a href="/news/">楼市</a></h3></li></ul>
            </ul>
        </div>
  
        <div class="login fr">
            <ul id="globalNavLogUl">
            	欢迎您！
            </ul>
        </div>
    </div>
</div>	    <style>
	    .otherwrap {top:51px;}
	    </style>
    </div>

	<!-- 搜索条 -->

<!-- 搜索条 -->
<div class="col_search" id="col_search">
    <div class="logo fl"><img src="/map/logo.png" alt=""></div>
    
    <div class="fl col_name">
    <div class="c_n">新房</div>
        </div>
    


    <div class="a_z fl">
        <div class="periods0 fl">
            <div class="periods" id="search_areaId">
                <span rel="区域">区域</span> <b></b>
            </div>
            <div class="periods_more" rel_n="areaId" rel_v="" style="width:200px;">
                <div class="p_m_items" rel="" bmapx="109.169618" bmapy="21.462375" jup="y">全部</div>
                   <?php
					 $city1=$mysql->query("select * from `web_city` where `pid`='0' and `city_st`='1' order by `city_px` asc");
					foreach($city1 as $cityall1){
					?>
                    <div class="p_m_items" rel="<?php echo $cityall1['id'];?>" bmapx="<?php echo $cityall1['zbx'];?>" bmapy="<?php echo $cityall1['zby'];?>" jup="y" style=" clear:both;"><strong><?php echo $cityall1['city_name'];?></strong></div>
              <?php 
				$city=$mysql->query("select * from `web_city` where `pid`='{$cityall1['id']}' and `city_st`='1' order by `city_px` asc");
				  foreach($city as $cityall){
				?>
 <div class="p_m_items" rel="<?php echo $cityall['id'];?>" bmapx="<?php echo $cityall['zbx'];?>" bmapy="<?php echo $cityall['zby'];?>" jup="y" style="float:left; width:33.33%; padding:0; margin:0; text-align:center;"><?php echo $cityall['city_name'];?></div>
<?php }?>
            
<?php
	}
?>
            </div>
        </div>
    </div>

    <div class="a_z fl">
        <div class="periods0 fl">
            <div class="periods" id="search_price">
                <span rel="价格">价格</span> <b></b>
            </div>
            <div class="periods_more" rel_n="price" rel_v="">
                <div class="p_m_items" rel="" jup="y">全部</div>
               <div class="p_m_items" rel="jw1" jup="y" >5000元以下</div>
                	<div class="p_m_items" rel="jw2" jup="y">5000-8000元/㎡</div>
                	<div class="p_m_items" rel="jw3" jup="y" >8000-10000元/㎡</div>
                	<div class="p_m_items" rel="jw4" jup="y">10000-15000元/㎡</div>
                	<div class="p_m_items" rel="jw5" jup="y" >15000-20000元/㎡</div>
                	      	<div class="p_m_items" rel="jw6" jup="y">20000-25000元/㎡</div>
                	
            </div>
        </div>
    </div>

    <div class="a_z fl">
        <div class="periods0 fl">
            <div class="periods" id="search_houseUse">
                <span rel="用途">用途</span> <b></b>
            </div>
            <div class="periods_more" rel_n="houseUseId" rel_v="">
                <div class="p_m_items" rel="" jup="y">全部</div>
                    <div class="p_m_items" rel="ts1" jup="y">高档小区</div>
                    <div class="p_m_items" rel="ts2" jup="y">海景房</div>
                    <div class="p_m_items" rel="ts3" jup="y">温泉入户</div>
                    <div class="p_m_items" rel="ts4" jup="y">养生度假</div>
                    <div class="p_m_items" rel="ts5" jup="y">花园洋房</div>
                    <div class="p_m_items" rel="ts6" jup="y">豪宅精选</div>
                
            </div>
        </div>
    </div>
    
    
 
    
    <div class="link">
        <a href="javascript:void(0);" class="btn1"></a>
        <a href="/loupan/" class="btn2"></a>
    </div>
    
</div>    
    <div class="col_main" id="col_main">
    	<!-- 工具 -->


<!-- 全屏搜索条 -->
<div class="search_bar" id="map_main_search">
    <div class="input fl"><input type="text" id="keyword_f" class="keywordText" rel="请输入楼盘名称"></div>
    <div class="btn fr"><input id="keywordSumit_f" type="button" value=""></div>
    <div class="ac"></div>
    <div class="cb0"></div>
</div>


<!-- 楼盘详细 -->
<div id="floorDetail" class="tk" style="display:none;">
    <div class="close"></div>
    <div></div>
    <div class="pic_tel fl">
        <div class="pic">
        	<div class="num"></div>
        	<a href="" target="_blank">
        		<img src="" alt="" width="210" height="140" border="0">
        	</a>
        </div>
        <div class="tel">
            <img src="/public/static/home/image/icon_tel1.png" height="29" width="29" alt="" class="vm">
            <label for=""></label>
        </div>
    </div>
    <div class="info fr">
    </div>
    <div class="cb0"></div>
</div>


		
        <!-- 地图主体 -->
        <div class="map_con" id="allmap"></div>
    </div>
    

<div class="col_side col_side_1" id="col_side">
    <div class="close_side" id="close_side_btn"></div>
    <div class="searched" id="cur_selected">
        <div class="txt ell"></div>
        <div class="btn" id="clear_cur_selected">
            <div class="ico"></div>
            <div class="txt">清空</div>
        </div>
    </div>
    
    <div class="tip" id="find_result_tip">
    	<div class="fl">地图范围内共找到<span class="w_c_1 fb"></span>个楼盘</div>
    
    </div>
    
    <div class="col_list1" id="floor_list">
        <ul>
        </ul>
    </div>
</div>
    
</body>

</html>
<script src="/biaodan/ditu/RichMarker_min.js"></script>
<script src="/biaodan/ditu/map_ctrl.js"></script>
<script type="text/javascript">
var g_bmapx = 109.169618; var g_bmapy = 21.462375; var g_bmapz = 10;
var g_totalCount = <?php echo countloupanall();?>; var g_pageMapType = 'newhouse'; var g_floorUse = 0; var g_issueId = 0;

var g_areaArray = new Array();
 <?php
	$city2=$mysql->query("select * from `web_city` where `pid`='1' and `city_st`='1' order by `city_px` asc");
				foreach($city2 as $cityall2){
		echo "g_areaArray.push(new FccsAreaData('".$cityall2['id']."', '".$cityall2['city_name']."', ".$cityall2['zbx'].", ".$cityall2['zby'].", ".countloupan($cityall2['id'])."));";
	
	}
?>
//g_areaArray.push(new FccsAreaData('1', '海南', 110.234231, 19.957318, <?php //echo countloupan2(1);?>));
//g_areaArray.push(new FccsAreaData('41', '广西', 108.660561,22.117004, <?php //echo countloupan2(41);?>));
//g_areaArray.push(new FccsAreaData('75', '广东', 113.266677,23.139544, <?php //echo countloupan2(75);?>));
//g_areaArray.push(new FccsAreaData('47', '云南', 102.727343,25.046848, <?php //echo countloupan2(47);?>));
//g_areaArray.push(new FccsAreaData('75', '海外置业', 99.664283,19.422195, <?php //echo countloupan2(75);?>));
</script>
<script src="/biaodan/ditu/map_resize.js"></script>
<script src="/biaodan/ditu/select.js"></script>
<script src="/biaodan/ditu/map_v2.js"></script>
