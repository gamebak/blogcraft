<?php

class db extends o1db
{
	public $recentlimit = 20;

	// Get recent list of articles
	public function recent($db, $article = false)
	{
		// no table
		if(!$this->table_exists($db)) return false;

		// get recent articles
		if( !$article )
		{
			if( !$this->key_exists($db, 'recent') ) return false;

			// time() => 'article name'
			$list = unserialize( $this->key( $db,'recent' ) );

			// return parsed array
			return $list;
		}

		// set a new article to the recent ones
		if( is_string($article) )
		{
			// just create the new article
			if( !$this->key_exists($db, 'recent') ) $this->key( $db, 'recent', $article);

			$list = unserialize( $this->key('db','recent' ) );
			// append the article to the recent list
			while( count($list) > $this->recentlimit ) )
			{
				unset($list[0]); $list = array_values($list);
			}
			$list[] = $article;

			// add new recent list
			$this->key($db, 'recent', serialize($list) );

			return true;
		}
		
	}

	public function addArticleTotalList($db, $article)
	{
		if(!$this->table_exists($db)) return false;

		
	}

	public function getTotalList($db)
	{

	}
}

?>