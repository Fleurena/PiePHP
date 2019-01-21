<?php
class Entity extends Database
{
	public function __construct($params = [])
	{
		foreach ($params as $key => $value) {
			$this->__set($key, $value);
		}
	}

	public function __set($name, $value)
	{
		$this->$name = $value;
	}
}