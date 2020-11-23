<!DOCTYPE html>
<html class="no-js">
	
	<?php
require("../../conn/conn.php");
require("../function.php");

$key=$_GET['key'];
$flagjw=$_GET['flagjw'];
$flaghx=$_GET['flaghx'];
$flagts=$_GET['flagts'];
$flaglb=$_GET['flaglb'];
$flagzx=$_GET['flagzx'];
$flaglp=$_GET['flaglp'];
$city_id=$_GET['city_id'];
?>	
	
	<head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
<title>二手房<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>">
    
    <!--<link rel="stylesheet" type="text/css" href="mobile/xh/css/house.css">-->
    <link type="text/css" rel="stylesheet" href="index_files/demo.css">
     <link rel="stylesheet" type="text/css" href="index_files/newhouse_nav.css">
    <link rel="stylesheet" href="index_files/footer.css">
     <link rel="stylesheet" type="text/css" href="../css/shuxing.css"/> <!--网站通用属性-->
	<link rel="stylesheet" type="text/css" href="../css/bottom-css.css"/><!--网站底部样式-->
	<link rel="stylesheet" type="text/css" href="../css/top-css.css"/><!--网站顶部样式-->
    <link type="text/css" rel="stylesheet" href="index_files/mobile_footer.css">
    <link rel="stylesheet" type="text/css" href="index_files/photo_suspension.css">
    <link rel="stylesheet" href="index_files/nav.css">
     <link rel="stylesheet" type="text/css" href="../css/style.css"/>
    <link href="master.css" rel="stylesheet" />
    <link href="main.min.css" rel="stylesheet" />
    <link href="main.min2.css" rel="stylesheet" />
     
     <script src="../js/jquery-1.js"></script>
	<script src="../js/layer.js"></script>
       <script src="../js/jquery.js"></script>
    <script src="index_files/jquery-1.js"></script>
    <script src="index_files/demo.js"></script>
    <script src="index_files/fontSize.js"></script>
    <link rel="stylesheet" type="text/css" href="index_files/uiAlertView-1.css">
    <script src="index_files/jquery.js"></script>
<script type="text/javascript" src="jquery.yomitt.js"></script>
    
    
    <!-- 微信分享 -->
    <script src="index_files/jweixin-1.js"></script>
    <script src="index_files/wxshare.js"></script>
    <script src="index_files/wxconfig.js"></script>
    <script type="text/javascript">
        $(function(){
            $(document).click(function(e) {
                if(e.target.id != 'b1' && e.target.id != 'b2' && e.target.id != 'b3' && e.target.id != 'b4'  && e.target.className != 'area' && e.target.className != 'link' && e.target.className != 'ndown_box'){
                    $('.zlz').removeClass('grade-w-roll');
                    $('.Regional').removeClass('current');
                    $('.Sort').removeClass('current');
                    $('.Brand').removeClass('current');
                    $('.meishi').removeClass('current');
                }
            });
        });
        function  block(){
            document.getElementById('gradet').style.display="block";
        }
    </script>
    <link rel="stylesheet" type="text/css" href="index_files/sale.css">
    <script type="text/javascript" src="index_files/jquery-2.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#sear_ch").keydown(function (event) {
                if (event.keyCode == 13) {
                    search();
                    $("#sear_ch").focus();
                    setTimeout(function () { $("#sear_ch").trigger("blur"); },500);
                }
            });
        });
    </script>
    <script type="text/javascript">
        /*li标签选中时添加样式*/
        $(document).ready(function(){
            $("#hain").click(function(){
                $(".ndown_box").css("color","#e46713");
                this.style.background = '#eeeeee'
            });
        });
    </script>
</head>
<body>
<!--头部开始-->
   <?php require("../top.php");?>		
<!--头部结束-->
<div class="m_content">
    	
        <style>
            .nadd dt{height: 26px;}
            .nadd dd b{ top:24px;}
            </style>
        
        
        <div style="margin-top: 0px;" class="pagePanel">
        <!--楼盘动态：开始-->
        <div style="padding: 10px" id="pageNews" class="pageNews">
            <h3 class="mt" style="display:none;">11</h3>
          <div style="background-color: #f7f7f7;" class="newbox nadd" id="slider1">
            <ul class="bigbox">
            <li class="li_list">
         <?php
$key=$_GET['key'];
$pid=15;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$sql="WHERE `pid`='{$pid}' ";

if($key!=""){
	$sql.=" and `title` like '%{$key}%'";
	}
//print_r($_GET);
//echo $page;
if($page==0){
	$page=1;
	}

$page_num =10;
$offset = ($page-1)*$page_num;
$rsc = $mysql->query("select count(*) as count from `web_content` {$sql}");// WHERE `adminid`='{$_SESSION['admin_id']}'
//echo "select count(*) as count from `oa_client` {$sql}";
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/$page_num);
$row = $mysql->query("select * from `web_content` {$sql} order by id desc limit $offset,$page_num");// WHERE `adminid`='{$_SESSION['admin_id']}'
//echo "select * from `oa_client` {$sql} order by id desc limit $offset,$page_num";
if($result["total"]==0){
	echo "<li align=center style='padding:10px;font-size:15px;border-bottom:dashed #ccc 1px'><h1>很抱歉,没有找到您搜索的结果。</h1></li>";
	}else{
		foreach($row as $list){
			$url='show.php?id='.$list['id'];
?>
             <div class="pic_list">
                    <a href="<?php echo $url;?>" class="pics">
                    	<img src="<?php echo $site;?><?php echo $list['img'];?>" width="100" height="80" alt="<?php echo $list['title'];?>">
                    	
                    	
                    </a>
                    
                    <dl>
                        <dt><em style="color: #f79e35;">[活动]</em><a href="<?php echo $url;?>"><?php echo $list['title'];?></a></dt>
                        <dd><?php echo mb_substr(strip_tags($list['djyh']),0,22,"utf-8"); ?>...</dd>
                        <dd class="ellipsis">
                        	<i></i><?php echo cityname($list['city_id']);?>
                        		
                        	</dd>
                        <dd class="ellipsis"><label>已有<span style="color: #e73940;float: none;"><?php echo $list['zhs'];?></span>人报名</label></dd>
                    </dl>
                    
                    <div style="position: absolute;left: 0px;bottom:10px;background-color: rgba(176,25,31,0.7);z-index: 9;padding: 2px 10px;border-radius: 0px 50px 50px 0px">
                    	<span style="background: url( images/lico-1112.png) no-repeat 0px 4px;background-size: 70%;width: 20px; height: 20px; display: block;float: left"></span>
                    	<p style="color: #fff;float: left;font-size: 12px;" class="yomibox" data="<?php echo $list['kptime'];?>"></p>
                    </div>
                    
                    <div class="rng" onClick="sdfds(<?php echo $list['id'];?>,<?php echo $list['zhs'];?>)" style="position: absolute; right: 5px; bottom: 12px">
                    	<div style="padding: 5px 10px;border-radius: 5px;color: #fff;background-color: #e73940;font-size: 0.5rem;">立即报名</div>
                    </div>
                    <!--表单-->
                    
                </div>
                
                
<?php
		}
		}
  ?>           </li>
    	</ul>
    	
		<div class="clear"></div>
	</div>
              <div class="clear p_b10"></div>
		<div class="digg">
                <?php
   // $pagess="<span class='form_page'>{$page}/{$total} 页   {$result['total']} 条记录";
		$pagess.="<a class='pn' href='1' >首页</a>";
		if($page>1){ $pagess.="<a class='page_num' href='?page=".($page-1)."'>&lt;</a>";}
		if($total>=4){
			
			for ($i=1; $i<=$total; $i++) {
				if($page<$i+3 && $page>$i-3){
						if($page==$i){ $pagess.="<span >{$i}</span>";}else{$pagess.="<a class='page_num' href='{$i}'>{$i}</a>";}
                    }
				}
			}else{
					for ($i=1; $i<=$total; $i++) {
						if($page==$i){ $pagess.="<span >{$i}</span>";}else{$pagess.="<a class='page_num' href='{$i}'>{$i}</a>";}
                    }
				}
			if($page<$total){$pagess.="<a class='page_num' href='".($page+1)."'>&gt;</a>";}
			$pagess.="<a class='pn' href='{$total}' >尾页</a>";
		echo $pagess;
	?>
            </div>

        </div>
        <!--楼盘动态：结束-->
       
    </div>
    
    	
		<div class="clear"></div>
	</div>
    <!--图标悬浮开始-->
   
<script>
    $(document).ready(function(){
        var use = '';
        if(!use){
            use = "rXs2VIzXrH805S7KIDicsAqCYtCVpR";
        }
        msgber(use);
        window.setInterval("msgber('"+use+"');", 2000);
    })
    function msgber(use){
        $.ajax({
            url: "my.php",
            type: "post",
            dataType: 'json',
            data: {'aj':'msgber','use':use},
            success:function(data){
            if(data.data>0){
                $("#photo_xf").html('<img class="photo_xf" src="image/new_image/msg3.png"/>');
            }else{
                $("#photo_xf").html('<img class="photo_xf" src="image/new_image/msg2.png"/>');
            }
        }
    })
    }
</script>    <!--图标悬浮结束-->
    <!--底部开始-->
    <!--<div id="ver-footer">
    <div class="footer_list">
        <a href="http://www.syfff.com/mobile/index.php?moduleid=6">新房 </a>
        <a href="http://www.syfff.com/mobile/index.php?moduleid=5">二手房</a>
        <a href="http://www.syfff.com/mobile/index.php?moduleid=7">租房</a>
        <a href="http://www.syfff.com/mobile/index.php?moduleid=8">资讯</a>
        <script src="index_files/z_stat.php" language="JavaScript"></script><script src="index_files/core.php" charset="utf-8" type="text/javascript"></script><a href="http://www.cnzz.com/stat/website.php?web_id=1260422065" target="_blank" title="站长统计">站长统计</a>
    </div>
    <p>
<span>
 Copyright © 2008-2017 syfff.com All Rights Reserved.</span>
    </p>
</div>    <!--底部结束-->
<a href="javascript:;" id="hddb" title="回到顶部" style="display: none;"></a>
<script>
    window.wxfing['title'] = "找二手房，来卓亚房产网，卓亚帮你忙！";
    window.wxfing['desc'] = "卓亚房产网提供全海南及三亚最新二手房信息，数千名经纪人，海量二手房源随时更新";
    window.wxfing['thumb'] = "http://www.syfff.com/mobile/image/new_image/share.jpg";
    window.wxfing['timestamp'] = "1527319466";
    window.wxfing['nonceStr'] = "ZmGnReRfSsTxpbFs";
    window.wxfing['signature'] = "78a1c5870b080d94f3d55cb28dc86bdbe6b08a4e";
    share();
</script>
<script>
    var moduleid = 5;
    var i = 1;
    $(function() {
        $(window).scroll(function () {
            var bot = 0; //bot是底部距离的高度
            if ((bot + $(window).scrollTop()) >= ($(document).height() - $(window).height())) {
                var areaid = $("#onarea").val();
                var price = $("#onprice").val();
                var cat = $("#oncat").val();
                var mianji = $("#onmianji").val();
                var key = $("#sear_ch").val();
                $.ajax({
                    type:'post',
                    url: "",
                    data:{'areaid':areaid,'price':price,'cat':cat,'mianji':mianji,'key':key,'moduleid':moduleid,'newset':i},
                    dataType:"json",
                    beforeSend:function(XMLHttpRequest){
                        $("#loading").html("<div class='loading'>loading...</div>");
                    },
                    success:function(data){
                        $("#loading").empty();
                        if(data.status == true){
                            if(data.data != ''){
                                var rs = data.data.lists;
                                var towardlist = data.data.toward;
                                str = '';
                                for(var j=0;j<rs.length;j++){
                                    str = str+"<a href='"+rs[j].linkurl+"'><img src='";
                                    if(rs[j].thumb){
                                        str = str+rs[j].thumb;
                                    }else{
                                        str = str+"static/img/nopic-60.png";
                                    }
                                    str = str+"'><h5>"+rs[j].title+"</h5><p class='renlist_p' style=' margin-top: 0.15rem;'><span class='fr_zt'>";
                                    if(rs[j].room){
                                        str = str+rs[j].room+"室";
                                    }
                                    if(rs[j].hall){
                                        str = str+rs[j].hall+"厅";
                                    }
                                    if(rs[j].toilet){
                                        str = str+rs[j].toilet+"卫&nbsp;|&nbsp;"+rs[j].houseearm+"㎡";
                                    }
                                    if(rs[j].toward){
                                        str = str+"&nbsp;|&nbsp;"+towardlist[j];
                                    }
                                    str = str+"&nbsp;<span class='fr_red'><span class='fr_wed' style='font-weight: bold;'>";
                                    if(rs[j].price){
                                        str = str+rs[j].price+"万";
                                    }else{
                                        str = str+"面议";
                                    }
                                    str = str+"</span></span></span><p class='renlist_p2' style='margin-top: -0.1rem;'><span class='fr_zt'>"+rs[j].housename+"</span></p><p class='renlist_p3'  style=' margin-top: -0.05rem;'><span class='gray'>"+rs[j].monly+"</span></p></a>";
                                }
                                i = i+1;
                                $("#h_l").append(str);
                            }else{
                                if($("#havenot").length>0){
                                    return;
                                }else{
                                    $("#h_l").append("<div class='data_none' id='havenot'><span>数据加载完毕，没有数据了</span></div>");
                                }
                            }
                        }
                    }
                })
            }
        })
    })
</script>
<script>
    function block(areaid){
        var moduleid = 5;
        $.ajax({
            url: "index.php",
            type: "post",
            dataType: 'json',
            data: {'parentid':areaid, 'moduleid':moduleid}
        }).done(function(data) {
            if(data.status == true){
                var rs = data.data;
                str = '';
                for(var i=0;i<rs.length;i++){
                    str = str+"<li class='area' id='gradetSS'><a onclick='onarea("+rs[i].areaid+")' class='ar' id='a_"+rs[i].areaid+"'>"+rs[i].areaname+"</a></li>";
                }
                $("#gradet").append(str);
            }
        })
        document.getElementById('gradet').style.display="block";
    }
    function onarea(areaid){
        $(".link").attr("class", "ar");
        $("#a_"+areaid).removeClass('ar');
        $("#a_"+areaid).addClass('link');
        $("#a_"+areaid).addClass('grou_bj');
        var area = areaid;
        var price = $("#onprice").val();
        var mianji = $("#onmianji").val();
        var cat = $("#oncat").val();
        var key = $("#sear_ch").val();
        pub(area,price,mianji,cat,key);
        $("#onarea").val(areaid);
    }
    function onprice(price){
        $("a").removeClass("p_n");
        $("#p_"+price).addClass('p_n');
        var area = $("#onarea").val();
        var price = price;
        var mianji = $("#onmianji").val();
        var cat = $("#oncat").val();
        var key = $("#sear_ch").val();
        pub(area,price,mianji,cat,key);
        $("#onprice").val(price);
    }
    function oncat(cat){
        $("a").removeClass("c_n");
        $("#c_"+cat).addClass('c_n');
        var area = $("#onarea").val();
        var price = $("#onprice").val();
        var mianji = $("#onmianji").val();
        var cat = cat;
        var key = $("#sear_ch").val();
        pub(area,price,mianji,cat,key);
        $("#oncat").val(cat);
    }
    function onmianji(mianji){
        $("a").removeClass("t_n");
        $("#t_"+mianji).addClass('t_n');
        var area = $("#onarea").val();
        var price = $("#onprice").val();
        var mianji = mianji;
        var cat = $("#oncat").val();
        var key = $("#sear_ch").val();
        pub(area,price,mianji,cat,key);
        $("#onmianji").val(mianji);
    }
    //收索
    function search(){
        var key = $("#sear_ch").val();
        pub('','','','',key);
        $("#key").val(key);
    }
    //公共方法
    function pub(areaid,price,mianji,cat,key){
        var moduleid = 5;
        $.ajax({
            url: "index.php",
            type: "post",
            dataType: 'json',
            data: {'areaid':areaid,'price':price,'mianji':mianji,'cat':cat,'key':key, 'moduleid':moduleid,'fm':'aj'}
        }).done(function(data) {
            if(data.status == true){
                if(data.data.onarea){
                    $("#b1").text(data.data.onarea);
                }
                if(data.data.range){
                    $("#b2").text(data.data.range);
                }
                if(data.data.mianji){
                    $("#b4").text(data.data.mianji);
                }
                if(data.data.cat){
                    var hxarr =  new Array('一室', '二室', '三室', '四室', '五室以上');
                    var hx = data.data.cat - 1;
                    $("#b3").text(hxarr[hx]);
                }
                if(data.data != ''){
                    var rs = data.data.lists;
                    var towardlist = data.data.toward;
                    str = '';
                    for(var j=0;j<rs.length;j++){
                        str = str+"<a href='"+rs[j].linkurl+"'><img src='";
                        if(rs[j].thumb){
                            str = str+rs[j].thumb;
                        }else{
                            str = str+"static/img/nopic-60.png";
                        }
                        str = str+"'><h5>"+rs[j].title+"</h5><p><span class='fr_zt'>";
                        if(rs[j].room){
                            str = str+rs[j].room+"室";
                        }
                        if(rs[j].hall){
                            str = str+rs[j].hall+"厅";
                        }
                        if(rs[j].toilet){
                            str = str+rs[j].toilet+"卫&nbsp;|&nbsp;"+rs[j].houseearm+"㎡";
                        }
                        if(rs[j].toward){
                            str = str+"&nbsp;|&nbsp;"+towardlist[j];
                        }
                        str = str+"&nbsp;<span class='fr_red'><span class='fr_wed' style='font-weight: bold;'>";
                        if(rs[j].price){
                            str = str+rs[j].price+"万";
                        }else{
                            str = str+"面议";
                        }
                        str = str+"</span></span></span><p style='margin-top: -0.15rem;'><span class='fr_zt'>"+rs[j].housename+"</span></p><p ><span class='gray'>"+rs[j].monly+"</span></p></a>";
                    }
                    $('.zlz').removeClass('grade-w-roll');
                    $("#h_l").html(str);
                }else{
                    var json = {
                        msg:"没有房源",
                    };
                    $.alertView(json);
                    return false;
                }
            }
        })
    }
</script>
<script type="text/javascript">
    function cssClear() {
        $('#sear_ch').val('');
    }
</script>


<?php include("../bottom.php");?>
	
	
	<!--降价通知弹窗-->
	<style type="text/css">
		.liji-box{background-color:rgba(0,0,0,0.5);width: 100%;height: 100%;position: fixed;top: 0px;left: 0px;z-index: 99999;display: none;}
		.liji-box .liji{width: 80%;background-color: #fff;position: absolute;top: 25%;left: 10%;border-radius: 10px;}
		.liji-box .liji .liji-ul{position: relative;}
		.liji-box .liji .liji-ul .lj-x{position: absolute;right: 10px;top: 10px;}
		.liji-box .liji .liji-ul .lj-b img{width: 100%;}
		.liji-box .liji .liji-form{padding: 10px;}	
		.liji-box .liji .liji-form h2{text-align: center;font-size: 0.8rem;color: #FA5A58;}		
		.liji-box .liji .liji-form p{text-align: center;font-size: 0.5rem;color: #333;line-height: 1rem;}	
		.liji-box .liji .liji-form input{width: 80%;margin:2% 10%;height: 1.2rem;line-height: 1.2rem;color: #999999;border: solid 1px #ececec;text-indent: 10px;}
		.liji-box .liji .liji-form button{width: 80%;background-color: #3CA3FF;color: #fff;height: 1.2rem;text-align: center;line-height: 1.2rem;border: none;margin:2% 10% 10% 10%;}
	</style>
	
	<div class="liji-box">
			<div class="liji">
				<ul class="liji-ul">
					<li class="lj-x">
						<img src="<?php echo $sitem;?>images/kptz_2.png"/>
					</li>
					<li class="lj-b">
						<img src="<?php echo $sitem;?>images/kptz_211.png"/>
					</li>
				</ul>
				
				<form class="liji-form" onSubmit="return checkLm(this);">
					<h2>立即报名</h2>
					<p>将海南楼盘最新开盘信息以及最新降价、优惠活动信息第一时间通知您</p>
					<input  name="utel" placeholder="请输入您的姓名">
					<input  name="utel" placeholder="请输入您的电话号码">
					<button type="button">提交</button>
				</form>
			</div>
	</div>
	
	<script type="text/javascript">
		$(function () {
			$('.pic_list .rng').click(function () {
				$('.liji-box').show();
			});
			$('.liji-box .liji .liji-ul .lj-x').click(function () {
				$('.liji-box').hide();
			});
		})
	</script>
	
	
	
	
	
	
	
	
	
</body></html>