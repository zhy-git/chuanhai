$(function(){
	// 楼盘相冊锚点
	function  anchor(id){
		$(id).on('click',function(){
			$(this).addClass('on').siblings().removeClass('on')
			var m_id = $(this).attr("data-anc");
			var m_wz = $('.'+ m_id);
			var offsetj = Math.ceil(m_wz.offset().top);
			$('html,body').animate({scrollTop:offsetj},800);
		
		});
	}
	anchor('.y_tuku_nav ul li');//楼盘相冊锚点





// 相册加载
$('.y_tuku_ul').each(function(){
	if ($(this).find('li').length >=3) {
		$(this).find('.y_lptk_show').show();
		$(this).find('.y_lptk_show a').click(function(){
			$(this).parent().hide();
			$(this).parent().siblings('.y_lptk_none').show();

			if ($(this).attr('data-list') !='') {
				var echodataUl=$(this).parent().siblings('ul.y_tuku_ul_tu');
				$(this).parent().siblings('ul.y_tuku_ul_tu').css({'height':'auto','overflow':'hidden'});
				$(this).attr('data-list','')
				var post_id = $(this).attr('data-id');
				var post_hid = $(this).attr('data-hid');
				$.post('/loupan/ajax.do',{album_id:post_id,hid:post_hid,fl:2},function (data) {
                    echodataUl.html('');
					data=jQuery.parseJSON(data);
                    var data=data.data;
                    // console.log(data);
                    $.each(data,function(key,val){
                        var html ='<li>';
                        html+='<a class="elem" href="/'+val.img+'" data-lightbox="example-set">';
                        html+='<p class="y_img"><img src="/'+val.img+'" alt=""></p>';
                        if (val.title == 'null') {
                        	html+='<p class="y_title"></p>';
                    	}else{
                        	html+='<p class="y_title">'+val.title+'</p>';
                    	}
                        html+='</a>';
                        html+='</li>';
                        echodataUl.append(html);
                    })
                })
				// yee.post('/house/albumlist',{album_id:post_id,hid:post_hid,csrf_token_f:csrfToken},function(data){
				//     echodataUl.html('');
				//     var data=data.data;
				//     // console.log(data);
				//     $.each(data,function(key,val){
                 //        var html ='<li>';
                 //        html+='<a class="elem" href="'+val.img+'">';
                 //        html+='<p class="y_img"><img src="'+val.img+'" alt=""></p>';
                 //        html+='<p class="y_title">'+val.title+'</p>';
                 //        html+='</a>';
                 //        html+='</li>';
                 //        echodataUl.append(html);
				// 	})
				// },function(data){
                //
				// })
			}else{
				$(this).parent().siblings('ul.y_tuku_ul_tu').css({'height':'auto','overflow':'hidden'});
			};


		});
		$(this).find('.y_lptk_none a').click(function(){
			$(this).parent().hide();
			$(this).parent().siblings('.y_lptk_show').show();
			$(this).parent().siblings('ul.y_tuku_ul_tu').css({'height':'310px','overflow':'hidden'});
		})
	};
});




$("#y_tuku_nav1").scrollFix({
    distanceTop:$(".y_tuku_nav").outerHeight()-290,
    endPos: '.y_bottom_h',
    zIndex: 10
})
});

//$(document).ready(function(e) {
//	lc_lightbox('.elem', {
//		wrap_class: 'lcl_fade_oc',
//		thumb_attr: 'data-lcl-thumb', 
//		skin: 'minimal',
//		radius: 0,
//		padding	: 0,
//		border_w: 0,
//	});	
//
//});
