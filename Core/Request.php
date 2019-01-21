<?php
class Request
{
	private $array_post = [];
	private $array_get = [];

	public function __construct()
	{
		$this->array_post = $this->secure($_POST);
		$this->array_get = $this->secure($_GET);
	}

	private function secure(array $array)
	{
		$sarray = array();
		foreach ($array as $key => $value) {
			$sarray[$key] = htmlspecialchars(trim(stripslashes($value)));
		}
		return $sarray;
	}

	public function get()
	{
		return $this->array_get;
	}

	public function post()
	{
		return $this->array_post;
	}
}