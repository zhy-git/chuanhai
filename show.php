<!DOCTYPE html>
<html lang="zh-CN">
<?php
require("../conn/conn.php");
require("../function.php");
$lm=14;
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
    <link href="/css/loupan.css" rel="stylesheet">
    <link href="/css/alert.css" rel="stylesheet">
   <style>
   
.common-title{height:30px;position:relative;line-height:30px}
.common-title-1{color:#999;position:absolute;bottom:0;right:0;line-height:1}
.lpm-section7-title{height:35px;width:158px;background:url(/image/section7-title.jpg) no-repeat;font-size:24px;line-height:35px;text-indent:10px}
.lpm-section7-title a{color:#fff;font-family:'Microsoft YaHei'}
.lp-col-s1{margin-right:15px;position:relative;width:216px!important;height:215px;overflow:hidden}
.lp-col-s1{margin-right:25px}
.lp-col-1{width:216px;height:142px}
.lp-col-s1 a{display:block;overflow:hidden;position:relative;margin-bottom:10px;font-size:14px}
.lp-col-s1 a img{width:214px;height:142px;border:1px solid #f4f4f4}
.lpm-section7-1{width:100%;height:24px;overflow:hidden;white-space:normal;margin-top:10px}

   </style>
<?php include("../sq2.php");?>
</head>
<body>
<!-- 悬标 -->
<?php include("../ad_xf.php");?>
<!-- 导航 -->
<?php include("../top.php");?>
<?php $navfl=1;?>

<script type="text/javascript" src="s_files/common.js"></script>
<script type="text/javascript" src="s_files/jquery-1.js"></script>
<script type="text/javascript" src="s_files/jquery_003.js"></script>
<script src="s_files/jquery_002.js"></script>
<!--<script type="text/javascript" src="s_files/layer.js"></script> -->
<script src="http://cdn.bootcss.com/jquery/1.12.3/jquery.min.js"></script>
  <script src="/js/layer/layer.js"></script>
<script type="text/javascript" src="s_files/js.js"></script> 
<link rel="stylesheet" href="s_files/shapan.css"> 
<link rel="stylesheet" href="/css/bieshu.css"> 
<link rel="stylesheet" type="text/css" href="/layui/css/layui.css"/>
<style>
.layui-btn, .layui-edge, .layui-inline, img {
    vertical-align: top;
}
</style>
<!-- 顶部随屏 -->
    <div class="content-center public-lpnav header2" style="display: none; height: auto;">
        <div class="bieshu-top-nav">
            <div class="w1200">
                <div class="titleNav hk" style="border:0;margin: 0">
                    <h3 data-id="index_3" class="current" >户型信息</h3>
                    <h3 data-id="index_2" >楼盘相册</h3>
                    <h3 data-id="index_1">楼盘动态</h3>
                    <h3 data-id="index_4">楼盘信息</h3>
                    <h3 data-id="index_5" >周边配套</h3>
                </div>
            </div>
        </div>
  </div>
<style type="text/css">
.hk .current{background: #00A0EA!important;}
.hk h3{height: auto;line-height: 45px;color: #fff}
.loupan-list1-s4{margin-bottom: 5px;}
</style>
<!-- 顶部随屏 end-->

<div class="puic_wid">
	<!-- 面包屑 -->
	<?php include("nav.php");?>
<!-- 顶部随屏 end--> 
	<img src="/<?php echo $infos['src2'];?>" width="1920" height="480" style="position:absolute; top:70px; left:50%; margin-left:-960px; z-index:0;">
   <!-- 顶部 -->
   <div class="onehandBox w1200" style="height:480px;">
    <div class="project container clearfix" style="height:440px">
        <div class="proInfo_min" style="width:150px;color:#fff;height:31px;display:none;position:absolute;border-radius:5px">
            <span class="pg_min" style="position:absolute;width:150px;height:31px;display:inline-block;font-size:14px;left:0;color:#fff;line-height:31px;font-weight:700;text-align:center;background:url(/image/icon.png) no-repeat 0 -151px">新房简介</span>
        </div>
        <div class="proInfo" style="font-size:12px" id="proInfo_view">
            <h4 class="proBtn">新房简介</h4>
            <div class="proCont clearfix" style="left:0">
                <b class="slide" id="slide">×</b>
                <div class="selling">
                    <span><?php echo $infos['esfcx'];?></span>
                    <h5><?php echo $infos['title'];?></h5>                    
                    <p>售价：<b><?php if($infos['all_price']==0){?>
				<?php if($infos['jj_price']==0){?>
                   待定
				<?php }else{?>
                    <?php echo $infos['jj_price'];?>元/㎡
				<?php }?>
			<?php }else{?>
                <?php echo $infos['all_price'];?>万/套
			<?php }?></b></p>
                </div>
                <div class="sellCont">
                    <ul>
                         <li class="clearfix">
                         <?php echo loupanflagtsi2($infos['flagts'],6,5);?>
                         </li>
                        <li class="lookMap" loacation="<?php echo $infos['title'];?>" name="<?php echo $infos['title'];?>" >
                        <a href="javascript:void(0)" ><i class="qw"></i><span>项目区位</span>：<strong class="pg_quwei"><?php echo $infos['xmdz'];?></strong><b>＞</b></a></li>
                        <li><i class="cp"></i><span>产&nbsp;&nbsp;&nbsp;&nbsp;品</span>：海景房</li>
                        <li><i class="zs"></i><span>主力户型</span>：<?php echo $infos['zlhx'];?></li>
                        <li><a href="javascript:void(0)" style="cursor:default"><i class="bh"></i><span>物业类型</span>：<?php echo $infos['wylx'];?></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="share" style="background:rgba(0,0,0,1);border-radius:5px;display:-webkit-box;display:-webkit-flex;display:-ms-flexbox;display:flex">
        <a href="javascript:;" data-name="预约看房" data-type="<?php echo $sitecityname;?>_海景房_预约看房" class="btn-reg common-free-mobile-btn bmkf-up"><b class="yy"></b>预约看房</a>
         <a href="javascript:;" data-name="私人定制" data-type="<?php echo $sitecityname;?>_海景房_私人定制" class="btn-reg pg_fx common-free-mobile-btn bmkf-up"><b class="fx"></b>私人定制</a>
        </div>
        <p class="album" data-id="1415">
            <span></span> 楼盘相册 (<b><?php echo countxc('all',$lpid);?></b>张)
        </p>
        <!--div id="qrcode" style="position:absolute;right:31px;top:42px;display:none;border:6px solid #fff;border-radius:2px">
        </div -->
    </div>
    </div>
   <!-- 顶部 end-->
   
<!-- 分类标题 -->
<div class="titleNav container clearfix">
        <h3 data-id="index_3" class="current">户型信息</h3>
        <h3 data-id="index_2">楼盘相册</h3>
        <h3 data-id="index_1">楼盘动态</h3>
        <h3 data-id="index_4">楼盘信息</h3>        
        <h3 data-id="index_5">周边配套</h3>
    </div>
<!-- 分类标题 end-->
   <!-- 户型信息 -->
<div class="buildNews contBor" id="huxing_view">
        <div class="buildSport container" style="border-bottom:1px solid #ddd;">
            <h4 class="index_3">户型信息</h4>
            <div class="hxTitle clearfix" style="display:none;">
                <h5 class="current">全部户型</h5>
            </div>
            <div class="hxBox" style="height: 432px">
            <style type="text/css">
		/* css 重置 */
		*{margin:0; padding:0; list-style:none; }
		body{ background:#fff; font:normal 12px/22px 宋体;  }
		img{ border:0;  }
		a{ text-decoration:none; color:#333;  }

		/* 本例子css */
		.picScroll-left{ overflow:hidden; position:relative;   }
		.picScroll-left .hd{ height:0px; }
		.picScroll-left .hd .prev,.picScroll-left .hd .next{ display:block;  width:72px; height:72px; float:right; overflow:hidden;
			 cursor:pointer; background:url("/image/icon.png") 0 0 no-repeat; z-index:999}
		.picScroll-left .hd .prev{background-position: -29px -75px; }
		.picScroll-left .hd .next{background-position: -108px -74px; }
		.picScroll-left .hd .prevStop{ background-position:-60px 0; }
		.picScroll-left .hd .nextStop{ background-position:-60px -50px; }
		.picScroll-left .hd ul{ float:right; overflow:hidden; zoom:1; margin-top:10px; zoom:1; }
		.picScroll-left .hd ul li{ float:left;  width:9px; height:9px; overflow:hidden; margin-right:5px; text-indent:-999px; cursor:pointer; background:url("../images/icoCircle.gif") 0 -9px no-repeat; }
		.picScroll-left .hd ul li.on{ background-position:0 0; }
	/*	.picScroll-left .bd{ padding:10px;   }
		.picScroll-left .bd ul{ overflow:hidden; zoom:1; }
		.picScroll-left .bd ul li{ margin:0 8px; float:left; _display:inline; overflow:hidden; text-align:center;  }
		.picScroll-left .bd ul li .pic{ text-align:center; }
		.picScroll-left .bd ul li .pic img{ width:120px; height:90px; display:block;  padding:2px; border:1px solid #ccc; }
		.picScroll-left .bd ul li .pic a:hover img{ border-color:#999;  }
		.picScroll-left .bd ul li .title{ line-height:24px;   }*/
ul.imglist li {
    height: 400px;
    margin-right: 65px;
}
		</style>

		<div class="picScroll-left">
			<div class="hd">
				<a class="next"></a>
				<a class="prev"></a>
			</div>
			<div class="bd">
				<ul class="imglist clearfix" style="width:1200px;">   
                <?php
                $row = $mysql->query("select * from `web_pic` where `luopan_id`='$lpid' and `pid_flag`='xc1'");//
		//print_r($row);
		foreach($row as $k=>$list){
				?>             
					<li data-type="2" housetypeid="<?php echo $list['id'];?>">
                        <dl>
                            <dt style="cursor: pointer;">
						<img src="/<?php echo $list['pic_img'];?>" alt="<?php echo $list['pic_name'];?>" style="width: 249px;height: 332px;" class="lazy_img" title="<?php echo $list['bh'];?>户型信息">
                              
                            </dt>
                            <dd>
                                <div class="pt5">                                    
                                    <p class="clearfix"><span><?php echo $list['pic_name'];?></span></p>
                                    <p class="clearfix">        
                                        <span style="display: inline-block;max-width: 57px;overflow: hidden;text-overflow: ellipsis;"><?php echo $list['mj'];?>㎡</span>
                                        <i><?php echo $list['zt'];?></i> 
                                    </p>
                                </div>
                            </dd>
                        </dl>
                    </li>    
                    <?php }?>
                                  
                                </ul>
			</div>
		</div>

		<script id="jsID" type="text/javascript">
		 jQuery(".picScroll-left").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:4});
		</script>
        
                
            </div>
        </div>
</div>
<!-- 户型信息 end-->


<!-- 楼盘相册 -->
<div class="buildSport container" id="picture_cot_view" total="32">
    <h4 class="index_2">楼盘相册</h4>
    <div class="picture clearfix">
    <?php
					  $rowflag=$mysql->query("select * from `web_flag` where `flag_fl`='9' and `flag_st`='1' and `id`<>'43' order by `flag_px` asc");
					  foreach($rowflag as $ks=>$listflag){
						  $rowxc = $mysql->query("select * from `web_pic` where `luopan_id`='$lpid' and `pid_flag`='{$listflag['flag_bm']}' limit 0,1");//
					  ?>
                      <dl filetype="<?php echo $listflag['id'];?>" data-id="<?php echo $lpid;?>">
            <dt><a href="javascript:void(0)"><img class="lazy_img lazy" src="/<?php echo $rowxc[0]['pic_img'];?>" alt="<?php echo $infos['title'];?>楼盘相册" title="<?php echo $infos['title'];?>楼盘相册"></a></dt>
            <dd class="pg3"><?php echo $listflag['flag'];?><span>（<?php echo countxc($listflag['flag_bm'],$lpid);?>）</span></dd>
        </dl>
                      <?php
					  }
					  ?>
                    
    </div>
</div>
<!-- 楼盘相册 end-->

<!-- 楼盘动态-->
<div class="contBor index_1">
        <div class="buildSport container" style="border-bottom:1px solid #ddd;">
            <h4>楼盘动态</h4>
            <div>
            <!-- 资讯列表 -->
			<div class="sportCont" style="height: 240px;overflow: auto;">
                    <div class="sportList clearfix">
                       <?php

					$sql="WHERE `pid`='28' and `lpid`='{$lpid}' ";
					
					$row = $mysql->query("select * from `web_content` {$sql} order by addtime desc,id desc");
					
							foreach($row as $k=>$list){
							
					?>
                        
                    <dl>
                            <a onclick="openbox('查看楼盘动态','<?php echo $site.'bieshu/news_show/'.$list['id'].'.html';?>','818px','80%');" style="cursor: pointer;">
                            <dt><img src="/image/icon_d2.png"></dt>
                            <dd>
                            <div>
                                <h5><i class="overflow_hidden_width340" title="<?php echo $list['title'];?>"><?php echo $list['title'];?></i></h5>
                                <p title="">
                                    <span>内容：</span><span title="" class="overflow_hidden"><?php echo mb_substr(strip_tags($list['content']),0,130,"utf-8"); ?>...</span>
                                </p>
                                <p>
                                    <span>发布时间：</span><span title="<?php echo date('Y-m-d',strtotime($list['addtime']));?>" class="overflow_hidden"><?php echo date('Y-m-d',strtotime($list['addtime']));?></span>
                                </p>
                            </div>
                            </dd>
                            </a>
                        </dl>
	      <?php
	}
?>      					
							
                             </div>
                </div>
                        <!-- 资讯列表 end -->
            </div>
        </div>
    </div>
<!-- 楼盘动态end-->
<Div class="" style="clear:both;"></Div>
<!-- 楼盘详情 -->
<div class="buildNews">
        <div class="buildSport container">
            <h4 class="index_4">楼盘信息</h4>
            <div class="houseDet">
			<ul class="all">
                    <li class="keep clearfix">
                        <span><label>占地面积</label>：<b><?php echo $infos['zdmj'];?></b></span>
                        <span><label>建筑面积</label>：<b><?php echo $infos['jzmj'];?></b></span>
                        <span><label>建筑类型</label>：<b><?php echo loupanflagtsi3($infos['flaglb'],3,5);?></b></span>
                    </li>
                    <li class="keep clearfix">
                        <span><label>总户数</label>：<b><?php echo $infos['zhs'];?></b></span>
                        <span><label>绿化率</label>：<b style="vertical-align: middle;"><?php echo $infos['lhl'];?></b></span>     
						<span><label>装修状况</label>：<b><?php echo loupanflagzx($infos['flagzx'],5);?></b></span>						
                    </li>
                    <li class="keep clearfix">
                        <span><label>开发商</label>：<b style="/*width:900px;white-space: normal;vertical-align: top;*/" ><?php echo $infos['kfs'];?></b></span>
						<span><label>房屋产权</label>：<b><?php echo $infos['cqnx'];?></b></span>
						<span><label>车位数</label>：<b style="vertical-align: middle;"><?php echo $infos['cws'];?></b></span>
                    </li>
                    <li class="keep clearfix">
                        <span><label>物业公司</label>：<b style="/*width:900px;white-space: normal;vertical-align: top;*/" title=""><?php echo $infos['wygs'];?></b></span>
                        <span><label>物业费</label>：<b><?php echo $infos['wyf'];?> </b></span>
						<span><label>预售许可</label>：<b  title="<?php echo $infos['ysxkz'];?>"><?php echo $infos['ysxkz'];?></b></span>						
                    </li>
                    <li class="clearfix" >
                        <span><label>楼盘地址</label>：<b><?php echo $infos['xmdz'];?></b></span>
                        <span><label>开盘时间</label>：<b><?php echo $infos['kptime'];?></b></span>
						<span><label>交房时间</label>：<b><?php echo $infos['jftime'];?></b></span>
                    </li>    
                    <!--<a href="javascript:void(0)" class="btns downIt"></a>-->
                    <div style="height:20px;"></div>
                </ul>
                <ul class="intrLong">
                    <li title="<?php echo $infos['xmdz'];?>"><label>项目地址</label>：<b style="width:1100px;white-space: normal;vertical-align: top;"><?php echo $infos['xmdz'];?></b></li>
                    <li title="<?php echo $infos['xmdz'];?>">
                        <label>项目介绍</label>：<b style="width:1100px;white-space: normal;vertical-align: top;;">
                            <?php echo strip_tags($infos['content']);?>
                        </b></li>
                    <li title="">
                        <label>交通线路</label>：<b style="width:1100px;white-space: normal;vertical-align: top;"><?php echo $infos['jtzk'];?></b></li>
                </ul>
            </div>
        </div>
    </div>
	<style>
	 .houseDet ul li  p{ text-indent: 0px !important;    margin-top: -3px;}
	 .houseDet ul li  p span{font-size: 14px !important;}
	</style>
<!-- 楼盘详情 end-->
<!-- 百度地图 -->
    <div class="w1200">
    
    <!--配套-->
    <div class="house-com-k-2 lpm-section5 clearfix">

		<div class="tit" id="index_5" >
			<h3 style="display: inline-block;font-size: 18px;color: #303;" class="index_5">周边配套</h3>
			<div style="width: 2px;height: 24px;background: #48bf01;position: absolute;left: 0;top: 15px; display:none;"></div>				
		</div>
	   <div style="width: 1160px;margin: 0 auto">
	 		 <div class="lp-map-s11 fl mt10" id="map_canvas" style="width: 830px;"></div>
			  <div class="lp-map-s12 fl mt10">
				  <div class="clearfix map-tag">
					  <a href="javascript:;" class="lp-map-1 lp-map-s fl icons lp-map-1-a" onclick="select_around(0);">商业</a> 
					  <a href="javascript:;" class="lp-map-2 lp-map-s fl icons" onclick="select_around(1);">交通</a> 
					  <a href="javascript:;" class="lp-map-3 lp-map-s fl icons" onclick="select_around(2);">教育</a> 
					  <a href="javascript:;" class="lp-map-4 lp-map-s fl icons" onclick="select_around(3);">医疗</a> 
				  </div> 
				  <p class="lpm-map-recond mt20">搜索到<span id="map_total"></span>条记录</p>
				  <div class="lp-map-tab" id="lp-map-tab">
				      <ul class="lp-map-s19" id="map_result"></ul>
				  </div>
			  </div>
			<div class="clear"></div>
			<div class="h20"></div> 
		</div>
 		<!-- html end-->
		<script src="http://api.map.baidu.com/api?v=1.2" type="text/javascript"></script>
		<script type="text/javascript" src="http://api.map.baidu.com/getscript?v=1.2&amp;ak=&amp;services=&amp;t=20130716024057"></script>
        <link rel="stylesheet" type="text/css" href="http://api.map.baidu.com/res/12/bmap.css">
		<script src="/public/static/home/js/map_baidu_new.js" type="text/javascript"></script>
		<script type="text/javascript">		
			var lng = '<?php echo $infos['zbx'];?>';
			var lat = '<?php echo $infos['zby'];?>';
			var bid = '1380';
			var bname = '<?php echo $infos['title'];?>';
			var phone1 = '';
			var phone2 = '';
			//var news = '全款9折，分期98折';
			//var address = '海口市丽江路111号';
			<?php if($infos['all_price']==0){?>
				<?php if($infos['jj_price']==0){?>
                    var price = '待定';
				<?php }else{?>
                    var price = '<?php echo $infos['jj_price'];?>元/㎡';
				<?php }?>
			<?php }else{?>
                var price = '<?php echo $infos['all_price'];?>万/套';
			<?php }?>
			//var price = '<?php echo $infos['title'];?>612万/套';
			var bprice = bname+"  "+price;			
			if (!isNaN(price))
			{
				bprice = bname+"  "+(price>0?(price+"元/㎡"):"售价待定");
			}
			//var binfoList = '';
			var jiwupath = '<?php echo $site;?>';			
			// 百度地图API功能****begin
			var mp = new BMap.Map("map_canvas",{minZoom: 6, maxZoom: 14});								//50米-5公里缩放
			//mp.addControl(new BMap.OverviewMapControl()); 											//添加默认缩略地图控件
			//mp.addControl(new BMap.OverviewMapControl({isOpen:true, anchor: BMAP_ANCHOR_BOTTOM_RIGHT})); //右下角，打开
			mp.addControl(new BMap.ScaleControl()); 													// 添加默认比例尺控件
			mp.addControl(new BMap.ScaleControl({anchor: BMAP_ANCHOR_BOTTOM_LEFT})); 					// 左下
			mp.addControl(new BMap.NavigationControl()); 												//添加默认缩放平移控件
			//mp.addControl(new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_LEFT, type: BMAP_NAVIGATION_CONTROL_SMALL})); //左上角，仅包含平移和缩放按钮
			var pointA=new BMap.Point(lng,lat);
			mp.centerAndZoom(pointA, 15);
			//mp.enableScrollWheelZoom();//启用滚轮放大缩小，默认禁用
			mp.enableKeyboard();
			mp.enableContinuousZoom(); 							// 开启连续缩放效果
			mp.enableInertialDragging();　						// 开启惯性拖拽效果			
			//开始搜索
			var local = new BMap.LocalSearch(mp, {pageCapacity:10});		
		    //多个关键字搜索返回结果 ****begin
		    local.setSearchCompleteCallback(function(results){
		    	//判断状态是否正确
		    	 if(local.getStatus() == BMAP_STATUS_SUCCESS){
			    	//openInfoWinFuns = [];
			    	var map_total=0;
			    	var pm=[];
			    	for(var index=0;index<results.length;index++){
		    	 		pm[index]=[];
		    	 		var zbcount=0;
			        	for(var i=0;i<results[index].getCurrentNumPois();i++){
			        		//初始化,拼装对象
			        		var _title=results[index].getPoi(i).title;
			        		var _keyword=results[index].keyword;
			        		var _address=results[index].getPoi(i).address;
			        		var _point=results[index].getPoi(i).point;
			        		var _poi=results[index].getPoi(i);
			        		var dist=mp.getDistance(pointA,results[index].getPoi(i).point).toFixed(0);//距离计算	
			        		if(dist<=2000){
			        			var myPointMarker=new pointMarker(_title,_keyword,_address,dist,_point,_poi);
				        		pm[index][zbcount]=myPointMarker;
				        		zbcount++;
				        		map_total++;
			        		}
			        	}
			        }
			        $("#map_total").html(map_total);//总记录数
			        //排序
			        sortOrder(pm);
		    	 	//document.getElementById("map_result").innerHTML = s.join("");
		    	 }else{
			    	document.getElementById("map_result").innerHTML = '没有查到, 您可以尝试把地图放大之后再查找';
			    }
		    });
		    //多个关键字搜索返回结果 ****end
		    //默认选择第一项    
			select_around(0);
			function select_around(i){
				$this=$(".lp-map-s").eq(i);
	   			for(var n=0;n<4;n++){	   				
   					$(".lp-map-s").removeClass('lp-map-'+(n+1)+'-a');   				
   				}
   				$this.addClass('lp-map-'+(i+1)+'-a');
				search(i,local);
			}
			$("#wenda-more-1").click(function(){			  
			  $(".wendas").addClass("auto");
			  $("#wenda-more-1").hide();
			  $(".wenda-more-2").show();
			});
			$(".wenda-more-2").click(function(){			  
			  $(".wendas").removeClass("auto");
			  $(".wenda-more-2").hide();
			  $("#wenda-more-1").show();
			});
	   </script>
        </div>
        
    </div>
<!-- 百度地图 end-->

<!-- 热销楼盘 -->
<div class="w1200">  
<div class="lpm-section7 clearfix mt15">
      <div class="common-title clearfix">
         <div class="lpm-section7-title"><span style="color: #fff">猜你喜欢</span></div>         
      </div>
      <div class="mt20" style="padding: 10px;border:1px solid #ddd">
        <div class="clearfix" style="width: 1300px;">   
          <!--lise  -->          
                  <?php
								$row = $mysql->query("select * from `web_content` where `pid`='80' and `city_id`={$sitecityid} order by px14 desc limit 0,5");
								foreach($row as $k=>$lps){
									if($lps['pid']==80){
										$url="/hjf/{$lps['id']}.html";
										}else{
											$url="/loupan/{$lps['id']}.html";
											}
							?>
                              
                            <div class="fl lp-col-s1">
        	 <a href="<?php echo $url;?>" target="_blank" class="lp-col-1" title="<?php echo $lps['title'];?>">
        	 	<div class="echo-img"><img class="trs lazy" original="/<?php echo $lps['img'];?>" alt="<?php echo $lps['title'];?>"></div>
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
<!-- 热销楼盘 end-->



<script>
;!function(){


//页面一打开就执行，放入ready是为了layer所需配件（css、扩展模块）加载完毕
layer.ready(function(){ 
  
  //iframe层
	//layer.open({
//	  type: 2,
//	  title: 'layer mobile页',
//	  shadeClose: true,
//	  shade: 0.8,
//	  area: ['380px', '90%'],
//	  content: 'mobile/' //iframe的url
//	}); 
	
});


 

/*$(window).scroll(function(){
            var height = $(document).scrollTop();
			//alert(height);
            var headerHeight = 70;
            if(height > headerHeight){
                $('.header2').fadeIn('slow',function(){
                    $(this).css('display','block');
                });
            }else{
                $('.header2').fadeOut('slow',function(){
                    $(this).css('display','none');
                });
            }
        });*/
	$(document).on("mouseleave", ".hxBox", function() {

                    $(".goLeft").hide(),

                    $(".goRight").hide()

                });

                var i = $(".imglist li").width()

                  , n = $(".imglist li").size();

                $(".imglist").css("width", (i + 58) * n),

               // $(".houseDet ul.all li").not(".keep").hide(),

                $(".titleNav h3").click(function() {

                    $(this).addClass("current").siblings().removeClass("current");

                    var t = "." + $(this).attr("data-id");

                    $("html,body").animate({

                        scrollTop: $(t).offset().top - 30

                    }, 500)

                })
	$("body").on("click", ".slide", function() {
					

                    $(".proCont ").animate({

                        left: "-320px"

                    }, 500, function() {

                        $("#proInfo_view").hide()

                    }),

                    $(".proInfo_min").show(),

                    $(".pg_min").animate({

                        width: "139px"

                    }, 500, function() {})

                })
	$("body").on("click", ".pg_min", function() {

                    $("#proInfo_view").show(),

                    $(".proCont ").animate({

                        left: "0px"

                    }, 500, function() {

                        $(".proInfo_min").hide()

                    }),

                    $(".pg_min").animate({

                        width: "0px"

                    }, 500, function() {})

                })
}();

</script>
<!--<script src="/layui/layui.js"></script>
<script src="/js/bieshuindex.js"></script> -->








<script src="s_files/owl.js"></script> 
<script src="s_files/news_commont.js"></script>
<script src="s_files/common-enroll.js"></script>
<script>
$('.newSlier-img').owlCarousel({
  navigation: false,
  slideSpeed: 300,
  paginationSpeed: 400,
  singleItem: true,
  pagination: true,
  autoPlay: true
});
$('.banner_prev').click(function() {
    var owl = $(".newSlier-img").data('owlCarousel');
    owl.prev();
});
$('.banner_next').click(function() {
    var owls = $(".newSlier-img").data('owlCarousel');
    owls.next('');
});
$('#newSlier').hover(function() {
    var len = $('.newSlier-img .item').length;
    if(len > 1) {
        $('.banner_prev').show();
        $('.banner_next').show();
    }
}, function() {
    $('.banner_prev').hide();
    $('.banner_next').hide();
});
// 顶部随屏
//顶部随屏

//关闭二维码
$(document).on('click','.closesaoma',function(){
    $('#saoma').hide();
});
</script>

	<div class="clear mt10"></div>
</div>
<!-- 报名看房 -->
<div class="black-bg" style="display: none;" id="black_bg"></div>
<div class="send-mess lpm-bx3" style="display: none;">
    <p class="regist-title"><span class="lpm-bx3-t">降价通知我</span>
    <span class="close close-send lpm-colse2" title="关闭" id="bmkfCallClose">×</span></p>
    <div class="regist-form">
      <p class="send-mess-text1" id="box1_t">价格变动这么快？！楼盘降价的消息我们将第一时间通知您！</p>
       <form class="submit_area">
                    <input type="hidden" name="pid" value="33">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="lpid" value="<?php echo $lpid;?>">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="ly" value="海景房详情页-提交">     <!--报名来源 具体查看applyVerify.js文件中source 标识说明-->
                    <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->
                    <input type="text" name="mobile" placeholder="请输入您的手机号码" class="regist-input3 mt15" style="margin-top: 15px;">
        <div class="h30"></div>  
                    <input type="button" value="提交" class="m_Find_submit sign-btn3 apply_submit regist-submit">
               
            </form>
      
    </div>
</div>
<?php include("../bottom.php");?>
<script>
	function openbox(title,url,w,h){
		// alert(title);
		if (title == null || title == '') {
			title=false;
		};
		if (url == null || url == '') {
			url="404.html";
		};
		if (w == null || w == '') {
			w=800;
		};
		if (h == null || h == '') {
			h=($(window).height() - 50);
		};
		layer.open({
			type: 2,
			offset: '5%',
			area: [w,h],
			fix: false, //不固定
			maxmin: true,
			resize : true,
			shade:0.4,
			title: title,
			maxmin : false,
			content: url
		});
	}
	$(document).on("click", ".imglist li dt", function() {
		//alert(111);

                     var t = $(this).parents("li").attr("houseTypeId");
                     //   console.log(t);

                           layer.open({
                                type: 2,
                                title: "户型详情",
                                closeBtn: 1,
                                shade: .3,
                                area: ["80%", "560px"],
                                offset: "auto",
                                shift: 2,
                                resize: !1,
                                content: "/bieshu/hx_"+t

                            })

                       

                });
				
	$(document).on("click", ".picture dl", function() {

                    var t = $(this).attr("fileType");

                    var houseid = $(this).attr("data-id");


                        layer.open({

                            type: 2,

                            title: !1,

                            closeBtn: 1,

                            shade: .3,

                            area: ["1100px", "610px"],

                            offset: "auto",

                            shift: 2,

                            resize: !1,

                            content: "/bieshu/pic_"+houseid+'_'+t

                        })


                });
	 $(document).on("click", ".album", function() {

       var t = $(".picture dl").attr("fileType");
        var houseid = $(".picture dl").attr("data-id");

        layer.open({

            type: 2,

            title: !1,

            closeBtn: 1,

            shade: .3,

            area: ["1100px", "610px"],

            offset: "auto",

            shift: 2,

            resize: !1,

            content: "/hjf/pic_"+houseid+'_'+t

        })


    });
	
	 $(document).on("click", ".lookMap", function() {
         layer.open({

            type: 2,

            title: !1,

            closeBtn: 1,

            shade: .3,

            area: ["1100px", "410px"],

            offset: "auto",

            shift: 2,

            resize: !1,

            content: "map.php?lpid=<?php echo $lpid;?>"

        })


    });

    $(document).on("click", ".album", function() {

        var t = $(".picture dl").attr("fileType");
        var houseid = $(".picture dl").attr("data-id");

        layer.open({

            type: 2,

            title: !1,

            closeBtn: 1,

            shade: .3,

            area: ["1100px", "610px"],

            offset: "auto",

            shift: 2,

            resize: !1,

            content: "/hjf/pic_"+houseid+'_'+t

        })


    });

    $(document).on("click", ".lookMap", function() {
        layer.open({

            type: 2,

            title: !1,

            closeBtn: 1,

            shade: .3,

            area: ["1100px", "410px"],

            offset: "auto",

            shift: 2,

            resize: !1,

            content: "map.php?lpid=<?php echo $lpid;?>"

        })


    });
</script>
</body>
</html>
