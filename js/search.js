
/*-------------------- 获取地址栏地址并拆分 --------------------------------*/
function getParams(url) {
    var theRequest = new Object();
    if (!url)
        url = location.href;
    if (url.indexOf("?") !== -1)
    {
        var str = url.substr(url.indexOf("?") + 1) + "&";
        var strs = str.split("&");
        for (var i = 0; i < strs.length - 1; i++)
        {
            var key = strs[i].substring(0, strs[i].indexOf("="));
            var val = strs[i].substring(strs[i].indexOf("=") + 1);
            theRequest[key] = val;
        }
    }
    return theRequest;
}

var  objUrl = {}; //获取get参数
var url = window.location.href;


var params = getParams(url);
if(!$.isEmptyObject(params)){
    $.each(params,function(key,val){
        objUrl[key] = val;
    })
}

/*----------------------------*/

/*区域 价格 户型 特效 筛选*/
$('.m_nav_box2').on('click','a',function () {

    // var ParamsArr = ['city','type','zhuti','price'];
    //
    // var _this = $(this);
    // var atrName = _this.attr('name');
    // var idval=_this.attr('id-value');
    // var _val = _this.attr('value');
    // var urlParams = '';
    // for (var k in ParamsArr){
    //     if(ParamsArr[k] == atrName){
    //         objUrl[atrName] = _val;
    //         delete objUrl.page;
    //         delete objUrl.name;
    //     }
    // }
    //
    // $.each(objUrl,function(key,val){
    //     if(key == 'city') return true; //跳出当前循环
    //     urlParams  += key+'='+val+'&';
    // })
    //
    // var cityUrl = '';
    // urlParams = urlParams.substring(0,urlParams.length - 1);
    // if(typeof objUrl.city == 'string'){
    //     cityUrl = 'city='+objUrl.city+'&';
    // }
    //
    // if(urlParams == '' && cityUrl != '')
    // {
    //     cityUrl = cityUrl.substring(0,cityUrl.length - 1);
    // }
    //
    // window.location.href = '/loupan/?'+ cityUrl+urlParams;

    var ParamsArr = ['city_id','flagjw','flaghx','flagts','py'];

    var _this = $(this);
    var atrName = _this.attr('name');
    if(atrName == 'city'){
        objUrl['py'] = _this.attr('pinyin');
    }
    // var idval=_this.attr('pinyin');
    var _val = _this.attr('value');
    var urlParams = '';
    for (var k in ParamsArr){
        if(ParamsArr[k] == atrName){
            objUrl[atrName] = _val;
            delete objUrl.page;
            delete objUrl.name;
        }
    }

    // console.log(objUrl);
    $.each(objUrl,function(key,val){
        if(key == 'py') return true; //跳出当前循环
        urlParams  += key+'='+val+'&';
    })

    var cityUrl = '';
    urlParams = urlParams.substring(0,urlParams.length - 1);
    if(typeof objUrl.py == 'string'){
        cityUrl = 'py='+objUrl.py+'&';
    }

    if(urlParams == '' && cityUrl != '')
    {
        cityUrl = cityUrl.substring(0,cityUrl.length - 1);
    }

    window.location.href = '/bieshu/?'+ cityUrl+urlParams;

})

/*区域 价格 户型 特效 筛选*/
$('.m_nav_box').on('click','a',function () {

    // var ParamsArr = ['city','type','zhuti','price'];
    //
    // var _this = $(this);
    // var atrName = _this.attr('name');
    // var idval=_this.attr('id-value');
    // var _val = _this.attr('value');
    // var urlParams = '';
    // for (var k in ParamsArr){
    //     if(ParamsArr[k] == atrName){
    //         objUrl[atrName] = _val;
    //         delete objUrl.page;
    //         delete objUrl.name;
    //     }
    // }
    //
    // $.each(objUrl,function(key,val){
    //     if(key == 'city') return true; //跳出当前循环
    //     urlParams  += key+'='+val+'&';
    // })
    //
    // var cityUrl = '';
    // urlParams = urlParams.substring(0,urlParams.length - 1);
    // if(typeof objUrl.city == 'string'){
    //     cityUrl = 'city='+objUrl.city+'&';
    // }
    //
    // if(urlParams == '' && cityUrl != '')
    // {
    //     cityUrl = cityUrl.substring(0,cityUrl.length - 1);
    // }
    //
    // window.location.href = '/loupan/?'+ cityUrl+urlParams;

    var ParamsArr = ['city_id','flagjw','flaghx','flagts','py'];

    var _this = $(this);
    var atrName = _this.attr('name');
    if(atrName == 'city'){
        objUrl['py'] = _this.attr('pinyin');
    }
    // var idval=_this.attr('pinyin');
    var _val = _this.attr('value');
    var urlParams = '';
    for (var k in ParamsArr){
        if(ParamsArr[k] == atrName){
            objUrl[atrName] = _val;
            delete objUrl.page;
            delete objUrl.name;
        }
    }

    // console.log(objUrl);
    $.each(objUrl,function(key,val){
        if(key == 'py') return true; //跳出当前循环
        urlParams  += key+'='+val+'&';
    })

    var cityUrl = '';
    urlParams = urlParams.substring(0,urlParams.length - 1);
    if(typeof objUrl.py == 'string'){
        cityUrl = 'py='+objUrl.py+'&';
    }

    if(urlParams == '' && cityUrl != '')
    {
        cityUrl = cityUrl.substring(0,cityUrl.length - 1);
    }

    window.location.href = '/loupan/?'+ cityUrl+urlParams;

})

/*区域 价格 户型 特效 筛选*/
$.each($('.m_nav_qy').find('a'),function(){
    var each_name = $(this).attr('name');
    var each_val = $(this).attr('value');
    if(each_val == objUrl[each_name]){
        $(this).attr('id','nav');
    }

})

//选中
$.each($('.m_sort ul').find('li'),function () {
    var _eachthis = $(this);
    var each_name = $(this).attr('name');
    if(!$.isEmptyObject(objUrl[each_name])){
        $('.m_sort ul li').removeClass('sort');
        $.each($('.m_sort_jg').find('span'),function () {
               if( each_name == $(this).attr('name') && objUrl[each_name] == $(this).attr('value')){
                   // _eachthis.html($(this).html());
                   $('span.fnt').html($(this).html())
               }
        })
        $(this).addClass('sort')
    }
})


/*---------------------------------------------------------------------*/

/* 筛选 人气  价格  默认  */
$('.m_sort ul').on('click','.m_sortClick',function () {
    var ourlParams = '';
    var ParamsArr = ['default','pricesort','renqi'];
    var _this = $(this);
    var atrName = _this.attr('name');
    var _val = _this.attr('value');

    var oAbjUrl = {};               //获取get参数
    var url = window.location.href;

    /* 把地址拆分存储 */
    var Aparams = getParams(url);
    if(!$.isEmptyObject(Aparams)){
        $.each(Aparams,function(key,val){
            oAbjUrl[key] = val;
        })
    }

    /* 先把 oAbjUrl 对象里存在 ParamsArr 数组，删除 */
    $.each(oAbjUrl,function(key,val){
        var ind = $.inArray(key, ParamsArr);
        if(ind >= 0){
            delete oAbjUrl[key];
        }
    })

    /* 把当前点击名称添加 */
    for (var k in ParamsArr){
        if(ParamsArr[k] == atrName){
            oAbjUrl[atrName] = _val;
            delete oAbjUrl.page;
        }
    }

    // window.location.href = '/loupan/?'+urlParams;
    /* 把对象内属性及值拼接 */
    $.each(oAbjUrl,function(key,val){
        ourlParams += key+'='+val+'&';
    })

    /* 去掉最后拼接 & */
    ourlParams = ourlParams.substring(0,ourlParams.length - 1);

    /* 把地址放加载地址栏上 */
    window.location.href = '/loupan/?'+ ourlParams;

})


/* 点击修改 */
$('.m_sort_jg span[name="pricesort"]').on('click',function(){
    var _txt = $(this).text();
    $('span.fnt').html(_txt)
    // $('.sort_jg .span.fnt').text(_txt);
})

/* 按价格 显示下拉 选项*/
$('.sort_jg').hover(function(){
    $('.m_sort_jg').show();
},function(){
    $('.m_sort_jg').hide();
});





/* 人气  价格  默认 选中效果 */
$('.m_sort ul li').on('click',function(){
    $(this).addClass('sort').siblings().removeClass('sort');
})



/*---------------------------------- end -----------------------------------*/
/*有新房通知我*/
// $(window).on("scroll", function () {
//     if($(window).scrollTop()>=$(".m_xftz_box").offset().top) {
//         $("#m_xftz").addClass("scrollfixed");
//     } else {
//         $("#m_xftz").removeClass("scrollfixed");
//     }
// });



/*--------------- 报名调用 ------------------*/
$(function () {
    //报名验证及提交的调用
   /* PublicAction.AjaxSend(
        {
            CORID:'apply_submit',                  
        }
    );*/

        // 报名
    PublicAction.AjaxSend(
        {
            CORID:'m_lp_list_button',               /*操作ID*/
        }
    );

})


