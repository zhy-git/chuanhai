$(function(){
	
	jQuery(".w_app_box").slide({mainCell:".bd ul",effect:"topLoop",autoPlay:true,delayTime:1000,interTime:8000});
	jQuery(".lmIntro").slide({});
	jQuery(".picScroll-left").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:4});
	// 关闭按钮显示、隐藏
	$('.cls').on('click',function(){
	    $('.w_app_l').show();
	    $('.w_app_box').hide();
	})
	$('.w_app_l').on('click',function(){
	    $(this).hide();
	    $('.w_app_box').show();
	})

	//报名验证提交的调用
    PublicAction.AjaxSend({CORID:'apply_submit'/*操作ID*/});
	
	
	$(".bmkf-up").on("click",function(){  
	//alert(111); 
        var name=$(this).attr('data-name');    
        var wh=$(this).attr('data-type');    
        var info=$(this).attr('data-info');    
        $('.lpm-bx3-t').html(name);
        $('#lpsounce').val(wh);
        $('#box1_t').html(info);
        $(".lpm-bx3,#black_bg").fadeIn();
    });
    $(".bmkf-up-hw").on("click",function(){       
        var type=$(this).attr('data-type');         
        var name=$(this).attr('data-name');        
        $('.send-mess-text1').html(name); 
        $('.lpm-bx3').css("background","url(/public/static/home/image/hy/tc_"+type+".png) no-repeat"); 
        $(".lpm-bx3,#black_bg").fadeIn();
    });

    $("#bmkfCallClose").on("click",function(){     
         $(".lpm-bx3,#black_bg").fadeOut();   
    });
	
	$("body").on("click", ".slide", function() {
					

                    $(".proCont ").animate({

                        left: "-320px"

                    }, 500, function() {

                        $("#proInfo_view").hide()

                    }),

                    $(".proInfo_min").show(),

                    $(".pg_min").animate({

                        width: "139px"

                    }, 500, function() {})

                })
				$("body").on("click", ".pg_min", function() {

                    $("#proInfo_view").show(),

                    $(".proCont ").animate({

                        left: "0px"

                    }, 500, function() {

                        $(".proInfo_min").hide()

                    }),

                    $(".pg_min").animate({

                        width: "0px"

                    }, 500, function() {})

                })
})


$(function(){    
    if($(".page-menu").length == 0 && $(".header-outer").length == 0){
        $(window).scroll(function(){
            var height = $(document).scrollTop();
            var headerHeight = $(".header").height();
            if(height > headerHeight){
                $('.header2').fadeIn('slow',function(){
                    $(this).css('display','block');
                });
            }else{
                $('.header2').fadeOut('slow',function(){
                    $(this).css('display','none');
                });
            }
        });
    }
});