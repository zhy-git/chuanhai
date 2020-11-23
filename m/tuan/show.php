<!DOCTYPE html>
<html class="no-js">
	
	<?php
require("../../conn/conn.php");
require("../function.php");
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
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, user-scalable=no">
<title><?php echo $infos['title'];?>_二手房<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>">
    
    <!--<link rel="stylesheet" type="text/css" href="mobile/xh/css/house.css">-->
    <link type="text/css" rel="stylesheet" href="../ershoufang/index_files/demo.css">
     <link rel="stylesheet" type="text/css" href="../ershoufang/index_files/newhouse_nav.css">
    <link rel="stylesheet" href="../ershoufang/index_files/footer.css">
     <link rel="stylesheet" type="text/css" href="../css/shuxing.css"/> <!--网站通用属性-->
		<link rel="stylesheet" type="text/css" href="../css/bottom-css.css"/><!--网站底部样式-->
		<link rel="stylesheet" type="text/css" href="../css/top-css.css"/><!--网站顶部样式-->
    <link type="text/css" rel="stylesheet" href="../ershoufang/index_files/mobile_footer.css">
    <link rel="stylesheet" type="text/css" href="../ershoufang/index_files/photo_suspension.css">
    <link rel="stylesheet" href="../ershoufang/index_files/nav.css">
     <link rel="stylesheet" type="text/css" href="../css/style.css"/>
     <link rel="stylesheet" type="text/css" href="house_sale.css"/>
     <link rel="stylesheet" type="text/css" href="swiper-4.1.0.min.css"/>
     <link rel="stylesheet" type="text/css" href="house_new.css"/>
     <link rel="stylesheet" type="text/css" href="amazeui.min.css"/>
    <link href="master.css" rel="stylesheet" />
    <link href="main.min.css" rel="stylesheet" />
    <link href="main.min2.css" rel="stylesheet" />
     
     <script src="../js/jquery-1.js"></script>
	<script src="../js/layer.js"></script>
       <script src="../js/jquery.js"></script>
    <script src="../ershoufang/index_files/jquery-1.js"></script>
    <script src="../ershoufang/index_files/demo.js"></script>
    <script src="../ershoufang/index_files/fontSize.js"></script>
    <link rel="stylesheet" type="text/css" href="../ershoufang/index_files/uiAlertView-1.css">
    <script src="../ershoufang/index_files/jquery.js"></script>
    <script src="swiper-4.1.0.min.js"></script>
<script type="text/javascript" src="jquery.yomi.js"></script>
    
    
    <!-- 微信分享 -->
    <script src="../ershoufang/index_files/jweixin-1.js"></script>
    <script src="../ershoufang/index_files/wxshare.js"></script>
    <script src="../ershoufang/index_files/wxconfig.js"></script>
    <script type="text/javascript">
        $(function(){
            $(document).click(function(e) {
                if(e.target.id != 'b1' && e.target.id != 'b2' && e.target.id != 'b3' && e.target.id != 'b4'  && e.target.className != 'area' && e.target.className != 'link' && e.target.className != 'ndown_box'){
                    $('.zlz').removeClass('grade-w-roll');
                    $('.Regional').removeClass('current');
                    $('.Sort').removeClass('current');
                    $('.Brand').removeClass('current');
                    $('.meishi').removeClass('current');
                }
            });
        });
        function  block(){
            document.getElementById('gradet').style.display="block";
        }
    </script>
    <link rel="stylesheet" type="text/css" href="../ershoufang/index_files/sale.css">
    <script type="text/javascript" src="../ershoufang/index_files/jquery-2.js"></script>
    <script type="text/javascript">
        $(function () {
            $("#sear_ch").keydown(function (event) {
                if (event.keyCode == 13) {
                    search();
                    $("#sear_ch").focus();
                    setTimeout(function () { $("#sear_ch").trigger("blur"); },500);
                }
            });
        });
    </script>
    <script type="text/javascript">
        /*li标签选中时添加样式*/
        $(document).ready(function(){
            $("#hain").click(function(){
                $(".ndown_box").css("color","#e46713");
                this.style.background = '#eeeeee'
            });
        });
    </script>
</head>
<body>
<!--头部开始-->
   <?php require("../top.php");?>		
<!--头部结束-->

<!--主体区域开始-->

    <div class="m_content" style="background:#FFF;">
    	
         <div class="lmHead">
                    <img src="<?php echo $site;?><?php echo $infos['img'];?>" onerror="this.src='<?php echo $site;?>images/nopic.jpg'">
                </div>
                <dl style="    padding: 0px 10px;">
                        <dt style="line-height:28px; font-size:16px;"><em><a href="" style="color:#3366cc">[团购]</a></em><a href=""><?php echo $infos['title'];?></a></dt>
                        <dd>
                           <DIV class=tuan_tg_view_01_n_l_03 style="line-height:24px;"><SPAN class=sp1 style="color:#F00;font-size: 0.5rem;"><FONT class=f1><?php echo $infos['zhs'];?></FONT>人已参加</SPAN> <br>
<div style="border-bottom:#c5c5c5 solid 1px; border-top:#c5c5c5 solid 1px; text-align:center; line-height:30px;"><SPAN style="float: left;font-size: 0.5rem;" class=sp2>距离报名结束时间还有：</SPAN> <?php if($infos['kptime']>date()){?>
        <SPAN class="yomibox" data="<?php echo $infos['kptime'];?>"></SPAN>
        <div style="clear:both;"></div>
       <?php 
		}else{
			echo '报名已结束';
			}
	   ?></div>
 
 </DIV> 
                        </dd>
                       
                    </dl>
                
                <div class="p_b10"></div>
                <!------------幻灯：结束------------>
                <DIV class=tuan_tg_view_02>
<DIV class=tuan_tg_view_02_t>
<H3 style="color:#FFF; background:#39F; line-height:30px; padding:2px 10px;font-size: 0.8rem;">活动详情</H3></DIV>
<DIV style="padding: 0px 10px;font-size: 0.6rem;" class="tuan_tg_view_02_n viewBody"><?php echo $infos['content'];?></DIV></DIV>
                <!--联盟楼盘：开始-->
                
<div class="clear"></div>
</div>
        <div style="height:50px;"></div>
   
<script type="text/javascript">
    function cssClear() {
        $('#sear_ch').val('');
    }
</script>


<?php include("../bottom.php");?>

<script language="javascript">
$.each($(".viewBody img"),function(){//把"content"修改为内容页显示内容的DIV的ID属性值
 var image=new Image();
 image.src=$(this).attr('src');
  $(this).attr('width','100%');
 if(image.width>0 && image.height>0){  
  if(image.width>=360){//三处"600"修改为需要等比例缩小的最大图片宽度
   $(this).attr('width','100%');
  }
 }
});
</script>
</body></html>