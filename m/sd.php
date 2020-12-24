
<!DOCTYPE html>
<html lang="zh-cn">
<?php
require("../conn/conn.php");
include("function.php");
if($sitecityid==""){
	//header("location:city.html");
	echo "<script language='javascript'
type='text/javascript'>"; 
echo "window.location.href='http://beihai.".$siteasd."/m/'"; 
echo "</script>";  
	}

require_once('360_safe3.php');
require_once "Smtp.class.php";

// $smtpserver = "smtp.163.com";//SMTP服务器
// 				$smtpserverport =25;//SMTP服务器端口
// 				$smtpusermail = "zhaihuanyan520@163.com";//SMTP服务器的用户邮箱
// 				// $smtpemailto = "468928049@qq.com";//发送给谁
// 				$smtpemailto = "420998627@qq.com";//发送给谁
// 				$smtpuser = "zhaihuanyan520@163.com";//SMTP服务器的用户帐号，注：部分邮箱只需@前面的用户名
// 				$smtppass = "JFHXMXYSTYXZWEFQ";//SMTP服务器的用户密码
// 				$mailtitle = "您有新的报名信息";//邮件主题
// 				$mailcontent = "<h1>我真的好爱你电话：18677941504</h1>";//邮件内容
// 				$mailtype = "HTML";//邮件格式（HTML/TXT）,TXT为文本邮件
// 				//************************ 配置信息 ****************************
// 				$smtp = new Smtp($smtpserver,$smtpserverport,true,$smtpuser,$smtppass);//这里面的一个true是表示使用身份验证,否则不使用身份验证.
// 				$smtp->debug = false;//是否显示发送的调试信息
// 				$state = $smtp->sendmail($smtpemailto, $smtpusermail, $mailtitle, $mailcontent, $mailtype);
// 				print_r($state);
// die();
?>
	<head>
		<meta charset="UTF-8">
	    <meta name="format-detection" content="telephone=no">
	    <meta name="renderer" content="webkit">
	    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1.0,minimum-scale=1.0">
	    <meta name="csrf-param" content="_csrf">
        <title><?php echo $config['site_name'];?></title>
        <meta name=keywords content="<?php echo $config['site_keyword'];?>">
        <meta name=description content="<?php echo $config['site_desc'];?>">
  
   
    	<script src="//www.lou86.com/public/static/phone/js/v2.1/flexible.js?v=2.0.1"></script>       	
		<script src="/public/static/libs/jquery/1.x/jquery.min.js" type="text/javascript"></script>
		<script src="//www.lou86.com/public/static/common/js/jquery.form.js"></script>    
	    <script src="//www.lou86.com/public/static/libs/layer/mobile/layer.js"></script> 	
<?php include("sq2.php");?> 
	</head>
<style type="text/css">
	body {background: #d20101;font-family: "微软雅黑",Arial,Verdana, Geneva, sans-serif;font-size: 3.8vw;max-width: 640px;width: 100%;min-width: 320px;position: relative;margin: 0 auto;}
	input[type="button"], input[type="submit"], input[type="reset"] {-webkit-appearance: none;}
	textarea {-webkit-appearance: none;}   
	/*以及圆角*/
	.button{ border-radius: 0; } 
	.top-thumb img{display: block;width: 100%;}
	.list-c{width: 95%;margin: 0 auto;height: 4.10rem;background-size: 100%;border-radius: 3px;}
	.h10{height: 10px;}
	.h20{height: 20px;}
	.pr{position: relative;}
	.clear{clear: both;}
	.list-c .pic{width: 3.4rem;height: 2.45rem;float: left;}
	.list-c .pic img {width: 3.4rem;height: 2.4rem;border-radius: 5px;}
	.list-c .c{padding: .20rem .10rem;border: 1px solid #fcffa6;border-radius: 5px;}
	.list-c .txt{width: 5.0rem;float: left;padding-left: 5px;}
	.list-c .txt .i1{font-size: .305rem;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;text-align: left;color: #fff;padding-bottom: .15rem;}
	.list-c .txt h1 {color: #333333;font-size: .45rem;line-height: .6rem;font-weight: normal;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;padding-bottom: .15rem}
	.list-c .txt .tag{padding-bottom: .10rem}
	.list-c .txt .tag span{border: 1px solid #fff;color: #fff;font-size: .3rem;padding: 1px 5px;margin-right: 5px;border-radius: 3px;}
	.list-c .c .bm{border-top: 1px solid #fcffa6;padding-top: 2px;}
	.list-c .c .txt a .list-c .c .pic a{display: block;}
	.list-c .c .bm .b-f{float: left;width: 5.5rem;margin-top: 3px;border-right: 1px solid #fcffa6;line-height: .85rem}
	.list-c .c .bm .b-r{float: right;line-height: 1rem;}
	.list-c .c .bm .btn-2{background: #f9870e;color: #fff;padding: .15rem .65rem;border-radius: 17px;}
	.list-c .c .bm .b-f .p1{color: #fcffa6;font-size: .405rem;}
	.list-c .c .bm .b-f .p2{color: #fcffa6;font-weight: bold;font-size: .65rem;}
	.list-c .c .bm .b-f .p3{color: #fcffa6}
	.a-footer-layer {background: #fff;z-index: 10;width: 100%;position: fixed;bottom: 0;}
	.shou3-box {position: relative;height: 45px;}
	.c {display: block;zoom: 1;}
	.shou3-list3{float:left;position:relative;top:0;width:35%}
	.shou3-list3 a{display:block;background:#fff;color:#ff7602;padding:.23rem 0;text-align:center;font-size:.5rem}
	.shou3-list3 img{width: .6rem;margin-top: -5px;margin-left: .10rem;}
	.shou3-list2{float:left;position:relative;top:0;width:65%}
	.shou3-list2 a{display:block;background:#ff7602;color:#fff;padding:.23rem 0;text-align:center;font-size:.5rem}
	.shou3-list2 img{width:.6rem;margin-top:3px;position:absolute;left:1.5rem}
	.w_box8 .w_btn input{width:100%;height:1.2rem;line-height:1.2rem;text-align:center;color:#fff;background:#48bf01;display:block;border-radius:4px;border:0;font-size:.5rem}
	.down2{position: relative;}
	.down2 .time{left: 3.1rem;bottom: .46rem;position: absolute;}
	.bm-box {width: 95%;margin: 10px auto 0;height: 6.45rem;border-radius: 7px;position: relative;background: url(//www.lou86.com/public/theme/s11/m_08.jpg) no-repeat;background-size: 100% 100%;}
	.bm-box .tit {width: 6rem;position: absolute;left: 1.64rem;top: -.35rem;}
	.bm-box .tit img{width: 100%}
	.bm-box .c{padding: .20rem 1rem .2rem 1rem}
	.bm-box .tit1{padding-bottom: 5px;}
	.bm-box .tit1 p{color: #fff;}
	.bm-box .tit1 em{color: #fcff00;}
	.bm-box .btn-2 {margin-top: 10px;}
	.bm-box .btn-2 .inp{ width: 4.69rem;height: 35px;border-radius: 5px;border: 0;padding-left: 5px;}
	.scrolltext {padding: 10px 10px 0;width: 7.0rem;height: 2.05rem;overflow: hidden;background: #e0dede;border-radius: 5px;}
	.scrolltext ol li{padding-left:7px;width:7.3rem;height:25px;font-size:13px;line-height:25px;}
	.scrolltext ol li a{color:#000;display:block;width:7.0rem;white-space:nowrap;text-overflow:ellipsis;-o-text-overflow:ellipsis;overflow: hidden;}
	.scrolltext ol li a:hover{color:#000;text-decoration:none;}
	#breakNews{padding:0 0 0px 2px;}
	#breakNews .list6{height:330px;overflow:hidden;width:100%;}
	.backicon {position: absolute;left: 10px;top: 10px;width: 40px;height: 40px;border-radius: 100%;background: rgba(0,0,0,.3) url(//www.lou86.com/public/static/phone/image/v2.0/w-back.png) center no-repeat;background-size: 10px;z-index: 10;}
	.backi {position: absolute;right: 10px;top: 10px;width: 40px;height: 40px;border-radius: 100%;background: rgba(0,0,0,.3) url(//www.lou86.com/public/static/phone/image/nav/nav-11.png) 9px 7px no-repeat;background-size: 60%;z-index: 10;}
	.hui {width: 92%;margin: 0 auto;}
	.hui li{float: left;width: 50%;}
	.hui li img{width: 100%}
	.h15{height: 15px;}
	.com-pic img{width: 100%}
	.new-list .c{width: 100%;margin: 0 auto;height: 14rem;}
	.new-list .c .house-list .pic {position: relative;width: 100%;}
	.new-list .c .house-list .pic img{width: 100%}
	.new-list .c .house-list .pic .tit{position: absolute;bottom: 0;background: rgba(51, 51, 51, 0.71);font-size: 0.5rem;color: #fff;padding: 4px 10px 3px 10px;width: 100%;left: 0}
	.new-list .c .house-list .hi .hi-info{margin-left: 90px;padding-top: 0;width: 6.5rem;overflow: hidden;}
	.new-list .c .house-list .hi .hi-info .tag{margin-top: 2px;margin-bottom: 5px;}
	.new-list .c .house-list .hi .hi-info .tag span{float: left;border: 1px solid #ddd;font-size: .30rem;padding: 1px 2px;margin-right: 5px;color: #666;border-radius: 3px;}
	.new-list .c .house-list .hi .hi-info p{font-size: .305rem;color: #999}
	.new-list .c .house-list .hx li{ float: left;}
	.new-list .c .house-list .hx li .hxpic{width: 100%;height: 2.78rem;}
	.bm-box-c{width: 75%;margin: 0 auto;height: 3.8rem; }
	.bm-box-c li{margin-bottom: .20rem;}
	.bm-box-c .inp{border: 0;height: .85rem;line-height: .85rem;border-radius: 3px;width: 97%;padding-left: 8px;}
	.fl{float: left;}
	.btn2{width: 2rem;height: 1rem;border:0;background:transparent;color: #b91712;border-radius: 3px;margin-left: 10px;}
	.tags span {color: #fff;border: 1px solid #fff;padding: 2px 6px;border-radius: 3px;margin-right: 5px;font-size: .25rem}
	.mt10{margin-top: 10px;}
</style>	
<body>		
	<div class="w100b top-thumb" style="position: relative;">
		<a href="javascript:history.go(-1)" id="navBtn" class="backicon"></a>
		<a href="javascript:;" id="navBtn" class="backi"></a>		
		<img src="//www.lou86.com/public/theme/20201222/m_01.jpg" alt="" />						
		<img src="http://www.lou86.com/public/theme/20201222/m_02.jpg" alt="" />													
		<img src="//www.lou86.com/public/theme/20201222/m_03.jpg" alt="" />															
		<img src="//www.lou86.com/public/theme/20201222/m_04.jpg" alt="" />	
		<img src="//www.lou86.com/public/theme/20201222/m_05.jpg" alt="" />	
		<img src="//www.lou86.com/public/theme/20201222/m_06.jpg" alt="" />	
		<img src="//www.lou86.com/public/theme/20201222/m_07.jpg" alt="" />	

	</div>	
	<div class="bm-box">		
		<div style="height: 40px;"></div>
		<div class="c">
			<div class="tit1"><p style="line-height: 25px;">累计昨天参团人数：<em>289人</em></p></div>			
			<div class="scrolltext">
				<div id="breakNews">
					<ol id="breakNewsList" class="list6">
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0023&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>					
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0289&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>					
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****2633&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>					
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0023&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>					
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;186****9865&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>					
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;188****3256&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0023&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0023&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0023&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0289&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0289&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0289&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****2633&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0023&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;186****9865&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;188****3256&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0023&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0023&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0023&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0023&nbsp;&nbsp;&nbsp;(2020-12-23)</a></li>

						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0289&nbsp;&nbsp;&nbsp;(2020-12-22)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0289&nbsp;&nbsp;&nbsp;(2020-12-22)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0289&nbsp;&nbsp;&nbsp;(2020-12-22)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****2633&nbsp;&nbsp;&nbsp;(2020-12-22)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0023&nbsp;&nbsp;&nbsp;(2020-12-22)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;186****9865&nbsp;&nbsp;&nbsp;(2020-12-22)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;188****3256&nbsp;&nbsp;&nbsp;(2020-12-22)</a></li>
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0023&nbsp;&nbsp;&nbsp;(2020-12-22)</a></li>
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0289&nbsp;&nbsp;&nbsp;(2020-12-22)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****2633&nbsp;&nbsp;&nbsp;(2020-12-22)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0023&nbsp;&nbsp;&nbsp;(2020-12-22)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;186****9865&nbsp;&nbsp;&nbsp;(2020-12-22)</a></li>	
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;188****3256&nbsp;&nbsp;&nbsp;(2020-12-22)</a></li>
						<li><a  href="javaScript:;">川海看房团&nbsp;&nbsp;&nbsp;185****0023&nbsp;&nbsp;&nbsp;(2020-12-22)</a></li> 
						<div class="clear"></div>
					</ol>
				</div>
			</div>
			<div class="btn-2">

				<form id="frmup_shuang_1" method="post"  action="/m/save">
                     
			    <input type="hidden" name="lpid" value="0"> <!-- 0 为公共报名，其它为楼盘ID-->
		        <input type="hidden" name="ly" value="【<?php echo $sitecityname;?>】_移动端_年终报名" id="make_tit_4"> <!-- 0 为公共报名，其它为楼盘ID-->
		        <input type="hidden" name="pid" value="33">
		        <input type="hidden" name="action" value="bmtj">
		        <input type="hidden" name="uname" value="双旦专题">
		         <input type="hidden" name="equipment" value="1">        <!--来源设备 （ PC端  2,手机端   1 ）-->
				<input type="text"   name="utel"  class="inp" id="phone2" maxlength="11" placeholder="请输入您的手机号码">
				<input type="submit" style="width: 2.5rem;height: 35px;border: 0;background: #ffdd57;font-size: .40rem;color: #b91712;border-radius: 5px;" value="参加团购">
				</form>

			</div>
			<div class="clear"></div>
		</div>
	</div>
<!--精品推荐 -->
	<div class="h20"></div>	
	       <?
              $rowlistrm = $mysql->query("select * from `web_content` where `pid`=9 and `city_id` = '42' order by px20 desc limit 0,1");
              foreach($rowlistrm as $k=>$listrm){
                $url='/loupan/'.$listrm['id'].'.html';
            ?>
	<div style="background: url(http://www.lou86.com/public/theme/s11/m_10.jpg) no-repeat;background-size: 100%;height: 13rem;">
				<div style="width: 85%;height: 12rem;margin: 0 auto;">
			<div style="height: 2.1rem"></div>
			<div class="pic" style="border: 2px solid #fffdb9;position: relative;">
				<a href="<?php echo $url;?>" style="display: block;"><img src="../<?php echo $listrm['img'];?>" style="width: 8.40rem;display: block;height: 5rem">
				<div style="position: absolute;left: 15px;top: -10px;"><img src="http://www.lou86.com/public/theme/nz/hui2.png" style="width: 58px;"></div>
				</a>
			</div>
			<div class="txt">
				<div style="position: relative;">
				<a href="<?php echo $url;?>" style="display: block;"><h3 style="font-size: .55rem;color: #fff;padding-top: 5px;padding-bottom: 0"><?php echo $listrm['title'];?></h3></a>
				<span style="position: absolute;right: 10px;top: 5px;background: #ff1e1e;font-size: 12px;color: #fff;padding: 4px 7px;border-radius: 3px;">在售</span>
				</div>
				<div class="tags" style="padding-bottom: .25rem;font-size: .35rem;margin-top: 1px;">
					<?php echo loupanflagtsi2($listrm['flagts'],6,4);?>
					<!-- <span>海景房</span><span>特价优惠</span><span>免费接机</span><span>养老</span> -->				
				</div>
				<div style="background:#ffe5d2 url('//www.lou86.com/public/theme/nz/hui.png') left no-repeat;height: 27px;background-size: 38px;">
					<span style="line-height: 27px;font-size: .355rem;padding-left: 42px;color: #f00;"><?php echo $listrm['fkfs'];?></span>
				</div>
				<p style="color: #fff;line-height: 25px;">主力户型：<?php echo $listrm['zlhx']?></p>
				<p style="color: #fff;line-height: 25px;">地      址：<?php echo $listrm['xmdz']?></p>
				<div class="btn" style="line-height: 40px;">
					<div class="fl" style="width: 6.1rem;color: #fcffa6">
						<span>参考均价：</span><span style="font-size: .75rem"><?php echo $listrm['jj_price'];?></span><span>元/㎡</span>
					</div>
					<div class="fl">
						<a href="https://byt.zoosnet.net/LR/Chatpre.aspx?id=BYT35574945&cid=a1062762b2c444b3a4a51af0d15beb0a&lng=cn&sid=6b08d724350e4473a55764d93a8ab433&p=http%3A//beihai.chuanhai.jtr168.cn/&rf1=&rf2=&msg=&d=1608787061031" style="background: #fa840e;color: #fff;padding: 6px 16px;border-radius: 3px">预约看房</a>
					</div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		</div>
	<?php } ?>
<!--精品推荐 end -->
<!-- 品质优盘 -->
	<div class="h10"></div>	

	<div style="background: url(//www.lou86.com/public/theme/s11/m_11.jpg) no-repeat;background-size: 100%;height: 11.5rem;">
		<div style="height: 2.10rem"></div>
		<div style="width: 93%;margin: 0 auto">
		   <?
              $hot = $mysql->query("select * from `web_content` where `pid`=9 and `city_id` = '42' order by px18 desc limit 0,2");
              foreach($hot as $k=>$hotlist){
                $url='/loupan/'.$hotlist['id'].'.html';
            ?> 	
		  <div class="list-c pr" style="margin-bottom: 20px;">			
			<div class="c">
				<div class="pic" style="position: relative;">
					<a href="<?php echo $url;?>"><img src="../<?php echo $hotlist['img'];?>" alt="<?php echo $hotlist['title'];?>" /></a>
					<span style="position: absolute;left: 5px;top: 5px;background: #ff1e1e;color: #fff;padding: 2px 6px;border-radius: 3px;font-size: 12px;">在售</span>
				</div>
				<div class="txt">
					<a href="<?php echo $url;?>">
					<h1  style="color: #fff;"><?php echo $hotlist['title'];?></h1>
					<div class="tag">
						<?php echo loupanflagtsi2($hotlist['flagts'],6,4);?>
						<!-- <span>精装修</span><span>专车看房</span><span>特价优惠</span> -->
					</div>
					<p  class="i1"><?php echo $hotlist['zlhx']?></p>
					<div style="background:#ffe5d2 url('//www.lou86.com/public/theme/nz/hui.png') left no-repeat;height: 30px;background-size: 38px;">
 						<span style="line-height: 30px;font-size: .355rem;padding-left: 42px;color: #f00;"><?php echo $hotlist['fkfs'];?></span>
 					</div>
					</a>
				</div>
				<div class="clear"></div>
				<div style="height: 5px;"></div>
				<div class="bm">
					<div class="b-f"><span class="p1">参考均价：</span><span class="p2"><?php echo $hotlist['jj_price'];?></span><span class="p3">元/㎡</span></div>
					<div class="b-r"><a href="https://byt.zoosnet.net/LR/Chatpre.aspx?id=BYT35574945&cid=a1062762b2c444b3a4a51af0d15beb0a&lng=cn&sid=6b08d724350e4473a55764d93a8ab433&p=http%3A//beihai.chuanhai.jtr168.cn/&rf1=&rf2=&msg=&d=1608787061031" class="btn-2">预约看房</a></div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
<?php
          }
        ?>
	    
			
		</div>
	</div>
<!-- 品质优盘 end-->

<!-- 买房优选  -->
<style type="text/css">
.ul3 li{float: left;width: 49.35%;border: 1px solid #fff;}
</style>
	<div class="h10"></div>	
	<div style="background: url(//www.lou86.com/public/theme/s11/m_12.jpg) no-repeat;background-size: 100%;height: 18.2rem;position: relative;">
		<div style="height: 2.60rem"></div>
		<div style="width: 93%;margin: 0 auto;overflow-y: scroll;height: 14.5rem;">


			<?
              $row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px3 desc limit 0,10");
              foreach($row as $k => $youlist){
                $url='/loupan/'.$youlist['id'].'.html';
            ?> 
				<div class="list-c pr" style="margin-bottom: 35px;">			
			<div class="c">
				<div class="pic" style="position: relative;">
					<a href="<?php echo $url;?>"><img src="../<?php echo $youlist['img'];?>" alt="<?php echo $youlist['title'];?>" /></a>
<span style="position: absolute;left: 5px;top: 5px;background: #ff1e1e;color: #fff;padding: 2px 6px;border-radius: 3px;font-size: 12px;">在售</span>
				</div>
				<div class="txt">
					<a href="<?php echo $url;?>">
					<h1  style="color: #fff;"><?php echo $youlist['title'];?></h1>

					<div class="tag"><?php echo loupanflagtsi2($youlist['flagts'],6,4);?></div>
					<p  class="i1"><?php echo $youlist['zlhx']?></p>
					<div style="background:#ffe5d2 url('//www.lou86.com/public/theme/nz/hui.png') left no-repeat;height: 30px;background-size: 38px;">
 						<span style="line-height: 30px;font-size: .355rem;padding-left: 42px;color: #f00;"><?php echo $youlist['fkfs'];?></span>
 					</div>
					</a>
				</div>
				<div class="clear"></div>
				<div style="height: 5px;"></div>
				<div class="bm">
					<div class="b-f"><span class="p1">参考均价：</span><span class="p2"><?php echo $youlist['jj_price'];?></span><span class="p3">元/㎡</span></div>
					<div class="b-r"><a href="https://byt.zoosnet.net/LR/Chatpre.aspx?id=BYT35574945&cid=a1062762b2c444b3a4a51af0d15beb0a&lng=cn&sid=6b08d724350e4473a55764d93a8ab433&p=http%3A//beihai.chuanhai.jtr168.cn/&rf1=&rf2=&msg=&d=1608787061031" class="btn-2">预约看房</a></div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
		  <?php } ?>		
			
				
			
					
		</div>
		<div style="position: absolute;bottom: 30px;text-align: center;width: 100%;"><img src="//www.lou86.com//public/image/icons/up.png" style="width: 40px;"></div>
	</div>	
	<!-- 买房优选 end -->

	<div class="top-thumb" style="position: relative;width: 95%;margin: 0 auto;">
		<img src="../imgs11/m_14.jpg" alt="" />		
		<img src="//www.lou86.com/public/theme/s11/m_15.jpg" alt="" />		
		<p  style="text-align: center;line-height: 1.1rem;position: absolute;bottom: 0px;width: 100%;">
		<span style="color: #f7562c;">活动时间：2020.12.23-2021.1.3</span></p>
	</div>					
	<div style="height: 10px;"></div>	
	<p  style="text-align: center;color: #fff">活动期间，可通过活动页面报名或者来电方式进行参与</p>
	<div style="height: 60px;"></div>	
<div class="a-footer-layer">
    <div class="shou3-box c">
	  <div class="shou3-list3">
		<a href="https://byt.zoosnet.net/LR/Chatpre.aspx?id=BYT35574945&cid=a1062762b2c444b3a4a51af0d15beb0a&lng=cn&sid=6b08d724350e4473a55764d93a8ab433&p=http%3A//beihai.chuanhai.jtr168.cn/&rf1=&rf2=&msg=&d=1608787061031" rel="nofollow"><img class="lastimg" src="//www.lou86.com/public/theme/year/time.png">预约看房
		</a>
	  </div>
      <div class="shou3-list2">                  
          <a href="tel:<?php echo $config['company_tel'];?>" rel="nofollow">
          <img class="lastimg" src="//www.lou86.com/public/static/phone/img/icons/tel.png">电话咨询</a>
       </div>  	     	  
    </div>
</div>
</body>
<script type="text/javascript" src="//cdn.lou86.com/public/static/phone/js/ScrollText.js" ></script>
<script>
var scroll2 = new ScrollText("breakNewsList","pre2","next2",true,50,true);
scroll2.LineHeight = 63;
// 报名提交
$(function(){
  $('#frmup_shuang').ajaxForm({
    beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
    success: complete, // 这是提交后的方法
    dataType: 'json'
  });
  $('#frmup_shuang_1').ajaxForm({
    beforeSubmit: checkFor2, // 此方法主要是提交前执行的方法，根据需要设置
    success: complete, // 这是提交后的方法
    dataType: 'json'
  });
  $('#frm3').ajaxForm({
    beforeSubmit: checkFor3, // 此方法主要是提交前执行的方法，根据需要设置
    success: complete, // 这是提交后的方法
    dataType: 'json'
  });
  $('#frm4').ajaxForm({
    beforeSubmit: checkFor4, // 此方法主要是提交前执行的方法，根据需要设置
    success: complete, // 这是提交后的方法
    dataType: 'json'
  });
  function checkForm(){
        var utel = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!utel.test($.trim($('#theme2-mobile-shuang').val()))){            
          layer.open({content: '手机号格式非法',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});         
          $('#theme2-mobile-shuang').focus(); 
          return false;
        }
       layer.open({type: 2});
    }
    function checkFor2(){
        var utel = /^1[3|4|5|6|7|8|9]\d{9}$/;       
        if(!utel.test($.trim($('#phone2').val()))){            
          layer.open({content: '手机号格式非法',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});                  
          $('#phone2').focus(); 
          return false;
        }
       layer.open({type: 2});
    }
    function checkFor3(){
        var utel = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!utel.test($.trim($('#phone5').val()))){            
          layer.open({content: '手机号格式非法',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});                   
          $('#phone5').focus(); 
          return false;
        }
       layer.open({type: 2});
    }
    function checkFor4(){
        var utel = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!utel.test($.trim($('#phone4').val()))){            
          layer.open({content: '手机号格式非法',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});                   
          $('#phone4').focus(); 
          return false;
        }
       layer.open({type: 2});
    }
 function complete(data){  
     console.log(data);   
    if(data.status==1){
       layer.closeAll('loading');
       layer.open({content: data.info,time: 2 ,style: 'background: rgba(34,187,98,255); color:#fff; border:none;' });  
       window.setTimeout("window.location='"+data.url+"'",2000);
       return false;
    }else{
      layer.open({content: data.info,time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;' });      
      return false;
    }
  }
  })
</script>
<style type="text/css">
input[type="button"], input[type="submit"], input[type="reset"] {-webkit-appearance: none;}
textarea {-webkit-appearance: none;}   
.w_box8{background-color:#fff;width:88%;margin:auto;left:0;top:55%;right:0;z-index:2000;position:fixed;margin-top:-50%;border-radius:4px;display:none}
.w_box8 .w_head{border-bottom:#eaeaea 1px solid;position:relative;border-radius:2px}
.w_box8 .w_head p{font-size:18px;color:#48bf01;line-height:48px;text-align:center}
.w_box8 .w_head .closes {width: 1rem;height: 1.5rem;position: absolute;margin: auto;right: 40px;top: -102px;bottom: 0;}.w_body_t{padding:10px 10px 0;font-size:.45rem;line-height:23px}
.w_box8 .w_input{    margin: .5rem .3rem;}
.w_box8 .w_input input{width:100%;border:0;text-indent:10px;background-color:#f6f6f6;height:1rem;border-radius:4px;margin-top:10px;display:block;font-size:.4rem}
.w_box8 .w_btn{padding:0 10px}
.w_box8 .w_btn input{width:100%;height:1.2rem;line-height:1.2rem;text-align:center;color:#fff;background:#48bf01;display:block;border-radius:4px;border:0;font-size:.5rem}
.w_box8 .w_btn{margin-bottom:10px;margin-top:10px}
.s_alert8{display: none;background: rgba(0,0,0,0.65);position: fixed;left: 0;width: 100%;height: 1200px;top: 0px;z-index: 100;}
</style>
<!-- 弹窗 -->
<div class="w_box8">
    <form id="frm_com_1" method="post" action="/beihai/ajax_enroll/">
    <input type="hidden" name="post[house_id]" id="com-houseid-2">
    <input type="hidden" name="post[sounce]" id="com-sounce-2">    
    <input type="hidden" name="post[subject]" id="com-subject-2">
    <input type="hidden" name="post[name]" value="游客">
    <input type="hidden" name="upcode" value="">   
    <input type="hidden" name="fangwenUrl" value="http://m.lou86.com/beihai/s11/">    
    <input type="hidden" name="frm_id" id="com-frm-2" value="1">   
    <div class="w_head"><p id="com-title-2">专车看房</p>
    <div class="closes"><a onclick="wid_close();"><img src="/public/static/phone/img/icons/close.png"></a></div></div>
    <div class="w_body">
        <p class="w_body_t" id="com-info-2">请正确填写您的信息。免费获取购房优惠折扣政策，不再错失购房良机</p>
        <div class="w_input">
            <input type="tel" placeholder="请输入手机号码" class="enter-tel"  name="post[phone]" id="com-phone-1" maxlength="11">
        </div>
        <div class="w_btn">            
            <input type="submit" value="提交" class="enter-btn">
        </div>
    </div>
    </form>
</div>
<!--订阅动态 end-->
<div class="s_alert8"></div>
<script type="text/javascript">
function openwid8(tit,tits,frm,type,hid,subject) {  
    $("#com-title-2").html(tit);  
    $("#com-info-2").html(tits);  
    $("#com-sounce-2").val(frm);  
    $("#com-frm-2").val(type);      
    $("#com-houseid-2").val(hid);      
    $("#com-subject-2").val(subject);      
    $(".w_box8").fadeIn();
    $(".s_alert8").height(document.body.offsetHeight);
    $(".s_alert8").show();
}
function wid_close() {
    $(".w_box8").fadeOut();
    $(".s_alert8").hide();    
}
$(function(){
  $("#navBtn,#navBtn1").click(function(){
        toggleFixMenu('.nav');
    });
  $('#frm_com_1').ajaxForm({
    beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
    success: complete, // 这是提交后的方法
    dataType: 'json'
  });
  function checkForm(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#com-phone-1').val()))){            
         layer.open({content: '手机号格式非法',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});
          $('#com-phone-1').focus(); 
          return false;
        }
       layer.open({type: 2});
    }
 // function complete(data){     
 //    if(data.status==1){
 //       layer.closeAll('loading');
 //       layer.open({content: data.info,time: 2 ,style: 'background: rgba(34,187,98,255); color:#fff; border:none;' });  
 //       window.setTimeout("window.location='"+data.url+"'",2000);
 //       return false;
 //    }else{
 //      layer.open({content: data.info,time: 1 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;' });      
 //      return false;
 //    }
 //  }
  });
/*遮罩*/
function toggleFixMenu(obj) {
    $(".sFix").each(function (e) {
        var cls = $(this).attr('class');
        if (cls.indexOf(obj.replace('.', '')) >= 0) {
            $(obj).fadeToggle(0);
        } else {
            $(this).fadeOut(0);
        }
    });
}    
</script>
<style type="text/css">
.header {position: relative;overflow: hidden;height: 1.33rem;border-bottom: 1px solid #ddd;background-color: #fbfbfb;line-height: 1.1rem}
.header .go-back {position: absolute;left: .32rem;width: .32rem;top: .1rem;}
.header .go-back .ico-return {float: left;margin-top: .3583rem}
.nav .u-link {position: absolute;top: 0;right: .32rem}
.nav .u-link li {float: left}
.nav .u-link li.link-home {margin-right: .37rem}
.nav .u-link li .ico-home {margin-top: .4516rem}
.nav .u-link .link-home img{width: 26px; height: 26px;}
.ico-return {width: .2667rem;height: .4533rem;}
.u-link li .ico-user {margin-top: .3585rem}
.ico {display: inline-block;overflow: hidden;background: url(/public/static/phone/image/icons/ico-left.png) 0 0 no-repeat;background-size: 100% 100%;text-indent: -9999px;}
.city-change{overflow:hidden;text-align:center;font-size:.4rem;line-height: 1.4rem;}
.city-change .tit{display:block;width:100%;height:100%;line-height:1.4rem;text-align:center;font-size:.5rem;white-space:nowrap;text-overflow:ellipsis;overflow:hidden}    
</style>
<div class="nav sFix">
    <div style="height: 5px;"></div>
    <div class="header" style="z-index: 999;">
            <!--返回上一页-->
            <div class="go-back">
               <a href="/s11.html">
                    <span class="ico ico-return">返回上一页</span>
                </a>
            </div>
            <!--切换城市-->
        <div class="city-change"><span class="text">双11狂欢</span> </div>
        <!--用户行为跳转-->
        <ul class="u-link" style="top: .3rem;right: .2rem;">
            <li class="link-home"><a href="javascript:;" id="navBtn" style="display: block;"><img src="/public/static/phone/image/nav/nav.png"></a></li>                 
        </ul>
    </div>
    <ul>
        <li><a href="/m/"><p><img src="/public/static/phone/img/nav/nav_18.png" alt="首页"></p>首页</a></li>
        <li><a href="/m/loupan/"><p><img src="/public/static/phone/img/nav/nav_01.png" alt="新房查询"></p>新房查询</a></li>
		<li><a href="/m/loupan/index_0_0_0_tsa1_1.html"><p><img src="/public/static/phone/img/nav/nav_02.png" alt="海景房"></p>海景房</a></li>  
		<li><a href="/m/loupan/index_0_0_0_ts6_1.html"><p><img src="/public/static/phone/img/nav/nav_03.png"></p>别墅</a></li>
		<li><a href="/m/news/"><p><img src="/public/static/phone/img/nav/nav_12.png"></p>楼市</a></li>        
        <li><a href="/m/loupan/ttsa6"><p><img src="/public/static/phone/img/nav/nav_05.jpg"></p>特价房</a></li>
        <li><a href="http://fangchenggang.<?php echo $siteasd;?>/m/"><p><img src="/public/static/phone/img/nav/nav_17.png"></p>防城港新房</a></li>              
        <li><a href="http://beihai.<?php echo $siteasd;?>/m/"><p><img src="/public/static/phone/img/nav/nav_07.png"></p>北海新房</a></li>
      
        <li><a href="/m/loupan/index_0_0_0_ts2_1.html"><p><img src="/public/static/phone/img/nav/nav_11.png"></p>商铺</a></li>     
        <li><a href="/m/find/"><p><img src="/public/static/phone/image/nav/nav-2.png"></p>帮我找房</a></li>
    </ul>
    <div class="fixMask"></div>
</div>
<style type="text/css">
.nav{ position:fixed;left:0;right:0;top:0;padding:0px 0 0 0; max-width:480px; margin:0 auto;background: #fff}
.nav ul{position:relative; z-index:89;background: #fff;height: 408px;}
.nav li{ float:left; width:25%;}
.nav li a{ display:block; text-align:center; font-size:13px; padding:5px; color:#000;line-height: 23px}
.nav li img{width: 40px; height: 40px;}
.nav li ins{ display:block;margin:0 auto 3px auto;font-size:24px;width:50px;height:50px;line-height:50px;border-radius:50%;border:1px solid rgba(255,255,255,0.3); text-shadow:none;}
.nav li a:hover ins,.nav li a.current ins{ border-color:rgba(255,255,255,0);background-color:#0368AE;}
.sFix{display:none;z-index:888}
.fixMask{position:fixed;left:0;right:0;top:51px;width:100%;height:100%;margin:0 auto;background-color:#000;-moz-opacity:.95;-khtml-opacity:.8;opacity:.8;z-index:88}
</style>
</html>
<?php include("sq.php");?>
