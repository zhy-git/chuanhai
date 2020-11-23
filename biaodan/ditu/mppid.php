
<?php
require("../conn/conn.php");
require("../functionmpp.php");
$lm=2;
$lpid=$_GET['issueId'];
if($lpid<>""){
	$rows=$mysql->query("SELECT * FROM `web_content` WHERE `id`='{$lpid}'");
	$infos=$rows[0];
	 if($infos==false)
	  {
		echo "已经出错!";
		exit;
	   }
	$click=$infos['click']+1;
	$mysql->execute("UPDATE `web_content` SET `click`='".$click."' where `id`='".$lpid."'");
	}

?>

{"model":[{"roomCh":"2","count":3,"room":4}],"phone":"4007252511","jzxs":"<?php echo $infos['wylx'];?>","photoCount":<?php echo countxc('all',$infos['id']);?>,"appraiseCount":<?php echo countlpnews($infos['id']);?>,"issueId":<?php echo $infos['id'];?>,"photo":"/<?php echo $infos['img'];?>","url":"/loupan/show.php?lpid=<?php echo $infos['id'];?>","mapY":<?php if($infos['zby']==""){ echo "20.006282";}else{ echo $infos['zby'];}?>,"mapX":<?php if($infos['zbx']==""){ echo "110.196169";}else{ echo $infos['zbx'];}?>,"price":{"houseUse":"<?php echo $infos['title'];?>","buildingTypeId":4,"price":<?php echo $infos['jj_price'];?>.0,"priceUnitOther":"均价","deputy":1,"priceType":1,"priceSearch":<?php echo $infos['jj_price'];?>.0,"showPrice":1,"buildingType":"高层","rentSale":3,"showSumPrice":0,"priceUnit":"元/㎡","totalPriceSearch":-1.0,"houseUseId":6},"floor":"<?php echo cityname($infos['city_id']);?>","urlShort":"/loupan/show.php?lpid=<?php echo $infos['id'];?>","address":"<?php echo $infos['xmdz'];?>","groupBuyCount":184,"sellSchedule":3,"modelCount":<?php echo countxc('xc1',$infos['id']);?>}