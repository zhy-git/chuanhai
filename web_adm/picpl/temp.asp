<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<!--#include file="../../inc/global.asp"-->
<%
News_Id=trim(request("News_Id"))
%>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=gb2312" />
<title>���ļ��ϴ����</title>
</head>
<body bgcolor="#ffffff" style="text-align:center;">
<!--ӰƬ��ʹ�õ� URL-->
<!--ӰƬ��ʹ�õ��ı�-->
<!-- saved from url=(0013)about:internet -->
<script language="javascript">
function challs_flash_update(){ //Flash ��ʼ������
	var a={};
	//�������ΪObject ����
	
	a.FormName = "Filedata";
	//����Form�����ı����Name����
	
	a.url="update.asp"; 
	//���÷��������մ����ļ�
	
	a.parameter="bs=tyi&id=50"; 
	//�����ύ��������GET��ʽ�ύ
	
	a.typefile=["Images (*.gif,*.png,*.jpg)","*.gif;*.png;*.jpg"];
	//���ÿ����ϴ��ļ� ��������
	//"Images (*.gif,*.png,*.jpg)"Ϊ�û�ѡ��Ҫ���ص��ļ�ʱ���Կ����������ַ���,
	//"*.gif;*.png;*.jpg"Ϊ�ļ���չ���б������г��û�ѡ��Ҫ���ص��ļ�ʱ���Կ����� Windows �ļ���ʽ���Էֺ����
	
	a.UpSize=0;
	//�����ƴ����ļ���������0����Ϊ�����ƣ���λMB
	
	a.fileNum=0;
	//�����ƴ����ļ���������0����Ϊ������
	
	a.size=2;
	//�ϴ������ļ����ƴ�С����λMB��������дС������
	
	a.FormID=['select','select2','Classid2'];
	//����ÿ���ϴ�ʱ��ע����ID�ı�������POST��ʽ���͵�������
	//��Ҫ���õ�FORM����checkbox,text,textarea,radio,select��Ŀ��IDֵ
	//����Ϊ�������ͣ�ע��ʹ�ô˲��������� challs_flash_FormData() ����֧��
	
	a.CompleteClose=true;
	//����Ϊtrueʱ���ϴ���ɵ���Ŀ����Ҳ����ȡ��ɾ����Ŀ���������� UpSize ��ʧЧ, Ĭ��Ϊfalse
	
	return a ;
	//����Object
}

function challs_flash_onComplete(a){ //ÿ���ϴ���ɵ��õĺ�����������һ��Object���ͱ������������ϴ��ļ��Ĵ�С�����ƣ��ϴ�����ʱ��,�ļ�����
	var name=a.fileName; //��ȡ�ϴ��ļ���
	var size=a.fileSize; //��ȡ�ϴ��ļ���С����λ�ֽ�
	var time=a.updateTime; //��ȡ�ϴ�����ʱ�� ��λ����
	var type=a.fileType; //��ȡ�ļ����ͣ��� Windows �ϣ����������ļ���չ���� �� Macintosh �ϣ������������ĸ��ַ���ɵ��ļ�����
	document.getElementById('show').innerHTML+='ͼƬ���ƣ�'+name+'��ͼƬ��С��'+size+'�ֽڡ�ͼƬ���ͣ�'+type+'���ϴ���ʱ '+(time/1000)+'��</a><br/>';//''''''
}

function challs_flash_onCompleteData(a){ //��ȡ������������Ϣ�¼�
	document.getElementById('show').innerHTML+='<font color="#ff0000">������Ϣ��</font>'+a+'<br /><br />';	
}
function challs_flash_onStart(a){ //��ʼһ���µ��ļ��ϴ�ʱ�¼�,������һ��Object���ͱ������������ϴ��ļ��Ĵ�С�����ƣ�����
	var name=a.fileName; //��ȡ�ϴ��ļ���
	var size=a.fileSize; //��ȡ�ϴ��ļ���С����λ�ֽ�
	var type=a.fileType; //��ȡ�ļ����ͣ��� Windows �ϣ����������ļ���չ���� �� Macintosh �ϣ������������ĸ��ַ���ɵ��ļ�����
	document.getElementById('show').innerHTML+=name+'��ʼ�ϴ���<br />';
}

function challs_flash_onCompleteAll(){ //�ϴ��ļ��б�ȫ���ϴ�����¼�
	document.getElementById('show').innerHTML+='<font color="#ff0000">�����ļ��ϴ���ϣ�</font><br />';
	//window.location.href='http://www.access2008.cn/update'; //������ɺ���תҳ��
}

function challs_flash_FormData(a){// ʹ��FormID����ʱ��Ҫ����
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
	    <div  style="width:400px; height:22px; position:relative;">�ϴ�ID<select id="select" style="position:absolute; top:0px; left:57px;" >
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
          <option value="0">��ѡ����</option>
          <option value="1">һ�һ���</option>
          <option value="2">���һ���</option>
          <option value="3">���һ���</option>
          <option value="4">��������</option>
        </select>����<a href="../pic/show.asp?News_Id=<%=News_Id%>"  style="position:absolute; top:0px; left:360px;">����</a></div></div>
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
<div id="show" style="width:500px; text-align:left; position:absolute; top:10px; left:450px;background:#DCE5F1; border:#5576B8 solid 1px; font-size:12px;">��Ϣ��ʾ��<br />
</div>
</body>
</html>
