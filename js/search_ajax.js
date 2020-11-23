(function($){
    $.fn.extend({
        select4:function(options){
            var defaults = {
                ajax_url:true 
            }
            var options = $.extend(defaults, options);

            return this.each(function(){              
                var mythis = $(this);
                var mythis2 = $('.y_search_showl');
                var search_hide = $('#y_search_show');


                $(document).on("click",".select4_box li",function(){
                    mythis.val($(this).find('a span em').attr('title'));
                    $(".select4_box").remove();
                    search_hide.hide();
                    $('.y_scrmaak').hide();
                });

                $('.y_scrmaak').click(function(event) {
                    $(".select4_box").remove();
                    search_hide.hide();
                    $(this).hide();
                });

                $(".select4_box").click(function(event) {
                    event.stopPropagation();
                });

                mythis.click(function(event) {
                    $('.y_scrmaak').show();
                    var val = $(this).val();
                    search_hide.show();
                    $.ajax({
                        url:options.ajax_url,
                        dataType:"json",
                        data:{title:val},
                        success:function(data){
                            // console.log(data);
                            mythis2.html('');
                            if(data.code == 200){
                                var html = '<div class="select4_box"><ul>';
                                var price = '';
                                var unit = '';
                                $.each(data.data,function(k,v){
                                    if(v.sale_price == 0 || v.sale_price == null || v.sale_price == ''){
                                        var price = '待定';
                                        var unit = '';
                                    }else{
                                        price = v.sale_price;
                                        unit  =  v.price_unit;
                                    }
                                    var vname=v.name;
                                    if (vname.length>10) {
                                        nametext=vname.substring(0,8)+"...";
                                    }else{
                                        nametext=vname;
                                    };
                                    html += '<li><a href="/loupan/'+v.id+'.html" class="c"><span><em title="'+v.name+'">'+nametext+'</em><i>['+v.city_name+']</i></span><p><em>'+price+'</em>'+unit+'</p ></a ></li>';
                                });
                                html+='</ul></div>'
                                $(".select4_box").remove();
                                mythis2.html(html);
                            }
                        }
                    });
                });

                mythis.keyup(function(event) {
                    if(event.keyCode==40){
                        var index = $(".select4_box li.active").index()+1;
                        $(".select4_box li").eq(index).addClass('active').siblings().removeClass('active');
                        mythis.val($(".select4_box li.active span em").attr('title'));
                    }else if(event.keyCode==38){
                        var index = $(".select4_box li.active").index()-1;
                        if(index<0){
                            index = $(".select4_box li").length-1;
                        }
                        $(".select4_box li").eq(index).addClass('active').siblings().removeClass('active');
                        mythis.val($(".select4_box li.active span em").attr('title'));
                    }else if(event.keyCode==13){                        
                        event.stopPropagation();
                        mythis.val($(".select4_box li.active span em").attr('title'));
                        return false;
                    }else{
                        mythis.trigger("click");

                    }
                });

            });

            
        }
    });
})(jQuery);




$(function(){
    $(".y_search_text").select4({"ajax_url":"/searchresult.php"});
    $('.y_search_subm').on('click',function(){
        var inptext=$('.y_search_text').val();
        window.location.href = '/loupan/?key='+inptext;
    })
    $(document).keydown(function(event){ 
        if(event.keyCode==13){ 
            $(".y_search_subm").click(); 
        } 
    }); 
});


