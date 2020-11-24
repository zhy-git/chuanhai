<?php
session_start();
include("../conn/conn.php");
$action = $_POST["action"];
header('Content-type:text/json'); 
$data=array();
$keys=$_GET['keys'];
$pid=$_GET['pid'];
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

// $sql="WHERE `pid`='{$pid}' ";
// if($keys!=""){
// 	$sql.=" and `title` like '%{$keys}%'";
// 	}
//print_r($_GET);
//echo $page;
if($page==0){
	$page=1;
	}
//楼盘名
// function lpname($lpid) {
// 	global $mysql;
//     $lpname = $mysql->query("select * from `web_content` where `id`='{$lpid}' limit 0,1");
//     return $lpname[0]['title'];
// }
$page_num =15;
$offset = ($page-1)*$page_num;
$rsc = $mysql->query("select count(*) as count from `web_ip`");// WHERE `adminid`='{$_SESSION['admin_id']}'
// echo "select count(*) as count from `oa_client` {$sql}";
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/$page_num);
$row = $mysql->query("select * from `web_ip` order by addtime desc limit $offset,$page_num");// WHERE `adminid`='{$_SESSION['admin_id']}'
//echo "select * from `oa_client` {$sql} order by id desc limit $offset,$page_num";
if($result["total"]==0){
	
	}else{
		$i=1;
		$data['msg']='ok';
		$data['html']='';
		foreach($row as $list){
			$equipment = $list['equipment'] == 1 ? '手机端' : 'PC端';
			$data['html'].='<tr class="tr '.$lv.'" style="">
					<td style="text-align:center;">'.$list[id].'</td>
					<td>'.$list[cip].'</td>
					<td>'.$list[cname].'</td>
					<td>'.$equipment.'</td>
					<td>'.$list[source].'</td>
					<td>'.$list[addtime].'</td>
					</tr>';
			$i++;
			}
		}
		
		$pagess="<span class='form_page'>{$page}/{$total} 页   {$result['total']} 条记录";
		$pagess.="<a class='page_num' href='1'>首页</a>";
		if($page>1){ $pagess.="<a class='page_num' href='".($page-1)."'>&lt;</a>";}
					for ($i=1; $i<=$total; $i++) {
						if ($total - 3 <= $page+1) {
							if($page>=$total - 3){}else{$pagess.="<span >".($page)."</span>";}
						}else{
							if($page==$i){ 
								$pagess.="<span >{$i}</span>";
							}else{
								$pagess.="<span >{$page}</span>";
							}
							   if($page<$total){$pagess.="<a class='page_num' href='".($page+1)."'>".($page+1)."</a>";}else{}
							   $pagess .= '....';
	                        }
	                    for($i = $total - 3; $i <= $total; $i++){
	                      if($page==$i){ $pagess.="<span >{$i}</span>";}else{$pagess.="<a class='page_num' href='{$i}'>{$i}</a>";}
	                    }
                    }
					 if($page<$total){$pagess.="<a class='page_num' href='".($page+1)."'>&gt;</a>";}
					 $pagess.="<a class='pn' href='{$total}' >尾页</a>";
					 $pagess.="<input type='text' id='input' style=' width:40px;'><input type='button' value='GO' id='GO'></span>";
		$data['page']=$pagess;
		echo json_encode($data);
		exit();
