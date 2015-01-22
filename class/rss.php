<?php 
/*
	Class - Rss 2 feed generating
*/
class RSS
{
	public $title;
	public $url;
	public $date;

	function __construct()
	{

	}

	function generate( $arr )
	{
		if( !is_array($arr) || count($arr) < 2 )
			return false;

		$rss = '<?xml version="1.0" encoding="UTF-8"?>
			<rss version="2.0" xmlns:content="http://purl.org/rss/1.0/modules/content/">
			<channel>
			<title>' . $this->title . '</title>
			<link>' . $this->url . '</link>
			<description>' . $this->description . '</description>
			<lastBuildDate>'.date('D, d M Y H:i:s O').'</lastBuildDate>
			<language>en</language>';

		foreach( $arr as $item )
		{
			// skip articles if no text
			if( !isset($item['title']) )
				continue;

			$rss .= '<item>
						<title><![CDATA['.$item['title'].']]></title>
						<link>'.$item['url'].'</link>
						<pubDate>'.date('D, d M Y H:i:s O').'</pubDate>
						<category>'.$item['category'].'</category>
						<content:encoded><![CDATA['.$item['description'].']]></content:encoded>
					</item>';
		}

		$rss .= '</channel></rss>';
		
		// compression
		return str_replace("\t",'', $rss);
	}
}
?>