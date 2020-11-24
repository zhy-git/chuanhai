<?php
session_start();
include("../conn/conn.php");
$action = $_POST["action"];
header('Content-type:text/json'); 
$data=array();
$keys=$_GET['keys'];
$pid=$_GET['pid'];
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$sql="WHERE `pid`='{$pid}' ";

if($keys!=""){
	$sql.=" and `title` like '%{$keys}%'";
	}
//print_r($_GET);
//echo $page;
if($page==0){
	$page=1;
	}

$page_num =12;
$offset = ($page-1)*$page_num;
$rsc = $mysql->query("select count(*) as count from `web_content` {$sql}");// WHERE `adminid`='{$_SESSION['admin_id']}'
//echo "select count(*) as count from `oa_client` {$sql}";
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/$page_num);
$row = $mysql->query("select * from `web_content` {$sql} order by id desc limit $offset,$page_num");// WHERE `adminid`='{$_SESSION['admin_id']}'
//echo "select * from `oa_client` {$sql} order by id desc limit $offset,$page_num";
if($result["total"]==0){
	
	}else{
		$i=1;
		$data['msg']='ok';
		$data['html']='';
		foreach($row as $list){
			if($i==2){$lv="tr2";$i=1;}else{$lv="";}
			 $flag='';
			  $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='1' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $list['flag'])){
					$flag.='<font color="'.$listflag['color'].'">['.$listflag['flag'].'] </font>';
				}
			}
			 $flagztz='';
			  $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='8' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $list['ztz'])){
					$flagztz.='<font color="'.$listflag['color'].'">['.$listflag['flag'].'] </font>';
				}
			}
			 $flaglp='';
			  $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='2' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $list['flaglp'])){
					$flaglp.='<font color="'.$listflag['color'].'">['.$listflag['flag'].'] </font>';
				}
			}
			$rowcity = $mysql->query("select * from `web_city` where `id`='{$list['city_id']}'");
			$rowcity2 = $mysql->query("select * from `web_city` where `id`='{$list['city2_id']}'");
			if($list['esfzt']==1){
				$esfzt='<font color="#FF0000">出租中</font>';
				}else{
					$esfzt='<font color="#009900">已租出</font>';
					}
			$data['html'].='<tr class="tr '.$lv.'" style="">
					<td><input name="one" class="shanchu" value="'.$list[id].'" alt="'.$list[title].'" type="checkbox"></td>
					<td style="text-align:left;">
					<table width="100%" border="0" style="background:#FFF;">
					  <tr>
						<td rowspan="3" style="width:130px;padding:0px;text-align:center;"><img src="/'.$list[img].'" width="120" height="89"></td>
						<td style="padding:5px 0px;"><a style="color:#0CF; font-size:18px; " href="zf_add.php?id='.$list[id].'&pid='.$list[pid].'">'.$list[title].'</a>'.$flag.' '.$flagztz.'</td>
						<td style="width:15%;">租金：'.$list[tuanprice].'元/月</td>
						<td style="padding:5px 0px;width:25%;" align="center">'.$rowcity[0][city_name].'</td>
					  </tr>
					  <tr>
						<td style="padding:5px 0px;">户型：'.$list[esfhx1].'室'.$list[esfhx2].'厅'.$list[esfhx3].'厨'.$list[esfhx4].'卫'.$list[esfhx5].'阳台</td>
						<td>出租面积：'.$list[jzmj].'</td>
						<td style="padding:0px;" align="center">状态：'.$esfzt.'</td>
					  </tr>
					  <tr>
						<td style="padding:5px 0px;" colspan="2">小区名称：'.$list[sldz].'　小区地址：'.$list[xmdz].'</td>
						<td style="padding:0px;"></td>
					  </tr>
					</table>
					</td>
					<td><a href="zf_add.php?id='.$list[id].'&pid='.$list[pid].'" target="c" class="ceditor" style=" margin-right:5px;">详细信息</a></td>
					</tr>';
			$i++;
			}
		}
		
		$pagess="<span class='form_page'>{$page}/{$total} 页   {$result['total']} 条记录";
		$pagess.="<a class='pn' href='1' >首页</a>";
		if($page>1){ $pagess.="<a class='page_num' href='".($page-1)."'>&lt;</a>";}
		if($total>=10){
			
			for ($i=1; $i<=$total; $i++) {
				if($page<$i+10 && $page>$i-10){
						if($page==$i){ $pagess.="<span >{$i}</span>";}else{$pagess.="<a class='page_num' href='{$i}'>{$i}</a>";}
                    }
				}
			}else{
					for ($i=1; $i<=$total; $i++) {
						if($page==$i){ $pagess.="<span >{$i}</span>";}else{$pagess.="<a class='page_num' href='{$i}'>{$i}</a>";}
                    }
				}
			if($page<$total){$pagess.="<a class='page_num' href='".($page+1)."'>&gt;</a>";}
			$pagess.="<a class='pn' href='{$total}' >尾页</a>";
			$pagess.="<input type='text' id='input' style=' width:40px;'><input type='button' value='GO' id='GO'></span>";
		$data['page']=$pagess;
		echo json_encode($data);
		exit();
