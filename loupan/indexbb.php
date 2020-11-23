<!DOCTYPE html>
<html lang="zh-CN">
<?php
require("../conn/conn.php");
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
  if(substr($gc2[$i],0,1)=='x'){
	  $pricesort=substr($gc2[$i],1);
	  }
  
 }
//print_r($gc2);
$key=$_GET['key'];
//$flagjw=$_GET['flagjw'];
$flaglp=$_GET['flaglp'];
$flaglb=$_GET['flaglb'];
//$flaghx=$_GET['flaghx'];
//$flagzx=$_GET['flagzx'];
//$flagts=$_GET['flagts'];
$flagwq=$_GET['flagwq'];
$hz_pp=$_GET['hz_pp'];
//$pricesort=$_GET['pricesort'];
$renqi=$_GET['renqi'];
//$px = $_GET['px'] ? $_GET['px'] : 'px';
//$city_id=$_GET['city_id'];
$city_id = $sitecityid;
$cityall_id = isset($_GET['cityall_id']) ? intval($_GET['cityall_id']) : 0;


if($city_id<>0){
	$cityall_id=cityallid($city_id);
	}

$key=$_GET['key'];
$pid=9;
$page = isset($page) ? intval($page) : 1;

$sql="WHERE `pid`='{$pid}' ";
$pagecs='';
if($key!=""){
	$sql.=" and `title` like '%{$key}%'";
	$pagecs.="&key={$flaggn}";
	}
if($cityall_id!=""){
	$sql.=" and `cityall_id` = '{$cityall_id}'";
	$pagecs.="&cityall_id={$cityall_id}";
	}
if($city_id!=""){
	$sql.=" and `city_id` = '{$city_id}'";
	$pagecs.="&city_id={$city_id}";
	}
	
if($flagjw!=""){
	$sql.=" and `flagjw` like '%{$flagjw}%'";
	$pagecs.="&flagjw={$flagjw}";
	}
if($flaglp!=""){
	$sql.=" and `flaglp` like '%{$flaglp}%'";
	$pagecs.="&flaglp={$flaglp}";
	}
if($flaglb!=""){
	$sql.=" and `flaglb` like '%{$flaglb}%'";
	$pagecs.="&flaglb={$flaglb}";
	}
if($flaghx!=""){
	$sql.=" and `flaghx` like '%{$flaghx}%'";
	$pagecs.="&flaghx={$flaghx}";
	}
if($flagzx!=""){
	$sql.=" and `flagzx` like '%{$flagzx}%'";
	$pagecs.="&flagzx={$flagzx}";
	}
if($flagts!=""){
	$sql.=" and `flagts` like '%{$flagts}%'";
	$pagecs.="&flagts={$flagts}";
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
if($pricesort==3){
	$px=" `kptime` asc";
	$pagecs.="&pricesort={$pricesort}";
	}
if($pricesort==4){
	$px=" `kptime` desc";
	$pagecs.="&pricesort={$pricesort}";
	}
if($pricesort==5){
	$px=" `esfcx` asc";
	$pagecs.="&pricesort={$pricesort}";
	}
if($pricesort==6){
	$px=" `esfcx` desc";
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

$page_num =10;
$offset = ($page-1)*$page_num;
$rscall = $mysql->query("select count(*) as count from `web_content` WHERE `pid`='{$pid}' and `city_id`='{$city_id}'");
$resultall["total"] = $rscall[0]['count'];
$rscyh = $mysql->query("select count(*) as count from `web_content` WHERE `pid`='{$pid}' and `city_id`='{$city_id}' and `flagts` like '%tsa6%'");
$resultyh["total"] = $rscyh[0]['count'];
$rsc = $mysql->query("select count(*) as count from `web_content` {$sql}");
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/$page_num);
$rowlist = $mysql->query("select * from `web_content` {$sql} order by {$px} limit $offset,$page_num");
?>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta charset="UTF-8">
    <meta name="renderer" content="webkit" />
    <meta http-equiv="X-UA-Compatible" content="IE=Edge,chrome=1" />
    <meta name="csrf-param" content="csrf_token_f">
    <title><?php if($city_id){echo cityname($city_id);}?>楼盘大全_<?php if($flagjw){echo loupanflag($flagjw).'_';}?><?php if($flaglp){echo loupanflag($flaglp).'_';}?><?php if($flaghx){echo loupanflag($flaghx).'_';}?><?php if($flagts){echo loupanflag($flagts).'_';}?><?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php if($city_id){echo cityname($city_id);}?>楼盘大全,<?php if($flagjw){echo loupanflag($flagjw).',';}?><?php if($flaglp){echo loupanflag($flaglp).',';}?><?php if($flaghx){echo loupanflag($flaghx).',';}?><?php echo $config['site_keyword'];?>">
    <meta name=description content="<?php echo $config['site_desc'];?>">
    
	<link rel="stylesheet" href="../public/static/home/css/css.css">  
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
	<link rel="stylesheet" href="/public/static/layui/css/layui.css">
    <link href="/css/public.css" rel="stylesheet">
    <link href="/css/alert.css" rel="stylesheet">
	<link rel="stylesheet" href="/public/static/home/css/loupan.css">
    <style>
body{font-family:'Microsoft YaHei',Verdana,Arial,san-serif;}
.buiding-list li:hover{background: #f5f5f5;}
.tel-phone .qrcode{right: -143px;top: -143px;}
.tel-phone .qrcode .top {position: absolute;top: 148px;left: -14px;width: 10px;height: 9px;margin-left: 4px;background: url(/public/static/home/image/v2.0/icon-top.png) no-repeat;}
.info-right {float: right;width: 30%;padding-right: 10px;}
</style>
   <!-- <link href="/css/lp_list.css" rel="stylesheet">-->
<?php include("../sq2.php");?>
</head>
<body>
<?php //echo $gc;?>
<!-- 悬标 -->
<?php include("../ad_xf.php");?>
<!-- 导航 -->
<?php include("../top.php");?>
 <?php
				$row = $mysql->query("select * from `web_link` where `ad_id`='39' order by px asc limit 0,1");
				foreach($row as $k=>$list){
				?>
               
      <div class="h20"></div>
<div class="w1200">
	<div class="lp-ad"><a href="<?php echo $list['link_url'];?>" target="_blank"><img src="/<?php echo $list['img'];?>" alt="<?php echo $list['title'];?>" width="1200"></a></div>
</div>
				<?php
				}
				?>


<div class="h20"></div>
<div class="w1200 border">
	<div class="seach-nav">
		<label class="label">热门城市：</label>
		<div class="param-item2 style">
         <?php
                $city=$mysql->query("select * from `web_city` where `pid`='{$sitecitybid}' and `city_st`='1' order by `city_px` asc");
                foreach($city as $cityall){
					if($sitecityid==$cityall['id']){ $sc='active';}else{ $sc='';}
					echo '<span class="'.$sc.'"><a href="http://'.$cityall['city_pingyin'].'.'.$siteasd.'/loupan/'.$gc.'" key="'.$gc.'">'.$cityall['city_name'].'</a></span>';
                }
                ?>
          
			<!-- 自定义筛选总价 -->
		</div>
		<div class="clear"></div>
	</div> <!-- /- 楼盘单价筛选 -->
	<div class="seach-nav">
		<label class="label">楼盘单价：</label>
		<div class="param-item style">
			<span <?php if($flagjw==''){echo 'class="active"';}?>><a href="/" key="<?php echo $gc;?>" data="p0">不限</a></span>
            <?php
            $flag=$mysql->query("select * from `web_flag` where `flag_fl`='7' and `flag_st`='1' order by `flag_px` asc");
			foreach($flag as $flagall){
				if($flagjw==$flagall['flag_bm']){ $sc='active';}else{ $sc='';}
				echo '<span class="'.$sc.'"><a href="p'.$flagall['flag_bm'].'" key="'.$gc.'" data="p'.$flagall['flag_bm'].'">'.$flagall['flag'].'</a></span>';
			}
			?>
			<!-- 自定义筛选总价 -->
		</div>
		<div class="clear"></div>
	</div> <!-- /- 楼盘单价筛选 -->
	<div class="seach-nav">
		<label class="label">楼盘户型：</label>
		<div class="param-item style">
			<span <?php if($flaghx==''){echo 'class="active"';}?>><a href="/" key="<?php echo $gc;?>" data="h0">不限</a></span>
            
         <?php
            $flag=$mysql->query("select * from `web_flag` where `flag_fl`='4' and `flag_st`='1' order by `flag_px` asc");
			foreach($flag as $flagall){
				if($flaghx==$flagall['flag_bm']){ $sc='active';}else{ $sc='';}
				echo '<span class="'.$sc.'"><a href="h'.$flagall['flag_bm'].'" key="'.$gc.'" data="h'.$flagall['flag_bm'].'">'.$flagall['flag'].'</a></span>';
			}
			?>
					</div>
		<div class="clear"></div>
	</div> <!-- /- 楼盘户型筛选 -->
	<div class="seach-nav">
		<label class="label">楼盘装修：</label>
		<div class="param-item style">
			<span <?php if($flagzx==''){echo 'class="active"';}?>><a href="/" key="<?php echo $gc;?>" data="z0">不限</a></span>
         <?php
            $flag=$mysql->query("select * from `web_flag` where `flag_fl`='5' and `flag_st`='1' order by `flag_px` asc");
			foreach($flag as $flagall){
				if($flagzx==$flagall['flag_bm']){ $sc='active';}else{ $sc='';}
				echo '<span class="'.$sc.'"><a href="z'.$flagall['flag_bm'].'" key="'.$gc.'" data="z'.$flagall['flag_bm'].'">'.$flagall['flag'].'</a></span>';
			}
			?>
            </div>
		<div class="clear"></div>
	</div> <!-- /- 楼盘装修筛选 -->
	<div class="seach-nav">
		<label class="label">楼盘特色：</label>
		<div class="param-item style <?php if($flagts==''){ echo 'last';}?>" id="characteristic">
			<span <?php if($flagts==''){echo 'class="active"';}?>><a href="/" key="<?php echo $gc;?>" data="t0">不限</a></span>
             <?php
            $flag=$mysql->query("select * from `web_flag` where `flag_fl`='6' and `flag_st`='1' order by `flag_px` asc");
			foreach($flag as $flagall){
				if($flagts==$flagall['flag_bm']){ $sc='active';}else{ $sc='';}
				echo '<span class="'.$sc.'"><a href="t'.$flagall['flag_bm'].'" key="'.$gc.'" data="t'.$flagall['flag_bm'].'" >'.$flagall['flag'].'</a></span>';
			}
			?>
					</div>
		<div class="clear"></div>
	</div> <!-- /- 楼盘特色筛选 -->
</div>
<div class="w1200 seach-nav-btn"><span class="open-make" id="open">展开类型<i class="<?php if($flagts<>'0'){ echo 'down';}?>"></i></span></div>


<div class="h20"></div>
<div class="w1200 building-list">
	<!-- 楼盘列表（左）:begin -->
	<div class="build-left">
		<div class="house-header border">
			<div class="house-type-left">
				<a class="<?php if($flagts<>'tsa6'){echo 'active';}?>" href="javascript:;" key="<?php echo $gc;?>" data="t0">全部楼盘（<?php echo $resultall["total"];?>）</a>
				<a class="<?php if($flagts=='tsa6'){echo 'active';}?>" href="javascript:;" key="<?php echo $gc;?>" data="ttsa6">优惠楼盘（<?php echo $resultyh["total"];?>）</a>
			</div>
			<div class="house-info-right">
				<span>
					<a href="javascript:;" key="def" data="<?php echo $pricesort;?>">默认排序</a>
					<a href="javascript:;" key="pic" data="<?php echo $pricesort;?>">单价<i class="<?php if($pricesort==2){echo 'icon2';}else{echo 'icon3';}?>"></i></a>
					<a href="javascript:;" key="kpr" data="<?php echo $pricesort;?>">开盘时间<i class="<?php if($pricesort==4){echo 'icon2';}else{echo 'icon3';}?>"></i></a>
					<a href="javascript:;" key="brs" data="<?php echo $pricesort;?>">报名人数<i class="<?php if($pricesort==6){echo 'icon2';}else{echo 'icon3';}?>"></i></a>
					<a href="javascript:;" class="last">共<i><?php echo $result["total"];?></i>个新盘</a>
				</span>
			</div>
		</div> <!-- /- 筛选头 -->
		<div class="buiding-list">
			<ul>
             <?php

if($result["total"]==0){
	echo "<li align=center style='padding:10px;font-size:15px;border-bottom:dashed #ccc 1px'><h1>很抱歉,没有找到您搜索的结果。为您推荐热门楼盘：</h1></li>";
	
	
	$rowlistrm = $mysql->query("select * from `web_content` where `pid`=9 and `city_id` = '{$city_id}' order by px limit 20");
	foreach($rowlistrm as $k=>$listrm){
			$url='/loupan/'.$listrm['id'].'.html';
	?>
	
	
	   <li class="list<?php echo $k+1;?>">
		<div class="thumb"><a href="<?php echo $url;?>" title="<?php echo $listrm['title'];?>" target="_blank"><img class="lazy" src="../<?php echo $listrm['img'];?>" alt="<?php echo $listrm['title'];?>"></a></div>
		<div class="info">
		<div class="info-left">							
			<div class="subject"><a href="<?php echo $url;?>" title="<?php echo $listrm['title'];?>" target="_blank"><h2><?php echo $listrm['title'];?></h2></a></div>
			<div class="hui"><span><i>惠</i><?php echo $listrm['fkfs'];?></span></div>
			<div class="hx"><a href="<?php echo '/loupan/huxing/'.$listrm['id'].'.html';?>" title="<?php echo $listrm['title'];?>" target="_blank"><span>户型：<?php echo $listrm['zlhx']?></span></a></div>
			<div class="addres"><span>地址：<?php echo $listrm['xmdz']?></span></div>
            <div class="tel-phone">
                <img src="/public/static/home/image/v2.0/tel1.gif" alt="电话">
                <span><?php echo telsee($listrm['loupan_tel']);?></span>
                <i class="hovers"><i class="qrmodel"></i>扫码拨号<div class="qrcode tel-code" style="display: none;"><div class="top"></div><span style="line-height: 19px;margin-right: 0px;">微信扫码拨号<br>省时 高效 问底价</span>
               
                <div id="hntel<?php echo $k+1;?>" style="width:100px;height: 100px;margin: 5px auto;"></div>
                </div>
                </i>
            </div>
            <div class="tags">
            <?php echo loupanflagtsi2($listrm['flagts'],6,4);?>
            </div>
		</div>
		<div class="info-right">
            <div class="auto-right">
                <div class="avg"><span>
                 <?php if($listrm['all_price']==0){?>
                        <?php if($listrm['jj_price']==0){?>
                            <i>待定</i>
                        <?php }else{?>
                            <i><?php echo $listrm['jj_price'];?></i>元/㎡
                        <?php }?>
                    <?php }else{?>
                        <i><?php echo $listrm['all_price'];?></i>万/套
                    <?php }?>
                </span></div>
                <div class="count-avg" style="display:none;">未标明指定参考价格</div>
                <?php
				$gwid=sjgw();
                $gws = $mysql->query("select * from `web_content` where `id`='{$gwid}' limit 0,1");
				?>
                <div class="zhiye"><div class="head"><img src="/<?php echo $gws[0]['img'];?>" alt="<?php echo $gws[0]['title'];?>"></div><i><?php echo $gws[0]['title'];?></i></div>
                <div class="btn-his"><a href="javascript:;"  onClick="sq();"><button>向TA咨询</button></a></div>
                <div class="news"><span class="fr10"><a href="<?php echo '/loupan/wenda/'.$listrm['id'].'.html';?>"><i class="wd"></i>问答</a></span><span><a href="<?php echo '/loupan/news/'.$listrm['id'].'.html';?>"><i class="dy"></i>动态</a></span></div>
            </div>
		</div>
		</div>
		<div class="clear"></div>
		</li>
	
	
	
	
	<?php
	}
	
	}else{
		foreach($rowlist as $k=>$list){
			if($k==115){
				echo '<div class="m_lp_list_gg">
                        <img src="/image/m_lb6.png" alt="">
                        <form class="submit_area">
                            <div class="m_lp_list_gg_form">
                                <input type="hidden" name="pid" value="33"> 
                                <input type="hidden" name="lpid" value="0">              <!-- 0 为公共报名，其它为楼盘ID-->
                                <input type="hidden" name="ly" value="列表-立即咨询">     <!--报名来源 具体查看applyVerify.js文件中source 标识说明-->
                                <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->
                                <input name="mobile" type="text" placeholder="请输入手机号，预约找房" class="f_input sign-mobile2">
                                <input type="button" value="立即咨询" class="f_submit sign-btn2 m_lp_list_button">
                            </div>
                        </form>
                    </div>';
				}
			$url='/loupan/'.$list['id'].'.html';
?>
        <li class="list<?php echo $k+1;?>">
		<div class="thumb"><a href="<?php echo $url;?>" title="<?php echo $list['title'];?>" target="_blank"><img class="lazy" src="../<?php echo $list['img'];?>"  alt="<?php echo $list['title'];?>"></a></div>
		<div class="info">
		<div class="info-left">							
			<div class="subject"><a href="<?php echo $url;?>" title="<?php echo $list['title'];?>" target="_blank"><h2><?php echo $list['title'];?></h2></a></div>
			<div class="hui"><span><i>惠</i><?php echo $list['fkfs'];?></span></div>
			<div class="hx"><a href="<?php echo '/loupan/huxing/'.$list['id'].'.html';?>" title="<?php echo $list['title'];?>" target="_blank"><span>户型：<?php echo $list['zlhx']?></span></a></div>
			<div class="addres"><span>地址：<?php echo $list['xmdz']?></span></div>
            <div class="tel-phone">
                <img src="/public/static/home/image/v2.0/tel1.gif" alt="电话">
                <span><?php echo telsee($list['loupan_tel']);?></span>
                <i class="hovers"><i class="qrmodel"></i>扫码拨号<div class="qrcode tel-code" style="display: none;"><div class="top"></div><span style="line-height: 19px;margin-right: 0px;">微信扫码拨号<br>省时 高效 问底价</span>
               
                <div id="hntel<?php echo $k+1;?>" style="width:100px;height: 100px;margin: 5px auto;"></div>
                </div>
                </i>
            </div>
            <div class="tags">
            <?php echo loupanflagtsi2($list['flagts'],6,4);?>
            </div>
		</div>
		<div class="info-right">
            <div class="auto-right">
                <div class="avg"><span>
                 <?php if($list['all_price']==0){?>
                        <?php if($list['jj_price']==0){?>
                            <i>待定</i>
                        <?php }else{?>
                            <i><?php echo $list['jj_price'];?></i>元/㎡
                        <?php }?>
                    <?php }else{?>
                        <i><?php echo $list['all_price'];?></i>万/套
                    <?php }?>
                </span></div>
                <div class="count-avg" style="display:none;">未标明指定参考价格</div>
                <?php
				$gwid=sjgw();
                $gws = $mysql->query("select * from `web_content` where `id`='{$gwid}' limit 0,1");
				?>
                <div class="zhiye"><div class="head"><img src="/<?php echo $gws[0]['img'];?>" alt="<?php echo $gws[0]['title'];?>"></div><i><?php echo $gws[0]['title'];?></i></div>
                <div class="btn-his"><a href="javascript:;"  onClick="sq();"><button>向TA咨询</button></a></div>
                <div class="news"><span class="fr10"><a href="<?php echo '/loupan/wenda/'.$list['id'].'.html';?>"><i class="wd"></i>问答</a></span><span><a href="<?php echo '/loupan/news/'.$list['id'].'.html';?>"><i class="dy"></i>动态</a></span></div>
            </div>
		</div>
		</div>
		<div class="clear"></div>
		</li>
		  
  <?php
		}
		}
  ?>
  		</ul>
		</div> <!-- /- 楼盘基本信息列表 -->
	</div>
	<!-- 楼盘列表（左）:end -->

	<!-- 推荐列表（右）:begin -->
	<div class="recommend-right border">
				<div class="card-box follow">
			<span class="tit">成交排行</span>
			<div class="build-nav">
				<ul>
                   <?php
								$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px12 desc limit 0,3");
								foreach($row as $k=>$lps){
									
											$url="/loupan/{$lps['id']}.html";
											
							?>
                              
                <li><a href="<?php echo $url;?>" target="_blank" title="<?php echo $lps['title'];?>">
					<div class="build-thumb"><img src="/<?php echo $lps['img'];?>" alt="<?php echo $lps['title'];?>"><i>TOP<?php echo $k+1;?></i></div><p><?php echo $lps['title'];?></p><p class="avg"><span class="red">
                    <?php if($lps['all_price']==0){?>
				<?php if($lps['jj_price']==0){?>
                    待定
				<?php }else{?>
                    <?php echo $lps['jj_price'];?>元/㎡
				<?php }?>
			<?php }else{?>
                <?php echo $lps['all_price'];?>万/套
			<?php }?>
                    </span><span class="renshu"><span class="red"><?php echo (int)$lps['esfcx'];?></span>人已报名</span></p></a></li>
                    
                                <?php }?>
								
									</ul>
			</div>
		</div> <!-- /- 成交排行 -->
				<div class="card-box">
			<span class="tit">热门楼盘</span>
			<div class="hot-build">
				<ul>
                 <?php
								$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px13 desc limit 0,8");
								foreach($row as $k=>$lps){
									
											$url="/loupan/{$lps['id']}.html";
											
							?>
                              
                    <li class="build<?php echo $k+1;?>"><a href="<?php echo $url;?>" title="<?php echo $lps['title'];?>" target="_blank"><em><?php echo $k+1;?></em><span class="build-name"><?php echo $lps['title'];?></span><span class="build-avg red"><?php if($lps['all_price']==0){?>
				<?php if($lps['jj_price']==0){?>
                    待定
				<?php }else{?>
                    <?php echo $lps['jj_price'];?>元/㎡
				<?php }?>
			<?php }else{?>
                <?php echo $lps['all_price'];?>万/套
			<?php }?></span></a></li>
                                <?php }?>
										
									</ul>
			</div>
		</div>
				<div class="card-box">
			<span class="tit">楼盘导购<a href="/news/index_6.html">更多&gt;&gt;</a></span>
			<div class="daogou">
				<ul>
									
                                    <?php
			$rownews = $mysql->query("select * from `web_content` WHERE `pid`='6' order by addtime desc limit 8");
			foreach($rownews as $k=>$lists){
			$url='/news/show_'.$lists['id'].'.html';
		?>
                <li <?php if($k==0){echo 'class="daogou1"';}?>><a href="<?php echo $url;?>" title="<?php echo $lists['title'];?>" target="_blank"><?php echo $lists['title'];?></a></li>
        <?php }?>
									</ul>
			</div>
		</div>
			</div>
	<!-- 推荐列表（右）:end -->
	<div class="clear"></div>
</div>

<div class="h20"></div>

<div class="w1200">
	<div class="page">
		<div id="page-demo">
        
        </div>
	</div>
</div>

















<!-- 随屏 -->
<div class="header2" style="display: none;">
  <div class="header2-wrap">
    <ul class="menu">
		<li><a href="/" class="act">首页</a></li>
		<li ><a href="/loupan/">新房</a></li>           
		<li ><a href="/hjf/">海景房</a></li>    
		<li ><a href="/bieshu/">别墅</a></li>
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
          <a class="search-btn" href="javascript:;" onclick="seachWord()" style="background: url(/public/static/home/image/icons_v5.png) 12px -20px no-repeat"></a>          
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
<script type="text/javascript" src="/public/static/home/js/article/common.js"></script>
<script type="text/javascript" src="/public/static/home/js/article/jquery.cookie.js"></script>
<script type="text/javascript" src="/public/static/home/js/jquery.lazyload.js"></script>
<script type="text/javascript" src="/public/static/home/js/jquery.SuperSlide.2.1.1.js"></script> 
<script type="text/javascript" src="/public/static/home/js/index.js"></script>
<!-- 公共底部 end -->


﻿<!-- 图片懒加载 -->
<script src="/public/static/home/js/echo.min.js"></script>
<script>Echo.init({offset: 0,throttle: 0});</script>
<style type="text/css">
.Telescopic{position:fixed;width:128px;right:40px;bottom:40%}
.wx{width:128px;height:96px;background:url(/public/static/home/image/v2.0/saoma.png) no-repeat}
</style>
<script src="../public/static/layui/layui.js"></script>
<script type="text/javascript">
var seach_bb_dd_aa = '';
// 展开类型
$('#open').click(function () {
	$(this).children('i').toggleClass("down");// 图标
	$('#characteristic').toggleClass("last");
});

// 条件参数拼装
$('.param-item').children('span').each(function(a,i){
	var dat = $(this).children('a').attr('data');	// 当前值
	var str = $(this).children('a').attr('key');	// 历史地址
	$(this).children('a').attr('href', Dump(str, dat, true));
});

// 排序参数拼装
$('.house-info-right').children('span').children('a').click(function () {
	var key  = $(this).attr('key');
	var data = $(this).attr('data');
	if (key == 'def') Dump('<?php echo $gc;?>', 'x0', false);	// 默认排序
	if (key == 'pic') Dump('<?php echo $gc;?>', 'x1', false);
	if (key == 'kpr') Dump('<?php echo $gc;?>', 'x3', false);
	if (key == 'brs') Dump('<?php echo $gc;?>', 'x5', false);
	//连续点击同样的排序
	if (key == 'pic' && data == '1') Dump('<?php echo $gc;?>', 'x2', false);
	if (key == 'kpr' && data == '3') Dump('<?php echo $gc;?>', 'x4', false);
	if (key == 'brs' && data == '5') Dump('<?php echo $gc;?>', 'x6', false);
});

// 自定义价格查询
$('#price').click(function () {
	var pmin = $('input[name="min"]').val();
	var pmax = $('input[name="max"]').val();
	Dump('<?php echo $gc;?>', 'p'+pmin+','+pmax, false);
});

// 优惠
$('.house-type-left').children('a').click(function () {
	var key  = $(this).attr('key');
	var data = $(this).attr('data');
	Dump(key, data, false);
});


// 分页
layui.use('laypage', function(){
	var laypage = layui.laypage;
	laypage.render({
		elem: 'page-demo'
		,count: '<?php echo $result["total"];?>'
		,limit:10
		,first: '首页'// 显示首页按钮
		,last: '尾页'// 显示尾页按钮
		,curr:	'<?php echo $page;?>'// 当前页
		,theme: '#efefef'
		,jump: function(obj, first) {
			if (obj.curr != '<?php echo $page;?>') {
				Dump('<?php echo $gc;?>', 'o' + obj.curr, false);
			}
		}
	});
});

// 鼠标经过扫码拨号事件
$(".hover").hover(function () {
  $(".qrcode",this).show();
}, function () {
  $(".qrcode",this).hide();
});

// 鼠标经过价格事件
$(".buiding-list").children('ul').children('li').hover(function () {
  $(".tel-code",this).show();
}, function () {
  $(".tel-code",this).hide();
});

// 滚动随屏
$(window).scroll(function (){
	var height = $(this).scrollTop();
	var build_height = $('.buiding-list').height();
	
	if(height >= 1367 && height <= 2850 && build_height >= 2400){
		$('.follow').css({
			"top":"70px",
			"width":"248px",
			"padding":"15px",
			"position":"fixed",
			"margin-left":"-15px",
			"border":"1px solid #d1d1d1"
		});
		$('.build-nav li').eq(2).hide();
		$('.build-nav').css({"margin-bottom":"0"});
		$('.build-nav li').eq(1).css({"margin-bottom":"0","border-bottom":"0"});
	}else{
		$('.build-nav li').eq(2).show();
		$('.follow').removeAttr('style');
		$('.build-nav').removeAttr('style');
		$('.build-nav li').eq(1).removeAttr('style');
	}
});

// 跳转伪静态
function Dump(str,dat,rtn){
	//转换数组
	var arr = str.split('_');
	for(var i in arr){
		// 去掉重复参
		if(arr[i][0] == dat[0]) arr.splice($.inArray(arr[i],arr),1);
	}
	
	if(dat!='o1'&&dat!='c0'&&dat!='p0'&&dat!='h0'&&dat!='z0'&&dat!='t0'&&dat!='x0'&&dat!='p,'&&dat!='s'&&dat!='p0,0') arr.push(dat);// 不拼装'不限'选项
	var href = arr.join('_');
	if(href.substr(0,1) == '_') href=href.substr(1);// 去掉第一位'_'字符
	
	// 是否需要返回
	if(rtn == true){
		// 再次切割组装筛选初始化分页
		var arr2 = href.split('_');
		for(var j in arr2){
			// 去掉分页页码复参
			if(arr2[j][0] == 'o') arr2.splice($.inArray(arr2[i],arr2),1);
		}

		var href2 = arr2.join('_');

		return '<?php echo $site;?>loupan/' + href2;
	}else{
		// 直接点击嵌上跳转
		window.location.href = '<?php echo $site;?>loupan/' + href;
	}
}
//顶部随屏
$(function(){    
    if($(".page-menu").length == 0 && $(".header-outer").length == 0){
        $(window).scroll(function(){
            var height = $(document).scrollTop();
            var headerHeight = $(".header").height();
            if(height > headerHeight){
                $('.header2').fadeIn('slow',function(){
                    $(this).css('display','block');
                });
            }else{
                $('.header2').fadeOut('slow',function(){
                    $(this).css('display','none');
                });
            }
        });
    }
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

<script src="/js/qrcode.min.js"></script>

<script>	
function makeCode(id,w,h,url) {		
	var qrcode = new QRCode(document.getElementById(id), {
		width : w,
		height : h
	});
	qrcode.makeCode(url);
}
	<?php foreach($rowlist as $k=>$list){?>
		makeCode('hntel<?php echo $k+1;?>',100,100,'<?php echo $site;?>dacall.php?lpid=<?php echo $list['id'];?>');
	<?php }?>
	
<?php
if($result["total"]==0){

 foreach($rowlistrm as $k=>$listrm){?>
		makeCode('hntel<?php echo $k+1;?>',100,100,'<?php echo $site;?>dacall.php?lpid=<?php echo $listrm['id'];?>');
	<?php }
}
	?>

</script>
<?php include("../bottom.php");?>
</body>
</html>
<?php include("../sq.php");?>