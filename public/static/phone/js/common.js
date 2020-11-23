/*滑动显示影藏顶部栏*/
(function(obj){
	var startY = 0,diffY = 0,$lan=$(".topnav"),_h=$lan.height(),_top;
	
	//增加了一个空元素，使过顶部栏隐藏/显示更平滑
	var topnavEmpty = $("<div id='topnavEmpty' style='display:none;'></div>").height(_h);
	$lan.before(topnavEmpty)
	var topPop = $(".top-pop");
	
	obj.addEventListener('touchstart',function(e){
		startY = e.targetTouches[0].pageY;
	},false);
	obj.addEventListener('touchmove',function(e){
		diffY = e.targetTouches[0].pageY - startY;
		_top=document.body.scrollTop;
		if(_top<=_h){
			$lan.removeClass("fix-backlan");
			topnavEmpty.hide();
			topPop.show();
		}else{
			if(diffY>0){
				$lan.addClass("fix-backlan");
				topnavEmpty.show();
				topPop.hide();
			}else{
				$lan.removeClass("fix-backlan");
				topnavEmpty.hide();
				topPop.show();
			}
		}
		if($(".backtop").length>0){
			$(".backtop")[0].style.display=_top > 300 ? "block" : "none";
		}
	},false);
	obj.addEventListener('touchend',function(e){
		obj.removeEventListener('touchmove', this, false);
		obj.removeEventListener('touchend', this, false);
		if($(".backtop").length>0){
			$(".backtop")[0].style.display=_top > 300 ? "block" : "none";
		}
	},false);
})(window);

$(function(){
	/*底部栏‘更多’按钮*/
	if($("#moreItems").length>0){
		$("#moreItems").on("click",function(){
			if($(this).data("fold")=="1"){
				$(this).data("fold","0");
				$(this).addClass("curr").siblings("a").removeClass("curr");
				$(".fix-bot-bar").find(".more").css("display","block");
				$(".mask").css("display","block");
				swiper.update();
			}else{
				$(this).data("fold","1");
				$(this).removeClass("curr");
				//$(".fix-bot-bar a").eq(2).addClass("curr")
				$(".fix-bot-bar").find(".more").css("display","none");
				$(".mask").css("display","none");
			}
			
		});
		$(".mask").on("click",function(){
			if($(".fix-bot-bar .more").css("display")=="block"){
				$("#moreItems").trigger("click");
			}
		});

		var swiper = new Swiper('.swiper-container.more', {
	        pagination: '.swiper-pagination',
	        paginationClickable: true
	    });
    }

    /*输入框效果处理*/
    if($("input[data-eraser]").length>0){
		$("input[data-eraser]").on("input",function(){
			var $pobj=$(this).parent();
			if(!!$(this).val()){
				//添加×
				if($pobj.find(".txt-clean-icon").length>0) return;
				$pobj.append("<i class='txt-clean-icon'></i>");
			}else{
				//去掉×
				$pobj.find(".txt-clean-icon").remove();
			}
		});
		$("body").on("click",".txt-clean-icon",function(){
			$(this).parent().find("input[type='text'],input[type='password']").val('');
			$(this).remove();
		});
	}



	/*返回头部*/
	/*暂不启用*/
	/*var bh=$(".pagewrap").height(),
		winh=window.screen.availHeight;
	if(bh>winh){
		$("body").append("<a href='javascript:;' class='backtop'></a>");
		if(document.body.scrollTop>300){$(".backtop")[0].style.display="block";}

		$("body").on("click",".backtop",function(e){
			$("body").scrollTop(0);
			$(".backtop")[0].style.display="none";
			e.preventDefault();
		});
	}*/

    //保存来源到cookie
    var _hmsr = getApplySource();
    if(_hmsr) {
    	document.cookie = "_hmsr=" + _hmsr + "; path=/;";
    }
    
});



/*信息提示框,调用方式如：poptip("修改成功");*/
var poptip=function(txt){
	var html='<div class="poptips"><p>'+txt+'</p></div>';
	$("body").append(html);
	setTimeout(function(){
		$(".poptips").remove();
	},3000);
}

var popup={
	/*带有2个参数，分别为提示文本、延迟关闭（默认为3秒）*/
	tip:function(msg,delay){
		var delay=delay||3000;
		var html='<div class="pop-wrap pop-tip">'+
					'<div class="pop-box">'+
						'<div class="pop-content">'+
							'<p>'+msg+'</p>'+
						'</div>'+
					'</div>'+
				  '</div>';
		$("body").append(html);
		setTimeout(function(){$('.pop-wrap').remove();},delay);
	},
	dialog:function(content){
		var html='<div class="pop-wrap">'+
					'<div class="mask" style="display:block"></div>'+
					'<div class="pop-box" style="top:30%;">'+
						'<div class="pop-content">'+content+
						'</div>'+
					'</div>'+
				  '</div>';
		$("body").append(html);
	},close:function(){
		$('.pop-wrap').remove();
	}
};

/**
 * 返回上一页
 * 1、如果页面中有定义backUrl，则返回backUrl
 * 2、如果上一个页面为jiwu的页面，则返回上一页
 * 3、如果上一个页面不为jiwu的页面，则返回主页
 */
function mback() {
	//可以在页面中定义中backUrl
	if(window.backUrl) {
		window.location.href = backUrl;
		return;
	}
	
	var referer = document.referrer
	if(referer && /\.lou86\.com/.test(referer)) {
		history.go(-1)
	}else {
		window.location.href = "http://m.lou86.com";
	}
}

var getPixelRatio = function(context) {
	var backingStore = context.backingStorePixelRatio ||
		context.webkitBackingStorePixelRatio ||
    	context.mozBackingStorePixelRatio ||
    	context.msBackingStorePixelRatio ||
    	context.oBackingStorePixelRatio ||
    	context.backingStorePixelRatio || 1;
	return (window.devicePixelRatio || 1) / backingStore;
};

/**
 * 图片处理
 */
var imgCanvas=function(obj,img,boxW){
	var cav=document.createElement("canvas"),context=cav.getContext("2d");
	var scaleBy = getPixelRatio(context);
	boxW=boxW*scaleBy;
	cav.width=boxW,cav.height=boxW;
	var w=img.width,h=img.height;
	if(w==h){
		context.drawImage(img,0,0,boxW,boxW);
	}else if(w>h){
		var pos=(w-h)/2;
		context.drawImage(img,pos,0,h,h,0,0,boxW,boxW);
	}else{
		context.drawImage(img,0,0,w,w,0,0,boxW,boxW);
	}

	$(obj).prepend($(cav));
}

/**
 * 处理页面图片，用canvas铺满显示图片
 */
function handleImgCanvas() {
	//图片处理
	$("[data-img]").each(function(){
		var _this=this,boxw=$(this).width();
		var img=new Image();
		img.src=$(this).data("img");
		if(img.complete){
			imgCanvas(_this,img,boxw);
		}else{
			img.onload=function(){
				imgCanvas(_this,img,boxw);
			}
		}
	});
}

//商户百度统计
(function(w) {
	var city = location.href.match(/m\.jiwu\.com\/(\w+)/);
	if(city != null) {
		city = city[1];
	}
	var _hmt = _hmt || [];
	if(city == "hn") {
		(function() {
		  var hm = document.createElement("script");
		  hm.src = "https://hm.baidu.com/hm.js?37e9058f521b9f0c6d64f6805689afa5";
		  var s = document.getElementsByTagName("script")[0]; 
		  s.parentNode.insertBefore(hm, s);
		})();
	}else if(city == "xa") {
		(function() {
		  var hm = document.createElement("script");
		  hm.src = "https://hm.baidu.com/hm.js?ac9c865356acc29dce3b3b4505d34107";
		  var s = document.getElementsByTagName("script")[0]; 
		  s.parentNode.insertBefore(hm, s);
		})();
	}else if(city == "handan") {
		(function() {
		  var hm = document.createElement("script");
		  hm.src = "https://hm.baidu.com/hm.js?37b72d5054b6bcf848516a49590ccf0f";
		  var s = document.getElementsByTagName("script")[0]; 
		  s.parentNode.insertBefore(hm, s);
		})();
	}else if(city == "hk") {
		(function() {
		  var hm = document.createElement("script");
		  hm.src = "https://hm.baidu.com/hm.js?55a2b14d9ad6ec3e8f4308d63a21d2e1";
		  var s = document.getElementsByTagName("script")[0]; 
		  s.parentNode.insertBefore(hm, s);
		})();
	}else if(city == "tj") {
		(function() {
		  var hm = document.createElement("script");
		  hm.src = "https://hm.baidu.com/hm.js?9ad01c5073dc926c1a8baa58ea364697";
		  var s = document.getElementsByTagName("script")[0]; 
		  s.parentNode.insertBefore(hm, s);
		})();
	}else if(city == "foshan") {
		(function() {
			  var hm = document.createElement("script");
			  hm.src = "https://hm.baidu.com/hm.js?b77952b8d3122180e7c4231f22a9f3f2";
			  var s = document.getElementsByTagName("script")[0]; 
			  s.parentNode.insertBefore(hm, s);
			})();
		}	
})(window);


//显示验证码
function showCheckCode(id, sucFunc) {
	$("#checkCodeDialog").remove();
	$("body").append(
		'<div id="checkCodeDialog">' + 
			'<div id="mask" onclick="$(this).parent().remove()" style="position: fixed; text-align: center; left: 0; top: 0; width: 100%; height: 100%; background: url(http://images.jiwu.com/images/v4.0/black.png); overflow: auto; z-index: 99999;"></div>' + 
			'<div id="popup-captcha-mobile" style="position: fixed; left: 50%; top: 50%; margin: -108px 0 0 -130px; z-index: 100000; height: 216px; overflow: hidden;"></div>' + 
		'</div>'
	);
	
	var handlerEmbed = function (captchaObj) {
        captchaObj.appendTo("#popup-captcha-mobile");
        captchaObj.onSuccess(function () {
            var validate = captchaObj.getValidate();
            if(sucFunc) {
                sucFunc(validate);
            }
            $("#checkCodeDialog").remove();
        });
    };
    
    $.ajax({
        // 获取id，challenge，success（是否启用failback）
        url: "http://" + location.hostname + "/user!startCaptcha.action?t=" + (new Date()).getTime(), // 加随机数防止缓存
        type: "get",
        dataType: "json",
        success: function (data) {
            // 使用initGeetest接口
            // 参数1：配置参数
            // 参数2：回调，回调的第一个参数验证码对象，之后可以使用它做appendTo之类的事件
            initGeetest({
                gt: data.gt,
                challenge: data.challenge,
                product: "embed", // 产品形式，包括：float，embed，popup。注意只对PC版验证码有效
                offline: !data.success // 表示用户后台检测极验服务器是否宕机，一般不需要关注
                // 更多配置参数请参见：http://www.geetest.com/install/sections/idx-client-sdk.html#config
            }, handlerEmbed);
        }
    });
}

/**
 * 获得报名来源
 */
function getApplySource() {
	var ref = window.location.href;
	var source = "";
	var result = ref.match("hmsr=([^&]+)");
	if(result) {
		source = result[1];
	}
	return source;
}

//通过社交分享出去的页面，屏蔽百度联盟广告
$(function() {
	if(window.location.href.indexOf("?") != -1) {
		$("script[src='http://cpro.baidustatic.com/cpro/ui/cm.js']").next().has("iframe").remove();
	}
});

//筛选项目中的条件点击事件 规则：相同类别不多选，不同类别间可多选
$('.query-mnore').children('.query-panel').find('li').click(function(){
	$(this).siblings('li').removeClass('on');
	$(this).addClass('on');
	$(this).parent('ul.con').parent('.mod3').children('.tit').children('.fcB').html($(this).children('a').html());
});
