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
<title><?php echo $infos['title'];?>|<?php echo $infos['title'];?>售楼处：<?php echo telsee($infos['loupan_tel']);?> <?php echo $infos['title'];?>楼盘详情_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $infos['title'];?>楼盘详情,<?php if($infos['keyword']){echo $infos['keyword'];}else{echo $config['site_keyword'];}?>">
<meta name=description content="<?php echo $infos['title'];?>楼盘详情,<?php if($infos['desc']){echo $infos['desc'];}else{echo $config['site_desc'];}?>">
	<link rel="shortcut icon" href="../image/favicon.ico" />
    <link rel="stylesheet" href="../public/static/home/css/css.css">  
	<!--<link rel="stylesheet" href="../public/assets/css/style.css">-->
	<link rel="stylesheet" href="../public/static/home/css/home.css">
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
<LINK rel="stylesheet" type="text/css" href="/css/lightbox.css" />
<!-- 弹窗 -->
    <link rel="stylesheet" href="/public/static/css/common.css">
    <link rel="stylesheet" href="/public/static/css/show_fang.css?v=02">
<?php include("../sq2.php");?>
</head>
<body>
<!-- 悬标 -->
<?php include("../ad_xf.php");?>
<!-- 导航 -->
<?php include("../top.php");?>
<?php $navfl=1;?>

<div class="house-crumbs">
    <div class="crumbs">
            <span>您的位置：</span><a href="/" target="_blank">首页</a><em>&gt;</em>
            <a href="/loupan/" target="_blank">新房</a><em>&gt;</em>
            <?php echo $infos['title'];?>
    </div>
</div>
<script type="text/javascript" src="s_files/common.js"></script>
<script type="text/javascript" src="s_files/jquery-1.js"></script>
<script type="text/javascript" src="s_files/jquery_003.js"></script>
<script src="s_files/jquery_002.js"></script>
<script type="text/javascript" src="s_files/layer.js"></script> 
<script type="text/javascript" src="s_files/js.js"></script> 
<link rel="stylesheet" href="s_files/shapan.css"> 
<style type="text/css">
	.hangpai-main{position: fixed;width: 60px;top: 334px;right: 50%;margin-right: 609px;text-align: center;font-size: 14px;z-index: 999;}
	#saoma{position: fixed;width: 144px;top: 334px;left: 50%;margin-left: 609px;text-align: center;font-size: 14px;z-index: 999;background: #00A0EA;padding-top: 6px;padding-bottom: 6px;border-radius: 5px;}
	.lp-list-v2{height: 45px;}
	.inf_right a{height:22px;border:solid 1px #fff;font-size:12px;line-height:22px;color:#999;text-decoration:none;padding:0 6px 0 4px;margin-top:5px;overflow:hidden}
	.w345{width: 345px;}
	.inf_right a:hover {border: solid 1px #dbdbdb;}
	.ml10{margin-left: 10px;}
	.inf_right .com .lpt_icon {background-position: -103px -46px;}
	.inf_right .down_pri .lpt_icon {background-position: -164px -277px;}
	.ml5{margin-left: 5px;}
	.mt3{margin-top: 3px;}
	.lp-hqyh-l{border: 1px solid #ddd; height: 40px; width: 442px;border-radius:3px; background: url(/public/static/home/image/v2.0/lw.png) no-repeat 5px;overflow: hidden;}
	.lp-list-v2 .yh-btn{background:#00A0EA;border:0;color:#fff;font-size:16px;border-radius:3px;padding:10px 20px;line-height:41px}
	.lp-list-v2 .txt-1{line-height:40px;font-size:16px;padding-left:42px;color: #e85045}
	.house-crumbs{background: #f5f5f5;padding: 10px;}
	.house-crumbs .crumbs {margin:0 auto;color: #999;font-size: 14px!important;background: #F8F8F8;width: 1200px;padding: 0}
	.house-info-ul li{ margin-bottom: 15px; }
	.house-info-ul li .t{color: #999;}
	.house-tel-1 .txt{padding-left: 15px;}
	.house-tel-1 .txt h3{color: #00A0EA;font-weight: 700;font-size: 32px;}
	.house-tel-1 .btm-sm{font-size: 16px;color: #fff;display: inline-block;background: url(/public/static/home/image/v2.0/2.gif) no-repeat left 20px center #00A0EA;padding: 11px 20px;text-indent: 25px;vertical-align: middle;border-radius: 5px;background-size: 20px 20px;}
	.house-tag-2{background: #f7f7f7;width: 535px;padding: 8px;}
	.house-tag-ul-2{float: left;margin-left: 20px;}
	.house-tag-ul-2 li{float: left;width: 80px;margin-top: 2px;}
	.firstright .information,.information_li{width: 551px;}
	.information_li .log-code2{background: url(/public/static/home/image/v2.0/code2.png) no-repeat;padding: 6px 14px;cursor: pointer;}
	.house-zhiye{position: absolute;right: 1px;top: 9px;width: 100px;height: 90px;}

	.house-tj-main .tit {height: 62px;line-height: 62px;font-size: 20px;color: #000;font-weight: 700;}
	.house-tj-main .tit h3{font-weight: bold;}
	.house-tj-main .tj-ul-2{width: 1300px;}
	.house-tj-main .tj-ul-2 li{ float: left; border: 1px solid #e1e1e1;width: 571px; margin-right: 15px;}
	.house-tj-main .tj-ul-2 li .pic{width: 120px;height: 95px;float: left;border: 1px solid #ddd;}
	.house-tj-main .c li{padding: 10px;}
	.house-tj-main .tj-ul-2 .i-2{ padding-left: 20px;width: 300px;}
	.house-tj-main .tj-ul-2 .p-1 span{font-size: 16px;font-weight: bold;}
	.house-tj-main .tj-ul-2 .p-2{font-size: 16px;font-weight: bold;padding-top: 10px;}
	.house-tj-main .tj-ul-2 .p-3{padding-top: 10px;color: #999}
	.house-tj-main .tj-ul-2 .s-2{padding-left: 20px;}
	.house-com-k-2{border: 1px solid #e1e1e1;}
	.house-com-k-2 .tit{height: 52px;line-height: 52px;font-size: 20px;color: #000;padding-left: 10px;border-bottom: 1px solid #e4e4e4;font-weight: 700;width: 1150px;margin: 0 auto;position: relative;}
	.house-com-k-2 .c{width: 1160px;margin: 0 auto;}
	.house-com-k-2 .c .timeline{padding-left: 5px;margin-top: 5px;}
	.house-com-k-2 .c .timeline .inn {border-left: 1px solid #00A0EA;}
	.house-com-k-2 .c .feed-item{position: relative;}
	.house-com-k-2 .c .feed-item .circle {position: absolute;left:-5px;width: 8px;height: 8px;background-color: #999;border-radius: 50%;overflow: hidden;}
	.house-com-k-2 .c .feed-item .s{padding-left: 15px;}
	.house-com-k-2 .c .feed-item .s .title{position: absolute;top: -5px;}
	.house-com-k-2 .c .feed-item .s .content{color:#858585;font-size: 16px;}
	.house-com-k-2 .c .date{text-align: center;background: #f5f5f5;padding: 8px;}
	.house-com-k-2 .c .date strong{font-size: 18px;color: #666}
	.house-com-k-2 .c .date p{border-top: 1px solid #ddd;padding-top: 3px;}
	.house-com-k-2 .c .tet-2{padding-left: 15px;width: 745px;}
	.house-com-k-2 .c .news-list-2 dd{margin-bottom: 15px;border-bottom: 1px solid #ddd;padding-bottom: 10px;}
	.house-com-k-2 .c .news-list-2 dd a{display: block;}

	.house-kf-2 .timeline2{border-left: 1px solid #ddd;padding-left: 20px;}
	.house-kf-2 .item-list-2{position: relative;min-height: 45px;}
	.house-kf-2 .item-list-2 .circle {position: absolute;left: -25px;width: 8px;height:8px;background-color: #ddd;border-radius: 50%;overflow: hidden;top: -7px;}
	.house-kf-2 .item-list-2 .content{line-height: 22px;display: -webkit-box;text-overflow: ellipsis;-webkit-line-clamp: 2;-webkit-box-orient: vertical;overflow: hidden;}
	.house-kf-2 .item-list-2{margin-bottom: 15px;}
	.house-kf-2 .btn-zxzxdt2 {color: #00A0EA;display: inline-block;background: url(/public/static/home/image/v2.0/whapp.png) no-repeat left 68px center;padding: 5px 66px;text-indent: 25px;vertical-align: middle;border-radius: 5px;background-size: 20px 20px;border: 1px solid #00A0EA;}
	.house-wenda-ul-2 li{float: left;width: 560px;margin-right: 40px;}
	.house-wenda-ul-2{width: 1300px;}
	.wd-itm{padding: 15px;background: #f7f7f7;}
	.wd-c-ul{margin-top: 10px;}
	.wd-c-ul li {float: left;width: 130px;height: 90px;margin-right: 15px;}
	.wd-c-ul li img{width: 130px;height: 90px;}
	.wd-time{margin-top: 10px;color: #666}
	.i3 .btn-zxtw{color:#00A0EA;display:inline-block;background:url(/public/static/home/image/v2.0/whapp.png) no-repeat left 15px center;padding:8px 13px;text-indent:25px;vertical-align:middle;border-radius:5px;background-size:20px 20px;border:1px solid #00A0EA}
	.i3 .btn-ddh{color:#00A0EA;display:inline-block;background:url(/public/static/home/image/v2.0/tel3.gif) no-repeat left 15px center;padding:8px 13px;text-indent:25px;vertical-align:middle;border-radius:5px;background-size:20px 20px;border:1px solid #00A0EA;margin-left: 10px;}
	.i3{margin-top: 10px;}

	.sp-tag .tip span {float: left;margin-right: 5px;}
	.sp-tag .tip i{float:left;overflow:hidden;width:12px;height:12px;margin:21px 5px 0 0;vertical-align:top;border-radius:50%;background:#00A0EA}
	.sp-tag .tip .ico2 {background: #fb841f;}
	.sp-tag .tip .ico3 {background: #a9a9aa;}
.sm-kf-2{color: #333;display: inline-block;background: url(/public/static/home/image/lp/sma.gif) no-repeat left 5px center;padding: 5px 2px;text-indent: 25px;vertical-align: middle;border-radius: 5px;background-size: 16px 16px;}
.zmd-container-ul .text{font-size: 14px;}	
dl.dlhx dd .stag a{color: #999}
</style>
<div class="puic_wid">
	<!-- 面包屑 -->
	<?php include("nav.php");?>
<!-- 顶部随屏 end--> 
    <!-- NO.1 -->
	<!-- NO.1 -->
	<!-- 航拍 -->
	<div class="firstbox">
		<!-- left -->
		<div class="firstleft fl">
		<!-- 轮播开始 -->
	    <div class="focus">
        <div class="albums-detail">
            <div class="albums">
                <div class="content">
                    <!--幻灯-->
                    <div class="slide">	   
                    	<ul class="slide-ul">                        	
								<?php if($infos['src7']<>""){?>
                            <li>
                            <video src="../<?php echo $infos['src7'];?>" id="head_video_box" poster="../<?php echo $infos['src8'];?>" controls="controls" autobuffer="" style="object-fit:fill" preload="none" width="600" height="400" ></video>
                            <a href="javascript:" class="up-pop video-up" data-typeid="9" data-pc="1" data-des="输入手机号码即可观看完整的视频!" title="视频看房">视频看房</a>
							<div class="video-shadow">
                              <div class="video-cover video-play"></div>
                            </div>
                            </li>
                            <?php }?>	
                            <?php if($infos['src4']<>""){?>				
								<li>
									<a href="/loupan/photo/<?php echo $lpid;?>.html" alt="0">
																				<img src="../<?php echo $infos['src4'];?>" class="">
										     
									</a>
								</li>  
                            <?php }?>	
                            <?php if($infos['src5']<>""){?>
															<li>
									<a href="/loupan/photo/<?php echo $lpid;?>.html">
																				<img  src="../<?php echo $infos['src5'];?>" class="">
																			</a>
								</li> 
                            <?php }?>	
                            <?php if($infos['src3']<>""){?>
															<li>
									<a href="/loupan/photo/<?php echo $lpid;?>.html">
																				<img src="../<?php echo $infos['src3'];?>" class="">
																			</a>
								</li> 
                            <?php }?>	
                            <?php if($infos['src6']<>""){?>
															<li>
									<a href="/loupan/photo/<?php echo $lpid;?>.html">
																				<img  src="../<?php echo $infos['src6'];?>" class="" >
																			</a>
								</li> 
                            <?php }?>	
                            <?php if($infos['src2']<>""){?>                            
															<li>
									<a href="/loupan/huxing/<?php echo $lpid;?>.html">
																				<img src="../<?php echo $infos['src2'];?>" class="" >
																			</a>
								</li>  
                            <?php }?>	                        
							                        </ul>                 
                        <!--按钮-->
                        <div>
                            <a class="slide-btnz slide-btn1 zmd-no " href="javascript:void(0);"></a>
                            <a class="slide-btny slide-btn1" href="javascript:void(0);"></a>
                        </div>
                        <font style="color:#FFF; background:rgba(0,0,0,0.5); position:absolute;top: 0px;right: 0px;font-size: 12px;padding: 2px 10px;">广告</font>
                    </div>    
                     <div class="column-nav column-nav-base"></div>
					        <script src="/public/static/js/page_show_lib.min.js"></script>
					        <script src="/public/static/js/show_fang.min.js"></script>
					        <script>
					            /* 楼盘名称、楼盘id、catid、均价 */
					            initf("<?php echo $infos['title'];?>","<?php echo $infos['id'];?>",'33',"<?php echo $infos['jj_price'];?>");
					        </script>              
                    <!--走马灯-->
                    <div class="zmd">                    	
                        <div class="zmd-container">
                            <div class="move">
                                <ul class="zmd-container-ul">
                                <?php if($infos['src7']<>''){?>
                                    <li class="first " style="height: 74px; overflow: hidden;">
                                    <a href="javascript:void(0);"><img class="zmd-index " src="../<?php echo $infos['src8'];?>"></a>	                                       
                                    <p class="text">视频</p>
                                    </li>
                            <?php }?>	
                            <?php if($infos['src4']<>""){?>  
                                                                                                
                                    <li class="first " style="height: 74px; overflow: hidden;">
                                    <a href="javascript:void(0);"><img class="zmd-index " src="../<?php echo $infos['src4'];?>"></a>	                                       
                                    <p class="text">效果图</p>
                                    </li>
                            <?php }?>	
                            <?php if($infos['src5']<>""){?>  
                                    <li class="first  " style="height: 74px; overflow: hidden;">
                                    <a href="javascript:void(0);"><img class="zmd-index " src="../<?php echo $infos['src5'];?>"></a>	                                       
                                    <p class="text">样板间</p>
                                    </li>
                            <?php }?>	
                            <?php if($infos['src3']<>""){?>  
                                    <li class="first " style="height: 74px; overflow: hidden;">
                                    <a href="javascript:void(0);"><img class="zmd-index " src="../<?php echo $infos['src3'];?>"></a>	                                       
                                    <p class="text">区位图</p>
                                    </li>
                            <?php }?>	
                            <?php if($infos['src6']<>""){?>  
                                    <li class="first " style="height: 74px; overflow: hidden;">
                                    <a href="javascript:void(0);"><img class="zmd-index " src="../<?php echo $infos['src6'];?>"></a>	                                       
                                    <p class="text">实景图</p>
                                    </li>
                            <?php }?>	
                            <?php if($infos['src2']<>""){?>  
                                    <li class="first " style="height: 74px; overflow: hidden;">
                                    <a href="javascript:void(0);"><img class="zmd-index " src="../<?php echo $infos['src2'];?>"></a>	                                       
                                    <p class="text">户型图</p>
                                    </li>
                            <?php }?>	
                                    </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
		<!-- 轮播开始 end-->
		</div>
		<!-- left end-->
		<!-- right -->
		<div class="firstright fr" style="border: 1px solid #e6e6e6;border-radius: 7px;width: 581px;">
			<div style="padding: 10px 15px;">
				<div class="information">
					<div class="information_li mb5 pr">
						<div class="inf_left fl">
                        
                   		 <?php if($infos['all_price']==0){?>
							<?php if($infos['jj_price']==0){?>
                            <h3 style="font-size: 16px;">参考均价约：</h3>						
							<span class="prib cn_ff" style="color: #00A0EA!important;">待定</span>
                                    <?php }else{?>
                            <h3 style="font-size: 16px;">参考均价约：</h3>						
							<span class="prib cn_ff" style="color: #00A0EA!important;"><?php echo $infos['jj_price'];?></span>元/㎡
                                    <?php }?>
                                <?php }else{?>
                            <h3 style="font-size: 16px;">参考总价约：</h3>						
							<span class="prib cn_ff" style="color: #00A0EA!important;"><?php echo $infos['all_price'];?></span>万/套
                            <?php }?>
						</div>					
						<div class="inf_right fl" style="margin-left:4px;position: relative;">
							<a href="javascript:;" class="swtopen" onClick="sq();"  style="border: 1px solid #00A0EA;color: #00A0EA;padding: 3px 5px;">咨询最新房源价格</a>
						</div>		
						<div style="position: absolute;right: 1px;top: 1px;">
							<i class="log-code2"></i>
							<div class="qrcodebox code-3" style="width: 127px; left: -121px; top: 27px; display: none; z-index:9;">
                            <div id="qrcode2" style="width:125px;height: 125px;"></div>
		                        <p class="sm-kf-2">扫码看房更便捷</p>
		                    </div>
							<script type="text/javascript">
						        //扫码拨号  
						        $(".log-code2").mouseover(function (){  
						            $(".code-3").show();  
						        }).mouseout(function (){  
						            $(".code-3").hide();
						        });  
							</script>	
						</div>			
					</div>								
					<!-- 楼盘优惠 beigin -->	
					<div class="clear"></div>					
					<div style="padding-top: 12px;">
						<span>参考起价：</span>
						<span><?php if($infos['qj_price']==0){echo '暂无报价';}else{ echo $infos['qj_price'].'元/㎡';}?></span>
						<span style="color: #999;padding-left: 15px;">(价格有效期至：<?php echo $infos['loupan_qq'];?>)</span>
					</div> 		 	
					<div class="h15"></div>
					<div style="height: 2px;border-top: 1px dashed #e6e6e6;width: 551px;position: relative;top: 3px;"></div>	 
					<div class="h15"></div>
					<!-- 惠 -->
					<div class="house-hui" style="background: #f5f5f5;padding: 8px;position: relative;top: 6px; width:97%;">
						<span style="background: #00A0EA;padding: 4px 6px;color: #fff;display: inline-block;border-radius: 3px;">惠</span>
						<span style="padding-left: 10px;color: #00A0EA;font-size: 16px;" title="<?php echo $infos['fkfs'];?>"><?php echo mb_substr(strip_tags($infos['fkfs']),0,13,"utf-8");?>...</span>
						<div class="pa" style="right: 120px;top: 12px;">
							<img src="/public/static/home/image/v2.0/team.png"><span>&nbsp;已有<?php if($infos['esfcx']<>'' and $infos['esfcx']<>'0'){echo (int)$infos['esfcx'];}else{ echo rand(350,820);}?>人领取</span>
						</div>
						<a class="bmkf-up" href="javascript:void(0)" data-name="领取优惠" data-type="[<?php echo cityname($infos['city_id']);?>]<?php echo $infos['title'];?>楼盘详细页_领取优惠" data-info="请输入正确的手机号码 ，置业顾问会尽快联系您。" style="border:1px solid #00A0EA;padding: 5px 15px;position: absolute;right: 10px;top: 6px;color: #00A0EA;border-radius: 3px;">领取优惠</a>
					</div>
					<!-- 惠:end-->
					<div class="clear"></div>
					<div class="h15"></div>					
					<div style="clear: both;position: relative;">
						<ul class="house-info-ul" style="position:relative;top: 6px">
							<li><span class="t">主力户型：</span><span ><?php echo $infos['zlhx'];?></span></li>
							<li><span class="t">项目地址：</span><span title="<?php echo $infos['xmdz'];?>"><?php echo $infos['xmdz'];?></span></li>
							<li><div class="fl"><span class="t">开盘时间：</span><span><?php echo $infos['kptime'];?></span></div>
								<a class="lpadd fl bmkf-up" href="javascript:void(0);" data-name="开盘通知" data-type="[<?php echo cityname($infos['city_id']);?>]<?php echo $infos['title'];?>楼盘详细页_开盘通知" data-info="请输入正确的手机号码 ，置业顾问会尽快联系您" style="padding-left: 20px;color: #999;">
									<i class="lpt_ld fl"></i>开盘通知
								</a>
							</li>
						</ul>
						<div class="clear"></div>
						<div class="h20"></div>
                        	<?php if($infos['src9']<>''){?>
                        	<div class="yuyinbao">
								<a href="javascript:void(0)" class=" openyinp">
								<div class="house-yuyin" style="background: url(/public/static/home/image/v2.0/yuyin.gif) no-repeat;height: 37px;line-height: 37px;">
									<span style="padding-left: 20px;">楼盘详情在线讲房</span><span style="color: #00A0EA;padding-left: 115px;"><?php echo $click;?>人听过</span>
								</div>
								</a>
							</div>
                            <?php }else{?>
							<div class="yuyinbao">
                                <a href="javascript:void(0);" data-name="语音讲房" data-type="<?php echo $infos['title'];?>楼盘详细页_语音讲房" data-info="请输入正确的手机号码 ，置业顾问会尽快联系您" class="bmkf-up">
                                <div class="house-yuyin" style="background: url(/public/static/home/image/v2.0/yuyin.jpg) no-repeat;height: 37px;line-height: 37px;">
                                    <span style="padding-left: 20px;">楼盘详情在线讲房</span><span style="color: #00A0EA;padding-left: 115px;"><?php echo $click;?>人听过</span>
                                </div>
                                </a>
							</div>
                            <?php }?>
								<!-- 置业 -->	
                                 <?php
								$gwid=sjgw();
								$gws = $mysql->query("select * from `web_content` where `id`='{$gwid}' limit 0,1");
								?>					
							<div class="house-zhiye">
							<div class="pic pr center">
                            	<div style="width: 80px;height: 80px;border-radius: 50%; overflow:hidden;">
								<img src="/<?php echo $gws[0]['img'];?>" style="width: 80px;"></div>
								<div style="background: url(/public/static/home/image/v2.0/tx.png) no-repeat center;height: 24px;position: absolute;bottom: -8px;left: 1px;width: 100%;line-height: 26px">
									<span style="color: #fff"><?php echo $gws[0]['title'];?></span>
								</div>
							</div>
							<div class="h15"></div>
							<div style="margin-top: 11px;margin-left: 2px;">
								<img src="/public/static/home/image/v2.0/whapp.png" style="width: 20px;">
								<a href="javascript:;" class="swtopen" onClick="sq();"  title="点击在线咨询" style="line-height: 21px;font-size: 14px;padding-left: 5px;color: #666">在线咨询</a>
							</div>
						</div>
						<!-- 置业:end -->		
					</div>
					<div class="h20"></div>
					<div class="house-tel-1" style="height: 70px;width: 551px;position: relative;top: 7px;cursor: pointer;">
						<div class="pic fl"><img src="/public/static/home/image/v2.0/tel3.gif" style="width: 50px;height: 50px;position: relative;top: 6px"></div>
						<div class="txt fl">
							<p>找楼盘？问底价？不如一个电话轻松搞定！</p>
							<h3><?php echo telsee($infos['loupan_tel']);?></h3>
						</div>
						<div class="fr pr" style="margin-top: 9px;">
							<a href="javascript:;" class="btm-sm"><i class="icons-code"></i>扫码拨号</a>
							<div class="qrcodebox sm-img" style="width: 128px; left: -10px; top: 48px; display: none;">		                        
		                         <span>微信扫码打电话<br>省时 高效 问底价</span>
                                <div id="smtel" style="width:128px;height: 128px;"></div>
		                    </div>
							<script type="text/javascript">
						        //扫码拨号  
						        $(".house-tel-1").mouseover(function (){  
						            $(".sm-img").show();  
						        }).mouseout(function (){  
						            $(".sm-img").hide();  
						        });  
							</script>		                    
						</div>
						<div class="clear"></div>
					</div>
					<div class="h20"></div>
					<div class="house-tag-2">
						<div class="fl" style="margin-top: 2px" onClick="sq();"><img src="/public/static/home/image/v2.0/ling.png" style="width: 19px;"><span style="color: #00A0EA">&nbsp;新消息通知</span></div>
						<ul class="house-tag-ul-2">
							<li><input type="checkbox" name="">价格变动</li>
							<li><input type="checkbox" name="">开盘预告</li>
							<li><input type="checkbox" name="">楼盘动态</li>
							<li><input type="checkbox" name="">看房团</li>
						</ul>
						<a href="javascript:;" class="bmkf-up" data-name="立即订阅" data-type="[<?php echo cityname($infos['city_id']);?>]<?php echo $infos['title'];?>楼盘详细页_立即订阅" data-info="输入正确的手机号码 专业置业顾免费为您解说楼盘的最新信息。" style="border: 1px solid #00A0EA;padding: 3px 8px;border-radius: 5px;float: right;color: #00A0EA;font-size: 12px;">立即订阅</a>
						<div class="clear"></div>
					</div>
					<!-- 开盘 end -->				
				</div>
				<div class="clear"></div>
			</div>
		</div>
		<!-- right end-->		
		<div class="clear"></div>
	</div>	
	<!-- NO.1 end-->
	<div class="h20"></div>
	<div class="" style="display: none;">
		<a href="javascript:void(0)" data-name="预约看房" data-type="[<?php echo cityname($infos['city_id']);?>]<?php echo $infos['title'];?>楼盘详细页_预约看房" class="yh-btn bmkf-up">
		<img src="s_files/bnmf.jpg"></a>
	</div>
	<!-- 楼盘优势 -->	
   <!-- 楼盘优势 -->
		<div class="house-com-k-2" style="display:none;">
		<div class="tit">			
			<h3 style="display: inline-block;">楼盘点评</h3>
			<div style="width: 2px;height: 24px;background: #00A0EA;position: absolute;left: 0;top: 15px;"></div>
		</div>
		<div class="c">
			<div class="h15"></div>
			<div class="wai" id="wai2" style="height:223px;overflow: hidden; outline: none;">
				<div class="timeline">
					<div class="inn">
						<!-- list -->
						    <?php

					$sql="WHERE `pid`='83' and `lpid`='{$lpid}' ";
					$row = $mysql->query("select * from `web_content_dp` {$sql} order by addtime desc");
							foreach($row as $k=>$list){
					?>
                    <div class="feed-item">
							<div class="circle circle-orange"></div>
							<div class="s">
								<div class="h50"></div>
								<div class="title"><h3 style="font-size: 18px;font-weight: normal;"><?php echo $list['title'];?></h3></div>
								<div class="h30"></div>
								<div class="content">
									<p><p><?php echo $list['content'];?></p></p>
								</div>
								<div class="h15"></div>
							</div>						
						</div>
	      <?php
	}
?>      					
						<!-- list:end -->
					</div>
				</div>
			</div>
			<div class="h10"></div>
		</div>
	</div>	
		<!-- 楼盘优势:end -->	
        
	<div class="clear"></div>
     <?php if($infos['get_url']<>''){?><iframe src="<?php echo $infos['get_url'];?>" id="myiframe" scrolling="no" onload="changeFrameHeight()" frameborder="0" style="width:1200px; height:630px;"></iframe><?php }?>
	<div class="clear"></div>
<!--	<div class="h20"></div>-->
	<div class="clear"></div>
	<div class="h20"></div>
		<!-- 户型一栏 -->
	<div class="house-com-k-2">
		<div class="tit">			
			<h3 style="display: inline-block;"><a href="/loupan/huxing/<?php echo $lpid;?>.html" target="_blank">楼盘户型</a></h3>
			<div style="width: 2px;height: 24px;background: #00A0EA;position: absolute;left: 0;top: 15px;"></div>
					
		</div>
		<div class="c">
			<!-- 户型 -->	
            <?php
			$hxtnum=0;
			$row = $mysql->query("select * from `web_pic` where `luopan_id`='{$lpid}' and `pid_flag` = 'xc1' order by pic_px desc limit 0,3");
			foreach($row as $k=>$list){
				$hxtnum=$hxtnum+1;
			
		?>
         
				<dl class="dlhx nob" style="padding: 0;margin-top: 20px;width: 1161px;border-bottom: 1px solid #ddd;padding-bottom: 15px;overflow: inherit;">
				<dt style="text-align:center;overflow: hidden;border: 1px solid #e1e1e1;height: 116px;">
                    
					<a href="../<?php echo $list['pic_img'];?>" alt="<?php echo $list['bh'];?>" data-lightbox="example-set">
					<img class="lazy" original="../<?php echo $list['pic_img'];?>" style="width:160px; height:116px;" alt="<?php echo $list['bh'];?>"></a>
					<a href="javascript:;"><div class="chx"><?php echo $list['zt'];?></div></a>
				</dt>
				<dd>
					<h2 style="height: 26px"><a href="/loupan/huxing/<?php echo $lpid;?>_<?php echo $list['id'];?>.html" alt="<?php echo $list['bh'];?>" target="_blank"><?php echo $list['pic_name'];?></a></h2>				
					<p class="stag mt10">
                    <?php
                    $gjs=str_replace("，",",",$list['gj']);
					$gjss=explode(",",$gjs);
					$gjnum = count($gjss);
					for($i=0;$i<$gjnum;$i++){
					?>
                    <a href="javascript:void(0)" style="cursor:default;" class="tags-<?php $i+1;?>"><?php echo $gjss[$i];?></a>
                    <?php }?>
                    </p>
					<div class="onxf" style="top: 45px;">
						<a href="javascript:;" class="ljhx-btn-1" data-id='<?php echo $k;?>' style="background: #00A0EA;padding: 10px 35px;color: #fff;border-radius: 5px;">了解户型报价</a>
						<div class="qrcodebox btn-ljhx-<?php echo $k;?>" style="width: 130px;left: 1px;top:38px; z-index:9;">		                        
	                         <span style="font-size: 12px;color: #999;">微信扫码打电话<br/>省时 高效 问底价</span>
                              <div id="hntel<?php echo $hxtnum;?>" style="width:130px;height: 130px;"></div>
	                        
	                    </div>
						<script type="text/javascript">
					        //扫码拨号  
					        $(".ljhx-btn-1").mouseover(function (){  
					        	var id=$(this).attr('data-id');
					            $(".btn-ljhx-"+id).show();  
					        }).mouseout(function (){  
					        	var id=$(this).attr('data-id');
					            $(".btn-ljhx-"+id).hide();
					        });  
						</script>
					</div>
					<p><span style="color: #adadad">解析：</span>
					<a href="/loupan/huxing/<?php echo $lpid;?>_<?php echo $list['id'];?>.html" style="color:#333;cursor:default"><?php echo $list['jx'];?></a></p>
					<div class="clear"></div>
				</dd>
				<div class="clear"></div>
			</dl>	
<?php
			}
		?> 		
							
						<!-- 户型 end-->	
		</div>
		<div style="background: #f7f7f7;line-height: 50px;">
			<p class="center"><a href="/loupan/huxing/<?php echo $lpid;?>.html" target="_blank">查看全部户型</a></p>
		</div>
	</div>
	<!-- 户型一栏:end -->
	<div class="clear"></div>
	<div class="h20"></div>
	<div class="house-com-k-2">
		<div class="tit">			
			<h3 style="display: inline-block;">楼盘动态</h3>
			<div style="width: 2px;height: 24px;background: #00A0EA;position: absolute;left: 0;top: 15px;"></div>
			<a href="/loupan/news/<?php echo $lpid;?>.html" target="_blank" style="position: absolute;right: 1px;top: 1px;font-size: 14px;font-weight: normal;color: #666;">查看更多&gt;&gt;</a>
		</div>
		<div class="c" style="height: 250px;margin-bottom: 15px;">
			<div class="h15"></div>
			<div class="fl news-list-2" id="wai3" style="height:223px;overflow: hidden; outline: none;width: 850px;" tabindex="5001">
				<dl>
                  <?php

					$sql="WHERE `pid`='28' and `lpid`='{$lpid}' ";
					
					$row = $mysql->query("select * from `web_content` {$sql} order by id desc limit 0,2");
					
							foreach($row as $k=>$list){
								$url='/loupan/news_show/'.$list['id'].'.html';
					?>
                    <dd>
						<a href="<?php echo $url;?>" target="_blank">
						<div class="date fl">
							<strong><?php echo date('d',strtotime($list['addtime']));?></strong>
							<p><?php echo date('Y-m',strtotime($list['addtime']));?></p>
						</div>
						<div class="tet-2 fl">
							 <p style="font-size: 18px;">
							 <span style="border:1px solid #00A0EA;color: #00A0EA;padding: 1px 8px;font-size: 12px;border-radius: 5px;">动态</span>&nbsp;&nbsp;<?php echo $list['title'];?></p>
							 <div class="content mt10" style="color: #888888;line-height: 23px;">
							 	<p><?php echo mb_substr(strip_tags($list['content']),0,130,"utf-8"); ?>...</p>
							 </div>
						</div>
						<div class="clear"></div>
						</a>
					</dd>
	      <?php
	}
?>      					
				</dl>
			</div>
			<div class="house-kf-2 fr" style="width: 270px;margin-left: 30px;">
				<div class="h15"></div>
				<!-- 开盘时间 -->
				<div class="timeline2">
					<!-- start -->
					<div class="item-list-2">
						 <div class="circle"></div>
						 <div class="pa" style="top:-12px;line-height: 20px;color: #999">
						 <span style="color: #ffa200;border: 1px solid #ffa200;padding: 1px 5px;border-radius: 3px">开盘</span><span style="margin-left: 8px;color: #333"><?php echo $infos['kptime'];?></span></div>
						 <div class="h15"></div>
						 <div class="content"><p></p></div>
					</div>
					<div class="item-list-2">
						 <div class="circle"></div>
						 <div class="pa" style="top:-12px;line-height: 20px;padding-bottom: 5px;color: #999">
						 	<span style="color: #0179af;border: 1px solid #0179af;padding: 1px 5px;border-radius: 3px">交房</span><span style="margin-left: 8px;color: #333"><?php echo $infos['jftime'];?></span></div>
						 <div class="h15"></div>
						 <div class="content"><p></p></div>
					</div>
					<div class="item-list-2">
						 <div class="circle"></div>
						 <div class="pa" style="top:-12px;line-height: 20px;color: #999">
						 <span style="color: #58a657;border: 1px solid #58a657;padding: 1px 5px;border-radius: 3px">预售证</span><span style="margin-left: 8px;color: #333"><?php echo $infos['ysxkz'];?></span></div>
						 <div class="h15"></div>
						 <div class="content"><p></p></div>
					</div>
					<!--  -->
				</div>
				<!-- 开盘时间:end -->
				<div style="padding-left: 20px;"><a href="javascript:;" onClick="sq();"  class="swtopen btn-zxzxdt2">咨询最新动态</a></div>
			</div>
			<div class="clear"></div>
		</div>
	</div>
	<div class="clear"></div>
	<div class="h20"></div>
    <div class="house-com-k-2">
			<div class="tit">			
				<h3 style="display: inline-block;"><a href="/loupan/detail/<?php echo $lpid;?>.html" target="_blank">楼盘信息</a></h3>
				<div style="width: 2px;height: 24px;background: #00A0EA;position: absolute;left: 0;top: 15px;"></div>
				<a href="/loupan/detail/<?php echo $lpid;?>.html" style="position: absolute;right: 1px;top: 1px;font-size: 14px;font-weight: normal;color: #666;">查看更多&gt;&gt;</a>
			</div>
			<!-- 详细 -->
			<div class="p10">
			<table class="lpm-section4-table mt10">
                 <tbody><tr>
                    <td class="lpm-table-1">                    	
                    	<a title="建筑形式">建筑形式</a>                     	
                    </td>
                    <td class="lpm-table-2"><?php echo loupanflagtsi3($infos['flaglb'],3,3);?></td>
                    <td class="lpm-table-1">
                    	<a title="装修状况">装修状况</a>
                    </td>
                    <td class="lpm-table-2"><?php echo loupanflagzx($infos['flagzx'],5)?></td>
                    <td class="lpm-table-1">
                    	<a title="物业类型">物业类型</a>
                    </td>
                    <td class="lpm-table-2">
                        <span class="lpm-location"><?php echo $infos['wylx'];?></span>
                    </td>
                 </tr>
                 <tr>
                    <td class="lpm-table-1">
                    	<a title="占地面积">占地面积</a>
                    </td>
                    <td class="lpm-table-2"><?php echo $infos['zdmj'];?></td>
                    <td class="lpm-table-1">
                    	<a title="建筑面积">建筑面积</a>
                    </td>
                    <td class="lpm-table-2"><?php echo $infos['jzmj'];?></td>
                    <td class="lpm-table-1">
                    	<a title="物业费">物 业 费</a>
                    </td>
                    <td class="lpm-table-2"><?php echo $infos['wyf'];?>&nbsp;</td>
                 </tr>
                 <tr>
                    <td class="lpm-table-1">
                    	<a title="容积率">容 积 率</a>
                    </td>
                    <td class="lpm-table-2">
                     <span class="fl"><?php echo $infos['rjl'];?>&nbsp;</span>
                     </td>
                    <td class="lpm-table-1">
                    	<a title="绿化率">绿 化 率</a>
                    </td>
                    <td class="lpm-table-2">
                      <span class="fl"><?php echo $infos['jzmj'];?></span>
                    </td>
                    <td class="lpm-table-1">                    	
                    	<a title="规划户数">规划户数</a>                    	
                    </td>
                    <td class="lpm-table-2"><?php echo $infos['zhs'];?></td>
                 </tr>
                   <tr>
                    <td class="lpm-table-1">栋数</td>
                       <td class="lpm-table-2"><?php echo $infos['zds'];?></td>
                    <td class="lpm-table-1">主力户型</td>
                       <td class="lpm-table-2"><?php echo $infos['zlhx'];?></td>
                    <td class="lpm-table-1">停车位</td>
                    <td class="lpm-table-2"><?php echo $infos['cws'];?></td>
                 </tr>
                 <tr>
                    <td class="lpm-table-1">                    	
                    	<a title="物业公司">物业公司</a>
                    </td>
                    <td class="lpm-table-2"><?php echo $infos['wygs'];?></td>
                    <td class="lpm-table-1">                    	
                    	<a title="房屋产权">房屋产权</a>
                    </td>
                    <td class="lpm-table-2">
                        <span class="fl"><?php echo $infos['cqnx'];?></span>
                    </td>
                    <td class="lpm-table-1">
                    	<a title="预售许可证">预售许可证</a>
                    </td>
                    <td class="lpm-table-2">
                         <span class="fl lpm-location1"><?php echo $infos['ysxkz'];?></span>
                    </td>
                 </tr>
                 <tr>
                    <td class="lpm-table-1">                    	                    
                    	<a title="开发商">开 发 商</a>
                    </td>
                    <td class="lpm-table-2">
                        <span class="lpm-location"><?php echo $infos['kfs'];?></span>
                     </td>
                    <td class="lpm-table-1">销售电话</td> 
                    <td class="lpm-table-2">
                       <span class="lpm-location"><?php echo telsee($infos['loupan_tel']);?></span>    
                    </td>
                    <td class="lpm-table-1">
                    	售楼处地址
                    </td>
                    <td class="lpm-table-2"> 
                        <span class="lpm-location"><?php echo $infos['sldz'];?></span>                        
                    </td>
                 </tr>
                 <tr>
                    <td class="lpm-table-1">                    	                    
                    	<a title="开发商">楼盘介绍</a>
                    </td>
                                        <td colspan="6" class="lpm-table-2">
                        <p class="p10" style="line-height: 26px;"><?php echo mb_substr(strip_tags($infos['content']),0,130,"utf-8"); ?>...<a href="/loupan/detail/<?php echo $lpid;?>.html" class="red">[查看详细]</a></p>
                     </td>                    
                 </tr>  
            </tbody>
            </table>
            </div>
			<!-- 详细 end-->
		</div>
	<div class="clear"></div>
	<div class="h20"></div>
    <div class="house-com-k-2">
			<div class="tit">			
				<h3 style="display: inline-block;"><a href="/loupan/wenda/<?php echo $lpid;?>.html" target="_blank">楼盘问答</a></h3>
				<div style="width: 2px;height: 24px;background: #00A0EA;position: absolute;left: 0;top: 15px;"></div>
				<a href="/loupan/wenda/<?php echo $lpid;?>.html" style="position: absolute;right: 1px;top: 1px;font-size: 14px;font-weight: normal;color: #666;">查看更多&gt;&gt;</a>
			</div>
			<div class="h15"></div>
			<div class="c">
				<ul class="house-wenda-ul-2">
                <?php
		
		$row = $mysql->query("select * from `web_book` WHERE `pid`='30' and `cl`='1'  order by id desc limit 0,2");// WHERE `adminid`='{$_SESSION['admin_id']}'
$wdnum=0;
		foreach($row as $k=>$list){
			$url='/loupan/wenda/show_'.$list['id'].'.html';
			$wdnum=$wdnum+1;
?>
				
            <li>				 		
				 		<div class="wd-itm">
				 			<div class="title">
				 				<div class="pic fl" style="width: 25px;padding-top: 2px;">
				 					<a href="<?php echo $url;?>" style="display: block;" target="_blank"><img src="/public/static/phone/img/icons/question.png" style="width: 22px;"></a>
				 				</div>
				 				<div class="tit2 fl" style="padding-left: 12px;width: 493px;">
				 					<a href="<?php echo $url;?>" style="display: block;" target="_blank"><span style="font-size: 16px;font-weight: 700"><?php echo $list['ucontent'];?></span></a>
				 				</div>
				 				<div class="clear"></div>
				 			</div>
				 			<div class="h20"></div>
				 							 			<div class="content">
				 				<div class="pic fl" style="width: 25px;padding-top: 2px;">
				 					<img src="/public/static/phone/img/icons/answer.png" style="width: 22px;" alt="296247">
				 				</div>
				 				<div class="tit2 fl" style="padding-left: 12px;width: 493px;">
				 					<p style="color: #888888"><?php echo mb_substr(strip_tags($list['acontent']),0,60,"utf-8"); ?>...<a href="<?php echo $url;?>" target="_blank" class="red" title="查看详情">详情&gt;&gt;</a></p>
				 					<ul class="wd-c-ul">
				 										 					</ul>
				 					<div class="clear"></div>
				 					<div class="wd-time">
				 						<p><span><?php echo date('Y-m-d',strtotime($list['addtime']));?></span></p>									
				 					</div>				 					
				 				</div>		
				 				<div class="clear"></div>		 				
				 			</div>	
				 								 			 		
				 		</div>		
				 		<div class="h10"></div>
                         <?php
								$gwid=sjgw();
								$gws = $mysql->query("select * from `web_content` where `id`='{$gwid}' limit 0,1");
								?>		
				 		<div class="wd-zhiye">
				 			<div class="fl">
				 				<div class="pic" style="width: 70px;float: left;">
				 					<img src="/<?php echo $gws[0]['img'];?>" style="width: 60px;height: 60px;border-radius: 50%" alt="<?php echo $gws[0]['title'];?>">
				 				</div>
				 				<div class="i2 fl" style="padding-top: 7px;">
				 					<p style="font-size: 18px;color: #333"><?php echo $gws[0]['title'];?></p>
				 					<p style="padding-top: 3px;"><span>咨询人数：</span><span class="red"><?php echo $gws[0]['keyword'];?></span>人</p>
				 				</div>
				 				<div class="clear"></div>
				 			</div>
				 			<div class="i3 fr pr">
				 				<a href="javascript:;"  onClick="sq();" class="swtopen btn-zxtw" >在线提问</a>
				 				<a href="javascript:;" class="btn-ddh" data-id="<?php echo $k;?>">打电话</a>
				 				<div class="qrcodebox code-<?php echo $k;?>" style="width: 131px;left: 89px;top:48px; z-index:9;">
			                        <span>微信扫码打电话<br>省时 高效 问底价</span>
                                     <div id="hntels<?php echo $wdnum;?>" style="width:130px;height: 130px;"></div>
			                        
			                    </div>
								<script type="text/javascript">
							        //扫码拨号  
							        $(".btn-ddh").mouseover(function (){  
							        	var id=$(this).attr('data-id');
							            $(".code-"+id).show();  
							        }).mouseout(function (){  
							        	var id=$(this).attr('data-id');
							            $(".code-"+id).hide();  
							        });  
								</script>
				 			</div>
				 			<div class="clear"></div>
				 		</div>			 		
				 	</li>   
<?php
		}
?>
				
				 					</ul>
				<div class="clear"></div>
				<div class="h15"></div>
			</div>
		</div>
        
    
	<div class="clear"></div>
	<div class="h20"></div>
    <!--配套-->
    <div class="house-com-k-2 lpm-section5 clearfix">
		<div class="tit">			
			<h3 style="display: inline-block;">周边配套</h3>
			<div style="width: 2px;height: 24px;background: #00A0EA;position: absolute;left: 0;top: 15px;"></div>
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
	<div class="clear"></div>
	<div class="h20"></div>
	<!-- 贷款计算 -->
    <div class="house-com-k-2">
		<div class="tit">			
			<h3 style="display: inline-block;">我要计算房贷</h3>
			<div style="width: 2px;height: 24px;background: #00A0EA;position: absolute;left: 0;top: 15px;"></div>
		</div>
	    <form id="calc11" name="calc11">
	        <div class="js clearfix">
	            <div class="js-l">
	                <div class="js-rom clearfix">
	                    <em class="js-tit">选择户型:</em>
	                    <div class="divselect" id="f2s">
                         <?php
							$rowsj = $mysql->query("select * from `web_pic` where `luopan_id`='{$lpid}' and `pid_flag` = 'xc1' order by pic_px desc limit 0,1");
						
							
						?>                								
					<cite><?php echo $rowsj[0]['pic_name'];?></cite>
								<ul style="height:200px;overflow-y: scroll;overflow-x: hidden;">
                                <?php
							$row = $mysql->query("select * from `web_pic` where `luopan_id`='{$lpid}' and `pid_flag` = 'xc1' order by pic_px desc limit 0,3");
							foreach($row as $k=>$list){
							
						?>
						<li><a href="javascript:;" data-id="p" selectid="<?php echo $infos['jj_price']*$list['mj'];?>" selectid2="<?php echo $infos['jj_price'];?>元/平米"><?php echo $list['pic_name'];?></a></li>
						
				<?php
							}
						?>        
								</ul>
							</div>
	                </div>
	                <div class="js-rom clearfix">
	                    <em class="js-tit">估算总价:</em>
	                    <div class="divselect" style="background: #f0f0f0;cursor: auto;">	                        
	                        <input id="cite0" type="text" style="width: 300px;height: 36px;margin-left: 22px;font-size: 17px;background-color: #f0f0f0;border: 0;outline: none;" value="<?php echo $infos['jj_price']*$rowsj[0]['mj'];?>"><b style="font-size: 17px;"></b>
	                    </div>
	                    <input maxlength="8" size="10" name="daikuan_total000" value="1256.00" id="daikuan" class="guestbook01" type="hidden">	                    
	                </div>
	                <div class="js-rom clearfix">
	                    <em class="js-tit">首付成数:</em>
	                    <div class="divselect" id="f3s">
	                        <cite>3成</cite>
	                        <ul style="height: 254px; overflow: hidden scroll; display: none;">
	                            <li><a href="javascript:;" selectid="9">9成</a></li>
	                            <li><a href="javascript:;" selectid="8">8成</a></li>
	                            <li><a href="javascript:;" selectid="7">7成</a></li>
	                            <li><a href="javascript:;" selectid="6">6成</a></li>
	                            <li><a href="javascript:;" selectid="5">5成</a></li>
	                            <li><a href="javascript:;" selectid="4">4成</a></li>
	                            <li><a href="javascript:;" selectid="3">3成</a></li>
	                            <li><a href="javascript:;" selectid="2">2成</a></li>
	                        </ul>
	                    </div>
	                    <input name="anjie" type="hidden" value="3" id="anjie">
	                </div>
	                <div class="js-rom clearfix">
	                    <em class="js-tit">贷款类别:</em>
	                    <div class="divselect" id="f4s">
	                        <cite>商业贷款</cite>
	                        <ul style="display: none;">
	                            <li><a href="javascript:;" selectid="1">商业贷款</a></li>
	                            <li><a href="javascript:;" selectid="2">公积金贷款</a></li>	                            
	                        </ul>
	                    </div>
	                    <input name="loanradiotype" type="hidden" value="1" id="loanradiotype">
	                </div>
	                <div class="js-rom clearfix">
	                    <ul id="calc11_zuhe" style="display: none" class="calculator">
	                        <li>&nbsp;&nbsp;商业性：<input id="zuhesy" name="total_sy" maxlength="8" size="8" type="text" class="guestbook01">元</li>
	                        <li>&nbsp;&nbsp;公积金：<input id="zuhegjj" name="total_gjj" maxlength="8" size="8" type="text" class="guestbook01">元</li>
	                    </ul>
	                </div>
	                <div class="js-rom clearfix">
	                    <em class="js-tit">贷款时间:</em>
	                    <div class="divselect" id="f5s">
	                        <cite>30年（360期）</cite>
	                        <ul style="height: 119px; overflow: hidden scroll; display: none;">
	                            <li><a href="javascript:;" selectid="1">1年（12期）</a></li>
	                            <li><a href="javascript:;" selectid="2">2年（24期）</a></li>
	                            <li><a href="javascript:;" selectid="3">3年（36期）</a></li>
	                            <li><a href="javascript:;" selectid="4">4年（48期）</a></li>
	                            <li><a href="javascript:;" selectid="5">5年（60期）</a></li>
	                            <li><a href="javascript:;" selectid="6">6年（72期）</a></li>
	                            <li><a href="javascript:;" selectid="7">7年（84期）</a></li>
	                            <li><a href="javascript:;" selectid="8">8年（96期）</a></li>
	                            <li><a href="javascript:;" selectid="9">9年（108期）</a></li>
	                            <li><a href="javascript:;" selectid="10">10年（120期）</a></li>
	                            <li><a href="javascript:;" selectid="11">11年（132期）</a></li>
	                            <li><a href="javascript:;" selectid="12">12年（144期）</a></li>
	                            <li><a href="javascript:;" selectid="13">13年（156期）</a></li>
	                            <li><a href="javascript:;" selectid="14">14年（168期）</a></li>
	                            <li><a href="javascript:;" selectid="15">15年（180期）</a></li>
	                            <li><a href="javascript:;" selectid="16">16年（192期）</a></li>
	                            <li><a href="javascript:;" selectid="17">17年（204期）</a></li>
	                            <li><a href="javascript:;" selectid="18">18年（216期）</a></li>
	                            <li><a href="javascript:;" selectid="19">19年（228期）</a></li>
	                            <li><a href="javascript:;" selectid="20">20年（240期）</a></li>
	                            <li><a href="javascript:;" selectid="25">25年（300期）</a></li>
	                            <li><a href="javascript:;" selectid="30">30年（360期）</a></li>
	                        </ul>
	                    </div>
	                    <input name="years" type="hidden" value="30" id="years">
	                </div>
	                <div class="js-radio">
	                    <a id="debx" class="on" onclick="$('#radioben').val('1'); $('#debj').removeClass('on'); $('#debx').addClass('on'); $('#benxi').show(); $('#benjin').hide();">等额本息</a>
	                    <a id="debj" class="" onclick="$('#radioben').val('2'); $('#debx').removeClass('on'); $('#debj').addClass('on'); $('#benjin').show(); $('#benxi').hide();">等额本金</a>
	                    <input name="radioben" type="hidden" value="1" id="radioben">
	                </div>
	                <input name="jisuan_radio" id="jisuan_radio" type="hidden" value="2">
	                <input id="price" name="price" type="hidden">
	                <input id="sqm" name="sqm" type="hidden">
	                <input id="singlelv" type="hidden" value="3.25" name="singlelv">
	                <div id="calc1_benjin" style="display: none;">
	                    <input type="hidden" name="fangkuan_total2">
	                    <input type="hidden" name="daikuan_total2">
	                    <input type="hidden" name="all_total2">
	                    <input type="hidden" name="accrual2">
	                    <input type="hidden" name="money_first2">
	                    <input type="hidden" name="month2">
	                    <input type="hidden" name="month_money2">
	                </div>                          
	                <div class="mainrtr01" style="display:none;">
	                    <ul>
	                        <li>&nbsp;&nbsp;房款总额：<input id="fangkuan_total1" name="fangkuan_total1" type="text" class="guestbook02" readonly="true">元</li>
	                        <li>&nbsp;&nbsp;贷款总额：<input name="daikuan_total1" type="text" class="guestbook02" readonly="true">元</li>
	                        <li>&nbsp;&nbsp;还款总额：<input name="all_total1" type="text" class="guestbook02 all_total1" readonly="true">元</li>
	                        <li style="padding-left: 0px;">支付利息款：<input name="accrual1" type="text" class="guestbook02" readonly="true">元</li>
	                        <li>&nbsp;&nbsp;首期付款：<input name="money_first1" type="text" class="guestbook02" readonly="true">元</li>
	                        <li>&nbsp;&nbsp;贷款月数：<input name="month1" type="text" class="guestbook02" readonly="true"></li>
	                        <li>&nbsp;&nbsp;月均还款：<input name="month_money1" type="text" class="guestbook02" readonly="true">元</li>

	                    </ul>
	                </div>

	            </div>
	            <div class="js-btn">
	                <a href="javascript:void(0)" onclick="javascript:ext_loantotal(document.calc11)"></a>
	            </div>
	            <div class="js-r">
	                <div class="js-jg" style="position: relative;">
	                    <h5 class="js-jg-tit">计算结果</h5>
	                    <div class="js-jg-msg">
	                        <em>均价：<b id="bb0"><?php echo $infos['jj_price'];?>元/平米</b></em>
                            <span id="gusuan1">估算总价：<?php echo ($infos['jj_price']*$rowsj[0]['mj'])/10000;?>万/套</span>
	                    </div>
	                    <div class="js-jg-txt js-jg-txt1"><span style="display: inline-block;margin-left: 15px;color: #883631;line-height: 42px;font-size: 14px;">首付：<span id="shoufu"></span></span></div>
	                    <div class="js-jg-txt js-jg-txt2">
	                        <span style="display: inline-block;margin-left: 15px;color: #883631;line-height: 42px;font-size: 14px;" id="daikuan_total1s"></span>
	                    </div>
	                    <div class="js-jg-txt js-jg-txt3">
	                        <span style="display: inline-block;margin-left: 15px;color: #883631;line-height: 42px;font-size: 14px;" id="accrual2s"></span>
	                    </div>
	                    <div id="b2-baidu">
	                        <div id="bb-baidu" style="display:none"><div id="main-baidu" style="height:400px;"></div></div>  
	                        <div class="js-jg-mon" id="benxi">
	                            每月还款：<em id="month_money1s"></em>
	                        </div>	   
	                        <div id="benjin" style="display: none;">&nbsp;&nbsp;月均金额：<textarea class="inputwidthnew" name="month_money3" rows="3" cols="20"></textarea>元</div>                    
	                        <div class="js-jg-wrap clearfix">
	                            <div class="js-jg-msg2">
	                                利率公积金<input id="gjlv" type="text" class="red guestbook01" value="3.25" style="width:29px;border: 0">% 商业性<input id="sdlv" type="text" class="red guestbook01" value="4.90" style="width:29px;border: 0">%<br>
	                                以上结果仅供参考
	                            </div>
	                        </div>
	                        <select id="lilv" name="lilv" style="display:none;" onchange="ShowLilvNew(this.form, document.calc11.years.value, this.value)">
	                            <option value="1">15年10月24日利率上限（1.1倍）</option>
	                            <option value="2">15年10月24日利率下限（95折）</option>
	                            <option value="3">15年10月24日利率下限（9折）</option>
	                            <option value="4">15年10月24日利率下限（88折）</option>
	                            <option value="5">15年10月24日利率下限（85折）</option>
	                            <option value="6">15年10月24日利率下限（7折）</option>
	                            <option value="7" selected="selected">15年10月24日基准利率</option>
	                            <option value="8">15年8月26日利率上限（1.1倍）</option>
	                            <option value="9">15年8月26日利率下限（85折）</option>
	                            <option value="10">15年8月26日利率下限（7折）</option>
	                            <option value="11">15年8月26日基准利率</option>
	                            <option value="12">15年6月28日利率上限（1.1倍）</option>
	                            <option value="13">15年6月28日利率下限（85折）</option>
	                            <option value="14">15年6月28日利率下限（7折）</option>
	                            <option value="15">15年6月28日基准利率</option>
	                            <option value="16">15年5月11日利率上限（1.1倍）</option>
	                            <option value="17">15年5月11日利率下限（85折）</option>
	                            <option value="18">15年5月11日利率下限（7折）</option>
	                            <option value="19">15年5月11日基准利率</option>
	                            <option value="20">15年3月1日利率上限（1.1倍）</option>
	                            <option value="21">15年3月1日利率下限（85折）</option>
	                            <option value="22">15年3月1日利率下限（7折）</option>
	                            <option value="23">15年3月1日基准利率</option>
	                            <option value="24">14年11月22日利率上限（1.1倍）</option>
	                            <option value="25">14年11月22日利率下限（85折）</option>
	                            <option value="26">14年11月22日利率下限（7折）</option>
	                            <option value="27">14年11月22日基准利率</option>
	                            <option value="28">12年7月6日利率上限（1.1倍）</option>
	                            <option value="29">12年7月6日利率下限（85折）</option>
	                            <option value="30">12年7月6日利率下限（7折）</option>
	                            <option value="31">12年7月6日基准利率</option>
	                            <option value="32">12年6月8日利率上限（1.1倍）</option>
	                            <option value="33">12年6月8日利率下限（85折）</option>
	                            <option value="34">12年6月8日利率下限（7折）</option>
	                            <option value="35">12年6月8日基准利率</option>
	                        </select>
	                    </div>
	                </div>

	            </div>
	        </div>
	    </form>
	</div>
	<!-- 计算器 end-->
		<div class="clear"></div>
		<!-- 问答 -->
		<script src="/js/jsq/echarts.min.js"></script>
<script src="/js/jsq/house.lilv.js"></script>
<script src="/js/jsq/house.index.js"></script>
<script type="text/javascript" src="/js/jsq/jsq.js"></script>
	
			
		<!-- 问答 end -->
	<div class="clear"></div>
	<!-- 热销楼盘 -->
    <style type="text/css">
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
              <a href="javascript:;"  class="hh-swt swtopen" onClick="sq();">在线咨询</a>
              
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
              <a href="javascript:;" onClick="sq();"  class="hh-swt swtopen">在线咨询</a>
              
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
	<!-- 楼盘相册 end-->
	<div class="h10"></div>
	<!-- 热销楼盘 -->
	

<div class="row row-top-nav" style="display: none;">
	<div class="top-menu-wrap"></div>
</div>



<script src="s_files/house-detail.js"></script>
<script src="s_files/jqmodal.js"></script>
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
makeCode('qrcode2',125,125,'<?php echo $site;?>loupan/<?php echo $lpid;?>.html');
makeCode('smtel',128,128,'<?php echo $site;?>/dacall.php?lpid=<?php echo $lpid;?>');
<?php if($hxtnum<>0){?>
	<?php for ($x=1; $x<=$hxtnum; $x++) {?>
		makeCode('hntel<?php echo $x;?>',130,130,'<?php echo $site;?>/dacall.php?lpid=<?php echo $lpid;?>');
	<?php }?>
<?php }?>
<?php if($wdnum<>0){?>
	<?php for ($x=1; $x<=$wdnum; $x++) {?>
		makeCode('hntels<?php echo $x;?>',130,130,'<?php echo $site;?>/dacall.php?lpid=<?php echo $lpid;?>');
	<?php }?>
<?php }?>

</script>

<script src="s_files/owl.js"></script> 
<script src="s_files/news_commont.js"></script>
<script src="s_files/common-enroll.js"></script>
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
                    <input type="hidden" name="ly" value="楼盘详情页-预约算价">     <!--报名来源 具体查看applyVerify.js文件中source 标识说明-->
                    <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->
                    <input type="text" name="mobile" placeholder="请输入您的手机号码" class="regist-input3 mt15" style="margin-top: 15px;">
        <div class="h30"></div>  
                    <input type="button" value="预约算价" class="m_Find_submit sign-btn3 apply_submit regist-submit">
               
            </form>
      
    </div>
</div>
<div class="send-mess lpm-bx4" style="display: none;">
    <p class="regist-title"><span class="lpm-bx3-t">语音播报</span>
    <span class="close close-send lpm-colse2" title="关闭" id="bmkfCallClose2">×</span></p>
    <div class="regist-form">
      <p class="send-mess-text1" id="box1_t">请输入正确的手机号码 ，置业顾问会尽快联系您</p>
      <form method="post" id="from-up11" action="/signup.php">
                    <input type="hidden" name="pid" value="33">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="lpid" value="<?php echo $lpid;?>">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="ly" value="楼盘详情页-语音播报">     <!--报名来源 具体查看applyVerify.js文件中source 标识说明-->
                    <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->
                    <input type="text" id="lp-nmkf-mobile11" name="mobile" placeholder="请输入您的手机号码" class="regist-input3 mt15" style="margin-top: 15px;">
       
        <div class="h30"></div>   
        <input type="submit" value="提交" class="regist-submit">
      </form>
    </div>
</div>
<?php include("../bottom.php");?>
<!-- 音频 -->

	<script type="text/javascript" src="/public/static/common/js/jquery.form.js"></script>
<div class="mediaplayer" style="position: fixed;bottom: 0;width: 100%;text-align: center;background: #000;opacity: .8;padding: 10px 0 10px 0;display: none;">
    <div class="video pr">
        <audio id="player" src="/<?php echo $infos['src9'];?>" controls="controls"></audio>
        <a href="javascript:;" id="closeyinp" style="position: absolute;top: -42px;right: 0px;"><img src="/public/static/home/image/v2.0/close.png"></a>
        <div id="yuyinzz" style="position: absolute;top: 1px;height: 50px;width: 100%;display: block;" onclick="openwid3('语音播报','提示：请输入您正确的手机号码继续免费收听，了解更多的楼盘详情。','楼盘内页_语音播报');"></div>
    </div>     
</div>
<div id="timers" style="display: none;"></div>
<script type="text/javascript">
$('.mediaplayer').on('click','#closeyinp',function(){
    var oPlayer=document.getElementById('player');
    oPlayer.pause();          
    $('.mediaplayer').hide();
});
// $('.yuyinbao').on('click','.openyinp',function(){
//     var oPlayer=document.getElementById('player');
//     oPlayer.play();          
//     $('.mediaplayer').show();
// });
$('.yuyinbao').on('click','.openyinp',function(){            
    var display =$('.mediaplayer').css('display');
	if(display == 'none'){
	   $('.mediaplayer').show();
	       var oPlayer=document.getElementById('player');
		    oPlayer.play();
		        var i = 10;
		        var tim = document.getElementById("timers");        
		        var timer = setInterval(function () {
		        	console.log(i);
		            if (i == -1) {
		                var name='语音播报';    
				        var wh='【】富力悦海湾楼盘内页_语音播报';    
				        var info='提示：请输入您正确的手机号码继续免费收听，了解更多的楼盘详情。';    
				        $('.lpm-bx3-t').html(name);
				        $('#lpsounce').val(wh);
				        $('#box1_t').html(info);
				        $(".lpm-bx4,#black_bg").fadeIn();
		                var oPlayer=document.getElementById('player');
		                 oPlayer.pause();        
		                clearInterval(timer);
		            } else {
		                tim.innerHTML = i;
		                --i;
		            }
		        }, 1000); //end
	}else{
		var name='语音播报';    
        var wh='【】富力悦海湾楼盘内页_语音播报';    
        var info='提示：请输入您正确的手机号码继续免费收听，了解更多的楼盘详情。';    
        $('.lpm-bx3-t').html(name);
        $('#lpsounce').val(wh);
        $('#box1_t').html(info);
        $(".lpm-bx4,#black_bg").fadeIn();
	}
});
$(function(){
    $('#from-up11').ajaxForm({
        beforeSubmit: checkForm11, // 此方法主要是提交前执行的方法，根据需要设置
        success: complete11, // 这是提交后的方法
        dataType: 'json'
    });
    function checkForm11(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#lp-nmkf-mobile11').val()))){            
        　layer.msg('手机号码有误，请重填', {icon: 5});
          $('#lp-nmkf-mobile11').focus(); 
          return false;
        }
       layer.load(1);
    }
    function complete11(data){         
    if(data.status==1){
       layer.closeAll();
       layer.alert('报名成功', {icon: 6});
       var oPlayer=document.getElementById('player');
       oPlayer.play();     
       $('#yuyinzz,.lpm-bx4,#black_bg').hide();
       return false;
    }else{
      layer.closeAll('loading');
      layer.open({content: data.info,time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;' });      
      return false; 
    }
  }  
    $("#bmkfCallClose2").on("click",function(){     
         $(".lpm-bx4,#black_bg").fadeOut();   
    });
 });
</script> 
	<script src="/js/lightbox-2.6.min.js"></script>
 
</body>
</html>
<?php include("../sq.php");?>