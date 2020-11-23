    <div class="mt10"></div>
    <div class="building_head">
    	<div class="building_mc fl">
        	<div id="qrcode" style="float: left; width:76px;height: 76px;margin-right: 20px;margin-top: -5px;margin-left: 2px;"></div>
            
			<span class="smbtn" style="cursor :pointer;cursor: pointer; position: absolute; top: 65px;left: 0px;color: #00A0EA; font-size:14px;"><i></i>&nbsp;扫码看房</span>
    		<div class="loupan-name-right cf">
    			<div class="loupan-name-right1">
    				<a href="/loupan/<?php echo $lpid;?>.html"><h1 class="name" title="<?php echo $infos['title'];?>"><?php echo $infos['title'];?></h1></a>
                    <?php
            $flagztz='';
			  $rowflag = $mysql->query("select * from `web_flag` where `flag_fl`='8' and `flag_st`='1' order by `flag_px` asc ");
			foreach($rowflag as $listflag){
				if(preg_match("#".$listflag['flag_bm']."#", $infos['ztz'])){
					echo '<span class="sale-status ds">'.$listflag['flag'].'</span>';
				}
			}
			?>
    			</div>
    			<div class="loupan-name-right2">
                <?php echo loupanflagtsi2($infos['flagts'],6,5);?>
                
                </div>
    		</div>
    	</div>
    	<div class="building_fx fr" style="margin-top: 24px;margin-right: 20px;">    		
              <div class="fl" style="width:50px;margin-top: 5px;">
              	 <img src="/image/tel.gif" alt="电话" width="40">
              </div>
              <div class="fl">
              	<p style="font-size:18px;">售楼处电话</p>
              	<p style="color: #00A0EA;font-size: 20px;"><?php echo telsee($infos['loupan_tel']);?></p>
              </div>            
            <div class="clear"></div>
		</div>
		<div class="clear"></div>
    </div>
	<div class="clear mt10"></div>
    <div class="public-lpnav-w">
          <div class="content-center public-lpnav" style="position: static; z-index: 999; width: 1200px;">
          	<div class="public-lpnav1">
               <ul class="public-lpnav-list">
                    <li id="home_li" <?php if($navfl==1){echo ' class="public-lp-current"';}?>><a href="/loupan/<?php echo $lpid;?>.html" id="home" title="<?php echo $infos['title'];?>楼盘、电话、价格">楼盘主页</a></li>
		            <li id="builddetail_li" <?php if($navfl==2){echo ' class="public-lp-current"';}?>><a href="/loupan/detail/<?php echo $lpid;?>.html" id="builddetail" title="<?php echo $infos['title'];?>,楼盘信息">楼盘信息</a></li>
		            <li id="housetu_li" <?php if($navfl==3){echo ' class="public-lp-current"';}?>><a href="/loupan/huxing/<?php echo $lpid;?>.html" id="housetype" title="<?php echo $infos['title'];?>、房型图">户型图</a></li>
		            <li id="album_li" <?php if($navfl==4){echo ' class="public-lp-current"';}?>><a href="/loupan/news/<?php echo $lpid;?>.html" id="picture" title="<?php echo $infos['title'];?>，楼盘动态">楼盘动态</a></li>
		            <li id="album_li" <?php if($navfl==5){echo ' class="public-lp-current"';}?>><a href="/loupan/photo/<?php echo $lpid;?>.html" id="picture" title="<?php echo $infos['title'];?>，楼盘相册">楼盘相册</a></li>	
		            <li id="album_li" <?php if($navfl==7){echo ' class="public-lp-current"';}?>><a href="/loupan/wenda/<?php echo $lpid;?>.html" id="picture" title="<?php echo $infos['title'];?>，楼盘问答">楼盘问答</a></li>	
		           <!-- <li id="album_li" <?php if($navfl==6){echo ' class="public-lp-current"';}?>><a href="/loupan/map/<?php echo $lpid;?>.html" id="picture" title="<?php echo $infos['title'];?>，地图">地图位置</a></li>		-->	    
                   <?php if($infos['get_url']<>''){?>        
                    <li id="album_li" <?php if($navfl==9){echo ' class="public-lp-current"';}?>><a href="/loupan/vr/<?php echo $lpid;?>.html" id="picture" title="<?php echo $infos['title'];?>，3D全景">3D全景</a></li>	
                   <?php }?>
               </ul> 
           	</div>  
          </div>
    </div>
    
    <!-- 顶部随屏 -->
	<div class="header3">
  	<div class="public-lpnav1">
            <div class="lpm-fixed fl mt10">
              <a href="/loupan/<?php echo $lpid;?>.html"><strong class="lpm-name fl"><?php echo $infos['title'];?></strong></a>
              	<div class="fl pl20" style="color: #fff">
                <?php if($infos['all_price']==0){?>
                                <?php if($infos['jj_price']==0){?>
                        <b>均价：</b><span class="pri1" style="font-family: Georgia;font-size: 30px;color: #fff">待定</span>
                                <?php }else{?>
                        <b>均价：</b><span class="pri1" style="font-family: Georgia;font-size: 30px;color: #fff"><?php echo $infos['jj_price'];?></span>元/㎡
                                <?php }?>
                            <?php }else{?>
                        <b>总价：</b><span class="pri1" style="font-family: Georgia;font-size: 30px;color: #fff"><?php echo $infos['all_price'];?></span>万/套
                            <?php }?>
                </div>
            </div>
       		<div class="fr" style="width: 230px;padding: 8px;">
				<ul>
					<li class="fl" style="width: 230px;margin-top: 5px;">
						<div class="fl" style="width: 50px;">
							<img src="/image/tel.png">
						</div>
						<div class="fl">
							<p style="color: #fff">联系客服</p>
							<p style="color: #fff;font-size: 20px;"><?php echo telsee($infos['loupan_tel']);?></p>
						</div>
						<div class="clear"></div>
					</li>
				</ul>
			</div> 
   	</div>  
  </div>
	<script type="text/javascript">
        //顶部随屏
    $(function(){    
        if($(".page-menu").length == 0 && $(".header-outer").length == 0){
            $(window).scroll(function(){
                var height = $(document).scrollTop();
                var headerHeight = $(".header").height();
                if(height > headerHeight){
                    $('.header3').fadeIn('slow',function(){
                        $(this).css('display','block');
                    });
                }else{
                    $('.header3').fadeOut('slow',function(){
                        $(this).css('display','none');
                    });
                }
            });
        }
    });
    </script>
<!-- 顶部随屏 end--> 