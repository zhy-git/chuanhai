<?php 
class mobile
{
function getPhoneNumber()
{
       if (isset($_SERVER['HTTP_X_NETWORK_INFO']))
       {
         $str1 = $_SERVER['HTTP_X_NETWORK_INFO'];
         $getstr1 = preg_replace('/(.*,)(13[\d]{9})(,.*)/i','\\2',$str1);
         Return $getstr1;
       }
       elseif (isset($_SERVER['HTTP_X_UP_CALLING_LINE_ID']))
       {
         $getstr2 = $_SERVER['HTTP_X_UP_CALLING_LINE_ID'];
         Return $getstr2;
       }
       elseif (isset($_SERVER['HTTP_X_UP_SUBNO']))
       {
         $str3 = $_SERVER['HTTP_X_UP_SUBNO'];
         $getstr3 = preg_replace('/(.*)(13[\d]{9})(.*)/i','\\2',$str3);
         Return $getstr3;
       }
       elseif (isset($_SERVER['ttp_user-agent'])) {
         $str4 = $_SERVER['ttp_user-agent'];
         $getstr4 = preg_replace('/(.*)(13[\d]{9})(.*)/i','\\2',$str3);
         Return $getstr4;
       }
       elseif (isset($_SERVER['HTTP-X-UP-CALLING-LINE-ID']))
       {
         $str5 = $_SERVER['HTTP-X-UP-CALLING-LINE-ID'];
         $getstr5 = preg_replace('/(.*,)(13[\d]{9})(,.*)/i','\\2',$str1);
         Return $getstr5;
       }
       elseif (isset($_SERVER['user_agent']))
       {
         $str6 = $_SERVER['user_agent'];
         $getstr6 = preg_replace('/(.*,)(13[\d]{9})(,.*)/i','\\2',$str1);
         Return $getstr6;
       }
       elseif (isset($_SERVER['user-agent']))
       {
         $str7 = $_SERVER['user-agent'];
         $getstr7 = preg_replace('/(.*,)(13[\d]{9})(,.*)/i','\\2',$str1);
         Return $getstr7;
       }
       elseif (isset($_SERVER['http_x_up_bear_type']))
       {
         $str8 = $_SERVER['http_x_up_bear_type'];
         $getstr8 = preg_replace('/(.*,)(13[\d]{9})(,.*)/i','\\2',$str1);
         Return $getstr8;
       }
       elseif (isset($_SERVER['x-up-calling-line-id']))
       {
         $str9 = $_SERVER['x-up-calling-line-id'];
         $getstr9 = preg_replace('/(.*,)(13[\d]{9})(,.*)/i','\\2',$str1);
         Return $getstr9;
       }
       elseif (isset($_SERVER['DEVICEID']))
       {
         Return $_SERVER['DEVICEID'];
       }
       else
       {
         Return false;
       }
}
}
$mobile = new mobile();
$iss = $mobile->getPhoneNumber();
?> 
<!-- 获取浏览者ip -->
  <script type="text/javascript" src="http://pv.sohu.com/cityjson?ie=utf-8"></script>
  <script type="text/javascript">
  $.ajax({
        type: "POST",//方法类型
        dataType: "json",//预期服务器返回的数据类型
        url: "/m/save.php?action=getIP&isphone=<?php echo $iss?>&ly="+ window.location.href ,//url
        data: returnCitySN,
    });
</script><!-- 获取浏览者ip end-->
