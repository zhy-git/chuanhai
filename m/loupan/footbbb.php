<style type="text/css">
   .nav{ position:fixed;left:0;right:0;top:0;padding:0px 0 0 0; max-width:480px; margin:0 auto;background: #fff}
   /*  .nav ul{position:relative; z-index:89;background: #fff;height: 408px;}
    .nav li{ float:left; width:25%;}
    .nav li a{ display:block; text-align:center; font-size:13px; padding:5px; color:#000;line-height: 23px}
    .nav li img{width: 40px; height: 40px;}
    .nav li ins{ display:block;margin:0 auto 3px auto;font-size:24px;width:50px;height:50px;line-height:50px;border-radius:50%;border:1px solid rgba(255,255,255,0.3); text-shadow:none;}
    .nav li a:hover ins,.nav li a.current ins{ border-color:rgba(255,255,255,0);background-color:#0368AE;}*/
    .sFix{display:none;z-index:888}
    .fixMask{position:fixed;left:0;right:0;top:51px;width:100%;height:100%;margin:0 auto;background-color:#000;-moz-opacity:.95;-khtml-opacity:.8;opacity:.8;z-index:88}
</style>
<style type="text/css">
    a{cursor: pointer;}a:hover{text-decoration:none;}.a-footer-layer li.a-nav-down a:hover{background: #388f03;text-decoration:none;}.a-nav-call a:hover{background: #c54547;text-decoration:none;}
    .footer-ul li{float: left;width: 25%;line-height: .5rem;}
    .footer-ul li em{float: right;color: #fff;font-size: .25rem;line-height: .6rem;}
    .popBox{background:#fff;border-radius:5px;width:80%;height:400px;-moz-box-shadow:0 0 10px 5px #f3bc5f75;-webkit-box-shadow:0 0 10px 5px #4e4d75;box-shadow:0 0 10px 5px #4e4d75}
    .popBox .close{position:absolute;right:-10px;top:-10px;background:#fff;height:36px;width:36px;border-radius:50%}
    .popBox .close ins{margin-top:3px;margin-left:3px}
    .popBox .closeIcon{font-size:30px;color:#ff6005;text-decoration:none}
    .popBox .title{background:#f8f8f8;height:65px;line-height:65px;padding-left:26px;color:#00A0EA;font-size:20px;border-radius:5px 5px 0 0}
    .popBox .textBox{overflow-y:auto;height:270px}
    .popBox .text{font-size:18px;color:#555;margin:15px 22px;line-height:28px}
    .popBox .btnBox{bottom:0}
    .popBox .btnBox a{font-size:.45rem;color:#fff;text-decoration:none}
    .popBox .tel{float:left;background:#00A0EA;height:65px;width:50%;line-height:65px;text-align:center}
    .popBox .online{float:left;background:#ff6d6f;height:65px;width:50%;line-height:65px;text-align:center}
    ins{font-family:iconfont;font-style:normal;font-weight:400;speak:none;display:inline-block;text-decoration:inherit;width:1.5em;margin:0;text-align:center;font-variant:normal;text-transform:none;vertical-align:middle}
    .icon-16{background: url(/public/static/phone/image/icons/close2.png) no-repeat;    padding: 14px 0px;}
    .icon-18{background: url(/public/static/phone/image/icons/tel1.png) no-repeat;    padding: 11px 0px;}
    .icon-5{background: url(/public/static/phone/img/icons/tel1.gif) no-repeat;    padding: 11px 0px;background-size: 21px 20px;}
    .icon-6{background: url(/public/static/phone/img/icons/tel4.gif) no-repeat;padding: 11px 0px;background-size: 20px 20px;}
</style>
<div id="yincangkuang" style="display: none">
    <div class="popBox">
        <div class="close"><a href="javascript:void(0)" class="closeIcon"><ins class="icon-16"></ins></a></div>
        <div class="title"><?php echo $infos['title'];?></div>
        <div class="textBox">
            <div class="text"><p><?php echo $infos['djyh'];?></p></div>
        </div>
        <div class="btnBox">
            <div class="tel"><a href="tel:<?php echo telsee($infos['loupan_tel']);?>"><ins class="icon-6"></ins>预约团购</a></div>
            <div class="online"><a class="swtopen" href="<?php echo $shangqiao;?>"><ins class="icon-5 "></ins>在线咨询</a></div>
        </div>
    </div>
</div>
<input type="hidden" id="houseid" value="<?php echo $lpid;?>">
<div id="fade" class="black_overlay"></div>
<script type="text/javascript">

    $(function(){
        // 点击按钮时判断 百度商桥代码中的“我要咨询”按钮的元素是否存在，存在的话就执行一次点击事件
        $(".swtopen").click(function(event) {
            if ($('#nb_invite_ok').length > 0) {
                $('#nb_invite_ok').click();
            }
        });
    });


    var id=$('#houseid').val();
    <?php if($infos['djyh']<>''){?>
    jQuery(function ($) {
        setTimeout(function () {
            var layerId = layer.open({
                type: 1
                , content: $(".popBox").html()
                , anim: 'up'
                , shadeClose: false
                , className: 'popBox'
                , style: '  border-radius: 5px;'
            });
        }, 12000);
    });
    <?php /*include("../sq2.php");*/?>
    <?php }?>
    $(document).on('click','.popBox .close',function(){
        /*$.post("/sanya/windcookie2/", { "id": ""+id+"" },
           function(data){
           }, "json");             */
        layer.closeAll();
    })
    function openbox2() {
        var layerId = layer.open({
            type: 1
            , content: $(".popBox").html()
            , anim: 'up'
            , shadeClose: false
            , className: 'popBox'
            , style: '  border-radius: 5px;'
        });
    }
</script>

<input type="hidden" id="bd_tel" value="<?php echo telsee($infos['loupan_tel']);?>">
<script type="text/javascript" src="/public/static/phone/js/common.enroll.js"></script>
<!-- 60秒找房 -->
<!-- 60秒找房 -->
<div class="w_box">
    <form id="frmup889" method="post" action="/m/save">
        <input type="hidden" name="lpid" value="<?php echo $lpid;?>">
        <input type="hidden" name="ly" value="【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>_底部漂浮预约看房" id="make_tit_4">
        <input type="hidden" name="pid" value="33">
        <input type="hidden" name="action" value="bmtj">
        <div class="w_head"><p id="make_tit_2">专车看房</p><div class="closes"><a onclick="wid_close();"><img src="/public/static/phone/img/icons/close.png"></a></div></div>
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
<div class="footer">
    <ul class="footer-ul">
        <li><a href="/m/about/">关于我们</a><em>|</em></li>
        <li><a href="/m/about/21.html">联系我们</a></li>
        <li><a href="/m/about/3.html">网站合作</a><em>|</em></li>
        <li><a href="/m/about/78.html">购房流程</a></li>
    </ul>
    <div class="clear"></div>
    <div class="footer-dowm">
        <p class="icp">Copyright © <?php echo $siteasd;?> <a href="http://www.<?php echo $siteasd;?>" style="color: #fff"><?php echo $config['site_name'];?></a> </p>
        <p class="icp"><?php echo $config['site_icp'];?></p>
    </div>
</div>
<!-- 统计 -->
<style type="text/css">
    .a-footer-layer {position: fixed;bottom: 0;z-index: 10;}
    .a-footer-layer{ background: #fff;z-index: 10;width: 100%;-moz-box-shadow:0px -1px 4px #B0B0B0; -webkit-box-shadow:0px -1px 4px #B0B0B0; box-shadow:0px -1px 4px #B0B0B0;}
    .shou3-box{position: relative;padding: 8px 0; height: 42px;}
    .shou3-list1,.shou3-list2{ float: left;margin-left: 15px;position: relative;top: 0px;width: 37%;}
    .shou3-list3{float: left;width: 16%}
    .shou3-list1 img{width: .6rem;position: relative;top: 5px;}
    .shou3-list2 img{width: .6rem;position: relative;top: 5px;}
    .shou3-list1 a {display: block;background: #ff6d6f;color: #fff;border-radius: 5px;padding: .2rem 0px;text-align: center;font-size: .5rem;}
    .shou3-list2 a {display: block;background: #00A0EA;color: #fff;border-radius: 5px;padding: .2rem 0px;text-align: center;font-size: .5rem;}
    .shou3-list3 a{display: block;text-align: center;color: #00A0EA;font-size: .35rem;}
    .shou3-list1 p,.shou3-list2 p {font-size: 0.45rem;line-height:17px;}
    .c {display: block;zoom: 1;}
    .icon-1{background: url(/public/static/phone/img/icons/liwu.png) no-repeat center;background-size: .7rem .7rem;padding: .35rem .3rem;display: block;}
</style>
<style type="text/css">
    .shou3-list1, .shou3-list2{width: 23.5%}
    .shou3-list2 a,.shou3-list1 a{font-size: .45rem}
</style>
<div class="a-footer-layer">
    <div class="shou3-box c">
        <div class="shou3-list3">
            <a href="javascript:openbox2();"  rel="nofollow">
                <ins class="icon-1" style="width: auto;"></ins>优惠
            </a>
        </div>
        <div class="shou3-list1">
            <a class="swtopen" rel="nofollow" href="<?php echo $shangqiao;?>" data-agl-cvt="1" style="background: #ff7178">在线咨询</a></div>
        <div class="shou3-list2">
            <a rel="nofollow" onclick="openwid4('预约看房','我们将为您保密个人信息！为您提供楼盘免费预约专车看房服务！','【<?php echo cityname($infos['city_id']);?>】<?php echo $infos['title'];?>_底部漂浮预约看房',2);"  style="background: #fd800b">预约看房</a></div>
        <div class="shou3-list2">
            <a href="javascript:phone('<?php echo telsee($infos['loupan_tel']);?>',2)" rel="nofollow" style="background: #fc0e08" data-agl-cvt="2">售楼处</a>
        </div>
    </div>
</div>

<!-- 拨号 -->
<script type="text/javascript">
    function phone(date,frm){
        /* $.post("/sanya/ajaxbm/", {"frm": ""+frm+""},
         function(data){
           console.log(data.time); //  2pm
         }, "json");*/
        window.location.href = 'tel:' + date;
    }
</script>