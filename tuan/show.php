<!DOCTYPE html>
<html lang="zh-cn">
<?php
session_start();
require("../conn/conn.php");
require("../function.php");
$lm=99;
$id=$_GET['id'];
if($id<>""){
	$rows=$mysql->query("SELECT * FROM `web_content` WHERE `id`='{$id}'");
	$infos=$rows[0];
	 if($infos==false)
	  {
		echo "已经出错!";
		exit;
	   }
	$click=$infos['click']+1;
	$mysql->execute("UPDATE `web_content` SET `click`='".$click."' where `id`='".$id."'");
	}
?>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title><?php echo $infos['title'];?>_团购_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $infos['title'];?>,<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $infos['title'];?>,<?php echo $config['site_desc'];?>">

    <link href="/css/public.css" rel="stylesheet">
    <link href="/css/alert.css" rel="stylesheet">
    
<script type=text/javascript src="../js/jquery-1.8.0.min.js"></script>
<!--上公用-->


    <link href="/css/lp_list.css" rel="stylesheet">
<link href="css/tuan.css" rel="stylesheet" type="text/css" />
<link href="css/ch.css" rel="stylesheet" type="text/css" />
<link href="css/house.css" rel="stylesheet" type="text/css" />
</head>
<body>
<?php include("../top.php");?>
<!---->
<div class="place"><em>当前位置：</em><a href="/"><?php echo $config['company_name'];?></a><span>&gt;</span><a href="/tuan/"><?php if($city_id==0){
				echo '海南';
				}else{
					$cityone=$mysql->query("select * from `web_city` where id='{$city_id}'");
					echo $cityone[0]['city_name'];
					}
				?>团购</a></div>

<div class="clear"></div>
<!---->
<!--头部结束-->
<!--中间开始-->
<DIV class=main>
    <DIV class=tuan_index>
        <DIV class=tuan_index_02>
            <DIV class=tuan_index_02_l>
                <DIV class=tuan_tg_view>
                    <DIV class=tuan_tg_view_01>
                        <DIV class=tuan_tg_view_01_t><H3><?php echo $infos['title'];?></H3></DIV>
                        <DIV class=tuan_tg_view_01_n>
                            <DIV class=tuan_tg_view_01_n_l>
                                <DIV class=tuan_tg_view_01_n_l_01>
                                    <SPAN class=sp1><?php echo $infos['tuanprice'];?></SPAN>
                                    <SPAN class=sp2><a class="lpadd fl bmkf-up" href="javascript:void(0);" data-name="我要报名" data-type="<?php echo $infos['title'];?>团购详细页_我要报名" data-info="请输入正确的手机号码 ，置业顾问会尽快联系您">我要报名</a></SPAN>
                                </DIV>
                                <DIV class=tuan_tg_view_01_n_l_02>
                                    <SPAN>市场参考价：<B><?php echo $infos['tuanprice2'];?></B></SPAN>
                                </DIV>
                                <DIV class=tuan_tg_view_01_n_l_03>
                                    <SPAN class=sp1><FONT class=f1><?php echo $infos['zhs'];?></FONT>人已参加</SPAN>
                                    <SPAN class=sp2>距离报名结束时间还有：</SPAN>
                                    <SPAN class="yomibox" data="<?php echo $infos['kptime'];?>"></SPAN>
                                </DIV>
                            </DIV>
                            <DIV class=tuan_tg_view_01_n_r><IMG src="../<?php echo $infos['img'];?>" > </DIV>
                        </DIV>
                    </DIV>
                    <DIV class=clear></DIV>
                    <DIV class=tuan_tg_view_02>
                        <DIV class=tuan_tg_view_02_t>
                            <H3>活动详情</H3>
                        </DIV>
                        <DIV class=tuan_tg_view_02_n><?php echo $infos['content'];?></DIV>
                    </DIV>
                    <DIV class=clear></DIV>
                    <DIV class=tuan_tg_view_03>
                        <DIV class=tuan_tg_view_03_t>
                            <P>好房不等人，赶快报名参加团购吧！</P>
                            <SPAN class=sp1><a class="lpadd fl bmkf-up" href="javascript:void(0);" data-name="我要报名" data-type="<?php echo $infos['title'];?>团购详细页_我要报名" data-info="请输入正确的手机号码 ，置业顾问会尽快联系您">我要报名</a></SPAN>
                        </DIV>
                    </DIV>
                </DIV>
            </DIV>
        
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
            $row = $mysql->query("select * from `web_link` where `ad_id`='41' order by px asc limit 0,6");
            foreach($row as $k=>$list){
            ?>
                <li>
                            <a href="<?php echo $list['link_url'];?>">
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
        
        </DIV>
    </DIV>
	<DIV class=clear></DIV>
</DIV><!--中间结束-->
<div class="blank20"></div>



<div class="row row-top-nav" style="display: none;">
	<div class="top-menu-wrap"></div>
</div>
<script src="s_files/house-detail.js"></script>
<script src="s_files/jqmodal.js"></script>
<script src="/js/qrcode.js"></script>
			<script>
                window.onload =function(){
                    var qrcode = new QRCode(document.getElementById("qrcode"), {
                        width : 70,//设置宽高
                        height : 70
                    });
                    qrcode.makeCode("<?php echo $site;?>loupan/<?php echo $lpid;?>.html");
                    document.getElementById("send").onclick =function(){
                        qrcode.makeCode(document.getElementById("getval").value);
                    }
                }
            </script>

<script src="s_files/owl.js"></script> 
<script src="s_files/news_commont.js"></script>
<script src="s_files/common-enroll.js"></script>

<div class="black-bg" style="display: none;" id="black_bg"></div>
<div class="send-mess lpm-bx3" style="display: none;">
    <p class="regist-title"><span class="lpm-bx3-t">降价通知我</span>
    <span class="close close-send lpm-colse2" title="关闭" id="bmkfCallClose">×</span></p>
    <div class="regist-form">
      <p class="send-mess-text1" id="box1_t">价格变动这么快？！楼盘降价的消息我们将第一时间通知您！</p>
       <form class="submit_area">
                    <input type="hidden" name="pid" value="35">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="lpid" value="<?php echo $lpid;?>">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="ly" value="团购详细页_我要报名">     <!--报名来源 具体查看applyVerify.js文件中source 标识说明-->
                    <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->
                    <input type="text" name="mobile" placeholder="请输入您的手机号码" class="regist-input3 mt15" style="margin-top: 15px;">
        <div class="h30"></div>  
                    <input type="button" value="我要报名" class="m_Find_submit sign-btn3 apply_submit regist-submit">
               
            </form>
      
    </div>
</div>
<?php include("../bottom.php");?>

<script type="text/javascript" src="../js/jquery.yomi.js"></script>
<DIV class=cha-tcbr></DIV><!-- 弹窗 -->
<DIV class=cha-tc>
<DIV id=cha_tbody>
<DIV class=cha-top>
<H3>参加团购活动</H3><A class=cha-close href="javascript:;" target=_self><SPAN>X</SPAN></A></DIV>
<DIV class=cha-n>
<?php if($infos['kptime']>date()){?>
<UL>
   <form id="myform" name="myform" method="post" action="../save.php?action=baoming" onSubmit="return checkTg(this);">
  <input type="hidden" name="lpid" value="<?php echo $infos['id'];?>" />
  <input type="hidden" name="pid" value="35" />
  <LI style="width:100%">我要报名团购参加<B><?php echo $infos['title'];?></B>看房，请填写您的真实手机，方便置业顾问联系您!</LI>
  <LI><LABEL>姓名：</LABEL><INPUT id="uname" class="chg_inp" type="text" name="uname" style="border:#CCC solid 1px; width:200px; background:#FFF;"></LI>
  <LI><LABEL>性别：</LABEL><INPUT value="男" type="radio" name="usex">男　<INPUT value="女" CHECKED type="radio" name="usex">女</LI>
  <LI><LABEL>手机：</LABEL><INPUT id="utel" class="chg_inp" onKeyUp="this.value=this.value.replace(/\D/g,'')" type="text" name="utel" style="border:#CCC solid 1px; width:200px; background:#FFF;"></LI>
  <LI style="width:100%"><LABEL>留言：</LABEL><TEXTAREA id="ucontent" class="chg_text" name="ucontent"></TEXTAREA></LI>
  <LI><LABEL></LABEL><INPUT class="chg_sub" value="我要报名" type="submit" name="submit" style="border:#999 solid 1px; padding:5px 10px;"></LI></FORM></UL>
  
 
        <div style="clear:both;"></div>
<UL> <?php 
		}else{
		?>
  <P style="TEXT-ALIGN: center; COLOR: #f00; FONT-SIZE: 40px">团购已结束</P></UL>
  <?php
			}
	   ?>
  </DIV></DIV></DIV><!--报名结束--><!--点击图片放大js开始-->
<SCRIPT language=javascript type=text/javascript>       
  	
	function dakai_cha()
  	{
  	  	$('div.cha-tc, div.cha-tcbr').css("display","block");
  	}
	$('a.cha-close').click(function(){
    	$('div.cha-tc , div.cha-tcbr').css("display","none");
  	});

</SCRIPT>
<SCRIPT language=javascript>
<!--
function checkTg(theform)
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
<?php include("../sq.php");?>

