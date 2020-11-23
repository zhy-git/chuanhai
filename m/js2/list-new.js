/**
 * Created by DL on 2016/12/6.
 */
function adjust() { //安卓line-height偏上
    var ua = navigator.userAgent.toLowerCase();
    if (/android/.test(ua)) {
        $("html").attr("data-type", 1); //判断机型，安卓为1
    } else if (/ios/.test(ua)) {
        $("html").attr("data-type", 2); //判断机型，ios为2
    }
}



//单行文字滚动
function AutoScroll(obj) {
    $(obj).find("ul:first").animate({
        marginTop: "-.73rem"
    }, 2000, function() {
        $(this).css({ marginTop: "0" }).find("li:first").appendTo(this);
        setTimeout('AutoScroll(".scrollDiv")', 2000)
    });
}
$(function() {
    // 判断一张的的时候不调用函数
    var $scr_Li = $('.scrollDiv').find("li");
    if ($scr_Li.length != 1) {
        setTimeout('AutoScroll(".scrollDiv")', 2000);
    }
    adjust();
});


$(".pro_search").bind('pointTrack', function(event, data) {
    data.properties.query = $('#keywords-house').val();
});

//筛选项 -- 埋点 -- 楼盘卡片
bind_point_track('.project_view_track');

//筛选项：区域、地铁、总价、户型，下拉选择时 -- 触发埋点
$(document).delegate('.query-list li[data-id="query_li"] .query-panel ul[data-flag="condition"] li', 'click', function() {
    $(this).parent().parent().siblings('.query-wrap').find('span').text($(this).find('a').text());
    $('#hidden_query_track').trigger('mousedown');
});

//总价条件 -- 点击【确定】按钮时，触发埋点
$(document).delegate('.query-list .query-price .query-panel .btn-area1 .btn-confirm1', 'click', function() {
    //将输入的最大值、最小值设置到 query-wrap 中
    //输入总价，最大最小值
    var input_minimum_str = $('.btn-minimum').val();
    var input_highest_str = $('.btn-highest').val();
    if (input_minimum_str && input_highest_str) {
        $('.query-list .query-price .query-wrap span').text(input_minimum_str + "," + input_highest_str + "万");
    }
    $('#hidden_query_track').trigger('mousedown');
});

//更多条件 -- 点击【确定】按钮时，触发埋点
$(document).delegate('.query-list .query-mnore .query-panel .btn-area2 .btn-confirm', 'click', function() {
    $('#hidden_query_track').trigger('mousedown');
});

bind_point_track('#hidden_query_track');

function bind_point_track(track_selector) {
    $(document).delegate(track_selector, 'pointTrack', function(event, data) {
        //获取区域 或者地铁
        var region_subway_str = $('.query-list .query-area .query-wrap span').text();
        if (region_subway_str != '区域') {
            if (region_subway_str.match('线')) {
                data.properties.subway = [region_subway_str];
            } else {
                data.properties.district = [region_subway_str];
            }
        }
        //输入总价，最大最小值
        var input_minimum_str = $('.btn-minimum').val();
        var input_highest_str = $('.btn-highest').val();
        if (input_minimum_str && input_highest_str) {
            data.properties.input_total_price = input_minimum_str + "," + input_highest_str + "万";
        } else {
            //总价
            var whole_price_str = $('.query-list .query-price .query-wrap span').text();
            if (whole_price_str != '总价') {
                data.properties.whole_price = [whole_price_str];
            }
        }

        //户型
        var room_type_str = $('.query-list .query-housetype .query-wrap span').text();
        if (room_type_str != '户型') {
            data.properties.room_size = [room_type_str];
        }

        //更多 -- 楼盘类型
        var project_type_str = $('.query-mnore .panel-more .mod3-type .con .on a').text();
        if (project_type_str != undefined) {
            data.properties.project_type = [project_type_str];
        }
        //更多 -- 特色
        var features_str = $('.query-mnore .panel-more .mod3-feature .con .on a').text();
        if (features_str != undefined) {
            data.properties.features = [features_str];
        }
        //更多 -- 环线
        var loop_str = $('.query-mnore .panel-more .mod3-loop .con .on a').text();
        if (loop_str != undefined) {
            data.properties.loop = [loop_str];
        }
        //更多 -- 售卖情况
        var sale_status_str = $('.query-mnore .panel-more .mod3-sale .con .on a').text();
        if (sale_status_str != undefined) {
            data.properties.sale_status = [sale_status_str];
        }
    });
}