<style>
.app-bottom{width:100%;height:120px;background:rgba(0,0,0,.5) !important;position:fixed;left:-100%;bottom:0;z-index:999;min-width:1200px; }
.app-bottom .inn{width:1200px;height:140px;position:relative;margin:0 auto}
.app-bottom .inn .pic-phone{display:inline-block;width:214px;height:214px;float:left;margin:-70px 30px 0 0}
.app-bottom .inn .pic-text{display:inline-block;width:110px;height:130px;float:left;margin:-15px 1px 0 0;/*background:url(image/bg-app-text.png) no-repeat*/}
.app-bottom .down-area .des{float:left;height:108px}
.app-bottom .down-area .des a,.app-bottom .down-area .des p{font-size:14px;color:#fff;line-height:20px}
.app-bottom .pic-app{width:48px;height:48px;margin:8px 0;background:url(image/bg-app.png) no-repeat;background-size:100% 100%}
.app-bottom .inn .down-area{height:108px;float:left;overflow:hidden;margin:18px 0 0 0}
.app-bottom .inn .down-area .ewm{float:left;margin-right:20px}
.app-bottom .inn .down-area .ewm,.app-bottom .inn .down-area .ewm img{width:108px;height:108px}
.app-fixed{display:inline-block;width:164px;height:98px;position:fixed;left:0;bottom:50px;cursor:pointer;z-index:999;background:url(image/bg-app-small.png) no-repeat}
.app-bottom-ld .pic-person{float:left;width:424px;height:248px;margin:-129px 12px 0 -7px;text-indent:-9999px;background:url(image/bg-app-person.png) no-repeat}
.app-bottom-ld .ld-area{float:left;margin-top:20px;overflow:hidden}
.app-bottom .closes,.app-bottom .pic-app,.app-bottom .pic-phone,.app-bottom .pic-text{text-indent:-9999px}
.app-bottom-ld .ipt-area{overflow:hidden}
.app-bottom-ld .ld-area .ld-ipt{float:left;width:270px;height:30px;line-height:30px;padding-left:10px;margin:0 20px 4px 0;font-size:14px;color:#000;border:none;outline:0; background:#FFF;}
.app-bottom-ld .ipt-area .btn-ld{float:left;width:100px;height:30px;line-height:27px;font-size:14px;color:#fff;text-align:center;border:solid 1px #ed603d;cursor:pointer;background-color:#fc4a3e;}
.app-bottom-ld .ipt-area .btn-ld:hover{background-color:#38bdf7}
.app-bottom-ld .ld-area p{text-overflow:ellipsis;white-space:nowrap;overflow:hidden;color:#fff}
.app-bottom-ld .ld-area .hot-line{font-size:16px;color:#fff}
.app-bottom .inn .closes{width:22px;height:22px;position:absolute;top:20px;right:20px;cursor:pointer;background:url(image/bg-app-close.png) no-repeat}
</style>
<form action="save.php?action=baoming" method="post" onsubmit="return checkTgt(this);">
<div class="app-bottom app-bottom-ld" style="left: 0px;">
    <div class="inn">
        <a onclick="sq()" target="_blank" style="display: block; cursor:pointer;" title="查看购房节专题">
        <div class="pic-person">小人图片</div>
        <div class="pic-text">买新房，可以更专业</div>
        </a>
        <div class="ld-area">
            <p class="text">钜惠礼献 六大购房优惠</p>
            <div class="ipt-area">           
                 <input name="pid" id="loupan" value="33" type="hidden">
                 <input name="ly" id="loupan" value="底部报名框" type="hidden">
                <input type="text" class="ld-ipt common-free-mobile-ipt" name="utel" id="lp-wd-mobile" placeholder="请输入手机号码">
                <button class="btn-ld common-free-mobile-btn" type="submit">领取优惠</button>            
            </div>
            <p class="hot-line" alt="hk">免费咨询热线：<?php echo $config['company_tel'];?></p>
        </div>
        <div class="closes">X</div>        
    </div>
</div>
</form>
<div class="app-fixed app-fixed-ld" style="left: -156px;"></div>    
<script>
function app_show_hide() {

    var app_bottom = $(".app-bottom");

    var app_fixed = $(".app-fixed");

    var app_fixed_width = app_fixed.width();

    app_bottom.find(".closes").on("click",function () {

        app_bottom.animate({"left":"-100%"},1000,function () {

            app_fixed.animate({"left":"0"},500)

        });

    });

    app_fixed.on("click",function () {

        app_fixed.animate({"left":-app_fixed_width},500,function () {

            app_bottom.animate({"left":"0"},1000)

        });

    });

}

app_show_hide();
</script>
