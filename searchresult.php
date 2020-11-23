<?php
include("conn/conn.php");
header('Content-type:text/json'); 
function cityname($city_id) {
	global $mysql;
    $cityname = $mysql->query("select * from `web_city` where `id`='{$city_id}' limit 0,1");
    return $cityname[0]['city_name'];
}
$all=array();
$title=$_GET['title'];
$all['code']=200;
$all['msg']='成功';
$all['data']=array();
if($title<>''){

		$row = $mysql->query("select * from `web_content` where `pid`='9' and `title` like '%{$title}%' order by px desc limit 0,10");// and `city_id`='57'
		if($row[0]<>''){
		foreach($row as $k=>$list){
			$all['data'][$k]['name']="{$list['title']}";
			$all['data'][$k]['id']="{$list['id']}";
			$all['data'][$k]['sale_price']="{$list['jj_price']}";
			$all['data'][$k]['city_name']=cityname($list['city_id']);
			$all['data'][$k]['price_unit']="元/㎡";
		}
		echo json_encode($all);
		exit();
		}else{
			$all['code']=300;
			$all['msg']='暂无数据';
			$all['data']='';
			echo json_encode($all);
			exit();
			}
}else{
	$all['code']=300;
	$all['msg']='暂无数据';
	$all['data']='';
	echo json_encode($all);
	exit();
	}

//{"code":200,"msg":"成功","data":[{"name":"海南臻园","id":"1926","sale_price":"37000","city_name":"万宁市","price_unit":"元/㎡"},{"name":"海南绿地城","id":"1674","sale_price":null,"city_name":"海口市","price_unit":"元/㎡"},{"name":"海南佰悦湾","id":"6366","sale_price":"21000","city_name":"琼海市","price_unit":"元/㎡"},{"name":"海南民生凤凰城","id":"6342","sale_price":"9900","city_name":"定安县","price_unit":"元/㎡"},{"name":"海南保亭奥兰花园","id":"4868","sale_price":null,"city_name":"保亭县","price_unit":"元/㎡"},{"name":"海南天九养生文化城","id":"4867","sale_price":null,"city_name":"定安县","price_unit":"元/㎡"},{"name":"海南福里","id":"4292","sale_price":"13000","city_name":"澄迈县","price_unit":"元/㎡"},{"name":"海南恒大御景湾","id":"4282","sale_price":"15000","city_name":"澄迈县","price_unit":"元/㎡"},{"name":"海南水岸名都","id":"4256","sale_price":"10000","city_name":"儋州市","price_unit":"元/㎡"},{"name":"海南天鹅湾","id":"4236","sale_price":"26000","city_name":"海口市","price_unit":"元/㎡"},{"name":"海南金城帝景广场","id":"4014","sale_price":"12825","city_name":"澄迈县","price_unit":"元/㎡"},{"name":"海南美浪湾欧洲农庄","id":"4013","sale_price":"60","city_name":"澄迈县","price_unit":"万/套"},{"name":"海南生态软件园明月居","id":"3669","sale_price":null,"city_name":"澄迈县","price_unit":"元/㎡"},{"name":"海南生态智慧新城","id":"3664","sale_price":null,"city_name":"澄迈县","price_unit":"元/㎡"},{"name":"海南大公馆","id":"3599","sale_price":null,"city_name":"海口市","price_unit":"元/㎡"},{"name":"西岸香舍海南印象","id":"3545","sale_price":"0","city_name":"澄迈县","price_unit":""},{"name":"海南冯家湾椰风海韵","id":"3467","sale_price":null,"city_name":"文昌市","price_unit":"元/㎡"},{"name":"金地海南自在城","id":"3292","sale_price":"13800","city_name":"海口市","price_unit":"元/㎡"},{"name":"海南生生国际购物中心","id":"3195","sale_price":"20000","city_name":"海口市","price_unit":"元/㎡"},{"name":"海南大厦","id":"3178","sale_price":null,"city_name":"海口市","price_unit":"元/㎡"},{"name":"海南大溪地住宅小区","id":"3175","sale_price":null,"city_name":"白沙县","price_unit":"元/㎡"},{"name":"海南奥兰花园","id":"2155","sale_price":"0","city_name":"保亭县","price_unit":"元/㎡"},{"name":"IFC海南国际度假村","id":"2127","sale_price":"15000","city_name":"琼海市","price_unit":"元/㎡"},{"name":"海南凯文清水湾度假公馆","id":"1858","sale_price":null,"city_name":"陵水县","price_unit":"元/㎡"},{"name":"海南之心和风兰庭","id":"1845","sale_price":"30000","city_name":"海口市","price_unit":"元/㎡"},{"name":"碧桂园海南之心","id":"1808","sale_price":"23000","city_name":"海口市","price_unit":"元/㎡"},{"name":"海南中基美域","id":"1806","sale_price":"14500","city_name":"海口市","price_unit":"元/㎡"}]}