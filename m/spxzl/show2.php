<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="hn">
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
?>
<head>  
<script src="http://m.milike.com/gz/js/jquery/jquery.min.js"></script>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<meta name="wap-font-scale" content="no">
<meta id="viewport" name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0,target-densitydpi=medium"/>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta name="apple-mobile-web-app-status-bar-style" content="black-translucent" />
<meta content="telephone=no" name="format-detection" />
<meta content="email=no" name="format-detection" />
<title><?php echo $infos['title'];?>,<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>"> 
    <link rel="stylesheet" href="css2/house_v2.css" />
    <link href="../css2/my.css" rel="stylesheet">
    <script src="../js2/flexible.js"></script>
    <script  src="../js2/jquery.min.js" type="text/javascript"></script>
    <script src="../js2/jquery.form.js"></script>    
    <script src="../js2/layer.js"></script> 
    <link rel="stylesheet" href="../css2/swiper-3.4.2.min.css"/>    
    <link href="../css2/video-js.css" type="text/css" rel="stylesheet" />
    <script type="text/javascript" src="../js2/video.js"></script>
    <script src="../js2/swiper-3.4.2.min.js"></script> 
    <script src="css2/common.enroll.js"></script> 
</head>
<style>.qx-btn{color: #4fa536;font-size: 0.345rem;font-weight: normal;}
</style>
<body class="detailpage">
<div class="mf-content">
      <div class="zh_housecon-pic pr">
        <div class="zh_housecon-pic-img lincss"> 
            <ul>
                <li>
                    <div class="swiper-container">
                    <?php if($infos['src7']==''){?>
                    <div class="swiper-wrapper">
                        <div  id="cideoPlay1"></div>
						<div class="swiper-slide">
                        <a href="loupan_xc.php?lpid=<?php echo $lpid;?>">
                        <img src="<?php echo $site.$infos['img'];?>" width="100%" alt="效果图"></a>
                        </div>
					</div>

					<?php
					}else{
					?>
                        <div class="swiper-wrapper">
                                    
                            <div class="swiper-slide">
                                <div class="Tceng">
                                    <video id="cideoPlay1" width="100%" height="400px" controls poster="<?php echo $site.$infos['src8'];?>" webkit-playsinline="tes"  preload="none"> 
                                        <source src="<?php echo $site.$infos['src7'];?>" type="video/mp4" >                                    
                                        您的浏览器不支持HTML5视频                                    
                                    </video> 
                                </div>
                            </div> 
						<div class="swiper-slide">
                                <a href="loupan_xc.php?lpid=<?php echo $lpid;?>"> 
                                <img src="<?php echo $site.$infos['img'];?>" width="100%" alt="效果图"></a>
                            </div>
						</div>
                         <?php }?>    
                         <div class="swiper-pagination bbb"></div>
						</div>
                </li>
            </ul>
            <div class="lp_pic">
                <a href="" title='<?php echo $infos['title'];?>'>
                    <i></i>
                    <span>1/52</span>
                </a>
            </div>
            <script>
                $('.lp_pic').hide();
            </script>
        </div>
        <a delay="false" onclick="history.back(-1)" class="backicon"></a>
        <a delay="false" href="<?php echo $sitem;?>" class="backi"></a>
    </div>
<style>
.swiper-container-horizontal > .swiper-pagination-bullets, .swiper-pagination-custom, .swiper-pagination-fraction{width: 130px;bottom:5px;left:50%;margin-left:-65px;}
.swiper-pagination-bullet{border-radius:5px;display: inline-block;height: 18px;line-height: 18px;text-align: center;width: 40px;background: #fff;border:1px #48bf01 solid;    opacity:0.8;color: #48bf01;font-size: 12px;}
.bbb .swiper-pagination-bullet-active{background: #48bf01;opacity:1;}
.swiper-pagination-bullet-active{color: #fff;}
.lp_pic{z-index:2;display: none;}
.btn-ljtg{color: #f00;border: 1px solid #f00;border-radius: 5px;padding: 0px 5px;right: 12px;top: 17px;padding: 0.15rem 0.4rem;font-size: .35rem;position: absolute;}
</style>
<script>
    var proportion = 640 / 421;
    var width = $(window).width();
    var height = Math.round(width / proportion);
    $('.zh_housecon-pic-img').height(height);
    $('#cideoPlay1').height(height);
    $('.swiper-slide img').height(height);
    $('.swiper-slide').height(height);
	<?php if($infos['src7']==""){?>
    var mycars=new Array("图片","图片");
	<?php }else{?>
    var mycars=new Array("视频","图片");
	<?php }?>
    var video1=document.getElementById("cideoPlay1");
    var swiper = new Swiper('.swiper-container', {
    pagination: '.swiper-pagination',
    paginationClickable: true,
    onSlideChangeEnd: function(swiper){
    if(swiper.activeIndex==1){
    video1.pause();
    $('.lp_pic').show();
    }else if(swiper.activeIndex==0){
    // video1.play();
    $('.lp_pic').hide();
    }
    },                        
    paginationBulletRender: function (swiper, index, className) {
    return '<span class="' + className + '">' + mycars[index] + '</span>';
    }
    });
    video1.onclick=function(){
    if(video1.paused){
    video1.play();
    }else{
    video1.pause();
    }
    }
</script>
<!-- 轮播 end-->
    <div class="house-nav1 htop1">
	<div class=""  id="">
        <ul class="house-nav-navh">
            <li><a href="show.php?lpid=<?php echo $lpid;?>"><i class="icon1"></i><p>主页</p></a></li>
            <li><a href="xmxx_show.php?lpid=<?php echo $lpid;?>"><i class="icon2"></i><p>详情</p></a></li>
            <li><a href="loupan_hx.php?lpid=<?php echo $lpid;?>"><i class="icon3"></i><p>户型</p></a></li>
            <!--<li class="act"><a href="/zb/<?php echo $lpid;?>.html#project_zb"><i class="icon4"></i><p>配套</p></a></li>-->
            <li class="last-wrap"><a href="wenda.php?lpid=<?php echo $lpid;?>"><i class="icon5"></i><p>问答</p></a></li>
        </ul>
    </div>
    </div>
    <div class="build-intro-wrap">        
        <a href="javascript:;" data-id="<?php echo $lpid;?>" data-name="<?php echo $infos['title'];?>"  onclick="openwid('报名团购','我们将为您保密个人信息！千人团购火热报名中，立享最优惠的购房政策。','【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>楼盘内页_报名团购');" class="btn-ljtg btn-dynamic ">报名团购</a>        
        <div class="clearfix">
             <span class="title"><?php echo $infos['title'];?></span>
             <span class="type">[<?php
					$flagztz='';
					  $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='8' and `flag_st`='1' order by `flag_px` asc ");
					foreach($rowflag as $listflag){
						if(preg_match("#".$listflag['flag_bm']."#", $infos['ztz'])){
							echo $listflag['flag'];
						}
					}
					?>]</span>
             <span class="bm" style="display: none;"><b><?php echo (int)$list['esfcx'];?></b>人已报名</span>
        </div>
        <div class="price-total clearfix" id="price-total" style="display:none;">
            <span class="tag-1">品牌地产</span><span class="tag-2">报销机票</span><span class="tag-3">精装修</span><span class="tag-4">专车看房</span>        </div>
          
        <div class="clearfix" style="position: relative;">
            <span class="price mf-fl">
             <?php if($infos['all_price']==0){?>
                            <?php if($infos['jj_price']==0){
								echo '<FONT class=font_01>待定</FONT>';
							}else{
								?>
                             <small>均价：&nbsp;</small><b><?php echo $infos['jj_price'];?></b>元/㎡
							<?php }?>
							<?php }else{echo '<small>总价：&nbsp;</small><b>'.$infos['all_price'].'</b>万/套';}?>
            </span>
          
        </div>
        <div class="icontent">            
            <small>主力户型：</small>
            <i class="imgico i-next"></i><?php echo $infos['zlhx'];?>
        </div>  
        <div class="icontent">            
            <small>开盘时间：</small>
            <i class="imgico i-next"></i><?php echo $infos['kptime'];?>
        </div>
        <div class="icontent">            
            <small>楼盘地址：</small>
            <i class="imgico i-next"></i><?php echo $infos['xmdz'];?>
            <span class="ditu"><a href="#map"><i><img src="../image2/icons/dingwei.png" width="30%"></i></a></span>
        </div>
		
        <div class="wui-line-btn g-press open-lpextend">更多信息</div>
        <div class="clear"></div>
        <?php if($infos['src9']<>""){?>
        <div class="center yuyinbao">
            <a href="javascript:;" class="openboyin">
                <img src="../image2/yuyin.jpg" width="100%">
            </a>
        </div>
        <?php }?>
        <ul class="link-a fl">
            <li>
			    <a  href="javascript:;" data-id="<?php echo $lpid;?>" data-name="<?php echo $infos['title'];?>" onclick="openwid('优惠通知我','价格变动这么快？！楼盘降价的消息我们将第一时间通知您！','【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>楼盘内页_优惠通知我');" class="btn btn-dynamic  link-ak fl"><span class="link-ak-ik">优惠通知我 </span></a>
              
			   <a  href="javascript:;" data-id="<?php echo $lpid;?>" data-name="<?php echo $infos['title'];?>" onclick="openwid('认筹通知我','楼盘总是悄无声息的认筹？楼盘的最新认筹信息会第一时间通知您！','【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>楼盘内页_认筹通知我');" class="btn btn-dynamic  link-ab fr"><span class="link-ak-ik">认筹通知我</span></a>
               
            </li>
        </ul>	        
    </div>
    <div class="lpitem g-press">
                           
            <a data-tag="1" href="tel:<?php echo $config['company_tel'];?>" class="lptel pad10" id="lptel">
            <p class="telinfo">
                <span class="num">售楼处：<?php echo $config['company_tel'];?></span>最新政策，更多优惠详情，请致电售楼处
            </p>
            <p class="phone"><img src="../image2/icons/lll.png" width="80%" style="margin-top: 0.2rem;"></p>
         </a>
          
    </div>
    	<!--优惠信息-->
    <div class="lqyh">
        <div class="lqyh_main">
            <div class="lqyh_h">
                <p class="t"><span><img src="../image2/icons/youhuiwenz.png" alt=""></span></p>
                <p class="b" style="display: none;">资深顾问服务、房源推荐、购房咨询、免费接机</p>
                <p class="b"><?php echo $infos['cxxx'];?></p>
            </div>
            <div class="lqyh_inpu">
                <form id="frm_up_1" method="post" action="../save.php?action=lpbm">
                    <input type="hidden" name="post[house_id]" value="<?php echo $lpid;?>">
                    <input type="hidden" name="post[subject]" value="<?php echo $infos['title'];?>">
                    <input type="hidden" name="post[name]" value="游客">
                    <input type="hidden" name="upcode" value="97685">
                    <input type="hidden" name="post[sounce]" value="海口[<?php echo $infos['title'];?>]_前往领取">
                    <input class="hy_sj" type="text" placeholder="请输入您的手机号码" name="post[phone]" autocomplete="off" id="mobile_1">
                    <a class="sub" type="submit" href="javascript:;"><input class="sub_hd" type="submit" value="前往领取"></a>
                </form>
            </div>
              
            <div class="lqyh_bottom">已有<span>&nbsp;<?php echo (int)$list['esfcx'];?>&nbsp;</span>人获取</div>
        </div>
    </div>
	    <!-- 领视频 -->    
    <div class="lqsp-box" style="display:none;">
         <a href="javascript:;" class="btn-lqsp" data-id="<?php echo $lpid;?>" data-name="<?php echo $infos['title'];?>" onclick="openwid('领取视频','我们将为您保密个人信息！深入了解房子面貌，获取真实房源信息！!','【海口】华盛中央公园楼盘内页_领取视频');">领取视频</a>
        <div style="padding: 5px 5px 5px 43px;">       
        <p  class="lqsp-1">视频看房 真实体验</p>
        <p class="lqsp-2">深入了解房子面貌，获取真实房源信息！</p>
        </div>
    </div>
    <div class="blank10"></div>    
<style type="text/css">
.lqsp-box{width:auto;height:auto;padding:5px;position:relative;margin-top:10px;background:#fff url(../image2/icons/video.png) no-repeat 3px;background-size:37px 40px}
.btn-lqsp{position:absolute;right:5px;width:1.6rem;text-align:center;color:#fff;background:#48bf01;padding:.2rem;top:16px;font-size: .35rem;border-radius: 5px;}
.lqsp-box .lqsp-1{font-size: .5rem;}
.lqsp-box .lqsp-2{font-size: .3rem;padding-top: 3px;}
</style>
    <!-- 领视频 end-->
    <!--优惠信息
                <div class="preferential" style=" display: none;">
            <div class="title">最新优惠</div>
            <div class="content">
                <ul class="list">
                    <li>临街旺铺建面30.99-426.67㎡ 全款98折</li>
               </ul>
            </div>
            <div class="btn-area" id="ticebtn">
                <a href="javascript:;" data-name="领优惠" data-type="临街旺铺建面30.99-426.67㎡ 全款98折" class="btn-pre new_common_free_btn bmkf-up" style="">领优惠</a>
            </div>
        </div>
         -->
    <div class="clear"></div>
    <div class="block-wrap">
        <div class="bk-title"><div class="title">最新动态<div class="more1"><a href="news.php?lpid=<?php echo $lpid;?>">更多动态 <span class="ico ico-more"></span></a></div></div></div>
        <div class="bk-main">
           <div class="lastwrap newlastwrap">
              <?php
			$row = $mysql->query("select * from `web_content` where `pid`='28' and `lpid`='{$lpid}' order by addtime desc limit 0,2");
			foreach($row as $k=>$list){
		?>
				<div class="litem">
                    <h2> <a href="/news/show.php?id=<?php echo $list['id'];?>" style="display: block;"><?php echo $list['title'];?> <?php echo date('Y-m-d',strtotime($list['addtime']));?></a></h2>
                    <div class="clear"></div>
                    <p class="lcontent"><?php echo mb_substr(strip_tags($list['content']),0,55,"utf-8");?></p>                       
              </div>
        <?php
			}
		?>
				
				<div class="news-notice center">
				<a  href="javascript:;" style="float: left;width: 100%;" data-id="<?php echo $lpid;?>" data-name="<?php echo $infos['title'];?>" onclick="openwid('最新动态通知我','楼盘最新的开盘/价格变化/优惠折扣会在第一时间通知您！','【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>楼盘内页_最新动态通知我');" class="btn btn-dynamic ">最新动态通知我</a>
				</div>
            </div>
        </div>
    </div>
    <div class="block-wrap" id="htype">
        <div class="bk-title">
            <div class="title">户型一览<div class="more1"><a href="loupan_hx.php?lpid=<?php echo $lpid;?>">更多户型 <span class="ico ico-more"></span></a></div>
        </div>
    </div>
    <div class="sizetype">
        <ul class="clearfix">
        <?php
		$hxxs=0;
	 $rowxc = $mysql->query("select * from `web_flag` where `flag_fl`='41' and `flag_st`='1' order by `flag_px` asc");
     foreach($rowxc as $xclist){
		 if(countxc1($xclist['id'],$lpid)<>0){
			 $hxxs=$hxxs+1;
	 ?>
       <li <?php if($hxxs==1){echo 'class="typeOn"';}?>><?php echo $xclist['flag'];?></li>
      <?php
      }
      }
	  ?>
		</ul>
    </div>
     <?php
	/*	$hxxs=0;
	 $rowxc = $mysql->query("select * from `web_flag` where `flag_fl`='41' and `flag_st`='1' order by `flag_px` asc");
     foreach($rowxc as $xclist){
		 if(countxc1($xclist['id'],$lpid)<>0){
			 $hxxs=$hxxs+1;*/
	 ?>
       <div class="bk-main sizewrap show<?php //if($hxxs==1){echo 'show';}?> clearfix">
       	<?php
        if($xclist['id']<>''){
			$sqlss=" and `pid_hx` ='{$xclist['id']}' ";
			}
		$row = $mysql->query("select * from `web_pic` where `luopan_id`='{$lpid}' and `pid_flag`='xc1' order by pic_px desc limit 0,5");// {$sqlss}
			foreach($row as $k=>$list){
		?>
			<div class="sizeitem">
            <a href="loupan_hx.php?lpid=<?php echo $lpid;?>">
                <span class="imgwrap"><img src="<?php echo $site.$list['pic_img'];?>"></span>
                <span class="sispan"><b><?php echo $list['pic_name'];?></b></span>
                <span class="sispan" style="display:none;"><b>住宅</b>户型图</span>
                <span class="sispan price" style="display:none;"><b>78</b>万元/套</span>
            </a>
       		 </div>
             <?php }?>
                
    </div>
      <?php
     /* }
      }*/
	  ?>
    </div>
<div  class="clear"></div>
<div class="block-wrap">
     <div class="prefe">
        <div class="prefe_title" style="display: none;">特价<br />房源</div>
        <div class="prefe_content">
            <ul class="prefe_list">			      
                <li>好户型那么多，我们为您精选！</li>
           </ul>
        </div>
        <div class="prefe_btn-area" id="cewrap">
		<a  href="javascript:;" onclick="openwid('好户型那么多，我们为你精选！','我们将为您保密个人信息！资深顾问为您精选合适您的房源！','【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>楼盘内页_找好户型？好朝向？问底价？');" class="btn btn-dynamic " data-id="<?php echo $lpid;?>" data-name="华盛中央公园">免费询问</a>
           
        </div>
      </div>
</div>
<div  class="clear"></div>
    <div class="block-wrap">
        <div class="bk-title">
            <div class="title">相册一览</div>
        </div>
        <div class="bk-main reasonwrap">
            <div class="retype clearfix">
            <?php
            $row = $mysql->query("select * from `web_flag` where `flag_fl`='9'  and `flag_bm`<>'xc1' and `flag_st` = '1' order by flag_px asc limit 0,10");
			foreach($row as $k=>$list){
			?>
                <span <?php if($k==0){echo 'class="rton"';}?>><?php echo $list['flag'];?></span>
            <?php }?>
            </div>
            <?php
            $row = $mysql->query("select * from `web_flag` where `flag_fl`='9'  and `flag_bm`<>'xc1' and `flag_st` = '1' order by flag_px asc limit 0,10");
			foreach($row as $k=>$list){
			?>
			<div class="reitem" id="photoBox"  <?php if($k==0){echo 'style="display:block;"';}?>>
             <ul>
             	<?php
                $row2 = $mysql->query("select * from `web_pic` where `luopan_id`='{$lpid}' and `pid_flag`='{$list['flag_bm']}' order by pic_px desc limit 0,4");
				
				foreach($row2 as $k=>$lists){
				?>
                    <li>
                          <a href="loupan_xc.php?lpid=<?php echo $lpid;?>">
                        <p> <img src="<?php echo $site.$lists['pic_img'];?>" alt="<?php echo $lists['pic_name'];?>"></p>
                         <span><?php echo $lists['pic_name'];?></span>
                        </a>
                    </li>
                    <?php }?>
					</ul>   
            </div>
            <?php }?>
			
            <div class="clear"></div>
            <div class="showall"><a href="loupan_xc.php?lpid=<?php echo $lpid;?>">查看更多 ></a><i class="imgico i-xiala"></i></div>
        </div>
</div>

<div  class="clear"></div>
<div class="block-wrap">
    <div class="bk-title"><div class="title">楼盘问答</div></div>
        <div class="bk-main buildlistwrap newbuildlistwrap">
            <div class="buildtype"><h3 class="type">请将您的<b class="red"> 疑问 </b>告诉我们吧</h3></div>
            <div class="blank10"></div>
                <div class="builditemh">
                     <form id="frm_up_322" method="post" action="save.php?action=wenda" onsubmit="return checkLmt(this);">
                        <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
                        <input type="hidden" name="pid" value="30">
                        <input type="text" name="utel" value="" placeholder="请输入您的手机号码" style="width:80%; height:30px; line-height:30px;">
                        <textarea name="ucontent" id="content" cols="" rows="" placeholder="请输入您想了解的问题"></textarea>                                 				
                        <div class="blank10"></div>
                        <input type="submit" class="go btns3" value="马上提交">
                    </form>
                </div>
                <div class="blank5"></div>
                <dl class="askx">
                    <!-- 问答 -->
                    <div class="user-cmt-list">
                    	 <?php
			
							$row = $mysql->query("select * from `web_book` WHERE `pid`='30' and `cl`='1' and `lpid`='{$lpid}' order by id desc limit 0,3");//and `cl`='1'
							 foreach($row as $k=>$list){
							?>
			<div class="user-cmt">
                                <div class="face">
                                    <span><img src="../image2/icons/img-face3.png" alt=""></span>
                                </div>
                                <div class="text">
                                    <div class="user-info">
                                        <span class="fr c999"></span>
                                        <h4 class="name"  style="color:#bbb;">游客</h4>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="cmt-detail">
                                        <p><?php echo $list['ucontent'];?></p>
										<p style="color:#bbb;"><?php echo $list['addtime'];?></p>
                                    </div>
                                    <div class="cmt-opt">
                                        <div class="date"></div>
                                    </div>
                                     <?php if($list['acontent']<>''){?>
										<div class="msn_2">
                                                <span class="c999">答：</span>
                                                <span class="f35"><?php echo $list['acontent'];?></span>
                                            </div>
                            <?php }?>
                                                                
                                </div>
                                <div class="clear"></div>      
                                <div class="blank10"></div>
                            </div>
                            <?php }?>
                                                    
                                                                
                      </div>                       
                      
                    <!-- 问答 end-->

                </dl>                
            </div>
			<a class="more" href="wenda.php<?php echo $lpid;?>" style="font-size: .35rem">加载更多问答</a>
            <div class="blank5"></div>
        </div>
            <div class="block-wrap" id="htype">
        <div class="bk-title">
            <div class="title">地理位置</div>            
        </div>        
    </div>
    <div class="zbpt bg-1">
        <div class="mapwrap pr">
            <div class="imap">
			  <style type="text/css">
            #allmap{width:100%;height:210px;}
            #allmap p{margin-left:5px; font-size:14px;}
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
			  title : "<font style='color:#F90;font-size:14px'>123</font>" , // 信息窗口标题
			  enableMessage:false,//设置允许信息窗发送短息
			}
			//var infoWindow = new BMap.InfoWindow("<?php echo $infos['map'];?>", opts);  // 创建信息窗口对象 
				map.openInfoWindow(infoWindow,point); //开启信息窗口
				marker.addEventListener("click", function(){          
		map.openInfoWindow(infoWindow,point); //开启信息窗口
	});
		</script>
            </div>
            
        </div>
        
    </div>
    <div  class="clear"></div>
    <div  class="blank10"></div>
        <div class="block-wrap">
            <div class="bk-title"><div class="title">喜欢此楼盘的人还看了</div></div>
            <div class="build-list">
                   <ul id="ajaxhouse">
                    <?php
                         $row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$infos['city_id']}' order by px desc limit 0,5");// and `flag` like '%t1%'
                                foreach($row as $k=>$list){
							$url="show.php?lpid={$list['id']}";
                            ?>
                        <li>
                    <div class="item-new">
                        <a class="project_view_track" href="<?php echo $url;?>">
                            <div class="img-area pr">
                                <img src="<?php echo $site.$list['img'];?>" alt="<?php echo $list['title'];?>">
								<?php if($list['src7']<>''){?><i class="hp-1">视频</i><?php }?> 
							</div>
                            <div class="des">
                                <div class="tr">
                                    <h3><?php echo $list['title'];?></h3>
                                    <!--on:在售，none:售罄，not:未售，hot:火爆在售,will:待售-->
                                    <div class="lb-area"><span class="lbs lbs-hot">[<?php
					$flagztz='';
					  $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='8' and `flag_st`='1' order by `flag_px` asc ");
					foreach($rowflag as $listflag){
						if(preg_match("#".$listflag['flag_bm']."#", $list['ztz'])){
							echo $listflag['flag'];
						}
					}
					?>]</span></div>
                                </div>
                                <div class="tr">
                                    <div class="place"><?php echo $list['xmdz'];?></div>
                                            
                                    <div class="price"> <?php if($list['jj_price']!=0){echo ''.$list['jj_price'].'元/㎡';}else{echo '<FONT class=font_01>待定</FONT>';}?></div>
                                </div>
                                <div class="text">                            
                                   <?php echo loupanflagts86($list['flagts'],6);?>                            
                                </div>
                                <div class="">
                                    <div class="text">已有<b style="color:red;"><?php echo (int)$list['esfcx'];?></b>人报名看房</div>
                                </div>
                            </div>
                            <div class="clearfix"></div>                            
                        </a>
                    </div>
                   </li>
            	<?php
                            }
                        ?>
					
</ul>
            </div>               
        </div>
        <div class="clear"></div>
        <div style="height: 40px;"></div>
    </div>
</div>
<input type="hidden" id="houseid" value="<?php echo $lpid;?>">
<input type="hidden" id="subject" value="华盛中央公园">
<div class="blackwrap dnoticebtn" id="dnoticebtn">
    <div class="whitewrap">
        <span class="closeicon"><i class="imgico i-close"></i></span>
        <p class="title" id="btn_1">降价通知我</p>
        <small id="btn_2">我们将为您保密个人信息！降价消息及时发送到您的手机！</small>
        <form id="frm_up_2" method="post" action="http://m.lou86.com/hk/ajax_enroll.html">
        <div class="tellbox"><span>手机号</span>
            <input type="hidden" name="post[sounce]" value="" id="btn_4">
            <input type="hidden" name="post[house_id]" value="" id="btn_5">
            <input type="hidden" name="post[subject]" value="" id="btn_6">
            <input type="hidden" name="post[name]" value="游客">
            <input type="hidden" name="upcode" value="97685">   
            <input type="text" maxlength="11" name="post[phone]" id="mobile_2" placeholder="请预留您的电话">
            </div>                         
            <input type="submit" value="提交" class="okbtn">
        </form>
    </div>    
</div>
<!-- 底部电话 -->
<style>
a{cursor: pointer;}
a:hover{text-decoration:none;}
#consultTel .dsad:hover{background: #388f03;text-decoration:none;} 
#consultTel .orderbtn+.telbtn:hover{background:#c54547;text-decoration:none;}
</style>
<div id="consultTel">
<a  href="javascript:;"  onclick="openwid('预约看房','我们将为您保密个人信息！为您提供本楼盘免费预约专车看房服务！','【海口】华盛中央公园_预约看房');" class="btn btn-dynamic  orderbtn dsad" data-id="<?php echo $lpid;?>" data-name="华盛中央公园"><i class="imgico i-time"></i>预约看房</a>
    
    <a  id="tel" href="tel:<?php echo $config['company_tel'];?>" class="telbtn dsfdf">
    <i class="imgico i-tell"></i>拨打售楼处电话</a>
</div>
<script src="../js2/common.js"></script>
<!-- 商桥 -->
<style type="text/css">
.popBox{background:#fff;border-radius:5px;width:80%;height:400px;-moz-box-shadow:0 0 10px 5px #f3bc5f75;-webkit-box-shadow:0 0 10px 5px #4e4e4d75;box-shadow:0 0 10px 5px #4e4e4d75}
.popBox .close{position:absolute;right:-10px;top:-10px;background:#fff;height:36px;width:36px;border-radius:50%}
.popBox .close ins{margin-top:3px;margin-left:3px}
.popBox .closeIcon{font-size:30px;color:#ff6005;text-decoration:none}
.popBox .title{background:#f8f8f8;height:65px;line-height:65px;padding-left:26px;color:#48bf01;font-size:20px;border-radius:5px 5px 0 0}
.popBox .textBox{overflow-y:auto;height:270px}
.popBox .text{font-size:18px;color:#555;margin:15px 22px;line-height:28px}
.popBox .btnBox{bottom:0}
.popBox .btnBox a{font-size:18px;color:#fff;text-decoration:none}
.popBox .tel{float:left;background:#48bf01;height:65px;width:50%;border-radius:0 0 0 5px;line-height:65px;text-align:center}
.popBox .online{float:left;background:#ff6d6f;height:65px;width:50%;border-radius:0 0 5px 0;line-height:65px;text-align:center}
ins{font-family:iconfont;font-style:normal;font-weight:400;speak:none;display:inline-block;text-decoration:inherit;width:1.5em;margin:0;text-align:center;font-variant:normal;text-transform:none;vertical-align:middle}
.icon-16{background: url(../image2/icons/close2.png) no-repeat;    padding: 14px 0px;}
.icon-18{background: url(../phone/image2/icons/tel1.png) no-repeat;    padding: 11px 0px;}
.icon-5{background: url(../image2/icons/msn1.png) no-repeat;    padding: 11px 0px;}
</style>    

    </div>
</div>
<div id="fade" class="black_overlay"></div>    
<script type="text/javascript">
//    jQuery(function ($) {
//        //页面层
//        var layerId = layer.open({
//            type: 1
//            , content: $(".popBox").html()
//            , anim: 'up'
//            , shadeClose: false
//            , className: 'popBox'
//            , style: '  border-radius: 5px;'
//        });
//        $(".popBox .close").click(function () {
//            layer.closeAll();
//        })
//    });
</script>  

<?php include("../bottom2.php");?>

<div style="height: 50px"></div>
<div class="s_group3">
    <div class="struts">
        <div class="order">
            <div style="height: 1.2rem;background: url(../image2/yinp_2.png)no-repeat;background-size: 100%">
                
            </div><!--make_tit end-->
            <div class="make_tit_3"><span class="t-3" id="make_tit_3">提示：请输入您正确的手机号码继续免费收听，了解更多的楼盘详情。</span></div>
            <form id="frm_up_11" method="post" action="../save.php?action=baomingyj">
             <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
<input type="hidden" name="pid" value="33">
<input type="hidden" name="ly" value="手机楼盘语音讲房" id="make_tit_4f">                     
                <div class="make_form">
                    <ul>                               
                        <li><input type="text" name="utel" id="mobile_11" placeholder="请输入您的手机号码" class="inp"></li>                               
                    </ul>
                    <div class="clear"></div> 
                </div>
                <div class="blank10"></div>
                <div class="make_submit">                       
                    <a onclick="wid_close3();" class="qx-btn fl" style="color: #48bf01;">取消</a>
                    <input type="submit" value="确定" name="bsubmit"  style="color: #48bf01;" class="fr">
                    <div class="clear"></div>                
                </div>
            </form>
        </div>
    </div>
</div>
<div class="s_alert3"></div>
<!-- 音频 -->
<div class="mediaplayer" style="position: fixed;bottom: 47px;width: 100%;text-align: center;background: #000;opacity: 1;padding: 10px 0 10px 0;display: none;">
    <div class="video pr">
        <audio id="player" src="<?php echo $site.$infos['src9'];?>" controls="controls"></audio>
        <a href="javascript:;" id="closeyinp" style="position: absolute;top: -42px;right: 0px;"><img src="../image2/close.png"></a>
        <div id="yuyinzz" style="position: absolute;top: 1px;height: 50px;width: 100%;" onclick="openwid3('语音播报','提示：请输入您正确的手机号码继续免费收听，了解更多的楼盘详情。','【海口】富力红树湾楼盘内页_语音播报');"></div>
    </div>     
</div>
<div id="timers" style="display: none;"></div>
<script type="text/javascript">
$('.mediaplayer').on('click','#closeyinp',function(){
    var oPlayer=document.getElementById('player');
    oPlayer.pause();          
    $('.mediaplayer').hide();
});
/*$('.yuyinbao').on('click','.openyinp',function(){
    var oPlayer=document.getElementById('player');
    oPlayer.play();          
    $('.mediaplayer').show();
});*/
$('.yuyinbao').on('click','.openboyin',function(){        
    $('.mediaplayer').show();
    var oPlayer=document.getElementById('player');
    oPlayer.play();
        var i = 15;
        var tim = document.getElementById("timers");
        var timer = setInterval(function () {
            if (i == -1) {
                openwid3('语音播报','提示：请输入您正确的手机号码继续免费收听，了解更多的楼盘详情。','【海口】富力红树湾楼盘内页_语音播报');
                var oPlayer=document.getElementById('player');
                 oPlayer.pause();        
                clearInterval(timer);
            } else {
                tim.innerHTML = i;
                --i;
            }
        }, 1000);
});
</script>
</body>
</html>
