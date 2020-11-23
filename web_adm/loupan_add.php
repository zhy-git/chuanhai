<?php
session_start();
include("../conn/conn.php");
require('function.php');
include("system.php");

$pid=$_GET['pid'];
$page=$_GET['page'];
$city_idbb=$_GET['city_idbb'];
$row=$mysql->query("SELECT * FROM `web_srot` WHERE `id`='{$pid}'");
//print_r($row);
$info=$row[0];
 if($info==false)
  {
    echo "已经出错!";
	exit;
   }
  else
  {
	  $p_path=$info['path'];
	  $p_title=$info['title'];
  }
if($_GET['id']<>""){
	$rows=$mysql->query("SELECT * FROM `web_content` WHERE `id`='{$_GET['id']}'");
	$infos=$rows[0];
	 if($infos==false)
	  {
		echo "已经出错!";
		exit;
	   }
	}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta charset="utf-8">
<title>新闻信息添加/修改＿网站管理系统</title>
<meta name="keywords" content="###">
<meta name="Author" content="FQS" />
<meta http-equiv="X-UA-compatible" content="IE=edge">
<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no">
<link type="text/css" rel="stylesheet" href="css/publichn.css">
<link type="text/css" rel="stylesheet" href="css/style.css">
<script type="text/javascript" src="js/jquery-1.9.1.min.js"></script>
<script type="text/javascript" src="js/superslide.2.1.js"></script>
<link rel="stylesheet" type="text/css" href="css/content.css"  />
<link rel="stylesheet" type="text/css" href="css/public.css"  />
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript" src="js/Public.js"></script>
<script type="text/javascript" src="js/winpop.js"></script>
<script type="text/javascript" src="js/check.js"></script>
<script type="text/javascript" src="js/My97DatePicker/WdatePicker.js"></script>
<!--up-->
<link rel="stylesheet" type="text/css" href="phpJcrop/css/jquery.Jcrop.css"  />
<script type="text/javascript" src="phpJcrop/js/jquery.form.js"></script>
<script type="text/javascript" src="phpJcrop/js/up.js"></script>
<!--up-->

<script>
$(document).ready(function() {
	var $client = $('#client');
	$('.submit').click(function() {
		var 
			edit_content = $client.find('#edit_content').eq(0).val();
		if (!tcheck(edit_content,'','内容不能为空')) { return false; }
		wintq('正在处理，请稍后...',4,10000,0,'');
		$('#myform').submit();
	});
	
	$("#lpname").blur(function(){
		var lpid=$("#lpid").val();
		var pid=$("#pid").val();
		if(lpid=='' && $(this).val()!=''){
		$.ajax({
					url:'ajax.php',
					dataType:'JSON',
					type:'POST',
					data:'lpname='+$(this).val()+'&pid='+pid+'&action=czm',
					success: function(data) {
						if (data.msg=='ok') {
							$('#tsname').html('<br>已有该楼盘');
						}else {
							$('#tsname').html('');
						}
					}
				});
		}
           // alert($(this).val());
        });
});
</script>
<script>
	function checkCoords(){
		if (parseInt($('#w').val())) return true;
		alert('Please select a crop region then press submit.');
		return false;
	};
</script>
</head>
<body>
<div class="nav_guide">当前位置：<?php echo get_srot($p_pid,' &gt; ').$p_title;?>
<?php
if($_GET['id']<>""){echo '&gt; 修改楼盘信息';}else{echo '&gt; 添加新楼盘';}
?>

<a href="loupan_list.php?pid=<?php echo $pid;?>&page=<?php echo $_GET['page'];?>&city_id=<?php echo $city_idbb;?>" style="width: 140px;height: 40px;background: #16acdd;color: #FFF;border: 0;font-size: 14px;margin: 0 10px;display: inline-block;line-height: 40px; text-align:center; float:right;">返回</a>
</div>
<div class="content">
  <form action="submit_save.php?action=loupan_add" method="post" name="myform" id="myform">
    <div class="addcust" id="client">
      <ul class="addcust_ul c">
        <li class="lie1">
          <p class="lie1">
            <label>标题：</label>
            <input type="text" name="title" id="lpname" value="<?php echo $infos['title'];?>" >
            <samp id="tsname" style="color:#F00;"></samp>
          </p>
          <p class="lie1">
            <label>区域：</label>
          <select name="city_id" class="select" style=" height:34px; width:85px;" id="city_id">
             <?php
					  $row1=$mysql->query("select * from `web_city` where `pid`='0' and `city_st`='1' order by `city_px` asc");
					  foreach($row1 as $list1){
					  ?>
                      <optgroup label="<?php echo $list1['city_name'];?>">
    
   
          			 <?php
					  $row=$mysql->query("select * from `web_city` where `pid`='{$list1['id']}' and `city_st`='1' order by `city_px` asc");
					  foreach($row as $list){
					  ?>
                    <option value="<?php echo $list['id'];?>" alt="1" id="level" <?php if($infos['city_id']==$list['id']){ echo 'selected="selected"';}?>><?php echo $list['city_name'];?></option>
                      <?php
					  }
					  ?>
                   </optgroup> 
                   <?php
					  }
					  ?>
                   </select>　　<!--拼音<input type="text" name="pinyin" value="<?php echo $infos['pinyin'];?>"  style="width:187px;">-->
          </p>
        </li>
        <li>
          <p class="lie1" style="display:none;">
            <label>标签：</label>
           <?php
            $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='1' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $infos['flag'])){
			?>
            <input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flag[]" checked="checked"/> <?php echo $listflag['flag'];?>　
            <?php 
				}else{
					?>
            	<input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flag[]"/> <?php echo $listflag['flag'];?>　
					<?php
					}
			} ?>
          </p>
          <p class="lie1">
            <label>状态：</label>
           <?php
            $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='8' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $infos['ztz'])){
			?>
            <input type="radio" value="<?php echo $listflag['flag_bm']?>" name="ztz" checked="checked"/> <?php echo $listflag['flag'];?>　
            <?php 
				}else{
					?>
            	<input type="radio" value="<?php echo $listflag['flag_bm']?>" name="ztz"/> <?php echo $listflag['flag'];?>　
					<?php
					}
			} ?>
          </p>
        </li>
        
        
        <li>
          <p>
            <label>关键字：</label>
            <input type="text" name="keyword" value="<?php echo $infos['keyword'];?>" style="width:812px;">
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>描述：</label>
            <textarea name="desc" style="width:812px;height:100px;"><?php echo $infos['desc'];?></textarea>
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>开盘时间：</label>
            <input type="text" name="kptime" value="<?php echo $infos['kptime'];?>" >
          </p>
          <p class="lie1">
            <label>交房时间：</label>
            <input type="text" name="jftime" value="<?php echo $infos['jftime'];?>" >
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>项目地址：</label>
            <input type="text" name="xmdz" value="<?php echo $infos['xmdz'];?>">
          </p>
          <p class="lie1">
            <label>售楼地址：</label>
            <input type="text" name="sldz" value="<?php echo $infos['sldz'];?>" >
          </p>
        </li><li>
          <p class="lie1">
            <label>起价：</label>
            <input type="text" name="qj_price" value="<?php echo $infos['qj_price'];?>" style="width:160px;" onKeyUp="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"> 元/平米
          </p>
          <p class="lie1">
            <label>均价：</label>
            <input type="text" name="jj_price" value="<?php echo $infos['jj_price'];?>" style="width:160px;"  onKeyUp="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"> 元/平米
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>总价：</label>
            <input type="text" name="all_price" value="<?php echo $infos['all_price'];?>" style="width:160px;"  onKeyUp="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')"> 万/套
          </p>
        </li>
        <?php if($pid==9 or $pid==80 or $pid==82){?>
        <li>
          <p >
            <label>楼盘价位：</label>
            <?php
            $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='7' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $infos['flagjw'])){
			?>
            <input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flagjw[]" checked="checked"/> <?php echo $listflag['flag'];?>　
            <?php 
				}else{
					?>
            	<input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flagjw[]" /> <?php echo $listflag['flag'];?>　
					<?php
					}
			} ?>
          </p>
        </li>
        <?php }?>
        <?php if($pid==79){?>
        <li>
          <p >
            <label>楼盘价位：</label>
            <?php
            $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='77' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $infos['flagjw'])){
			?>
            <input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flagjw[]" checked="checked"/> <?php echo $listflag['flag'];?>　
            <?php 
				}else{
					?>
            	<input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flagjw[]" /> <?php echo $listflag['flag'];?>　
					<?php
					}
			} ?>
          </p>
        </li>
        <?php }?>
        <li style="display:none;">
          <p>
            <label>楼盘状态：</label>
            <?php
            $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='2' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $infos['flaglp'])){
			?>
            <input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flaglp[]" checked="checked"/> <?php echo $listflag['flag'];?>　
            <?php 
				}else{
					?>
            	<input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flaglp[]" /> <?php echo $listflag['flag'];?>　
					<?php
					}
			} ?>
          </p>
        </li>
        <li>
          <p >
            <label>建筑类别：</label>
            <?php
            $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='3' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $infos['flaglb'])){
			?>
            <input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flaglb[]" checked="checked"/> <?php echo $listflag['flag'];?>　
            <?php 
				}else{
					?>
            	<input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flaglb[]" /> <?php echo $listflag['flag'];?>　
					<?php
					}
			} ?>
          </p>
        </li>
        <li>
          <p >
            <label>户型划分：</label>
            <?php
            $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='4' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $infos['flaghx'])){
			?>
            <input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flaghx[]" checked="checked"/> <?php echo $listflag['flag'];?>　
            <?php 
				}else{
					?>
            	<input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flaghx[]" /> <?php echo $listflag['flag'];?>　
					<?php
					}
			} ?>
          </p>
        </li>
        <li>
          <p >
            <label>装修情况：</label>
            <?php
            $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='5' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $infos['flagzx'])){
			?>
            <input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flagzx[]" checked="checked"/> <?php echo $listflag['flag'];?>　
            <?php 
				}else{
					?>
            	<input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flagzx[]" /> <?php echo $listflag['flag'];?>　
					<?php
					}
			} ?>
          </p>
        </li>
        <li>
          <p >
            <label>物业特色：</label>
            <?php
            $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='6' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $infos['flagts'])){
			?>
            <input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flagts[]" checked="checked"/> <?php echo $listflag['flag'];?>　
            <?php 
				}else{
					?>
            	<input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="flagts[]" /> <?php echo $listflag['flag'];?>　
					<?php
					}
			} ?>
          </p>
        </li>
        <li style="display:none;">
                          <p >
                            <label>品牌：</label>
                            <?php
                            $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='32' and `flag_st`='1' order by `flag_px` asc ");
                            foreach($rowflag as $listflag){
                                if(preg_match("#".$listflag['flag_bm']."#", $infos['hz_pp'])){
                            ?>
                            <input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="hz_pp[]" checked="checked"/> <?php echo $listflag['flag'];?>　
                            <?php 
                                }else{
                                    ?>
                                <input type="checkbox" value="<?php echo $listflag['flag_bm']?>" name="hz_pp[]" /> <?php echo $listflag['flag'];?>　
                                    <?php
                                    }
                            } ?>
                          </p>
                        </li>
        <li>
          <p class="lie1">
            <label>项目特色：</label>
            <input type="text" name="xmts" value="<?php echo $infos['xmts'];?>">
          </p>
          <p class="lie1">
            <label>物业类型：</label>
            <input type="text" name="wylx" value="<?php echo $infos['wylx'];?>" >
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>占地面积：</label>
            <input type="text" name="zdmj" value="<?php echo $infos['zdmj'];?>">
          </p>
          <p class="lie1">
            <label>建筑面积：</label>
            <input type="text" name="jzmj" value="<?php echo $infos['jzmj'];?>" >
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>容积率：</label>
            <input type="text" name="rjl" value="<?php echo $infos['rjl'];?>">
          </p>
          <p class="lie1">
            <label>绿化率：</label>
            <input type="text" name="lhl" value="<?php echo $infos['lhl'];?>" >
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>总栋数：</label>
            <input type="text" name="zds" value="<?php echo $infos['zds'];?>">
          </p>
          <p class="lie1">
            <label>总户数：</label>
            <input type="text" name="zhs" value="<?php echo $infos['zhs'];?>" >
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>主力户型：</label>
            <input type="text" name="zlhx" value="<?php echo $infos['zlhx'];?>">
          </p>
          <p class="lie1">
            <label>户型面积：</label>
            <input type="text" name="hxmj" value="<?php echo $infos['hxmj'];?>" >
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>产权年限：</label>
            <input type="text" name="cqnx" value="<?php echo $infos['cqnx'];?>">
          </p>
          <p class="lie1">
            <label style="width:100px; left:-20px;">预售许可证：</label>
            <input type="text" name="ysxkz" value="<?php echo $infos['ysxkz'];?>" >
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>现房期房：</label>
            <input type="text" name="xfqf" value="<?php echo $infos['xfqf'];?>">
          </p>
          <p class="lie1">
            <label>车位数：</label>
            <input type="text" name="cws" value="<?php echo $infos['cws'];?>" >
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>投资商：</label>
            <input type="text" name="tzs" value="<?php echo $infos['tzs'];?>">
          </p>
          <p class="lie1">
            <label>开发商：</label>
            <input type="text" name="kfs" value="<?php echo $infos['kfs'];?>" >
          </p>
        </li>
        <li>
          <p class="lie1">
            <label style="width:100px; left:-20px;">物业管理公司：</label>
            <input type="text" name="wygs" value="<?php echo $infos['wygs'];?>">
          </p>
          <p class="lie1">
            <label>物业费：</label>
            <input type="text" name="wyf" value="<?php echo $infos['wyf'];?>" >
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>楼层状况：</label>
            <input type="text" name="lczk" value="<?php echo $infos['lczk'];?>">
          </p>
          <p class="lie1">
            <label>交通状况：</label>
            <input type="text" name="jtzk" value="<?php echo $infos['jtzk'];?>" >
          </p>
        </li>
        <li >
          <p class="lie1">
            <label>优惠：</label>
            <input type="text" name="fkfs" value="<?php echo $infos['fkfs'];?>">
          </p>
        </li>
     
        <li style="display:none;">
         
          <p >
            <label>促销折扣：</label>
             <textarea name="cxxx" style="width:600px;height:100px;"><?php echo $infos['cxxx'];?></textarea>*80字左右
          </p>
        </li>
        <li>
          <p class="lie1" style="display:none;">
            <label style="width:100px; left:-20px;">截止时间：</label>
            <input type="text" name="tuanprice" onFocus="WdatePicker({startDate:'%y-%M-01 ',dateFmt:'yyyy-MM-dd HH:mm:ss',alwaysUseStartDate:true})" value="<?php echo $infos['tuanprice'];?>"> 
          </p>
          <p class="lie1">
            <label>报名人数：</label>
            <input type="text" name="esfcx" value="<?php echo $infos['esfcx'];?>"　onKeyUp="this.value=this.value.replace(/\D/g,'')" onafterpaste="this.value=this.value.replace(/\D/g,'')">
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>独家优惠：</label>
            <textarea name="djyh" style="width:812px;height:100px;"><?php echo $infos['djyh'];?></textarea>
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>联系电话：</label>
            <input type="text" name="loupan_tel" value="<?php echo $infos['loupan_tel'];?>">
          </p>
          <p class="lie1">
            <label>有效期：</label>
            <input type="text" name="loupan_qq" value="<?php echo $infos['loupan_qq'];?>" >
          </p>
        </li>
        
        <li style="display:none;">
          <p class="lie1">
            <label>项目配套：</label>
            
           <!-- <textarea name="xmpt" style="width:812px;height:100px;"><?php //echo $infos['xmpt'];?></textarea>-->
            
             <script id="container2" name="xmpt" type="text/plain"><?php echo $infos['xmpt'];?></script>
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>项目介绍：</label>
            <!--<textarea name="content" id="content" style="width:820px;height:400px;visibility:hidden;"><?php //echo $infos['content'];?></textarea>-->
             <script id="container" name="content" type="text/plain"><?php echo $infos['content'];?></script>
          </p>
        </li>
        <li>
          <p class="lie1">
            <label>区位介绍：</label>
            <!--<textarea name="lptd" id="lptd" style="width:820px;height:200px;visibility:hidden;"><?php //echo $infos['lptd'];?></textarea>-->
            <script id="container3" name="lptd" type="text/plain"><?php echo $infos['lptd'];?></script>
             <!--<textarea name="lptd" style="width:812px;height:100px;"><?php //echo $infos['lptd'];?></textarea>-->
          </p>
        </li>
        <li>
          <p>
            <label style="width:100px; left:-20px;">列表封面图：</label>图片大小宽420px*高305px;<br />

            <span class="upid1">
              <span class="btn1"><span>上传图片</span><input id="fileupload1" type="file" name="mypic" /></span>
                <span class="progress1"><span class="bar1"></span><span class="percent1">0%</span ></span>
                <span class="files1"></span>
                <span id="showimg1"><img src="<?php if($infos['img']<>""){echo "../".$infos['img'];}else{echo 'images/01.jpg';}?>" style="width:120px;" /><!--初始图片--></span>
                <input type="hidden" id="src1" name="src1" value="<?php if($infos['img']<>""){echo $infos['img'];}?>" />
            </span>
          </p>
        </li>
		<?php if($pid<>79 and $pid<>80 and $pid<>82){?>
        <li>
          <p style="height:30px;">
            <label>幻灯片：</label>图片大小宽600px*高400px;
          </p>
        </li>
        <li style="padding-left:100px;">
        
          <p class="lie2">
            <span class="upid4">
              <span class="btn4"><span>效果图上传</span><input id="fileupload4" type="file" name="mypic" /></span>
                <span class="progress4"><span class="bar4"></span><span class="percent4">0%</span ></span>
                <span class="files4"></span>
                <span id="showimg4"><img src="<?php if($infos['src4']<>""){echo "../".$infos['src4'];}else{echo 'images/01.jpg';}?>" style="width:120px;" /><!--初始图片--></span>
                <input type="hidden" id="src4" name="src4" value="<?php echo $infos['src4'];?>" />
            </span>
          </p>
          <p class="lie2">
            <span class="upid5">
              <span class="btn5"><span>样板间上传</span><input id="fileupload5" type="file" name="mypic" /></span>
                <span class="progress5"><span class="bar5"></span><span class="percent5">0%</span ></span>
                <span class="files5"></span>
                <span id="showimg5"><img src="<?php if($infos['src5']<>""){echo "../".$infos['src5'];}else{echo 'images/01.jpg';}?>" style="width:120px;" /><!--初始图片--></span>
                <input type="hidden" id="src5" name="src5" value="<?php echo $infos['src5'];?>" />
            </span>
          </p>
          <p class="lie2">
            <span class="upid3">
              <span class="btn3"><span>区位图上传</span><input id="fileupload3" type="file" name="mypic" /></span>
                <span class="progress3"><span class="bar3"></span><span class="percent3">0%</span ></span>
                <span class="files3"></span>
                <span id="showimg3"><img src="<?php if($infos['src3']<>""){echo "../".$infos['src3'];}else{echo 'images/01.jpg';}?>" style="width:120px;" /><!--初始图片--></span>
                <input type="hidden" id="src3" name="src3" value="<?php echo $infos['src3'];?>" />
            </span>
          </p>
          <p class="lie2">
            <span class="upid6">
              <span class="btn6"><span>实景图上传</span><input id="fileupload6" type="file" name="mypic" /></span>
                <span class="progress6"><span class="bar6"></span><span class="percent6">0%</span ></span>
                <span class="files6"></span>
                <span id="showimg6"><img src="<?php if($infos['src6']<>""){echo "../".$infos['src6'];}else{echo 'images/01.jpg';}?>" style="width:120px;" /><!--初始图片--></span>
                <input type="hidden" id="src6" name="src6" value="<?php echo $infos['src6'];?>" />
            </span>
          </p>
          <p class="lie2">
            <span class="upid2">
              <span class="btn2"><span>户型图上传</span><input id="fileupload2" type="file" name="mypic" /></span>
                <span class="progress2"><span class="bar2"></span><span class="percent2">0%</span ></span>
                <span class="files2"></span>
                <span id="showimg2"><img src="<?php if($infos['src2']<>""){echo "../".$infos['src2'];}else{echo 'images/01.jpg';}?>" style="width:120px;" /><!--初始图片--></span>
                <input type="hidden" id="src2" name="src2" value="<?php echo $infos['src2'];?>" />
            </span>
          </p>
        </li>
        <?php }else{?>
        
        
        <li>
          <p style="height:30px;">
            <label style="width:100px; left:-20px;">内容展示大图：</label>图片大小宽1920px*高400px;
          </p>
        </li>
        <li style="padding-left:100px;">
          <p class="lie2">
            <span class="upid2">
              <span class="btn2"><span>大图上传</span><input id="fileupload2" type="file" name="mypic" /></span>
                <span class="progress2"><span class="bar2"></span><span class="percent2">0%</span ></span>
                <span class="files2"></span>
                <span id="showimg2"><img src="<?php if($infos['src2']<>""){echo "../".$infos['src2'];}else{echo 'images/01.jpg';}?>" style="width:120px;" /><!--初始图片--></span>
                <input type="hidden" id="src2" name="src2" value="<?php echo $infos['src2'];?>" />
            </span>
          </p>
         
        </li>
        <?php }?>
       
         <li>
          <p>
            <label>视频上传：</label>

            <span class="upid7">
              <span class="btn7"><span>上传视频</span><input id="fileupload7" type="file" name="mypic" /></span>
                <span class="progress7"><span class="bar7"></span><span class="percent7">0%</span ></span>
                <span class="files7"><?php if($infos['src7']<>""){?><span class="delimg7" rel="<?php if($infos['src7']<>""){echo str_replace('upload/video/',"",$infos['src7']);}?>">删除</span><?php }?></span>
                <span id="showimg7"><img src="<?php if($infos['src7']<>""){echo "../".$infos['src7'];}else{echo 'images/01.jpg';}?>" style="width:120px; display:none;" /><!--初始图片--></span>
                <input id="src7" name="src7" value="<?php if($infos['src7']<>""){echo $infos['src7'];}?>" />
            </span>
          </p>
        </li>
          <li>
          <p>
            <label>视频封面：</label>图片大小宽420px*高280px;<br />

            <span class="upid8">
              <span class="btn8"><span>上传图片</span><input id="fileupload8" type="file" name="mypic" /></span>
                <span class="progress8"><span class="bar8"></span><span class="percent8">0%</span ></span>
                <span class="files8"><?php if($infos['src8']<>""){?><span class="delimg8" rel="<?php if($infos['src8']<>""){echo str_replace('upload/info/',"",$infos['src8']);}?>">删除</span><?php }?></span>
                <span id="showimg8"><img src="<?php if($infos['src8']<>""){echo "../".$infos['src8'];}else{echo 'images/01.jpg';}?>" style="width:120px;" /><!--初始图片--></span>
                <input type="hidden" id="src8" name="src8" value="<?php if($infos['src8']<>""){echo $infos['src8'];}?>" />
            </span>
          </p>
        </li>
        <li>
          <p >
            <label>VR全景：</label>
            <input type="text" name="get_url" value="<?php echo $infos['get_url'];?>" style="width:600px;">vr\3D全景地址
          </p>
         
        </li>
        <li>
          <p>
            <label>语音上传：</label>

            <span class="upid9">
              <span class="btn9"><span>上传语音</span><input id="fileupload9" type="file" name="mypic" /></span>
                <span class="progress9"><span class="bar9"></span><span class="percent9">0%</span ></span>
                <span class="files9"><?php if($infos['src9']<>""){?><span class="delimg9" rel="<?php if($infos['src9']<>""){echo str_replace('upload/video/',"",$infos['src9']);}?>">删除</span><?php }?></span>
                <span id="showimg9"><img src="<?php if($infos['src9']<>""){echo "../".$infos['src9'];}else{echo 'images/01.jpg';}?>" style="width:120px; display:none;" /><!--初始图片--></span>
                <input id="src9" name="src9" value="<?php if($infos['src9']<>""){echo $infos['src9'];}?>" />
            </span>
          </p>
        </li>
        <li>
          <p>
            <label>整体排序：</label>
            <input type="text" name="px" value="<?php echo $infos['px'];?>" style="width:100px;">数字越大越在前,数字最好控制在1000以内
          </p>
        </li>
        <li>
          <p >
            <label>独立排序：</label>
            <?php if($pid==9){?>
           热销楼盘：<input type="text" name="px1" value="<?php echo $infos['px1'];?>" style="width:50px;">
           一线海景：<input type="text" name="px16" value="<?php echo $infos['px16'];?>" style="width:50px;">
           精品别墅：<input type="text" name="px17" value="<?php echo $infos['px17'];?>" style="width:50px;"><br />
           
           热销楼盘TOP：<input type="text" name="px2" value="<?php echo $infos['px2'];?>" style="width:50px;">
           优选楼盘：<input type="text" name="px3" value="<?php echo $infos['px3'];?>" style="width:50px;">
            品牌地产：<input type="text" name="px4" value="<?php echo $infos['px4'];?>" style="width:50px;">
            低总价：<input type="text" name="px5" value="<?php echo $infos['px5'];?>" style="width:50px;">
            精装洋房：<input type="text" name="px6" value="<?php echo $infos['px6'];?>" style="width:50px;">
            小户型：<input type="text" name="px7" value="<?php echo $infos['px7'];?>" style="width:50px;">
            特价优惠：<input type="text" name="px8" value="<?php echo $infos['px8'];?>" style="width:50px;"><br />

            热销海景项目：<input type="text" name="px9" value="<?php echo $infos['px9'];?>" style="width:50px;">
           畅销楼盘：<input type="text" name="px18" value="<?php echo $infos['px18'];?>" style="width:50px;">
            <br />

           热销别墅项目：<input type="text" name="px19" value="<?php echo $infos['px19'];?>" style="width:50px;">
           精品推荐：<input type="text" name="px20" value="<?php echo $infos['px20'];?>" style="width:50px;"><br />
           
           热销商业项目：<input type="text" name="px21" value="<?php echo $infos['px21'];?>" style="width:50px;">
           精品推荐：<input type="text" name="px22" value="<?php echo $infos['px22'];?>" style="width:50px;">

            <?php }?>
            <?php if($pid==80){?>
           一线海景：<input type="text" name="px1" value="<?php echo $infos['px1'];?>" style="width:50px;">
           热销海景项目：<input type="text" name="px2" value="<?php echo $infos['px2'];?>" style="width:50px;">
           畅销楼盘：<input type="text" name="px3" value="<?php echo $infos['px3'];?>" style="width:50px;">
            一线海景城市：<input type="text" name="px4" value="<?php echo $infos['px4'];?>" style="width:50px;">
            <?php }?>
            <?php if($pid==79){?>
           精品别墅：<input type="text" name="px1" value="<?php echo $infos['px1'];?>" style="width:50px;">
           热销别墅项目：<input type="text" name="px2" value="<?php echo $infos['px2'];?>" style="width:50px;">
           精品推荐：<input type="text" name="px3" value="<?php echo $infos['px3'];?>" style="width:50px;">
            精品别墅城市：<input type="text" name="px4" value="<?php echo $infos['px4'];?>" style="width:50px;">
            <?php }?>
            <?php if($pid==82){?>
           热销商业项目：<input type="text" name="px2" value="<?php echo $infos['px2'];?>" style="width:50px;">
           精品推荐：<input type="text" name="px3" value="<?php echo $infos['px3'];?>" style="width:50px;">
            铺面：<input type="text" name="px4" value="<?php echo $infos['px4'];?>" style="width:50px;">
            写字楼：<input type="text" name="px5" value="<?php echo $infos['px5'];?>" style="width:50px;">
            商业住宅：<input type="text" name="px6" value="<?php echo $infos['px6'];?>" style="width:50px;">
            <?php }?>
           
            
            <br />内页共用排序<br />

            成交排行：<input type="text" name="px12" value="<?php echo $infos['px12'];?>" style="width:50px;">
            热门楼盘：<input type="text" name="px13" value="<?php echo $infos['px13'];?>" style="width:50px;">
            猜你喜欢：<input type="text" name="px14" value="<?php echo $infos['px14'];?>" style="width:50px;">
            热销新盘：<input type="text" name="px15" value="<?php echo $infos['px15'];?>" style="width:50px;">
            其他楼盘：<input type="text" name="px11" value="<?php echo $infos['px11'];?>" style="width:50px;">
             <br />手机版<br />

            首页新房推荐：<input type="text" name="px10" value="<?php echo $infos['px10'];?>" style="width:50px;">
           
            
         
          </p>
        </li>
        
        <li>
          <p >
            <label>电子地图：</label>
            <input type="text" name="map_info" value="<?php echo $infos['map_info'];?>" style="width:300px;">
            格式：电话：0898-000000&lt;br&gt;地址：海南海口&lt;br&gt;联系人：林生</p>
        </li>
       
        <li style=" <?php if($pid==79 or $pid==80){echo 'display:none;'; }?>">
          <p >
            <label style="width:100px; left:-20px;">地图找房显示：</label> <input type="checkbox" value="1" name="mapst" <?php if($infos['mapst']==1){echo 'checked="checked"';}?>  />
            </p>
         </li>
         
        <li>
          <p>
            <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
	<style type="text/css">
		body, html{width: 100%;height: 100%;margin:0;font-family:"微软雅黑";font-size:14px;}
		#l-map{height:300px;width:700px;margin-left: 80px;}
		#r-result{width:100%;margin-left: 80px;}
	</style>
	<script type="text/javascript" src="http://api.map.baidu.com/api?v=2.0&ak=Xbz0agOQpdcCl91FSUYEsoHB7jpL1zSo"></script>
	<div id="l-map"></div>
	<div id="r-result">请输入关键字搜索:<input type="text" id="suggestId" size="20" value="百度" style="width:150px;" /><input type="hidden" id="zbx" size="20" value="<?php echo $infos['zbx'];?>" style="width:150px;" name="zbx" /><input type="hidden" id="zby" size="20" value="<?php echo $infos['zby'];?>" style="width:150px;" name="zby" />搜索后在地图上点击位置即可</div>
	<div id="searchResultPanel" style="border:1px solid #C0C0C0;width:150px;height:auto; display:none;"></div>

<script type="text/javascript">
	// 百度地图API功能
	function G(id) {
		return document.getElementById(id);
	}

	var map = new BMap.Map("l-map");
		//	map.centerAndZoom("海口",9);                   // 初始化地图,设置城市和地图级别。
	var lpzb1=document.getElementById("zbx").value;
	var lpzb2=document.getElementById("zby").value;
	if (lpzb1!=""){
		//alert(document.getElementById("shipin").value);
			map.centerAndZoom(new BMap.Point(lpzb1,lpzb2),18);  
			var marker = new BMap.Marker(new BMap.Point(lpzb1,lpzb2));  // 创建标注
			map.addOverlay(marker);               // 将标注添加到地图中
		}else{
			map.centerAndZoom("海口",9);                   // 初始化地图,设置城市和地图级别。
			}
	map.enableScrollWheelZoom();   //启用滚轮放大缩小，默认禁用
	map.enableContinuousZoom();    //启用地图惯性拖拽，默认禁用
	var ac = new BMap.Autocomplete(    //建立一个自动完成的对象
		{"input" : "suggestId"
		,"location" : map
	});
	
	ac.addEventListener("onhighlight", function(e) {  //鼠标放在下拉列表上的事件
	var str = "";
		var _value = e.fromitem.value;
		var value = "";
		if (e.fromitem.index > -1) {
			value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
		}    
		str = "FromItem<br />index = " + e.fromitem.index + "<br />value = " + value;
		
		value = "";
		if (e.toitem.index > -1) {
			_value = e.toitem.value;
			value = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
		}    
		str += "<br />ToItem<br />index = " + e.toitem.index + "<br />value = " + value;
		G("searchResultPanel").innerHTML = str;
	});

	var myValue;
	ac.addEventListener("onconfirm", function(e) {    //鼠标点击下拉列表后的事件
	var _value = e.item.value;
		myValue = _value.province +  _value.city +  _value.district +  _value.street +  _value.business;
		G("searchResultPanel").innerHTML ="onconfirm<br />index = " + e.item.index + "<br />myValue = " + myValue;
		
		setPlace();
	});

	function setPlace(){
		map.clearOverlays();    //清除地图上所有覆盖物
		function myFun(){
			var pp = local.getResults().getPoi(0).point;    //获取第一个智能搜索的结果
			map.centerAndZoom(pp, 18);
			//map.addOverlay(new BMap.Marker(pp));    //添加标注
		}
		var local = new BMap.LocalSearch(map, { //智能搜索
		  onSearchComplete: myFun
		});
		local.search(myValue);
	}
	//单击获取点击的经纬度
	map.addEventListener("click",function(e){
		map.clearOverlays(); 
		document.getElementById("zbx").value =(e.point.lng);
		document.getElementById("zby").value =(e.point.lat);
		//alert(e.point.lng + "," + e.point.lat);
		var marker = new BMap.Marker(new BMap.Point(e.point.lng,e.point.lat));  // 创建标注
		map.addOverlay(marker);               // 将标注添加到地图中
		//marker.setAnimation(BMAP_ANIMATION_BOUNCE); //跳动的动画
	});
	
	
</script>
<div style="clear:both;"></div>
          </p>
        </li>
      </ul>
      <div class="addcust_btn">
	<input type="hidden" name="edit_id" id="lpid" value="<?php echo $infos['id'];?>" >
	<input type="hidden" name="p_pid" id="pid" value="<?php echo $pid;?>" >
	<input type="hidden" name="p_path" value="<?php echo $p_path;?>" >
	<input type="hidden" name="page" value="<?php echo $page;?>" >
	<input type="hidden" name="city_idbb" value="<?php echo $city_idbb;?>" >
        <input type="button" value="提交" class="submit" >
        <input type="reset" value="重置">
      </div>
    </div>
  </form>
</div>



<!-- 配置文件 -->
    <script type="text/javascript" src="/ueditorp33/ueditor.config.js"></script>
    <!-- 编辑器源码文件 -->
    <script type="text/javascript" src="/ueditorp33/ueditor.all.js"></script>
    <!-- 实例化编辑器 -->
    <script type="text/javascript">
        var ue = UE.getEditor('container', {
    toolbars: [
         ['fullscreen', 'source', 'undo', 'redo','|','indent','bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'insertorderedlist', 'insertunorderedlist', 'selectall','time', 'date','link','unlink','imagenone', //默认
        'imageleft', //左浮动
        'imageright', //右浮动
        'imagecenter', //居中
		'|',
        'attachment', //附件
        'lineheight', //行间距
        'autotypeset', //自动排版
		
        'emotion', //表情
        'spechars', //特殊字符
		 'cleardoc'],
    [ 'fontfamily','fontsize','paragraph','forecolor', 
        'backcolor',
		'|',
		'justifyleft', //居左对齐
        'justifyright', //居右对齐
        'justifycenter', //居中对齐
        'justifyjustify', //两端对齐
		'|', 'simpleupload','insertimage','|','edittable','edittd','insertrow', 'inserttable',
        'insertcol', //前插入列
        'mergeright', //右合并单元格
        'mergedown', //下合并单元格
        'deleterow', //删除行
        'deletecol', //删除列
        'splittorows', //拆分成行
        'splittocols', //拆分成列
        'splittocells', //完全拆分单元格
        'deletecaption', //删除表格标题
        'inserttitle', //插入标题
        'mergecells', //合并多个单元格
        'deletetable', //删除表格
        'insertparagraphbeforetable', //"表格前插入行"
		
        'template', //模板
		
        'searchreplace', //查询替换
		]
    ],
    autoHeightEnabled: true,
    autoFloatEnabled: true
});
	
		 var ue2 = UE.getEditor('container2', {
    toolbars: [
         ['fullscreen', 'source', 'undo', 'redo','|','indent','bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'insertorderedlist', 'insertunorderedlist', 'selectall','time', 'date','link','unlink',
		'|',
        'attachment', //附件
        'lineheight', //行间距
        'autotypeset', //自动排版
		
        'spechars', //特殊字符
		 'cleardoc',
		'justifyleft', //居左对齐
        'justifyright', //居右对齐
        'justifycenter', //居中对齐
        'justifyjustify', //两端对齐
		
		]
    ],
    autoHeightEnabled: true,
    autoFloatEnabled: true
});

		 var ue3 = UE.getEditor('container3', {
    toolbars: [
        ['fullscreen', 'source', 'undo', 'redo','|','indent','bold', 'italic', 'underline', 'fontborder', 'strikethrough', 'superscript', 'subscript', 'removeformat', 'formatmatch', 'autotypeset', 'blockquote', 'pasteplain', '|', 'insertorderedlist', 'insertunorderedlist', 'selectall','time', 'date','link','unlink',
		'|',
        'attachment', //附件
        'lineheight', //行间距
        'autotypeset', //自动排版
		
        'spechars', //特殊字符
		 'cleardoc',
		'justifyleft', //居左对齐
        'justifyright', //居右对齐
        'justifycenter', //居中对齐
        'justifyjustify', //两端对齐
		
		]
    ],
    autoHeightEnabled: true,
    autoFloatEnabled: true
});
    </script>
<script type="text/javascript" src="js/class.js"></script> 
<!--[if lt IE 9]><script type="text/javascript" src="js/forie.js"></script><![endif]-->
</body>
</html>