<?php
class Database
{
	public function Database_connect()
	{
		try
		{
			$this->db = new PDO('mysql:dbname=piephp;host=127.0.0.1;charset=utf8', 'root', '', array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
		} 
		catch (Exception $e)
		{
			die('Erreur : ' .$e->getMessage());
		}
		return $this->db;
	}
}