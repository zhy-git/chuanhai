<!DOCTYPE html>
<html lang="zh-cn">
<?php
session_start();
require("../conn/conn.php");
require("../function.php");
$lm=99;
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>团购_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>">
    
    <link href="/css/public.css" rel="stylesheet">
    <link href="/css/alert.css" rel="stylesheet">
    
<script type=text/javascript src="../js/jquery-1.8.0.min.js"></script>
<!--上公用-->


    <link href="/css/lp_list.css" rel="stylesheet">
<link href="css/tuan.css" rel="stylesheet" type="text/css" />
<link href="css/house.css" rel="stylesheet" type="text/css" />

</head>
<body>
<?php include("../top.php");?>
<!---->
<div class="place"><em>当前位置：</em><a href="/">首页</a><span>&gt;</span><a href="/tuan/"><?php if($city_id==0){
				echo '海南';
				}else{
					$cityone=$mysql->query("select * from `web_city` where id='{$city_id}'");
					echo $cityone[0]['city_name'];
					}
				?>团购</a></div>

<div class="clear"></div>
<!---->
<div class="wr_tuan">
  <div class="left">
 <?php
$key=$_GET['key'];
$pid=15;
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$sql="WHERE `pid`='{$pid}' ";

if($key!=""){
	$sql.=" and `title` like '%{$key}%'";
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
	echo "<li align=center style='padding:10px;font-size:15px;border-bottom:dashed #ccc 1px'><h1>很抱歉,没有找到您搜索的结果。</h1></li>";
	}else{
		foreach($row as $list){
			$url='/tuan/'.$list['id'].'.html';
?>
    <div class="groupList">
      <div class="groupItem">
      <a href="<?php echo $url;?>">
        <div class="groupPic"><img src="/<?php echo $list['img'];?>"><span><?php echo $list['tuanprice'];?></span></div>
        <div class="groupData">
        <h2><?php echo $list['title'];?></h2>
        <h3><?php echo mb_substr(strip_tags($list['content']),0,50,"utf-8"); ?></h3>
        <h4>已有<b><?php echo $list['zhs'];?></b>人报名 <em class="btn orange" style="float:right; font-size:16px; padding:5px;">立即参加</em></h4>
        <h5>
        <?php if($list['kptime']>date()){?>
        距离报名结束还有<div class="yomibox" data="<?php echo $list['kptime'];?>"></div>
       <?php 
		}else{
			echo '报名已结束';
			}
	   ?>
        </h5>
        <h6><b style="font-size:14px; line-height:22px;display:block;"><?php echo $list['cxxx'];?></b></h6>
        </div>
      </a>
      </div>
    </div>
  <?php
		}
		}
  ?>
    <div class="page">
	<?php
   // $pagess="<span class='form_page'>{$page}/{$total} 页   {$result['total']} 条记录";
		$pagess.="<a class='pn' href='?page=1' >首页</a>";
		if($page>1){ $pagess.="<a class='page_num' href='?page=".($page-1)."'>&lt;</a>";}
		if($total>=10){
			
			for ($i=1; $i<=$total; $i++) {
				if($page<$i+10 && $page>$i-10){
						if($page==$i){ $pagess.="<span >{$i}</span>";}else{$pagess.="<a class='page_num' href='?page={$i}'>{$i}</a>";}
                    }
				}
			}else{
					for ($i=1; $i<=$total; $i++) {
						if($page==$i){ $pagess.="<span >{$i}</span>";}else{$pagess.="<a class='page_num' href='?page={$i}'>{$i}</a>";}
                    }
				}
			if($page<$total){$pagess.="<a class='page_num' href='?page=".($page+1)."'>&gt;</a>";}
			$pagess.="<a class='pn' href='?page={$total}' >尾页</a>";
		echo $pagess;
	?>
	</DIV>
    
  
  </div>
  
  <div class="m_lp_r">
        <!-- 帮你找房 -->
        <div class="m_Find_room">
            <div class="m_Find_room_title">
                <i></i>
                <em><span>帮你</span>找房</em>
            </div>
            <form class="submit_area">
                <div class="m_Find_room_form">
                    <input type="hidden" name="pid" value="33">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="lpid" value="0">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="ly" value="列表-帮你找房">     <!--报名来源 具体查看applyVerify.js文件中source 标识说明-->
                    <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->
                    <input type="text" name="intention_city" placeholder="请选择意向区域" class="m_Find_input sign-quyu3">
                    <input type="text" name="intention_housetype" placeholder="请选择意向户型" class="m_Find_input sign-huxing3">
                    <input type="text" name="budget" placeholder="预算" class="m_Find_input sign-yusuan3">
                    <input type="text" name="mobile" placeholder="请输入您的手机号码" class="m_Find_input sign-mobile3">
                    <input type="button" value="确定" class="m_Find_submit sign-btn3 apply_submit">
                </div>
            </form>
        </div>

        <!-- 特色推荐 -->
        <div class="m_Find_room" style="margin-top:20px;">
            <div class="m_Find_room_title">
                <i></i>
                <em><span>精选</span>视角</em>
            </div>

            <ul class="m_tstj">
			 <?php
			$row = $mysql->query("select * from `web_content` where `pid`='9' order by px desc limit 0,6");// and `flag` like '%t1%'
			foreach($row as $k=>$list){
			$url="show.php?lpid={$list['id']}";
			?>
                <li>
                            <a href="<?php echo $url;?>">
                                <img class="lazy" original="/<?php echo $list['img'];?>" alt="">
                                <span><?php echo $list['title'];?></span>
                            </a>
                        </li>
            <?php
            }
            ?> 

                                </ul>
        </div>
    </div>
<?php //include("right.php");?>
</div>
<div class="blank20"></div>
<?php include("../bottom.php");?>

<script type="text/javascript" src="../js/jquery.yomi.js"></script>

</body>
</html>
<?php include("../sq.php");?>
