<?php
session_start();
include("../../conn/conn.php");
include("../function.php");

$pid = isset($_GET['pid']) ? intval($_GET['pid']) : '28';
$path = $_GET['path'] ? $_GET['path'] : '0-5';
$key = $_GET['key'] ? $_GET['key'] : '';

if($pid){
$row = $mysql->query("select * from `web_srot` where `id`='$pid'");
//print_r($row);
$flname=$row[0]['title'];
$ccontent=$row[0]['content'];
$path=$row[0]['path'];
$sql=" and `pid`='{$pid}'";
}
if($pid==28){
$sql.=" and `city_id`='{$sitecityid}'";
	}
$fl=$path;

if($key){
$sql.=" and `title` like '%{$key}%'";
}
$patharr=explode('-',$path);
$row2 = $mysql->query("select * from `web_srot` where `id`='{$patharr[1]}'");
//print_r($row);
$flname2=$row2[0]['title'];


$page = isset($_GET['page']) ? intval($_GET['page']) : 1;  
$page_num =10;
$offset = ($page-1)*$page_num;
$rsc = $mysql->query("select count(*) as count from `web_content` where `path`='{$path}' {$sql}");
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/$page_num);
$offset = $offset-10;
$rowshow = $mysql->query("select * from `web_content` where `path`='$path' {$sql} order by addtime desc limit $offset,$page_num");
//echo "select * from `web_content` where `path`='$path' {$sql} order by px desc,addtime desc limit $offset,$page_num";
foreach($rowshow as $k=>$list){
	
	if($list['pid']==28){
						$url="/m/loupan/news_show/{$list['id']}.html";
						}else{
							$url="/m/news/show_{$list['id']}.html";
							}
	//
		 echo '<div class="videotex">
                    <a  href="'.$url.'" class="news ">
                        <div class="con-frme">
                            <p class="tit ">'.$list['title'].'</p>
                            <p class="sub m5">
                                <span>'.date('Y-m-d',strtotime($list['addtime'])).'</span>
                            </p>
                        </div>                      
                    </a>
                </div>';
	//
	/*	 $arr[$k]['itemid']=8350;		
		 $arr[$k]['title']="阳光椰风苑";	
		 $arr[$k]['thumb']="http:\/\/cdn.lou86.com\/public\/uploads\/2018-06\/08\/05c61ba1dfa4415df54690b7c9b1e69d.jpg";	
		 $arr[$k]['hits']=660;
		 $arr[$k]['address']="定安县塔岭新区见龙大道";
		 $arr[$k]['price']="10600元\/㎡";
		 $arr[$k]['status']="在售";		
		 $arr[$k]['type']="<span class=\"tag-1\">养老居所<\/span><span class=\"tag-2\">高性价比<\/span><span class=\"tag-3\">普通住宅<\/span>";
		 $arr[$k]['url']="http:\/\/m.lou86.com\/hk\/lp\/8350.html";
		 $arr[$k]['dw']="均价：";		
		 $arr[$k]['yh_news']="建面133-150平 均价10600元\/平现房 ";
		 $arr[$k]['yhurl']="\/hk\/lpyh\/8350-1.html";	
		 $arr[$k]['tgbm']=354;
		 $arr[$k]['video_thumb']="";*/
		
						
}
/*$jsonobj = json_encode($arr);
echo $jsonobj;*/
exit;