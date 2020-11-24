/**********************************/
function mainHeight(){
	/*全屏*/
	var aa=$(window).height(),
	    bb=$(".header").innerHeight()+$(".footer").innerHeight();
	$(".main").css("height",aa-bb);	
}
$(function(){
	mainHeight();
	/*侧边栏缩放*/
	$(".nav dl a").click(function(){
		$(this).parent().toggleClass("on").find("dd").slideToggle();
		$(this).parent().siblings().removeClass("on").find("dd").slideUp();
	})
	$(".nav dl dd span").click(function(){
		$(this).addClass("active").siblings().removeClass("active")
	})
	/*表格等高
	$(".userinfo li").each(function() {
		var sp=$(this).children("span");
		var h=0;
		for(i=0;i<sp.length;i++){
			var g=sp.eq(i).height();
			h>g?h:h=g;
		}		
        $(this).find(".u_dt").css("lineHeight",h+"px");
    });
	*/
	/*4位数一个空格*/
	$(".userinfo li span.spec").each(function() {
		var udd=$(this).text();
		if(!isNaN(udd)){
			var a=udd.replace(/\B(?=(?:\d{4})+\b)/g, ' ')
			$(this).text(a)	
		}else{return true}
	})
	/*左侧栏收缩*/
	$(".check_button").click(function(){
		function navShow(){
			$(".nav").animate({left:"-187px"});
			$(".check_button,.conter").animate({left:"3px"});
			$(".check_button").text("展开")
		}
		function navHide(){
			$(".nav").animate({left:"0"});
			$(".check_button,.conter").animate({left:"190px"});
			$(".check_button").text("收起")
		}
		$(".nav").offset().left==-187?navHide():navShow();
	})
	/*分级*/
	$(".addinfor li").each(function(index, element) {
        var level=$(this).attr("_level"),
			num=$(this).index();
		$(this).css("textIndent",(level-1)*2+"em")
		num%2==0?$(this).css("background-color","#FFF"):$(this).css("background-color","#F1F1F1");
    });
	/*分级2*/
	$(".column td.position,.department td.position").each(function(index, element) {
        var level=$(this).attr("_level");
		level==1?$(this).css("textIndent","-1.8em"):$(this).css("textIndent",(level-1)*2+"em")
    });
});
$(window).resize(function() {
	mainHeight();
});