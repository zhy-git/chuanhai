// JavaScript Document

$(document).ready(function(e) {
    $(".header-city-name span").click(function(){
		$(".header-city-list").stop(false,false).slideToggle();
	})

	$(".header-menu").click(function(){
		$(".nmenu").stop(false,false).slideToggle(500);
	})


	$(window).scroll(function(){
		if ($(window).scrollTop()>100){
			$(".backtop").fadeIn(100);
			$(".backfk").fadeIn(100);
		}
		else
		{
			$(".backtop").fadeOut(100);
			$(".backfk").fadeOut(100);
		}
	});

	$(".back_top").click(function(){
		$('body,html').animate({scrollTop:0},300);
			return false;
	});


	var hhh = $(window).height();
	var heh = 50
	var seh = 50
	var mah = 31
	var foh = $("footer").height();
	var fqh = 50

	$(".map").css({"height":hhh-heh-seh-mah-foh-fqh+"px"});
	$(".noall_screen").css({"min-height":hhh-foh-fqh+"px"});


	var hhrw = $(".hlsint-btn").width();
	$(".hlsint-con").css({"padding-right":hhrw+10+"px"});


	$(".hlsint-txt-show").click(function(){
		$(".hlsint-txt-show").hide();
		$(".hlsint-txt-main").show();
		$(".hlsint-txt-hide").show();
	});

	$(".hlsint-txt-hide").click(function(){
		$(".hlsint-txt-hide").hide();
		$(".hlsint-txt-main").hide();
		$(".hlsint-txt-show").show();
	});

    

});
