<input type="hidden" id="bd_tel" value="<?php echo $config['company_tel'];?>">
<script type="text/javascript" src="/public/static/phone/js/common.enroll.js"></script>
<!-- 60秒找房 -->
<div class="w_box">
    <form id="frmup889" method="post" action="/m/save">
        <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
        <input type="hidden" name="ly" value="【<?php echo $sitecityname;?>】_移动端_底部领取优惠" id="make_tit_4">
        <input type="hidden" name="pid" value="33">
        <input type="hidden" name="action" value="bmtj">


        <div class="w_head"><p id="make_tit_2">专车看房</p><div class="closes"><a onclick="wid_close();"><img alt="关闭" src="/public/static/phone/img/icons/close.png"></a></div></div>
        <div class="w_body">
            <p class="w_body_t" id="make_tit_3">请正确填写您的信息。免费获取购房优惠折扣政策，不再错失购房良机</p>
            <div class="w_input">
                <input type="tel" placeholder="请输入手机号码" class="enter-tel"  name="utel" id="s-mobile" maxlength="11">
            </div>
            <div class="w_btn">
                <input type="submit" value="提交" class="enter-btn">
            </div>
        </div>
    </form>
</div>
<!--订阅动态 end-->
<div class="s_alert"></div>
<div class="footer" style="margin-bottom: 46px;">
    <ul class="footer-ul">

        <li><a href="/m/about/">关于我们</a><em>|</em></li>
        <li><a href="/m/about/21.html">联系我们</a><em>|</em></li>
        <li><a href="/m/about/3.html">网站合作</a><em>|</em></li>
        <li><a href="/m/about/78.html">购房流程</a></li>
    </ul>
    <div class="clear"></div>
    <div class="footer-dowm">
        <p class="icp">Copyright © <?php echo $siteasd;?> <a href="http://www.<?php echo $siteasd;?>" style="color: #fff; display:none;"><?php echo $config['company_name'];?></a> </p>
        <p class="icp"><a href="http://www.miibeian.gov.cn" target="_blank" rel="nofollow"><?php echo $config['site_icp'];?></a></p>
    </div>
</div>
<style>
    a{cursor: pointer;}a:hover{text-decoration:none;}
    .a-footer-layer li.a-nav-down a:hover{background: #388f03;text-decoration:none;}.a-nav-call a:hover{background: #c54547;text-decoration:none;}
    .footer-ul li{float: left;width: 25%;line-height: .5rem;}
    .footer-ul li em{float: right;color: #fff;font-size: .25rem;line-height: .6rem;}
</style>
<!-- 统计 -->
<style type="text/css">
    .a-footer-layer{ background: #fff;z-index: 10;width: 100%;-moz-box-shadow:0px -1px 4px #B0B0B0; -webkit-box-shadow:0px -1px 4px #B0B0B0; box-shadow:0px -1px 4px #B0B0B0;}
    .shou3-box{position: relative;padding: 8px 0; height: 42px;}
    .shou3-list1,.shou3-list2{ float: left;margin-left: 15px;position: relative;top: 0px;width: 37%;}
    .shou3-list3{float: left;width: 16%}
    .shou3-list1 img{width: .7rem}
    .shou3-list2 img{width: .6rem;margin-top: 2px;margin-right:1px;}
    .shou3-list1 a {display: block;background: #ff6d6f;color: #fff;border-radius: 5px;padding: .2rem 0px;text-align: center;font-size: .5rem;}
    .shou3-list2 a {display: block;background: #00A0EA;color: #fff;border-radius: 5px;padding: .2rem 0px;text-align: center;font-size: .5rem;}
    .shou3-list3 a{display: block;text-align: center;color: #00A0EA;font-size: .35rem;}
    .shou3-list1 p,.shou3-list2 p {font-size: 0.45rem;line-height:17px;}
    .c {display: block;zoom: 1;}
    .icon-1{background: url(/public/static/phone/img/icons/liwu.png) no-repeat center;background-size: .7rem .7rem;padding: .35rem .3rem;display: block;}
</style>
<div class="a-footer-layer">
    <div class="shou3-box c">
        <div class="shou3-list3">
            <a href="javascript:;"  rel="nofollow" onclick="openwid4('领取优惠','请正确填写您的信息。免费获取购房优惠折扣政策，不再错失购房良机','【<?php echo $sitecityname;?>】移动底部_领取优惠',2);">
                <ins class="icon-1"></ins>优惠
            </a>
        </div>
        <div class="shou3-list1"><a href="<?php echo $shangqiao;?>" rel="nofollow" data-agl-cvt="1"><img alt="在线咨询" class="lastimg" src="/public/static/phone/img/icons/zixun.png" data-bd-imgshare-binded="1">在线咨询</a></div>
        <div class="shou3-list2">
            <a href="javascript:phone('<?php echo $config['company_tel'];?>',2)" rel="nofollow" data-agl-cvt="2">

                <img alt="免费电话" class="lastimg" src="/public/static/phone/img/icons/tel.png" data-bd-imgshare-binded="1">免费电话</a>
        </div>
    </div>
</div>

<!-- 拨号 -->
<script type="text/javascript">
    function phone(date,frm){
        /* $.post("/sanya/ajaxbm/", {"frm": ""+frm+""},
         function(data){
           console.log(data.time); //  2pm
         }, "json");  */
        window.location.href = 'tel:' + date;
    }
    $(function () {
        //输入时禁止滑动
        $("input").focus(function () {
            document.body.addEventListener('touchmove',bodyScroll,false);
            $('body').css({'position':'fixed',"width":"100%"});
        });
        $("input").blur(function(){
            document.body.removeEventListener('touchmove',bodyScroll,false);
            $("body").css({"position":"initial","height":"auto"});
        });
        function bodyScroll(event){
            event.preventDefault();
        }
    });
</script>