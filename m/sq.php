<!-- 获取浏览者ip -->
  <script type="text/javascript" src="http://pv.sohu.com/cityjson?ie=utf-8"></script>
  <script type="text/javascript">
  $.ajax({
        type: "POST",//方法类型
        dataType: "json",//预期服务器返回的数据类型
        url: "/m/save.php?action=getIP&ly="+ window.location.href ,//url
        data: returnCitySN,
    });
</script><!-- 获取浏览者ip end-->