<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--#include file="../../inc/global.asp"-->
<%
News_Id=trim(request("News_Id"))
%>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>多文件上传组件</title>
</head>
<body bgcolor="#ffffff" style="text-align:center;">
<!--影片中使用的 URL-->
<!--影片中使用的文本-->
<!-- saved from url=(0013)about:internet -->
<script language="javascript">
function challs_flash_update(){ //Flash 初始化函数
	var a={};
	//定义变量为Object 类型
	
	a.FormName = "Filedata";
	//设置Form表单的文本域的Name属性
	
	a.url="update.asp"; 
	//设置服务器接收代码文件
	
	a.parameter="bs=tyi&id=50"; 
	//设置提交参数，以GET形式提交
	
	a.typefile=["Images (*.gif,*.png,*.jpg)","*.gif;*.png;*.jpg"];
	//设置可以上传文件 数组类型
	//"Images (*.gif,*.png,*.jpg)"为用户选择要上载的文件时可以看到的描述字符串,
	//"*.gif;*.png;*.jpg"为文件扩展名列表，其中列出用户选择要上载的文件时可以看到的 Windows 文件格式，以分号相隔
	
	a.UpSize=0;
	//可限制传输文件总容量，0或负数为不限制，单位MB
	
	a.fileNum=0;
	//可限制待传文件的数量，0或负数为不限制
	
	a.size=2;
	//上传单个文件限制大小，单位MB，可以填写小数类型
	
	a.FormID=['select','select2','Classid2'];
	//设置每次上传时将注册了ID的表单数据以POST形式发送到服务器
	//需要设置的FORM表单中checkbox,text,textarea,radio,select项目的ID值
	//参数为数组类型，注意使用此参数必须有 challs_flash_FormData() 函数支持
	
	a.CompleteClose=true;
	//设置为true时，上传完成的条目，将也可以取消删除条目，这样参数 UpSize 将失效, 默认为false
	
	return a ;
	//返回Object
}

function challs_flash_onComplete(a){ //每次上传完成调用的函数，并传入一个Object类型变量，包括刚上传文件的大小，名称，上传所用时间,文件类型
	var name=a.fileName; //获取上传文件名
	var size=a.fileSize; //获取上传文件大小，单位字节
	var time=a.updateTime; //获取上传所用时间 单位毫秒
	var type=a.fileType; //获取文件类型，在 Windows 上，此属性是文件扩展名。 在 Macintosh 上，此属性是由四个字符组成的文件类型
	document.getElementById('show').innerHTML+='图片名称：'+name+'　图片大小：'+size+'字节　图片类型：'+type+'　上传用时 '+(time/1000)+'秒</a><br/>';//''''''
}

function challs_flash_onCompleteData(a){ //获取服务器反馈信息事件
	document.getElementById('show').innerHTML+='<font color="#ff0000">反馈信息：</font>'+a+'<br /><br />';	
}
function challs_flash_onStart(a){ //开始一个新的文件上传时事件,并传入一个Object类型变量，包括刚上传文件的大小，名称，类型
	var name=a.fileName; //获取上传文件名
	var size=a.fileSize; //获取上传文件大小，单位字节
	var type=a.fileType; //获取文件类型，在 Windows 上，此属性是文件扩展名。 在 Macintosh 上，此属性是由四个字符组成的文件类型
	document.getElementById('show').innerHTML+=name+'开始上传！<br />';
}

function challs_flash_onCompleteAll(){ //上传文件列表全部上传完毕事件
	document.getElementById('show').innerHTML+='<font color="#ff0000">所有文件上传完毕！</font><br />';
	//window.location.href='http://www.access2008.cn/update'; //传输完成后，跳转页面
}

function challs_flash_FormData(a){// 使用FormID参数时必要函数
	try{
		return document.getElementById(a).value;
	}catch(e){
		return '';
	}
}
</script>

<script>
function bao(s)
{
if (s==1){
		
		Classid2.style.display="block";
		}else{
			
			Classid2.style.display="none";
			}
}

</script>
	<div style="width:408px; height:348px; position:absolute; top:10px; left:10px;"><div style="background:#DCE5F1; border:#5576B8 solid 1px; font-size:12px; line-height:22px; text-align:left;">
	    <div  style="width:400px; height:22px; position:relative;">上传ID<select id="select" style="position:absolute; top:0px; left:57px;" >
	    <option value="<%=News_Id%>"><%=News_Id%></option>
      </select>
      <select id="select2" name="select2"  onchange="bao1(this.options[this.options.selectedIndex].value)" style="position:absolute; top:0px; left:172px;">
      <%
sql="Select Id,Class_Name From S_Lm where left(Class_Type,4)='006|' and Class_Id=2 and Class_flag=0"
sql=sql&" order by list asc,Id asc"
'response.write sql
'response.end
set rs=db_conn.Conn(sql)
if not rs.eof then
while not rs.eof%>
	    <option value="<%=rs(0)%>"><%=rs("Class_Name")%></option>
        <%
rs.movenext
wend
end if
rs.close
set rs=nothing
%>
      </select>
        <select name="Classid2" id="Classid2"  style="position:absolute; top:0px; left:250px; display:none;">
          <option value="0">请选择户型</option>
          <option value="1">一室户型</option>
          <option value="2">二室户型</option>
          <option value="3">三室户型</option>
          <option value="4">其它户型</option>
        </select>　　<a href="../pic/show.asp?News_Id=<%=News_Id%>"  style="position:absolute; top:0px; left:360px;">返回</a></div></div>
<object classid="clsid:d27cdb6e-ae6d-11cf-96b8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=9,0,0,0" width="408" height="323" id="update_" align="middle">
<param name="allowFullScreen" value="false" />
    <param name="allowScriptAccess" value="always" />
	<param name="movie" value="update_.swf" />
    <param name="quality" value="high" />
    <param name="bgcolor" value="#ffffff" />
    <embed src="update_.swf" quality="high" bgcolor="#ffffff" width="408" height="323" name="update_" align="middle" allowScriptAccess="always" allowFullScreen="false" type="application/x-shockwave-flash" pluginspage="http://www.macromedia.com/go/getflashplayer" />
	</object>
    <div style="width:100px; height:12px; position:absolute; bottom:3px; left:20px; background:#DCE5F1;"></div>
    </div>
<div id="show" style="width:500px; text-align:left; position:absolute; top:10px; left:450px;background:#DCE5F1; border:#5576B8 solid 1px; font-size:12px;">信息提示框！<br />
</div>
</body>
</html>
