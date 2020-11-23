var buildPriceS;
var areaPriceS;
var compareDate;
var maxPrice;
var minPrice;
var buildName;
var areaName;

var newbuildPrices;
var newareaPrices;
var newcompareDate;
var newmaxPrice;
var newminPrice;

var dname ;

$(document).ready(function(){
	
//	$('.fj_content_s7').click(function(){
//		$('.black-bg').show();
//		$('.apply-1').show();
//    });
	$('.apply-1-close').click(function(){
		$('.black-bg').hide();
		$('.apply-1').hide();
	});
	
	//走势图属性赋值start
	var btext = $("#buildPrices").val();
	var atext = $("#areaPriceS").val();
	var datetext = $("#compareDate").val();
	if(datetext!=null){//年月日格式化处理
		datetext = datetext.replaceAll("月", "");
	}
//	buildPriceS = eval('[' + btext + ']'); 
	areaPriceS  = eval('[' + atext + ']');
	compareDate  = eval('[' + datetext + ']');
	maxPrice = $("#maxPrice").val();
	minPrice = $("#minPrice").val();
//	buildName = $("#bname").val()+"房价";
	areaName = $("#dtidname").html();
	
	//新房
	var newatext = $("#newareaPrices").val();
	newareaPrices = eval('[' + newatext + ']'); 
 
	dname = $("#ditname").val();
	
	fangjiatu();//走势图方法 
	//走势图属性赋值end
});
String.prototype.replaceAll = function (AFindText,ARepText){
	 raRegExp = new RegExp(AFindText,"g");
	 return this.replace(raRegExp,ARepText);
}

function fangjiatu(){
	$('#container').highcharts({
        title: {
            text: '',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: compareDate,
			labels: {
						style: {
							fontSize: "13px"
						},
						y: 20,
						enabled: true,
			},
			gridLineWidth: 0,
			tickColor: '#ddd',
            tickWidth: 1,
			lineWidth:1,
			lineColor:'#ddd',
			tickPosition:'inside',
			tickmarkPlacement: 'on'
        },
		yAxis: {
			title:'enabled',
			opposite: true,
			labels: {
						formatter: function() {
							return this.value + "元"
						},
						style: {
							fontSize: "13px",
							color: "#666"
						},
						y: 3
			},
			max : maxPrice ,
			min : minPrice ,
			tickPixelInterval: 100
        },
        tooltip: {
            valueSuffix: '元/平米',
			crosshairs:{
				 width:'1px',
				 color:'#5e5b5a'
			},
			shared:true,
			backgroundColor:'rgba(0,0,0,0.7)',
			borderColor:'rgba(0,0,0,0.7)',
			borderWidth:0,
			style:{
			   color:'#fff'
			},
			shape:'callout',
			headerFormat: '<small>'+'{point.key}</small><br />'
        },
        series: [{//第二条线
            name: "新房", 
            data: newareaPrices, 
			color:'#ed603d'
        },{ //第一条线
            name:  "二手房", 
            data: areaPriceS, 
			color:'#00a5e3'  
        }],  
		credits : { 
		   enable:false ,
		   text:''
		},
		plotOptions:{
			   lineWidth:1,
			   borderWidth: 1,
			    states:{  
	                    hover:{  
	                       enabled:true,//鼠标放上去线的状态控制  
	                       lineWidth:1  
	                   }  
				},
				series:{
					lineWidth:1
				}
			}
	    }); 
}



/*
function fangjiatu(){
	$('#container').highcharts({
        title: {
            text: '',
            x: -20 //center
        },
        subtitle: {
            text: '',
            x: -20
        },
        xAxis: {
            categories: compareDate,
			labels: {
						style: {
							fontSize: "14px"
						},
						y: 25,
						enabled: true
			},
			gridLineWidth: 0,
			tickColor: '#fff',
            tickWidth: 1,
			lineWidth:1,
			lineColor:'#ddd'
        },
		yAxis: {
			title:'enabled',
			opposite: true,
			labels: {
						formatter: function() {
							return this.value + "元"
						},
						style: {
							fontSize: "14px",
							color: "#666"
						},
						y: 3
			},
			max : maxPrice ,
			min : minPrice ,
			tickPixelInterval: 100
        },
        tooltip: {
            valueSuffix: '元/平米',
			crosshairs:{
				 width:'2px',
				 color:'#5e5b5a'
			},
			shared:true,
			backgroundColor:'rgba(0,0,0,0.7)',
			borderColor:'rgba(0,0,0,0.7)',
			borderWidth:0,
			style:{
			   color:'#fff'
			},
			shape:'callout',
			headerFormat: '<small>'+'{point.key}</small><br />'
        },
        series: [{
            name: buildName,
			data: buildPriceS,
			color:'#00a5e3',
			marker:{
				symbol:'circle'
			}
			
        }, {
            name: areaName,
            data: areaPriceS,
			color:'#ed603d'
        }],
		credits : { 
		   enable:false ,
		   text:''
		},
		legend : {
		   enabled:false	
		}
    });  
}*/


//价格订阅
function priceOrder(type){
	var contant = $('#bjcontant').val();
	var bid = $('#bid').val();
	if (!checkMobile('bjcontant')){
		$("#bjerror").css("visibility","visible");$("#bjerror").html("请输入正确的手机号码！");
		setTimeout(function(){$("#bjerror").css("visibility","hidden");},3000);
		return false;
	}
	var cityId = parseInt($("#currentCityId").val());
	if ($("#currentCityId").length >0 || cityId<1) cityId = 1;
	var cookieKey = getCookieKey(cityId,bid);
	$.getJSON("/price!order.action",{"contant":contant,"bid":bid, "isregister":0, "type":type, "phoneNumber": contant, "email":"", "uname":"", "cookieKey":cookieKey}, function(data){
				if(data.result==0){
					$("#circularForm").hide();
					$("#circularFormsub").show();					
				}else if(data.result==2){
					$("#bjerror").css("display","");$("#bjerror").html("你好，你已经订阅此信息！");
					setTimeout(function(){$("#r2").css("display","none");},2000)
				}else{
					$("#bjerror").css("display","");$("#bjerror").html("服务器忙，订阅失败！");
					setTimeout(function(){$("#bjerror").css("display","none");},2000)
				}
		document.getElementById("bjcontant").value="";
	});
	return true;
}

//手机号码 参数：控件ID
function checkMobile(domid){
	var regu =/^[1][3,4,5,8,7][0-9]{9}$/;
	if(!regu.test($("#"+domid).val())){
		return false;
	}
	if(!checkLength(domid,11)){
		return false;
	}
	return true;
}

//申请首付贷款start
function loan_submit(){
	var name = $.trim($("#dkusername").val());
	var mobile = $.trim($("#dkusermobile").val());
	var city = $.trim($("#dkcityname").val());
	var build = $("#dkbname").val();
	var money = parseFloat($("#dkmoney").val());
	var r_mobile=/^[1][3,5,4,8][0-9]{9}$/;
	var r_name =name.match(/^[\u4e00-\u9fa5]{2,4}$/i);
	var r_money=/^[0-9]+(.[0-9]{1})?$/;
	var fr=GetQueryString("fr");
	var utm_medium=GetQueryString("utm_medium");
    var Request = new Object();
    Request = GetRequest();
    var fr_utm_medium,fr_refer ;
	if(fr ==null ||  fr.toString()==""){
		fr="jwcityfangjia";
	}
	if(utm_medium ==null || utm_medium.toString()=="")
	{
		fr_utm_medium=getCookie("utm_medium");
		if(fr_utm_medium != null&& fr_utm_medium.length > 0){
			utm_medium = fr_utm_medium;
		}else{
			utm_medium="";
		}
	}
	if(name.length==0){
		$("#dkerr").css("visibility","visible");$("#dkerr").html("您输入的姓名不能为空!");
		setTimeout(function(){$("#dkerr").css("visibility","hidden");},3000);
		return false;
    }
	if(!r_name){
		$("#dkerr").css("visibility","visible");$("#dkerr").html("您输入的姓名格式不正确!");
		setTimeout(function(){$("#dkerr").css("visibility","hidden");},3000);
		return false;
    }
    if(mobile.length==0){
    	$("#dkerr").css("visibility","visible");$("#dkerr").html("您输入的手机号码不能为空!");
		setTimeout(function(){$("#dkerr").css("visibility","hidden");},3000);
		return false;
	}
    if(!r_mobile.test(mobile)){
    	$("#dkerr").css("visibility","visible");$("#dkerr").html("手机号码格式错误");
		setTimeout(function(){$("#dkerr").css("visibility","hidden");},3000);
		return false;
    }
  
    if(!r_money.test(money)){
    	$("#dkerr").css("visibility","visible");$("#dkerr").html("您输入的金额格式不正确!");
		setTimeout(function(){$("#dkerr").css("visibility","hidden");},3000);
		return false;
    }
    if(money > 100){
    	$("#dkerr").css("visibility","visible");$("#dkerr").html("最大贷款金额为100万!");
		setTimeout(function(){$("#dkerr").css("visibility","hidden");},3000);
		return false;
    }
    
    ajaxSend("/activity!tijiao.action",{"name":name,"phone":mobile,"address":city,"inviteNum":build,"codeStr":money,"sourceFrom":fr,"payType":utm_medium});
    delCookie("fr");
    delCookie("utm_medium");
}

function ajaxSend(url,dataValue){
	$.ajax({
		type:"post",
		url:url,
		data:dataValue,
		dataType:"jsonp"
	});
}
function showsubmit(data){
	if(data.result==1){
		$('.apply-1').hide();
		$('#dksuccess').show();
	}else{
		$("#dkerr").css("visibility","visible");$("#dkerr").html("提交失败，请稍后再试！");
		setTimeout(function(){$("#dkerr").css("visibility","hidden");},3000);
	}
}
//申请首付贷款end


//使用正则获取当前url参数
function GetQueryString(name)
{
     var reg = new RegExp("(^|&)"+ name +"=([^&]*)(&|$)");
     var r = window.location.search.substr(1).match(reg);
     if(r!=null)return  unescape(r[2]); return null;
}
//写入cookie
function SetCookie(name,value, days){
    var exp  = new Date();
    exp.setTime(exp.getTime() + days*24*60*60*1000);
    document.cookie = name + "="+ escape (value) + ";expires=" + exp.toGMTString()+";path=/;domain="+domain;
}
//读取cookie
function getCookie(name){
    var arr = document.cookie.match(new RegExp("(^| )"+name+"=([^;]*)(;|$)"));
     if(arr != null) return unescape(arr[2]); return null;
}
//删除cookie
function delCookie(name) {
     var exp = new Date(); //当前时间
     exp.setTime(exp.getTime() - 1000);
     var cval = getCookie(name);
     if (cval != null) document.cookie = name + "='';expires=" + exp.toGMTString()+";path=/;domain="+domain;
}
function GetRequest() {
	  var url =document.referrer; //获取url中"?"符后的字串
	   var theRequest = new Object();
	   if (url.indexOf("?") != -1) {
	      var str = url.substr(url.indexOf("?")+1);
	      strs = str.split("&");
	      for(var i = 0; i < strs.length; i ++) {
	         theRequest[strs[i].split("=")[0]]=(strs[i].split("=")[1]);
	      }
	   }
	   return theRequest;
	}