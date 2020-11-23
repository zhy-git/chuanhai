$(function(){
    //楼盘列表右侧报名
    $('#from-up1').ajaxForm({
        beforeSubmit: checkForm1, // 此方法主要是提交前执行的方法，根据需要设置
        success: complete,        // 这是提交后的方法
        dataType: 'json'
    });
    $('#from-up2').ajaxForm({
        beforeSubmit: checkForm2, // 此方法主要是提交前执行的方法，根据需要设置
        success: complete,       // 这是提交后的方法
        dataType: 'json'
    });
    $('#from-up3').ajaxForm({
        beforeSubmit: checkForm3, // 此方法主要是提交前执行的方法，根据需要设置
        success: complete,       // 这是提交后的方法
        dataType: 'json'
    });
    $('#from-up4').ajaxForm({
        beforeSubmit: checkForm4, // 此方法主要是提交前执行的方法，根据需要设置
        success: complete, // 这是提交后的方法
        dataType: 'json'
    });
    $('#from-up5').ajaxForm({
        beforeSubmit: checkForm5, // 此方法主要是提交前执行的方法，根据需要设置
        success: complete, // 这是提交后的方法
        dataType: 'json'
    });
    $('#from-up6').ajaxForm({
        beforeSubmit: checkForm6, // 此方法主要是提交前执行的方法，根据需要设置
        success: complete, // 这是提交后的方法
        dataType: 'json'
    });
    $('#from-up7').ajaxForm({
        beforeSubmit: checkForm7, // 此方法主要是提交前执行的方法，根据需要设置
        success: complete, // 这是提交后的方法
        dataType: 'json'
    });
    $('#from-up8').ajaxForm({
        beforeSubmit: checkForm8, // 此方法主要是提交前执行的方法，根据需要设置
        success: complete, // 这是提交后的方法
        dataType: 'json'
    });
    $('#from-up9').ajaxForm({
        beforeSubmit: checkForm9, // 此方法主要是提交前执行的方法，根据需要设置
        success: complete, // 这是提交后的方法
        dataType: 'json'
    });
    $('#from-up10').ajaxForm({
        beforeSubmit: checkForm10, // 此方法主要是提交前执行的方法，根据需要设置
        success: complete, // 这是提交后的方法
        dataType: 'json'
    });
    function checkForm1(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#lp-list-mobile').val()))){            
        　layer.msg('手机号码有误，请重填', {icon: 5});
          $('#lp-list-mobile').focus(); 
          return false;
        }
       layer.load(1);
    }
    function checkForm2(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#lp-wd-mobile').val()))){            
        　layer.msg('手机号码有误，请重填', {icon: 5});
          $('#lp-wd-mobile').focus(); 
          return false;
        }
       layer.load(1);
    }

    function checkForm3(){   
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if($.trim($('#advcontent').val()).length<5){            
        　layer.msg('至少5个汉字', {icon: 5});
          $('#advcontent').focus(); 
          return false;
        }     
       layer.load(1);
    }
    function checkForm4(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#lp-zx-mobile').val()))){            
        　layer.msg('手机号码有误，请重填', {icon: 5});
          $('#lp-zx-mobile').focus(); 
          return false;
        }
       layer.load(1);
    }
    function checkForm5(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#lp-nmkf-mobile').val()))){            
        　layer.msg('手机号码有误，请重填', {icon: 5});
          $('#lp-nmkf-mobile').focus(); 
          return false;
        }
       layer.load(1);
    }
    function checkForm6(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#lp-wyyy-mobile').val()))){            
        　layer.msg('手机号码有误，请重填', {icon: 5});
          $('#lp-wyyy-mobile').focus(); 
          return false;
        }
       layer.load(1);
    }
    function checkForm7(){            
        if($.trim($('#inputasktitle').val()).length < 5){            
        　layer.msg('提问内容至少5个汉字', {icon: 5});          
          return false;
        }      
       layer.load(1);
    }
    function checkForm8(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#lp-wd-mobile1').val()))){            
        　layer.msg('手机号码有误，请重填', {icon: 5});
          $('#lp-wd-mobile1').focus(); 
          return false;
        }
       layer.load(1);
    }
    function checkForm9(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#lp-fu-mobile').val()))){            
        　layer.msg('手机号码有误，请重填', {icon: 5});
          $('#lp-fu-mobile').focus(); 
          return false;
        }
       layer.load(1);
    }
    function checkForm10(){
        var mobile = /^1[3|4|5|6|7|8|9]\d{9}$/;         
        if(!mobile.test($.trim($('#mobile_10').val()))){            
        　layer.msg('手机号码有误，请重填', {icon: 5});
          $('#mobile_10').focus(); 
          return false;
        }
        if($.trim($('#name_10').val())==''){            
        　layer.msg('请输入您的姓名', {icon: 5});
          $('#name_10').focus(); 
          return false;
        }
       layer.load(1);
    }
    function complete(data){
        if(data.status==1){
            layer.closeAll('loading');
            layer.msg(data.info, {icon: 1}); 
            window.setTimeout("window.location='"+data.url+"'",2000);
            return false;
        }else if(data.status==2){
            layer.closeAll('loading');
            $('.lpm-bx3-t').html('售楼处');
            $(".lpm-bx3,#black_bg").fadeIn();
        }else{
            layer.closeAll('loading');
            layer.msg(data.info, {icon: 5});
            return false;   
        }
    }
});
$(function(){
    $(".bmkf-up").on("click",function(){  
	//alert(111); 
        var name=$(this).attr('data-name');    
        var wh=$(this).attr('data-type');    
        var info=$(this).attr('data-info');    
        $('.lpm-bx3-t').html(name);
        $('#lpsounce').val(wh);
        $('#box1_t').html(info);
        $(".lpm-bx3,#black_bg").fadeIn();
    });
    $(".bmkf-up-hw").on("click",function(){       
        var type=$(this).attr('data-type');         
        var name=$(this).attr('data-name');        
        $('.send-mess-text1').html(name); 
        $('.lpm-bx3').css("background","url(/public/static/home/image/hy/tc_"+type+".png) no-repeat"); 
        $(".lpm-bx3,#black_bg").fadeIn();
    });

    $("#bmkfCallClose").on("click",function(){     
         $(".lpm-bx3,#black_bg").fadeOut();   
    });
});
$(function(){
    $(".bmkf-upf").on("click",function(){   
        var name=$(this).attr('data-name');    
        var wh=$(this).attr('data-type');    
        $('.lpm-bx3-tf').html(name);
        $('#lpsouncef').val(wh);
        $(".lpm-bx3f,#black_bgf").fadeIn();
    });
    $("#bmkfCallClose1").on("click",function(){     
         $(".lpm-bx3f,#black_bgf").fadeOut();   
    });
});
//楼盘搜索点击事件
function searchBuild(){        
    if($('.h_bname')){
        var keyvalue =$.trim($('.h_bname').val());
        var thisurl = window.location.href;
        var actionvalue = "loupan";
        var chooseurl = $("#choosediv").attr("chooseurl");
        if(chooseurl!=null && typeof(chooseurl)!="undefined"){
            actionvalue = chooseurl;
        }
        var url= "";
        var domin= "";
        if (thisurl.indexOf("www")>=0){
             domin = "hk";
        }else{
            domin = thisurl.substring(thisurl.indexOf("//")+2,thisurl.indexOf(".lou86"));
        }
        url="http://"+domin+".lou86.com/";
        if(keyvalue.length<=0)
            url=url+actionvalue+"/";
        else{
            if(keyvalue=='请输入楼盘名称'){
                url=url+actionvalue+"/";
            }
            else{               
                url=url+actionvalue+"/list0_0_0_0_0_0_"+encodeURIComponent(keyvalue)+"_1.html";
            }
        }
        window.location.href=url;
    }
}
function searchBuilds(){        
    if($('#h_bname')){
        var keyvalue =$.trim($('#h_bname').val());
        var thisurl = window.location.href;
        var actionvalue = "loupan";
        var chooseurl = $("#choosediv").attr("chooseurl");
        if(chooseurl!=null && typeof(chooseurl)!="undefined"){
            actionvalue = chooseurl;
        }
        var url= "";
        var domin= "";
        if (thisurl.indexOf("www")>=0){
            domin = "hk";
        }else{
            domin = thisurl.substring(thisurl.indexOf("//")+2,thisurl.indexOf(".lou86"));
        }
        url="http://"+domin+".lou86.com/";
        if(keyvalue.length<=0)
            url=url+actionvalue+"/";
        else{
            if(keyvalue=='请输入楼盘名称'){
                url=url+actionvalue+"/";
            }
            else{
                url=url+actionvalue+"/list0_0_0_0_0_0_"+encodeURIComponent(keyvalue)+"_1.html";
            }
        }
        window.location.href=url;
    }
}
function searchBuilds_hy(){        
    if($('#h_bname')){
        var keyvalue =$.trim($('#h_bname').val());
        var thisurl = window.location.href;
        var actionvalue = "loupan";
        var chooseurl = $("#choosediv").attr("chooseurl");
        if(chooseurl!=null && typeof(chooseurl)!="undefined"){
            actionvalue = chooseurl;
        }
        var url= "";
        var domin= "";
        if (thisurl.indexOf("www")>=0){
             domin = "hk";
        }else{
            domin = thisurl.substring(thisurl.indexOf("//")+2,thisurl.indexOf(".lou86"));
        }
        url="http://"+domin+".lou86.com/";
        if(keyvalue.length<=0)
            url=url+actionvalue+"/";
        else{
            if(keyvalue=='请输入楼盘名称'){
                url=url+actionvalue+"/";
            }
            else{
                url=url+actionvalue+"?keywords="+encodeURIComponent(keyvalue)+"";
            }
        }
        window.location.href=url;
    }
}
function group(txt,id){
    if(txt){
        var obj = document.getElementById("loupan");
        obj.value = txt;
    }else{
        var obj = document.getElementById("loupan");
        obj.value = ' ';
    }
    iBoxWidth = $(".window").width();
    iBoxHeight = $(".window").height();
    iWinWidth = $(window).width();
    iWinHeight = $(window).height();
    $(".window").css("left", (iWinWidth / 2 - iBoxWidth / 2) + "px");
    $(".window").css("top", (iWinHeight / 2 - iBoxHeight / 2) + "px");
    $(".window").fadeIn();
    $(".alert").height(document.body.offsetHeight);
    $(".alert").show();
    $("#house_id").val(id);
}
function delbox(){
    $(".window").fadeOut();
    $(".alert").hide();
}

