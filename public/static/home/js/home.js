;(function($){
  $.fn.creatSearchList=function(options){
    var defaults={
      type:0,
      url:"",
      param:{},
      filterDataFunc:null,
      top:34,
      left:0,
      clsName:'search-list-box',
      callback:null
    };
    options=$.extend(defaults,options);
    return this.each(function(){
      var _self=$(this),
        $inp=_self.children("input[type='text']");
      $inp.keyup(function() {
        options.type==0 && $.post(options.url,options.param,function(data){
          var list='';
          for(var i in data){
            var countStr=!!data[i].count?'<em class="count">'+data[i].count+'</em>':'';
            list+='<span><em class="text">'+data[i].lpname+'</em>'+countStr+'</span>';
          }
          if(_self.children(".search-list-box").length>0){
            _self.children(".search-list-box").empty().append(list).css("display","block");
          }else{
            _self.append('<div class="search-list-box" style="position:absolute;left:'+options.left+'px;top:'+options.top+'px;display:block;">'+list+'</div>');
          }
          _self.css("position","relative");
        });
        if(options.type==1) {
          var list=options.filterDataFunc($inp.val());
          if(_self.children(".search-list-box").length>0){
            _self.children(".search-list-box").empty().append(list).css("display","block");
          }else{
            _self.append('<div class="search-list-box" style="position:absolute;left:'+options.left+'px;top:'+options.top+'px;display:block;">'+list+'</div>');
          }
          _self.css("position","relative");
        } 
        //options.type==1 && eval(options.filterDataFunc(_self));
      });
      _self.on("click", ".search-list-box > span", function(event) {
        var val=$(this).children(".text").text();
        $inp.val(val);
        $(this).parent(".search-list-box").css("display","none");
        if(!!options.callback) options.callback($(this));
      });
      $(document).delegate("body", "click", function(e) {
          if(!_self.is(e.target) && _self.has(e.target).length === 0){
              _self.find(".search-list-box").css("display","none");
          }
      });
    });
  }
})(jQuery);
var home=({
  init:function(){
    this.bind();
  },
  bind:function(){
    /*房价走势图*/
    this.fangjiaTrend();
    /*快速搜索城市*/
    this.citySearch();
  },
  fangjiaTrend:function(){
    var dataArr = hotCityPriceList;
    $("div.fjpic").each(function(i){
      var myChart=echarts.init($(this)[0]);
      var option={
        grid:{
          top:20,
          right:0,
          bottom:20,
          left:0
        },
        xAxis:{
          show:false,
          name:"月份",
          data:["1","2","3","4","5","6"]
        },
        yAxis:{
          show:false
        },
        series:[{
          name:dataArr[i].city,
          type:"line",
          lineStyle:{
            normal:{
              color:"#4ba634",
              opacity:0.8
            }
          },
          symbolSize:0,
          data:dataArr[i].data
        }]
      }
      myChart.setOption(option);
    });
  },
  citySearch:function(){
    $("#city-search").creatSearchList({
      type:1,
      param:{},
      top:35,
      filterDataFunc:filterDataFunc, 
      callback: function(_self) {
        window.location.href = "http://" + _self.attr("domain") + ".gxloushitong.com";
      }
    });
    function filterDataFunc(name){
      var list='';
      $.each(cityList, function(i, item) {
        if(item.indexOf(name) != -1) {
          var items = item.split("-");
          list+='<span domain="'+items[2]+'"><em class="text">'+items[1]+'</em><em class="count"></em></span>';
        }
      });
      return list;
    }
  }
}).init();

$(function () {
    //底部更多
    $('.footmore').click(function(){
        $(this).parent().parent().toggleClass("on");
    });
    $('.zskmore').click(function(){
        $(this).parent().parent().toggleClass("zsksec").siblings().removeClass('zsksec');
        if($(this).parent().parent().hasClass('zskfivpo zsksec')){
           $(this).text('收起 ∧');
        }else{
           $(this).text('展开 ∨');
        }
    }); 
    //鼠标移动显示遮罩
    $(".imgtext").hide();
    $(".zzsc").hover(function(){
        $(".imgtext",this).slideToggle(500);
    });

});