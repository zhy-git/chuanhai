document.body.addEventListener('touchstart', function () {});  //触发ios的：active和：hover
//检测用户手机是Android还是iOS
var u = navigator.userAgent, app = navigator.appVersion;
var isAndroid = u.indexOf('Android') > -1 || u.indexOf('Linux') > -1; //android终端或者uc浏览器
var isiOS = !!u.match(/\(i[^;]+;( U;)? CPU.+Mac OS X/); //ios终端
//Android下border宽度0.5px显示不出来，做了一下兼容性调节
if(isAndroid){
    $(document).find('.item-new ').css({'border-bottom':'1px solid #e5e5e5'});
    $(document).find('.help-tags').css({'border-bottom':'1px solid #e5e5e5'});
    $(document).find('.list-wrap .advice-free ').css({'border-bottom':'1px solid #e5e5e5'});
    $(document).find('.find-house ').css({'border-bottom':'1px solid #e5e5e5'});
    $(document).find('.panel-area li, .panel-price li, .panel-housetype li').css({'border-bottom':'1px solid #e5e5e5'});
    $(document).find('.panel-area .tab-con li').css({'border-left':'1px solid #e5e5e5'});
    $(document).find('.query-list').css({'border-top':'1px solid #e5e5e5'});
    $(document).find('.query-list').css({'border-bottom':'1px solid #e5e5e5'});
}else if(isiOS){
    $(document).find('.item-new ').css({'border-bottom':'0.5px solid #e5e5e5'});
    $(document).find('.help-tags').css({'border-bottom':'0.5px solid #e5e5e5'});
    $(document).find('.list-wrap .advice-free ').css({'border-bottom':'0.5px solid #e5e5e5'});
    $(document).find('.find-house ').css({'border-bottom':'0.5px solid #e5e5e5'});
    $(document).find('.panel-area li, .panel-price li, .panel-housetype li').css({'border-bottom':'0.5px solid #e5e5e5'});
    $(document).find('.panel-area .tab-con li').css({'border-left':'0.5px solid #e5e5e5'});
    $(document).find('.query-list').css({'border-top':'0.5px solid #e5e5e5'});
    $(document).find('.query-list').css({'border-bottom':'0.5px solid #e5e5e5'});
}
function commonLocation(prefix, url) {
    return prefix  + url;
}
//筛选条件
$(function(){
    $(".query-list .query-wrap").click(function(){
        $(this).parent().parent().parent(".query").css({
            "position":"fixed",
            "top":0,
            "left":0,
            "width":"100%",
            "z-index":23
        });
        // var win = $(".container");
        // win.css({
        //     "height":"100%",
        //     "position":"fixed",
        //     "width":"100%",
        //     "top":"0",
        //     "left":"0"
        // }); 禁止滚动

        // 判断是否 显示 如果不显示怎不用 margi 显示 则 margin
        if($(".topbar").css("display") == "none"){
            $('.query').css('margin-top', '0');
        }else {
            $('.query').css('margin-top', '1.3333rem');
        }

        if(!$(this).parent("li").hasClass('on')){                    
            var $orderPanelWidth = $(".query-list").width();
            $(".query-panel").css("width", $orderPanelWidth);
            $(this).parent("li").siblings("li").removeClass("on");
            $(this).parent("li").addClass("on");
            $('.query-panel').hide(0);
            $(this).siblings('.query-panel').slideDown(400);
        }else{
            $(this).parent("li").removeClass("on");
            $('.query-panel').hide(0);
            console.log(9);
        }
    });
    /*筛选 区域 价格 户型 点击替换文字*/
    $('.query-panel ul.area-type-item li,.query-panel ' +
        'ul.price-item li,.query-panel ul.housetype-item li').click(function () {
        // 替换文本
        console.log(1);
        $(this).parents('.query-panel').siblings('.query-wrap').find('.query-txt').text($(this).text());
        // 替换文本
    });
    //总价自定义筛选
    $('.btn-confirm1').click(function () {
        var _item = $(this);
        var cur_url = cur_page_price_url;
        var min_price = _item.parents('.btn-area1').find('.btn-minimum').val();
        var max_price = _item.parents('.btn-area1').find('.btn-highest').val();
        if(min_price == ''&& max_price !=''){
            msg_tip('请填写最小值');
        }else if(min_price != '' && max_price ==''){
            msg_tip('请填写最大值');
        }else if(min_price == '' && max_price ==''){//最大最小值都为空，默认不限
            var text3 = '总价';
            $(this).parents('.query-price').find('.query-txt').html(text3);
            var jump = $(this).parents('.query-price').find('.price-item').children('li').eq(0).children('a').attr('href');
            window.location.href = jump;
            return false;
        }else if(!(intCheck(min_price)) || !(intCheck(max_price))){
            msg_tip('请输入正确数字区间');
            return false;
        }else if (min_price != '' && max_price != '') {
            if(parseInt(min_price) > parseInt(max_price)){
                msg_tip('最小值不允许大于最大值');
                return false;
            }
            var text3 = min_price +'-'+max_price+'万';

            $(this).parents('.query-price').find('.query-txt').html(text3);

            if(intCheck(min_price) && intCheck(max_price)) {
                click_close($(this));
                var new_url = user_search('x', min_price, max_price);
                if (new_url == ''){
                    var end_url = '/hk/lp.html';
                }else{
                    var end_url = '/hk/lp.html?'+new_url;   
                };
                window.location.href = commonLocation(site_url,end_url);
            }
        }

    });
    function click_close(obj){
        //选中变量颜色状态
        obj.siblings("li").removeClass('cur-selected');
        obj.addClass('cur-selected');
        //选中关闭当前列表
        obj.parents('.query-panel').hide(0);
        console.log(2);
        //有选择的参数 在标题处添加标记
        obj.parents('li').removeClass('on').addClass('has-params');
        obj.parents(".query").css({
            "position":'',
            "top":'',
            "left":'',
            "width":''
        });
        var win = $(".container");
        win.css({
            "height":"",
            "position":"",
            "width":"",
            "top":"",
            "left":""
        });


        $(".tsk-translayer").hide(0);
        // 取消 margin-top
        $(".query").css('margin-top', '0');
        // 清空 输入框 文字
        obj.parent('.btn-area1').find('.btn-minimum').val('');
        obj.parent('.btn-area1').find('.btn-highest').val('');

    }
    //筛选条件弹出的灰色背景点击消失事件
    $('.tsk-translayer').click(function(){
        $(this).hide(0);
        $('.query-panel').hide(0);
        console.log(3);
        $('.query-wrap').parent('li').removeClass('on');
        $(".container").css({
            "position":""
        });
        $(".query").css({
            "position":'',
            "top":'',
            "left":'',
            "width":'',
            'margin-top':'0'
        });
        var win = $(".container");
        win.css({
            "height":"",
            "position":"",
            "width":"",
            "top":"",
            "left":""
        });
    });
    //筛选项目中的条件点击事件 规则：相同类别不多选，不同类别间可多选
    $('.query-mnore').children('.query-panel').find('li').click(function(){
        console.log(4);
        $(this).siblings('li').removeClass('on');
        $(this).addClass('on');
        $(this).parent('ul.con').parent('.mod3').children('.tit').children('.fcB').html($(this).children('a').html());
    });
    //更多筛选条件 重置条件 点击事件 清空数据至默认
    $('.query-mnore .query-panel .btn-area2').children('.btn-canel').click(function(){
        console.log(5);
        $('.query-mnore .query-panel').find('.mod3 .fcB').html('不限');
        $('.query-mnore').children('.query-panel').find('li:first-child').addClass('on').siblings().removeClass('on');
    });
    $('.query-mnore .query-panel .btn-area2').children('.btn-confirm').click(function(){
        console.log(6);
        var type=$(this).attr('data-id');        
        var search_arr = new Array;
        //（区域，环线，地铁三者互斥）,如果不存在环线，获取区域或地铁的值
        var loop = $('.mod3-loop').find('li.on a').attr('data-search-key');
        if(loop == undefined || loop == '' || loop == 'i0'){
            var dd = $('.query-list .query-area').find('li.cur-selected a').attr('data-search-key');
            search_arr.push(dd);
        }

        // 获取总价已选中的条件
        $('.query-list').find('.query-price li.cur-selected a').each(function(){
            var search_key = $(this).attr('data-search-key');
            if(search_key.match(/^[A-Za-z][0]/) == null){
                search_arr.push($(this).attr('data-search-key'));
            }
        });
        //自定义总价
        var min_price = $('.btn-confirm1').parents('.btn-area1').find('.btn-minimum').val();
        var max_price = $('.btn-confirm1').parents('.btn-area1').find('.btn-highest').val();
        if(min_price != undefined && max_price != undefined && min_price != '' && max_price != ''){
            var diy_price = 'x'+min_price+','+max_price;
            search_arr.push(diy_price);
        }

        // 获取户型已选中的条件
        $('.query-list').find('.query-housetype li.cur-selected a').each(function(){

            var search_key = $(this).attr('data-search-key');
            if(search_key.match(/^[A-Za-z][0]/) == null){
                search_arr.push($(this).attr('data-search-key'));
            }
        });
        //更多条件
        $('.query-list').find('.mod3 li.on a').each(function(){
            var search_key = $(this).attr('data-search-key');
            if(search_key.match(/^[A-Za-z][0]/) == null){
                search_arr.push($(this).attr('data-search-key'));
            }
        });
        if(search_arr.length > 0){
            var arr_last = new Array;
            $.unique(search_arr);

            var area = $('.area-type-item.area-list').find('li.cur-selected a').attr('data-search-key');
            for(var i = 0;i<search_arr.length;i++){
                if(search_arr[i] != undefined && search_arr[i] != area){
                    arr_last.push(search_arr[i]);
                }
            }
            arr_last.sort();
            // 区域放在第一位，其余按字母排序
            if(loop == undefined || loop == '' || loop == 'i0') {
                if (area != undefined && area != 'a0') {
                    arr_last.unshift(area);
                }
            }
            var search_str = arr_last.join('_');
            var pro=$('#pro').val();
            var cityid=$('#cityid').val();
            var priceid=$('#priceid').val();
            var hxid=$('#hxid').val();
            var city=$('#city').val();
            var pr=$('#pr').val();
            var sort=$('#sort').val();            
            var hp=$('#hp').val();            
            if(type==1){                
                window.location.href = commonLocation(site_url,'lp/list'+pro+'_'+city+'_'+pr+'_'+sort+'_'+search_str+'.html');
            }else if(type==2){                
                window.location.href = commonLocation(site_url,'hjf.html?more='+search_str+'.html');
            }else if(type==3){                
                window.location.href = commonLocation(site_url,'lp/list'+cityid+'_'+priceid+'_'+hxid+'_'+search_str+'_'+hp+'.html');
            }else{
                window.location.href = commonLocation(site_url,'bieshu.html?more='+search_str+'.html');
            }            
        }else{
            window.location.href = commonLocation(site_url,'lp');
        }
        click_close($(this));
    });

});


//轮播
$(function () {
    var imgNum = $(".main_image").find('li').size();
    if ($(".focus").length > 0) {
        //轮播
        if(imgNum > 1){
            $(".focus").hover(function () {
                $("#btn_prev,#btn_next").fadeIn()
            }, function () {
                $("#btn_prev,#btn_next").fadeOut()
            });
            $dragBln = false;
            $(".main_image").touchSlider({
                flexible: true,
                speed: 200,
                btn_prev: $("#btn_prev"),
                btn_next: $("#btn_next"),
                paging: $(".flicking_con a"),
                counter: function (e) {
                    $(".flicking_con a").removeClass("on").eq(e.current - 1).addClass("on");
                    $(".focus-num span.cur").text($(".flicking_con a.on").text());
                }
            });
            $(".main_image").bind("mousedown", function () {
                $dragBln = false;
            })
            $(".main_image").bind("dragstart", function () {
                $dragBln = true;
            });
            $(".main_image a").click(function () {
                if ($dragBln) {
                    return false;
                }
            });
            timer = setInterval(function () {
                $("#btn_next").click();
            }, 5000);
        }else{
            $(".main_image").find("ul").css({
                width:"100%"
            });
            timer = setInterval(function () {
                $("#btn_next").click();
            }, 5000);
        }
    }

    $(".thum li").click(function () {
        $(this).remove();
    });


    //表情
    $(document).on('click','.btn-face',function (event) {
        if (!$("#sinaEmotion").is(":visible")) {
            $(this).sinaEmotion();
            event.stopPropagation();
        }
    });
    //查看原图 大图状态点击图片恢复原来小图
    $('#zoom').on('click','.content',function(){
        $('#zoom').children('.close').trigger('click');
    });
});


/*有用回顶部*/
$(".return-top").on("click",function () {
    $('body,html').animate({scrollTop: 1}, "200");
    return false;
});
$("#freeBtn").on("click",function () {
    var name=$('#freePhone').val();   
    var houseid=$('#houseid').val();   
    var subject=$('#subject').val();   
    var source=$('#source1').val();   
    var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;        
    if(!mobile.test($.trim($('#freePhone').val()))){            
     layer.open({content: '请您输入正确的手机号码',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});
      $('#freePhone').focus(); 
      return false;
    }
    $.post("/theme/ajax_enrolls", { "mobile": name,"source":source,"houseid":houseid,"subject":subject},
       function(data){
            if(data.status==1){
               layer.closeAll('loading');
               layer.open({content: data.info,time: 2 ,style: 'background: rgba(34,187,98,255); color:#fff; border:none;' });  
               window.setTimeout("window.location='"+data.url+"'",2000);
               return false;
            }else{
              layer.open({content: data.info,time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;' });      
              return false; 
            }
       }, "json");
    return false;
});
$(function(){
  $('#frmup88').ajaxForm({
    beforeSubmit: checkForm, // 此方法主要是提交前执行的方法，根据需要设置
    success: complete, // 这是提交后的方法
    dataType: 'json'
  });
  function checkForm(){
       layer.open({type: 2});
    }
 function complete(data){     
    if(data.status==1){
       layer.closeAll('loading');
       layer.open({content: data.info,time: 2 ,style: 'background: rgba(34,187,98,255); color:#fff; border:none;' });  
       window.setTimeout("window.location='"+data.url+"'",2000);
       return false;
    }else{
      layer.open({content: data.info,time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;' });      
      return false; 
    }
  }
});
$(function(){
  $('#frm_up_1').ajaxForm({
    beforeSubmit: checkForm1, // 此方法主要是提交前执行的方法，根据需要设置
    success: complete, // 这是提交后的方法
    dataType: 'json'
  });
  function checkForm1(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#mobile_1').val()))){            
            layer.open({content: '请您输入正确的手机号码',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});
            $('#mobile_1').focus(); 
            return false;
        } 
       layer.open({type: 2});
    }
 function complete(data){     
    if(data.status==1){
       layer.closeAll('loading');
       layer.open({content: data.info,time: 2 ,style: 'background: rgba(34,187,98,255); color:#fff; border:none;' });  
       window.setTimeout("window.location='"+data.url+"'",2000);
       return false;
    }else{
      layer.open({content: data.info,time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;' });      
      return false; 
    }
  } 
});
$('.sizetype ul').width($('.sizetype li').size()*130);
$('.sizetype1 ul').width($('.sizetype1 li').size()*160); //经常视频
$('.sizetype2 ul').width($('.sizetype2 li').size()*130);
$('.sizetype3 ul').width($('.sizetype3 li').size()*160);
console.log($('.sizetype2 li').size())
$('.sizetype li').click(function(){
    $(this).addClass('typeOn').siblings().removeClass('typeOn');
    $('.sizewrap').eq($('.sizetype li').index(this)).addClass('show').siblings('.sizewrap').removeClass('show');
})
$('.retype span').click(function(){
    $(this).addClass('rton').siblings().removeClass('rton');
    $('.reasonwrap .reitem').eq($(this).index()).show().siblings('.reitem').hide();
})
