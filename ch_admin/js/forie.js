$(function(){
	$(".nav dl dd span:odd").css("background-color","#EEE");
	$(".box_cus tr:even").css("background-color","#F1F1F1");
	$(".searchinfor li").hover(
		function(){
			$(this).find(".p_editor").animate({bottom:"0px"});
		},function(){
			$(this).find(".p_editor").animate({bottom:"-26px"});
		}
	)
});