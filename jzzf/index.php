<!DOCTYPE html>
<html>
<?php
require("../conn/conn.php");
require("../function.php");
?>
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>快速找房</title>
	<link href="all/public.css" type="text/css" rel="stylesheet" />
	<link href="all/1188fcstyle.css" type="text/css" rel="stylesheet" />
	<link href="all/1188fc.css" type="text/css" rel="stylesheet" />
	<script type="text/javascript" src="all/jquery.min.js"></script> 
	<script type="text/javascript" src="all/attrchange.js"></script>
	<script type="text/javascript" src="all/myScript.js"></script>
    <script type="text/javascript" src="all/jquery.SuperSlide.2.1.js"></script> 
    <link rel="stylesheet" href="all/nouislider.css">
</head><!-- header end-->
<body>

<!-- main star-->
<div class="main">
    
    <div class="wrap">
        
        <div class="Y_hi">
            <p class="Y_title">精准找房</p>
            <p class="hi">
                Hi，请花1分钟时间认真选择您的需求，精准找到您心中的理想之家
            </p>
        </div>
        <div class="Y_sea_area clearfix">
            <div class="sea_l">
                <div class="Y_title">您的找房结果</div>
                <div class="area_s">
                    <p><label>区域：</label><input type="text" disabled="disabled"></p>
                    <p><label>单价：</label><i><span class="handles-lower sum"></span>-<span class="handles-upper sum"></span></i></p>
                    <p><label>面积：</label><i><span class="snap-lower sum"></span>-<span class="snap-upper sum"></span></i></p>
                    <p><label>类型：</label><input type="text" disabled="disabled"></p>
                </div>
            </div>
            <div class="sea_r">
                <ul class="hd clearfix">
                    <li class="on"><i></i>区域</li>
                    <li><i></i>单价</li>
                    <li><i></i>面积</li>
                    <li><i></i>类型</li>
                    <li class="not"><i></i>结果</li>
                </ul>
                <ul class="bd">
                    <li class="q1" style="display: block;">
                        <div class="bd_box yes">
                            <p class="why">您想在哪里买房？</p>
                            <ul class="option_1">
                            	 <?php
                                    $city=$mysql->query("select * from `web_city` where `pid`='1' and `city_st`='1' order by `city_px` asc");
                                    foreach($city as $cityall){
                                               // echo '<a href="/loupan/?city_id='.$cityall['id'].'">'.$cityall['city_name'].'</a>';
                                                echo '<li data-id="'.$cityall['id'].'">'.$cityall['city_name'].'<i></i></li>';
                                                }
                                    ?>
                            </ul>
                        </div>
                        <div class="opt_nav">
                            <a href="javascript:void (0);" class="Ind_iff" data-index="0">无所谓，跳过</a>
                            <!--<a href="javascript:void (0);" class="Ind_next" data-index="0" style="display: none;">下一步</a>-->
                        </div>
                    </li>
                    <li class="q1">
                        <div class="bd_box">
                            <p class="why">您理想的房子价格？</p>
                            <div class="Y_slider">
                                <div id="slider-handles"></div>
                                <p class="Y_slider_span">
                                
                                    <span class="o_1">1000元</span>
                                    <span class="o_2">8000元</span>
                                    <span class="o_3">1.2万</span>
                                    <span class="o_4">1.6万</span>
                                    <span class="o_5">2万</span>
                                    <span class="o_6">2.4万</span>
                                    <span class="o_7">2.8万</span>
                                    <span class="o_8">3万以上</span>
                                </p>

                            </div>
                            <script type="text/javascript">

                                $(function () {
                                    var handlesSlider = document.getElementById('slider-handles');

                                    noUiSlider.create(handlesSlider, {
                                        start: [1000, 8000],
                                        connect: true,
                                        step: 1000,
                                        range: {
                                            'min': [1000],
                                            '14.5%': [8000],
                                            '29%': [12000],
                                            '43.5%': [16000],
                                            '57.5%': [20000],
                                            '72%': [24000],
                                            '86%': [28000],
                                            'max': [32000]
                                        }
                                    });
                                    var handlesValues = [
                                        document.getElementById('slider-handles-value-lower'),
                                        document.getElementById('slider-handles-value-upper')
                                    ];
                                    handlesSlider.noUiSlider.on('update', function (values, handle) {
                                        if (values[handle] > 30000) {
                                            handlesValues[handle].innerHTML = "3万以上";
                                        } else {
                                            handlesValues[handle].innerHTML = parseInt(values[handle]);
                                        }
                                    })


                                });



                            </script>
                        </div>
                        <div class="opt_nav">
                            <p class="opt_font">您现在选的单价在<em><span id="slider-handles-value-lower" class="example-val"></span>-<span id="slider-handles-value-upper" class="example-val"></span>元/平米</em></p>
                            <a href="javascript:void (0);" class="Ind_iff" data-index="1">无所谓，跳过</a>
                            <a href="javascript:void (0);" class="Ind_next" data-index="1">下一步</a>
                        </div>
                    </li>
                    <li class="q1">
                        <div class="bd_box">
                            <p class="why">您想买多大面积的房子？</p>
                            <div class="Y_slider">
                                <div id="slider-snap"></div>
                                <p class="Y_slider_span">
                                    <span class="o_1">10㎡</span>
                                    <span class="o_2">30㎡</span>
                                    <span class="o_3">60㎡</span>
                                    <span class="o_4">90㎡</span>
                                    <span class="o_5">120㎡</span>
                                    <span class="o_6">150㎡</span>
                                    <span class="o_7">180㎡</span>
                                    <span class="o_8" style="width: 60px">200㎡以上</span>
                                </p>
                            </div>
                            <script type="text/javascript">

                                $(function () {
                                    var snapSlider = document.getElementById('slider-snap');

                                    noUiSlider.create(snapSlider, {
                                        start: [10, 30],
                                        connect: true,
                                        range: {
                                            'min': [10],
                                            '14.5%': [30],
                                            '29%': [60],
                                            '43%': [90],
                                            '57.5%': [120],
                                            '71.5%': [150],
                                            '86%': [180],
                                            'max': [210]
                                        }
                                    });
                                    var snapValues = [
                                        document.getElementById('slider-snap-value-lower'),
                                        document.getElementById('slider-snap-value-upper')
                                    ];
                                    snapSlider.noUiSlider.on('update', function (values, handle) {
                                        if (values[handle] > 200) {
                                            snapValues[handle].innerHTML = "200以上";
                                        } else {
                                            snapValues[handle].innerHTML = parseInt(values[handle]);
                                        }

                                    })


                                });



                            </script>
                        </div>
                        <div class="opt_nav">
                            <p class="opt_font">您现在选的面积在<em><span id="slider-snap-value-lower" class="example-val"></span>-<span id="slider-snap-value-upper" class="example-val"></span>平米</em></p>
                            <a href="javascript:void (0);" class="Ind_iff" data-index="2">无所谓，跳过</a>
                            <a href="javascript:void (0);" class="Ind_next" data-index="2">下一步</a>
                        </div>
                    </li>
                    <li class="q1 q2">
                        <div class="bd_box yes">
                            <p class="why">选择您想要的物业类型？</p>
                            <ul class="option_1 opt_1">
                             <?php
                                            $flag=$mysql->query("select * from `web_flag` where `flag_fl`='6' and `flag_st`='1' order by `flag_px` asc");
                                            foreach($flag as $flagall){
                                                       //  echo '<a href="/loupan/?flagts='.$flagall['flag_bm'].'">'.$flagall['flag'].'</a>';
                                                         echo ' <li data-id="'.$flagall['flag_bm'].'">'.$flagall['flag'].'<i></i></li>';
                                                        }
                                            ?>
                             <!--     <li data-id="45">住宅<i></i></li><li data-id="46">公寓<i></i></li><li data-id="47">酒店式公寓<i></i></li><li data-id="48">洋房<i></i></li><li data-id="49">别墅<i></i></li><li data-id="50">商铺<i></i></li><li data-id="51">商住<i></i></li><li data-id="52">写字楼<i></i></li>                               <li>住宅<i></i></li>
                                <li>公寓<i></i></li>
                                <li>别墅<i></i></li>
                                <li>海景房<i></i></li>
                                <li>商铺<i></i></li>
                                <li>写字楼<i></i></li>
                                <li>花园洋房<i></i></li>
                                <li>海景房<i></i></li> -->
                            </ul>
                        </div>
                        <div class="opt_nav">
                            <a href="javascript:void (0);" class="Ind_iff" data-index="3">无所谓，跳过</a>
                            <!--<a href="javascript:void (0);" class="Ind_next" data-index="3" style="display: none;">下一步</a>-->
                        </div>
                    </li>
                    <li class="q1">
                        <div class="bd_box">
                            <p class="why">您的筛选结果 <span>共有<i id="fcount">0</i>个楼盘符合您的需求</span> </p>
                            <div class="scrollBox" style="margin:0 auto">
                                <div class="ohbox">
                                    <ul class="piclist">
                                      <?php
                    	 $row = $mysql->query("select * from `web_content` where `pid`='9111' order by px desc limit 0,16");// and `city_id`='57'
						foreach($row as $k=>$list){
						$url="/loupan/show.php?lpid={$list['id']}";
						?>
                                        <li><a href="<?php echo $url;?>">
                                                <div class="pic"><img src="<?php echo $site.$list['img'];?>" alt=""></div>
                                                <div class="wen">
                                                    <p class="tit"><?php echo $list['title'];?> <span>[<?php echo cityname($list['city_id']);?>]</span></p>
                                                    <p class="ms">均价：<i><?php echo $list['jj_price'];?>元/m²</i></p>
                                                    <p class="dd"><em></em><?php echo $list['xmdz'];?></p>
                                                </div>
                                            </a></li>
                                            <?php
					
					}
					?>
                                        
                                    </ul>
                                </div>
                                <div class="pageBtn">
                                    <span class="prev">&lt;</span>
                                    <span class="next">&gt;</span>
                                    <ul class="list">
                                    </ul>
                                </div>
                                <script type="text/javascript"></script>
                            </div>
                        </div>
                        <div class="opt_nav">
                            <a href="javascript:location.reload(abc());" class="return">重新选择</a>
                            <a href="/loupan/" class="mort" target="_blank">更多选择</a>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
        <div style="height:10px"></div>
        <script type="text/javascript">
                                $(function () {
                                    //选项卡
                                    var _hd_li = $(".sea_r .hd li");
                                    var _bd_li = $(".sea_r .bd .q1");

                                    $(_hd_li).click(function () {
                                        var int = $(this).index();
                                        if ($(_bd_li).eq(int).is(":hidden")) {
                                            $(_hd_li).removeClass('on');
                                            $(this).addClass('on');
                                            $(_bd_li).hide();
                                            if (int == 4) {
                                                $(_bd_li).eq(int).fadeIn(0);
                                                jQuery(".scrollBox").slide({titCell: ".list li", mainCell: ".piclist", effect: "left", vis: 4, scroll: 4, delayTime: 800, trigger: "click", easing: "easeOutCirc"});
                                                sl();
                                            } else {
                                                $(_bd_li).eq(int).fadeIn();
                                            }
                                        }
                                    });
                                    //点击分享特效
                                    $(".opt_frite").click(function () {
                                        $(".fenxiang").slideToggle();
                                    });
                                    //选项点击
                                    var option_li = $(".option_1 li");

                                    $(option_li).not('.opt_1 li').click(function () {
                                        var opt_int = $(this).index();
                                        var bd_li = $(this).parents('.q1').index();
                                        var bd_li_on = $(option_li).eq(opt_int).text();
                                        $(".area_s p").eq(bd_li).find('input').val(bd_li_on);
                                        $(_hd_li).removeClass('on');
                                        $(_hd_li).eq(bd_li + 1).addClass('on');
                                        $(_bd_li).hide();
                                        $(_bd_li).eq(bd_li + 1).stop(true, true).fadeIn();
                                    });
                                    //结果
                                    var opt_li = $(".opt_1 li");
                                    $(opt_li).click(function () {
                                        var int = $(this).index();
                                        var bd_li = $(this).parents('.q1').index();
                                        var bd_li_on = $(opt_li).eq(int).text();
                                        $(".area_s p").eq(bd_li).find('input').val(bd_li_on);
                                        $(_hd_li).removeClass('on').eq(bd_li + 1).addClass('on');
                                        $(_bd_li).hide().eq(bd_li + 1).fadeIn(0);
                                        jQuery(".scrollBox").slide({titCell: ".list li", mainCell: ".piclist", effect: "left", vis: 4, scroll: 4, delayTime: 800, trigger: "click", easing: "easeOutCirc"});
                                        sl();
                                    })
                                    //下一步
                                    var INd_next = $(".Ind_next");
                                    INd_next.click(function () {
										
                                        var _ind = parseInt($(this).attr("data-index"));
											//
										var mainsss1;
										if(_ind==0){
											mainsss1="680px"
											}
										if(_ind==1){
											mainsss1="680px"
											}
										if(_ind==2){
											mainsss1="680px"
											}
										if(_ind==3){
											mainsss1="875px"
											}
										//alert($(".main").height());
										var main = $(window.parent.document).find("#iframeId");
											var thisheight = mainsss1;
											main.height(thisheight);
										
										//
										
                                        if ($(this).parent().prev('.bd_box').hasClass('yes')) {
                                            var opt_li = $(this).parent().prev('.bd_box').find('li');
                                            if (opt_li.hasClass('on')) {
                                                var opt_li_on = $(this).parent().prev('.bd_box').find('li.on').text();
                                                $(".area_s p").eq(_ind).find('input').val(opt_li_on);
                                                $('.bd .q1').hide();

                                                $('.hd li').removeClass('on');
                                                $('.hd li').eq(_ind + 1).addClass('on');
                                                if (_ind + 1 == 4)
                                                {
                                                    $('.bd .q1').eq(_ind + 1).fadeIn(0);
                                                    jQuery(".scrollBox").slide({titCell: ".list li", mainCell: ".piclist", effect: "left", vis: 4, scroll: 4, delayTime: 800, trigger: "click", easing: "easeOutCirc"});
                                                } else {
                                                    $('.bd .q1').eq(_ind + 1).fadeIn();
                                                }

                                            } else {
                                                alert("请选择后在点击下一步或选择跳过！")
                                            }
                                        } else {
                                            var example_val = $(this).prevAll('.opt_font').find('.example-val');
                                            if ($('.area_s p').find('i').length > 0) {

                                                $(".area_s p").eq(_ind).find('.sum').eq(0).text(example_val.eq(0).text());
                                                $(".area_s p").eq(_ind).find('.sum').eq(1).text(example_val.eq(1).text());
                                            } else {
                                                $('.area_s p').eq(_ind).find('b').remove();
                                                $(".area_s p").eq(_ind).find('label').after("<i><span class='handles-lower sum'>" + example_val.eq(0).text() + "</span> - <span class='handles-lower sum'>" + example_val.eq(1).text() + "</span></i>")
                                            }

                                            $('.bd .q1').hide();
                                            $('.bd .q1').eq(_ind + 1).fadeIn();

                                            console.log($('.bd .q1').eq(_ind + 1));
                                            $('.hd li').removeClass('on');
                                            $('.hd li').eq(_ind + 1).addClass('on');

                                        }

                                    });
                                    //无所谓，跳过
                                    var INd_iff = $(".Ind_iff");
                                    INd_iff.click(function () {
										
                                        var _ind = parseInt($(this).attr("data-index"));
										
										//
										var mainsss1;
										if(_ind==0){
											mainsss1="680px"
											}
										if(_ind==1){
											mainsss1="680px"
											}
										if(_ind==2){
											mainsss1="680px"
											}
										if(_ind==3){
											mainsss1="875px"
											}
										//alert($(".main").height());
										var main = $(window.parent.document).find("#iframeId");
											var thisheight = mainsss1;
											main.height(thisheight);
										
										//
										
										
                                        if (_ind == 1 || _ind == 2) {
                                            $('.area_s p').eq(_ind).find('i').remove();
                                            $('.area_s p').eq(_ind).find('b').remove();
                                            $(".area_s p").eq(_ind).find('label').after("<b>无所谓，跳过</b>")
                                        } else {
                                            $(".area_s p").eq(_ind).find('input').val("无所谓，跳过");
                                        }
                                        $('.bd .q1').hide();
                                        $('.hd li').removeClass('on');
                                        $('.hd li').eq(_ind + 1).addClass('on');
                                        if (_ind + 1 == 4)
                                        {
                                            $('.bd .q1').eq(_ind + 1).fadeIn(0);
                                            jQuery(".scrollBox").slide({titCell: ".list li", mainCell: ".piclist", effect: "left", vis: 4, scroll: 4, delayTime: 800, trigger: "click", easing: "easeOutCirc"});
                                        } else {
                                            $('.bd .q1').eq(_ind + 1).fadeIn();
                                        }
                                        if (_ind == 3) {
                                            sl();
                                        }
                                    });



                                    $(".option_1 li").click(function () {
                                        if ($(this).hasClass('on')) {
                                            $(this).removeClass('on');
                                        } else {
                                            $(".option_1 li").removeClass('on');
                                            $(this).addClass('on');
                                        }
                                    })
                                })

                                function sl() {
                                    var input_y1 = $(".area_s p").eq(0).find('input').val();
                                    var input_y2 = $(".area_s p").eq(3).find('input').val();
                                    var input_b1 = $(".area_s p").eq(1).find('b').html();
                                    var input_b2 = $(".area_s p").eq(2).find('b').html();
                                    if (input_y1 == '无所谓，跳过') {
                                        input_y1 = '';
                                    }
                                    if (input_y2 == '无所谓，跳过') {
                                        input_y2 = '';
                                    }
                                    if (input_b1 == '无所谓，跳过') {
                                        input_b1 = '';
                                    } else {
                                        if ($('#slider-handles-value-lower').text() != '') {
                                            input_b1 = $('#slider-handles-value-lower').text() + ',' + $('#slider-handles-value-upper').text();
                                        } else {
                                            input_b1 = '';
                                        }
                                    }
                                    if (input_b2 == '无所谓，跳过') {
                                        input_b2 = '';
                                    } else {
                                        if ($('#slider-snap-value-lower').text() != '') {
                                            input_b2 = $('#slider-snap-value-lower').text() + ',' + $('#slider-snap-value-upper').text();
                                        } else {
                                            input_b2 = '';
                                        }
                                    }
                                    $.get("ajax.php", {city: input_y1, lexing: input_y2, price: input_b1, area: input_b2}, function (result) {
										var main = $(window.parent.document).find("#iframeId");
											var thisheight = "875px";
											main.height(thisheight);
											//alert(result.data);
                                        result = JSON.parse(result)
                                        //console.log(result.data)
                                        $(".piclist").html(result.data);
                                        $("#fcount").html(result.count);
                                        $("ul .list").html(result.page);
                                        jQuery(".scrollBox").slide({titCell: ".list li", mainCell: ".piclist", effect: "left", vis: 4, scroll: 4, delayTime: 800, trigger: "click", easing: "easeOutCirc", pnLoop: true});
                                    });

                                    //console.log(input_y1)
                                    //console.log(input_y2)
                                    //console.log(input_b1)
                                    //console.log(input_b2)
                                }
								
	$(window.parent.document).find("#iframeId").load(function () {
		var main = $(window.parent.document).find("#iframeId");
		var thisheight = $(document).height() + 30;
		main.height(thisheight);
	});
	
	function abc(){
			var main = $(window.parent.document).find("#iframeId");
											var thisheight = "795px";
											main.height(thisheight);
		}
        </script>
    </div>
    
</div>
<input type="hidden" id="user_id_a" value=""/>
<!--底部弹框-->
<script type="text/javascript" src="all/nouislider.js"></script>
</body>
</html>