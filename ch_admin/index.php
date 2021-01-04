<?php
session_start();
include("../conn/conn.php");
require('function.php');
include("system.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<HTML>
<HEAD>
<TITLE>主页_<?php echo $rsconfig['site_name'];?></TITLE>
<META charset=utf-8>
<META name=Author content=FQS>
<META content=IE=edge http-equiv=X-UA-compatible>
<link rel="shortcut icon" href="../image/favicon.ico" />
<LINK rel=stylesheet type=text/css href="css/publichn.css">
<LINK rel=stylesheet type=text/css href="css/index.css">
<SCRIPT type=text/javascript src="js/jquery-1.9.1.min.js"></SCRIPT>

<SCRIPT type=text/javascript src="js/superslide.2.1.js"></SCRIPT>
<LINK rel=stylesheet type=text/css href="js/content.css">
<LINK rel=stylesheet type=text/css href="css/public.css">
<SCRIPT type=text/javascript src="js/jquery.js"></SCRIPT>

<SCRIPT type=text/javascript src="js/Public.js"></SCRIPT>

<SCRIPT type=text/javascript src="js/winpop.js"></SCRIPT>

<SCRIPT>
window.onload=function() {
	//退出登录
	function quit() {
		$('body #quit').click(function(event) {
			event.preventDefault();
			if (confirm('确定要退出吗？')) {
				window.top.location.href='logout.php?action=logout';
			}
		});
	}
	quit();
}
$(function() {
	for (i=0; i<$('#left dl').size(); i++) {
		$dldd=$('#left dl').eq(i);
		if ($dldd.find('dd').size() < 1) {
			$dldd.remove();
		}
	}
	$('#ul li .a').click(function() {
		$('#ul li .a').removeClass('lia');
		$(this).addClass('lia');
		$('#ul li dl').stop().slideUp('fast');
		var $dl = $(this).parents('li').find('dl');
		$dl.stop().slideToggle('fast');
		$dl.find('a').click(function() {
			$('#ul li dl dd a').removeClass('dla');
			$(this).addClass('dla');
		});
	});
});
</SCRIPT>

<META name=GENERATOR content="MSHTML 8.00.7601.18934"></HEAD>
<BODY>
<DIV class="header c">
	<DIV class="logo fl"> <!--<IMG src="images/logo.png" >--></DIV>
    <DIV class="menu fr">
        <UL>
          <LI><A href="/index.php" target="_blank"><SPAN class="home"></SPAN>网站首页</A></LI>
          <LI><A href="index.php"><SPAN class="home"></SPAN>后台首页</A></LI>
          <?php if($_SESSION['admin_sys']==1){?>
          <LI><A href="config.php" target=c><SPAN class="setup"></SPAN>系统设置</A></LI>
          <?php }?>
          <LI><A id="quit"><SPAN class="out"></SPAN>退出</A></LI>
        </UL>
    </DIV>
</DIV>
<DIV class="main c">
    <DIV class="nav fl">
    <?php
     
		if($_SESSION["admin_sys"]==1){
			
     	$result=$mysql->query("SELECT * FROM `web_srot` WHERE `pid` = '0' and `startus`='1' order by `px` asc");
			}else{
     	$result=$mysql->query("SELECT * FROM `web_srot` WHERE `pid` = '0' and `id` in({$_SESSION['admin_qx']}) and `startus`='1' order by `px` asc");
				}
		foreach($result as $row){//循环记录集
	?>
        <DL><A href="javascript:;" target=c><DT class=icon_<?php echo $row['icon'];?>><?php echo $row['title'];?><SPAN></SPAN></DT></A>
            <DD>
            <?php
				$result2=$mysql->query("SELECT * FROM `web_srot` WHERE `pid` = '{$row['id']}' and `startus`='1' order by `px` asc");
				foreach($result2 as $row2){//循环记录集
			?>
            <?php 
               if ($row2['id'] == '9') {
            ?>
                <SPAN><A href="<?php echo $row2['b_url'].'?pid='.$row2['id'].'&city_id=42';?>" target=c>|--<?php echo $row2['title'];?></A></SPAN>
            <?php 
              }else{
            ?>
               <SPAN><A href="<?php echo $row2['b_url'].'?pid='.$row2['id'];?>" target=c>|--<?php echo $row2['title'];?></A></SPAN>
             }?>
            <?php
				}
			?>
            </DD>
        </DL>
    <?php
		}
		
		if($_SESSION["admin_sys"]==1){
	?>
        <DL><A href="javascript:;" target=c><DT class=icon_04>系统设置 <SPAN></SPAN></DT></A>
            <DD>
                <SPAN><A href="config.php" target=c>--系统基本设置</A></SPAN>
                <SPAN><A href="admin_list.php" target=c>--管理员管理</A></SPAN>
                <SPAN><A href="ip_list.php" target=c>--查看访问IP</A></SPAN>
                <SPAN><A href="srot.php" target=c>--栏目管理</A></SPAN>
            </DD>
        </DL>
      <?php }?>
    </DIV>
    <DIV class="conter">
    <?php
	if($_SESSION["admin_sys"]==1){
	?>
        <IFRAME id="main" height="100%" border="0" src="bookall.php" frameBorder=0 width="100%" name="c"></IFRAME>
         <?php }else{?>
        <IFRAME id="main" height="100%" border="0" src="loupan_list.php?pid=9&city_id=42" frameBorder=0 width="100%" name="c"></IFRAME>
      <?php }?>
    </DIV>
<DIV class="check_button">收起</DIV></DIV>
<DIV class="footer"></DIV>
<SCRIPT type=text/javascript src="js/class.js"></SCRIPT></BODY></HTML>
