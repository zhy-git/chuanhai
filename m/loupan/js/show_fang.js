"use strict";
function _classCallCheck(i, e) {
	if (! (i instanceof e)) throw new TypeError("Cannot call a class as a function")
}
var _createClass = function() {
	function i(i, e) {
		for (var t = 0; t < e.length; t++) {
			var n = e[t];
			n.enumerable = n.enumerable || !1,
			n.configurable = !0,
			"value" in n && (n.writable = !0),
			Object.defineProperty(i, n.key, n)
		}
	}
	return function(e, t, n) {
		return t && i(e.prototype, t),
		n && i(e, n),
		e
	}
} (); !
function() {
	function i() {
		var i = $("#countdown").data("time");
		i && $("#countdown").countdown(i).on("update.countdown",
		function(i) {
			$(this).html(i.strftime("%H:%M:%S"))
		}).on("finish.countdown",
		function() {
			$(".house-discounts-countdown").html("活动结束")
		})
	}
	var e = $("#houseInfo").data("info"),
	t = ["公交", "教育", "购物", "医院", "生活"]; ("string" == typeof e || "String" == typeof e) && (e = JSON.parse(e)),
	$(function() {
		new hoverNavShow("#scrollNav", {
			changePoint: $("#topSwiper").height(),
			showClass: "show",
			initAfterFn: function() {
				var i = this,
				e = $(".--scroll-view"),
				t = 20 / 37.5 * ($(window).width() / 10),
				n = 1.2 * ($(window).width() / 10);
				this.scrollView = [0];
				for (var s = 0; s < e.length; s++) {
					var o = $(e[s]),
					a = o.offset().top,
					l = parseInt(o.css("padding-top").replace("px", "")),
					r = a - (n - l) - t;
					this.scrollView.push(parseInt(r))
				}
				$("#scrollNav li").on("click",
				function() {
					if (!i.lock) {
						$(this).addClass("active").siblings().removeClass("active");
						var e = $(this).index();
						i.lock = !0,
						0 == e ? $("html,body").animate({
							scrollTop: 0
						},
						400) : $("html,body").animate({
							scrollTop: i.scrollView[e] + "px"
						},
						400),
						setTimeout(function() {
							i.lock = !1
						},
						500)
					}
				})
			},
			scrollIngFn: function(i) {
				this.lock || (i > this.scrollView[4] - 50 ? $("#scrollNav li").eq(4).addClass("active").siblings().removeClass("active") : i > this.scrollView[3] - 50 ? $("#scrollNav li").eq(3).addClass("active").siblings().removeClass("active") : i > this.scrollView[2] - 50 ? $("#scrollNav li").eq(2).addClass("active").siblings().removeClass("active") : i > this.scrollView[1] - 50 ? $("#scrollNav li").eq(1).addClass("active").siblings().removeClass("active") : i > 0 && $("#scrollNav li").eq(0).addClass("active").siblings().removeClass("active"))
			}
		}),
		i(); {
			var a = new Swiper("#houseTypeList", {
				freeMode: !0,
				slidesPerView: "auto"
			}),
			l = new Swiper("#houseTypeShow", {
				freeMode: !0,
				slidesPerView: "auto"
			});
			new Swiper("#topSwiper", {
				observer: !0,
				observeParents: !0,
				on: {
					slideChangeTransitionEnd: function() {
						$("#imgNum .change").text(this.activeIndex + 1)
					}
				}
			}),
			new Swiper("#specialHouse", {
				freeMode: !0,
				slidesPerView: "auto"
			})
		}
		new itemChangePublic("#houseTypeList li", "#houseTypeShow li", {
			callback: function(i) {
				a.slideTo(0 == i ? 0 : i - 1),
				l.updateSlides(),
				l.slideTo(0, 0)
			}
		}); {
			var r = window.dialog || new fkwDialog,
			u = window.popUp || new FkwPopUp(r),
			c = window.audioShow || new n({
				TimeOutCallback: function() {
					u.show({
						title: "语音讲房",
						text: "联系我们，为您提供更多的楼盘信息",
						loupanid: e.loupanid,
						loupan: e.name,
						typeid: 14
					},
					"提交成功，将为您继续播放语音讲房", {
						confirmAfter: function() {
							c.setFree()
						}
					})
				}
			}),
			h = window.houseVideo || new o({
				TimeOutCallback: function() {
					h.hide(function() {
						u.show({
							title: "视频看房",
							text: "联系我们，为您提供更多楼盘视频",
							loupanid: e.loupanid,
							loupan: e.name,
							typeid: 9,
							catid:33
						},
						"提交成功，将为您继续播放", {
							confirmAfter: function() {
								h.setFree()
							}
						})
					})
				}
			});
			new s({
				houseName: e.name || "暂无",
				houseAddr: e.addr || "暂无",
				typeList: t
			})
		}
		try {
			setTimeout(function() {
				if (window.navigator.userAgent.toLowerCase().indexOf("ucbrowser") > -1) for (var i = $("#scrollView_3 li a"), e = 0; e < i.length; e++) $(i[e]).attr("href").indexOf("uc.cn") > -1 && $(i[e]).remove()
			},
			0)
		} catch(d) {}
	});
	var n = function() {
		function i(e) {
			_classCallCheck(this, i),
			e = arguments[0] || {},
			this._btn = "#audioShowPlay",
			this._root = "#audioWrapper",
			this._audio = "#audioItem",
			this._close = "#audioClose",
			this.lock = !1,
			this._free = e._free || !1,
			this.countDown = e.countDown || 15,
			this.suspensionTimeOut = e.TimeOutCallback || null,
			this.transitionHideFn = null,
			this.inv_id = null,
			this.init()
		}
		return _createClass(i, [{
			key: "init",
			value: function() {
				var i = this;
				0 != $(this._audio).length && (this._free = this.suspensionTimeOut && !this._free ? !1 : !0, $(this._audio)[0].load(), this.audioWatch(), $(this._btn).on("click",
				function() {
					return i.lock && !i._free ? void(i.suspensionTimeOut && i.suspensionTimeOut()) : void i.show()
				}), $(this._close).on("click",
				function() {
					i.hide()
				}))
			}
		},
		{
			key: "setFree",
			value: function() {
				this._free = !0,
				this.show(),
				$(this._audio)[0].play()
			}
		},
		{
			key: "audioWatch",
			value: function() {
				var i = this;
				this._free || ($(this._audio).on("play",
				function() {
					i.countDownWatch()
				}), $(this._audio).on("canplaythrough",
				function() {
					console.log("音频加载完毕")
				}), $(this._audio).on("loadedmetadata",
				function() {
					if ("" == $("#audioTime").text()) {
						var e = $(i._audio)[0].duration;
						parseInt(e) && $("#audioTime").text(parseInt(e) + '"')
					}
				}), $(this._audio).on("pause",
				function() {
					i.inv_id && clearInterval(i.inv_id)
				}))
			}
		},
		{
			key: "countDownWatch",
			value: function() {
				var i = this;
				if (!this._free) return this.lock ? (this.suspensionTimeOut && this.suspensionTimeOut(), void $(this._audio)[0].pause()) : void(this.inv_id = setInterval(function() {
					i.countDown--,
					i.countDown || (i.lock = !0, $(i._audio)[0].pause(), clearInterval(i.inv_id), i.suspensionTimeOut && i.suspensionTimeOut())
				},
				1e3))
			}
		},
		{
			key: "show",
			value: function() {
				$(this._audio)[0].play(),
				this.transitionHideFn = this.audioTransition()
			}
		},
		{
			key: "hide",
			value: function() {
				var i = this;
				this.transitionHideFn && this.transitionHideFn(function() {
					$(i._audio)[0].pause()
				})
			}
		},
		{
			key: "audioTransition",
			value: function(i) {
				var e = this,
				t = void 0;
				return $(this._root).fadeIn(function() {
					i && i()
				}),
				$(this._root).addClass("fadeInUp animated"),
				t = function(i) {
					$(e._root).addClass("fadeOutDown animated").removeClass("fadeInUp"),
					$(e._root).fadeOut(function() {
						$(e._root).removeClass("fadeOutDown animated").hide(),
						i && i()
					})
				}
			}
		}]),
		i
	} (),
	s = function() {
		function i(e) {
			_classCallCheck(this, i),
			this._swiperWrapper = "#mapItemTypeList",
			this.mapRoot = "#house_map_cover",
			this.mapDesShow = "#mapDesShow",
			this.mapError = e.mapError || null,
			this.houseName = e.houseName,
			this.houseAddr = e.houseAddr,
			this.ptTypeList = e.typeList || [],
			this.center = null,
			this.radius = e.radius || 1e3,
			this.init()
		}
		return _createClass(i, [{
			key: "init",
			value: function() {
				var i = window.BMap || null;
				if (i) {
					var e = $(this.mapRoot).data("point");
					e && (e = e.split(",").map(function(i) {
						return parseFloat(i)
					}), this.map = new i.Map("house_map_cover", {
						minZoom: 12,
						maxZoom: 19,
						enableMapClick: !1
					}), this.map.disableDragging(), this.map.disableDoubleClickZoom(), this.map.disablePinchToZoom(), this.center = new i.Point(e[0], e[1]), this.map.centerAndZoom(this.center, 13), this.map.panBy( - 70, 30), this.setHousePoint(this.center, "house", !0, this.houseName, this.houseAddr), this.map.addOverlay(new i.Circle(this.center, this.radius, {
						strokeWeight: .1,
						strokeOpacity: .1,
						fillOpacity: .2,
						fillColor: "#00a0e4",
						enableMassClear: !1
					})), this.searchPerimeter())
				}
			}
		},
		{
			key: "setHousePoint",
			value: function(i, e, t, n, s, o, a, l) {
				var r = t ? '<div class="label-item ' + e + '-icon">\n                <div class="house-name-cover">\n                <p class="house-name">' + n + '</p>\n                <p class="house-addr">' + s + '</p>\n                <i class="icon iconfont icon-arrow-bottom"></i>\n                </div> \n              </div>': '<div class="label-item ' + e + '-icon" data-num="' + l + '" ' + (a ? 'style="display:block"': "") + ">" + o + "</div>",
				u = $(window).width(),
				c = .32 * ((u > 540 ? 540 : u) / 10),
				h = {
					position: i,
					offset: new BMap.Size( - 1 * c, -1 * c),
					enableMassClear: !t
				},
				d = new BMap.Label(r, h);
				d.setStyle({
					border: "0",
					backgroundColor: "none",
					cursor: "pointer"
				}),
				this.map.addOverlay(d)
			}
		},
		{
			key: "searchPerimeter",
			value: function() {
				var i = this,
				e = {
					onSearchComplete: function(e) {
						t.getStatus() == BMAP_STATUS_SUCCESS ? i.setSearchResult(e) : (i.mapError && i.mapError(), $(".house-map-des .loading").fadeOut(), $("#fkMapError").fadeIn())
					}
				},
				t = new BMap.LocalSearch(this.map, e);
				t.searchNearby(this.ptTypeList || [], this.center, this.radius)
			}
		},
		{
			key: "setSearchResult",
			value: function(i) {
				var e = this,
				t = "",
				n = "";
				if (i && 0 != i.length) {
					for (var s = void 0,
					o = Object.keys(i[0]), a = 0; a < o.length; a++) if (i[0][o[a]] instanceof Array) {
						s = o[a];
						break
					}
					i.forEach(function(i, o) {
						t += '<li  class="swiper-slide ' + (0 == o ? "active": "") + '" data-type="' + (o + 1) + '">' + i.keyword + "(" + i[s].length + ")</li>",
						0 == i[s].length && (n += '<li data-type="' + (o + 1) + '" class="none" style="' + (0 == o ? "display:block": "") + '">十分抱歉，暂无周边信息</li>'),
						i[s].forEach(function(i) {
							var t = Math.floor(e.map.getDistance(e.center, i.point));
							n += '<li data-type="' + (o + 1) + '" style="' + (0 == o ? "display:block": "") + '"><div class="name"><div class="scroll-cover">' + i.title + "<span>（" + i.address + '）</span></div></div><div class="distance"><i class="iconfont icon-address"></i><span>' + (t = t > 1e3 ? (t / 1e3).toFixed(2) + "km": t + "m") + "</span></div></li>"
						})
					}),
					$(this._swiperWrapper).children().append(t),
					$(this.mapDesShow).append(n),
					$(".house-map-des .loading").fadeOut(function() {
						$(e._swiperWrapper).show(),
						$(e.mapDesShow).show(),
						setTimeout(function() {
							var i = new Swiper("#mapItemTypeList", {
								freeMode: !0,
								slidesPerView: "auto"
							});
							new itemChangePublic("#mapItemTypeList li", "#mapDesShow li", {
								callback: function(e) {
									i.slideTo(0 == e ? 0 : e - 1)
								}
							}),
							$("#mapDesShow li").on("click",
							function() {
								var i = $(this).children(".name").width(),
								e = $(this).find(".scroll-cover").width();
								parseInt(e) > parseInt(i) && $(this).addClass("scroll").siblings().removeClass("scroll")
							})
						},
						0)
					})
				}
			}
		}]),
		i
	} (),
	o = function() {
		function i(e) {
			_classCallCheck(this, i),
			e = arguments[0] || {},
			this._btn = "#videoPlay",
			this._video = "#cideoPlay1",
			this._close = "#audioClose",
			this.lock = !1,
			this.canplay = !1,
			this._free = e._free || !1,
			this.countDown = e.countDown || 20, //设置允许播放时长,然后弹出对话框提交电话。
			this.suspensionTimeOut = e.TimeOutCallback || null,
			this.transitionHideFn = null,
			this.inv_id_pause = null,
			this.inv_id = null,
			this.init()
		}
		return _createClass(i, [{
			key: "init",
			value: function() {
				var i = this;
				0 != $(this._video).length && (this._free = this.suspensionTimeOut && !this._free ? !1 : !0, $(this._video)[0].load(), this.videoWatch(), $(this._btn).on("click",
				function() {
					return i.lock && !i._free ? void(i.suspensionTimeOut && i.suspensionTimeOut()) : void i.show()
				}), $(this._close).on("click",
				function() {
					i.hide()
				}))
			}
		},
		{
			key: "setFree",
			value: function() {
				this._free = !0,
				this.show(),
				$(this._video)[0].play()
			}
		},
		{
			key: "videoWatch",
			value: function() {
				var i = this;
				$(this._video).on("canplay",
				function() {
					i.canplay = !0
				}),
				$(this._video).on("canplaythrough",
				function() {
					console.log("视频加载完毕")
				}),
				this._free || ($(this._video).on("play",
				function() {
					i.countDownWatch()
				}), $(this._video).on("seeking",
				function() {
					i.inv_id_pause && clearTimeout(i.inv_id_pause)
				}), $(this._video).on("pause",
				function() {
					i.inv_id && clearInterval(i.inv_id),
					i.inv_id_pause && clearTimeout(i.inv_id_pause),
					i.inv_id_pause = setTimeout(function() {
						i.hide()
					},
					200)
				}))
			}
		},
		{
			key: "countDownWatch",
			value: function() {
				var i = this;
				if (!this._free) return this.lock ? (this.suspensionTimeOut && this.suspensionTimeOut(), void $(this._video)[0].pause()) : void(this.inv_id = setInterval(function() {
					i.countDown--,
					i.countDown || (i.lock = !0, $(i._video)[0].pause(), clearInterval(i.inv_id), i.suspensionTimeOut && i.suspensionTimeOut())
				},
				1e3))
			}
		},
		{
			key: "show",
			value: function() {
				this.canplay && ($(this._video)[0].play(), this.transitionHideFn = this.videoTransition())
			}
		},
		{
			key: "hide",
			value: function(i) {
				var e = this;
				this.transitionHideFn && this.transitionHideFn(function() {
					setTimeout(function() {
						$(e._video)[0].pause(),
						i && i()
					},
					100)
				})
			}
		},
		{
			key: "videoTransition",
			value: function(i) {
				var e = this,
				t = void 0;
				return $(this._btn).fadeOut(function() {
					$(e._video).fadeIn(),
					i && i()
				}),
				t = function(i) {
					$(e._video).fadeOut(0,
					function() {
						$(e._btn).fadeIn(),
						i && i()
					})
				}
			}
		}]),
		i
	} ()
} ();