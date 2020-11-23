;(function($) {
    var url = decodeURIComponent(location.href);
    var userid = getCookie('uid', 'to8to_');
    var username = getCookie('username', 'to8to_');
    if(userid.length > 0 && username.length > 0){
        var data = {
            url: url,
            account_id: userid,
            user_name: username
        }
        $.ajax({
            type: "post",
            url: "http://www.to8to.com/count/icpcountlog.php",
            data: data
        });
    }

    function getCookie(name, pre) {
        if (pre)
            name = 'to8to_' + name;
        var r = new RegExp("(\\b)" + name + "=([^;]*)(;|$)");
        var m = document.cookie.match(r);
        var res = !m ? "" : decodeURIComponent(m[2]);
        var result = stripscript(res);
        return result;
    }
    /****************XSS过滤********************/
    function stripscript(s) {
        var pattern = new RegExp("[%--`~!@#$^&*()=|{}':;',\\[\\].<>/?~！@#￥……&*（）——|{}【】‘；：”“'。，、？]");
        //格式 RegExp("[在中间定义特殊过滤字符]")
        var rs = "";
        for (var i = 0; i < s.length; i++) {
            rs = rs + s.substr(i, 1).replace(pattern, '');

        }
        return rs;
    };
}(jQuery));
