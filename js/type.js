// 楼盘首页  户型 ajax
$(function(){
    $('.y_right li').eq(0).click();
})


/*楼盘首页-楼盘户型*/
$('.y_right li').click(function(){
	//alert(111);
    $(this).addClass('on').siblings().removeClass('on');
    var type_id = $(this).attr('name');
    var hid = $(this).attr('hid');
    $.post('/loupan/ajax.do',{hid:hid,type_id:type_id,fl:1},function(data){
		data=jQuery.parseJSON(data);
		//console.log(data);
		var echodataUl = $('.y_lphx_list ul');
		echodataUl.html('');
		//if(data.code == '200'){
		//	echodataUl.html(data.msg);
		//	}
		//alert(data);
        var data = data.data;
        var html = '';
        $.each(data,function(key,val){
            html ='<li>';
            html+='<a href="/'+val.img+'" i="/'+val.img+'" class="One" data-lightbox="example-set">';
            html+='<div class="y_tu">';
            html+='<p class="img"><img src="/'+val.img+'" alt=""></p>';
            html+='<p class="huxin">'+val.title+'</p>';
            html+='</div>';
            html+='<div class="y_text">';
            html+='<p class="hujs">'+val.indoor_info+'</p>';
            html+='<p class="hujm">(建筑面积) '+val.area+'㎡</p>';
            html+='</div>';
            html+='</a>';
            html+='</li>';
			
            echodataUl.append(html);
        })
        $('.One').simpleSlide();
    })
});





