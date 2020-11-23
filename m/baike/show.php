<!DOCTYPE html>
<html lang="zh-cn">
<?php
require("../../conn/conn.php");
require("../function.php");

$lpid=$_GET['lpid'];
$pid_flag=$_GET['pid_flag'];
if($lpid<>""){
	$rows=$mysql->query("SELECT * FROM `web_content` WHERE `id`='{$lpid}'");
	$infos=$rows[0];
	 if($infos==false)
	  {
		echo "已经出错!";
		exit;
	   }
	}
$id=$_GET['id'];
if($id<>""){
	$rows=$mysql->query("SELECT * FROM `web_content` WHERE `id`='{$id}'");
	$infon=$rows[0];
	 if($infon==false)
	  {
		echo "已经出错!";
		exit;
	   }
	$click=$infon['click']+1;
	$mysql->execute("UPDATE `web_content` SET `click`='".$click."' where `id`='".$id."'");
	}
?>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimum-scale=1">
<title><?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>">
        <link rel="stylesheet" type="text/css" href="../css/shuxing.css"/> <!--网站通用属性-->
		<link rel="stylesheet" type="text/css" href="../css/bottom-css.css"/><!--网站底部样式-->
		<link rel="stylesheet" type="text/css" href="../css/top-css.css"/><!--网站顶部样式-->
		<link rel="stylesheet" type="text/css" href="../css/yee_mobile.css"/>
		<link rel="stylesheet" type="text/css" href="../css/style.css"/>
		<link rel="stylesheet" type="text/css" href="../css/lightgallery.css"/>
		<script src="../js/jquery-1.8.0.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/layer.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/yee.js" type="text/javascript" charset="utf-8"></script>
		<script src="../js/jquery.js" type="text/javascript" charset="utf-8"></script>
		<style>
  #serachBox{display: none;}
    .header_search {
      margin-top: 4px;
    position: absolute;
    top: 7px;
    right: 20px;
    width: 50%;
    height: 29px;
    padding: 0 10px 0 38px;
    box-sizing: border-box;
    background: url(/public/wap/images/u6.png) no-repeat 10px 6px;
    background-size: 79px 277px;
    background-color: #FFF;
    font-size: 0.8rem;
    color: #999;
    border-radius: 20px;
    line-height: 32px;
}
.back-btn_maing{ float: left;}
.back_search_m{ width: 85%; float: right;}
/*2017.5.18*/
.pg_hang {padding:0;border-top:1px solid #E1E1E1;}
.hang_main ul {margin:0 auto;}
.hang_main li {width:36%;background:0;margin:0;height:45px;line-height:45px;}
.hang_main li:first-child {width:27%;}
.hang_main li a {font-size:0.8rem; display:block;}
.hang_main li a.hang_main_bg3 {background:#FB8D3A;color:#fff; background:rgba(251,141,58,1) url("../images/tubiao1.png") no-repeat scroll 20% 11px / auto 45%; padding-left: 22px;}
.hang_main li a.hang_main_bg2 {color:#333;background-position:8% 8px;background-color:#fff; background-size: 28%; padding-left: 25px; }
.hang_main li a.hang_main_bg1 {color:#fff;background-position:20% 8px; background-size: 20%; padding-left: 25px;}


</style>
	</head>
	<body>
		
	
	
	
	<section id="serachBox2">
<?php include("../top.php");?>
		<link rel="stylesheet" type="text/css" href="css/application.css"/>
		<link rel="stylesheet" type="text/css" href="css/loup_index.css"/>
		<section class="wrap">

  <div class="newscon">
    <div class="location">首页&gt;新闻&gt;正文</div>
    <div class="newscon-head"><h1 data-id="11236"><?php echo $infon['title'];?></h1><h2><span>更新时间：<?php echo date('Y-m-d',strtotime($infon['addtime']));?></span>来源：盘房网</h2><span class="c" style="font-size:0.9rem; color:#999;text-align: right; padding-top:2px; display:none;">有效期至：2018-06-13</span></div>
    
    <div class="newscon-main">
    <?php echo $infon['content'];?>
                <div class="clear"></div>
                
        <!--分享到-->
    	<div>
    		<span>分享到：</span><div  class="bdsharebuttonbox"><a href="#" class="bds_more" data-cmd="more"></a><a href="#" class="bds_qzone" data-cmd="qzone"></a><a href="#" class="bds_tsina" data-cmd="tsina"></a><a href="#" class="bds_tqq" data-cmd="tqq"></a><a href="#" class="bds_renren" data-cmd="renren"></a><a href="#" class="bds_weixin" data-cmd="weixin"></a></div>
			<script>window._bd_share_config={"common":{"bdSnsKey":{},"bdText":"","bdMini":"2","bdPic":"","bdStyle":"0","bdSize":"16"},"share":{},"image":{"viewList":["qzone","tsina","tqq","renren","weixin"],"viewText":"分享到：","viewSize":"16"},"selectShare":{"bdContainerClass":null,"bdSelectMiniList":["qzone","tsina","tqq","renren","weixin"]}};with(document)0[(getElementsByTagName('head')[0]||body).appendChild(createElement('script')).src='http://bdimg.share.baidu.com/static/api/js/share.js?v=89860593.js?cdnversion='+~(-new Date()/36e5)];</script>
    	</div>
    	
    	<!--更多精彩阅读-->
    	<div style="margin-top: 20px;margin-bottom: 20px;border-top: 0.0625rem solid #ddd;border-bottom: 0.0625rem solid #ddd;padding-bottom: 10px;">
    		<h2 style="font-size: 0.65rem;">更多精彩阅读</h2>
    		<ul>
			   <?php
			$row = $mysql->query("select * from `web_content` where `path`='0-47' order by id desc limit 0,5");
			foreach($row as $k=>$list){
		?>
        
         
				<li style="overflow: hidden;    line-height: 1rem;">
					<a style="float: left;width: 78%;overflow: hidden;text-overflow: ellipsis;white-space: nowrap;display: block;color: #555;" href=""><?php echo $list['title'];?></a>
					<span style="float: right;font-size: 0.4rem;color: #999;"><?php echo date('Y-m-d',strtotime($list['addtime']));?></span>
				</li>
        <?php
			}
		?>
    			
    		</ul>
    	</div>
    	
    	<!--定阅-->
    	<style type="text/css">
    		.late_news{
			    width: 100%;
			    overflow: hidden;
			}
			.late_news h1{
			    color: #007E8C;
			    font-size: 0.8rem;
			        font-weight: normal;
			}
			.late_news_b{
			    width: 100%;
			    overflow: hidden;
			}
			.late_news_b input{
			    float: left;
			    width: 80%;
			    height: 1.2rem;
			    line-height:  1.2rem;
			    border: 1px solid #ddd;
			    border-right: 0;
			    padding: 0.3125rem 0.625rem;
			}
			.late_news_b_r{
			    float: left;
			    width: 20%;
			    height: 1.2rem;
			    line-height:  1.2rem;
			    text-align: center;
			    background-color: #fd6e63;
			    color: #fff;
			    font-size: 0.6rem;
			}
			 
    	</style>
    	<div class="late_news">
            <h1>订阅最新购房优惠信息</h1>
            <div class="late_news_b">
                <input type="text" placeholder="请输入您的手机号">
                <div class="late_news_b_r">订阅</div>
            </div>
        </div>
    	
    	
    	
    </div>
   <div style="padding-bottom: 20px;margin-top: 10px;">
        <h1 style="text-align: center;font-size: 0.7rem;    line-height: 1rem;">我的购房需求</h1>
        <p style="text-align: center;font-size: 0.5rem;    line-height: 1rem;">(专业置业经纪人为您筛选房源)</p>
        <a style="text-align: center;    display: block;" href="<?php echo $sitem;?>needs.php"><img width="15%" src="<?php echo $sitem;?>images/demand.png" alt="/"></a>
    	</div>
  
    <!--报名看房-->
      
    

    

    <!-- 优惠信息订阅开始 -->
    
    <script>
    $('.sign-btn').click(function(){
        var data = {mobile:$('.sign-mobile').val(),type:3};
        if(!yee.isMoblie(data.mobile)){
            yee.layerOpen('请输入正确是手机号码');
            return false;
        }
        yee.post('/api/property-sign.html',data,function(result){
            yee.layerOpen(result.msg);
        });
    });
    </script>
    <!-- 优惠信息订阅结束 -->
  </div>
  <script type="text/javascript">
  yee.get('/api/news-detail.html',{id:id},function(result){
    if (result.code==200) {
      document.title = result.data.title;
      $('.newscon-head').append('<h1 data-id="'+result.data.id+'">'+result.data.title+'</h1>');
      $('.newscon-head').append('<h2><span>更新时间：'+result.data.addtime+'</span>来源：'+result.data.source+'</h2>');
      $('.newscon-head').append('<span class="c" style="font-size:0.9rem; color:#999;text-align: right; padding-top:2px;">有效期至：'+getNextMonth(result.data.addtime)+'</span>');
      $('.newscon-main').html(result.data.content);
    };
  });
  </script>

  <script>
    function getNextMonth(date) {
      var arr = date.split('-');  
      var year = arr[0]; //获取当前日期的年份  
      var month = arr[1]; //获取当前日期的月份  
      var day = arr[2]; //获取当前日期的日  
      var days = new Date(year, month, 0);  
      days = days.getDate(); //获取当前日期中的月的天数  
      var year2 = year;  
      var month2 = parseInt(month) + 2;  
      if (month2 > 12) {  
          year2 = parseInt(year2) + 1;  
          month2 = 1;  
      }  
      var day2 = day;  
      var days2 = new Date(year2, month2, 0);  
      days2 = days2.getDate();  
      if (day2 > days2) {  
          day2 = days2;  
      }  
      if (month2 < 10) {  
          month2 = '0' + month2;  
      }
      var t2 = year2 + '-' + month2 + '-' + day2;  
      return t2;  
  }  
</script>

<script>
  //处理图片变形
    $(function(){
        setTimeout(function(){
               var _href_call = $('p a[title="zixun"]').attr("href");
               var _href_call_m=_href_call.split('//');//截取电话号码去掉http://,组成数组
              $('p a[title="zixun"]').removeAttr('target');
              $('p a[title="zixun"]').attr('href','tel:' + _href_call_m[1]);
        },80);
        
    })
</script>

  <script>
     //处理图片变形
    $(function(){
        setTimeout(function(){
           $('.newscon-main p').each(function(){
              var $alt = $(this).find('img').attr('alt');
              if($alt == 'code' || $alt == 'zixun'){
                $('.newscon-main p img[alt="code"]').css({'width':'170px','height':'170px','margin':'0 auto'});
                $('.newscon-main p img[alt="zixun"]').css({'width':'77px','height':'22px','margin':'0 auto'});
              }
              // }else{
              //   $('.newscon-main p img').css({"width":"100%","height":"auto","display":"block"});
              // }
           })
            // $('.newscon-main p img').css({"width":"100%","height":"auto","display":"block"});
            // $('.newscon-main p img[alt="code"]').css({'width':'170px','height':'170px','margin':'0 auto'});
            // $('.newscon-main p img[alt="zixun"]').css({'width':'77px','height':'22px','margin':'0 auto'});
        },1000);
        
    })
  </script>
</section>
		    
<style type="text/css">
	.foot1er-nav{
		padding-bottom: 0rem;
	}
</style>		    
		
<?php include("../bottom.php");?>
	
		
		
		
		</section>
		</section>
	</body>
</html>
