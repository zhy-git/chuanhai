<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="hn">
<?php
require("../../conn/conn.php");
require("../function.php");
$lpid=$_GET['lpid'];
if($lpid<>""){
	$rows=$mysql->query("SELECT * FROM `web_content` WHERE `id`='{$lpid}'");
	$infos=$rows[0];
	 if($infos==false)
	  {
		echo "已经出错!";
		exit;
	   }
	$click=$infos['click']+1;
	$mysql->execute("UPDATE `web_content` SET `click`='".$click."' where `id`='".$lpid."'");
	}
?>
<head>
<meta name="applicable-device" content="mobile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-Control" content="no-cache">
<meta name="viewport" content="width=device-width, minimum-scale=1.0, maximum-scale=1.0">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no, email=no">
<meta name="renderer" content="webkit">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="HandheldFriendly" content="true">
<meta name="MobileOptimized" content="320">
<meta name="screen-orientation" content="portrait">
<meta name="x5-orientation" content="portrait">
<meta name="full-screen" content="yes">
<meta name="x5-fullscreen" content="true">
<meta name="browsermode" content="application">
<meta name="x5-page-mode" content="app">
<meta name="msapplication-tap-highlight" content="no">
<link href="../css2/my.css?v=1531209781" rel="stylesheet">
<link href="../css2/module-new.css?v=1531209781" rel="stylesheet">
<link href="../css2/house-detail.css" rel="stylesheet">
<script src="../js2/flexible.js" ></script>
<script  src="../js2/jquery.min.js" type="text/javascript"></script>
<script src="../js2/jquery.form.js"></script>    
<script src="../js2/layer.js"></script> 
<script src="../js2/flexible.js"></script>
<title><?php echo $infos['title'];?>,<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>"> 
<script type="text/javascript">
   window.onscroll=function(){ 
    var t=document.documentElement.scrollTop||document.body.scrollTop;  
    var htop2=document.getElementById("htop2"); 
    if(t>= 50){ 
        htop2.className = "htop2_1";
    }else{
        htop2.className = "htop2";
    } 
}
</script>
<style>		
.i_ask{padding: 10px;}
.i_ask h1{  background-size:280px; height:30px; font-size: 0.5rem}
.footer{height:1.6rem;padding:.24rem .32rem 0;background-color:#464754;}
.footer .icp,.footer h3{height:.37rem;line-height:.37rem;overflow:hidden}
.footer .map{position:absolute;top:.46rem;right:.32rem;font-size:.26rem;border-bottom:solid 1px #878787}
.footer h3{font-size:.26rem;font-weight:400}
.footer{text-align:center}
.footer a{color:#fefefc;font-size:.34rem;margin:.24rem}
.footer .icp{font-size:.34rem;color:#fefefc;margin-top:.2rem}
#content{font-size:.4rem;float:left;width: 9.15rem;margin-top:.2rem;margin-bottom:.2rem;height: 2rem;border-radius: 5px;padding: 5px;}
.ipt{width:9.4rem;height:1.1rem;font-size:.34rem;padding-left:.26rem;border:1px solid #ddd;box-sizing:border-box;border-radius:5px;background-color:#f4f4f4}
input.go {margin: 0!important;height: 36px!important;line-height: 36px!important;border: 1px solid #4da635!important}
.ask_arc1 a.go,input.go{display:block;width:100%;height:30px;text-align:center;line-height:30px;font-family:"微软雅黑";font-size:15px;color:#fff;background:#4da635;margin:5px auto;border:none;cursor:pointer}
.link-comment{line-height: 0.5rem;position:fixed;bottom:2rem;right:.32rem;width:1.6rem;height:1.6rem;border-radius:50%;background-color:rgba(51,51,51,.8);color:#fff}
.ico-write{background:url(/public/static/phone/image/icons/link-comment.png) no-repeat;background-size:100% 100%;display:inline-block;margin:.2rem .5333rem 0;float:left;width:.5466rem;height:.50666rem}
.link-comment .txt{display:inline-block;padding-left:.3rem;font-size: .3rem;}
.pagination li{float: left;width: .8rem;}
.user-info span{font-size: .2rem;}
</style>
</head>
<body style="background: #f4f4f4;">
<!--nav begin-->
<div class="header">
        <!--返回上一页-->
        <div class="go-back">
           <a href="javascript:void(0)" onClick="history.back(-1)">
                <span class="ico ico-return">返回上一页</span>
            </a>
        </div>
        <!--切换城市-->
    <div class="city-change"><span class="text">楼盘问答</span> </div>
    <!--用户行为跳转-->
    <ul class="u-link">
        <li class="link-home">
            <a href="<?php echo $sitem;?>" ><span class="ico ico-home">首页</span></a>
        </li>                
    </ul>
</div>
<div class="house-nav htop1">
	<div class=""  id="htop2">
        <ul class="house-nav-wrap">
            <li><a href="show.php?lpid=<?php echo $lpid;?>">楼盘主页</a></li>
            <li><a href="xmxx_show.php?lpid=<?php echo $lpid;?>">楼盘详情</a></li>
            <li><a href="loupan_hx.php?lpid=<?php echo $lpid;?>">户型详情</a></li>
            <li class="last-wrap"><a href="wenda.php?lpid=<?php echo $lpid;?>">楼盘问答</a></li>
        </ul>
    </div>   
</div>	  	
<!--nav end-->  

 
<div class="box" style="background: #fff">
	<div class="wraper">		
		<div class="i_ask">
			<div class="wrap">
				<h1>请将您的疑问告诉我们吧：</h1>
				<form id="frmup111" method="post" action="save.php?action=wenda" onsubmit="return checkLmt(this);">
					<textarea name="ucontent" id="content" cols="" rows="" placeholder="请输入您的问题"></textarea>
                        <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
                        <input type="hidden" name="pid" value="30">
					<div class="clear"></div>
					<div class="blank10"></div>
					<div class="clear"><input class="ipt" name="utel" id="mobile" placeholder="请输入手机号码" type="text"></div>					
					<div class="blank10"></div>
					<div class="blank20"></div>
					<input type="submit" class="go" style="border-radius: 5px;padding:0;margin:0;border:0 none;width:100%" value="马上提交">
				</form>
			</div>
		</div>
	</div>
</div>
    <div class="row" id="project_comment">
        <div class="mod mod-user-cmt">
            <div class="hd">
                <h2>楼盘问答 <!--(2)--></h2>
            </div>
        <div class="bd">
            <div class="user-cmt-list">
            
				 <?php
			
							$row = $mysql->query("select * from `web_book` WHERE `pid`='30' and `cl`='1' and `lpid`='{$lpid}' order by id desc limit 0,3");//and `cl`='1'
							 foreach($row as $k=>$list){
							?>
			<div class="user-cmt">
                                <div class="face">
                                    <span><img src="../image/icons/img-face3.png" alt=""></span>
                                </div>
                                <div class="text">
                                    <div class="user-info">
                                        <span class="fr c999"></span>
                                        <h4 class="name"  style="color:#bbb;">游客</h4>
                                        <div class="clear"></div>
                                    </div>
                                    <div class="cmt-detail">
                                        <p><?php echo $list['ucontent'];?></p>
										<p style="color:#bbb;"><?php echo $list['addtime'];?></p>
                                    </div>
                                    <div class="cmt-opt">
                                        <div class="date"></div>
                                    </div>
                                     <?php if($list['acontent']<>''){?>
										<div class="msn_2">
                                                <span class="c999">答：</span>
                                                <span class="f35"><?php echo $list['acontent'];?></span>
                                            </div>
                            <?php }?>
                                                                
                                </div>
                                <div class="clear"></div>      
                                <div class="blank10"></div>
                            </div>
                            <?php }?>
			</div>
            </div>                       
            <div class="show-more">
               <!--   -->
            </div>
        </div>
    </div>
<div class="blank10"></div>
<!-- 写点评 -->
<!-- <a href="?type=2" class="link-comment">
    <span class="ico ico-write">我要提问</span>
    <span class="txt">我要提问</span>
</a> -->
<!-- 写点评 end-->
<script type="text/javascript">
$(function(){
  $('#frmup').ajaxForm({
    beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
    success: complete, // 这是提交后的方法
    dataType: 'json'
  });
  function checkForm(){
        if( '' == $.trim($('#content').val())){           
         layer.open({content: '请输入您的问题',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});
          $('#content').focus(); 
          return false;
        }
        var mobile = /^1[3|4|5|7|8]\d{9}$/;        
        if(!mobile.test($.trim($('#mobile').val()))){            
         layer.open({content: '手机号格式非法',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});
          $('#mobile').focus(); 
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
});
</script>
<div class="a-footer-layer">
    <ul class="a-nav">
        <li class="a-nav-down" style="width: 50%;background: #48bf01;border: 0">
            <a href="javascript:;" onClick="openwid('预约看房','我们将为您保密个人信息！为您提供楼盘免费预约专车看房服务！','【海口】移动_预约看房');">
                <span class="ico ico-find1 tubiao">预约看房</span>
                <span class="text" style="color: #fff;">预约看房</span>
            </a>
        </li>
        <li class="a-nav-call" style="width: 50%">
                                  <a href="tel:<?php echo $config['company_tel'];?>">
                  
                <span class="ico ico-call">拨打售楼处电话</span>
                <span class="text">拨打免费电话</span>
            </a>
        </li>        
    </ul>
</div>
<style>
.make_tit_3 .t-2{font-weight: normal;}
.make_tit_3{text-align: inherit;}a{ text-decoration:none; }.qx-btn{color:#4fa536;font-size: 14px; font-weight: normal;}.a-footer-layer li.a-nav-down .ico-find1{margin:0.05rem .08rem 0 0;vertical-align:top}
.tubiao { margin: 0.05rem .08rem 0 0; vertical-align: top;background-image: url(/public/static/phone/image/icons/shijian.png);width: .3866rem;height: .3733rem;vertical-align: text-top !important;}
a{cursor: pointer;text-decoration:none;}.a-footer-layer li.a-nav-down a:hover{background: #388f03;text-decoration:none;}.a-nav-call a:hover{background: #c54547;text-decoration:none;}
</style>


<?php include("../bottom2.php");?>
</body>
</html> 
<div class="blank45"></div> 