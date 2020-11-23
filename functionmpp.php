<?php
//网站配置
$row=$mysql->query("select * from web_config where id='1'");
$config=$row[0];

$shangqiao='###';



// 替换HTML尾标签
function imgth($str)
{
if (empty($str)) return false;
$str = htmlspecialchars($str);
$str = str_replace( ".png", "", $str);
$str = str_replace( ".gif", "", $str);
$str = str_replace(".GIF", "", $str);
$str = str_replace(".PNG", "", $str);
$str = str_replace(".JPG", "", $str);
$str = str_replace(".jpg", "", $str);

return $str;

}


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

function getDistance($longitude1, $latitude1, $longitude2, $latitude2, $unit=2, $decimal=2){

    $EARTH_RADIUS = 6370.996; // 地球半径系数
    $PI = 3.1415926;

    $radLat1 = $latitude1 * $PI / 180.0;
    $radLat2 = $latitude2 * $PI / 180.0;

    $radLng1 = $longitude1 * $PI / 180.0;
    $radLng2 = $longitude2 * $PI /180.0;

    $a = $radLat1 - $radLat2;
    $b = $radLng1 - $radLng2;

    $distance = 2 * asin(sqrt(pow(sin($a/2),2) + cos($radLat1) * cos($radLat2) * pow(sin($b/2),2)));
    $distance = $distance * $EARTH_RADIUS * 1000;

    if($unit==2){
        $distance = $distance / 1000;
    }

    return round($distance, $decimal);

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
function countloupan($lpid) {
	global $mysql;
	$rsc = $mysql->query("select count(*) as count from `web_content` WHERE  `pid`='9' and `city_id`='{$lpid}' and `mapst`='1'");
    return  $rsc[0]['count'];
}
function countloupan2($lpid) {
	global $mysql;
	$rsc = $mysql->query("select count(*) as count from `web_content` WHERE  `pid`='9' and `cityall_id`='{$lpid}' and `mapst`='1'");
    return  $rsc[0]['count'];
}
function countloupanall() {
	global $mysql;
	$rsc = $mysql->query("select count(*) as count from `web_content` WHERE  `pid`='9' and `mapst`='1'");
    return  $rsc[0]['count'];
}
//楼盘名
function lpname($lpid) {
	global $mysql;
    $lpname = $mysql->query("select * from `web_content` where `id`='{$lpid}' limit 0,1");
    return $lpname[0]['title'];
}

function countbook($where) {
	global $mysql;
	$rsc = $mysql->query("select count(*) as count from `web_book` {$where}");
    return  $rsc[0]['count'];
}
$site="http://".$_SERVER['HTTP_HOST']."/";
$sitem=$site.'m/';
$site2=GetUrlToDomain($site);

$n = preg_match('/(.*\.)?\w+\.\w+$/', str_replace("/","",str_replace("http://","",$site)), $matches);
//echo rtrim($matches[1], '.');
$rscity = $mysql->query("select * from `web_city` where `city_pingyin`='".rtrim($matches[1],'.')."' limit 0,1");
$city_id=$rscity[0]['id'];

//电话
function telsee($tel) {
	global $config;
	if($tel<>""){
		return $tel;
		}else{
		return $config['company_tel'];
			}
}
//电话
function seokey($keyword) {
	global $config;
	if($keyword<>""){
		return $keyword;
		}else{
		return $config['site_keyword'];
			}
}
//电话
function seodesc($desc) {
	global $config;
	if($desc<>""){
		return $desc;
		}else{
		return $config['site_desc'];
			}
}
?>

