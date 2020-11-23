

<script type="text/javascript" src="<?php echo $sitem;?>js2/common.enroll.js"></script>
<!-- 60领取红包 -->
<div class="s_groupf">
    <div class="strutsf">
        <div class="orderf">
            <div class="make_tit_2f"><p class="t-1f" id="make_tit_2f">降价通知</p></div>
            <!--make_tit end-->
            <div class="make_tit_3f"><span class="t-2f" id="make_tit_3f">降价后将通知您</span></div>
            <form id="frmup8891" name="myformzx2" method="post" action="../save.php?action=baoming" onSubmit="return checkLmt(this);">
        <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
<input type="hidden" name="pid" value="33">
<input type="hidden" name="ly" value="手机楼盘内页定制" id="make_tit_4f">
          <!--  <form id="frmup888" method="post" action="http://m.lou86.com/hk/ajax_enroll.html">
			<input type="hidden" name="post[house_id]" value="">
            <input type="hidden" name="post[sounce]" value="【海口】_立即抢红包" id="make_tit_4f">
            <input type="hidden" name="post[house_id]" value="">
            <input type="hidden" name="post[subject]" value="">
            <input type="hidden" name="post[name]" value="游客">
            <input type="hidden" name="upcode" value="91084">     -->                        
                <div class="make_formf">
                    <ul>                               
                        <li><input type="text" name="utel" id="s-mobilef" placeholder="请输入手机号码,每天仅限前10名" class="inpf"></li>                               
                    </ul>
                    <div class="clear"></div> 
                </div>
                <div class="blank10"></div>
                <div class="make_submitf">                       
                    <a onclick="wid_closef();" class="qx-btnf fl" style="color: #48bf01;">取消</a>
                    <input type="submit" value="立刻抢红包" name="bsubmit"  style="color: #fc0000;font-weight: 600;" class="fr">
                    <div class="clear"></div>                
                </div>
            </form>
        </div>
    </div>
</div>
<div class="s_alertf"></div>
<!-- 60秒找房 -->
<div class="s_group">
    <div class="struts">
        <div class="order">
            <div class="make_tit_2">
                <p class="t-1" id="make_tit_2">领取最新优惠</p>                
            </div><!--make_tit end-->
            <div class="make_tit_3"><span class="t-2" id="make_tit_3">降价后将通知您</span></div>
             <form id="frmup8891" name="myformzx2" method="post" action="../save.php?action=baoming" onSubmit="return checkLmt(this);">
        <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
<input type="hidden" name="pid" value="33">
<input type="hidden" name="ly" value="手机楼盘内页定制" id="make_tit_4">
            <!--<form id="frmup889" method="post" action="http://m.lou86.com/hk/ajax_enroll.html">
			<input type="hidden" name="post[house_id]" value="">
            <input type="hidden" name="post[sounce]" value="【海口】首页_订阅动态" id="make_tit_4">
            <input type="hidden" name="post[house_id]" value="">
            <input type="hidden" name="post[subject]" value="">
            <input type="hidden" name="post[name]" value="游客">
            <input type="hidden" name="upcode" value="91084">                             -->
                <div class="make_form">
                    <ul>                               
                        <li><input type="text" name="utel" id="s-mobile" placeholder="请输入您的手机号码" class="inp"></li>                               
                    </ul>
                    <div class="clear"></div> 
                </div>
                <div class="blank10"></div>
                <div class="make_submit">                       
                    <a onclick="wid_close();" class="qx-btn fl" style="color: #48bf01;">取消</a>
                    <input type="submit" value="确定" name="bsubmit"  style="color: #48bf01;" class="fr">
                    <div class="clear"></div>                
                </div>
            </form>
        </div>
    </div>
</div>
<!--订阅动态 end-->
<div class="s_alert"></div>
<div class="footer">
    <p><a href="<?php echo $sitem;?>about/?id=2">关于我们</a>
    <a href="<?php echo $sitem;?>news/">楼市资讯</a>
    </p>
    <p class="icp"><?php echo $config['company_name'];?> <?php echo $config['site_icp'];?></p>
</div>
<style>a{cursor: pointer;}a:hover{text-decoration:none;}.a-footer-layer li.a-nav-down a:hover{background: #388f03;text-decoration:none;}.a-nav-call a:hover{background: #c54547;text-decoration:none;}</style>
<SCRIPT language=javascript>
<!--
function checkLm(theform)
{
  if (theform.uname.value==""||theform.uname.value=="请输入您的姓名") 
  {
    alert("真实姓名不能为空！");
    theform.uname.focus();
    return (false);
  }

if (theform.utel.value.length != 11 ) 
  {
    alert("手机号码不正确！");
    theform.utel.focus();
    return (false);
  }

return (true);
}

function checkLmt(theform)
{
if (theform.utel.value.length != 11 ) 
  {
    alert("手机号码不正确！");
    theform.utel.focus();
    return (false);
  }

return (true);
}
-->
</script>