<?php

class db extends o1db
{
	public $recentlimit = 20;

	/**
	* Get recent list of articles
	*
	* @param string        $db database connector
	* @param string        $article article inside the database
	*
	* @return boolean|array
	*/
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

			$list = unserialize($this->key($db, 'recent'));
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
	/*
	* @param string        $db database connector
	*
	* @return array|boolean Array with articles
	*/
	public function getTotalList($db)
	{
		if(!$this->table_exists($db) || !$this->key_exists($db, 'top')) return false;

		$list = unserialize($this->key($db, 'top'));

		return $list;
	}

	/**
	* 
	* @param string        $db database connector
	* @param string        $articleKey id/key for the indexed article
	*
	* @return boolean 
	*/
	public function addArticleTotalList($db, $articleKey)
	{
		if(!$this->table_exists($db)) return false;
		
		// create first key
		if(!$this->key_exists($db, 'top'))
		{
			$newKey[] = $articleKey;
		}
		else
		{
			// append new key
			$newKey = $this->getTotalList($db);
			$newKey[] = $arrKeys;
		}

		$this->key($db, 'top', serialize($newKey));

		return true;
	}
}

?>