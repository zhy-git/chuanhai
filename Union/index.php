<!DOCTYPE html>
<html lang="zh-cn">
<?php
require("../conn/conn.php");
require("../function.php");
$lm=10;
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>购房联盟_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>">

    <link href="/css/public.css" rel="stylesheet">
    <link href="/css/alert.css" rel="stylesheet">
    <link href="/css/newslist.css" rel="stylesheet">
<link rel="stylesheet" type="text/css" href="../css/basic.css" />
<link rel="stylesheet" type="text/css" href="../css/index.css" />
<LINK rel="stylesheet" type="text/css" href="css/house.css" />
<LINK rel="stylesheet" type="text/css" href="../css/hn.css" />
    <style type="text/css">
	.main {
	MARGIN: 0px auto; WIDTH: 1200px
}
/*购房联盟*/
	.union .wrap{ padding-top:80px;}
	.lmIntro{ clear:both; margin:0 auto 20px auto; width:100%;width:850px; height:260px; position:relative; background:#FFF; padding-top:40px;}
	.lmIntro .bd{ position:relative; z-index:0;padding-bottom:10px;}
	.lmIntro .bd div{ padding:20px; font-size:13px;}
	.lmIntro .hd{ position:absolute; height:41px; top:0; height:46px; line-height:46px; width:100%; background:#EEE;}
	.lmIntro .hd ul{overflow:hidden;display:-moz-box;display:-webkit-box;display:box; width:100%;}
	.lmIntro .hd ul li{ display:block; text-align:center; font-size:12px;-moz-box-flex:1;-webkit-box-flex:1;box-flex:1; width:33.3%;background:#83C802;}
	.lmIntro .hd ul li a{ display:block; color:#FFF; font-size:16px;}
	.lmIntro .hd ul .on{background:#FFF; color:#83C802; font-size:18px; font-weight:bold;}
	.lmIntro .hd ul .on a{ display:block; color:#83C802; font-size:16px;}
	.lmIntro1 p{ display:block; padding:10px 0; font-size:14px; line-height:26px;}
	.lmIntro1 h3{ font-size:20px; text-align:center; color:#963;}
	.lmIntro1 h4{ font-size:16px; text-align:center; color:#E30;}
	.lmIntro2 h2{ color:#00C28D; margin-bottom:5px; font-size:16px;}
	.lmIntro2 h3{ color:#83C802; margin-bottom:5px; font-size:20px;}
	.lmIntro2 p{ display:block; margin-bottom:5px; font-size:16px; color:#888; line-height:26px;}
	.lmIntro3 p{ display:block; margin-bottom:3px; font-size:16px; color:#888; line-height:26px;}
	.lmIntro3 span{ display:block; font-size:18px; color:#76B402; font-weight:bold;}
	.lmbm{ position:fixed; bottom:0; width:100%; background-color: rgba(255,255,255,0.8);}
	.lmbm .btn{ display:block; margin:10px; font-size:16px; font-weight:bold; height:40px; line-height:40px;}
	.lmbmBox{ position:fixed;left:0;right:0;top:0;padding:60px 0 0 0; max-width:480px; margin:0 auto;}
	.lmbmForm{ position:absolute; left:50%; top:60px;  height:300px; padding:20px; margin-left:-130px; background:#FFF; z-index:89; overflow:hidden; border-radius:5px;}
	.lmbmForm h3{ display:block; padding:5px; margin-bottom:10px; background:#CCC; color:#FFF; text-align:center; width:100px; border-radius:50px;}
	.lmbmForm span{ display:block; overflow:hidden; padding:0 10px; margin-bottom:10px; background:#EEE; border-radius:50px;}
	.lmbmForm span ins{ float:left; width:30px;line-height:35px; color:#888;}
	.lmbmForm span .itext{ float:right; width:170px; border:0; height:35px; line-height:35px; background:none;}
	.lmbmForm textarea{ display:block; width:100%; height:80px; padding:5px; margin-bottom:10px;}
	.lmbmForm p .btn{ display:block; height:40px; line-height:40px; font-size:16px;}
	.lmbmForm ::-webkit-input-placeholder{color:#999;}
	.lmbmForm :-moz-placeholder {color:#999;}
	.lmbmForm ::-moz-placeholder {color:#999;}
	.lmbmForm :-ms-input-placeholder {color:#999;}
	/**/
	
	
.lmlp {
	WIDTH: 850px; FONT-FAMILY: "Microsoft Yahei"; FLOAT: left; FONT-WEIGHT: normal
}
.lmlp_top {
	LINE-HEIGHT: 36px; WIDTH: 850px; BACKGROUND: #dddddd; FLOAT: left; HEIGHT: 36px
}
.lmlp_top H3 {
	PADDING-BOTTOM: 0px; LINE-HEIGHT: 36px; PADDING-LEFT: 15px; PADDING-RIGHT: 15px; FLOAT: left; COLOR: #333333; FONT-SIZE: 16px; FONT-WEIGHT: normal; PADDING-TOP: 0px
}
.lmlp_top SPAN {
	LINE-HEIGHT: 36px; PADDING-RIGHT: 10px; FLOAT: right; COLOR: #666666; FONT-SIZE: 14px; FONT-WEIGHT: normal
}
.lmlp_n {
	WIDTH: 850px; FLOAT: left
}
.lmlp_n LI {
	PADDING-BOTTOM: 10px; MARGIN: 10px 20px 0px 0px; WIDTH: 270px; BACKGROUND: #ffffff; FLOAT: left
}
.lmlp_n LI IMG {
	WIDTH: 270px; HEIGHT: 155px
}
.lmlp_n LI IMG:hover {
	FILTER: alpha(opacity=80); -moz-opacity: 0.8; -khtml-opacity: 0.8; opacity: 0.8
}
.lmlp_n LI H3 {
	LINE-HEIGHT: 25px; PADDING-LEFT: 10px; WIDTH: 260px; FLOAT: left; COLOR: #999999; FONT-SIZE: 14px; FONT-WEIGHT: normal
}
.lmlp_n LI H3 A {
	COLOR: #33c0d0
}
.lmlp_n LI P {
	LINE-HEIGHT: 25px; PADDING-LEFT: 10px; WIDTH: 260px; FLOAT: left
}
.lmlp_n LI P .font_01 {
	COLOR: #ff6600
}
.gflm_gbook {
	PADDING-BOTTOM: 10px; PADDING-LEFT: 10px; WIDTH: 310px; PADDING-RIGHT: 10px; BACKGROUND: #ffffff; FLOAT: left; PADDING-TOP: 10px
}
.gflm_gbook_top {
	LINE-HEIGHT: 30px; WIDTH: 310px; FLOAT: left; HEIGHT: 30px
}
.gflm_gbook_top H3 {
	PADDING-LEFT: 25px; WIDTH: 285px; FONT-FAMILY: "Microsoft Yahei"; BACKGROUND: url(../image/icon_08.jpg) no-repeat left center; FLOAT: left; HEIGHT: 30px; COLOR: #33c0d0; FONT-SIZE: 18px; FONT-WEIGHT: normal
}
.gflm_gbook_n {
	PADDING-BOTTOM: 8px; PADDING-LEFT: 0px; WIDTH: 310px; PADDING-RIGHT: 0px; FLOAT: left; PADDING-TOP: 8px
}
.gflm_gbook_n LI {
	LINE-HEIGHT: 25px; WIDTH: 310px; FONT-FAMILY: "Microsoft Yahei"; FLOAT: left; FONT-SIZE: 14px; FONT-WEIGHT: normal; PADDING-TOP: 10px
}
.gflm_gbook_n LI LABEL {
	LINE-HEIGHT: 25px; FLOAT: left; HEIGHT: 25px
}
.gflm_gbook_inp {
	BORDER-BOTTOM: 0px; BORDER-LEFT: 0px; LINE-HEIGHT: 25px; WIDTH: 240px; BACKGROUND: #f1f2f6; FLOAT: left; HEIGHT: 25px; COLOR: #666666; FONT-SIZE: 14px; BORDER-TOP: 0px; FONT-WEIGHT: normal; BORDER-RIGHT: 0px
}
.gflm_gbook_tex {
	BORDER-BOTTOM: 0px; BORDER-LEFT: 0px; LINE-HEIGHT: 25px; WIDTH: 240px; BACKGROUND: #f1f2f6; FLOAT: left; HEIGHT: 100px; COLOR: #666666; FONT-SIZE: 14px; BORDER-TOP: 0px; FONT-WEIGHT: normal; BORDER-RIGHT: 0px
}
.gflm_gbook_sub {
	BORDER-BOTTOM: 0px; BORDER-LEFT: 0px; WIDTH: 248px; BACKGROUND:#FF8800; FLOAT: left; HEIGHT: 28px; MARGIN-LEFT: 40px; BORDER-TOP: 0px; CURSOR: pointer; BORDER-RIGHT: 0px; color:#FFF;border-radius:5px;
}
.gbook_list {
	PADDING-BOTTOM: 0px; PADDING-LEFT: 10px; WIDTH: 310px; PADDING-RIGHT: 10px; BACKGROUND: #ffffff; FLOAT: left; PADDING-TOP: 10px
}
.gbook_list_n {
	WIDTH: 310px; FLOAT: left
}
.gbook_list_n LI {
	PADDING-BOTTOM: 10px; LINE-HEIGHT: 20px; PADDING-LEFT: 10px; WIDTH: 290px; PADDING-RIGHT: 10px; MARGIN-BOTTOM: 10px; BACKGROUND: #fafafb; FLOAT: left; PADDING-TOP: 10px
}
.gbook_list_n LI SPAN {
	LINE-HEIGHT: 20px; WIDTH: 290px; FLOAT: left
}
.gbook_list_n LI .titel A {
	COLOR: #33c0d0
}
.gbook_list_n LI .contact {
	COLOR: #666666
}

.tuan_index {
	WIDTH: 1200px; FLOAT: left
}
.tuan_index_01 {
	MARGIN-TOP: 10px; WIDTH: 1190px; FLOAT: left; HEIGHT: 375px
}
.tuan_index_01 IMG {
	WIDTH: 1190px; HEIGHT: 375px
}
.tuan_index_02 {
	 WIDTH: 1200px; FLOAT: left;
}
.tuan_index_02_l {
	WIDTH: 850px; FLOAT: left
}
.tuan_index_02_r {
	WIDTH: 330px; FLOAT: right
}


.gflm {
	PADDING-BOTTOM: 10px; PADDING-LEFT: 10px; WIDTH: 310px; PADDING-RIGHT: 10px; BACKGROUND: #ffffff; FLOAT: left; PADDING-TOP: 10px
}
.gflm_top {
	LINE-HEIGHT: 30px; WIDTH: 310px; FLOAT: left; HEIGHT: 30px
}
.gflm_top H3 {
	PADDING-LEFT: 25px; WIDTH: 285px; FONT-FAMILY: "Microsoft Yahei"; BACKGROUND: url(../image/icon_08.jpg) no-repeat left center; FLOAT: left; HEIGHT: 30px; COLOR: #33c0d0; FONT-SIZE: 18px; FONT-WEIGHT: normal
}
.gflm_n {
	PADDING-BOTTOM: 8px; PADDING-LEFT: 0px; WIDTH: 310px; PADDING-RIGHT: 0px; FLOAT: left; PADDING-TOP: 8px
}
.gflm_n LI {
	LINE-HEIGHT: 25px; WIDTH: 310px; FONT-FAMILY: "Microsoft Yahei"; FLOAT: left; FONT-SIZE: 14px; FONT-WEIGHT: normal; PADDING-TOP: 10px
}
.gflm_n LI LABEL {
	LINE-HEIGHT: 25px; FLOAT: left; HEIGHT: 25px
}
.gflm_inp {
	BORDER-BOTTOM: 0px; BORDER-LEFT: 0px; LINE-HEIGHT: 25px; WIDTH: 240px; BACKGROUND: #f1f2f6; FLOAT: left; HEIGHT: 25px; COLOR: #999999; FONT-SIZE: 12px; BORDER-TOP: 0px; FONT-WEIGHT: normal; BORDER-RIGHT: 0px
}
.gflm_inpcc {
	BORDER-BOTTOM: 0px; BORDER-LEFT: 0px; LINE-HEIGHT: 25px; WIDTH: 240px; BACKGROUND: #f1f2f6; HEIGHT: 25px; COLOR: #999999; FONT-SIZE: 12px; BORDER-TOP: 0px; FONT-WEIGHT: normal; BORDER-RIGHT: 0px
}
.gflm_tex {
	BORDER-BOTTOM: 0px; BORDER-LEFT: 0px; LINE-HEIGHT: 25px; WIDTH: 240px; BACKGROUND: #f1f2f6; FLOAT: left; HEIGHT: 100px; COLOR: #666666; FONT-SIZE: 14px; BORDER-TOP: 0px; FONT-WEIGHT: normal; BORDER-RIGHT: 0px
}
.gflm_sub {
	BORDER-BOTTOM: 0px; BORDER-LEFT: 0px; WIDTH: 248px; BACKGROUND:#FF8800; FLOAT: left; HEIGHT: 28px; MARGIN-LEFT: 40px; BORDER-TOP: 0px; CURSOR: pointer; BORDER-RIGHT: 0px; color:#FFF;border-radius:5px;
}
.gflm_sub2 {
	BORDER-BOTTOM: 0px; BORDER-LEFT: 0px; WIDTH: 205px; BACKGROUND: url(../images_2/sdfd.png) no-repeat center; FLOAT: left; HEIGHT: 34px;  BORDER-TOP: 0px; CURSOR: pointer; BORDER-RIGHT: 0px
}
.gflm_n SPAN {
	MARGIN-TOP: 10px; WIDTH: 250px; FLOAT: left; HEIGHT: 40px; MARGIN-LEFT: 40px
}
.rmlp {
	PADDING-BOTTOM: 10px; PADDING-LEFT: 0px; WIDTH: 330px; PADDING-RIGHT: 0px; FONT-FAMILY: "Microsoft Yahei"; BACKGROUND: #ffffff; FLOAT: left; OVERFLOW: hidden; FONT-WEIGHT: normal; PADDING-TOP: 0px
}
.rmlp_top {
	WIDTH: 330px; BACKGROUND: #33c0d0; FLOAT: left; HEIGHT: 40px
}
.rmlp_top H3 {
	PADDING-BOTTOM: 0px; LINE-HEIGHT: 40px; PADDING-LEFT: 10px; PADDING-RIGHT: 0px; FLOAT: left; COLOR: #ffffff; FONT-SIZE: 16px; FONT-WEIGHT: normal; PADDING-TOP: 0px
}
.rmlp_top SPAN {
	LINE-HEIGHT: 40px; PADDING-RIGHT: 10px; FLOAT: right; COLOR: #ffffff; FONT-SIZE: 14px; FONT-WEIGHT: normal
}
.rmlp_n {
	PADDING-BOTTOM: 0px; PADDING-LEFT: 10px; WIDTH: 310px; PADDING-RIGHT: 10px; FLOAT: left; PADDING-TOP: 0px
}
.rmlp_n LI {
	PADDING-BOTTOM: 0px; PADDING-LEFT: 0px; WIDTH: 310px; PADDING-RIGHT: 0px; FLOAT: left; PADDING-TOP: 10px
}
.rmlp_n LI .rmlp_n_01 {
	WIDTH: 125px; FLOAT: left; HEIGHT: 75px
}
.rmlp_n LI .rmlp_n_01 IMG {
	WIDTH: 125px; HEIGHT: 75px
}
.rmlp_n LI .rmlp_n_01 IMG:hover {
	FILTER: alpha(opacity=80); -moz-opacity: 0.8; -khtml-opacity: 0.8; opacity: 0.8
}
.rmlp_n LI .rmlp_n_02 {
	WIDTH: 175px; FLOAT: right; HEIGHT: 75px
}
.rmlp_n LI .rmlp_n_02 H3 {
	LINE-HEIGHT: 25px; WIDTH: 175px; FONT-FAMILY: "Microsoft Yahei"; FONT-SIZE: 15px; FONT-WEIGHT: normal
}
.rmlp_n LI .rmlp_n_02 P {
	LINE-HEIGHT: 20px; WIDTH: 175px; FLOAT: left; COLOR: #999999
}
.rmlp_n LI .rmlp_n_02 SPAN {
	LINE-HEIGHT: 30px; WIDTH: 175px; FLOAT: left
}
.rmlp_n LI .rmlp_n_02 .font_01 {
	FONT-FAMILY: Arial; COLOR: #C90000; FONT-SIZE: 18px
}

.news_01 {
	PADDING-BOTTOM: 10px; PADDING-LEFT: 0px; WIDTH: 330px; PADDING-RIGHT: 0px; FONT-FAMILY: "Microsoft Yahei"; BACKGROUND: #ffffff; FLOAT: left; OVERFLOW: hidden; FONT-WEIGHT: normal; PADDING-TOP: 0px
}
.news_01_top {
	WIDTH: 330px; BACKGROUND: #33c0d0; FLOAT: left; HEIGHT: 40px
}
.news_01_top H3 {
	PADDING-BOTTOM: 0px; LINE-HEIGHT: 40px; PADDING-LEFT: 10px; PADDING-RIGHT: 0px; FLOAT: left; COLOR: #ffffff; FONT-SIZE: 16px; FONT-WEIGHT: normal; PADDING-TOP: 0px
}
.news_01_top SPAN {
	LINE-HEIGHT: 40px; PADDING-RIGHT: 10px; FLOAT: right; COLOR: #ffffff; FONT-SIZE: 14px; FONT-WEIGHT: normal
}
.news_01_n {
	PADDING-BOTTOM: 0px; PADDING-LEFT: 10px; WIDTH: 310px; PADDING-RIGHT: 10px; FLOAT: left; PADDING-TOP: 0px
}
.news_01_n SPAN {
	PADDING-BOTTOM: 0px; LINE-HEIGHT: 30px; PADDING-LEFT: 10px; WIDTH: 300px; PADDING-RIGHT: 0px; FLOAT: left; HEIGHT: 30px; FONT-SIZE: 16px; OVERFLOW: hidden; PADDING-TOP: 10px
}
.news_01_n SPAN A {
	COLOR: #33c0d0
}
.news_01_n SPAN A:hover {
	COLOR: #333333
}
.news_01_n LI {
	LINE-HEIGHT: 28px; PADDING-LEFT: 10px; WIDTH: 300px; BACKGROUND: url(../image/icon_02.jpg) no-repeat left 10px; FLOAT: left; HEIGHT: 28px; FONT-SIZE: 14px; OVERFLOW: hidden
}
</style>
</head>
<body>
<?php include("../top.php");?>
<!---->
<!--中间开始-->
<div style=" background:#0068bf;">
<div style="width:1200px; height:377px; margin:0 auto;"><IMG src="../image/lm.jpg"></div>
</div>
<DIV class=main>
<DIV class=tuan_index>
<DIV class=tuan_index_02>
<DIV class=tuan_index_02_l><!--购房联盟简介开始-->
<!------------幻灯：开始------------>
                <div id="lmIntro" class="lmIntro">
                <div class="hd">
                        <ul>
                            <li class="on"><a>购房联盟简介</a></li>
                            <li class=""><a>购房联盟服务</a></li>
                            <li class=""><a>购房联盟优势</a></li>
                        </ul>
                    </div>
                    <div class="tempWrap" style="overflow:hidden; position:relative; ">
                    <div  class="bd">
                        <div style="display: table-cell; vertical-align: top; width: 850px;" class="lmIntro1">
                            <h3>真诚服务每一位客户！</h3>
                            <p>购房联盟是<?php echo $config['site_name'];?>携手各大房企推出看房对比活动，覆盖海南18个市县，提供24小时免费接送机、旅游看房、专业置业顾问答疑解惑等服务，是岛外人士在海南看房和买房的首选平台。报名购房联盟，购房者不仅能高效看房，还可以享受到海南各大楼盘最新优惠资讯。购房联盟推出至今已经服务逾万组客户。</p>
                            <h4>免费咨询热线<ins class="icon-18"></ins><?php echo $config['company_tel'];?></h4>
                            <h5></h5>
                        </div>
                        <div style="display: table-cell; vertical-align: top; width: 850px; display:none;" class="lmIntro2">
                            <h2>省心省力得实惠</h2>
                            <h3><font color="#CCCCCC" size="+3">"</font>购房联盟24小时全程系列服务<font color="#CCCCCC" size="+3">"</font></h3>
                            <p>&gt;&nbsp;联盟成员可免费入住星级酒店两天</p>
                            <p>&gt;&nbsp;免费享受24小时专车机场接送、看房接送服务</p>
                            <p>&gt;&nbsp;专业置业顾问陪同看房，提供全程参谋式优质服务</p>
                            <p>&gt;&nbsp;购房选择余地更大，近千个优质楼盘供您甄选</p>
                            <p>&gt;&nbsp;联盟成员独享优惠团购折扣价格，大幅度降低购房成本</p>
                        </div>
                        <div style="display: table-cell; vertical-align: top; width: 480px;display:none;" class="lmIntro3">
                            <p><span>集结：让团购更有力量</span>报名购房联盟的会员越多，开发商给予的优惠就更大</p>
                            <p><span>便捷：看房不用满城跑</span>根据会员需求，置业顾问将为其提供有针对性的选择方案</p>
                            <p><span>看房：全程服务均免费</span>机场接送机、车接车送看房、专业置业顾问全程陪同</p>
                            <p><span>专业：让购房者更省心</span>专业置业顾问，为购房者提供一系列专业服务</p>
                        </div>
                    </div></div>
                    
                </div>
                <!------------幻灯：结束------------>
<!--购房联盟简介结束--><!--联盟楼盘开始-->
<DIV class=lmlp>
<DIV class=lmlp_top style="background:#83C802;">
<H3 style="color:#FFF;">联盟楼盘</H3><A href="../loupan/?flaglp=lp5" target=_blank><SPAN style="color:#FFF;">更多&gt;&gt;</SPAN></A></DIV>
<DIV class=lmlp_n>
<UL>
 <?php
	$row = $mysql->query("select * from `web_content` where `pid`='9' and `flaglp` like '%lp5%' order by id desc limit 0,12");
	foreach($row as $k=>$list){
	?>
  <LI <?php if ($k==2 ||$k==5 ||$k==8||$k==11){echo 'style="MARGIN-RIGHT: 0px"';}?>><A href="/loupan/<?php echo $list['id'];?>.html" target=_blank><IMG src="../<?php echo $list['img'];?>" onerror="this.src='../image/nopic.jpg'"></A> 
  <H3><B><A href="/loupan/<?php echo $list['id'];?>.html" target=_blank><?php echo $list['title'];?></A></B>&nbsp;[<?php echo cityname($list['city_id']);?>]</H3>
  <P>起价：<FONT class=font_01><?php echo $list['qj_price'];?></FONT>元/㎡ &nbsp;&nbsp;&nbsp; 均价：<FONT class=font_01><?php echo $list['jj_price'];?>元</FONT>/㎡</P></LI>
<?php }?>
  </UL></DIV></DIV><!--联盟楼盘结束--></DIV>
<DIV class=tuan_index_02_r><!--热点资讯开始--><!--热点资讯结束--><!--购房联盟报名开始-->
<div class="gflm">
    <div class="gflm_top"><h3>报名参加购房联盟</h3></div>
    <div class="gflm_n">
        <ul>
            <form id="form2" name="form2" method="post" action="../save.php?action=baoming" onSubmit="return checkTg(this);" >
  <input name="lpid" value="0" type="hidden">
  <input type="hidden" name="pid" value="31" />
  <LI><LABEL>姓名：</LABEL><INPUT id="uname" class="gflm_inp" placeholder="请输入您的姓名" type=text name="uname"></LI>
  <LI><LABEL>性别：</LABEL><INPUT value=男 type=radio name=usex>男　<INPUT value=女 CHECKED type=radio name=usex>女</LI>
  <LI><LABEL>手机：</LABEL><INPUT class=gflm_inp onKeyUp="this.value=this.value.replace(/\D/g,'')" placeholder="请输入您的手机" type=text name=utel></LI>
  <LI class=gfm_bz><LABEL>备注：</LABEL><TEXTAREA id="ucontent" class="gflm_tex" name="ucontent"></TEXTAREA></LI>
  <LI><INPUT class=gflm_sub value="参加报名" type=submit name=submit></LI></FORM>
        </ul>
        <span class="clear"><img src="../image/cjbm_01.jpg"></span>
    </div>
</div><!--购房联盟报名结束-->
<DIV style="MARGIN-TOP: 10px" class=news_01>
<DIV class=news_01_top>
<H3>楼盘动态</H3><A href="/news/" target=_blank><SPAN>更多&gt;&gt;</SPAN></A></DIV>
<DIV class=news_01_n>
<?php
			$row = $mysql->query("select * from `web_content` where `pid`='28' order by addtime desc,id desc limit 0,1");
			foreach($row as $k=>$list){
		?>
          <SPAN><a  href="/news/show_<?php echo $list['id'];?>.html" target="_blank"><?php echo $list['title'];?></a></SPAN> 
        <?php
			}
		?>

<UL>
<?php
			$row = $mysql->query("select * from `web_content` where `pid`='28' order by addtime desc,id desc limit 1,5");
			foreach($row as $k=>$list){
		?>
          <li><a href="/news/show_<?php echo $list['id'];?>.html" target="_blank"><?php echo $list['title'];?></a></li> 
        <?php
			}
		?></UL></DIV></DIV><!--购房联盟留言开始-->
<DIV style="MARGIN-TOP: 10px" id=content class=gflm_gbook>
<DIV class=gflm_gbook_top>
<H3>购房联盟留言</H3></DIV>
<DIV class=gflm_gbook_n>
<UL>
<form action="../save.php?action=baoming" method="post" onSubmit="return checkTg(this);">
<input name="lpid" value="0" type="hidden">
  <input type="hidden" name="pid" value="32" />
  <LI><LABEL>姓名：</LABEL><INPUT class=gflm_gbook_inp placeholder="请输入您的姓名" type=text name=uname></LI>
  <LI><LABEL>手机：</LABEL><INPUT class=gflm_gbook_inp onKeyUp="this.value=this.value.replace(/\D/g,'')" placeholder="请输入您的手机" type=text name=utel></LI>
  <LI class=gfm_bz><LABEL>问题：</LABEL><TEXTAREA class=gflm_gbook_tex name=ucontent></TEXTAREA></LI>
  <LI><INPUT class=gflm_gbook_sub value="我要留言" type=submit name=submit></LI></FORM></UL></DIV></DIV><!--购房联盟留言结束-->
<DIV class=gbook_list>
<DIV class=gbook_list_n>
<UL>
<?php
			
            $row = $mysql->query("select * from `web_book` WHERE `pid`='30' and `cl`='1' order by id desc limit 0,5");
			 foreach($row as $k=>$list){
			?>
               <LI><SPAN class=titel><A><?php echo $list['uname'];?>：<?php echo $list['ucontent'];?></A></SPAN>
  <SPAN class=content>答：<?php echo $list['acontent'];?></SPAN></LI>
              <?php }?>
</UL></DIV></DIV>
<DIV class=page_gbook>
<UL class=fu2_biaotfye></UL></DIV></DIV></DIV><!--楼盘详情结束--></DIV></DIV><!--中间结束-->
<div class="clear"></div>
<?php include("../bottom.php");?>

<SCRIPT language=javascript>
<!--
function checkTtttg(theform)
{
  if (theform.uname.value=="") 
  {
    alert("真实姓名不能为空！");
    theform.uname.focus();
    return (false);
  }

if (theform.utel.value.length != 11) 
  {
    alert("手机号码不正确！");
    theform.utel.focus();
    return (false);
  }

return (true);
}
-->
</SCRIPT>
</body>
</html>
