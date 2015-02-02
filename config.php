<?php 
require_once("class/template.php");
require_once("class/o1db.php");
require_once("class/dbExtension.php");

$t = new template;
$db = new o1db;
$dbExtension = new dbExtension;

$default['title'] 		= "Coffee Tables - The best coffee tables in 2015";
$default['description'] = "The coffee table is the must-have types of furniture in the living room, that's why we want to inspire people when they plan to buy it. We offer top quality reviews for coffee tables, with ratings and researched content.";

$default['footer'] 		="<script>
  (function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
  (i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
  m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
  })(window,document,'script','//www.google-analytics.com/analytics.js','ga');ga('create', 'UA-58916750-1', 'auto');ga('send', 'pageview');</script>";
