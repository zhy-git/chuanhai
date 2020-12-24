<!doctype html>
<html lang="zh-cn">
<?php
require("conn/conn.php");
require("function.php");
//echo $pingyi;
if($pingyi=='www'){
	header('HTTP/1.1 301 Moved Permanently');
    //跳转到你希望的地址格式 
  	header('Location: http://beihai.chuanhai.'.$siteasd.'/');
   //header('Location: http://haikou.'.$siteasd.'');
   echo "<script language='javascript'
type='text/javascript'>"; 
echo "window.location.href='http://beihai.chuanhai.".$siteasd."/'"; 
echo "</script>";  
	}
$yescity = $mysql->query("select * from `web_city` where `city_pingyin`='$pingyi' and `city_st`=1 and `pid`<>0 limit 0,1");
if($yescity[0]==''){
	//header('HTTP/1.1 301 Moved Permanently');
    //跳转到你希望的地址格式 
  header('Location: http://beihai.chuanhai.'.$siteasd.'/');
   //header('Location: http://haikou.'.$siteasd.'');
	}
?>
<head>
  <meta name="baidu-site-verification" content="code-3529LhkNrR" />
	<meta charset="UTF-8">  
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<title><?php echo $config['site_name'];?></title>


    <meta name=keywords content="<?php echo $config['site_keyword'];?>">
    <meta name=description content="<?php echo $config['site_desc'];?>">
	<meta http-equiv="Cache-Control" content="no-transform" />
        	<link rel="shortcut icon" href="../image/favicon.ico" />
	<link rel="stylesheet" href="/public/static/home/css/css.css">  
	<link rel="stylesheet" href="/public/assets/css/style.css">
	<link rel="stylesheet" href="/public/static/home/css/home.css">
    <link href="/css/alert.css" rel="stylesheet">
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
<?php include("sq2.php");?>

</head>
<body style="font-size: 14px;">


<!-- 右侧边栏 -->  
<style type="text/css">
.sidebar .s-item .bg-img{float:left;width:38px;height:34px;cursor:pointer;text-indent:-9999px;background:url(/img/bg-icon-s.png) no-repeat 10px 7px}
.sidebar .s-footprint .bg-img{background-position:8px -22px}
.sidebar .s-login .bg-img{background-position:8px -240px}
.sidebar .s-look .bg-img{background-position:8px -52px}
.sidebar .s-customer .bg-img{background-position:8px -82px}
.sidebar .s-erweima .bg-img{background-position:10px -112px}
.sidebar .s-top .bg-img{background-position:8px -148px}
.sidebar .s-survey .bg-img{background-position:10px -184px}
.sidebar .s-feedback .bg-img{background-position:10px -213px}
.sidebar .s-item .hover{background-color:#666}
.sidebar .s-item .checked{background-color:#666}
.sidebar .des{display:none;position:absolute;right:45px;width:80px;height:34px;line-height:34px;text-align:center;font-size:12px;color:#fffefe;padding:0 10px;background-color:#62ab00;cursor:pointer}
.sidebar .des:after{position:absolute;left:100%;top:14px;width:0;height:0;border-top:4px solid transparent;border-left:5px solid #62ab00;border-bottom:4px solid transparent;content:""}
.sidebar .s-erweima .des{width:85px;height:auto;line-height:26px;padding:10px 10px 0 10px}
.sidebar .s-erweima .erweima{display:block;width:66px;height:66px;background:url(/img/bg-code.png)}
.sidebar .s-line{width:26px;margin:10px 0 10px 6px;border:0;border-bottom:solid 1px #666}
.s-look-house{position:absolute;width:250px;height:100%;background-color:#434343;padding:0 20px;float:left;overflow:hidden}
.s-look-house1{display:block}
.s-look-house .hd{padding:24px 0}
.s-look-house .img-area{text-align:center;margin-bottom:24px}
.s-look-house .img-area img{width:76px;height:76px}
.s-look-house .ipt-area{text-align:center;margin-bottom:20px}
.s-look-house .ipt-area .ipt-btn,.s-look-house .ipt-area .phone{width:160px;text-align:center;color:#fff;border:none;border-radius:2px;height:30px;line-height:30px;cursor:pointer}
.s-look-house .ipt-area .phone{font-size:12px;margin-bottom:20px;background-color:#888}
.s-look-house .ipt-area .ipt-btn{font-size:16px;font-weight:700;background-color:#e85045}
.s-look-house .hot-line{font-size:14px;color:#fff}
.s-look-house .bd{width:184px;text-align:center;padding:24px 0;margin:auto;border-top:dashed 1px #888}
.s-look-house .bd .service-list{height:360px}
.s-look-house .bd .title{font-size:16px;color:#fff}
.s-look-house .bd .item:first-child .icon-down{display:none}
.s-look-house .bd .item{margin-bottom:38px}
.s-look-house .bd .item .img-area{position:relative;margin:15px auto;width:96px;height:60px;border:solid 1px #888}
.s-look-house .bd .item .icon-down{height:12px;width:12px;margin:-15px auto;background:url(/img/bg-down.png) no-repeat}
.s-look-house .bd .item .name{position:absolute;bottom:-8px;width:60px;left:18px;color:#fff;font-size:14px;background-color:#434343}
.s-look-house .bd .item .item-des{font-size:12px;color:#fff;max-width:190px;overflow:hidden}
.s-look-house .bd .item .img-area img{width:36px;height:36px;margin-top:10px}
</style>
<div class="right-flow" style="right: -240px;">
    <div class="sidebar">
        <div class="upper">
            <div class="s-item s-login" style="height: 100px;">
                <a href="http://beihai.chuanhai.jtr168.cn/news/index_22.html" target="_blank" class="bg-img"></a>
                <p class="center white">买房必看</p>                    
                <div class="des" style="display: none; opacity: 0; right: 48px;width: 160px;top: 0">
                <a href="http://beihai.chuanhai.jtr168.cn/news/index_22.html" target="_blank">买房为什么找【川海房产】？</a></div> 
            </div>
            <div class="s-item s-look" style="height: 100px;">
                <a href="javascript:;" class="bg-img"></a>
                <p class="center white">预约看房</p>              
                <div class="des" style="display: none; opacity: 0; right: 48px;top: 0">预约看房</div>
            </div>
            <hr class="s-line">
            <div class="s-item s-customer">
                <a href="https://byt.zoosnet.net/LR/Chatpre.aspx?id=BYT35574945&cid=a1062762b2c444b3a4a51af0d15beb0a&lng=cn&sid=6b08d724350e4473a55764d93a8ab433&p=http%3A//beihai.chuanhai.jtr168.cn/&rf1=&rf2=&msg=&d=1608786341791" target="_blank" class="bg-img"></a>
                <p class="center white">在线咨询</p>
                <div class="des" style="display: none; opacity: 0; right: 48px;top: 0">
                  <a href="https://byt.zoosnet.net/LR/Chatpre.aspx?id=BYT35574945&cid=a1062762b2c444b3a4a51af0d15beb0a&lng=cn&sid=6b08d724350e4473a55764d93a8ab433&p=http%3A//beihai.chuanhai.jtr168.cn/&rf1=&rf2=&msg=&d=1608786341791" target="_blank">在线客服</a>
                </div>
            </div>
        </div>
        <div class="lower">
            <div class="s-item s-erweima" style="height: 90px;">
                <a href="javascript:;" class="bg-img">微信二维码</a>
                <p class="center white">手机找房</p>
                <div class="des" style="display: none; opacity: 1; right: 48px;top: 0">
                    <img class="lazy" src="../img/code.png" alt="二维码">
                    <span class="text"></span><br>
                    <span class="text">手机找房</span>
                </div>
            </div>
            <div class="s-item s-top">
                <a href="javascript:;" class="bg-img index-top"></a>
                <div class="des" style="display: none; opacity: 0; right: 48px;top: 0">返回顶部</div>
            </div>
            <div class="s-item s-survey">
                <a href="http://beihai.chuanhai.jtr168.cn/about/gfbz.html" target="_blank" class="bg-img">购房保障</a>
                <p class="center white">购房保障</p>
                <a style="text-decoration:none;width: 80px;top: 0" target="_blank" href="http://beihai.chuanhai.jtr168.cn/about/gfbz.html" class="des">购房保障</a>
            </div>
        </div>
    </div>
    <div class="content-sh">
        <div class="s-look-house animated" style="height: 100%; z-index: 1;">
            <div class="hd">
                <div class="img-area">
                    <img class="lazy" src="/img/img-head.png" alt="头像">
                </div>
                <div class="ipt-area">
                  <form method="post" id="from-up6" class="submit_area">
                    <input type="hidden" name="pid" value="33">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="lpid" value="0">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="ly" value="北海分站首页_右侧_我要预约">     <!--报名来源 具体查看applyVerify.js文件中source 标识说明-->
                    <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->
                    <input type="text" class="phone common-free-call-input common-free-mobile-ipt" id="lp-wyyy-mobile" name="mobile" placeholder="请输入您的手机号">
                    <button class="ipt-btn  btn-cons common-free-mobile-btn apply_submit" type="button">我要预约</button>
                  </form>
                </div>
                <p class="hot-line">咨询：<span class="com-tel"><?php echo $config['company_tel'];?></span></p>
            </div>
            <div class="bd">
                <h2 class="title">新房全程服务您看房</h2>
                <div class="service-list mCustomScrollbar _mCS_1" style="height: 494.5px;">
                    <div id="mCSB_1" class="mCustomScrollBox mCS-light mCSB_vertical mCSB_inside" style="max-height: none;" tabindex="0">
                    <div id="mCSB_1_container" class="mCSB_container" style="position: relative; top: 0px; left: 0px;" dir="ltr">
                    <div class="item">
                        <div class="icon-down"></div>
                        <div class="img-area">
                            <img class="lazy" src="/img/img-look1.png" alt="咨询">
                            <div class="name">报名咨询</div>
                        </div>
                        <div class="item-des">倾听你的买房需求</div>
                    </div>
                    <div class="item">
                        <div class="icon-down"></div>
                        <div class="img-area">
                            <img class="lazy" src="/img/img-look2.png" alt="咨询">
                            <div class="name">专车看房</div>
                        </div>
                        <div class="item-des">一对一免费专车全程接送</div>
                    </div>
                    <div class="item">
                        <div class="icon-down"></div>
                        <div class="img-area">
                            <img class="lazy" src="/img/img-look3.png" alt="咨询">
                            <div class="name">楼盘解析</div>
                        </div>
                        <div class="item-des">市场、区域、政策、楼盘全面解析</div>
                    </div>
                    <div class="item">
                        <div class="icon-down"></div>
                        <div class="img-area">
                            <img class="lazy" src="/img/img-look4.png" alt="咨询">
                            <div class="name">签约把关</div>
                        </div>
                        <div class="item-des">合同解读免你后顾之忧</div>
                    </div>
                </div>
                </div>
              </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
$('.s-look').click(function() {    
  var r=$('.right-flow').css('right'); 
  if(r=='0px'){
      $('.right-flow').css('right',-240);
  }else{
      $('.right-flow').css('right',0);
  }
});
$('.lower .s-erweima .bg-img').click(function(){
   $('.lower .s-erweima .des').toggle();
});
  $(".index-top").click(function() {
          var speed=200;//滑动的速度
          $('body,html').animate({ scrollTop: 0 }, speed);
          return false;
       });

</script>
<!-- 右侧边栏 end--> 

<?php include("top.php");?>
<script type="text/javascript" src="/public/static/home/js/huanping.js"></script> 
<div class="index-banner-menu">
  <!-- banner的菜单 -->
  <div class="wrap-v5 side-menu-wrap">
    <ul class="side-menu J_sideMenu">
      <li class="">
        <a href="/loupan/" class="aitem" >
          <i class="iconfont icon-building-simple"></i>
          <span>新房</span>
          <ins></ins>
        </a>
        <div class="detail-box">
          <div class="btns">
            <a href="/map/" target="_blank" class="jwbtn tomap"><i></i>地图找房</a>
            &nbsp;&nbsp;或&nbsp;&nbsp;
            <a style="cursor:pointer;" onClick="sq();" class="jwbtn xf-consult"><i></i>找专业置业顾问咨询</a>
          </div>
            <div class="sort mt20">
                <span class="lab">区域</span>
                <?php
                $city=$mysql->query("select * from `web_city` where `pid`='{$sitecitybid}' and `city_st`='1' order by `city_px` asc");
                foreach($city as $cityall){
                    echo '<a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/loupan/" target="_blank">'.$cityall['city_name'].'</a>';
                }
                ?>
            </div>
			<div class="sort">
            	<span class="lab">价格</span>
				<?php
                $flag=$mysql->query("select * from `web_flag` where `flag_fl`='7' and `flag_st`='1' order by `flag_px` asc");
                foreach($flag as $flagall){
                    echo '<a href="/loupan/p'.$flagall['flag_bm'].'" target="_blank">'.$flagall['flag'].'</a>';
                }
                ?>
			</div>
        	<div class="sort">
              <span class="lab">特色</span>
				<?php
                $flag=$mysql->query("select * from `web_flag` where `flag_fl`='6' and `flag_st`='1' order by `flag_px` asc");
                foreach($flag as $flagall){
                    echo '<a href="/loupan/t'.$flagall['flag_bm'].'" target="_blank">'.$flagall['flag'].'</a>';
                }
                ?>
			</div>
        </div>
      </li>
            <!-- 海景房 -->
      <li class="">
        <a href="/loupan/ttsa1" class="aitem" >
          <i class="iconfont icon-islands"></i>
          <span>海景房</span>
          <ins></ins>
        </a>        
        <div class="detail-box esf-detail-box">
          <div class="btns">
         <!--   <a href="/map/" target="_blank" class="jwbtn tomap"><i></i>地图找房</a>
            &nbsp;&nbsp;或&nbsp;&nbsp;-->
            <a style="cursor:pointer;" onClick="sq();" class="jwbtn xf-consult"><i></i>找专业置业顾问咨询</a>
          </div>
            <div class="sort mt20">
                <span class="lab">区域</span>
                <?php
                $city=$mysql->query("select * from `web_city` where `pid`='{$sitecitybid}' and `city_st`='1' order by `city_px` asc");
                foreach($city as $cityall){
                    echo '<a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/loupan/ttsa1" target="_blank">'.$cityall['city_name'].'</a>';
                }
                ?>
            </div>
			<div class="sort">
            	<span class="lab">价格</span>
				<?php
                $flag=$mysql->query("select * from `web_flag` where `flag_fl`='7' and `flag_st`='1' order by `flag_px` asc");
                foreach($flag as $flagall){
                    echo '<a href="/loupan/ttsa1_p'.$flagall['flag_bm'].'" target="_blank">'.$flagall['flag'].'</a>';
                }
                ?>
			</div>
        </div>
      </li>
      <!-- 海景房 -->
      <!-- 别墅 -->
      <li class="">
		<a href="/loupan/tts6" class="aitem" >
          <i class="iconfont icon-dudongbieshu"></i>
          <span>别墅</span>
          <ins></ins>
        </a>
			<div class="detail-box esf-detail-box">
              <div class="btns">
               <!-- <a href="/map/" target="_blank" class="jwbtn tomap"><i></i>地图找房</a>
                &nbsp;&nbsp;或&nbsp;&nbsp;-->
                <a style="cursor:pointer;" onClick="sq();" class="jwbtn xf-consult"><i></i>找专业置业顾问咨询</a>
              </div>
                <div class="sort mt20">
                <span class="lab">区域</span>
                <?php
                $city=$mysql->query("select * from `web_city` where `pid`='{$sitecitybid}' and `city_st`='1' order by `city_px` asc");
                foreach($city as $cityall){
                    echo '<a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/loupan/tts6" target="_blank">'.$cityall['city_name'].'</a>';
                }
                ?>
            </div>
			<div class="sort">
            	<span class="lab">价格</span>
				<?php
                $flag=$mysql->query("select * from `web_flag` where `flag_fl`='7' and `flag_st`='1' order by `flag_px` asc");
                foreach($flag as $flagall){
                    echo '<a href="/loupan/tts6_p'.$flagall['flag_bm'].'" target="_blank">'.$flagall['flag'].'</a>';
                }
                ?>
			</div>
        </div>
      </li>
      <!-- 别墅 end-->
      <!-- 别墅 -->
      <li class="">
		<a href="/loupan/tts7" class="aitem" >
          <i class="iconfont icon-dudongbieshu"></i>
          <span>公寓/写字楼</span>
          <ins></ins>
        </a>
			<div class="detail-box esf-detail-box">
              <div class="btns">
            <!--    <a href="/map/" target="_blank" class="jwbtn tomap"><i></i>地图找房</a>
                &nbsp;&nbsp;或&nbsp;&nbsp;-->
                <a style="cursor:pointer;" onClick="sq();" class="jwbtn xf-consult"><i></i>找专业置业顾问咨询</a>
              </div>
                <div class="sort mt20">
                <span class="lab">区域</span>
                <?php
                $city=$mysql->query("select * from `web_city` where `pid`='{$sitecitybid}' and `city_st`='1' order by `city_px` asc");
                foreach($city as $cityall){
                    echo '<a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/loupan/tts7" target="_blank">'.$cityall['city_name'].'</a>';
                }
                ?>
            </div>
			<div class="sort">
            	<span class="lab">价格</span>
				<?php
                $flag=$mysql->query("select * from `web_flag` where `flag_fl`='7' and `flag_st`='1' order by `flag_px` asc");
                foreach($flag as $flagall){
                    echo '<a href="/spxzl/tts7_p'.$flagall['flag_bm'].'" target="_blank">'.$flagall['flag'].'</a>';
                }
                ?>
			</div>
        </div>
      </li>
      <!-- 别墅 end-->
  
    </ul>
  </div>
<div class="banner-box full-banner-box">
	<div class="banner-imgs" id="bannerSlider">
		<div class="slidecon">
      <!-- 延迟加载的图片请注意图片路径写在data-original上 -->
		<div class="tempWrap">
			<ul class="clearfix" id="loopAdUl">
			<?php
            $row = $mysql->query("select * from `web_link` where `ad_id`='19' and `city_id`='{$sitecityid}' order by px asc");
            foreach($row as $k=>$list){
            ?>
            <li class="item">
                <a target="_blank" href="<?php echo $list['link_url'];?>"><img class="lazy" src="<?php echo $list['img'];?>"   alt=""><div class="smtips-wrap"><i class="smtips"></i></div></a>
            </li>
            <?php
            }
            ?>
			</ul>
        </div>
    </div>
    <ul class="slide-controls">
    <?php
	$row = $mysql->query("select * from `web_link` where `ad_id`='19' and `city_id`='{$sitecityid}' order by px asc");
	foreach($row as $k=>$list){
	?>
		<li <?php if($k==0){ echo 'class="on"';}?>><?php echo $k+1;?></li>
	<?php
	}
	?>
	</ul>
  <a href="javascript:;" class="prev" style="left: 683.5px;"></a>
  <a href="javascript:;" class="next" style="right: 463.5px;"></a></div>
</div>
<!-- banner下方 -->
<style type="text/css">
.act2{ color: #fff;background: #62ab00;padding: 0px 10px;border-radius: 5px;}
.mt15 .act2:hover{color: #fff!important}
</style>
</div>
<div class="section-search mt20">
    <div class="wrap-v5 clearfix">
      <div class="search-item w1">
       <p class="lab"><a href="###"><span><?php echo $sitecityname;?>房价</span></a></p>
        <div class="fj-chart mt15" id="fjChart"></div>
        <!--<p class="lab"><a href="/map/" target="_blank"><span>地图找房</span></a></p>
        <div class="fj-chart mt15" id="fjChart"></div>-->
        <!--<div class="fj-chart mt15" ><img src="image/mps.png"></div>-->
      </div>
      <div class="search-item w2">
        <p class="lab"><a href="/loupan/" target="_blank" >找<span>新房</span></a></p>
        <ul class="mt15">
          <li class="clearfix" style="height: auto;">
              <span>区域</span>
              <?php
                    $city=$mysql->query("select * from `web_city` where `pid`='{$sitecitybid}' and `city_st`='1' order by `city_px` asc");
                    foreach($city as $cityall){
                       // echo '<a href="/loupan/?city_id='.$cityall['id'].'" target="_blank">'.$cityall['city_name'].'</a>';
						 echo '<a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/" target="_blank">'.$cityall['city_name'].'</a>';
                    }
                    ?>
          </li>
          <li class="clearfix">
            <span>均价</span>
                    <?php
                    $flag=$mysql->query("select * from `web_flag` where `flag_fl`='7' and `flag_st`='1' order by `flag_px` asc");
                    foreach($flag as $flagall){
                        echo '<a href="/loupan/p'.$flagall['flag_bm'].'" target="_blank">'.$flagall['flag'].'</a>';
                    }
                    ?>
			</li>
          <li class="clearfix">
            <span>户型</span>
			<?php
            $flag=$mysql->query("select * from `web_flag` where `flag_fl`='4' and `flag_st`='1' order by `flag_px` asc");
			foreach($flag as $flagall){
				echo '<a href="/loupan/h'.$flagall['flag_bm'].'" target="_blank">'.$flagall['flag'].'</a>';
			}
			?>
			</li>
          <li class="clearfix">
            <span>特色</span>
			<?php
            $flag=$mysql->query("select * from `web_flag` where `flag_fl`='6' and `flag_st`='1' order by `flag_px` asc");
			foreach($flag as $flagall){
				echo '<a href="/loupan/t'.$flagall['flag_bm'].'" target="_blank">'.$flagall['flag'].'</a>';
			}
			?>
			</li>
        </ul>
      </div>
    </div>
  </div>
<div class="mt20">
  <div class="index-tab__mod J_indexTopTab">
    <div class="index-tab-title pr" style="width: 1200px; margin: 0 auto">
        <h3 class="col-md-4 active">热销楼盘</h3>
        <h3 class="col-md-4">一线海景</h3>        
        <h3 class="col-md-4">精品别墅</h3>
    </div>
    <div class="h10"></div>
    <div class="w1200">
      <div class="index-tab-container active" style="width: 1300px;" >
      	<?php
		$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px1 desc limit 0,4");// and `city_id`='57'
		foreach($row as $k=>$list){
		$url="/loupan/{$list['id']}.html";
		?>
        <div class="index-house__pic">
          <a href="<?php echo $url;?>" target="_blank">
          <img class="lazy" src="<?php echo $list['img'];?>"  alt="<?php echo $list['title'];?>" title ="<?php echo $list['title'];?>">
          <h4><span class="fr"><?php if($list['esfcx']<>'' and $list['esfcx']<>'0'){echo (int)$list['esfcx'];}else{ echo rand(350,820);}?>人报名</span><?php echo $list['title'];?></h4>
          </a>
          <div class="w-info">
            <div class="w-info__left">
              <h3><?php echo cityname($list['city_id']);?></h3>
              <p style="height:14px; overflow:hidden;"><?php echo $list['xmdz'];?></p>
            </div>
            <div class="w-info__right">
              <h3><?php echo $list['xmts'];?></h3>
              <?php if($list['all_price']==0){?>
					<?php if($list['jj_price']==0){?>
                        <p>待定</p>
                    <?php }else{?>
                        <p>均价<?php echo $list['jj_price'];?>元/㎡</p>
                    <?php }?>
				<?php }else{?>
             	 <p>总价<?php echo $list['all_price'];?>万/套</p>
				<?php }?>
            </div>
          </div>
        </div>
		<?php
		}
		?>
        </div>
      <div class="index-tab-container"  style="width: 1300px;">
      <?php
		$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px16 desc limit 0,4");// and `city_id`='57'
		foreach($row as $k=>$list){
		$url="/loupan/{$list['id']}.html";
		?>
        <div class="index-house__pic tenrtd">
            <a href="<?php echo $url;?>" target="_blank">
                         <img class="lazy" src="<?php echo $list['img'];?>"  alt="<?php echo $list['title'];?>" title="<?php echo $list['title'];?>" >
                          <h4><span class="fr"><?php if($list['esfcx']<>'' and $list['esfcx']<>'0'){echo (int)$list['esfcx'];}else{ echo rand(350,820);}?>人报名</span><?php echo $list['title'];?></h4>
              <!-- <span class="bmnum">790人报名</span> -->
                          </a>
            <div class="w-info">
              <div class="text2">
              <?php if($list['all_price']==0){?>
					<?php if($list['jj_price']==0){?>
                        <b>待定</b>
                    <?php }else{?>
                        <b>均价<?php echo $list['jj_price'];?>元/㎡</b>
                    <?php }?>
				<?php }else{?>
             	 <b>总价<?php echo $list['all_price'];?>万/套</b>
				<?php }?>
                <em><?php echo $list['xmts'];?></em>
              </div>
              <div class="text3">
                 <!-- 1603 -->
                 <?php echo loupanflagtsit($list['flagts'],6,3);?>
				</div>
            </div>
          </div>
		<?php
		}
		?>
		</div>
      <div class="index-tab-container"  style="width: 1300px;">
         <?php
		$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px17 desc limit 0,4");// and `city_id`='57'
		foreach($row as $k=>$list){
		$url="/loupan/{$list['id']}.html";
		?>
        <div class="index-house__pic tenrtd">
            <a href="<?php echo $url;?>" target="_blank">
                         <img class="lazy" src="<?php echo $list['img'];?>"  alt="<?php echo $list['title'];?>" title="<?php echo $list['title'];?>" >
                          <h4><span class="fr"><?php if($list['esfcx']<>'' and $list['esfcx']<>'0'){echo (int)$list['esfcx'];}else{ echo rand(350,820);}?>人报名</span><?php echo $list['title'];?></h4>
              <!-- <span class="bmnum">790人报名</span> -->
                          </a>
            <div class="w-info">
              <div class="text2">
              <?php if($list['all_price']==0){?>
					<?php if($list['jj_price']==0){?>
                        <b>待定</b>
                    <?php }else{?>
                        <b>均价<?php echo $list['jj_price'];?>元/㎡</b>
                    <?php }?>
				<?php }else{?>
             	 <b>总价<?php echo $list['all_price'];?>万/套</b>
				<?php }?>
                <em><?php echo $list['xmts'];?></em>
              </div>
              <div class="text3">
                 <!-- 1603 -->
                 <?php echo loupanflagtsit($list['flagts'],6,3);?>
				</div>
            </div>
          </div>
		<?php
		}
		?>
		</div>
    </div>
  </div>
</div>
<div class="h10"></div>
<div class="clearfix w1200 index_house__view J_indexHouseTab">
  <div class="w-view__left">
    <div class="index-bar__small">
      <a href="/loupan/" class="t-1" >热销新盘</a>
      <span class="icon-map"><a  href="javascript:;"   data-name='预约看房' data-type='<?php echo $sitecityname;?>首页_预约看房' class="bmkf-up">预约看房</a></span>
    </div>
    <div class="w-search-link">
      <button class="btn btn-success">热销楼盘TOP</button>
      <ul class="hot-house-price">
		<?php
		$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px2 desc limit 0,8");// and `city_id`='57'
		foreach($row as $k=>$list){
		$url="/loupan/{$list['id']}.html";
		?>
        <li>
              <a href="<?php echo $url;?>" target="_blank" title="<?php echo $list['title'];?>">
                <span class="name"><?php echo $list['title'];?></span>
                <?php if($list['all_price']==0){?>
					<?php if($list['jj_price']==0){?>
                        <span class="price">待定</span>
                    <?php }else{?>
                        <span class="price"><?php echo $list['jj_price'];?>元/㎡</span>
                    <?php }?>
				<?php }else{?>
                 <span class="price"><?php echo $list['all_price'];?>万/套</span>
				<?php }?>
              </a>
        </li>
		<?php
		}
		?>
        </ul>
      <!-- 报名 -->
      <div style="height: 10px;"></div>
      <?php
				$row = $mysql->query("select * from `web_link` where `ad_id`='36' and `city_id`='{$sitecityid}' order by px asc limit 0,1");
				foreach($row as $k=>$list){
				?>
                <div>
                    <!-- 取消了广告图片链接 -->
      <img class="lazy" src="<?php echo $list['img'];?>"  width="210" height="75">
      </div>
				<?php
				}
				?>
     
      <!--<div class="tgbox">
      <p>买新房为什么选我们？</p>
        <p>已报名<em id="mfcount">2601</em>人        
          <a href="javascript:;" data-name='免费报名' data-type='<?php echo $sitecityname;?>首页_免费报名' class="bm bmkf-up">免费报名</a>
          <a href="/loupan/" target="_blank" >更多&gt;</a>                
        </p>
      </div>-->
      <!-- 报名 end-->
    </div>
  </div>
    <div class="w-view__center">
    <div class="w-view-center-bar">
      <dl>
        <dd class="active" ><a href="javascript:;">优选楼盘</a></dd>
        <dd><a href="javascript:;">品牌地产</a></dd>
        <dd><a href="javascript:;">小户型</a></dd>
        <dd><a href="javascript:;">低总价</a></dd>
        <dd><a href="javascript:;">精装洋房</a></dd>
        <dd><a href="javascript:;">特价优惠</a></dd>
       </dl>
      <!--<a href="/loupan/" class="more" >更多&raquo;</a>-->
    </div>
    <div class="clearfix">
      <div class="w-main">
        <!-- 优选房源tab -->
        <div class="index-house-tab-item active">
			<div class="swiper-container w-view-swiper J_viewSwiper1">
                <div class="swiper-wrapper">
                <?php
				$row = $mysql->query("select * from `web_link` where `ad_id`='37' and `city_id`='{$sitecityid}' order by px asc limit 0,1");
				foreach($row as $k=>$list){
				?>
				<div class="swiper-slide">
					<a href="<?php echo $list['link_url'];?>" target="_blank"><img class="lazy" src="<?php echo $list['img'];?>"  width="430" height="195" ></a>
				</div>
				<?php
				}
				?>
				</div>
                <div class="swiper-pagination"></div>
			</div>
          <!-- Swiper -->
		<?php
		$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px3 desc limit 0,6");// and `city_id`='57'
		foreach($row as $k=>$list){
		$url="/loupan/{$list['id']}.html";
		?>
        <div class="w-view-house">
              <a href="<?php echo $url;?>" target="_blank">
				<img class="lazy" src="<?php echo $list['img'];?>"  alt="<?php echo $list['title'];?>" >
                <p><?php echo $list['title'];?></p>
              </a>
              <div class="w-info">
                <div class="price-bar">
                <?php if($list['all_price']==0){?>
					<?php if($list['jj_price']==0){?>
                        <span class="price">待定</span>
                    <?php }else{?>
                        <span class="price"><?php echo $list['jj_price'];?>元/㎡</span>
                    <?php }?>
				<?php }else{?>
                 <span class="price"><?php echo $list['all_price'];?>万/套</span>
				<?php }?>
                <span class="w-number"><b><?php if($list['esfcx']<>'' and $list['esfcx']<>'0'){echo (int)$list['esfcx'];}else{ echo rand(350,820);}?></b>人报名</span></div>
                <p class="address"><?php echo $list['xmts'];?></p>
              </div>
          </div>
		<?php
		}
		?>
		</div>
        <!-- 品牌地产 -->
		<div class="index-house-tab-item active">
			<?php
            $row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px4 desc limit 0,8");// and `city_id`='57'
            foreach($row as $k=>$list){
            $url="/loupan/{$list['id']}.html";
            ?>
            <div class="w-view-house">
                  <a href="<?php echo $url;?>" target="_blank">
                    <img class="lazy" src="<?php echo $list['img'];?>"  alt="<?php echo $list['title'];?>" >
                    <p><?php echo $list['title'];?></p>
                  </a>
                  <div class="w-info">
                    <div class="price-bar">
                    <?php if($list['all_price']==0){?>
                        <?php if($list['jj_price']==0){?>
                            <span class="price">待定</span>
                        <?php }else{?>
                            <span class="price"><?php echo $list['jj_price'];?>元/㎡</span>
                        <?php }?>
                    <?php }else{?>
                     <span class="price"><?php echo $list['all_price'];?>万/套</span>
                    <?php }?>
                    <span class="w-number"><b><?php if($list['esfcx']<>'' and $list['esfcx']<>'0'){echo (int)$list['esfcx'];}else{ echo rand(350,820);}?></b>人报名</span></div>
                    <p class="address"><?php echo $list['xmts'];?></p>
                  </div>
              </div>
            <?php
            }
            ?>
        </div>
        <!-- 小户型 -->
        <div class="index-house-tab-item active">
			<?php
            $row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px7 desc limit 0,8");// and `city_id`='57'
            foreach($row as $k=>$list){
            $url="/loupan/{$list['id']}.html";
            ?>
            <div class="w-view-house">
                  <a href="<?php echo $url;?>" target="_blank">
                    <img class="lazy" src="<?php echo $list['img'];?>"  alt="<?php echo $list['title'];?>" >
                    <p><?php echo $list['title'];?></p>
                  </a>
                  <div class="w-info">
                    <div class="price-bar">
                    <?php if($list['all_price']==0){?>
                        <?php if($list['jj_price']==0){?>
                            <span class="price">待定</span>
                        <?php }else{?>
                            <span class="price"><?php echo $list['jj_price'];?>元/㎡</span>
                        <?php }?>
                    <?php }else{?>
                     <span class="price"><?php echo $list['all_price'];?>万/套</span>
                    <?php }?>
                    <span class="w-number"><b><?php if($list['esfcx']<>'' and $list['esfcx']<>'0'){echo (int)$list['esfcx'];}else{ echo rand(350,820);}?></b>人报名</span></div>
                    <p class="address"><?php echo $list['xmts'];?></p>
                  </div>
              </div>
            <?php
            }
            ?>
        </div>
		<!-- 低总价 -->
        <div class="index-house-tab-item active">
			<?php
            $row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px5 desc limit 0,8");// and `city_id`='57'
            foreach($row as $k=>$list){
            $url="/loupan/{$list['id']}.html";
            ?>
            <div class="w-view-house">
                  <a href="<?php echo $url;?>" target="_blank">
                    <img class="lazy" src="<?php echo $list['img'];?>"  alt="<?php echo $list['title'];?>" >
                    <p><?php echo $list['title'];?></p>
                  </a>
                  <div class="w-info">
                    <div class="price-bar">
                    <?php if($list['all_price']==0){?>
                        <?php if($list['jj_price']==0){?>
                            <span class="price">待定</span>
                        <?php }else{?>
                            <span class="price"><?php echo $list['jj_price'];?>元/㎡</span>
                        <?php }?>
                    <?php }else{?>
                     <span class="price"><?php echo $list['all_price'];?>万/套</span>
                    <?php }?>
                    <span class="w-number"><b><?php if($list['esfcx']<>'' and $list['esfcx']<>'0'){echo (int)$list['esfcx'];}else{ echo rand(350,820);}?></b>人报名</span></div>
                    <p class="address"><?php echo $list['xmts'];?></p>
                  </div>
              </div>
            <?php
            }
            ?>
        </div>
		<!-- 精装洋房 -->
        <div class="index-house-tab-item active">
			<?php
            $row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px6 desc limit 0,8");// and `city_id`='57'
            foreach($row as $k=>$list){
            $url="/loupan/{$list['id']}.html";
            ?>
            <div class="w-view-house">
                  <a href="<?php echo $url;?>" target="_blank">
                    <img class="lazy" src="<?php echo $list['img'];?>"  alt="<?php echo $list['title'];?>" >
                    <p><?php echo $list['title'];?></p>
                  </a>
                  <div class="w-info">
                    <div class="price-bar">
                    <?php if($list['all_price']==0){?>
                        <?php if($list['jj_price']==0){?>
                            <span class="price">待定</span>
                        <?php }else{?>
                            <span class="price"><?php echo $list['jj_price'];?>元/㎡</span>
                        <?php }?>
                    <?php }else{?>
                     <span class="price"><?php echo $list['all_price'];?>万/套</span>
                    <?php }?>
                    <span class="w-number"><b><?php if($list['esfcx']<>'' and $list['esfcx']<>'0'){echo (int)$list['esfcx'];}else{ echo rand(350,820);}?></b>人报名</span></div>
                    <p class="address"><?php echo $list['xmts'];?></p>
                  </div>
              </div>
            <?php
            }
            ?>
        </div>
		<!-- 特价优惠 -->
        <div class="index-house-tab-item active">
			<?php
            $row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px8 desc limit 0,8");// and `city_id`='57'
            foreach($row as $k=>$list){
            $url="/loupan/{$list['id']}.html";
            ?>
            <div class="w-view-house">
                  <a href="<?php echo $url;?>" target="_blank">
                    <img class="lazy" src="<?php echo $list['img'];?>"  alt="<?php echo $list['title'];?>" >
                    <p><?php echo $list['title'];?></p>
                  </a>
                  <div class="w-info">
                    <div class="price-bar">
                    <?php if($list['all_price']==0){?>
                        <?php if($list['jj_price']==0){?>
                            <span class="price">待定</span>
                        <?php }else{?>
                            <span class="price"><?php echo $list['jj_price'];?>元/㎡</span>
                        <?php }?>
                    <?php }else{?>
                     <span class="price"><?php echo $list['all_price'];?>万/套</span>
                    <?php }?>
                    <span class="w-number"><b><?php if($list['esfcx']<>'' and $list['esfcx']<>'0'){echo (int)$list['esfcx'];}else{ echo rand(350,820);}?></b>人报名</span></div>
                    <p class="address"><?php echo $list['xmts'];?></p>
                  </div>
              </div>
            <?php
            }
            ?>
        </div>
		<!-- 温泉 -->
        
		</div>
    </div>
  </div>
  
  <div class="w-view__right">
    <div class="index-bar__small">
      <a href="/loupan/" class="t-1" >团购优惠看房</a>
      
	<a href="/loupan/" class="more" >更多&raquo;</a>
    </div>
    <div id="index-splash-block" class="huan300">
    <style>
	.ind_kfbm { width:246px; margin-left:30px;}
	.ind_kfbm p { line-height:30px;}
	.ind_kfbm p font { font-size:18px; color:#00A0EA;}
	.ind_kfbm input { width:246px;}
	</style>
     <div class="ind_kfbm">
     	<img src="image/tgv1_03.png" width="246" height="79" style="margin-bottom:10px;">
        <p>全程免费接机、住宿安排</p>
        <p>报名热线：<font><?php echo $config['company_tel'];?></font></p>
         <form class="submit_area">
                    <input type="hidden" name="pid" value="33">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="lpid" value="0">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="ly" value="<?php echo $sitecityname;?>首页_看房报名">     <!--报名来源 具体查看applyVerify.js文件中source 标识说明-->
                    <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->
                    <input type="text" name="intention_city" placeholder="意向城市" class="regist-input3 mt15" style="margin-top: 15px;">
                    <input type="text" name="name" placeholder="您的姓名" class="regist-input3 mt15" style="margin-top: 15px;">
                    <input type="text" name="mobile" placeholder="您的手机号码" class="regist-input3 mt15" style="margin-top: 15px;">
        <div class="h30"></div>  
                    <input type="button" value="提交" class="m_Find_submit sign-btn3 apply_submit regist-submit">
               
            </form>
     </div>
	</div>
  </div>
    
</div>
<!-- 一线海景 -->
<div class="clearfix w1200 index_house__view J_indexHouseTab" style=" height:470px;">
	<div class="w-view__left" style="position:relative;">
        <div class="index-bar__small">       
            <a href="/loupan/ttsa1" class="t-1">一线海景</a><span class="icon-map"><a  href="/map/">地图找房</a></span>
        </div>
        <div class="w-search-link">
      <button class="btn btn-success">热销海景项目</button>
      <ul class="hot-house-price">
		<?php
		$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px9 desc limit 0,8");// and `city_id`='57'
		foreach($row as $k=>$list){
		$url="/loupan/{$list['id']}.html";
		?>
        <li>
              <a href="<?php echo $url;?>" target="_blank" title="<?php echo $list['title'];?>">
                <span class="name"><?php echo $list['title'];?></span>
                <?php if($list['all_price']==0){?>
					<?php if($list['jj_price']==0){?>
                        <span class="price">待定</span>
                    <?php }else{?>
                        <span class="price"><?php echo $list['jj_price'];?>元/㎡</span>
                    <?php }?>
				<?php }else{?>
                 <span class="price"><?php echo $list['all_price'];?>万/套</span>
				<?php }?>
              </a>
        </li>
		<?php
		}
		?>
        </ul>
      <!-- 报名 -->
      <div style="height: 10px;"></div>
      
      <?php
				$row = $mysql->query("select * from `web_link` where `ad_id`='36' and `city_id`='{$sitecityid}' order by px asc limit 1,1");
				foreach($row as $k=>$list){
				?>
                <div>
               <!-- 取消广告图片链接-->
      <img class="lazy" src="<?php echo $list['img'];?>"  width="210" height="75">
      </div>
				<?php
				}
				?>
      <!-- 报名 end-->
    </div>
</div>
    <div class="w-view__center clearfix">
    <div class="w-view-center-bar">
      <dl>
        <dd class="active" ><a href="javascript:;">畅销楼盘</a></dd>
	</dl>
               
    </div>
    <div class="clearfix" style="position:relative;">
      <div class="w-main">
        <!-- 畅销楼盘tab -->
        <div class="index-house-tab-item active">
          <div class="swiper-container w-view-swiper J_viewSwiper2">
            <div class="swiper-wrapper">
                <?php
				$row = $mysql->query("select * from `web_link` where `ad_id`='37' and `city_id`='{$sitecityid}' order by px asc limit 1,1");
				foreach($row as $k=>$list){
				?>
				<div class="swiper-slide">
					<a href="<?php echo $list['link_url'];?>" target="_blank"><img class="lazy" src="<?php echo $list['img'];?>"  width="430" height="195" ></a>
				</div>
				<?php
				}
				?>
				</div>
            <div class="swiper-pagination"></div>
          </div>
          <!-- Swiper -->  
          <?php
			$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px18 desc limit 0,6");// and `city_id`='57'
			foreach($row as $k=>$list){
			$url="/loupan/{$list['id']}.html";
			?>
			<div class="w-view-house">
				  <a href="<?php echo $url;?>" target="_blank">
					<img class="lazy" src="<?php echo $list['img'];?>" alt="<?php echo $list['title'];?>" >
					<p><?php echo $list['title'];?></p>
				  </a>
				  <div class="w-info">
					<div class="price-bar">
					<?php if($list['all_price']==0){?>
						<?php if($list['jj_price']==0){?>
							<span class="price">待定</span>
						<?php }else{?>
							<span class="price"><?php echo $list['jj_price'];?>元/㎡</span>
						<?php }?>
					<?php }else{?>
					 <span class="price"><?php echo $list['all_price'];?>万/套</span>
					<?php }?>
					<span class="w-number"><b><?php if($list['esfcx']<>'' and $list['esfcx']<>'0'){echo (int)$list['esfcx'];}else{ echo rand(350,820);}?></b>人报名</span></div>
					<p class="address"><?php echo $list['xmts'];?></p>
				  </div>
			  </div>
			<?php
			}
			?>
		</div>

	</div>
    </div>
  </div>
  
  <div class="w-view__right">
    <div class="index-bar__small">
      <a href="/loupan/" class="t-1" >最新特惠楼盘</a>
      
	<a href="/loupan/" class="more" >更多&raquo;</a>
    </div>
    <div id="index-splash-block" class="huan300">
      <div class="h20"></div>
    <div id="feature-slide-block" class="feature-slide-block">
        <div id="feature-slide-list" class="feature-slide-list">
            <a href="javascript:;" id="feature-slide-list-previous" class="feature-slide-list-previous"></a>
            <div id="feature-slide-list-items" class="feature-slide-list-items"><a href="#" class="current"></a><a href="#"></a><a href="#"></a></div>
            <a href="javascript:;" id="feature-slide-list-next" class="feature-slide-list-next"></a>
            <div id="dsy_D01_108"> <a href="/news/" id="feature-slide-list-fangchanquan" class="feature-slide-list-fangchanquan ml25">更多</a> </div>
        </div>
        <div class="feature-slide-preview" style="display: block;">
            <div class="a300nr">
                <div class="a200nrbt" id="dsy_D04_114"><a href="/news/" target="_blank">楼盘动态</a></div>                
                <!--2015.10.21资讯改版-修改栏目 -本地-->
                                <ul class="ul01" id="dsy_D04_36">                    
                    <!--  getFangListRight03 -->
                    <?php
			$rownews = $mysql->query("select * from `web_content` WHERE `pid`='28' and `city_id`='{$sitecityid}' order by addtime desc limit 0,12");
			foreach($rownews as $k=>$lists){
			$url='/loupan/news_show/'.$lists['id'].'.html';
			if($k==0 or $k==5){
		?>
        <li><div class="bigtit" style="word-wrap:normal;text-overflow: ellipsis;font-size:18px;">  
                      <a href="<?php echo $url;?>" target="_blank"><?php echo $lists['title'];?></a>
                    </div>
                    </li>
        <?php }else{?>
                <li class="f14"> <a href="<?php echo $url;?>" target="_blank"><?php echo $lists['title'];?></a></li>	
        <?php }
			}?>              
                </ul>
                <!-- 轮播需要的js -->
            </div>
        </div>
        <div class="feature-slide-preview" style="display: none;">
            <div class="a300nr">
                <div class="a200nrbt"><a href="/news/index_6.html" id="dsy_D04_115" target="_blank">楼盘导购</a></div>
                                <ul class="ul01" id="dsy_D04_127">
                               <?php
			$rownews = $mysql->query("select * from `web_content` WHERE `pid`='6' and `city_id`='{$sitecityid}' order by addtime desc limit 0,12");
			foreach($rownews as $k=>$lists){
			$url='/news/show_'.$lists['id'].'.html';
			if($k==0 or $k==5){
		?>
        <li><div class="bigtit" style="word-wrap:normal;text-overflow: ellipsis;font-size:18px;">  
                      <a href="<?php echo $url;?>" target="_blank"><?php echo $lists['title'];?></a>
                    </div>
                    </li>
        <?php }else{?>
                <li class="f14"> <a href="<?php echo $url;?>" target="_blank"><?php echo $lists['title'];?></a></li>	
        <?php }
			}?> 
                                  </ul>
            </div>
        </div>
        <div class="feature-slide-preview" style="display: none;">
            <div class="a300nr">
                <div class="a200nrbt" id="dsy_D04_117"><a href="/news/index_22.html" target="_blank">购房指南</a></div>                
                                <ul class="ul01" id="dsy_D04_131">
                              <?php
			$rownews = $mysql->query("select * from `web_content` WHERE `pid`='22' and `city_id`='{$sitecityid}' order by addtime desc limit 0,12");
			foreach($rownews as $k=>$lists){
			$url='/news/show_'.$lists['id'].'.html';
			if($k==0 or $k==5){
		?>
        <li><div class="bigtit" style="word-wrap:normal;text-overflow: ellipsis;font-size:18px;">  
                      <a href="<?php echo $url;?>" target="_blank"><?php echo $lists['title'];?></a>
                    </div>
                    </li>
        <?php }else{?>
                <li class="f14"> <a href="<?php echo $url;?>" target="_blank"><?php echo $lists['title'];?></a></li>	
        <?php }
			}?> 
                                  </ul>
            </div>
        </div>
    </div>
    <script type="text/javascript">
      initFeatureSlide();
    </script>
</div>
  </div>
</div>
<!-- 精品别墅 -->
<div class="clearfix w1200 index_house__view J_indexHouseTab">
  <div class="w-view__left" style="width: 230px;">
    <div class="index-bar__small">
            <a href="/loupan/tts6" class="t-1">精品别墅</a>
            <!--span class="icon-map"><a  href="javascript:;">私人订制</a></span-->
      <span class="icon-map"><a  href="javascript:;"   data-name='私人订制' data-type='首页_私人订制' class="bmkf-up">私人订制</a></span>
    </div>
    <div class="w-search-link">
      <button class="btn btn-success">热销别墅排名</button>
      <ul class="hot-house-price">
		<?php
		$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px19 desc limit 0,8");// and `city_id`='57'
	//	print_r($row);
        foreach($row as $k=>$list){
		$url="/loupan/{$list['id']}.html";
		?>
        <li>
              <a href="<?php echo $url;?>" target="_blank" title="<?php echo $list['title'];?>">
                <span class="name"><?php echo $list['title'];?></span>
                <?php if($list['all_price']==0){?>
					<?php if($list['jj_price']==0){?>
                        <span class="price">待定</span>
                    <?php }else{?>
                        <span class="price"><?php echo $list['jj_price'];?>元/㎡</span>
                    <?php }?>
				<?php }else{?>
                 <span class="price"><?php echo $list['all_price'];?>万/套</span>
				<?php }?>
              </a>
        </li>
		<?php
		}
		?>
        </ul>
      <!-- 报名 -->
      <div style="height: 10px;"></div>
      
      <?php
				$row = $mysql->query("select * from `web_link` where `ad_id`='36' and `city_id`='{$sitecityid}' order by px asc limit 2,1");
				foreach($row as $k=>$list){
				?>
                <div>
                    <!-- 取消广告图片链接-->
      <img class="lazy" src="<?php echo $list['img'];?>" width="210" height="75">
      </div>
				<?php
				}
				?>
      <!-- 报名 end-->
    </div>
  </div>
    <div class="w-view__center clearfix" >
		<div class="w-view-center-bar">
		<dl>
            <dd class="active"><a href="javascript:;">精品推荐</a></dd>
		</dl>
		</div>
    <div class="clearfix">
      <div class="w-main" style="width: 674px;margin-left: 6px;">
        <!-- 精品推荐tab -->
        <div class="index-house-tab-item active">
          <div class="swiper-container w-view-swiper J_viewSwiper3">
            <div class="swiper-wrapper">             
				<?php
				$row = $mysql->query("select * from `web_link` where `ad_id`='37' and `city_id`='{$sitecityid}' order by px asc limit 2,1");
				foreach($row as $k=>$list){
				?>
				<div class="swiper-slide">
					<a href="<?php echo $list['link_url'];?>" target="_blank"><img class="lazy" src="<?php echo $list['img'];?>"  width="430" height="195" ></a>
				</div>
				<?php
				}
				?>
			</div>
            <div class="swiper-pagination"></div>
          </div>
          <!-- Swiper -->          
          <?php
			$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px20 desc limit 0,4");// and `city_id`='57'
			foreach($row as $k=>$list){
			$url="/loupan/{$list['id']}.html";
			?>
			<div class="w-view-house">
				  <a href="<?php echo $url;?>" target="_blank">
					<img class="lazy" src="<?php echo $list['img'];?>"  alt="<?php echo $list['title'];?>" >
					<p><?php echo $list['title'];?></p>
				  </a>
				  <div class="w-info">
					<div class="price-bar">
					<?php if($list['all_price']==0){?>
						<?php if($list['jj_price']==0){?>
							<span class="price">待定</span>
						<?php }else{?>
							<span class="price"><?php echo $list['jj_price'];?>元/㎡</span>
						<?php }?>
					<?php }else{?>
					 <span class="price"><?php echo $list['all_price'];?>万/套</span>
					<?php }?>
					<span class="w-number"><b><?php if($list['esfcx']<>'' and $list['esfcx']<>'0'){echo (int)$list['esfcx'];}else{ echo rand(350,820);}?></b>人报名</span></div>
					<p class="address"><?php echo $list['xmts'];?></p>
				  </div>
			  </div>
			<?php
			}
			?>
		</div>
	  </div>
      
    </div>
  </div>
  <div class="w-view__right">
    <div class="index-bar__small">
      <a href="/news/index_6.html" class="t-1" >楼盘导购</a>
      
	<a href="/news/index_6.html" class="more" >更多&raquo;</a>
    </div>
    <div id="index-splash-block" class="huan300">
      <div class="h20"></div>
    <div id="feature-slide-block2" class="feature-slide-block">
        <div id="feature-slide-list" class="feature-slide-list">
            <a href="javascript:;" id="feature-slide-list-previous2" class="feature-slide-list-previous"></a>
            <div id="feature-slide-list-items2" class="feature-slide-list-items"><a href="#" class="current"></a><a href="#"></a><a href="#"></a></div>
            <a href="javascript:;" id="feature-slide-list-next2" class="feature-slide-list-next"></a>
            <div id="dsy_D01_108"> <a href="/news/index_26.html" id="feature-slide-list-fangchanquan2" class="feature-slide-list-fangchanquan ml25">更多</a> </div>
        </div>
        <div class="feature-slide-preview" style="display: block;">
            <div class="a300nr">
                <div class="a200nrbt" id="dsy_D04_114"><a href="/news/index_6.html" target="_blank"></a></div>                
                <!--2015.10.21资讯改版-修改栏目 -本地-->
                                <ul class="ul01" id="dsy_D04_36">                    
                    <!--  getFangListRight03 -->
                    <?php
			$rownews = $mysql->query("select * from `web_content` WHERE `pid`='6' and `city_id`='{$sitecityid}' order by addtime desc limit 0,12");
			foreach($rownews as $k=>$lists){
			$url='/news/show_'.$lists['id'].'.html';
			if($k==0 or $k==5){
		?>
        <li><div class="bigtit" style="word-wrap:normal;text-overflow: ellipsis;font-size:18px;">  
                      <a href="<?php echo $url;?>" target="_blank"><?php echo $lists['title'];?></a>
                    </div>
                    </li>
        <?php }else{?>
                <li class="f14"> <a href="<?php echo $url;?>" target="_blank"><?php echo $lists['title'];?></a></li>	
        <?php }
			}?>
                                      
                </ul>
                <!-- 轮播需要的js -->
            </div>
        </div>
        <div class="feature-slide-preview" style="display: none;">
            <div class="a300nr">
                <div class="a200nrbt"><a href="/news/" id="dsy_D04_115" target="_blank"></a></div>
                                <ul class="ul01" id="dsy_D04_127">
                                  <?php
			$rownews = $mysql->query("select * from `web_content` WHERE `pid`='6' and `city_id`='{$sitecityid}' order by addtime desc limit 12,12");
			foreach($rownews as $k=>$lists){
			$url='/news/show_'.$lists['id'].'.html';
			if($k==0 or $k==5){
		?>
        <li><div class="bigtit" style="word-wrap:normal;text-overflow: ellipsis;font-size:18px;">  
                      <a href="<?php echo $url;?>" target="_blank"><?php echo $lists['title'];?></a>
                    </div>
                    </li>
        <?php }else{?>
                <li class="f14"> <a href="<?php echo $url;?>" target="_blank"><?php echo $lists['title'];?></a></li>	
        <?php }
			}?>
                                  </ul>
            </div>
        </div>
        <div class="feature-slide-preview" style="display: none;">
            <div class="a300nr">
                <div class="a200nrbt" id="dsy_D04_117"><a href="/news/" target="_blank"></a></div>                
                                <ul class="ul01" id="dsy_D04_131">
                                 <?php
			$rownews = $mysql->query("select * from `web_content` WHERE `pid`='6' and `city_id`='{$sitecityid}' order by addtime desc limit 24,12");
			foreach($rownews as $k=>$lists){
			$url='/news/show_'.$lists['id'].'.html';
			if($k==0 or $k==5){
		?>
        <li><div class="bigtit" style="word-wrap:normal;text-overflow: ellipsis;font-size:18px;">  
                      <a href="<?php echo $url;?>" target="_blank"><?php echo $lists['title'];?></a>
                    </div>
                    </li>
        <?php }else{?>
                <li class="f14"> <a href="<?php echo $url;?>" target="_blank"><?php echo $lists['title'];?></a></li>	
        <?php }
			}?>
                                  </ul>
            </div>
        </div>
    </div>
    <script type="text/javascript">
      initFeatureSlide2(2);
    </script>
</div>
  </div>
  
</div>
<!-- 商业投资者 -->
<div class="clearfix w1200 index_house__view J_indexHouseTab">
  <div class="w-view__left" style="width: 230px;">
    <div class="index-bar__small">
            <a href="/loupan/" class="t-1">商业投资者</a>
            <!--span class="icon-map"><a  href="javascript:;">私人订制</a></span-->
      <span class="icon-map"><a  href="javascript:;"   data-name='私人订制' data-type='首页_私人订制' class="bmkf-up">私人订制</a></span>
    </div>
    <div class="w-search-link">
      <button class="btn btn-success">热销商业项目</button>
      <ul class="hot-house-price">
		<?php
		$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px21 desc limit 0,8");// and `city_id`='57'
		foreach($row as $k=>$list){
		$url="/spxzl/{$list['id']}.html";
		?>
        <li>
              <a href="<?php echo $url;?>" target="_blank" title="<?php echo $list['title'];?>">
                <span class="name"><?php echo $list['title'];?></span>
                <?php if($list['all_price']==0){?>
					<?php if($list['jj_price']==0){?>
                        <span class="price">待定</span>
                    <?php }else{?>
                        <span class="price"><?php echo $list['jj_price'];?>元/㎡</span>
                    <?php }?>
				<?php }else{?>
                 <span class="price"><?php echo $list['all_price'];?>万/套</span>
				<?php }?>
              </a>
        </li>
		<?php
		}
		?>
        </ul>
      <!-- 报名 -->
      <div style="height: 10px;"></div>
      
      <?php
				$row = $mysql->query("select * from `web_link` where `ad_id`='36' and `city_id`='{$sitecityid}' order by px asc limit 3,1");
				foreach($row as $k=>$list){
				?>
                <div>
                    <!-- 取消广告图片链接-->
      <img class="lazy" src="<?php echo $list['img'];?>" width="210" height="75">
      </div>
				<?php
				}
				?>
      <!-- 报名 end-->
    </div>
  </div>
    <div class="w-view__center clearfix" >
		<div class="w-view-center-bar">
		<dl>
            <dd class="active"><a href="javascript:;">精品推荐</a></dd>
		</dl>
		</div>
    <div class="clearfix">
      <div class="w-main" style="width: 674px;margin-left: 6px;">
        <!-- 精品推荐tab -->
        <div class="index-house-tab-item active">
          <div class="swiper-container w-view-swiper J_viewSwiper3">
            <div class="swiper-wrapper">             
				<?php
				$row = $mysql->query("select * from `web_link` where `ad_id`='37' and `city_id`='{$sitecityid}' order by px asc limit 3,1");
				foreach($row as $k=>$list){
				?>
				<div class="swiper-slide">
					<a href="<?php echo $list['link_url'];?>" target="_blank"><img class="lazy" src="<?php echo $list['img'];?>"  width="430" height="195" ></a>
				</div>
				<?php
				}
				?>
			</div>
            <div class="swiper-pagination"></div>
          </div>
          <!-- Swiper -->          
          <?php
			$row = $mysql->query("select * from `web_content` where `pid`='9'  and `city_id`='{$sitecityid}' order by px22 desc limit 0,4");// and `city_id`='57'
			foreach($row as $k=>$list){
			$url="/spxzl/{$list['id']}.html";
			?>
			<div class="w-view-house">
				  <a href="<?php echo $url;?>" target="_blank">
					<img class="lazy" src="<?php echo $list['img'];?>"  alt="<?php echo $list['title'];?>" >
					<p><?php echo $list['title'];?></p>
				  </a>
				  <div class="w-info">
					<div class="price-bar">
					<?php if($list['all_price']==0){?>
						<?php if($list['jj_price']==0){?>
							<span class="price">待定</span>
						<?php }else{?>
							<span class="price"><?php echo $list['jj_price'];?>元/㎡</span>
						<?php }?>
					<?php }else{?>
					 <span class="price"><?php echo $list['all_price'];?>万/套</span>
					<?php }?>
					<span class="w-number"><b><?php if($list['esfcx']<>'' and $list['esfcx']<>'0'){echo (int)$list['esfcx'];}else{ echo rand(350,820);}?></b>人报名</span></div>
					<p class="address"><?php echo $list['xmts'];?></p>
				  </div>
			  </div>
			<?php
			}
			?>
		</div>
        <!-- 海口tab -->
	  </div>
      
    </div>
  </div>
  <div class="w-view__right">
    <div class="index-bar__small">
      <a href="/loupan/" class="t-1" >热门项目</a>
      
	<a href="/loupan/" class="more" >更多&raquo;</a>
    </div>
    <div id="index-splash-block" class="huan300">
    
      <?php
				$row = $mysql->query("select * from `web_link` where `ad_id`='38' and `city_id`='{$sitecityid}' order by px asc limit 0,1");
				foreach($row as $k=>$list){
				?>
               
                <a href="<?php echo $list['link_url'];?>" target="_blank">
      <img class="lazy" src="<?php echo $list['img'];?>"    width="290" height="410" style="margin-left:5px;"></a>
     
				<?php
				}
				?>
</div>
  </div>
  
</div>
<!-- 置业顾问 -->
<div class="h10"></div>
<div class="w1200">
    <div class="tit222">      
      <span class="fr"><a href="/zhiye.html" class="f14" style="float: right;

margin-top: 0px;

font-size: 1.6rem;

background: url(/image/gd.gif);

text-indent: -999999px;

width: 60px;

height: 28px;">更多»</a></span>
      置业顾问<span class="f14 pl20">买房您需要一位专业置业顾问 分析区域优势 越过营销陷阱买到最合适自己的房子</span>
    </div>
    <ul class="zy-ul">
    <?php
			$row = $mysql->query("select * from `web_content` where `pid`='68' order by px desc limit 0,6");// and `city_id`='57'
			foreach($row as $k=>$list){
			?>
              <li>
                  <div class="zy-pic pr">
                    <img src="<?php echo $list['img'];?>" width="172" height="224" alt="<?php echo $list['title'];?>">
                    <div class="zy-sreen pa">
                        <p><?php echo $list['title'];?></p>
                        <p><?php echo $list['keyword'];?>人咨询</p>
                        <p>回复率：<?php echo $list['desc'];?></p>
                    </div>
                  </div>
                  <div class="zy-info">
                    <div class="p5">
                      <p class="tag">
                      <?php
                        $xgg=$list['get_url'];
						$xgg = str_replace( '，', ",", $xgg);
                        $xgg = explode(",", $xgg);
                        foreach ($xgg as $i => $value) {
                            echo '<span class="b'.($i+1).'">'.$value.'</span>';
                        }
                      ?>
                         
                      </p>
                      <p style="padding-top: 8px;padding-bottom: 8px;"><a style="cursor:pointer;" onClick="sq();" class="btn white">向TA咨询</a></p>
                      <p><span class="red"><?php echo $list['sldz'];?></span></p>
                    </div>
                  </div>
              </li>
			<?php
			}
			?>
          
        </ul>
</div>
<div class="clear"></div>
<div class="h10"></div>
<div class="w1200">
    <div class="tit222">
      品牌地产<span class="f14 pl20"></span>
    </div>
    
        <style>
		.pipais { width:1239px;}
		.pipais li{ width:144px; height:135px; float:left; border:#eeeeee solid 3px;margin-right: 32px;margin-bottom: 15px;}
		.pipais li:hover{ border:#40c0c1 solid 3px;}
		.pipais li img{ width:100%; height:100%;}
		</style>
        <div style="width:1200px; margin:0 auto; margin-top:20px; height:150px;">
            <ul class="pipais">
            	<li><a target="_blank" href="/loupan/?key=碧桂园"><img src="pinpai/bgy.gif"></a></li>
            	<li><a target="_blank" href="/loupan/?key=富力"><img src="pinpai/fl.jpg"></a></li>
            	<li><a target="_blank" href="/loupan/?key=恒大"><img src="pinpai/hd.jpg"></a></li>
            	<li><a target="_blank" href="/loupan/?key=华润"><img src="pinpai/huarun.jpg"></a></li>
            	<li><a target="_blank" href="/loupan/?key=绿地"><img src="pinpai/ld.jpg"></a></li>
            	<li><a target="_blank" href="/loupan/?key=融创"><img src="pinpai/rongchuang.jpg"></a></li>
            	<li><a target="_blank" href="/loupan/?key=雅居乐"><img src="pinpai/yjl.jpg"></a></li>
            	<li><a target="_blank" href="/loupan/?key=鲁能"><img src="pinpai/ln.jpg"></a></li>
            	<li><a target="_blank" href="/loupan/?key=保利"><img src="pinpai/bl.jpg"></a></li>
            	<li><a target="_blank" href="/loupan/?key=万科"><img src="pinpai/wk.jpg"></a></li>
            	<li><a target="_blank" href="/loupan/?key=远洋"><img src="pinpai/yuanyang.jpg"></a></li>
            	<li><a target="_blank" href="/loupan/?key=中信"><img src="pinpai/zx.jpg"></a></li>
            	<li><a target="_blank" href="/loupan/?key=富力"><img src="pinpai/fl.jpg"></a></li>
            	<li><a target="_blank" href="/loupan/?key=绿地"><img src="pinpai/ld.jpg"></a></li>
            </ul>
        </div>
</div>
<div class="clear"></div>
<div class="h10"></div>
 
<!-- 置业顾问 end-->

<div class="w1200 clearfix">
  <div class="index-main">
    <div class="big-bar-title">
      <a href="/news/"><h3>楼市</h3></a>
      <a href="/news/" class="more">更多»</a>
    </div>
    <div class="swiper-container tt-swiper">
      <div class="swiper-wrapper">
          <?php

          $row = $mysql->query("select * from `web_content` where `path`='0-5' and `city_id`='{$sitecityid}' and `flag` like '%j1%' and `img`<>'' order by addtime desc limit 0,8");
          foreach($row as $k=>$list){
              if($list['pid']==28){
                  $url="/loupan/news_show/{$list['id']}.html";
              }else{
               /* news显示不出来，暂时修改了  */
               $url="/news/show_{$list['id']}.html";

              }
              ?>
            <div class="swiper-slide">
              <a href="<?php echo $url;?>" target="_blank">
                <img class="lazy"  src="<?php echo $list['img'];?>" alt="<?php echo $list['title'];?>">
                <div class="info">
                  <h3><?php echo $list['title'];?></h3>
                  <p></p>
                </div>
              </a>
        	</div>
                    <?php
						}
					?>  
      </div>
    </div>
    <div class="tt-list">
    <?php

                                $row = $mysql->query("select * from `web_content` where `path`='0-5' and `city_id`='{$sitecityid}' order by addtime desc limit 0,6");
                                foreach($row as $k=>$list){
									if($list['pid']==28){
									$url="/loupan/news_show/{$list['id']}.html";
									}else{
									$url="/news/show_{$list['id']}.html";
										}
                                ?>
            <a href="<?php echo $url;?>" target="_blank" style="position:relative;height: 54px; padding:0px; margin:9px 0px;"><samp style="background:#F00; color:#FFF; padding:1px 5px;"><?php echo $k+1;?></samp>　<?php echo $list['title'];?>　<samp style="color:#999;position: absolute;right: 0px;bottom: 6px;background:#FFF;padding-left: 4px;">[<?php echo date('Y-m-d',strtotime($list['addtime']));?>]</samp></a>
                    <?php
						}
					?>  
          
        </div>
  </div>
  <div class="hot-question">
    <h3 class="title">热门问答</h3>
    <div class="ques-list-wrap ps-container ps-theme-default ps-active-y" id="scroll-list">
      <ul class="ques-list">
       <?php
		
		$row = $mysql->query("select * from `web_book` WHERE `pid`='30' and `city_id`='{$sitecityid}' and `cl`='1' order by id desc limit 0,15");// WHERE `adminid`='{$_SESSION['admin_id']}'

		foreach($row as $k=>$list){
			$url='/loupan/wenda/show_'.$list['id'].'.html';
?>
             <li>
                  <span class="answ-lab"><b>1</b><div class="h10"></div>回答</span>                    
          <a href="/loupan/wenda/<?php echo $list['lpid'];?>.html" class="ques-tit" style="font-weight: 700"><?php echo lpname($list['lpid']);?></a>
          <a href="<?php echo $url;?>" target="_blank"><span class="ques-tit"><?php echo $list['ucontent'];?></span></a>
          <p class="date"><?php echo date('Y-m-d',strtotime($list['addtime']));?></p>
        </li>     
<?php
		}
?>
          
             </ul>
  </div>
</div>
</div>

<div class="clear"></div>
<?php

$row = $mysql->query("select * from `web_fjzs` where `city_id`='{$sitecityid}' order by addtime desc limit 1");
$newspr=$row[0]['price'];
//echo $row[0]['price'];
$esfpr=$row[0]['price2'];
$row2 = $mysql->query("select * from `web_fjzs` where `city_id`='{$sitecityid}' order by addtime desc limit 6");
$rsc = $mysql->query("select count(*) as count from `web_fjzs` where `city_id`='{$sitecityid}' order by addtime desc limit 6");

?>
<?php //foreach($row2 as $p=>$list){ if($p==0){echo date('m',strtotime($list['addtime']));}else{echo ','.date('m',strtotime($list['addtime']));}}?>
<?php //foreach($row2 as $p=>$list){ if($p==0){echo $list['price'];}else{echo ','.$list['price'];}}?>
<?php
$ddarr[]='';
$ddarr2[]='';
$ddarr3[]='';
foreach($row2 as $p=>$list){ $ddarr[$p]=date('m',strtotime($list['addtime'])); $ddarr2[$p]=$list['price']; $ddarr3[$p]=$list['price2'];}

$num = count($ddarr);
$num2 = count($ddarr2);
$num3 = count($ddarr3);

?>
<script type="text/javascript" src="/public/static/home/js/echarts.min.js"></script> 
<script type="text/javascript" src="/public/static/home/js/index/zoushitu.js"></script> 
<script type="text/javascript">
  $(document).ready(function(){createChart()});
   function createChart(){
    var myChart = echarts.init(document.getElementById('fjChart'));
    var option = {
    legend:{
      left:-5,
      top:5,
      itemWidth:6,
      itemHeight:6,
      itemGap:15,
      textStyle:{
        color:'#333'
      },
      data:[{
        name:'新房',
        icon:'circle'
      },{
        name:'二手',
        icon:'circle'
      }],
     formatter:function(name){
        if(name == '新房' ){
        return name+'<?php echo $newspr;?>元/㎡';
        }
        if(name == '二手' ){
        return name+'<?php echo $esfpr;?>元/㎡';
        }
      }
    },
    tooltip: {
      trigger:'axis',
      axisPointer:{
        lineStyle:{
          color:'#888'
        },
        z:1
      },
      formatter:'{a0}：{c0}元/m²<br/>{a1}：{c1}元/m²'
    },
    grid:{
      left:0,
      top:35,
      right:0,
      bottom:20
    },
    xAxis: {
      name:'月份',
      axisTick:{
        inside:true,
        lineStyle:{
          color:'#ddd'
        },
        alignWithLabel:true
      },
      axisLabel:{
        textStyle:{
          color:'#333'
        }
      },
      axisLine:{
        lineStyle:{
          color:'#ddd'
        }
      },
        data: [<?php for($i=$num-1;$i>=0;$i--){if($i==$num-1){echo $ddarr[$i];}else{echo ','.$ddarr[$i];}}?>]
    },
    yAxis: {
      splitLine:{
        lineStyle:{
          color:'#ddd'
        }
      },
      axisLine:{
        show:false
      }
    },
    series: [{
        name: '新房',
        type: 'line',
        symbol: 'circle',
        symbolSize: 6,
        data: [<?php for($i=$num2-1;$i>=0;$i--){if($i==$num2-1){echo $ddarr2[$i];}else{echo ','.$ddarr2[$i];}}?>]
    },{
      name: '二手',
        type: 'line',
        symbol: 'circle',
        symbolSize: 6,
        data: [<?php for($i=$num3-1;$i>=0;$i--){if($i==$num3-1){echo $ddarr3[$i];}else{echo ','.$ddarr3[$i];}}?>]
    }],
      color:['#ed603d','#00a5e3']
    };
    myChart.setOption(option);
}
</script>


<!-- 随屏 -->
<div class="header2" style="display: none;">
  <div class="header2-wrap">
    <ul class="menu">
		<li><a href="/" class="act">首页</a></li>
		<li ><a href="/loupan/">新房</a></li>           
		<li ><a href="/loupan/tsa1">海景房</a></li>    
		<li ><a href="/loupan/ts6">别墅</a></li>
         <li  ><a href="/news/">楼市</a></li>       
    </ul>
    <div class="fr" style="width: 610px">
    <div class="search navigator-bar">
      <!-- 搜索 -->
      <div class="search-box clearfix">
          <span class="sel-val" style="line-height: 30px; height: 30px;">
            <span class="state" id="choosediv" chooseurl="loupan">新房</span>
          </span>
          <input type="text" placeholder="请输入楼盘名称" class="search-inp h_bname" style="height: 30px;">
          <a class="search-btn" href="javascript:;" onClick="seachWord()" style="background: url(/public/static/home/image/icons_v5.png) 12px -20px no-repeat"></a>          
        </div>
      <!-- 搜索 end-->
    </div>
    <div class="hot-phone">
      咨询热线：<span class="phone-txt"><?php echo $config['company_tel'];?></span>
    </div>
    <div class="btn-area"><a href="javascript:;" data-name='报名看房' data-type='首页_报名看房' class="btn2 btn-reg common-free-mobile-btn bmkf-up">报名看房</a></div>
    </div>
    <div class="clear"></div>
  </div>
</div> 
<!-- 随屏 end-->

<script type="text/javascript" src="/public/static/home/js/article/common.js"></script>
<script type="text/javascript" src="/public/static/home/js/article/jquery.cookie.js"></script>
<script type="text/javascript" src="/public/static/home/js/jquery.lazyload.js"></script>
<script type="text/javascript" src="/public/static/home/js/jquery.SuperSlide.2.1.1.js"></script> 
<script type="text/javascript" src="/public/static/home/js/index.js"></script>
<!-- 公共底部 end -->


﻿<!-- 图片懒加载 -->
<script src="/public/static/home/js/echo.min.js"></script>
<script>
Echo.init({
  offset: 0,
  throttle: 0
});
$('.J_indexHouseTab').each(function (i) {
  var _this = $(this);
  _this.find('.index-house-tab-item').removeClass('active').eq(0).addClass('active');
  _this.find('.w-view-center-bar dd').click(function () {
    var index = $(this).index();
    $(this).siblings().removeClass('active');
    $(this).addClass('active');
    _this.find('.index-house-tab-item').eq(index).addClass('active').siblings('.index-house-tab-item').removeClass('active');
  });
});
//热销楼盘、一线海景选项卡
$('.J_indexTopTab .index-tab-title h3').hover(function () {
  var index = $(this).index();
  $(this).addClass('active').siblings('h3').removeClass('active');
  $('.J_indexTopTab').find('.index-tab-container').removeClass('active').eq(index).addClass('active');
});
$('.J_sideMenu').find('li').hover(function () {
  $(this).find('.detail-box').show();
  $(this).find('.aitem').addClass('active');
}, function () {
  $(this).find('.detail-box').hide();
  $(this).find('.aitem').removeClass('active');
});
</script>

<script src="/public/static/home/js/article/owl.carousel.min.js"></script>
<script src="/public/static/home/js/article/news_commont.js"></script>
<script src="/public/static/home/js/common-enroll.js"></script>
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
</script>
<style>
.new_remets {
    background: #fff;
    width: 1200px;
    margin: 0 auto 10px;
    border:1px solid #f2f2f2;
}
.new_remetstop {
    border-bottom: 1px solid #f2f2f2;
}
.new_remetstop ul li {
    float: left;
    padding: 16px 0;
}
.new_remetstop ul li a {
    font-size: 20px;
    padding: 0 32px;
    color: #333333;
    border-right: 1px solid #ececec;
}
.new_remetstop ul .dianj {
    border-bottom: 2px solid #ff4637;
}
.new_remetstop ul .dianj a {
    font-weight: 600;
    color: #ff4637;
}
.new_remetsbt ul li {
    padding: 16px 0px 16px 32px;
    float: left;
    font-size: 16px;
}
.new_remetsbt ul li a{
   color: #999;
}
</style>



<!-- 报名看房 -->
<div class="black-bg" style="display: none;" id="black_bg"></div>
<div class="send-mess lpm-bx3" style="display: none;">
    <p class="regist-title"><span class="lpm-bx3-t"></span>
    <span class="close close-send lpm-colse2" title="关闭" id="bmkfCallClose">×</span></p>
    <div class="regist-form">
      <p class="send-mess-text1">请留下手机号码，置业顾问会尽快联系您</p>
      <form class="submit_area">
          <input type="hidden" name="pid" value="33">
          <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
          <input type="hidden" name="ly" id="lpsounce" value="[<?php echo cityname($sitecityid);?>]首页报名">
        <input type="text" value="" placeholder="请输入您的手机号码" id="lp-nmkf-mobile" name="mobile" class="regist-input3 mt15">
        <div class="h30"></div>   
        <input type="button" value="提交" class="regist-submit apply_submit">
      </form>
    </div>
</div>
<script type="text/javascript">
$(function () {
    //底部更多
    $('.footmore').click(function(){
        $(this).parent().parent().toggleClass("on");
    });
    $('.zskmore').click(function(){
        $(this).parent().parent().toggleClass("zsksec").siblings().removeClass('zsksec');
        if($(this).parent().parent().hasClass('zskfivpo zsksec')){
           $(this).text('收起 ∧');
        }else{
           $(this).text('展开 ∨');
        }
    }); 
    //鼠标移动显示遮罩
    $(".imgtext").hide();
    $(".zzsc").hover(function(){
        $(".imgtext",this).slideToggle(500);
    });
	
	$('.new_remetstop li').click(function () {
    $('.new_remetstop li').removeClass('dianj');
    $('.new_remetsbt ul').hide();
    $('.new_remetstop li').eq($(this).index()).addClass('dianj');
    $('.new_remetsbt ul').eq($(this).index()).show();
    })
});
</script>
<!-- 报名看房 end-->

<?php include("bottom.php");?>
</body>
</html>


 