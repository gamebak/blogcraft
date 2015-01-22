<?php
require_once("class/template.php");
require_once("class/sitemap.php");

$sitemap = new Sitemap;

$sitemap->list[] = array('name' => 'Websites blocked in Pakistan');
$sitemap->list[] = array('name' => 'Bypass proxy');
$sitemap->list[] = array('name' => 'Terms of use');
$sitemap->list[] = array('name' => 'What-is-SSL-encryption');

echo $sitemap->generateMap();
?>