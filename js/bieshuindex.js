layui.use("layer", function() {

    var t = layui.layer;

    t.ready(function() {

        var e = {

            resblockId: "",

            prjInfoId: "",

            source: "",

            userId: "",

            pageSize: 3,

            currentPage: 1,

            total_page: "",

            hx_length: "",

            cityCode: "110000",

            saleStatus: "",

            bedRooms: "",

            districtId: "",

            bizcircleId: ""

        }

          , o = {

            rendData: function() {

                function t() {

                    return "micromessenger" == window.navigator.userAgent.toLowerCase().match(/MicroMessenger/i)

                }

                $(".four_ewm").each(function() {

                    jQuery(this).qrcode({

                        render: "canvas",

                        width: 80,

                        height: 80,

                        text: "http://www.xxx.com/static/phone/index.html?pkid=" + $(this).attr("pkid"),

                        src: "/static/img/ewmMiddle.png"

                    })

                }),

                !function() {

                    for (var t = navigator.userAgent, e = ["Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod"], o = !0, i = 0; i < e.length; i++)

                        if (t.indexOf(e[i]) > 0) {

                            o = !1;

                            break

                        }

                    return o

                }() ? t() ? e.source = "xxxxx" : e.source = "xxxx" : t() ? e.source = "xxxxx" : e.source = "xxxx";

                //var i = window.location.href.split("bj-xf")[1].split("-");

                //e.resblockId = i[0].replace(/[^0-9]/gi, ""),

                //e.prjInfoId = i[1].replace(/[^0-9]/gi, ""),

                $(".proCont ").animate({

                    left: 0

                });

                var n = $(".sellCont label").length;

                if (n > 5)

                    for (var a = 4; a < n; a++)

                        $(".sellCont label").eq(a).hide();

                var s = $(".imglist li").length;

                e.hx_length = Math.ceil(s / 4),

                "1" == $(".hxBox_num").text() && $(".hxBox").css("height", "340px"),

                o.map()

                

            },

            map: function() {

                var t = $(".lookMap").attr("data-mapx")

                  , e = $(".lookMap").attr("data-mapy")

                  , o = $(".lookMap").attr("loacation");

                if (t)

                    makeMap(t, e, o);

                else {

                    var i = new BMap.Map("mapImg2");

                    i.centerAndZoom(new BMap.Point(116.404,39.915), 30);

                    var n = {

                        onSearchComplete: function(t) {

                            if (a.getStatus() == BMAP_STATUS_SUCCESS) {

                                var e = []

                                  , i = [];

                                i.push(t.getPoi(0).point.lat),

                                e.push(t.getPoi(0).point.lng),

                                makeMap(e, i, o)

                            }

                        }

                    }

                      , a = new BMap.LocalSearch(i,n);

                    a.search($(".lookMap").attr("loacation")),

                    a.disableFirstResultSelection()

                }

                $(".ground p span").click(function() {

                    $(".ground p span").removeClass("current"),

                    $(this).addClass("current");

                    var t = $(this).html();

                    mapSeach(t)

                })

            },

            getList: function() {},

            getHouseTypeList: function() {

                var t = {

                    resblockId: e.resblockId,

                    prjInfoId: e.prjInfoId,

                    bedRooms: e.bedRooms,

                    saleStatus: e.saleStatus,

                    cityCode: code

                };

                $.ajax({

                    type: "post",

                    url: "/bj-xf/getHouseTypeList.html",

                    dataType: "json",

                    data: t,

                    success: function(t) {

                        var o = t.result;

                        layui.use("laytpl", function() {

                            (0,

                            layui.laytpl)(HouseTypeList.innerHTML).render(o, function(t) {

                                huxing_view.innerHTML = t;

                                var o = $(".imglist li").length;

                                e.hx_length = Math.ceil(o / 4),

                                $(".hxTitle h5").removeClass("current"),

                                e.bedRooms ? $(".hxTitle h5[bedrooms=" + e.bedRooms + "]").addClass("current") : $(".hxTitle h5").eq(0).addClass("current"),

                                "302700000001" == e.saleStatus ? $(".last_h5 input").attr("checked", !0) : $(".last_h5 input").attr("checked", !1)

                            })

                        }),

                        0 == o.houseTypeList.length && $(".hxBox").hide()

                    }

                })

            },

            bindEvent: function() {

                $(".houseDet ul.all li").not(".keep").hide(),

                $(document).on("click", ".houseDet a.btns", function() {

                    $(this).hasClass("downIt") ? ($(".houseDet ul.all li").slideDown(),

                    $(this).removeClass("downIt").addClass("upIt")) : $(this).hasClass("upIt") && ($(".houseDet ul.all li").not(".keep").slideUp(),

                    $(this).removeClass("upIt").addClass("downIt"))

                }),

                $(document).on("mouseenter", ".hxBox", function() {

                    $(".goLeft").show(),

                    $(".goRight").show()

                }),

                $(document).on("mouseleave", ".hxBox", function() {

                    $(".goLeft").hide(),

                    $(".goRight").hide()

                });

                var i = $(".imglist li").width()

                  , n = $(".imglist li").size();

                $(".imglist").css("width", (i + 58) * n),

                $(".houseDet ul.all li").not(".keep").hide(),

                $(".titleNav h3").click(function() {

                    $(this).addClass("current").siblings().removeClass("current");

                    var t = "." + $(this).attr("data-id");

                    $("html,body").animate({

                        scrollTop: $(t).offset().top - 30

                    }, 500)

                }),

                $(document).on("click", ".picture dl", function() {

                    var t = $(this).attr("fileType");

                    var houseid = $(this).attr("data-id");

                    layui.use("layer", function() {

                        layui.layer.open({

                            type: 2,

                            title: !1,

                            closeBtn: 1,

                            shade: .3,

                            area: ["1100px", "610px"],

                            offset: "auto",

                            shift: 2,

                            resize: !1,

                            content: "/hjf/pic_"+houseid+'_'+t

                        })

                    })

                }),

                $(document).on("click", ".album", function() {

                    var houseid=$(this).attr('data-id');

                    0 != $(".album b").text() && layui.use("layer", function() {

                        layui.layer.open({

                            type: 2,

                            title: !1,

                            closeBtn: 1,

                            shade: .3,

                            area: ["1100px", "610px"],

                            offset: "auto",

                            shift: 2,

                            resize: !1,

                            content: "/hjf/pic_"+houseid+"_0"

                        })

                    })

                }),

                $(document).on("click", ".imglist li dt", function() {

                     var t = $(this).parents("li").attr("houseTypeId");

                        console.log(t);

                        t && layui.use("layer", function() {

                            layui.layer.open({

                                type: 2,

                                title: "户型详情",

                                closeBtn: 1,

                                shade: .3,

                                area: ["80%", "560px"],

                                offset: "auto",

                                shift: 2,

                                resize: !1,

                                content: "/hjf/hx_"+t

                            })

                        })

                });

                var a = 1;

                $("body").off().on("click", ".last_h5 label", function() {

                    $(".last_h5 input").is(":checked") ? e.saleStatus = "" : e.saleStatus = "302700000001",

                    a = 1,

                    o.getHouseTypeList()

                }),

                $("body").on("click", ".hxTitle h5", function() {

                    $(".hxTitle h5").removeClass("current"),

                    $(this).addClass("current"),

                    $(".imglist").css("left", "0");

                    "last_h5" == $(this).attr("class") || (e.bedRooms = $(this).attr("bedRooms")),

                    $(".last_h5").is(":checked") ? e.saleStatus = "302700000001" : e.saleStatus = "",

                    a = 1,

                    o.getHouseTypeList()

                }),

                $("#huxing_view").on("click", ".goRight", function() {

                    leng = e.hx_length,

                    a == leng || ($(".imglist").animate({

                        left: "-" + 1234 * a

                    }, "slow"),

                    a++)

                }),

                $("#huxing_view").on("click", ".goLeft", function() {

                    1 == a || ($(".imglist").animate({

                        left: "-" + 1234 * (a - 2)

                    }, "slow"),

                    a--)

                }),

                $(".pg_yuyue").click(function() {

                    $(".bookimgRoom").show()

                }),

                $(".bookimgRoom .close").click(function() {

                    $(".bookimgRoom").hide()

                }),

                $(".conIcon").click(function() {

                    $(this).hide(),

                    $(".consult").removeClass("hideAnima").addClass("showAnima")

                });

                var s = 1;

                $("body").on("click", ".consult .close", function() {

                    $(".consult").removeClass("showAnima").addClass("hideAnima"),

                    $(".conIcon").addClass("showBtnL").show(),

                    s = 0

                });

                var l = $(".titleNav").offset().top;

                $(window).scroll(function() {

                    $(window).scrollTop() > l ? s && ($(".conIcon").hide(),

                    $(".consult").removeClass("hideAnima").addClass("showAnima")) : $(".consult").hasClass("showAnima") && ($(".consult").removeClass("showAnima").addClass("hideAnima"),

                    $(".conIcon").addClass("showBtnL").show()),

                    $(".lazy_img").each(function() {

                        var t = $(this).offset().top

                          , e = $(this).attr("data-src")

                          , o = $(window).height();

                        $(window).scrollTop() + o > t && $(this).attr("src", e)

                    })

                }),

                $("body").on("click", ".lookMap", function() {

                    var t = $(this).attr("data-mapx")

                      , e = $(this).attr("data-mapy")

                      , o = encodeURI($(this).attr("loacation"))

                      , i = encodeURI($(this).attr("name"))

                      , n = encodeURI($(this).attr("qname"))

                      , a = "";

                    a = "null" != t && "null" != e ? "/hjf/map?lnt="+t+"&lat="+e+"&subject="+o+"&name="+i+"&qname="+n+"": "/hjf/map?lnt="+t+"&lat="+e+"&subject="+o+"&name="+i+"&qname="+n+"",

                    layui.use("layer", function() {

                        layui.layer.open({

                            type: 2,

                            title: !1,

                            closeBtn: 1,

                            shade: .3,

                            area: ["900px", "600px"],

                            offset: "auto",

                            shift: 2,

                            resize: !1,

                            content: a

                        })

                    })

                }),

                $(".bookimgRoom .btn").click(function() {

                    var o = $.trim($(".bookimgRoom .txt").val());

                    if (e.userId = function(t) {

                        var e, o = new RegExp("(^| )" + t + "=([^;]*)(;|$)");

                        return (e = document.cookie.match(o)) ? unescape(e[2]) : null

                    }("userId"),

                    o) {

                        var i = {

                            cityCode: e.cityCode,

                            userId: e.userId,

                            site: e.source,

                            channel: "400300000002",

                            sourcePage: "400200000002",

                            phone: o,

                            requireType: "400400000006"

                        };

                        $.ajax({

                            type: "post",

                            url: "/requirement/directfindhouse.html",

                            dataType: "json",

                            data: i,

                            success: function(e) {

                                "200" == e.code ? (t.alert("预约成功"),

                                $(".bookimgRoom").hide(),

                                $(".bookimgRoom .txt").val("")) : t.alert(e.msg)

                            }

                        })

                    } else

                        t.alert("请输入正确手机号")

                }),

                $(".pg_fx").click(function() {

                    "none" == $("#qrcode").css("display") ? ($("#qrcode").html(""),

                    $("#qrcode").show(),

                    $("#qrcode").animate({

                        height: "100px"

                    }, 300),

                    jQuery("#qrcode").qrcode({

                        render: "canvas",

                        width: 100,

                        height: 100,

                        text: "http://m.xxxx.com/bj-xf/lp" + e.resblockId + ".html",

                        src: "/static/img/ewmMiddle.png"

                    })) : $("#qrcode").animate({

                        height: "0"

                    }, 300, function() {

                        $("#qrcode").hide()

                    })

                }),

                $(".footer_sao").click(function() {

                    $(this).parent("span").siblings(".four_ewm").toggle(200)

                }),

                $("body").on("click", ".four_sao", function() {

                    $(this).siblings(".gunwen_ewm").slideToggle(200),

                    $(this).siblings(".triangle").toggle()

                }),

                $("body").on("click", ".slide", function() {
					alert(11);

                    $(".proCont ").animate({

                        left: "-320px"

                    }, 500, function() {

                        $("#proInfo_view").hide()

                    }),

                    $(".proInfo_min").show(),

                    $(".pg_min").animate({

                        width: "139px"

                    }, 500, function() {})

                }),

                $("body").on("click", ".pg_min", function() {

                    $("#proInfo_view").show(),

                    $(".proCont ").animate({

                        left: "0px"

                    }, 500, function() {

                        $(".proInfo_min").hide()

                    }),

                    $(".pg_min").animate({

                        width: "0px"

                    }, 500, function() {})

                })

            },

            init: function() {

                o.rendData(),

                o.bindEvent()

            }

        };

        $(function() {

            o.init()

        })

    })

});



function makeMap(e, a, o, n) {

    function t(e, a, o) {

        this._point = e,

        this._text = a,

        this._overText = o

    }

    var i = new BMap.Map("allmap")

      , l = new BMap.ScaleControl({

        anchor: BMAP_ANCHOR_BOTTOM_RIGHT

    })

      , s = new BMap.NavigationControl;

    i.addControl(l),

    i.addControl(s),

    detail = new BMap.Point(e,a),

    n ? i.centerAndZoom(new BMap.Point(e,a), 17) : i.centerAndZoom(new BMap.Point(e,a), 16),

    (t.prototype = new BMap.Overlay).initialize = function(e) {

        this._map = e;

        var a = this._div = document.createElement("div");

        a.style.position = "absolute",

        a.style.zIndex = BMap.Overlay.getZIndex(this._point.lat),

        a.style.backgroundColor = "#6CAECA",

        a.style.border = "1px solid #6CAECA",

        a.style.borderRadius = "5px",

        a.style.color = "white",

        a.style.height = "18px",

        a.style.padding = "2px",

        a.style.lineHeight = "18px",

        a.style.whiteSpace = "nowrap",

        a.style.MozUserSelect = "none",

        a.style.fontSize = "12px";

        var o = this._span = document.createElement("span");

        a.appendChild(o),

        o.appendChild(document.createTextNode(this._text));

        var n = this._arrow = document.createElement("div");

        return n.style.background = "url(http://map.baidu.com/fwmap/upload/r/map/fwmap/static/house/images/label.png) no-repeat",

        n.style.position = "absolute",

        n.style.width = "11px",

        n.style.height = "10px",

        n.style.top = "22px",

        n.style.left = "10px",

        n.style.overflow = "hidden",

        n.style.backgroundPositionY = "-20px",

        a.appendChild(n),

        i.getPanes().labelPane.appendChild(a),

        a

    }

    ,

    t.prototype.draw = function() {

        var e = this._map.pointToOverlayPixel(this._point);

        this._div.style.left = e.x - parseInt(this._arrow.style.left) + "px",

        this._div.style.top = e.y - 30 + "px"

    }

    ;

    var r = o

      , c = new t(new BMap.Point(e,a),r);

    i.addOverlay(c),

    local = new BMap.LocalSearch(i,{

        renderOptions: {

            map: i,

            autoViewport: !1,

            panel: "r-result"

        }

    }),

    n || local.searchNearby("公交", detail, 1e3),

    local.disableFirstResultSelection(),

    $(".panorama").on("click", function() {

        (n = new BMap.Map("allmap")).disableDragging(),

        n.centerAndZoom(new BMap.Point(e,a), 30),

        n.addTileLayer(new BMap.PanoramaCoverageLayer);

        var o = new BMap.Panorama("allmap");

        if (o.setPov({

            heading: -40,

            pitch: 6

        }),

        "<i></i>街景地图" == $(".panorama").html())

            $(".panorama").html("<i></i>返回"),

            o.setPosition(new BMap.Point(e,a)),

            local.disableFirstResultSelection();

        else {

            $(".panorama").html("<i></i>街景地图");

            var n = new BMap.Map("allmap")

              , t = new BMap.ScaleControl({

                anchor: BMAP_ANCHOR_BOTTOM_RIGHT

            })

              , i = new BMap.NavigationControl;

            n.addControl(t),

            n.addControl(i),

            n.disableDragging(),

            detail = new BMap.Point(e,a),

            n.centerAndZoom(new BMap.Point(e,a), 30),

            (local = new BMap.LocalSearch(n,{

                renderOptions: {

                    map: n,

                    autoViewport: !1

                }

            })).searchNearby("公交", detail, 1e3)

        }

    })

}

function mapSeach(e) {

    local.searchNearby(e, detail, 1e3),

    local.disableFirstResultSelection()

}

function isWeiXin() {

    return "micromessenger" == window.navigator.userAgent.toLowerCase().match(/MicroMessenger/i)

}

function IsPC() {

    for (var e = navigator.userAgent, a = ["Android", "iPhone", "SymbianOS", "Windows Phone", "iPad", "iPod"], o = !0, n = 0; n < a.length; n++)

        if (e.indexOf(a[n]) > 0) {

            o = !1;

            break

        }

    return o

}

function isSite() {

    return IsPC() ? isWeiXin() ? "xxxx" : "xxxxx" : isWeiXin() ? "xxxxx" : "xxxxx"

}

var local, detail;

$(".goTop").hide(),

$(window).scroll(function() {

    $(window).scrollTop() > $(window).height() ? $(".goTop").show() : $(".goTop").hide()

}),

$(document).on("click", ".goTop", function() {

    $("body,html").animate({

        scrollTop: 0

    }, 300)

});

