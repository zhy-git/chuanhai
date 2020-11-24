<?php
session_start();
include("../conn/conn.php");
$rsconfig=$mysql->query("select * from `web_config` where `id`='1'");
$rsconfig=$rsconfig[0];

?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3c.org/TR/1999/REC-html401-19991224/loose.dtd">
<HTML xmlns="http://www.w3.org/1999/xhtml">
<HEAD>
<TITLE>登陆_<?php echo $rsconfig['site_name'];?></TITLE>
<META content="text/html; charset=utf-8" http-equiv=Content-Type>
<LINK rel=stylesheet type=text/css href="css/login.css">
<LINK rel=stylesheet type=text/css href="css/public.css">
<SCRIPT type=text/javascript src="js/jquery.js"></SCRIPT>
<SCRIPT type=text/javascript src="js/Public.js"></SCRIPT>
<SCRIPT type=text/javascript src="js/winpop.js"></SCRIPT>
<SCRIPT>
$(function() {
	$('#content input').eq(0).focus();
    $('body input:text, input:password, textarea').focus(function() {
		$(this).css({'border':'solid 1px #2571c5','boxShadow':'0px 0px 8px #2571c5'});
	});
    $('body input:text, input:password, textarea').blur(function() {
		$(this).css({'border':'solid 1px #ccc','boxShadow':'none'});
	});
	$('.button').click(function(event) {
		event.preventDefault();
		var username=$('#content .utext').val();
		var password=$('#content .ptext').val();
		var code=$('#content .code').val();
		if (!/^[a-zA-Z0-9]{4}$/.test(code)) {
			wintq('请输入正确的验证码',2,2000,1,'');
			$('#content .code').focus();
			return;
		}
		wintq('正在登录，请稍后...',4,20000,0,'');
		$.ajax({
			url:'ajax.php',
			dataType:"json",
			type:'POST',
			cache:false,
			data:'username='+username+'&password='+password+'&code='+code+'&action=login',
			success: function(data) {
				//alert(data.s);
				if (data.msg=='ok') {
					wintq('登录成功',1,1000,0,'index.php');
				}else {
					wintq(data.msg,3,2000,1,'');
				}
			}
		});
	});
	//更换验证码
	
});
</SCRIPT>
<META name="GENERATOR" content="MSHTML 8.00.7601.18934"></HEAD>
<BODY>
<DIV id="content">
	<img src="images/login_lg.jpg" width="360" height="300" style="position:absolute;">
    <FORM method="post" action="ajax.php">
        <DL>
            <DT><?php echo $rsconfig['oa_name'];?></DT>
            <DD><INPUT class="utext" maxLength="12" type="text" name="username"></DD>
            <DD><INPUT class="ptext" maxLength="18" type="password" name="password"></DD>
            <DD><INPUT class="code" maxLength="4" type="text" name="code">
            <img id="verify" title="点击刷新" src="../class/captcha.php" align="absbottom" onClick="this.src='../class/captcha.php?'+Math.random();"></img>
            <INPUT class="button" value="登 录" type="submit" name="login">
            </DD>
        </DL>
    </FORM>
</DIV>
</BODY>
</HTML>
