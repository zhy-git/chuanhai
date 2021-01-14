<?php
//

?>
<!-- 获取浏览者ip -->
  <script type="text/javascript" src="http://pv.sohu.com/cityjson?ie=utf-8"></script>
  <script type="text/javascript">
  $.ajax({
        type: "POST",//方法类型
        dataType: "json",//预期服务器返回的数据类型
        url: "../signup.php?ly="+ window.location.href,//url
        data: returnCitySN,
    });
</script><!-- 获取浏览者ip end-->
<div class="navigator-bar mapnav">
  <div class="wrap-v5">
    <div class="top-bar clearfix">
      <a href="/" class="logo" title=""><img alt="川海房产" src="/image/logo.png" alt=""></a>
      <div class="city-choose">
        <a href="/city.html" class="city-loc">
          <h1 class="txt"><?php echo $sitecityname;?></h1>
          <i></i>
        </a>
      </div>
      <ul class="nav-menu clearfix">
        <li <?php if($lm==''){echo 'class="active"';}?>><a href="/">首页</a></li>
        <!--<li <?php /*if($lm==2 and ($flagts<>'tsa1' and $flagts<>'ts2' and $pingyi<>'cambodia')){echo 'class="active"';}*/?>><a href="/loupan/" >新房</a></li>-->
          <li <?php if($lm==2 and ($flagts<>'tsa1' and $flagts<>'ts2')){echo 'class="active"';}?>><a href="/loupan/" >新房</a></li>
		<li <?php if($lm==14){echo 'class="active"';}?>><a href="/loupan/ttsa1">海景房</a></li>
		<li <?php if($lm==3){echo 'class="active"';}?>><a href="/loupan/tts6">别墅</a></li>
		<li <?php if($lm==15){echo 'class="active"';}?>><a href="/loupan/tts2">商铺/写字楼</a></li>
        <li <?php if($lm==4){echo 'class="active"';}?>><a href="/news/">楼盘资讯</a></li>
      </ul>
      <div class="top-right">
        <div class="search-box clearfix">
          <span class="sel-val">
            <span class="state" id="choosediv" chooseurl="">新房</span>            
          </span>          
          <input type="text" id="h_bname" placeholder="请输入楼盘名称" class="search-inp"  onkeydown='if(event.keyCode==13){searchBuilds();}'/>
          <button class="search-btn" onclick="searchBuilds()"></button>
          <div class="search-list" id="newcon_ul">
          </div>
        </div>
        <div class="login-register">
            <img alt="在线咨询" src="/public/static/home/image/icons/msn.png" style="position: absolute;top: 7px;"><a onClick="sq();"  style="cursor:pointer; font-size:14px"  >在线咨询</a>
        </div>
      </div>
    </div>
  </div>
  <!-- 下拉菜单 -->
  <div class="menu-list-box" style="padding: 0px;">
    <div class="wrap-v5">
      <div class="item-box item-xf clearfix" style="display: none;padding-top: 20px;padding-bottom: 10px;">
        <div class="menu-left-side clearfix">
          <ul class="col-box col-box1">
            <li class="title"><span>新房</span><i></i></li>
            <li><a href="/loupan/" >找新盘</a></li>
            <li><a href="/map/" >地图找房</a></li>
            <li><a href="/news/" >楼盘动态</a></li>            
          </ul>
          <ul class="col-box col-box2">
            <li class="title"><span>买房需知</span><i></i></li>
            <li><a href="/news/index_22.html" title="三亚购房指南">购房指南</a></li>
          </ul>
          <ul class="col-box col-box3">
            <li class="title"><span>还可以</span><i></i></li>
           <li><a href="javascript:;" data-name="免费预约接送机" data-type="导航_免费预约接送机"  class="bmkf-up">免费预约接送机</a></li>
            <li><a href="javascript:;" data-name="预约免费专车看房" data-type="导航_预约免费专车看房"  class="bmkf-up">预约免费专车看房</a></li>
          </ul>
        </div>
        <div class="menu-right-side">
          <div class="clearfix">
            <div class="agent">
              <span class="title f14"><a href="/about/gfbz.html" >买房为什么选</a></span>
              <div class="h10"></div>
              <p class="c666"><a href="/about/gfbz.html" >购房有保障</a></p>
              <div class="h10"></div>
              <ul class="kflm-ul">
                  <li>集结：让团购更有力量&nbsp;&nbsp;&nbsp;&nbsp;便捷：看房不用满城跑</li>
                  <li>看房：全程均免费服务&nbsp;&nbsp;&nbsp;&nbsp;专业：让购房者更省心</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="item-box clearfix" style="display: none;height: 0px"></div>
      <div class="item-box clearfix" style="display: none;height: 0px"></div>
      <div class="item-box clearfix" style="display: none;height: 0px"></div>
      <div class="item-box item-esf clearfix" style="display: none;padding-top: 20px;padding-bottom: 10px;">
        <div class="menu-left-side clearfix">
          <ul class="col-box col-box1">
            <li class="title"><span>楼市</span><i></i></li>
            <li><a href="/news/index_7.html" >本地资讯</a></li>
            <li><a href="/news/" >楼盘动态</a></li>
            <li><a href="/news/index_6.html">楼盘导购</a></li>
          </ul>
          <ul class="col-box col-box2">
            <li class="title"><span>买房须知</span><i></i></li>
            <li><a href="/news/index_22.html"  title="三亚购房指南">购房指南</a></li>
          </ul>
          <ul class="col-box col-box3">
            <li class="title"><span>还可以</span><i></i></li>
            <li><a href="javascript:;" data-name="免费预约接送机" data-type="导航_免费预约接送机"  class="bmkf-up">免费预约接送机</a></li>
            <li><a href="javascript:;" data-name="预约免费专车看房" data-type="导航_预约免费专车看房"  class="bmkf-up">预约免费专车看房</a></li>
          </ul>
        </div>
        <div class="menu-right-side">
          <div class="clearfix">
            <div class="agent">
              <span class="title f14"><a href="/about/gfbz.html" >买房为什么选我们？</a></span>
              <div class="h10"></div>
              <p class="c666"><a href="/about/gfbz.html"  >购房有保障</a></p>
              <div class="h10"></div>
              <ul class="kflm-ul">
                  <li>集结：让团购更有力量&nbsp;&nbsp;&nbsp;&nbsp;便捷：看房不用满城跑</li>
                  <li>看房：全程均免费服务&nbsp;&nbsp;&nbsp;&nbsp;专业：让购房者更省心</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<style type="text/css">
.search-box .search-list {width: 100%;max-height: 150px;*height: 150px;position: absolute;top: 34px;left: -1px;border: 1px solid #ddd;background-color: #fff;overflow-x: hidden;overflow-y: auto;display: none;}
.search-box .search-list span {display: block;height: 30px;line-height: 30px;padding: 0 10px;font-size: 12px;color: #999;}
</style>
<script type="text/javascript">
$('#h_bname').bind('input propertychange', function() {
    $('.msg').html($(this).val().length + ' characters');
    var name=$(this).val();    
    $.post("/ajax/ajax_kwp/",{name: name},function(data){
              $("#newcon_ul").empty();     
              //var obj = eval('('+data+')');//js
              var obj = data;
              for(var p in obj){
                  if(obj[p].zonecode){
                      var htm='<a href="'+obj[p].zonecode+'"><span>'+obj[p].zonename+'</span></a>';
                      $("#newcon_ul").show();
                      $("#newcon_ul").append(htm); 
                  }else{
                      $("#newcon_ul").hide();
                  }
              }                
          }
      );      
});
</script>
