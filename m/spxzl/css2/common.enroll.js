function openwid(tit,tits,frm) {  
    $("#make_tit_2").html(tit);  
    $("#make_tit_3").html(tits);  
    $("#make_tit_4").val(frm);  
    iBoxWidth = $(".s_group").width();
    iBoxHeight = $(".s_group").height();
    iWinWidth = $(window).width();
    iWinHeight = $(window).height();
    $(".s_group").css("left", (iWinWidth / 7 - iBoxWidth / 7) + "%");
    $(".s_group").css("top", (iWinHeight / 20 - iBoxHeight / 20) + "%");
    $(".s_group").fadeIn();
    $(".s_alert").height(document.body.offsetHeight);
    $(".s_alert").show();
}
function wid_close() {
    $(".s_group").fadeOut();
    $(".s_alert").hide();    
}
//领取红包
function openwid1(tit,tits,frm) {  
    $("#make_tit_2f").html(tit);  
    $("#make_tit_3f").html(tits);  
    $("#make_tit_4f").val(frm);  
    iBoxWidth = $(".s_groupf").width();
    iBoxHeight = $(".s_groupf").height();
    iWinWidth = $(window).width();
    iWinHeight = $(window).height();
    $(".s_groupf").css("left", (iWinWidth / 7 - iBoxWidth / 7) + "%");
    $(".s_groupf").css("top", (iWinHeight / 30 - iBoxHeight / 30) + "%");
    $(".s_groupf").fadeIn();
    $(".s_alertf").height(document.body.offsetHeight);
    $(".s_alertf").show();
}
function openwid2(tit,tits,frm) {  
    iBoxWidth = $(".s_group2").width();
    iBoxHeight = $(".s_group2").height();
    iWinWidth = $(window).width();
    iWinHeight = $(window).height();
    $(".s_group2").css("left", (iWinWidth / 7 - iBoxWidth / 7) + "%");
    $(".s_group2").css("top", (iWinHeight / 30 - iBoxHeight / 30) + "%");
    $(".s_group2").fadeIn();
    $(".s_group2").height(document.body.offsetHeight);
    $(".s_alert2").show();
}
function openwid3(tit,tits,frm) {  
    iBoxWidth = $(".s_group3").width();
    iBoxHeight = $(".s_group3").height();
    iWinWidth = $(window).width();
    iWinHeight = $(window).height();
    $(".s_group3").css("left", (iWinWidth / 7 - iBoxWidth / 7) + "%");
    $(".s_group3").css("top", (iWinHeight / 20 - iBoxHeight / 20) + "%");
    $(".s_group3").fadeIn();    
    $(".s_alert3").show();
}
function wid_closef() {
    $(".s_groupf").fadeOut();
    $(".s_alertf").hide();
}
function wid_close2() {
    $(".s_group2").fadeOut();
    $(".s_alert2").hide();
}
function wid_close3() {
    $(".s_group3").fadeOut();
    $(".s_alert3").hide();
}
//新版本楼盘内页报名
$(function(){
//共用弹窗
    $('.enrollBtn').click(function(){
      var source=$(this).attr('data-source');
      var id=$(this).attr('data-id');
      var name=$(this).attr('data-name');
      var info=$(this).attr('data-info');
      $('#btn_1').html(source);
      $('#btn_2').html(info);    
      $('#btn_4').val(source+'-移动端');
      $('#btn_5').val(id);
      $('#btn_6').val(name);
      $('#btn_6').val(name);
      $('.dnoticebtn').show().find('.whitewrap').slideDown();
     return false;
   })  
    $('.enrollBtn2').click(function(){      
      $('.dnoticebtn').show().find('.whitewrap').slideDown();
      return false;
   })  
  $('.closeicon,.nobtn').click(function(){
    $(this).parents('.whitewrap,.blackwrap').hide();
  })
  $('#frm_up_33').ajaxForm({
    beforeSubmit: checkForm3, // 此方法主要是提交前执行的方法，根据需要设置
    success: complete3, // 这是提交后的方法
    dataType: 'json'
  });
  $('#frmup88').ajaxForm({
    beforeSubmit: checkForm1, // 此方法主要是提交前执行的方法，根据需要设置
    success: complete, // 这是提交后的方法
    dataType: 'json'
  });
  $('#frmup889').ajaxForm({
    beforeSubmit: checkForm1, // 此方法主要是提交前执行的方法，根据需要设置
    success: complete, // 这是提交后的方法
    dataType: 'json'
  });
  $('#frmup888').ajaxForm({
    beforeSubmit: checkForm6, // 此方法主要是提交前执行的方法，根据需要设置
    success: complete, // 这是提交后的方法
    dataType: 'json'
  });
  $('#frm_up_2').ajaxForm({
    beforeSubmit: checkForm2, // 此方法主要是提交前执行的方法，根据需要设置
    success: complete, // 这是提交后的方法
    dataType: 'json'
  });
  $('#frmup_index').ajaxForm({
    beforeSubmit: checkForm7, // 此方法主要是提交前执行的方法，根据需要设置
    success: complete2, // 这是提交后的方法
    dataType: 'json'
  });
  $('#frm_up_5').ajaxForm({
    beforeSubmit: checkForm10, // 此方法主要是提交前执行的方法，根据需要设置
    success: complete, // 这是提交后的方法
    dataType: 'json'
  });
  $('#frm_up_3').ajaxForm({
    beforeSubmit: checkForm9, // 此方法主要是提交前执行的方法，根据需要设置
    success: complete, // 这是提交后的方法
    dataType: 'json'
  });
    $('#frm_up_11').ajaxForm({
    beforeSubmit: checkForm11, // 此方法主要是提交前执行的方法，根据需要设置
    success: complete11, // 这是提交后的方法
    dataType: 'json'   
  });
  function checkForm3(){
       layer.open({type: 2});
  }
    function checkForm1(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#s-mobile').val()))){            
         layer.open({content: '请您输入正确的手机号码',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});
          $('#s-mobile').focus(); 
          return false;
        }
    }
    function checkForm6(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#s-mobilef').val()))){            
         layer.open({content: '请您输入正确的手机号码',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});
          $('#s-mobilef').focus(); 
          return false;
        }
       layer.open({type: 2});
    }
    function checkForm7(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#s-mobile1').val()))){                                
           alert('请您输入正确的手机号码');
          $('#s-mobile1').focus(); 
          return false;
        }
       layer.open({type: 2});
    }
    function checkForm8(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#mobile_1').val()))){                                
           layer.open({content: '请您输入正确的手机号码',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});
          $('#mobile_1').focus(); 
          return false;
        }
       layer.open({type: 2});
    }
    function checkForm9(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#mobile_9').val()))){                                
           layer.open({content: '请您输入正确的手机号码',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});
          $('#mobile_9').focus(); 
          return false;
        }
       layer.open({type: 2});
    }
    function checkForm10(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#mobile_10').val()))){                                
           layer.open({content: '请您输入正确的手机号码',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});
          $('#mobile_10').focus(); 
          return false;
        }
       layer.open({type: 2});
    }
    function checkForm2(){        
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#mobile_2').val()))){            
         layer.open({content: '请您输入正确的手机号码',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});
          $('#mobile_2').focus(); 
          return false;
        }
       layer.open({type: 2});
    }
        function checkForm11(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#mobile_11').val()))){                                
           layer.open({content: '请您输入正确的手机号码',time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;'});
          $('#mobile_10').focus(); 
          return false;
        }
       layer.open({type: 2});
    }
 function complete(data){    
    if(data.status==1){
       layer.closeAll('loading');
       layer.open({content: data.info,time: 2 ,style: 'background: rgba(34,187,98,255); color:#fff; border:none;' });  
       window.setTimeout("window.location='"+data.url+"'",2000);
       return false;
    }else{
      layer.closeAll('loading');
      layer.open({content: data.info,time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;' });      
      return false; 
    }
  }
  function complete2(data){     
    if(data.status==1){
       layer.closeAll('loading');
       alert('报名成功');
       window.setTimeout("window.location='"+data.url+"'",2000);
       return false;
    }else{
      layer.closeAll('loading');
      alert('报名失败');
      return false; 
    }
  }
  function complete3(data){     
    var name=$('#subject_source_1').val();
    if(data.status==1){
       layer.closeAll('loading');
       openwid('楼盘问答','请输入正确的手机号码，我们专业的置业顾问将给您最满意的解答。',name+'-楼盘问答');
       return false;
    }else{
      layer.closeAll('loading');
      layer.open({content: data.info,time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;' });      
      return false; 
    }
  }
  function complete11(data){         
    if(data.status==1){
       layer.closeAll();
       var oPlayer=document.getElementById('player');
       oPlayer.play();     
       $('#yuyinzz,.s_group3,.s_alert3').hide();
       return false;
    }else{
      layer.closeAll('loading');
      layer.open({content: data.info,time: 2 ,style: 'background: rgba(185, 0, 0, 0.6); color:#fff; border:none;' });      
      return false; 
    }
  }  
});