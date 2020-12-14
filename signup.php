<?php
include("conn/conn.php");
header('Content-type:text/json');
require_once "Smtp.class.php";
// var_dump($_POST);
// 	exit;
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
if(!empty($_POST['mobile']) || !empty($_POST['data']['tel'])) {
    $all=array();
    $city=$_GET['id'];
    $all['code']=200;
    $all['msg']='提交成功';
    	$lpid=isset($_POST['lpid']) ? $_POST['lpid'] : $_POST['data']['loupanid'];
    	$pid=$_POST['pid'] ? $_POST['pid'] : $_POST['data']['catid'];
    	$uname=$_POST['name'] ? $_POST['name'] : $_POST['data']['name'];
    	$usex=$_POST['usex'];
    	$utel=$_POST['mobile'] ? $_POST['mobile'] : $_POST['data']['tel'];
    	$utitle=$_POST['utitle'];
    	$ucontent=$_POST['ucontent']  ? $_POST['ucontent'] : $_POST['data']['ucontent'];
    	$intention_city=$_POST['intention_city'];
    	$intention_housetype=$_POST['intention_housetype'];
    	$intention_lp=$_POST['intention_lp'];
    	$intention_price=$_POST['intention_price'];
    	$ly=$_POST['ly']  ? $_POST['ly'] : "-视频看房";
    	$addtime=date('Y-m-d H:i:s');
    	// var_dump($lpid);die();
    	if($intention_city<>""){
    		$ucontent.='　意向区域:'.$intention_city;
    		}
    	if($intention_housetype<>""){
    		$ucontent.='　意向户型:'.$intention_housetype;
    		}
    	if($intention_lp<>""){
    		$ucontent.='　意向楼盘:'.$intention_lp;
    		}
    	if($intention_price<>""){
    		$ucontent.='　意向价格:'.$intention_price;
    		}
    	if($ly<>""){
    		$ucontent.='　提交来源:'.$ly;
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
    // 		var_dump($ids);die();
    		if($ids!==0 && !empty($utel)){
    			$lpname=lpname($lpid);
    				//******************** 配置信息 ********************************
    				$smtpserver = "smtp.163.com";//SMTP服务器
    				$smtpserverport =25;//SMTP服务器端口
    				$smtpusermail = "zhaihuanyan520@163.com";//SMTP服务器的用户邮箱
    				$smtpemailto = "420998627@qq.com,594931354@qq.com";//发送给谁
    				// $smtpemailto = "420998627@qq.com";//发送给谁
    				$smtpuser = "zhaihuanyan520@163.com";//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名
    				$smtppass = "JEYIZEZVGRTIDAUO";//SMTP服务器的用户密码
    				$mailtitle = "川海房产您有新的报名信息";//邮件主题
    				$mailcontent = "<h1>{$uname}电话：{$utel}-{$lpname}{$ly}</h1>";//邮件内容
    				$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
    				//************************ 配置信息 ****************************
    				$smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
    				$smtp->debug = false;//是否显示发送的调试信息
    				$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
    		
    		
    			echo json_encode($all);
    			exit();
    			$all['status']=1;
    			echo json_encode($all);
    			exit();
    			}else{
    			$all['code']=300;
    			$all['msg']='提交失败';
    			echo json_encode($all);
    			exit();
    			}
    		echo json_encode($all);
    		exit();
}else {
			// 讲ip入库
		  $cip = $_POST['cip'];
		  $cname = $_POST['cname'];
		  $source = $_GET['ly'];
		  $addtime=date('Y-m-d H:i:s');
		  if (empty($cip) || empty($source)) {
		  	 header("Location:../404.html");
		  	 return false;
		  }
		  $row = $mysql->query("select * from `web_ip` where `cip`='{$cip}'");
		  foreach ($row as $key => $value) {
            $res_source_arr[] = $value['source'];
            $res_ip_arr[] = $value['cip'];
          }
          $res_source = in_array($source, $res_source_arr);
          $res_ip = in_array($cip, $res_ip_arr);
          if (!$res_source || !$res_ip){
		        $mysql->query("insert into `web_ip`(`cip`,`cname`,`equipment`,`source`,`addtime`) values ('{$cip}','{$cname}','1','{$source}','{$addtime}')");
		        echo '{"status":1,"info":"提交成功","url":""}';
		   }
}
