<?php
//网站配置
$row=$mysql->query("select * from web_config where id='1'");
$config=$row[0];

$shangqiao="{$config['info2']}";

// 替换HTML尾标签
function lib_replace_end_tag($str)
{
if (empty($str)) return false;
$str = htmlspecialchars($str);
$str = str_replace( '/', "", $str);
$str = str_replace("", "", $str);
$str = str_replace("&gt", "", $str);
$str = str_replace("&lt", "", $str);
$str = str_replace("<SCRIPT>", "", $str);
$str = str_replace("</SCRIPT>", "", $str);
$str = str_replace("<script>", "", $str);
$str = str_replace("</script>", "", $str);
$str=str_replace("select","select",$str);
$str=str_replace("join","join",$str);
$str=str_replace("union","union",$str);
$str=str_replace("where","where",$str);
$str=str_replace("insert","insert",$str);
$str=str_replace("delete","delete",$str);
$str=str_replace("update","update",$str);
$str=str_replace("like","like",$str);
$str=str_replace("drop","drop",$str);
$str=str_replace("create","create",$str);
$str=str_replace("modify","modify",$str);
$str=str_replace("rename","rename",$str);
$str=str_replace("alter","alter",$str);
$str=str_replace("cas","cast",$str);
$str=str_replace("&","&",$str);
$str=str_replace(">",">",$str);
$str=str_replace("<","<",$str);
$str=str_replace(" ",chr(32),$str);
$str=str_replace(" ",chr(9),$str);
$str=str_replace("    ",chr(9),$str);
$str=str_replace("&",chr(34),$str);
$str=str_replace("'",chr(39),$str);
$str=str_replace("<br />",chr(13),$str);
$str=str_replace("''","'",$str);
$str=str_replace("css","'",$str);
$str=str_replace("CSS","'",$str);

return $str;

}

function GetUrlToDomain($domain) {
    $re_domain = '';
    $domain_postfix_cn_array = array("com", "net", "org", "gov", "edu", "com.cn", "cn");
    $array_domain = explode(".", $domain);
    $array_num = count($array_domain) - 1;
    if ($array_domain[$array_num] == 'cn') {
        if (in_array($array_domain[$array_num - 1], $domain_postfix_cn_array)) {
            $re_domain = $array_domain[$array_num - 2] . "." . $array_domain[$array_num - 1] . "." . $array_domain[$array_num];
        } else {
            $re_domain = $array_domain[$array_num - 1] . "." . $array_domain[$array_num];
        }
    } else {
        $re_domain = $array_domain[$array_num - 1] . "." . $array_domain[$array_num];
    }
    return $re_domain;
}
//城市名
function cityname($city_id) {
	global $mysql;
    $cityname = $mysql->query("select * from `web_city` where `id`='{$city_id}' limit 0,1");
    return $cityname[0]['city_name'];
}
function cityallid($city_id) {
	global $mysql;
    $cityallid = $mysql->query("select * from `web_city` where `id`='{$city_id}' limit 0,1");
    return $cityallid[0]['pid'];
}
//特色
function loupanflagts($ts,$fl) {
	global $mysql;
    $row = $mysql->query("select * from `web_flag` where `flag_fl`='{$fl}'");
	foreach($row as $list){
		if(preg_match("#".$list['flag_bm']."#", $ts)){
		$tsname.='<samp style=" border:#C1C1C1 solid 1px;background:'.$list['color'].';">'.$list['flag'].'</samp>';
		}
	}
    return $tsname;
}
function loupanflagtsi2($ts,$fl,$nums) {
	global $mysql;
    $row = $mysql->query("select * from `web_flag` where `flag_fl`='{$fl}'");
	$i=0;
	foreach($row as $k=>$list){
		if(preg_match("#".$list['flag_bm']."#", $ts) && $i<=$nums){
			$i=$i+1;
		$tsname.='<span class="tag-'.($i).'">'.$list['flag'].'</span>';
		}
	}
    return $tsname;
}

//特色
function loupanflagts2($ts,$fl) {
	global $mysql;
    $row = $mysql->query("select * from `web_flag` where `flag_fl`='{$fl}'");
	foreach($row as $list){
		if(preg_match("#".$list['flag_bm']."#", $ts)){
		$tsname.='<samp style=" border:'.$list['color'].' solid 1px;color:'.$list['color'].';">'.$list['flag'].'</samp>';
		}
	}
    return $tsname;
}
//特色
function loupanflagts4($ts,$fl) {
	global $mysql;
    $row = $mysql->query("select * from `web_flag` where `flag_fl`='{$fl}'");
	$i=0;
	foreach($row as $list){
		if(preg_match("#".$list['flag_bm']."#", $ts) and $i<3){
			$i=$i+1;
		$tsname.='<samp class="cc'.$i.'">'.$list['flag'].'</samp>';
		}
	}
    return $tsname;
}

//特色
function loupanflagts6($ts,$fl) {
	global $mysql;
    $row = $mysql->query("select * from `web_flag` where `flag_fl`='{$fl}'");
	$i=0;
	foreach($row as $list){
		if(preg_match("#".$list['flag_bm']."#", $ts) and $i<3){
			$i=$i+1;
		$tsname.='<span class="s'.$i.'">'.$list['flag'].'</span>';
		}
	}
    return $tsname;
}

//特色
function loupanflagtsw($ts,$fl) {
	global $mysql;
    $row = $mysql->query("select * from `web_flag` where `flag_fl`='{$fl}'");
	$i=0;
	foreach($row as $list){
		if(preg_match("#".$list['flag_bm']."#", $ts) and $i<3){
			$i=$i+1;
		$tsname.=''.$list['flag'].'、';
		}
	}
    return $tsname;
}
//特色
function loupanflagts3($ts,$fl) {
	global $mysql;
    $row = $mysql->query("select * from `web_flag` where `flag_fl`='{$fl}'");
	foreach($row as $list){
		if(preg_match("#".$list['flag_bm']."#", $ts)){
		$tsname.='<samp >'.$list['flag'].'</samp>';
		}
	}
    return $tsname;
}
//特色
function loupanflagzx($ts,$fl) {
	global $mysql;
    $row = $mysql->query("select * from `web_flag` where `flag_fl`='{$fl}'");
	foreach($row as $list){
		if(preg_match("#".$list['flag_bm']."#", $ts)){
		$tsname.=''.$list['flag'].'';
		}
	}
    return $tsname;
}

//特色
function loupanflagid($id) {
	global $mysql;
    $row = $mysql->query("select * from `web_flag` where `id`='{$id}'");
	$tsname=''.$row[0]['flag'].'';
    return $tsname;
}
//特色
function loupanflag($fl,$ts) {

	global $mysql;

    $row = $mysql->query("select * from `web_flag` where `flag_bm`='{$fl}' and `flag_fl`='{$ts}'");
    return $row[0]['flag'];

}
//特色
function countxc($ts,$lpid) {
	global $mysql;
	if($ts=='all'){
    	$rsc = $mysql->query("select count(*) as count from `web_pic` where `luopan_id`='$lpid' and `pid_flag`<>'xc1'");
	}else{
    	$rsc = $mysql->query("select count(*) as count from `web_pic` where `luopan_id`='$lpid' and `pid_flag`='{$ts}'");
		}
    return  $rsc[0]['count'];
}
function countall($path) {
	global $mysql;
	$rsc = $mysql->query("select count(*) as count from `web_content` where `path`='$path'");
    return  $rsc[0]['count'];
}
function countlpnews($lpid) {
	global $mysql;
	$rsc = $mysql->query("select count(*) as count from `web_content` WHERE `pid`='28' and `lpid`='{$lpid}'");
    return  $rsc[0]['count'];
}
//楼盘名
function lpname($lpid) {
	global $mysql;
    $lpname = $mysql->query("select * from `web_content` where `id`='{$lpid}' limit 0,1");
    return $lpname[0]['title'];
}
function lmname($pid) {
	global $mysql;
    $lmname = $mysql->query("select * from `web_srot` where `id`='{$pid}' limit 0,1");
    return $lmname[0]['title'];
}
function pname($pid) {

	global $mysql;

    $pname = $mysql->query("select * from `web_srot` where `id`='{$pid}' limit 0,1");

    return $pname[0]['title'];

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


function loupanflagtsi3($ts,$fl,$nums) {
	global $mysql;
    $row = $mysql->query("select * from `web_flag` where `flag_fl`='{$fl}'");
	$i=1;
	foreach($row as $k=>$list){
		if(preg_match("#".$list['flag_bm']."#", $ts) && $i<=$nums){
			$i=$i+1;
		$tsname.=''.$list['flag'].'&nbsp;';
		}
	}
    return $tsname;
}
function loupanflagts86($ts,$fl) {
	global $mysql;
    $row = $mysql->query("select * from `web_flag` where `flag_fl`='{$fl}'");
	$i=0;
	foreach($row as $list){
		if(preg_match("#".$list['flag_bm']."#", $ts)){
			$i=$i+1;
		$tsname.='<span class="tag-'.$i.'">'.$list['flag'].'</span>';
		}
		if($i==3){
			break;
			}
	}
    return $tsname;
}
function loupanflagts86s($ts,$fl) {
	global $mysql;
    $row = $mysql->query("select * from `web_flag` where `flag_fl`='{$fl}'");
	$i=0;
	foreach($row as $list){
		if(preg_match("#".$list['flag_bm']."#", $ts)){
			//$i=$i+1;
		$tsname.='<span class="tag-'.$i.'">'.$list['flag'].'</span>';
		}
		//if($i==3){
		//	break;
		//	}
	}
    return $tsname;
}
function loupanflagts86s2($ts,$fl) {
	global $mysql;
    $row = $mysql->query("select * from `web_flag` where `flag_fl`='{$fl}'");
	$i=0;
	foreach($row as $list){
		if(preg_match("#".$list['flag_bm']."#", $ts)){
			//$i=$i+1;
		$tsname.='<span>'.$list['flag'].'</span>';
		}
		//if($i==3){
		//	break;
		//	}
	}
    return $tsname;
}


function countxc1($ts,$lpid) {
	global $mysql;
    	$rsc = $mysql->query("select count(*) as count from `web_pic` where `luopan_id`='$lpid' and `pid_flag`='xc1' and `pid_hx`='{$ts}'");
	
    return  $rsc[0]['count'];
}
function countsp($ts,$pid) {
	global $mysql;
    	$rsc = $mysql->query("select count(*) as count from `web_content` where `pid`='$pid' and `city_id`='{$ts}'");
	
    return  $rsc[0]['count'];
}


function sjgw() {

	global $mysql;
	$arr=array(); 
    $gw = $mysql->query("select * from `web_content` where `pid`='68'");
	foreach($gw as $k=>$gws){
		 $arr[] = $gws['id'];
	}
	$array=count($arr);
	$num=rand(0,$array-1);
    //return $num;
    return $arr[$num];

}
function countbook($where) {
	global $mysql;
	$rsc = $mysql->query("select count(*) as count from `web_book` {$where}");
    return  $rsc[0]['count'];
}

/*$site="http://".$_SERVER['HTTP_HOST']."/";
$sitem=$site.'m/';
//$site2=GetUrlToDomain($site);
$site2="http://www.".GetUrlToDomain($site);*/

$sitess="http://".$_SERVER['HTTP_HOST']."";
$site="http://".$_SERVER['HTTP_HOST']."/";

$sitem=$site.'m/';

$siteasd=GetUrlToDomain($sitess);


$url="http://".$_SERVER ['HTTP_HOST'].$_SERVER['PHP_SELF'];
preg_match("#http://(.*?)\.#i",$url,$match);
 
$pingyi=$match[1];



//图片正则
 function getImgs($content,$order='ALL'){
	    $pattern="/<img.*?src=[\'|\"](.*?(?:[\.gif|\.jpg]))[\'|\"].*?[\/]?>/";
	    preg_match_all($pattern,$content,$match);
	    if(isset($match[1])&&!empty($match[1])){
	        if($order==='ALL'){
	            return $match[1];
	        }
	        if(is_numeric($order)&&isset($match[1][$order])){
	            return $match[1][$order];
	        }
	    }
	    return '';
	}
//图片正则



$n = preg_match('/(.*\.)?\w+\.\w+$/', str_replace("/","",str_replace("http://","",$site)), $matches);
//echo rtrim($matches[1], '.');
$rscity = $mysql->query("select * from `web_city` where `city_pingyin`='".rtrim($matches[1],'.')."' limit 0,1");
$city_id=$rscity[0]['id'];

$rowc=$mysql->query("select * from web_city where `city_pingyin`='{$pingyi}'");
$cityr=$rowc[0];
$sitecitybid=$cityr['pid'];
$sitecityid=$cityr['id'];
$sitecityname=$cityr['city_name'];

?>
