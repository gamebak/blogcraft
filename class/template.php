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
	public function filterUrl( $title )
	{
		return str_replace(array(' ','/'), array('-',''), $title);
	}

	/**
	 * Filter id by any special characters
 	 * @param integer $id
	 * @return string
	 */
	public function filterId( $id )
	{	
		$id = str_replace('/','',$id);
		return htmlspecialchars($id, ENT_QUOTES, 'UTF-8');
	}

	/**
	 * Blog head as html
	 * @return string
	 */
	public function blogHead( )
	{
		return '<!DOCTYPE html>
		<html>
		<head>
		  <title>'.$this->title.'</title>
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
		<meta property="og:description" content="'.$this->description.'" />
		<meta property="og:url" content="http://picktables.com" />
		<meta property="og:site_name" content="The Best Rated Coffee Tables Reviews Online – PickTables" />
		</head>
		<body>';
	}

	/**
	 * Blog footer
	 * @return string
	 */
	public function blogFooter()
	{
		return $this->footer.'<script src="http://code.jquery.com/jquery-1.11.0.min.js"></script><script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script><script src="js/app.js"></script><script>(function(i,s,o,g,r,a,m){i[\'GoogleAnalyticsObject\']=r;i[r]=i[r]||function(){(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)})(window,document,\'script\',\'//www.google-analytics.com/analytics.js\',\'ga\');ga(\'create\',\'UA-55441503-1\',\'auto\');ga(\'send\',\'pageview\');</script>'.$this->footer().'</body></html>';
	}

	/**
	 * Blog html5 footer
	 * @return string
	 */
	public function footer()
	{
		return '<footer class="text-center">
        <div class="footer-above">
            <div class="container">
                <div class="row">
                    <div class="footer-col col-md-4">
                        <h3>Location</h3>
                        <p>United States</p>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>Around the Web</h3>
                        <ul class="list-inline">
                            <li>
                                <a href="https://www.facebook.com/pages/Pick-Tables/523309684478609" target="_blank" rel="nofollow" class="btn-social btn-outline"><i class="fa fa-fw fa-facebook">F</i></a>
                            </li>
                            <li>
                                <a href="https://plus.google.com/b/104767322980481155442/104767322980481155442" target="_blank" rel="nofollow" class="btn-social btn-outline"><i class="fa fa-fw fa-google-plus">g+</i></a>
                            </li>
                            <li>
                                <!-- <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-twitter">T</i></a> !-->
                            </li>
                            <li>
                                <!-- <a href="#" class="btn-social btn-outline"><i class="fa fa-fw fa-linkedin">in</i></a> !-->
                            </li>
                        </ul>
                    </div>
                    <div class="footer-col col-md-4">
                        <h3>About Picktables</h3>
                        <p>Picktables is a free to use, open source website <a href="http://picktables.com">Pick Tables</a>.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-below">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        Copyright © Picktables 2015
                    </div>
                </div>
            </div>
        </div>
    </footer>';
	}

	/**
	 * Blog navbar
	 * @return string
	 */
	public function nav()
	{
		return '<header class="navbar navbar-default navbar-static-top navbarmain" id="top" role="banner">
		  <div class="container">
		    <div class="navbar-header">
		      <button class="navbar-toggle collapsed" type="button" data-toggle="collapse" data-target=".bs-navbar-collapse">
		        <span class="sr-only">Toggle navigation</span>
		        <span class="icon-bar"></span>
		      </button>
		     <a class="navbar-brand" href="'.self::DOMAIN.'">Coffee Tables</a>
		    </div>
		    <nav class="collapse navbar-collapse bs-navbar-collapse" role="navigation">
		      <ul class="nav navbar-nav navbar-right">
		      	<li class="dropdown">
                	<a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">Tables <span class="caret"></span></a>
                		<ul class="dropdown-menu" role="menu">
		                 
		                  <li><a href="#">Coffe Tables</a></li>
		                  <li><a href="#">Bedside Tables</a></li>
		                  <li><a href="#">Console Tables</a></li>
		                  <li><a href="#">Dinning Tables</a></li>
		                  <li><a href="#">Glass Tables</a></li>
		                  <li class="divider"></li>
		                  <li class="dropdown-header">Tables</li>
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

	/**
	* Generate template for recent list
	*
	* @param array 		$arr array with most recent
	*
	* @return string
	*/
	public function recentListRender($arr)
	{
		$tmp = '<div class="panel panel-default">
			<div class="panel-heading">Recent articles</div>
		<ul class="list-group">';

		if(is_array($arr)) {
			foreach($arr as $ar) {
				$tmp.= '<li class="list-group-item"><a href="'.self::DOMAIN.$this->filterUrl($ar).'" title="'.$ar.'">'.$ar.'</a></li>';
			}
		}	

		$tmp .= '</ul>

		</div>';

		return $tmp;
	}

	/**
	* Generate template for subscribers
	*
	* @return string
	*/
	public function subscribersRender()
	{
		$tmp = '<div class="panel panel-default">
			<div class="panel-heading">Recent articles</div>
			<form class="form-inline">
				<input type="text" class="form-control" placeholder="Your email">
				 <button type="submit" class="btn btn-default">Subscribe</button>
			</form>
			</div>';
	}

}
