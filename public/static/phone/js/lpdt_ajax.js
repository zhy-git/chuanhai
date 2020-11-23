
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
/*----------------定义页面全局变量-----------------------*/
// 页数
var page = 0;
// 每页展示5个
var size = 10;
//资讯ID
var thisID=0;
var spell=$('#spell').val();
var houseid=$('#house_id').val();
var cid=$('#cid').val();
/*----------------------------------------------------------------------------------*/
// 封装 ajax 方法
function AjaxFn(){
    page = 0;
    page++;
    $.ajax({
        type: 'GET',
        url: '/news/homeform?&page='+page+'&limit='+size + '&cid='+thisID,
        dataType: 'json',
        success: function(data){
            if(data.code == 200){
                    $('.news_list').append(ModuleWay(data.data))    //调用选择模块
            }
            // alert(data);
            // 每次数据加载完，必须重置
            // me.resetload();
        },
        error: function(xhr, type){
            // alert('Ajax error!');
            // 即使加载出错，也得重置
          //  me.resetload();
        }
    });
    // 上滑加载
    // $('.news_list').dropload({
    //  // 调用加载
    //     scrollArea : window,
    //     threshold:2/3,
    //     loadDownFn : function(me){
    //
    //     }
    // });
}
// 选择各个模块
function ModuleWay(conditions){
        var _html="";
        $.each(conditions.data,function (key,val) {
            if(val.thumb != null && val.thumb != "" && val.thumb.length == 1 && val.thumb_size == 1){
                _html +='<div class="plan_one">';
                _html +='<a href="/news/details/'+val.id+'/">';
                _html +='<div class="plan_one_title">';
                _html +='<p>'+val.subject+'</p>';
                _html +=' <p> <span class="guis">'+val.source+'</span><span class="data">'+val.open_time+'</span> <span class="see"><img src="/image/see.png" alt="">'+val.clicks+'</span></p>';
                _html +='</div>';
                _html +='<div class="plan_one_img"><img src="'+conditions.url+val.thumb[0]+'" alt=""></div>';
                _html +='</a>';
                _html +='</div>';

            }else if(val.thumb != null && val.thumb != "" && val.thumb.length > 1){
                _html +='<div class="plan_two">';
                _html +='<a href="/news/details/'+val.id+'/">';
                _html +='<div class="plan_two_title">'+val.subject+'</div>';
                _html +='<div class="plan_two_img">';
                _html +='<ul>';
                for(k in val.thumb){
                    _html +='<li><img src="'+conditions.url+val.thumb[k]+'" alt=""></li>';
                }
                _html +='</ul>';
                _html +='</div>';
                _html +='<div class="plan_two_label">'+val.source+'<span class="data">'+val.open_time+'</span> <span class="see"><img src="/image/see.png" alt="">'+val.clicks+'</span></div>';
                _html +='</a>';
                _html +='</div>';
            }else if(val.thumb_size == 2){
                _html +='<div class="plan_three">';
                _html +='<a href="/news/details/'+val.id+'/">';
                _html +='<div class="plan_two_title">'+val.subject+'</div>';
                _html +='<div class="plan_three_img"><img src="'+conditions.url+val.thumb[0]+'" alt=""></div>';
                _html +='<div class="plan_two_label">'+val.source+'<span class="data">'+val.open_time+'</span> <span class="see"><img src="/image/see.png" alt="">'+val.clicks+'</span></div>';
                _html +='</a>';
                _html +='</div>';
            }
        })
        return _html ;
}
$(function(){
    // 判断 objUrl 是否从别到页面跳转到这里
    if(typeof objUrl.cid == "string"){
        thisID = objUrl.cid;
    }
    // 点击切换导航栏 ajax 切换
    $(".updates-tag ").on('click','li',function(){
        var $this = $(this);                       
        $(this).addClass("updates-tagon").siblings().removeClass("updates-tagon");
        cid = $this.attr('data-type');
        if(cid==0){
            $('.updates-more').show();
        }
        $('.updates-list').html('');
        page = 0;
        fun2();
    })
    $(".updates-more").on('click',function(){
        fun();
    })
    function fun(){        
        // 上滑加载
        page++;
        $.ajax({
            type: 'GET',
            url:  '/'+spell+'/newsform?&page='+page+'&limit='+size + '&cid='+cid+ '&houseid='+houseid,
            dataType: 'json',
            success: function(data){
                if(data){
                    $('.updates-list').append(data)    //调用选择模块
                }else{
                    alert('暂无更多动态');
                    return  false;
                }                           
            },
            error: function(xhr, type){
                // alert('Ajax error!');
                // 即使加载出错，也得重置
               // me.resetload();
            }
        });
    }
    function fun2(){        
        // 上滑加载
        page++;
        $.ajax({
            type: 'GET',
            url:  '/'+spell+'/newsform?&page='+page+'&limit='+size + '&cid='+cid+ '&houseid='+houseid,
            dataType: 'json',
            success: function(data){
                if(data){
                    $('.updates-list').append(data)    //调用选择模块
                }else{
                   $('.updates-list').append('<p class="center no_info">暂无更多动态</p>');
                   $('.updates-more').hide();
                    return  false;
                }                           
            },
            error: function(xhr, type){
                // alert('Ajax error!');
                // 即使加载出错，也得重置
               // me.resetload();
            }
        });
    }
    fun();
})

