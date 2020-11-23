<?php
error_reporting(0);
date_default_timezone_set('Asia/Shanghai');
header('Content-Type: text/html; charset=utf-8');
require('webscan.php');
$dbname = 'www_beihai_chuan';
$host = '127.0.0.1';
$port = '';
$user = 'www_beihai_chuan';
$pwd = 'www_beihai_chuan';
require('mysql_class.php');
$mysql = new MySQL($host,$user,$pwd,$dbname,$port);
?>