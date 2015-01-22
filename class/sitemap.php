<?php
/*
	Generate Sitemaps
*/
class Sitemap extends template
{
	public $list; //name

	function generateMap( )
	{
		$str = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9"><url><loc>http://unblocktube.pk/</loc><priority>1.0</priority></url><url><loc>http://unblocktube.pk/unblock_youtube_benefits.php</loc></url><url><loc>http://unblocktube.pk/proxy_server.php</loc></url><url><loc>http://unblocktube.pk/what_is_web_proxy.php</loc></url><url><loc>http://unblocktube.pk/contact.php</loc></url>';

		foreach($this->list as $url) $str.= '<url><loc>http://unblocktube.pk/blog/'.$this->filterUrl( $url['name'] ).'</loc></url>';

		$str.='</urlset>';
		return $str;
	}
}

?>