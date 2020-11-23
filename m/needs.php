<!DOCTYPE html>
<html>
	
	<?php
require("../conn/conn.php");
include("function.php");
?>
	<head>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1,maximum-scale=1,user-scalable=no" />
		<title>购房需求</title>
		<link rel="stylesheet" type="text/css" href="css/index.css"/>
		<link rel="stylesheet" type="text/css" href="css/style.css"/>
		<link rel="stylesheet" type="text/css" href="css/shuxing.css"/> <!--网站通用属性-->
		<link rel="stylesheet" type="text/css" href="css/bottom-css.css"/><!--网站底部样式-->
		<link rel="stylesheet" type="text/css" href="css/top-css.css"/><!--网站顶部样式-->
		<script src="js/jquery-1.js"></script>
		<script src="js/layer.js"></script>
		<script src="js/jquery.js"></script>
		<link href="css/layer.css" type="text/css" rel="styleSheet" id="layermcss">
		
	</head>
	<body style="background-color: #f7f7f7;">
		
		<?php require("top.php");?>
		
		<div class="forms-box">
			<div class="forms-title">
				<h2>我的购房需求</h2>
				<p>请填写您的购房需求，我们将根据您的需求为您量身定制看房路线。</p>
			</div>
            
  <form class="fo" id="myform" name="myform" method="post" action="save.php?action=dz" onSubmit="return checkLm(this);">
  <input type="hidden" name="lpid" value="0" />
  <input type="hidden" name="pid" value="57" />
				<div class="yi">
					<h2>意向城市</h2>
					 <select name="yixiang" class="intention">
                            <option>不限 </option>
                            <option value="三亚">三亚</option>
                            <option value="海口">海口</option>
                            <option value="陵水">陵水</option>
                            <option value="万宁">万宁</option>
                            <option value="乐东">乐东</option>
                            <option value="保亭">保亭</option>
                            <option value="澄迈">澄迈</option>
                            <option value="临高">临高</option>
                            <option value="文昌">文昌</option>
                            <option value="琼海">琼海</option>
                            <option value="屯昌">屯昌</option>
                            <option value="儋州">儋州</option>
                            <option value="定安">定安</option>
                            <option value="广东">广东</option>
                            <option value="广西">广西</option>
                            <option value="云南">云南</option>
                            <option value="东南亚">东南亚</option>
                        </select>
				</div>
				
				<div class="yi" style="display:none;">
					<h2>房屋类型</h2>
					<select name="feature" class="feature">
                            <option>不限 </option>
                            <option value="公园地产">公园地产 </option>
                            <option value="教育社区">教育社区 </option>
                            <option value="旅游地产">旅游地产 </option>
                            <option value="品牌地产">品牌地产 </option>
                            <option value="水景住宅">水景住宅 </option>
                            <option value="低密居所">低密居所 </option>
                            <option value="科技住宅">科技住宅 </option>
                            <option value="景观住宅">景观住宅 </option>
                            <option value="经济住宅">经济住宅 </option>
                            <option value="投资地产">投资地产 </option>
                            <option value="湖景地产">湖景地产 </option>
                            <option value="小户型">小户型 </option>
                            <option value="养生宜居">养生宜居 </option>
                            <option value="复合地产">复合地产 </option>
                            <option value="海景地产">海景地产 </option>
                            <option value="花园洋房">花园洋房 </option>
                            <option value="特色别墅">特色别墅 </option>
                            <option value="山景地产">山景地产 </option>
                            <option value="江景地产">江景地产 </option>
                            <option value="配套商品房">配套商品房 </option>
                            <option value="学区房">学区房 </option>
                            <option value="新盘首开">新盘首开 </option>
                            <option value="低总价">低总价 </option>
                            <option value="LOFT">LOFT </option>
                        </select>
				</div>
				
				<div class="yi" style="display:none;">
					<h2>意向户型</h2>
					<select name="house_type" class="house_type">
                            <option>不限 </option>
                            <option value="一户">一户 </option>
                            <option value="二户">二户 </option>
                            <option value="三户">三户 </option>
                            <option value="四户">四户 </option>
                            <option value="五户">五户 </option>
                            <option value="五户以上">五户以上 </option>
                        </select>
				</div>
				<div class="yi" style="display:none;">
					<h2>置业面积</h2>
					<select name="house_mj">
						<option value="">不限</option>
						<option value="100平">100平</option>
						<option value="200平">200平</option>
					</select>
				</div>
				
				<div class="yi" style="display:none;">
					<h2>预算价位</h2>
					 <select name="house_price" class="house_price">
                            <option>不限 </option>
                            <option value="4千元以下">4千元以下 </option>
                            <option value="4000元-6000元">4000元-6000元 </option>
                            <option value="6000元-8000元">6000元-8000元 </option>
                            <option value="8000元-1万元">8000元-1万元 </option>
                            <option value="1-1.5万">1-1.5万 </option>
                            <option value="1.5-2万">1.5-2万 </option>
                            <option value="2-2.5万">2-2.5万 </option>
                            <option value="2.5万以上">2.5万以上 </option>
                        </select>
				</div>
				
				<div class="yi" style="display:none;">
					<h2>装修要求</h2>
					<select name="">
						<option value="">选择装修要求</option>
						<option value="简装">精装</option>
						<option value="文昌">简装</option>
					</select>
				</div>
				
				<div class="yi">
					<h2>附加需求</h2>
					<textarea placeholder="我的其他要求" name="leave" rows="" cols=""></textarea>
				</div>
				
				<div class="er">
					<div class="er-1">
						<label>姓名</label>
						<input placeholder="您的姓名" type="" name="uname" id="" value="" />
						<span>*必填</span>
					</div>
					<div class="er-1">
						<label>电话</label>
						<input placeholder="您的电话" type="" name="utel" id="" value="" />
						<span>*必填</span>
					</div>
				</div>
				 <input name="submit" class="button" type="submit" value="提交我的购房需求">
				
			</form>
		</div>
		<style>
		.fo .button {
    width: 8rem;
    margin: 0.8rem auto;
    display: block;
    line-height: 1.4rem;
    background-color: #FF0000;
    border-radius: 5px;
    border: none;
    color: #fff;
    font-size: 0.5rem;
}
		</style>
		<?php include("bottom.php");?>
	</body>
</html>
