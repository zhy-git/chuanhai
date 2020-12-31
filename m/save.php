<?php
require("../conn/conn.php");
header('Content-type:text/json'); 
require_once('360_safe3.php');
require_once "Smtp.class.php";
function SendMail($to, $title, $content) {
    Vendor('PHPMailer.PHPMailerAutoload');
    $mail = new PHPMailer(); //实例化
    $mail->IsSMTP(); // 启用SMTP
    $mail->Host='smtp.163.com'; //smtp服务器的名称（这里以QQ邮箱为例）
    $mail->SMTPAuth = TRUE; //启用smtp认证
    $mail->Username = 'zhaihuanyan520@163.com'; //你的邮箱名
    $mail->Password = 'Zhonghui520'; //邮箱密码
    $mail->From = 'zhaihuanyan520@163.com'; //发件人地址（也就是你的邮箱地址）
    $mail->FromName = '通知'; //发件人姓名
    $mail->AddAddress($to,"尊敬的客户");
    $mail->WordWrap = 50; //设置每行字符长度
    $mail->IsHTML(C('MAIL_ISHTML')); // 是否HTML格式邮件
    $mail->CharSet=C('MAIL_CHARSET'); //设置邮件编码
    $mail->Subject =$title; //邮件主题
    $mail->Body = $content; //邮件内容
    $mail->AltBody = "这是一个纯文本的身体在非营利的HTML电子邮件客户端"; //邮件正文不支持HTML的备用显示
    return($mail->Send());
}
function lpname($lpid) {
	global $mysql;
    $lpname = $mysql->query("select * from `web_content` where `id`='{$lpid}' limit 0,1");
    return $lpname[0]['title'];
}
$action = $_POST["action"] ? $_POST["action"] : $_GET["action"];

if ($action=="baoming"){
	
	//print_r($_POST);
	//exit;
	$lpid=$_POST['lpid'];
	$pid=$_POST['pid'];
	$uname=$_POST['uname'];
	$usex=$_POST['usex'];
	$utel=$_POST['utel'];
	$utitle=$_POST['utitle'];
	$ucontent=$_POST['ucontent'];
	$ly=$_POST['ly'];
	$addtime=date('Y-m-d H:i:s');
	if($ly){
		$ucontent.="来源：".$ly;
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
			$lpname=lpname($lpid);
				//******************** 配置信息 ********************************
				$smtpserver = "smtp.163.com";//SMTP服务器
				$smtpserverport =25;//SMTP服务器端口
				$smtpusermail = "zhaihuanyan520@163.com";//SMTP服务器的用户邮箱
				$smtpemailto = "420998627@qq.com,594931354@qq.com";//发送给谁
				$smtpuser = "zhaihuanyan520@163.com";//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名
				$smtppass = "JEYIZEZVGRTIDAUO";//SMTP服务器的用户密码
				$mailtitle = "您有新的报名信息";//邮件主题
				$mailcontent = "<h1>{$uname}电话：{$utel}{$lpname}</h1>";//邮件内容
				$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
				//************************ 配置信息 ****************************
				$smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
				$smtp->debug = false;//是否显示发送的调试信息
				$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
		
			echo "<script language=javascript>alert('提交成功');history.back();</script>";
			}else{
			echo "<script language=javascript>alert('提交失败');history.back();</script>";
			}
	}

if ($action=="dz"){
	
	//print_r($_POST);
	//exit;
	$lpid=$_POST['lpid'];
	$pid=$_POST['pid'];
	$uname=$_POST['uname'];
	$usex=$_POST['usex'];
	$utel=$_POST['utel'];
	$utitle=$_POST['utitle'];
	$ucontent=$_POST['ucontent'];
	
	if($_POST['yixiang']<>''){
		$ucontent.=" 意向区域：".$_POST['yixiang'];
		}
	if($_POST['feature']<>''){
		$ucontent.=" 特色：".$_POST['feature'];
		}
	if($_POST['house_type']<>''){
		$ucontent.=" 户型：".$_POST['house_type'];
		}
	if($_POST['house_price']<>''){
		$ucontent.=" 价格：".$_POST['house_price'];
		}
	if($_POST['house_mj']<>''){
		$ucontent.=" 置业面积：".$_POST['house_mj'];
		}
	if($_POST['leave']<>''){
		$ucontent.=" 附加需求：".$_POST['leave'];
		}
	
	
	$addtime=date('Y-m-d H:i:s');
	
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
			$lpname=lpname($lpid);
				//******************** 配置信息 ********************************
				$smtpserver = "smtp.163.com";//SMTP服务器
				$smtpserverport =25;//SMTP服务器端口
				$smtpusermail = "zhaihuanyan520@163.com";//SMTP服务器的用户邮箱
				$smtpemailto = "420998627@qq.com";//发送给谁
				$smtpuser = "zhaihuanyan520@163.com";//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名
				$smtppass = "JEYIZEZVGRTIDAUO";//SMTP服务器的用户密码
				$mailtitle = "您有新的报名信息";//邮件主题
				$mailcontent = "<h1>{$uname}电话：{$utel}{$lpname}</h1>";//邮件内容
				$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
				//************************ 配置信息 ****************************
				$smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
				$smtp->debug = false;//是否显示发送的调试信息
				$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
		
			echo "<script language=javascript>alert('提交成功');history.back();</script>";
			}else{
			echo "<script language=javascript>alert('提交失败');history.back();</script>";
			}
	}
	
	
if ($action=="baomingyj"){
	
	//print_r($_POST);
	//exit;
	$lpid=$_POST['lpid'];
	$pid=$_POST['pid'];
	$uname=$_POST['uname'];
	$usex=$_POST['usex'];
	$utel=$_POST['utel'];
	$utitle=$_POST['utitle'];
	$ucontent=$_POST['ucontent'];
	$ly=$_POST['ly'];
	$addtime=date('Y-m-d H:i:s');
	if($ly){
		$ucontent.="来源：".$ly;
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
			$lpname=lpname($lpid);
				//******************** 配置信息 ********************************
				$smtpserver = "smtp.163.com";//SMTP服务器
				$smtpserverport =25;//SMTP服务器端口
				$smtpusermail = "zhaihuanyan520@163.com";//SMTP服务器的用户邮箱
				$smtpemailto = "420998627@qq.com";//发送给谁
				$smtpuser = "zhaihuanyan520@163.com";//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名
				$smtppass = "JEYIZEZVGRTIDAUO";//SMTP服务器的用户密码
				$mailtitle = "您有新的报名信息";//邮件主题
				$mailcontent = "<h1>{$uname}电话：{$utel}{$lpname}</h1>";//邮件内容
				$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
				//************************ 配置信息 ****************************
				$smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
				$smtp->debug = false;//是否显示发送的调试信息
				$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
		
			echo '{"status":1,"info":"报名成功","url":""}';
			}else{
			echo '{"status":0,"info":"报名00","url":""}';
		//	echo "<script language=javascript>alert('提交失败');history.back();<//script>";
			}
	}
	
if ($action=="baoming2"){
	
	//print_r($_POST);
	//exit;
	$lpid=$_POST['lpid'];
	$pid=$_POST['pid'];
	$uname=$_POST['uname'];
	$usex=$_POST['usex'];
	$utel=$_POST['utel'];
	$utitle=$_POST['utitle'];
	$ucontent=$_POST['ucontent'];
	$ly=$_POST['ly'];
	$addtime=date('Y-m-d H:i:s');
	if($ly){
		$ucontent.="来源：".$ly;
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
			$lpname=lpname($lpid);
				//******************** 配置信息 ********************************
				$smtpserver = "smtp.163.com";//SMTP服务器
				$smtpserverport =25;//SMTP服务器端口
				$smtpusermail = "zhaihuanyan520@163.com";//SMTP服务器的用户邮箱
				$smtpemailto = "420998627@qq.com";//发送给谁
				$smtpuser = "zhaihuanyan520@163.com";//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名
				$smtppass = "JEYIZEZVGRTIDAUO";//SMTP服务器的用户密码
				$mailtitle = "您有新的报名信息";//邮件主题
				$mailcontent = "<h1>{$uname}电话：{$utel}{$lpname}</h1>";//邮件内容
				$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
				//************************ 配置信息 ****************************
				$smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
				$smtp->debug = false;//是否显示发送的调试信息
				$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
		
			echo '{"status":1,"info":"提交成功","url":"","type":"2"}';
			}else{
			echo '{"status":0,"info":"报名00","url":""}';
		//	echo "<script language=javascript>alert('提交失败');history.back();<//script>";
			}
	}	
if ($action=="wendatj"){
	
	//print_r($_POST);
	//exit;
	$lpid=$_POST['lpid'];
	
	$rowc=$mysql->query("select * from web_content where `id`='{$lpid}'");
	$cityr=$rowc[0];
	$city_id=$cityr['city_id'];
	$cityall_id=$cityr['cityall_id'];
	
	$pid=$_POST['pid'];
	$uname=$_POST['uname'];
	$usex=$_POST['usex'];
	$utel=$_POST['utel'];
	$utitle=$_POST['utitle'];
	$ucontent=$_POST['ucontent'];
	$ly=$_POST['ly'];
	$addtime=date('Y-m-d H:i:s');
	if($ly){
		$ucontent.="来源：".$ly;
		}
	
	$mysql->query("insert into `web_book`(
		`pid`,
		`lpid`,
		`cityall_id`,
		`city_id`,
		`uname`,
		`usex`,
		`utel`,
		`utitle`,
		`ucontent`,
		`addtime`
		) values (
		'{$pid}',
		'{$lpid}',
		'{$cityall_id}',
		'{$city_id}',
		'{$uname}',
		'{$usex}',
		'{$utel}',
		'{$utitle}',
		'{$ucontent}',
		'{$addtime}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0){
			$lpname=lpname($lpid);
				//******************** 配置信息 ********************************
				$smtpserver = "smtp.163.com";//SMTP服务器
				$smtpserverport =25;//SMTP服务器端口
				$smtpusermail = "zhaihuanyan520@163.com";//SMTP服务器的用户邮箱
				$smtpemailto = "420998627@qq.com";//发送给谁
				$smtpuser = "zhaihuanyan520@163.com";//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名
				$smtppass = "JEYIZEZVGRTIDAUO";//SMTP服务器的用户密码
				$mailtitle = "您有新的报名信息";//邮件主题
				$mailcontent = "<h1>{$uname}电话：{$utel}{$lpname}</h1>";//邮件内容
				$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
				//************************ 配置信息 ****************************
				$smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
				$smtp->debug = false;//是否显示发送的调试信息
				$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
		
			echo '{"status":1,"info":"提交成功","url":""}';
			}else{
			echo '{"status":0,"info":"报名00","url":""}';
		//	echo "<script language=javascript>alert('提交失败');history.back();<//script>";
			}
	}
if ($action=="bmtj"){
	
	//print_r($_POST);
	//exit;
	$lpid=isset($_POST['lpid']) ? $_POST['lpid'] : $_POST['data']['loupanid'];
	
	$rowc=$mysql->query("select * from web_content where `id`='{$lpid}'");
	$cityr=$rowc[0];
	$city_id=$cityr['city_id'] ? $cityr['city_id'] : 0;
	$cityall_id=$cityr['cityall_id'] ? $cityr['cityall_id'] : 0;
	$pid=$_POST['pid'] ? $_POST['pid'] : $_POST['data']['catid'];
	$uname=$_POST['uname'] ? $_POST['uname'] : "wap端提交";
	$usex=$_POST['usex'];
	$utel=$_POST['utel'] ? $_POST['utel'] : $_POST['data']['tel'];
	$utitle=$_POST['utitle'] ? $_POST['utitle'] : $_POST['data']['title'];
	$ucontent=$_POST['ucontent']  ? $_POST['ucontent'] : $_POST['data']['laiyuan'];
	$ly=$_POST['ly'] ? $_POST['ly'] : "-wap端视频看房";
	$addtime=date('Y-m-d H:i:s');
	
	$qy=$_POST['qy'];
	if($_POST['qy']<>''){
		$ucontent.=" 意向区域：".$_POST['qy'];
		}
	$zj=$_POST['zj'];
	if($_POST['zj']<>''){
		$ucontent.=" 总价：".$_POST['zj'];
		}
	$js=$_POST['js'];
	if($_POST['js']<>''){
		$ucontent.=" 居室：".$_POST['js'];
		}
	$mj=$_POST['mj'];
	if($_POST['mj']<>''){
		$ucontent.=" 面积：".$_POST['mj'];
		}
		
	if($ly){
		$ucontent.="来源：".$ly;
		}
	
	$mysql->query("insert into `web_book`(
		`pid`,
		`lpid`,
		`cityall_id`,
		`city_id`,
		`uname`,
		`usex`,
		`utel`,
		`utitle`,
		`ucontent`,
		`addtime`
		) values (
		'{$pid}',
		'{$lpid}',
		'{$cityall_id}',
		'{$city_id}',
		'{$uname}',
		'{$usex}',
		'{$utel}',
		'{$utitle}',
		'{$ucontent}',
		'{$addtime}'
		)");
		$ids=mysql_insert_id();
		if($ids!==0 && !empty($utel)){
			$lpname=lpname($lpid);
				//******************** 配置信息 ********************************
				$smtpserver = "smtp.163.com";//SMTP服务器
				$smtpserverport =25;//SMTP服务器端口
				$smtpusermail = "zhaihuanyan520@163.com";//SMTP服务器的用户邮箱
				$smtpemailto = "3285826289@qq.com,420998627@qq.com,zhaihuanyan520@163.com";//发送给谁
				$smtpuser = "zhaihuanyan520@163.com";//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名
				$smtppass = "JEYIZEZVGRTIDAUO";//SMTP服务器的用户密码
				// $smtpusermail = "linyouqun@163.com";//SMTP服务器的用户邮箱
				// $smtpemailto = "420998627@qq.com";//发送给谁
				// $smtpuser = "linyouqun@163.com";//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名
				// $smtppass = "yanyan38";//SMTP服务器的用户密码
				$mailtitle = "川海房产您有新的报名信息";//邮件主题
				$mailcontent = "<h1>{$uname}电话：{$utel}{$lpname}{$ly}</h1>";//邮件内容
				$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
				//************************ 配置信息 ****************************
				$smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
				$smtp->debug = false;//是否显示发送的调试信息
				$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
		
			echo '{"status":1,"info":"提交成功","url":""}';
			}else{
			echo '{"status":0,"info":"报名00","url":""}';
		//	echo "<script language=javascript>alert('提交失败');history.back();<//script>";
			}
	}
	if ($action=="getIP") {

       
		// 讲ip入库
		  $cip = $_POST['cip'];
		  $cname = $_POST['cname'];
		  $source = $_GET['ly'];
		  $addtime=date('Y-m-d H:i:s');
		  if (empty($cip) || empty($source)) {
		  	 header("Location:../404.html"); 
		  	 return false;
		  }
		  $row = $mysql->query("select * from `web_ip` where `cip`='{$cip}' order by addtime desc");
          foreach ($row as $key => $value) {
            $res_source_arr[] = $value['source'];
            $res_ip_arr[] = $value['cip'];
          }
          $res_source = in_array($source, $res_source_arr);
          $res_ip = in_array($cip, $res_ip_arr);
          $endTime = mktime(23, 59, 59, date('m'), date('d'), date('Y'));
          $rowsource = $mysql->query("select * from `web_ip` where `source`='{$source}' and `addtime` <= {$endTime} order by addtime desc");
          
          if (!$res_source || !$res_ip || date('Y-m-d',strtotime($rowsource[0]['addtime'])) < date('Y-m-d') ){
		        $mysql->query("insert into `web_ip`(`cip`,`cname`,`equipment`,`source`,`addtime`) values ('{$cip}','{$cname}','1','{$source}','{$addtime}')");
		        echo '{"status":1,"info":"提交成功","url":""}';
		   }

		    //抓取访问者手机号码
		$isphone = $_GET['isphone'];
        $rows = $mysql->query("select * from `web_zqmobile` where `mobile`='{$isphone}' order by id desc");
        $rowsource = $mysql->query("select * from `web_ip` where `mobile`='{$isphone}' and `addtime` <= {$endTime} order by addtime desc");
        if (empty($rows) || date('Y-m-d',strtotime($rowsource[0]['addtime'])) < date('Y-m-d')) {
        	 $mysql->query("insert into `web_zqmobile`(`mobile`,`addtime`) values ('{$isphone}','{$addtime}')");
	        	//******************** 配置信息 ********************************
					$smtpserver = "smtp.163.com";//SMTP服务器
					$smtpserverport =25;//SMTP服务器端口
					$smtpusermail = "zhaihuanyan520@163.com";//SMTP服务器的用户邮箱
					$smtpemailto = "594931354@qq.com,3285826289@qq.com,420998627@qq.com,zhaihuanyan520@163.com";//发送给谁
					$smtpuser = "zhaihuanyan520@163.com";//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名
					$smtppass = "JEYIZEZVGRTIDAUO";//SMTP服务器的用户密码
					// $smtpusermail = "linyouqun@163.com";//SMTP服务器的用户邮箱
					// $smtpemailto = "420998627@qq.com";//发送给谁
					// $smtpuser = "linyouqun@163.com";//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名
					// $smtppass = "yanyan38";//SMTP服务器的用户密码
					$mailtitle = "网站抓取到新的手机号码";//邮件主题
					$mailcontent = "<h1>电话：{$_GET['isphone']}</h1>";//邮件内容
					$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
					//************************ 配置信息 ****************************
					$smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
					$smtp->debug = false;//是否显示发送的调试信息
					$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
					return false;   
	    }
		  


	}
?>