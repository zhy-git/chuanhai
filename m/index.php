<html lang="zh-cn">
<?php
require("../conn/conn.php");
include("function.php");
if($sitecityid==""){
	//header("location:city.html");
	echo "<script language='javascript'
type='text/javascript'>"; 
echo "window.location.href='http://beihai.chuanhai.".$siteasd."/m/'"; 
echo "</script>";  
	}
?>
  <head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1.0,minimum-scale=1.0">
    <meta name="csrf-param" content="_csrf">
    <title><?php echo $config['site_name'];?></title>

    <meta name=keywords content="<?php echo $config['site_keyword'];?>">
    <meta name=description content="<?php echo $config['site_desc'];?>">
    <script src="/public/static/phone/js/v2.1/flexible.js"></script>    
    <link href="/public/static/phone/css/v2.1/index.css?2" rel="stylesheet">        
    <script src="/public/static/libs/jquery/1.x/jquery.min.js" type="text/javascript"></script>
    <script src="/public/static/common/js/jquery.form.js"></script>    
    <script src="/public/static/libs/layer/mobile/layer.js"></script>   
    <script src="/public/static/phone/js/slider.js" type="text/javascript"></script>
    <!--<script src="//msite.baidu.com/sdk/c.js?appid=1599154404206584"></script>-->
<?php include("sq2.php");?>    
</head>
<body> 
<!-- 首页广告弹窗 -->
  <style>
    .s11{
        position: fixed;
        top: 0;
        /*display: none;*/
        left: 0;
        right: 0;
        bottom: 0px;
        z-index: 11111111111111111111;
        background: rgba(0, 0, 0, .7);
    }
    .s11 .s11-ref{
        margin: 0px auto;
        display: block;
        width: 75%;
        position: absolute;
        top: 30%;
        left: 10%;
    }
    .s11 .s11-ref img{
        width: 100%;
        height: auto;
    }
    .s11 .time{
        position: absolute;
        top: 10px;
        right: 10px;
        padding: 4px 15px;
        color: #d6d3d3;
        background: #131212;
        border-radius: 74px;
    }

    .s11 .skin{
        position: absolute;
        bottom:200px;
        right: 12%;
        padding: 8px 15px;
        color: #d6d3d3;
        background: #131212;
        z-index: 2;
        border-radius: 74px;
    }
    .s11 .time .cou{
        font-size: 17px;
        font-weight: bold;
        color: #48bf01;
    }
    /*首页专家团 2020-11-23 zhy*/
    .index-header2 {
    position: relative;
    box-sizing: border-box;
    background: url(/image/top_bg.jpg) no-repeat;
    background-size: 100% 100%;
    height: 5.30rem;
    }
    .index-header{
    position: absolute;
    top: 0;
    left: 0;
    width: 10rem;
    margin: .366667rem auto 0;
    z-index: 20;
    background: inherit
    }
    .index-header .search {
    width: 48%;
}
.index-header .header-top .city-change {
    float:right;padding-right:0.3rem;padding-top: 0.1rem;
}
.city{
   color: #ffffff;font-size:.426667rem;
}
.index-nav-ul {
    display: -webkit-box;
    display: -webkit-flex;
    display: -moz-box;
    display: -ms-flexbox;
    display: flex;
    /*position: absolute;*/
    bottom: 0;
    left: 0;
    width: 100%;
    height: .53rem;
    padding-top: .02rem;
    -webkit-box-align: center;
    -webkit-align-items: center;
    -moz-box-align: center;
    -ms-flex-align: center;
    align-items: center;
    background: #efefef;
    z-index: 10;
}
.index-nav-ul li {
    -webkit-box-flex: 1;
    -webkit-flex: 1;
    -moz-box-flex: 1;
    -ms-flex: 1;
    flex: 1;
    text-align: center;
    font-size: .27rem;
    color: #48bf01;
}
.index-nav-ul a {
    display: block;
    color: #48bf01;
}
 .index-nav-ul .icon-pp {
    background: url(/public/static/phone/image/hg.png) no-repeat -1px -2px;
    background-size: 13px 15px;
}
.index-nav-ul .icon-ry {
    background: url(/public/static/phone/image/jiang.png) no-repeat -1px -1px;
    background-size: 13px 15px;
}
.index-nav-ul .icon-xl {
    background: url(/public/static/phone/image/ren.png) no-repeat 0 -1px;
    background-size: 12px 13px;
}
.index-nav-ul .icon-bz {
    background: url(/public/static/phone/image/bz.png) no-repeat 0 -1px;
    background-size: 12px 13px;
}
.city-change .ico-down {
  padding: 5px;
    background: url(/public/static/phone/image/down4.png) no-repeat 0 -1px;
    background-size: 14px 9px;
}
.index-nav-ul .icon {
    display: inline-block;
    vertical-align: text-bottom;
    padding: 7px 6px;
}
.index-header h3 {
    padding-left: 1.1em;width: 20%;
}
.index-header h3 img {
    width: 100%;
}

.hot-men h3 {
  height:1.35em;
     font-weight: normal; 
     color: #000000; 
     font-size: .48rem; 
     line-height: 1.3; 
     margin: 0px !important; 
}
.priority {
     padding-top:0rem; 
}
.index-header .header-top {
    width: auto;
}
.index-header h3 img {
    margin-top: .14rem;
}
</style>
<?php
      $row = $mysql->query("select * from `web_link` where `ad_id`='89' and `city_id` = '{$city_id}' order by px asc limit 1");
      foreach($row as $k=>$list){
  ?>
<div class="s11" style="<?php if($list['st']==0){ echo "display:none";}?>">
    <span class="time">倒计时： <em class="cou">1</em> 秒</span>
        <a href="<?php echo $list['link_url'];?>" class="s11-ref">
            <img src="/<?php echo $list['img'];?>" alt="<?php echo $list['title'];?>">
        </a>
    <span class="skin">跳过活动</span>
</div>
<?php } ?>
<script>
    if (localStorage.setItem('hideS11',true)===undefined){
        localStorage.setItem('hideS11',true);
    }
    var vv=5;
    var yy = window.setInterval(function () {
        vv = vv-1;
        if (vv<1 && localStorage.getItem('hideS11')){
            localStorage.setItem('hideS11',true);
            $('.s11').hide();
            window.clearInterval(yy);
        }else{
            $('.cou').html(vv);
        }
    },1000);
    $('.skin').click(function () {
        localStorage.setItem('hideS11',true);
        $('.s11').hide();
        window.clearInterval(yy);
    });
</script>
  <!-- 首页广告弹窗 end -->
<div class="container">
  <!--nav begin-->
  <div class="rows">
     <!-- logo city search -->
      <div class="index-header">
                    <h3><img src="/public/static/phone/image/logo2.png"></h3>
                    <div class="header-top"><div class="city-change">
                      <a href="city.html">
                          <span class="city"><?php if($sitecityname<>''){echo $sitecityname;}else{
							  $sitecityid=44;
							  echo '防城港';
							  }?></span>
                          <span class="ico ico-down">展开</span>
                      </a>
                  </div>
              <div class="search">
                  
                  <div class="ipt-area">
                    <form action="loupan/" method="get">
                      <input type="text" placeholder="请输入楼盘名称" required="" class="itext" name="key">
                      <input type="submit" class="search-btn" value="">
                    </form>
                  </div>
              </div>
          </div>    
      </div><!-- logo city search -->
      <div class="index-header2"></div>
      <ul class="index-nav-ul">
        <li><a href="javascript:;"><i class="icon icon-pp"></i><span>卓越品牌</span></a></li>
        <li><a href="javascript:;"><i class="icon icon-ry"></i><span>权威荣誉</span></a></li>
        <li><a href="javascript:;"><i class="icon icon-xl"></i><span>万千信赖</span></a></li>
        <li><a href="javascript:;"><i class="icon icon-bz"></i><span>服务保障</span></a></li>
      </ul>

  </div>
<!--入口链接-->
        <!-- 轮播滑动效果开始 -->
    <div class="entry" style="height: 178px;float: left;clear: both;">        
              <div class="m-slider m-slider-bos" data-ydui-slider="">
                  <div class="slider-wrapper" ><!--style="transform: translate3d(-828px, 0px, 0px); transition-duration: 300ms;"-->
                      <div class="slider-item">
                            <div class="aui-palace aui-palace-four clearfix">
                                <a href="/m/loupan/" class="aui-palace-grid">
                                    <div class="aui-palace-grid-icon">
                                        <img src="/public/static/phone/img/nav/nav_01.png" alt="新房查询">
                                    </div>
                                    <div class="aui-palace-grid-text">
                                        <h2>新房查询</h2>
                                    </div>
                                </a>
								<a href="/m/loupan/index_0_0_0_tsa1_1.html" class="aui-palace-grid">
                                      <div class="aui-palace-grid-icon">
                                          <img src="/public/static/phone/img/nav/nav_02.png" alt="海景房">
                                      </div>
                                      <div class="aui-palace-grid-text">
                                          <h2>海景房</h2>
                                      </div>
                                    </a>
                                     <a href="/m/loupan/index_0_0_0_ts6_1.html" class="aui-palace-grid">
                                    <div class="aui-palace-grid-icon">
                                    <img src="/public/static/phone/img/nav/nav_03.png" alt="别墅">
                                    </div>
                                    <div class="aui-palace-grid-text">
                                    <h2>别墅</h2>
                                    </div>
                                  </a>  
                                  <!--<a href="/m/loupan/ttsa6" class="aui-palace-grid">
                                      <div class="aui-palace-grid-icon">
                                          <img src="/public/static/phone/img/nav/nav_05.jpg" alt="特价房" style="display: block;width: 40px;height: 40px;margin-left: 0px;margin-top: 0px;">
                                      </div>
                                      <div class="aui-palace-grid-text">
                                          <h2>特价房</h2>
                                      </div>
                                  </a> -->
                                  <a href="/m/news/" class="aui-palace-grid">
                                      <div class="aui-palace-grid-icon">
                                          <img src="/public/static/phone/img/nav/loushi.png" alt="楼市" style="display: block;margin-left: 0px;margin-top: 0px;">
                                      </div>
                                      <div class="aui-palace-grid-text">
                                          <h2>楼市</h2>
                                      </div>
                                  </a> 
                                                                
                                <!-- 第二行 -->                                   
                                <a href="http://fangchenggang.<?php echo $siteasd;?>/m/" class="aui-palace-grid">
                                    <div class="aui-palace-grid-icon">
                                        <img src="/public/static/phone/img/nav/nav_17.png" alt="海口新房">
                                    </div>
                                    <div class="aui-palace-grid-text">
                                        <h2>防城港新房</h2>
                                    </div>
                                </a>                   
                                <a href="http://beihai.<?php echo $siteasd;?>/m/" class="aui-palace-grid">
                                    <div class="aui-palace-grid-icon">
                                        <img src="/public/static/phone/img/nav/nav_07.png" alt="三亚新房">
                                    </div>
                                    <div class="aui-palace-grid-text">
                                        <h2>北海新房</h2>
                                    </div>
                                </a>
                               <!-- <a href="http://fangchenggang.<?php /*echo $siteasd;*/?>/m/" class="aui-palace-grid">
                                    <div class="aui-palace-grid-icon">
                                        <img src="/public/static/phone/img/nav/nav_08.png" alt="防城港新房">
                                    </div>
                                    <div class="aui-palace-grid-text">
                                        <h2>防城港新房</h2>
                                    </div>
                                </a>
                                <a href="http://beihai.<?php /*echo $siteasd;*/?>/m/" class="aui-palace-grid">
                                    <div class="aui-palace-grid-icon">
                                        <img src="/public/static/phone/img/nav/nav_09.png" alt="北海新房">
                                    </div>
                                    <div class="aui-palace-grid-text">
                                        <h2>北海新房</h2>
                                    </div>
                                </a>   
                                <a href="http://kunming.<?php /*echo $siteasd;*/?>/m/" class="aui-palace-grid">
                                    <div class="aui-palace-grid-icon">
                                        <img src="/public/static/phone/img/nav/nav_14.png" alt="昆明新房">
                                    </div>
                                    <div class="aui-palace-grid-text">
                                        <h2>昆明新房</h2>
                                    </div>
                                </a>                                               
                            </div>
                      </div>
                      <div class="slider-item"  style="width: 414px;">
                            <div class="aui-palace aui-palace-four clearfix">        
                                <a href="http://dali.<?php /*echo $siteasd;*/?>/m/" class="aui-palace-grid">
                                    <div class="aui-palace-grid-icon">
                                        <img src="/public/static/phone/img/nav/nav_15.jpg" alt="大理新房">
                                    </div>
                                    <div class="aui-palace-grid-text">
                                        <h2>大理新房</h2>
                                    </div>
                                </a>                                                  
                                <a href="http://lijiang.<?php /*echo $siteasd;*/?>/m/" class="aui-palace-grid">
                                    <div class="aui-palace-grid-icon">
                                        <img src="/public/static/phone/img/nav/nav_16.png" alt="丽江新房">
                                    </div>
                                    <div class="aui-palace-grid-text">
                                        <h2>丽江新房</h2>
                                    </div>-->
                                </a>                      
                                <a href="/m/loupan/index_0_0_0_ts2_1.html" class="aui-palace-grid">
                                    <div class="aui-palace-grid-icon">
                                        <img src="/public/static/phone/img/nav/nav_03.png" alt="写字楼">
                                    </div>
                                    <div class="aui-palace-grid-text">
                                        <h2>商铺</h2>
                                    </div>                                
                                </a>
                                <a href="/m/find/" class="aui-palace-grid">
                                    <div class="aui-palace-grid-icon">
                                        <img src="/public/static/phone/img/nav/nav_11.png" alt="帮您找房">
                                    </div>
                                    <div class="aui-palace-grid-text">
                                        <h2>帮您找房</h2>
                                    </div>
                                </a>                                                    
                             <!--   <a href="/m/news/index_25.html" class="aui-palace-grid">
                                    <div class="aui-palace-grid-icon">
                                        <img src="/public/static/phone/img/nav/nav_12.png" alt="最新优惠">
                                    </div>
                                    <div class="aui-palace-grid-text">
                                        <h2>最新优惠</h2>
                                    </div>
                                </a>              -->      
                            </div>
                      </div>
                  </div>
                  <div class="slider-pagination" style="display:none;"></div>
              </div>    
    </div>
    <!-- 轮播滑动效果开始 -->
    <div class="lb rows">
            <div class="dynamic">
                <div class=" dyn-left">
                    <div class="dyn-left-content">
                      <a href="/m/news/"><img src="/public/static/phone/image/lou86t_07.png" alt="热门动态" /></a>
                    </div>
                </div>                
                <div class="dyn-center">
                    <div class="scrolldiv">
                        <ul style="margin-top: 0px;">
                        <?php

                                $row = $mysql->query("select * from `web_content` where `path`='0-5' and cityall_id=41 and `flag` like '%j2%' order by addtime desc limit 0,6");
                                foreach($row as $k=>$list){
                  if($list['pid']==28){
                  $url="/m/loupan/news_show/{$list['id']}.html";
                  }else{
                  $url="/m/news/show_{$list['id']}.html";
                    }
                                ?>
            <li><a href="<?php echo $url;?>" title="<?php echo $list['title'];?>"><?php echo $list['title'];?></a></li>
                    <?php
            }
          ?>  
                    </ul>
                    </div>
                </div>                
                <div class="reading"><span onClick="openwid4('订阅动态','我们会保证您的个人信息安全，并第一时间通知您最新楼盘动态。','【<?php echo $sitecityname;?>】移动首页_订阅动态',9);">订阅动态</span></div>
            </div>
        </div> 
     <!--热门活动-->
        <div class="rows">
          <div class="hot-men" style="padding:1.1em"><div class="title"><h3>热门活动</h3></div></div>
            <div class="index-slider-c" style="padding: 0 0.95em 0em 0.95em;">
                  <div class="block_home_slider">
                    <div id="home_slider" class="flexslider">               
                        <ul class="slides">
                        <?php
            $row = $mysql->query("select * from `web_link` where `ad_id`='40' and `city_id` = '42' order by px asc");
            foreach($row as $k=>$list){
            ?>
            <li><a href="<?php echo $list['link_url'];?>"><div class="slide"><img src="/<?php echo $list['img'];?>" alt="<?php echo $list['title'];?>" width="100%" height="222" /></div></a></li>
            <?php
            }
            ?>
                                                  </ul>
                    </div>
                    <script type="text/javascript">
                      $(function () {
                        $('#home_slider').flexslider({animation : 'slide',controlNav : true,directionNav : true,animationLoop : true,slideshow : false,useCSS : false});                 
                      });
                     </script>
                  </div>
            </div>
        </div><!--热门活动 end-->
       
        <div class="rows priority">
          <div class="hd">                
              <div class="title"><h3>买房优选</h3></div>
          </div>
          <div class="prioritylcr">         
             <!-- 列表 -->
             <div class="" style="width: 11rem"> 
                   <div class="priority-l">
                     <a href="/m/loupan/">
                       <h3><img src="/public/static/phone/image/y1.png" width="50%"></h3>
                       <div class="priority-l-p">
                          <p class="typ">热销新盘</p><p>投资自住皆宜</p>
                                                     </p>
                           
                       </div>
                     </a>
                   </div>
                                         <div class="priority-l">
                     <a href="/m/loupan/index_0_0_0_tsa1_1.html">
                       <h3><img src="/public/static/phone/image/y2.png" width="50%"></h3>
                       <div class="priority-l-p">
                           <p class="typ">海景豪宅</p>
                           <p>度假旅居优选</p>
                       </div>
                     </a>
                   </div>
                                 
                  <div class="priority-l">
                     <a href="/m/loupan/index_0_0_0_ts6_1.html">
                       <h3><img src="/public/static/phone/image/y3.png" width="50%"></h3>
                       <div class="priority-l-p">
                           <p class="typ">精品别墅</p>
                           <p>养生度假优选</p>
                       </div>
                     </a>
                  </div>
                <div class="clear"></div>
             </div>
             <!-- 列表 end -->
            <div class="priority-j">
            <a href="/m/loupan/ttsa4">
                 <h3><img src="/public/static/phone/image/y4.png"  width="50%"></h3>
                 <div class="priority-r-j">
                   <p class="typ-j">品牌地产</p>
                   <p>高品质好物业</p>
                 </div>
               </a>
            </div>
            <div class="priority-h">               <a href="/m/loupan/zzx2">
                 <h3><img src="/public/static/phone/image/y5.png"  width="50%"></h3>
                 <div class="priority-r-j">
                   <p class="typ-j">精装现房</p>
                   <p>拎包入住不用等</p>
                 </div>
               </a>
            </div>
                      </div>
        </div>
       <div class="clear"></div>
       <div class="center">
        <!--快捷找房-->
        <div class="case case-quick">
            <div class="hd">
                <h2>快捷找房</h2>
            </div>
            <div class="bd">
                <div class="find">
                    <div class="find-item">
                        <div class="type">区域：</div>
                        <ul class="list find-zone">     
                           <?php
                $city=$mysql->query("select * from `web_city` where `pid`={$sitecitybid} and `city_st`='1' order by `city_px2` desc limit 0,7");
                foreach($city as $cityall){
                    echo '<li><a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/m/" >'.$cityall['city_name'].'</a></li>';
                }
                ?>
                                         
                                                </ul>
                        <div class="open">
                            <span class="ico ico-down"></span>
                        </div>
                    </div>
                     <div class="find-item">
                        <div class="type">价格：</div>
                        <ul class="list">
                        <?php
                $flag=$mysql->query("select * from `web_flag` where `flag_fl`='7' and `flag_st`='1' order by `flag_px` asc");
                foreach($flag as $flagall){
                    echo '<li><a href="/m/loupan/p'.$flagall['flag_bm'].'">'.$flagall['flag'].'</a></li>';
                }
                ?>
                                              </ul>
                        <div class="open">
                            <span class="ico ico-down"></span>
                        </div>
                    </div>
                        </div>
                          <ul class="tags">
                           <?php
                $flag=$mysql->query("select * from `web_flag` where `flag_fl`='6' and `flag_st`='1' order by `flag_px` asc limit 0,8");
                foreach($flag as $k=>$flagall){
                    echo '<li class="tag-'.($k+1).'"><a href="/loupan/t'.$flagall['flag_bm'].'" target="_blank">'.$flagall['flag'].'</a></li>';
                }
                ?>
                         
                                                      </ul>
                        </div>
        </div>
        <!--推荐楼盘-->
        <div class="case case-groom">
            <div class="hd"><h2 style="margin-top: 10px;">新房推荐</h2></div>
            <div class="bd">              
                  <!-- 列表 -->
					<?php
		$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px10 desc limit 0,8");// and `city_id`='57'
		foreach($row as $k=>$list){
		$url="/m/loupan/{$list['id']}.html";
		?>
        
         <div class="build-list">
                    <div class="item-new ">
                         <a href="<?php echo $url;?>">
                              <div class="img-area pr">
								<img alt="<?php echo $list['title'];?>" src="<?php echo $site.$list['img'];?>">
							</div>
                              <div class="des">
                                  <div class="tr">
                                      <div class="place"><?php echo $list['title'];?></div>
                                      <div class="price" style="font-size: .35rem;">约
                                      <?php if($list['all_price']==0){?>
										<?php if($list['jj_price']==0){?>
                                            <i style="color: #ffffff;font-style: normal;font-size: .5rem">待定</i>
                                        <?php }else{?>
                                            <i style="color: #ffffff;font-style: normal;font-size: .5rem"><?php echo $list['jj_price'];?></i>元/㎡
                                        <?php }?>
                                    <?php }else{?>
                                     <i style="color: #ffffff;font-style: normal;font-size: .5rem"><?php echo $list['all_price'];?></i>万/套
                                    <?php }?></div>
                                  </div>                                  
                               </div>
                          </a>
                        <div class="lb-area"><span class="lbs lbs-hot"><?php
            $flagztz='';
			  $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='8' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $list['ztz'])){
					echo ''.$listflag['flag'].'';
				}
			}
			?></span></div>    
                                              
                        <div class="Discounts">
                           <div class="Discounts-l">
                              <a href="javascript:;" onClick="openwid4('领取最新优惠','<?php echo $list['fkfs'];?>','<?php echo $list['title'];?>移动_首页获取优惠',2);"><span><?php echo $list['fkfs'];?></span></a>
                           </div>
                           <div class="Discounts-r">                              
                              <a href="javascript:;" class="Discounts-hqrh" onClick="openwid4('领取最新优惠','<?php echo $list['fkfs'];?>','【<?php echo cityname($list['fkfs']);?>】<?php echo $list['title'];?>移动_首页获取优惠',2);">获取优惠</a>
                           </div>
                        </div>
                              
                        <div class="Discounts" style="margin: 0;border-top: 1px solid #dfdfdf;">
                           <div class="Discounts-l" style="height: 1rem;line-height: 1rem">
                              <a href="javascript:;"><span style="color: #999;float:left;width:7rem;color:#999;background:url(/public/static/home/image/icons/map.png) no-repeat .1rem .25rem;font-size:.36rem;text-indent:.7rem;text-overflow:ellipsis;background-size:.45rem .45rem;height:1.2rem;overflow:hidden"><?php echo $list['xmdz'];?></span></a>
                           </div>
                           <div class="Discounts-r" style="margin-top: 6px;width: 2.2rem;margin-right: .1rem">  
                                                                   <a href="javascript:phone('<?php echo telsee($list['loupan_tel']);?>',1)">
                                 
                              <img src="/public/static/phone/image/v2.0/tel_2.gif" style="width: 2.2rem">
                              </a>
                           </div>
                        </div>                  
                    </div>     
                  </div>
                 <div class="both"></div> 
		<?php
		}
		?>                         
                                                                       
                  <!-- 列表 end -->                                                    
            </div>
            <style>
			.bounce {
  display: flex;
  align-items: center;
  justify-content: center;
  width: 100%;
	color: white;
  height: 100%;
  font: normal bold 0.4rem "Product Sans", sans-serif;
  white-space: nowrap;
}

.letter {
  animation: bounce 0.75s cubic-bezier(0.05, 0, 0.2, 1) infinite alternate;
  display: inline-block;
  transform: translate3d(0, 0, 0);
  margin-top: 0.5em;
  text-shadow: rgba(255, 255, 255, 0.4) 0 0 0.05em;
  font: normal 500 0.4rem 'Varela Round', sans-serif;
  color:#F00;
}
.letter:nth-child(1) {
  animation-delay: 0s;
}
.letter:nth-child(2) {
  animation-delay: 0.0833333333s;
}
.letter:nth-child(3) {
  animation-delay: 0.1666666667s;
}
.letter:nth-child(4) {
  animation-delay: 0.25s;
}
.letter:nth-child(5) {
  animation-delay: 0.3333333333s;
}
.letter:nth-child(6) {
  animation-delay: 0.4166666667s;
}


@keyframes bounce {
  0% {
    transform: translate3d(0, 0, 0);
    text-shadow: rgba(255, 255, 255, 0.4) 0 0 0.05em;
  }
  100% {
    transform: translate3d(0, -1em, 0);
    text-shadow: rgba(255, 255, 255, 0.4) 0 1em 0.35em;
  }
}
			</style>
            <div class="more">
            <div class="bounce">
                <a href="loupan/"><span class="letter">查</span>
                <span class="letter">看</span>
                <span class="letter">更</span>
                <span class="letter">多</span>
                <span class="letter">楼</span>
                <span class="letter">盘</span></a>
            </div>
               <!-- <a href="loupan/">查看更多楼盘</a>-->
            </div>
        </div>
    </div>  
    </div>  
<script type="text/javascript" src="/public/static/phone/js/flexslider-min.js"></script>
<script type="text/javascript">
//单行文字滚动
function AutoScroll(obj) {
    $(obj).find("ul:first").animate({
        marginTop: "-.9rem"
    }, 2000, function() {
        $(this).css({ marginTop: "0" }).find("li:first").appendTo(this);
        setTimeout('AutoScroll(".scrollDiv")', 2000)
    });
}
$(function() {
    var $scr_Li = $('.scrollDiv').find("li");
    if ($scr_Li.length != 1) {
        setTimeout('AutoScroll(".scrollDiv")', 2000);
    }
});

// 点击显示更多
$(".open").on("click",function(){
  var data = $(this).attr('data');
  if (typeof(data) == "undefined"){
    $(this).parent('.find-item').css('height','auto');
    $(this).attr('data',1);
  }else{
    $(this).removeAttr('data');
    $(this).parent('.find-item').removeAttr('style');
  }
});
</script>
   

<?php include("bottom.php");?>
</body>
</html>
<?php include("sq.php");?>
