<?php
/*

o1db
	- a noSql key/value solution for data storage
	- low RAM footprint
	- avg. complexity O(1) better than MySql

*/
class o1db
{
	// main folder wich will be used to store the data
	const DB_STORAGE_FOLDER = 'database';
	// map file used to index the whole keys
	const DB_MAP_FILE = 'map.o1db';

	/* 	
		Database compresion algorithm
		Available methods are: plain_text, base64, gzip
	*/
	const DB_STORE_METHOD = 'gzip';

	// gzip compression level 1 to 9
	const DB_GZIPCOMPRESSION_LEVEL = 9;

	private $valid_store_methods = array('plain_text', 'base64', 'gzip');
	private $error_log;

	public function __construct()
	{
		// checking if the database storage folder exists
		if(!file_exists(self::DB_STORAGE_FOLDER))
		{
			if( !mkdir(self::DB_STORAGE_FOLDER) ) 
				$this->error('Make sure you got enough permissions to create the folder '.self::DB_STORAGE_FOLDER);
		}

		// checking for valid storage method
		if( !in_array(self::DB_STORE_METHOD, $this->valid_store_methods))
			$this->error('Not a valid DATABASE_STORE_METHOD');

		$this->error_log = array();
	}

	public function __deconstruct()
	{
		unset( $this->valid_store_methods );
	}

	/*
		create a new table to store data
	*/
	public function create_table( $table_name )
	{
		if( !$this->valid_string($table_name))
		{
			$this->error('Not a valid table name');
			echo 'PHP what are iu doing?'.PHP_EOL;
			return false;
		}

		// make sure that table exists
		if( $this->table_exists($table_name) )
			return false;
		

		if( !mkdir( self::DB_STORAGE_FOLDER.'/'.$table_name ) )
			$this->error('Failed to create table, please make sure that '.self::DB_STORAGE_FOLDER.' is writable');
	}

	// remove table with all the keys in it
	public function table_clear( $table )
	{
		if( !$this->valid_string($table) || !is_dir(self::DB_STORAGE_FOLDER.'/'.$table))
			$this->error('Not a valid table name or table does\'nt exit');
		
		// first delete each key from folder and then the folder 
		$dh  = opendir(self::DB_STORAGE_FOLDER.'/'.$table);
		while (false !== ($folder = readdir($dh)))
		{

			if( $folder == '.' || $folder == '..')
				continue;
    		
			$dh2  = opendir(self::DB_STORAGE_FOLDER.'/'.$table.'/'.$folder);
			while (false !== ($keyfile = readdir($dh2)))
			{
				if( $keyfile == '.' || $keyfile == '..')
					continue;
				
				unlink(self::DB_STORAGE_FOLDER.'/'.$table.'/'.$folder.'/'.$keyfile);
			}
			// close file handler 2
			closedir($dh2);

			// clear file cache
			clearstatcache(true);

			// remove the key file
			rmdir(self::DB_STORAGE_FOLDER.'/'.$table.'/'.$folder);
		}
		closedir($dh);

		// clear file cache
		clearstatcache(true);

		// last step is to remove the table folder
		if( !rmdir( self::DB_STORAGE_FOLDER.'/'.$table ) )
			$this->warning('Could not delete the table folder, make sure you have enough permissions');

		return true;
	}

	// check if table folder exists
	public function table_exists( $table )
	{
		if( file_exists(self::DB_STORAGE_FOLDER.'/'.$table) )
			return true;

		return false;
	}

	public function key_exists( $table, $key )
	{
		if( !file_exists( self::DB_STORAGE_FOLDER.'/'.$table.'/'.sha1($key).'/'.$key.'.o1db' ))
			return false;

		return true;
	}
	/*
		read / set a new key
		if key was set -> returns @bool;
		in case of key retrieval returns string; 
		in case of error: returns @bool;

	*/
	public function key($table, $key, $value = false)
	{
		if( !$this->valid_string($table) )
		{
			$this->error('Not a valid table name');
			return false;
		}

		if( !$this->valid_string($key))
		{
			$this->error("Not a valid key value");
			return false;
		}

		// if table is missing, attempt to create it when a value is attached
		if( !$this->table_exists($table) && is_string($value) )
			$this->create_table($table);

		// get data from key
		if( !isset($value) || !$value )
		{
			// make sure that the key exists
			if( !$this->key_exists( $table, $key) )
			{
				$this->warning('Key not found');
				return false;
			}

			// read the raw data and parse it
			$raw_data = file_get_contents( self::DB_STORAGE_FOLDER.'/'.$table.'/'.sha1($key).'/'.$key.'.o1db');
			
			// plain_text | gzip ::: key name ::: plain_text_info OR gzip
			$split_data = explode(':::', $raw_data);

			if( !in_array($split_data[0], $this->valid_store_methods) )
				$this->error('Stored method not recognized '.$split_data[0].' for key '.$key);

			if( $split_data[0] == 'plain_text')
				return $split_data[2];
			else if( $split_data[0] == 'base64')
				return base64_decode($split_data[2]);
			else if( $split_data[0] == 'gzip')
				return gzdecode($split_data[2]);
			// exception
			else
				$this->warning("Not a valid storage method");
		}

		// store key and value
		else
		{
			
			if( self::DB_STORE_METHOD == 'plain_text')
				$write_data = self::DB_STORE_METHOD.':::'.$key.':::'.$value;
			else if( self::DB_STORE_METHOD == 'base64' )
				$write_data = self::DB_STORE_METHOD.':::'.$key.':::'.base64_encode($value);
			else if( self::DB_STORE_METHOD == 'gzip' )
				$write_data = self::DB_STORE_METHOD.':::'.$key.':::'.gzencode($value);
			else
			{
				$this->error('Not a known method for data storage');
				return false;
			}

			if( !is_dir(self::DB_STORAGE_FOLDER.'/'.$table.'/'.sha1($key)))
				mkdir(self::DB_STORAGE_FOLDER.'/'.$table.'/'.sha1($key));

			$f = fopen( self::DB_STORAGE_FOLDER.'/'.$table.'/'.sha1($key).'/'.$key.'.o1db', 'w');
			fwrite($f, $write_data);
			fclose($f);

			return true;
		}
	}

	/*
		Remove key from table

		Returns @bool
	*/
	public function remove_key( $table, $key )
	{
		if(!$this->valid_string($table) || !$this->valid_string($key) )
		{
			$this->error("Not a valid key or table");
			return false;
		}
		
		$key_file_path = self::DB_STORAGE_FOLDER.'/'.$table.'/'.sha1($key).'/'.$key.'.o1db';

		if(!file_exists($key_file_path))
		{	
			$this->warning("Key file is missing!");
			return false;
		}
		
		// remove the file
		if( !unlink($key_file_path) || !rmdir(self::DB_STORAGE_FOLDER.'/'.$table.'/'.sha1($key)))
			$this->warning("Key not removed, make sure you have enough permissions to delete it");

		// remove directory hash
		return true;
	}
	/*
		Private methods
	*/

	// string validation
	// returns @bool
	public function valid_string( $str )
	{
		if( empty($str) || !isset($str))
			return false;

		if( preg_match('/^[a-z0-9](?:[a-z0-9_ -\.]*[a-z0-9])?$/i', $str))
			return true;
		
		return false;
	}

	// send a warning message
	private function warning( $msg )
	{
		trigger_error($msg, E_USER_WARNING);
	}

	// send an error message
	private function error( $msg )
	{
		trigger_error($msg, E_USER_ERROR);
	}

}

?> 
