<div class="w1200">
  <div class="h20"></div>
  <div class="lp-add">
    <a ><img src="/public/static/home/image/lp/bbb-1.jpg"></a>
  </div>
</div>

<div class="footer-v5">
  <div class="wrap-v5">
      <div class="aboutcopy">
            <ul class="clearfix">
            <?php 
    $row = $mysql->query("select * from `web_srot` where `pid`='1' and `startus` = '1' order by px asc limit 0,10");
    foreach($row as $k=>$list){
    ?>
       <li><a href="/about/<?php echo $list['id'];?>.html" target="_blank" ><?php echo $list['title'];?></a></li>
        <?php
    }
    ?> 
                <li><a href="/map/" target="_blank">网站地图</a></li>  
                <li><a href="/sitemap.xml" target="_blank">XML地图</a></li>
            </ul>
        </div>
        <div class="links-v5" style="position:relative;">
          <!-- 展开添加样式on -->
          <div  style="display:none;">
                    <div class="linkrow">
            <div class="ftlinkswrap">
                  <span class="linkstit-v5">热门城市</span>
                  <div class="linkscont-v5">                    
                    <ul class="alinklist clearfix">
                     <?php
                $city=$mysql->query("select * from `web_city` where `pid`<>0 and `city_st`='1' order by `city_px2` desc limit 0,7");
                foreach($city as $cityall){
                    echo '<li><a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'" target="_blank">'.$cityall['city_name'].'买房</a></li>';
                }
                ?>
                                              <!--  <li><a href="###/" title="海口买房" target="_blank">海口买房</a></li>-->
                                            </ul>
                  </div>
                  <i class="footmore"></i>
                </div>
            </div>
                     <div class="linkrow">
            <div class="ftlinkswrap">
                  <span class="linkstit-v5">城市楼盘</span>
                  <div class="linkscont-v5">                    
                    <ul class="alinklist clearfix">
                    
                     <?php
                $city=$mysql->query("select * from `web_city` where `pid`<>0 and `city_st`='1' order by `city_px2` desc limit 0,7");
                foreach($city as $cityall){
                    echo '<li><a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/loupan/" target="_blank">'.$cityall['city_name'].'楼盘</a></li>';
                }
                ?>
                                            </ul>
                  </div>
                  <i class="footmore"></i>
                </div>
            </div>
                     <div class="linkrow">
            <div class="ftlinkswrap">
                  <span class="linkstit-v5">城市动态</span>
                  <div class="linkscont-v5">                    
                    <ul class="alinklist clearfix">
                    
                     <?php
                $city=$mysql->query("select * from `web_city` where `pid`<>0 and `city_st`='1' order by `city_px2` desc limit 0,7");
                foreach($city as $cityall){
                    echo '<li><a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/news/" target="_blank">'.$cityall['city_name'].'楼市动态</a></li>';
                }
                ?>
                    
                                            </ul>
                  </div>
                  <i class="footmore"></i>
                </div>
            </div>
                     <div class="linkrow">
            <div class="ftlinkswrap">
                  <span class="linkstit-v5">城市资讯</span>
                  <div class="linkscont-v5">                    
                    <ul class="alinklist clearfix">
                    
                     <?php
                $city=$mysql->query("select * from `web_city` where `pid`<>0 and `city_st`='1' order by `city_px2` desc limit 0,7");
                foreach($city as $cityall){
                    echo '<li><a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/news/index_7.html" target="_blank">'.$cityall['city_name'].'房产资讯</a></li>';
                }
                ?>
                                            
                                            </ul>
                  </div>
                  <i class="footmore"></i>
                </div>
            </div>
                     <div class="linkrow">
            <div class="ftlinkswrap">
                  <span class="linkstit-v5">城市指南</span>
                  <div class="linkscont-v5">                    
                    <ul class="alinklist clearfix">
                    
                     <?php
                $city=$mysql->query("select * from `web_city` where `pid`<>0 and `city_st`='1' order by `city_px2` desc limit 0,7");
                foreach($city as $cityall){
                    echo '<li><a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/news/index_22.html" target="_blank">'.$cityall['city_name'].'购房指南</a></li>';
                }
                ?>
                                            </ul>
                  </div>
                  <i class="footmore"></i>
                </div>
            </div></div>
                     <!--热门城市 end-->
          <!--周边城市 start-->
                    <!--周边城市 end-->
          <!--推荐楼盘 start-->
                    <!-- 展开添加样式on -->
          <div class="linkrow" id="roundcityDiv" style="display: block;">
            <div class="ftlinkswrap">
                  <span class="linkstit-v5">推荐楼盘</span>
                  <div class="linkscont-v5">
                    <ul class="alinklist clearfix" id="roundcityUl">
                        <?php
      $rownews = $mysql->query("select * from `web_content` WHERE `pid`='9' order by addtime desc limit 0,8");
      foreach($rownews as $k=>$lists){
      $url='/louan/'.$lists['id'].'.html';
    
    ?>
                <li> <a href="<?php echo $lists['get_url'];?>" target="_blank"><?php echo $lists['title'];?></a></li> 
        <?php
      }?>
                                          
                                        </ul>
                  </div>
                  <i class="footmore"></i>
                </div>
            </div>
                      <!--推荐楼盘 end-->
          <!--楼盘索引 end-->          
                    <div class="linkrow" id="yqljdiv">
            <div class="ftlinkswrap">
                <span class="linkstit-v5">友情链接</span>
                <div class="linkscont-v5">
                 <ul class="alinklist clearfix">
                      <?php
        $row = $mysql->query("select * from `web_link` where `ad_id`='20' order by px asc");
        foreach($row as $k=>$list){
        ?>
                <li><a href="<?php echo $list['link_url'];?>" target="_blank"><?php echo $list['title'];?></a></li>
        <?php
        }
        ?>
                </ul>
                </div>
              <i class="footmore"></i>
            </div>
          </div>
                    </div>
<style type="text/css">
  .conyfiv p{margin: 0}
</style>
<div class="conyfiv">
     <p>版权所有：<?php echo $config['company_name'];?>&nbsp;&nbsp;Copyright&nbsp;©&nbsp;<ins id="cur-year">2020</ins>&nbsp;&nbsp;<a href="http://chuanhai.jtr168.cn/" title="<?php echo $config['site_name'];?>">chuanhai.jtr168.cn</a>&nbsp;&nbsp;&nbsp;<a href="http://www.chuanhai.jtr168.cn/" title="<?php echo $config['site_name'];?>"><?php echo $config['site_name'];?></a>
      <a href="http://beian.miit.gov.cn" target="_blank" rel="nofollow"><?php echo $config['site_icp'];?></a></p>
</div>
    </div>
</div>





<div class="y_maskbg"></div>
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/public.js"></script>
<script src="/js/alert.js"></script>

<script type="text/javascript" src="/public/static/home/js/article/common.js"></script>
<script src="/js/newslist.js"></script>
<script src="/js/jquery-1.7.2.js"></script>
<script src="/js/jquery.SuperSlide.2.1.1.js"></script>
<!--<script src="/js/swiper-3.4.2.min.js"></script>-->
<script src="/js/echarts.js"></script>
<script src="/js/jquery.range.js"></script>
<script src="/js/index.js"></script>
<script src="/js/search.js"></script>

<script src="/js/applyVerify.js"></script>
<script src="/js/w_apply.js"></script>



<script>jQuery(".links").slide({ titCell: ".n", trigger: "click" });</script>
    <script>
    $('.submit_area .apply_submit').on('click',function(){
    setTimeout(function(){
        var _html = $('.alert-container .alert-content').html();
        if(_html == '提交成功'){
            $('.m_bmck_box').hide();
            $('.m_bmck form input[type="text"]').val('');
        }
        console.log(_html);
    },300)  
 
})
</script>

<script src="/js/lazyload.js"></script>
<script>
    $("img.lazy").lazyload({
        effect: "fadeIn",
        "failurelimit" : 10,
        skip_invisible : false
    });
</script>

<?php 
 $row = $mysql->query("select * from `web_link` where `ad_id`='85' and `city_id`='{$sitecityid}' order by px asc");
 if($row[0]<>''){
?>
<link rel="stylesheet" href="/public/static/swiper/swiper.min.css">
<style type="text/css">
.slider-down-main{position: relative;}
.slider-down-main .slider-pic-close{position: absolute;right: 100px;top: 12px;z-index: 100;border-radius: 50%;}
.slider-down-main .slider-pic-close img{width: 28px;}
.slider-down-main .slider-info {background: #000;opacity: .5;padding: 2px 8px;color: #fff;position: absolute;right: 25px;top: 0px;z-index: 100;}
.slider_small_l {position: fixed;left: 0;bottom: 5%;display: none;z-index: 20;}
.slider_small_l a {display: block;background: #df2f30;font-size: 14px;color: #fff;padding: 30px 15px 30px 8px;border-radius: 0 10px 10px 0;}
.slider-down-nav{width: 100%;height: 130px;position: fixed;bottom: -1px;z-index: 999;min-width: 1200px;}
.slider-down-main  .swiper-button-prev{left: 175px;}
.slider-down-main  .swiper-button-next{right: 175px;}
.slider-down-main  .slider-bm-box{position: absolute;right: 35%;top: 20px;z-index: 100;width: 380px;margin-right: -310px;}
.slider-bm-box span.slider-txt {border: 1px solid #F5CD44;width: 261px;position: relative;top: 0px;display: inline-block;background: #fff;height: 44px;line-height: 44px;}
.slider-bm-box .slider-txt .sl-moblie {display: inline-block;width: 210px;height: 40px;line-height: 44px;border: none;font-size: 16px;padding-left: 10px;background: #fff;color: #666;position: absolute;top: 1px;outline: none;}
.slider-bm-box .slider-submit{display: inline-block;width: 100px;height: 42px;line-height: 44px;text-align: center;font-size: 16px;color: #fff;background: #F5CD44;border: none;margin-left: 10px;cursor: pointer;}
.slider-bm-box .slider-submit {background: linear-gradient(to right, #ffd009, #ea9500);}
.slider-bm-box .commonality3{line-height: 35px;font-size: 16px;color: #f00}
</style>
     <style type="text/css">
    .slider-bm-box span.slider-txt img.imd {width: 23px;height: 22px;line-height: 22px;display: inline-block;position: relative;top: 7px;margin-left: 10px;border-right: 1px solid #c9c9c9;padding-right: 10px;    vertical-align: inherit;}
      </style>
  <div class="slider_small_l">
    <a href="javascript:void(0);">
      点<br>
      击<br>
      展<br>
      开<br>
      &gt;
    </a>   
</div>
<div class="slider-down-nav">
  <div class="slider-down-main">
    <a href="javascript:;" class="slider-pic-close"><img src="/public/static/home/image/icons/close2.png"></a>
    <span class="slider-info">广告</span>
    <!-- 报名 -->
      
     <form class="submit_area">
            <input type="hidden" name="pid" value="33">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="lpid" value="0">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="ly" value="底部_随屏">     <!--报名来源 具体查看applyVerify.js文件中source 标识说明-->
                    <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->
      
      <div class="slider-bm-box">
            <span class="slider-txt">
              <img class="imd" src="/public/static/home/image/icons/ico_phone.png" alt="">
              <input class="sl-moblie" type="text" name="mobile" id="lp-wd-mobile" placeholder="您的手机号码" maxlength="11">
            </span>
            <input type="button" value="预约看房" class="slider-submit apply_submit">
            <i class="commonality3">免费咨询热线：<span style="font-size: 18px;"><?php echo $config['company_tel'];?></span></i>
          </div>
        </form>
    <!-- 报名：end -->
      <div class="swiper-container2">
        <div class="swiper-wrapper">
            <?php
            $row = $mysql->query("select * from `web_link` where `ad_id`='85' and `city_id`='{$sitecityid}' order by px asc");
            foreach($row as $k=>$list){
            ?>
          
            <div class="swiper-slide">
                <div class="pic">
                  <a href="<?php echo $list['link_url'];?>" target="_blank"><img src="/<?php echo $list['img'];?>" alt="<?php echo $list['title'];?>"></a>
                </div>
            </div>
            <?php
            }
            ?>
          
                
                  </div>
        <!-- Add Pagination -->
        <div class="swiper-pagination"></div>
        <!-- Add Arrows -->
        <div class="swiper-button-next"></div>
        <div class="swiper-button-prev"></div>
      </div>
  </div>
</div>
  <script src="/public/static/swiper/swiper.min.js"></script>
  <script>
    var swiper = new Swiper('.swiper-container2', {
      spaceBetween: 30,
      centeredSlides: true,
      loop: true,
      autoplay: {
        delay: 2500,
        disableOnInteraction: false,
      },
      pagination: {
        el: '.swiper-pagination',
        clickable: true,
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
    });
    $('.slider-down-main').on('click','.slider-pic-close',function(){  
      $('.slider-down-nav').css('display','none');
      $('.slider_small_l').css('display','block');
    }); 
  $(".slider_small_l").click(function(){
    $('.slider-down-nav').css('display','block');
      $('.slider_small_l').css('display','none');
  });
  </script>
  <?php }?>
