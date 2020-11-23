/**

 * 生成搜索框下拉列表

 * @param  {[type]} type [获取数据方式,默认为0:通过post方式，如果设置为1，则通过过滤静态数据获取]

 * @param  {[type]} url [请求数据地址,type为0时必填] 返回的数据格式形如：data=[{"lpname":"万科大厦","count":"25套"},{"lpname":"碧桂园","count":"62套"}];

 * @param  {[type]} param [请求数据所传参数]

 * @param  {[type]} filterDataFunc [自定义过滤数据方法,type为1时必填]

 * @param  {[type]} top [搜索列表距上的像素]

 * @param  {[type]} left [搜索列表距左的像素]

 * @param  {[type]} clsName [搜索列表的样式名]

 * @param  {Function} callback [选中列表项后的回调]

*/

;(function($){

	$.fn.creatSearchList=function(options){

		var defaults={

			type:0,

			url:"",

			param:{},

			filterDataFunc:null,

			top:34,

			left:0,

			clsName:'search-list-box',

			callback:null

		};

		options=$.extend(defaults,options);

		return this.each(function(){

			var _self=$(this),

				$inp=_self.children("input[type='text']");

			$inp.keyup(function() {

				options.type==0 && $.post(options.url,options.param,function(data){

					var list='';

					for(var i in data){

						var countStr=!!data[i].count?'<em class="count">'+data[i].count+'</em>':'';

						list+='<span><em class="text">'+data[i].lpname+'</em>'+countStr+'</span>';

					}

					if(_self.children(".search-list-box").length>0){

						_self.children(".search-list-box").empty().append(list).css("display","block");

					}else{

						_self.append('<div class="search-list-box" style="position:absolute;left:'+options.left+'px;top:'+options.top+'px;display:block;">'+list+'</div>');

					}

					_self.css("position","relative");

				});



				if(options.type==1) {

					var list=options.filterDataFunc($inp.val());

					if(_self.children(".search-list-box").length>0){

						_self.children(".search-list-box").empty().append(list).css("display","block");

					}else{

						_self.append('<div class="search-list-box" style="position:absolute;left:'+options.left+'px;top:'+options.top+'px;display:block;">'+list+'</div>');

					}

					_self.css("position","relative");

				}	

				//options.type==1 && eval(options.filterDataFunc(_self));

			});

			_self.on("click", ".search-list-box > span", function(event) {

				var val=$(this).children(".text").text();

				$inp.val(val);

				$(this).parent(".search-list-box").css("display","none");

				if(!!options.callback) options.callback($(this));

			});

			$(document).delegate("body", "click", function(e) {

		    	if(!_self.is(e.target) && _self.has(e.target).length === 0){

		        	_self.find(".search-list-box").css("display","none");

		    	}

			});

		});

	}

})(jQuery);



/**

* 

* 说明：参数为父层dom节点的jq对象，必须要设置图片链接地址data-jjr

*/

var common=(function(){

	var _sy={};

	_sy.bind=function(){

		if($("div.navigator-bar").length>0){

			/*公共导航菜单*/

			this.navMenuFunc();

			/*顶部搜索*/

			this.topSearch();

		}

	};

	_sy.navMenuFunc=function(){

		//console.log("navigator start!");

		var curInd=$(".nav-menu li.active").length>0?$(".nav-menu li.active").index():0;

		var itemInd=-1;

		$(".nav-menu li").hover(function() {

			var index=$(this).index();

			if(index==0||$(this).hasClass("zygj-li")) return;

			$(this).addClass("active").siblings("li").removeClass("active");

			if($(this).attr("id")=='zygj') {

				return;

			}

			$(".menu-list-box").find(".item-box").eq(index-1).css("display","block").siblings().css("display","none");

			$(".menu-list-box").show();

			itemInd=index-1;

		}, function() {

			$(".menu-list-box").hide();

			$(".nav-menu li").eq(curInd).addClass("active").siblings("li").removeClass("active");

		});

		$(".menu-list-box").hover(function() {

			$(this).show();

			$(".nav-menu li").eq(itemInd+1).addClass("active").siblings("li").removeClass("active");

		}, function() {

			$(this).hide();

			$(".nav-menu li").eq(curInd).addClass("active").siblings("li").removeClass("active");

		});

	};

	_sy.topSearch=function(){

		$(".sel-val").click(function(){

			if($(".top-right .sel-list").css("display")=="none"){

				$(".top-right .sel-list").css("display","block");

			}else{

				$(".top-right .sel-list").css("display","none");

			}

		});

		$(".top-right .sel-list").on("click","a",function(){

			var oldVal=$(".sel-val .state").text();

			var curVal=$(this).text();

			$(".sel-val .state").text(curVal);

			$(this).remove();

			if(oldVal=='新房'){

				$(".top-right .sel-list").prepend("<a href='javascript:;' chooseurl='loupan' >"+oldVal+"</a>").css("display","none");

			}else{

				$(".top-right .sel-list").prepend("<a href='javascript:;' chooseurl='esf' >"+oldVal+"</a>").css("display","none");

			}

			var url = $(this).attr("chooseurl");

			$("#choosediv").attr("chooseurl",url);

		});

		$(".search-box .search-inp").keyup(function() {

			if($(".search-list span").length > 0){

				$(this).siblings(".search-list").css("display","block");

			}else{

				 $(".search-list").css("display","none");	

			}

			if($(".top-right .sel-list").css("display")=="block") $(".top-right .sel-list").css("display","none");

		});

		$(".search-list").on("click","span",function(){

			$(this).parent().siblings(".search-inp").val($(this).text()).end().css("display","none");

		});

	};

	_sy.bodyClickFunc=function(){

		$(document).delegate("body", "click", function(e) {

	    	var _con = $(".search-box");

	    	if(!_con.is(e.target) && _con.has(e.target).length === 0){

	        	$(".search-list").css("display","none");

	    	}

		});

	};

	_sy.footFunc=function(){

		//console.log("footer start!");

		$("#cur-year").text(new Date().getFullYear());

		var _this=this,ind=0;

		$("div.footer-v5 .linkrow").each(function(){

			$(this).click(function(){

				_this.changeClass($(this),"on");

			});

		});

		$("div.szdh-item > .szdh-list li").hover(function() {

			$(this).addClass("on");

			ind=$(this).index();

			$(this).closest(".szdh-item").children(".szdh-detail").css("display","block").children("ul:eq("+ind+")").css("display","block").siblings().css("display","none");

		}, function() {

			$(this).removeClass("on");

			$(this).closest(".szdh-item").children(".szdh-detail").css("display","none")

		});

		$(".szdh-detail").hover(function() {

			$(this).show();

			$(this).siblings("ul").find("li:eq("+ind+")").addClass("on");

		}, function() {

			$(this).hide();

			$(this).siblings("ul").find("li:eq("+ind+")").removeClass("on");

		});

	};

	_sy.changeClass=function(obj,cls){

		obj.hasClass(cls)?obj.removeClass(cls):obj.addClass(cls);

	};

	_sy.repositoryCard=function(){

		$("div.zskcfiv").delegate(".zskmore", "click", function(event) {

			var $obj=$(this).closest(".zskfivpo");

			if($obj.hasClass("zsksec")){

				$obj.removeClass("zsksec");

				$(this).html("展开&nbsp;&or;");

			}else{

				$obj.siblings(".zskfivpo").each(function(){

					resetState($(this),"zsksec");

				});

				$obj.addClass("zsksec");

				$(this).html("收起&nbsp;&and;");

			}

		});

		var resetState=function(obj,cls){

			if(obj.hasClass(cls)){

				obj.removeClass(cls);

				obj.find(".zskmore").html("展开&nbsp;&or;");

			}

		}

	};

	_sy.activitypop=function(){

		$("#float-close").bind("click",function(){

			$(this).closest(".bot-float-520").animate({"left": "-100%"},200, function() {

				$(".bot-float-slide").css({"visibility":"visible","left":"0px"});

				$(".bot-float-520").css({"visibility":"hidden"});

			});

			return false;

	    });

		$(".bot-float-slide").bind("click",function(){

		    $(".bot-float-slide").css({"visibility":"hidden","left":"-150px"});

		    $(".bot-float-520").css({"visibility":"visible"});

		    $(".bot-float-520").animate({"left": "0"},200);

	    });

	};

	_sy.fixRightFunc=function(){

		var that=this;

		$("ul.sidebar-wrap li").each(function(i){

		bindHoverEvent($(this),"on");

			if(i==0&&$(this).find(".gj-list").find("a.jjr-wrap").length==1){

				$(this).addClass("lenone");

			}

		});

		/*$("div.hot-jjr").hover(function(event) {

			event.stopPropagation();

		},function(event){

			var tar=$(event.relatedTarget);

			tar.is("a.a-cell")&&tar.closest("li").addClass("on");

		});*/

	};

	_sy.onlineTalkFunc=function(){

		var that=this;

		$("#consult-gj").click(function() {

			alert("调用聊天接口！");

		});

	};

	var bindHoverEvent=function(obj,cls){

		/*第三个参数为true时，执行mouseover方法，否则执行hover方法*/

		if(!!arguments[2]){

			obj.mouseover(function() {

				$(this).addClass(cls).siblings().removeClass(cls);

			});

		}else{

			obj.hover(function() {

				$(this).addClass(cls);

			}, function() {

				$(this).removeClass(cls);

			});

		}

	};

	var jjrImgScale=function(obj){

		var boxW=obj.width(),boxH=obj.height();

		var img=new Image();

		img.src=obj.data("jjr");

		if(canvasSupport()){

			if(img.complete){

				imgCanvas(img,obj,boxW,boxH);

			}else{

				img.onload=function(){

					imgCanvas(img,obj,boxW,boxH);

				}

			}

		}else{

			obj.css("overflow","hidden");

			if(img.complete){

				imgCreate(img,obj,boxW,boxH);

			}else{

				img.onload=function(){

					imgCreate(img,obj,boxW,boxH);

				}

			}

		}



		function imgCanvas(img,$this,boxW,boxH){

			var canvas=document.createElement("canvas"),

			context=canvas.getContext("2d");

			canvas.width=boxW;

			canvas.height=boxH;

			var ratio=boxW/boxH;

			var w=img.width,h=img.height;

			if(w/h>ratio){

				context.drawImage(img,(w-h*ratio)/2,0,h*ratio,h,0,0,boxW,boxH);

			}else if(w/h<ratio){

				context.drawImage(img,0,0,w,w/ratio,0,0,boxW,boxH);

			}else{

				context.drawImage(img,0,0,boxW,boxH);

			}

			$this.prepend($(canvas));

		}



		function imgCreate(img,$this,boxW,boxH){

			var w=img.width,h=img.height;

			var ratio=boxW/boxH;

			if(w/h>ratio){

				img.height=boxH;

				img.width=w*boxH/h;

				img.style.marginLeft=-(img.width-boxH*ratio)/2+"px";

			}else if(w/h<ratio){

				img.width=boxW;

				img.height=h*boxW/w;

			}else{

				img.width=boxW;

				img.height=boxH;

			}

			$this.prepend($(img));

		}

	};

	var canvasSupport=function(){

		return !!document.createElement("canvas").getContext;

	};

	var backTop=function(obj){

		obj.click(function() {

			$("html , body").animate({

	            scrollTop: 0

	        }, 1000)

		});

	};

	/**

	 * 点击空白区域关闭

	 * @param  {[type]} $tarobj   [点击作用区域]

	 * @param  {[type]} $closeobj [关闭区域]

	 */

	var bodyClickFunc=function($tarobj,$closeobj){

		$(document).delegate("body", "click", function(e) {

	    	if(!$tarobj.is(e.target) && $tarobj.has(e.target).length === 0){

	        	$closeobj.css("display","none");

	    	}

		});

	};

	_sy.bind();

	return {

		bindHoverEvent:bindHoverEvent,

		jwphotoClip:jjrImgScale,

		backTop:backTop,

		bodyClickFunc:bodyClickFunc

	}

})();



//验证码

function refreshVerify() {

    var ts = Date.parse(new Date())/1000;

    var img = document.getElementById('verify_img');

    img.src = "/captcha?id="+ts;

}

//问答

$(function(){
      $("#inputasktitle,#advcontent").keyup(function(){		      	
		      var len = $(this).val().length;
		      if(len > 50){
		        $(this).val($(this).val().substring(0,50));        
		        layer.msg('最多只能输入50个汉字', {icon: 5});					        
		        return false;
		      }
		      var num =len;
		       k=50-num;
		       $("#event_ask_remainder").text(k);
	  });	
	window.onload = function() {

    	$.post("/api/mfcount", { "func": "getNameAndTime" },

		   function(data){

		   	var count=data.count;

		   	$('#mfcount').html(count)

		   	}, "json");

		}			  

});