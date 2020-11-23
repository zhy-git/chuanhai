<?php
include("conn/conn.php");
//网站配置
$row=$mysql->query("select * from web_config where id='1'");
$config=$row[0];

$shangqiao='###';
//城市名
function cityname($city_id) {
	global $mysql;
    $cityname = $mysql->query("select * from `web_city` where `id`='{$city_id}' limit 0,1");
    return $cityname[0]['city_name'];
}

//电话
function telsee($tel) {
	global $config;
	if($tel<>""){
		return $tel;
		}else{
		return $config['company_tel'];
			}
}
//特色
function loupanflagts($ts,$fl) {
	global $mysql;
    $row = $mysql->query("select * from `web_flag` where `flag_fl`='{$fl}'");
	foreach($row as $list){
		if(preg_match("#".$list['flag_bm']."#", $ts)){
		$tsname.='<samp style=" border:'.$list['color'].' solid 1px;color:'.$list['color'].';">'.$list['flag'].'</samp>';
		}
	}
    return $tsname;
}

//url转化
function gourl($urls,$lpid) {
	global $mysql;
    $lpname = $mysql->query("select * from `web_content` where `id`='{$lpid}' limit 0,1");
	if($lpname[0]['pinyin']<>""){
		return $urls.'/'.$lpname[0]['pinyin'].'.html';
		}else{
    	return $urls.'-'.$lpid.'.html';
			}
}
$action = $_POST["action"];
header('Content-type:text/json'); 
$data=array();
$g=$_GET['g'];
$flagts=$_POST['city'];
$top=$_POST['top'];
$px=$_POST['px'];
if($g=='home2'){
		$data['status']='1';
		$data['html']='';
		$row = $mysql->query("select * from `web_content` where `pid`='9' and `flaglp` like '%{$flagts}%' order by px2 desc limit 0,{$top}");//
		foreach($row as $k=>$list){
		//$url=gourl('loupan/show',$list['id']);
		$url="loupan/show.php?lpid={$list['id']}";
			$data['html'].='<li class="box-img-one4">
							<a href="'.$url.'" target="_blank">
								<div class="hx-p-img4">
								   <img src="'.$list['img'].'" onerror="this.src=\'images/nopic.jpg\'" class="tab-img" alt="'.$list['title'].'" width="225" height="153">
									<p title="'.$list['title'].'">'.$list['title'].'</p>
								</div>
							</a>
							<div class="hx-p-txt4">
								<p>
									<span class="fl">
									<em class="orange">￥</em>
									<span class="s-orange f26">'.$list['jj_price'].'</span>元/m²</span>
									<span class="fr">
									   '.cityname($list['city_id']).'
									</span>
								</p>
								<div class="tsst1" style="height:20px; padding-top:0px;">
								   '.loupanflagts($list['flagts'],6).'
								</div>
							</div>
						</li>';
		}
		echo json_encode($data);
		exit();
	}

if($g=='home1'){
		$data['status']='1';
		$data['html']='';
		$row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id` = '{$flagts}' order by px1 desc limit 0,{$top}");//and `flag` like '%t1%'
		foreach($row as $k=>$list){
		//$url=gourl('loupan/show',$list['id']);
		$url="loupan/show.php?lpid={$list['id']}";
			$data['html'].='<li class="box-img-one">
							<a href="'.$url.'" target="_blank">
								<div class="hx-p-img">
								   <img src="'.$list['img'].'" onerror="this.src=\'images/nopic.jpg\'" class="tab-img" alt="'.$list['title'].'" width="225" height="153">
									<p title="'.$list['title'].'">'.$list['title'].'</p>
								</div>
							</a>
							<div class="hx-p-txt">
								<p>
									<span class="fl">
									<em class="orange">￥</em>
									<span class="s-orange f26">'.$list['jj_price'].'</span>元/m²</span>
									<span class="fr">
									   '.cityname($list['city_id']).'
									</span>
								</p>
								<p class="ptel">购房热线：'.telsee($list['loupan_tel']).'</p>
							</div>
						</li>';
		}
		echo json_encode($data);
		exit();
	}
if($g=='rslp'){
		$data['status']='1';
		$data['html']='<ul class="ind_cpzs_lb4"><li>';
		$row = $mysql->query("select * from `web_content` where `pid`='9'  and `city_id` = '{$flagts}' order by {$px} desc limit 0,{$top}");//and `flaglp` like '%lp2%'
		$i=1;
		foreach($row as $k=>$list){
		//$url=gourl('loupan/show',$list['id']); onclick="window.open('.$url.')" 
		$url="loupan/show.php?lpid={$list['id']}";
			$data['html'].='<div class="fj">
					<a href="'.$url.'" target="_blank" class="baise2"><img src="'.$site.$list['img'].'" alt="'.$list['title'].'" width="385" height="265" /><p class="p1">'.$list['title'].'<span style="float:right; ">'.$list['jj_price'].'<font color="#FFFFFF">元/m²</font></span></p><p class="p2">购房热线：'.$config['company_tel'].'<span style="float:right; "><font color="#FFFFFF">'.cityname($list['city_id']).'</font></span></p></a>
                    </div>';
						 if ($i==2 and $k<19){ $data['html'].='</li><li>'; $i=0;}
		$i=$i+1;
		}
		$data['html'].='</li></ul>';
		echo json_encode($data);
		exit();
	}
if($g=='rsth'){
		$data['status']='1';
		$data['html']='<ul class="ind_cpzs_lb4"><li>';
		$row = $mysql->query("select * from `web_content` where `pid`='9' order by {$px} desc limit 0,{$top}");//and `flaglp` like '%lp2%'
		$i=1;
		foreach($row as $k=>$list){
		//$url=gourl('loupan/show',$list['id']); onclick="window.open('.$url.')" 
		$url="loupan/show.php?lpid={$list['id']}";
			$data['html'].='<div class="fj">
					<a href="'.$url.'" target="_blank" class="baise2"><img src="'.$site.$list['img'].'" alt="'.$list['title'].'" width="385" height="265" /><p class="p1">'.$list['title'].'<span style="float:right; ">'.$list['jj_price'].'<font color="#FFFFFF">元/m²</font></span></p><p class="p2">购房热线：'.telsee($list['loupan_tel']).'<span style="float:right; "><font color="#FFFFFF">'.cityname($list['city_id']).'</font></span></p></a>
                    </div>';
						 if ($i==2 and $k<19){ $data['html'].='</li><li>'; $i=0;}
		$i=$i+1;
		}
		$data['html'].='</li></ul>';
		echo json_encode($data);
		exit();
	}