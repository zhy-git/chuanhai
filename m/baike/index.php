<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" class="hn">
<?php
require("../../conn/conn.php");
require("../function.php");
$pid=$_GET['pid'];
$rowy = $mysql->query("select * from `web_srot` where `id`='{$pid}' ");
?><head>
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<meta charset="utf-8">
<meta name="viewport" content="initial-scale=1, maximum-scale=1, user-scalable=no, minimum-scale=1">
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="black">
<meta name="format-detection" content="telephone=no">
<title><?php echo $config['site_name'];?></title>
<meta name=keywords content="<?php echo $config['site_keyword'];?>">
<meta name=description content="<?php echo $config['site_desc'];?>">

        <link rel="stylesheet" type="text/css" href="../css/shuxing.css"/> <!--网站通用属性-->
		<link rel="stylesheet" type="text/css" href="../css/bottom-css.css"/><!--网站底部样式-->
		<link rel="stylesheet" type="text/css" href="../css/top-css.css"/><!--网站顶部样式-->
<link rel="stylesheet" href="../css/yee_mobile.css">
<link rel="stylesheet" type="text/css" href="../css/style.css"/>
<!--<link rel="stylesheet" href="files/lightgallery.css">-->
<link rel="stylesheet" type="text/css" href="../css/page.css"/>
<script src="../js/jquery-1.js"></script>
<script src="../js/layer.js"></script>
<link href="../css/layer.css" type="text/css" rel="styleSheet" id="layermcss">
<!--<script src="../js/yee.js"></script>-->
<script type="text/javascript">
  var _czc = _czc || [];
</script>
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



<script>
  function openWin(url) {
      var u = url;
      window.open(u, 'newwindow', 'height=600, width=800, top=30%,left=30%, toolbar=no, menubar=no, scrollbars=no, resizable=no,location=no, status=no');
  }


    //资讯绩效
//function click_more(obj){
//   yee.get('/api/property-news_view.html',{key:obj},function(result){
//            console.log(result);
//      });
// }


</script>
<link rel="stylesheet" href="../css/mobile.css" type="text/css" charset="utf-8"></head>
<body>



<section id="serachBox2">


<?php include("../top.php");?>


<section class="wrap">


<style>
/*2017.3.16*/
  .filter ul li select {background-position: 9px 17px;font-size:1rem;padding-left:21px;}



  /*2017.4.10*/
  .news-img {float:right;width:90px;}
  .news-img img {height:65px;width:100%;}
  .news-tabs ul li a {font-size:0.5rem;}
  .news-con {padding-left:10px;padding-right:95px;}
  .news-con h1 {font-size:1rem;}
  .news-con p {font-size:0.9rem;}
  .news-con h2 {left:10px;top:40px;font-size:0.9rem;}


  /*2018.2.10*/
  .news-list ul li {overflow:hidden;}
  #ul li{overflow: hidden;}

  /*样式1    左图 右文*/
  .imgBox {width:36%;height:95px;float:left;}
  .imgBox img {width:99%;height:100%;display:block;}
  .txtBox {width:58%;float:right;height:100px;position:relative; left: -12px;}
  .txtBox .txtTitle {font-size:0.6rem;color:#333;line-height:26px;}
  .txtBox .txtCenter {font-size:0.9rem;color:#8e919a;}
  .txtBox .txtData {height:30px;bottom:0;position: absolute;font-size:0.4rem;line-height:30px;color:#8f8f8f;}
  .txtBox .txtData span {display:inline-block;position: relative;left: 15px;}

  /*样式2   上标题  中三图   下日期*/
  .titleBox {font-size:1rem;color:#333;line-height:22px;}
  .detailsBox ul{overflow:hidden;}
  .detailsBox ul li {width:32%;height:80px;float:left; margin: 8px 0.66%;border:none; padding: 0;}
  .detailsBox ul li img {display:block;width:100%;height:100%;}
  .detailsBox .unberData {height:30px;line-height:30px;font-size:0.7rem;color:#8f8f8f;}
  .detailsBox .unberData span {display:inline-block;margin-left:25px;}


  /*样式3 上标题  下一张大图*/
  .centreBox {height:190px;}
  .centreBox img {display:block;width:100%;height:100%;}
  .source {height:30px;line-height:30px;font-size:0.7rem;color:#8f8f8f;}
  .source span {display:inline-block;margin-left:25px;}
.news-tabs ul li {

    width: 33.3333%;
    height: 40px;
    border-right: 1px solid #ddd;
    float: left;

}
</style>


  <!-- 资讯分类开始 -->
  <div class="filter news-tabs">
    <ul>
    	<li><a href="index.php?pid=48" class="<?php if($pid==48){ echo 'on';}?>"><i></i>房产知识</a></li>
                <li><a href="index.php?pid=49" class="<?php if($pid==49){ echo 'on';}?>"><i></i>房产快讯</a></li>
                <li><a href="index.php?pid=52" class="<?php if($pid==52){ echo 'on';}?>"><i></i>房产政策</a></li>
    	
    
    </ul>
  </div>
  <script type="text/javascript">
  var cateid = 0;
  var flg = true;
    yee.get('/api/news-getcatelist.html',{},function(result){
        if (result.code==200) {
            var html = '';
            var newsTabs = $('.news-tabs ul');
            var newsTabsLi = '<li><select class="getcatelist" onchange="getListData(this)">';
            for ( i in result.data ){
                if (i<3) {
                    if (!cateid) {
                        cateid = result.data[i].id;
                    }
                    if(i<4){
                        if (cateid==result.data[i].id&&flg==true) {
                            flg = false;
                            html = '<li><a class="on" data-val="'+result.data[i].id+'"><i></i>'+result.data[i].name+'</a></li>';
                        }else{
                            html = '<li><a data-val="'+result.data[i].id+'"><i></i>'+result.data[i].name+'</a></li>';
                        }
                    }
                    newsTabs.append(html);
                }else{
                    if (cateid==result.data[i].id&&flg==true) {
                        flg = false;
                        newsTabsLi=newsTabsLi.replace(/getcatelist/ig,'getcatelist on');
                        newsTabsLi+='<option selected192.168 value="'+result.data[i].id+'">'+result.data[i].name+'</option>';
                    }else{
                        newsTabsLi+='<option value="'+result.data[i].id+'">'+result.data[i].name+'</option>';
                    }
                }
            }
            newsTabsLi+='<i></i></select></li>';
            newsTabs.append(newsTabsLi);
        };
        flg = true;
        getData();
    });

  // 获取最后select的选择
  function getListData(_this){
      $('.news-tabs li a').removeClass('on');
      $('.getcatelist').addClass('on');
      page = 1;
      getData($(".getcatelist").val(),true);
  }
  // 分类点击切换
  $('.news-tabs ul').on('click','li a',function(){
      $('.news-tabs li a').removeClass('on');
      $('.getcatelist').removeClass('on');
      $(this).addClass('on');
      page = 1;
      getData($(this).attr('data-val'),true);
  });

  </script>
  <!-- 资讯分类结束 -->




  <!-- 资讯列表开始 -->
  <div class="news-list">
    <ul class="uls">
      <?php
$key=$_GET['key'];
$page = isset($_GET['page']) ? intval($_GET['page']) : 1;

$sql="WHERE `path`='0-47'";

if($pid!=""){
	$sql.=" and `pid`='{$pid}' ";
	}
if($key!=""){
	$sql.=" and `title` like '%{$key}%'";
	}
if($page==0){
	$page=1;
	}

$page_num =12;
$offset = ($page-1)*$page_num;
$rsc = $mysql->query("select count(*) as count from `web_content` {$sql}");// WHERE `adminid`='{$_SESSION['admin_id']}'
//echo "select count(*) as count from `oa_client` {$sql}";
$result["total"] = $rsc[0]['count'];
$total=ceil($result["total"]/$page_num);
$row = $mysql->query("select * from `web_content` {$sql} order by addtime desc limit $offset,$page_num");// WHERE `adminid`='{$_SESSION['admin_id']}'
//echo "select * from `oa_client` {$sql} order by id desc limit $offset,$page_num";
if($result["total"]==0){
	echo "<li align=center style='padding:10px;font-size:15px;border-bottom:dashed #ccc 1px'><h1>很抱歉,没有找到您搜索的结果。</h1></li>";
	}else{
		foreach($row as $k=>$list){
			$url='show.php?id='.$list['id'];
			 ?>

    
             
    	<li>
    		<a href="<?php echo $url;?>">
    			<div class="imgBox">
    				<img src="../../<?php echo $list['img'];?>">
    			</div>
    			<div class="txtBox">
    				<div class="txtTitle"><?php echo $list['title'];?></div>
    				<div class="txtData">来源：盘房网  <span>时间：<?php echo date('Y-m-d',strtotime($list['addtime']));?></span></div>
    			</div>
    		</a>
    	</li>
        <?php
		}
		}
  ?>
    </ul>
  </div>

<div class="yema">
	<ul class="pagination">
	 <?php
    
		$pagess.="<li><a href='?pid={$pid}&page=1' >首页</a></li>";
		//if($page>1){ $pagess.="<li><a class='page_num' href='?page=".($page-1)."'>&lt;</a></li>";}
		if($total>=10){
			
			for ($i=1; $i<=$total; $i++) {
				if($page<$i+3 && $page>$i-3){
						if($page==$i){ $pagess.="<li><a class='active' >{$i}</a></li>";}else{$pagess.="<li><a class='page_num' href='?pid={$pid}&page={$i}'>{$i}</a></li>";}
                    }
				}
			}else{
					for ($i=1; $i<=$total; $i++) {
						if($page==$i){ $pagess.="<li><a class='active' >{$i}</a></li>";}else{$pagess.="<li><a class='page_num' href='?pid={$pid}&page={$i}'>{$i}</a></li>";}
                    }
				}
		//	if($page<$total){$pagess.="<a class='page_num' href='?pid={$pid}&page=".($page+1)."'>&gt;</a>";}
			$pagess.="<li><a href='?pid={$pid}&page={$total}' >尾页</a></li>";
		echo $pagess;
	?>
	</ul>
</div>
  <!-- <div class="news-bani"><a><img src="/public/wap/img/news-bani.jpg"></a></div> -->
  <script type="text/javascript">
  var page = 1;
  function getData(cid,empty){
    cateid = cid || cateid;
    yee.get('/api/news-getlist.html',{pid:cateid,page:page},function(result){
      if (result.code==200) {
        empty==true?$('.news-list ul').html(''):'';
        page++;
        for ( i in result.data){
          // var html = '<li>';
          // html+='<a href="/wap/news-detail-'+result.data[i].id+'.html" onclick=click_more('+result.data[i].id+')>';
          // html+='<div class="news-img"><img src="'+result.data[i].thum+'"></div>';
          // html+='<div class="news-con">';
          // html+='<h1>'+result.data[i].title+'</h1>';        
          // html+='<p>'+result.data[i].content.substr(0,15)+'...</p>';
          // html+='<h2>'+result.data[i].addtime +'</h2>';
          // html+='</div>';
          // html+='</a>';
          // html+='</li>';
          // $('.news-list ul').append(html);
          if(result.data[i].count > 2){ //样式3  3张图存在的
            var html = '<li>';
                html+='<a href="/wap/news-detail-'+result.data[i].id+'.html" onclick=click_more('+result.data[i].id+')>';
                html+='<div class="titleBox">'+result.data[i].title+'</div>';   
                html+='<div class="detailsBox">';
                html+='<ul>'
                html+='<li><img src="'+result.data[i].thum[0].thum+'" alt=""></li>'
                html+='<li><img src="'+result.data[i].thum[1].thum+'" alt=""></li>'
                html+='<li><img src="'+result.data[i].thum[2].thum+'" alt=""></li>'
                html+='</ul>'
                html+='<div class="unberData">来源：'+result.data[i].source +' <span>时间：'+result.data[i].addtime +'</span></div>';
                html+='</div>';
                html+='</a>';
                html+='</li>';
          }else{
            if(result.data[i].count == 1 || result.data[i].count == 2){ //样式1 一张图存在的
                if(result.data[i].thum_size==1){ //样式3 一张图存在的，并且是大图
                  var html = '<li>';
                      html+='<a href="/wap/news-detail-'+result.data[i].id+'.html" onclick=click_more('+result.data[i].id+')>';
                      html+='<div class="titleBox">'+result.data[i].title+'</div>';
                      html+='<div class="centreBox"><img src="'+result.data[i].thum[0].thum+'"></div>';
                      html+='<div class="source">来源：'+result.data[i].source +' <span>时间：'+result.data[i].addtime +'</span></div>';
                      html+='</a>';
                      html+='</li>';
                }else{ //样式1  一张图存在  但是没有选是大图
                  var html = '<li>';
                      html+='<a href="/wap/news-detail-'+result.data[i].id+'.html" onclick=click_more('+result.data[i].id+')>';
                      html+='<div class="imgBox"><img src="'+result.data[i].thum[0].thum+'"></div>';
                      html+='<div class="txtBox">';
                      html+='<div class="txtTitle">'+result.data[i].title+'</div>';        
                      // html+='<div class="txtCenter">'+result.data[i].content.substr(0,12)+'...</div>';
                      html+='<div class="txtData">来源：'+result.data[i].source +'  <span>时间：'+result.data[i].addtime +'</span></div>';
                      html+='</div>';
                      html+='</a>';
                      html+='</li>';
                }
            }else{ // 默认的 一张图都不存在的 为了兼容前面的一些没有上传图的，然后使用原来的，也就是样式1
              var html = '<li>';
              html+='<a href="/wap/news-detail-'+result.data[i].id+'.html" onclick=click_more('+result.data[i].id+')>';
              html+='<div class="imgBox"><img src="'+result.data[i].thum+'"></div>';
              html+='<div class="txtBox">';
              html+='<div class="txtTitle">'+result.data[i].title+'</div>';        
              // html+='<div class="txtCenter">'+result.data[i].content.substr(0,12)+'...</div>';
              html+='<div class="txtData">来源：'+result.data[i].source +'  <span>时间：'+result.data[i].addtime +'</span></div>';
              html+='</div>';
              html+='</a>';
              html+='</li>';
            }
          }
           //样式1

          // var html = '<li>';
          // html+='<a href="/wap/news-detail-'+result.data[i].id+'.html" onclick=click_more('+result.data[i].id+')>';
          // html+='<div class="imgBox"><img src="'+result.data[i].thum+'"></div>';
          // html+='<div class="txtBox">';
          // html+='<div class="txtTitle">'+result.data[i].title+'</div>';        
          // html+='<div class="txtCenter">'+result.data[i].content.substr(0,12)+'...</div>';
          // html+='<div class="txtData">来源：品房阁  <span>时间：'+result.data[i].addtime +'</span></div>';
          // html+='</div>';
          // html+='</a>';
          // html+='</li>';
          // $('.news-list ul').append(html);


          // 样式2   
          // var html = '<li>';
          // html+='<a href="/wap/news-detail-'+result.data[i].id+'.html" onclick=click_more('+result.data[i].id+')>';
          // html+='<div class="titleBox">'+result.data[i].title+'</h1>';   
          // html+='<div class="detailsBox">';
          // html+='<ul>'
          // html+='<li><img src="'+result.data[i].thum+'" alt=""></li>'
          // html+='<li><img src="'+result.data[i].thum+'" alt=""></li>'
          // html+='<li><img src="'+result.data[i].thum+'" alt=""></li>'
          // html+='<ul>'
          // html+='<div class="unberData">来源：品房阁 <span>时间：'+result.data[i].addtime +'</span></div>';
          // html+='</div>';
          // html+='</a>';
          // html+='</li>';
          // $('.news-list ul').append(html);

          // 样式3
          // var html = '<li>';
          // html+='<a href="/wap/news-detail-'+result.data[i].id+'.html" onclick=click_more('+result.data[i].id+')>';
          // html+='<div class="titleBox">'+result.data[i].title+'</div>';
          // html+='<div class="centreBox"><img src="'+result.data[i].thum+'"></div>';
          // html+='<div class="source">来源：品房阁 <span>时间：'+result.data[i].addtime +'</span></div>';
          // html+='</a>';
          // html+='</li>';
          // 
          $('.news-list ul.uls').append(html);
        }
      };
    });
  }
  // 到底加载更多
  yee.ajaxMore(function(){
    getData();
  });
  </script>
  <!-- 资讯列表结束 -->
</section>



<?php include("../bottom.php");?>

 <!-- 填写意向 -->
<!-- <div class="backtop"><a class="back_top"></a></div>
<div class="backfk"><a href="/wap/needs.html" class="back_fk"></a></div> -->
<!--banner-->
<!--other-->


<script src="../js/jquery.js"></script>


</section>



<div id="layermbox1" class="layermbox layermbox1" index="1">
	<div class="laymshade"></div>
	<div class="layermmain">
		<div class="section">
			<div class="layermchild layermchild_hot  layermanim">
				<form class="layermcont" action="" method="post">

					<div class="kp_notice">
					<img src="../images/kptz_2.png" alt="" class="kp_notice_gb" onClick="layer.closeAll();">
					<img src="../images/kptz_1.png" alt="" class="kp_notice_head" style="position:relative;top:-2px;">
					<span>预约看房</span>
					<p>将海南楼盘最新开盘信息以及最新降价、优惠活动信息第一时间通知您</p>
					<input type="text" placeholder="请输入您的姓名">
						<input type="text" placeholder="请输入您的手机号码">
					<a href="javascript:void(0);" onClick="yee.showings($(this).prev().val(),6,1767)">确定</a>
					</div>
				</form>
			</div>
		</div>
	</div>
</div>


<script type="text/javascript">
	$(function () {
		$('.pg_hang .hang_main_bg3').click(function () {
			$('#layermbox1').show()
		});

		$('#layermbox1 .kp_notice_gb').click(function () {
			$('#layermbox1').hide()
		});
	
	});
</script>

</body>
</html>