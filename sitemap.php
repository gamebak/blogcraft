<?php
require_once("config.php");
require_once("class/sitemap.php");

$sitemap = new Sitemap;

$totalLinkList = $dbExtension->getTotalList();
foreach($totalLinkList as $link)
{
	$sitemap->list[] = array('name' => $link);
}

echo $sitemap->generateMap();
?>