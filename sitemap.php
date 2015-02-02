<?php
require_once("config.php");
require_once("class/sitemap.php");

$sitemap = new Sitemap;

$dbExtension->fixTableArray('top');
$dbExtension->removeTableArrayValue('top','Coffee table history');

$totalLinkList = $dbExtension->getTotalList();

var_dump($totalLinkList);

foreach($totalLinkList as $link)
{
	$sitemap->list[] = array('name' => $link);
}

echo $sitemap->generateMap();
?>