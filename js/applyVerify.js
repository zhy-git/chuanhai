// 报名调用方法

/*--------------------------------- HTML 说明 --------------------------------------------------------*/
/*
* HTML   添加的样式 form中添加submit_area样式
*        提交按钮添加apply_submit样式
* */
// <form class="submit_area">
//     <div class="y_reduced_left">
//     <input type="hidden" name="aid" value="0">
//     <input name="telecall" type="text" class="y_input_name" placeholder="您的称呼">
//     <input name="mobile" type="text" class="y_input_mobile" placeholder="您的电话">
//     <input type="button" class="y_input_submit apply_submit" value="提 交">
//     </div>
// </form>
/*---------------------------------- 报名提交调用方法 -------------------------------------------------------*/
/*
* 调用的方法
* */
// PublicAction.AjaxSend(
//     {
//         CORID:'nid',                  /*操作ID*/
//     }
// );
/*----------------------------------- 隐藏 input 传值的说明 ------------------------------------------------------*/
/*
 *    aid                    楼盘ID   （ 属于楼盘为楼盘ID，不属于楼盘为公共报名为0 ）
 *    SourceModule           来源ID   （ 来源哪个页面的哪个报名窗口 ）
 *    equipment              来源设备 （ PC端  P 或 2,手机端  M 或 1 ）
 *
 *
 * */

/*----------------------------------- SourceModule 标识说明 -----------------------------------------------------*/
/*      <--- pc 端 --->
*      0 => 列表-降价通知
*      1 => 列表-立即咨询
*      2 => 列表-帮你找房
*      3 => 新房-预约看房
*      4 => 区域新房页-降价通知
*      5 => 区域新房页-专业帮您找房
*      6 => 资讯详情-资讯订阅
*      7 => 楼盘首页-动态提醒
*      8 => 楼盘首页-降价通知
*      9 => 楼盘首页-专业帮您找房
*      10 => 楼盘首页-公共降价通知
*      11 => 城市团购详情-降价通知
*      12 => 城市团购详情-我要看房
*      13 => 团购详情页-我要参团
*      14 => 团购详情页-我要看房
*      15 => 楼盘首页-报名看房
*      16 => '楼盘首页-楼盘动态',
*      17 => '楼盘首页-楼盘户型',
*      18 => '楼盘首页-楼盘信息',
*      19 => '楼盘首页-楼盘相册',
*      20 => '列表-有新房通知我',
*      21 => '新房-有新房通知我',
*      22 => '首页-查看房源',
*      23 => '首页-购房需求',
*      24 => '首页-房价动态提醒',
       25 => '区域介绍-立即咨询',
       26 => '区域介绍-降价通知',
       27 => '奇葩说详情-立即阅',
       28 => '装修品鉴详情-帮你找房,
       29 => '资讯详情-订阅',



*       <--- 手机端 --->
*       0 => 楼盘首页-优惠获取
*       1 => 楼盘首页-看房定制
*       2 => 楼盘首页-立即了解
*       3 => 团购-立即报名
*       4 => 团购详情-立即报名
*       5 => 团购详情-报名看房
*       6 => 视频播放页-了解项目
*       7 => 资讯详情-立即订阅
*       8 => 资讯详情-报名看房
*       9 => 首页-报名看房
*       10 => 首页-看房专车
*       11 => 楼盘首页-报名看房
*       12 => 楼盘首页-降价通知
*       13 => 楼盘首页-开盘通知我
*       14 => 底部导航-看房定制
*       15 => 奇葩说详情-报名看房
*
*
* */

/*---------------------------弹窗调用的方法说明-----------------------------------------------*/
/*
*    http://www.jq22.com/yanshi15047
*/


/*------------------------------------以下是封装的方法-----------------------------------------------------*/
var PublicAction = {

    /* AjaxSend-----Ajax发送*/
    "AjaxSend" :function(e){
        var self = this, result;
        // 获取
        var oid = e.CORID,                      //ID
            url = '/signup.php',        //提交地址
            type = "POST",                      //提交方式
            async = true;                      //同步或异步

        //点击提交按钮触发事件
        $('.'+ oid).on('click',function(){
            var that = $(this).parents('form.submit_area');     //获取当前父层
            var data = {},                                      //定义一个对象
                ControlSwitch = true;                           //定义一个开关
            that.find('input').each(function () {               //遍历父层中所有input
                var name = $(this).attr('name');                //当前input 中有name属性
                if(typeof name == 'string'){                    //input 标签中有name属性才进行以下操作
                    var txt = $(this).val();                    //input 值
                    var InputName = $(this).attr('name');       //属于 name 的值

                    txt = self.FilterHTMLTag(txt);               //去掉标签

                    /* 验证电话码号 */
                    if(InputName == 'mobile'){
                        if(txt != ""){
                            if(! self.PhoneVerification(txt)){          //验证电话号码

                                // 特殊处理
                                $('body .alert-container').remove();        //删除尾部添加弹窗
                                /*调用方法*/
                                var M = {};
                                if(M.dialog1){
                                    return M.dialog1.show();
                                }
                                M.dialog1 = jqueryAlert({
                                    'content' : '电话号码不对！',
                                    'closeTime' : 2000,
                                })
                                ControlSwitch = false;                  //开关为false
                                return false;
                            }
                        }else {
                            $('body .alert-container').remove();        //删除尾部添加弹窗
                            /*调用方法*/
                            var M = {};
                            if(M.dialog1){
                                return M.dialog1.show();
                            }
                            M.dialog1 = jqueryAlert({
                                'content' : '电话号码不能为空！',
                                'closeTime' : 2000,
                            })
                            ControlSwitch = false;                  //开关为false
                            return false;
                        }
                    }
                    data[InputName]=txt;
                }
            })

            if(ControlSwitch){              //当电话号码验证不通过时，不执行以下操作
                $.ajax({
                    type:type,
                    url:url,
                    data:data,
                    async:async,
                    dataType:'json',
                    error : function(request) {
                        // alert("未提交成功！");
                        // 特殊处理
                        $('body .alert-container').remove();        //删除尾部添加弹窗
                        /*调用方法*/
                        var M = {};
                        if(M.dialog1){
                            return M.dialog1.show();
                        }
                        M.dialog1 = jqueryAlert({
                            'content' : '未提交成功！',
                            'closeTime' : 2000,
                        })
                        // RemoveDiv();            //数据提交成功后关闭弹出层   测试用
                    },
                    success : function(data) {
                        if(data.code == 200){
                            $('body .alert-container').remove();        //删除尾部添加弹窗
                            var M = {};
                            if(M.dialog1){
                                return M.dialog1.show();
                            }
                            M.dialog1 = jqueryAlert({
                                'content' : data.msg,
                                'closeTime' : 2000,
                            })
                        }else if(data.code == 300){
                            $('body .alert-container').remove();        //删除尾部添加弹窗
                            var M = {};
                            if(M.dialog1){
                                return M.dialog1.show();
                            }
                            M.dialog1 = jqueryAlert({
                                'content' : data.msg,
                                'closeTime' : 2000,
                            })
                        }
                        RemoveDiv();            //数据提交成功后关闭弹出层
                        // 关闭专题弹窗
                        $('#mask').hide();
                        $('#HouseMain1').hide();
						$(".lpm-bx3,#black_bg").fadeOut();   


                    }
                });
                event.preventDefault();         //阻止form表单默认提交
                return false;
            }

        })
    },
    /*-----------------------------------------------------------------------------------------*/
    /* 过滤代码标签 */
    "FilterHTMLTag" : function(htmlStr){
        var msg = htmlStr.replace(/<\/?[^>]*>/g, ''); //去除HTML Tag
        // msg = htmlStr.replace(/[|]*\n/, '') //去除行尾空格
        // msg = htmlStr.replace(/&npsp;/ig, ''); //去掉npsp
        // msg = htmlStr.replace(/<script[^>]*>.*(?=<\/script>)<\/script>/gi);
        return msg;
    },
    /*-----------------------------------------------------------------------------------------*/
    /* 电话验证 */
    "PhoneVerification" : function (tel) {
        var pattern = /(13\d|14[57]|15[^4,\D]|17[678]|18\d)\d{8}$|170[059]\d{7}$/,
            str = tel;
        return pattern.test(tel);
    },
    /*-----------------------------------------------------------------------------------------*/
    /* 报名归属
     * 有楼盘归属ID：为ID
     * 否则默认为0；
     * */
    // "HousesID" : function (id) {
    //     var VestID;
    //     typeof id == 'number' ? VestID = id : VestID = 0;
    //     return VestID;
    // },

    /*-----------------------------------------------------------------------------------------*/

}

// console.log(SourceModule.list[1])

// var stri = "<div>6516</div><script>sidfa<//script>"
// var stri = 152897;
// console.log(PublicAction.FilterHTMLTag(stri))

// console.log(typeof 6510)
