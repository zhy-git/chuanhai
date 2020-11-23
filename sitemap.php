<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<head>
<?php
	include("conn/conn.php");
	include('conn/function.php');
	?>
<title>网站地图-海南网站建设|海南网站制作|海口网站建设|海口网站建设公司|海南网络公司-海南创想传媒有限公司</title>
<meta http-equiv="Content-type" content="text/html;" charset="utf-8" />
<style type="text/css">
<!-- 
 .STYLE1 {
 font-size: 12px;
 color: #333333;
 }
 --></style>
</head><body>
<table align="center">
    <tr  align="center">
        <td align="center">
            <table width="766" border="0" >
                <tr align="left">
                	<td class="STYLE1" ><span >网站地图(Build<?php echo date('y-m-d',time());?>)：(<?php echo date('Y-m-d H:d:s',time());?>)</span></td>
                </tr>
                <?php
					$rowshow = $mysql->query("select * from `web_content` where `path`='0-24' order by px desc,addtime desc");
					foreach($rowshow as $k=>$s_list){
					$url="http://www.hnchuangxiang.com/case_show_{$s_list['id']}.html";
                ?>
                <tr align="left"> 
                	<td width="760" class="STYLE1"><?php echo $k+1;?>.&nbsp;<a href="<?php echo $url;?>"><?php echo $s_list['title'];?>_海南网站建设|海南网站制作|海口网站建设|海口网站建设公司|海南网络公司-海南创想传媒有限公司</a></td>
                </tr>	
                <?php }?>
                <?php
					$rowshow = $mysql->query("select * from `web_content` where `path`='0-5' order by px desc,addtime desc");
					foreach($rowshow as $k2=>$s_list){
					$url="http://www.hnchuangxiang.com/news_show_{$s_list['id']}.html";
                ?>
                <tr align="left"> 
                	<td width="760" class="STYLE1"><?php echo $k+$k2+1;?>.&nbsp;<a href="<?php echo $url;?>"><?php echo $s_list['title'];?>_海南网站建设|海南网站制作|海口网站建设|海口网站建设公司|海南网络公司-海南创想传媒有限公司</a></td>
                </tr>	
                <?php }?>
            </table>
        </td>
    </tr>
</table>
</body>
</html>