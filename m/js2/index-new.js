/**
 * Created by DL on 2016/12/13.
 */
var findItem = $(".find-item");
findItem.each(function() {
	var that = $(this);
	var open = that.find(".open");
	var icoOpen = open.find(".ico-down");
	open.on("click", function() {
		if (!icoOpen.hasClass("rotate")) {
			that.css({
				height: "auto"
			});
		} else {
			that.removeAttr("style");
		}
		icoOpen.toggleClass("rotate");
	})
});

function adjust() {
	var ua = navigator.userAgent.toLowerCase();
	if (/android/.test(ua)) {
		$("html").attr("data-type", 1);
	} else if (/ios/.test(ua)) {
		$("html").attr("data-type", 2);
	}
}

//单行文字滚动
function AutoScroll(obj){
    $(obj).find("ul:first").animate({
        marginTop:"-.85rem"
    },2000,function(){
        $(this).css({marginTop:"0"}).find("li:first").appendTo(this);
        setTimeout('AutoScroll(".scrollDiv")',2000)
    });
}
$(function () {
    // 判断一张的的时候不调用函数
    var $scr_Li = $('.scrollDiv').find("li");
    if($scr_Li.length != 1){
        setTimeout('AutoScroll(".scrollDiv")',2000);
    }
    adjust();
});
$(document).on("click", ".close-layer a, .btn-cancel", function() {
	var layer = $(this).parents(".ly-fade");
	layer.removeClass("ly-fade-show");
});

function helpFindHouse() {
	mobileAppInstall.openAppCallback($("#help_find_house_appurl").val(), function() {
		window.location.href = $("#help_find_house_appurl").attr("data-value");
	});
}