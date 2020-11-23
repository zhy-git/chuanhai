<html xmlns="http://www.w3.org/1999/xhtml">
<?php
require("../../conn/conn.php");
require("../function.php");
$lpid=$_GET['lpid'];
if($lpid<>""){
	$rows=$mysql->query("SELECT * FROM `web_content` WHERE `id`='{$lpid}'");
	$infos=$rows[0];
	 if($infos==false)
	  {
		echo "已经出错!";
		exit;
	   }
	$click=$infos['click']+1;
	$mysql->execute("UPDATE `web_content` SET `click`='".$click."' where `id`='".$lpid."'");
	}
	$pricess='';
?>
<?php if($infos['all_price']==0){
	if($infos['jj_price']==0){
		$pricess='待定';
		}else{
			$pricess=$infos['jj_price'].'元/㎡';
			}
			 }else{
				  $pricess=$infos['all_price'].'万/套';
				   }?>
<head>
<meta name="applicable-device" content="mobile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-Control" content="no-cache">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no, email=no">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="320">
<meta name="screen-orientation" content="portrait">
<meta name="x5-orientation" content="portrait">
<meta name="full-screen" content="yes">
<meta name="x5-fullscreen" content="true">
<meta name="browsermode" content="application">
<meta name="x5-page-mode" content="app">
<meta name="msapplication-tap-highlight" content="no">
<link href="/public/static/phone/css/my.css" rel="stylesheet">
<link href="/public/static/phone/css/module-new.css" rel="stylesheet">
<link href="/public/static/phone/css/lp/house-detail.css" rel="stylesheet">
<script src="/public/static/phone/js/flexible.js" ></script>
<link href="/public/static/phone/css/house-detail-map.css" rel="stylesheet">
<script  src="/public/static/libs/jquery/1.x/jquery.min.js" type="text/javascript"></script>
<script src="/public/static/common/js/jquery.form.js"></script>    
<script src="/public/static/libs/layer/mobile/layer.js"></script> 
<title><?php echo $infos['title'];?>开盘信息_资料介绍_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>">   
<script type="text/javascript">
window.onscroll=function(){ 
    var t=document.documentElement.scrollTop||document.body.scrollTop;  
    var htop2=document.getElementById("htop2"); 
    if(t>= 50){ 
        htop2.className = "htop2_1";
    }else{
        htop2.className = "htop2";
    } 
}
</script>
<style>
body{background: #F4f4f4;}
a:hover{text-decoration:none;}
.box{width:98%;height:auto!important;margin:auto;overflow:hidden}
.wraper{padding:0;background:#e6e6e6;clear:both}
.box{min-height:0}
.wrap {padding: 10px;}
.nh{background: #fff;}
.photo-nav {height: 1.2rem;overflow: hidden}
.photo-nav-wrap {width: 100%;overflow: hidden}
.photo-nav-wrap li {height: 1.2rem;line-height:1.2rem;overflow: hidden;float: left;margin-right: .6rem}
.photo-nav-wrap .last-wrap {margin-right: 0}
.photo-nav-wrap li a {font-size: .34rem}
.div2 {width:100%;padding: 0 .32rem;bottom: }
#div2{padding: 0 .32rem;}
.div2_1{position:fixed;width:100%;z-index:999;top:0px;background: #F4f4f4;padding: 0 .32rem;_position:absolute;_bottom:auto;_top:expression(eval(document.documentElement.scrollTop));}
.nh .wrap .nw1 li{float:left;width:100%;line-height:30px;border-bottom:1px solid #eaeaea;font-size:.4rem}
.wrap dd p {line-height: 30px;border-bottom: 1px solid #eaeaea;font-size: 0.4rem;}
.blank10{clear:both;height:10px;line-height:10px;font-size:1px}
.titx,.infosx dt,.nh dt{font-size: .5rem}
.map-menu{width:100%;height: 1rem;bottom:-20px;position: absolute;}
.map-menu ul{width: 100%;background-color: #fff;height: 100%;box-shadow: 0 0 .25rem #666;}
.map-menu ul li:first-child{margin-left: 2%;}
.map-menu ul li:last-child{margin-right: 2%;}
.map-menu ul li{width: 16%;height: 100%;float: left;}
.map-menu ul li a{display: block;height: 100%;text-align: center;color: #666;font-size: .3rem; padding-top: .15rem;;}
.map-menu ul li a i{width: .5rem;height: .5rem;display: block;background: url(/public/static/phone/image/icons/map_icons.png) .075rem 0 no-repeat;background-size: 8rem auto;margin-left:auto;margin-right: auto;}
.map-menu ul li a i.ico2{width:.9rem;background-position: -1.3rem 0;}
.map-menu ul li a i.ico3{width:.625rem;background-position: -3.0rem 0;}
.map-menu ul li a i.ico4{width:.8rem;background-position: -4.4rem 0;}
.map-menu ul li a i.ico5{width:.85rem;background-position: -5.9rem 0;}
.map-menu ul li a i.ico6{background-position: -7.6rem 0;}
.map-menu ul li.on a{color: #4da635;}
.map-menu ul li.on i.ico1{background-position:.1rem -.9rem;}
.map-menu ul li.on i.ico2{background-position: -1.25rem -.94rem;}
.map-menu ul li.on i.ico3{background-position: -2.95rem -.94rem;}
.map-menu ul li.on i.ico4{background-position: -4.4rem -.94rem;}
.map-menu ul li.on i.ico5{background-position: -5.9rem -.94rem;}
.map-menu ul li.on i.ico6{background-position: -7.6rem -.94rem;}
.map-menu ul li a em{display: block;margin-top:3px;}

.infobox{width: auto;padding: .2rem;border-radius: 5px;background-color: rgba(0,0,0,.8);position: relative;}
.infobox.info1{padding-right: 65px;}
.infobox:after{content: "";width: 0;height: 0;border-style: solid;border-width: 3px 5px;border-color: rgba(0,0,0,.8) transparent transparent transparent;display: block;position: absolute;bottom: -6px;left: 103px;}
.infobox p.tit{color: #fff;font-size: 13px;white-space:nowrap; text-overflow:ellipsis; overflow:hidden}
.infobox p.txt{width:100%;color: #fff;font-size: 12px;white-space:nowrap; text-overflow:ellipsis; overflow:hidden}
.infobox.info1 .zcbtn{width: 50px;height: 25px;text-align: center;line-height: 25px;background-color: #fff;border-radius: 3px;display: block;color: #4da635;font-size: 12px;position: absolute;top:12px;right: 8px;}
.infobox.info2 p.txt{color: rgba(255,255,255,.6);}
.poptips{width:100%;text-align: center;position: absolute;top:12rem;left: 0;}
.poptips p{display: inline-block;padding: .7rem 1rem;color: #fff;font-size: .75rem;background-color: rgba(0,0,0,.7);border-radius: 5px;}
.map img {width: auto;height: auto;}
</style>
    <!-- 电话转化监听 -->
  
<?php include("../sq2.php");?>            
</head>
<body style="height: auto;">
  <?php if($sitecityid==45){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14397&companyId=416&channelid=14397&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
  <?php if($sitecityid==43){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14396&companyId=416&channelid=14396&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
  <?php if($sitecityid==44){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14395&companyId=416&channelid=14395&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
  <?php if($sitecityid==42){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14394&companyId=416&channelid=14394&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
<!--nav begin-->
<div class="header" style="z-index: 999;position: fixed;top: 0;width: 100%">
    <div class="go-back">
       <a href="javascript:void(0)" onClick="history.back(-1)">
            <span class="ico ico-return">返回上一页</span>
        </a>
    </div>    
        <div class="city-change"><span class="text">周边配套</span> </div>
        
    <ul class="u-link" style="top: .3rem;right: .2rem;">
        <li class="link-home"><a href="javascript:;" id="navBtn" style="display: block;"><img src="/public/static/phone/image/nav/nav.png"></a></li>                 
    </ul>
</div>
<div style="height: 51px;"></div>
<div class="house-nav htop1">
	<div class=""  id="htop2">
		<?php include("house-nav.php");?>
    </div>   
</div>	  
	
<!--nav end-->  
<div class="wraper">	
		<div class="nh">
		<div class="info">
			<div class="wrap">
				<div class="titx" style="height:46px;"><a href="/m/loupan/<?php echo $lpid;?>.html" title="<?php echo $infos['title'];?>"><?php echo $infos['title'];?></a></div>
				<div class="nw1">
				   
				   <div class="map" id="map-box" data-id = "disable"></div>
				   
				</div>
				<div class="clear"></div>
			</div>
		</div>	
	</div>	
	<div class="blank10"></div>
	<div class="nh">
		<div class="wrap">
			<dl>
				<dt>项目配套</dt>
				<dd><?php echo $infos['xmpt'];?></dd>
			</dl>
		</div>
	</div>
	<div class="blank10"></div>
	<div class="nh">
		<div class="wrap">
			<dl>
				<dt>交通线路</dt>
				<dd><p><?php echo $infos['jtzk'];?></p></dd>
			</dl>
		</div>
	</div>
	</div>
<div class="blank10"></div>
<script type="text/javascript" src="http://api.map.baidu.com/api?v=1.2"></script>
<script type="text/javascript">
var optionsList = new Array("周边楼盘", "公交", "餐饮", "银行", "学校", "医院", "购物,超市");
	//定义自定义覆盖物的构造函数
	function SquareOverlay(center,offh,html,lng,lat){
		this._center=center;
		this._offH=offh;
		this._html=html;
		this._lng=lng;
		this._lat=lat;
		this._div;
	}
	//继承API的BMap.Overlay
	SquareOverlay.prototype=new BMap.Overlay();
	//实现初始化方法
	SquareOverlay.prototype.initialize=function(map){
		this._map=map;
		var div=document.createElement("div");
		div.className="labelBubble";
		div.style.position="absolute";
		div.innerHTML=this._html;
		map.getPanes().markerPane.appendChild(div);
		this._div=div;
		return div;
	}
	//实现绘制方法
	SquareOverlay.prototype.draw=function(){
		var position=this._map.pointToOverlayPixel(this._center);
		this._div.style.left=position.x-108+"px";
		this._div.style.top=position.y-this._offH+"px";
	}
	//实现显示方法
	SquareOverlay.prototype.toggle=function(){
		if (this._div){    
			if (this._div.style.display == ""){    
		    	this.hide();    
			}    
			else {    
		    	this.show();    
			}    
		 } 
	}

	// 百度地图API功能
	var map = new BMap.Map("map-box",{minZoom: 6, maxZoom: 14});
	map.addControl(new BMap.ScaleControl()); 													// 添加默认比例尺控件
	map.addControl(new BMap.ScaleControl({anchor: BMAP_ANCHOR_BOTTOM_LEFT})); 					// 左下
	map.addControl(new BMap.NavigationControl()); 	
    var lng = '<?php echo $infos['zbx'];?>';
	var lat = '<?php echo $infos['zby'];?>';
	var address = '<?php echo $infos['xmdz'];?>';
	var bname = '<?php echo $infos['title'];?>';
	var point=new BMap.Point(lng,lat);
	map.centerAndZoom(point, 15);
	/*自定义标注图标*/
	var customIcon=function(ico){
		var locIcon=new BMap.Icon("/public/static/phone/image/icons/"+ico,new BMap.Size(36,51),{
			imageSize:new BMap.Size(18,26),
			anchor:new BMap.Size(10,23)
		});
		return locIcon;
	}	
	// 添加标注
function addMarker(point, index){
  var myIcon = new BMap.Icon("/public/static/phone/image/icons/markers.png", new BMap.Size(23, 25), {
    offset: new BMap.Size(10, 25),
    imageOffset: new BMap.Size(0, 0 - (select_index-1) * 25)
  });
  var marker = new BMap.Marker(point, {icon: myIcon});
  map.addOverlay(marker);
  return marker;
}

	var marker=new BMap.Marker(point,{icon:customIcon('map_loc.png')});
	map.addOverlay(marker);
	/*初始化覆盖物*/
	var  info='<div class="infobox info1"><p class="tit">'+bname+'</p><p class="txt">'+address+'</p>';
	info+='</div>';
	var infoN='<div class="infobox"><p class="tit">'+bname+'</p><p class="txt">'+address+'</p></div>';
	var mySquare=new SquareOverlay(point,80,info,lng,lat);
	map.addOverlay(mySquare);
	//标注添加事件
	marker.addEventListener("click",function(){
		mySquare.toggle();
	});
var options = {
  onSearchComplete: function(results){
	status = 0;
    // 判断状态是否正确
    if (local.getStatus() == BMAP_STATUS_SUCCESS){
     	var selected = "";
    	openInfoWinFuns = [];
    	for (var i = 0; i < results.getCurrentNumPois(); i ++){
    		var marker = addMarker(results.getPoi(i).point,i);
    		var openInfoWinFun = addInfoWindow(marker,results.getPoi(i),i);
            openInfoWinFuns.push(openInfoWinFun);
            var selected = "";
            if(i == 0){
                selected = "background-color:#f0f0f0;";
                openInfoWinFun();
            }
    	}
    }else{
    	document.getElementById("results").innerHTML = '没有查到, 您可以尝试把地图放大之后再查找';
    }
  }
};
	
var local = new BMap.LocalSearch(map, options);	
	function select_around(i){
	select_index = i;
	switch(i){
	case 1:
		$(".clearfix li").eq(0).attr("class","on");
		$(".clearfix li").eq(1).attr("class","canyin");
		$(".clearfix li").eq(2).attr("class","yinhang");
		$(".clearfix li").eq(3).attr("class","xuexiao");
		$(".clearfix li").eq(4).attr("class","yiyuan");
		$(".clearfix li").eq(5).attr("class","gouwu");
		break;
	case 2:
		$(".clearfix li").eq(0).attr("class","gongjiao");
		$(".clearfix li").eq(1).attr("class","canyin n1");
		$(".clearfix li").eq(2).attr("class","on");
		$(".clearfix li").eq(3).attr("class","xuexiao");
		$(".clearfix li").eq(4).attr("class","yiyuan");
		$(".clearfix li").eq(5).attr("class","gouwu");
		break;
	case 3:
		$(".clearfix li").eq(0).attr("class","gongjiao");
		$(".clearfix li").eq(1).attr("class","canyin");
		$(".clearfix li").eq(2).attr("class","yinhang n2");
		$(".clearfix li").eq(3).attr("class","xuexiao");
		$(".clearfix li").eq(4).attr("class","on");
		$(".clearfix li").eq(5).attr("class","gouwu");
		break;
	case 4:
		$(".clearfix li").eq(0).attr("class","gongjiao");
		$(".clearfix li").eq(1).attr("class","on");
		$(".clearfix li").eq(2).attr("class","yinhang");
		$(".clearfix li").eq(3).attr("class","xuexiao n3");
		$(".clearfix li").eq(4).attr("class","yiyuan");
		$(".clearfix li").eq(5).attr("class","gouwu");
		break;	
	case 5:
		$(".clearfix li").eq(0).attr("class","gongjiao");
		$(".clearfix li").eq(1).attr("class","canyin");
		$(".clearfix li").eq(2).attr("class","yinhang");
		$(".clearfix li").eq(3).attr("class","xuexiao");
		$(".clearfix li").eq(4).attr("class","yiyuan n4");
		$(".clearfix li").eq(5).attr("class","on");
		break;	
	case 6:
		$(".clearfix li").eq(0).attr("class","gongjiao");
		$(".clearfix li").eq(1).attr("class","canyin");
		$(".clearfix li").eq(2).attr("class","yinhang");
		$(".clearfix li").eq(3).attr("class","on");
		$(".clearfix li").eq(4).attr("class","yiyuan");
		$(".clearfix li").eq(5).attr("class","gouwu n5");
		break;	
	default:
		break;
	}
	
	if(i>0){
		map.clearOverlays();
		init_buildDetail();
		local.searchInBounds(optionsList[i], map.getBounds());
	}else{
		map.clearOverlays();
		init_buildDetail();
	}
}
function init_buildDetail(){
	var marker=new BMap.Marker(point,{icon:customIcon('map_loc.png')});
	map.addOverlay(marker);
	var myCompOverlay = new SquareOverlay(point,80,info,lng,lat); 
	map.addOverlay(myCompOverlay);
	
}

// 添加信息窗口
function addInfoWindow(marker,poi,index){
    var maxLen = 10;
    var name = null;
    if(poi.type == BMAP_POI_TYPE_NORMAL){
        name = "地址：  "
    }else if(poi.type == BMAP_POI_TYPE_BUSSTOP){
        name = "公交：  "
    }else if(poi.type == BMAP_POI_TYPE_SUBSTOP){
        name = "地铁：  "
    }
    // infowindow的标题
    var infoWindowTitle = '<div style="font-weight:bold;color:#CE5521;font-size:14px">'+poi.title+'</div>';
    // infowindow的显示信息
    var infoWindowHtml = [];
    infoWindowHtml.push('<table cellspacing="0" style="table-layout:fixed;width:100%;font:12px arial,simsun,sans-serif"><tbody>');
    infoWindowHtml.push('<tr>');
    infoWindowHtml.push('<td style="vertical-align:top;line-height:16px;width:38px;white-space:nowrap;word-break:keep-all">' + name + '</td>');
    infoWindowHtml.push('<td style="vertical-align:top;line-height:16px">' + poi.address + ' </td>');
    infoWindowHtml.push('</tr>');

    if(poi.phoneNumber!=null && poi.phoneNumber!='undefined'){
	    infoWindowHtml.push('<tr>');
	    infoWindowHtml.push('<td style="vertical-align:top;line-height:16px;width:38px;white-space:nowrap;word-break:keep-all">电话：</td>');
	    infoWindowHtml.push('<td style="vertical-align:top;line-height:16px">' + poi.phoneNumber + ' </td>');
	    infoWindowHtml.push('</tr>');
	}

    infoWindowHtml.push('</tbody></table>');
    var infoWindow = new BMap.InfoWindow(infoWindowHtml.join(""),{title:infoWindowTitle,width:200});
    var openInfoWinFun = function(){
        marker.openInfoWindow(infoWindow);
        for(var cnt = 0; cnt < maxLen; cnt++){
            if(!document.getElementById("list" + cnt)){continue;}
            if(cnt == index){
                document.getElementById("list" + cnt).style.backgroundColor = "#f0f0f0";
            }else{
                document.getElementById("list" + cnt).style.backgroundColor = "#fff";
            }
        }
    }
    marker.addEventListener("click", openInfoWinFun);
    return openInfoWinFun;
}

</script> 
  
<script type="text/javascript">
$(function() {
	$("#navBtn").click(function(){
        toggleFixMenu('.nav');
    });
});
/*遮罩*/
function toggleFixMenu(obj) {
    $(".sFix").each(function (e) {
        var cls = $(this).attr('class');
        if (cls.indexOf(obj.replace('.', '')) >= 0) {
            $(obj).fadeToggle(0);
        } else {
            $(this).fadeOut(0);
        }
    });
}    
</script>
<div class="nav sFix">
	<?php include("../ny_nav.php");?>
    <div class="fixMask"></div>
</div>

<?php include("foot.php");?>
<style>

.nav{ position:fixed;left:0;right:0;top:1.3rem;padding:0px 0 0 0; max-width:480px; margin:0 auto;background: #fff}
</style>
    </div>
</body>
</html>
<?php include("../sq.php");?>


<div style="height: 66px;"></div> 