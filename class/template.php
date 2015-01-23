<?php 
class template
{

	public $title, $description;
	const DOMAIN = 'http://picktables.com/';
	function __construct()
	{

	}


	/*
		Blog Structure
	*/
	function filterUrl( $title )
	{
		return str_replace(array(' ','/'), array('-',''), $title);
	}

	function blogHead( $title )
	{
		return '<!DOCTYPE html>
		<html>
		<head>
		  <title>'.$title.'</title>
		  <meta name="generator" content="unblocktube.pk">
		  <meta name="version" content="1.0">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <meta name="description" content="'.$this->description.'">
		  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		  <style type="text/css">.spacer{margin-top:30px;}</style>
		</head>
		<body>';
	}

	function blogFooter()
	{
		return '<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script><script>(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');ga(\'create\',\'UA-55441503-1\',\'auto\');ga(\'send\',\'pageview\');</script></body></html>';
	}

	function nav()
	{
		return '<header class="navbar navbar-default navbar-static-top bs-docs-nav" id="top" role="banner">
		  <div class="container">
		    <div class="navbar-header">
		      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		      </button>
		      <a href="'.self::DOMAIN.'" class="navbar-brand"> Proxy</a>
		    </div>
		    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
		      <ul class="nav navbar-nav navbar-right">
		      	<li><a href="'.self::DOMAIN.'unblock_youtube_benefits.php">Unblock Youtube Benefits</a></li>
		      	<li><a href="'.self::DOMAIN.'proxy_server.php">Proxy Server</a></li>
		        <li><a href="'.self::DOMAIN.'contact.php"><button type="button" class="btn btn-info logobtn">Contact Us</button></a></li>
		      </ul>
		      <ul class="nav navbar-nav navbar-right">
		        
		      </ul>
		    </nav>
		  </div>
		</header>';
	}

}
?>