
/**
 *content  : 显示json 值
 *time : 2016年12月20日11:48:19
 *参数  obj:对象       attr:属性名
 */

function writeObj(obj) {
    var description = "";
    for (var i in obj) {
        var property = obj[i];
        description += i + " = " + property + "\n";
    }
    alert(description);
}

//获得对象的属性值（可用jquery替代）
/**
 *参数  obj:对象       attr:属性名
 */
function getStyle(obj, attr) {
    var val = 0;
    if (obj.currentStyle) {
        val = obj.currentStyle[attr];
    } else {
        val = getComputedStyle(obj, null)[attr];
    }
    return parseFloat(val);
}



//选择器
//例如:var Odiv = getEles('#div1');
/**
 *参数  selector:支持三种选择器（id,class,element）
 */
function getEles(selector) {
    var char = selector.substring(0, 1);
    var name = selector.substr(1);
    switch (char) {
        case '#':
            return document.getElementById(name);
            break;
        case '.':
            var arr = [];
            var allEles = document.getElementsByTagName('*');
            for (var i = 0; i < allEles.length; i++) {
                if (allEles[i].className == name)
                    arr.push(allEles[i]);
            }
            return arr;
            break;
        default :
            return document.getElementsByTagName(selector);
    }
}


//添加侦听事件
var myEvent = {
    addEvent: function (obj, type, func) {
        if (obj.attachEvent) {
            obj.attachEvent(type, func);
        } else {
            obj.addEventListener(type.substring(2), func);
        }
    },
    removeEvent: function (obj, type, func) {
        if (obj.detachEvent) {
            obj.detachEvent(type, func);
        } else {
            obj.removeEventListener(type.substring(2), func);
        }
    },
    cb: function (ev) {
        var objE = window.event || ev;
        objE.cancelBubble = true;
        return objE;
    }
};

/**
 *参数 theForm:表单的id   url:提交的目标地址     result:用于提示的标签的id       callback:回调函数（选填）
 *返回 info:信息          status:状态            url:跳转地址 （这三个东东是ThinkPHP的success和error的返回）
 */
function mySubmit(theForm, url, result) {

    function default_callback(res) {
        result.html(res.info);
        if (res.status == '1') {
            //document.getElementById(theForm).reset();
            if (res.url != '') {
                location.href = res.url;
            } else {
                window.setTimeout(function () {
                    result.html('');
                }, 2000);
            }
        }
    }
    
    var callback = arguments[3] || default_callback;
    var result = $('#' + result);
    result.html('loading...');
    var data = $('#' + theForm).serialize();//2014/10/07更新\
    $.post(url, data, callback, 'json');
    return false;
}

function reflash(res) {
    if (res.url == 1) {
        $("#error_msg").html(res.info);
        $("#error_msg1").html(res.info);
    } else {
        $("#error_msg").html(res.info);
        $("#error_msg1").html(res.info);
        window.setTimeout(function () {
            $('.thistc ').hide();
            $('.chc').hide();
            $('.ctc-txt').val('');
            $('.error_msg').each(function () {
                $(this).attr('id', '');
                $(this).text('');
            });
        }, 1000);
        $.post('/Common/send_mail', {sendcon: res.send_con}, function () {
//            location.reload();
        });
    }
}


/*if(result.data=='noneuser'){
 //alert('还没登录');
 $('.ydl .ctc-wrap p').attr('id','error_msg');
 $('.ydl,.chc').stop().fadeIn();
 }*/
function Subsucc3(res) {

    if (res.status == 1) {
        // $('.dycg,.chc').stop().fadeIn();
        //$('dycg').html('您的问题已提交成功，请等待审核！');
        $("#error_Estate").html('您的问题已提交成功，请等待审核！');
        window.setTimeout(function () {
            location.reload();
        }, 2000);

    } else {
        if (res.data == 'noneuser') {
            $('.ydl,.chc').stop().fadeIn();
        } else if (res.data == 'mustt') {
            $("#error_Estate").html('标题必填');
        } else if (res.data == 'faile') {
            $("#error_Estate").html('您的问题提交失败，请重新提交！');
        }
    }
}

function Subsucc(res) {

    if (res.status == 0) {
        $("#error_Subscribe").html(res.info);
    } else {
        //alert(res.info);
        $('.dycg2,.chc').stop().fadeIn();
        $("#error_Subscribe").html(res.info);
        window.setTimeout(function () {
            $('.thistc ').hide();
            $('.chc').hide();
            $('.ctc-txt').val('');
            $('.error_msg').each(function () {
                $(this).attr('id', '');
                $(this).text('');
            });
        }, 1000);
        $.post('/Common/send_mail', {sendcon: res.send_con}, function () {
        });
    }
}
function Subsucc1(res) {

    if (res.url == 1) {
        $("#error_Subscribe1").html(res.info);
    } else {
        //alert(res.info);
        
        $("#error_Subscribe1").html(res.info);
        window.setTimeout(function () {
            $('.thistc ').hide();
            $('.chc').hide();
            $('.ctc-txt').val('');
            $('.error_msg').each(function () {
                $(this).attr('id', '');
                $(this).text('');
            });
        }, 1000);
        $.post('/Common/send_mail', {sendcon: res.send_con}, function () {
        });
    }
}

function Subsucc2(res) {
    if (res.url == 1) {
        $("#error_msg").html(res.info);
    } else {
        //alert(res.info);
        $(".dycg2 .dycg2-cnt h5").html('评论成功');
        $(".dycg2 .dycg2-cnt p").html(res.info);
        $('.dycg2,.chc').stop().fadeIn();
        $("#error_msg").html(res.info);
        window.setTimeout(function () {
            location.reload();
        }, 3000);

    }

}

function Subsucc4(res) {
    if (res.status == 1) {
        // $('.dycg,.chc').stop().fadeIn();
        //$('dycg').html('您的问题已提交成功，请等待审核！');
        $("#error_msg").html('您的问题已提交成功，请等待审核！');
        window.setTimeout(function () {
            location.reload();
        }, 2000);
    } else {
        if (res.data == 'noneuser') {
            $('.ydl,.chc').stop().fadeIn();
        } else if (res.data == 'mustt') {
            $("#error_msg").html('标题必填');
        } else if (res.data == 'faile') {
            $("#error_msg").html('您的问题提交失败，请重新提交！');
        }
    }
}


//优惠卷领取成功
function Youhuisucc(res) {
    //alert(111);
    if (res.url == 1) {
        $("#error_msg").html(res.info);
    } else {
        $('.zhezhao').stop().fadeOut();
        $('.chc,.thistc').stop().fadeOut();
        $('.lqyhj,.chc').stop().fadeIn();
        $("#error_msg").html(res.info);
        window.setTimeout(function () {
            $('.thistc ').hide();
            $('.chc').hide();
            $('.ctc-txt').val('');
            $('.error_msg').each(function () {
                $(this).attr('id', '');
                $(this).text('');
            });
        }, 1000);
        $.post('/Common/send_mail', {sendcon: res.send_con}, function () {
//            location.reload();
        });
//        window.setTimeout(function() {
//            location.reload();
//        }, 3000);
    }
}
//豪宅返回信息
function hzreturn(res) {
    if (res.url == 1) {
        $("#error_ms").html(res.info);
    } else {
        $('.zhezhao').stop().fadeOut();
        $('.chc,.thistc').stop().fadeOut();
        $('.order,.chc').stop().fadeIn();
        $("#error_ms").html(res.info);
        window.setTimeout(function () {
            $('.thistc ').hide();
            $('.chc').hide();
            $('.ctc-txt').val('');
            $('.error_msg').each(function () {
                $(this).attr('id', '');
                $(this).text('');
            });
        }, 1000);
        $.post('/Common/send_mail', {sendcon: res.send_con}, function () {
//            location.reload();
        });

//        window.setTimeout(function() {
//            location.reload();
//        }, 3000);
    }
}

//返回顶部
/**
 @功能  回到顶部    PS:不只能滚动window对象的滚动条，也可以滚动对象（如：div、textarea）的滚动条
 @参数  target(选填):滚动的目标对象   iteration(选填):迭代的时间（执行一步的时间，越小越快,单位为毫秒）
 */
function toTop() {
    var stage = window.chrome ? document.body : document.documentElement;
    var target = arguments[0] || stage;
    var iteration = arguments[1] || 10;
    var offsetTop = arguments[2] || 0;

    target.timer = window.setInterval(function () {
        target.scrollTop = target.scrollTop + (offsetTop - target.scrollTop) / 10;
        if (target.scrollTop <= offsetTop)
            window.clearInterval(target.timer);
    }, iteration);
}


//固定一个元素
/**
 *参数  _target:目标元素       _top:高度
 */
function fixed(_target, _top) {
    var duration = arguments[2] || 500;
    $(window).scroll(function () {
        var scrollTop = $(window).scrollTop();
        _target.stop().animate({top: scrollTop + _top}, duration);
    });
}


//无缝滚动
/**
 *参数  _target:目标元素       direction:滚动方向        speed:速度(越小越快)
 */
function myScroll(_target) {
    _target = document.getElementById(_target);
    _target.style.overflow = 'hidden';
    var direction = arguments[1] || 'up';
    var speed = arguments[2] || 30;

    var oUl = _target.getElementsByTagName('ul');
    oUl[0].innerHTML += oUl[0].innerHTML;
    var eles = _target.getElementsByTagName('li');
    if (direction == 'left' || direction == 'right') {
        oUl[0].style.width = eles.length * getStyle(eles[0], 'width') + 'px';
        //_target.style.width = getStyle(oUl[0],'width')/2 + 'px';
    }

    if (direction == 'up' || direction == 'down') {
        oUl[0].style.height = eles.length * getStyle(eles[0], 'height') + 'px';
        _target.style.height = getStyle(oUl[0], 'height') / 2 + 'px';
    }

    var oH = getStyle(_target, 'height');
    var oW = getStyle(_target, 'width');
    var ttH = getStyle(oUl[0], 'height') - oH;
    var ttW = getStyle(oUl[0], 'width') - oW;

    function loop() {
        switch (direction) {
            case 'up':
                if (_target.scrollTop <= ttH) {
                    _target.scrollTop++;
                } else {
                    _target.scrollTop = 0;
                }
                break;
            case 'down':
                if (_target.scrollTop == 0) {
                    _target.scrollTop = ttH + oH;
                } else {
                    _target.scrollTop--;
                }
                break;
            case 'left':
                if (_target.scrollLeft <= ttW) {
                    _target.scrollLeft++;
                } else {
                    _target.scrollLeft = 0;
                }
                break;
            case 'right':
                if (_target.scrollLeft == 0) {
                    _target.scrollLeft = ttW + oW;
                } else {
                    _target.scrollLeft--;
                }
                break;
        }
    }

    _target.time = window.setInterval(loop, speed);
    _target.onmouseover = function () {
        window.clearInterval(_target.time);
    };

    _target.onmouseout = function () {
        _target.time = window.setInterval(loop, speed);
    };
}


//让html的元素可以编辑（主要是a和span标签）
/**
 *参数  _target:目标元素(jquery的选择器)
 */
function editable(_target) {
    var len = _target.length;
    if (len < 1)
        return false;
    for (var i = 0; i < len; i++) {
        var type = _target.get(i).type;
        if (type)
            return false;
        _target.eq(i).click(function () {
            var input = $("<input type='text'/>");
            var _this = $(this);
            input.css({
                'width': _this.width(),
                'height': _this.height(),
                'font-size': _this.css('font-size'),
                'font-weight': _this.css('font-weight'),
                'color': _this.css('color')
            });
            $(_this).after(input);
            input.val($(_this).html());
            input.select();

            $(_this).hide();
            input.blur(function () {
                $(_this).html(input.val());
                $(_this).show();
                input.remove();
            });

            return false;
        });
    }
}


//获取字符串里的参数
//例如:var id = location.search.getQuery('id');
/**
 *参数  _name:参数名（选填，不填返回所有参数)
 */
//String.prototype.getQuery = function() {
//    var url = this;
//    var offset = url.indexOf('?');
//    if (offset == -1)
//        return false;
//    offset += 1;
//    url = url.substr(offset);
//    var arr = url.split('&');
//    var args = new Object();
//    arr.forEach(function(_this) {
//        var arr2 = _this.split('=');
//        args[arr2[0]] = UrlDecode(arr2[1]);
//    });
//
//    var _name = arguments[0] || null;
//    return _name ? args[_name] : args;
//}
String.prototype.getQuery = function () {

    var num = 0;
    var url = this;
    var offset = url.indexOf('?');
    var args = new Object();
    var _name = arguments[0] || null;
    if (offset == -1) {
        offset = url.indexOf('index.php');
        num = 11
        url = url.substr(num);
        var arr = url.split('/');
        arr.forEach(function (_this, i) {
            if (_this == _name) {
                args[_name] = UrlDecode(arr[i + 1]);
            }
        });
    } else {
        num = 1
        url = url.substr(num);
        var arr = url.split('&');
        arr.forEach(function (_this, i) {
            var arr2 = _this.split('=');
            args[arr2[0]] = UrlDecode(arr2[1]);
        });
    }
    return _name ? args[_name] : args;
}


//删除数组元素
/**
 *参数  dx:数组索引
 */
Array.prototype.remove = function (dx) {
    if (isNaN(dx) || dx > this.length) {
        return false;
    }
    for (var i = 0, n = 0; i < this.length; i++) {
        if (this[i] != this[dx]) {
            this[n++] = this[i]
        }
    }
    this.length -= 1
}

//数组查找元素
/**
 *参数  _value:数组索引
 */
Array.prototype.find = function (_value) {
    for (var i = 0, len = this.length; i < len; i++) {
        if (this[i] == _value) {
            return i;
            break;
        }
    }
    return -1;
}

//对象长度
/**
 *参数  obj:对象（一般为数组对象）
 */
function count(obj) {
    var num = 0;
    for (var i in obj) {
        num++;
    }
    return num;
}


//对象转json
/**
 *参数  o:对象（一般为数组对象）
 */
function ObjToJSON(o) {
    if (o == null)
        return "null";

    switch (o.constructor) {
        case String:
            var s = o; // .encodeURI();
            if (s.indexOf("}") < 0)
                s = '"' + s.replace(/(["\\])/g, '\\$1') + '"';
            s = s.replace(/\n/g, "\\n");
            s = s.replace(/\r/g, "\\r");
            return s;
        case Array:
            var v = [];
            for (var i = 0; i < o.length; i++)
                v.push(ObjToJSON(o[i]));
            if (v.length <= 0)
                return "\"\"";
            return "[" + v.join(",") + "]";
        case Number:
            return isFinite(o) ? o.toString() : ObjToJSON(null);
        case Boolean:
            return o.toString();
        case Date:
            var d = new Object();
            d.__type = "System.DateTime";
            d.Year = o.getUTCFullYear();
            d.Month = o.getUTCMonth() + 1;
            d.Day = o.getUTCDate();
            d.Hour = o.getUTCHours();
            d.Minute = o.getUTCMinutes();
            d.Second = o.getUTCSeconds();
            d.Millisecond = o.getUTCMilliseconds();
            d.TimezoneOffset = o.getTimezoneOffset();
            return ObjToJSON(d);
        default:
            if (o["toJSON"] != null && typeof o["toJSON"] == "function")
                return o.toJSON();
            if (typeof o == "object") {
                var v = [];
                for (attr in o) {
                    if (typeof o[attr] != "function")
                        v.push('"' + attr + '": ' + ObjToJSON(o[attr]));
                }

                if (v.length > 0)
                    return "{" + v.join(",") + "}";
                else
                    return "{}";
            }
            return o.toString();
    }
}


//追加地址参数（参数不存在则追加，参数存在则修改）  @Create By TuJia
/**
 *参数  _name:参数名     _value:参数值
 @ps    此函数默认使用的url模式为普通模式，在使用thinkphp等支持pathinfo url地址模式的框架时，请填写上第三个参数'/'
 @ps2   2014/5/26 增加有子目录的pathinfo地址的支持(制作英文版可以会用到)，第四个参数为子目录，如："/en"
 @例如  js_aup('p','3','/','/en');
 */

function js_aup(_name, _value) {
    var delimter = arguments[2] || '/';
    var subcatalog = arguments[3] || '';
    var just_return = arguments[4] || false;
    var location_search = arguments[5] || location.search;
    var newurl = '';
    if (delimter == '/') {
        var keywords = $("#keywords").val();
        if (keywords == '') {
            var query_string = location.pathname.replace(subcatalog, '').replace(/keywords\//, "").replace(/undefined\//, "");
        } else {
            var query_string = location.pathname.replace(subcatalog, '').replace(/undefined\//, "");
        }

        var arr = query_string.split('/');
        var paremters_obj = {};
        for (var i = 3; i < arr.length; i += 2) {
            paremters_obj[arr[i]] = arr[i + 1];
        }
        if (_value === null) {
            delete(paremters_obj[_name]);
        } else {
            paremters_obj[_name] = _value;
        }
        for (var key in paremters_obj) {
            newurl += key + '/' + paremters_obj[key] + '/';
        }
        newurl = subcatalog + arr[0] + '/' + arr[1] + '/' + arr[2] + '/' + newurl.substr(0, newurl.length - 1);
    } else {
        var paramters = location_search.getQuery();
        if (paramters == false) {
            newurl = '?' + _name + '=' + _value;
        } else {
            if (_value === null) {
                delete(paramters[_name]);
            } else {
                paramters[_name] = _value;
            }
            for (var key in paramters) {
                newurl += key + '=' + paramters[key] + '&';
            }
            newurl = '?' + newurl.substr(0, newurl.length - 1);
        }
    }

    if (newurl == '?') {
        newurl = document.url || location.href;
        newurl = newurl.replace(location.search, '');
    }

    if (just_return) {
        return newurl;
    } else {
        location.href = newurl;
    }
}

function js_aupa(_name, _value) {
    var url = js_aup(_name, _value, '/', '', true);

    var keywords = $("#keywords").val();
    if (keywords == '') {
        newurl = url.replace(/keywords\//, "").replace(/undefined\//, "").replace("/" + _name + "\/", "");
    } else {
        newurl = url.replace(/undefined\//, "").replace("/" + _name + "\/", "");
    }

    location.href = newurl;
}

$(".js_cl").click(function () {
    if ($(this).attr('data-id') != 'none') {
        js_aup('order', $(this).attr('data-id') + ',' + $(this).attr('data-up'), '/');
    } else {
        js_aupa('order', '', '/');
    }

});
function changeurl() {
    var domain = "http://" + window.location.host + '/Villa/villaList';
    url = domain + '/keywords/' + $("#s_keywords").val();
    if ($("#s_keywords").val() == '') {
        url = domain;
    }
    location.href = url;
}



//多选的追加地址参数函数  Create By TuJia @2014/10/27
/**
 *参数  _name:参数名     _value:参数值
 */
function js_aup2(_name, _value) {
    var the_value = location.search.getQuery(_name) || '';//获取地址参数
    var value_arr = the_value ? the_value.split(',') : [];//转换成数组
    if (value_arr.find(_value) < 0) {//不存在，追加
        value_arr.push(_value);
        the_value = value_arr.join(',');
    }
    js_aup(_name, the_value);
}


//交换的追加地址参数函数  Create By TuJia @2014/10/27
/**
 *功能  存在则去除，不存在就添加
 *参数  _name:参数名     _value:参数值
 */
//function js_aup3(_name, _value, just_return, location_search) {
//    var the_value = location.search.getQuery(_name) || '';//获取地址参数
//    if (the_value == '')
//        return false;
//    if (the_value)
//        _value = null;
//
//    if (just_return) {
//        return js_aup(_name, _value, '/', '', true, location_search);
//    } else {
//        js_aup(_name, _value);
//    }
//}
function js_aup3(_name, _value, just_return, location_search) {
    var url = location.search;
    if (!url) {
        var url = location.pathname;
    }
    var the_value = url.getQuery(_name) || '';//获取地址参数
    if (the_value == '')
        return false;
    if (the_value)
        _value = null;

    if (just_return) {
        return js_aup(_name, _value, '', '', true, location_search);
    } else {
        js_aup(_name, _value);
    }
}


//取消多选地址参数  Create By TuJia @2014/11/9
/**
 *功能  js_aup2对应的取消函数
 *参数  _name:参数名     _value:参数值
 */
//function js_aup4(_name, _value) {
//    var the_value = location.search.getQuery(_name) || '';//获取地址参数
//    if (the_value == _value) {//只剩下唯一值
//        js_aup3(_name, _value);
//        return false;
//    }
//    var value_arr = the_value ? the_value.split(',') : [];//转换成数组
//    var _index = value_arr.find(_value);
//    if (_index < 0) {//不存在，追加
//        value_arr.push(_value);
//    } else {
//        value_arr.remove(_index);
//    }
//    the_value = value_arr.join(',');
//    js_aup(_name, the_value);
//}
function js_aup4(_name, _value) {

    var url = location.search;
    if (!url) {
        var url = location.pathname;
    }

    var the_value = url.getQuery(_name) || '';//获取地址参数

    if (the_value == _value) {//只剩下唯一值

        js_aup3(_name, _value);
        return false;
    }
    var value_arr = the_value ? the_value.split(',') : [];//转换成数组
    var _index = value_arr.find(_value);
    if (_index < 0) {//不存在，追加
        value_arr.push(_value);
    } else {
        value_arr.remove(_index);
    }
    the_value = value_arr.join(',');
    js_aup(_name, the_value);
}


//追加多个参数
function js_aup5(param) {
    var newurl = '';
    for (var i = 0, len = param.length; i < len; i++) {
        newurl = js_aup(param[i]['_name'], param[i]['_value'], '&', '', true, newurl);
    }
    location.href = newurl;
}


//删除某个参数再追加
function js_aup6(_name, _value, _cancel) {
    var location_search = js_aup3(_cancel, '', true);
    js_aup(_name, _value, '', '', '', location_search);
}


//删除多个参数
function js_aup7() {
    var len = arguments.length;
    var location_search = '';
    for (var i = 0; i < len; i++) {
        if (location.search.getQuery(arguments[i]) == undefined)
            continue;
        location_search = js_aup3(arguments[i], '', true, location_search);
    }
    location.href = location_search;
}


//设为首页;
function SetHome(obj, url) {
    // if (url == undefined) url = location.host;
    try {
        obj.style.behavior = "url(#default#homepage)";
        obj.SetHomePage(url);
    } catch (e) {
        if (window.netscape) {
            try {
                netscape.security.PrivilegeManager.enablePrivilege("UniversalXPConnect");
            } catch (e) {
                alert("\u62B1\u6B49\uFF01\u60A8\u7684\u6D4F\u89C8\u5668\u4E0D\u652F\u6301\u76F4\u63A5\u8BBE\u4E3A\u9996\u9875\u3002\u8BF7\u5728\u6D4F\u89C8\u5668\u5730\u5740\u680F\u8F93\u5165\u201Cabout:config\u201D\u5E76\u56DE\u8F66\u7136\u540E\u5C06[signed.applets.codebase_principal_support]\u8BBE\u7F6E\u4E3A\u201Ctrue\u201D\uFF0C\u70B9\u51FB\u201C\u52A0\u5165\u6536\u85CF\u201D\u540E\u5FFD\u7565\u5B89\u5168\u63D0\u793A\uFF0C\u5373\u53EF\u8BBE\u7F6E\u6210\u529F\u3002");
            }
            var prefs = Components.classes['@mozilla.org/preferences-service;1'].getService(Components.interfaces.nsIPrefBranch);
            prefs.setCharPref("browser.startup.homepage", url);
        }
    }
}

// 加入收藏夹;
var addBookmark = function (title) {
    if (title == undefined)
        title = document.title;
    // var url = window.location.href;

    try {
        //IE 
        window.external.addFavorite(url, title);
    } catch (e) {
        try {
            //Firefox;
            window.sidebar.addPanel(title, url, "");
        } catch (e) {
            alert("您的浏览器不支持自动加入收藏，请手动设置！", "提示信息");
        }
    }

}


//附加功能（kindeditor编辑的简单调用方法）
//例如:add_kindeditor(".content");
/**
 *参数  selector:选择器   simple:是否使用简易的编辑器
 */
function add_kindeditor(selector, simple, c_items) {
    var editor;
    var _items = ['source', 'fontname', 'fontsize', '|', 'forecolor', 'hilitecolor', 'bold', 'italic', 'underline',
        'removeformat', '|', 'justifyleft', 'justifycenter', 'justifyright', 'insertorderedlist',
        'insertunorderedlist', '|', 'emoticons', 'image', 'link'];

    if (c_items)
        _items = c_items;
    if (simple) {
        editor = KindEditor.create(selector, {
            allowFileManager: true,
            items: _items,
            afterBlur: function () {
                this.sync();
            }//失去焦点时同步
        });
    } else {
        editor = KindEditor.create(selector, {
            allowFileManager: true,
            afterBlur: function () {
                this.sync();
            }//失去焦点时同步
        });
    }
    return editor;
}



//加一层黑色半透明的的遮罩
//例如:add_mask();
/**
 *参数  zIndex:可选参数，层的高度
 */
function add_mask() {
    var zIndex = arguments[0] || false;
    var stageWidth = window.document.body.clientWidth;
    var stageHight = window.document.body.clientHeight;
    var oDiv = document.createElement('div');
    oDiv.style = "width:" + stageWidth + "px; height:" + stageHight + "px; position:fixed; left:0; top:0; background-color:black; opacity:0.7;";
    if (zIndex)
        oDiv.style.zIndex = zIndex;
    document.body.appendChild(oDiv);
    return oDiv;
}


/*js电话验证*/
function is_tel(tel) {
    var reg = /^([0-9]{3,4}-)?[0-9]{7,8}$/;
    if (!reg.test(tel)) {
        return false;
    }
    return true;
}


/*js手机验证*/
function is_phone(phone) {
    var reg = /^(13[0-9]|15[0|3|6|7|8|9]|18[0-9])\d{8}$/;
    if (!reg.test(phone)) {
        return false;
    }
    return true;
}


/*js邮箱验证*/
function is_email(email) {
    var reg = /^[0-9a-zA-Z]+(?:[\_\.\-][a-z0-9\-]+)*@[a-zA-Z0-9]+(?:[-.][a-zA-Z0-9]+)*\.[a-zA-Z]+$/i;
    if (!reg.test(email)) {
        return false;
    }
    return true;
}


/*qq邮箱验证*/
function is_qq(qq) {
    var reg = /^[1-9]{1}[0-9]{4,8}$/;
    if (!reg.test(qq)) {
        return false;
    }
    return true;
}


/*用户名验证*/
function is_username(username) {
    var reg = /^[1-9]{1}[0-9]{4,8}$/;
    if (!reg.test(username)) {
        return false;
    }
    return true;
}


/*密码验证*/
function is_password(password) {
    var reg = /^[1-9]{1}[0-9]{4,8}$/;
    if (!reg.test(password)) {
        return false;
    }
    return true;
}

//按字段冒泡排序
/**
 *参数  key:字段
 */
Array.prototype.bubbleSort = function (key, order) {
    if (!order)
        order = 'asc';
    var count = this.length;
    for (var i = 0; i < count; i++) {
        for (var j = i + 1; j < count; j++) {
            if (order == 'asc') {
                if (this[j][key] < this[i][key]) {
                    var temp = this[i];
                    this[i] = this[j];
                    this[j] = temp;
                }
            } else {
                if (this[j][key] > this[i][key]) {
                    var temp = this[i];
                    this[i] = this[j];
                    this[j] = temp;
                }
            }
        }
    }
}

/**
 *倒计时
 @author TUJIA 2014/08/26
 */
function timer(container) {
    var oneday = 3600 * 24;//一天的时间
    var day, hour, minute, second;
    var lefttime = parseInt(container.innerHTML);

    container.innerHTML = '启动中...';

    window.setInterval(function () {
        lefttime--;
        if (lefttime < 0) {
            location.reload();
            return false;
        }

        day = Math.floor(lefttime / oneday);//还有几天
        hour = Math.floor((lefttime - day * oneday) / 3600);//还有几小时
        minute = Math.floor((lefttime - day * oneday - 3600 * hour) / 60);//还有几小时
        second = lefttime - day * oneday - 3600 * hour - 60 * minute;//还有几秒

        container.innerHTML = day + '天' + hour + '小时' + minute + '分钟' + second + '秒';
    }, 1000);
}


/*
 @author TuJia @2014/10/15
 @功能 ：创建地区控件
 @参数 ：   
 $container 显示的容器
 $position  示例 {'province':6, 'city':76, 'district':698}  “广东省广州市越秀区” 
 @返回 ：一个包含 province(省), city(市), district(区)的select下拉列表的html文件
 备注  : 控制器 Control  方法 position  模版：tpl/Control/position
 */
function Create_Position($container, $position) {
    $.get('index.php?m=Control&a=position', $position, function (res) {
        $container.html(res);
    }, 'html');
}




/*
 @author TuJia @2014/10/15
 @功能 ：创建相册控件
 @参数 ：   
 $container      显示的容器
 $id_value       相册分类id
 $thumb_width    相册缩略图的宽度  （为空则不生成缩略图）
 $thumb_height   相册缩略图的高度  （为空则不生成缩略图）
 @返回 ：一个包含批量上传图片插件的html文件
 */
function Create_Album($container, $id_value, $thumb_width, $thumb_height) {
    var $data = {'id_value': $id_value, 'thumb_width': $thumb_width, 'thumb_height': $thumb_height};
    $.get('index.php?m=Control&a=album', $data, function (res) {
        $container.html(res);
    }, 'html');
}


//异步查文章列表
function insert_article_list(cat_id, tpl, page, page_size, contain) {
    var data = {'cat_id': cat_id, 'tpl': tpl, 'p': page, 'page_size': page_size, 'contain': contain};
    $.get("index.php?m=Info&a=get_article_list", data, function (res) {
        $('#' + contain).html(res);
    }, 'html')
}



//异步查信息列表
function insert_info_list(cat_id, state, tpl, page, page_size, contain, is_r) {
    var data = {'cat_id': cat_id, 'state': state, 'tpl': tpl, 'p': page, 'page_size': page_size, 'contain': contain, 'is_r': is_r};
    $.get("index.php?m=Info&a=get_info_list", data, function (res) {
        $('#' + contain).html(res);
    }, 'html')
}

//异步查评论列表
function insert_comment_list(id_value, rank_type, tpl, page, page_size, contain) {
    var data = {'id_value': id_value, 'rank_type': rank_type, 'tpl': tpl, 'p': page, 'page_size': page_size, 'contain': contain};
    $.post(web + "Info-get_comment_list.html", data, function (res) {
        $('#' + contain).html(res);
    }, 'html')
}




//设置可全屏的视频代码
function full_video(container, width, height) {
    var emb = container.find('embed');
    if (emb.length > 0) {
        var _src = emb.attr('src');
        var video = '<object height="' + height + '" width="' + width + '" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=7,0,19,0" classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000"><param value="' + _src + '" name="movie"><param value="high" name="quality"><param value="always" name="allowScriptAccess"><param name="allowFullScreen" value="true"><param value="internal" name="allowNetworking"><param value="transparent" name="wmode"><embed height="' + height + '" width="' + width + '" wmode="transparent" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" allownetworking="internal" allowscriptaccess="always" allowFullScreen="true" quality="high" src="' + _src + '"></object>';
        container.html(video);
    }
}




/************2015.01.07************/
//数字检测
function number_string(_val) {
    if (typeof (_val) != 'string')
        _val = _val + '';
    return /^[\d\.]+$/.test(_val);
}



//js属性筛选
function myFilters(hover_class) {
    var gets = location.search.getQuery();
    var args = arguments;
    var len = args.length;
    var last = true;
    for (var i = 1; i < len; i++) {
        $('.' + args[i]).each(function () {
            var _val = $(this).attr('val');
            if (_val == gets[args[i]]) {
                $(this).addClass(hover_class);
                last = false;
            }
        });
    }

    if (last == false)
        $('.' + args[i]).eq(0).addClass(hover_class);
}




//js版本 urldecode
function UrlDecode(zipStr) {
    var uzipStr = "";
    for (var i = 0; i < zipStr.length; i++) {
        var chr = zipStr.charAt(i);
        if (chr == "+") {
            uzipStr += " ";
        } else if (chr == "%") {
            var asc = zipStr.substring(i + 1, i + 3);
            if (parseInt("0x" + asc) > 0x7f) {
                uzipStr += decodeURI("%" + asc.toString() + zipStr.substring(i + 3, i + 9).toString());
                i += 8;
            } else {
                uzipStr += AsciiToString(parseInt("0x" + asc));
                i += 2;
            }
        } else {
            uzipStr += chr;
        }
    }

    return uzipStr;
}

function StringToAscii(str) {
    return str.charCodeAt(0).toString(16);
}
function AsciiToString(asccode) {
    return String.fromCharCode(asccode);
}

var mymy = 1;
function show_zan(q_id, type) {
    var mymy = 1;
    $('.d').each(function () {
        if ($(this).attr('data-id') == q_id) {
            alert("您已经点赞了！");
            mymy = 0;
            return false;
        }
    });
    if (mymy) {
        $.get("/index.php/Common/zan/q_id/" + q_id + "/type/" + type, function (res) {
            if (res.error == 1) {
                alert("您已经点赞了！");
            } else if (res.error == 2) {
                $('.ydl,.chc').stop().fadeIn();
                //alert("您还没登录，请先登录");
            } else if (res.error == 3) {
                alert("网络错误，请重新操作");
            } else {
//                console.log($(this));
                if (type == 1) {
                    $(".hre .tp").html(res.zan_num);
                    $(".hre .tp").addClass("d");
                } else {
                    $('.an-list-z').each(function () {
                        if ($(this).attr('data-id') == res.q_id) {
                            $(this).prev().html(res.zan_num);
                            $(this).prev().addClass("d");
                            $(this).html(res.zan_num);
                            $(this).addClass("d");
                        }
                    });
                }
            }
        }, 'JSON');
        mymy = 1;
    }
}

function show_url() {
    var keywords = $("#keywords").val();
    var domain = "http://" + window.location.host;
    //alert(domain+'/index.php/Guide/Search/keywords/'+keywords);
    if (keywords) {
        window.location.href = domain + '/guide/search/' + keywords;
    } else {
        window.location.href = domain + '/guide/search/';
    }
    //window.open("Search/keywords/"+keywords);
}
function show_news() {
    var keywords = $("#keywords").val();
    var domain = "http://" + window.location.host;
    //alert(domain+'/index.php/Guide/Search/keywords/'+keywords);
    if (keywords) {
        window.location.href = domain + '/news/keywords/' + keywords;
    } else {
        window.location.href = domain + '/news/list/';
    }
    //window.open("Search/keywords/"+keywords);
}

function show_hot() {
    $.get('/index.php/News/find_article/hot/1', function (res) {
        if (res) {
            $('.z_pdbox ul').html(res);
        }
    }, 'html');
}

function show_tui() {
    $.get('/index.php/News/find_article/hot/2', function (res) {
        if (res) {
            $('.Y_pic').html(res);
        }
    }, 'html');
}

function check_phone(phone)
{
    var submit_disabled = false;
    var code_type = $("#code_type").val();
    var type = 0;
    if (code_type == 4) {
        var type = $('#type').val();
    }
    if ((phone == ''))
    {
        document.getElementById('error_msg').innerHTML = '手机不能为空';
        var submit_disabled = true;
    }
    else if (!/^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/.test(phone))
    {
        document.getElementById('error_msg').innerHTML = '无效的手机号码';

        var submit_disabled = true;
    }
    else {
        if (code_type == 1 || code_type == 2 || code_type == 3) {
            $.get('/index.php/User/phone_registered/phone/' + phone, function (msgs) {
                if (msgs != 'true') {
                    if (code_type == 1) {
                        $("#get_code").removeAttr('onclick');
                        document.getElementById('error_msg').innerHTML = '该手机号码已经注册';
                        submit_disabled = true;
                    } else {
                        $("#get_code").attr('onclick', "send_code(this);");
                        document.getElementById('error_msg').innerHTML = '';
                        submit_disabled = false;
                    }

                } else {
                    if (code_type == 1) {
                        $("#get_code").attr('onclick', "send_code(this);");
                        document.getElementById('error_msg').innerHTML = '';
                        submit_disabled = false;
                    } else {
                        $("#get_code").removeAttr('onclick');
                        document.getElementById('error_msg').innerHTML = '该手机号码未注册';
                        submit_disabled = true;
                    }
                }
            }, 'html');
        }

    }


    if (submit_disabled)
    {
        //document.forms['formUser'].elements['Submit'].disabled = 'disabled';
        // document.getElementById('phone').focus();
        return false;
    }
    else
    {
        $("#get_code").attr('onclick', "send_code(this);");
        document.getElementById('error_msg').innerHTML = '';
        return true;
    }
}
function send_code(_this, id) {
    //var captcha = $('#captcha').val();

    var rand_key = $('#randKey').val();
    var code_type = $('#code_type').val();
    var phone = $('#phone').val();
    /*if((check_phone(phone) && check_code(captcha))){*/
    if (check_phone(phone, id)) {
        //alert(1);
        $.post('/index.php/Common/send_code/phone/' + phone + '/rand_key/' + rand_key + '/code_type/' + code_type, function (msgs) {
            if (msgs.status == '0') {
                fix_reg_code(_this);
            }
            else if (msgs.status == 'err')
            {
                document.getElementById('error_msg').innerHTML = '验证失败，刷新后重试！';

            }
            else if (msgs == 'ture') {
                return true;
            }
            else
            {
                document.getElementById('error_msg').innerHTML = '验证码发送异常，请稍后再试！';
            }
        }, 'json');
    }
    /*}*/
}



//锁定按钮
function fix_reg_code(_this) {
    $(_this).removeAttr('onclick');
    $(_this).css('color', '#3b94ee');
    $(_this).css('backgroundColor', '#f8f8f8');

    var secs = 1;
    var stt = window.setInterval(function () {
        if (secs == 121) {
            window.clearInterval(stt);
            $(_this).attr('onclick', "send_code(this);");
            $(_this).css('color', '#fff');
            $(_this).css('backgroundColor', '#006ce2');
            $(_this).val('获取验证码');
            secs = 1;
        } else {
            $(_this).val((120 - secs) + '秒后可重发');
            secs++;
        }
    }, 1000);
}



//获取优惠卷的判断
function check_phone2(phone)
{
    var submit_disabled = false;
    var code_type = $('#code_type').val();
    if ((phone == ''))
    {

        document.getElementById('error_msg').innerHTML = '手机不能为空';


        var submit_disabled = true;
    }
    else if (!/^(((13[0-9]{1})|(14[0-9]{1})|(15[0-9]{1})|(17[0-9]{1})|(18[0-9]{1}))+\d{8})$/.test(phone))
    {

        document.getElementById('error_msg').innerHTML = '无效的手机号码';

        var submit_disabled = true;
    }


    if (submit_disabled)
    {
        //document.forms['formUser'].elements['Submit'].disabled = 'disabled';
        // document.getElementById('phone').focus();
        return false;
    }
    else
    {


        $("#get_code").attr('onclick', "send_code2(this);");
        document.getElementById('error_msg').innerHTML = '';


        return true;
    }
}

function send_code2(_this) {
    //var captcha = $('#captcha').val();

    var rand_key = $('#randKey2').val();
    var code_type = $('#code_type2').val();
    var phone = $('#mobile').val();
    /*if((check_phone(phone) && check_code(captcha))){*/
    if (check_phone(phone)) {
        $.post('/index.php/Common/send_code/phone/' + phone + '/rand_key/' + rand_key + '/code_type/' + code_type, function (msgs) {
            if (msgs.status == '0') {
                fix_reg_code2(_this);
            }
            else if (msgs.status == 'err')
            {
                document.getElementById('error_msg').innerHTML = '验证失败，刷新后重试！';

            }
            else if (msgs == 'ture') {
                return true;
            }
            else
            {
                document.getElementById('error_msg').innerHTML = '验证码发送异常，请稍后再试！';
            }
        }, 'json');
    }
    /*}*/
}

//豪宅预约看房
function send_code3(_this) {
    //var captcha = $('#captcha').val();

    var rand_key = $('#randKey3').val();
    var code_type = $('#code_type3').val();
    var phone = $('#mobile2').val();
    /*if((check_phone(phone) && check_code(captcha))){*/
    if (check_phone(phone)) {
        $.post('/index.php/Common/send_code/phone/' + phone + '/rand_key/' + rand_key + '/code_type/' + code_type, function (msgs) {
            if (msgs.status == '0') {
                fix_reg_code3(_this);
            }
            else if (msgs.status == 'err')
            {
                document.getElementById('error_msg').innerHTML = '验证失败，刷新后重试！';

            }
            else if (msgs == 'ture') {
                return true;
            }
            else
            {
                document.getElementById('error_msg').innerHTML = '验证码发送异常，请稍后再试！';
            }
        }, 'json');
    }
    /*}*/
}


function fix_reg_code2(_this) {
    $(_this).removeAttr('onclick');
    $(_this).css('color', '#3b94ee');
    $(_this).css('backgroundColor', '#f8f8f8');

    var secs = 1;
    var stt = window.setInterval(function () {
        if (secs == 121) {
            window.clearInterval(stt);
            $(_this).attr('onclick', "send_code2(this);");
            $(_this).css('color', '#fff');
            $(_this).css('backgroundColor', '#006ce2');
            $(_this).val('获取验证码');
            secs = 1;
        } else {
            $(_this).val((120 - secs) + '秒后可重发');
            secs++;
        }
    }, 1000);
}
function fix_reg_code3(_this) {
    $(_this).removeAttr('onclick');
    $(_this).css('color', '#3b94ee');
    $(_this).css('backgroundColor', '#f8f8f8');

    var secs = 1;
    var stt = window.setInterval(function () {
        if (secs == 121) {
            window.clearInterval(stt);
            $(_this).attr('onclick', "send_code3(this);");
            $(_this).css('color', '#fff');
            $(_this).css('backgroundColor', '#006ce2');
            $(_this).val('获取验证码');
            secs = 1;
        } else {
            $(_this).val((120 - secs) + '秒后可重发');
            secs++;
        }
    }, 1000);
}

function openWin(url) {
    var u = url;
    window.open(u, 'newwindow', 'height=600, width=800, top=30%,left=30%, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no, status=no');
}