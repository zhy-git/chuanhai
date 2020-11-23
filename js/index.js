// 头部毛玻璃
setTimeout(function(){
     $('.m_Carousel_ul li div').attr('class','cover');
     $('.m_Carousel_ul li div img').attr('class','blur');
},1000)         




// 头部导航选项卡
$('.m_nav_left li').eq(0).find('i').attr('id','m_nav_left_i');
$('.m_nav_left li').eq(0).find('span').attr('id','m_nav_left_span');

function m_rmlp (name1,name2,name3){ 
    $(name2).first().show();
    $(name3).first().css('background','none')

    $(name1).on('click',function(){
        $(name3).css('background','#FFF')
          $(name2).hide();
          var IDdata = $(this).attr('dataId');
          $(name2+'[dataId='+ IDdata +']').show();
          $(this).find('i').attr('id','m_nav_left_i').parent().siblings().find('i').attr('id','');
          $(this).find('.m_nav_left_img').css('background','none');
          $(this).find('span').attr('id','m_nav_left_span').parent().siblings().find('span').attr('id','');


    })
}

$('.m_nav_right li').on('mousemove',function(){
     $(this).css({'background':'#ff5849'}).find('a').css('color','#FFF').parent().siblings().css({'background':'none',}).find('a').css('color','#333')
})


// 旅居城市 插件
var mySwiper = new Swiper('.swiper-container',{
effect : 'coverflow',
slidesPerView: 2.2,
loopedSlides :5,
centeredSlides: true,
loop : true,
autoplay: {
    disableOnInteraction: false,
    delay: 3000,//1秒切换一次
  },

coverflow: {
            rotate: 10,
            stretch: 100,
            depth: 80,
            modifier: 2.5,
            slideShadows : true
        },    
})


// 头部轮播
jQuery(".m_Carousel").slide({mainCell:".bd ul",effect:"fold",autoPlay:true,trigger:"click",delayTime:2000,interTime:4000});


// 头部导航选项卡
$(function(){
    m_rmlp('.m_nav_left li','.m_nav_right','.m_nav_left_img');
})




// 价格走势图
$(document).ready(function(){  
    var chart = document.getElementById('chart');
    if(chart == null) return false;
    console.log(typeof chart);
    var chartData = echarts.init(chart,'dark');  

    chartData.setOption({
        backgroundColor:'#282E3D', //rgba设置透明度0.1 
         title:{                // 标题设置
             left:'5',
             top:'10',
             text:'价格（元）',
             textStyle:{
                //文字颜色
                color:'#ccc',
                //字体风格,'normal','italic','oblique'
                fontStyle:'100',
                fontWeight:'bold',
                //字体大小
        　　　　fontSize:12,
            }
        },
        toolbox: {
        show : true,
        right:'5',
             top:'5',
        feature : {
                    // mark : {show: true},
                    // dataView : {show: true, readOnly: false},
                    magicType : {show: true, type: ['bar']},  // 切换为柱状 
                    restore : {show: true},     //  还原
                    // saveAsImage : {show: true}
          }
        },
        grid: {              // 移动内容
                left: '3%',
                right: '4%',
                bottom: '7%',
                containLabel: true
        }, 
        tooltip: {          //  引导线
            trigger: 'axis',
            backgroundColor: 'rgb(104, 114, 139, 0.9)',
            // borderColor:'#FFF',
            borderRadius: 5,   //圆角
            textStyle:{
            color:'#FFF',
            // extraCssText: 'box-shadow: 0 0 2px rgba(0, 0, 0, 0.3);'
        }
        },  
        legend: {      //关闭
            top:'10',        
            data:['']   //区域数据
        },  
        xAxis : [      //底部 内容    
            {
                type : 'category',
                data : [],           //月份数据
                axisLabel: {
                    show: true,
                    textStyle: {
                        color: '#7a7f8c'
                    }
                }
            }
        ] ,
        yAxis: {   //右边 内容 
            axisLabel: {
                show: true,
                textStyle: {
                    color: '#7a7f8c'
                }
            }  
        },  
        series: [{    
            color: ['#FFBC26'], 
            type: 'line',
            name: '',    // 悬浮区域
            data : []    // 价格数据
        }]  
    });

    function ajax_zs (){
        var html = '';
        $.ajax({
            url: "cityprice.php",
            data:{id:dataZs},
            type: "GET",
            dataType: "json",
            success: function(data) {//请求成功完成后要执行的方法
                if(data.code == 200){
                    chartData.setOption({      //走势图数据
                        legend: {
                            data: data.data.region
                        },
                        xAxis: {
                            data: data.data.categories           //单独
                        },
                        series: [{
                            name: data.data.region[0],
                            data: data.data.data
                        }]
                    });
                    var categoriesCount = data.data.categories.length;
                    var dataCount = data.data.data.length;
                    html+=  '<em>'+data.data.region[0]+''+data.data.categories[categoriesCount - 1]+'房价均价</em>';    //  '+ data.region + data.categories[5] +'
                    html+=  '<span><i>'+data.data.data[dataCount - 1]+'</i>元/m²</span>';                    //单独
                    html+=  '<a href="javascript:void(0)" class="pic_jjtz" data-id="0" data-name="">房价动态提醒<span class="t" style="display:none;">房价动态提醒</span></a>';
                    $('.m_r_average_price').html(html);
                }
                // chartData.setOption({      //走势图数据
                //     legend: {
                //         data: data.data.region
                //     },
                //     xAxis: {
                //         data: data.data.categories           //单独
                //     },
                //     series: [{
                //         name: data.data.region[0],
                //         data: data.data.data
                //     }]
                // });
                // var categoriesCount = data.data.categories.length;
                // var dataCount = data.data.data.length;
                // html+=  '<em>'+data.data.region[0]+''+data.data.categories[categoriesCount - 1]+'房价均价</em>';    //  '+ data.region + data.categories[5] +'
                // html+=  '<span><i>'+data.data.data[dataCount - 1]+'</i>元/m²</span>';                    //单独
                // html+=  '<a href="javascript:void(0)" class="pic_jjtz" data-id="0" data-name="">房价动态提醒<span class="t" style="display:none;">房价动态提醒</span></a>';
                // $('.m_r_average_price').html(html);
            }
        });
    }

   var dataZs = $('.m_trend_r ul li').eq(0).attr('data_zs');
       ajax_zs();

    $('.m_trend_r ul li').on('click',function(){ 
         dataZs = $(this).attr('data_zs');
         $(this).attr('id','trend').siblings().attr('id','');
         ajax_zs();
    })



}); 




// 价格拖动筛选
$(function(){

    $('.single-slider').jRange({

     from: 0,

     to: 1000,

     step: 10,

     scale: [0+'万',250+'万',500+'万',750+'万',1000+'万以上'],

     format: '%s'+'万',

     width: 500,

     showLabels: true,

     showScale: true

    });


$('.budget').click(function(){
     var budgetData = $(".single-slider").val();
     // console.log(budgetData);
        $.ajax({
            url: "./js/echarts/data.json",
            data:{id:budgetData},
            type: "GET",
            dataType: "json",
            success: function(data) {//请求成功完成后要执行的方法
         
            }
        });
    })

});

function Qalert() {
    var M = {};
    if(M.dialog1){
        return M.dialog1.show();
    }

    var city = $('#feng_cityall').html();
    if(city != '全国'){
        M.dialog1 = jqueryAlert({
            'content' : '当前所在省份为：'+city,
            'closeTime' : 2000,
        })
    }

}
//Qalert();

$(function(){
    $('.y_ifa_lmain_title span').each(function(){
        var titlehtml=$(this).html();
        var target="<em style='color:#f00'>"+titlehtml.substring(0,2)+"</em>";
        $(this).html(target+titlehtml.substr(2));
    })
    
})
$('.m_bmck_box').show();
$('.shiyiyue').hide();
$('.m_bmck_zhez').on('click',function(){
    $('.m_bmck_box').hide();
    $('.shiyiyue').show();
})

$('.m_bmck_gb').on('click',function(){
    $('.m_bmck_box').hide();
    $('.shiyiyue').show();
})




/*资讯新模块 2019-02-15*/
$(function() {
    tab ('.newNav_m a','ul.newsList','data-id');
    // 选项卡
    function tab (name1,name2,name3){;
        $(name1).on('mousemove',function(){
            var Idoption = $(this).attr(name3);
            if (Idoption!= 'null') {
                $(name2).hide();
                $(name2+'['+name3+''+'='+ Idoption +']').show();
                $(this).addClass('on').siblings().removeClass('on');
            };
        })
        $(name1).eq(0).addClass('on');
        $(name2).eq(0).show();
    }
})

$('.hknewhousecezbthome').hide();
     $('.hknewhousecezbthome').eq(0).show();
    $('.hknewhouseceztop li').hover(function () {
      $('.hknewhouseceztop li').removeClass('actives');
        $('.hknewhousecezbthome').hide();
        $('.hknewhouseceztop li').eq($(this).index()).addClass('actives');
        $('.hknewhousecezbthome').eq($(this).index()).show();
    })
$('.new_remetsbt ul').hide();
    $('.new_remetsbt ul').eq(0).show();
    $('.new_remetstop li').click(function () {
    $('.new_remetstop li').removeClass('dianj');
    $('.new_remetsbt ul').hide();
    $('.new_remetstop li').eq($(this).index()).addClass('dianj');
    $('.new_remetsbt ul').eq($(this).index()).show();
    })