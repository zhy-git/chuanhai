"use strict";
function _classCallCheck(t, i) {
	if (! (t instanceof i)) throw new TypeError("Cannot call a class as a function")
}
var _createClass = function() {
	function t(t, i) {
		for (var e = 0; e < i.length; e++) {
			var o = i[e];
			o.enumerable = o.enumerable || !1,
			o.configurable = !0,
			"value" in o && (o.writable = !0),
			Object.defineProperty(t, o.key, o)
		}
	}
	return function(i, e, o) {
		return e && t(i.prototype, e),
		o && t(i, o),
		i
	}
} (); !
function(t) {
	function i() {
		$(document).on("click", ".fk-tel-s",
		function() {
			var t = $(this).data("id"),
			i = $(this).attr("href").replace(/\D/g, ""),
			e = {
				tel: i,
				id: t
			};
			$.ajax({
				type: "get",
				url: "/index.php?c=content&a=gettelrecord",
				data: e,
				success: function() {
					console.log("set")
				}
			})
		})
	}
	function e() {
		this.clickFlag = !0,
		this.init()
	}
	$("img.lazy").length > 0 && t.Echo && Echo.init({
		offset: 0,
		throttle: 0
	}),
	e.prototype = {
		init: function() {
			var t = this;
			$(".wap-header-menu").on("touchstart",
			function() {
				return t.clickFlag ? (t.clickFlag = !1, $(".wap-nav-wrap").addClass("show").show(), $(".wap-nav").addClass("nav-in").show(), setTimeout(function() {
					t.clickFlag = !0
				},
				1e3), !1) : !1
			}),
			$(".wap-nav-shadow").on("touchstart",
			function() {
				return t.clickFlag ? ($(".wap-nav").removeClass("nav-in").addClass("nav-out"), $(".wap-nav-wrap").removeClass("show").addClass("hide"), setTimeout(function() {
					$(".wap-nav").removeClass("nav-out").hide(),
					$(".wap-nav-wrap").removeClass("hide").hide()
				},
				400), !1) : !1
			}),
			$(".wap-nav-wrap").on("touchmove",
			function() {
				return ! 1
			})
		}
	},
	new e,
	i()
} (window),
function(t) {
	"function" == typeof define && define.amd ? define(["jquery"], t) : t(jQuery)
} (function(t) {
	t.fn.addBack = t.fn.addBack || t.fn.andSelf,
	t.fn.extend({
		actual: function(i, e) {
			if (!this[i]) throw '$.actual => The jQuery method "' + i + '" you called does not exist';
			var o, n, s = {
				absolute: !1,
				clone: !1,
				includeMargin: !1,
				display: "block"
			},
			a = t.extend(s, e),
			r = this.eq(0);
			if (a.clone === !0) o = function() {
				var t = "position: absolute !important; top: -1000 !important; ";
				r = r.clone().attr("style", t).appendTo("body")
			},
			n = function() {
				r.remove()
			};
			else {
				var l, c = [],
				h = "";
				o = function() {
					l = r.parents().addBack().filter(":hidden"),
					h += "visibility: hidden !important; display: " + a.display + " !important; ",
					a.absolute === !0 && (h += "position: absolute !important; "),
					l.each(function() {
						var i = t(this),
						e = i.attr("style");
						c.push(e),
						i.attr("style", e ? e + ";" + h: h)
					})
				},
				n = function() {
					l.each(function(i) {
						var e = t(this),
						o = c[i];
						void 0 === o ? e.removeAttr("style") : e.attr("style", o)
					})
				}
			}
			o();
			var d = /(outer)/.test(i) ? r[i](a.includeMargin) : r[i]();
			return n(),
			d
		}
	})
}),
!
function(t) {
	var i = function() {
		function t(i, e, o) {
			_classCallCheck(this, t),
			this.typeItem = i,
			this.changeItem = e,
			this.options = o || {},
			this.typeActive = this.options.typeActive || "active",
			this.init()
		}
		return _createClass(t, [{
			key: "init",
			value: function() {
				var t = this;
				$(this.typeItem).on("click",
				function() {
					var i = $(this).data("type");
					$(this).addClass(t.typeActive).siblings().removeClass(t.typeActive);
					for (var e = $(t.changeItem), o = 0; o < e.length; o++) {
						var n = $(e[o]),
						s = n.data("type");
						s == i ? n.show() : n.hide()
					}
					t.options.callback && t.options.callback(parseInt($(this).index()))
				})
			}
		}]),
		t
	} (),
	e = function() {
		function t() {
			_classCallCheck(this, t),
			this._root = "#dialogWrapper",
			this._cover = "#dialogCover",
			this._close = "#dialogClose",
			this._confirm = "#dialogConfirm",
			this.lock = !1,
			this.inv_id = null,
			this.dialogQueue = [],
			this.confirmCallback = null,
			this.html = '<div class="dialog-wrapper" id="dialogWrapper">\n                            <div class="dialog-shadow"></div>\n                            <div class="center confirm" id="dialogCover">\n                                <p class="title"></p>\n                                <p  class="ctn"></p>\n                                <div class="dialog-btn-cover">\n                                    <div class="dialog-btn" id="dialogConfirm">确定</div>\n                                    <div class="dialog-btn" id="dialogClose">取消</div> \n                                </div>\n                            </div> \n                        </div>',
			this.transitionHideFn = null,
			this.defaultOptions = {
				delay: 2e3,
				lv: 1,
				shadow: !1,
				position: "bottom",
				transition: "fadeInDown",
				type: "text"
			},
			this.defaultTransitionClass = {
				fadeInDown: {
					"in": "fadeInDown",
					out: "fadeOutUp"
				},
				fadeInUp: {
					"in": "fadeInUp",
					out: "fadeOutDown"
				},
				fade: {
					"in": "fadeIn",
					out: "fadeOut"
				}
			},
			this.defaultTransitionPrototype = {},
			this.transitionClass = null,
			this.init()
		}
		return _createClass(t, [{
			key: "init",
			value: function() {
				var t = this;
				$("body").append(this.html),
				$(this._root).on("touchmove",
				function(t) {
					t.preventDefault()
				}),
				$(this._close).on("click",
				function() {
					t.hide()
				}),
				$(this._confirm).on("click",
				function() {
					t.hide(),
					t.confirmCallback && t.confirmCallback()
				})
			}
		},
		{
			key: "show",
			value: function() {
				var t = this,
				i = arguments[0] || {};
				return i = $.extend({},
				this.defaultOptions, i),
				i.position = "text" == i.type ? i.position: "center",
				this.lock && !i.important ? void this.dialogQueueAdd(i) : (this._num = this._num || 0, void((i.html || i.text) && (this.lock = !0, $(this._cover).removeClass(), $(this._cover).addClass(i.type + " " + (i.position || "bottom")), this.setDialogType(i.type, i.shadow), $(this._cover).children(".title").html(i.title || ""), $(this._cover).children(".ctn").html(i.html ? i.html: i.text || ""), this.setCoverPosition(i.position), this.transitionHideFn = this.dialogTransition(i.transition, i.hideAfter), this.confirmCallback = "confirm" == i.type && i.confirmCallback ? i.confirmCallback: null, $(this._close).text("alert" == i.type ? "好的": "取消"), i.delay && (this.inv_id && clearTimeout(this.inv_id), "text" == i.type && (this.inv_id = setTimeout(function() {
					t.hide()
				},
				i.delay))))))
			}
		},
		{
			key: "checkDialogQue",
			value: function() {
				0 != this.dialogQueue.length && this.dialogQueueRemove()
			}
		},
		{
			key: "dialogQueueAdd",
			value: function(t) {
				this.dialogQueue.push(t)
			}
		},
		{
			key: "dialogQueueRemove",
			value: function() {
				var t = this.dialogQueue.splice(0, 1);
				this.show(t[0])
			}
		},
		{
			key: "hide",
			value: function(t) {
				var i = this;
				this.transitionHideFn && this.transitionHideFn(t),
				setTimeout(function() {
					i.checkDialogQue()
				},
				500)
			}
		},
		{
			key: "setDialogType",
			value: function(t, i) {
				return "string" != typeof t ? void console.error("error:类型传参不正确") : void("text" == t ? $(this._root).children(".dialog-shadow").hide() : "alert" == t || "confirm" == t || i ? $(this._root).children(".dialog-shadow").show() : i || $(this._root).children(".dialog-shadow").hide())
			}
		},
		{
			key: "setCoverPosition",
			value: function(t) {
				$(this._root).addClass("ready");
				var i = parseInt($(this._cover).outerWidth());
				if ($(this._cover).css("margin-left", .5 * i * -1 + "px"), t && "center" == t) {
					var e = $(this._cover).actual("outerHeight");
					$(this._cover).css("margin-top", .5 * parseInt(e) * -1 + "px")
				} else $(this._cover).css("margin-top", 0);
				$(this._root).removeClass("ready")
			}
		},
		{
			key: "dialogTransition",
			value: function(t, i) {
				var e = this,
				o = void 0;
				if ("[object Object]" === Object.prototype.toString.call(t) && "in" == Object.keys(t)[0] && "out" == Object.keys(t)[1]) {
					var n = t;
					return $(this._root).addClass("show").show(),
					$(this._cover).addClass(n. in +" animated").show(),
					o = function(t) {
						$(e._cover).addClass(n.out + " animated").removeClass(n. in ),
						$(e._root).removeClass("show").addClass("hide"),
						setTimeout(function() {
							e.lock = !1,
							$(e._root).removeClass("hide").hide(),
							$(e._cover).removeClass(n. in +" animated").hide(),
							i && i(),
							t && t()
						},
						500)
					}
				}
				if ("string" != typeof t) return void console.error("请输入一个正确的参数！");
				var s = this.defaultTransitionClass[t];
				return s ? ($(this._root).addClass("show").show(), $(this._cover).addClass(s. in +" animated").show(), o = function(t) {
					$(e._cover).addClass(s.out + " animated").removeClass(s. in ),
					$(e._root).removeClass("show").addClass("hide"),
					setTimeout(function() {
						e.lock = !1,
						$(e._root).removeClass("hide").hide(),
						$(e._cover).removeClass(s. in +" animated").hide(),
						i && i(),
						t && t()
					},
					500)
				}) : void console.error("不存在预设过渡类型 '" + t + "'")
			}
		}]),
		t
	} (),
	o = function() {
		function i(t) {
			_classCallCheck(this, i),
			this._root = "#popUpWrapper",
			this._cover = "#popUpCover",
			this._close = "#popUpClose",
			this._submitBtn = "#popUpBtn",
			this._errorShow = "#popUpErrorShow",
			this._input = "#popUpInput",
			this._touchBtn = ".popUpTouchBtn",
			this._options = {},
			this.dialog = t || new e,
			this._defaultOptions = {
				name: "游客",
				pc: 2
			},
			this._html = '<div id="popUpWrapper">\n                                            <div class="pop-up-shadow"></div>\n                                            <div id="popUpCover">\n                                                <div class="close" id="popUpClose"></div>\n                                                <p class="title"></p>\n                                                <p class="ctn"></p>\n                                                <div class="pop-up-input-cover">\n                                                    <input type="text" placeholder="请输入手机号码" id="popUpInput">\n                                                    <div id="popUpErrorShow">*手机号码不能为空</div> \n                                                </div>\n                                                <div id="popUpBtn">立即提交</div>\n                                                <p class="tips">*已开启号码保护</p>\n                                            </div>\n                                        </div>',
			this._reg = /^((13[0-9])|(14[5,7])|(15[0-3,5-9])|(17[0-8])|(18[0-9])|166|198|199|(147))\d{8}$/,
			this._Repeat_reg = /^([1]{1})([3]{10}|[4]{10}|[5]{10}|[6]{10}|[7]{10}|[8]{10}|[9]{10})$/,
			this.transitionHideFn = null,
			this.defaultTransitionPrototype = {
				fadeInTime: 200,
				fadeOutTime: 200
			},
			this.callback = null,
			this.successText = "",
			this.init()
		}
		return _createClass(i, [{
			key: "init",
			value: function() {
				var t = this;
				$("body").append(this._html),
				$(this._root).on("touchmove",
				function(t) {
					t.preventDefault()
				}),
				$(this._close).on("click",
				function() {
					t.transitionHideFn && t.transitionHideFn()
				}),
				$(this._submitBtn).on("click",
				function() {
					t.popUpSubmit()
				}),
				$(this._input).on("keydown",
				function(i) {
					var e = i.charCode || i.keyCode;
					13 == e && t.popUpSubmit()
				}),
				$(this._touchBtn).on("click",
				function() {
					var i = t.getPortData($(this)),
					e = $(this).data("successtext");
					t.show(i, e, null)
				}),
				$(this._input).on("input",
				function() {
					$(t._errorShow).fadeOut()
				})
			}
		},
		{
			key: "show",
			value: function(t, i, e) {
				e = e || {},
				$(this._cover).find(".title").text(t.title || "温馨提示"),
				$(this._cover).find(".ctn").text(t.text || "我们将严格保护您的隐私"),
				$(this._errorShow).hide(),
				this._options = t,
				this.successText = i || "",
				this.callback = e.callback || null,
				this.confirmAfter = e.confirmAfter || null,
				this.userConfirmNone = t.userConfirmNone || !1,
				this.transitionHideFn = this.popUpTransition(e.hideAfter || null)
			}
		},
		{
			key: "getPortData",
			value: function(t) {
				var i = t.data("info");
				return "string" == typeof i && (i = JSON.parse(i)),
				i || {}
			}
		},
		{
			key: "dataCheck",
			value: function(t) {
				var i = $(this._input).val();
				return "" == i ? (this.errorShow("手机号码不能为空"), $(this._input).focus(), !1) : !this._reg.test(i) || this._Repeat_reg.test(i) ? (this.errorShow("号码格式不正确"), $(this._input).focus(), !1) : (t.tel = i, t)
			}
		},
		{
			key: "errorShow",
			value: function(t) {
				$(this._errorShow).text("*" + t).fadeIn()
			}
		},
		{
			key: "popUpSubmit",
			value: function() {
				var i = $.extend({},
				this._defaultOptions, this._options),
				e = this.dataCheck(i);
				if (e) {
					e.laiyuan = t.location.href;
					var o = this.dataSerialization(e);
					this.popUpAjax({
						data: o,
						confirmAfter: this.confirmAfter
					})
				}
			}
		},
		{
			key: "popUpAjax",
			value: function(t) {
				var i = this,
				e = this;
				this.transitionHideFn && this.transitionHideFn(function() {
					i.dialog.show({
						text: "正在提交,请稍后....",
						delay: 0,
						transition: "fadeInUp"
					}),
					setTimeout(function() {
						$.ajax({
							type: "post",
							url: "/m/save.php?action=bmtj",
							data: t.data,
							success: function(i) {
								console.log(i.status)
								e.dialog.hide(1 == i.status ?
								function() {
									e.callback && e.callback(t.data),
									$(e._input).val(""),
									e.userConfirmNone || e.dialog.show({
										type: "alert",
										title: "提交成功",
										text: e.successText || "请稍后片刻，置业顾问会马上联系您",
										important: !0,
										transition: "fadeInDown",
										hideAfter: function() {
											e.confirmAfter && e.confirmAfter()
										}
									})
								}: function() {
									e.dialog.show({
										type: "alert",
										title: "提交太频繁",
										text: "您提交的过于频繁了，请稍后再试",
										important: !0,
										transition: "fadeInDown"
									})
								})
							},
							error: function() {
								e.dialog.hide(function() {
									e.dialog.show({
										type: "alert",
										title: "网络异常",
										text: "网络异常，请稍后重试",
										important: !0,
										transition: "fadeInDown"
									})
								})
							}
						})
					},
					500)
				})
			}
		},
		{
			key: "dataSerialization",
			value: function(t) {
				if ("[object Object]" !== Object.prototype.toString.call(t)) return console.error("error：参数不是 Object 类型"),
				!1;
				var i = {};
				return Object.keys(t).forEach(function(e) {
					"userConfirmNone" != e && (t[e] || 0 == t[e]) && (i["data[" + e + "]"] = "loupan" == e ? t[e] + "-" + t.title: t[e])
				}),
				i
			}
		},
		{
			key: "popUpTransition",
			value: function(t) {
				var i = this,
				e = void 0;
				return $(this._root).addClass("show").show(),
				$(this._cover).addClass("fadeInDown animated").show(),
				e = function(e) {
					$(i._cover).addClass("fadeOutUp animated").removeClass("fadeInDown"),
					$(i._root).removeClass("show").addClass("hide"),
					setTimeout(function() {
						$(i._root).removeClass("hide").hide(),
						$(i._cover).removeClass("fadeOutUp animated").hide(),
						t && t(),
						e && e()
					},
					500)
				}
			}
		}]),
		i
	} (),
	n = function() {
		function i(t, e) {
			_classCallCheck(this, i),
			this.el = t,
			this.changePoint = parseInt(e.changePoint),
			this.showClass = e.showClass,
			this.initAfterFn = e.initAfterFn || null,
			this.scrollIngFn = e.scrollIngFn || null,
			this.changeFn = e.changeFn || null,
			this.init()
		}
		return _createClass(i, [{
			key: "init",
			value: function() {
				var i = this;
				if (isNaN(this.changePoint)) try {
					console.error("changePoint is NaN")
				} catch(e) {
					console.log("changePoint is NaN")
				} else this.initAfterFn && this.initAfterFn(),
				this.scrollFn(),
				$(t).on("scroll",
				function() {
					var t = $(this).scrollTop();
					i.scrollFn(t)
				})
			}
		},
		{
			key: "scrollFn",
			value: function() {
				var i = $(t).scrollTop();
				this.checkFn(this.el) ? i >= this.changePoint ? this.el.pin && this.el.pin() : this.el.over && this.el.over() : i >= this.changePoint ? $(this.el).addClass(this.showClass) : $(this.el).removeClass(this.showClass),
				this.scrollIngFn && this.scrollIngFn(i)
			}
		},
		{
			key: "checkFn",
			value: function(t) {
				return "[object Object]" === Object.prototype.toString.call(t)
			}
		}]),
		i
	} (),
	s = function() {
		function i() {
			_classCallCheck(this, i)
		}
		return _createClass(i, [{
			key: "elementFixedHeight",
			value: function(t) {
				var i = parseFloat($(t).outerHeight());
				setTimeout(function() {
					$(t).css("height", i + "px")
				},
				200)
			}
		},
		{
			key: "setCoverHeight",
			value: function(i, e) {
				if (0 != $(i).length) {
					var o = $(t).height(),
					n = $(i).offset().top,
					s = $(".footer-hover").outerHeight(),
					a = parseInt(o) - parseInt(n) - parseInt(s) - 30;
					$(i).css(e, a + "px")
				}
			}
		}]),
		i
	} ();
	t.itemChangePublic = t.itemChangePublic || i,
	t.FkwPopUp = t.FkwPopUp || o,
	t.fkwDialog = t.fkwDialog || e,
	t.hoverNavShow = t.hoverNavShow || n,
	t.UTILS_COMMON = t.UTILS_COMMON || s,
	$(function() {
		if ($(".--scrollHeightCover--view--").length > 0) {
			var i = new s,
			e = $(".--scrollHeightCover--view--").data("type");
			e = e ? e: "height",
			i.setCoverHeight(".--scrollHeightCover--view--", e)
		}
		setTimeout(function() {
			$("footer .site-info").addClass("show")
		},
		300);
		var o = t.location.search || "";
		o && o.indexOf("?run=tel") > -1 && setTimeout(function() {
			$(".footer-hover .item-2")[0].click()
		},
		1e3)
	})
} (window);