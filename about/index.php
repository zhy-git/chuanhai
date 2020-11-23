<!DOCTYPE html>
<html lang="zh-cn">
<?php
require("../conn/conn.php");
require("../function.php");
$lm=6666;

$id = isset($_GET['id']) ? intval($_GET['id']) : 2;
if($id<>""){
	$rows=$mysql->query("SELECT * FROM `web_srot` WHERE `id`='{$id}'");
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
<title><?php echo $infos['title'];?>_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>">
  	<link rel="shortcut icon" href="../image/favicon.ico" />
	<link rel="stylesheet" href="/public/static/home/css/css.css">  
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
<link href="/css/public.css" rel="stylesheet">
    <link href="/css/alert.css" rel="stylesheet">
    <link href="/css/lp_list.css" rel="stylesheet">
    <style>
	
.houses_index_04 {
	MARGIN-TOP: 10px; WIDTH: 1200px; margin:0 auto;
}
.houses_index_14_l {
	WIDTH: 950px; FLOAT: left
}
.houses_index_14_r {
	WIDTH: 230px; FLOAT: right
}
.about {
	PADDING-BOTTOM: 20px; LINE-HEIGHT: 28px; PADDING-LEFT: 20px; WIDTH: 910px; PADDING-RIGHT: 20px; BACKGROUND: #ffffff; FLOAT: left; PADDING-TOP: 20px; font-size:14px
}
.about_nav {
	PADDING-BOTTOM: 10px; PADDING-LEFT: 10px; WIDTH: 210px; PADDING-RIGHT: 10px; BACKGROUND: #ffffff; FLOAT: left; PADDING-TOP: 10px
}
.about_nav LI {
	TEXT-ALIGN: center; LINE-HEIGHT: 40px; WIDTH: 210px; MARGIN-BOTTOM: 10px; BACKGROUND: #f6f6f6; FLOAT: left; HEIGHT: 40px; COLOR: #ffffff
}
.about_nav LI {
	COLOR: #00A0EA
}
.about_nav LI A {
	FONT-FAMILY: "Microsoft Yahei"; COLOR: #666666; FONT-SIZE: 16px; FONT-WEIGHT: normal
}
.about_nav LI A:hover {
	COLOR: #00A0EA
}
.about_nav LI A.fu_ersdh {
	COLOR: #00A0EA
}
	</style>
<!--上公用-->
</head>
<body>
<?php include("../top.php");?>
<div class="m_wy_position c">
    <span>您的位置：</span>
    <a href="/">首页&gt;</a>
    <a href="javascript:;">关于我们</a>
</div>
<!---->
<div class="main">
    <div class="houses_index_04">
    	<div class="houses_index_14_l">
        	<div class="about"><?php echo $infos['content'];?>
            <?php
            if($infos['zbx']<>""){
			?>
            <p style="height:30px;"></p>
                <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
            	<style type="text/css">
            body, html {width: 100%;height: 100%;margin:0;font-family:"微软雅黑";}
            #allmap{width:100%;height:410px;}
            p{margin-left:5px; font-size:14px;}
        </style>
        <script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=Xbz0agOQpdcCl91FSUYEsoHB7jpL1zSo"></script>
            <div id="allmap"></div>
			<script type="text/javascript">
			// 百度地图API功能
			var map = new BMap.Map("allmap");
			var point = new BMap.Point(<?php echo $infos['zbx'];?>,<?php echo $infos['zby'];?>);
			var marker = new BMap.Marker(point);  // 创建标注
			map.addOverlay(marker);              // 将标注添加到地图中
			map.centerAndZoom(point, 12);
			var top_left_control = new BMap.ScaleControl({anchor: BMAP_ANCHOR_TOP_LEFT});// 左上角，添加比例尺
			var top_left_navigation = new BMap.NavigationControl();  //左上角，添加默认缩放平移控件
			var top_right_navigation = new BMap.NavigationControl({anchor: BMAP_ANCHOR_TOP_RIGHT, type: BMAP_NAVIGATION_CONTROL_SMALL}); //右上角，仅包含平移和缩放按钮
				map.addControl(top_left_control);        
				map.addControl(top_left_navigation);     
				//map.addControl(top_right_navigation);    
			//map.enableScrollWheelZoom();   //启用滚轮放大缩小，默认禁用
			map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用
			var opts = {
			  title : "<font style='color:#F90;font-size:14px'><?php echo $rsconfig['company_name'];?></font>" , // 信息窗口标题
			  enableMessage:false,//设置允许信息窗发送短息
			}
			var infoWindow = new BMap.InfoWindow("<?php echo $infos['map'];?>", opts);  // 创建信息窗口对象 
				map.openInfoWindow(infoWindow,point); //开启信息窗口
				marker.addEventListener("click", function(){          
		map.openInfoWindow(infoWindow,point); //开启信息窗口
	});
		</script>
        <?php 
		}?>
            </div>
        </div>
        <div class="houses_index_14_r">
            <div class="about_nav">
            	<ul>
                <?php 
		$row = $mysql->query("select * from `web_srot` where `pid`='1' and `startus` = '1' order by px asc limit 0,10");
		foreach($row as $k=>$list){
		?>
       <li><a href="/about/<?php echo $list['id'];?>.html" <?php if($id==$list['id']){echo 'class="fu_ersdh"';}?> ><?php echo $list['title'];?></a></li>
        <?php
		}
		?>
         </ul>
            </div>
        </div>
    </div>
    <!--华丽的分割线-->
    <div class="clear"></div>
    
</div>
<div class="clear mt20"></div>
<?php include("../bottom.php");?>
</body>
</html>
<?php include("../sq.php");?>