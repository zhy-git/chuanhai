<%@LANGUAGE="VBSCRIPT" CODEPAGE="65001"%>
<%
db="../../../../data/jzlw.mdb"
Set conn = Server.CreateObject("ADODB.Connection")
connstr="Provider=Microsoft.Jet.OLEDB.4.0;Data Source=" & Server.MapPath(""&db&"")
conn.Open connstr
%>
<%
dim oUpFileStream
call wenjiansc("fasp/") '这里可以设置存放目录
sub wenjiansc(a)
	dim upload,file,formName,iCount,fileurl,m_lngTime,dtmNow,m_strDate,GetTimeStr,ontname,fjname
	if left(a,1)="\" then a=right(a,len(a)-1)
	if right(a,1)<>"\" then a=a&"\"
	if a="\" then a=""
	set upload=new upload_5xSoft ''建立上传对象
	for each formName in upload.file ''列出所有上传了的文件
		m_lngTime  = Clng(Timer()*1000)'lin加
		m_lngTime=m_lngTime+1'lin加
		dtmNow = Date()
		m_strDate  = Year(dtmNow)&Right("0"&Month(dtmNow),2)&Right("0"&Day(dtmNow),2)'lin加
		GetTimeStr=m_strDate&Right("00000000"&m_lngTime,8)'lin加
		set file=upload.file(formName)  ''生成一个文件对象
		filekzmzz=filekzm(file.FileName)
		
		fjname=file.FileName
		fjname=left(fjname,len(fjname)-4)
		
		if filekzmzz="gif" or filekzmzz="jpg" or filekzmzz="jpeg" or filekzmzz="bmp" or filekzmzz="png" then 
			if file.FileSize>0 then         ''如果 FileSize > 0 说明有文件数据
				file.SaveAs Server.mappath("../../../../upload/"&GetTimeStr&"."&filekzmzz)   ''保存文件   ''保存的名称
				set file=nothing
				ontname="upload/"&GetTimeStr&"."&filekzmzz
			end if
		end if
				set rs=server.CreateObject("Adodb.recordset")
				sql="Select * from S_Lp_Pic"
				rs.open sql,conn,1,3
				rs.addnew
				rs("N_Title")=fjname
				rs("Img_path")=ontname
				rs("News_Id")=upload.Form("select")
				rs("lb")=upload.Form("select2")
				'rs("Classid2")=upload.Form("Classid2")
				rs.update()
				rs.close()
				set rs=nothing
	next
	Response.Write("上传成功！！")
	set upload=nothing 
	
end sub

Function filekzm(textS)
	dim p,ii,c
	c=len(texts)
	for ii=1 to 10
		p=mid(texts,c-ii,1)
		if p="." then
			filekzm=lcase(mid(texts,c-ii+1,ii))
			exit for
		end if
	next
end function

Class upload_5xSoft
 
dim Form,File,Version
  
Private Sub Class_Initialize 
dim RequestBinDate,sStart,bCrLf,sInfo,iInfoStart,iInfoEnd,tStream,iStart,oFileInfo
dim iFileSize,sFilePath,sFileType,sFormvalue,sFileName
dim iFindStart,iFindEnd
dim iFormStart,iFormEnd,sFormName
Version="无组件上传类"
set Form=Server.CreateObject("Scripting.Dictionary")
set File=Server.CreateObject("Scripting.Dictionary")
if Request.TotalBytes<1 then Exit Sub
set tStream = Server.CreateObject("adodb.stream")
set oUpFileStream = Server.CreateObject("adodb.stream")
oUpFileStream.Type = 1
oUpFileStream.Mode =3
oUpFileStream.Open
oUpFileStream.Write  Request.BinaryRead(Request.TotalBytes)
oUpFileStream.Position=0
RequestBinDate =oUpFileStream.Read 
iFormStart = 1
iFormEnd = LenB(RequestBinDate)
bCrLf = chrB(13) & chrB(10)
sStart = MidB(RequestBinDate,1, InStrB(iFormStart,RequestBinDate,bCrLf)-1)
iStart = LenB (sStart)
iFormStart=iFormStart+iStart+1
while (iFormStart + 10) < iFormEnd 
 iInfoEnd = InStrB(iFormStart,RequestBinDate,bCrLf & bCrLf)+3
 tStream.Type = 1
 tStream.Mode =3
 tStream.Open
 oUpFileStream.Position = iFormStart
 oUpFileStream.CopyTo tStream,iInfoEnd-iFormStart
 tStream.Position = 0
 tStream.Type = 2
 tStream.Charset ="utf-8"
 sInfo = tStream.ReadText      
 '取得表单项目名称
 iFormStart = InStrB(iInfoEnd,RequestBinDate,sStart)
 iFindStart = InStr(22,sInfo,"name=""",1)+6
 iFindEnd = InStr(iFindStart,sInfo,"""",1)
 sFormName = Mid (sinfo,iFindStart,iFindEnd-iFindStart)
 '如果是文件
 if InStr (45,sInfo,"filename=""",1) > 0 then
  set oFileInfo=new FileInfo
  '取得文件名
  iFindStart = InStr(iFindEnd,sInfo,"filename=""",1)+10
  iFindEnd = InStr(iFindStart,sInfo,"""",1)
  sFileName = Mid (sinfo,iFindStart,iFindEnd-iFindStart)
  oFileInfo.FileName=getFileName(sFileName)
  oFileInfo.FilePath=getFilePath(sFileName)
  '取得文件类型
  iFindStart = InStr(iFindEnd,sInfo,"Content-Type: ",1)+14
  iFindEnd = InStr(iFindStart,sInfo,vbCr)
  oFileInfo.FileType =Mid (sinfo,iFindStart,iFindEnd-iFindStart)
  oFileInfo.FileStart =iInfoEnd
  oFileInfo.FileSize = iFormStart -iInfoEnd -3
  oFileInfo.FormName=sFormName
  file.add sFormName,oFileInfo
 else
 '如果是表单项目
  tStream.Close
  tStream.Type =1
  tStream.Mode =3
  tStream.Open
  oUpFileStream.Position = iInfoEnd 
  oUpFileStream.CopyTo tStream,iFormStart-iInfoEnd-3
  tStream.Position = 0
  tStream.Type = 2
  tStream.Charset ="utf-8"
  sFormvalue = tStream.ReadText 
  form.Add sFormName,sFormvalue
 end if
 tStream.Close
 iFormStart=iFormStart+iStart+1
 wend
RequestBinDate=""
set tStream =nothing
End Sub

Private Sub Class_Terminate  
if not Request.TotalBytes<1 then
 form.RemoveAll
 file.RemoveAll
 set form=nothing
 set file=nothing
 oUpFileStream.Close
 set oUpFileStream =nothing
  end if
End Sub
   
 
 Private function GetFilePath(FullPath)
  If FullPath <> "" Then
   GetFilePath = left(FullPath,InStrRev(FullPath, "\"))
  Else
   GetFilePath = ""
  End If
 End  function
 
 Private function GetFileName(FullPath)
  If FullPath <> "" Then
   GetFileName = mid(FullPath,InStrRev(FullPath, "\")+1)
  Else
   GetFileName = ""
  End If
 End  function

End Class

Class FileInfo
  dim FormName,FileName,FilePath,FileSize,FileType,FileStart
  Private Sub Class_Initialize 
    FileName = ""
    FilePath = ""
    FileSize = 0
    FileStart= 0
    FormName = ""
    FileType = ""
  End Sub
  
 Public function SaveAs(FullPath)
    dim oFileStream,ErrorChar,i
    SaveAs=1
    if trim(fullpath)="" or right(fullpath,1)="/" then exit function
    set oFileStream=CreateObject("Adodb.Stream")
    oFileStream.Type=1
    oFileStream.Mode=3
    oFileStream.Open
    oUpFileStream.position=FileStart
    oUpFileStream.copyto oFileStream,FileSize
    oFileStream.SaveToFile FullPath,2
    oFileStream.Close
    set oFileStream=nothing 
    SaveAs=0
  end function
End Class

Function filekzm(textS)
	dim p,ii,c
	c=len(texts)
	for ii=1 to 10
		p=mid(texts,c-ii,1)
		if p="." then
			filekzm=lcase(mid(texts,c-ii+1,ii))
			exit for
		end if
	next
end function

function ObjTest(strObj)
	on error resume next
	ObjTest=false
	set TestObj=server.CreateObject (strObj)
  	If -2147221005 <> Err then
    	ObjTest = True
  	end if
	set TestObj=nothing
end function
 %>