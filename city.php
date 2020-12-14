<!doctype html>
<html lang="zh-cn">
<?php
require("conn/conn.php");
require("function.php");
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=Edge">
  <meta name="mobile-agent" content="format=html5; url=http://m.mumu.com/">
  <meta http-equiv="Cache-Control" content="no-transform" />
        	<link rel="shortcut icon" href="../image/favicon.ico" />
	<title><?php echo $config['site_name'];?></title>
    <meta name=keywords content="<?php echo $config['site_keyword'];?>">
    <meta name=description content="<?php echo $config['site_desc'];?>">
  <meta name="baidu-site-verification" content="D5nywPRwst" />
  <link rel="stylesheet" href="/public/assets/css/style.css?v=44.8">
  <link rel="stylesheet" href="/public/static/home/css/home.css?v=44.8">
  <SCRIPT type=text/javascript src="/public/static/common/js/jquery.min.js"></SCRIPT>
<?php include("sq2.php");?>
</head>
<script type="text/javascript">
//热门城市房价数据
 var hotCityPriceList = [
     {"city": "海口", "data": [49112, 50238, 50013, 51348, 51853, 53475]}, 
     {"city": "三亚", "data": [47420, 47110, 50401, 49179, 46183, 48981]}, 
     {"city": "文昌", "data": [16394, 16250, 16867, 16843, 16583, 16103]}, 
     {"city": "万宁", "data": [54730, 54619, 54512, 54492, 54446, 53491]}, 
     {"city": "陵水", "data": [20989, 21113, 21441, 21999, 22497, 22941]}, 
     {"city": "乐东", "data": [7864, 8343, 9005, 9474, 9946, 9420]}, 
     {"city": "东方", "data": [17741, 17892, 18140, 18565, 18757, 19567]}, 
     {"city": "澄迈", "data": [22318, 22236, 22401, 22966, 23154, 23307]}
 ];
//var cityList = ['-海口-haikou-hk-haikou','-三亚-sanya-sy-sanya','-陵水-lingshui-ls-lingshui','-万宁-wanning-wn-wanning','-文昌-wenchang-wc-wenchang','-澄迈-chengmai-cm-chengmai','-白沙-baisha-bs-baisha','-东方-dongfang-df-dongfang','-临高-lingao-lg-lingao','-琼海-qionghai-qh-qionghai','-乐东-ledong-ld-ledong','-保亭-baoting-bt-baoting','-五指山-wuzhishan-wzs-wuzhishan','-儋州-danzhou-dz-danzhou','-万宁-wanning-wn-wanning','-屯昌-tunchang-tc-tunchang','-北海-beihai-bh-beihai','-防城港-fcg-fcg-fangchenggang','-大理-dali-dl-dali','-丽江-lijiang-lj-lijiang','-昌江-changjiang-cj-changjiang','-定安-dingan-da-dingan','-琼中-qiongzhong-qz-qionghai'];
var cityList = ['-防城港-fangchenggang-fcg-fangchenggang','-北海-beihai-bh-beihai','-钦州-qinzhou-qz-qinzhou','-桂林-guilin-gl-guilin','-南宁-nanning-nn-nanning'
,'-柳州-liuzhou-lz-liuzhou','-巴马-bama-bm-bama'];
</script>
<body>
  <div class="header_index">
    <div class="swiper-container home_swiper">
      <div class="swiper-wrapper">
        <div class="swiper-slide">
          <a href="#" target="_blank">
            <img src="/public/static/home/image/home-bg.jpg" alt="背景图">
          </a>
        </div>
      </div>
    </div>
    <div class="header_home">
      <div class="w1200">
        <div class="logo_index">
          <!-- <img src="/public/static/home/image/logo/227_86.png" alt="logo图"> -->
        </div>
        
        <div class="entry_home">
          <a href="http://fangchenggang.<?php echo $siteasd;?>" class="btn btn-success btn-lg">进入 防城港 </a>
        </div>
      </div>
    </div>
  </div>
  <div class="choose_city_home">
    <div class="w1200">
      <div class="choose_city_title">城市选择<a href="#city"><i class="iconfont icon-circle-down"></i></a></div>
      <div class="choose_city_search">
        <div class="cityss clearfix" id="section-four">
        <div class="citysscont">
          <strong>快速搜索城市</strong>
          <div class="search-wrap pr" id="city-search" >
            <input type="text" placeholder="请输入城市名称" class="city-inp">
            <!-- 快速搜索 -->
            <div class="search-list-box"></div>
            <!-- 快速搜索 end-->
          </div>
        </div>
        <div class="rmcity">
          <strong>热门城市推荐：</strong>
          <?php
             /*   $city=$mysql->query("select * from `web_city` where `pid`<>0 and `city_st`='1' order by `city_px2` desc limit 0,8");
                foreach($city as $cityall){
                    echo '<a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/" target="_blank">'.$cityall['city_name'].'</a>';
                }*/
                ?>
        </div>
         <a href="http://haikou.<?php echo $siteasd;?>/map/" type="button" class="btn btn-success btn-sm f14" style="padding: 8px 33px;background: #00A0EA !important;">地图找房</a>
      </div>
      </div>
      <div class="city_item__home" id='city' style="display:none;">
        <div class="bar">
          <b>海南</b>
          国际旅游岛带你走进东方夏威夷
        </div>
        <div class="w1200">
          <div class="fl" style="width: 850px; position: relative;">
            <div class="city-banner__home zzsc">
              <img src="/public/assets/images/hn-home.jpg" width="850" height="364" alt="海南">
                  <div class="screen">
                  <div class="imgtext"> 海南素来有 "天然大温室" 的美称，这里长夏无冬，年平均气温<br/>22~27℃。随着近几年内地多地空气环境恶化严重，海南因其气<br/>候、温度、风景、空气质量等备受许多置业者的青睐。那么在海南<br/>买房，哪个城市好呢？</div>
                  </div>
            </div>
          </div>
          <div class="fl pl30">
            <div class="city-area">
              <div style="height: 5px;"></div>
              <h3>海南东线城市:</h3>              
              <a href="http://haikou.<?php echo $siteasd;?>/" target="_blank">海口</a>
              <a href="http://sanya.<?php echo $siteasd;?>/" target="_blank">三亚</a>              
              <a href="http://wanning.<?php echo $siteasd;?>/" target="_blank">万宁</a>
              <a href="http://lingshui.<?php echo $siteasd;?>/" target="_blank">陵水</a>
              <a href="http://wenchang.<?php echo $siteasd;?>/" target="_blank">文昌</a>
              <a href="http://qionghai.<?php echo $siteasd;?>/" target="_blank">琼海</a>              
              
          </div>          
            <div class="city-area">
              <h3>海南西线城市:</h3>
              <a href="http://chengmai.<?php echo $siteasd;?>/" target="_blank">澄迈</a>
              <a href="http://lingao.<?php echo $siteasd;?>/" target="_blank">临高</a>
              <a href="http://danzhou.<?php echo $siteasd;?>/" target="_blank">儋州</a>
              <a href="http://changjiang.<?php echo $siteasd;?>/" target="_blank">昌江</a>
              <a href="http://dongfang.<?php echo $siteasd;?>/" target="_blank">东方</a>
              <a href="http://ledong.<?php echo $siteasd;?>/" target="_blank">乐东</a>
            </div>
            <div class="city-area">
              <h3>海南中线城市:</h3>
              <a href="http://dingan.<?php echo $siteasd;?>/" target="_blank">定安</a>
              <a href="http://tunchang.<?php echo $siteasd;?>/" target="_blank">屯昌</a>
              <a href="http://qiongzhong.<?php echo $siteasd;?>/" target="_blank">琼中</a>
              <a href="http://wuzhishan.<?php echo $siteasd;?>/" target="_blank">五指山</a>
              <a href="http://baoting.<?php echo $siteasd;?>/" target="_blank">保亭</a>
              <a href="http://baisha.<?php echo $siteasd;?>/" target="_blank">白沙</a>
            </div>
        </div>
      </div>
    </div>
        <div class="clear"></div>
    <div class="h30"></div>
      <div class="city_item__home" style="display:none;">
        <div class="bar">
          <b>云南</b>  七彩云南 花的海洋 云的故乡 春的天堂
        </div>
        <div class="w1200">
          <div class="fl" style="width: 850px; position: relative;">
            <div class="city-banner__home zzsc">
              <img src="/public/static/home/image/home/ynan.jpg" width="850" height="364" alt="云南广告图">
              <div class="screen">
                  <div class="imgtext"> 云南，古人用"彩云南现"来遥指这片神秘的云岭高原。"一山不同族，十里不同天"由于各自不同的自然环境，呈现出不同的社会文化形态。 云南各民族丰富多彩的风俗民情，是一个活的历史博物馆。每一个民族的衣、食、住、行及图腾、宗教、禁忌、审美，莫不结撰为个性鲜明的文化链；泼水节、火把节、刀杆节、插花节……神话、史诗、歌舞、绘画、戏曲、古乐……莫不独具特色，深邃而幽远...</div>
                  </div>
            </div>
          </div>
          <div class="fl pl30" style="width: 350px">
            <div class="city-area">
              <div style="height: 5px"></div>
              <h3>云南最美城市:</h3>
               <ul class="area_ul">
               <?php
                $city=$mysql->query("select * from `web_city` where `pid`='47' and `city_st`='1' order by `city_px2` desc limit 0,8");
                foreach($city as $cityall){
                    echo '<li><a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/" target="_blank">'.$cityall['city_name'].'</a></li>';
                }
                ?>
                            </ul>
              <div class="clear"></div>
            </div>
            <div class="city-area">
              <h3>更多城市敬请期待...</h3>
            </div>
          </div>
        </div>
      </div>
    <div class="clear"></div>
    <div class="h30"></div>
      <div class="city_item__home">
        <div class="bar">
          <b>广西</b>
          天下美景美在广西
        </div>
        <div class="w1200">
          <div class="fl" style="width: 850px; position: relative;">
            <div class="city-banner__home zzsc">
              <img src="/public/static/home/image/home/gx-home.jpg" width="850" height="364" alt="广西背景图">
              <div class="screen">
                  <div class="imgtext"> 广西1595公里海岸线上，拥有北海银滩、涠洲岛、斜阳岛冠<br/>头岭国家森林公园、外沙岛、海洋之窗、北海海底世界、防城港<br/>的江山半岛、京岛、天堂滩、怪石滩、火山岛、竹山北仑河口跨<br/>国生态旅游景区、钦州的三浪湾...</div>
                  </div>
            </div>
          </div>
          <div class="fl pl30" style="width: 350px">
            <div class="city-area">
              <div style="height: 5px"></div>
              <h3>广西沿海城市:</h3>
              <ul class="area_ul">
                           <?php
                $city=$mysql->query("select * from `web_city` where `pid`='41' and `city_st`='1' order by `city_px` asc");
                foreach($city as $cityall){
                    echo '<li><a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/" target="_blank">'.$cityall['city_name'].'</a></li>';
                }
                ?>
                            </ul>
              <div class="clear"></div>
            </div>
            <div class="city-area">
              <h3>更多城市敬请期待...</h3>
            </div>
          </div>
        </div>
      </div>
            <div class="clear"></div>
    <div class="h30"></div>
      <div class="city_item__home" style="display:none;">
        <div class="bar">
          <b>广东</b>  历史悠久 文化名城 模范城市 夏无酷暑 冬无严寒
        </div>
        <div class="w1200">
          <div class="fl" style="width: 850px; position: relative;">
            <div class="city-banner__home zzsc">
              <img src="/public/static/home/image/home/guangdong.jpg" width="850" height="364" alt="广东背景图">
              <div class="screen">
                  <div class="imgtext"> 广东省简称粤(省会广州)属于南亚热带湿润季风气候，有汉、瑶、壮、满、等民族。经济发达，物产丰富。广东是主要侨乡，南方门户，毗邻港澳，湛江市位于我国大陆最南端，濒临南海，南隔琼州海峡与海南岛相望。图为中国大陆最南端徐闻角尾灯塔，中景为琼州海峡，湛江是粤、桂、琼3省通衢的战略要地，大西南的主要出海口，也是我国大陆通往东南亚、非洲、欧洲和大洋洲海上航道最短的重要口岸。在北部湾经济圈、亚太经济圈中具有重要的战略地位。</div>
                  </div>
            </div>
          </div>
          <div class="fl pl30" style="width: 350px">
            <div class="city-area">
              <div style="height: 5px"></div>
              <h3>广东宜居城市:</h3>
                <ul class="area_ul">
                <?php
                $city=$mysql->query("select * from `web_city` where `pid`='54' and `city_st`='1' order by `city_px2` desc limit 0,8");
                foreach($city as $cityall){
                    echo '<li><a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/" target="_blank">'.$cityall['city_name'].'</a></li>';
                }
                ?>
                       
                  </ul>
            <div class="clear"></div>
            </div>
            <div class="city-area">
              <h3>更多城市敬请期待...</h3>
            </div>
          </div>
        </div>
      </div>
    <div class="clear"></div>
    <div class="h30"></div>
      <div class="city_item__home" style="display:none;">
        <div class="bar">
          <b>四川</b> 四川河流众多，以长江水系为主
        </div>
        <div class="w1200">
          <div class="fl" style="width: 850px; position: relative;">
            <div class="city-banner__home zzsc">
              <img src="/public/static/home/image/home/sch.jpg" width="850" height="364" alt="河南广告图">
              <div class="screen">
                  <div class="imgtext"> 四川是全国唯一的羌族聚居区、最大的彝族聚居区和全国第二大藏区。少数民族主要聚居在凉山彝族自治州、甘孜藏族自治州、阿坝藏族羌族自治州及木里藏族自治县、马边彝族自治县、峨边彝族自治县、北川羌族自治县。被誉为"中国第二藏区"、"中国唯一羌族聚集区"、"中国第一彝族聚集区"。</div>
                  </div>
            </div>
          </div>
          <div class="fl pl30" style="width: 350px">
            <div class="city-area">
              <div style="height: 5px"></div>  
                <h3>华夏文明之都:</h3>            
              <ul class="area_ul">
              
                <?php
                $city=$mysql->query("select * from `web_city` where `pid`='75' and `city_st`='1' order by `city_px2` desc limit 0,8");
                foreach($city as $cityall){
                    echo '<li><a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/" target="_blank">'.$cityall['city_name'].'</a></li>';
                }
                ?>
              </ul>
              <div class="clear"></div>
            </div>
            <div class="city-area">
              <h3>更多城市敬请期待...</h3>
            </div>
          </div>
        </div>
      </div>
    <div class="clear"></div>
    <div class="h30"></div>
      <div class="city_item__home" style="display:none;">
        <div class="bar">
          <b>海外</b> 
        </div>
        <div class="w1200">
          <div class="fl" style="width: 850px; position: relative;">
            <div class="city-banner__home zzsc">
              <img src="/public/static/home/image/home/gx-home.jpg" width="850" height="364" alt="河南广告图">
              <div class="screen">
                  <div class="imgtext"> 。</div>
                  </div>
            </div>
          </div>
          <div class="fl pl30" style="width: 350px">
            <div class="city-area">
              <div style="height: 5px"></div>  
                <h3>海外:</h3>            
              <ul class="area_ul">
              
                <?php
                $city=$mysql->query("select * from `web_city` where `pid`='65' and `city_st`='1' order by `city_px2` desc limit 0,8");
                foreach($city as $cityall){
                    echo '<li><a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/" target="_blank">'.$cityall['city_name'].'</a></li>';
                }
                ?>
              </ul>
              <div class="clear"></div>
            </div>
            <div class="city-area">
              <h3>更多城市敬请期待...</h3>
            </div>
          </div>
        </div>
      </div>
    <div class="clear"></div>
    <div class="h30"></div>
      
  </div>
</div>
<div class="h30"></div>
<script type="text/javascript" src="/public/static/home/js/home.js?v=1558686533"></script> 
<!-- 底部 -->

<?php include("bottom.php");?>
</body>
</html> 
<?php include("sq.php");?>