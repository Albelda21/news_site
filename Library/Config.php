<?php 

namespace Library;

abstract class Config 
{
	private static $items = array(); //$items = array

	public static function get($key)
	{
		if(isset(self::$items[$key])) { //self::$items = array
			return self::$items[$key];  //self::$items = array
		}

		return NULL;
	}

	public static function set($key, $val)
	{
		self::$items[$key] = $val; //self::$items = array(1 => 'one'), self::$items[1] = one;
	}
}



 ?>