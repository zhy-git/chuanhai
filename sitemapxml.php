<?php
error_reporting(0);
header("Content-type: text/xml");
echo "<?xml version='1.0' encoding='UTF-8'?>";
$dbname = 'www_beihai_chuan';
$host = '127.0.0.1';
$port = '';
$user = 'www_beihai_chuan';
$pwd = 'www_beihai_chuan';
require('conn/mysql_class.php');
$mysql = new MySQL($host,$user,$pwd,$dbname,$port);
?>
<urlset
    xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"
    xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance"
    xsi:schemaLocation="http://www.sitemaps.org/schemas/sitemap/0.9
       http://www.sitemaps.org/schemas/sitemap/0.9/sitemap.xsd">
    <url>
        <loc>http://www.chuanhai.jtr168.cn</loc>
        <priority>1.00</priority>
        <lastmod><?php echo date('y-m-d',time());?></lastmod>
        <changefreq>weekly</changefreq>
    </url>
	<?php
	$rowshow = $mysql->query("select * from `web_content` where `pid`='9' order by px desc,addtime desc");
	foreach($rowshow as $k=>$s_list){
	$url="http://www.chuanhai168.com/loupan/{$s_list['id']}.html";
	?>
     <url>
        <loc><?php echo $url;?></loc>
        <priority>1.00</priority>
        <lastmod><?php echo date('y-m-d',time());?></lastmod>
        <changefreq>weekly</changefreq>
    </url>
	<?php }?>
	
</urlset>
