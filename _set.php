<?php 
/* Article setting interface */
require_once("class/template.php");
require_once("class/dbExtension.php");
require_once("class/o1db.php");

$t = new template;
$db = new o1db;

// Extension database connector
$db->db = 'db';

$db->addArticle('article name not formatted', 'article text');
?>