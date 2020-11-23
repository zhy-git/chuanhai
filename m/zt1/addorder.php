<?php
include("../../conn/conn.php");
header('Content-type:text/json'); 
$all=array();
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
	$str=str_replace("select","",$str);
	$str=str_replace("join","",$str);
	$str=str_replace("union","",$str);
	$str=str_replace("where","",$str);
	$str=str_replace("insert","",$str);
	$str=str_replace("delete","",$str);
	$str=str_replace("update","",$str);
	$str=str_replace("like","",$str);
	$str=str_replace("drop","",$str);
	$str=str_replace("create","",$str);
	$str=str_replace("modify","",$str);
	$str=str_replace("rename","",$str);
	$str=str_replace("alter","",$str);
	$str=str_replace("cas","",$str);
	$str=str_replace("&","",$str);
	$str=str_replace(">","",$str);
	$str=str_replace("<","",$str);
	$str=str_replace(" ",chr(32),$str);
	$str=str_replace(" ",chr(9),$str);
	$str=str_replace("    ",chr(9),$str);
	$str=str_replace("&",chr(34),$str);
	$str=str_replace("'",chr(39),$str);
	$str=str_replace("<br />",chr(13),$str);
	$str=str_replace("''","",$str);
	$str=str_replace("css","",$str);
	$str=str_replace("CSS","",$str);
	return $str;
}
function cityname($city_id) {
	global $mysql;
    $cityname = $mysql->query("select * from `web_city` where `id`='{$city_id}' limit 0,1");
    return $cityname[0]['city_name'];
}

function lpname($lpid) {

	global $mysql;

    $lpname = $mysql->query("select * from `web_content` where `id`='{$lpid}' limit 0,1");

    return $lpname[0]['title'];

}
	$city=$_GET['id'];
	//type=26&house_title=&house_id=&memo=%E7%A7%BB%E5%8A%A8%E9%87%91%E4%B9%9D%E9%93%B6%E5%8D%81&type_name=%E7%A7%BB%E5%8A%A8%E9%87%91%E4%B9%9D%E9%93%B6%E5%8D%81&site_id=1&model=house&name=1232&phone=15122225555
//$all['code']=200;
//$all['msg']='提交成功';
	$lpid=lib_replace_end_tag($_POST['lpid']);
	$pid=lib_replace_end_tag($_POST['type']);
	$uname=lib_replace_end_tag($_POST['name']);
	$usex=lib_replace_end_tag($_POST['usex']);
	$utel=lib_replace_end_tag($_POST['phone']);
	$utitle=lib_replace_end_tag($_POST['utitle']);
	$ucontent=lib_replace_end_tag($_POST['ucontent']);
	$intention_city=lib_replace_end_tag($_POST['intention_city']);
	$intention_housetype=lib_replace_end_tag($_POST['intention_housetype']);
	
	$country=lib_replace_end_tag($_POST['country']);
	$cityname=lib_replace_end_tag($_POST['cityname']);
	$huxing=lib_replace_end_tag($_POST['huxing']);
	$yixiang=lib_replace_end_tag($_POST['yixiang']);
	$info=lib_replace_end_tag($_POST['info']);
	$jiage=lib_replace_end_tag($_POST['jiage']);
	
	$yusuan=$_POST['yusuan'];
	$ly=$_POST['memo'];
	$addtime=date('Y-m-d H:i:s');
	
	if(preg_match("/^1[34578]{1}\d{9}$/",$utel)){
	}else{
		$all['msg']='请填写正确的手机号码';
		echo json_encode($all);
		exit();
	}
	
	

	if($intention_city<>""){
		$ucontent.='　意向区域:'.lib_replace_end_tag($intention_city);
		}
	if($cityname<>""){
		$ucontent.='　意向区域:'.$cityname;
		}
	if($huxing<>""){
		$ucontent.='　意向户型:'.$huxing.$yixiang.$info;
		}
	if($jiage<>""){
		$ucontent.='　意向价格:'.$jiage;
		}
	if($intention_housetype<>""){
		$ucontent.='　意向户型:'.lib_replace_end_tag($intention_housetype);
		}
	if($yusuan<>""){
		$ucontent.='　预算:'.lib_replace_end_tag($yusuan);
		}
	if($ly<>""){
		$ucontent.='　提交来源:'.lib_replace_end_tag($ly);
		}
		
		$mysql->query("insert into `web_book`(
		`pid`,
		`lpid`,
		`uname`,
		`usex`,
		`utel`,
		`utitle`,
		`ucontent`,
		`addtime`
		) values (
		'{$pid}',
		'{$lpid}',
		'{$uname}',
		'{$usex}',
		'{$utel}',
		'{$utitle}',
		'{$ucontent}',
		'{$addtime}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			
			
				
			$all['status']=1;
			$all['msg']='提交成功';
			echo json_encode($all);
			exit();
			}else{
				$all['status']=2;
			$all['code']=300;
			$all['msg']='提交失败';
			echo json_encode($all);
			exit();
			}
		echo json_encode($all);
		exit();
