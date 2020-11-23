$(document).ready(function() {
    var END_EV = ("ontouchstart" in window || window.DocumentTouch) ? "touchend": "mouseup",
    publicHeader = document.getElementsByClassName("public-header")[0] || document.getElementsByClassName("public-home-header")[0] || document.getElementsByClassName("public-qa-header")[0],
    headerMenuBtn = document.getElementsByClassName("public-header-menu")[0] || document.getElementsByClassName("public-header-menu-btn")[0],
    headerPopup = document.getElementsByClassName("public-header-popup")[0],
    publicCover = document.getElementsByClassName("public-home-new-cover")[0],
    backBtn = document.getElementsByClassName("public-header-back")[0];
    if (headerMenuBtn === undefined) {
        return
    }
    var menuClass;
    headerMenuBtn.addEventListener(END_EV,
    function(e) {
        menuClass = headerMenuBtn.className.split(" ");
        if (headerPopup.className === "public-header-popup") {
            showNav(menuClass)
        } else {
            hiddenNav(menuClass)
        }
        e.preventDefault()
    },
    false);
    document.addEventListener(END_EV,
    function(e) {
        if (e.target.className.indexOf("public-home-new-cover") !== -1) {
            menuClass = headerMenuBtn.className.split(" ");
            hiddenNav(menuClass);
            e.preventDefault()
        }
    },
    false);
    function showNav(menuClass) {
        var headerOffsetTop = publicHeader.offsetTop;
        if (headerOffsetTop > 0) {
            headerPopup.style.top = (headerOffsetTop + 44) + "px"
        }
        headerPopup.className = "public-header-popup public-header-popup-show";
        menuClass.push("public-header-menu-touched");
        headerMenuBtn.className = menuClass.join(" ");
        if (publicCover !== undefined) {
            publicCover.className = "public-home-new-cover public-header-popup-show"
        } else {
            var cover = document.createElement("div");
            document.body.appendChild(cover);
            cover.className = "public-home-new-cover public-header-popup-show";
            publicCover = document.getElementsByClassName("public-home-new-cover")[0]
        }
        if (backBtn) {
            backBtn.style.display = "none"
        }
    }
    function hiddenNav(menuClass) {
        headerPopup.className = "public-header-popup";
        publicCover.className = "public-home-new-cover";
        if (backBtn) {
            backBtn.style.display = "block"
        }
        var tmpArray = [];
        for (var i = 0; i < menuClass.length; i++) {
            if (menuClass[i] !== "public-header-menu-touched") {
                tmpArray.push(menuClass[i])
            }
        }
        headerMenuBtn.className = tmpArray.join(" ")
    }
    var bread = $(".public-breadcrumb-box"),
    breadItems = bread.find(".breadcrumb-item"),
    maxWidth = $(window).width() - 20,
    totalWidth = 0;
    function calWidth() {
        for (var i = 0; i < breadItems.length; i++) {
            totalWidth += breadItems.eq(i).width();
            if (totalWidth > maxWidth) {
                flag = true;
                breadItems.eq(i).css({
                    width: (breadItems.eq(i).width() - (totalWidth - maxWidth)) + "px"
                })
            }
            if (i !== (breadItems.length - 1)) {
                totalWidth += 21
            }
        }
    }
    function resetWidth() {
        for (var i = 0; i < breadItems.length; i++) {
            breadItems.eq(i).css({
                width: "auto"
            })
        }
    }
    calWidth();
    $(window).on("orientationchange",
    function() {
        resetWidth();
        calWidth()
    })
}); (function() {
    var getCookieFn = function(cookieName) {
        var _name = cookieName + "=",
        _cArray = document.cookie.split(";");
        for (var i = 0; i < _cArray.length; i++) {
            var _cItem = _cArray[i];
            while (_cItem.charAt(0) === " ") {
                _cItem = _cItem.substring(1)
            }
            if (_cItem.indexOf(_name) !== -1) {
                return _cItem.substring(_name.length, _cItem.length)
            }
        }
        return ""
    };
    var moveFlag = false;
    $(document).on("touchstart",
    function() {
        moveFlag = false
    });
    $(document).on("touchmove",
    function() {
        moveFlag = true
    });
    $(document).on("touchend", "*[data-log-id]",
    function() {
        if (moveFlag) {
            return
        }
        var logUrl = "http://click.pv.focus.cn/pv_click.gif",
        logId = $(this).attr("data-log-id"),
        isDevice = $(this).attr("data-device"),
        device = "",
        phoneNumber = "",
        groupId = "",
        timer = new Date().getTime();
        var cookieInfo = getCookieFn("focus_mes_info");
        var subCookieInfo = "";
        if (cookieInfo != "") {
            if (cookieInfo.substring(0, 1) == '"') {
                subCookieInfo = cookieInfo.substring(1, (cookieInfo.length - 2))
            } else {
                subCookieInfo = cookieInfo
            }
        }
        var ua = window.navigator.userAgent.toLowerCase();
        if (ua.indexOf("iphone") !== -1) {
            device = "_/t_ios"
        } else {
            if (ua.indexOf("android") !== -1) {
                device = "_/t_android"
            } else {
                device = "_/t_else"
            }
        }
        if ($(this).attr("data-zhuji")) {
            if ($(this).attr("data-fenji").trim() != "") {
                phoneNumber = $(this).attr("data-zhuji") + "," + $(this).attr("data-fenji")
            } else {
                phoneNumber = $(this).attr("data-zhuji")
            }
        }
        if ($(this).attr("data-groupid")) {
            groupId = $(this).attr("data-groupid")
        }
        if (ua.indexOf("android") !== -1) {
            if ($(this).attr("data-fenji") === "") {
                sendLog($(this))
            } else {
                if (($(this).parents("#pubilc-phone-module").length > 0 || $(this).parents(".pop-layer").length > 0) && $(this).text().trim() == "立即拨打") {
                    sendLog($(this));
                    return
                }
                if ($("#isPhoneSpecialCity").val() == "true") {
                    sendLog($(this));
                    return
                }
                if ($(this).attr("data-fenji") == undefined) {
                    sendLog($(this))
                }
            }
        } else {
            sendLog($(this))
        }
        function sendLog(_obj) {
            var img = new Image();
            if (subCookieInfo == "") {
                if (_obj.attr("data-zhuji")) {
                    img.src = logUrl + "?d?=" + logId + "_/t_" + timer + device + "_/t_nochannel@@@@@@@@@@@@@@@@" + phoneNumber + "@@" + groupId
                } else {
                    img.src = logUrl + "?d?=" + logId + "_/t_" + timer + device
                }
            } else {
                if (_obj.attr("data-fenji") == undefined) {
                    img.src = logUrl + "?d?=" + logId + "_/t_" + timer + device
                } else {
                    img.src = logUrl + "?d?=" + logId + "_/t_" + timer + device + "_/t_" + subCookieInfo + phoneNumber + "@@" + groupId
                }
            }
        }
    })
})();