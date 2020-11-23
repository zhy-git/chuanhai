var yee = {
    get:function(url,data,success,error){
        $.ajax({
            url:url,
            data:data,
            dataType:'json',
            type:'GET',
            success:function(result){
                success&&success(result);
            },
            error:function(err){
                error && error(err);
            }
        });
    },
    post:function(url,data,success,error){
        $.ajax({
            url:url,
            data:data,
            dataType:'json',
            type:'POST',
            success:function(result){
                success&&success(result);
            },
            error:function(err){
                error && error(err);
            }
        });
    },
    // 判断是否是手机号码
    isMoblie:function(num){
        if((/^1[3|5|8|7][0-9]\d{8}$/.test(num))){
            return true;
        }else{
            return false;
        }
    },
    // 判断是否是邮箱
    isEmail:function(email){
        if(/^(\w-*\.*)+@(\w-?)+(\.\w{2,})+$/.test(email)){
            return true;
        }else{
            return false;
        }
    },
    // 设置cookie
    setCookie:function (c_name,value,expiredays){
        var exdate=new Date();
        exdate.setDate(exdate.getDate()+expiredays);
        document.cookie=c_name+ "=" +escape(value)+((expiredays==null) ? "" : ";expires="+exdate.toGMTString());
    },
    // 获取cookie
    getCookie:function(c_name){
        if (document.cookie.length>0){
            c_start=document.cookie.indexOf(c_name + "=")
            if (c_start!=-1){
                c_start=c_start + c_name.length+1
                c_end=document.cookie.indexOf(";",c_start)
            if (c_end==-1) c_end=document.cookie.length
                return unescape(document.cookie.substring(c_start,c_end))
            }
        }
        return ""
    },
    // layer的open确定方法
    layerOpen:function(content,btn,quexiao){
        content = content==''?'错误':content;
        btn = btn==''?btn:'确定';
        quexiao = quexiao==''?'':quexiao;
        if (quexiao) {
                layer.open({
                    content: content,
                    btn: [btn,quexiao]
                });

            }else{
                layer.open({
                    content: content,
                    btn: [btn]
                });
            }
    },
    /*
    * 报名方法
    * mobile 手机号码
    * name 姓名
    * type 报名类型
    * pid 看房团报名、或者团购的id
    * content 报名内容
    * informas 通知内容,价格变动\开盘通知\看房团（废弃用content代替）
    */
    showings:function(mobile,type,pid,name,content,informs){
        if(!yee.isMoblie(mobile)){
            layer.open({
                content: '请输入正确是手机号码',
                btn: ['OK']
            });
            return false;
        }
        if (!type) {
            layer.open({
                content: '信息错误',
                btn: ['OK']
            });
            return false;
        };
        if (type==1||type==5) {
            if (!name) {
                layer.open({
                    content: '请输入您的姓名',
                    btn: ['OK']
                });
                return false;
            };
        };
        if(type==5){
            if(!content){
                layer.open({
                    content: '请填写意向楼盘或区域',
                    btn: ['OK']
                });
                return false;
            }
        }

        name = name ? name : '';
        content = content ? content : '';
        informs = informs ? informs : '';
        var data = {
            mobile:mobile,
            name:name,
            pid:pid,
            type:type,
            content:content,
            informs:informs
        }
        yee.post('/api/sign-add.html',data,function(result){
            layer.open({
                content: result.msg,
                btn: ['OK']
            });
            setTimeout(function(){
                layer.closeAll();
            },2000);
        });
    },

    // 我想看航拍报名窗口
    showwykhp:function(pid,type){
        $.get('/api/sign-getsigncount.html',{pid:pid,type:type},function(count){
            var content = '<div class="lookaerial">';
            content += '<div class="aerial_top">';
            content += '<div class="text">';
            content += '<p class="h"><img src="/public/wap/images/aerial_h.png" width="100%" alt=""></p>';
            content += '<p class="gb"><a href="javascript:void(0);" onclick="layer.closeAll();"><img src="/public/wap/images/aerial_gb.png" alt=""></a></p>';
            content += '</div>';
            content += '<div class="aerial_main">';
            content += '<span class="spn">项目名称</span><input type="text" placeholder="请输入您想看的航拍项目" class="inp12">';
            content += '<span class="spn">姓<i></i>名</span><input type="text" placeholder="请输入您的姓名" class="inp13">';
            content += '<span class="spn">电<i></i>话</span><input type="text" placeholder="请输入您的电话" class="inp14">';
            content += '<input type="button" onclick="yee.showings($(this).prev().val(),8,0,$(this).prev().prev().prev().val(),$(this).prev().prev().prev().prev().prev().val())" value="确 定" class="butt">';
            content += '</div>';
            content += '</div>';
            content += '</div>';
            layer.open({
                type: 1,
                title:'',
                closeBtn:false,
                area: ['auto', 'auto'], //宽高
                content: content
            });
        });
    },


    // 看房报名窗口
    showsign:function(pid,type){
        $.get('/api/sign-getsigncount.html',{pid:pid,type:type},function(count){
            var content = '<div class="kp_notice">';
            content += '<img src="/public/wap/images/kptz_2.png" alt="" class="kp_notice_gb" onclick="layer.closeAll();">';
            content += '<img src="/public/wap/images/kptz_1.png" alt="" class="kp_notice_head" style="position:relative;top:-2px;">';
            content += '<span>报名看房</span>';
            content += '<p>24小时免费接机  看房活动专车直达  享独家团购优惠</p>';        
            content += '<input type="text" placeholder="请输入您的姓名">';
            content += '<input type="text" placeholder="请输入您的手机号码">';
            content += '<a href="javascript:void(0);" onclick="yee.showings($(this).prev().val(),'+type+','+pid+',$(this).prev().prev().val())">确定</a>';
            content += '</div>';
            layer.open({
                type: 1,
                title:'',
                closeBtn:false,
                area: ['auto', 'auto'], //宽高
                content: content
            });
        });
    },

   // 团购报名窗口(最终)
    // showsignfake:function(pid,type){
    //     $.get('/api/sign-getsigncountfake.html',{pid:pid,type:type},function(count){
    //         var content = '<div class="pfopn">';
    //         content += '<div class="pfopn-close" onclick="layer.closeAll();"></div>';
    //         content += '<div class="pfopn-title">看房团报名</div>';
    //         content += '<div class="pfopn-note">已有<span>'+count+'</span>人报名</div>';
    //         content += '<div class="pfopn-con3">24小时免费接机  看房活动专车直达  享独家团购优惠</div>';
    //         content += '<div class="pfopn-form4">';
    //         content += '<input type="text" placeholder="请输入您的姓名" class="inp1">';
    //         content += '<input type="text" placeholder="请输入您的手机号码" class="inp2">';
    //         content += '<input type="button" value="确定"  onclick="yee.showings($(this).prev().val(),'+type+','+pid+',$(this).prev().prev().val())" class="btn">';
    //         content += '</div>';
    //         content += '</div>';
    //         layer.open({
    //             type: 1,
    //             title:'',
    //             closeBtn:false,
    //             area: ['auto', 'auto'], //宽高
    //             content: content
    //         });
    //     });
    // },

    //    // 团购报名窗口(最终)
    showsignfake:function(pid,type){
        $.get('/api/sign-getsigncountfake.html',{pid:pid,type:type},function(count){
            var content = '<div class="group1">';
                content += '<img src="/public/wap/images/kptz_3.png" alt="" class="group_gb" onclick="layer.closeAll();">';
                content += '<div class="group_bj"></div>';
                content += '<div class="group_title">看房团报名</div>';
                content += '<div class="group_rs">已有 <span>'+count+'</span> 人报名</div>';
                content += '<ul class="group_text clearfix">';
                content += '<li><img src="/public/wap/images/kft_2.png" alt="">24小时免费接机</li>';
                content += '<li style="text-indent:14px"><img src="/public/wap/images/kft_2.png" alt="">看房活动专车直达</li>';
                content += '<li><img src="/public/wap/images/kft_2.png" alt="">享独家团购优惠</li>';
                content += '</ul>';
                content += '<div class="group_bm">';
                content += '<input type="text" class="group_bm_input" placeholder="请输入您的姓名">';
                content += '<input type="text" class="group_bm_input2" placeholder="请输入您的手机号码">';
                content += '<a href="javascript:void(0);" onclick="yee.showings($(this).prev().val(),'+type+','+pid+',$(this).prev().prev().val())">确定</a>';
                content += '</div>';
                content += '</div>';
                layer.open({
                    type: 1,
                    title:'',
                    closeBtn:false,
                    area: ['auto', 'auto'], //宽高
                    content: content
            });
        });
    },


    // 团购报名窗口(楼盘)
    showsignproperty:function(pid,type){
        $.get('/api/sign-getsigncountproperty.html',{pid:pid,type:type},function(count){
            var content = '<div class="pfopn">';
            content += '<div class="pfopn-close" onclick="layer.closeAll();"></div>';
            content += '<div class="pfopn-title">看房团报名</div>';
            content += '<div class="pfopn-note">已有<span>'+count+'</span>人报名</div>';
            content += '<div class="pfopn-con3">24小时免费接机  看房活动专车直达  享独家团购优惠</div>';
            content += '<div class="pfopn-form4">';
            content += '<input type="text" placeholder="请输入您的姓名" class="inp1">';
            content += '<input type="text" placeholder="请输入您的手机号码" class="inp2">';
            content += '<input type="button" value="确定"  onclick="yee.showings($(this).prev().val(),'+type+','+pid+',$(this).prev().prev().val())" class="btn">';
            content += '</div>';
            content += '</div>';
            layer.open({
                type: 1,
                title:'',
                closeBtn:false,
                area: ['auto', 'auto'], //宽高
                content: content
            });
        });
    },
    // 降价通知窗口
    reduction_property:function(pid){
        var content = '<div class="kp_notice">';
        content += '<img src="/public/wap/images/kptz_2.png" alt="" class="kp_notice_gb" onclick="layer.closeAll();">';
        content += '<img src="/public/wap/images/kptz_1.png" alt="" class="kp_notice_head" style="position:relative;top:-2px;">';
        content += '<span>降价通知</span>';
        content += '<p>将海南楼盘最新数据信息以及最新降价、优惠活动信息第一时间通知您！</p>';        
        content += '<input type="text" placeholder="请输入您的手机号码">';
        content += '<a href="javascript:void(0);" onclick="yee.showings($(this).prev().val(),2,'+pid+')">确定</a>';
        content += '</div>';
        layer.open({
            type: 1,
            title:'',
            closeBtn:false,
            area: ['auto', 'auto'], //宽高
            content: content
        });
    },

    // 优惠通知窗口
    reduction_property_yhtz:function(pid){
        var content = '<div class="kp_notice">';
        content += '<img src="/public/wap/images/kptz_2.png" alt="" class="kp_notice_gb" onclick="layer.closeAll();">';
        content += '<img src="/public/wap/images/kptz_1.png" alt="" class="kp_notice_head" style="position:relative;top:-2px;">';
        content += '<span>优惠通知</span>';
        content += '<p>将海南楼盘最新数据信息以及最新降价、优惠活动信息第一时间通知您！</p>';        
        content += '<input type="text" placeholder="请输入您的手机号码">';
        content += '<a href="javascript:void(0);" onclick="yee.showings($(this).prev().val(),11,'+pid+')">确定</a>';
        content += '</div>';
        layer.open({
            type: 1,
            title:'',
            closeBtn:false,
            area: ['auto', 'auto'], //宽高
            content: content
        });
    },

    // // 开盘通知窗口
    // reduction_property_kp:function(pid){
    //     var content = '<div class="pfopn">';
    //     content += '<div class="pfopn-close" onclick="layer.closeAll();"></div>';
    //     content += '<div class="pfopn-title">开盘通知</div>';
    //     content += '<div class="pfopn-con1">将海南楼盘最新开盘信息以及最新降价、优惠活动信息第一时间通知您！</div>';
    //     content += '<div class="pfopn-form1">';
    //     content += '<input type="text" placeholder="请输入您的手机号码" class="inp"><input onclick="yee.showings($(this).prev().val(),6,'+pid+')" type="button" value="确定" class="btn">';
    //     content += '</div>';
    //     content += '</div>';
    //     layer.open({
    //         type: 1,
    //         title:'',
    //         closeBtn:false,
    //         area: ['auto', 'auto'], //宽高
    //         content: content
    //     });
    // },

        // 开盘通知窗口
    reduction_property_kp:function(pid){
        var content = '<div class="kp_notice">';
        content += '<img src="/public/wap/images/kptz_2.png" alt="" class="kp_notice_gb" onclick="layer.closeAll();">';
        content += '<img src="/public/wap/images/kptz_1.png" alt="" class="kp_notice_head" style="position:relative;top:-2px;">';
        content += '<span>开盘通知</span>';
        content += '<p>将海南楼盘最新开盘信息以及最新降价、优惠活动信息第一时间通知您</p>';        
        content += '<input type="text" placeholder="请输入您的手机号码">';
        content += '<a href="javascript:void(0);" onclick="yee.showings($(this).prev().val(),6,'+pid+')">确定</a>';
        content += '</div>';
        layer.open({
            type: 1,
            title:'',
            closeBtn:false,
            area: ['auto', 'auto'], //宽高
            content: content
        });
    },


    // 单独降价通知窗口
    reduction:function(){
        var content = '';
        layer.open({
            type: 1,
            title:'',
            closeBtn:false,
            area: ['auto', 'auto'], //宽高
            content: content
        });
    },
    // 订阅信息窗口
    subscription:function(){
        var content = '';
        layer.open({
            type: 1,
            title:'',
            closeBtn:false,
            area: ['440px', '290px'], //宽高
            content: content
        });
    },
    //获取滚动条当前的位置 
    getScrollTop:function(){
        var scrollTop = 0; 
        if (document.documentElement && document.documentElement.scrollTop) { 
            scrollTop = document.documentElement.scrollTop; 
        } else if (document.body) { 
            scrollTop = document.body.scrollTop; 
        } 
        return scrollTop; 
    },
    //获取当前可视范围的高度 
    getClientHeight:function(){
        var clientHeight = 0; 
        if (document.body.clientHeight && document.documentElement.clientHeight) { 
            clientHeight = Math.min(document.body.clientHeight, document.documentElement.clientHeight); 
        } else { 
            clientHeight = Math.max(document.body.clientHeight, document.documentElement.clientHeight); 
        } 
        return clientHeight; 
    },
    //获取文档完整的高度 
    getScrollHeight:function(){
        return Math.max(document.body.scrollHeight, document.documentElement.scrollHeight); 
    },
    // 滑动到底部加载更多
    ajaxMore:function(func){
        $(window).bind('scroll',function(){
            if (yee.getScrollTop() + yee.getClientHeight() >= yee.getScrollHeight()) {   
                func();
            }
        });
    },
};
