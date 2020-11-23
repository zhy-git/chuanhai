<!DOCTYPE html>
<html>
<?php
require("../conn/conn.php");
include("function.php");
if($sitecityid==""){
//header("location:city.html");
echo "<script language='javascript'type='text/javascript'>"; 
echo "window.location.href='http://beihai.".$siteasd."/m/'"; 
echo "</script>";  
}
require_once('360_safe3.php');
require_once "Smtp.class.php";
?>
<head>
	<meta charset="UTF-8">
	<meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1.0,minimum-scale=1.0">
	<title>金秋专题-<?php echo $config['site_name'];?></title>
    <meta name=keywords content="<?php echo $config['site_keyword'];?>">
    <meta name=description content="<?php echo $config['site_desc'];?>">
	<script src="/m/jq/js/flexible.js?v=21.0.1"></script>       	
	<script src="/m/jq/js/jquery.min.js"></script>
	<script src="/m/jq/js/jquery.form.js"></script>    
    <script src="/m/jq/js/layer.js"></script> 		
    <link href="/m/jq/css/layer.css" type="text/css" rel="styleSheet" id="layermcss">
    <link rel="shortcut icon" href="../image/favicon.ico" />
    <?php include("sq2.php");?> 
    <?php include("sq.php");?> 
</head>
<style type="text/css">
body {background: #fff;font-family: "微软雅黑",Arial,Verdana, Geneva, sans-serif;font-size: 3.8vw;max-width: 640px;width: 100%;min-width: 320px;position: relative;margin: 0 auto;}
input[type="button"], input[type="submit"], input[type="reset"] {-webkit-appearance: none;}
textarea {-webkit-appearance: none;}   
/*以及圆角*/
.button{ border-radius: 0; } 
.top-thumb img{display: block;width: 100%;}
.list-c{width: 95%;margin: 0 auto;height: 4.55rem;background: #fff;background-size: 100%;border-radius: 3px;}
.h10{height: 10px;}
.h20{height: 20px;}
.pr{position: relative;}
.clear{clear: both;}
.list-c .pic{width: 3.4rem;height: 2.45rem;float: left;}
.list-c .pic img {width: 3.4rem;height: 2.4rem;border-radius: 5px;}
.list-c .c{padding: .40rem .25rem;}
.list-c .txt{width: 5.2rem;float: left;padding-left: 10px;}
.list-c .txt .i1{font-size: .305rem;overflow: hidden;white-space: nowrap;text-overflow: ellipsis;text-align: left;color: #333;padding-bottom: .15rem;color: #999}
.list-c .txt h1 {color: #333333;font-size: .45rem;line-height: .6rem;font-weight: normal;white-space: nowrap;overflow: hidden;text-overflow: ellipsis;padding-bottom: .15rem}
.list-c .txt .tag{padding-bottom: .10rem}
.list-c .txt .tag span{border: 1px solid #adadad;color: #adadad;font-size: .3rem;padding: 1px 5px;margin-right: 5px;border-radius: 3px;}
.list-c .c .bm{border-top: 1px solid #ddd;padding-top: 2px;}
.list-c .c .txt a .list-c .c .pic a{display: block;}
.list-c .c .bm .b-f{float: left;width: 5.8rem;margin-top: 3px;border-right: 1px solid #ddd;line-height: .85rem}
.list-c .c .bm .b-r{float: right;line-height: 1rem;}
.list-c .c .bm .btn-2{background: #f9870e;color: #fff;padding: .15rem .65rem;border-radius: 17px;}
.list-c .c .bm .b-f .p1{color: #ff4218;font-size: .405rem;color: #999}
.list-c .c .bm .b-f .p2{color: #f50909;font-weight: bold;font-size: .65rem;}
.list-c .c .bm .b-f .p3{color: #f50909}
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
.bm-box {width: 95%;margin: 10px auto;height: 2.8rem;border-radius: 7px;position: relative;background: url(/m/jq/images/m_08.jpg) no-repeat;background-size: 100% 100%;}
.bm-box .tit {width: 6rem;position: absolute;left: 1.64rem;top: -.35rem;}
.bm-box .tit img{width: 100%}
.bm-box .c{padding: .15rem .35rem}
.bm-box .tit1{padding-bottom: 5px;}
.bm-box .tit1 p{color: #fff;}
.bm-box .tit1 em{color: #fcff00;}
.bm-box .btn-2 {margin-top: 6px;}
.bm-box .btn-2 .inp{ width: 5.69rem;height: 35px;border-radius: 5px;border: 0;padding-left: 5px;}
.scrolltext {padding: 10px 10px 0;width: 8.0rem;height: 2.05rem;overflow: hidden;background: #e0dede;border-radius: 5px;}
.scrolltext ol li{padding-left:7px;width:7.3rem;height:25px;font-size:13px;line-height:25px;}
.scrolltext ol li a{color:#000;display:block;width:7.0rem;white-space:nowrap;text-overflow:ellipsis;-o-text-overflow:ellipsis;overflow: hidden;}
.scrolltext ol li a:hover{color:#000;text-decoration:none;}
#breakNews{padding:0 0 0px 2px;}
#breakNews .list6{height:330px;overflow:hidden;width:100%;}
.backicon {position: absolute;left: 10px;top: 10px;width: 40px;height: 40px;border-radius: 100%;background: rgba(0,0,0,.3) url(/m/jq/images/w-back.png) center no-repeat;background-size: 10px;z-index: 10;}
.backi {position: absolute;right: 10px;top: 10px;width: 40px;height: 40px;border-radius: 100%;background: rgba(0,0,0,.3) url(/m/jq/images/nav-11.png) 9px 7px no-repeat;background-size: 60%;z-index: 10;}
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
</style>	
<body>		
	<div class="w100b top-thumb" style="position: relative;">
		<a href="javascript:history.go(-1)" id="navBtn" class="backicon"></a>
		<a href="javascript:;" id="navBtn" class="backi"></a>		
		<img src="/m/jq/images/m_01.jpg" alt="" />						
		<img src="/m/jq/images/m_02.jpg" alt="" />													
		<img src="/m/jq/images/m_03.jpg" alt="" />													
		<img src="/m/jq/images/m_05.jpg" alt="" />													
		<img src="/m/jq/images/m_06.jpg" alt="" />													
	</div>	
		<div class="bm-box">	
		<div style="height: 1.25rem"></div>	
		<div class="bm-box-c">
		    <form id="frm3" method="post" action="/m/save">	

		    <input type="hidden" name="lpid" value="0"> <!-- 0 为公共报名，其它为楼盘ID-->
		    <input type="hidden" name="ly" value="【<?php echo $sitecityname;?>】_移动端_金秋专题" id="make_tit_4"> <!-- 0 为公共报名，其它为楼盘ID-->
		    <input type="hidden" name="pid" value="33">
		    <input type="hidden" name="action" value="bmtj">
		    <input type="hidden" name="uname" value="金秋专题">
		    <input type="hidden" name="equipment" value="1">        <!--来源设备 （ PC端  2,手机端   1 ）--> 
			<ul>
				<li>
					<div class="fl">
						<input type="text" name="utel" id="phone5" maxlength="11" placeholder="请输入手机号" class="inp" style="width: 4.5rem;"></div>
					<div class="fl"><input type="submit" name="" value=" " class="btn2"></div>
				</li>
			</ul>
			</form>
		</div>
	</div>
	<div class="h20"></div>	
	<div class="top-thumb"><img src="/m/jq/images/m_09.jpg" alt="" /></div>
	<div class="h20"></div>	

	<div class="h15"></div>	
	<!-- 热门楼盘 -->
	<?
        $rowlistrm = $mysql->query("select * from `web_content` where `pid`=9 and `city_id` = '{$city_id}' order by px20 desc limit 0,1");
          foreach($rowlistrm as $k=>$listrm){
          $url='/loupan/'.$listrm['id'].'.html';
    ?>
	<div class="new-list" style="background: #fff;overflow: hidden;">
				<div class="c">
			<div class="house-list">
				<div class="pic">
					<a href="<?php echo $url;?>" style="display: block;"><img src="../<?php echo $listrm['img'];?>" alt="../<?php echo $listrm['title'];?>"></a>
					<img src="/m/jq/images/m_13.png" style="width: 1.3rem;height: 3.5rem;position: absolute;left: 10px;bottom: -112px;">
				</div>
				<div class="h10"></div>
				<div class="hi">
					<div class="hi-info">						
						<h3 style="font-weight: 700;font-size: .475rem;padding-bottom: 5px;color: #333;"><?php echo $listrm['title'];?></h3>
						<div class="tag"><?php echo loupanflagtsi2($listrm['flagts'],6,4);?><div class="clear"></div></div>
						<div style="background:#ffe5d2 url('/m/jq/images/hui.png') left no-repeat;height: 27px;background-size: 38px;">
	 						<span style="line-height: 27px;font-size: .355rem;padding-left: 42px;color: #f00;"><?php echo $listrm['fkfs'];?></span>
	 					</div>
						<p><span style="color: #333;font-size: .375rem">参考均价: </span><span style="color: #ff3110;font-size: .575rem"><?php echo $listrm['jj_price'];?>元/㎡</span></p>		
						<p style="color: #333;font-size: .375rem;line-height: 25px;"><?php echo $listrm['xmdz']?></p>				
					</div>
				</div>
				<div class="h10"></div>
				<div class="hx" style="padding-left: 5px;padding-top: 10px;">
					<ul>
                      <?php
					    $lpid = $listrm['id'];
			            $rowpic = $mysql->query("select * from `web_pic` where `pid_flag`='xc1' and `luopan_id`=$lpid order by id desc limit 0,1");
			            foreach($rowpic as $k=>$pic){
			          ?>
						<li style="width: 40%;padding-left: 10px;">
							<div style="border: 2px solid #ff8837;position: relative;height: 2.8rem;">
							<img src="../<?php echo $pic['pic_img']?>" alt="<?php echo $listrm['title']?>" class="hxpic" style="border: 2px solid #e2b564;position: absolute;left: -10px;top: -8px;"></div>
						</li>
						<li style="width: 45%;padding: 0 20px;">
							<p><img src="/m/jq/images/m_18.jpg" style="width: 3.5rem"></p>
							<p style="font-size: .35rem;padding-bottom: 3px;padding-top: 3px;color: #333;">
							<?php echo $pic['pic_name']?>						</p>
							<p style="font-size: .35rem;padding-bottom: 2px;color: #666;">面积：<?php echo $pic['mj']?>㎡</p>
							<div style="line-height: 35px;">
								<a href="javascript:;" style="background: #fa830e;padding: 6px 45px;color: #fff;border-radius: 17px;"  onclick="openwid8('我要报名','请正确填写您的信息，预约参加团购，您拿下名额，我们帮您拿下最低参团价！','【<?php echo $sitecityname;?>】金秋_我要报名',2,'<?php echo $listrm['id']?>','<?php echo $listrm['title']?>');">我要报名</a></div>
						</li>
						<?php } ?>
					</ul>
					<div class="clear"></div>
				</div>
			</div>
		</div>
				<div style="height: 30px;" ></div>
	</div><?php } ?>
	<!-- 热门楼盘end -->
	<!-- list:end -->	

	<!-- 买房优选  -->	
	<div class="top-thumb" style="background: #fff;margin: 20px 0 20px 0;"><img src="/m/jq/images/m_11.jpg" alt="" /></div>
	<div style="background: #fff;">
		<?
              $hot = $mysql->query("select * from `web_content` where `pid`=9 and `city_id` = '{$city_id}' order by px18 desc limit 0,2");
              foreach($hot as $k=>$hotlist){
                $url='/loupan/'.$hotlist['id'].'.html';
		?>
				<div class="list-c pr" style="margin-bottom: 20px;">			
			<div class="c">
				<div class="pic">
					<a href="<?php echo $url;?>"><img src="../<?php echo $hotlist['img'];?>" alt="<?php echo $hotlist['title'];?>" /></a></div>
				<div class="txt">
					<a href="<?php echo $url;?>">
					<h1><?php echo $hotlist['title'];?></h1>
					<div class="tag"><?php echo loupanflagtsi2($hotlist['flagts'],6,4);?></div>
					<p  class="i1"><?php echo $hotlist['zlhx']?></p>
					<div style="background:#ffe5d2 url('/m/jq/images/hui.png') left no-repeat;height: 30px;background-size: 38px;white-space:nowrap;text-overflow:ellipsis;overflow: hidden;">
 						<span style="line-height: 30px;font-size: .355rem;padding-left: 42px;color: #f00;"><?php echo $hotlist['fkfs'];?></span>
 					</div>
					</a>
				</div>
				<div class="clear"></div>
				<div class="h10"></div>
				<div class="bm">
					<div class="b-f"><span class="p1">参考均价：</span><span class="p2"><?php echo $hotlist['jj_price'];?></span><span class="p3">元/㎡</span></div>
					<div class="b-r"><a href="javascript:;" class="btn-2" onclick="openwid8('我要报名','<?php echo $hotlist['fkfs']?>','【北海】金秋_我要报名',2,<?php echo $hotlist['id']?>,'<?php echo $hotlist['title']?>');">我要报名</a></div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
	    <?php }?>		
	</div>	
	<!-- 买房优选 end -->

	<!-- 好房推荐 -->
	<div class="top-thumb" style="margin-bottom: 20px;"><img src="/m/jq/images/m_13.jpg" alt="" /></div>		
	<div style="background: #fff">
		<?
              $row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px3 desc limit 0,4");
              foreach($row as $k => $youlist){
                $url='/loupan/'.$youlist['id'].'.html';
        ?>
			<div class="list-c pr" style="background: #fffaee;border-radius: 5px;margin-bottom: 15px;border: 1px solid #ddd;">			
			<div class="c">
				<div class="pic">
					<a href="<?php echo $url;?>"><img src="../<?php echo $youlist['img'];?>" alt="<?php echo $youlist['title'];?>" /></a></div>
				<div class="txt">
					<a href="<?php echo $url;?>">
					<h1><?php echo $youlist['title'];?></h1>
					<div class="tag"><?php echo loupanflagtsi2($youlist['flagts'],6,4);?></div>
					<p  class="i1"><?php echo $youlist['zlhx']?></p>
					<div style="background:#ffe5d2 url('/m/jq/images/hui.png') left no-repeat;height: 30px;background-size: 38px;">
 						<span style="line-height: 30px;font-size: .355rem;padding-left: 42px;color: #f00;"><?php echo $youlist['fkfs'];?></span>
 					</div>
					</a>
				</div>
				<div class="clear"></div>
				<div class="h10"></div>
				<div class="bm">
					<div class="b-f"><span class="p1">参考均价：</span><span class="p2">9500</span><span class="p3">元/㎡</span></div>
					<div class="b-r"><a href="javascript:;" class="btn-2" onclick="openwid8('我要报名','<?php echo $youlist['fkfs'];?>','【北海】金秋_我要报名',2,<?php echo $youlist['id'];?>,'<?php echo $youlist['title'];?>');">我要报名</a></div>
					<div class="clear"></div>
				</div>
			</div>
		</div>
        <?php } ?>
		<div class="h10"></div>
	</div>
	<!-- 好房推荐 end -->
	<div class="top-thumb" style="position: relative;width: 95%;margin: 0 auto;">
		<img src="/m/jq/images/m_16.jpg" alt="" />		
		<img src="/m/jq/images/m_17.jpg" alt="" />		
		<p  style="text-align: center;line-height: 1.1rem;position: absolute;bottom: 0px;width: 100%;">
		<span style="color: #f7562c;">活动时间：2020.11.1-11.30</span></p>
	</div>					
	<div style="height: 10px;"></div>	
	<p  style="text-align: center;color: #fff">活动期间，可通过活动页面报名或者来电方式进行参与</p>
	<div style="height: 50px;"></div>	
<div class="a-footer-layer">
    <div class="shou3-box c">
	  <div class="shou3-list3">
		<a href="javascript:;" rel="nofollow" onclick="openwid8('我要报名','请正确填写您的信息，预约参加团购，您拿下名额，我们帮您拿下最低参团价！','【北海】金秋_我要报名',2,'0','');"><img class="lastimg" src="/m/jq/images/time.png">我要报名
		</a>
	  </div>
      <div class="shou3-list2">                  
          <a href="tel:<?php echo $config['company_tel'];?>" rel="nofollow">
          <img class="lastimg" src="/m/jq/images/tel.png">电话咨询</a>
       </div>  	     	  
    </div>
</div>
</body>
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
    <form id="frm_com_1" method="post" action="/m/save">

    <input type="hidden" name="lpid" id="com-houseid-2" value="0">
    <input type="hidden" name="uname" id="com-sounce-2">    
    <input type="hidden" name="utitle" id="com-subject-2">
    <input type="hidden" name="ly" value="【<?php echo $sitecityname;?>】_移动端_金秋专题"> <!-- 0 为公共报名，其它为楼盘ID-->
    <input type="hidden" name="pid" value="33">
	<input type="hidden" name="action" value="bmtj">
	<input type="hidden" name="equipment" value="1">        <!--来源设备 （ PC端  2,手机端   1 ）-->
    <input type="hidden" name="ucontent" value="/m/jq.html">    
    <div class="w_head"><p id="com-title-2">专车看房</p>
    <div class="closes"><a onclick="wid_close();"><img src="/m/jq/images/close.png"></a></div></div>
    <div class="w_body">
        <p class="w_body_t" id="com-info-2">请正确填写您的信息。免费获取购房优惠折扣政策，不再错失购房良机</p>
        <div class="w_input">
            <input type="tel" placeholder="请输入手机号码" class="enter-tel"  name="utel" id="com-phone-1" maxlength="11">
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
 function complete(data){     
    if(data.status==1){
       layer.closeAll('loading');
       layer.open({content: data.info,time: 2 ,style: 'background: rgba(34,187,98,255); color:#fff; border:none;' });  
       window.setTimeout("window.location='"+data.url+"'",2000);
       return false;
    }else{
      layer.open({content: data.info,time: 1 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;' });      
      return false;
    }
  }
  })
</script>
<script type="text/javascript">
$(function() {
	$("#navBtn,#navBtn1").click(function(){
        toggleFixMenu('.nav');
    });
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
.ico {display: inline-block;overflow: hidden;background: url(/m/jq/images/ico-left.png) 0 0 no-repeat;background-size: 100% 100%;text-indent: -9999px;}
.city-change{overflow:hidden;text-align:center;font-size:.4rem;line-height: 1.4rem;}
.city-change .tit{display:block;width:100%;height:100%;line-height:1.4rem;text-align:center;font-size:.5rem;white-space:nowrap;text-overflow:ellipsis;overflow:hidden}    
</style>
<div class="nav sFix">
    <div style="height: 5px;"></div>
    <div class="header" style="z-index: 999;">
            <!--返回上一页-->
            <div class="go-back">
               <a href="/beihai/">
                    <span class="ico ico-return">返回上一页</span>
                </a>
            </div>
            <!--切换城市-->
        <div class="city-change"><span class="text">金秋专题</span> </div>
        <!--用户行为跳转-->
        <ul class="u-link" style="top: .3rem;right: .2rem;">
            <li class="link-home"><a href="javascript:;" id="navBtn" style="display: block;"><img src="/m/jq/images/nav.png"></a></li>                 
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
<script>
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
  function checkForm(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#theme2-mobile-shuang').val()))){            
          layer.open({content: '手机号格式非法',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});         
          $('#theme2-mobile-shuang').focus(); 
          return false;
        }
       layer.open({type: 2});
    }
    function checkFor2(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#phone2').val()))){            
          layer.open({content: '手机号格式非法',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});                  
          $('#phone2').focus(); 
          return false;
        }
       layer.open({type: 2});
    }
    function checkFor3(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#phone5').val()))){            
          layer.open({content: '手机号格式非法',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});                   
          $('#phone5').focus(); 
          return false;
        }
       layer.open({type: 2});
    }
 function complete(data){     
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
</html>