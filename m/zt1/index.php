<!DOCTYPE html>
<?php 
include("../../conn/conn.php");
include("../function.php");
?>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="Cache-Control" content="no-cache"/>
<meta name="viewport" id="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
<meta name="MobileOptimized" content="240"/>
<meta name="format-detection" content="telephone=no" />
<title>金九银十楼盘让利</title>
<meta name="keywords" content="金九银十楼盘让利！" />
<meta name="description" content="金九银十楼盘让利！" />
<link rel="stylesheet" type="text/css" href="css/public.css"/>
<link rel="stylesheet" type="text/css" href="css/swiper.min.css"/>
<link rel="stylesheet" type="text/css" href="css/style.css"/>
<script src="js/jquery-2.1.4.min.js"></script>
<script src="js/swiper.min.js"></script>
<script src="js/public.js"></script>
  <script>
  ! function(e, t) { var n = t.documentElement,
      d = e.devicePixelRatio || 1;

    function i() { var e = n.clientWidth / 3.75;
      n.style.fontSize = e + "px" } if (function e() { t.body ? t.body.style.fontSize = "16px" : t.addEventListener("DOMContentLoaded", e) }(), i(), e.addEventListener("resize", i), e.addEventListener("pageshow", function(e) { e.persisted && i() }), d >= 2) { var o = t.createElement("body"),
        a = t.createElement("div");
      a.style.border = ".5px solid transparent", o.appendChild(a), n.appendChild(o), 1 === a.offsetHeight && n.classList.add("hairlines"), n.removeChild(o) } }(window, document)
  </script>
<?php 
include("../sq2.php");
?>
</head>

<body>
    <header>
        <section>
            <div class="headerImg">
                <img src="images/header1.jpg" alt="">
                <img src="images/header2.jpg" alt="">
                <img src="images/header3.jpg" alt="">
                <img src="images/header4.jpg" alt="">
                <img src="images/header5.jpg" alt="">
               <!-- <p>截止时间：2020-10-31</p>-->
            </div>
        </section>
    </header>
    <main>
        <div class="main">
            <div class="loupan swiper-container" style="width:100%;">
               <img src="images/header1121.jpg" alt="" style="width:100%;"> 
            </div>
            <div class="baoming">
                <div class="baomingTitle">
                    <p>一键报名锁定优惠</p>
                </div>
                <form class="layer_baoming1_form" method="post" action="addorder.php" novalidate="">
                <div class="ctc-wrap2">
                    <input name="type" value="33" type="hidden">
                    <input type="hidden" name="house_title" value="">
                    <input type="hidden" name="house_id" value="">
                    <input name="memo" value="移动金九银十" type="hidden">
                    <input type="hidden" value="移动金九银十" name="type_name">
                    <input type="hidden" value="1" name="site_id">
                    <input type="hidden" value="house" name="model">
                </div>
                <div class="wu_zfbt">
                    <input type="text" placeholder="请输入您的姓名" onfocus="ohide();" onblur="oshow();" name="name">
                    <input type="text" placeholder="请输入您的手机号" onfocus="ohide();" onblur="oshow();" name="phone">
                    <input type="submit" value="报名看房" class="dibu_anniu js-ajax-submit button">
                </div>
                </form>
            </div>
            <div class="headerImg">
                <img src="images/wenzi1.jpg" alt="">
                <img src="images/wenzi2.jpg" alt="">
                <img src="images/biaoti2.jpg" alt="">
            </div>
            <div class="loupan swiper-container" style="width:100%;">
               <img src="images/header1122.jpg" alt="" style="width:100%;"> 
            </div>
            <div class="headerImg">
                <img src="images/wenzi3.jpg" alt="">
                <img src="images/wenzi4.jpg" alt="">
                <img src="images/biaoti3.jpg" alt="">
            </div> 
            <div class="loupan swiper-container" style="width:100%;">
               <img src="images/header1123.jpg" alt="" style="width:100%;"> 
            </div>
            <div class="baoming">
                <div class="baomingTitle">
                    <p>一键报名锁定优惠</p>
                </div>
                <form class="layer_baoming1_form" method="post" action="addorder.php" novalidate="">
                <div class="ctc-wrap2">
                    <input name="type" value="33" type="hidden">
                    <input type="hidden" name="house_title" value="">
                    <input type="hidden" name="house_id" value="">
                    <input name="memo" value="移动金九银十" type="hidden">
                    <input type="hidden" value="移动金九银十" name="type_name">
                    <input type="hidden" value="1" name="site_id">
                    <input type="hidden" value="house" name="model">
                </div>
                <div class="wu_zfbt">
                    <input type="text" placeholder="请输入您的姓名" onfocus="ohide();" onblur="oshow();" name="name">
                    <input type="text" placeholder="请输入您的手机号" onfocus="ohide();" onblur="oshow();" name="phone">
                    <input type="submit" value="报名看房" class="dibu_anniu js-ajax-submit button">
                </div>
                </form>
            </div>
            <div class="headerImg">
                <img src="images/wenzi5.jpg" alt="">
                <img src="images/wenzi6.jpg" alt="">
                <a href="tel:0770-2702871"><img src="images/wenzi7.jpg" alt=""></a>
            </div>             
            <div class="zhushi">
                <p>注释：</p>
                <p>1、本网站有着严格的加密技术和访问权限，保您信息不外露，可放心填写。</p>
                <p>2、页面所载内容、图片、价格、折扣仅供参考，实际情况以开发商公布的信息为准。</p>
            </div>    
        </div>
    </main>
    <script>
        var swiper = new Swiper('.loupan', {
            spaceBetween: 30,
            centeredSlides: true,
            loop: true,
            autoplay: {
                delay: 3200,
                disableOnInteraction: true,
            },
            pagination: {
                el: '.swiper-pagination',
                clickable: true,
            }
        });
    </script>     
    <footer>
        <div class="wu_footer">
            <ul class="clearfix"> 
                <li><a onclick="openZoosUrl('chatwin');">在线沟通</a></li>
                <li><a href="javascript:group('');">帮我找房</a></li>
                <li><a href="tel:<?php echo $config['company_tel'];?>">免费电话</a></li>
            </ul>
           <div class="wu_tops">
              <img src="images/top.png">
           </div>
        </div>
        <!-- 底部出现开始 -->
         <script type="text/javascript">
           $(function () {
                var _doc = $(document).height(); //整个页面高度
                var heads = $(".head").height();
                var _height = heads;
                window.onscroll = function () {
                 top_s = $(document).scrollTop();
                    if (top_s > _height) {
                    $('.wu_footer').fadeIn(500);
                  } else {
                    $('.wu_footer').fadeOut(500);
                  }
                };
            })
        </script>
        <!-- 底部出现结束 -->

        <!-- 返回顶部开始 -->
        <script type="text/javascript">
           $(function() {
               $(".wu_tops").click(function() {
                   $('body,html').animate({scrollTop: 0}, 300);
                   return false;
               });
           });
        </script>
        <!-- 返回顶部结束 -->
    </footer>

    <div class="windowes">
        <div class="windowTopes">
            <h1>看房报名</h1>
            <h2>楼盘信息一步到位</h2>
        </div>
        <div class="windowBottomes">
            <form class="layer_baoming1_form" method="post" action="addorder.php" novalidate="">
                <div class="ctc-wrapes2">
                    <input name="type" value="33" type="hidden">
                    <input name="memo" value="移动金九银十" type="hidden">
                    <input type="hidden" value="移动金九银十" name="type_name">
                    <input type="hidden" value="1" name="site_id">
                    <input type="hidden" value="house" name="model">
                </div>
                <input type="hidden" name="house_title" id="loupan" value=" ">
                <input type="hidden" name="house_id" value="" id="loupanid">
                <input type="hidden" name="title">
                <p class="mingzies">姓名：<span><input onfocus="move();" name="name" placeholder="请输入您的姓名" type="text"></span></p>
                <p class="mingzies">电话：<span><input onfocus="move();" name="phone" placeholder="请输入您的手机号码" type="text"></span></p>
                <p class="Submites"><span class="quxiaoes"><a href="javascript:delbox();">取消</a></span><span><button type="submit button" class="button sub js-ajax-submit">确定</button></span></p>
            </form>
        </div>
    </div>
    <a href="javascript:delbox();">
    <div class="alertes"></div>
    </a>
<!-- 弹出报名对话框 -->
<script src="js/jquery.ajax.form.js"></script>
<script>
    $(function(){
        $('form .button').bind('click',function(){
            var params = $(this).parents("form").serializeArray();
            
            var values = {};
            for( x in params ){
                values[params[x].name] = params[x].value;
            }
            var idata = JSON.stringify(values);
            var idata = JSON.parse(idata);
            var title = idata.name;
            console.log(idata);
            var content = idata.phone;
            var reg     = /1[34578][0-9]{9}$/;
            var length = '';
            if(title.length==0){
//                layer.msg('请填写您的姓名',{icon:2});
                alert('请填写您的姓名');
                return false;
            }
            if(!reg.test(content)){
//                layer.msg('请填写正确的手机号码',{icon:2});
                alert('请填写正确的手机号码');
                return false;
            }
            layer.load(1);
            $('.layer_baoming1_form').submit();
        });
        $('.layer_baoming1_form').ajaxForm({success:complate,dataType:'json'});
        function complate(result){
            if(result.status == 1){
               // $.post("http://m.chuangxiang888.com/ajax/sendmail.html",{content:result.content,haiwai:result.code},function(){});
                alert(result.msg);
                //location.reload();
				delbox();
                layer.msg(result.msg,{icon:1});
                setTimeout(function(){
                    var index = parent.layer.getFrameIndex(window.name);
                    parent.layer.close(index);
                },1500);
            } else {
                alert(result.msg);
                layer.msg(result.msg,{icon:2});
            }
        }
    });
</script>
<script>
function group(txt,id){
    if(txt,id){
        document.getElementById("loupan").value = txt;
        document.getElementById("loupanid").value = id;
    }else{
        var obj = document.getElementById("loupan");
        obj.value = ' ';
    }
    iBoxWidth = $(".windowes").width();
    iBoxHeight = $(".windowes").height();
    iWinWidth = $(window).width();
    iWinHeight = $(window).height();
    $(".windowes").css("left", (iWinWidth / 2 - iBoxWidth / 2) + "px");
    $(".windowes").css("top", (iWinHeight / 2 - iBoxHeight / 2) + "px");
    $(".windowes").fadeIn();
    $(".alertes").height(document.body.offsetHeight);
    $(".alertes").show();
}
function delbox(){
        $(".windowes").fadeOut();
        $(".alertes").hide();
}
//ajax 报名

</script>
<script>
    function move(){
        $(".windowes").css("top", 10+ "px");
    }
    function ohide(){
        $(".wu_footer").hide();
    }
    function oshow(){
        $(".wu_footer").show();
    }
</script>
</body>
</html>
<?php 
include("../sq.php");?>