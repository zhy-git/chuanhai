$(document).ready(function(){
		//上传一
		var bar1 = $('.bar1');
		var percent1 = $('.percent1');
		var showimg1 = $('#showimg1');
		var progress1 = $(".progress1");
		var files1 = $(".files1");
		var btn1 = $(".btn1 span");
		$("#fileupload1").wrap("<form id='myupload1' action='phpJcrop/action.php' method='post' enctype='multipart/form-data'></form>");
		$("#fileupload1").change(function(){  //选择文件
			$("#myupload1").ajaxSubmit({
				dataType:  'json',	//数据格式为json 
				beforeSend: function() {	//开始上传 
					showimg1.empty();	//清空显示的图片
					//progress1.show();	//显示进度条
					progress1.show().css("display","block");	//显示进度条
					var percent1Val = '0%';	//开始进度为0%
					bar1.width(percent1Val);	//进度条的宽度
					percent1.html(percent1Val);	//显示进度为0% 
					btn1.html("上传中...");	//上传按钮显示上传中
				},
				uploadProgress: function(event, position, total, percent1Complete) {
					var percent1Val = percent1Complete + '%';	//获得进度
					bar1.width(percent1Val);	//上传进度条宽度变宽
					percent1.html(percent1Val);	//显示上传进度百分比
				},
				success: function(data) {	//成功
					//获得后台返回的json数据，显示文件名，大小，以及删除按钮
					files1.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg1' rel='"+data.pic+"'>删除</span>");
					//显示上传后的图片
					var img1 = "upload/info/"+data.pic;
					showimg1.html("<img src='../"+img1+"' id='cropbox'  style='width:120px;' />");
					//传给php页面，进行保存的图片值
					$("#src1").val(img1);
					//截取图片的js
					btn1.html("上传图片");	//上传按钮还原
				},
				error:function(xhr){	//上传失败
					btn1.html("上传失败");
					bar1.width('0')
					files1.html(xhr.responseText);//返回失败信息
				}
			});
		});
		
		$(".delimg1").live('click',function(){
			var pic = $(this).attr("rel");
			$.post("phpJcrop/action.php?act=delimg1",{imagename:pic},function(msg){
				if(msg==1){
					files1.html("删除成功.");
					showimg1.empty();//清空图片
					progress1.hide();//隐藏进度条 
				}else{
					alert(msg);
				}
			});
		});
		//上传二
		var bar2 = $('.bar2');
		var percent2 = $('.percent2');
		var showimg2 = $('#showimg2');
		var progress2 = $(".progress2");
		var files2 = $(".files2");
		var btn2 = $(".btn2 span");
		$("#fileupload2").wrap("<form id='myupload2' action='phpJcrop/action.php' method='post' enctype='multipart/form-data'></form>");
		$("#fileupload2").change(function(){  //选择文件
			$("#myupload2").ajaxSubmit({
				dataType:  'json',	//数据格式为json 
				beforeSend: function() {	//开始上传 
					showimg2.empty();	//清空显示的图片
					//progress2.show();	//显示进度条
					progress2.show().css("display","block");	//显示进度条
					var percent2Val = '0%';	//开始进度为0%
					bar2.width(percent2Val);	//进度条的宽度
					percent2.html(percent2Val);	//显示进度为0% 
					btn2.html("上传中...");	//上传按钮显示上传中
				},
				uploadProgress: function(event, position, total, percent2Complete) {
					var percent2Val = percent2Complete + '%';	//获得进度
					bar2.width(percent2Val);	//上传进度条宽度变宽
					percent2.html(percent2Val);	//显示上传进度百分比
				},
				success: function(data) {	//成功
					//获得后台返回的json数据，显示文件名，大小，以及删除按钮
					files2.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg2' rel='"+data.pic+"'>删除</span>");
					//显示上传后的图片
					var img2 = "upload/info/"+data.pic;
					showimg2.html("<img src='../"+img2+"' id='cropbox'  style='width:120px;' />");
					//传给php页面，进行保存的图片值
					$("#src2").val(img2);
					//截取图片的js
					btn2.html("上传图片");	//上传按钮还原
				},
				error:function(xhr){	//上传失败
					btn2.html("上传失败");
					bar2.width('0')
					files2.html(xhr.responseText);//返回失败信息
				}
			});
		});
		
		$(".delimg2").live('click',function(){
			var pic = $(this).attr("rel");
			$.post("phpJcrop/action.php?act=delimg2",{imagename:pic},function(msg){
				if(msg==1){
					files2.html("删除成功.");
					showimg2.empty();//清空图片
					progress2.hide();//隐藏进度条 
				}else{
					alert(msg);
				}
			});
		});
		
		//上传三
		var bar3 = $('.bar3');
		var percent3 = $('.percent3');
		var showimg3 = $('#showimg3');
		var progress3 = $(".progress3");
		var files3 = $(".files3");
		var btn3 = $(".btn3 span");
		$("#fileupload3").wrap("<form id='myupload3' action='phpJcrop/action.php' method='post' enctype='multipart/form-data'></form>");
		$("#fileupload3").change(function(){  //选择文件
			$("#myupload3").ajaxSubmit({
				dataType:  'json',	//数据格式为json 
				beforeSend: function() {	//开始上传 
					showimg3.empty();	//清空显示的图片
					//progress3.show();	//显示进度条
					progress3.show().css("display","block");	//显示进度条
					var percent3Val = '0%';	//开始进度为0%
					bar3.width(percent3Val);	//进度条的宽度
					percent3.html(percent3Val);	//显示进度为0% 
					btn3.html("上传中...");	//上传按钮显示上传中
				},
				uploadProgress: function(event, position, total, percent3Complete) {
					var percent3Val = percent3Complete + '%';	//获得进度
					bar3.width(percent3Val);	//上传进度条宽度变宽
					percent3.html(percent3Val);	//显示上传进度百分比
				},
				success: function(data) {	//成功
					//获得后台返回的json数据，显示文件名，大小，以及删除按钮
					files3.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg3' rel='"+data.pic+"'>删除</span>");
					//显示上传后的图片
					var img3 = "upload/info/"+data.pic;
					showimg3.html("<img src='../"+img3+"' id='cropbox'  style='width:120px;' />");
					//传给php页面，进行保存的图片值
					$("#src3").val(img3);
					//截取图片的js
					btn3.html("上传图片");	//上传按钮还原
				},
				error:function(xhr){	//上传失败
					btn3.html("上传失败");
					bar3.width('0')
					files3.html(xhr.responseText);//返回失败信息
				}
			});
		});
		
		$(".delimg3").live('click',function(){
			var pic = $(this).attr("rel");
			$.post("phpJcrop/action.php?act=delimg3",{imagename:pic},function(msg){
				if(msg==1){
					files3.html("删除成功.");
					showimg3.empty();//清空图片
					progress3.hide();//隐藏进度条 
				}else{
					alert(msg);
				}
			});
		});
		
		//上传四
		var bar4 = $('.bar4');
		var percent4 = $('.percent4');
		var showimg4 = $('#showimg4');
		var progress4 = $(".progress4");
		var files4 = $(".files4");
		var btn4 = $(".btn4 span");
		$("#fileupload4").wrap("<form id='myupload4' action='phpJcrop/action.php' method='post' enctype='multipart/form-data'></form>");
		$("#fileupload4").change(function(){  //选择文件
			$("#myupload4").ajaxSubmit({
				dataType:  'json',	//数据格式为json 
				beforeSend: function() {	//开始上传 
					showimg4.empty();	//清空显示的图片
					//progress4.show();	//显示进度条
					progress4.show().css("display","block");	//显示进度条
					var percent4Val = '0%';	//开始进度为0%
					bar4.width(percent4Val);	//进度条的宽度
					percent4.html(percent4Val);	//显示进度为0% 
					btn4.html("上传中...");	//上传按钮显示上传中
				},
				uploadProgress: function(event, position, total, percent4Complete) {
					var percent4Val = percent4Complete + '%';	//获得进度
					bar4.width(percent4Val);	//上传进度条宽度变宽
					percent4.html(percent4Val);	//显示上传进度百分比
				},
				success: function(data) {	//成功
					//获得后台返回的json数据，显示文件名，大小，以及删除按钮
					files4.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg4' rel='"+data.pic+"'>删除</span>");
					//显示上传后的图片
					var img4 = "upload/info/"+data.pic;
					showimg4.html("<img src='../"+img4+"' id='cropbox'  style='width:120px;' />");
					//传给php页面，进行保存的图片值
					$("#src4").val(img4);
					//截取图片的js
					btn4.html("上传图片");	//上传按钮还原
				},
				error:function(xhr){	//上传失败
					btn4.html("上传失败");
					bar4.width('0')
					files4.html(xhr.responseText);//返回失败信息
				}
			});
		});
		
		$(".delimg4").live('click',function(){
			var pic = $(this).attr("rel");
			$.post("phpJcrop/action.php?act=delimg4",{imagename:pic},function(msg){
				if(msg==1){
					files4.html("删除成功.");
					showimg4.empty();//清空图片
					progress4.hide();//隐藏进度条 
				}else{
					alert(msg);
				}
			});
		});
		
		//上传五
		var bar5 = $('.bar5');
		var percent5 = $('.percent5');
		var showimg5 = $('#showimg5');
		var progress5 = $(".progress5");
		var files5 = $(".files5");
		var btn5 = $(".btn5 span");
		$("#fileupload5").wrap("<form id='myupload5' action='phpJcrop/action.php' method='post' enctype='multipart/form-data'></form>");
		$("#fileupload5").change(function(){  //选择文件
			$("#myupload5").ajaxSubmit({
				dataType:  'json',	//数据格式为json 
				beforeSend: function() {	//开始上传 
					showimg5.empty();	//清空显示的图片
					//progress5.show();	//显示进度条
					progress5.show().css("display","block");	//显示进度条
					var percent5Val = '0%';	//开始进度为0%
					bar5.width(percent5Val);	//进度条的宽度
					percent5.html(percent5Val);	//显示进度为0% 
					btn5.html("上传中...");	//上传按钮显示上传中
				},
				uploadProgress: function(event, position, total, percent5Complete) {
					var percent5Val = percent5Complete + '%';	//获得进度
					bar5.width(percent5Val);	//上传进度条宽度变宽
					percent5.html(percent5Val);	//显示上传进度百分比
				},
				success: function(data) {	//成功
					//获得后台返回的json数据，显示文件名，大小，以及删除按钮
					files5.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg5' rel='"+data.pic+"'>删除</span>");
					//显示上传后的图片
					var img5 = "upload/info/"+data.pic;
					showimg5.html("<img src='../"+img5+"' id='cropbox'  style='width:120px;' />");
					//传给php页面，进行保存的图片值
					$("#src5").val(img5);
					//截取图片的js
					btn5.html("上传图片");	//上传按钮还原
				},
				error:function(xhr){	//上传失败
					btn5.html("上传失败");
					bar5.width('0')
					files5.html(xhr.responseText);//返回失败信息
				}
			});
		});
		
		$(".delimg5").live('click',function(){
			var pic = $(this).attr("rel");
			$.post("phpJcrop/action.php?act=delimg5",{imagename:pic},function(msg){
				if(msg==1){
					files5.html("删除成功.");
					showimg5.empty();//清空图片
					progress5.hide();//隐藏进度条 
				}else{
					alert(msg);
				}
			});
		});
		
		//上传六
		var bar6 = $('.bar6');
		var percent6 = $('.percent6');
		var showimg6 = $('#showimg6');
		var progress6 = $(".progress6");
		var files6 = $(".files6");
		var btn6 = $(".btn6 span");
		$("#fileupload6").wrap("<form id='myupload6' action='phpJcrop/action.php' method='post' enctype='multipart/form-data'></form>");
		$("#fileupload6").change(function(){  //选择文件
			$("#myupload6").ajaxSubmit({
				dataType:  'json',	//数据格式为json 
				beforeSend: function() {	//开始上传 
					showimg6.empty();	//清空显示的图片
					//progress6.show();	//显示进度条
					progress6.show().css("display","block");	//显示进度条
					var percent6Val = '0%';	//开始进度为0%
					bar6.width(percent6Val);	//进度条的宽度
					percent6.html(percent6Val);	//显示进度为0% 
					btn6.html("上传中...");	//上传按钮显示上传中
				},
				uploadProgress: function(event, position, total, percent6Complete) {
					var percent6Val = percent6Complete + '%';	//获得进度
					bar6.width(percent6Val);	//上传进度条宽度变宽
					percent6.html(percent6Val);	//显示上传进度百分比
				},
				success: function(data) {	//成功
					//获得后台返回的json数据，显示文件名，大小，以及删除按钮
					files6.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg6' rel='"+data.pic+"'>删除</span>");
					//显示上传后的图片
					var img6 = "upload/info/"+data.pic;
					showimg6.html("<img src='../"+img6+"' id='cropbox'  style='width:120px;' />");
					//传给php页面，进行保存的图片值
					$("#src6").val(img6);
					//截取图片的js
					btn6.html("上传图片");	//上传按钮还原
				},
				error:function(xhr){	//上传失败
					btn6.html("上传失败");
					bar6.width('0')
					files6.html(xhr.responseText);//返回失败信息
				}
			});
		});
		
		$(".delimg6").live('click',function(){
			var pic = $(this).attr("rel");
			$.post("phpJcrop/action.php?act=delimg6",{imagename:pic},function(msg){
				if(msg==1){
					files6.html("删除成功.");
					showimg6.empty();//清空图片
					progress6.hide();//隐藏进度条 
				}else{
					alert(msg);
				}
			});
		});
		
		//上传7
		var bar7 = $('.bar7');
		var percent7 = $('.percent7');
		var showimg7 = $('#showimg7');
		var progress7 = $(".progress7");
		var files7 = $(".files7");
		var btn7 = $(".btn7 span");
		$("#fileupload7").wrap("<form id='myupload7' action='phpJcrop/actionv.php' method='post' enctype='multipart/form-data'></form>");
		$("#fileupload7").change(function(){  //选择文件
			$("#myupload7").ajaxSubmit({
				dataType:  'json',	//数据格式为json 
				beforeSend: function() {	//开始上传 
					showimg7.empty();	//清空显示的图片
					//progress7.show();	//显示进度条
					progress7.show().css("display","block");	//显示进度条
					var percent7Val = '0%';	//开始进度为0%
					bar7.width(percent7Val);	//进度条的宽度
					percent7.html(percent7Val);	//显示进度为0% 
					btn7.html("上传中...");	//上传按钮显示上传中
				},
				uploadProgress: function(event, position, total, percent7Complete) {
					var percent7Val = percent7Complete + '%';	//获得进度
					bar7.width(percent7Val);	//上传进度条宽度变宽
					percent7.html(percent7Val);	//显示上传进度百分比
				},
				success: function(data) {	//成功
					//获得后台返回的json数据，显示文件名，大小，以及删除按钮
					files7.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg7' rel='"+data.pic+"'>删除</span>");
					//显示上传后的图片
					var img7 = "upload/video/"+data.pic;
					//showimg7.html("<img src='../"+img7+"' id='cropbox'  style='width:120px;' />");
					//传给php页面，进行保存的图片值
					$("#src7").val(img7);
					//截取图片的js
					btn7.html("上传视频");	//上传按钮还原
				},
				error:function(xhr){	//上传失败
					btn7.html("上传失败");
					bar7.width('0')
					files7.html(xhr.responseText);//返回失败信息
				}
			});
		});
		
		$(".delimg7").live('click',function(){
			var pic = $(this).attr("rel");
			$.post("phpJcrop/actionv.php?act=delimg7",{imagename:pic},function(msg){
				if(msg==1){
					files7.html("删除成功.");
					//showimg7.empty();//清空图片
					//progress7.hide();//隐藏进度条 
					$("#src7").val("");
					progress7.show().css("display","none");
				}else{
					alert(msg);
				}
			});
		});
		
		
		
		//上传9
		var bar9 = $('.bar9');
		var percent9 = $('.percent9');
		var showimg9 = $('#showimg9');
		var progress9 = $(".progress9");
		var files9 = $(".files9");
		var btn9 = $(".btn9 span");
		$("#fileupload9").wrap("<form id='myupload9' action='phpJcrop/actionm.php' method='post' enctype='multipart/form-data'></form>");
		$("#fileupload9").change(function(){  //选择文件
			$("#myupload9").ajaxSubmit({
				dataType:  'json',	//数据格式为json 
				beforeSend: function() {	//开始上传 
					showimg9.empty();	//清空显示的图片
					//progress9.show();	//显示进度条
					progress9.show().css("display","block");	//显示进度条
					var percent9Val = '0%';	//开始进度为0%
					bar9.width(percent9Val);	//进度条的宽度
					percent9.html(percent9Val);	//显示进度为0% 
					btn9.html("上传中...");	//上传按钮显示上传中
				},
				uploadProgress: function(event, position, total, percent9Complete) {
					var percent9Val = percent9Complete + '%';	//获得进度
					bar9.width(percent9Val);	//上传进度条宽度变宽
					percent9.html(percent9Val);	//显示上传进度百分比
				},
				success: function(data) {	//成功
					//获得后台返回的json数据，显示文件名，大小，以及删除按钮
					files9.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg9' rel='"+data.pic+"'>删除</span>");
					//显示上传后的图片
					var img9 = "upload/video/"+data.pic;
					//showimg9.html("<img src='../"+img9+"' id='cropbox'  style='width:120px;' />");
					//传给php页面，进行保存的图片值
					$("#src9").val(img9);
					//截取图片的js
					btn9.html("上传语音");	//上传按钮还原
				},
				error:function(xhr){	//上传失败
					btn9.html("上传失败");
					bar9.width('0')
					files9.html(xhr.responseText);//返回失败信息
				}
			});
		});
		
		$(".delimg9").live('click',function(){
			var pic = $(this).attr("rel");
			$.post("phpJcrop/actionm.php?act=delimg9",{imagename:pic},function(msg){
				if(msg==1){
					files9.html("删除成功.");
					//showimg9.empty();//清空图片
					//progress9.hide();//隐藏进度条 
					$("#src9").val("");
					progress9.show().css("display","none");
				}else{
					alert(msg);
				}
			});
		});
		
		
		//上传8
		var bar8 = $('.bar8');
		var percent8 = $('.percent8');
		var showimg8 = $('#showimg8');
		var progress8 = $(".progress8");
		var files8 = $(".files8");
		var btn8 = $(".btn8 span");
		$("#fileupload8").wrap("<form id='myupload8' action='phpJcrop/action.php' method='post' enctype='multipart/form-data'></form>");
		$("#fileupload8").change(function(){  //选择文件
			$("#myupload8").ajaxSubmit({
				dataType:  'json',	//数据格式为json 
				beforeSend: function() {	//开始上传 
					showimg8.empty();	//清空显示的图片
					//progress8.show();	//显示进度条
					progress8.show().css("display","block");	//显示进度条
					var percent8Val = '0%';	//开始进度为0%
					bar8.width(percent8Val);	//进度条的宽度
					percent8.html(percent8Val);	//显示进度为0% 
					btn8.html("上传中...");	//上传按钮显示上传中
				},
				uploadProgress: function(event, position, total, percent8Complete) {
					var percent8Val = percent8Complete + '%';	//获得进度
					bar8.width(percent8Val);	//上传进度条宽度变宽
					percent8.html(percent8Val);	//显示上传进度百分比
				},
				success: function(data) {	//成功
					//获得后台返回的json数据，显示文件名，大小，以及删除按钮
					files8.html("<b>"+data.name+"("+data.size+"k)</b> <span class='delimg8' rel='"+data.pic+"'>删除</span>");
					//显示上传后的图片
					var img8 = "upload/info/"+data.pic;
					showimg8.html("<img src='../"+img8+"' id='cropbox'  style='width:120px;' />");
					//传给php页面，进行保存的图片值
					$("#src8").val(img8);
					//截取图片的js
					btn8.html("上传图片");	//上传按钮还原
				},
				error:function(xhr){	//上传失败
					btn8.html("上传失败");
					bar8.width('0')
					files8.html(xhr.responseText);//返回失败信息
				}
			});
		});
		
		$(".delimg8").live('click',function(){
			var pic = $(this).attr("rel");
			$.post("phpJcrop/action.php?act=delimg8",{imagename:pic},function(msg){
				if(msg==1){
					files8.html("删除成功.");
					$("#src8").val("");
					showimg8.empty();//清空图片
					progress8.hide();//隐藏进度条 
				}else{
					alert(msg);
				}
			});
		});
		
	});