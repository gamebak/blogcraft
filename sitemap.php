<?php
require_once("config.php");
require_once("class/sitemap.php");

$sitemap = new Sitemap;

$dbExtension->fixArray('top');

$totalLinkList = $dbExtension->getTotalList();

var_dump($totalLinkList);

foreach($totalLinkList as $link)
{
	$sitemap->list[] = array('name' => $link);
}

echo $sitemap->generateMap();
?>