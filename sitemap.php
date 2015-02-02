<?php
require_once("config.php");

$sitemap = new Sitemap;

$totalLinkList = $dbExtension->getTotalList();
foreach($totalLinkList as $link)
{
	$sitemap->list[] = array('name' => $link);
}

echo $sitemap->generateMap();
?>