<?php 
class template
{

	public $title, $description, $footer;
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

	function filterId( $id )
	{	
		$id = str_replace('/','',$id);
		return htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
	}
	function blogHead( $title )
	{
		return '<!DOCTYPE html>
		<html>
		<head>
		  <title>'.$title.'</title>
		  <meta name="generator" content="picktables.com">
		  <meta name="version" content="1.0">
		  <meta name="viewport" content="width=device-width, initial-scale=1">
		  <meta name="description" content="'.$this->description.'">
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
		<link rel="stylesheet" href="css/app.css">
		<meta charset="UTF-8">
		<meta property="og:locale" content="en_US" />
		<meta property="og:type" content="website" />
		<meta property="og:title" content="The Best Rated Coffee Tables Reviews Online – PickTables" />
		<meta property="og:description" content="PickTables.com – the ultimate place to find the best rated coffee tables without wasting time or money. We do all research just for you!" />
		<meta property="og:url" content="http://picktables.com" />
		<meta property="og:site_name" content="The Best Rated Coffee Tables Reviews Online – PickTables" />
		</head>
		<body>';
	}

	function blogFooter()
	{
		return $this->footer.'<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script><script>(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');ga(\'create\',\'UA-55441503-1\',\'auto\');ga(\'send\',\'pageview\');</script></body></html>';
	}

	function nav()
	{
		return '<header class="navbar navbar-default navbar-static-top navbarmain" id="top" role="banner">
		  <div class="container">
		    <div class="navbar-header">
		      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		      </button>
		     <a class="navbar-brand" href="#page-top">Coffee Tables</a>
		    </div>
		    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
		      <ul class="nav navbar-nav navbar-right">
		      	<li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Dropdown <span class="caret"></span></a>
                <ul class="dropdown-menu" role="menu">
                  <li><a href="#">Coffe Tables</a></li>
                  <li><a href="#">Bedside Tables</a></li>
                  <li><a href="#">Console Tables</a></li>
                  <li><a href="#">Dinning Tables</a></li>
                  <li><a href="#">Glass Tables</a></li>
                  <li class="divider"></li>
                  <li class="dropdown-header">Nav header</li>
                  <li><a href="#">Separated link</a></li>
                  <li><a href="#">One more separated link</a></li>
                </ul>
              	</li>
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