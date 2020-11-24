<?php
session_start();
include("../conn/conn.php");
$action = $_POST["action"];
header('Content-type:text/json'); 
$data=array();
$keys=$_GET['keys'];
$pid=$_GET['pid'];
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;
$city_id = $_GET['city_id'];

//$sql="WHERE  1=1";//

/*if($keys!=""){
	$sql.=" and `title` like '%{$keys}%'";
	}*/
if($city_id!=""){
    $sql="WHERE `city_id` = '{$city_id}'";
}
//print_r($_GET);
//echo $page;
if($page==0){
	$page=1;
	}

$page_num =12;
$offset = ($page-1)*$page_num;
$rsc = $mysql->query("select count(*) as count from `web_fjzs` {$sql}");// WHERE `adminid`='{$_SESSION['admin_id']}'
//echo "select count(*) as count from `oa_client` {$sql}";
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/$page_num);
$row = $mysql->query("select * from `web_fjzs` {$sql} order by id desc limit $offset,$page_num");// WHERE `adminid`='{$_SESSION['admin_id']}'

/*echo "select * from `web_fjzs` {$sql} order by id desc limit $offset,$page_num";
exit;*/


if($result["total"]==0){
	
	}else{
		$i=1;
		$data['msg']='ok';
		$data['html']='';
		foreach($row as $list){
            if(!$city_id) {
                $rowcity = $mysql->query("select * from `web_city` where `id`='{$list['city_id']}'");
            }else{
                $rowcity = $mysql->query("select * from `web_city` where `id`='{$city_id}'");
            }
			if($i==2){$lv="tr2";$i=1;}else{$lv="";}


			$data['html'].='<tr class="tr '.$lv.'" style="">
					<td><input name="one" class="shanchu" value="'.$list[id].'" alt="'.$rowcity[0][city_name].'" type="checkbox"></td>
					<td style="text-align:left;"><a style="" href="zs_add.php?id='.$list[id].'&pid='.$list[pid].'">'.$rowcity[0][city_name].'</a></td>
					<td>'.$list[addtime].'</td>
					<td>'.$list[price].'</td>
					<td>'.$list[price2].'</td>
					<td><a href="zs_add.php?id='.$list[id].'&pid='.$list[pid].'" target="c" class="ceditor" style=" margin-right:5px;">详情</a></td>
					</tr>';
			$i++;
			}
		}
		
		$pagess="<span class='form_page'>{$page}/{$total} 页   {$result['total']} 条记录";
		if($page>1){ $pagess.="<a class='page_num' href='".($page-1)."'>&lt;</a>";}
					for ($i=1; $i<=$total; $i++) {
						if($page==$i){ $pagess.="<span >{$i}</span>";}else{$pagess.="<a class='page_num' href='{$i}'>{$i}</a>";}
                    }
					
					 if($page<$total){$pagess.="<a class='page_num' href='".($page+1)."'>&gt;</a>";}
					 $pagess.="<a class='pn' href='{$total}' >尾页</a>";
					 $pagess.="<input type='text' id='input' style=' width:40px;'><input type='button' value='GO' id='GO'></span>";
		$data['page']=$pagess;
		echo json_encode($data);
		exit();
