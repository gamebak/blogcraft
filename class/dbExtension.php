<?php

class dbExtension extends o1db
{
	public 
	/**
	*	@var db database connector
	*/
	$db,
	$recentLimit = 20;

	/**
	* Initialize database connection if not set
	*/
	public function __construct()
	{
		/*
		* establish database connector if available
		*/

		if(is_string($db) && !$this->table_exists($this->db)) $this->create_table($this->db);
	}
	/**
	* Convert from key to normal text
	*
	* @param string        $articleKey article key name
	*
	* @return string
	*/
	public function decodeArticleKey($articleKey)
	{
		return str_replace('-',' ',$articleKey);
	}

	/**
	* Convert from normal text to key
	* @param string        $articleKey article key name
	*
	* @return string
	*/
	public function encodeArticleKey($articleKey)
	{
		return str_replace(' ','-',$articleKey);
	}

	/**
	* Add new key to recent articles
	* @param string        $articleKey article key name
	*
	* @return boolean|string
	*/
	public function recentAdd($articleKey)
	{
		// create first recent article
		if(!$this->key_exists($this->db, 'recent'))
		{
			$newKey[] = $articleKey;
		}
		// append the new article to the existing list
		else
		{
			$newKey = unserialize($this->key($this->db, 'recent'));
			if(count($newKey) > $this->recentLimit)
			{
				$newKey[] = $articleKey;
				unset($newKey[0]);
				$newKey = array_values($newKey);
			}
		}

		$this->key($this->db, 'recent', $newKey);

		return true;
	}

	/**
	* Get recent list of articles
	* @param string        $article article inside the database
	*
	* @return boolean|array
	*/
	public function recent($article = false)
	{
		// no table
		if(!$this->table_exists($this->db)) return false;

		// get recent articles
		if( !$article )
		{
			if( !$this->key_exists($this->db, 'recent') ) return false;

			// time() => 'article name'
			$list = unserialize( $this->key($this->db,'recent' ) );

			// return parsed array
			return $list;
		}

		// set a new article to the recent ones
		if( is_string($article) )
		{
			// just create the new article
			if(!$this->key_exists($this->db, 'recent')) $this->key($this->db, 'recent', $article);

			$list = unserialize($this->key($this->db, 'recent'));
			// append the article to the recent list
			while(count($list) > $this->recentlimit)
			{
				unset($list[0]);
				$list = array_values($list);
			}
			$list[] = $article;

			// add new recent list
			$this->key($this->db, 'recent', serialize($list));

			return true;
		}
		
	}
	/*
	* Get recent list with article keys
	*
	* @return array|boolean Array with recent article keys
	*/
	public function getRecentList()
	{
		if(!$this->table_exists($this->db) || !$this->key_exists($this->db, 'recent')) return false;

		$list = unserialize($this->key($this->db, 'recent'));

		return $list;
	}
	/**
	* Parse recent list results, with text instead of keys
	*
	* @return boolean|string
	*/
	public function getRecentParsedList()
	{
		$list = $this->getRecentList();

		// make sure list has elements
		if(!$list) return false;
		
		for($i = 0; $i<count($list); $i++) $list[$i] = $this->decodeArticleKey($list[$i]);

		return $list;
	}

	/*
	* Get total stored article keys
	*
	* @return boolean|array Array with article keys
	*/
	public function getTotalList()
	{
		if(!$this->table_exists($this->db) || !$this->key_exists($this->db, 'top')) return false;

		$list = unserialize($this->key($this->db, 'top'));

		return $list;
	}

	/**
	* 
	* @param string        $db database connector
	* @param string        $articleKey id/key for the indexed article
	*
	* @return boolean 
	*/
	public function addArticleTotalList($articleKey)
	{
		if(!$this->table_exists($this->db)) return false;
		
		// create first key
		if(!$this->key_exists($this->db, 'top'))
		{
			$newKey[] = $articleKey;
		}
		else
		{
			// append new key
			$newKey = $this->getTotalList();
			$newKey[] = $arrKeys;
		}

		$this->key($this->db, 'top', serialize($newKey));

		return true;
	}

	/**
	* @param string        $articleNameKey article name as a key
	* @param string        $value article text
	*
	* @return boolean
	*/
	public function addArticle($articleNameKey, $articleText)
	{
		if(!$this->table_exists($this->db)) return false;

		$articleText = $this->encodeArticleKey($articleText);

		// save article
		$this->key( $this->db, $articleNameKey, $articleText);
		
		// save publish time
		$this->key( $this->db, $articleNameKey.'.publish', time());

		// add to recent list our article
		$this->recentAdd($articleNameKey);

		// add the article to the total
		$this->addArticleTotalList($articleNameKey);
	}
}

?>