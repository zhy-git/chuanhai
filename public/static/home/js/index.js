var index=({
	init:function(){
		this.bind();
	},
	bind:function(){
		var _this=this;
		/*懒加载图片*/
		$("img.lazy").lazyload({effect: "fadeIn",skip_invisible : false});

		/*sideMenu 效果*/
		$("ul.side-menu > li").each(function(index){
			common.bindHoverEvent($(this),"active");
			//$(this).find(".detail-box").css("top","-"+index*60+"px");
		});
		/*banner slide效果*/
		_this.bannerSlide();
		/*img mask效果*/
		$(".houses-img li .awrap").each(function(){
			$(this).find(".mask").length>0&&common.bindHoverEvent($(this),"hover");
		});
		/*热门搜索换一换*/
		_this.changeHotlabs();
		/*新房地区切换*/
		_this.newHouseEffect();
		//横向滚动的楼盘图
		_this.commonScrollSlide();
		/*资讯区域*/
		_this.newsPartEffect();
		/*楼市图文切换卡修改*/
		$("div.img-text-box li").each(function(){
			common.bindHoverEvent($(this),"active",true);
		});
		/*生成房价折线图*/
		/*问答列表模拟滚动效果*/
		//$("#scroll-list").perfectScrollbar();
	},
	changeLab:function(obj){
		obj.css("display")=="none"?obj.css("display","block"):obj.css("display","none");
	},
	bannerSlide:function(){
		/*全屏banner则重新定位左右切换按钮*/
		if($("div.full-banner-box").length>0){
			var winw=$(window).width();
			$("div.full-banner-box").find("a.prev").css("left",(.5*winw-375)+"px").end().find("a.next").css("right",(.5*winw-595)+"px");
		}
		$("#bannerSlider").slide({
			mainCell:".slidecon ul",
			autoPlay:true,
			interTime: 4000,
			effect:"left",
			autoPage:true,
			titCell:".slide-controls",
			switchLoad:"data-original"
		});
		/*改变窗口大小强制刷新*/
		$(window).on("resize",function(){
		//	window.location.reload();
		});
	},
	changeHotlabs:function(){
		var $hotsearch=$("div.hot-search"),that=this;
		$hotsearch.find(".refresh").click(function() {
			$hotsearch.find(".tablabs").each(function(){
				that.changeLab($(this));
			});
		});
	},
	newHouseEffect:function(){
		var $box=$("div.new-houses .imgs-section");
		var len=$box.find(".xfslide").length;
		/*图片切换*/
		$box.find(".xfslide").slide({
			mainCell:".inbox",
			effect:"left",
			autoPlay:false,
			prevCell:".turn-btn.prev",
			nextCell:".turn-btn.next",
			startFun:function( i, c, slider, titCell, mainCell, targetCell, prevCell, nextCell){
				len--;
				if(len<0){
					mainCell.find("ul").eq(i).find("img").each(function(){
						if(!$(this).data("original")) return;
						$(this).attr("src",$(this).data("original")).removeAttr("data-original");
					});
				}
			}
		});
		/*区域切换*/
		$box.slide({
			titCell:".tabnav li",
			mainCell:".tabwrap",
			titOnClassName:"active",
			prevCell:".blank",
			nextCell:".blank",
			startFun:function(i,c){
				var $box=$("div.xfslide").eq(i);
				$box.find("ul:first img").each(function(){
					if(!$(this).data("original")) return;
					$(this).attr("src",$(this).attr("data-original")).removeAttr("data-original");
				});
			}
		});
		/*楼盘动态*/
		$("#lp-dynamic").slide({
			mainCell:".dtslidecon ul",
			autoPlay:false,
			effect:"left",
			autoPage:true,
			titCell:".slide-controls",
			switchLoad:"data-original"
		});
	},
	commonScrollSlide:function(){
		//横向滚动的楼盘图调用此方法
		$("div.imgscrollbox").slide({
			mainCell:".scr-slidecon ul",
			autoPlay:false,
			effect:"left",
			autoPage:true,
			titCell:".slide-controls",
			vis:4,
			scroll:4,
			switchLoad:"data-original"
		});
	},
	newsPartEffect:function(){
		$("#lsimgscroll").slide({
			mainCell:".slidecon ul",
			autoPlay:false,
			effect:"left",
			autoPage:true,
			titCell:".slide-controls",
			switchLoad:"data-original"
		});
	}
}).init();

