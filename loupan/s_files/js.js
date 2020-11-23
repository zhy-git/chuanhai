$(function () {

    $('.map-c').click(function () {
        var el = $('.map-pop');
        if (!el.hasClass('show')) {
            el.addClass('show').stop().animate({'right': 0}, 500);
        } else {
            el.removeClass('show').stop().animate({'right': '-375px'}, 500)
        }
    });

    $('#gj,#jc').click(function () {
        $('#r-result').html(' ');
        var name = $(this).text();
        var el = $('.map-pop');
        if (el.hasClass('show')) {
            el.removeClass('show').stop().animate({'right': '-375px'}, 500)
        }
        $('.map-c').click();
        $('#fuck-search').show();
        $('#sstartname').val($('#infoAddress').text());
        $('.map-tit2').text(name);
        $('.map-box1').hide();
        $('.map-box2').show();
    });

    $('.map-list li a').click(function () {
        var name = $(this).attr('data-value');
        addressSearch(name);
        $('.map-tit2').text(name);
        $('.map-box1').hide();
        $('.map-box2').show();
    });

    $('.map-return').click(function () {
        $('.map-box1').show();
        $('.map-box2').hide();
    });

    $('.chc,.ctc-c').click(function () {
        $('.zhezhao').stop().fadeOut();
        $('.chc,.thistc').stop().fadeOut();
        $('.error_msg').each(function () {
            $(this).attr('id', '');
            $(this).text('');
        });
    });

    $('.jf').click(function () {
        $('.jckf,.chc').stop().fadeIn();
        $('.jckf .ctc-wrap p').attr('id', 'error_msg');
    });

    $('.kw').click(function () {
        $('.kptz,.chc').stop().fadeIn();
        $('.kptz .ctc-wrap p').attr('id', 'error_msg');
    });

    $('.js-jg-btn').click(function () {
        $('.jjtz,.chc').stop().fadeIn();
        $('.jjtz .ctc-wrap p').attr('id', 'error_msg');
    });
    
    $('.js-jiangjia').click(function () {
        $('.jjtz,.chc').stop().fadeIn();
        $('.jjtz .ctc-wrap p').attr('id', 'error_msg');
    });

    $('.z_wt-btn').click(function () {
        $('.gzwt,.chc').stop().fadeIn();
        $('.gzwt .ctc-wrap p').attr('id', 'error_msg');
    });

    $('.ph-btn').click(function () {
        $('.yykf,.chc').stop().fadeIn();
        $('.yykf .ctc-wrap p').attr('id', 'error_msg');
    });

    $('.my').click(function () {
        var id = $(this).attr('data-id');
        $.getJSON("/index.php/Common/get_housetitle", {id: id}, function (result) {
            $('.mfyy .ctc-wrap p').attr('id', 'error_msg');
            $('.mfyy,.chc').stop().fadeIn();
            $('#house_id').val(id);
            $('.mfyy_title').html(result.data);
        });


    });
   $('.buildding').click(function() {
        var id = $(this).attr('data-id');
        var estate_id = $(this).attr('data-id2');
        $.getJSON("/index.php/Common/get_Builddingtitle", {id: id,estate_id:estate_id}, function(result) {
            $('.mfyy,.chc').stop().fadeIn();
            $('.mfyy .ctc-wrap p').attr('id', 'error_msg');
            $('#house_id').val(id);
            $('.mfyy_title').html(result.data);
        });
    });

    $('.baoming').click(function () {
        $('.bmkf,.chc').stop().fadeIn();
        $('.bmkf .ctc-wrap p').attr('id', 'error_msg');
    });

    $('.lybtn').click(function () {
        $('.yjfk,.chc').stop().fadeIn();
        $('.yjfk .ctc-wrap p').attr('id', 'error_msg');

    });
    
    $('.goufangxuqiu').click(function() {
        $('.goufang,.chc').stop().fadeIn();
        $('.goufang .ctc-wrap p').attr('id', 'error_msg');

    });

    $('.sx-c').click(function () {
        if ($(this).hasClass('show')) {
            $(this).removeClass('show');
            $('.cn').hide();
        } else {
            $(this).addClass('show');
            $('.cn').show();
        }

    });

    $('.z_xx-list-tit h5').click(function () {
        $(this).addClass('showed');
        $('.z_xx-list-pop').stop().hide();
        $(this).parents('li').find('.z_xx-list-pop').stop().show();
    });

    $('.ks p a').click(function () {
        $(this).parents('li').find('.pfobj').fadeIn();
    });

    $('.ks-img').click(function () {
        $(this).parents('li').find('.pfobj').fadeIn();
    });

    $('.housecho-list-pop a').click(function () {
        $('#ks_all_a').click();
        $('#hu_' + $(this).attr('data-id')).fadeIn();
    });

    $('.huxing_a').click(function () {
        $('#ks_all_a').click();
        $('#hu_' + $(this).attr('data-id')).fadeIn();
    });

    //豪宅预约看房
    $('.zhtan').click(function () {
        $('.hzorder,.chc').fadeIn();
        $('.hzorder .ctc_wrap p').attr('id', 'error_ms2');
    });

    $('.hzhide,.ctc-c').click(function () {
        $('.zhezhao').fadeOut();
        $('.hzorder').fadeOut();
        $('.error_ms').each(function () {
            $(this).attr('id', '');
            $(this).text('');
        });
    });



    $(document).bind("click", function (e) {
        var target = $(e.target);
        if (target.closest('.pfobj-wrap,.ks p a,.housecho-list-pop a,.huxing_a,.ks-img').length == 0) {
            $('.pfobj').fadeOut();
        }
    });

    $('.sx-btn1').click(function () {
        var a = new Array();
        var b = '';
        $('#hrefclick').attr('href', '');
        $(".sx-checkbox").each(function (i) {
            if ($(this).attr("checked") == 'checked') {
                //解决添加数组问题
                a.push($(this).attr('id'));
                b += $(this).attr('id') + ',';
            }
        });
        if (a.length > 5) {
            alert("最多只可以同时选择5项");
            return false;
        }
        $('#hrefclick').attr('href', $('#hrefclick').attr('data-url') + b.substring(0, b.length - 1));
        window.location.href = $('#hrefclick').attr('data-url') + b.substring(0, b.length - 1);
    })

    $('.sx-more').click(function () {
        $("#sx-sl a").each(function (i) {
            $(this).removeAttr('href');
        });
        $(this).hide();
        $(this).parents('.sx-rom').find('.sx-box3').show();
        $(this).parents('.sx-rom').find('.sx-cho').addClass('showinput');
    });

    $('.sx-btn2').click(function () {
        $("#sx-sl a").each(function (i) {
            $(this).attr('href', $(this).attr('data-url'));
        });
        $(this).parents('.sx-rom').find('.sx-box3').hide();
        $(this).parents('.sx-rom').find('.sx-cho').removeClass('showinput');
        $(this).parents('.sx-rom').find('.sx-more').show();
    });

    $(".sx-cho").click(function () {
        if ($(this).children('input').attr("checked") == "checked") {
            $(this).children('input').removeAttr("checked");
        } else {
            $(this).children('input').attr("checked", "checked");
        }
    });

    $(".sx-cho input").click(function () {
        if ($(this).attr("checked") == "checked") {
            $(this).removeAttr("checked");
        } else {
            $(this).attr("checked", "checked");
        }
    });

    $('.m_sc-img .b1').click(function () {
        if ($(this).hasClass('on')) {
            $(this).removeClass('on');
            $(this).parents('.m_sc-img').removeClass('hh');
        } else {
            $(this).addClass('on');
            $(this).parents('.m_sc-img').addClass('hh');
        }
    });

    /* 加入对比 */
    $('.addDuibi').click(function () {
        var id = $(this).attr('data-id');
        var tiao = $(this).attr('data-i');
        $.getJSON("/index.php/Contrast/duibi", {id: id, txt: "add"}, function (result) {
            if (result.status == 1) {
                alert('已经添加对比列表');
                if (tiao == 'tiao') {
                    window.location.href = window.location.href;
                }
                $('.dbpop-num').text(result.count + '/4');
            } else if (result.status == 3) {
                alert('已经存在对比列表中');
            } else {
                alert('对比列表满了，请删除在添加');
            }
        });
    });

    $('.deleteDuibi').click(function () {
        var id = $(this).attr('data-id');
        $.getJSON("/index.php/Contrast/duibi", {id: id, txt: "delete"}, function (result) {
            if (result.status == 1) {
                window.location.href = window.location.href;
            }
        });
    });

    $('.addShouC').click(function () {
        var id = $(this).attr('data-id');
        if ($(this).hasClass('on')) {
            var txt = 'delete';
        } else {
            var txt = 'add';
        }
        var _this = $(this);
        $.getJSON("/index.php/Contrast/shoucang", {id: id, txt: txt}, function (result) {
            if (result.status == 1) {
                alert('操作成功');
                if (result.data == 'successadd') {
                    _this.addClass('on');
                } else {
                    _this.removeClass('on');
                }

            } else {
                if (result.data == 'noneuser') {
                    //alert('还没登录');
                    $('.ydl .ctc-wrap p').attr('id', 'error_msg');
                    $('.ydl,.chc').stop().fadeIn();
                }
            }
        });
    });

    //修复左右切换
    $('.pfobj-np').click(function () {
        var liindex = $(this).parents('.ksslider .bd ul li').index();
        var lilength = $(this).parents('.ksslider .bd ul').find('li').length;
        //alert(lilength)
        if ($(this).hasClass('pfobj-n')) {
            if (liindex + 1 < lilength) {
                var liindexnow = liindex + 1;
            } else {
                liindexnow = 0;
            }
        }
        else if ($(this).hasClass('pfobj-p')) {
            if (liindex == 0) {
                liindexnow = lilength - 1;
            } else {
                liindexnow = liindex - 1;
            }
        }
        $(this).parents('.pfobj').hide(0);
        $(this).parents('.ksslider .bd ul').find('li').eq(liindexnow).find('.pfobj').show(0);
        $(this).parents('.ksslider .bd ul').find('li').eq(liindexnow).find('.pfobj').find('.pfobj-wrap').hide(0).stop().fadeIn(500)
    })

    //添加优惠卷
    $('.prolist2-ban,.prolist-ban,.flashban-btn-yhj').click(function () {
        var user_id = $('#user_id_a').val();
        var id = $(this).attr('data-id');
        //alert(id);
        if (user_id) {
            $.getJSON("/index.php/Common/check_youhui", {id: id}, function (result) {
                if (result.status == 1) {
                    $('.lqyhj,.chc').stop().fadeIn();
                    window.setTimeout(function () {
                        location.reload();
                    }, 3000);
                } else if (result.status == 2) {
                    $('.lqyhj3,.chc').stop().fadeIn();
                } else {
                    $('.lqyhj2,.chc').stop().fadeIn();
                    window.setTimeout(function () {
                        location.reload();
                    }, 3000);
                }

            });
        } else {
            //alert(11);
            $.getJSON("/index.php/Common/get_estatetitle", {id: id}, function (result) {
                $('.yhj .ctc-wrap p').attr('id', 'error_msg');
                $('.yhj,.chc').stop().fadeIn();
                $('#estate_id').val(id);
                $('.youhui').html(result.data);
            });


        }
    });

    //特殊优惠卷
    function te_youhui(id) {
        //alert(0)
        $.getJSON("/index.php/Common/check_login2", {id: id}, function (result) {
            //alert(result.data);
            if (result.status == 1) {
                $("#estate_id").val(id);
                $('.yhj,.chc').stop().fadeIn();
                $('.youhui').html(result.data);
            } else {
                if (result.status == 3) {
                    alert('已经领取');
                } else {
                    alert('还没登录');
                }
            }
        });
    }

    //会员中心删除收藏
    $('.delShouC').click(function () {
        if (confirm("确认删除所选的收藏楼盘吗？")) {
            var id = $(this).attr('data-id');
            var _this = $(this).parent().parent();
            //console.log(_this);
            _this.remove();
            $.getJSON("/index.php/Contrast/shoucang", {id: id}, function (result) {
                if (result.status == 1) {
                    alert('操作成功');
                    _this.remove();

                } else {

                    if (result.data == 'noneuser') {
                        alert('还没登录');
                    } else if (result.data == 'failedjian') {
                        alert('网络错误，请重新操作');
                    } else {
                        alert('非法操作');
                    }
                }
            });
        }
    });

    //会员中心收藏全选
    $('.allShouC').click(function () {
        if ($("input[type='checkbox']").is(':checked')) {
            $("ul.clearfix li a.b1").each(function (i) {
                $("ul.clearfix li div.m_sc-img").addClass('hh');
                $("ul.clearfix li a.b1").addClass('on');
            });
        } else {
            $("ul.clearfix li a.b1").each(function (i) {
                $("ul.clearfix li div.m_sc-img").removeClass('hh');
                $("ul.clearfix li a.b1").removeClass('on');
            });
        }

    });

    //会员中心有选择删除
    $('.allDellShouC').click(function () {
        if (confirm("确认删除所选的收藏楼盘吗？")) {
            $("ul.clearfix li a.on").each(function (i) {
                var id = $(this).next().attr('data-id');
                var _this = $(this).next().parent().parent();
                _this.remove();
                //console.log(_this);
                //alert(id);
                $.getJSON("/index.php/Contrast/shoucang", {id: id}, function (result) {
                    if (result.status == 1) {
                        //alert('操作成功');
                        //console.log($(this));
                        _this.remove();
                        window.location.href = window.location.href;
                    }
                });
            });
        }
    });

    //会员中心浏览历史全选
    $('.allHistory').click(function () {
        if ($("input[type='checkbox']").is(':checked')) {
            $("ul.clearfix li a.b1").each(function (i) {
                $("ul.clearfix li div.m_sc-img").addClass('hh');
                $("ul.clearfix li a.b1").addClass('on');
            });
        } else {
            $("ul.clearfix li a.b1").each(function (i) {
                $("ul.clearfix li div.m_sc-img").removeClass('hh');
                $("ul.clearfix li a.b1").removeClass('on');
            });
        }

    });

    //会员中心有选择删除
    $('.allDellHistory').click(function () {
        if (confirm("确认删除所选的历史记录吗？")) {
            $("ul.clearfix li a.on").each(function (i) {
                var id = $(this).next().attr('data-id');
                var _this = $(this).next().parent().parent();
                _this.remove();
                //console.log(_this);
                //alert(id);
                $.getJSON("/index.php/Contrast/dellHistory", {id: id}, function (result) {
                    if (result.status == 1) {
                        //alert('操作成功');
                        //console.log($(this));
                        _this.remove();
                        window.location.href = window.location.href;
                    }
                });
            });
        }
    });

    $("#nav li").eq(1).mouseenter(function () {
        $(".nav2_bg").show();
    });

    $("#nav li").eq(2).mouseenter(function () {
        $(".nav2_bg").show();
    });

    $("#nav li").mouseleave(function () {
        $(".nav2_bg").hide();
    });

    $(".prolist2 li").hover(function () {
        var _this = $(this);
        _this.find('.prolist2-tc').stop().animate({'bottom': 0}, 250, function () {
            _this.addClass('show');
        });
    }, function () {
        $(this).removeClass('show');
        $(this).find('.prolist2-tc').stop().animate({'bottom': '-55px'}, 250);
    });

    $('.housecho-list li h5').click(function () {
        if (!$(this).parent('li').hasClass('on')) {
            $('.housecho-list-pop').stop().slideUp();
            $('.housecho-list li').removeClass('on');
            $(this).parent('li').addClass('on');
            $(this).parent('li').find('.housecho-list-pop').stop().slideDown();
        } else {
            $(this).parent('li').removeClass('on');
            $(this).parent('li').find('.housecho-list-pop').stop().slideUp();
        }
    });

    $(".gps").click(function () {
        iBoxWidth = $(".gps_pop_alert").width();
        iBoxHeight = $(".gps_pop_alert").height();
        iWinWidth = $(window).width();
        iWinHeight = $(window).height();
        $(".gps_pop_alert").css("left", (iWinWidth / 2 - iBoxWidth / 2) + "px");
        $(".gps_pop_alert").css("top", (iWinHeight / 2 - iBoxHeight / 2) + "px");
        $(".gps_pop_alert").show();
        $(".chc").show();
    });

    $(".close").click(function () {
        $(".gps_pop_alert").hide();
        $(".chc").hide();
    })

    //尾部
    var hei = 0;
    $(".footer .a1 li").each(function () {
        if ($(this).height() > hei) {
            hei = $(this).height();
        }
    })

    if (hei > 50) {
        $(".footer .a1 li").css("height", hei);
    }
    
    $('#cite0').bind('input propertychange', function () {
        $('#f2v').val($(this).val());
        $('#gusuan1').html('估算总价：' + $(this).val() / 10000 + '万元/套');
    });

    $('.shangqiao').click(function () {
        openWin('{$shangqiao}');
    });

    /*侧边在线咨询，二维码*/
    $(window).scroll(function () {
        var top = $(window).scrollTop();
        if (top > 100) {
            $('.myside').fadeIn(800);
        } else {
            $('.myside').fadeOut(800);
        }
    });
});

jQuery.divselect = function (divselectid, inputselectid) {
    var inputselect = $(inputselectid);
    $(divselectid + " cite").click(function () {
        var ul = $(divselectid + " ul");
        if (ul.css("display") == "none") {
            ul.slideDown("fast");
        } else {
            ul.slideUp("fast");
        }
    });
    $(divselectid + " ul li a").click(function () {
        var txt = $(this).text();
        $(divselectid + " cite").html(txt);
        var value = $(this).attr("selectid");
        if ($(this).attr('data-id') == 'p') {
            var va2 = $(this).attr("selectid2");
            if (va2 != '') {                                
                $('#bb0').html(va2);
            }
            if (value != '') {
                $('#gusuan1').html('估算总价：');
                $('#gusuan1').html('估算总价：' + value / 10000 + '万元/套');
            }
            $('#cite0').val(value);
        }
        inputselect.val(value);
        $(divselectid + " ul").hide();

    });
    $(document).bind("click", function (e) {
        var target = $(e.target);
        if (target.closest(divselectid).length == 0) {
            $(divselectid + " ul").hide();
        }
    })


};

/*
 * jQuery placeholder, fix for IE6,7,8,9
 * @author JENA
 * @since 20131115.1504
 * @website ishere.cn
 */
var JPlaceHolder = {
    //检测
    _check: function () {
        return 'placeholder' in document.createElement('input');
    },
    //初始化
    init: function () {
        if (!this._check()) {
            this.fix();
        }
    },
    //修复
    fix: function () {
        jQuery(':input[placeholder]').each(function (index, element) {
            var self = $(this), txt = self.attr('placeholder');
            self.wrap($('<div></div>').css({position: 'relative', zoom: '1', border: 'none', background: 'none', padding: 'none', margin: 'none'}));
            var pos = self.position(), h = self.outerHeight(true), ti = self.css('text-indent');
            paddingleft = self.css('padding-left');
            var holder = $('<span></span>').text(txt).css({position: 'absolute', 'text-indent': ti, left: pos.left, top: pos.top, height: h, lineHeight: h + 'px', paddingLeft: paddingleft, color: '#aaa'}).appendTo(self.parent());
            self.focusin(function (e) {
                holder.hide();
            }).focusout(function (e) {
                if (!self.val()) {
                    holder.show();
                }
            });
            holder.click(function (e) {
                holder.hide();
                self.focus();
            });
        });
    }
};
//执行
jQuery(function () {
    JPlaceHolder.init();
});
