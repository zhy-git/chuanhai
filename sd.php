<!DOCTYPE html>
<html  lang="zh-cn">
<?php
require("conn/conn.php");
require("function.php");
//echo $pingyi;
if($pingyi=='www'){
    header('HTTP/1.1 301 Moved Permanently');
    //跳转到你希望的地址格式 
    header('Location: http://beihai.'.$siteasd.'/');
   //header('Location: http://haikou.'.$siteasd.'');
   echo "<script language='javascript'
type='text/javascript'>"; 
echo "window.location.href='http://beihai.".$siteasd."/'"; 
echo "</script>";  
    }
$yescity = $mysql->query("select * from `web_city` where `city_pingyin`='$pingyi' and `city_st`=1 and `pid`<>0 limit 0,1");
if($yescity[0]==''){
    //header('HTTP/1.1 301 Moved Permanently');
    //跳转到你希望的地址格式 
  header('Location: http://beihai.'.$siteasd.'/');
   //header('Location: http://haikou.'.$siteasd.'');
    }
?>
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="../image/favicon.ico" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <title>北海双旦专题_<?php echo $config['site_name'];?></title>
    <meta name=keywords content="<?php echo $config['site_keyword'];?>">
    <meta name=description content="<?php echo $config['site_desc'];?>">
    <meta http-equiv="Cache-Control" content="no-transform" />
    <link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
    <link href="http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/static/layui/css/layui.css" rel="stylesheet"/>
    <link rel="stylesheet" href="http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/static/home/theme/css/labor.css?v=9"/>
    <script src="http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/static/home/theme/js/jquery.js"></script>
    <script src="http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/static/common/js/jquery.form.js"></script>
    <script type="text/javascript" src="http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/static/layer/layer.js"></script>
</head>
<style type="text/css">
    body {
        background: #d20101;
        height: 100%
    }

    .build-item li {
        float: left;
        margin-right: 15px;
        width: 584px;
        height: 216px;
    }

    .w1200 {
        width: 1200px;
        margin: 0 auto;
    }

    .build-item li .info-right h1 i {
        display: inline-block;
        font-style: normal;
        font-size: 12px;
        border: 1px solid #fd6071;
        border-radius: 50px;
        padding: 0 3px;
        position: relative;
        top: -2px;
        left: 10px;
        font-weight: normal;
        background: #fd6071;
        color: #fff;
    }

    .build-item li {
        padding: 15px 10px;
        background: #FFF;
        margin-top: 30px;
        border-radius: 5px;
        width: 49.2%;
        box-sizing: border-box;
        -moz-box-sizing: border-box;
        -webkit-box-sizing: border-box;
    }

    .build-item li {
        float: left;
        margin-right: 30px;
        width: 584px;
        height: 210px;
    }

    .fiex {
        width: 170px;
        height: 600px;
        position: fixed;
        top: 15%;
        background: none;
        border-radius: 100px;
        overflow: hidden;
        left: 50%;
        margin-left: 609px;
    }

    .build-item li .thumb-left {
        height: 185px;
        border-radius: 5px;
        overflow: hidden;
        float: left;
        -moz-box-shadow: 1px 1px 2px #888;
        -webkit-box-shadow: 1px 1px 2px #888;
        box-shadow: 1px 1px 2px #888;
        margin-right: 15px;
        overflow: hidden;
    }

    .zuo2 {
        float: left;
        padding-top: 3px
    }

    .mingzi2 input {
        height: 45px;
        margin-right: 20px;
        padding-left: 10px;
        width: 200px;
        background: #fff;
        border: 1px solid #fff;
        color: #898989;
        font-size: 14px
    }

    .js-ajax-submit {
        background: #fb8306 none repeat;
        font-size: 22px;
        width: 150px;
        height: 47px;
        color: #fff;
        margin-left: 40px;
        border: 0;
        background-color: none;
        -moz-box-shadow: 2px 2px 5px #000;
        -webkit-box-shadow: 2px 2px 5px #000;
        box-shadow: 2px 2px 3px rgba(0, 0, 0, .2);
        border-radius: 23px;
        cursor: pointer
    }

    .count p.btn {
        width: 59%;
        letter-spacing: 1px;
        padding: 8px 0;
        font-size: 16px;
        font-weight: 400;
        background: linear-gradient(#f99b00, #f99b00, #f99b00);
        margin: auto;
        border-radius: 50px;
        text-align: center;
        margin-top: 7px
    }

    .fl {
        float: left;
    }

    .fr {
        float: right;
    }

    .count p.btn a {
        color: #fff;
    }

    .fiex-thumb {
        margin-top: 0
    }

    .count .footer {
        position: absolute;
        bottom: -118px;
        left: 0px;
        width: 100%
    }

    .house-list-ul li {
        float: left;
        margin-right: 20px;
        width: 360px;
        height: 424px;
    }

    .house-list-ul li img {
        width: 100%
    }

    .house-list-ul li .pic {
        position: relative;
        overflow: hidden;
        border-top-right-radius: 7px;
        border-top-left-radius: 7px;
    }

    .house-list-ul li .pic .status {
        background: #ff1e1e;
        color: #fff;
        position: absolute;
        top: 10px;
        left: 20px;
        padding: 4px 8px;
        border-radius: 3px;
    }

    .house-list-ul li .txt {
        background: #fff;
        padding: 10px;
        border-bottom-right-radius: 7px;
        border-bottom-left-radius: 7px;
    }

    .house-list-ul li .txt p {
        padding-bottom: 5px;
    }

    .house-list-ul li .txt .hui {
        background: #ffe2e2;
        height: 26px;
        border-radius: 3px;
        padding: 5px;
        line-height: 26px;
    }

    .btn {
        padding-left: 10px;
        padding-right: 10px;
    }

    .btn span {
        border: 1px solid #ec0000;
        border-radius: 5px;
        display: inline-block;
        color: #ec0000;
        padding: 5px 20px;
        text-indent: 20px;
    }

    .btn span.zx {
        background: url(http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/theme/jianjun/2019630/msg.png) no-repeat;
        margin-right: 98px;
        background-size: 26px 26px;
        background-position: 10px 2px;
    }

    .btn span.call {
        background: url(http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/theme/jianjun/2019630/tel.png) no-repeat;
        background-size: 20px 20px;
        background-position: 12px 4px;
        position: relative;
    }

    .house-list-ul li .txt .btn-2 {
        padding-left: 10px;
        padding-right: 10px;
    }

    .info-list {
        background: #fff;
        border-radius: 27px;
        padding: 20px;
    }

    .info-list .c {
        border: 2px dashed #6bac4c;
        border-radius: 27px;
        padding: 20px;
    }

    .info-list .c h3 {
        color: #ec0000;
        font-size: 18px;
        font-weight: 700
    }

    .fiex-thumb {
        width: 100%
    }

    .count p.xl {
        margin-top: 0
    }

    .count {
        height: 426px;
    }

    .count p.number, .count .sm {
        color: #fff
    }

    .house-list-ul .pic .tit {
        position: absolute;
        bottom: 0px;
        left: 0px;
        color: #fff;
        font-size: 24px;
        background: rgba(0, 0, 0, .6);
        width: 100%;
        line-height: 45px;
        padding-left: 6px;
    }

    .count .sm {
        margin: 0
    }

    .swiper-container {
        height: 471px;
    }

    .pic-box-2 {
        position: relative;
        height: 471px;
    }

    .pic-box-2 .pic {
        padding: 20px;
        z-index: 10;
        position: absolute;
    }

    .titile {
        font-size: 20px;
    }

    .info p {
        line-height: 29px;
    }

    .count .sm i {
        display: inline-block;
        width: 13px;
        height: 13px;
        background: url(http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/theme/zimao/ewm_03.gif) no-repeat;
        background-size: 100% 100%;
    }

    .scrolltext ol li {
        padding-left: 7px;
        width: 300px;
        height: 25px;
        font-size: 13px;
        line-height: 25px;
    }

    .scrolltext ol li a {
        color: #000;
        display: block;
        width: 371px;
        white-space: nowrap;
        text-overflow: ellipsis;
        -o-text-overflow: ellipsis;
        overflow: hidden;
    }

    .scrolltext {
        padding: 15px 15px 0 14px;
        width: 371px;
        height: 90px;
        overflow: hidden;
    }

    #breakNews .list6 {
        overflow: hidden;
        width: 100%;
    }

    #breakNewsList span {
        padding-right: 30px;
    }

    .bm-ul li {
        height: 35px;
        margin-bottom: 10px;
    }

    .bm-ul .txt {
        height: 30px;
        width: 220px;
        float: left;
        border: 1px solid #e1e1e1;
        padding-left: 5px;
    }

    .window {
        height: 380px;
        width: 736px;
        z-index: 999;
        display: none;
        position: fixed
    }

    .windowTop {
        background: #00aded;
        width: 736px;
        height: 80px;
        color: #fff;
        position: relative
    }

    .windowTop h1 {
        font-size: 30px;
        padding-top: 10px;
        padding-left: 20px;
        text-align: center
    }

    .windowTop p {
        font-size: 16px;
        padding-left: 20px;
        text-align: center
    }

    .shut {
        position: absolute;
        right: 20px;
        top: 15px
    }

    .windowBottom {
        background: #fff;
        width: 736px;
        padding: 0 0 20px 0
    }

    .windowBottom {
        background: #fff;
        width: 736px;
        padding: 0 0 20px 0
    }

    .windowSignLeft {
        float: left;
        padding-left: 55px
    }

    .windowSignLeft input {
        border: solid 1px #000;
        width: 200px;
        height: 38px;
        margin-top: 30px;
        margin-left: 20px
    }

    .windowSignLeft span {
        font-size: 18px
    }

    .windowSignRight {
        float: left;
        margin-left: 80px
    }

    .windowSignRight .dianhua {
        border: solid 1px #000;
        width: 200px;
        height: 38px
    }

    .xingbie {
        margin-top: 30px;
        margin-bottom: 30px
    }

    .windowSignRight span {
        font-size: 18px;
        padding-right: 10px
    }

    .windowSignRight .xsns {
        font-size: 26px
    }

    .bulk {
        width: 222px;
        margin: 0 auto;
        padding-top: 25px;
        padding-bottom: 25px
    }

    .bulk button {
        background: #00aded;
        color: #fff;
        font-size: 24px;
        padding: 5px 40px;
        border-radius: 20px
    }

    .alert {
        background: #000 none repeat scroll 0 0;
        opacity: .5;
        position: fixed;
        top: 0;
        width: 100%;
        z-index: 2
    }

    .jiesong p {
        font-size: 14px;
        text-align: center
    }

    .tag2 span {
        border: 1px solid #ddd;
        padding: 2px 8px;
        color: #999;
        margin-right: 10px;
    }

    .pic2-ul li {
        width: 230px;
        float: left;
        margin-right: 30px;
    }

    .tag {
        margin: 8px 0 8px 0;
    }

    .tag span {
        border: 1px solid #ee0000;
        color: #ee0000;
        padding: 2px 5px;
        margin-right: 5px;
    }

    .nav-2 li {
        float: left;
        width: 19.66%;
        text-align: center;
        height: 306px;
    }

    .ul-bm .inp {
        height: 35px;
        padding-left: 8px;
        border: 0;
        width: 190px;
        border-radius: 3px;
    }

    .ul-bm li {
        margin-bottom: 10px;
    }

    .btm2 {
        border: 0;
        height: 35px;
        background: #e5eab6;
        width: 100%;
        color: #ff5a00;
        font-size: 16px;
        cursor: pointer;
        font-weight: 700;
    }

    .tags {
        line-height: 30px;
        margin-top: 10px;
    }

    .tags span {
        color: #999
    }

    .p1-ul li {
        float: left;
        margin-right: 17px;
    }

    .p1-ul li img {
        width: 150px;
        height: 114px;
    }

    /*报名*/
    .bm-ul2 li {
        margin-bottom: 10px;
    }

    .bm-ul2 li input {
        height: 30px;
        border: 1px solid #ddd;
        width: 210px;
        padding-left: 5px;
    }

    .roll-enroll {
        width: 310px;
        margin: 0 auto
    }

    .roll-enroll dt {
        position: relative;
        overflow: hidden;
    }

    .roll-enroll dt span {
        background: #fffbf2;
        float: left;
        line-height: 40px;
        font-size: 16px;
        color: #333;
    }

    .roll-enroll dt i {
        color: #fff;
    }

    .roll-enroll dt b {
        position: absolute;
        height: 1px;
        width: 600px;
        right: 0;
        top: 22px;
        border-bottom: #ddd 1px dashed;
    }

    .roll-enroll .roll-hidden {
        position: relative;
        height: 160px;
        overflow: hidden;
    }

    .roll-enroll .roll-list {
        overflow: hidden;
        position: absolute;
        width: 100%;
        left: 0;
        top: 0;
        margin: 0;
    }

    .roll-enroll .roll-item span, .roll-enroll .roll-item p, .roll-enroll .roll-item i, .roll-enroll .roll-item b {
        float: left;
        line-height: 32px;
        width: 100px;
        color: #333;
        white-space: nowrap;
        overflow: hidden;
    }

    .roll-enroll .roll-item {
        float: left;
        width: 335px;
    }

    .roll-enroll .roll-item span {
        text-indent: 15px;
        overflow: hidden;
    }

    .roll-enroll .roll-item p {
        width: 90px;
        margin: 0;
        text-align: left;
    }

    .roll-enroll .roll-item i {
        width: 70px;
    }

    .roll-enroll .roll-item b {
        font-weight: normal;
        width: auto;
    }

    .tag3 {
        height: 40px;
    }

    .tag3 span {
        border: 1px solid #fff;
        color: #fff;
        font-size: 14px;
        padding: 5px 15px;
        margin-right: 10px;
    }
</style>
<body>
<!--头部大图:begin-->
<div class="w100b top-thumb">
    <img src="http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/theme/20201222/p_01.jpg" alt=""/>
    <img src="http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/theme/20201222/p_02.jpg" alt=""/>
    <img src="http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/theme/20201222/p_03.jpg" alt=""/>
</div>
<div class="w1200"
     style="background: url('http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/theme/20201222/p_06.jpg') no-repeat;height: 113px;background-size: 100%;margin-top: 30px;">
    <div style="width: 670px;float: right;">
        <div class="fl"
             style="width: 295px;height: 80px;border-right: 1px dashed #fcff00;margin-right: 20px;margin-top: 23px;background: #fff;border-radius: 5px;overflow: hidden;">
            <div class="roll-enroll">
                <dl>
                    <dd class="roll-hidden">
                        <ul class="roll-list" style="top: -13.728px;">
                            <li class="roll-item"><span>川海房产看房团</span><span>135****0235</span>（2020-12-23）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>186****1532</span>（2020-12-23）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>185****5623</span>（2020-12-23）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>156****4521</span>（2020-12-23）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>138****2300</span>（2020-12-23）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>139****1144</span>（2020-12-23）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>187****6956</span>（2020-12-23）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>152****2563</span>（2020-12-23）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>150****2552</span>（2020-12-23）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>138****7854</span>（2020-12-23）</li>

                            <li class="roll-item"><span>川海房产看房团</span><span>138****7800</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>158****3652</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>138****2540</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>139****1456</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>135****2658</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>132****7895</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>138****4587</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>131****6398</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>138****0332</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>130****0224</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>138****7800</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>158****3652</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>138****2540</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>139****1456</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>135****2658</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>132****7895</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>138****4587</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>131****6398</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>138****0332</span>（2020-12-22）</li>
                            <li class="roll-item"><span>川海房产看房团</span><span>130****0224</span>（2020-12-22）</li>
                        </ul>
                    </dd>
                </dl>
            </div>
        </div>
        <form class="submit_area" >
            <input type="hidden" name="pid" value="33">              <!-- 0 为公共报名，其它为楼盘ID-->
            <input type="hidden" name="lpid" value="0">              <!-- 0 为公共报名，其它为楼盘ID-->
            <input type="hidden" name="ly" value="底部_随屏">     <!--报名来源 具体查看applyVerify.js文件中source 标识说明-->
            <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->
            <input type="hidden" name="name" value="双旦">
            <div class="fl" style="margin-top: 35px;">
                <ul class="bm-ul2">
                    <li><input type="text" name="mobile"  id="lp-wd-mobile" placeholder="请输入手机号码"></li>
                    <li><p style="color: #fff;">累计昨天参团人数 <span style="color: #fcff00;font-size: 16px;">242</span> 人</p>
                    </li>
                </ul>
            </div>
            <div class="fl" style="margin-top: 35px;margin-left: 30px;">
                <input type="button" class="slider-submit apply_submit" style="width: 70px;height: 90px;background: transparent;border: 0;cursor: pointer;">
            </div>
        </form>
        <div class="clear"></div>
    </div>
</div>
<div style="height: 30px"></div>
<div class="w1200" style="width: 100%">
    <img src="http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/theme/20201222/p_24.jpg" style="width: 100%">
</div>
<!-- 精品推薦 -->
<div class="w1200"
     style="margin-top: 40px;background: url(http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/theme/s11/p_10.jpg) no-repeat;height: 642px;background-size: 100%;">
    <div style="height: 120px;"></div>
    <div style="margin: 0 auto;width: 92%;">
         <?
              $rowlistrm = $mysql->query("select * from `web_content` where `pid`=9 and `city_id` = '42' order by px20 desc limit 0,1");
              foreach($rowlistrm as $k=>$listrm){
                $url='/loupan/'.$listrm['id'].'.html';
            ?>
                <div class="fl" style="border: 5px solid #ffefa6;position: relative;">
            <a href="<?php echo $url;?>" style="display: block;" target="_blank">
                <div style="position: absolute;left: 15px;top: -10px;">
                    <img src="http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/theme/nz/hui2.png" alt=""/>
               </div>
                    <img src="../<?php echo $listrm['img'];?>"
                     style="width: 600px;height: 425px;">
            </a>
        </div>

        <div class="fl" style="margin-left: 30px;width: 460px;">


            <div style="position: relative;">
                <a href="<?php echo $url;?>" style="display: block;" target="_blank">
                <h3 style="font-size: 18px;color: #fff;padding-bottom: 15px;font-size: 30px;font-weight: 700"><?php echo $listrm['title'];?></h3></a>
                <span style="position: absolute;right: 10px;top: 5px;background: #ff1e1e;font-size: 16px;color: #fff;padding: 4px 7px;border-radius: 3px;">在售</span>
            </div>
            <div class="tag3">
                <?php echo loupanflagtsi2($listrm['flagts'],6,4);?>
                <!-- <span class="tag-3">小户型</span><span class="tag-3">海景地产</span><span class="tag-1">旅游度假</span>            -->
            </div>
            <div style="background:#ffe5d2 url('http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/theme/nz/hui.png') left no-repeat;height: 37px;">
                <span style="line-height: 40px;font-size: 18px;padding-left: 55px;color: #f00;"><?php echo $listrm['fkfs'];?></span>
            </div>
            <div style="line-height: 40px;margin-top: 10px;"><p style="font-size: 18px;color: #fff;">主力户型：<?php echo $listrm['zlhx']?></p>
            </div>
            <div style="line-height: 40px;"><p style="font-size: 18px;color: #fff;">地&nbsp;&nbsp;址：<?php echo $listrm['xmdz']?></p></div>
            <div style="margin-top: 10px;">
                <span style="font-size: 18px;color: #fcffa6;">参考均价：</span>
                <span style="font-size: 40px;color: #fcffa6;"><?php echo $listrm['jj_price'];?></span><span style="font-size: 18px;color: #fcffa6;">元/㎡</span>            </div>
            </a>
            <div style="margin-top: 50px;"><a
                    href="https://byt.zoosnet.net/LR/Chatpre.aspx?id=BYT35574945&cid=a1062762b2c444b3a4a51af0d15beb0a&lng=cn&sid=6b08d724350e4473a55764d93a8ab433&p=http%3A//beihai.chuanhai.jtr168.cn/&rf1=&rf2=&msg=&d=1608786341791" target="_blank"
                    style="background: #fb7a0f;border-radius: 31px;padding: 17px 125px;font-size: 26px;color: #fff;">预约看房</a>
            </div>
            <?php
               }
            ?>
        </div>
        
    </div>

    <div class="clear"></div>
</div>
<!-- 品质优盘 -->
<div class="w1200"
     style="margin-top: 40px;background: url(http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/theme/s11/p_13.jpg) no-repeat;height: 710px;background-size: 100%;">
    <div style="height: 140px;"></div>
            
    <div style="margin: 0 auto;width: 92%;">
        <ul class="x3-ul" style="width: 1125px;">
           <?
              $hot = $mysql->query("select * from `web_content` where `pid`=9 and `city_id` = '42' order by px18 desc limit 0,2");
              foreach($hot as $k=>$hotlist){
                $url='/loupan/'.$hotlist['id'].'.html';
            ?> 
             <li>
                <div style="height: 505px;background-size: 100%;border-radius: 7px;border:2px solid #ff3d16;background: #fff;">
                    <div style="padding: 15px;">
                        <div class="pic" style="height: 275px;overflow: hidden;">
                            <a href="<?php echo $url;?>" style="display: block;" target="_blank">
                                <div class="fl" style="width: 506px;height: 276px;position: relative;">
                                    <img src="../<?php echo $hotlist['img'];?>"
                                         alt="<?php echo $hotlist['title'];?>" style="width: 506px;height: 276px;">
                                    <span class="tit"
                                          style="position: absolute;bottom: 0;background: rgba(51, 51, 51, 0.71);font-size: 24px;color: #fff;padding: 4px 10px 9px 10px;width: 100%;left: 0;text-align: left;"><?php echo $hotlist['title'];?></span>
                                    <span style="position: absolute;left: 10px;top: 10px;background: #ff1e1e;color: #fff;padding: 2px 6px;border-radius: 3px;font-size: 18px;">在售</span>
                                </div>
                            </a>
                            <div class="fl" style="margin-left: 20px;">
                                <div style="margin-bottom: 8px;"><img
                                        src="http://cdn.lou86.com/public/uploads/2018-11/16/thumb_880x578_7fcc1bcbcf63bd3517aff3d1d72872f3.jpg"
                                        style="width: 178px;height: 134px;"></div>
                                <div style="margin-bottom: 8px;"><img
                                        src="http://cdn.lou86.com/public/uploads/2018-11/16/thumb_880x578_e3dabcb33edc1a87812a43ee39953312.jpg"
                                        style="width: 178px;height: 134px;"></div>
                            </div>
                            <div class="clear"></div>
                        </div>
                        <div style="height: 15px;"></div>
                        <div style="background:#ffe5d2 url('http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/theme/nz/hui.png') left no-repeat;height: 37px;margin-bottom: 10px;">
                            <p style="text-align: left;line-height: 40px;font-size: 18px;padding-left: 55px;color: #f00;white-space: nowrap;text-overflow: ellipsis;overflow: hidden;">
                                <?php echo $hotlist['fkfs'];?></p>
                        </div>
                        <p style="text-align: left;color: #999;font-size: 16px;">主力户型：<?php echo $hotlist['zlhx']?></p>
                        <p style="text-align: left;padding-top: 12px;color: #999;font-size: 16px;">地址：<?php echo $hotlist['xmdz']?></p>
                        <div style="height: 8px;"></div>
                        <div class="tel-box"
                             style="background: url(http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/theme/chun/btn.jpg) no-repeat;background-size: 100% 100%;">
                            <div class="fl">
                                <span class="c1">参考均价：</span>
                                <span class="c2"><?php echo $hotlist['jj_price'];?></span><span class="c1" style="padding-left: 2px;">元/㎡</span>

                            </div>
                            <div class="fr" style="margin-right: 20px;margin-top: 2px;">
                                <a href="https://byt.zoosnet.net/LR/Chatpre.aspx?id=BYT35574945&cid=a1062762b2c444b3a4a51af0d15beb0a&lng=cn&sid=6b08d724350e4473a55764d93a8ab433&p=http%3A//beihai.chuanhai.jtr168.cn/&rf1=&rf2=&msg=&d=1608786341791" target="_blank"
                                   style="background: #dc1e1c;font-size: 18px;color: #fff;padding: 10px 30px;border-radius: 5px;">预约看房</a>
                            </div>
                            <div class="clear"></div>
                        </div>
                    </div>
                </div>
            </li>
       <?php
          }
        ?>
          <div class="clear"></div>
        </ul>
        <div class="clear"></div>
        
    </div>
</div>
<!--头部大图:end-->
<style type="text/css">
    .ul8 li {
        float: left;
        margin-right: 20px;
        width: 265px;
        height: 295px;
    }
    .youhui{
        background: #ffe2e2;
        border-radius: 5px;
        padding: 6px 5px 6px;
        color: #f50909;
        font-size: 15px;
        height: 18px;


        overflow: hidden;
    }
</style>
<!-- 优选房源 -->
<div class="w1200"
     style="margin-top: 40px;background: url(http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/theme/s11/p_15.jpg) no-repeat;height: 816px;background-size: 100%;">
    <div style="height: 140px;"></div>
    <div style="margin: 0 auto;width: 96%;">
        <div style="float: left; margin-left: 17px;margin-top: 2px"><img src="//www.lou86.com/public/theme/20201222/p_15.jpg" width="548px"></div>
        <div style="width: 575px;float: right;">
            <ul class="ul8">
            <?
              $row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px3 desc limit 0,2");
              foreach($row as $k => $youlist){
                $url='/loupan/'.$youlist['id'].'.html';
            ?> 
                                <li>
                    <div class="k8" style="border-radius: 7px;overflow: hidden;">
                        <div class="pic" style="position: relative;">
                            <a href="<?php echo $url;?>" style="display: block;" target="_blank">
                                <img src="<?php echo $youlist['img'];?>"
                                     style="width: 265px;height: 177px;">
                                <span class="tit"
                                      style="position: absolute;bottom: 0;background: rgba(51, 51, 51, 0.71);font-size: 14px;color: #fff;padding: 4px 10px 5px 10px;width: 265px;left: 0;text-align: left;"><?php echo $youlist['title'];?></span>
                                <span style="position: absolute;left: 10px;top: 10px;background: #ff1e1e;color: #fff;padding: 2px 6px;border-radius: 3px;font-size: 16px;">在售</span>
                            </a>
                        </div>
                        <div class="txt" style="background: #fff;padding: 8px;">
                            <a href="<?php echo $url;?>" style="display: block;" target="_blank">
                                <div style="background: #ffe2e2;border-radius: 5px;padding: 6px 5px 6px;color: #f50909;font-size: 15px;" class="youhui">
                                    <span style="background: #f50000;color: #fff;padding: 3px;border-radius: 3px;">惠</span>&nbsp;<?php echo $youlist['fkfs'];?>                               </div>
                                <p style="padding: 5px;">户型：<?php echo $youlist['zlhx']?></p>
                            </a>
                            <div class="p8" style="padding: 8px 0 1px;">
                                <div class="fl">
                                    <div style="float: left;">
                                        <span style="font-size: 12px;color: #fe0000;">参考<br/>均价</span></div>
                                    <div style="float: left;">
                                        <span style="font-size: 18px;padding-left: 5px;font-size: 26px;color: #f50909"><?php echo $youlist['jj_price'];?></span><span style="color: #f50909">元/㎡</span>                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="fr" style="margin-top: 7px;">
                                    <a href="https://byt.zoosnet.net/LR/Chatpre.aspx?id=BYT35574945&cid=a1062762b2c444b3a4a51af0d15beb0a&lng=cn&sid=6b08d724350e4473a55764d93a8ab433&p=http%3A//beihai.chuanhai.jtr168.cn/&rf1=&rf2=&msg=&d=1608786341791" target="_blank"
                                       style="background: #fb7b0f;color: #fff;padding: 8px 12px;border-radius: 17px;">预约看房</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </li>
                <?php } ?>
                            </ul>
        </div>
        <div class="clear"></div>
        <div style="padding: 30px 8px 10px;">
            <ul class="ul8" style="width: 1180px;">
                    <?
              $row = $mysql->query("select * from `web_content` where `pid`='9' and `city_id`='{$sitecityid}' order by px3 desc limit 2,4");
              foreach($row as $k => $youlist){
                $url='/loupan/'.$youlist['id'].'.html';
            ?> 
                                <li>
                    <div class="k8" style="border-radius: 7px;overflow: hidden;">
                        <div class="pic" style="position: relative;">
                            <a href="<?php echo $url;?>" style="display: block;" target="_blank">
                                <img src="<?php echo $youlist['img'];?>"
                                     style="width: 265px;height: 177px;">
                                <span class="tit"
                                      style="position: absolute;bottom: 0;background: rgba(51, 51, 51, 0.71);font-size: 14px;color: #fff;padding: 4px 10px 5px 10px;width: 265px;left: 0;text-align: left;"><?php echo $youlist['title'];?></span>
                                <span style="position: absolute;left: 10px;top: 10px;background: #ff1e1e;color: #fff;padding: 2px 6px;border-radius: 3px;font-size: 16px;">在售</span>
                            </a>
                        </div>
                        <div class="txt" style="background: #fff;padding: 8px;">
                            <a href="<?php echo $url;?>" style="display: block;" target="_blank">
                                <div style="background: #ffe2e2;border-radius: 5px;padding: 6px 5px 6px;color: #f50909;font-size: 15px;" class="youhui">
                                    <span style="background: #f50000;color: #fff;padding: 3px;border-radius: 3px;">惠</span>&nbsp;<?php echo $youlist['fkfs'];?>                               </div>
                                <p style="padding: 5px;">户型：<?php echo $youlist['zlhx']?></p>
                            </a>
                            <div class="p8" style="padding: 8px 0 1px;">
                                <div class="fl">
                                    <div style="float: left;">
                                        <span style="font-size: 12px;color: #fe0000;">参考<br/>均价</span></div>
                                    <div style="float: left;">
                                        <span style="font-size: 18px;padding-left: 5px;font-size: 26px;color: #f50909"><?php echo $youlist['jj_price'];?></span><span style="color: #f50909">元/㎡</span>                                    </div>
                                    <div class="clear"></div>
                                </div>
                                <div class="fr" style="margin-top: 7px;">
                                    <a href="https://byt.zoosnet.net/LR/Chatpre.aspx?id=BYT35574945&cid=a1062762b2c444b3a4a51af0d15beb0a&lng=cn&sid=6b08d724350e4473a55764d93a8ab433&p=http%3A//beihai.chuanhai.jtr168.cn/&rf1=&rf2=&msg=&d=1608786341791" target="_blank"
                                       style="background: #fb7b0f;color: #fff;padding: 8px 12px;border-radius: 17px;">预约看房</a>
                                </div>
                                <div class="clear"></div>
                            </div>
                        </div>
                    </div>
                </li>
                <?php } ?>
          
                 
                               
             </ul>
        </div>
    </div>
</div>
<style type="text/css">
    .x3 p {
        font-size: 16px;
        line-height: 25px;
    }

    .x3-ul li {
        float: left;
        margin-right: 20px;
        width: 48%;
    }

    .tel-box {
        line-height: 52px;
        padding-left: 15px;
    }

    .tel-box .c1 {
        font-size: 18px;
    }

    .tel-box .c2 {
        font-size: 30px;
        font-weight: bold;
    }

    .tel-box .c1, .tel-box .c2 {
        color: #c71d17
    }

    .tags span {
        border: 1px solid #ddd;
        padding: 3px 10px;
        margin-right: 5px;
    }

    .txt2 {
        background: #fff;
        padding: 10px;
    }

    .txt2 p {
        padding-bottom: 2px;
    }

    .xx2-ul li {
        float: left;
    }

    .info3 p {
        padding-bottom: 10px;
        font-size: 16px;
        color: #666
    }

    .info4 p {
        padding-bottom: 4px;
        font-size: 16px;
        color: #666
    }

    .ul4 li {
        width: 550px;
        float: left;
        margin-right: 20px;
        border: 3px solid #ff3d16;
        margin-bottom: 25px;
        padding: 12px;
        background: #fff
    }

    .ul4 .pic {
        float: left;
        width: 270px;
        position: relative;
    }

    .ul4 .pic .status {
        background: #ff1e1e;
        color: #fff;
        position: absolute;
        top: 10px;
        left: 10px;
        padding: 5px 10px 5px;
        border-radius: 3px;
    }

    .ul4 .inf {
        float: left;
        width: 280px
    }

    .ul4 .inf h3 {
        font-size: 28px;
        padding-bottom: 10px;
    }

    .ul4 .s3, .ul4 .s4 {
        color: #f50909
    }

    .ul4 .s4 {
        font-size: 28px;
        font-weight: 700
    }

    .ul4 .txt {
        padding-bottom: 10px;
    }

    .ul4 .btn {
        padding-top: 10px;
    }
</style>
<style type="text/css">
    .ico-list {
        position: absolute;
        top: 153px;
        left: 0;
        width: 100%;
        height: 420px;
    }

    .ico-list .ul120 li {
        width: 103px;
        float: left;
        margin-bottom: 13px;
        margin-left: 36px;
        height: 141px;
        overflow: hidden;
    }

    .ico-list li p {
        padding-top: 10px;
    }
    .btn-box {
        position: absolute;
        bottom: 150px;
        width: 100%;
    }

    .btn-box .bg {
        width: 435px;
        margin: 0 auto;
        background-size: 100%;
        height: 50px;
        text-align: left;
    }

    .ico-list .ul121 li {
        width: 103px;
        float: left;
        margin-bottom: 13px;
        margin-left: 17px;
        height: 141px;
        overflow: hidden;
    }
</style>
<div class="w100b">
    <div style="height: 30px;"></div>
    <div class="w1200" style="text-align: center;position: relative;">
        <img src="../imgs11/p_21.jpg" alt=""/>
        <img src="http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/theme/s11/p_25.jpg" alt=""/>
        <div style="position: absolute;bottom: 27px;width: 100%;"><span style="font-size: 20px;color: #f00;">活动有效期：2020.12.23-2021.1.3</span>
        </div>
    </div>
</div>
<div style="height: 20px;"></div>
<p style="text-align: center;color: #fff;font-size: 20px;">活动期间，可通过活动页面报名或者来电方式进行参与</p>
<div style="height: 20px;"></div>
<!--随屏右:begin-->
<div class="fiex"
     style="display: none;width: 295px;background: url(http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/theme/20201222/right.png) no-repeat">
    <div class="count" style="width: 255px;">
        <div style="margin-left: 10px;height: 410px;position: relative;">
            <div style="height: 245px;position: absolute;width: 255px;bottom: -65px;right: 6px;">
                <div class="sm call">免费咨询电话：
                    <!-- <i></i> -->
                    <!-- <div class="qrcode" style="display: none;">
                        <span class="txt">扫码拨号&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<br>省时 高效 问底价</span>
                        <img src="http://admin.zheantong.com/uploads/20200617/47deca420811fe92dd12cff713ed49db.png" alt="" style="width: 126px;height: 120px;"></div> -->
                </div>
                <p class="number"><?php echo $config['company_tel'];?></p>
                <p class="btn"><a
                        href="https://byt.zoosnet.net/LR/Chatpre.aspx?id=BYT35574945&cid=a1062762b2c444b3a4a51af0d15beb0a&lng=cn&sid=6b08d724350e4473a55764d93a8ab433&p=http%3A//beihai.chuanhai.jtr168.cn/&rf1=&rf2=&msg=&d=1608786341791" target="_blank">咨询优惠</a></p>
                <p class="btn"><a
                        href="https://byt.zoosnet.net/LR/Chatpre.aspx?id=BYT35574945&cid=a1062762b2c444b3a4a51af0d15beb0a&lng=cn&sid=6b08d724350e4473a55764d93a8ab433&p=http%3A//beihai.chuanhai.jtr168.cn/&rf1=&rf2=&msg=&d=1608786341791" target="_blank">咨询户型</a></p>
                <p class="btn"><a
                        href="https://byt.zoosnet.net/LR/Chatpre.aspx?id=BYT35574945&cid=a1062762b2c444b3a4a51af0d15beb0a&lng=cn&sid=6b08d724350e4473a55764d93a8ab433&p=http%3A//beihai.chuanhai.jtr168.cn/&rf1=&rf2=&msg=&d=1608786341791" target="_blank">咨询价格</a></p>
                <p class="btn"><a
                        href="https://byt.zoosnet.net/LR/Chatpre.aspx?id=BYT35574945&cid=a1062762b2c444b3a4a51af0d15beb0a&lng=cn&sid=6b08d724350e4473a55764d93a8ab433&p=http%3A//beihai.chuanhai.jtr168.cn/&rf1=&rf2=&msg=&d=1608786341791" target="_blank">咨询购房资格</a></p>
            </div>
        </div>
    </div>
</div>
<!--随屏右:end-->
<style type="text/css">
    .alert-content{
  font-size: 14px;
  padding:15px 20px;
  color:#555;
  height:100%;
  overflow: auto;
   -moz-box-sizing: border-box;
    -webkit-box-sizing: border-box;
    -o-box-sizing: border-box;
    -ms-box-sizing: border-box;
    box-sizing: border-box;
}
    .alert-btn-close{
  position: absolute;
  right:10px;
  top:3px;
  font-size: 24px;
  cursor: pointer;
  z-index: 1000;
}
    .alert-container-black{
  background-color:rgba(0,0,0,0.65);
  border:none;
  filter:progid:DXImageTransform.Microsoft.gradient(startColorstr=#7f000000,endColorstr=#7f000000);
}
.alert-container-black .alert-content{
    color: #fff;  
}
</style>>
<script src="/js/jquery-3.2.1.min.js"></script>
<script src="/js/public.js"></script>
<script src="/js/alert.js"></script>

<script type="text/javascript" src="/public/static/home/js/article/common.js"></script>
<script src="/js/newslist.js"></script>
<script src="/js/jquery-1.7.2.js"></script>
<script src="/js/jquery.SuperSlide.2.1.1.js"></script>
<!--<script src="/js/swiper-3.4.2.min.js"></script>-->
<script src="/js/echarts.js"></script>
<script src="/js/jquery.range.js"></script>
<script src="/js/index.js"></script>
<script src="/js/search.js"></script>

<script src="/js/applyVerify.js"></script>
<script src="/js/w_apply.js"></script>
<div style="height: 140px;"></div>
<div class="footr_gr"
     style="background: url(http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/theme/20201222/p_23.jpg);height: 130px; width: 100%;position: fixed;bottom: 0px;z-index: 1200;">
    <div class="w1200">
        <div class="fooe_logo fl" style="width: 40%;margin-top: 17px;height:55px;position: relative;"></div>
        <div class="ld-area fr" style="margin-top: 0;">
            <div class="ipt-area">
                <form  class="submit_area">
                    <input type="hidden" name="pid" value="33">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="lpid" value="0">              <!-- 0 为公共报名，其它为楼盘ID-->
                    <input type="hidden" name="ly" value="底部_随屏">     <!--报名来源 具体查看applyVerify.js文件中source 标识说明-->
                    <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->
                    <input type="hidden" name="name" value="双旦">
                    <div class="zuo2" style="margin-top: 5px;padding-left: 20px;"><p class="mingzi2">
                        <p style="color: #fff;font-size: 16px;padding-bottom: 5px;">双旦狂欢季 好礼享不停</p>
                        <input id="gjf-phone-1" name="mobile" id="lp-wd-mobile" placeholder="请输入手机号码" maxlength="11" type="text" style="height: 33px;width: 282px;text-indent: 10px;">
                        </p>
                        <p style="color: #fff;font-size: 18px;padding-top: 8px;">免费咨询热线： <?php echo $config['company_tel'];?></p></div>
                    <button  class="js-ajax-submit slider-submit apply_submit" style="margin-top: 27px;font-size: 18px;height: 40px;" type="button">
                        免费报名
                    </button>
                    <!-- <input type="button" value="预约看房" class="slider-submit apply_submit"> -->
                </form>
            </div>
        </div>
        <div style="clear: both;"></div>
    </div>
</div>


<!-- Initialize Swiper -->
<script>
    // 鼠标经过扫码拨号事件
    // $(".call").hover(function () {
    //     $(".qrcode", this).show();
    // }, function () {
    //     $(".qrcode", this).hide();
    // });
    // 滚动随屏
    $(window).scroll(function () {
        var height = $(this).scrollTop();
        if (height >= 400) {
            $('.fiex').fadeIn();
        } else {
            $('.fiex').fadeOut();
        }
    });
    $(function () {
        $('#from-gfj-1').ajaxForm({
            beforeSubmit: checkForm1,
            success: complete,
            dataType: 'json'
        });
        $('#from-up4').ajaxForm({
            beforeSubmit: checkForm2,
            success: complete,
            dataType: 'json'
        });
        $('#from-up5').ajaxForm({
            beforeSubmit: checkForm5,
            success: complete,
            dataType: 'json'
        });
        $('#fromup8').ajaxForm({
            beforeSubmit: checkForm8,
            success: complete,
            dataType: 'json'
        });
        $('#fromup9').ajaxForm({
            beforeSubmit: checkForm9,
            success: complete,
            dataType: 'json'
        });

        // function checkForm1() {
        //     var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;
        //     if (!mobile.test($.trim($('#gjf-phone-1').val()))) {
        //         layer.msg('手机号码格式非法', {icon: 5});
        //         $('#gjf-phone-1').focus();
        //         return false;
        //     }
        //     layer.load(1);
        // }

        // function checkForm2() {
        //     var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;
        //     if (!mobile.test($.trim($('#lp-zx-mobile').val()))) {
        //         layer.msg('手机号码格式非法', {icon: 5});
        //         $('#lp-zx-mobile').focus();
        //         return false;
        //     }
        //     layer.load(1);
        // }

        // function checkForm5() {
        //     var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;
        //     if (!mobile.test($.trim($('#phone5').val()))) {
        //         layer.msg('手机号码格式非法', {icon: 5});
        //         $('#phone5').focus();
        //         return false;
        //     }
        //     layer.load(1);
        // }

        // function checkForm8() {
        //     var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;
        //     if (!mobile.test($.trim($('#phone8').val()))) {
        //         layer.msg('手机号码格式非法', {icon: 5});
        //         $('#phone8').focus();
        //         return false;
        //     }
        //     layer.load(1);
        // }

        // function checkForm9() {
        //     var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;
        //     if (!mobile.test($.trim($('#phone9').val()))) {
        //         layer.msg('手机号码格式非法', {icon: 5});
        //         $('#phone9').focus();
        //         return false;
        //     }
        //     layer.load(1);
        // }

        function complete(data) {
            if (data.status == 1) {
                layer.closeAll('loading');
                layer.msg(data.info, {icon: 1});
                window.setTimeout("window.location='" + data.url + "'", 2000);
                return false;
            } else {
                layer.closeAll('loading');
                layer.msg(data.info, {icon: 5});
                return false;
            }
        }
    });

    function group(txt, id, title) {
        if (txt) {
            var obj = document.getElementById("loupan");
            obj.value = txt;
        } else {
            var obj = document.getElementById("loupan");
            obj.value = ' ';
        }
        iBoxWidth = $(".window").width();
        iBoxHeight = $(".window").height();
        iWinWidth = $(window).width();
        iWinHeight = $(window).height();
        $(".window").css("left", (iWinWidth / 2 - iBoxWidth / 2) + "px");
        $(".window").css("top", (iWinHeight / 2 - iBoxHeight / 2) + "px");
        $(".window").fadeIn();
        $(".alert").height(document.body.offsetHeight);
        $(".alert").show();
        $("#house_id").val(id);
        $("#bm-tit").html(title);
    }

    function delbox() {
        $(".window").fadeOut();
        $(".alert").hide();
    }
</script>

<script src="http://%77%77%77%2e%6c%6f%75%38%36%2e%63%6f%6d/public/static/home/js/scrollfix.min.js"></script>
<script type="text/javascript">
    /**
     * 团购报名滚动
     */
    function newsScroll() {
        var list = $('.roll-enroll .roll-list');

        function p() {
            list.animate({'top': '-32px'}, 1000, 'linear', function () {
                for (var i = 0; i < 2; i++) {
                    list.find('li:first').insertAfter(list.find('li:last'));
                }
                list.css({'top': '0px'});
            });
        }

        var t = setInterval(function () {
            p();
        }, 1000);

        list.hover(function () {
            clearInterval(t);
        }, function () {
            t = setInterval(function () {
                p();
            }, 1000);
        });
    }

    function isScroll() {
        var list;
        var ttt = setInterval(function () {
            list = $('.roll-enroll .roll-list');
            if (list.length > 0) {
                newsScroll();
                clearInterval(ttt);
            }
        }, 1000);
    }
    isScroll();

    // $('.submit_area').submit(function () {

    //     var $this = this;
    //     var data = {
    //         name: $(this).find('input[name="name"]').val(),
    //         phone: $(this).find('input[name="phone"]').val(),
    //         ask_content: '双十一团',// $(this).find('.ask_content').val(),
    //     };

    //     $.ajax({
    //         url: '/api/ask',
    //         type: 'get',
    //         dataType: 'json',
    //         data: data,
    //         success: function (result) {
    //             if (result.code == 0) {
    //                 layer.msg('恭喜，您已经成功参加双十一活动');
    //             } else {
    //                 layer.msg(result.msg);
    //             }

    //             window.setTimeout(function () {
    //                 layer.closeAll(); //疯狂模式，关闭所有层
    //             },2000)
    //         }
    //     });


    //     return false;
    // });
</script>
</html>
<?php include("sq2.php");?>