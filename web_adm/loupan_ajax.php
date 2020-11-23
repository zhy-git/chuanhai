<?php
session_start();
include("../conn/conn.php");
$action = $_POST["action"];
header('Content-type:text/json'); 
$data=array();
$keys=$_GET['keys'];
$pid=$_GET['pid'];
$city_idbb=$_GET['city_id'];
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$sql="WHERE `pid`='{$pid}' ";

if($keys!=""){
	$sql.=" and `title` like '%{$keys}%'";
	}
if($city_idbb!=""){
	$sql.=" and `city_id` = '{$city_idbb}'";
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
$row = $mysql->query("select * from `web_content` {$sql} order by px desc,id desc limit $offset,$page_num");// WHERE `adminid`='{$_SESSION['admin_id']}'
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
			$rscount = $mysql->query("select count(*) as count from `web_pic` where `luopan_id`='{$list[id]}'");
			$newscount = $mysql->query("select count(*) as count from `web_content` where `lpid`='{$list[id]}' and `pid`='28'");
			if($pid==9){
				
			$newscountdp = $mysql->query("select count(*) as count from `web_content_dp` where `lpid`='{$list[id]}' and `pid`='83'");
			$newsldp = '<br /><br /><a href="loupan_dp.php?lpid='.$list[id].'&pid=83&page='.$page.'" target="c" class="ceditor" style=" margin-right:5px;">点评（'.$newscountdp[0]['count'].'）</a>';
				}
			$data['html'].='<tr class="tr '.$lv.'" style="">
					<td><input name="one" class="shanchu" value="'.$list[id].'" alt="'.$list[title].'" type="checkbox"></td>
					<td style="text-align:left;">
					<table width="100%" border="0" style="background:#FFF;">
					  <tr>
						<td rowspan="3" style="width:130px;padding:0px;text-align:center;"><img src="/'.$list[img].'" width="120" height="89"></td>
						<td style="padding:5px 0px;"><a style="color:#0CF; font-size:18px; " href="loupan_add.php?id='.$list[id].'&pid='.$list[pid].'&page='.$page.'&city_idbb='.$city_idbb.'">'.$list[title].'</a>'.$flag.' '.$flagztz.'</td>
						<td style="width:15%;">起价：'.$list[qj_price].'</td>
						<td style="padding:5px 0px;width:25%;" align="center">'.$rowcity[0][city_name].'</td>
					  </tr>
					  <tr>
						<td style="padding:5px 0px;">状态：'.$flaglp.'</td>
						<td>均价：'.$list[jj_price].'</td>
						<td style="padding:0px;">开盘时间：'.$list[kptime].'</td>
					  </tr>
					  <tr>
						<td style="padding:5px 0px;" colspan="2">地址：'.$list[xmdz].'</td>
						<td style="padding:0px;">交房时间：'.$list[jftime].'</td>
					  </tr>
					</table>
					</td>
					<td><a href="loupan_add.php?id='.$list[id].'&pid='.$list[pid].'&page='.$page.'&city_idbb='.$city_idbb.'" target="c" class="ceditor" style=" margin-right:5px;">详细信息</a><br /><br /><a href="loupan_pic.php?lpid='.$list[id].'&pid='.$list[pid].'&page='.$page.'" target="c" class="ceditor" style=" margin-right:5px;">相册（'.$rscount[0]['count'].'）</a><br /><br /><a href="loupan_news.php?lpid='.$list[id].'&pid=28&page='.$page.'" target="c" class="ceditor" style=" margin-right:5px;">新闻（'.$newscount[0]['count'].'）</a>'.$newsldp.'</td>
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
