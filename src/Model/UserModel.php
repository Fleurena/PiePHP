<?php
class UserModel extends Entity
{
	public function __construct($data)
	{
		$this->db = $this->Database_connect();
		parent::__construct($data);
	}

	public function save()
	{
		$hash = password_hash($this->password, PASSWORD_DEFAULT);
		
		$req = $this->db->prepare('INSERT INTO users (pseudo, email, password) VALUES (:pseudo, :email, :password)');
		$req->bindValue(':pseudo', $this->pseudo);
		$req->bindValue(':email', $this->email);
		$req->bindValue(':password', $hash);
		$req->execute();
	}

	public function create()
	{
		$req = $this->db->prepare('INSERT INTO users');
		$req->execute();
	}

	public function read()
	{
		$req = $this->db->prepare('SELECT * FROM users WHERE email = :email');
		$req->bindValue(':email', $this->email);
		$req->execute();
		$data = $req->fetchAll();
		return $data;
	}

	public function update()
	{
		$req = $this->db->prepare('UPDATE users');
	}

	public function delete()
	{

	}

	public function read_all()
	{
		
	}
}