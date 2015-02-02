<?php
/*
	Generate Sitemaps
*/
class Sitemap extends template
{
	public $list; //name

	/**
	* Sitemap html generator
	*
	* @return string
	*/
	public function generateMap()
	{
		$str = '<?xml version="1.0" encoding="UTF-8"?><urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">';
		foreach($this->list as $url) $str.= '<url><loc>http://picktables.com/'.$this->filterUrl( $url['name'] ).'</loc></url>';

		$str.='</urlset>';
		return $str;
	}
}

?>