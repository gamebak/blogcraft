<?php
require_once("config.php");
require_once("class/sitemap.php");

$sitemap = new Sitemap;

/* Extra functions to filter some of the results
	$dbExtension->fixTableArray('top');
	$dbExtension->removeTableArrayValue('top','Coffee table history');
*/

$totalLinkList = $dbExtension->getTotalList();

foreach($totalLinkList as $link)
{
	$sitemap->list[] = array('name' => $link);
}

echo $sitemap->generateMap();
?>