<link rel="stylesheet" href="/css/reduced.css">

<!-- 降价通知 -->
<div class="y_reduced">
    <div class="y_reduced_main c">
        <!-- <div class="reduced_close">
            <a href="javascript:;"><img src="/apply_img/ico_jjtz2.png" alt=""></a>
            <i></i>
        </div> -->

         <div class="m_reduced_l">
               <img src="/image/m_xjjtz1.png" alt="" class="m_reduced_l_title">
               <img src="/image/m_fz1.png" alt="" class="m_reduced_l_bj">
         </div>

         <div class="m_reduced_r">
               <div class="m_reduced_r_title">
                    <em>【吴川碧桂园鼎龙湾】</em>
                    <span>最新降价消息及优惠活动信息将第一时间通知您！</span>
               </div>

               <form action="" class="submit_area y_reduced_left">
                    <input type="hidden" name="lpid" value="0">  
                    <input type="hidden" name="pid" value="33">  
                    <input type="hidden" name="ly" value="">              <!-- 0 为公共报名，其它为楼盘ID，有时默认为0有可能通过JS修改为楼盘ID-->
                    <input type="hidden" name="source" value="0">     <!--报名来源 具体查看applyVerify.js文件中SourceModule 标识说明-->
                    <input type="hidden" name="equipment" value="2">        <!--来源设备 （ PC端  2,手机端   1 ）-->

                      <div class="m_form_input">
                           <img src="/image/m_bmxm.png" alt="">
                           <input type="text" name="name" placeholder="您的称呼">
                      </div>

                      <div class="m_form_input">
                           <img src="/image/m_bmsj.png" alt="">
                           <input name="mobile" type="text" placeholder="您的电话">
                      </div>

                      <input type="button" class="m_form_button apply_submit" value="提 交">
               </form>
         </div>



    </div>
</div>

<div class=""></div>






<script>
    $(function(){
        // 降价通知  弹窗改变值 

        if(w_title == ""){
            $('.m_reduced_r_title em').html(w_title);
        }else{
            $('.m_reduced_r_title em').html('【'+w_title+'】');
        }
		if(w_con != ""){
            $('.m_reduced_r_title span').html(w_con);
        }

        $('.y_reduced_left input[name="lpid"]').val(w_id);
        $('.y_reduced_left input[name="source"]').val(w_module);
        $('.y_reduced_left input[name="ly"]').val(w_headline);
        // $('.y_reduced_lptu img').attr('src',w_url);

        // $('.y_reducedh_title').html(w_headline);


    // 修改弹窗标题图片
    // console.log(w_headline);
    // console.log(w_title);
    switch(w_headline)
    {
    case '查看房源':
       $('.m_reduced_l_title').attr('src','/image/m_xjkfy1.png');
       break;
    case '优惠政策':
       $('.m_reduced_l_title').attr('src','/image/m_xyhzz1.png');
       break;
    case '报名团购':
       $('.m_reduced_l_title').attr('src','/image/m_xtg1.png');
       break;
    case '团购报名':
	$('.y_reduced_left input[name="pid"]').val(35);
       $('.m_reduced_l_title').attr('src','/image/m_xbmtg1.png');
       break;
    case '报名看房':
       $('.m_reduced_l_title').attr('src','/image/m_xtg1.png');
       break;
    case '购房需求':
       $('.m_reduced_l_title').attr('src','/image/m_xgfxq1.png');
       break;
    case '房价动态提醒':
       $('.m_reduced_l_title').attr('src','/image/m_xfjtt1.png');
       break;
    case '降价通知':
       $('.m_reduced_l_title').attr('src','/image/m_xjjtz1.png');
       break;
    default:
       $('.m_reduced_l_title').attr('src','/image/m_xjkfy1.png');
    }

        //报名验证提交的调用
        PublicAction.AjaxSend({CORID:'apply_submit'/*操作ID*/});
    })
</script>
