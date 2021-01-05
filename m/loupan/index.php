<!DOCTYPE html>
<html lang="zh-cn" class="hn">
<?php
require("../../conn/conn.php");
require("../function.php");
$lm=2;
$gc = $_GET['gc'] ? $_GET['gc'] : '';
$gc2=explode("_",$gc);
$gcnum = count($gc2);
for($i=0;$i<$gcnum;$i++){
 // echo "{$i}==>{$gc2[$i]}<br/>";  //注意php中双引号内使用花括号包裹变量的写法
 // $frist = substr( $gc2[$i],0,1);
  if(substr($gc2[$i],0,1)=='p'){
      $flagjw=substr($gc2[$i],1);
    //  echo ltrim($gc2[$i], "p");
      }
  if(substr($gc2[$i],0,1)=='h'){
      $flaghx=substr($gc2[$i],1);
     // echo ltrim($gc2[$i], "h");
      }
  if(substr($gc2[$i],0,1)=='t'){
      $flagts=substr($gc2[$i],1);
      }
  if(substr($gc2[$i],0,1)=='z'){
      $flagzx=substr($gc2[$i],1);
      }
  if(substr($gc2[$i],0,1)=='o'){
      $page=substr($gc2[$i],1);
      }
  
 }
 
 
//print_r($gc2);
$key=$_GET['key'];
$flaglp=$_GET['flaglp'];
$flaglb=$_GET['flaglb'];
if($gc==''){
    /*$flagjw=$_GET['flagjw'];
    $flaghx=$_GET['flaghx'];
    $flagzx=$_GET['flagzx'];
    $flagts=$_GET['flagts'];*/
    $page=$_GET['page'];    
    (string)$flagjw = $_GET['flagjw'] ? $_GET['flagjw'] : '0';
(string)$flaghx = $_GET['flaghx'] ? $_GET['flaghx'] : '0';
(string)$flagts = $_GET['flagts'] ? $_GET['flagts'] : '0';
(string)$flagzx = $_GET['flagzx'] ? $_GET['flagzx'] : '0';
    }
//$flagjw=$_GET['flagjw'];
//$flaghx=$_GET['flaghx'];
//$flagzx=$_GET['flagzx'];
//$flagts=$_GET['flagts'];

$flagwq=$_GET['flagwq'];
$hz_pp=$_GET['hz_pp'];
$pricesort=$_GET['pricesort'];
$renqi=$_GET['renqi'];
//$px = $_GET['px'] ? $_GET['px'] : 'px';
//$city_id=$_GET['city_id'];
$city_id = $sitecityid;
$cityall_id = isset($_GET['cityall_id']) ? intval($_GET['cityall_id']) : 0;


if($city_id<>0){
    $cityall_id=cityallid($city_id);
    }
$city_id;
$key=$_GET['key'];
$pid=9;
$page = isset($page) ? intval($page) : 1;

$sql="WHERE `pid`='{$pid}' ";
$pagecs='';

// 按字母来搜索 楼盘
$zimu=$_GET['zimu'];
if (!empty($zimu)) {
//php获取中文字符拼音首字母
    function getFirstCharter($str){
    if(empty($str)){return '';}
    $fchar=ord($str{0});
    if($fchar>=ord('A')&&$fchar<=ord('z')) return strtoupper($str{0});
    $s1=iconv('UTF-8','gb2312',$str);
    $s2=iconv('gb2312','UTF-8',$s1);
    $s=$s2==$str?$s1:$str;
    $asc=ord($s{0})*256+ord($s{1})-65536;
    if($asc>=-20319&&$asc<=-20284) return 'A';
    if($asc>=-20283&&$asc<=-19776) return 'B';
    if($asc>=-19775&&$asc<=-19219) return 'C';
    if($asc>=-19218&&$asc<=-18711) return 'D';
    if($asc>=-18710&&$asc<=-18527) return 'E';
    if($asc>=-18526&&$asc<=-18240) return 'F';
    if($asc>=-18239&&$asc<=-17923) return 'G';
    if($asc>=-17922&&$asc<=-17418) return 'H';
    if($asc>=-17417&&$asc<=-16475) return 'J';
    if($asc>=-16474&&$asc<=-16213) return 'K';
    if($asc>=-16212&&$asc<=-15641) return 'L';
    if($asc>=-15640&&$asc<=-15166) return 'M';
    if($asc>=-15165&&$asc<=-14923) return 'N';
    if($asc>=-14922&&$asc<=-14915) return 'O';
    if($asc>=-14914&&$asc<=-14631) return 'P';
    if($asc>=-14630&&$asc<=-14150) return 'Q';
    if($asc>=-14149&&$asc<=-14091) return 'R';
    if($asc>=-14090&&$asc<=-13319) return 'S';
    if($asc>=-13318&&$asc<=-12839) return 'T';
    if($asc>=-12838&&$asc<=-12557) return 'W';
    if($asc>=-12556&&$asc<=-11848) return 'X';
    if($asc>=-11847&&$asc<=-11056) return 'Y';
    if($asc>=-11055&&$asc<=-10247) return 'Z';
    return 'Z';
    }
    $r = $mysql->query("select title,id from `web_content` where `pid`='{$pid}' and `cityall_id`='{$cityall_id}'");
    foreach ($r as $k => $value) {
       $arr[$value['id']] = trim(mb_substr($value['title'],0,1,"utf-8"));
    }
    foreach ($arr as $k => $value) {
      $aa[$k] =  getFirstCharter($value);
    }
    foreach ($aa as $k => $v) {
          if($v==$zimu){
             $rowf = $mysql->query("select id,title from `web_content` where `id`=$k order by id asc");
             foreach ($rowf as $ke => $value) {
               $sum_data[] = $ke;
               $sum_id[] =(int)$value['id'];
             }
          }
      }
    $fenge = implode(',',$sum_id);  
    // $rowg = $mysql->query("select * from `web_content` where id in($fenge) order by px desc,id desc limit $offset,$page_num");
    $sql.=" and `id` in($fenge)";
}// 按字母来搜索 楼盘 end

if($key!=""){
    $sql.=" and `title` like '%{$key}%'";
    $pagecs.="&key={$flaggn}";
    }
if($cityall_id!=""){
    if($key==""){
    $sql.=" and `cityall_id` = '{$cityall_id}'";
    $pagecs.="&cityall_id={$cityall_id}";
    }
    }
    if($flagjw==""){
        $flagjw="0";
        }
    if($flaghx==""){
        $flaghx="0";
        }
    if($flagts==""){
        $flagts="0";
        }
    if($flagzx==""){
        $flagzx="0";
        }
        
    if($flaghx!="0"){
        $sql.=" and `flaghx` like '%{$flaghx}%'";
        $pagecs.="&flaghx={$flaghx}";
        }
    if($flagts!="0"){
        $sql.=" and `flagts` like '%{$flagts}%'";
        $pagecs.="&flagts={$flagts}";
        }
        if($flagzx!="0"){
        $sql.=" and `flagzx` like '%{$flagzx}%'";
        $pagecs.="&flagzx={$flagzx}";
        }
    if($city_id!="0"){
            
            if($key==""){
            $sql.=" and `city_id` = '{$city_id}'";
            $pagecs.="&city_id={$city_id}";
            }
        }
    if($flagjw!="0"){
        $sql.=" and `flagjw` like '%{$flagjw}%'";
        $pagecs.="&flagjw={$flagjw}";
        }
    if($flaghx!="0"){
        $sql.=" and `flaghx` like '%{$flaghx}%'";
        $pagecs.="&flaghx={$flaghx}";
        }
    if($flagts!="0"){
        $sql.=" and `flagts` like '%{$flagts}%'";
        $pagecs.="&flagts={$flagts}";
        }
        if($flagzx!="0"){
        $sql.=" and `flagzx` like '%{$flagzx}%'";
        $pagecs.="&flagzx={$flagzx}";
        }


    
if($flaglp!=""){
    $sql.=" and `flaglp` like '%{$flaglp}%'";
    $pagecs.="&flaglp={$flaglp}";
    }
if($flaglb!=""){
    $sql.=" and `flaglb` like '%{$flaglb}%'";
    $pagecs.="&flaglb={$flaglb}";
    }
if($flagwq!=""){
    $sql.=" and `flagwq` like '%{$flagwq}%'";
    $pagecs.="&flagwq={$flagwq}";
    }
if($hz_pp!=""){
    $sql.=" and `hz_pp` like '%{$hz_pp}%'";
    $pagecs.="&hz_pp={$hz_pp}";
    }

$px=" `px` desc";
if($pricesort==1){
    $px=" `jj_price` asc";
    $pagecs.="&pricesort={$pricesort}";
    }
if($pricesort==2){
    $px=" `jj_price` desc";
    $pagecs.="&pricesort={$pricesort}";
    }
if($renqi==1){
    $px=" `click` desc";
    $pagecs.="&renqi={$renqi}";
    }
//print_r($_GET);
//echo $page;
if($page==0){
    $page=1;
    }

$page_num =$zimu?50:10;//如果是字母检索，则最大显示50条。
$offset = ($page-1)*$page_num;
$rscall = $mysql->query("select count(*) as count from `web_content` WHERE `pid`='{$pid}' and `city_id`='{$city_id}'");
$resultall["total"] = $rscall[0]['count'];
$rscyh = $mysql->query("select count(*) as count from `web_content` WHERE `pid`='{$pid}' and `city_id`='{$city_id}' and `flagts` like '%tsa6%'");
$resultyh["total"] = $rscyh[0]['count'];
$rsc = $mysql->query("select count(*) as count from `web_content` {$sql}");
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/$page_num);
$rowlist = $mysql->query("select * from `web_content` {$sql} and `cityall_id`='{$cityall_id}' order by px desc limit $offset,$page_num");
//echo "select * from `web_content` {$sql} order by {$px} limit $offset,$page_num";
?>
<head>
    <meta charset="UTF-8"/>
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1.0,minimum-scale=1.0">
    <title><?php if($city_id){echo cityname($city_id);}?>楼盘大全_<?php if($flagjw){echo loupanflag($flagjw).'_';}?><?php if($flaglp){echo loupanflag($flaglp).'_';}?><?php if($flaghx){echo loupanflag($flaghx).'_';}?><?php if($flagts){echo loupanflag($flagts).'_';}?><?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php if($city_id){echo cityname($city_id);}?>楼盘大全,<?php if($flagjw){echo loupanflag($flagjw).',';}?><?php if($flaglp){echo loupanflag($flaglp).',';}?><?php if($flaghx){echo loupanflag($flaghx).',';}?><?php echo $config['site_keyword'];?>">
    <meta name=description content="<?php echo $config['site_desc'];?>">
    <script src="/public/static/phone/js/flexible.js"></script>
    <link href="/public/static/phone/css/module-new.css?v=2.54" rel="stylesheet">
    <link href="/public/static/phone/css/house-list.css?v=2.5" rel="stylesheet">
    <link href="/public/static/phone/css/my.css?v=2.5" rel="stylesheet">
    <script  src="/public/static/libs/jquery/1.x/jquery.min.js" type="text/javascript"></script>
    <script src="/public/static/common/js/jquery.form.js"></script>    
    <script src="/public/static/libs/layer/mobile/layer.js"></script> 
    <style>
    .Discounts-hqrh {float: right;
width: 1.8rem;
height: .6rem;
line-height: .62rem;
border: 1px #ff6d6f solid;
margin: .1rem .1rem;
text-align: center;
font-size: .35rem;
color: #ff6d6f;
border-radius: 4px;}
    </style>   
<?php include("../sq2.php");?>            
</head>
<body>
<?php include("../sqtop.php");?>  

<div class="container">    
    <div class="header" style="z-index: 999;position: fixed;top: 0;width: 100%">
        <div style="position: relative;">
        <div class="go-back">
            <a href="javascript:void(0)" onclick="history.back(-1)"> <span class="ico ico-return">返回上一页</span> </a>
        </div>
        <div class="city-change">                
            <span class="text">新房列表</span> 
        </div>
        <ul class="u-link" style="top: .3rem;right: .2rem;">
            <li class="link-home"><a href="javascript:;" id="navBtn" style="display: block;"><img src="/public/static/phone/image/nav/nav.png"></a></li>                 
        </ul>
        </div>
    </div> 
    <style type="text/css">
        .inner-container{background-color: #fff;}
        .inner-container::-webkit-scrollbar {display: none;}
        .inner-container ul{padding: 0.15rem 0;overflow: hidden;}
        .inner-container ul li {padding-bottom: 0.2em;}
        .inner-container ul li a{display: block;}
        .on{background-color: #00A0EA;color: #fff;}
    </style>
    <div class="inner-container" style="width: 100%;
    border-bottom: 0.5px solid rgb(229, 229, 229);
    position: fixed;
    top: 5EM;
    RIGHT: 0px;
    width: 100%;
    z-index: 23;
    margin-top: 1.3333rem;
    text-align: center;
    overflow-y: scroll;
    FLOAT: RIGHT;
    HEIGHT: 180%;
    WIDTH: 1.2EM;"> 
       <ul style="display: block;">
        <li><a <?php echo $_GET['zimu']==A?'class=on':'';?> href="/m/loupan/?zimu=A">A</a></li>
        <li><a <?php echo $_GET['zimu']==B?'class=on':'';?> href="/m/loupan/?zimu=B">B</a></li>
        <li><a <?php echo $_GET['zimu']==C?'class=on':'';?> href="/m/loupan/?zimu=C">C</a></li>
        <li><a <?php echo $_GET['zimu']==D?'class=on':'';?> href="/m/loupan/?zimu=D">D</a></li>
        <li><a <?php echo $_GET['zimu']==E?'class=on':'';?> href="/m/loupan/?zimu=E">E</a></li>
        <li><a <?php echo $_GET['zimu']==F?'class=on':'';?> href="/m/loupan/?zimu=F">F</a></li>
        <li><a <?php echo $_GET['zimu']==G?'class=on':'';?> href="/m/loupan/?zimu=G">G</a></li>
        <li><a <?php echo $_GET['zimu']==H?'class=on':'';?> href="/m/loupan/?zimu=H">H</a></li>
        <li><a <?php echo $_GET['zimu']==I?'class=on':'';?> href="/m/loupan/?zimu=I">I</a></li>
        <li><a <?php echo $_GET['zimu']==J?'class=on':'';?> href="/m/loupan/?zimu=J">J</a></li>
        <li><a <?php echo $_GET['zimu']==K?'class=on':'';?> href="/m/loupan/?zimu=K">K</a></li>
        <li><a <?php echo $_GET['zimu']==L?'class=on':'';?> href="/m/loupan/?zimu=L">L</a></li>
        <li><a <?php echo $_GET['zimu']==M?'class=on':'';?> href="/m/loupan/?zimu=M">M</a></li>
        <li><a <?php echo $_GET['zimu']==N?'class=on':'';?> href="/m/loupan/?zimu=N">N</a></li>
        <li><a <?php echo $_GET['zimu']==O?'class=on':'';?> href="/m/loupan/?zimu=O">O</a></li>
        <li><a <?php echo $_GET['zimu']==P?'class=on':'';?> href="/m/loupan/?zimu=P">P</a></li>
        <li><a <?php echo $_GET['zimu']==Q?'class=on':'';?> href="/m/loupan/?zimu=Q">Q</a></li>
        <li><a <?php echo $_GET['zimu']==R?'class=on':'';?> href="/m/loupan/?zimu=R">R</a></li>
        <li><a <?php echo $_GET['zimu']==S?'class=on':'';?> href="/m/loupan/?zimu=S">S</a></li>
        <li><a <?php echo $_GET['zimu']==T?'class=on':'';?> href="/m/loupan/?zimu=T">T</a></li>
        <li><a <?php echo $_GET['zimu']==U?'class=on':'';?> href="/m/loupan/?zimu=U">U</a></li>
        <li><a <?php echo $_GET['zimu']==V?'class=on':'';?> href="/m/loupan/?zimu=V">V</a></li>
        <li><a <?php echo $_GET['zimu']==W?'class=on':'';?> href="/m/loupan/?zimu=W">W</a></li>
        <li><a <?php echo $_GET['zimu']==X?'class=on':'';?> href="/m/loupan/?zimu=X">X</a></li>
        <li><a <?php echo $_GET['zimu']==Y?'class=on':'';?> href="/m/loupan/?zimu=Y">Y</a></li>
        <li><a <?php echo $_GET['zimu']==Z?'class=on':'';?> href="/m/loupan/?zimu=Z">Z</a></li>
      </ul>  
    </div>  
    <div style="height: 51px"></div>        
<div class="center">
    <!--搜索-->
    <div class="search-wrap">
        <div class="search" style="border-radius: 50px">
            <form action="" method="get">
            <div class="ipt-area">                
                <input name="key" type="text" class="ipt" placeholder="请输入楼盘名称" value="">
            </div>
            <div class="btn-area">
                <button type="submit" class="btn btn-search pro_search">搜搜</button>
            </div>
            </form>
        </div>
    </div>
    <!-- 轮播 -->
    <div class="top-nav">
        <script type="text/javascript" src="/public/static/phone/js/flexslider-min.js"></script>
        <div class="search-thumb">
            <div class="block_home_slider">
                <div id="home_slider" class="flexslider">               
                    <ul class="slides" style="width: 100%;height: 132px;overflow-x: hidden;">
                    <?php
            $row = $mysql->query("select * from `web_link` where `ad_id`='40' and `city_id` = '{$city_id}' order by px asc");
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
                    $('#home_slider').children('ul').height('auto');
                    $('#home_slider').flexslider({animation : 'slide',controlNav : true,directionNav : true,animationLoop : true,slideshow : false,useCSS : false});                 
                });
                </script>
            </div> <!-- /- 轮播 -->
            <div class="list-nav" style="display:none;">
                <ul>
                    <li><a href="/m/loupan/"><img src="/public/static/phone/img/icons/nav_1.png" alt=""><span>全部楼盘</span></a></li>
                    <li><a href="/sanya/duanwu/"><img src="/public/static/phone/img/icons/nav_2.png" alt="活动专区" style="width: .9rem"><span>活动专区</span></a></li>
                    <li><a href="/sanya/lp/list0_0_0_0_0_0_1.html"><img src="/public/static/phone/img/icons/nav_3.png" alt=""style="width: 1rem"><span>航拍看房</span></a></li>
                    <li><a href="/sanya/tejia/"><img src="/public/static/phone/img/icons/nav_4.png" alt=""><span>特价房</span></a></li>
                    <div class="clear"></div>
                </ul>
            </div> <!-- /- 导航 -->
        </div>
        <div class="hr"></div>
        <div class="search-thumb">
            <div class="make pr">
                <div class="piv"><img src="/public/static/phone/image/zhiye.png" alt=""></div>
                <div class="info pa" style="position: absolute;left: 1.5rem;top: .1rem;font-size: .4rem;"><p>买房时你需要一个专业的</p><p>资深顾问</p></div>
                <a href="<?php echo $shangqiao;?>" style="position: absolute;right: 1px;top: .2rem;border-radius: 50px;background: linear-gradient(to right,#00A0EA,#00A0EA);color: #fff;font-size: .4rem;padding: .15rem .4rem">抢先预约</a>
            </div>
        </div>
    </div>
    <!-- 轮播:end -->

    <div class="list-wrap">
        <!--楼盘检索-->
        <input type="hidden" id="hidden_query_track"/>
        <div class="query" style="border-bottom: 0.5px solid rgb(229, 229, 229)">
            <ul class="query-list">
                <li class="query-area" data-id="query_li" data-group="area" style="width: 25%; ">
                    <div class="query-wrap">
                                            <span class="query-txt"><?php echo $sitecityname;?></span>
                                            </div>
                    <div class="tab query-panel panel-price">
                        <div class="tab-nav brdr citySeach">
                            <ul class="area-type-list">
                                <li class="selected frem4" data="0">区域</li>
                                <?php
                                $cityss=$mysql->query("select * from `web_city` where `id`='{$sitecityid}'");
                $city=$mysql->query("select * from `web_city` where `pid`='{$cityss[0]['pid']}' and `city_st`='1' order by `city_px` asc");
                foreach($city as $cityall){
                    echo '<li data="'.$cityall['id'].'"><a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/m/loupan/" class="frem4">'.$cityall['city_name'].'</a></li>';
                }
                ?>
                            </ul>
                        </div>
                        
                    </div>
                </li>
                <li class="query-price" data-id = "query_li" data-group = "price" style="width: 25%">
                    <div class="query-wrap">
                                                <span class="query-txt"><?php if($flagjw=='0' or $flagjw==''){echo '价格';}else{echo loupanflag($flagjw,7);}?></span>
                                            </div>
                    <div class="query-panel panel-price">
                        <ul class="price-item">
                            <li class=""><a href="index_<?php echo $city_id;?>_0_<?php echo $flaghx;?>_<?php echo $flagts;?>_<?php echo $page;?>.html" class="frem4">不限</a></li>
                            <?php
            $flag=$mysql->query("select * from `web_flag` where `flag_fl`='7' and `flag_st`='1' order by `flag_px` asc");
            foreach($flag as $flagall){
                echo '<li> <a  href="index_'.$city_id.'_'.$flagall['flag_bm'].'_'.$flaghx.'_'.$flagts.'_'.$page.'.html" title="'.$flagall['flag'].'"  class="frem4">'.$flagall['flag'].'</a></li>';
                
            }
            ?>
                                                      <!--  <li class=""><a href="/sanya/lp/list0_964_0_0_0_0_0.html" class="frem4">6千以下</a></li>
                                                        <li class=""><a href="/sanya/lp/list0_965_0_0_0_0_0.html" class="frem4">6-7千</a></li>
                                                        <li class=""><a href="/sanya/lp/list0_966_0_0_0_0_0.html" class="frem4">7-8千</a></li>
                                                        <li class=""><a href="/sanya/lp/list0_967_0_0_0_0_0.html" class="frem4">8千-1万</a></li>
                                                        <li class=""><a href="/sanya/lp/list0_968_0_0_0_0_0.html" class="frem4">1万-1.3万</a></li>
                                                        <li class=""><a href="/sanya/lp/list0_969_0_0_0_0_0.html" class="frem4">1.3-1.5万</a></li>
                                                        <li class=""><a href="/sanya/lp/list0_970_0_0_0_0_0.html" class="frem4">1.5-2万</a></li>
                                                        <li class=""><a href="/sanya/lp/list0_971_0_0_0_0_0.html" class="frem4">2万以上</a></li>-->
                                                    </ul>                    
                    </div>
                </li>
                <li class="query-housetype" data-id = "query_li" data-group = "housetype" style="width: 25%">
                    <div class="query-wrap">                        
                                                <span class="query-txt"><?php if($flaghx=='0' or $flaghx==''){echo '户型';}else{echo loupanflag($flaghx,4);}?></span>
                                            </div>
                <div class="query-panel panel-housetype">
                    <ul class="housetype-item">
                        <li class=""><a href="index_<?php echo $city_id;?>_<?php echo $flagjw;?>_0_<?php echo $flagts;?>_<?php echo $page;?>.html" class="frem4">不限</a></li>
                        <?php
            $flag=$mysql->query("select * from `web_flag` where `flag_fl`='4' and `flag_st`='1' order by `flag_px` asc");
            foreach($flag as $flagall){
                
                echo '<li> <a href="index_'.$city_id.'_'.$flagjw.'_'.$flagall['flag_bm'].'_'.$flagts.'_'.$page.'.html" title="'.$flagall['flag'].'"  class="frem4">'.$flagall['flag'].'</a></li>';
                
            }
            ?>
                                            </ul>
                </div>
                </li>
                
                <li class="query-housetype" data-id = "query_li" data-group = "housetype" style="width: 25%">
                    <div class="query-wrap">                        
                                                <span class="query-txt"><?php if($flagts=='0' or $flagts==''){echo '类别';}else{echo loupanflag($flagts,6);}?></span>
                                            </div>
                <div class="query-panel panel-housetype">
                    <ul class="housetype-item">
                       <li class=""><a href="index_<?php echo $city_id;?>_<?php echo $flagjw;?>_<?php echo $flaghx;?>_0_<?php echo $page;?>.html" class="frem4">不限</a></li>
                        <?php
            $flag=$mysql->query("select * from `web_flag` where `flag_fl`='6' and `flag_st`='1' order by `flag_px` asc");
            foreach($flag as $flagall){
                echo '<li> <a href="index_'.$city_id.'_'.$flagjw.'_'.$flaghx.'_'.$flagall['flag_bm'].'_'.$page.'.html" title="'.$flagall['flag'].'" class="frem4" >'.$flagall['flag'].'</a></li>';
                
            }
            ?>
                                            </ul>
                </div>
                </li>
                
                <li class="query-mnore last" style="width: 25%; display:none;">
                    <div class="query-wrap">
                        <span class="query-txt">更多</span>
                    </div>
                    <div class="query-panel panel-more" style="overflow-y: auto;">
                        <div class="mod3 mod3-type">
                            <div class="tit frem4">类型：</div>
                            <ul class="con">
                                <li class=" on"><a href="javascript:void(0)" data-search-key="e1" class="frem4">不限</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="e915" class="frem4">住宅</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="e916" class="frem4">公寓</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="e917" class="frem4">商住</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="e918" class="frem4">别墅</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="e919" class="frem4">洋房</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="e921" class="frem4">其他</a></li>
                                                            </ul>
                        </div>
                        <div class="mod3 mod3-feature">
                            <div class="tit frem4">特色：</div>
                            <ul class="con">
                                <li class=" on"><a href="javascript:void(0)" data-search-key="h1" class="frem4">不限</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h912" class="frem4">品牌地产</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h932" class="frem4">海景房</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h934" class="frem4">报销机票</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h935" class="frem4">精装修</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h937" class="frem4">山景地产</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h938" class="frem4">特色别墅</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h940" class="frem4">商铺投资</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h941" class="frem4">专车看房</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h942" class="frem4">特价优惠</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h943" class="frem4">一线海景</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h944" class="frem4">写字楼</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h947" class="frem4">湖景地产</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h949" class="frem4">温泉</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h950" class="frem4">小户型</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h951" class="frem4">避暑养生</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h953" class="frem4">大型社区</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h962" class="frem4">免费接机</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1002" class="frem4">酒店式公寓</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1021" class="frem4">现房</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1022" class="frem4">养老居所</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1023" class="frem4">高性价比</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1105" class="frem4">现房</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1110" class="frem4">酒店式公寓</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1121" class="frem4">地铁沿线</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1138" class="frem4">避寒养生</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1139" class="frem4">山景美居</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1140" class="frem4">普通住宅</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1194" class="frem4">花园洋房</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="h1206" class="frem4">旅游地产</a></li>
                                                            </ul>
                        </div>
                        <div class="mod3 mod3-sale">
                            <div class="tit frem4">状态：</div>
                            <ul class="con">
                                <li class=" on"><a href="javascript:void(0)" data-search-key="j1" class="frem4">不限</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="j276" class="frem4">在售</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="j277" class="frem4">待售</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="j278" class="frem4">售完</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="j908" class="frem4">现房</a></li>
                                                                <li class=""><a href="javascript:void(0)" data-search-key="j909" class="frem4">尾盘</a></li>
                                                            </ul>
                        </div>
                        <div class="btn-area2">
                            <a href="javascript:void(0)" class="btn btn-canel">重置条件</a>
                            <a href="javascript:void(0)" class="btn btn-confirm" data-id='3'>确 定</a>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
        <div class="build-list">
            <ul id="ajaxhouse">
            
              <?php

if($result["total"]==0){
    echo "<li align=center style='padding:10px;font-size:15px;border-bottom:dashed #ccc 1px'><h1>很抱歉,没有找到您搜索的结果。</h1></li>";
    }else{
        foreach($rowlist as $k=>$list){
            $url='/m/loupan/'.$list['id'].'.html';
?>
          
          <li class="news">
                <div class="item-new"><a href="<?php echo $url;?>">
                    <div class="img-area">
                                                <img  src="/<?php echo $list['img'];?>" alt="<?php echo $list['title'];?>">
                                            </div> <!-- /- 图片 -->

                    <div class="des">
                        <div class="pr">
                            <h3><?php echo $list['title'];?></h3>                            
                            <div class="clear"></div>
                        </div>
                        
                        <div class="tr" style="margin-top: 3px">
                            <div class="red">
                             <?php if($list['all_price']==0){?>
                        <?php if($list['jj_price']==0){?>
                            <i style="font-size: .5rem!important;font-style: normal;">待定</i>
                        <?php }else{?>
                            <i style="font-size: .5rem!important;font-style: normal;"><?php echo $list['jj_price'];?></i>元/㎡
                        <?php }?>
                    <?php }else{?>
                            <i style="font-size: .5rem!important;font-style: normal;"><?php echo $list['all_price'];?></i>万/套
                    <?php }?>
                            </div>
                            <div class="place"><?php echo cityname($list['cityall_id']);?>-<?php echo cityname($list['city_id']);?></div>
                        </div>
                        <div class="text">                                                        
                           <p class="jd_text fl"><?php echo $list['zlhx'];?></p>
                           <div class="clear"></div>
                        </div>
                        <div class="clear"></div>
                    </div> <!-- /- 楼盘信息 -->
                    <div class="clear"></div>

                    <div class="i_lp_tag">
                        <i class="time"><?php echo rand(1,24);?>小时前有人咨询</i>
                        
                         <?php echo loupanflagtsi2($list['flagts'],6,3);?>
                        <div class="clear"></div>
                    </div> <!-- /- 图片底部标签 -->
                    <div class="clear"></div></a>
                    <?php
                    if($list['fkfs']<>''){
        $fkfs=$list['fkfs'];
        }else{
            $fkfs='3天2晚看房免食宿';
            }
                    ?>
                    <div class="i_lp_hui">
                        <i>惠</i><span><?php echo $fkfs;?></span><a href="javascript:;" class="Discounts-hqrh" onclick="openwid4('抢好房','<?php echo $fkfs;?>','<?php echo $list['title'];?>移动_列表抢好房',2);">抢好房</a>
                    </div> <!-- /- 底部标签惠 -->
                    <div class="clear"></div>
                   
                
                                         <a href="javascript:phone('<?php echo telsee($list['loupan_tel']);?>',1)">
                     
                <div class="tel-phone"><img src="/public/static/phone/img/icons/tel.gif" alt=""></div></a>
                </div>
            </li>
  <?php
        }
        }
  ?>
  
  </ul>
            <!-- 加载更多 -->
            <div onclick="loadMore(this)" class="more-loading loadMore" style="display: block;">
                <span>加载更多</span><span style="display: none;"><i></i>正在拼命加载...</span>
            </div>
            <!-- 加载更多 end-->
        </div>
    </div>
</div>
<div class="footer-make" style="display: none;">
    <i></i>
    <span>找楼盘？问底价？不如一个电话轻松搞定！</span>
    <ins>×</ins>
</div>
<!--返回顶部-->
<div class="return-top"></div>
<script src="/public/static/echo/echo.min.js"></script>
<script>Echo.init({offset: 0,throttle: 0});</script>
<style type="text/css">
.jd_text{overflow: hidden;margin-right: .35rem;text-overflow: ellipsis;white-space: nowrap;font-size: .35rem;line-height: .45rem;max-width: 5rem}
.icon-16 {background: url(/public/static/phone/image/icons/close2.png) no-repeat;padding: 22px 0px;}
.video_2_btn{bottom: .3rem}
.i_status {background: #ebf6e6;color: #47be0f;margin-left: 5px;padding: .15rem;font-size: .35rem;}
.i_lp_tag{line-height: .5rem;height: .5rem;margin-top: 3px; margin-bottom: 5px;}
.i_lp_tag span {background: #f3f3f3;border: 1px solid #f3f3f3;color: #b5b5b5;margin-right: .2rem;padding: .15rem;}
.i_lp_tel{position: relative;margin-top: 8px;}
.i_lp_tel_1{font-size: .35rem;color: #999;position: absolute;left: 0px;top: 5px;}
.i_lp_tel_2{position: absolute;right: 1px;top: 1px;line-height: .8rem;}
.i_lp_tel_2 a{ padding: .2rem .25rem;font-size: .35rem;}
.i_lp_tel_2 .i_btn_1{background: #50dfbc;color: #fff}
.i_lp_tel_2 .i_btn_2{background: #48be0f;color: #fff}
.brdr{border-right: 1px solid #e5e5e5;}
.city50{width: 49.8%;float: left;}

.footer-make{background:#00A0EA;width: 95%;padding: 20px;font-size: .4rem;position: fixed;left: 0;bottom: 70px;z-index: 999999999;color: #FFF;left: 0;right: 0;margin: auto;box-sizing:border-box;-moz-box-sizing:border-box; -webkit-box-sizing:border-box;border-radius: 3px}
.footer-make i{position: absolute;top: 100%;right:50px;display: inline-block;width: 0;height: 0;border: 8px solid transparent;border-top: 12px solid #00A0EA}
.footer-make ins{font-size: .6rem;color: #FFF;display: inline-block;position: absolute;top: 0;right: 10px}
</style> 
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

<?php include("../bottom.php");?>
<!-- 百度 -->
<script type="text/javascript">
/*    window._agl = window._agl || [];
    (function () {
        _agl.push(
            ['production', '_f7L2XwGXjyszb4d1e2oxPybgD']
        );
        (function () {
            var agl = document.createElement('script');
            agl.type = 'text/javascript';
            agl.async = true;
            agl.src = 'https://fxgate.baidu.com/angelia/fcagl.js?production=_f7L2XwGXjyszb4d1e2oxPybgD';
            var s = document.getElementsByTagName('script')[0];
            s.parentNode.insertBefore(agl, s);
        })();
    })();*/
</script>
        
</body>
</html>
<?php include("../sq.php");?>
<div class="h50"></div>
<div id="prop" class="tsk-translayer"></div>
<script src="/public/static/phone/js/lp/common.js"></script>
<script src="/public/static/phone/js/list-new.js"></script>
<script src="/public/static/libs/layer/mobile/layer.js"></script>
<input type="hidden" id="cityid" value="<?php echo $city_id;?>">
<input type="hidden" id="flagjw" value="<?php echo $flagjw;?>">
<input type="hidden" id="flaghx" value="<?php echo $flaghx;?>">
<input type="hidden" id="status" value="0.html">
<input type="hidden" id="flagzx" value="<?php echo $flagzx;?>">
<input type="hidden" id="flagts" value="<?php echo $flagts;?>">
<input type="hidden" id="wys" value="0">
<input type="hidden" id="keywords" value="">
<input type="hidden" id="more" value="">
<script type="text/javascript"> 
    var site_url = "http://m.XXX.com/sanya/";
    $(function() {
        //滑到底部自动加载
        $(window).scroll( function() {
            if($(document).height() - ($(window).scrollTop() + $(window).height()) <= 100) {
                loadMore();
            }
        });
        //点击周边黑色区域隐藏下拉菜单
        $(".mask").click(function() {
            $(".menubox li.active").click();
        });

        // 区域点击
        $('.citySeach ul').children('li.click').click(function () {
            var data = $(this).attr('data');
            $(this).addClass('selected').siblings().removeClass('selected');

            $(this).parent('ul').parent('.citySeach').addClass('city50');// 添加50%的宽度
            if (data == 0) $(this).parent('ul').parent('.citySeach').removeClass('city50');// 已经选择全区域

            $(this).parent('ul').parent('.citySeach').siblings('#c'+data).show().siblings('.subCity').hide();
        });
    });
    var currPage =1;
    var searchValue = '';
    //加载更多
    function loadMore() {
        if($(".loadMore").hasClass("loading") || $(".loadMore").css("display") == "none") {
            return;
        }        
        $(".loadMore").addClass("loading");
        $(".loadMore span").hide().eq(1).show();
        var cityid=$('#cityid').val();
        var key=$('#keywords').val();
        var flagjw=$('#flagjw').val();
        var flaghx=$('#flaghx').val();
        var flagzx=$('#flagzx').val();
        var flagts=$('#flagts').val();
        var htype=$('#htype').val();
        var wys=$('#wys').val();
        var more=$('#more').val();
        var html='';
        $.ajax({
            url: "ajaxlistnew.html",
            'type':'post',
            data: {page: currPage + 1,cityid:cityid,key:key,'flagjw':flagjw,'flaghx':flaghx,'flagzx':flagzx,'flagts':flagts,'htype':htype,'wys':wys,'more':more}, 
            success: function(data) {           
                if(data){
                    $(".loadMore").removeClass("loading");
                    $(".loadMore span").hide().eq(0).show();                                                                
                    $('#ajaxhouse').append(data); 
                    currPage++;
                }else{
                    layer.open({content: '没有更多楼盘',time: 2 ,style: 'background:  rgb(221,221,221); color:#fff; border:none;' });      
                    $(".loadMore").hide();                
                }
            },
            complete: function() {
                $(".loadMore").removeClass("loading");
                $(".loadMore span").hide().eq(0).show();
            }
        });
    } 

    playMake();

    // 关闭拨号提示
    $(".footer-make").children('ins').click(function () {
        $(this).parent('.footer-make').hide();
        playMake();
    });

    // 延迟提示拨号
    function playMake() {
        setTimeout(function(){
            $(".footer-make").show();
        },20000);
    }
</script>