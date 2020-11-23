
<!DOCTYPE html>
<html>
<?php
require("conn/conn.php");
require("function.php");
//echo $pingyi;
if($pingyi=='www'){
    header('HTTP/1.1 301 Moved Permanently');
    //跳转到你希望的地址格式 
    header('Location: http://beihai.'.$siteasd.'/');
   //header('Location: http://haikou.'.$siteasd.'');
   echo "<script language='javascript'
type='text/javascript'>"; 
echo "window.location.href='http://beihai.".$siteasd."/'"; 
echo "</script>";  
    }
$yescity = $mysql->query("select * from `web_city` where `city_pingyin`='$pingyi' and `city_st`=1 and `pid`<>0 limit 0,1");
if($yescity[0]==''){
    //header('HTTP/1.1 301 Moved Permanently');
    //跳转到你希望的地址格式 
  header('Location: http://beihai.'.$siteasd.'/');
   //header('Location: http://haikou.'.$siteasd.'');
    }
?>
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	<title>北海金秋专题-<?php echo $config['site_name'];?></title>
	<link rel="shortcut icon" href="../image/favicon.ico" />
    <meta name=keywords content="<?php echo $config['site_keyword'];?>">
    <meta name=description content="<?php echo $config['site_desc'];?>">
	<link href="/jq/css/layui.css" rel="stylesheet" />
	<link rel="stylesheet" href="/jq/css/labor.css" />	
	<script src="/jq/js/jquery.js"></script>
	<script src="/jq/js/jquery.form.js"></script>
	<script type="text/javascript" src="http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/static/layer/layer.js"></script>	


<!-- <script src="/js/jquery-3.2.1.min.js"></script> -->
<!-- <script src="/js/public.js"></script> -->
<script src="/js/alert.js"></script>

<!-- <script type="text/javascript" src="/public/static/home/js/article/common.js"></script> -->
<!-- <script src="/js/newslist.js"></script> -->
<!-- <script src="/js/jquery-1.7.2.js"></script> -->
<script src="/js/jquery.SuperSlide.2.1.1.js"></script>
<!--<script src="/js/swiper-3.4.2.min.js"></script>-->
<!-- <script src="/js/echarts.js"></script> -->
<!-- <script src="/js/jquery.range.js"></script> -->
<!-- <script src="/js/index.js"></script> -->
<!-- <script src="/js/search.js"></script> -->

<script src="/js/applyVerify.js"></script>
<script src="/js/w_apply.js"></script>
</head>
<style type="text/css">
.alert-content{
  font-size: 14px;
  padding:15px 20px;
  color:#555;
  height:100%;
  overflow: auto;
   -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -o-box-sizing: border-box;
    -ms-box-sizing: border-box;
    box-sizing: border-box;
}
.alert-btn-close{
  position: absolute;
  right:10px;
  top:3px;
  font-size: 24px;
  cursor: pointer;
  z-index: 1000;
}
.alert-container-black{
  background-color:rgba(0,0,0,0.65);
  border:none;
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#7f000000,endColorstr=#7f000000);
}
.alert-container-black .alert-content{
    color: #fff;  
}

	body{background: #fff;height: 100%}
	.build-item li{float: left;margin-right: 15px;width: 584px;height: 216px;}
	.w1200{width: 1200px;margin: 0 auto;}
	.build-item li .info-right h1 i {display: inline-block;font-style: normal;font-size: 12px;border: 1px solid #fd6071;border-radius: 50px;padding: 0 3px;position: relative;top: -2px;left: 10px;font-weight: normal;background: #fd6071;color: #fff;}
	.build-item li {padding: 15px 10px;background: #FFF;margin-top: 30px;border-radius: 5px;width: 49.2%;box-sizing: border-box;-moz-box-sizing: border-box;-webkit-box-sizing: border-box;}
	.build-item li {float: left;margin-right: 30px;width: 584px;height: 210px;}
	.fiex {width: 170px;height: 600px;position: fixed;top: 15%;background: none;border-radius: 100px;overflow: hidden;left: 50%;margin-left: 609px;}
	.build-item li .thumb-left {height: 185px;border-radius: 5px;overflow: hidden;float: left;-moz-box-shadow: 1px 1px 2px #888;-webkit-box-shadow: 1px 1px 2px #888;box-shadow: 1px 1px 2px #888;margin-right: 15px;overflow: hidden;}
	.zuo2{float:left;padding-top:3px}
	.mingzi2 input{height:45px;margin-right:20px;padding-left:10px;width:200px;background:#fff;border:1px solid #fff;color:#898989;font-size:14px}
	.js-ajax-submit{background:#fb8306 none repeat;font-size:22px;width:150px;height:47px;color:#fff;margin-left:40px;border:0;background-color:none;-moz-box-shadow:2px 2px 5px #000;-webkit-box-shadow:2px 2px 5px #000;box-shadow:2px 2px 3px rgba(0,0,0,.2);border-radius:23px;cursor:pointer}
	.count p.btn{width:59%;letter-spacing:1px;padding:8px 0;font-size:16px;font-weight:400;background:linear-gradient(#f99b00,#f99b00,#f99b00);margin:auto;border-radius:50px;text-align:center;margin-top:7px}
	.fl{float: left;}
	.fr{float: right;}
	.count p.btn a {color: #fff;}
	.fiex-thumb{margin-top:0 }
	.count .footer{position:absolute;bottom:-118px;left:0px;width:100%}
	.house-list-ul li{float: left;margin-right: 20px;width: 360px;height: 424px;}
	.house-list-ul li img{width: 100%}
	.house-list-ul li .pic{position: relative;overflow: hidden;border-top-right-radius:7px;border-top-left-radius:7px;}
	.house-list-ul li .pic .status{background: #ff1e1e;color: #fff;position: absolute;top: 10px;left: 20px;padding: 4px 8px;border-radius: 3px;}
	.house-list-ul li .txt{background: #fff;padding: 10px;border-bottom-right-radius:7px;border-bottom-left-radius:7px;}
	.house-list-ul li .txt p{padding-bottom: 5px;}
	.house-list-ul li .txt .hui {background: #ffe2e2;height: 26px;border-radius: 3px;padding: 5px;line-height: 26px;}
	.btn {padding-left: 10px;padding-right: 10px;}
	.btn span {border: 1px solid #ec0000;border-radius: 5px;display: inline-block;color: #ec0000;padding: 5px 20px;text-indent: 20px;}
	.btn span.zx {background: url(/public/theme/jianjun/2019630/msg.png) no-repeat;margin-right: 98px;background-size: 26px 26px;background-position: 10px 2px;}
	.btn span.call {background: url(/public/theme/jianjun/2019630/tel.png) no-repeat;background-size: 20px 20px;background-position: 12px 4px;position: relative;}
	.house-list-ul li .txt .btn-2{padding-left: 10px;padding-right: 10px;}
	.info-list{background: #fff;border-radius: 27px;padding: 20px;}
	.info-list .c{border: 2px dashed #6bac4c;border-radius: 27px;padding: 20px;}
	.info-list .c h3{color: #ec0000;font-size: 18px;font-weight: 700}
	.fiex-thumb{width: 100%}
	.count p.xl{margin-top: 0}
	.count{height: 426px;}
	.count p.number,.count .sm{color: #fff}
	.house-list-ul .pic .tit{position: absolute;bottom: 0px;left: 0px;color: #fff;font-size: 24px;background: rgba(0,0,0,.6);width: 100%;line-height: 45px;padding-left: 6px;}
	.count .sm{margin: 0}
	.swiper-container{height: 471px;}
	.pic-box-2{position: relative;height: 471px;}
	.pic-box-2 .pic{padding: 20px;z-index: 10;position: absolute;}
	.titile{font-size: 20px;}
	.info p{line-height: 29px;}
	.count .sm i {display: inline-block;width: 13px;height: 13px;background: url(/jq/images/ewm_03.gif) no-repeat;background-size: 100% 100%;}
	.scrolltext ol li {padding-left: 7px;width: 300px;height: 25px;font-size: 13px;line-height: 25px;}
	.scrolltext ol li a {color: #000;display: block;width: 371px;white-space: nowrap;text-overflow: ellipsis;-o-text-overflow: ellipsis;overflow: hidden;}
	.scrolltext {padding: 15px 15px 0 14px;width: 371px;height: 90px;overflow: hidden;    }
	#breakNews .list6 {overflow: hidden;width: 100%;}
	#breakNewsList span{padding-right: 30px;}
	.bm-ul li{height: 35px;margin-bottom: 10px;}
	.bm-ul .txt{height: 30px;width: 220px;float: left;border: 1px solid #e1e1e1;padding-left: 5px;}
	.window{height:380px;width:736px;z-index:999;display:none;position:fixed}
	.windowTop{background:#00aded;width:736px;height:80px;color:#fff;position:relative}
	.windowTop h1{font-size:30px;padding-top:10px;padding-left:20px;text-align:center}
	.windowTop p{font-size:16px;padding-left:20px;text-align:center}
	.shut{position:absolute;right:20px;top:15px}
	.windowBottom{background:#fff;width:736px;padding:0 0 20px 0}
	.windowSignLeft{float:left;padding-left:55px}
	.windowSignLeft input{border:solid 1px #000;width:200px;height:38px;margin-top:30px;margin-left:20px}
	.windowSignLeft span{font-size:18px}
	.windowSignRight{float:left;margin-left:80px}
	.windowSignRight .dianhua{border:solid 1px #000;width:200px;height:38px}
	.xingbie{margin-top:30px;margin-bottom:30px}
	.windowSignRight span{font-size:18px;padding-right:10px}
	.windowSignRight .xsns{font-size:26px}
	.bulk{width:222px;margin:0 auto;padding-top:25px;padding-bottom:25px}
	.bulk button{background:#00aded;color:#fff;font-size:24px;padding:5px 40px;border-radius:20px}
	.alert{background:#000 none repeat scroll 0 0;opacity:.5;position:fixed;top:0;width:100%;z-index:2}
	.jiesong p{font-size:14px;text-align:center}
	.tag2 span{border: 1px solid #ddd;padding: 2px 8px;color: #999;margin-right: 10px;}
	.pic2-ul li{width: 230px;float: left;margin-right: 30px;}
	.tag{margin: 8px 0 8px 0;}
	.tag span{ border: 1px solid #ee0000;color: #ee0000;padding: 2px 5px;margin-right: 5px;}
	.nav{background:#fff4d0;}
	.nav-2 li{float: left;width: 19.66%;text-align: center;height: 306px;}
	.ul-bm .inp{height: 35px;padding-left: 8px;border: 0;width: 190px;border-radius: 3px;}
	.ul-bm li{margin-bottom: 10px;}
	.btm2{border:0;height: 35px;background:#e5eab6;width: 100%;color: #ff5a00;font-size: 16px;cursor: pointer;font-weight: 700;}
	.tags {line-height: 30px;margin-top: 10px;}
	.tags span{color: #999}
	.p1-ul li{float: left; margin-right: 17px;}
	.p1-ul li img{width: 150px;height: 114px;}
</style>
	<body>
		<!--头部大图:begin-->
		<div class="w100b top-thumb">	    	
			<img src="/jq/images/p_02.jpg" alt="" />					
			<img src="/jq/images/p_03.jpg" alt="" />					
			<img src="/jq/images/p_04.jpg" alt="" />					
		</div>	
		<div class="nav">
			<div class="w1200">
				<img src="/jq/images/p_06.jpg" alt="" />	
				<div class="clear"></div>
			</div>
		</div>
		<div style="height: 30px;"></div>	
		<div class="w1200" style="text-align: center;background: url('/jq/images/m_20.jpg') no-repeat;height: 154px;">
			<form class="submit_area">
				    <input type="hidden" name="pid" value="33">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="lpid" value="0">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="ly" value="中部_广告">     <!--报名来源 具体查看applyVerify.js文件中source 标识说明-->
                    <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->
                    <input type="hidden" name="name" value="北海金秋专题_报名">
				<div style="height: 91px;"></div>
				<div style="width: 400px;height: 45px;background: #fff;margin: 0 auto;border-radius: 21px;position: relative;">
					 <input type="text" name="mobile" id="phone8" placeholder="请输入您的电话号码" style="position: absolute;left: 10px;top: 5px;border: 0;height: 35px;">
					 <button type="button" class="slider-submit  apply_submit" value="我要报名" style="background: #ec2e17;border-radius: 21px;height: 46px;position: absolute;right: -24px;top: -1px;width: 147px;border: 0;color: #fff;font-size: 18px;cursor: pointer;">我要报名</button>
				</div>
			</form>
		</div>
		<div style="height: 30px;"></div>
		<p style="text-align: center;"><img src="/jq/images/p_14.jpg" alt=""/></p>		
		<div style="height: 30px;"></div>
		<!-- 热门楼盘 -->
		  <?
            $rowlistrm = $mysql->query("select * from `web_content` where `pid`=9 and `city_id` = '{$city_id}' order by px20 desc limit 0,1");
            foreach($rowlistrm as $k=>$listrm){
              $url='/loupan/'.$listrm['id'].'.html';
          ?>
		  <div class="w1200" style="margin-top: 40px;">
			<div style="float: left;width: 485px;height: 400px;">
				<div style="border:3px solid #f7562c;position: relative;background:#fff;">
					<div style="position: absolute;right: 10px;top: -10px;"><img src="/jq/images/hui2.png" alt="" /></div>
					<div style="padding: 20px 30px 7px;">
						<a href="<?php echo $url;?>" style="display: block;" target="_blank"><h3 style="font-size: 30px;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $listrm['title'];?></h3></a>
						<div class="tags">
							 <?php echo loupanflagtsi2($listrm['flagts'],6,4);?><!-- 楼盘特色 -->
							<!-- <span>海景房</span><span>特价优惠</span><span>免费接机</span>						 -->
						</div>
		 				<div style="margin-top: 10px;" class="info4">
		 					<div style="background:#ffe5d2 url('/jq/images/hui.png') left no-repeat;height: 37px;">
		 						<span style="line-height: 40px;font-size: 18px;padding-left: 55px;color: #f00;"><?php echo $listrm['fkfs'];?></span>
		 					</div>
		 					<p>主力户型：<?php echo $listrm['zlhx']?></p>	<!-- 主力户型 -->
		 					<!-- <p>装修情况：</p>	  -->					
		 					<p>地      址：<?php echo $listrm['xmdz']?></p>
		 				</div>
		 				<div style="margin-top: 10px;">
		 					<span style="font-size: 16px;color: #f50909">参考均价：</span><span style="font-size: 30px;color: #f50909"><?php echo $listrm['jj_price'];?></span><span style="font-size: 16px;color: #f50909">元/㎡</span>
		 				</div>
		 				<div class="btn" style="margin-top: 10px;">
		 					<a href="javaScript:group('<?php echo $listrm['title'];?>',<?php echo $listrm['id'];?>,'我要报名');">
		 					<img src="/jq/images/bm.png"></a>
		 					</a>
		 				</div>
					</div>
				</div>
				<div class="" style="margin-top: 16px;">
					<a href="<?php echo $url;?>" style="display: block;"  target="_blank">
					<ul class="p1-ul" style="width: 502px;">
					 <?php
					    $lpid = $listrm['id'];
			            $rowpic = $mysql->query("select pic_img from `web_pic` where `pid_flag`='xc3' and `luopan_id`=$lpid order by id desc limit 0,3");
			            foreach($rowpic as $k=>$pic){
			          ?>	
						<li><img src="<?php echo $pic['pic_img']?>"></li>		
						<?php } ?>	
					</ul>
				</a>
				</div>
			</div>
			<div style="float: right;width: 680px;height: 445px;">
				<a href="<?php echo $url;?>" style="display: block;" target="_blank">
				<img src="../<?php echo $listrm['img'];?>" style="width: 680px;height: 445px;">
			</a>
			</div>
			<div class="clear"></div>			
		</div>
	    <?php } ?>
		<!-- 热门楼盘 end -->
				<!--头部大图:end-->		
		<style type="text/css">
		.x3 p{font-size: 16px;line-height: 25px;}
		.x3-ul li{float: left; margin-right: 20px;width: 48%;}
		.tel-box{line-height: 52px;padding-left: 15px;}
		.tel-box .c1{ font-size: 18px; }
		.tel-box .c2{ font-size: 30px;font-weight: bold; }
		.tel-box .c1,.tel-box .c2{color: #c71d17}
		</style>
		<div style="text-align: center;">					
			<div style="width: 1200px;margin: 0 auto;">
				<div style="height: 30px;"></div>
				<p><img src="/jq/images/p_17.jpg" alt=""/></p>				
				<div style="height: 30px;"></div>
				<div class="h1"> 
					<!-- 1 -->
					<ul class="x3-ul">
						<?
			              $hot = $mysql->query("select * from `web_content` where `pid`=9 and `city_id` = '{$city_id}' order by px18 desc limit 0,2");
			              foreach($hot as $k=>$hotlist){
			                $url='/loupan/'.$hotlist['id'].'.html';
			            ?> 
						<li>
							<div style="height: 475px;background-size: 100%;border-radius: 7px;border:2px solid #ff3d16;background: #fff;">
								<div style="padding: 15px;">
									<div class="pic" style="height: 275px;overflow: hidden;">
										<a href="<?php echo $url?>" style="display: block;" target="_blank">
										<div class="fl" style="width: 342px;height: 275px;position: relative;">
											<img src="../<?php echo $hotlist['img'];?>" alt="<?php echo $hotlist['title'];?>" style="width: 342px;height: 275px;">
											<span class="tit" style="position: absolute;bottom: 0;background: rgba(51, 51, 51, 0.71);font-size: 20px;color: #fff;padding: 4px 10px 3px 10px;width: 322px;left: 0;text-align: left;"><?php echo $hotlist['title'];?></span>
											<span  style="position: absolute;left: 10px;top: 10px;background: #ff1e1e;color: #fff;padding: 2px 6px;border-radius: 3px;">在售</span>										 
										</div>
										</a>
										<div class="fl" style="margin-left: 20px;">
                     <?php
					    $lpid = $hotlist['id'];
			            $rowpic = $mysql->query("select pic_img from `web_pic` where `pid_flag`='xc3' and `luopan_id`=$lpid order by id desc limit 0,2");
			            foreach($rowpic as $k=>$pic){
			          ?>
						<div style="margin-bottom: 8px;"><img src="<?php echo $pic['pic_img']?>" style="width: 178px;height: 134px;"></div>
                      <?php
                        }
                      ?>

										</div>
										<div class="clear"></div>
									</div>
									<div style="height: 15px;"></div>
									<div style="background:#ffe5d2 url('/jq/images/hui.png') left no-repeat;height: 37px;margin-bottom: 10px;">
		 								<p style="text-align: left;line-height: 40px;font-size: 18px;padding-left: 55px;color: #f00;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $hotlist['fkfs'];?></p>
		 							</div>
									<!-- <p style="text-align: left;color: #f50909;font-size: 16px;padding-bottom: 10px;">全款98折</p> -->
									<p style="text-align: left;color: #999;font-size: 14px;">建面：<?php echo $hotlist['zlhx']?></p>
									<!-- <p style="text-align: left;padding-top: 8px;color: #999;font-size: 14px;">装修：</p> -->
									<p style="text-align: left;padding-top: 8px;color: #999;font-size: 14px;">地址：<?php echo $hotlist['xmdz']?></p>
									<div style="height: 8px;"></div>
									<div class="tel-box" style="background: url(/jq/images/btn.jpg) no-repeat;background-size: 100% 100%;">
										<div class="fl">
											<span class="c1">参考均价：</span><span class="c2"><?php echo $hotlist['jj_price'];?></span><span class="c1" style="padding-left: 2px;">元/㎡</span>
										</div>
										<div class="fr" style="margin-right: 20px;margin-top: 2px;">
											<a href="javaScript:group('<?php echo $hotlist['title'];?>',<?php echo $hotlist['id'];?>,'我要报名');" style="background: #dc1e1c;font-size: 18px;color: #fff;padding: 10px 30px;border-radius: 5px;">我要报名</a>
										</div>
										<div class="clear"></div>
									</div>
								</div>
							</div>
						</li>
						<?php
				          }
				        ?>
						<div class="clear"></div>
					</ul>
					<!-- end -->					
				</div>
				<div style="height: 20px;"></div>
			</div>
		</div>		
<style type="text/css">
.tags span{    border: 1px solid #ddd;padding: 3px 10px;margin-right: 5px;}
.txt2{background: #fff;padding: 10px;}
.txt2 p{padding-bottom: 2px;}
.xx2-ul li{float: left;}
.info3 p{padding-bottom: 10px;font-size: 16px;color: #666}
.info4 p{padding-bottom: 4px;font-size: 16px;color: #666}
.ul4 li{width: 550px;float: left;margin-right: 20px;border: 3px solid #ff3d16;margin-bottom: 25px;padding: 12px;background: #fff}
.ul4 .pic{float: left;width: 270px;position: relative;}
.ul4 .pic .status{background: #ff1e1e;color: #fff;position: absolute;top: 10px;left: 10px;padding: 5px 10px 5px;border-radius: 3px;}
.ul4 .inf{float: left;width: 280px}
.ul4 .inf h3{font-size: 28px;padding-bottom: 10px;}
.ul4 .s3,.ul4 .s4{color: #f50909}
.ul4 .s4{font-size: 28px;font-weight: 700}
.ul4 .txt{padding-bottom: 10px;}
.ul4 .btn{padding-top: 10px;}
</style>	
		<div style="height: 20px;"></div>
		<div style="width: 1200px;margin: 0 auto;">
				<div style="height: 30px;"></div>
				<p style="text-align: center;"><img src="/jq/images/p_19.jpg" alt=""/></p>				
				<div style="height: 30px;"></div>			
			 	<ul class="ul4">
			<?
              $row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px3 desc limit 0,4");
              foreach($row as $k => $youlist){
                $url='/loupan/'.$youlist['id'].'.html';
            ?> 
			 		<li>
			 			<div class="pic">
			 				<a href="<?php echo $url?>" style="display: block;" target="_blank">
			 				<img src="<?php echo $youlist['img'];?>" alt="<?php echo $youlist['title'];?>" style="width: 250px;height: 255px;">
			 				<span class="status">在售</span>
			 				</a>
			 			</div>
			 			<div class="inf">
			 				<a href="<?php echo $url;?>" style="display: block;" target="_blank"><h3><?php echo $youlist['title'];?></h3></a>
			 				<div style="background:#ffe5d2 url('/jq/images/hui.png') left no-repeat;height: 37px;margin-bottom: 10px;">
		 						<p style="text-align: left;line-height: 40px;font-size: 18px;padding-left: 55px;color: #f00;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;"><?php echo $youlist['fkfs'];?></p>
		 					</div>			 				
			 				<div class="txt"><span class="s3">参考均价：</span><span class="s4"><?php echo $youlist['jj_price'];?></span><span class="s3">元/㎡</span></div>
			 				<div class="txt" style="overflow: hidden; white-space: nowrap; text-overflow: ellipsis"><span class="s1">主力户型：</span><span class="s2"><?php echo $youlist['zlhx']?></span></div>
			 				<!-- <div class="txt"><span class="s1">装修情况：</span><span class="s2"></span></div> -->
			 				<div class="txt"><span class="s1">地址：</span><span class="s2"><?php echo $youlist['xmdz'];?></span></div>
			 				<div class="btn">
			 					<a href="javaScript:group('<?php echo $youlist['title'];?>',<?php echo $youlist['id'];?>,'我要报名');">
		 						<img src="/jq/images/bm.png"></a>
			 				</div>
			 			</div>
			 		</li>
			 	<?php } ?>		 		
			 		<div class="clear"></div>
			 	</ul> 
		</div>	
		<div class="w100b">			
			<div style="height: 30px;"></div>		
			<div class="w1200" style="text-align: center;position: relative;">
				<img src="/jq/images/p_21.jpg" alt="" />
				<img src="/jq/images/p_22.jpg" alt="" />
				<div style="position: absolute;bottom: 27px;width: 100%;"><span style="font-size: 20px;color: #f00;">活动有效期：2020.11.1-11.30</span></div>
			</div>			
		</div>			
			<div style="height: 20px;"></div>
			<p style="text-align: center;color: #f00;font-size: 20px;">活动期间，可通过活动页面报名或者来电方式进行参与</p>
			<div style="height: 20px;"></div>
		<!--随屏右:begin-->
		<div class="fiex" style="display: none;width: 255px;background: url(/jq/images/right.png) no-repeat">
			<div class="count" style="width: 263px;">				
				<div style="margin-left: 10px;height: 410px;position: relative;">
					<div style="height: 245px;position: absolute;width: 255px;bottom: -58px;right: 6px;">					
					<div class="sm call">免费咨询热线<!-- <i></i> -->
						<!-- <div class="qrcode" style="display: none;">
						<span class="txt">扫码拨号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>省时 高效 问底价</span><img src="http://cdn.lou86.com/public/qrcode/2018-10-01/dd85pp_1538367144_citycall_100.png" alt="" style="width: 126px;height: 120px;"></div> -->
					</div>					
					<p class="number"><?php echo $config['company_tel'];?></p>
					<p class="btn"><a href="https://dht.zoosnet.net/LR/Chatpre.aspx?id=DHT78207896&cid=634f7e02a0d049d4ab6ba340e9bdc782&lng=cn&sid=d31c86da9af84d16aadaa466ba40cc57&p=http%3A//beihai.loushitong.com/loupan/&rf1=http%3A//beihai.loushitong&rf2=.com/&msg=&d=1604892628490" target="_blank">咨询优惠</a></p>
					<p class="btn"><a href="https://dht.zoosnet.net/LR/Chatpre.aspx?id=DHT78207896&cid=634f7e02a0d049d4ab6ba340e9bdc782&lng=cn&sid=d31c86da9af84d16aadaa466ba40cc57&p=http%3A//beihai.loushitong.com/loupan/&rf1=http%3A//beihai.loushitong&rf2=.com/&msg=&d=1604892628490" target="_blank">咨询户型</a></p>
					<p class="btn"><a href="https://dht.zoosnet.net/LR/Chatpre.aspx?id=DHT78207896&cid=634f7e02a0d049d4ab6ba340e9bdc782&lng=cn&sid=d31c86da9af84d16aadaa466ba40cc57&p=http%3A//beihai.loushitong.com/loupan/&rf1=http%3A//beihai.loushitong&rf2=.com/&msg=&d=1604892628490" target="_blank">咨询价格</a></p>
					<p class="btn"><a href="https://dht.zoosnet.net/LR/Chatpre.aspx?id=DHT78207896&cid=634f7e02a0d049d4ab6ba340e9bdc782&lng=cn&sid=d31c86da9af84d16aadaa466ba40cc57&p=http%3A//beihai.loushitong.com/loupan/&rf1=http%3A//beihai.loushitong&rf2=.com/&msg=&d=1604892628490" target="_blank">咨询购房资格</a></p>
					</div>										
				</div>				
			</div>
		</div>
		<!--随屏右:end-->
<div style="height: 140px;"></div>
 <div class="footr_gr" style="background: url(/jq/images/down.jpg);height: 130px; width: 100%;position: fixed;bottom: 0px;z-index: 1200;">
 	<div class="w1200">
 		<div class="fooe_logo fl" style="width: 40%;margin-top: 17px;height:55px;position: relative;"></div>
		 <div class="ld-area fr" style="margin-top: 0;">
				<div class="ipt-area">				
					<form method="post" id="from-gfj-1" class="submit_area">
						<input type="hidden" name="pid" value="33">              <!-- 0 为公共报名，其它为楼盘ID-->
                        <input type="hidden" name="lpid" value="0">              <!-- 0 为公共报名，其它为楼盘ID-->
                        <input type="hidden" name="ly" value="底部_随屏">     <!--报名来源 具体查看applyVerify.js文件中source 标识说明-->
                        <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->
                        <input type="hidden" name="name" value="北海金秋专题_报名">
			
						<div class="zuo2" style="margin-top: 5px;padding-left: 20px;"><p class="mingzi2">
						<p style="color: #fff;font-size: 16px;padding-bottom: 5px;">正值秋意浓 实惠购好房</p>
						<input id="gjf-phone-1" name="mobile" placeholder="请输入手机号码" type="text" style="height: 33px;width: 282px;text-indent: 10px;"></p>
						<p style="color: #fff;font-size: 18px;padding-top: 8px;">免费咨询热线： <?php echo $config['company_tel'];?></p></div>				
						<button class="js-ajax-submit slider-submit apply_submit" style="margin-top: 27px;font-size: 18px;height: 40px;" type="button">免费报名</button>
					</form>
				</div>
			</div>
		<div style="clear: both;"></div>
	</div>
 </div>
 <!-- 报名 -->
 <div class="alert"></div>
<div class="window">
	<div class="windowTop">
		<h1>我要报名</h1>
		<p>(楼盘信息一步到位！)</p>
		<a class="shut" href="javascript:delbox();"><img src="/jq/images/close.png"></a>
	</div>
	<div class="windowBottom">
		<form  class="form-horizontal js-ajax-form" id="from-up5" method="post" action="../signup.php">
			<!-- <input type="hidden" id="house_id" value="" name="post[house_id]">
			<input type="hidden" name="post[sounce]" id="lpsounce" value="北海金秋专题">	
			<input type="hidden" name="upcode" value=""> -->
	            <input type="hidden" name="pid" value="33">              <!-- 0 为公共报名，其它为楼盘ID-->
                <input type="hidden" name="lpid" id="lpid" value="0">              <!-- 0 为公共报名，其它为楼盘ID-->
                <input type="hidden" name="ly" value="北海金秋专题_楼盘报名">     <!--报名来源 具体查看applyVerify.js文件中source 标识说明-->
                <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->
                <!-- <input type="hidden" name="name" value="北海金秋专题_报名"> -->

			<div class="windowBottomLeft">
				<div class="windowSign clearfix">
					<div class="windowSignLeft">
						<p><span>意向楼盘:</span><input type="text" name="utitle" id="loupan"></p>
						<p><span>姓&ensp;&ensp;&ensp;名 :</span><input type="text" name="name"></p>
					</div>					
					<div class="windowSignRight">
						<p class="xingbie"><span>手 机 :</span><input class="dianhua" type="text" name="mobile" id="phone5"></p>
						<p class="">
							<span>性 别 :</span><input type="radio" class="" name="usex" value="先生" checked="">
							<span class="xsns">先生</span><input type="radio" class="" name="usex" value="女士"><span class="xsns">女士</span>
						</p>
					</div>					
					
				</div>
			</div>			
			<div class="bulk form-actions">
				<button type="submit" class="js-ajax-submit" style="width: 190px;margin-top: 15px;">报名看房</button>
			</div>			
			<div class="jiesong">
				<p>我们将及时为您发送符合您需求的优质楼盘资料，专线服务热线（24小时服务）<?php echo $config['company_tel'];?></p>
				<p>报名享受接机住宿安排！</p>
			</div>			
		</form>
	</div>	
</div>
<script src="/jq/js/echo.min.js"></script>
<script>Echo.init({offset: 0,throttle: 0});</script>
<!-- Initialize Swiper -->
<script>
	// 鼠标经过扫码拨号事件
	$(".call").hover(function () {
		$(".qrcode",this).show();
	}, function () {
		$(".qrcode",this).hide();
	});		
	// 滚动随屏
	$(window).scroll(function (){
		var height = $(this).scrollTop();
		if(height >= 400){
			$('.fiex').fadeIn();
		}else{
			$('.fiex').fadeOut();
		}
	});
	// 商务通状态监听
	$('.swtopen').click(function(){  
		$('#LRdiv2').css('display','block');  
		$('#LRMINIWIN').css('display','block');  
	});

	function lrminiMin() {
		$('#LRdiv2').css('display','none');  
		$('#LRfloater2').css('display','none'); 
	}
	$(function(){
	    $('#from-gfj-1').ajaxForm({
	        beforeSubmit: checkForm1, 
	        success: complete,        
	        dataType: 'json'
	    });
	    $('#from-up4').ajaxForm({
	        beforeSubmit: checkForm2, 
	        success: complete,        
	        dataType: 'json'
	    });
	    $('#from-up5').ajaxForm({
	        beforeSubmit: checkForm5, 
	        success: complete,        
	        dataType: 'json'
	    });
	    $('#fromup8').ajaxForm({
	        beforeSubmit: checkForm8, 
	        success: complete,        
	        dataType: 'json'
	    });	
	    function checkForm1(){
	        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;        
	        if(!mobile.test($.trim($('#gjf-phone-1').val()))){            
	        　layer.msg('手机号码格式非法', {icon: 5});
	          $('#gjf-phone-1').focus(); 
	          return false;
	        }       
	    }
	    function checkForm2(){
	        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;        
	        if(!mobile.test($.trim($('#lp-zx-mobile').val()))){            
	        　layer.msg('手机号码格式非法', {icon: 5});
	          $('#lp-zx-mobile').focus(); 
	          return false;
	        }       
	    }
	    function checkForm5(){
	        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;        
	        if(!mobile.test($.trim($('#phone5').val()))){            
	        　layer.msg('手机号码格式非法', {icon: 5});
	          $('#phone5').focus(); 
	          return false;
	        }       
	    }
	    function checkForm8(){
	        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;        
	        if(!mobile.test($.trim($('#phone8').val()))){            
	        　layer.msg('手机号码格式非法', {icon: 5});
	          $('#phone8').focus(); 
	          return false;
	        }       
	    }
	    function complete(data){
	    	// console.log(data);
	    	$url = '/jq.html';
	        if(data.code==200){
	            layer.closeAll('loading');
	            layer.msg(data.msg, {icon: 1}); 
	            window.setTimeout("window.location='"+$url+"'",2000);
	            return false;
	        }else{
	            layer.closeAll('loading');
	            layer.msg(data.msg, {icon: 5});
	            return false;   
	        }
	    }  
	});		
function group(txt,id,title){	
    if(txt){
        var obj = document.getElementById("loupan");
        obj.value = txt;
    }else{
        var obj = document.getElementById("loupan");
        obj.value = ' ';
    }
    if (id) {
        var obj = document.getElementById("lpid");
        obj.value = id;
    }else{
        var obj = document.getElementById("lpid");
        obj.value = ' ';
    }
    iBoxWidth = $(".window").width();
    iBoxHeight = $(".window").height();
    iWinWidth = $(window).width();
    iWinHeight = $(window).height();
    $(".window").css("left", (iWinWidth / 2 - iBoxWidth / 2) + "px");
    $(".window").css("top", (iWinHeight / 2 - iBoxHeight / 2) + "px");
    $(".window").fadeIn();
    $(".alert").height(document.body.offsetHeight);
    $(".alert").show();
    $("#house_id").val(id);
    $("#bm-tit").html(title);
}
function delbox(){
    $(".window").fadeOut();
    $(".alert").hide();
}
</script>	
</html>