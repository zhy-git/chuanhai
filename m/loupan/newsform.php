<?php
session_start();
include("../../conn/conn.php");
header('Content-type:application/json');
include("../function.php");

//print_r($_GET);
$houseid=$_GET['houseid'];
$key=$_GET['key'];
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$sql="WHERE `pid`='28' and `lpid`='{$houseid}' ";

if($key!=""){
	$sql.=" and `title` like '%{$key}%'";
	}
if($page==0){
	$page=1;
	}
$arr = array();
$page_num =10;
$offset = ($page-1)*$page_num;
$rsc = $mysql->query("select count(*) as count from `web_content` {$sql}");// WHERE `adminid`='{$_SESSION['admin_id']}'
//echo "select count(*) as count from `oa_client` {$sql}";
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/$page_num);
$row = $mysql->query("select * from `web_content` {$sql} order by id desc limit $offset,$page_num");// WHERE `adminid`='{$_SESSION['admin_id']}'
//echo "select * from `web_content` {$sql} order by id desc limit $offset,$page_num";
if($result["total"]==0){
	echo "<li align=center style='padding:10px;font-size:15px;border-bottom:dashed #ccc 1px'><h1>很抱歉,没有结果。</h1></li>";
	}else{
		foreach($row as $k=>$list){
			$url='/m/loupan/news_show/'.$list['id'].'.html';
$contents=mb_substr(strip_tags($list['content']),0,80,"utf-8");
$arr[$k]='<li id="'.$list['id'].'" class="hasign"><span class="spot"><i></i></span><div class="updates-time">'.date('Y年m月d日',strtotime($list['addtime'])).'</div> <a class="desc-show red" href="'.$url.'"><h2 class="updates-title">'.$list['title'].'</h2></a> <div class="updates-desc unfold">'.$contents.'...</div> <a class="desc-show red" href="'.$url.'">全文</a> </li>';
                    

		}
	}

	//
	
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
		
	
$jsonobj = json_encode($arr);
echo $jsonobj;
exit;