<?php
class ORM extends Database
{
	public function __construct()
	{
		$this->db = $this->Database_connect();
	}

	public function create($table, $fields)
	{
		$keys = "";
		$valuess = "";

		foreach ($fields as $key => $value) {
			$keys .= $key . ",";
			$valuess .= '"' . $value . '",';
		}

		$keys = substr($keys, 0, -1);
		$valuess = substr($valuess, 0, -1);

		$req = $this->db->prepare("INSERT INTO $table ($keys) VALUES ($valuess)");
		var_dump($req);
		$req->execute();
	}

	public function read($table, $id)
	{
		$req = $this->db->prepare("SELECT * FROM $table WHERE id = $id");
		$req->execute();
		$data = $req->fetchAll();
		return $data;
	}

	public function update($table, $id, $fields)
	{
		foreach ($fields as $key => $value) {
			$valuess = "'" . $value . "'";
			$req = $this->db->prepare("UPDATE $table SET $key = $valuess WHERE id = $id");
			$req->execute();
		}
	}

	public function delete($table, $id)
	{
		$req = $this->db->prepare("DELETE FROM $table WHERE id_film = $id");
		$delete = $req->execute();
	}

	public function find($table, $params = array(
		'WHERE' => 'id = 1',
		'ORDER BY' => 'id ASC',
		'LIMIT' => '1'))
	{
		$test = "";

		foreach ($params as $keys => $values)
		{
			$test .= $keys . " " . $values . " ";
		}

		$req = $this->db->prepare("SELECT * FROM $table $test");
		$req->execute();
		$data = $req->fetchAll(PDO::FETCH_ASSOC);
		return $data;
	}
}