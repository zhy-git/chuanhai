<?php if($sss==1){?>
<!-- 样式 -->
<style>
.w_app_l {position:fixed;left:0;bottom:10%;display:none;z-index:20;}
.w_app_box {position:fixed;bottom:0;width:100%;height:150px;z-index:1000;left:0;}
.w_app_box ul li {position:relative;}
.w_app_box ul li .cover {height:150px;bottom:0;overflow: inherit;}
.cls {position:absolute;top:16px;right:44px;z-index:10}
.cls img {display:inline-block;width:20px;height:20px;}
.m_form {position:absolute;}
.w_app_box ul li.nw1 .m_form{bottom:25px;right:50%; margin-right: -400px;}
.w_app_box ul li.nw2 .m_form{bottom:60px;right:50%; margin-right: -406px;}
.w_app_box ul li.nw3 .m_form{bottom:25px;right:50%; margin-right: -513px;}
.w_app_box ul li.nw4 .m_form{bottom:25px;right:50%; margin-right: -518px;}
.m_form input[name="mobile"] {display:inline-block;width:220px;height:35px;line-height:35px;border:none;font-size:14px;padding-left:10px;background:#fff;color:#666;}
.m_form input[type="button"] {display:inline-block;width:100px;height:35px;line-height:35px;text-align:center;font-size:14px;color:#fff;background:#FBB60F;border:none;margin-left:10px;}
.w_img img {display:inline-block;width:100%;height:150px;}
.w_app_box ul li.nw3 .m_form input[type="button"]{ background: #3b62ed;}
.w_app_box ul li.nw4 .m_form input[type="button"]{ background: #c3040e;}
.w_app_box ul li.nw2 .m_form input[type="button"]{ background: #990f16;}

.w_app_box_ming .bd .prev{position: absolute;left: 8%;top: 50%;margin-top: -25px;display: block;width: 32px;height: 40px;background: url(/image/slider-arrow.png) -110px 5px no-repeat;
    filter: alpha(opacity=50);opacity: 0.5;}
.w_app_box_ming .bd .next{position: absolute;top: 50%;margin-top: -25px;display: block;width: 32px;height: 40px;background: url(/image/slider-arrow.png) 8px 5px no-repeat;
    filter: alpha(opacity=50);opacity: 0.5;right: 8%;}
.w_app_box_ming .bd .prev:hover,.bd .next:hover { filter: alpha(opacity=100);opacity: 1;}


@media (min-width: 1200px ) and (max-width: 1600px ){
    .w_app_box ul li.nw1 .m_form{bottom:25px;right:50%; margin-right: -385px;}
    .w_app_box ul li.nw2 .m_form{bottom:60px;right:50%; margin-right: -395px;}
    .w_app_box ul li.nw3 .m_form{bottom:25px;right:50%; margin-right: -483px;}
    .w_app_box ul li.nw4 .m_form{bottom:25px;right:50%; margin-right: -485px;}

    .commonality1{bottom:3px !important;right:50% !important; margin-right:-462px !important;}
    .commonality2{bottom:29px !important;right:50% !important; margin-right:-723px !important;font-size:12px;}
    .commonality3{bottom:7px !important;right:50% !important; margin-right:-13px !important;}
}
    
</style>

<!-- 悬标 -->
<div class="w_app_l">
    <a href="javascript:void(0);"><img src="/image/w_apply_l.png" alt=""></a>
</div>

<!-- 布局 -->
<div class="w_app_box w_app_box_ming">
    <div class="bd">
        <ul class="m_Carousel_ul">
            <li class="nw1">
                <a class="w_img" target="_blank" href="/house/lingshuixian-1832/">
                    <img src="/image/w_apply_1_1.png" alt="">
                </a>
                <form class="m_form submit_area">
                  <input type="hidden" name="hid" value="1832">              <!-- 0 为公共报名，其它为楼盘ID-->
                  <input type="hidden" name="source" value="35">     <!--报名来源 具体查看applyVerify.js文件中SourceModule 标识说明-->
                  <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->
                  <input name="mobile" type="text" placeholder="您的手机号码">
                  <input type="button" value="领取优惠"  class="m_button apply_submit">
                </form>
               
                <i class="m-commonality commonality1" style="display:block;position:absolute;bottom:3px;right:50%;margin-right:-480px;font-size:13px;color:#F6C47B;"></i>
               
                <a class="cls" href="javascript:void(0);"><img src="/image/cla_1.png" alt=""></a>

            </li>

            <li class="nw2">
                <a class="cls" href="javascript:void(0);"><img src="/image/cla_2.png" alt=""></a>
                <a class="w_img" target="_blank" href="/house/tengchongshi-2249/">
                    <img src="/image/w_apply_2_2.png" alt="">
                </a>
                <div class="b_input">
                    <form class="m_form submit_area">
                      <input type="hidden" name="hid" value="2249">              <!-- 0 为公共报名，其它为楼盘ID-->
                      <input type="hidden" name="source" value="34">     <!--报名来源 具体查看applyVerify.js文件中SourceModule 标识说明-->
                      <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->
                      <input name="mobile" type="text" placeholder="您的手机号码">
                      <input type="button" value="领取优惠"  class="m_button apply_submit">
                    </form>
                </div>

                <i class="m-commonality commonality2" style="display:block;position:absolute;bottom:29px;right:50%;margin-right:-820px;font-size:13px;color:#221C1C;font-weight:600;"></i>
            </li>
            
            <li class="nw4">
                <a class="cls" href="javascript:void(0);"><img src="/image/cla_2.png" alt=""></a>
                <a class="w_img" target="_blank" href="/house/kunmingshi-2246/">
                    <img src="/image/w_apply_4_4.png" alt="2246">
                </a>
                <div class="b_input">
                    <form class="m_form submit_area">
                      <input type="hidden" name="hid" value="0">              <!-- 0 为公共报名，其它为楼盘ID-->
                      <input type="hidden" name="source" value="36">     <!--报名来源 具体查看applyVerify.js文件中SourceModule 标识说明-->
                      <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->
                      <input name="mobile" type="text" placeholder="您的手机号码">
                      <input type="button" value="领取优惠"  class="m_button apply_submit">
                    </form>
                </div>

                <i class="m-commonality commonality3" style="display:block;position:absolute;bottom:7px;right:50%;margin-right:100px;font-size:13px;color:#999;"></i>
            </li>
        </ul>
        <!-- 如果需要导航按钮 -->
        <a class="prev" href="javascript:void(0)" onclick="return false"></a>
        <a class="next" href="javascript:void(0)"></a>
        <!-- <div class="swiper-button-prev"></div>
        <div class="swiper-button-next"></div> -->
    </div>
</div>
<?php }?>