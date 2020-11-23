/**
 * 界面相关
 */
//拼接客服列表div
MobileClient.prototype.setKfHmtl = function(type,infos){
    var _this = this;
    var lists = "";
    if(type != "groups"){
        if(type == "group"){//人员，按分组展示
            lists += '<div class="kf-group" id="group_'+infos[0].group_id+'"><div class="kf-group-title font12 color-grey-deep">'+infos[0].group_name+'</div><ul class="kf-wrap font14 color-blue clearfix">';
        }else if(type == "kf"){//人员，全部
            lists += '<div class="kf-group"><div class="kf-group-title font12 color-grey-deep">'+_this.configs["mobile_lang_json"][8]+'</div><ul class="kf-wrap font14 color-blue clearfix">';

        }
        for (var i = 0; i < infos.length; i++) {
            var worker_info = infos[i];
            var online_class = "";
            if(worker_info["state"] == 0) online_class = "color-grey-light";
            var bname = worker_info["bname"] == "" ? _this.configs["mobile_lang_json"][39] : worker_info["bname"];
            lists += '<li class="fl" onclick="mobile_client.toKfLink(\''+worker_info["worker_id"]+'\',\''+bname.replace(/\"/g,"\\\"").replace(/\\/g,"\\\\")+'\')"><span class="fk-name '+online_class+'">'+bname.replace(/\"/g,"\\\"").replace(/\\/g,"\\\\")+'</span>'+_this.kfState(worker_info["max_link"],worker_info["cnt"],worker_info["state"])+'</li>';
        }
        lists += '</ul></div>';
    }else if(type == "groups"){//展示全部分组
        lists += '<div class="kf-group"><div class="kf-group-title font12 color-grey-deep">'+_this.configs["mobile_lang_json"][9]+'</div><ul class="kf-wrap font14 color-blue clearfix">';
        var list = "",list_0 = "";//list_0位未分组，将未分组移到最后
        for(var p in infos){
            var key = Object.keys(infos[p])[0];
            var worker_info = infos[p][key];
            if(typeof worker_info["workers"] != "undefined"){
                var workers =  worker_info["workers"];
                var cnt = 0,worker_ids="";
                for (var q in workers) {
                    if(typeof workers[q]["worker_id"] != "undefined"){
                        if(workers[q]["state"] == 1) cnt++;
                        worker_ids += workers[q]["worker_id"]+",";
                    }
                }
                var online_class = "";
                if(cnt == 0) online_class = "color-grey-light";
                // lists += '<li class="fl"><span class="fk-name '+online_class+'">'+worker_info["bname"]+'</span>'+_this.kfState(worker_info["max_link"],worker_info["cnt"],worker_info["state"])+'</li>';
                list = '<li class="fl" onclick="mobile_client.toKfLink(\''+worker_ids+'\',\''+worker_info["group_name"].replace(/\"/g,"\\\"").replace(/\\/g,"\\\\")+'\')"><span class="fk-name '+online_class+'">'+worker_info["group_name"].replace(/\"/g,"\\\"").replace(/\\/g,"\\\\")+'</span>'+_this.kfGroupState(cnt)+'</li>';
            }
            if(key != 0)
                lists += list;
            else
                list_0 = list;
        }
        lists += list_0+'</ul></div>';
    }

    return lists;
}

//列表展示机器人
MobileClient.prototype.setRobotList = function(){
    var _this = this;
    var robot_list = '';
    if(_this.configs["robot_id"] != ''){
        var robot_info = _this.configs["all_robot_info"][_this.configs["robot_id"]];
        if(robot_info != undefined && robot_info != null){
            robot_list = '<div class="kf-group"><div class="kf-group-title font12 color-grey-deep">'+_this.configs["mobile_lang_json"][60]+'('+_this.configs["mobile_lang_json"][61]+')'+'</div><ul class="kf-wrap font14 color-blue clearfix">';
            robot_list += '<li class="fl" onclick="mobile_client.setRobotConfig(\''+_this.configs["robot_id"]+'\')"><span class="fk-name">'+robot_info["name"].replace(/\"/g,"\\\"").replace(/\\/g,"\\\\")+'</span></li>';
            robot_list += '</ul></div>';
        }
    }
    return robot_list;
}

//显示客服状态
MobileClient.prototype.kfState = function(max_link,cnt,worker_stats){
    var _this = this;
    var state = "";
    if (worker_stats == 0) {
        state = '<span class="kf-status">('+_this.configs["mobile_lang_json"][7]+')</span>';
    }else if(max_link!=cnt){
        if(_this.configs["kf_status"] == 1){
            if(cnt >= 0 && (cnt < Math.ceil(max_link/2))){
                state = "";
            }else if(cnt >= Math.ceil(max_link/2)){
                state = '<span class="kf-status color-red">('+_this.configs["mobile_lang_json"][5]+')</span>';
            }
        }
    }else{
        state = '<span class="kf-status color-red">('+_this.configs["mobile_lang_json"][6]+')</span>';
    }
    return state;
}

//显示分组状态
MobileClient.prototype.kfGroupState = function(cnt){
    var _this = this;
    var state = "";
    if(cnt == 0){
        state = '<span class="kf-status">('+_this.configs["mobile_lang_json"][7]+')</span>';
    }else if(cnt > 0){
        state = '<span class="kf-status">('+cnt+_this.configs["mobile_lang_json"][10]+')</span>';
    }
    return state;
}

//获取注册或留言字段输入值
MobileClient.prototype.getFiledValue = function(field_name,type){
    var _this = this;
    if(type != undefined && type == "lword") return $.trim($("#lword_"+field_name).val());
    return $.trim($("#reg_"+field_name).val());
}

//显示注册或留言字段错误提醒
MobileClient.prototype.showFieldNotice = function(field_name,type){
    var _this = this;
    if(type != undefined && type == "lword"){
        $("#lword_notice_"+field_name).parents(".inputWrap").addClass("input-error");
        return;
    }
    $("#notice_"+field_name).parents(".inputWrap").addClass("input-error");
}

//显示公告
MobileClient.prototype.showActivity = function(company_activity){
    var _this = this;
    var reg = new RegExp("autoplay", "gi");// 去除标签的正则表达式
    $("#activity").html(commFun.encoding.UBBCode(commFun.encoding.UBBEncode(company_activity)).replace(reg, ""));
    _this.params["m_activityImgTimer"] = setInterval(function(){
        _this.handActivityImg();
    },100);
}

//活动公告图片处理
MobileClient.prototype.handActivityImg = function(){
    var _this = this;
    if(document.body.clientWidth != 0){
        $('#activity img').each(function(){
            if(typeof($(this).attr('width')) == 'undefined'){
                var img = new Image();
                img.src = $(this).attr('src');
                if(img.complete){
                    // var first_width = img.width;
                    // var first_height = img.height;
                }else{
                    img.onload = function(){
                        _this.handActivityImg();
                    }
                    return;
                }
            }else{
                // var first_width = $(this).attr('width');
                // var first_height = $(this).attr('height');
            }
            // var end_width = document.body.clientWidth - 90;
            // if(end_width > 610) end_width = 610;
            // var end_height = end_width/first_width*first_height;
            // if(first_width > end_width){
            //     $(this).attr('width',end_width);
            //     $(this).attr('height',end_height);
            // }
        });
        $('#activity').show();
        clearInterval(_this.params["m_activityImgTimer"]);
        if(_this.company_id != "72000450" && _this.company_id != "72034819" && _this.company_id != "72221109"){
            _this.scroll("talk_content");
        }
    }
}

//显示图文公告
MobileClient.prototype.showComeInfo = function(comeinfo){
    var _this = this;
    if(comeinfo.logo != "" && comeinfo.title != "" && comeinfo.content != "" && comeinfo.curl != ""){
        var comeinfo_html = '<div class="comeinfo" style="width: 100%;margin-bottom:1.5rem;border:1px solid #D8DFEA;background-color: #fff;height:5.67rem;padding:0.83rem;display: flex;justify-content:space-between;align-items:center;"><div style="width: 4rem;height: 4rem;"><img src="'+comeinfo.logo+'" alt="" style="width: 100%;height:100%;pointer-events: none;"></div><div style="height:4rem;width :calc(100% - 12.16rem);margin:0 0.83rem;"><p style="width:100%;margin-top:0.1rem;margin-bottom: 0.83rem;font-size:1.2rem;line-height: 1.5rem;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;color:#28334B;">'+comeinfo.title+'</p><p style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;color:#F44024;font-size:1.2rem;line-height: 1.5rem">'+comeinfo.content+'</p></div><div style="width: 6.5rem;height: 2.67rem;border:1px solid #F44024;color:#F44024;text-align: center;line-height: 2.5rem;border-radius: 2px;" onclick="mobile_client.sendCinfo()"> 发送链接</div></div>';
        _this.talkAppend(comeinfo_html);
    }
}

//显示图文消息
MobileClient.prototype.showCinfo = function(type,logo,title,content,curl){
    var _this = this;
    if(logo != "" && title != "" && content != "" && curl != ""){
        var comeinfo_msg = '<div style="overflow:hidden"><div onclick="window.open(\''+curl+'\',\'_blank\')" style=" position: relative;width: 20rem;background-color: #fff;position: relative;box-sizing: border-box;padding: 0.8rem;display: flex;justify-content:space-between;align-items:center;"><div style="width: 4rem;height: 4rem;"><img src="'+logo+'" alt="" style="width: 100%;height:100%;pointer-events: none;"></div><div style="height:4rem;width :calc(100% - 5.66rem);margin:0 0.83rem;"><p style="width:100%;margin-top:0.1rem;margin-bottom: 0.83rem;font-size:1.2rem;line-height: 1.5rem;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;color:#28334B;">'+title+'</p><p style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;color:#F44024;font-size:1.2rem;line-height: 1.5rem">'+content+'</p></div></div></div>';
        _this.showMsg(comeinfo_msg,type);
    }
}

//显示历史记录图文消息
MobileClient.prototype.showLastCinfo = function(type,logo,title,content,curl){
    var _this = this;
    if(logo != "" && title != "" && content != "" && curl != ""){
        var comeinfo_msg = '<div style="overflow:hidden"><div onclick="window.open(\''+curl+'\',\'_blank\')" style=" position: relative;width: 20rem;background-color: #fff;position: relative;box-sizing: border-box;padding: 0.8rem;display: flex;justify-content:space-between;align-items:center;"><div style="width: 4rem;height: 4rem;"><img src="'+logo+'" alt="" style="width: 100%;height:100%;pointer-events: none;"></div><div style="height:4rem;width :calc(100% - 5.66rem);margin:0 0.83rem;"><p style="width:100%;margin-top:0.1rem;margin-bottom: 0.83rem;font-size:1.2rem;line-height: 1.5rem;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;color:#28334B;">'+title+'</p><p style="overflow: hidden;text-overflow: ellipsis;white-space: nowrap;color:#F44024;font-size:1.2rem;line-height: 1.5rem">'+content+'</p></div></div></div>';
        _this.showLastMsg(comeinfo_msg,type);
    }
}

//显示排队
MobileClient.prototype.showWait = function(){
    var _this = this;
    _this.removeVote();//清除上次对话的评价框
    $("#wait").show();
    $("#wait_cnt").html(_this.params["m_busyCnt"]);
    _this.hideHeaderMore();//隐藏加号
    $("#foldBtns").hide();
}

//显示网络异常
MobileClient.prototype.netErroShow = function(){
    var _this = this;
    $("#net_error").show();
}

//显示提示
MobileClient.prototype.talkTip = function(content,id){
    var _this = this;
    var tipid = "";
    var ispre = false;
    if(typeof id != "undefined" && id.indexOf("_TIP") != -1){//处理唯一显示的提示
        tipid = 'id="' + id + '"';
        if($("#"+id)) $("#"+id).remove();
    }
    if(typeof id != "undefined" && id.indexOf("_PRE") != -1){//处理唯一显示的提示
        tipid = 'id="' + id + '"';
        ispre = true;
        if($("#"+id).length>0) return;
    }
    var tip = '<p class="system-remind font12 color-grey-middle" '+tipid+'><label>'+content+'</label></p>';
    if(arguments[2] != undefined){
        if(arguments[2] == "all"){
            // if (_this.configs['mobile_lword_json']['lword_type'] == '2') {
            //     tip += '<div class="linkTo font14"><a class="color-blue" href="javascript:;" onclick="mobile_client.runKf(true)">'+_this.configs["mobile_lang_json"][41]+'</a></div>';
            // }else{
                tip += '<div class="linkTo font14"><a class="color-blue" href="javascript:;" onclick="mobile_client.runKf(true)">'+_this.configs["mobile_lang_json"][41]+'</a><a class="color-blue" href="javascript:;" onclick="mobile_client.showLword()">'+_this.configs["mobile_lang_json"][42]+'</a></div>';
            // }
        } 
        if(arguments[2] == "lword"){
            $("#to_link_lword").remove();
            tip += '<div class="linkTo font14" id="to_link_lword"><a class="color-blue" href="javascript:;" onclick="mobile_client.showLword()">'+_this.configs["mobile_lang_json"][42]+'</a></div>';
        }
        if(arguments[2] == "destory_lword") $("#to_link_lword").remove();
        if(arguments[2] == "scene"){
            if(_this.configs["frobot_id"] != ""){
                tip += '<div class="linkTo font14"><a class="color-blue" href="javascript:;" onclick="mobile_client.setRobotConfig(\''+_this.configs["frobot_id"]+'\')">'+_this.configs["mobile_lang_json"][57]+'</a><a class="color-blue" href="javascript:;" onclick="mobile_client.showLword()">'+_this.configs["mobile_lang_json"][42]+'</a></div>';
            }else{
                tip += '<div class="linkTo font14"><a class="color-blue" href="javascript:;" onclick="mobile_client.showLword()">'+_this.configs["mobile_lang_json"][42]+'</a></div>';
            }   
        }
    }
    if(ispre){//显示在文本前面
        _this.talkPrepend(tip);
        return;
    }
    if(id == "WELCOME_TIP" && (_this.company_id == "72000450" || _this.company_id == "72034819" || _this.company_id == "72221109")){
        $("#talk_content").append(tip);
    }else{
        _this.talkAppend(tip);
    }
}

//lnk错误提示
MobileClient.prototype.showLnkErr = function(error){
    var _this = this;
    alert(error);
    // $("#talk_content").append(commFun.encoding.UBBCode(commFun.encoding.UBBEncode(_this.configs["reject_prompt"])));
    // _this.scroll("talk_content");
}

//不能建立对话提示
MobileClient.prototype.showBlockNotice = function(){
    var _this = this;
    $("#block_notice").show();
}

//设置对话中的头部显示
MobileClient.prototype.setHeaderTitle = function(){
    var _this = this;
    if(_this.params["m_success"] == true && arguments[0] == undefined){
        if(_this.params["obj_name"] != ""){
            $(".header-title").addClass("right-square-bracket");
            var header_title = _this.params["obj_name"];
        } else{
            $(".header-title").removeClass("right-square-bracket");
            var header_title = _this.configs["mobile_lang_json"][23];
        }
        $(".header-title").html(header_title);
    }
    if(arguments[0]){
        if(_this.configs["zsk_name"] != "") {
            $(".header-title").addClass("right-square-bracket");
            var header_title = _this.configs["zsk_name"];
        }else{
            $(".header-title").removeClass("right-square-bracket");
            var header_title = _this.configs["mobile_lang_json"][23];
        }
        $(".header-title").html(header_title);
    }
}

//连接成功处理
MobileClient.prototype.lnkSuccess = function(){
    var _this = this;
    $("#wait").hide();
    $("#foldBtns").show();
    _this.setHeaderTitle();
    $(".icon_card_info").show();
    _this.removeVote();//清除上次对话的评价框
    _this.showComeInfo(_this.configs["comeinfo"]);
    var msg_div = "<div id='talk_pos' style='display: none'></div>";
    if(_this.company_id == "72000450" || _this.company_id == "72034819" || _this.company_id == "72221109"){
        $("#talk_content").append(msg_div);
    }else{
        _this.talkAppend(msg_div);//对话前创建一个隐藏的div，用于定位本次会话开始位置
    }
}

//设置客服信息层
MobileClient.prototype.setKfInfoHtml = function(id6d){
    var _this = this;
    if(typeof id6d == "undefined") var jid6d = _this.params["obj_id"];
    else  var jid6d = id6d;
    if(jid6d == 0) return false;
    if(typeof _this.params["worker_info"][jid6d] != "undefined"){
        var worker_info = _this.params["worker_info"][jid6d];
        var kf_info_html = "";
        for(var p in worker_info){
            var info_name = "";
            var info_icon = "";
            
            var btn_str = "";

            switch (p){
                case "bname":
                        info_name = _this.configs["mobile_lang_json"][14];
                        if(id6d == _this.params["obj_id"] && info_name != _this.params["obj_name"]){
                            _this.params["obj_name"] = info_name;
                            _this.setHeaderTitle();
                        }
                    break;
                case "mobile":
                        info_name = _this.configs["mobile_lang_json"][15];//手机
                        info_icon = 'icon-shouji-new';
                        btn_str = '<a class="info_btn isphone" href="tel:'+worker_info[p]+'">'+_this.configs["mobile_lang_json"][78]+'</a>';
                    break;
                case "phone":
                        info_name = _this.configs["mobile_lang_json"][16];//电话
                        info_icon = 'icon-kefu-shouji-new';
                        btn_str = '<a class="info_btn isphone" href="tel:'+worker_info[p]+'">'+_this.configs["mobile_lang_json"][78]+'</a>';
                    break;
                case "qq":
                        info_name = _this.configs["mobile_lang_json"][17];
                        info_icon = 'icon-kefu-QQ-new';
                        btn_str = '<div class="info_btn" onclick="mobile_client.copyTag(this)">'+_this.configs["mobile_lang_json"][79]+'</div><div style="width: 0.1rem;height: 0.1rem;opacity: 0">'+worker_info[p]+'</div>';
                    break;
                case "wechat":
                        info_name = _this.configs["mobile_lang_json"][18];
                        info_icon = 'icon-kefu-weixin-new';
                        btn_str = '<div class="info_btn" onclick="mobile_client.copyTag(this)">'+_this.configs["mobile_lang_json"][79]+'</div><div style="width: 0.1rem;height: 0.1rem;opacity: 0">'+worker_info[p]+'</div>';
                    break;
                case "email":
                        info_name = _this.configs["mobile_lang_json"][19];
                        info_icon = 'icon-kefu-youxiang-new';
                        btn_str = '<div class="info_btn" onclick="mobile_client.copyTag(this)">'+_this.configs["mobile_lang_json"][79]+'</div><div style="width: 0.1rem;height: 0.1rem;opacity: 0">'+worker_info[p]+'</div>';
                    break;
                case "whatsapp":
                    info_name = "whatsapp";
                    info_icon = 'icon-WhatsApp';
                    btn_str = '<div class="info_btn" onclick="mobile_client.copyTag(this)">'+_this.configs["mobile_lang_json"][79]+'</div><div style="width: 0.1rem;height: 0.1rem;opacity: 0">'+worker_info[p]+'</div>';
                    break;
                case "facebook":
                    info_name = "facebook";
                    info_icon = 'icon-FacebookMessenger';
                    btn_str = '<div class="info_btn" onclick="mobile_client.copyTag(this)">'+_this.configs["mobile_lang_json"][79]+'</div><div style="width: 0.1rem;height: 0.1rem;opacity: 0">'+worker_info[p]+'</div>';
                    break;
                case "msn":
                        info_name = _this.configs["mobile_lang_json"][20];
                        btn_str = '<div class="info_btn" onclick="mobile_client.copyTag(this)">'+_this.configs["mobile_lang_json"][79]+'</div><div style="width: 0.1rem;height: 0.1rem;opacity: 0">'+worker_info[p]+'</div>';
                    break;
            }
            if(info_name != "" && worker_info[p] != "")
                kf_info_html += '<li><span class="info-key color-grey-light iconfont '+info_icon+'"></span><span class="info-value">'+worker_info[p]+'</span>'+btn_str+'</li>';
        }
        $("#kf_info").html(kf_info_html);
    }else{
        _this.setKfInfo(jid6d,true);
    }
}

//修改客服头像
MobileClient.prototype.changeKfHeaderImg = function(url){
    var _this = this;
    $(".service-info #obj_my img").attr("src",url);
}

//展示消息
MobileClient.prototype.showMsg = function(msg,type,msgid){
    var _this = this;
    var msg_div = _this.getNowTime();
    if(type == "w"){//展示客服消息时，msgid为头像
        var msg_btns = _this.getCopyClueBtn(msg);

        var header_url = _this.configs["obj_header_url"];
        if(_this.params["obj_id"] != 0 && typeof _this.configs["all_header_url"][_this.params["obj_id"]] != "undefined" && _this.configs["all_header_url"][_this.params["obj_id"]] != "")
            header_url = _this.configs["all_header_url"][_this.params["obj_id"]];
        var w_msg_id = "obj_my";
        if(msgid != undefined){
            header_url = msgid == "" ? _this.params["obj_header_default"] : msgid;
            w_msg_id = "obj_other";
        }
        var real_msgid = '';
        if(arguments[3] != undefined && arguments[3] != '') {
            real_msgid = 'id="'+arguments[3]+'"';
        }
        msg_div += '<div class="pc-service service-info" '+real_msgid+'><div class="pc-service-left" id="'+w_msg_id+'"><img width="34px" src="'+header_url+'" alt=""></div><div class="pc-service-right"> <div class="pc-service-info font14"> <div style="overflow:hidden;">'+msg+'</div> </div>'+msg_btns+'</div> </div>';
    }else if(type == "v"){
        var msgid_html = '',msgid_display = '';
        if(arguments[3] != undefined) msgid_display = 'style="display:none"';//建立对话过程中发的消息，不显示消息发送状态
        if(msgid != undefined && msgid != "") msgid_html = '<i class="info-status" '+msgid_display+' id="'+msgid+'"></i>';
        msg_div += '<div class="pc-customer"><div class="pc-customer-info font14"><span>'+msg+'</span>'+msgid_html+'</div></div>';
    }
    _this.talkAppend(msg_div);
}

//展示消息
MobileClient.prototype.showConnMsg = function(msg,type,msgid){
    var _this = this;
    var msg_div = _this.getNowTime();
    if(type == "w"){//展示客服消息时，msgid为头像
        var msg_btns = _this.getCopyClueBtn(msg);

        var header_url = _this.configs["obj_header_url"];
        if(_this.params["obj_id"] != 0 && typeof _this.configs["all_header_url"][_this.params["obj_id"]] != "undefined" && _this.configs["all_header_url"][_this.params["obj_id"]] != "")
            header_url = _this.configs["all_header_url"][_this.params["obj_id"]];
        var w_msg_id = "obj_my";
        if(msgid != undefined){
            header_url = msgid == "" ? _this.params["obj_header_default"] : msgid;
            w_msg_id = "obj_other";
        }
        var real_msgid = '';
        if(arguments[3] != undefined && arguments[3] != '') {
            real_msgid = 'id="'+arguments[3]+'"';
        }
        msg_div += '<div class="pc-service service-info" '+real_msgid+'><div class="pc-service-left" id="'+w_msg_id+'"><img width="34px" src="'+header_url+'" alt=""></div><div class="pc-service-right"> <div class="pc-service-info font14"> <div style="overflow:hidden;">'+msg+'</div> </div>'+msg_btns+'</div> </div>';
    }else if(type == "v"){
        var msgid_html = '',msgid_display = '';
        if(arguments[3] != undefined) msgid_display = 'style="display:none"';//建立对话过程中发的消息，不显示消息发送状态
        if(msgid != undefined && msgid != "") msgid_html = '<i class="info-status" '+msgid_display+' id="'+msgid+'"></i>';
        msg_div += '<div class="pc-customer"><div class="pc-customer-info font14"><span>'+msg+'</span>'+msgid_html+'</div></div>';
    }
    $("#talk_content").append(msg_div);
}

//获取复制线索按钮
MobileClient.prototype.getCopyClueBtn = function(msg){
    var _this = this;
    // 匹配信息
    msg = mobile_client.HTMLDecode(msg);
    msg = msg.replace(/<\/p>|<br>|<br>/g,' ');
	msg = msg.replace(/<[^<>]+>/g,'');
    var phone_reg = /[^\d](1[3-9]\d{9})(?!\d)/g,tel_400_reg = /[^\d]400([-|\s]{0,2})[016789]\d{2}([-|\s]{0,2})\d{4}/g;
    var phone_num="";
    var qq_num="";
    var wx_num="";
    // 过滤掉url 和 img中的超链接，不参与匹配
    var delLinkReg = /<A HREF=.*?<\/A>/g;
    var imgLinkReg = /<IMG.*?insert_img_kf">/g;
    var new_msg = msg.replace(delLinkReg,'');
    new_msg = new_msg.replace(imgLinkReg,'');

    var msg_str = ('`'+mobile_client.HTMLDecode(new_msg)).toLowerCase();
    
    // 获取手机号码
    if(phone_reg.test(msg_str)){
        try{
            var phone_str = msg_str.match(phone_reg)[0];
            phone_num = phone_str.substring(1);
        }catch(e){}
    }else if(tel_400_reg.test(msg_str)){
        try{
            var phone_str = msg_str.match(tel_400_reg)[0];
            phone_num = phone_str.substring(1).replace(/[-|\s]/g ,"");
        }catch(e){}
    }


    // 获取微信号码
    if(msg_str.toLowerCase().indexOf("wechat")>-1 ||msg_str.toLowerCase().indexOf("wx")>-1 || msg.toLowerCase().indexOf("weixin")>-1 || msg.indexOf("微信")>-1){
        var newmsg_str = msg_str;
        newmsg_str = newmsg_str.replace(/((([A-Za-z]{3,9}:(?:\/\/)?)(?:[\-;:&=\+\$,\w]+@)?[A-Za-z0-9\.\-]+|(?:www\.|[\-;:&=\+\$,\w]+@)[A-Za-z0-9\.\-]+)((?:\/[\+~%\/\.\w\-_]*)?\??(?:[\-\+=&;%@\.\w_]*)#?(?:[\.\!\/\\\w]*))?)/,'');//过滤网址
        newmsg_str = newmsg_str.replace(/\w+([-+.]\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*/,'');//过滤email
        var weixinReg = /([^?!\w])weixin(?![\w$])/g;
        var wechatReg = /([^?!\w])wechat(?![\w$])/g;
        newmsg_str = newmsg_str.replace(weixinReg,'');
        newmsg_str = newmsg_str.replace(wechatReg,'');
        try{
            if((msg_str.indexOf("微信同号")>-1 || msg_str.indexOf("微信同手机")>-1) && phone_num != ""){
                wx_num = phone_num;
            }else{
                var wx_str = newmsg_str.match(/[^\w]([a-zA-Z_][\wa-zA-Z-_]{5,19})(?![\w])/g)[0];
                wx_num = wx_str.substring(1);
            }
        }catch(e){}
        if(wx_num == "" && phone_num != ""){
            wx_num = phone_num;
        }
    }

    // 获取QQ号码
    if(msg_str.toLowerCase().indexOf("qq")>-1){
        try{
            var qq_msg_str=msg_str.replace(phone_reg,'').replace(wx_num,'');
            var qq_arr = qq_msg_str.match(/[^\d]([1-9]\d{4,10})(?!\d)/g);
            for(var x=0;x<qq_arr.length;x++){
                if(qq_arr[x].substring(1) == phone_num){
                    qq_arr.splice(x,1);
                    x--;
                }
            }
            qq_num = qq_arr[0].substring(1)
        }catch(e){}
    }

    // 按钮结构
    var btn_switch_phone=_this.configs["btn_switch"].indexOf('phone')+1;
    var btn_switch_qq=_this.configs["btn_switch"].indexOf('qq')+1;
    var btn_switch_wechat=_this.configs["btn_switch"].indexOf('wechat')+1;

    var msg_phone_btn = phone_num == '' ? "" : btn_switch_phone > 0 ? '<a class="msg_btn msg_phone_btn" style="margin-top:0.7rem" data_phone ='+phone_num+' href="tel:'+phone_num+'" onclick="mobile_client.copyTag(this,\'phone\')">电话咨询</a>' : "";
    var msg_qq_btn = qq_num == '' ? "" : btn_switch_qq > 0 ? '<div class="msg_btn msg_qq_btn" data_qq ='+qq_num+' onclick="mobile_client.copyTag(this,\'qq\')">复制 QQ</div><div style="width: 0.1rem;height: 0.1rem;opacity: 0;position: absolute">'+qq_num+'</div>' : "";
    var msg_wx_btn = wx_num == '' ? "" : btn_switch_wechat > 0 ?'<div class="msg_btn msg_wx_btn" data_wx ='+wx_num+' onclick="mobile_client.copyTag(this,\'wechat\')">复制微信</div><div style="width: 0.1rem;height: 0.1rem;opacity: 0;position: absolute">'+wx_num+'</div>' : "";

    var msg_btns = '<div class="msg_btns">'+msg_qq_btn+msg_wx_btn+msg_phone_btn+'</div>';
    return msg_btns;
}

// 复制按钮信息
MobileClient.prototype.copyTag = function(obj,type){
    var _this = this;
    if (type != 'phone') {
        var range = document.createRange();
        range.selectNode($(obj).next()[0]);
        var selection = window.getSelection();
        if(selection.rangeCount > 0) selection.removeAllRanges(); 
        selection.addRange(range); 
        document.execCommand('copy'); 
        mobile_client.toastOut(_this.configs["mobile_lang_json"][80],"toast","toast_text");//复制成功
    }
    if (type == 'phone' || type == 'qq' || type == 'wechat') {
        var msgs = {
            'phone' : commFun.encoding.UrlEncode("访客点击了“电话咨询”按钮"),
            'qq' : commFun.encoding.UrlEncode("访客点击了“复制 QQ”按钮"),
            'wechat' : commFun.encoding.UrlEncode("访客点击了“复制微信”按钮")
        };
        if (_this.params["m_success"] && _this.configs['visitorPathSwitch'] == '1') {
            _this.sendGstm(msgs[type]);
        }
        _this.sendKafkaNew('guest_click_event','clue',type);
    }
}

//HTML反转义
MobileClient.prototype.HTMLDecode = function(str){
    var temp = document.createElement("div");
    temp.innerHTML = str;
    var output = temp.innerText || temp.textContent;    
    temp = null;    
    return output;
}

// 透明弹层
MobileClient.prototype.toastOut = function(txt,fid,chid){//动态提醒相关
    // 中间弹出提醒文字
    $("#"+fid).find("#"+chid).text(txt).end().show();
    setTimeout(function() {
        $("#"+fid).hide();
    }, 1500);
}
//展示离线消息
MobileClient.prototype.showWebMsg = function(msg,type){
    var _this = this;
    var msg_div = "";
    if(type == "r"){//展示客服消息时，msgid为头像
        var header_url = _this.configs["obj_header_url"];
        if(_this.params["obj_id"] != 0 && typeof _this.configs["all_header_url"][_this.params["obj_id"]] != "undefined" && _this.configs["all_header_url"][_this.params["obj_id"]] != "")
            header_url = _this.configs["all_header_url"][_this.params["obj_id"]];
        var w_msg_id = "obj_my";
        msg_div += '<div class="pc-service service-info"><div class="pc-service-left" id="'+w_msg_id+'"><img width="34px" src="'+header_url+'" alt=""></div><div class="pc-service-right"> <div class="pc-service-info font14"> <div style="overflow:hidden;">'+msg+'</div> </div> </div> </div>';
    }else if(type == "t"){
        msg_div +=  '<li class="pc-time font12 color-grey-light" name="msg-time">' + msg + '</li>';
    }

    $('#talk_content').children('#talk_pos').last().before(msg_div);
}

//展示文件消息
MobileClient.prototype.showFilMsg = function(msg,type,msgid,file_cancel_id){
    var _this = this;
    var msg_div = _this.getNowTime();
    if(type == "w"){//展示客服消息时，msgid为头像
        var header_url = _this.configs["obj_header_url"];
        if(_this.params["obj_id"] != 0 && typeof _this.configs["all_header_url"][_this.params["obj_id"]] != "undefined" && _this.configs["all_header_url"][_this.params["obj_id"]] != "")
            header_url = _this.configs["all_header_url"][_this.params["obj_id"]];
        var w_msg_id = "obj_my";
        if(msgid != undefined){
            header_url = msgid == "" ? _this.params["obj_header_default"] : msgid;
            w_msg_id = "obj_other";
        }
        if (file_cancel_id != undefined && file_cancel_id != '') {
            file_cancel_id = 'id="'+file_cancel_id+'"';
        }else{
            file_cancel_id = '';
        }
        msg_div += '<div class="pc-service service-info file_cancel" '+file_cancel_id+'><div class="pc-service-left" id="'+w_msg_id+'"><img width="34px" src="'+header_url+'" alt=""></div><div class="pc-service-right"> <div class="pc-service-info font14"> <div style="overflow:hidden;">'+msg+'</div> </div> </div>';
    }else if(type == "v"){
        var msgid_html = '',msgid_display = '';
        if(arguments[3] != undefined) msgid_display = 'style="display:none"';//建立对话过程中发的消息，不显示消息发送状态
        if(msgid != undefined && msgid != "") msgid_html = '<i class="info-status" '+msgid_display+' id="'+msgid+'"></i>';
        msg_div += '<div class="pc-customer"><div class="pc-customer-info font14"><span>'+msg+'</span>'+msgid_html+'</div></div>';
    }
    _this.talkAppend(msg_div);
}

//展示历史消息
MobileClient.prototype.showLastMsg = function(msg,type,msgid){
    var _this = this;
    var msg_div = "";
    if(type == "w"){
        var header_url = _this.configs["obj_header_url"];
        if(_this.params["obj_id"] != 0 && typeof _this.configs["all_header_url"][_this.params["obj_id"]] != "undefined" && _this.configs["all_header_url"][_this.params["obj_id"]] != "")
            header_url = _this.configs["all_header_url"][_this.params["obj_id"]];
        var w_msg_id = "obj_my";
        if(msgid != undefined){
            header_url = msgid == "" ? _this.params["obj_header_default"] : msgid;
            w_msg_id = "obj_other";
        }
        msg_div += '<div class="pc-service service-info"><div class="pc-service-left" id="'+w_msg_id+'"><img width="34px" src="'+header_url+'" alt=""></div><div class="pc-service-right"> <div class="pc-service-info font14"> <div style="overflow:hidden;">'+msg+'</div> </div> </div> </div>';
    }else if(type == "v"){
        msg_div += '<div class="pc-customer"><div class="pc-customer-info font14"><span>'+msg+'</span></div></div>';
    }else if(type == "t"){
        msg_div +=  '<li class="pc-time font12 color-grey-light" name="msg-time">' + msg + '</li>';
    }
    _this.talkPrepend(msg_div);
}

//展示场景引导表单消息
MobileClient.prototype.showSceneForm = function(obj,id,num){
    var _this = this;
    var msg_div = _this.getNowTime();
    var step_id = 'scene_'+id+'_'+num;
    var form_str="",input_str="",form_box="";
    // 获取场景引导表单结构
    form_box = "";
    $.each(obj,function(x,y){
        // input_str = y == "name" ? "姓名" : y == "wechat" ? "微信" : y == "phone" ? "手机号码" : y == "address" ? "地址" : y == "qq" ? "QQ" : y == "email" ? "邮箱" : "";
        // form_str = '<div class="from_box form_'+y+'"><input class="from_input input_'+y+'" type="text" placeholder="'+input_str+'"/></div>';
        if(y.name == 'phone'){
            var check = y.is_check ==  1 ? ' ischeck' : '';
            form_str = '<div class="from_box form_'+y.name+check+'"><input class="from_input input_'+y.name+'" type="text" placeholder="'+y.bname+'"/><div class="phone_ver_code" onclick ="mobile_client.formVerCode(this)">获取验证码</div></div>';    
        }else{
            form_str = '<div class="from_box form_'+y.name+'"><input class="from_input input_'+y.name+'" type="text" placeholder="'+y.bname+'"/></div>';
        }
        form_box += form_str;
    });

    var header_url = _this.params["obj_header_default"];
    if (_this.configs["admin_header_url"] != '') {
        header_url = _this.configs["admin_header_url"];
    }

    msg_div += '<div class="pc-service service-info"><div class="pc-service-left" id="obj_other"><img width="34px" src="'+header_url+'" alt=""></div><div class="pc-service-right"> <div class="pc-service-info font14 guide_form"> <div style="overflow:hidden;"><div id="'+step_id+'" class="reception_talk_info guide_f">'+form_box+'<span class="blue_btn form_send" onclick ="mobile_client.formSend('+id+','+num+',this)">发送</span></div></div> </div> </div> </div>';

    _this.talkAppend(msg_div);
}

//展示场景引导按钮消息
MobileClient.prototype.showSceneOption = function(obj,id,num){
    var _this = this;
    var step_id = 'scene_'+id+'_'+num;
    var step = id+'-'+num;
    var option_content = "";
    $.each(obj,function(i,v){
        var btn_str = "";
        var btn_step = step+'-'+i;
        btn_str = '<div class="form_option_btn white_btn" onclick="mobile_client.chooseCard(\''+v.point+'\',\''+btn_step+'\',this)">'+v.name+'</div>'
        option_content += btn_str;
    });

    _this.talkAppend("<div id='"+step_id+"' class='form_btn_box'>"+option_content+"</div>");
}

//解析历史消息，匹配声音等文件
MobileClient.prototype.msgExtHandle = function(msg){
    var _this = this;
    msg = commFun.encoding.UBBCode(msg);
    msg = msg.replace(/(<br>)/g, "<br>");
    // msg=msg.replace(/\[voice\](.*?)\[\/voice\]/g,"<img style='cursor:pointer' src='../../style/setting/ver06/img/suspend/voice_tip.png'></img>");
    msg = commFun.encoding.UBBCode(commFun.encoding.UBBEncode(msg));
    return msg;
}

//改变发送消息的显示状态
MobileClient.prototype.changMsgStatus = function(msgid,status){
    var _this = this;
    if ($("#"+msgid).length>0) {
        if (msgid.indexOf('formid_') > -1) {
            if(status){//访客表单发送成功
                $('#'+msgid).remove();
                _this.talkTip(_this.configs["mobile_lang_json"][67]);//提交成功
            }else{
                $('#'+msgid).find('.visitor_form_submit').text(_this.configs["mobile_lang_json"][66]).removeClass('submiting');
                //访客表单发送失败
                commFun.basic.toastOut(_this.configs["mobile_lang_json"][68],"toast","toast_text");//提交失败，请重试
            }
        }else{
            $("#"+msgid).show();
            if(status) $("#"+msgid).removeClass("info-status");
            else $("#"+msgid).addClass("onError");
        }
    }
}

//展示任务机器人按钮
MobileClient.prototype.showTaskOption = function(options){
    var _this = this;
    var option_content = "";
    $.each(options,function(i,v){
        var btn_str = "";
        btn_str = '<div class="form_option_btn white_btn" onclick="mobile_client.clickTaskOption(\''+v.link_id+'\',this)">'+v.name+'</div>'
        option_content += btn_str;
    });
    _this.talkAppend("<div class='form_btn_box'>"+option_content+"</div>");
}

//获取对话时显示时间信息
MobileClient.prototype.getNowTime = function(){
    var _this = this;
    var t = new Date(), M = t.getMonth() + 1,D = t.getDate(),H = t.getHours(),I = t.getMinutes();
    M = M < 10 ? '0' + M : M;
    D = D < 10 ? '0' + D : D;
    H = H < 10 ? '0' + H : H;
    I = I < 10 ? '0' + I : I;
    var s =/* M + '-' + D +  ' ' +*/ H + ':' + I;
    var r = '<li class="pc-time font12 color-grey-light" name="msg-time">' + s + '</li>';
    var h = $('.pc-time:last').html();
    if (h != '') {
        if (s != h) return r;
    } else if(h == '') {
        return r;
    }
    return '';
}

//对话框添加显示文本
MobileClient.prototype.talkAppend = function(html){
    var _this = this;
    $("#talk_content").append(html);
    _this.scroll("talk_content");
}

//对话框头部添加文本
MobileClient.prototype.talkPrepend = function(html){
    var _this = this;
    $("#talk_content").prepend(html);
}

//滚动
MobileClient.prototype.scroll = function(id){
    var _this = this;
    chatAnimate.scroll_bottom();
}

//点击评价
MobileClient.prototype.clickEvaluate = function(){
    var _this = this;
    if(_this.params["vote_true"]){
        _this.talkTip(_this.configs["mobile_lang_json"][48],"IS_VOTE_TIP");
        $(".popup").slideUp(90);
        $(".icon-fold").removeClass("isOpen")
        $(".icon-fold").css("transform","rotate(0deg)")
        return;
    }
    $(".evaluation").remove();
    var new_div = '<div class="evaluation"><div><p>'+_this.configs["mobile_lang_json"][49]+'<label>'+_this.configs["mobile_lang_json"][54]+'</label></p><ul><li class="li-active" data-name="'+_this.configs["mobile_lang_json"][50]+'"></li><li class="li-active" data-name="'+_this.configs["mobile_lang_json"][51]+'"></li><li class="li-active" data-name="'+_this.configs["mobile_lang_json"][52]+'"></li><li class="li-active" data-name="'+_this.configs["mobile_lang_json"][53]+'"></li><li class="li-active" data-name="'+_this.configs["mobile_lang_json"][54]+'"></li></ul></div><a class="evaluation-btn">'+_this.configs["mobile_lang_json"][55]+'</a></div>';
    $(".talk-content").append(new_div);
    $(".popup").slideUp(90);
    $(".icon-fold").removeClass("isOpen")
    $(".icon-fold").css("transform","rotate(0deg)")
    chatAnimate.scroll_bottom();
}

//获取评分
MobileClient.prototype.getVoteValue = function(){
    var _this = this;
    var vote_value = 5 - $(".evaluation").find(".li-active").length;
    return vote_value;
}

//结束对话后，显示发送框遮盖层
MobileClient.prototype.closeShow = function(){
    var _this = this;
    $("#after_close").show();
    $(".popup").slideUp(90);
    $(".icon-fold").removeClass("isOpen");
    $(".icon-fold").css("transform","rotate(0deg)");
    _this.clearComeInfo();
}

//清除图文公告
MobileClient.prototype.clearComeInfo = function(){
    var _this = this;
    $(".comeinfo").each(function(){
        $(this).remove();
    });
}

//获取各种输入框内容
MobileClient.prototype.getInputValue = function(type){
    var _this = this;
    if(type == "msg") return $("#textarea").val().trim();//获取输入框文本内容
}

//设置各种输入框内容
MobileClient.prototype.setInputValue = function(type,value){
    var _this = this;
    if(type == "msg") $("#textarea").val(value);//获取输入框文本内容
}

//评分后显示相关处理
MobileClient.prototype.removeVote = function(){
    var _this = this;
    //$(".evaluate").addClass("disabled");
    if(_this.company_id == "72000450" || _this.company_id == "72034819" || _this.company_id == "72221109"){
        if($(".evaluation").length>0){
            $(".evaluation").remove();
            chatAnimate.scroll_bottom();
        }
    }else{
        $(".evaluation").remove();
        chatAnimate.scroll_bottom();
    }
}

//评分按钮设置为可点击
MobileClient.prototype.voteAbled = function(){
    var _this = this;
    //$(".evaluate").removeClass("disabled");
}
//获取图片显示文本
MobileClient.prototype.getFileMsg = function(filename,type){
    var _this = this;
    var file_msg = "";
    var url_name = "kfs3";
    if(filename.indexOf(url_name)!=-1){
        if(type.toLowerCase()=='video'){
            file_msg = '<div class="upload-wrap">'+
                '<div class="msg_file msg_video fl">'+
                    '<video src="'+filename+'" controls="controls" preload="load">抱歉，你的浏览器不支持视频播放</video><img class="video_bg" src="/mobiles/image/video_bg200.png" alt="">"</div>'+
                '</div>'+
            '</div>';
        }else if(type.toLowerCase()=='audio'){
            if(company_id == 72012964 ){
                file_msg ='<div class="upload-wrap">'+
                    '<div class="msg_file msg_audio fl">'+
                        '<audio src="'+filename+'" controls="controls" controlsList="nodownload" autoplay="autoplay">抱歉，你的浏览器不支持音频播放</video></div>'+
                    '</div>'+
                '</div>';
            }else{
                file_msg ='<div class="upload-wrap">'+
                    '<div class="msg_file msg_audio fl">'+
                        '<audio src="'+filename+'" controls="controls" controlsList="nodownload" >抱歉，你的浏览器不支持音频播放</video></div>'+
                    '</div>'+
                '</div>';
            }
        }else{
            file_msg ='<div class="upload-wrap">'+
                '<div class="msg_file fl">'+
                    '<p class="file-header font12">'+
                        '<span class="fileName">'+_this.beforeRender(_this.getStringField(filename, "*", 2))+'</span>'+
                        // '<span class="fileSize fr">'+size+'</span>'+
                    '</p>'+
                    '<div class="uploadStatus color-blue fr"><a href="'+ _this.getStringField(filename, "*", 1) + '" target="_blank">' + _this.configs["mobile_lang_json"][27] + '</a></div>'+
                    '<div class="statusIcon"></div>'+
                '</div>'+
            '</div>';
        }
    }else{
        file_msg ='<div class="upload-wrap">'+
            '<div class="msg_file fl">'+
                '<p class="file-header font12">'+
                    '<span class="fileName">'+_this.beforeRender(_this.getStringField(filename, "*", 2))+'</span>'+
                '</p>'+
                '<div class="uploadStatus color-blue fr"><a href="'+ _this.getStringField(filename, "*", 1) + '" target="_blank">' + _this.configs["mobile_lang_json"][27] + '</a></div>'+
                '<div class="statusIcon"></div>'+
            '</div>'+
        '</div>';
    }
    // var file_msg = '<span style="font-size:13px;">'+_this.getStringField(filename, "*", 2)+'&nbsp;&nbsp;&nbsp;&nbsp;'+_this.configs["mobile_lang_json"][26]+'<br><a href="' + _this.getStringField(filename, "*", 1) + '" target="_blank" onclick="javascript:stop_uc=1;">' + _this.configs["mobile_lang_json"][27] + '</a> </span>';
    // var file_msg = '<div class="upload-wrap kf-uploadFile"><div class="upload-file fl">'+
    //                     '<p class="file-header"><span class="fileName">'+_this.beforeRender(_this.getStringField(filename, "*", 2))+'</span>'+
    //                         //'<span class="fileSize fr">'+_this.configs["mobile_lang_json"][26]+'</span>'+
    //                     '</p>'+
    //                         '<div class="uploadStatus color-blue fr">'+
    //                             '<a class="color-blue" onclick="javascript:stop_uc=1;" href="' + _this.getStringField(filename, "*", 1) + '" target="_blank">' + _this.configs["mobile_lang_json"][27] + '</a>'+
    //                         '</div>'+
    //                         '<div class="statusIcon"></div>'+
    //                     '</div>'+
    //                 '</div>';

    return file_msg;
}

//发送图片
MobileClient.prototype.mSendImg = function(up_img_content) {
    var _this = this;
    $(".popup").slideUp(90);
    $(".icon-fold").removeClass('isOpen')
    $(".icon-fold").css("transform","rotate(0deg)")
    var upload_logo_id = "kh_img_"+new Date().getTime();
    var upload_progress = "kh_progress_"+new Date().getTime();
    var img_src= "";
    reader = new FileReader();
    reader.onload = function( e ){
        img_src = e.target.result || "../../mobile_new/img/upload_logo1.png";

        var upload_logo_msg = '<IMG id="'+upload_logo_id+'" src="'+img_src+'" border="0"/><div id="'+upload_progress+'" class="a-loading-bg"><a class="a-loading"></a></div>';
        _this.showMsg(upload_logo_msg,'v');

    };
    reader.readAsDataURL( up_img_content );
    // console.log(up_img_content,6666)

    var fd = new FormData();
    fd.append("userimg",up_img_content);

    var xhr = new XMLHttpRequest();
    var time = false;
    var timer = setTimeout(function(){
        time = true;
//      $("#"+upload_logo_id).attr("src","../../mobile_new/img/send_failed1.png");
//      $("#"+upload_progress).remove();
        _this.uploadImgFailed(upload_logo_id,upload_progress,up_img_content);
        xhr.abort();//请求中止
    },180000);
    xhr.onreadystatechange = function() {
        if(time) return;//忽略中止请求
        if(xhr.readyState==4) {
            if(xhr.status==200){
                clearTimeout(timer);//取消等待的超时
                //restore_bar_html();
                //$('#icon-tools').click();
                var str_start = xhr.responseText.indexOf('<body>') + 6;
                var str_end = xhr.responseText.indexOf('</body>');
                var result_str = xhr.responseText.substring(str_start,str_end).trim();
                result_str =(new Function("","return "+result_str))();
                if(result_str.upload == "success") {
                    var msg = '<img src="'+ result_str.url +'" />';
                    $("#"+upload_logo_id).attr("src",result_str.url);
                    var img = new Image();
                    img.src = result_str.url;
                    img.onload = function () {
                        $("#"+upload_progress).remove();
                    };
                    // if (_this.params['in_lword']) {
                    //     _this.sendLwordMsg(msg,true);
                    // }else{
                        _this.sendMsg(msg,true);
                    // }
                    if(typeof _this.params["m_uploadimgfailed"]["error_"+upload_logo_id] != "undefined"){
                        delete _this.params["m_uploadimgfailed"]["error_"+upload_logo_id];
                    }
                }else{
                    _this.uploadImgFailed(upload_logo_id,upload_progress,up_img_content);
                }
            }else{
                _this.uploadImgFailed(upload_logo_id,upload_progress,up_img_content);
            }
        }
    }

    //侦查当前附件上传情况
    xhr.upload.onprogress = function(evt){
        //该匿名函数表达式大概0.05-0.1秒执行一次
        //console.log(evt.loaded);  //已经上传大小情况
        var loaded = evt.loaded;
        var tot = evt.total;
        var son = $('#'+upload_progress).find("a");
        son.css("width",Math.floor(loaded/tot*80)+"px");
    }
    xhr.open("post","/upload_img.php?type=visiter&company_id="+company_id);
    xhr.send(fd);
}

//图片发送失败显示
MobileClient.prototype.uploadImgFailed = function(upload_logo_id,upload_progress,up_img_content){
    var _this = this;
    var error_id = "error_"+upload_logo_id;
    _this.params["m_uploadimgfailed"][error_id] = up_img_content;
    $("#"+upload_logo_id).parent().parent().append('<i class="info-status onError" id="'+error_id+'"></i>');
    $("#"+upload_progress).remove();
}

//机器人接通提示语
MobileClient.prototype.getRobotConnPrompt = function(){
    var _this = this;
    if(_this.configs["zsk_prompt"] != ''){
        robot_client.sendRoa(_this.configs["zsk_prompt"],"p");
        if(_this.configs["is_minchat"]) {//手机强制对话 新消息提示
            top.postMessage('53kf_new_msg:' + _this.configs["zsk_prompt"], '*');
        }
        var cope_btn = _this.getCopyClueBtn(_this.configs["zsk_prompt"]);
        var msg_div = _this.getNowTime();
        msg_div += '<div class="pc-service"><div class="pc-service-left"><img width="34px" src="'+_this.configs["zsk_zsktb_url"]+'" alt=""></div><div class="pc-service-right"><div class="pc-service-info font14"><div class="robot-info-answer"><div class="answer-text">'+commFun.encoding.UBBCode(commFun.encoding.UBBEncode(_this.configs["zsk_prompt"]))+'</div></div></div>'+cope_btn+'</div></div>';
        _this.talkAppend(msg_div);
    }
}

//展示机器人热点消息
MobileClient.prototype.showHots = function(){
    var _this = this;
    var robot_hots = _this.configs["zsk_hots"];

    if( robot_hots != undefined && robot_hots.length>0){
        var msg_div = _this.getNowTime();
        msg_div += '<div class="pc-service"><div class="pc-service-left"><img width="34px" src="'+_this.configs["zsk_zsktb_url"]+'" alt=""></div><div class="pc-service-right"><div class="pc-service-info font14"><div style="overflow:hidden;"><div class="robot-info"><p class="robot-info-title">'+_this.configs["mobile_lang_json"][28]+'</p><ul class="question-lists color-blue">';
        for (var i=0;i<robot_hots.length;i++){
            _this.params["robot_question"][robot_hots[i]["id"]] = robot_hots[i];
            msg_div += '<li class="" onclick="mobile_client.checkHotQuestion(\''+robot_hots[i]["question"]+'\',\''+robot_hots[i]["answer"]+'\',\''+robot_hots[i]["id"]+'\')">'+(i+1)+'.'+robot_hots[i]["question"]+'</li>';
        }
        msg_div += '</ul></div></div></div></div></div>';
        _this.talkAppend(msg_div);
    }
}

/*//根据机器人问题id，找到缓存的机器人消息
MobileClient.prototype.findQuestion = function(q_id){
    var _this = this;
    if(q_id == undefined || q_id == "") return;
    if(_this.params["robot_question"][q_id] != undefined && _this.params["robot_question"][q_id]["answer"] != undefined) _this.showRobotMsg(_this.params["robot_question"][q_id]["answer"],"w",q_id);
    _this.robotKafka();
}*/

//展示机器人消息
MobileClient.prototype.showRobotMsg = function(msg,type,q_id,list){
    var _this = this;
    var msg_div = _this.getNowTime();
    var clueData = _this.saveRobotMsgInfo(msg,type);
    var hasWechat = 0;
    if (clueData != false && clueData.wechat != '') hasWechat = 1;
    _this.removeRobotLoad();
    if(type == "w"){
        var cope_btn = _this.getCopyClueBtn(msg);
        msg_div += '<div class="pc-service"><div class="pc-service-left"><img width="34px" src="'+_this.configs["zsk_zsktb_url"]+'" alt=""></div><div class="pc-service-right"><div class="pc-service-info font14"><div class="robot-info-answer"><div class="answer-text">'+commFun.encoding.UBBCode(commFun.encoding.UBBEncode(commFun.encoding.HtmlDecode(msg)))+'</div>';
        if(_this.configs["task_robot_use"] == '0' && _this.configs["zsk_feedback"] == '1') {
            msg_div += '<div class="robot-eval-wrap" ><div class="btns-wrap"><div class="answer-btns clearfix color-grey-deep"><span class="answer-btn fl use "><span class="answer-icon-wrap" onclick="mobile_client.robotFenciCR(\'' + q_id + '\',4,this)">' + _this.configs["mobile_lang_json"][29] + '</span></span><div class="answer-btn fl unuse"><div class="answer-icon-wrap">' + _this.configs["mobile_lang_json"][30];
            // msg_div += '<div class="use-info-wrap">'+_this.configs["mobile_lang_json"][44]+'</div>';
            msg_div += '</div></div></div></div>';

            msg_div += '<div class="unuse-info-wrap"><p class="reason-title color-grey-deep">' + _this.configs["mobile_lang_json"][31] + '</p><ul class="reason-btns clearfix"><li class="reason-btn fl"  onclick="mobile_client.robotFenciCR(\'' + q_id + '\',0,this)">' + _this.configs["mobile_lang_json"][32] + '</li><li class="reason-btn fl"  onclick="mobile_client.robotFenciCR(\'' + q_id + '\',1,this)">' + _this.configs["mobile_lang_json"][33] + '</li><li class="reason-btn fl"  onclick="mobile_client.robotFenciCR(\'' + q_id + '\',2,this)">' + _this.configs["mobile_lang_json"][34] + '</li><li class="reason-btn fl"  onclick="mobile_client.robotFenciCR(\'' + q_id + '\',3,this)">' + _this.configs["mobile_lang_json"][35] + '</li></ul></div></div>';
            msg_div += '<div class="use-info-wrap">' + _this.configs["mobile_lang_json"][44] + '</div>';
        }
        if(list != undefined && list.length>0){//关联问题
            msg_div += '<p class="related-problems color-grey-light">'+_this.configs["mobile_lang_json"][36]+'</p><ul class="question-lists color-blue">';
            for (var i=0;i<list.length;i++){
                //if(_this.configs["is_huawei_robot"] == "1")
                //    msg_div += '<li class=" " onclick="mobile_client.sendRobotMsg(\''+list[i]["question"]+'\')">'+(i+1)+'.'+list[i]["question"]+'</li>';
                //else
                    msg_div += '<li class=" " onclick="mobile_client.checkHotQuestion(\''+list[i]["question"]+'\',\''+list[i]["answer"]+'\',\''+list[i]["id"]+'\')">'+(i+1)+'.'+list[i]["question"]+'</li>';
            }
            msg_div += '</ul>';
        }
        msg_div += '</div></div>'+cope_btn+'</div></div>';
        if(q_id != undefined && q_id != "") _this.robotFenciCR(q_id,5);//发送未评价
    }else if(type == "v"){
        var msgid_html = '';
        //if(msgid != undefined && msgid != "") msgid_html = '<i class="info-status" id="'+msgid+'"></i>';
        msg_div += '<div class="pc-customer"><div class="pc-customer-info font14"><span>'+commFun.encoding.UBBCode(commFun.encoding.UBBEncode(msg))+'</span>'+msgid_html+'</div></div>';
    }else if(type == "s"){
        var cope_btn = _this.getCopyClueBtn(msg);
        msg_div += '<div class="pc-service"><div class="pc-service-left"><img width="34px" src="'+_this.configs["zsk_zsktb_url"]+'" alt=""></div><div class="pc-service-right"><div class="pc-service-info font14"><div class="robot-info-answer"><div class="answer-text">'+commFun.encoding.UBBCode(commFun.encoding.UBBEncode(commFun.encoding.HtmlDecode(msg)))+'</div>';
        msg_div += '</div></div>'+cope_btn+'</div></div>';
    }
    _this.talkAppend(msg_div);
    if(_this.params["robot_unshow_msg"]>0){
        _this.showRobotLoad();
    }
    return hasWechat;
}

//展示机器人消息加载框
MobileClient.prototype.showRobotLoad = function(){
    var _this = this;
    $("#loading_box").remove();
    //var msg_div = '<div class="pc-service" id="loading_box"><div class="pc-service-left"><img width="34px" src="'+_this.configs["zsk_zsktb_url"]+'" alt=""></div><div class="pc-service-right"><div class="pc-service-info font14"><div class="robot-info-answer"><div class="answer-text"><div class="loading_box" ><div class="message_loading"></div></div></div></div></div></div></div>';
    var msg_div = '<div class="loading_box" id="loading_box"><div class="message_loading"></div></div>';
    _this.talkAppend(msg_div);
}

//展示机器人消息加载框
MobileClient.prototype.removeRobotLoad = function(){
    var _this = this;
    $("#loading_box").remove();
}

//展示机器人消息,959特殊处理
MobileClient.prototype.showRobotMsgCopy = function(msg,type,q_id,list){
    var _this = this;
    var msg_div = _this.getNowTime();
    //_this.saveRobotMsgInfo(msg,type);
    if(type == "w"){
        var cope_btn = _this.getCopyClueBtn(msg);
        msg_div += '<div class="pc-service"><div class="pc-service-left"><img width="34px" src="'+_this.configs["zsk_zsktb_url"]+'" alt=""></div><div class="pc-service-right"><div class="pc-service-info font14"><div class="robot-info-answer"><div class="answer-text">'+commFun.encoding.UBBCode(commFun.encoding.UBBEncode(commFun.encoding.HtmlDecode(msg)))+'</div>';
        if(_this.configs["task_robot_use"] == '0' && _this.configs["zsk_feedback"] == '1') {
            msg_div += '<div class="robot-eval-wrap" ><div class="btns-wrap"><div class="answer-btns clearfix color-grey-deep"><span class="answer-btn fl use "><span class="answer-icon-wrap" onclick="mobile_client.robotFenciCR(\'' + q_id + '\',4,this)">' + _this.configs["mobile_lang_json"][29] + '</span></span><div class="answer-btn fl unuse"><div class="answer-icon-wrap">' + _this.configs["mobile_lang_json"][30];
            // msg_div += '<div class="use-info-wrap">'+_this.configs["mobile_lang_json"][44]+'</div>';
            msg_div += '</div></div></div></div>';

            msg_div += '<div class="unuse-info-wrap"><p class="reason-title color-grey-deep">' + _this.configs["mobile_lang_json"][31] + '</p><ul class="reason-btns clearfix"><li class="reason-btn fl"  onclick="mobile_client.robotFenciCR(\'' + q_id + '\',0,this)">' + _this.configs["mobile_lang_json"][32] + '</li><li class="reason-btn fl"  onclick="mobile_client.robotFenciCR(\'' + q_id + '\',1,this)">' + _this.configs["mobile_lang_json"][33] + '</li><li class="reason-btn fl"  onclick="mobile_client.robotFenciCR(\'' + q_id + '\',2,this)">' + _this.configs["mobile_lang_json"][34] + '</li><li class="reason-btn fl"  onclick="mobile_client.robotFenciCR(\'' + q_id + '\',3,this)">' + _this.configs["mobile_lang_json"][35] + '</li></ul></div></div>';
            msg_div += '<div class="use-info-wrap">' + _this.configs["mobile_lang_json"][44] + '</div>';
        }
        if(list != undefined && list.length>0){//关联问题
            msg_div += '<p class="related-problems color-grey-light">'+_this.configs["mobile_lang_json"][36]+'</p><ul class="question-lists color-blue">';
            for (var i=0;i<list.length;i++){
                //if(_this.configs["is_huawei_robot"] == "1")
                //    msg_div += '<li class=" " onclick="mobile_client.sendRobotMsg(\''+list[i]["question"]+'\')">'+(i+1)+'.'+list[i]["question"]+'</li>';
                //else
                    msg_div += '<li class=" " onclick="mobile_client.checkHotQuestion(\''+list[i]["question"]+'\',\''+list[i]["answer"]+'\',\''+list[i]["id"]+'\')">'+(i+1)+'.'+list[i]["question"]+'</li>';
            }
            msg_div += '</ul>';
        }
        msg_div += '</div></div>'+cope_btn+'</div></div>';
        if(q_id != undefined && q_id != "") _this.robotFenciCR(q_id,5);//发送未评价
    }else if(type == "v"){
        var msgid_html = '';
        //if(msgid != undefined && msgid != "") msgid_html = '<i class="info-status" id="'+msgid+'"></i>';
        msg_div += '<div class="pc-customer"><div class="pc-customer-info font14"><span>'+commFun.encoding.UBBCode(commFun.encoding.UBBEncode(msg))+'</span>'+msgid_html+'</div></div>';
    }else if(type == "s"){
        var cope_btn = _this.getCopyClueBtn(msg);
        msg_div += '<div class="pc-service"><div class="pc-service-left"><img width="34px" src="'+_this.configs["zsk_zsktb_url"]+'" alt=""></div><div class="pc-service-right"><div class="pc-service-info font14"><div class="robot-info-answer"><div class="answer-text">'+commFun.encoding.UBBCode(commFun.encoding.UBBEncode(commFun.encoding.HtmlDecode(msg)))+'</div>';
        msg_div += '</div></div>'+cope_btn+'</div></div>';
    }
    _this.talkAppend(msg_div);
}

//关联问题拼接显示
MobileClient.prototype.matchQuesShow = function(msg){
    var _this = this;
    var length = msg.total;
    var robotAcqHtml = '';
    for (var i= 0;i<length;i++){
        robotAcqHtml += '<li class="match-question-list" onclick ="mobile_client.sendRobotMsg(\''+msg.rows[i].question+'\',\''+msg.rows[i].answer+'\')">'+msg.rows[i].question+'</li>';
    }
    $("#robot_match_ques").html(robotAcqHtml);
    $("#robot_match_ques").show();
}

//隐藏关联问题
MobileClient.prototype.matchQuesHide = function(){
    var _this = this;
    $("#robot_match_ques").html("");
    $("#robot_match_ques").hide();
}

//隐藏输入框
MobileClient.prototype.textAreaHide = function(type){
    var _this = this;
    $(".talk-inputArea").hide();
    if (type == 'scene') {
        $(".talk-content-wrap").css("padding-bottom","2rem");
    }
}

//显示输入框
MobileClient.prototype.textAreaShow = function(){
    var _this = this;
    $(".talk-inputArea").show();
    if (_this.params["is_sceneToTalk"]) {
        if ($('html').hasClass("is_ios11") && !($('#mobile').hasClass('minchat_type')>0)) {
            $(".talk-content-wrap").css("padding-bottom","16rem");
        }else{
            $(".talk-content-wrap").css("padding-bottom","8.8rem");
        }
        _this.scroll("talk_content");
    }
}

//去除提交按钮刷新显示
MobileClient.prototype.submitRemoveLoading = function(id){
    var _this = this;
    $("#"+id).removeClass("loading");
}

//获取input或text框内容
MobileClient.prototype.getText = function(id){
    var _this = this;
    return $.trim($("#"+id).val());
}

/*//留言相关项错误提示
MobileClient.prototype.showLwordError = function(type){
    var _this = this;
    if(type == "lword_msg") alert("留言内容不能为空!");
}*/

//修改发送按钮颜色
MobileClient.prototype.changeBtnSend = function(){
    var _this = this;
    $("#btnSend").removeClass("hasMessage");
}

//获取留言对象
MobileClient.prototype.getLwordObject = function(){
    var _this = this;
    return $.trim($(".lword-text").attr("lword_object_id"));
}

//显示留言成功
MobileClient.prototype.showLwordSuc = function(){
    var _this = this;
    $(".lword").hide();
    $(".lword-success").show();

    var num = 10;
    var timer = setInterval(function(){
        num--;
        if(num<1){
            clearInterval(timer);
            if($("#mobile").hasClass("minchat_type")){
                window.parent.postMessage("close",'*');
                window.location.reload();
            }else {
                mobile_client.goBack();
            }
            return;
        }
        $(".lword-success").find(".bottom-remind p").text(_this.configs["mobile_lang_json"][64]+ num + _this.configs["mobile_lang_json"][65]);
    },1000)
}

//隐藏
MobileClient.prototype.hideAfterClose = function(){
    var _this = this;
    $("#after_close").hide();
    $("#net_error").hide();
}

//机器人问题反馈点击后显示
MobileClient.prototype.afterRobotCR = function(obj){
    var _this = this;
    $(obj).addClass("active").parents(".robot-info-answer").find(".robot-eval-wrap").hide().siblings(".use-info-wrap").show();
}

//显示机器人转人工按钮
MobileClient.prototype.showToService = function(){
    var _this = this;
    $(".to-service").show();
}

//隐藏加号
MobileClient.prototype.hideHeaderMore = function(){
    var _this = this;
    $(".header-more").hide();
}

//显示加号
MobileClient.prototype.showHeaderMore = function(){
    var _this = this;
    $(".header-more").show();
}

// 输入中控制按钮是否可点击
MobileClient.prototype.can_submit = function(pElem){
    var _this = this;
    var bool = true;
    pElem.find("input.isMust").each(function(){
        if($(this).val()=="") return bool = false;
    })
    bool? pElem.find(".info-btn").removeClass("disabled"):pElem.find(".info-btn").addClass("disabled");
}

//显示排队时发消息提示
MobileClient.prototype.showWaitMsg = function(type){
    var _this = this;
    var wait_msg_html = '<div class="linkTo font14">';
    if(type) wait_msg_html += '<a class="color-blue wait-to-robot" onclick="mobile_client.waitTypeChange(\'robot\')" href="javascript:;">'+_this.configs["mobile_lang_json"][57]+'</a>';
    wait_msg_html += '<a class="color-blue wait-to-lword" onclick="mobile_client.waitTypeChange(\'lword\')" href="javascript:;">'+_this.configs["mobile_lang_json"][42]+'</a> </div>';
    _this.talkAppend(wait_msg_html);
}

//置灰排队中选择机器人或留言的按钮
MobileClient.prototype.hideWaitChangeButton = function (){
    var _this = this;
    $(".wait-to-robot").addClass("disabled");
}

//留言框内容初始化
MobileClient.prototype.initLwordContent = function(msg){
    var _this = this;
    $("#lword_msg").val(msg);
}

//切换模块静态信息
MobileClient.prototype.changModule = function(module){
    var _this = this;
    if(module == "reg"){//注册模块
        //处理头部
        $(".header-title").html(_this.configs["mobile_lang_json"][0]).removeClass("right-square-bracket");//修改头部信息
        $(".icon_card_info").hide();//隐藏客服名片
        $(".header-more").hide();//隐藏头部右侧加号
        //处理模块显示
        $(".info-input").show();//显示注册模块
        $(".select-kf").hide();//显示客服列表模块
        $(".kf-talk").hide();//隐藏对话显示模块
        $(".lword").hide();//隐藏留言模块
        $(".lword-success").hide();//隐藏留言成功模块
    }else if(module == "selkf"){
        //处理头部
        $(".header-title").html(_this.configs["mobile_lang_json"][4]).removeClass("right-square-bracket");//修改头部信息
        $(".icon_card_info").hide();//隐藏客服名片
        $(".header-more").hide();//隐藏头部右侧加号
        //处理模块显示
        $(".select-kf").show();//显示客服列表模块
        $(".kf-talk").hide();//隐藏对话显示模块
        $(".info-input").hide();//隐藏注册模块
        $(".lword").hide();//隐藏留言模块
        $(".lword-success").hide();//隐藏留言成功模块
    }else if(module == "showkf" || module == "robot"){
        //处理头部
        $(".header-title").html(_this.configs["mobile_lang_json"][11]);//修改头部信息
        $(".icon_card_info").hide();//隐藏客服名片
        $(".header-more").show();//显示头部右侧加号
        $(".more-wrap .border_none").removeClass("border_none");
        if(module == "showkf"){//对话
            // $(".evaluate").show();//显示评分按钮
            // $(".end-talk").show().addClass("border_none");//显示结束对话按钮
            //隐藏机器人接待弹框
            // $(".to-service").hide();//隐藏转人工按钮
            // $(".to-lword").hide();//隐藏转留言按钮
            $("#emojiBtn").show();//显示图片和表情按钮
            $("#foldBtns").show();//显示图片和表情按钮
            $(".to-service").hide();
            $(".to-lword").hide();
        }else{
            if ((_this.configs["zsk_admit_rule"] == '1' && !_this.params["is_run"]) || _this.configs["zsk_admit_rule"] == '2') {
                $(".to-lword").show().prevAll().hide();
            }else{
                $(".to-service").show().prevAll().hide();
                $(".to-lword").show();
            }
            if (_this.configs["zsk_api_robot_id"] != "" || _this.configs["task_robot_use"] == "1") {
                $(".to-lword").hide();
            }
            // $(".evaluate").hide();//隐藏评分按钮
            // $(".end-talk").hide();//隐藏结束对话按钮
            // $(".to-service").show();//显示转人工按钮
            // $(".to-lword").show().addClass("border_none");//显示转留言按钮
            $("#emojiBtn").hide();//隐藏图片和表情按钮
            $("#IS_SCENE_TIP").hide();//隐藏场景引导转人工的不在线提示
        }
        //处理模块显示
        // $(".kf-talk").show();//显示对话模块
        $(".kf-talk").show();
        $(".select-kf").hide();//隐藏客服列表模块
        $(".info-input").hide();//隐藏注册模块
        $(".lword").hide();//隐藏留言模块
        $(".lword-success").hide();//隐藏留言成功模块
    }else if(module == "lword"){
        //处理头部
        $(".header-title").html(_this.configs["mobile_lang_json"][46]).removeClass("right-square-bracket");//修改头部信息
        $(".icon_card_info").hide();//隐藏客服名片
        $(".header-more").hide();//显示头部右侧加号
        //处理模块显示
        $(".kf-talk").hide();//显示对话模块
        $(".select-kf").hide();//隐藏客服列表模块
        $(".info-input").hide();//隐藏注册模块
        $(".lword").show();//隐藏留言模块
        $(".lword-success").hide();//隐藏留言成功模块
        $("#IS_SCENE_TIP").hide();//隐藏场景引导转人工的不在线提示
    }else if(module == "prompt"){//智能引导
        //处理头部
        $(".header-title").html(_this.configs["mobile_lang_json"][11]).removeClass("right-square-bracket");//修改头部信息
        $(".icon_card_info").hide();//隐藏客服名片
    }else if(module == "scene"){//场景引导
        //处理头部
        $(".header-title").html(_this.configs["mobile_lang_json"][11]).removeClass("right-square-bracket");//修改头部信息
        $(".icon_card_info").hide();//隐藏客服名片
        _this.textAreaHide('scene');
    }else if (module == "lword_talk") {
        //处理头部
        $(".header-title").html(_this.configs["mobile_lang_json"][11]);//修改头部信息
        $(".icon_card_info").hide();//隐藏客服名片
        $(".header-more").show();//显示头部右侧加号
        $(".more-wrap .border_none").removeClass("border_none");
        
        //隐藏机器人接待弹框
        $(".popup .evaluate").hide().prevAll().show();
        $(".popup .end-talk").hide();
        $(".popup .to-lword").hide();
        $("#emojiBtn").show();//显示图片和表情按钮
        //处理模块显示
        // $(".kf-talk").show();//显示对话模块
        $(".kf-talk").show();
        $(".select-kf").hide();//隐藏客服列表模块
        $(".info-input").hide();//隐藏注册模块
        $(".lword").hide();//隐藏留言模块
        $(".lword-success").hide();//隐藏留言成功模块
        $("#IS_RUN_TIP").hide();
        $(".linkTo a").css("color","#62778C");
        $(".linkTo a").attr("onclick","");
        _this.hideAfterClose();
    }
}

//访客表单单选选择器
MobileClient.prototype.showVisitorForm = function(title,res,formid){
    var _this=this;
    // console.log(_this.configs['visitor_form']);
    var id_arr=res.split(',');
    // var formid = "formid_" + new Date().getTime();
    var visitor_form_html='<div id="'+formid+'" class="phone_visitor_form"><p class="visitor_form_title">'+title+'</p>';
    for(var i=0;i<id_arr.length;i++){
        var form_item=_this.configs['visitor_form'][id_arr[i]];
        if(form_item.field_type=='1'){//输入框
            if(form_item.field_name=='name'){
                visitor_form_html+='<div data-id="'+id_arr[i]+'" class="visitor_form_ques nomal"><input class="visitor_form_input1" data-type="name" type="text" placeholder="'+form_item.name+'"><p class="tip_error">'+_this.configs["mobile_lang_json"][70]+form_item.name+'</p></div>';//请输入
            }else if(form_item.field_name=='mobile'){
                visitor_form_html+='<div data-id="'+id_arr[i]+'" class="visitor_form_ques nomal"><input class="visitor_form_input1" data-type="mobile" type="text" placeholder="'+form_item.name+'"><p class="tip_error">'+_this.configs["mobile_lang_json"][69]+form_item.name+'</p></div>';//请输入有效的
            }else if(form_item.field_name=='weixin'){
                visitor_form_html+='<div data-id="'+id_arr[i]+'" class="visitor_form_ques nomal"><input class="visitor_form_input1" data-type="wechat" type="text" placeholder="'+form_item.name+'"><p class="tip_error">'+_this.configs["mobile_lang_json"][69]+form_item.name+'</p></div>';
            }else if(form_item.field_name=='qq'){
                visitor_form_html+='<div data-id="'+id_arr[i]+'" class="visitor_form_ques nomal"><input class="visitor_form_input1" data-type="qq" type="text" placeholder="'+form_item.name+'"><p class="tip_error">'+_this.configs["mobile_lang_json"][69]+form_item.name+'</p></div>';
            }else if(form_item.field_name=='email'){
                visitor_form_html+='<div data-id="'+id_arr[i]+'" class="visitor_form_ques nomal"><input class="visitor_form_input1" data-type="email" type="text" placeholder="'+form_item.name+'"><p class="tip_error">'+_this.configs["mobile_lang_json"][69]+form_item.name+'</p></div>';
            }else{
                visitor_form_html+='<div data-id="'+id_arr[i]+'" class="visitor_form_ques"><input class="visitor_form_input1" type="text" placeholder="'+form_item.name+'"><p class="tip_error">'+_this.configs["mobile_lang_json"][70]+form_item.name+'</p></div>';
            }
        }else{//单选
            var single_item=form_item.option_config;
            single_item=single_item.toString();
            visitor_form_html+='<div data-id="'+id_arr[i]+'" class="visitor_form_ques single_choose" single_item="'+single_item+'"><input class="visitor_form_input2" type="text" placeholder="'+form_item.name+'" readonly="readonly"><span class="slide_down_btn"></span><p class="tip_error">'+_this.configs["mobile_lang_json"][71]+form_item.name+'</p></div>';//请选择
        }
    }
    visitor_form_html+='<p class="visitor_form_submit">'+_this.configs["mobile_lang_json"][66]+'</p></div>';//提交表单
    $('#talk_content').append(visitor_form_html);
    chatAnimate.scroll_bottom();

}

//访客表单移除
MobileClient.prototype.removeVisitorForm = function(){
    $('.phone_visitor_form').remove();
}
