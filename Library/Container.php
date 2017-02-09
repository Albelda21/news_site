<?php 
	
namespace Library;

class Container
{
	private $services = array();

	public function get($key) //получить по ключу, который мы введем
	{
		return isset($this->services[$key]) ? $this->services[$key] : null;
		// if (!isset($this->services[$key])) {
		// 	throw new \Exception("Error Processing Request", 1);
		// 	}
		// 	return $this->services[$key];
	}

	public function set($key, $object)
	{
		$this->services[$key] = $object;
	}
}




 ?>