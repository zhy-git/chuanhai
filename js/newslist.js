$(function(){
	/*楼盘推荐*/
	jQuery(".slideBox").slide({titCell:".hd ul",mainCell:".bd ul",autoPage:true,effect:"left",autoPlay:true,vis:1,trigger:"click"});
	$("#y_newslist_nav").scrollFix({
	    distanceTop:$(".y_news_maintop").outerHeight(),
	    endPos: '.y_newslist_bottom_m',
	    zIndex: 10
	})


	$(".y_newslist_right").scrollFix({
	    distanceTop:$(".y_news_maintop").outerHeight(),
	    endPos: '.y_newslist_bottom_m',
	    zIndex: 10
	})



	/**/
	var txt = $('.m_p_title2_text em').text();
	txt = txt.replace(/\ +/g,"");    // 去掉空格
	var _txt1 = txt.slice(0,2);
	var _txt2 = txt.slice(2);
	$('.m_p_title2_text em').html('<i style="color:red;">'+_txt1+'</i>'+_txt2);
	// console.log(txt.slice(0,3))
	// console.log(txt.slice(3))

	// 列表移过的效果
	$('.y_newslist_list ul li.puic_color').eq(0).addClass('box');
	$('.y_newslist_list ul li.puic_color').on('mouseover',function(){
		$(this).addClass('box').siblings().removeClass('box');
	})

})


	/*--------------- 报名调用 ------------------*/
$(function () {
    //报名验证及提交的调用
   // PublicAction.AjaxSend(
  //      {
         //   CORID:'apply_submit',                    /*操作ID*/
   //     }
 //   );

})
	
