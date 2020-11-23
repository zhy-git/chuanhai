<html lang="en" data-dpr="1" style="font-size: 54px;">

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
	$pricess='';
?>
<?php if($infos['all_price']==0){
	if($infos['jj_price']==0){
		$pricess='待定';
		}else{
			$pricess=$infos['jj_price'].'元/㎡';
			}
			 }else{
				  $pricess=$infos['all_price'].'万/套';
				   }?>
   <head>
    <meta charset="UTF-8">
    <meta name="format-detection" content="telephone=no">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=no,maximum-scale=1.0,minimum-scale=1.0">    
<title><?php echo $infos['title'];?>团购报名_<?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>">  
    <script src="/public/static/phone/js/flexible.js"></script>
    <link href="/public/static/phone/css/module-new.css" rel="stylesheet">
	<link href="/public/static/phone/css/my.css?v=2.5" rel="stylesheet">
    <link href="/public/static/phone/css/help-find2.css?v=2.5" rel="stylesheet">
    <script  src="/public/static/libs/jquery/1.x/jquery.min.js" type="text/javascript"></script>
    <script src="/public/static/common/js/jquery.form.js"></script>    
    <script src="/public/static/libs/layer/mobile/layer.js"></script>     
 </head>
<body>
  <?php if($sitecityid==45){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14397&companyId=416&channelid=14397&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
  <?php if($sitecityid==43){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14396&companyId=416&channelid=14396&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
  <?php if($sitecityid==44){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14395&companyId=416&channelid=14395&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
  <?php if($sitecityid==42){echo '<iframe src="http://eee.gxloushitong.com/g/index.html?id=14394&companyId=416&channelid=14394&webSource=eee.gxloushitong.com" height="0" style="border:none"></iframe>';}?>
<!-- 头部 -->
<!--nav begin-->
<div class="header">  
  <div class="go-back">
      <a href="javascript:void(0)" onClick="history.back(-1)"> <span class="ico ico-return">返回上一页</span> </a>
  </div>
  <!--切换城市-->
    <div class="city-change">                
        <span class="text">团购报名</span> 
    </div>    
</div>               
<!--nav end-->
<style type="text/css">
.tgbm-list-1{width: 90%;margin: 0 auto;    line-height: .8rem;height: .8rem} 
.tgbm-list-1 li{float: left;width: 30%;}   
.h10{height: 10px;}
.h20{height: 20px;}
.tgbm-list-1 .box-1{ border: 1px dashed #00A0EA;border-radius: 17px;font-size: .35rem;color: #00A0EA;text-align: center;}
</style>
<!-- 头部 end -->
<div class="h10"></div>
<div for="ab_no_default_help"style="margin-bottom: 1rem;"> 
        <div class="hp-three">
            <div class="">
                <div class="tgbm-list-1">
                    <ul>
                        <li class="box-1">免费接送看房</li>
                        <li style="width: 10px;color: #00A0EA;">+</li>
                        <li class="box-1">独享团购优惠</li>
                        <li style="width: 10px;color: #00A0EA;">+</li>
                        <li class="box-1">获取最新动态</li>
                    </ul>
                    <div class="clear"></div>
                </div>   
                <div class="h10"></div>       
                <div class="row1">
                    <div class="box-con">
                        <p style="text-align: center;line-height: 1.0rem;font-size: .4rem;">报名成功后，工作人员会稍后跟您联系</p>
                        <div class="bd">
                            <!--帮您找房-->
                            <form id="frm_tgbm" method="post" action="/m/save">
                            <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
                                <input type="hidden" name="ly" value="【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>_移动端_团购报名" id="make_tit_4">
                                <input type="hidden" name="pid" value="33">
                                <input type="hidden" name="action" value="bmtj">
                            <div class="look-house  form-box">                                
                                <div class="tr tr-phone">
                                    <div class="input-area">
                                        <input type="text" class="ipt"  value="<?php echo $infos['title'];?>" name="post[subject]" placeholder="请输入意向楼盘">
                                    </div>
                                </div>
                                <div class="tr tr-phone">
                                    <div class="input-area">
                                        <input type="text" class="ipt" name="uname" placeholder="请输入您的姓名">
                                    </div>
                                </div>
                                <div class="tr tr-phone">
                                    <div class="input-area">
                                        <input type="text" class="ipt" id="find-mobile-1" name="utel" placeholder="请输入您的手机号码">
                                    </div>
                                </div>
                                <div class="btn-area">
                                    <button  class="btn common-free-mobile-submit" type="submit">立即报名</button></div>
                            </div>
                            </form>
                        </div>
                        <div class="h20"></div>
                        <div style="width: 100%;margin: 0 auto;border: 1px dashed #00A0EA;border-radius: 5px;">
                            <ul style="padding: .5rem;">
                                <li style="text-align: center;font-size: .45rem;color: #00A0EA">购房后享三大优惠</li>
                                <li style="height: 10px;"></li>
                                <li style="font-size: .35rem;color: #00A0EA;line-height: .5rem;">1.购房成功后享受每套房机票报销3000元-5000元。</li>
                                <li style="font-size: .35rem;color: #00A0EA;line-height: .5rem;">2.购房成功后享受5年免费机场接送服务。</li>
                                <li style="font-size: .35rem;color: #00A0EA;line-height: .5rem;">3.购房成功后赠送海南当季特色水果大礼包。</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="clear"></div>
</div> 
<?php include("../bottom.php");?>
</body>
</html> 
