<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">
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
    
<title><?php echo $infos['title'];?>问题咨询,<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $infos['title'];?>问题咨询,<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>"> 
<meta name="applicable-device" content="mobile">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<meta http-equiv="Cache-Control" content="no-cache">
<meta name="viewport" content="width=device-width,minimum-scale=1,maximum-scale=1">
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
<script src="/public/static/phone/js/jquery.js"></script>
<script src="/public/static/phone/js/flexible.js" ></script>
<link href="/public/static/phone/css/my.css" rel="stylesheet">
<link href="/public/static/phone/css/module-new.css" rel="stylesheet">
<link href="/public/static/phone/css/lp/house-detail.css" rel="stylesheet">
<script  src="/public/static/libs/jquery/1.x/jquery.min.js" type="text/javascript"></script>
<script src="/public/static/common/js/jquery.form.js"></script>    
<script src="/public/static/libs/layer/mobile/layer.js"></script> 
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
#content{font-size:.4rem;float:left;width: 9.15rem;margin-top:.2rem;margin-bottom:.2rem;height: 2rem;border-radius: 5px;padding: 5px;}
.ipt{width:9.4rem;height:1.1rem;font-size:.34rem;padding-left:.26rem;border:1px solid #ddd;box-sizing:border-box;border-radius:5px;background-color:#f4f4f4}
input.go {margin: 0!important;height: 36px!important;line-height: 36px!important;border: 1px solid #00A0EA!important}
.ask_arc1 a.go,input.go{display:block;width:100%;height:30px;text-align:center;line-height:30px;font-family:"微软雅黑";font-size:15px;color:#fff;background:#00A0EA;margin:5px auto;border:none;cursor:pointer}
.link-comment{line-height: 0.5rem;position:fixed;bottom:2rem;right:.32rem;width:1.6rem;height:1.6rem;border-radius:50%;background-color:rgba(51,51,51,.8);color:#fff}
.ico-write{background:url(/public/static/phone/image/icons/link-comment.png) no-repeat;background-size:100% 100%;display:inline-block;margin:.2rem .5333rem 0;float:left;width:.5466rem;height:.50666rem}
.link-comment .txt{display:inline-block;padding-left:.3rem;font-size: .3rem;}
.pagination li{float: left;width: .8rem;}
.user-info span{font-size: .2rem;}
</style>
</head>
<body style="background: #f4f4f4;">
<!--nav begin-->
<div class="header" style="z-index: 999;position: fixed;top: 0;width: 100%">
        <!--返回上一页-->
        <div class="go-back">
           <a href="javascript:void(0)" onclick="history.back(-1)">
                <span class="ico ico-return">返回上一页</span>
            </a>
        </div>
        <!--切换城市-->
    <div class="city-change"><span class="text">楼盘问答</span> </div>
    <!--用户行为跳转-->
        <ul class="u-link" style="top: .3rem;right: .2rem;">
            <li class="link-home"><a href="javascript:;" id="navBtn" style="display: block;"><img src="/public/static/phone/image/nav/nav.png"></a></li>                 
        </ul>
</div>
<div style="height: 51px;"></div>
<div class="house-nav htop1">
	<div class=""  id="htop2">
        <ul class="house-nav-wrap">
   	 <?php include("house-nav.php");?>
        </ul>
    </div>   
</div>	 	
<!--nav end-->  
<div class="box" style="background: #fff">
	<div class="wraper">		
		<div class="i_ask">
			<div class="wrap">
				<h1>请将您的疑问告诉我们吧：</h1>
				<form id="frmup" method="post" action="/m/save">
					<textarea name="ucontent" id="content" cols="" rows="" placeholder="请输入您的问题"></textarea>
					<input type="hidden" name="pid" value="30">
					<input type="hidden" name="action" value="wendatj">
					<input type="hidden" name="lpid" value="<?php echo $lpid;?>">
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
    <div class="row" id="project_comment" style="height: auto;">
        <div class="mod mod-user-cmt">
            <div class="hd">
                <h2>【<a href="/m/loupan/<?php echo $lpid;?>.html" title="<?php echo $infos['title'];?>" style="font-size: .45rem;"><?php echo $infos['title'];?></a>】楼盘问答 (<?php echo (int)countbook("where `lpid`={$lpid} and `cl`=1 and `pid`='30'");?>)</h2>
            </div>
        <div class="bd">
            <div class="user-cmt-list">
             <?php
		
		$row = $mysql->query("select * from `web_book` WHERE `pid`='30' and `cl`='1' and `lpid`='{$lpid}' order by id desc");
		

		foreach($row as $k=>$list){
		//	$url='/loupan/wenda/show_'.$list['id'].'.html';
?>
            
                <div class="user-cmt">
                    <div class="face">
                        <span><img src="/public/static/phone/image/img-face3.png" alt=""></span>
                    </div>
                    <div class="text">
                        <div class="user-info">                            
                            <h4 class="name" style="color:#bbb;">游客</h4>
                            <div class="clear"></div>
                        </div>
                        <div class="cmt-detail">
                            <p><?php echo $list['ucontent'];?></p>
							              <p> <span class="c999" style="font-size: .345rem;color:#bbb;">2019-06-07</span></p>
                        </div>
                                                        <div class="msn_2"><span class="c999">答：</span><span><p><span style="font-family: 微软雅黑, &quot;Microsoft YaHei&quot;; font-size: 14px;"><?php echo $list['acontent'];?></span></p></span></div>
                                                    
                    </div>
                </div>
<?php
		}
?>
                            
                
                            </div>
            </div>                       
            <div class="show-more">
               <!-- <ul class="pagination"><li class="disabled"><span>&laquo;</span></li> <li class="active"><span>1</span></li><li><a href="/sanya/wenda/2394.html?city=sanya&amp;id=2394&amp;page=2">2</a></li><li><a href="/sanya/wenda/2394.html?city=sanya&amp;id=2394&amp;page=3">3</a></li> <li><a href="/sanya/wenda/2394.html?city=sanya&amp;id=2394&amp;page=2">&raquo;</a></li></ul>  -->
            </div>
        </div>
    </div>
<div class="blank10">
</div>
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

<script type="text/javascript">
$(function() {
	$("#navBtn").click(function(){
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
<div class="nav sFix">
	<?php include("../ny_nav.php");?>
    <div class="fixMask"></div>
</div>

<?php include("foot.php");?>
<style>

.nav{ position:fixed;left:0;right:0;top:1.3rem;padding:0px 0 0 0; max-width:480px; margin:0 auto;background: #fff}
</style>
    </div>
</body>
</html>
<?php include("../sq.php");?>

<div style="height: 66px;"></div> 