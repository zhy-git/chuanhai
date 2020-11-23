$(function() {
    function i(i) {
        function t() {
            a == -(s.length - 1) * c ? l.addClass("zmd-no") : l.removeClass("zmd-no"),
            -0 == a ? o.addClass("zmd-no") : o.removeClass("zmd-no")
        }
        if (!x) {
            var a = 0,
            d = e.position().left,
            h = 0;
            if (navigator.userAgent.indexOf("MSIE") >= 0 && navigator.userAgent.indexOf("Opera") < 0 && (0 == d || (d -= 1)), x = !0, "boolean" == typeof i) h += i ? -c: c;
            else {
                if (i - v == 0) return void(x = !1);
                h = -c * (i - v)
            }
            a = d + h,
            e.animate({
                left: a
            },
            C, "linear",
            function() {
                t(),
                x = !1
            }),
            n(i)
        }
    }
    function n(i) {
        var n;
        s.eq(v).removeClass("zmd-on"),
        "boolean" == typeof i ? i ? (n = v + 1) > s.length - 1 && (n = 0) : (n = v - 1) < 0 && (n = s.length - 1) : n = i,
        s.eq(n).addClass("zmd-on"),
        v = n
    }
    function t(i) {
        function n() {
            t >= 0 ? h.addClass("alb-no") : h.removeClass("alb-no"),
            t <= -f * u ? r.addClass("alb-no") : r.removeClass("alb-no")
        }
        if (!w) {
            var t = 0,
            e = 0;
            w = !0;
            var s = d.position().left;
            "boolean" == typeof i ? (e += i ? -520 : 520, t = e + s) : ((i + 1) % 5 == 0 && (t = -530 * (i + 1) / 5), i % 5 == 0 && (t = -530 * (i / 5 - 1))),
            d.animate({
                left: t
            },
            C, "linear",
            function() {
                w = !1,
                n()
            })
        }
    }
    var e = $(".slide-ul"),
    s = $(".zmd-container-ul li"),
    o = $(".slide-btnz"),
    l = $(".slide-btny"),
    c = $(".slide-ul li").width(),
    d = $(".move"),
    h = $(".zmd-btnz"),
    r = $(".zmd-btny"),
    f = d.width();
    s.outerWidth(!0);
    1 == s.length && l.addClass("zmd-no"),
    o.addClass("zmd-no"),
    h.addClass("zmd-no");
    for (var u = s.length / 5 - 1,
    m = [], p = [], g = 0; g < u; g++) a = 5 * (g + 1),
    b = a - 1,
    m.push(b),
    p.push(a);
    o.click(function() {
        s.each(function() {
            $(this).hasClass("zmd-on") && -1 != p.indexOf($(this).index()) && t($(this).index())
        }),
        $(this).hasClass("zmd-no") || i(!1)
    }),
    l.click(function() {
        s.each(function() {
            $(this).hasClass("zmd-on") && -1 != m.indexOf($(this).index()) && t($(this).index())
        }),
        $(this).hasClass("zmd-no") || i(!0)
    }),
    s.click(function() {
        i($(this).index())
    });
    var v = 0,
    C = 400,
    x = !1,
    w = !1
})