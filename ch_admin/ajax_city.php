<?php
include("../conn/conn.php");
require('function.php');
 if($_POST){
	 //echo "<option value=0 >城市</option>";
	$sql="SELECT * FROM `web_city` WHERE `pid` = '".$_POST['pid']."'";
	$query=mysql_query($sql);
		while ($row=mysql_fetch_array($query)){
		 echo '<option value="'.$row['id'].'">'.$row['city_name'].'</option>';
		}
	 }
		//echo $html;