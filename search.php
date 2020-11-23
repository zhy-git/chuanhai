
<!doctype html>
<html lang="en">
<head>
<?php
require("conn/conn.php");
require("function.php");
?>
    <meta charset="UTF-8">
    <meta name="viewport"content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script type="text/javascript" src="/js/search_ajax.js"></script>
</head>
<body>
<!-- 搜索弹窗 -->
<div class="y_puic_search">
    <div class="y_search_main">
        <div class="y_search_cen">
            <div class="y_search_top">
                <div class="y_search_inp c">
                    <div class="y_search_inpmain c">
                        <img src="/image/m_sstb1.png" alt="">
                        <input class="y_search_text" type="text" placeholder="请输入楼盘名称">
                        <input class="y_search_subm" type="submit" value="搜索">
                    </div>
                    <div class="y_search_show" id="y_search_show">
                        <div class="m_jt"><img src="/image/m_ssa10.png" alt=""></div>
                        <div class="y_search_showl">

                        </div>
                        <div class="y_search_showr">
                            <p class="y_h">热门推荐</p>
                            <ul class="y_tuijian c">
                            <?php
							 $row = $mysql->query("select * from `web_content` where `pid`='9' order by px1 desc limit 0,4");// and `city_id`='57'
								foreach($row as $k=>$list){
								$url="/loupan/{$list['id']}.html";
								?>
								<li>
												<div class="y_tuijian_tu">
													<a href="<?php echo $url;?>">
														<img src="<?php echo $site.$list['img'];?>" alt="">
													</a>
												</div>
												<div class="y_tuijian_text">
													<p class="y_title"><a href="<?php echo $url;?>"><?php echo $list['title'];?></a></p>
												</div>
											</li>
							<?php
							}
							?>
                    	</ul>
                        </div>
                    </div>

                    <div class="y_scrmaak"></div>
                </div>

                <ul class="m_region c" style="display:none;">
                    <div class="m_region_title"><span>热门区域</span></div>
                    <li><a href="/house/search?city=37" target="_blank"><img src="/image/m_sous1.png" alt=""><i>广西</i></a></li>
                    <li><a href="/house/search?city=48" target="_blank"><img src="/image/m_sous2.png" alt=""><i>云南</i></a></li>
                    <li><a href="/house/search?city=55" target="_blank"><img src="/image/m_sous3.png" alt=""><i>东南亚</i></a></li>
                    <li><a href="/house/search?city=28" target="_blank"><img src="/image/m_sous4.png" alt=""><i>广东</i></a></li>
                </ul>
            </div>

            <!-- 搜索条件 start -->
            <div class="y_search_bottom">
                                 <div class="y_searchb_mok c">
                    <div class="y_searchb_l fl">
                        <p>区域</p>
                    </div>
                    <div class="y_searchb_r fl c">
                        <a href="javascript:void(0)" name="city"  value="0"  class="on"  >不限</a>
                        <?php
						$city=$mysql->query("select * from `web_city` where `pid`='1' and `city_st`='1' order by `city_px` asc");
						foreach($city as $cityall){
							echo '<a href="/loupan/?city_id='.$cityall['id'].'">'.$cityall['city_name'].'</a>';
						}
						?>            
					</div>
                </div> 
                <div class="y_searchb_mok c">
                    <div class="y_searchb_l">
                        <p>价格</p>
                    </div>
                    <div class="y_searchb_r fl c">
                        <a href="javascript:void(0)" name="city"  value="0"  class="on"  >不限</a>
                        <?php
						$flag=$mysql->query("select * from `web_flag` where `flag_fl`='7' and `flag_st`='1' order by `flag_px` asc");
						foreach($flag as $flagall){
							echo '<a href="/loupan/?flagjw='.$flagall['flag_bm'].'">'.$flagall['flag'].'</a>';
						}
						?>
                    </div>
                </div>
                <div class="y_searchb_mok c">
                    <div class="y_searchb_l fl">
                        <p>户型</p>
                    </div>
                    <div class="y_searchb_r fl c">
                        <a href="javascript:void(0)" name="city"  value="0"  class="on"  >不限</a>
                        <?php
						$flag=$mysql->query("select * from `web_flag` where `flag_fl`='4' and `flag_st`='1' order by `flag_px` asc");
						foreach($flag as $flagall){
							echo '<a href="/loupan/?flaghx='.$flagall['flag_bm'].'">'.$flagall['flag'].'</a>';
						}
						?>
                    </div>
                </div>
                <div class="y_searchb_mok c">
                    <div class="y_searchb_l fl">
                        <p>类型</p>
                    </div>
                    <div class="y_searchb_r fl c">
                        <a href="javascript:void(0)" name="city"  value="0"  class="on"  >不限</a>
                        <?php
						$flag=$mysql->query("select * from `web_flag` where `flag_fl`='6' and `flag_st`='1' order by `flag_px` asc");
						foreach($flag as $flagall){
							echo '<a href="/loupan/?flagts='.$flagall['flag_bm'].'">'.$flagall['flag'].'</a>';
						}
						?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
</html>
